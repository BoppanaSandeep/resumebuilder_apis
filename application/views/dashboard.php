<?php $this->load->view("header");?>
<div class="panel-header panel-header-sm">
    <!-- <canvas id="bigDashboardChart"></canvas> -->
</div>
<div class="content">
    <!-- <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Global Sales</h5>
                    <h4 class="card-title">Shipped Products</h4>
                    <div class="dropdown">
                        <button type="button" class="btn btn-round btn-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                            <i class="now-ui-icons loader_gear"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <a class="dropdown-item text-danger" href="#">Remove Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="lineChartExample"></canvas>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">2018 Sales</h5>
                    <h4 class="card-title">All products</h4>
                    <div class="dropdown">
                        <button type="button" class="btn btn-round btn-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                            <i class="now-ui-icons loader_gear"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <a class="dropdown-item text-danger" href="#">Remove Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Email Statistics</h5>
                    <h4 class="card-title">24 Hours Performance</h4>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="barChartSimpleGradientsNumbers"></canvas>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="now-ui-icons ui-2_time-alarm"></i> Last 7 days
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="row">
        <!-- <div class="col-md-6">
            <div class="card card-tasks">
                <div class="card-header">
                    <h5 class="card-category">Backend development</h5>
                    <h4 class="card-title">Tasks</h4>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" checked="">
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </td>

                                    <td class="text-left">Sign contract for "What are conference organizers afraid of?"</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                            <i class="now-ui-icons ui-2_settings-90"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox">
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </td>

                                    <td class="text-left">Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                            <i class="now-ui-icons ui-2_settings-90"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" checked="">
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </td>

                                    <td class="text-left">Flooded: One year later, assessing what was lost and what was found when a ravaging rain
                                        swept through metro Detroit
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                            <i class="now-ui-icons ui-2_settings-90"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </button>
                                    </td>
                                </tr><tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" checked="">
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </td>

                                    <td class="text-left">Flooded: One year later, assessing what was lost and what was found when a ravaging rain
                                        swept through metro Detroit
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                            <i class="now-ui-icons ui-2_settings-90"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </button>
                                    </td>
                                </tr><tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" checked="">
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </td>

                                    <td class="text-left">Flooded: One year later, assessing what was lost and what was found when a ravaging rain
                                        swept through metro Detroit
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                            <i class="now-ui-icons ui-2_settings-90"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </button>
                                    </td>
                                </tr><tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" checked="">
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </td>

                                    <td class="text-left">Flooded: One year later, assessing what was lost and what was found when a ravaging rain
                                        swept through metro Detroit
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                            <i class="now-ui-icons ui-2_settings-90"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-category">All Employees List</h5>
                    <h4 class="card-title"> Company Approached </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Total Exp</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="center">1</td>
                                    <td>Boppana Sandeep</td>
                                    <td>Developer</td>
                                    <td align="center">2</td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#myModal">View More</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-category">All Employees List</h5>
                    <h4 class="card-title"> Employees Approached </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Total Exp</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="center">1</td>
                                    <td>Boppana Sandeep</td>
                                    <td>Developer</td>
                                    <td align="center">2</td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#myModal">View More</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Modal Heading</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Modal body..
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<?php $this->load->view("footer");?>
<script>
    $(document).ready(function () {
        // Javascript method's body can be found in assets/js/demos.js
        //demo.initDashboardPageCharts();
    });
</script>