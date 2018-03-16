<?php $this->load->view("header");?>
<link href="<?php echo base_url(); ?>assets/css/datepicker/bootstrap-datepicker.min.css" rel="stylesheet" />

<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card view_posts">
                <div class="card-header">
                    <div class="row user-header-row">
                        <div class="col-md-12">
                            <h6 class="title">View Job Posts</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row append_jobposts">
                        <!-- <div class="accordion" id="accordion">
                            <div class="card border border-info">
                                <div class="card-header">
                                    <a class="card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Job Title
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse">
                                    <div class="card-body">
                                        <div class="row header-color">
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                                                <div class="card">
                                                    <div class="card-header">Header</div>
                                                    <div class="card-body">Content</div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                                                <div class="card">
                                                    <div class="card-header">Header</div>
                                                    <div class="card-body">Content</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="card-footer">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("footer");?>
<?php
if ($this->session->flashdata('msg') != '') {
    echo "<script>demo.showNotification('top','center', '" . $this->session->flashdata('msg') . "', 'fa fa-exclamation' , '1000', '" . $this->session->flashdata('color') . "')</script>";
}
?>
<script src="<?php echo base_url(); ?>assets/js/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/employer/job_posts_view.js"></script>