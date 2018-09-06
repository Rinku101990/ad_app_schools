    <footer>Copyright Ordius IT Solutions Pvt Ltd. <span><?php echo date('Y');?></span>.</footer>
</div>
    <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

    <script src="<?php echo base_url('assets/js/custom-jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/js/notification_jquery.js');?>"></script>

    <script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
    <script src="<?php echo base_url('assets/js/sparkline.js');?>"></script>
    <script src="<?php echo base_url('assets/js/scrollup/jquery.scrollUp.js');?>"></script>
    <script src="<?php echo base_url('assets/js/circliful/circliful.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/circliful/circliful.custom.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jvectormap/jquery-jvectormap-2.0.3.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jvectormap/world-mill-en.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jvectormap/gdp-data.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jvectormap/custom/world-map-markers.js');?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js');?>"></script>
    <script src="<?php echo base_url('assets/js/custom-overview.js');?>"></script>
	<script src="<?php echo base_url('assets/js/calendar/fullcalendar.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/calendar/fullcalendar.js');?>"></script>
	<script src="<?php echo base_url('assets/js/datatables/dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/datatables/dataTables.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/datatables/autoFill.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/datatables/autoFill.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/datatables/fixedHeader.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/datatables/custom-datatables.js');?>"></script>
    <script src="<?php echo base_url('assets/js/moment.js');?>"></script>
    <script src="<?php echo base_url('assets/js/rating/jquery.raty.js');?>"></script>

    <script src="<?php echo base_url('assets/js/alertify/alertify.js');?>"></script>
    <script src="<?php echo base_url('assets/js/alertify/alertify-custom.js');?>"></script>
	<script src="<?php echo base_url('assets/js/custom-notifications.js');?>"></script>

    <script src="<?php echo base_url('assets/js/bootstrap-select.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-multiselect.js');?>"></script>

    <link href="<?php echo base_url('assets/css/select2.min.css');?>" rel="stylesheet" />
    <script src="<?php echo base_url('assets/js/select2.min.js');?>"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#multi-select-expertise').multiselect();
        });
    </script>
    <script>
    $(document).ready(function(){
        $("#addTemplatesBtn").click(function(){
            $("#addTemplates").modal({backdrop: false});
        });
    });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#checkall").click(function () {
                $('.checkitem').prop('checked', this.checked);
            });

            // GET ALL CHECKBOX VALUE IN ARRAY TO SEND MULTIPLE STUDENTS NOTIFICATION //
            $("#btnSendNotification").click(function(){

                var favorite = [];
                $.each($("input[name='checkitem']:checked"), function(){            
                    favorite.push($(this).val());
                });

                //alert($("input[name='checkitem']:checked").size());

                var ids = favorite.join(","); // GET ALL CHECKBOX VALUE IN ARRAY //

                alert(ids);
            });

            // GET CHECKBOX VALUE TO SINGAL STUDENT NOTIFICATION //
            // $("#btnSendOnlyNotidication").click(function(){
            //     var oneid = $("input[name='checkitem']:checked").val();
            //     alert(oneid);
            // });
        });
    </script>

</body>
</html>
