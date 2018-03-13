var email_check = true
var email_regx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
var input_val = ''
$(document).ready(function() {
    $('input, textarea').prop('disabled', true)
    $('.fa-save, .fa-close, input[name="company_logo"]').hide()

    getProfileDetails()

    $('input, textarea').focus(function() {
        input_val = $(this).val()
    })

    $('input, textarea').blur(function() {
        if ($.trim($(this).val()) == '') {
            $(this).val(input_val)
        }
    })

    $('.imgupload').click(function() {
        if ($("input[name='company_logo']").prop('disabled')) {
            $("input[name='company_logo']").show().prop('disabled', false)
        } else {
            $("input[name='company_logo']").val('').hide().prop('disabled', true)
        }
    })

    $('input[name=company_logo]').on('change', UpdateProfileImage)
})

function getProfileDetails() {
    $.ajax({
        url: base_url + 'employer/EmployerRegistration/getProfileDetails',
        data: { 'emp_rb_id': session_emp_rbid },
        success: function(res) {
            var data = $.parseJSON(res)
                // console.log(data.info)
            $('#company').val(data.info[0].emp_company)
            $('.company_name').html(data.info[0].emp_company)
            $('#emp_name').val(data.info[0].emp_name)
            $('#email').val(data.info[0].emp_email)
            $('#first_name').val(data.info[0].emp_first_name)
            $('#last_name').val(data.info[0].emp_last_name)
            $('#contact_number').val(data.info[0].emp_contact_num)
            $('#address').val(data.info[0].emp_address)
            $('#city').val(data.info[0].emp_city)
            $('#country').val(data.info[0].emp_country)
            $('#postal').val(data.info[0].emp_postal)
            $('#about').val(data.info[0].emp_about)
            $('.about').html(data.info[0].emp_about)
            if (data.info[0].emp_picture != '') {
                $('.imguploadbackdrop').attr('src', base_url + data.info[0].emp_picture)
                $('.imgupload').attr('src', base_url + data.info[0].emp_picture)
            }
        }
    })
}

function enableInputs(action) {
    if (action == 'edit') {
        $('input, textarea').prop('disabled', false)
        $('.fa-save, .fa-close').show()
        $('.fa-edit').hide()
    } else {
        $('input, textarea').prop('disabled', true)
        $('.fa-save, .fa-close').hide()
        $('.fa-edit').show()
        getProfileDetails()
    }
}

function submitProfile() {
    var error = false
    $('.error').remove()
        // console.log($('#edit_profile').serializeArray())

    if ($.trim($('#email').val()) == '' || !email_regx.test($.trim($('#email').val())) || email_check == false) {
        error = true
        if ($.trim($('#email').val()) == '') {
            $('#email').after('<span class="error email_check pull-right">Enter your email.</span>')
        } else if (!email_regx.test($.trim($('#email').val()))) {
            $('#email').after('<span class="error email_check pull-right">Enter valid email.</span>')
        } else if (email_check == false) {
            $('#email').after('<span class="error email_check pull-right">Email already exists.</span>')
        } else {}
    } else {}

    if (!(Number.isInteger(Number($('#contact_number').val())))) {
        error = true
            // console.log(Number.isInteger($("#postal").val()))
        $('#contact_number').after('<span class="error pull-right">Enter valid contact number.</span>')
    } else {}

    if (!(Number.isInteger(Number($('#postal').val())))) {
        error = true
            // console.log(Number.isInteger($("#postal").val()))
        $('#postal').after('<span class="error pull-right">Enter valid postal code.</span>')
    } else {}

    if (error == false && email_check == true) {
        $.post(base_url + 'employer/EmployerRegistration/updateEmpProfile', $('#edit_profile').serializeArray(), function(data, status) {
            var data = $.parseJSON(data)
                // console.log(data.message)
            if (data.message == 'OK') {
                // alert('Data: ' + data + '\nStatus: ' + status)
                $('input, textarea').prop('disabled', true)
                $('.fa-save, .fa-close').hide()
                $('.fa-edit').show()
                getProfileDetails()
            } else {
                $('input, textarea').prop('disabled', true)
                $('.fa-save, .fa-close').hide()
                $('.fa-edit').show()
                getProfileDetails()
            }
        })
    }
}

function VerifyEmail(email) {
    if ($.trim(email) != '' && email_regx.test($.trim(email))) {
        $.ajax({
            url: base_url + 'employer/EmployerRegistration/VerifyEmail',
            data: { 'email': email },
            success: function(res) {
                // alert(res)
                if (res == 'exist') {
                    email_check = false
                    $('#email').after('<span class="error email_check pull-right">Email already exists.</span>')
                } else {
                    email_check = true
                    $('.email_check').remove()
                }
            }
        })
    }
}

function UpdateProfileImage(event) {
    if ($("input[name='company_logo']").val() != '') {
        $('.uploading').html('' + event.target.value + 'uploading...')
            // to notify user the file is being uploaded
            // console.log(event)
        var files = event.target.files
            // get the selected files
        var data = new FormData()
            // Form Data check the above bullet for what it is
        var error = 0
            // Flag to notify in case of error and abort the upload

        // File data is presented as an array. In this case we can just jump to the index file using files[0] but this array traversal is recommended

        for (var i = 0; i < files.length; i++) {
            var file = files[i]
            if (!file.type.match('image.*')) {
                // Check for File type. the 'type' property is a string, it facilitates usage if match() function to do the matching
                $('.uploading').html('Images only.Select another file')
                error = 1
            } else if (file.size > 2097152) {
                // File size is provided in bytes
                $('.uploading').html('Too large Payload( < 2 Mb).Select another file')
                error = 1
            } else {
                // If all goes well, append the up-loadable file to FormData object
                data.append('image', file, file.name)
                    // Comparing it to a standard form submission the 'image' will be name of input
            }
        }
        if (!error) {
            var xhr = new XMLHttpRequest()
            xhr.open('POST', base_url + 'employer/EmployerRegistration/uploadCompanyImg', true)
            xhr.send(data)
            xhr.onload = function(data) {
                var res = $.parseJSON(data.target.response)
                if (res.status === 200) {
                    // console.log(data.target.response)
                    $("input[name='company_logo']").val('').hide().prop('disabled', true)
                    $('.uploading').html('<p>' + res.message + '</p>')
                    setTimeout(function() {
                        $('.uploading').empty()
                    }, 3000)
                    getProfileDetails()
                } else {
                    $('.uploading').html('<p> Error in upload, try again.</p>')
                    setTimeout(function() {
                        $('.uploading').empty()
                    }, 3000)
                }
            }
        }
    } else {
        $('.uploading').empty()
    }
}