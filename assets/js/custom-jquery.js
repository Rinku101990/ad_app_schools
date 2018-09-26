$(document).ready(function(){
    var base_url = "http://localhost/schools_app/super/";
	//	DELETE ACADEMIC YEAR //
	$(".deleteAcademic").click(function(){
		var academic_id = $(this).attr("delAca");
		alert(academic_id);
	});
	// VIEW SCHOOL PROFILE //
	$(".viewSchoolInfo").click(function(){
        var school_id = $(this).attr("viewSchlInfo");
        alert(school_id);
    });
    // GENERATE USERNAME ACCORDING SCHOOL SELETION //
    $("#school_name").on("change", function(){
        var school_id = $(this).val();
        if(school_id != ''){
                $.ajax({
                url:base_url+"users/generateUserName",
                method:"post",
                data:{school_id:school_id},
                dataType:"json",
                success: function(data){
                    //console.log(data);
                    $(".username").show();
                    $(".password").show();
                    $("#userid").val(data.scode.schl_code+data.rcode);
                    $("#password").val(data.spass);
                }
            });
        }
    });
    // CHECK USER EMAIL ID EXIST IN DATABASE ARE NOT //
    $("#user_email").on("change",function(){
    	var email = $(this).val();
    	if(email != ''){
        $.ajax({
         url:base_url+"users/checkEmail",
         method: "post",
         data: {email:email},
         success: function(data){
            if(data=="fail"){
                $('#emailAvailableStatus').html("<label class='text-danger'><span><i class='fa fa-times-circle-o' aria-hidden='true'></i> This email id is already registered</span></label>");
            }else{
                $('#emailAvailableStatus').html("<label class='text-success'><span><i class='fa fa-check-circle-o' aria-hidden='true'></i> Email id is available</span></label>");
            }
         }
        });
       }else{
        $("#emailAvailableStatus").html("<label class='text-danger'><span><i class='fa fa-times-circle-o' aria-hidden='true'></i> Fields are blank.</span></label>");
       }
    });
    // CHECK PARENTS EMAIL ID EXIST IN DATABASE ARE NOT //
    $("#email_id").on("change",function(){
        var email = $(this).val();
        if(email != ''){
        $.ajax({
         url:base_url+"parents/checkParentsEmail",
         method: "post",
         data: {email:email},
         success: function(data){
            if(data=="fail"){
                $('#parents_email_available').html("<label class='text-danger'><span><i class='fa fa-times-circle-o' aria-hidden='true'></i> This email id is already registered</span></label>");
            }else{
                $('#parents_email_available').html("<label class='text-success'><span><i class='fa fa-check-circle-o' aria-hidden='true'></i> Email id is available</span></label>");
            }
         }
        });
       }else{
        $("#parents_email_available").html("<label class='text-danger'><span><i class='fa fa-times-circle-o' aria-hidden='true'></i> Fields are blank.</span></label>");
       }
    });
    // CHECK PARENTS MOBILE NUMBER //
    $("#mobile_number").on("change",function(){
        var mobile = $(this).val();
        if(mobile.length==10){
        $.ajax({
         url:base_url+"parents/checkParentsMobile",
         method: "post",
         data: {mobile:mobile},
         success: function(data){
            if(data=="fail"){
                $('#parents_mobile_available').html("<label class='text-danger'><span><i class='fa fa-times-circle-o' aria-hidden='true'></i> This mobile number is already registered</span></label>");
            }else{
                $('#parents_mobile_available').html("<label class='text-success'><span><i class='fa fa-check-circle-o' aria-hidden='true'></i> mobile number is correct.</span></label>");
            }
         }
        });
       }else{
        $("#parents_mobile_available").html("<label class='text-danger'><span><i class='fa fa-times-circle-o' aria-hidden='true'></i> Invalid mobile number.</span></label>");
       }
    });
    //  CHECK AVAILABLE CLASS ACCORDING SCHOOLS BY THIER IDS //
    $("#school_id").on("change",function(){
        var schoolid = $(this).val();
        $.ajax({
            method:"POST",
            url:base_url+"students/getClassListBySchoolId/"+schoolid,
            dataType:"json",
            success: function(data){
                //console.log(data);
                $("#classes").empty();
                $("#classes").append('<option value="">Select Class</option>');
                if(data.length >= 0)
                $.each(data, function(key, value) {
                    $("#classes").append('<option value="'+ value['cls_id']+'">'+ value['cls_name']+'</option>');
                });

            }
        });
    });
    // CHECK SECTION LIST BY CLASS ID //
    $("#classes").on("change",function(){
        var classid = $(this).val();
        //alert(classid);
        $.ajax({
            method:"POST",
            url:base_url+"students/getSectionListByClassId/"+classid,
            dataType:"json",
            success: function(data){
                //console.log(data);
                $("#section").empty();
                $("#section").append('<option value="">Select Section</option>');
                if(data.length >= 0)
                $.each(data, function(key, value) {
                    $("#section").append('<option value="'+ value['sect_id']+'">'+ value['sect_name']+'</option>');
                });

            }
        });
    });
    // CHECK STUDENTS EMAIL ID EXIST IN DATABASE ARE NOT //
    $("#student_email").on("change",function(){
        var email = $(this).val();
        if(email != ''){
        $.ajax({
         url:base_url+"students/checkStudentsEmail",
         method: "post",
         data: {email:email},
         success: function(data){
            if(data=="fail"){
                $('#students_email_available').html("<label class='text-danger'><span><i class='fa fa-times-circle-o' aria-hidden='true'></i> This email id is already registered</span></label>");
            }else{
                $('#students_email_available').html("<label class='text-success'><span><i class='fa fa-check-circle-o' aria-hidden='true'></i> Email id is available</span></label>");
            }
         }
        });
       }else{
        $("#students_email_available").html("<label class='text-danger'><span><i class='fa fa-times-circle-o' aria-hidden='true'></i> Fields are blank.</span></label>");
       }
    });
    // CHECK STUDENTS MOBILE NUMBER //
    $("#student_mobile").on("change",function(){
        var mobile = $(this).val();
        if(mobile.length==10){
        $.ajax({
         url:base_url+"students/checkStudentsMobile",
         method: "post",
         data: {mobile:mobile},
         success: function(data){
            if(data=="fail"){
                $('#students_mobile_available').html("<label class='text-danger'><span><i class='fa fa-times-circle-o' aria-hidden='true'></i> This mobile number is already registered</span></label>");
            }else{
                $('#students_mobile_available').html("<label class='text-success'><span><i class='fa fa-check-circle-o' aria-hidden='true'></i> mobile number is correct.</span></label>");
            }
         }
        });
       }else{
        $("#students_mobile_available").html("<label class='text-danger'><span><i class='fa fa-times-circle-o' aria-hidden='true'></i> Invalid mobile number.</span></label>");
       }
    });

    // CHANGE STUDENT STATUS ACTIVE AND INACTIVE //
    $(".statusOff").click(function(){
        var stdIdOff  = $(this).attr("statusOff");
        var stdValOff = $("#statusOff").val(); 
        $.ajax({
            method:"post",
            url:base_url+"students/students_status_off",
            data:{stdIdOff:stdIdOff,stdValOff:stdValOff},
            // beforeSend: function(){
            //     $("#switch"+stdIdOff).html('<img src="http://localhost/schools_app/assets/img/processing.gif" style="margin-left:25px">');
            // },
            success: function(data){
                //console.log(data);
                if(data=="Off"){
                    $("#switch"+stdIdOff).show();
                }else{

                }
            }
        });
    });
    $(".statusOn").click(function(){
        var stdIdOn  = $(this).attr("statusOn");
        var stdValOn = $("#statusOn").val(); 
        $.ajax({
            method:"post",
            url:base_url+"students/students_status_on",
            data:{stdIdOn:stdIdOn,stdValOn:stdValOn},
            // beforeSend: function(){
            //     $("#switch"+stdIdOn).html('<img src="http://localhost/schools_app/assets/img/processing.gif" style="margin-left:25px">');
            // },
            success: function(data){
                if(data=="On"){
                    $("#switch"+stdIdOn).show();
                }else{

                }
            }
        });
    });

    // DISABLED STUDENTS BY MULTIPLE SELECTION //
    $(".btnDisableMultipleStudents").click(function(){

        var stdids = [];
        $.each($("input[name='checkitem[]']:checked"), function(){            
            stdids.push($(this).val());
        });
        var idForDisable = stdids.join(","); // GET ALL CHECKBOX VALUE IN ARRAY //

        $.ajax({
            method:"post",
            url:base_url+"students/disabled_students_multi_ids",
            data:{idForDisable:idForDisable},
            success: function(data){
                //alert(data);
                if(data=="Off"){
                    location.reload(true);
                }else{
                    location.reload(true);
                }
            }
        });

    });
    // ENABLED STUDENTS BY MULTIPLE SELECTION //
    $(".btnEnableMultipleStudents").click(function(){

        var stdids = [];
        $.each($("input[name='checkitem[]']:checked"), function(){            
            stdids.push($(this).val());
        });
        var idForEnable = stdids.join(","); // GET ALL CHECKBOX VALUE IN ARRAY //

        $.ajax({
            method:"post",
            url:base_url+"students/enabled_students_multi_ids",
            data:{idForEnable:idForEnable},
            success: function(data){
                //alert(data);
                if(data=="On"){
                    location.reload(true);
                }else{
                    location.reload(true);
                }
            }
        });
    });
    
    // CREATE STUDENTS PDF //
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
        return true;
        }
    };
    $(document).ready(function() {
        $('.btnSavePdf').click(function () {
            doc.fromHTML($('#fixedHeader').html(), 15, 15, {
            'width': 200,
            'elementHandlers': specialElementHandlers
            });
            var current_date = new Date();
            var month = current_date.getMonth()+1;
            var day = current_date.getDate();
            var output = current_date.getFullYear() + '_' + (month<10 ? '0' : '') + month + '_' + (day<10 ? '0' : '') + day;
            doc.save('students_pdf_report_'+output+'_.pdf');
        });
    });

    // GET USER PERMISSION LIST //
    $("#permission_role").on("change", function(){
        var perimission_id = $(this).val();
        if(perimission_id.length <= '0'){

        }else{
            $.ajax({
                method:'post',
                url:base_url+'permissions/check_roles_status',
                data:{perimission_id:perimission_id},
                dataType:"json",
                beforeSend: function(){
                    $("#permission_loader").html('<img src="http://localhost/schools_app/assets/img/load.gif">');
                },
                success:function(data){
                    //console.log(data.permit_list.roles_id);
                    if(data.permit_list==null){
                        window.location.href = base_url+'permissions';
                    }else if(data.permit_list.roles_id!=''){
                        window.location.href = base_url+'permissions/show/'+data.permit_list.roles_id;
                    }else{
                        window.location.href = base_url+'permissions';
                    }
                }
            });
        }
    });

    // CHECK TEACHERS EMAIL ID EXIST IN DATABASE ARE NOT //
    $("#tchr_email").on("change",function(){
        var email = $(this).val();
        if(email != ''){
        $.ajax({
         url:base_url+"teachers/check_teachers_email",
         method: "post",
         data: {email:email},
         success: function(data){
            if(data=="fail"){
                $('#teacher_email_status').html("<label class='text-danger'><span><i class='fa fa-times-circle-o' aria-hidden='true'></i>This "+email+" email id is already registered</span></label>");
            }else{
                $('#teacher_email_status').html("<label class='text-success'><span><i class='fa fa-check-circle-o' aria-hidden='true'></i> "+email+" email id is available</span></label>");
            }
         }
        });
       }else{
        $("#teacher_email_status").html("<label class='text-danger'><span><i class='fa fa-times-circle-o' aria-hidden='true'></i> Fields are blank.</span></label>");
       }
    });
    // CHECK STUDENTS MOBILE NUMBER //
    $("#tchr_mobile").on("change",function(){
        var mobile = $(this).val();
        if(mobile.length==10){
        $.ajax({
         url:base_url+"teachers/check_teacher_mobile",
         method: "post",
         data: {mobile:mobile},
         success: function(data){
            if(data=="fail"){
                $('#teacher_mobile_status').html("<label class='text-danger'><span><i class='fa fa-times-circle-o' aria-hidden='true'></i> This "+mobile+" mobile number is already registered</span></label>");
            }else{
                $('#teacher_mobile_status').html("<label class='text-success'><span><i class='fa fa-check-circle-o' aria-hidden='true'></i> "+mobile+" mobile number is correct.</span></label>");
            }
         }
        });
       }else{
        $("#teacher_mobile_status").html("<label class='text-danger'><span><i class='fa fa-times-circle-o' aria-hidden='true'></i> Invalid mobile number.</span></label>");
       }
    });

    // CHECK ALL ITEM //
    // $('#checkall').on("change",function(){
    //     $(".checkitem").prob("checked", $(this).prob("checked"));
    // });
    $("#checkall").click(function () {
        $('.checkitem').prop('checked', this.checked);
    });

    // GET STUDENTS LIST BY SCHOOL ID AND CLASS ID //
    $("#btnStudSearch").click(function(){
        var schlid = $("#school_id").val();
        var clsid  = $("#classes").val();
        $.ajax({
            url:base_url+"students/get_students_search_result",
            method:"post",
            data:{schlid:schlid,clsid:clsid},
            dataType:"json",
            success: function(data){
                //alert(data.list);
                //console.log(data);
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


    // SAVE NEW SUBJECT LIST //
    $("#btnSaveNewSubject").click(function(){
        $("#newSubjectModal").modal({backdrop: false});
    });
    // SAVE NEW SUBJECT JQUERY //
    $("#formNewAddSubject").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            method:"post",
            url:base_url+"subjects/save_subject",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(data){
                //alert(data);
                if(data=="upload"){
                    window.location.href=base_url+"subjects";
                }else if(data=="failed"){
                     window.location.href=base_url+"subjects";
                }else{

                }
            }
        });
    });
    // VIEW SUB CATEGORY BY ID //
    $(".btnViewSubjects").click(function(){
        var sub_id = $(this).attr("viewsub");
        $.ajax({
            method:'POST',
            url:base_url+'subjects/viewSubCategory',
            data:{sub_id:sub_id},
            dataType:"json",
            success: function(data){
                $("#viewSubjectModal").modal({backdrop: false});

                $("#usubject_id").val(data.sub_info.sub_id);
                $("#usubject_name").val(data.sub_info.sub_name);
                $("#usubject_code").val(data.sub_info.sub_code);
                $("#usubject_auth").val(data.sub_info.sub_auth_name);
                $("#usubject_desc").val(data.sub_info.sub_desc);
            }
        });
    });

    // UPDATE NEW SUBJECT JQUERY //
    $("#formUpdateSubject").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            method:"post",
            url:base_url+"subjects/update_subject",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(data){
                //alert(data);
                if(data=="updated"){
                    window.location.href=base_url+"subjects";
                }else if(data=="failed"){
                     window.location.href=base_url+"subjects";
                }else{

                }
            }
        });
    });

    // CHANGE SUBJECT STATUS ACTIVE AND INACTIVE //
    $(".subjectStatusOff").click(function(){
        var subIdOff  = $(this).attr("subjectStatusOff");
        var subValOff = $("#subjectStatusOff").val(); 
        $.ajax({
            method:"post",
            url:base_url+"subjects/subject_status_off",
            data:{subIdOff:subIdOff,subValOff:subValOff},
            success: function(data){
                if(data=="Off"){
                    $("#switch"+subIdOff).show();
                }else{

                }
            }
        });
    });
    $(".subjectStatusOn").click(function(){
        var subIdOn  = $(this).attr("subjectStatusOn");
        var subValOn = $("#subjectStatusOn").val(); 
        $.ajax({
            method:"post",
            url:base_url+"subjects/subject_status_on",
            data:{subIdOn:subIdOn,subValOn:subValOn},
            success: function(data){
                if(data=="On"){
                    $("#switch"+subIdOn).show();
                }else{

                }
            }
        });
    });
    // SELECT ALL BY CHECKBOX //
    $("#subjectItem").click(function () {
        $('.subjectItem').prop('checked', this.checked);
    });

    // DISABLED SUBJECT BY MULTIPLE SELECTION //
    $(".btnDisableMultipleSubjects").click(function(){

        var subids = [];
        $.each($("input[name='subjectItem[]']:checked"), function(){            
            subids.push($(this).val());
        });
        var subidForDisable = subids.join(","); // GET ALL CHECKBOX VALUE IN ARRAY //

        $.ajax({
            method:"post",
            url:base_url+"subjects/disabled_subjects_multi_ids",
            data:{subidForDisable:subidForDisable},
            success: function(data){
                //alert(data);
                if(data=="Off"){
                    location.reload(true);
                }else{
                    location.reload(true);
                }
            }
        });

    });
    // ENABLED SUBJECT BY MULTIPLE SELECTION //
    $(".btnEnableMultipleSubject").click(function(){

        var subids = [];
        $.each($("input[name='subjectItem[]']:checked"), function(){            
            subids.push($(this).val());
        });
        var subIdForEnable = subids.join(","); // GET ALL CHECKBOX VALUE IN ARRAY //

        $.ajax({
            method:"post",
            url:base_url+"subjects/enabled_subjects_multi_ids",
            data:{subIdForEnable:subIdForEnable},
            success: function(data){
                //alert(data);
                if(data=="On"){
                    location.reload(true);
                }else{
                    location.reload(true);
                }
            }
        });
    });

    // DELETE SELECTED SUBJECT RECORD BY THEIR IDS //
    $("#btnDeleteSelectedSubjects").click(function(){
       // GET SUBJECT ID BY CHECK BOX // 
       var subid = [];
        $.each($("input[name='subjectItem[]']:checked"), function(){            
            subid.push($(this).val());
        });
        var selected_sub_id = subid.join(","); // GET ALL CHECKBOX VALUE IN ARRAY //

        // CREATE PROCESS OF SUBJECT RECORD DELETION //
        if(selected_sub_id.length ==''){
            $("#error_delete_page").modal({backdrop: false});
        }else{
            if(confirm('Are you sure want to delete records!')){
                $.ajax({
                    url:base_url+"subjects/remove_multiple_subjects_record",
                    method:"post",
                    data:{selected_sub_id:selected_sub_id},
                    success: function(response){
                        if(data=="success"){
                            window.location.href=base_url+"subjects";
                        }else if(data=="failed"){
                             window.location.href=base_url+"subjects";
                        }else{

                        }
                    }
                });
            }
            return false;
        }
    });

    // CHECK A CHECKBOX CHECKED OR NOT WHEN CREATE SUBJECT EXCEL //
    $("form").submit(function(){
        if ($('input:checkbox').filter(':checked').length < 1){
            alert("Check at least one Game!");
        return false;
        }
    });

    // CREATE SUBJECT PDF //
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
        return true;
        }
    };
    $(document).ready(function() {
        $('.btnSaveSubjectPdf').click(function () {
            doc.fromHTML($('.subjectPdf').html(), 15, 15, {
            'width': 200,
            'elementHandlers': specialElementHandlers
            });
            var current_date = new Date();
            var month = current_date.getMonth()+1;
            var day = current_date.getDate();
            var output = current_date.getFullYear() + '_' + (month<10 ? '0' : '') + month + '_' + (day<10 ? '0' : '') + day;
            doc.save('subject_pdf_report_'+output+'_.pdf');
        });
    });

});