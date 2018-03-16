<?php $this->load->view("header");?>
<link href="<?php echo base_url(); ?>assets/css/datepicker/bootstrap-datepicker.min.css" rel="stylesheet" />

<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <form name="job_posts" id="job_posts" method="post" action="<?php echo base_url(); ?>employer/jobPosts/SaveJobPosts">
        <div class="row append_multiple">
            <div class="col-md-6 margin_0_auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row user-header-row">
                            <div class="col-md-9">
                                <h5 class="title">Post Job</h5>
                            </div>
                            <div class="col-md-3">
                                <i class="fa fa-plus text-primary" title="Add" onclick="add()"></i>
                                <i class="fa fa-minus text-primary" title="Remove" onclick="remove(this)"></i>
                                <!-- <i class="fa fa-save text-primary" title="Save" onclick="submitProfile()"></i> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Job Title</label>
                                    <input type="text" class="form-control" name="job_title[]" id="job_title" placeholder="Job Title" value="">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Job Position</label>
                                    <input type="text" class="form-control" name="job_position[]" id="job_position" placeholder="Job Position" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pr-1">
                                <div class="form-group">
                                    <label>Job Description</label>
                                    <textarea rows="4" cols="80" class="form-control" name="job_description[]" id="job_description" placeholder="Here can be your job description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pr-1">
                                <div class="form-group">
                                    <label>Skills Required</label>
                                    <input type="text" name="skills_req[]" id="skills_req" class="form-control" placeholder="Skills Required" onchange="VerifyEmail(this.value)">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Job Opening Date</label>
                                    <input type="text" class="form-control job_opening_date" name="job_opening_date[]" id="job_opening_date" placeholder="Job Opening Date" value="">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Job Closing Date</label>
                                    <input type="text" class="form-control job_closing_date" name="job_closing_date[]" id="job_closing_date" placeholder="Job Closing Date" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pr-1">
                                <div class="form-group">
                                    <label>Contact Email</label>
                                    <input type="text" name="contact_email[]" id="contact_email" class="form-control" placeholder="Contact Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pr-1">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" name="contact_number[]" id="contact_number" placeholder="Contact Number" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pr-1">
                                <div class="form-group">
                                    <label>Contact Address</label>
                                    <input type="text" class="form-control" name="address[]" id="address" placeholder="Contact Address" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city[]" id="city" placeholder="City" value="">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control" name="state[]" id="state" placeholder="State">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" name="country[]" id="country" placeholder="Country" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 margin_0_auto">
                <button class="btn btn-info btn-block">Save</button>
            </div>
        </div>
    </form>
</div>
<?php $this->load->view("footer");?>
<?php
if ($this->session->flashdata('msg') != '') {
    echo "<script>demo.showNotification('top','center', '" . $this->session->flashdata('msg') . "', 'fa fa-exclamation' , '1000', '" . $this->session->flashdata('color') . "')</script>";
}
?>
<script src="<?php echo base_url(); ?>assets/js/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/employer/job_posts.js"></script>