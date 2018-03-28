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
            $.each(data.info, function(key, res) {
                template += '<div class="card col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">'
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
            $('.search_result').html('Displaying data related to your Job Posts.')
            AddPagination(data.count, page_number, page_limit)
            $('.loader').fadeOut()
            $('.page-loader').delay(350).fadeOut('slow')
            window.location.href = '#top'
            window.history.pushState('', 'Resume Builder', 'search_employees')
        } else {
            template += '<div class="card">'
            template += '<div class="card-body text-danger d-flex justify-content-center"><strong>We are unable to found data related to your Job Posts/ Search, try by using search.</strong></div>'
            template += '</div>'
            $('.append_employees').append(template)
            $('.loader').fadeOut()
            $('.page-loader').delay(350).fadeOut('slow')
        }
    })
}

/* <div class="card col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
    <div class="card-body row">
        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <img class="rounded-circle" src="<?php echo base_url(); ?>profile_imgs/profile-default.png" alt="Card image cap">
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <h6 class="card-title">Boppana Sandeep</h6>
            <h6 class="card-subtitle mb-2 text-muted">Developer</h6>
        </div>
        <blockquote class="blockquote mb-0">
            <p class="card-text">Android, HTML, Javascript, Photoshop, PHP, SQLite</p>
            <footer class="blockquote-footer">Skills</footer>
        </blockquote>
        <blockquote class="blockquote mb-0">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <footer class="blockquote-footer">Current Job Descrpition</footer>
        </blockquote>
        <a href="#" class="card-link float-right">Contact Details</a>
        <a href="#" class="card-link float-right">View More</a>
    </div>
</div> */

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