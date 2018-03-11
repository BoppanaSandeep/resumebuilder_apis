<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Resume Builder - Employer</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'
    />
    <!-- CSS Files -->
    <link href="<?php echo base_url(); ?>assets/css/all.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?php echo base_url(); ?>assets/demo/fonts.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" />
    <script>
        // base url
        var base_url='<?php echo base_url(); ?>';
        // session varibales for Javascript
        var session_empid='<?php echo $this->session->userdata('employer_id'); ?>';
        var session_emp_rbid='<?php echo $this->session->userdata('emp_rb_id'); ?>';
    </script>
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="blue">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                    RB
                </a>
                <a href="#" class="simple-text logo-normal">
                    Resume Builder
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="<?php echo $active == 'dashboard' ? 'active' : ''; ?>" >
                        <a href="<?php echo base_url(); ?>">
                            <i class="now-ui-icons business_badge"></i>
                            <p>Empolyer</p>
                        </a>
                    </li>
                    <li class="<?php echo $active == 'user' ? 'active' : ''; ?>" >
                        <a href="<?php echo base_url(); ?>dashboard/user">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="<?php echo $active == 'notify' ? 'active' : ''; ?>" >
                        <a href="<?php echo base_url(); ?>dashboard/notify">
                            <i class="now-ui-icons ui-1_bell-53"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <li class="<?php echo $active == 'map' ? 'active' : ''; ?>" >
                        <a href="<?php echo base_url(); ?>dashboard/maps">
                            <i class="now-ui-icons location_map-big"></i>
                            <p>Maps</p>
                        </a>
                    </li>
                    <li class="<?php echo $active == 'icons' ? 'active' : ''; ?>" >
                        <a href="<?php echo base_url(); ?>dashboard/icons">
                            <i class="now-ui-icons education_atom"></i>
                            <p>Icons</p>
                        </a>
                    </li>
                    <li class="<?php echo $active == 'tables' ? 'active' : ''; ?>" >
                        <a href="<?php echo base_url(); ?>dashboard/tables">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>Table List</p>
                        </a>
                    </li>
                    <li class="<?php echo $active == 'upgrade' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>dashboard/upgrade">
                            <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                            <p>Upgrade to PRO</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </span>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="now-ui-icons location_world"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Notifications</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">
                                        <?php echo $this->session->userdata('emp_company'); ?>
                                    </a>
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/logout">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->