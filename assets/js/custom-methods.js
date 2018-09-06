$(document).ready(function(){
	var base_url = "http://localhost/schools_app/super/"
	// GET CLASS LIST BY SCHOOL ID //
	$("#school_id").on("change", function(){
		var shoolid = $(this).val();
		if(shoolid != ''){
                $.ajax({
                url:base_url+"students/getClassListBySchoolId/"+shoolid,
                method:"post",
                dataType:"json",
                success: function(data){
                    //console.log(data);
                    var i=0;
                    var prHtm='';
                    prHtm +='<option disabled>-- Select a class --</option>';
                    for(var key in data){
                        prHtm +='<option value="'+data[i].cls_id+'">'+data.cls_name+'</option>';
                        i++;
                    }
                    $("#class_id").html(prHtm);
                }
            });
        }
        return false;
	});
});