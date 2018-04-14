$(function () {
    fetchEmployees(1, 10)
    $('select.custom-select').hide()
    $("[data-toggle='tooltip']").tooltip()
    $("#search").click(function () {
        if ($.trim($("#skills").val()) != '' || $.trim($("#position").val()) != '' || $.trim($("#experience").val()) != '' || $.trim($("#location").val()) != '') {
            fetchEmployees(1, 10);
        } else {
            demo.showNotification('top', 'center', 'Enter any one field to search.', 'fa fa-exclamation', '1000', 'danger')
        }
    });
})

function fetchEmployees(page_number = 1, page_limit = 10) {
    $('.loader, .page-loader').show()
    var serarch = 'Job Posts';
    if ($.trim($("#skills").val()) != '' || $.trim($("#position").val()) != '' || $.trim($("#experience").val()) != '' || $.trim($("#location").val()) != '') {
        var params = { page_number: page_number, page_limit: page_limit, skills: $.trim($("#skills").val()), position: $.trim($("#position").val()), experience: $.trim($("#experience").val()), location: $.trim($("#location").val()) }
        var url = base_url + 'employer/SearchEmployees/FetchEmployeesAsPerSearch'
        serarch = 'Search';
    } else {
        var params = { page_number: page_number, page_limit: page_limit }
        var url = base_url + 'employer/SearchEmployees/FetchEmployees'
    }
    $.get(url, params, function (data, status) {
        var data = $.parseJSON(data)
        // console.log(data, data.info.length)
        var template = ''
        if (data.message == 'OK' && data.info.length > 0) {
            $.each(data.info, function (key, res) {
                template += '<div class="card col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">'
                template += '<div class="card-body row">'
                template += '<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4"><img class="rounded-circle" src="' + base_url + res.profile_image + '" alt="Image"></div>'
                template += '<div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8"><h6 class="card-title">' + res.name + '</h6><small class="card-subtitle mb-2 text-muted">' + res.exp_role + '</small></div>'
                template += '<blockquote class="col-12 blockquote mb-0"><p class="card-text">' + res.skills + '</p><footer class="blockquote-footer">Skills</footer></blockquote>'
                template += '<blockquote class="col-12 blockquote mb-0"><p class="card-text">' + res.exp_job_desc + '.</p><footer class="blockquote-footer">Current Job Descrpition</footer></blockquote>'
                template += '</div>'
                template += '<div class="card-footer"><a href="#" class="card-link">Contact Details</a><a href="#" class="card-link">View More</a></div>'
                template += '</div>'
            })
            $('.append_employees').children().remove()
            $('.append_employees').append(template)
            $('.search_result').html('Displaying data related to your '+serarch+'.')
            AddPagination(data.count, page_number, page_limit)
            $('.loader').fadeOut()
            $('.page-loader').delay(350).fadeOut('slow')
            window.location.href = '#top'
            window.history.pushState('', 'Resume Builder', 'search_employees')
        } else {
            template += '<div class="card">'
            template += '<div class="card-body text-danger d-flex justify-content-center"><strong>We are unable to find data related to your '+serarch+', try by using different search.</strong></div>'
            template += '</div>'
            $('.append_employees').children().remove()
            $('.append_employees').append(template)
            $('.loader').fadeOut()
            $('.page-loader').delay(350).fadeOut('slow')
            window.location.href = '#top'
            window.history.pushState('', 'Resume Builder', 'search_employees')
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

    pag_templete += '<li class="page-item" onclick="fetchEmployees(1, ' + page_limit + ')" data-toggle="tooltip" data-trigger="hover" title="First" ' + (curr_page == 1 ? 'disabled' : '') + '><a class="page-link" href="javascript:void(0)"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>'

    pag_templete += '<li class="page-item" onclick="fetchEmployees(' + (curr_page == 1 ? 1 : curr_page - 1) + ', ' + page_limit + ')" data-toggle="tooltip" data-trigger="hover" title="Previous" ' + (curr_page == 1 ? 'disabled' : '') + '><a class="page-link" href="javascript:void(0)"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>'

    for (var i = curr_page_count; i <= page_count_limit; i++) {
        pag_templete += '<li class="page-item ' + (curr_page == i ? 'active' : '') + '" onclick="fetchEmployees(' + i + ', ' + page_limit + ')"><a class="page-link" href="javascript:void(0)">' + i + '</a></li>'
    }

    pag_templete += '<li class="page-item" onclick="fetchEmployees(' + (curr_page == total_pages ? total_pages : curr_page + 1) + ', ' + page_limit + ')" data-toggle="tooltip" data-trigger="hover" title="Next" ' + (curr_page == total_pages ? 'disabled' : '') + '><a class="page-link" href="javascript:void(0)"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>'

    pag_templete += '<li class="page-item" onclick="fetchEmployees(' + total_pages + ', ' + page_limit + ')" ' + (curr_page == total_pages ? 'disabled' : '') + '><a class="page-link" href="javascript:void(0)" data-toggle="tooltip" data-trigger="hover" title="Last"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>'

    $('select.custom-select > option[value="' + page_limit + '"]').attr('selected', 'selected')
    $('select.custom-select').show()
    $('.pagination').append(pag_templete)
    $("[data-toggle='tooltip']").tooltip()
}