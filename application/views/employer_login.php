<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Resume Builder - Employer</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>
    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <script src="<?php echo base_url(); ?>assets/js/employer/register_login.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary sticky-top">
        <a class="navbar-brand" href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/img/company_logo.png" alt="Logo" class="w-25 rounded-circle"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="javascript:void(0)" id="sign_up">Sign up</a>
                </li>
                <li class="nav-item d-none">
                    <a class="nav-link text-white" href="javascript:void(0)" id="sign_in">Sign in</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-5 d-none" id="register">
                <div class="card card-scrollable">
                    <div class="card-header font-weight-bold">
                        <center>Sign up</center>
                    </div>
                    <div class="card-body card-scrollable-body">
                        <form id="employer_signup" name="employer_signup" action="<?php echo base_url(); ?>employer/employerRegistration/EmployerRegister" method="post">
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
                            <button type="submit" name="submit" id="submit_register" class="btn btn-primary btn-block">Sign up</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-5" id="login">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        <center>Sign in</center>
                    </div>
                    <div class="card-body">
                        <center class="error">
                            <?php echo $this->session->flashdata('error'); ?>
                        </center>
                        <form id="employer_login" name="employer_login" action="<?php echo base_url(); ?>employer/employerRegistration/LoginEmp" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password</label>
                                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter Password">
                            </div>
                            <button type="submit" name="submit" id="submit_login" class="btn btn-primary btn-block">Sign in</button>
                        </form>
                        <button name="forgot_pwd" id="forgot_pwd" class="btn btn-light btn-block text-primary mt-2">Forgot Password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>