$(document).ready(function() {
    fetchAppliedJobsOfEmployerPosts(1, 5)
        // Javascript method's body can be found in assets/js/demos.js
        // demo.initDashboardPageCharts();
    $('select.custom-select').hide()
    $("[data-toggle='tooltip']").tooltip()
    $(".card-header .card-title").click(function() {
        $(this).parent().siblings().toggle();
    });
});

function fetchAppliedJobsOfEmployerPosts(page_number, page_limit) {
    $('.loader, .page-loader').show()
        // if ($.trim($("#job_title").val()) != '' || $.trim($("#job_position").val()) != '' || $.trim($("#fromdate").val()) != '' || $.trim($("#todate").val()) != '' || $.trim($("#location").val()) != '') {
        //     var params = { page_number: page_number, page_limit: page_limit, job_title: $.trim($("#job_title").val()), job_position: $.trim($("#job_position").val()), fromdate: $.trim($("#fromdate").val()), todate: $.trim($("#todate").val()), location: $.trim($("#location").val()) }
        // } else {
    var params = { page_number: page_number, page_limit: page_limit }
        // }

    $.get(base_url + 'employer/JobPosts/FetchAppliedJobsOfEmployerPosts', params, function(data, status) {
        var data = $.parseJSON(data)
        console.log(data, data.info.length)
        var template = ''
        if (data.message == 'OK' && data.info.length > 0) {
            $.each(data.info, function(key, res) {
                template += "<tr>"
                template += "<td>" + res.name_first + " " + res.name_last + "</td>"
                template += "<td>" + res.job_title + "</td>"
                template += "<td>" + res.job_description + "</td>"
                template += "<td>" + new Date(res.addedDate).toLocaleString('en-IN', { hour12: true, timeZone: 'Asia/Kolkata', year: 'numeric', month: 'numeric', day: 'numeric', hour: 'numeric', minute: 'numeric', }) + "</td>"
                template += "<td><a href='#' onclick='viewMoreDetails(\"" + res.appliedBy + "\", \"" + res.appliedJobPostId + "\")'>View More</a></td>"
                template += "</tr>"
            })
            $('.employeeApproached').children().remove()
            $('.employeeApproached').append(template)
            AddPagination(data.total_count, page_number, page_limit)
            $('.loader').fadeOut()
            $('.page-loader').delay(350).fadeOut('slow')
            window.location.href = '#top'
        }
    })
}

function viewMoreDetails(appliedBy, appliedJobPostId) {
    console.log(appliedBy, appliedJobPostId);
    var params = { appliedBy: appliedBy, appliedJobPostId: appliedJobPostId }
    $.get(base_url + 'employer/JobPosts/FetchJobPostDetailsAndEmployeeDetails', params, function(data, status) {
        var data = $.parseJSON(data)
        console.log(data, data.info.length)
        var template = ''
        if (data.message == 'OK' && data.info.length > 0) {
            var res = data.info[0]
            template += '<ul class="nav nav-tabs" id="myTab" role="tablist">'
            template += '<li class="nav-item">'
            template += '<a class="nav-link active" id="employeeDetails-tab" data-toggle="tab" href="#employeeDetails" role="tab" aria-controls="employeeDetails" aria-selected="true">Employee details</a>'
            template += '</li>'
            template += '<li class="nav-item">'
            template += '<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Job details</a>'
            template += '</li>'
            template += '</ul>'
            template += '<div class="tab-content" id="myTabContent">'
            template += '<div class="tab-pane fade show p-2 active" id="employeeDetails" role="tabpanel" aria-labelledby="employeeDetails-tab">'
            template += '<div class="card p-3"><footer class="blockquote-footer">Name</footer>' + res.name_first + ' ' + res.name_last + '</div>'
            template += '<div class="card p-3"><footer class="blockquote-footer">Email</footer>' + res.email + '</div>'
            template += '<div class="card p-3"><footer class="blockquote-footer">Mobile number</footer>' + res.phonenumber + '</div>'
            template += '<div class="card p-3"><footer class="blockquote-footer">Experince</footer>' + res.Experince + '</div>'
            template += '<div class="card p-3"><footer class="blockquote-footer">Education</footer>' + res.Education + '</div>'
            template += '</div>'
            template += '<div class="tab-pane fade p-2" id="profile" role="tabpanel" aria-labelledby="profile-tab">'
            template += '<div class="card p-3"><footer class="blockquote-footer">Job title</footer>' + res.job_title + '</div>'
            template += '<div class="card p-3"><footer class="blockquote-footer">Job position</footer>' + res.job_position + '</div>'
            template += '<div class="card p-3"><footer class="blockquote-footer">Job opening date</footer>' + res.job_opening_date + '</div>'
            template += '<div class="card p-3"><footer class="blockquote-footer">Skills required</footer>' + res.skills_req + '</div>'
            template += '<div class="card p-3"><footer class="blockquote-footer">Job description</footer>' + res.job_description + '</div>'
            template += '</div>'
            template += '</div>'
            $('.modal-header .modal-title').html("View More");
            $('.modal-body').html(template);
            $('#myModal').modal({ backdrop: 'static', keyboard: false, focus: true })
        }
    })
}

function AddPagination(count, curr_page, page_limit) {
    $('.pagination, .tooltip').children().remove()
    var pag_templete = ''
    var total_pages = Math.ceil(count / page_limit)
    var page_num_limits = 5
    var page_count_limit = page_num_limits
    var curr_page_count = curr_page

    if (curr_page_count < page_num_limits) {
        curr_page_count = 1;
    }

    if (total_pages > page_num_limits) {
        page_count_limit = (page_count_limit + curr_page_count) - 1
    } else {
        page_count_limit = total_pages
    }

    if (page_count_limit > total_pages) {
        var diff = total_pages - curr_page_count
        if (diff < page_num_limits) {
            curr_page_count = curr_page_count - (page_num_limits - diff)
        }
        page_count_limit = total_pages
    }

    // console.log(curr_page_count, page_count_limit)

    pag_templete += '<li class="page-item" onclick="fetchAppliedJobsOfEmployerPosts(1, ' + page_limit + ')" data-toggle="tooltip" data-trigger="hover" title="First" ' + (curr_page == 1 ? 'disabled' : '') + '><a class="page-link" href="javascript:void(0)"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>'

    pag_templete += '<li class="page-item" onclick="fetchAppliedJobsOfEmployerPosts(' + (curr_page == 1 ? 1 : curr_page - 1) + ', ' + page_limit + ')" data-toggle="tooltip" data-trigger="hover" title="Previous" ' + (curr_page == 1 ? 'disabled' : '') + '><a class="page-link" href="javascript:void(0)"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>'

    pag_templete += '<li class="page-item" onclick="fetchAppliedJobsOfEmployerPosts(' + (curr_page == total_pages ? total_pages : curr_page + 1) + ', ' + page_limit + ')" data-toggle="tooltip" data-trigger="hover" title="Next" ' + (curr_page == total_pages ? 'disabled' : '') + '><a class="page-link" href="javascript:void(0)"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>'

    pag_templete += '<li class="page-item" onclick="fetchAppliedJobsOfEmployerPosts(' + total_pages + ', ' + page_limit + ')" ' + (curr_page == total_pages ? 'disabled' : '') + '><a class="page-link" href="javascript:void(0)" data-toggle="tooltip" data-trigger="hover" title="Last"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>'

    $('select.custom-select > option[value="' + page_limit + '"]').attr('selected', 'selected')
    $('select.custom-select, .pagination').show()
    $('.pagination').append(pag_templete)
    $("[data-toggle='tooltip']").tooltip()
}