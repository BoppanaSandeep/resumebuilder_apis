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
    <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" id="bootstrap-css">
    <script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>
    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <script src="<?php echo base_url(); ?>assets/js/employer/register_login.js"></script>
</head>

<body>
    <div class="container  col-12 col-sm-8 col-md-8 col-xl-8">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-xl-5 afterrow">
                <div class="card"></div>
                <div class="card">
                    <h4 class="title">Login</h4>
                    <label class="error">
                        <?php 
                            echo $this->session->flashdata('error'); 
                        ?>
                    </label>
                    <form id="employer_login" name="employer_login" action="<?php echo base_url(); ?>employer/employerRegistration/LoginEmp" method="post">
                        <div class="input-container">
                            <input type="text" name="email" id="email" autocomplete="new-email" />
                            <label for="email">Email</label>
                            <div class="bar"></div>
                        </div>
                        <div class="input-container">
                            <input type="password" name="pwd" id="pwd" autocomplete="new-password"/>
                            <label for="pwd">Password</label>
                            <div class="bar"></div>
                        </div>
                        <div class="button-container">
                            <button>
                                <span>Go</span>
                            </button>
                        </div>
                        <div class="footer">
                            <a href="#">Forgot your password?</a>
                        </div>
                    </form>
                </div>
                <div class="card alt">
                    <div class="toggle">
                    </div>
                    <h4 class="title">Register
                        <div class="close"></div>
                    </h4>
                    <form id="employer_signup" name="employer_signup" action="<?php echo base_url(); ?>employer/employerRegistration/EmployerRegister" method="post" style="display:none;">
                        <div class="input-container">
                            <input type="text" name="company_name" id="company_name" />
                            <label for="employer_name">Company Name</label>
                            <div class="bar"></div>
                        </div>
                        <div class="input-container">
                            <input type="text" name="company_email" id="company_email" onchange="VerifyEmail(this.value)"/>
                            <label for="company_email">Company Email</label>
                            <div class="bar"></div>
                        </div>
                        <div class="input-container">
                            <input type="text" name="employer_name" id="employer_name"/>
                            <label for="employer_name">Employer Name</label>
                            <div class="bar"></div>
                        </div>
                        <div class="input-container">
                            <input type="text" name="contact_number" id="contact_number"/>
                            <label for="contact_number">Contact Number</label>
                            <div class="bar"></div>
                        </div>
                        <div class="input-container">
                            <textarea name="contact_address" id="contact_address"/> </textarea>
                            <label for="contact_address">Contact Address</label>
                            <div class="bar"></div>
                        </div>
                        <div class="input-container">
                            <input type="password" name="password" id="password"/>
                            <label for="password">Password</label>
                            <div class="bar"></div>
                        </div>
                        <div class="input-container">
                            <input type="password" name="confirm_password" id="confirm_password" />
                            <label for="confirm_password">Confirm Password</label>
                            <div class="bar"></div>
                        </div>
                        <div class="button-container">
                            <button>
                                <span>Next</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>