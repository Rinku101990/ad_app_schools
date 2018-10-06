<div class="top-bar clearfix">
  <div class="page-title">
    <h4>Important Links</h4>
  </div>
</div>
<div class="main-container">
  <div class="container-fluid">
    <div class="row gutter">
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <p><button  type="button" id="btnAddNewLinks" class="btn btn-danger btn-md"><i class="fa fa-plus"></i> Create New Link</button></p>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
        <div class="form-group has-feedback">
          <div class="col-lg-5 pull-right">
            <select class="form-control" name="school_id_link">
              <option value="">Select School</option>
              <?php foreach($schools as $schools_list){ ?>
              <option value="<?php echo $schools_list->schl_id;?>"><?php echo $schools_list->schl_name;?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="clearfix"></div> <br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="panel panel-blue">
            <div class="panel-heading">
              <h4>Important Links</h4>
              <span class="pull-right">
                <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                  <?php echo $this->session->flashdata('message'); ?>
                <?php } ?>
              </span>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Link Title</th>
                      <th>URL</th>
                      <th>Created By</th>
                      <th>Created On</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i=1; foreach($links as $links_list){ ?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $links_list->imprt_name;?></td>
                      <td><a href="<?php echo $links_list->imprt_url;?>" style="color:blue;" target="_blank"><?php echo $links_list->imprt_url;?></a></td>
                      <td><?php echo $links_list->imprt_created_by;?></td>
                      <td><?php echo $links_list->imprt_created;?></td>

                      <?php if(($links_list->imprt_status)=='0'){ ?>
                        <td>
                          <label class="switch" id="switch<?php echo $links_list->imprt_id;?>">
                            <input type="checkbox" name="status" id="imprtStatusOff" imprtStatusOff="<?php echo $links_list->imprt_id;?>" class="switch-input imprtStatusOff" checked="checked" value="1">
                            <span class="switch-label" data-on="On" data-off="Off"></span> 
                            <span class="switch-handle"></span>
                          </label>
                        </td>
                        <?php }else{ ?>
                        <td>
                          <label class="switch" id="switch<?php echo $links_list->imprt_id;?>">
                            <input type="checkbox" name="status" id="imprtStatusOn" imprtStatusOn="<?php echo $links_list->imprt_id;?>" class="switch-input imprtStatusOn" value="0">
                            <span class="switch-label" data-on="On" data-off="Off"></span> 
                            <span class="switch-handle"></span>
                          </label>
                        </td>
                      <?php } ?>

                      <td>    
                        <a onclick="return confirm('Are you sure want to delete');" href="<?php echo base_url('super/importantlinks/remove/');?><?php echo $links_list->imprt_id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
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
<!-- ADD NEW ASSIGNMENTS FOR CLASSES -->
<div class="modal fade" id="newLinksModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="margin-top: 22%;width: 100%;margin-left:12%">
      <div class="modal-header" style="text-align: center">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title" style="margin-left:-70%">Add New Links</h4>
      </div>
      <div class="panel-body">
        <form method="post" id="formImportantLinkRecord" class="form-horizontal" enctype="multipart/form-data">
          <fieldset>
            <div class="row">
              <div class="form-group col-lg-12">
              <label class="col-lg-3 control-label">School</label>
                <div class="col-lg-8">
                  <select class="form-control" name="imprt_school_id" id="imprt_school_id" required="required">
                    <option value="">Select School</option>
                    <?php foreach($schools as $schools_list){ ?>
                    <option value="<?php echo $schools_list->schl_id;?>"><?php echo $schools_list->schl_name;?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>              
            </div>
            <div class="row">
              <div class="form-group col-lg-12">
                <label class="col-lg-3 control-label">Link Title</label>
                <div class="col-lg-8">
                  <input type="text" class="form-control" name="imprt_name" id="imprt_name" placeholder="Enter Link Title">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-12">
                <label class="col-lg-3 control-label">Link URL</label>
                <div class="col-lg-8 ">
                  <input type="url" class="form-control" name="imprt_url" id="imprt_url" placeholder="Example: https://www.google.com/">
                </div>
              </div>
            </div>
          </fieldset>
          <div class="row">
            <div class="form-group">
              <div class="col-lg-4 col-lg-offset-7">
                <button type="submit" class="btn btn-success" style="margin-left:-13px">Save Link</button>
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
    </div>
  </div>
</div>
<!-- END OF THE NEW ASIGNMENT FOR CLASSES -->
