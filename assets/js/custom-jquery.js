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
    $("#classes").on("change",function(){
        var classid = $(this).val();
        $.ajax({
            method:"POST",
            url:base_url+"timetable/get_section_list_for_classs",
            data:{classid:classid},
            dataType:"json",
            success: function(data){
                //console.log(data);
                $("#sections").empty();
                $("#sections").append('<option value="">Select Section</option>');
                if(data.length >= 0)
                $.each(data, function(key, value) {
                    $("#sections").append('<option value="'+ value['sect_id']+'">'+ value['sect_name']+'</option>');
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
    // GET CLASS LIST BY SCHOOL ID //
    $("#schlidforSubject").on("change",function(){
        var schoolIdForSubject = $(this).val();
        $.ajax({
            method:"POST",
            url:base_url+"subjects/getClassListBySchoolId/",
            data:{schoolIdForSubject:schoolIdForSubject},
            dataType:"json",
            success: function(data){
                //console.log(data);
                $("#classDiv").show();
                $("#classidforSubject").empty();
                $("#classidforSubject").append('<option value="">Select Class</option>');
                if(data.length >= 0)
                $.each(data, function(key, value) {
                    $("#classidforSubject").append('<option value="'+ value['cls_id']+'">'+ value['cls_name']+'</option>');
                });

            }
        });
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
                $("#updateSchlidforSubject option[value="+data.sub_info.schl_id+"]").prop('selected', true);
                $("#usubject_name").val(data.sub_info.sub_name);
                $("#usubject_code").val(data.sub_info.sub_code);
                $("#usubject_auth").val(data.sub_info.sub_auth_name);
                $("#usubject_desc").val(data.sub_info.sub_desc);
            }
        });
    });
    // UPDATE SUBJECT CLASS LIST BY SCHOOL ID //
    $("#updateSchlidforSubject").on("change",function(){
        var schoolIdForSubject = $(this).val();
        $.ajax({
            method:"POST",
            url:base_url+"subjects/getUpdatedClassListBySchoolId/",
            data:{schoolIdForSubject:schoolIdForSubject},
            dataType:"json",
            success: function(data){
                //console.log(data);
                $("#updateClassDiv").show();
                $("#updateClassidforSubject").empty();
                $("#updateClassidforSubject").append('<option value="">Select Class</option>');
                if(data.length >= 0)
                $.each(data, function(key, value) {
                    $("#updateClassidforSubject").append('<option value="'+ value['cls_id']+'">'+ value['cls_name']+'</option>');
                });

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
    // $("form").submit(function(){
    //     if ($('input:checkbox').filter(':checked').length < 1){
    //         alert("Check at least one Game!");
    //     return false;
    //     }
    // });

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

    // SAVE NEW SYLLABUS INFO //
    $("#btnSaveNewSyllabus").click(function(){
        $("#newSyllabusModal").modal({backdrop: false});
    });
    // GET CLASS LIST BY SCHOOL ID //
    $("#school_name_id").on("change", function(){
        var schl_id = $(this).val();
        $.ajax({
            url:base_url+"syllabus/get_class_list",
            method:"post",
            data:{schl_id:schl_id},
            dataType:"json",
            success: function(data){
                //alert(data.list);
                //console.log(data);
                if(data.cls_info!=''){
                    var i=0;
                    var prHtm='';
                    for(var key in data.cls_info){
                        prHtm += '<option value='+data.cls_info[i].cls_id+'>'+data.cls_info[i].cls_name+'</option>';
                        i++;
                    }
                    $("#class_name").html(prHtm);
                }else{
                    $("#class_name").html('<tr><td colspan="9"><center>No matching records found</center></td></tr>');
                }
            }
        });
    });
    // SAVE NEW SUBJECT JQUERY //
    $("#formAddSyllabus").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            method:"post",
            url:base_url+"syllabus/save_syllabus",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(data){
                //alert(data);
                if(data=="upload"){
                    window.location.href=base_url+"syllabus";
                }else if(data=="failed"){
                     window.location.href=base_url+"syllabus";
                }else{

                }
            }
        });
    });
    // CKECK ALL SYLLABUS ITEM //
    $("#checkSyllabus").click(function () {
        $('.syllabusItem').prop('checked', this.checked);
    });
    // DELETE SELECTED SYLLABUS RECORD BY THEIR IDS //
    $("#btnDeleteMultipleSyllabus").click(function(){
       // GET SUBJECT ID BY CHECK BOX // 
       var syllabusid = [];
        $.each($("input[name='syllabusItem[]']:checked"), function(){            
            syllabusid.push($(this).val());
        });
        var selected_syllabusid = syllabusid.join(","); // GET ALL CHECKBOX VALUE IN ARRAY //

        // CREATE PROCESS OF SUBJECT RECORD DELETION //
        if(selected_syllabusid.length ==''){
            $("#error_delete_page_for_syllabus").modal({backdrop: false});
        }else{
            if(confirm('Are you sure want to delete records!')){
                $.ajax({
                    url:base_url+"syllabus/remove_multiple_syllabus_record",
                    method:"post",
                    data:{selected_syllabusid:selected_syllabusid},
                    success: function(response){
                        if(data=="success"){
                            window.location.href=base_url+"syllabus";
                        }else if(data=="failed"){
                             window.location.href=base_url+"syllabus";
                        }else{

                        }
                    }
                });
            }
            return false;
        }
    });

    // SAVE NEW TIMETABLE INFO //
    $("#btnSaveNewTimeTable").click(function(){
        $("#newTimeTableModal").modal({backdrop: false});
    });
    // SAVE TIME TABLE //
    $("#formSaveTimeTable").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            method:"post",
            url:base_url+"timetable/save_time_table",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(data){
                //alert(data);
                if(data=="upload"){
                    window.location.href=base_url+"timetable";
                }else if(data=="failed"){
                    window.location.href=base_url+"timetable";
                }else if(data=="blank"){
                    window.location.href=base_url+"timetable";
                }else{

                }
            }
        });
    });
    // FILTER CLASS AND SECTION BY SCHOOL ID //
    $("#timeSchoolId").on("change", function(){
        var schl_id = $(this).val();
        $.ajax({
            url:base_url+"timetable/get_class_list",
            method:"post",
            data:{schl_id:schl_id},
            dataType:"json",
            success: function(data){
                //alert(data.list);
                //console.log(data);
                if(data.cls_info!=''){
                    var i=0;
                    var prHtm='';
                    for(var key in data.cls_info){
                        prHtm += '<option value='+data.cls_info[i].cls_id+'>'+data.cls_info[i].cls_name+'</option>';
                        i++;
                    }
                    $("#timeClassId").html(prHtm);
                }else{
                    $("#timeClassId").html('<tr><td colspan="9"><center>No matching records found</center></td></tr>');
                }
            }
        });
    });


    // GET SECTION LIST
    $("#timeClassId").on("change", function(){
        var cls_id = $(this).val();
        $.ajax({
            url:base_url+"timetable/get_sections_list",
            method:"post",
            data:{cls_id:cls_id},
            dataType:"json",
            success: function(data){
                //alert(data.list);
                //console.log(data);
                if(data.sect_info!=''){
                    var i=0;
                    var prHtm='';
                    for(var key in data.sect_info){
                        prHtm += '<option value='+data.sect_info[i].sect_id+'>'+data.sect_info[i].sect_name+'</option>';
                        i++;
                    }
                    $("#sectionid").html(prHtm);
                }else{
                    $("#sectionid").html('<tr><td colspan="9"><center>No matching records found</center></td></tr>');
                }
            }
        });
    });
    // FILTER SUBJECT DEPENDS ON SCHOOL ID //
    $("#timeSchoolId").on("change", function(){
        var schl_id = $(this).val();
        $.ajax({
            url:base_url+"timetable/get_subjects_list_for_school",
            method:"post",
            data:{schl_id:schl_id},
            dataType:"json",
            success: function(data){
                //alert(data.list);
                //console.log(data);
                if(data.subject_info!=''){
                    var i=0;
                    var prHtm='';
                    for(var key in data.subject_info){
                        prHtm += '<option value='+data.subject_info[i].sub_id+'>'+data.subject_info[i].sub_name+'</option>';
                        i++;
                    }
                    $("#subjectid").html(prHtm);
                }else{
                    $("#subjectid").html('<tr><td colspan="9"><center>No matching records found</center></td></tr>');
                }
            }
        });
    });
    // GET TEACHER LIST //
    $("#timeSchoolId").on("change", function(){
        var schl_id = $(this).val();
        $.ajax({
            url:base_url+"timetable/get_teachers_list_for_school",
            method:"post",
            data:{schl_id:schl_id},
            dataType:"json",
            success: function(data){
                //alert(data.list);
                //console.log(data);
                if(data.teachers_info!=''){
                    var i=0;
                    var prHtm='';
                    for(var key in data.teachers_info){
                        prHtm += '<option value='+data.teachers_info[i].tchr_id+'>'+data.teachers_info[i].tchr_name+'</option>';
                        i++;
                    }
                    $("#teacherid").html(prHtm);
                }else{
                    $("#teacherid").html('<tr><td colspan="9"><center>No matching records found</center></td></tr>');
                }
            }
        });
    });


    // GET TIME TABLE LIST BY SCHOOL ID AND CLASS ID //
    $("#btnTimeTableSearch").click(function(){
        var srchSchlId = $("#school_id").val();
        var srchClsId  = $("#classes").val();
        var srchSecId  = $("#sections").val();
        $.ajax({
            url:base_url+"timetable/get_timetable_search_result",
            method:"post",
            data:{srchSchlId:srchSchlId,srchClsId:srchClsId,srchSecId:srchSecId},
            dataType:"json",
            success: function(data){
                if(data.tmtl_result!=''){
                    var i=0;
                    var prHtm='';
                    
                    for(var key in data.tmtl_result){

                        prHtm += '<div class="panel-heading">';
                        prHtm += '<h4 class="panel-title">';
                        prHtm += '<a data-toggle="collapse" href="#collapse'+data.tmtl_result[i].tmtl_id+'">'+data.tmtl_result[i].tmtl_days+'</a>';
                        prHtm += '</h4>';
                        prHtm +='</div>';
                        prHtm +='<div id="collapse'+data.tmtl_result[i].tmtl_id+'" class="panel-collapse collapse">';
                        prHtm +='<div class="panel-body">';

                        prHtm += '<center>';
                        prHtm += '<table class="table table-bordered no-margin" cellspacing="0" width="100%">';
                        prHtm += '<tbody>';
                        prHtm += '<tr class="center-text">';
                        prHtm += '<td>'+data.tmtl_result[i].tmtl_days+'</td>';
                        prHtm += '<td><p>'+data.tmtl_result[i].tmtl_time_from+' to '+data.tmtl_result[i].tmtl_time_to+' </p><p>Section: '+data.tmtl_result[i].sect_name+'</p><p>Class: '+data.tmtl_result[i].cls_name+'</p><p>Teacher: '+data.tmtl_result[i].tchr_name+'</p><p><button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button><button class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></button></p>';
                        prHtm += '</td>';
                        prHtm += '</tr>';
                        prHtm += '</tbody>';
                        prHtm += '</table>';
                        prHtm += '</center>';

                        prHtm +='</div>';
                        prHtm +='</div>';

                        i++;
                    }
                    
                    $("#timeTableResult").html(prHtm);
                }else{
                    $("#timeTableResult").html('<tr><td colspan="9"><center>No matching records found</center></td></tr>');
                }
            
            }
        });
    });

    /* ADD NEW ASSIGNMENTS FOR CLASSES */

    $("#btnSaveNewAssignment").click(function(){
        $("#newAssignmentModal").modal({backdrop: false});
    });

    /* ADD NEW ASSIGNMENT JQUERY */
    $("#formAssignmentsRecord").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            method:"post",
            url:base_url+"assignments/save_assignments",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(data){
                //alert(data);
                if(data=="upload"){
                    window.location.href=base_url+"assignments";
                }else if(data=="failed"){
                    window.location.href=base_url+"assignments";
                }else if(data=="blank"){
                    window.location.href=base_url+"assignments";
                }else{

                }
            }
        });
    });

    /* END OF THE ASSIGNMENT FOR CLASSES */ 

    /* GET ALL CLASS NAME BY SCHOOL ID FOR ASSIGNMENTS */ 
    $("#asgn_school_id").on("change",function(){
        var schoolid = $(this).val();
        $.ajax({
            method:"POST",
            url:base_url+"assignments/getClassListById",
            data:{schoolid:schoolid},
            dataType:"json",
            success: function(data){
                if(data.cls_info!=''){
                    var i=0;
                    var prHtm='';
                    prHtm += '<option value="">Select Class</option>';
                    for(var key in data.cls_info){
                        prHtm += '<option value='+data.cls_info[i].cls_id+'>'+data.cls_info[i].cls_name+'</option>';
                        i++;
                    }
                    $("#asgn_class_id").html(prHtm);
                }else{
                    $("#asgn_class_id").html('<tr><td colspan="9"><center>No matching records found</center></td></tr>');
                }
            }
        });
    });
    // GET ALL SUBJECT LIST BY SCHOOL ID //
    $("#asgn_school_id").on("change",function(){
        var schoolid = $(this).val();
        $.ajax({
            method:"POST",
            url:base_url+"assignments/getsubjetcsListById",
            data:{schoolid:schoolid},
            dataType:"json",
            success: function(data){
                if(data.sub_info!=''){
                    var i=0;
                    var prHtm='';
                    prHtm += '<option value="">Select Class</option>';
                    for(var key in data.sub_info){
                        prHtm += '<option value='+data.sub_info[i].sub_id+'>'+data.sub_info[i].sub_name+'</option>';
                        i++;
                    }
                    $("#asgn_subject_id").html(prHtm);
                }else{
                    $("#asgn_subject_id").html('<tr><td colspan="9"><center>No matching records found</center></td></tr>');
                }
            }
        });
    });
    /* END OF THE CLASS LIST BY SCHOOL ID FOR ASSIGNMENTS */

    /* GET ALL SECTION LIST BY CLASS ID FOR ASSIGNMENTS */ 
    $("#asgn_class_id").on("change",function(){
        var classid = $(this).val();
        $.ajax({
            method:"POST",
            url:base_url+"assignments/getSectionListById",
            data:{classid:classid},
            dataType:"json",
            success: function(data){
                if(data.sect_info!=''){
                    var i=0;
                    var prHtm='';
                    prHtm += '<option value="">Select Section</option>';
                    for(var key in data.sect_info){
                        prHtm += '<option value='+data.sect_info[i].sect_id+'>'+data.sect_info[i].sect_name+'</option>';
                        i++;
                    }
                    $("#asgn_section_id").html(prHtm);
                }else{
                    $("#asgn_section_id").html('<tr><td colspan="9"><center>No matching records found</center></td></tr>');
                }
            }
        });
    });
    // GET ALL STUDENTS LIST BY SECTION ID  FOR ASSIGNMENTS //
    $("#asgn_section_id").on("change",function(){
        var sectionid = $(this).val();
        $.ajax({
            method:"POST",
            url:base_url+"assignments/getStudentListById",
            data:{sectionid:sectionid},
            dataType:"json",
            success: function(data){
                if(data.std_info!=''){
                    var i=0;
                    var prHtm='';
                    prHtm += '<option value="">Select Student</option>';
                    for(var key in data.std_info){
                        prHtm += '<option value='+data.std_info[i].stud_id+'>'+data.std_info[i].stud_name+'</option>';
                        i++;
                    }
                    $("#asgn_students_id").html(prHtm);
                }else{
                    $("#asgn_students_id").html('<option value="">No matching records found</option>');
                }
            }
        });
    });
    /* END OF THE LIST OF ALL STUDENTS BY */
    $("#asgn_school_id1").on("change",function(){
        var schoolid = $(this).val();
        $.ajax({
            method:"POST",
            url:base_url+"assignments/getClassListById",
            data:{schoolid:schoolid},
            dataType:"json",
            success: function(data){
                if(data.cls_info!=''){
                    var i=0;
                    var prHtm='';
                    prHtm += '<option value="">Select Class</option>';
                    for(var key in data.cls_info){
                        prHtm += '<option value='+data.cls_info[i].cls_id+'>'+data.cls_info[i].cls_name+'</option>';
                        i++;
                    }
                    $("#asgn_class_id1").html(prHtm);
                }else{
                    $("#asgn_class_id").html('<tr><td colspan="9"><center>No matching records found</center></td></tr>');
                }
            }
        });
    });
    $("#asgn_class_id1").on("change",function(){
        var classid = $(this).val();
        $.ajax({
            method:"POST",
            url:base_url+"assignments/getSectionListById",
            data:{classid:classid},
            dataType:"json",
            success: function(data){
                if(data.sect_info!=''){
                    var i=0;
                    var prHtm='';
                    prHtm += '<option value="">Select Section</option>';
                    for(var key in data.sect_info){
                        prHtm += '<option value='+data.sect_info[i].sect_id+'>'+data.sect_info[i].sect_name+'</option>';
                        i++;
                    }
                    $("#asgn_section_id1").html(prHtm);
                }else{
                    $("#asgn_section_id1").html('<tr><td colspan="9"><center>No matching records found</center></td></tr>');
                }
            }
        });
    });
    /* END OF THE SECTION LIST BY CLASS ID FOR ASSIGNMENTS */

    /* CHANGE ASSIGNMENT STATUS */

    $(".assignStatusOff").click(function(){
        var asgnIdOff  = $(this).attr("assignStatusOff");
        var asgnValOff = $("#assignStatusOff").val(); 
        $.ajax({
            method:"post",
            url:base_url+"assignments/assignments_status_off",
            data:{asgnIdOff:asgnIdOff,asgnValOff:asgnValOff},
            success: function(data){
                if(data=="Off"){
                    $("#switch"+asgnValOff).show();
                }else{

                }
            }
        });
    });
    $(".assignStatusOn").click(function(){
        var asgnIdOn  = $(this).attr("assignStatusOn");
        var asgnValOn = $("#assignStatusOn").val(); 
        $.ajax({
            method:"post",
            url:base_url+"assignments/assignments_status_on",
            data:{asgnIdOn:asgnIdOn,asgnValOn:asgnValOn},
            success: function(data){
                if(data=="On"){
                    $("#switch"+asgnValOn).show();
                }else{

                }
            }
        });
    });

    /* END OF THE ASSIGNMENT STATUS */

    // SEARCH ASSIGNMENTS BY MULTIPLE PARAMETER //
    $("#btnAssignmentsSearch").click(function(){
        var srchAsgnSchlId = $("#asgn_school_id").val();
        var srchAsgnClsId  = $("#asgn_class_id").val();
        var srchAsgnSecId  = $("#asgn_section_id").val();
        $.ajax({
            url:base_url+"assignments/get_assignment_search_result",
            method:"post",
            data:{srchAsgnSchlId:srchAsgnSchlId,srchAsgnClsId:srchAsgnClsId,srchAsgnSecId:srchAsgnSecId},
            dataType:"json",
            success: function(data){

                //console.log(data);
                if(data.asgn_result!=''){
                    var i=0;
                    var prHtm='';
                    
                    for(var key in data.asgn_result){

                        prHtm += '<tr>';
                        prHtm += '<td><input type="checkbox" value="" id="checkitem" name="checkitem" class="checkitem"></td>';
                        prHtm += '<td>'+data.asgn_result[i].asgn_title+'</td>';
                        prHtm += '<td>'+data.asgn_result[i].asgn_description+'</td>';
                        prHtm += '<td>'+data.asgn_result[i].asgn_submission_date+'</td>';
                        prHtm += '<td>'+data.asgn_result[i].asgn_created+'</td>';
                        prHtm += '<td>'+data.asgn_result[i].sect_name+'</td>';
                        prHtm += '<td>'+data.asgn_result[i].stud_name+'</td>';
                        prHtm += '<td>'+data.asgn_result[i].asgn_atteched_file+'</td>';
                        prHtm += '<td>'+data.asgn_result[i].asgn_assigned_by+'</td>';
                        prHtm += '<td>'+data.asgn_result[i].asgn_status+'</td>';
                        prHtm += '<td><label class="switch"><input type="checkbox" class="switch-input" checked="checked"><span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span></label></td>';
                        prHtm += '<td><a href="'+base_url+'students/profile/'+data.asgn_result[i].asgn_id+'" class="btn btn-success btn-xs" title="View Student Profile"><i class="fa fa-eye"></i> </a>&nbsp;<a href="'+base_url+'students/add/'+data.asgn_result[i].asgn_id+'" class="btn btn-primary btn-xs" title="Edit Student"><i class="fa fa-pencil" ></i> </a>&nbsp;<a href="'+base_url+'students/delete/'+data.list[i].stud_id+'/'+data.list[i].cms_id+'" class="btn btn-danger btn-xs" title="Delete Student"><i class="fa fa-trash"></i> </a>&nbsp;<button type="button" class="btn btn-warning btn-xs" title="Send Notification"><i class="fa fa-bell"></i> </button>&nbsp;<button type="button" class="btn btn-info btn-xs"><i class="fa fa-key" title="Send Credentials on his mobile"></i> </button></td>';
                        prHtm += '</tr>';

                        i++;
                    }
                    
                    $("#assignmentsResult").html(prHtm);
                }else{
                    $("#assignmentsResult").html('<tr><td colspan="11"><center>No matching records found</center></td></tr>');
                }
            
            }
        });
    });

    // ADD NEW IMPORTANT LINKS //
    $("#btnAddNewLinks").click(function(){
        $("#newLinksModal").modal({backdrop: false});
    });

    /* ADD NEW IMPORTANTS LINK JQUERY */
    $("#formImportantLinkRecord").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            method:"post",
            url:base_url+"importantlinks/save_importantlinks",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(data){
                //alert(data);
                if(data=="upload"){
                    window.location.href=base_url+"importantlinks";
                }else if(data=="failed"){
                    window.location.href=base_url+"importantlinks";
                }else if(data=="blank"){
                    window.location.href=base_url+"importantlinks";
                }else{

                }
            }
        });
    });
    // END OF THE NEW IMPORTANT LINKS //

    /* CHANGE ASSIGNMENT STATUS */

    $(".imprtStatusOff").click(function(){
        var imprtIdOff  = $(this).attr("imprtStatusOff");
        var imprtValOff = $("#imprtStatusOff").val(); 
        $.ajax({
            method:"post",
            url:base_url+"importantlinks/importantlinks_status_off",
            data:{imprtIdOff:imprtIdOff,imprtValOff:imprtValOff},
            success: function(data){
                if(data=="Off"){
                    $("#switch"+imprtValOff).show();
                }else{

                }
            }
        });
    });
    $(".imprtStatusOn").click(function(){
        var imprtIdOn  = $(this).attr("imprtStatusOn");
        var imprtValOn = $("#imprtStatusOn").val(); 
        $.ajax({
            method:"post",
            url:base_url+"importantlinks/importantlinks_status_on",
            data:{imprtIdOn:imprtIdOn,imprtValOn:imprtValOn},
            success: function(data){
                if(data=="On"){
                    $("#switch"+imprtValOn).show();
                }else{

                }
            }
        });
    });

    // ADD NEW IMPORTANT LINKS //
    $("#btnAddHolidays").click(function(){
        $("#newHolidaysModal").modal({backdrop: false});
    });

    /* ADD NEW IMPORTANTS LINK JQUERY */
    $("#formHolidaysRecord").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            method:"post",
            url:base_url+"holidays/save_holidays",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(data){
                //alert(data);
                if(data=="saved"){
                    window.location.href=base_url+"holidays";
                }else if(data=="failed"){
                    window.location.href=base_url+"holidays";
                }else if(data=="blank"){
                    window.location.href=base_url+"holidays";
                }else{

                }
            }
        });
    });
    // END OF THE NEW IMPORTANT LINKS //

    // CHANGE HOLIDAYS STATUS //

    $(".hldyStatusOff").click(function(){
        var hldyIdOff  = $(this).attr("hldyStatusOff");
        var hldyValOff = $("#hldyStatusOff").val(); 
        $.ajax({
            method:"post",
            url:base_url+"holidays/holidays_status_off",
            data:{hldyIdOff:hldyIdOff,hldyValOff:hldyValOff},
            success: function(data){
                if(data=="Off"){
                    $("#switch"+hldyValOff).show();
                }else{

                }
            }
        });
    });

    $(".hldyStatusOn").click(function(){
        var hldyIdOn  = $(this).attr("hldyStatusOn");
        var hldyValOn = $("#hldyStatusOn").val(); 
        $.ajax({
            method:"post",
            url:base_url+"holidays/holidays_status_on",
            data:{hldyIdOn:hldyIdOn,hldyValOn:hldyValOn},
            success: function(data){
                if(data=="On"){
                    $("#switch"+hldyValOn).show();
                }else{

                }
            }
        });
    });

    // VIEW CIRCULARS IN MODAL SECTION //
    $("#btnAddCirculars").click(function(){
        $("#newCircularsModal").modal({backdrop: false});
    });

    /* ADD NEW IMPORTANTS LINK JQUERY */
    $("#formCircularsRecord").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            method:"post",
            url:base_url+"circulars/save_circulars",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(data){
                //alert(data);
                if(data=="saved"){
                    window.location.href=base_url+"circulars";
                }else if(data=="failed"){
                    window.location.href=base_url+"circulars";
                }else if(data=="blank"){
                    window.location.href=base_url+"circulars";
                }else{

                }
            }
        });
    });
    //VIEW FOR UPDATE CIRCULARS //
    $(".updateCircular").click(function(){
        
        var crcl_id = $(this).attr("updateCrcl");
        $.ajax({
            method:"post",
            url:base_url+"circulars/get_circulars_detail",
            data:{crcl_id:crcl_id},
            dataType:"json",
            success:function(data){
                //console.log(data);
                $("#updateCircularsModal").modal({backdrop: false});

                $("#circulars_id").val(data.crcl_info.crcl_id);
                $("#circulars_name_update").val(data.crcl_info.crcl_name);
                $("#status_update option[value="+data.crcl_info.crcl_status+"]").prop('selected', true);
            }
        });
    });
    // UPDATE CIRCULARS //
    $("#updateFormCircularsRecord").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            method:"post",
            url:base_url+"circulars/update_circulars",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(data){
                //alert(data);
                if(data=="saved"){
                    window.location.href=base_url+"circulars";
                }else if(data=="failed"){
                    window.location.href=base_url+"circulars";
                }else if(data=="blank"){
                    window.location.href=base_url+"circulars";
                }else{

                }
            }
        });
    });

    // CHANGE CIRCULARS STATUS //
    $(".crclStatusOff").click(function(){
        var crclIdOff  = $(this).attr("crclStatusOff");
        var crclValOff = $("#crclStatusOff").val(); 
        $.ajax({
            method:"post",
            url:base_url+"circulars/circulars_status_off",
            data:{crclIdOff:crclIdOff,crclValOff:crclValOff},
            success: function(data){
                if(data=="Off"){
                    $("#switch"+crclValOff).show();
                }else{

                }
            }
        });
    });

    $(".crclStatusOn").click(function(){
        var crclIdOn  = $(this).attr("crclStatusOn");
        var crclValOn = $("#crclStatusOn").val(); 
        $.ajax({
            method:"post",
            url:base_url+"circulars/circulars_status_on",
            data:{crclIdOn:crclIdOn,crclValOn:crclValOn},
            success: function(data){
                if(data=="On"){
                    $("#switch"+crclValOn).show();
                }else{

                }
            }
        });
    });

});