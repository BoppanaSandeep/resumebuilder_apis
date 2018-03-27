<?php $this->load->view("header");?>
<link href="<?php echo base_url(); ?>assets/css/datepicker/bootstrap-datepicker.min.css" rel="stylesheet" />

<div class="panel-header panel-header-sm" id="top">
</div>
<div class="content container">
    <div class="page-loader" style="display: none;">
        <div class="loader" style="display: none;">Loading...</div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card view_posts">
                <div class="card-header">
                    <div class="row user-header-row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h6 class="title">View Job Posts</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row append_jobposts">

                    </div>
                </div>
                <div class="card-footer row">
                    <div class="input-group col-12 col-sm-12 col-md-12 col-lg-5">
                        <!-- <div class="input-group-prepend">
                            <label class="input-group-text" for="limit">Limit</label>
                        </div> -->
                        <select class="custom-select" id="limit" data-toggle="tooltip" data-trigger="hover" title="Page Limit" onchange="fetchJobPosts(1, this.value)">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                    <ul class="pagination col-12 col-sm-12 col-md-12 col-lg-5">

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