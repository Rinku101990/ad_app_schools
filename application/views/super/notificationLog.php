<div class="top-bar clearfix">
    <div class="page-title">
      <h4>Notification History</h4>
    </div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p class="pull-left"><a href="<?php echo base_url('super/notifications/send');?>" class="btn btn-danger"><i class="fa fa-plus"></i> Send Notification</a></p></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-blue">
                    <div class="panel-heading">
                        <h4>Notification History</h4></div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                      <th>Notification Type</th>
                                      <th>Description</th>
                                      <th>Sent date</th>
                                      <th>Sent To</th>
                                      <th>Sent By</th>
                                      <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($notify as $notify_list){ ?>
                                  <tr>
                                    <td><?php echo $notify_list->tmpl_name;?></td>
                                    <td>
                                      <?php 
                                        $ago = '';
                                        $sec = time() - $notify_list->ntfn_timestamp;
                                        $year = (int) ($sec / 31556926);
                                        $month = (int) ($sec / 2592000);
                                        $day = (int) ($sec / 86400);
                                        $hou = (int) ($sec / 3600);
                                        $min = (int) ($sec / 60);
                                        if ($year > 0) {
                                            $ago = $year . ' year(s)';
                                        } else if ($month > 0) {
                                            $ago = $month . ' month(s)';
                                        } else if ($day > 0) {
                                            $ago = $day . ' day(s)';
                                        } else if ($hou > 0) {
                                            $ago = $hou . ' hour(s)';
                                        } else if ($min > 0) {
                                            $ago = $min . ' minute(s)';
                                        } else {
                                            $ago = $sec . ' second(s)';
                                        }
                                      ?>
                                      <?php echo $notify_list->ntfn_notification_message.'<br />'."<span style='color: #e77338;font-weight:600;'><i>".$ago." ago</i></span>";?>
                                    </td>
                                    <td>
                                      <?php $new_date = date('d M-Y h:i A', strtotime($notify_list->ntfn_created));?>
                                      <?php echo $new_date;?>
                                    </td>
                                    <td>
                                    <?php foreach($roles as $lists){ ?>
                                      <?php if(($notify_list->roles_id)==($lists->roles_id)){ ?>
                                        <?php echo $lists->roles_name;?>
                                      <?php } ?>
                                    <?php } ?>
                                    </td>
                                    <td><?php echo $notify_list->ntfn_sender_ref_id;?></td>
                                    <td>
                                      <a href="<?php echo base_url('super/notifications/detail');?>/<?php echo $notify_list->ntfn_id;?>/<?php echo $notify_list->roles_id;?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> </a>
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
    </div>
