<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Create Notification Templates</h4>
    </div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p>
                    <button class="btn btn-danger" id="addTemplatesBtn"><i class="fa fa-plus"></i> Add Notification Template</button>
                    <a href="<?php echo base_url('super/notifications');?>" class="btn btn-success">Notification Log</a>
                </p>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <h4>Notification Templates</h4>
                        <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                          <?php echo $this->session->flashdata('message'); ?>
                        <?php } ?>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; foreach($templates as $templates_list){ ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $templates_list->tmpl_name;?></td>
                                        <td>
                                            <?php 
                                              $ago = '';
                                              $sec = time() - $templates_list->tmpl_timestamp;
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
                                            <?php echo $templates_list->tmpl_descriptions.'<br />'."<span style='color: #e77338;font-weight:600;'><i>".$ago." ago</i></span>";?>
                                         <td>
                                            <a onclick="return confirm('are you sure want to delete!.');" href="<?php echo base_url('super/notifications/deleteTemplate');?>/<?php echo $templates_list->tmpl_id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Notification Template Modal -->
              <div class="modal fade" id="addTemplates" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content" style="margin-top: 25%;width: 134%;">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">×</button>
                      <h4 class="modal-title">Create Notification Templates</h4>
                      <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                          <?php echo $this->session->flashdata('message'); ?>
                      <?php } ?>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo base_url('super/notifications/addTemplates');?>" class="form-horizontal">
                            <fieldset>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Template Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="template_name" id="template_name" class="form-control" placeholder="Enter Template Name">
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Notification Content</label>
                                    <div class="col-lg-9">
                                        <textarea name="template_description" rows="10" cols="5" class="form-control" placeholder="Template Description"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-5">
                                    <button type="submit" class="btn btn-success" style="margin-left: 46%">Create Templates</button>
                                    <button type="reset" class="btn btn-danger">Clear</button>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
                  
                </div>
              </div>
        </div>
    </div>
</div>