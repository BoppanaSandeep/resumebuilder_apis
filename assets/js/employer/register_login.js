var email_check = true;
var email_regx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
$(document).ready(function () {
    $('.toggle').on('click', function () {
        $('#employer_signup').css('display', 'block')
        $('.container').stop().addClass('active')
    })

    $('.close').on('click', function () {
        $("#employer_signup")[0].reset()
        $('#employer_signup').css('display', 'none')
        $('.container').stop().removeClass('active')
    })

    $('#employer_login').submit(function () {
        var error = false
        $('.error').remove()

        if ($.trim($('#email').val()) == '' || !email_regx.test($.trim($('#email').val()))) {
            error = true
            if ($.trim($('#email').val()) == '') {
                $('label[for="email"]').after('<span class="error pull-right">Enter your email.</span>')
            } else if (!email_regx.test($.trim($('#email').val()))) {
                $('label[for="email"]').after('<span class="error pull-right">Enter valid email.</span>')
            } else { }
        } else { }
        if ($.trim($('#pwd').val()) == '') {
            error = true
            $('label[for="pwd"]').after('<span class="error pull-right">Enter your password.</span>')
        }

        if (error == false) {
            return true
        } else {
            return false
        }
    })

    $('#employer_signup').submit(function () {
        var error = false
        $('.error').remove()

        if ($.trim($('#company_name').val()) == '') {
            error = true
            $('label[for="company_name"]').after('<span class="error pull-right">Enter your company name.</span>')
        }
        if ($.trim($('#company_email').val()) == '' || !email_regx.test($.trim($('#company_email').val())) || email_check == false) {
            error = true
            if ($.trim($('#company_email').val()) == '') {
                $('label[for="company_email"]').after('<span class="error pull-right">Enter your email.</span>')
            } else if (!email_regx.test($.trim($('#company_email').val()))) {
                $('label[for="company_email"]').after('<span class="error pull-right">Enter valid email.</span>')
            } else if (email_check == false) {
                $('label[for="company_email"]').after('<span class="error email_check pull-right">Email already exists.</span>')
            } else { }
        } else { }
        if ($.trim($('#employer_name').val()) == '') {
            error = true
            $('label[for="employer_name"]').after('<span class="error pull-right">Enter your employer name.</span>')
        }
        if ($.trim($('#contact_number').val()) == '') {
            error = true
            $('label[for="contact_number"]').after('<span class="error pull-right">Enter your contact number.</span>')
        }
        if ($.trim($('#contact_address').val()) == '') {
            error = true
            $('label[for="contact_address"]').after('<span class="error pull-right">Enter your contact address.</span>')
        }
        if ($.trim($('#password').val()) == '') {
            error = true
            $('label[for="password"]').after('<span class="error pull-right">Enter your password.</span>')
        }
        if ($.trim($('#confirm_password').val()) == '' || $.trim($('#confirm_password').val()) != $.trim($('#password').val())) {
            error = true
            if ($.trim($('#confirm_password').val()) == '') {
                $('label[for="confirm_password"]').after('<span class="error pull-right">Enter your confirm password.</span>')
            } else if ($.trim($('#confirm_password').val()) != $.trim($('#password').val())) {
                $('label[for="confirm_password"]').after('<span class="error pull-right">Confirm password is not matched with password.</span>')
            } else { }
        }
        if (error == false && email_check == true) {
            return true
        } else {
            return false
        }
    })
})

function VerifyEmail(email) {
    if ($.trim(email) != '' && email_regx.test($.trim(email))) {
        $.ajax({
            url: base_url + 'employer/EmployerRegistration/VerifyEmail',
            data: { "email": email },
            success: function (res) {
                //alert(res);
                if (res == 'exist') {
                    email_check = false;
                    $('label[for="company_email"]').after('<span class="error email_check pull-right">Email already exists.</span>')
                } else {
                    email_check = true;
                    $('.email_check').remove()
                }
            }
        })
    }
}