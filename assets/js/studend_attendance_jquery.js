$(document).ready(function(){
    var base_url = "http://localhost/schools_app/super/";
	// GET CLASS LIST ACCORDING SCHOOL ID //
	$("#school_name_id_attendance").on("change",function(){
        var schoolid = $(this).val();
        $.ajax({
            method:"POST",
            url:base_url+"students_attendance/getClassListBySchoolId",
            data:{schoolid:schoolid},
            dataType:"json",
            success: function(data){
                //console.log(data);
                if(data.cls_info!=''){
                    var i=0;
                    var prHtm='';
                    prHtm +='<option value="">select class</option>';
                    for(var key in data.cls_info){
                        prHtm += '<option value='+data.cls_info[i].cls_id+'>'+data.cls_info[i].cls_name+'</option>';
                        i++;
                    }
                    $("#class_name_id_attendance").html(prHtm);
                }else{
                    $("#class_name_id_attendance").html('<tr><td colspan="9"><center>No matching records found</center></td></tr>');
                }

            }
        });
    });
    // GET SECTION LIST BY CLASS ID FOR STUDENTS ATTENDANCE //
    $("#class_name_id_attendance").on("change",function(){
        var classid = $(this).val();
        $.ajax({
            method:"POST",
            url:base_url+"students_attendance/getSectionListByClassId",
            data:{classid:classid},
            dataType:"json",
            success: function(data){
                //console.log(data);
                if(data.sect_info!=''){
                    var i=0;
                    var prHtm='';
                    prHtm +='<option value="">select section</option>';
                    for(var key in data.sect_info){
                        prHtm += '<option value='+data.sect_info[i].sect_id+'>'+data.sect_info[i].sect_name+'</option>';
                        i++;
                    }
                    $("#section_name_id_attendance").html(prHtm);
                }else{
                    $("#section_name_id_attendance").html('<tr><td colspan="9"><center>No matching records found</center></td></tr>');
                }

            }
        });
    });
    // SAVE STUDENTS ATTENDANCE SINGAL RECORD //
    $(".btnSaveStudentsAttendance").click(function(){
    	var studid = $("#students_id").val();
    	var studcls = $("#stduent_cls").val();
    	var studschl = $("#schl_id").val();
    	var studSect = $("#stduent_sect").val();
    	var studPresent = $("#present_status").val();
    	var studType = $("#present_type").val();
    	var studSub = $("#present_subject").val();
    	var studReason = $("#reason_for_leave").val();

    	$.ajax({
    		method:"post",
    		url:base_url+"students_attendance/mark_students_attendance_one_by_one",
    		data:{studid:studid,studcls:studcls,studschl:studschl,studSect:studSect,studPresent:studPresent,studType:studType,studSub:studSub,studReason:studReason},
    		success:function(response){
    			if(response="success"){
    				 $("#btnSaveStudentsAttendance"+studid).hide();
    			}else{
    				alert(response);
    			}
    		}
    	});

    });

    // FILTER ATTENDANCE STUDENDS CLASS AND SECTION //

    $("#school_id_filter_attendance").on("change",function(){
        var schoolid = $(this).val();
        $.ajax({
            method:"POST",
            url:base_url+"students_attendance/getClassListBySchoolId",
            data:{schoolid:schoolid},
            dataType:"json",
            success: function(data){
                //console.log(data);
                if(data.cls_info!=''){
                    var i=0;
                    var prHtm='';
                    prHtm +='<option value="">select class</option>';
                    for(var key in data.cls_info){
                        prHtm += '<option value='+data.cls_info[i].cls_id+'>'+data.cls_info[i].cls_name+'</option>';
                        i++;
                    }
                    $("#class_id_filter_attendance").html(prHtm);
                }else{
                    $("#class_id_filter_attendance").html('<tr><td colspan="9"><center>No matching records found</center></td></tr>');
                }

            }
        });
    });
    // GET SECTION LIST BY CLASS ID FOR STUDENTS ATTENDANCE //
    $("#class_id_filter_attendance").on("change",function(){
        var classid = $(this).val();
        $.ajax({
            method:"POST",
            url:base_url+"students_attendance/getSectionListByClassId",
            data:{classid:classid},
            dataType:"json",
            success: function(data){
                //console.log(data);
                if(data.sect_info!=''){
                    var i=0;
                    var prHtm='';
                    prHtm +='<option value="">select section</option>';
                    for(var key in data.sect_info){
                        prHtm += '<option value='+data.sect_info[i].sect_id+'>'+data.sect_info[i].sect_name+'</option>';
                        i++;
                    }
                    $("#section_id_filter_attendance").html(prHtm);
                }else{
                    $("#section_id_filter_attendance").html('<tr><td colspan="9"><center>No matching records found</center></td></tr>');
                }

            }
        });
    });

    // FILTER OF FINAL RESULT OF STUDENTS //
    $("#btnSearchStudentAttendanceByClassAndSection").click(function(){
        var schlid = $("#school_id_filter_attendance").val();
        var clsid  = $("#class_id_filter_attendance").val();
        var sectid = $("#section_id_filter_attendance").val();
        var attdate = $("#date_id_filter_attendance").val();
        $.ajax({
            url:base_url+"students_attendance/get_students_attendance_search_result",
            method:"post",
            data:{schlid:schlid,clsid:clsid,sectid:sectid,attdate:attdate},
            dataType:"json",
            success: function(data){
                //alert(data.list);
                console.log(data);
                if(data.list!=''){
                    var i=0;
                    var prHtm='';
                    for(var key in data.list){
                        prHtm += '<tr>';
                        prHtm += '<td><input type="checkbox" value="" id="checkitem" name="checkitem" class="checkitem"></td>';
                        prHtm += '<td>'+data.list[i].stud_name+'</td>';
                        prHtm += '<td>'+data.list[i].stud_mobile_no+'</td>';
                        prHtm += '<td>'+data.list[i].stud_email+'</td>';
                        prHtm += '<td>'+data.list[i].stud_id+'</td>';
                        prHtm += '<td>'+data.list[i].stud_ref_id+'</td>';
                        prHtm += '<td>'+data.list[i].prnt_gaurdian_name+'</td>';
                        prHtm += '<td><label class="switch"><input type="checkbox" class="switch-input" checked="checked"><span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span></label></td>';
                        prHtm += '<td><a href="'+base_url+'students/profile/'+data.list[i].stud_id+'" class="btn btn-success btn-xs" title="View Student Profile"><i class="fa fa-eye"></i> </a>&nbsp;<a href="'+base_url+'students/add/'+data.list[i].stud_id+'" class="btn btn-primary btn-xs" title="Edit Student"><i class="fa fa-pencil" ></i> </a>&nbsp;<a href="'+base_url+'students/delete/'+data.list[i].stud_id+'/'+data.list[i].cms_id+'" class="btn btn-danger btn-xs" title="Delete Student"><i class="fa fa-trash"></i> </a>&nbsp;<button type="button" class="btn btn-warning btn-xs" title="Send Notification"><i class="fa fa-bell"></i> </button>&nbsp;<button type="button" class="btn btn-info btn-xs"><i class="fa fa-key" title="Send Credentials on his mobile"></i> </button></td>';
                        prHtm += '</tr>';
                        i++;
                    }
                    $("#searchResult").html(prHtm);
                }else{
                    $("#searchResult").html('<tr><td colspan="9"><center>No matching records found</center></td></tr>');
                }
            }
        });
    });
});