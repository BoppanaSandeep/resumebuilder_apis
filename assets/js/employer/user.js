var email_check = true;
var email_regx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
var input_val = '';
$(document).ready(function () {
    $("input, textarea").prop("disabled", true);
    $(".fa-save, .fa-close").hide();

    getProfileDetails();

    $("input, textarea").focus(function () {
        input_val = $(this).val();
    })

    $("input, textarea").blur(function () {
        if ($.trim($(this).val()) == '') {
            $(this).val(input_val)
        }
    })
})

function getProfileDetails() {
    $.ajax({
        url: base_url + 'employer/EmployerRegistration/getProfileDetails',
        data: { "emp_rb_id": session_emp_rbid },
        success: function (res) {
            var data = $.parseJSON(res);
            //console.log(data.info);
            $("#company").val(data.info[0].emp_company);
            $("#emp_name").val(data.info[0].emp_name);
            $("#email").val(data.info[0].emp_email);
            $("#first_name").val(data.info[0].emp_first_name);
            $("#last_name").val(data.info[0].emp_last_name);
            $("#contact_number").val(data.info[0].emp_contact_num);
            $("#address").val(data.info[0].emp_address);
            $("#city").val(data.info[0].emp_city);
            $("#country").val(data.info[0].emp_country);
            $("#postal").val(data.info[0].emp_postal);
            $("#about").val(data.info[0].emp_about);
        }
    })
}

function enableInputs(action) {
    if (action == 'edit') {
        $("input, textarea").prop("disabled", false);
        $(".fa-save, .fa-close").show();
        $(".fa-edit").hide();
    } else {
        $("input, textarea").prop("disabled", true);
        $(".fa-save, .fa-close").hide();
        $(".fa-edit").show();
        getProfileDetails();
    }
}

function submitProfile() {
    var error = false
    $('.error').remove()
    console.log($("#edit_profile").serializeArray());

    if ($.trim($('#email').val()) == '' || !email_regx.test($.trim($('#email').val())) || email_check == false) {
        error = true
        if ($.trim($('#email').val()) == '') {
            $('#email').after('<span class="error email_check pull-right">Enter your email.</span>')
        } else if (!email_regx.test($.trim($('#email').val()))) {
            $('#email').after('<span class="error email_check pull-right">Enter valid email.</span>')
        } else if (email_check == false) {
            $('#email').after('<span class="error email_check pull-right">Email already exists.</span>')
        } else { }
    } else { }

    if (!(Number.isInteger(Number($("#contact_number").val())))) {
        error = true
        //console.log(Number.isInteger($("#postal").val()));
        $('#contact_number').after('<span class="error pull-right">Enter valid contact number.</span>')
    } else { }

    if (!(Number.isInteger(Number($("#postal").val())))) {
        error = true
        //console.log(Number.isInteger($("#postal").val()));
        $('#postal').after('<span class="error pull-right">Enter valid postal code.</span>')
    } else { }

    if (error == false && email_check == true) {
        $.post(base_url + 'employer/EmployerRegistration/updateEmpProfile', $("#edit_profile").serializeArray(), function (data, status) {
            var data = $.parseJSON(data);
            //console.log(data.message);
            if (data.message == 'OK') {
                alert("Data: " + data + "\nStatus: " + status);
                $("input, textarea").prop("disabled", true);
                $(".fa-save, .fa-close").hide();
                $(".fa-edit").show();
                getProfileDetails();
            } else {
                $("input, textarea").prop("disabled", true);
                $(".fa-save, .fa-close").hide();
                $(".fa-edit").show();
                getProfileDetails();
            }
        });
    }
}

function VerifyEmail(email) {
    if ($.trim(email) != '' && email_regx.test($.trim(email))) {
        $.ajax({
            url: base_url + 'employer/EmployerRegistration/VerifyEmail',
            data: { "email": email },
            success: function (res) {
                //alert(res);
                if (res == 'exist') {
                    email_check = false;
                    $('#email').after('<span class="error email_check pull-right">Email already exists.</span>')
                } else {
                    email_check = true;
                    $('.email_check').remove()
                }
            }
        })
    }
}