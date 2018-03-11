<?php $this->load->view("header");?>

<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row user-header-row">
                        <div class="col-md-9">
                            <h5 class="title">Edit Profile</h5>
                        </div>
                        <div class="col-md-3">
                            <i class="fa fa-close text-primary" title="Cancel" onclick="enableInputs('cancel')"></i>
                            <i class="fa fa-edit text-primary" title="Edit" onclick="enableInputs('edit')"></i>
                            <i class="fa fa-save text-primary" title="Save" onclick="submitProfile()"></i>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form name="edit_profile" id="edit_profile" method="post">
                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" class="form-control" name="company" id="company" placeholder="Company" value="">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>Employer Name</label>
                                    <input type="text" class="form-control" name="emp_name" id="emp_name" placeholder="Employer Name" value="">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" onchange="VerifyEmail(this.value)">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pr-1">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Contact Number" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pr-1">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Company Address" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="City" value="">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="text" class="form-control" name="postal" id="postal" placeholder="ZIP Code">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pr-1">
                                <div class="form-group">
                                    <label>About Your Company</label>
                                    <textarea rows="4" cols="80" class="form-control" name="about" id="about" placeholder="Here can be your company description" value="Mike"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <img src="../assets/img//bg5.jpg" alt="...">
                </div>
                <div class="card-body">
                    <div class="author">
                        <a href="#">
                            <img class="avatar border-gray" src="../assets/img//mike.jpg" alt="...">
                            <h5 class="title">Mike Andrew</h5>
                        </a>
                        <p class="description">
                            michael24
                        </p>
                    </div>
                    <p class="description text-center">
                        "Lamborghini Mercy
                        <br> Your chick she so thirsty
                        <br> I'm in that two seat Lambo"
                    </p>
                </div>
                <hr>
                <div class="button-container">
                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                        <i class="fa fa-facebook-f"></i>
                    </button>
                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                        <i class="fa fa-twitter"></i>
                    </button>
                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                        <i class="fa fa-google-plus-g"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("footer");?>
<script src="<?php echo base_url(); ?>assets/js/employer/user.js"></script>
