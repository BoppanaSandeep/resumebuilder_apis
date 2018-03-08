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
    <link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.toggle').on('click', function () {
                $('.container').stop().addClass('active');
            });

            $('.close').on('click', function () {
                $('.container').stop().removeClass('active');
            });

        });
    </script>
</head>

<body>
<div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6  col-xl-4 ml-auto">
                <div class="card"></div>
                <div class="card">
                    <h4 class="title">Login</h4>
                    <form>
                        <div class="input-container">
                            <input type="text" id="username" required="required" />
                            <label for="Username">Username</label>
                            <div class="bar"></div>
                        </div>
                        <div class="input-container">
                            <input type="password" id="pwd" required="required" />
                            <label for="Password">Password</label>
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
                    <form>
                        <div class="input-container">
                            <input type="text" id="Username" required="required" />
                            <label for="Username">Username</label>
                            <div class="bar"></div>
                        </div>
                        <div class="input-container">
                            <input type="password" id="Password" required="required" />
                            <label for="Password">Password</label>
                            <div class="bar"></div>
                        </div>
                        <div class="input-container">
                            <input type="password" id="Repeat Password" required="required" />
                            <label for="Repeat Password">Repeat Password</label>
                            <div class="bar"></div>
                        </div>
                        <div class="input-container">
                            <input type="text" id="Username2" required="required" />
                            <label for="Username">Username</label>
                            <div class="bar"></div>
                        </div>
                        <div class="input-container">
                            <input type="password" id="Password2" required="required" />
                            <label for="Password">Password</label>
                            <div class="bar"></div>
                        </div>
                        <div class="input-container">
                            <input type="password" id="Repeat Password2" required="required" />
                            <label for="Repeat Password">Repeat Password</label>
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