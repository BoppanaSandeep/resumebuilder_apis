<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Resume Builder - Employer</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'
    />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- <link href="<?php //echo base_url(); ?>assets/css/login.css" rel="stylesheet" id="bootstrap-css"> -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" id="bootstrap-css">
    <script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>
    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <script src="<?php echo base_url(); ?>assets/js/employer/register_login.js"></script>
    <style>
        /* .col-12.col-sm-6.col-md-6.col-lg-6.col-xl-6 {
            margin: auto 0;
        } */

        .card {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-header">Sign In</div>
                    <div class="card-body">
                        <label class="error">
                            <?php echo $this->session->flashdata('error'); ?>
                        </label>
                        <form id="employer_login" name="employer_login" action="<?php echo base_url(); ?>employer/employerRegistration/LoginEmp"
                            method="post">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password</label>
                                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter Password">
                            </div>
                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block">Sign In</button>
                            <button name="forgot_pwd" id="forgot_pwd" class="btn btn-light btn-block">Forgot Password</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-header">Sign Up</div>
                    <div class="card-body">
                        <form id="employer_signup" name="employer_signup" action="<?php echo base_url(); ?>employer/employerRegistration/EmployerRegister"
                            method="post">
                            <div class="form-group">
                                <label for="company_name">Company name</label>
                                <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company name">
                            </div>
                            <div class="form-group">
                                <label for="company_email">Company Email</label>
                                <input type="email" class="form-control" name="company_email" id="company_email" placeholder="Enter Company Email">
                            </div>
                            <div class="form-group">
                                <label for="employer_name">Employer name</label>
                                <input type="text" class="form-control" name="employer_name" id="employer_name" placeholder="Enter Employer name">
                            </div>
                            <div class="form-group">
                                <label for="contact_number">Contact number</label>
                                <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Enter Contact number">
                            </div>
                            <div class="form-group">
                                <label for="contact_address">Contact address</label>
                                <textarea class="form-control" name="contact_address" id="contact_address" placeholder="Enter Contact address" /> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password">
                            </div>
                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block">Sign up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>