$(function() {
    fetchEmployees(1, 10)
    $('select.custom-select').hide()
    $("[data-toggle='tooltip']").tooltip()
})

function fetchEmployees(page_number = 1, page_limit = 10) {
    $('.loader, .page-loader').show()
    var params = { page_number: page_number, page_limit: page_limit }
    $.get(base_url + 'employer/SearchEmployees/FetchEmployees', params, function(data, status) {
        var data = $.parseJSON(data)
            // console.log(data, data.info.length)
        var template = ''
        if (data.message == 'OK' && data.info.length > 0) {
            $.each(data.info, function(key, res) {})
                // $('.append_jobposts').children().remove()
                // $('.append_jobposts').append(template)
                // AddPagination(data.total_count, page_number, page_limit)
            $('.loader').fadeOut()
            $('.page-loader').delay(350).fadeOut('slow')
                // window.location.href = '#top'
                // window.history.pushState('', 'Resume Builder', 'job_posts_view')
        } else {
            // template += '<div class="card">'
            // template += '<div class="card-body text-danger d-flex justify-content-center"><strong>No Posts</strong></div>'
            // template += '</div>'
            //$('.append_jobposts').append(template)
            $('.loader').fadeOut()
            $('.page-loader').delay(350).fadeOut('slow')
        }

        $('.accordion').click(function() {
            $(this).prevAll().find('.collapse.show').removeClass('show')
            $(this).nextAll().find('.collapse.show').removeClass('show')
        })
    })
}

function AddPagination(count, curr_page, page_limit) {
    $('.pagination, .tooltip').children().remove()
    var pag_templete = ''
    var total_pages = Math.ceil(count / page_limit)
    var page_num_limits = 5
    var page_count_limit = page_num_limits
    var curr_page_count = curr_page

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