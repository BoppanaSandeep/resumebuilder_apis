var email_regx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

$(function() {
    $('.job_opening_date, .job_closing_date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        startDate: new Date(),
        todayHighlight: true
    })

    $('#job_posts').submit(function() {
        var error = false
        $('input').removeClass('error2')

        if ($.trim($('input[name="job_title"]')[0].value) == '') {
            error = true
            $('input[name="job_title"]')[0].className += ' error2'
        }

        if ($.trim($('input[name="job_position"]')[0].value) == '') {
            error = true
            $('input[name="job_position"]')[0].className += ' error2'
        }

        if ($.trim($('textarea[name="job_description"]')[0].value) == '') {
            error = true
            $('textarea[name="job_description"]')[0].className += ' error2'
        }

        if ($.trim($('input[name="skills_req"]')[0].value) == '') {
            error = true
            $('input[name="skills_req"]')[0].className += ' error2'
        }

        if ($.trim($('input[name="job_opening_date"]')[0].value) == '') {
            error = true
            $('input[name="job_opening_date"]')[0].className += ' error2'
        }

        if ($.trim($('input[name="job_closing_date"]')[0].value) == '') {
            error = true
            $('input[name="job_closing_date"]')[0].className += ' error2'
        }

        if ($.trim($('input[name="contact_email"]')[0].value) == '' || !email_regx.test($.trim($('input[name="contact_email"]')[0].value))) {
            error = true
            $('input[name="contact_email"]')[0].className += ' error2'
        }

        if ($.trim($('input[name="contact_number"]')[0].value) == '' || $('input[name="contact_number"]')[0].value.toString().length < 10 || $('input[name="contact_number"]')[0].value.toString().length > 12) {
            error = true
            $('input[name="contact_number"]')[0].className += ' error2'
        }

        if ($.trim($('input[name="address"]')[0].value) == '') {
            error = true
            $('input[name="address"]')[0].className += ' error2'
        }

        if ($.trim($('input[name="city"]')[0].value) == '') {
            error = true
            $('input[name="city"]')[0].className += ' error2'
        }

        if ($.trim($('input[name="state"]')[0].value) == '') {
            error = true
            $('input[name="state"]')[0].className += ' error2'
        }

        if ($.trim($('input[name="country"]')[0].value) == '') {
            error = true
            $('input[name="country"]')[0].className += ' error2'
        }

        if (error == false) {
            return true
        } else {
            return false
        }
    })
})