$(document).ready(function(){
    var base_url = "http://localhost/schools_app/super/"
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

});