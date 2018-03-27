<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Resume Builder - Employer</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSS Files -->
    <link href="<?php echo base_url(); ?>assets/css/all.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?php echo base_url(); ?>assets/demo/fonts.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" />
    <!--   Core JS Files   -->
    <script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/core/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js"></script>
    <script>
        // base url
        var base_url = '<?php echo base_url(); ?>';
        // session varibales for Javascript
        var session_empid = '<?php echo $this->session->userdata('employer_id'); ?>';
        var session_emp_rbid = '<?php echo $this->session->userdata('emp_rb_id'); ?>';
    </script>
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="blue">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="#" class="simple-text logo-mini">
                    RB
                </a>
                <a href="#" class="simple-text logo-normal">
                    Resume Builder
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="<?php echo $active == 'dashboard' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>">
                            <i class="fa fa-briefcase"></i>
                            <p>Empolyer</p>
                        </a>
                    </li>
                    <li class="<?php echo $active == 'search_employees' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>dashboard/search_employees">
                            <i class="fa fa-group"></i>
                            <p>Search Employees</p>
                        </a>
                    </li>
                    <li class="<?php echo $active == 'job_posts' ? 'active-pro' : ''; ?>">
                        <a class="arrow" data-toggle="collapse" href="#collapselist" role="button" aria-expanded="false" aria-controls="collapselist">
                            <i class="fa fa-clipboard"></i> Post Jobs
                            <span class="fa fa-caret-down" aria-hidden="true"></span>
                        </a>
                        <div class="collapse <?php echo $active_sub == '' ? '' : 'show'; ?>" id="collapselist">
                            <ul class="list-unstyled">
                                <li class="<?php echo $active_sub == 'view' ? 'active' : ''; ?>">
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/job_posts_view">
                                        <i class="fa fa-eye"></i>View
                                    </a>
                                </li>
                                <li class="<?php echo $active_sub == 'add' ? 'active' : ''; ?>">
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/job_posts">
                                        <i class="fa fa-plus"></i>Add
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="<?php echo $active == 'notify' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>dashboard/notify">
                            <i class="fa fa-bell"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <li class="<?php echo $active == 'map' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>dashboard/maps">
                            <i class="fa fa-map"></i>
                            <p>Maps</p>
                        </a>
                    </li>
                    <li class="<?php echo $active == 'tables' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>dashboard/tables">
                            <i class="fa fa-table"></i>
                            <p>Table List</p>
                        </a>
                    </li>
                    <li class="<?php echo $active == 'upgrade' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>dashboard/upgrade">
                            <i class="fa fa-cloud"></i>
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
                        <!-- <a class="navbar-brand" href="#pablo">Dashboard</a> -->
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-globe"></i>
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
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/user">
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