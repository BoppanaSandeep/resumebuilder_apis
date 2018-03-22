$(function() {
    fetchJobPosts()
})

function fetchJobPosts(page_number = 1) {
    var params = { page_number: page_number }
    $.get(base_url + 'employer/JobPosts/FetchJobPosts', params, function(data, status) {
        var data = $.parseJSON(data)
        console.log(data)
        if (data.message == 'OK') {
            var template = ''
            $.each(data.info, function(key, res) {
                // Accordion start
                template += '<div class="accordion" id="accordion-' + key + '">'
                    // Outer Card start
                template += '<div class="card border border-info">'
                    // Outer Card Header start
                template += '<div class="card-header row">'
                template += '<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"><a class="card-link" data-toggle="collapse" data-parent="#accordion-' + key + '" href="#collapse-' + key + '">Job Title: ' + res.job_title + '</a></div>'
                template += '<div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4"><span class="card-link small"><strong>' + (new Date(res.added_date)).toLocaleString('en-IN', { hour12: true, timeZone: 'Asia/Kolkata' }) + '</strong></span></div>'
                template += '<div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4"><span class="card-link actions"><i class="fa fa-circle text-success" title="Active"></i><i class="fa fa-pencil-square text-primary" title="Edit"></i><i class="fa fa-trash text-primary" title="Delete"></i></span></div>'
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
            AddPagination(data.total_count, page_number)
        } else {
            window.location.href = base_url
        }

        $('.accordion').click(function() {
            $(this).prevAll().find('.collapse.show').removeClass('show')
            $(this).nextAll().find('.collapse.show').removeClass('show')
        })
    })
}

function AddPagination(count, curr_page) {
    $('.pagination, .tooltip').children().remove()
    var limit = 20
    var pag_templete = ''
    var total_pages = Math.ceil(count / limit)
    var page_count_limit = 10

    if (total_pages > 10) {
        page_count_limit = (page_count_limit + curr_page) - 1
    } else {
        page_count_limit = total_pages
    }

    if (page_count_limit > total_pages) {
        page_count_limit = total_pages
    }

    console.log(count, total_pages)

    pag_templete += '<li class="page-item" onclick="fetchJobPosts(1)" data-toggle="tooltip" data-trigger="hover" title="First" ><a class="page-link" href="javascript:void(0)"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>'
    pag_templete += '<li class="page-item" onclick="fetchJobPosts(' + (curr_page == 1 ? 1 : curr_page - 1) + ')" data-toggle="tooltip" data-trigger="hover" title="Previous"><a class="page-link" href="javascript:void(0)"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>'

    for (var i = curr_page; i <= page_count_limit; i++) {
        pag_templete += '<li class="page-item ' + (curr_page == i ? 'active' : '') + '" onclick="fetchJobPosts(' + i + ')"><a class="page-link" href="javascript:void(0)">' + i + '</a></li>'
    }

    pag_templete += '<li class="page-item" onclick="fetchJobPosts(' + (curr_page == total_pages ? total_pages : curr_page + 1) + ')" data-toggle="tooltip" data-trigger="hover" title="Next"><a class="page-link" href="javascript:void(0)"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>'
    pag_templete += '<li class="page-item" onclick="fetchJobPosts(' + total_pages + ')"><a class="page-link" href="javascript:void(0)" data-toggle="tooltip" data-trigger="hover" title="Last"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>'

    $('.pagination').append(pag_templete)
    $("[data-toggle='tooltip']").tooltip()
}