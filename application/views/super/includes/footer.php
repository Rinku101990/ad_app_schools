    <footer>Copyright <a href="https://www.ordiusits.com/" target="_blank"><span>Ordius IT Solutions Pvt Ltd.</span></a> <span><?php echo date('Y');?></span>.</footer>
</div>
    <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

    <script src="<?php echo base_url('assets/js/custom-jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/js/studend_attendance_jquery.js');?>"></script>
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
    <script type="text/javascript" src="<?php echo base_url('assets/js/jspdf.min.js');?>"></script>

    <script type="text/javascript">
        //document.multiselect('#class_name_id');
    </script>
    
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
            // REDIRECT BASE URL //
            var base_url = "http://localhost/schools_app/super/";

            // SELECT ALL BY CHECKBOX //
            $("#checkall").click(function () {
                $('.checkitem').prop('checked', this.checked);
            });

            // GET ALL CHECKBOX VALUE IN ARRAY TO SEND MULTIPLE STUDENTS NOTIFICATION //
            $("#btnSendNotification").click(function(){

                var favorite = [];
                $.each($("input[name='checkitem[]']:checked"), function(){            
                    favorite.push($(this).val());
                });

                var ids = favorite.join(","); // GET ALL CHECKBOX VALUE IN ARRAY //

                // var schl_id = [];
                // $.each($("input[name='school_id']:hidden"), function(){            
                //     schl_id.push($(this).val());
                // });

                // var schools_id = schl_id.join(","); // GET ALL CHECKBOX VALUE IN ARRAY //

                if(ids.length ==''){

                    $("#error_notify_page").modal({backdrop: false});

                }else{
                    if(ids.length >=0){

                        $("#students_id").val(ids);
                        $("#select_notify_page").modal({backdrop: false});

                    }
                }

            });

            // GET CHECKBOX VALUE TO SINGAL STUDENT NOTIFICATION //
            // $("#btnSendOnlyNotidication").click(function(){
            //     var oneid = $("input[name='checkitem']:checked").val();
            //     alert(oneid);
            // });

            // DELETE SELECTED STUDENTS RECORD BY THEIR IDS //
            $("#btnDeleteSelectedStudents").click(function(){

               // GET STUDENT ID BY CHECK BOX // 
               var studentid = [];
                $.each($("input[name='checkitem[]']:checked"), function(){            
                    studentid.push($(this).val());
                });
                var selected_student_id = studentid.join(","); // GET ALL CHECKBOX VALUE IN ARRAY //

                // GET HIDDEN MASTER ID OF STUDENTS //
                var ms_id = [];
                $("input:hidden.ms_id").each(function() {
                    ms_id.push($(this).val());
                });
                var selected_master_id = ms_id.join(",");

                // CREATE PROCESS OF STUDENTS RECORD DELETION //
                if(selected_student_id.length ==''){

                    $("#error_page").modal({backdrop: false});

                }else{

                    if(confirm('Are you sure want to delete records!')){
                        $.ajax({
                            url:base_url+"students/remove_multiple_students_record",
                            method:"post",
                            data:{selected_student_id:selected_student_id,selected_master_id:selected_master_id},
                            dataType:"json",
                            success: function(response){
                                //alert(response);
                                //console.log(response);
                                window.location.href = base_url+"students";
                                $("#MsgStatus").html(response);
                            }
                        });
                    }
                    return false;

                }
            });

            // CREATE STUDENDS LISTS IN EXCEL BY THEIR IDS //
            $("#btnExportExcelFile").click(function(){

               // GET STUDENT ID BY CHECK BOX // 
               var studentid = [];
                $.each($("input[name='checkitem[]']:checked"), function(){            
                    studentid.push($(this).val());
                });
                var selected_excel_student_id = studentid.join(","); // GET ALL CHECKBOX VALUE IN ARRAY //

                // CREATE PROCESS OF STUDENTS RECORD DELETION //
                if(selected_excel_student_id.length ==''){

                    $("#error_report_page").modal({backdrop: false});

                }else{
                    $.ajax({
                        url:base_url+"studentsexcel/student_list",
                        method:"post",
                        data:{selected_excel_student_id:selected_excel_student_id},
                        //dataType:"json",
                        success: function(response){
                            //alert(response);
                            //console.log(response);
                            window.location.href = base_url+"students";
                            //window.open(base_url+"students",'_blank' );
                            //$("#MsgStatus").html(response);
                        }
                    });
                }
            });

            // SEND NOTIFICATION TO INDIVIUAL STUDENTS //
            // $('#checkitem').click(function () {
            //     $('#btnNotify').prop("disabled", !$("#checkitem").prop("checked")); 
            // });
            $(".btnSendNotify").click(function(){

                var stdid  = $(this).attr("stid");
                var schlid = $(this).attr("schlid");
                var clsid  = $(this).attr("clsid");
                var sectid = $(this).attr("sectid");
                //alert(sectid);
                if(stdid.lenght==0){
                    alert("Select Student.");
                }else{
                    $("#error_report_page").modal({backdrop: false});
                }
                
                
            
            });
        });
    </script>

</body>
</html>
