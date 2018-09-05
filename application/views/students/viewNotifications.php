<div class="top-bar clearfix">
    <div class="page-title">
      <h4>Notification History</h4>
    </div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-blue">
                    <div class="panel-heading">
                        <h4>Notification History</h4></div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                      <th>Notification Name</th>
                                      <th>Description</th>
                                      <th>Sent date</th>
                                      <th>Sent By</th>
                                      <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($notify_list as $notifications){ ?>
                                  <tr>
                                    <td><?php echo $notifications->tmpl_name;?></td>
                                    <td><?php echo $notifications->ntfn_notification_message;?></td>
                                    <td>
                                      <?php $new_date = date('d M-Y h:i A', strtotime($notifications->rpnt_created));?>
                                      <?php echo $new_date;?>
                                    </td>
                                    <td><?php echo $notifications->ntfn_sender_ref_id;?></td>
                                    <td>
                                      <a href="<?php echo base_url('students/notifications/detail');?>/<?php echo $notifications->rpnt_id;?>/<?php echo $notifications->receiver_role;?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> </a>
                                    </td>
                                  </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
