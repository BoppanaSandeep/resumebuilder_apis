$(function () {
    fetchJobPosts(1, 10)
    $("[data-toggle='tooltip']").tooltip()

    // var encrypted = CryptoJS.AES.encrypt('Message', 'S@ndeep57', 'cfg')
    // var decrypted = CryptoJS.AES.decrypt(encrypted, 'S@ndeep57', 'cfg')
    // console.log(decrypted)
})

function fetchJobPosts(page_number = 1, page_limit = 10) {
    $('.loader, .page-loader').show()
    var params = { page_number: page_number, page_limit: page_limit }
    $.get(base_url + 'employer/JobPosts/FetchJobPosts', params, function (data, status) {
        var data = $.parseJSON(data)
        //console.log(data, data.info.length)
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
            $('.append_jobposts').append(template)
            $('.loader').fadeOut()
            $('.page-loader').delay(350).fadeOut('slow')
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
        //console.log(data, data.info.length)
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

}

function DeletePost(postid, post_status, page_number, page_limit) {
    var params = { postid: postid, type: 'del', post_status: post_status }
    $.post(base_url + 'employer/JobPosts/UpdatingPostStatus', params, function (data, status) {
        var data = $.parseJSON(data)
        //console.log(data, data.info.length)
        if (data.message == 'OK') {
            demo.showNotification('top', 'center', 'Post was deleted', 'fa fa-exclamation', '1000', 'danger')
        } else {
            demo.showNotification('top', 'center', 'Something went wrong, try again!', 'fa fa-exclamation', '1000', 'danger')
        }
        fetchJobPosts(page_number, page_limit)
    })
}