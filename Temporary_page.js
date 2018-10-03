if(data.tmtl_result!=''){
    var i=0;
    var prHtm='';
    prHtm += '<div class="tabbable">';
    for(var key in data.tmtl_result){
        prHtm += '<ul class="nav nav-tabs">';
        prHtm += '<li class="active"><a href="#'+data.tmtl_result[i].tmtl_id+'" data-toggle="tab">'+data.tmtl_result[i].sect_name+'</a></li>';
        prHtm += '</ul>';
        prHtm += '<div class="tab-content no-margin">';
        prHtm += '<div class="tab-pane active" id="one">';
        prHtm += '<div class="panel-body">';
        prHtm += '<div class="table-responsive center-text">';
        prHtm += '<center>';
        prHtm += '<table class="table table-bordered no-margin" cellspacing="0" width="100%">';
        prHtm += '<tbody class="center-text">';
        prHtm += '<tr class="center-text">';
        prHtm += '<td>'+data.tmtl_result[i].tmtl_days+'</td>';
        prHtm += '<td><p>'+data.tmtl_result[i].tmtl_time_from+' to '+data.tmtl_result[i].tmtl_time_to+' </p><p>Section: '+data.tmtl_result[i].sect_name+'</p><p>Class: '+data.tmtl_result[i].cls_name+'</p><p>Teacher: '+data.tmtl_result[i].tchr_name+'</p><p><button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button><button class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></button></p>';
        prHtm += '</td>';
        prHtm += '</tr>';
        prHtm += '</tbody>';
        prHtm += '</table>';
        prHtm += '</center>';
        prHtm += '</div>';
        prHtm += '</div>';
        prHtm += '</div>';
        prHtm += '</div>';
        prHtm += '</div>';
        
        i++;
    }
        
    $("#timeTableResult").html(prHtm);
}else{
    $("#timeTableResult").html('<tr><td colspan="9"><center>No matching records found</center></td></tr>');
}

TIME TABLE
    SCHOOL ID
    CLASS ID
    SECTION ID
    AVAILABLE DAYS

    SECTION NAME
        DAYS-MONDAY
            "09:30 AM",
            "10:30 AM",
            "11:30 AM",
            "12:30 PM",
            "LUNCH TIME",
            "01:30 PM",
            "02:30 PM",
            "03:30 PM"
            "CLOSE",
