$(function () {
    fetchJobPosts(1, 10)
    $('select.custom-select').hide()
    $("[data-toggle='tooltip']").tooltip()
    $('#fromdate, #todate').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true
    })
    $("#search").click(function () {
        if ($.trim($("#job_title").val()) != '' || $.trim($("#job_position").val()) != '' || $.trim($("#fromdate").val()) != '' || $.trim($("#todate").val()) != '' || $.trim($("#location").val()) != '') {
            fetchJobPosts(1, 10);
        } else {
            demo.showNotification('top', 'center', 'Enter any one field to search.', 'fa fa-exclamation', '1000', 'danger')
        }
    });
    $("#clear").click(function () {
        $(".search_fields input").val('');
        fetchJobPosts(1, 10);
    })
})

function fetchJobPosts(page_number = 1, page_limit = 10) {
    $('.loader, .page-loader').show()
    if ($.trim($("#job_title").val()) != '' || $.trim($("#job_position").val()) != '' || $.trim($("#fromdate").val()) != '' || $.trim($("#todate").val()) != '' || $.trim($("#location").val()) != '') {
        var params = { page_number: page_number, page_limit: page_limit, job_title: $.trim($("#job_title").val()), job_position: $.trim($("#job_position").val()), fromdate: $.trim($("#fromdate").val()), todate: $.trim($("#todate").val()), location: $.trim($("#location").val()) }
    } else {
        var params = { page_number: page_number, page_limit: page_limit }
    }
    $.get(base_url + 'employer/JobPosts/FetchJobPosts', params, function (data, status) {
        var data = $.parseJSON(data)
        // console.log(data, data.info.length)
        var template = ''
        if (data.message == 'OK' && data.info.length > 0) {
            $.each(data.info, function (key, res) {
                var title = res.post_status == 1 ? 'Active' : 'Inactive'
                var active_color = res.post_status == 1 ? 'text-success' : 'text-danger'
                // Accordion start
                template += '<div class="accordion" id="accordion-' + key + '">'
                // Outer Card start
                template += '<div class="card border border-info">'
                // Outer Card Header start
                template += '<div class="card-header row">'
                template += '<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"><a class="card-link" data-toggle="collapse" data-parent="#accordion-' + key + '" href="#collapse-' + key + '">Job Title: ' + res.job_title + '</a></div>'
                template += '<div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4"><span class="card-link small"><strong>' + (new Date(res.added_date)).toLocaleString('en-IN', { hour12: true, timeZone: 'Asia/Kolkata' }) + '</strong></span></div>'
                template += '<div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4"><span class="card-link actions"><i class="fa fa-circle ' + active_color + '" title="' + title + '" onclick="ActiveInactivePost(' + res.post_id + ', ' + res.post_status + ', ' + page_number + ', ' + page_limit + ')"></i><i class="fa fa-pencil-square text-primary" title="Edit" onclick="EditPost(' + res.post_id + ', ' + page_number + ', ' + page_limit + ')"></i><i class="fa fa-trash text-primary" title="Delete" onclick="DeletePost(' + res.post_id + ', ' + res.post_status + ', ' + page_number + ', ' + page_limit + ')"></i></span></div>'
                template += '</div>'
                // Outer Card Header end
                // Collapse start
                template += '<div id="collapse-' + key + '" class="collapse">'
                // Card body and row start
                template += '<div class="card-body"><div class="row header-color">'
                // Inner cards start
                template += '<div class="col-12 col-sm-12 col-md-6 col-lg-4"><div class="card">'
                template += '<div class="card-header">Job Position</div>'
                template += '<div class="card-body">' + res.job_position + '</div>'
                template += '</div></div>'
                template += '<div class="col-12 col-sm-12 col-md-6 col-lg-4"><div class="card">'
                template += '<div class="card-header">Job Opening Date</div>'
                template += '<div class="card-body">' + (new Date(res.job_opening_date)).toLocaleDateString('en-IN') + '</div>'
                template += '</div></div>'
                template += '<div class="col-12 col-sm-12 col-md-6 col-lg-4"><div class="card">'
                template += '<div class="card-header">Job Closing Date</div>'
                template += '<div class="card-body">' + (new Date(res.job_closing_date)).toLocaleDateString('en-IN') + '</div>'
                template += '</div></div>'
                template += '<div class="col-12 col-sm-12 col-md-12 col-lg-12"><div class="card">'
                template += '<div class="card-header">Job Description</div>'
                template += '<div class="card-body">' + res.job_description + '</div>'
                template += '</div></div>'
                template += '<div class="col-12 col-sm-12 col-md-12 col-lg-12"><div class="card">'
                template += '<div class="card-header">Skills Required</div>'
                template += '<div class="card-body">' + res.skills_req + '</div>'
                template += '</div></div>'
                template += '<div class="col-12 col-sm-12 col-md-6 col-lg-4"><div class="card">'
                template += '<div class="card-header">Contact Email</div>'
                template += '<div class="card-body">' + res.contact_email + '</div>'
                template += '</div></div>'
                template += '<div class="col-12 col-sm-12 col-md-6 col-lg-4"><div class="card">'
                template += '<div class="card-header">Contact Number</div>'
                template += '<div class="card-body">' + res.contact_number + '</div>'
                template += '</div></div>'
                template += '<div class="col-12 col-sm-12 col-md-6 col-lg-4"><div class="card">'
                template += '<div class="card-header">Contact Address</div>'
                template += '<div class="card-body">' + res.address + '</div>'
                template += '</div></div>'
                // Inner cards end
                template += '</div></div>'
                // Card body and row end
                template += '</div>'
                // Collapse end
                template += '</div>'
                // Outer Card end
                template += '</div>'
                // Accordion end
            })
            $('.append_jobposts').children().remove()
            $('.append_jobposts').append(template)
            AddPagination(data.total_count, page_number, page_limit)
            $('.loader').fadeOut()
            $('.page-loader').delay(350).fadeOut('slow')
            window.location.href = '#top'
            window.history.pushState('', 'Resume Builder', 'job_posts_view')
        } else {
            template += '<div class="card">'
            template += '<div class="card-body text-danger d-flex justify-content-center"><strong>No Posts</strong></div>'
            template += '</div>'
            $('.append_jobposts').children().remove()
            $('.append_jobposts').append(template)
            $('select.custom-select, .pagination').hide()
            $('.loader').fadeOut()
            $('.page-loader').delay(350).fadeOut('slow')
            window.location.href = '#top'
            window.history.pushState('', 'Resume Builder', 'job_posts_view')
        }

        $('.accordion').click(function () {
            $(this).prevAll().find('.collapse.show').removeClass('show')
            $(this).nextAll().find('.collapse.show').removeClass('show')
        })
    })
}

function ActiveInactivePost(postid, post_status, page_number, page_limit) {
    var params = { postid: postid, type: 'act-inact', post_status: post_status }
    $.post(base_url + 'employer/JobPosts/UpdatingPostStatus', params, function (data, status) {
        var data = $.parseJSON(data)
        // console.log(data, data.info.length)
        if (data.message == 'OK') {
            var act = post_status == 1 ? 'inactive' : 'active'
            demo.showNotification('top', 'center', 'Post was ' + act, 'fa fa-exclamation', '1000', 'info')
        } else {
            demo.showNotification('top', 'center', 'Something went wrong, try again!', 'fa fa-exclamation', '1000', 'danger')
        }
        fetchJobPosts(page_number, page_limit)
    })
}

function EditPost(postid, page_number, page_limit) {
    window.location.href = base_url + 'Dashboard/EditJobPost?postid=' + btoa(postid)
}

function DeletePost(postid, post_status, page_number, page_limit) {
    var params = { postid: postid, type: 'del', post_status: post_status }
    $.post(base_url + 'employer/JobPosts/UpdatingPostStatus', params, function (data, status) {
        var data = $.parseJSON(data)
        // console.log(data, data.info.length)
        if (data.message == 'OK') {
            demo.showNotification('top', 'center', 'Post was deleted', 'fa fa-exclamation', '1000', 'danger')
        } else {
            demo.showNotification('top', 'center', 'Something went wrong, try again!', 'fa fa-exclamation', '1000', 'danger')
        }
        fetchJobPosts(page_number, page_limit)
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

    pag_templete += '<li class="page-item" onclick="fetchJobPosts(1, ' + page_limit + ')" data-toggle="tooltip" data-trigger="hover" title="First" ' + (curr_page == 1 ? 'disabled' : '') + '><a class="page-link" href="javascript:void(0)"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>'

    pag_templete += '<li class="page-item" onclick="fetchJobPosts(' + (curr_page == 1 ? 1 : curr_page - 1) + ', ' + page_limit + ')" data-toggle="tooltip" data-trigger="hover" title="Previous" ' + (curr_page == 1 ? 'disabled' : '') + '><a class="page-link" href="javascript:void(0)"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>'

    for (var i = curr_page_count; i <= page_count_limit; i++) {
        pag_templete += '<li class="page-item ' + (curr_page == i ? 'active' : '') + '" onclick="fetchJobPosts(' + i + ', ' + page_limit + ')"><a class="page-link" href="javascript:void(0)">' + i + '</a></li>'
    }

    pag_templete += '<li class="page-item" onclick="fetchJobPosts(' + (curr_page == total_pages ? total_pages : curr_page + 1) + ', ' + page_limit + ')" data-toggle="tooltip" data-trigger="hover" title="Next" ' + (curr_page == total_pages ? 'disabled' : '') + '><a class="page-link" href="javascript:void(0)"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>'

    pag_templete += '<li class="page-item" onclick="fetchJobPosts(' + total_pages + ', ' + page_limit + ')" ' + (curr_page == total_pages ? 'disabled' : '') + '><a class="page-link" href="javascript:void(0)" data-toggle="tooltip" data-trigger="hover" title="Last"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>'

    $('select.custom-select > option[value="' + page_limit + '"]').attr('selected', 'selected')
    $('select.custom-select, .pagination').show()
    $('.pagination').append(pag_templete)
    $("[data-toggle='tooltip']").tooltip()
}
