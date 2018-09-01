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
                    //console.log(data.recipient_list[0].roles_id);
                	var i=0;
	                var prHtm='';
                    prHtm +='<option>Please Select</option>';
	                for(var key in data.recipient_list){
	                    prHtm +='<option value="'+data.recipient_list[i].urs_id+'">'+data.recipient_list[i].urs_name+'</option>';
	                    i++;
	                }
	                $("#div_recipient").show();
	                $("#recipient_id").html(prHtm);
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
});