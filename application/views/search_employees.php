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
            <div class="card search_employees">
                <div class="card-header">
                    <div class="row user-header-row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <h6 class="title">Search Employees</h6>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                            <div class="input-group search_fields">
                                <input type="text" class="form-control" name="skills" id="skills" placeholder="Skills">
                                <input type="text" class="form-control" name="position" id="position" placeholder="Position">
                                <input type="text" class="form-control" name="experience" id="experience" placeholder="Experience">
                                <input type="text" class="form-control" name="location" id="location" placeholder="Location">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Search</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="search_result"></p>
                    <div class="row append_employees">

                    </div>
                </div>
                <div class="card-footer row">
                    <div class="input-group col-12 col-sm-12 col-md-12 col-lg-5">
                        <select class="custom-select" id="limit" data-toggle="tooltip" data-trigger="hover" title="Page Limit" onchange="fetchEmployees(1, this.value)">
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
    <script src="<?php echo base_url(); ?>assets/js/employer/search_employees.js"></script>