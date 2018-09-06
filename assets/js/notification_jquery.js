$(document).ready(function(){
    var base_url = "http://localhost/schools_app/super/"
    // ADD NOTIFICATION TEMPLATES MODAL //
    $("#myBtn2").click(function(){
        $("#myModal2").modal({backdrop: false});
    });

    // GET NO OF RECIPIENT TO SEND NOTIFICATION //
    $("#role_id").on("change", function(){
        var role_id = $(this).val();
        //alert(tmplate_id);
        if(role_id != ''){
                $.ajax({
                url:base_url+"notifications/get_recipient",
                method:"post",
                data:{role_id:role_id},
                dataType:"json",
                success: function(data){
                    //console.log(data.recipients[0].stud_id);

                    if(data.recipients[0].roles_id==role_id && data.recipients[0].tchr_id){
                        // GET TEACHERS LIST BY ROLE ID //
                        var i=0;
                        var prHtm='';
                        prHtm +='<option disabled>Please Select</option>';
                        for(var key in data.recipients){
                            prHtm +='<option value="'+data.recipients[i].tchr_id+'">'+data.recipients[i].tchr_name+'</option>';
                            i++;
                        }
                        $("#div_classes").hide();
                        $("#div_recipient").show();
                        $("#recipient_id").html(prHtm);

                    }else if(data.recipients[0].roles_id==role_id && data.recipients[0].prnt_id){
                        // GET PARENTS LIST BY ROLE ID //
                        var i=0;
                        var prHtm='';
                        prHtm +='<option disabled>Please Select</option>';
                        for(var key in data.recipients){
                            prHtm +='<option value="'+data.recipients[i].prnt_id+'">'+data.recipients[i].prnt_gaurdian_name+'</option>';
                            i++;
                        }
                        $("#div_classes").hide();
                        $("#div_recipient").show();
                        $("#recipient_id").html(prHtm);

                    }else if(data.recipients[0].cls_id){
                        // GET STUDENTS LIST BY ROLE ID //
                        var i=0;
                        var clsHtm='';
                        clsHtm +='<option disabled>Please Select</option>';
                        for(var key in data.recipients){
                            clsHtm +='<option value="'+data.recipients[i].cls_id+'">'+data.recipients[i].cls_name+'</option>';
                            i++;
                        }
                        $("#div_recipient").hide();
                        $("#div_classes").show();
                        $("#class_name_id").html(clsHtm);

                    }else if(data.recipients[0].roles_id!=role_id){
                       alert("Record not found in databade!.");
                    }else{

                    }
                }
            });
        }
        return false;
    });
    // GET SECTION LIST BY CLASS ID //
    $("#class_name_id").on("click", function(){
        var cls_id = $(this).val();
        $("#div_sections").show();
        //alert(cls_id);
        if(cls_id != ''){
                $.ajax({
                url:base_url+"notifications/get_sections_content",
                method:"post",
                data:{cls_id:cls_id},
                dataType:"json",
                success: function(data){
                    //console.log(data.sections[0].cls_id);
                    if(data.sections!=''){
                        var i=0;
                        var sectHtm='';
                        sectHtm +='<option disabled>Please Select</option>';
                        for(var key in data.sections){
                            sectHtm +='<option value="'+data.sections[i].sect_id+'">'+data.sections[i].sect_name+'</option>';
                            i++;
                        }
                        $("#div_recipient").hide();
                        $("#section_name_id").html(sectHtm);
                    }else if(data.sections==''){
                        alert("Section Record no Found!.");
                    }else{

                    }
                }
            });
        }
        return false;
    });
    // GET STUDENTS LIST BY SECTION ID //
    $("#section_name_id").on("change", function(){
        var sect_id = $(this).val();
        //alert(cls_id);
        if(sect_id != ''){
                $.ajax({
                url:base_url+"notifications/get_students_list",
                method:"post",
                data:{sect_id:sect_id},
                dataType:"json",
                success: function(data){
                    //console.log(data.students);
                    if(data.students!=''){
                        var i=0;
                        var stdHtm='';
                        stdHtm +='<option disabled>Please Select</option>';
                        for(var key in data.students){
                            stdHtm +='<option value="'+data.students[i].stud_id+'">'+data.students[i].stud_name+'</option>';
                            i++;
                        }
                        $("#div_recipient").show();
                        $("#recipient_id").html(stdHtm);
                    }else if(data.students==''){
                        alert("Students Record no Found!.");
                    }else{

                    }
                }
            });
        }
        return false;
    });
    // GET NOTIFICATION TYPE //
    $("#recipient_id").on("change", function(){
        var rcpnt_id = $(this).val();
        if(rcpnt_id !=''){
            $("#noti_type").show();
        }else{
            $("#noti_type").hide();
        }
    });
    // GET NOTIFICATION CONTENT BY TEMPLATE NAME //
    $("#notification_type").on("change", function(){
        var tmplate_id = $(this).val();
        //alert(tmplate_id);
        if(tmplate_id != ''){
                $.ajax({
                url:base_url+"notifications/get_templates_content",
                method:"post",
                data:{tmplate_id:tmplate_id},
                dataType:"json",
                success: function(data){
                    //console.log(data.description.tmpl_descriptions);
                    $("#noti_content").show();
                    $("#notification_content").val(data.description.tmpl_descriptions);
                }
            });
        }
        return false;
    });
    // SELECT MULTIPLE RECIPIENT FOR NOTIFICATION //
    // $(function() {

    //     $('#recipient_id').multiselect({

    //     includeSelectAllOption: true

    //     });
    // });
});