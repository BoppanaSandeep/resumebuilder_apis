<footer class="footer">
    <div class="container-fluid">
        <nav>
            <ul>
                <li>
                    <a href="#">Resume Builder</a>
                </li>
                <li>
                    <a href="#">About Us</a>
                </li>
                <!-- <li>
                    <a href="#">Blog</a>
                </li> -->
            </ul>
        </nav>
        <div class="copyright">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>
        </div>
    </div>
</footer>
</div>
</div>
</body>
<script src="<?php echo base_url(); ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMnl4v3iO4HBG77DRYaWiMn49x9JXTK2s"></script> -->
<!-- Chart JS -->
<script src="<?php echo base_url(); ?>assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url(); ?>assets/js/now-ui-dashboard.js?v=1.0.1"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url(); ?>assets/demo/demo.js"></script>


<link href="<?php echo base_url(); ?>assets/css/chat.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/js/employer/chat.js"></script>

<?php $this->load->view("live_chat.php") ?>

</html>
