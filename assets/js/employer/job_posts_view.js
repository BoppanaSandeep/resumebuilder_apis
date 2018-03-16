$(function() {
    fetchJobPosts()
})

function fetchJobPosts() {
    var params = '';
    $.get(base_url + 'employer/JobPosts/FetchJobPosts', params, function(data, status) {
        var data = $.parseJSON(data)
        console.log(data)
        if (data.message == 'OK') {
            var template = '';
            $.each(data.info, function(key, res) {
                //Accordion start
                template += '<div class="accordion" id="accordion-' + key + '">';
                //Outer Card start
                template += '<div class="card border border-info">';
                //Outer Card Header start
                template += '<div class="card-header">';
                template += '<a class="card-link" data-toggle="collapse" data-parent="#accordion-' + key + '" href="#collapse-' + key + '">Job Title: ' + res.job_title + '</a>';
                template += '<span class="card-link small pull-right"><strong>' + (new Date(res.added_date)).toLocaleString('en-IN', { hour12: false, timeZone: 'Asia/Kolkata' }) + '</strong></span>';
                template += '</div>'; //.toLocaleDateString("en-US", { timeZone: "Asia/Kolkata" })
                //Outer Card Header end
                //Collapse start
                template += '<div id="collapse-' + key + '" class="collapse">';
                //Card body and row start
                template += '<div class="card-body"><div class="row header-color">';
                //Inner cards start
                template += '<div class="col-12 col-sm-12 col-md-12 col-lg-12">';
                template += '<div class="card-body actions"><i class="fa fa-circle text-success" title="Active"></i><i class="fa fa-pencil-square text-primary" title="Edit"></i><i class="fa fa-trash text-primary" title="Delete"></i></div>';
                template += '</div>';
                template += '<div class="col-12 col-sm-12 col-md-6 col-lg-4"><div class="card">';
                template += '<div class="card-header">Job Position</div>';
                template += '<div class="card-body">' + res.job_position + '</div>';
                template += '</div></div>';
                template += '<div class="col-12 col-sm-12 col-md-6 col-lg-4"><div class="card">';
                template += '<div class="card-header">Job Opening Date</div>';
                template += '<div class="card-body">' + (new Date(res.job_opening_date)).toLocaleDateString('en-IN') + '</div>';
                template += '</div></div>';
                template += '<div class="col-12 col-sm-12 col-md-6 col-lg-4"><div class="card">';
                template += '<div class="card-header">Job Closing Date</div>';
                template += '<div class="card-body">' + (new Date(res.job_closing_date)).toLocaleDateString('en-IN') + '</div>';
                template += '</div></div>';
                template += '<div class="col-12 col-sm-12 col-md-12 col-lg-12"><div class="card">';
                template += '<div class="card-header">Job Description</div>';
                template += '<div class="card-body">' + res.job_description + '</div>';
                template += '</div></div>';
                template += '<div class="col-12 col-sm-12 col-md-12 col-lg-12"><div class="card">';
                template += '<div class="card-header">Skills Required</div>';
                template += '<div class="card-body">' + res.skills_req + '</div>';
                template += '</div></div>';
                template += '<div class="col-12 col-sm-12 col-md-6 col-lg-4"><div class="card">';
                template += '<div class="card-header">Contact Email</div>';
                template += '<div class="card-body">' + res.contact_email + '</div>';
                template += '</div></div>';
                template += '<div class="col-12 col-sm-12 col-md-6 col-lg-4"><div class="card">';
                template += '<div class="card-header">Contact Number</div>';
                template += '<div class="card-body">' + res.contact_number + '</div>';
                template += '</div></div>';
                template += '<div class="col-12 col-sm-12 col-md-6 col-lg-4"><div class="card">';
                template += '<div class="card-header">Contact Address</div>';
                template += '<div class="card-body">' + res.address + '</div>';
                template += '</div></div>';
                //Inner cards end
                template += '</div></div>';
                //Card body and row end
                template += '</div>';
                //Collapse end
                template += '</div>';
                //Outer Card end
                template += '</div>';
                //Accordion end
            })
            $(".append_jobposts").append(template);
        } else {
            window.location.href = base_url;
        }
    })
}

/* <div class="accordion" id="accordion">
    <div class="card border border-info">
        <div class="card-header">
            <a class="card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Job Title
            </a>
        </div>
        <div id="collapseOne" class="collapse">
            <div class="card-body">
                <div class="row header-color">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-header">Job Position</div>
                            <div class="card-body">Content</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> */