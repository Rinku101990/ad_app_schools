<div class="top-bar clearfix">
    <div class="page-title">
      <h4>Notification History</h4>
    </div>
</div>
<div class="main-container">
  <div class="container-fluid">
    <div class="row gutter">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p class="pull-right"><a href="<?php echo base_url('super/notifications');?>" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> All Notification</a></p></div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="well">
            <h2 class="text-grey no-margin">Notification Detail</h2><br>
              <p>- <b>Sent By</b>: <?php echo $details->ntfn_sender_ref_id;?>
                <br>- <b>Date</b>: <?php $new_date = date('d M-Y h:i A', strtotime($details->ntfn_created)); echo $new_date;?>
                <br>- <b>Sent to</b>: <?php echo $details->roles_name; ?>

                <?php foreach($class as $class_list){ ?>
                  <?php if(($details->cls_id)==($class_list->cls_id)){ ?>
                    <br>- <b>Class</b>: <?php echo $class_list->cls_name; ?>
                  <?php }else{?>
                  <?php } ?>
                <?php } ?>

                <?php foreach($section as $section_list){ ?>
                  <?php if(($details->sect_id)==($section_list->sect_id)){ ?>
                    <br>- <b>Section</b>: <?php echo $section_list->sect_name; ?>
                  <?php }else{?>
                  <?php } ?>
                <?php } ?>

                <br>- <b>Notification Type</b>: <?php echo $details->tmpl_name;?>
                <br>
              </p>
              <p><?php echo $details->ntfn_notification_message;?></p>
            <hr>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="panel panel-grey">
            <div class="panel-heading">
              <h4>Notification</h4>
            </div>
            <div class="panel-body">
              <ul class="message-wrapper">
              <?php foreach($recipients as $recipients_list){ ?>
                <li>
                  <span class="empty-avatar blue">EQ</span>
                  <div class="message"><span class="arrow"></span> <a href="#" class="name"><?php echo $recipients_list->receiver_id;?>(<?php echo $recipients_list->tmpl_name;?>)</a> <span class="date-time"><?php $new_date = date("F j, Y, g:i a", strtotime($recipients_list->ntfn_created)); echo $new_date;?></span>
                    <div class="body"> <?php echo $recipients_list->ntfn_notification_message;?>
                      <span class="fa-stack fa-lg text-success">
                      <i class="fa fa-check fa-stack-1x" style="margin-left:4px"></i>
                      <i class="fa fa-check fa-inverse fa-stack-1x" style="margin-left:-3px;"></i>
                      <i class="fa fa-check  fa-stack-1x" style="margin-left:-4px"></i>
                      </span>
                    </div>
                  </div>
                </li>
              <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div
