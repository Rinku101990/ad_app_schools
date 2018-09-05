<div class="top-bar clearfix">
    <div class="page-title">
      <h4>Notification History</h4>
    </div>
</div>
<div class="main-container">
  <div class="container-fluid">
    <div class="row gutter">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p class="pull-right"><a href="<?php echo base_url('students/notifications/log');?>" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> All Notification</a></p></div>
        <?php if(!empty($notify_detail)){ ?>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="well">
            <h2 class="text-grey no-margin">Notification Detail</h2><br>
              <p>- <b>Sent By</b>: <?php echo $notify_detail->ntfn_sender_ref_id;?>
                <br>- <b>Date</b>: <?php $new_date = date('d M-Y h:i A', strtotime($notify_detail->rpnt_created)); echo $new_date;?>
                <br>- <b>Notification Type</b>: <?php echo $notify_detail->tmpl_name;?>
                <br>
              </p>
              <p><?php echo $notify_detail->ntfn_notification_message;?></p>
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
                <li>
                  <span class="empty-avatar blue">EQ</span>
                  <div class="message"><span class="arrow"></span> <a href="#" class="name"><?php echo $notify_detail->tmpl_name;?></a> <span class="date-time"><?php $new_date = date("F j, Y, g:i a", strtotime($notify_detail->rpnt_created)); echo $new_date;?></span>
                    <div class="body"> <?php echo $notify_detail->ntfn_notification_message;?>
                      <span class="fa-stack fa-lg text-success">
                      <i class="fa fa-check fa-stack-1x" style="margin-left:4px"></i>
                      <i class="fa fa-check fa-inverse fa-stack-1x" style="margin-left:-3px;"></i>
                      <i class="fa fa-check  fa-stack-1x" style="margin-left:-4px"></i>
                      </span>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
