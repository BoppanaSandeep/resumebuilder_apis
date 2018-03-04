<?php $this->load->view("header"); ?>

<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    Google Maps
                </div>
                <div class="card-body ">
                    <div id="map" class="map"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("footer"); ?>
<script>
    $(document).ready(function () {
        // Javascript method's body can be found in assets/js/demos.js
        // demo.initGoogleMaps();
    });
</script>