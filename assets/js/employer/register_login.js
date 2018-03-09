$(document).ready(function() {
    $('.toggle').on('click', function() {
        $('#employer_signup').css('display', 'block')
        $('.container').stop().addClass('active')
    })

    $('.close').on('click', function() {
        $('#employer_signup').css('display', 'none')
        $('.container').stop().removeClass('active')
    })

    $('#employer_login').submit(function() {
        var error = false
        $('.error').remove()
        var email_regx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

        if ($('#email').val() == '' || $.trim($('#email').val()) == '' || !email_regx.test($.trim($('#email').val()))) {
            error = true
            if ($('#email').val() == '') {
                $('label[for="email"]').after('<span class="error pull-right">Enter your email.</span>')
            } else if ($.trim($('#email').val()) == '') {
                $('label[for="email"]').after('<span class="error pull-right">Enter your email.</span>')
            } else if (!email_regx.test($.trim($('#email').val()))) {
                $('label[for="email"]').after('<span class="error pull-right">Enter valid email.</span>')
            } else {}
        } else {}
        if ($('#pwd').val() == '' || $.trim($('#pwd').val()) == '') {
            error = true
            if ($('#pwd').val() == '') {
                $('label[for="pwd"]').after('<span class="error pull-right">Enter your password.</span>')
            } else if ($.trim($('#pwd').val()) == '') {
                $('label[for="pwd"]').after('<span class="error pull-right">Enter your password.</span>')
            } else {}
        }

        if (error == false) {
            return true
        } else {
            return false
        }
    })

    $('#employer_signup').submit(function() {
        var error = false
        $('.error').remove()
        var email_regx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

        if ($('#company_name').val() == '' || $.trim($('#company_name').val()) == '') {
            error = true
            if ($('#company_name').val() == '') {
                $('label[for="company_name"]').after('<span class="error pull-right">Enter your company name.</span>')
            } else if ($.trim($('#company_name').val()) == '') {
                $('label[for="company_name"]').after('<span class="error pull-right">Enter your company name.</span>')
            } else {}
        }
        if ($('#company_email').val() == '' || $.trim($('#company_email').val()) == '' || !email_regx.test($.trim($('#company_email').val()))) {
            error = true
            if ($('#company_email').val() == '') {
                $('label[for="company_email"]').after('<span class="error pull-right">Enter your email.</span>')
            } else if ($.trim($('#company_email').val()) == '') {
                $('label[for="company_email"]').after('<span class="error pull-right">Enter your email.</span>')
            } else if (!email_regx.test($.trim($('#company_email').val()))) {
                $('label[for="company_email"]').after('<span class="error pull-right">Enter valid email.</span>')
            } else {}
        } else {}
        if ($('#employer_name').val() == '' || $.trim($('#employer_name').val()) == '') {
            error = true
            if ($('#employer_name').val() == '') {
                $('label[for="employer_name"]').after('<span class="error pull-right">Enter your employer name.</span>')
            } else if ($.trim($('#employer_name').val()) == '') {
                $('label[for="employer_name"]').after('<span class="error pull-right">Enter your employer name.</span>')
            } else {}
        }
        if ($('#contact_number').val() == '' || $.trim($('#contact_number').val()) == '') {
            error = true
            if ($('#contact_number').val() == '') {
                $('label[for="contact_number"]').after('<span class="error pull-right">Enter your contact number.</span>')
            } else if ($.trim($('#contact_number').val()) == '') {
                $('label[for="contact_number"]').after('<span class="error pull-right">Enter your contact number.</span>')
            } else {}
        }
        if ($('#contact_address').val() == '' || $.trim($('#contact_address').val()) == '') {
            error = true
            if ($('#contact_address').val() == '') {
                $('label[for="contact_address"]').after('<span class="error pull-right">Enter your contact address.</span>')
            } else if ($.trim($('#contact_address').val()) == '') {
                $('label[for="contact_address"]').after('<span class="error pull-right">Enter your contact address.</span>')
            } else {}
        }
        if ($('#password').val() == '' || $.trim($('#password').val()) == '') {
            error = true
            if ($('#password').val() == '') {
                $('label[for="password"]').after('<span class="error pull-right">Enter your password.</span>')
            } else if ($.trim($('#password').val()) == '') {
                $('label[for="password"]').after('<span class="error pull-right">Enter your password.</span>')
            } else {}
        }
        if ($('#confirm_password').val() == '' || $.trim($('#confirm_password').val()) == '' || $.trim($('#confirm_password').val()) != $.trim($('#password').val())) {
            error = true
            if ($('#confirm_password').val() == '') {
                $('label[for="confirm_password"]').after('<span class="error pull-right">Enter your confirm password.</span>')
            } else if ($.trim($('#confirm_password').val()) == '') {
                $('label[for="confirm_password"]').after('<span class="error pull-right">Enter your confirm password.</span>')
            } else if ($.trim($('#confirm_password').val()) != $.trim($('#password').val())) {
                $('label[for="confirm_password"]').after('<span class="error pull-right">Confirm password is not matched with password.</span>')
            } else {}
        }
        if (error == false) {
            return true
        } else {
            return false
        }
    })
})