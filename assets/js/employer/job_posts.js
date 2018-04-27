var job_posts_card = ''
var email_regx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

$(function() {
    job_posts_card = $('.append_multiple').first().html()
    $('.fa-minus').hide()
        // console.log(job_posts_card)

    $('.job_opening_date, .job_closing_date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        startDate: new Date(),
        todayHighlight: true
    })

    $('textarea[name="job_description[]"]').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize', 'color']],
            ['para', ['ul', 'ol', 'paragraph', 'height']],
            ['link', ['linkDialogShow', 'unlink', 'table', 'hr']],
            ['Misc', ['fullscreen']]
        ],
        height: 200
    });

    $("#job_posts").submit(function() {
        var error = false
        $('input').removeClass('error2');
        //console.log($('.append_multiple').children().length);

        for (var i = 0; i < $('.append_multiple').children().length; i++) {
            if ($.trim($('input[name="job_title[]"]')[i].value) == '') {
                error = true
                $('input[name="job_title[]"]')[i].className += ' error2'
            }

            if ($.trim($('input[name="job_position[]"]')[i].value) == '') {
                error = true
                $('input[name="job_position[]"]')[i].className += ' error2'
            }

            if ($.trim($('textarea[name="job_description[]"]')[i].value) == '') {
                error = true
                $('textarea[name="job_description[]"]')[i].className += ' error2'
            }

            if ($.trim($('input[name="skills_req[]"]')[i].value) == '') {
                error = true
                $('input[name="skills_req[]"]')[i].className += ' error2'
            }

            if ($.trim($('input[name="job_opening_date[]"]')[i].value) == '') {
                error = true
                $('input[name="job_opening_date[]"]')[i].className += ' error2'
            }

            if ($.trim($('input[name="job_closing_date[]"]')[i].value) == '') {
                error = true
                $('input[name="job_closing_date[]"]')[i].className += ' error2'
            }

            if ($.trim($('input[name="contact_email[]"]')[i].value) == '' || !email_regx.test($.trim($('input[name="contact_email[]"]')[i].value))) {
                error = true
                $('input[name="contact_email[]"]')[i].className += ' error2'
            }

            if ($.trim($('input[name="contact_number[]"]')[i].value) == '' || $('input[name="contact_number[]"]')[i].value.toString().length < 10 || $('input[name="contact_number[]"]')[i].value.toString().length > 12) {
                error = true
                $('input[name="contact_number[]"]')[i].className += ' error2'
            }

            if ($.trim($('input[name="address[]"]')[i].value) == '') {
                error = true
                $('input[name="address[]"]')[i].className += ' error2'
            }

            if ($.trim($('input[name="city[]"]')[i].value) == '') {
                error = true
                $('input[name="city[]"]')[i].className += ' error2'
            }

            if ($.trim($('input[name="state[]"]')[i].value) == '') {
                error = true
                $('input[name="state[]"]')[i].className += ' error2'
            }

            if ($.trim($('input[name="country[]"]')[i].value) == '') {
                error = true
                $('input[name="country[]"]')[i].className += ' error2'
            }
        }

        if (error == false) {
            return true
        } else {
            return false
        }
    })
})

function add() {
    $('.append_multiple').append(job_posts_card)
    $('.job_opening_date, .job_closing_date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        startDate: new Date(),
        todayHighlight: true
    })
    $('textarea[name="job_description[]"]').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize', 'color']],
            ['para', ['ul', 'ol', 'paragraph', 'height']],
            ['link', ['linkDialogShow', 'unlink', 'table', 'hr']],
            ['Misc', ['fullscreen']]
        ],
        height: 200
    });
    if ($('.append_multiple').children().length > 1) {
        $('.append_multiple .fa-plus:not(:last)').hide()
        $('.append_multiple .fa-minus:not(:last)').show()
    }
}

function remove(event) {
    // console.log($(event).closest('.col-md-6'))
    $(event).closest('.col-md-6').remove()
    if ($('.append_multiple').children().length < 2) {
        $('.append_multiple').children().find('.fa-minus').hide()
        $('.append_multiple').children().find('.fa-plus').show()
    } else {
        $('.append_multiple').children().last().find('.fa-plus').show()
    }
}