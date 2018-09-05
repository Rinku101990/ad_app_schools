    <footer>Copyright Ordius IT Solutions Pvt Ltd. <span><?php echo "5 Jul 2018";?>-<?php echo date('d M-Y');?></span>.</footer>
</div>
    <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

    <script src="<?php echo base_url('assets/js/custom-jquery.js');?>"></script>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/toastr.min.css');?>">
    <script src="<?php echo base_url('assets/js/toastr.min.js');?>"></script>

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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#multi-select-expertise').multiselect();
        });
    </script>

    <script>
    $(document).ready(function(){
     var base_url = "http://localhost/schools_app/students/";

     setInterval(function(){
      load_last_notification();
     }, 15000);

     function load_last_notification(){

      $.ajax({
        url:base_url+"dashboard/get_latest_notifications",
        method:"POST",
        dataType:"json",
        success:function(data){
          //console.log(data)
          //$('#msg').html(data.newmsg.tmpl_name);
          //toastr.success(data.newmsg.ntfn_notification_message,data.newmsg.tmpl_name, {timeOut: 5000})
         }
      });
      // $.ajax({
      //  url:"fetch.php",
      //  method:"POST",
      //  success:function(data)
      //  {
      //   $('.content').html(data);
      //  }
      // });

     }
    });
    </script>

</body>
</html>
