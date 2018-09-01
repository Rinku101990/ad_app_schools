<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Add Classes</h4>
    </div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p><a href="<?php echo base_url('super/classes');?>" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> View Classes List</a></p></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                      <h4>Create New Class</h4>
                      <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                          <?php echo $this->session->flashdata('message'); ?>
                      <?php } ?>
                    </div>
                    <div class="panel-body">
                      <?php if(!empty($classes)){ ?>
                        <form method="post" action="<?php echo base_url('super/classes/update');?>" class="form-horizontal">
                            <fieldset>
                              <div class="form-group col-lg-12">
                                <label class="col-lg-3 control-label">Select School</label>
                                <div class="col-lg-9">
                                  <input type="hidden" name="class_id" id="class_id" value="<?php echo $classes->cls_id?>">
                                  <select class="form-control" name="school_name">
                                    <option>Select School</option>
                                    <?php foreach($schools as $lists){ ?>
                                    <option value="<?php echo $lists->schl_id;?>" <?php echo $lists->schl_id==$classes->schl_id?'selected':''?>><?php echo $lists->schl_name;?></option>
                                  <?php } ?>
                                  </select>
                                </div>
                                </div>
                                <div class="form-group col-lg-12">
                                  <label class="col-lg-3 control-label">Class</label>
                                  <div class="col-lg-9">
                                      <input type="text" class="form-control" name="class_name" placeholder="Enter class name" value="<?php echo $classes->cls_name;?>">
                                  </div>
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-6">
                                    <button type="submit" class="btn btn-success" style="margin-left: 100px">Update Class</button>
                                </div>
                            </div>
                        </form>
                      <?php }else{?>
                        <form method="post" action="<?php echo base_url('super/classes/create');?>" class="form-horizontal">
                            <fieldset>
                              <div class="form-group col-lg-12">
                                <label class="col-lg-3 control-label">Select School</label>
                                <div class="col-lg-9">
                                  <select class="form-control" name="school_name">
                                    <option>Select School</option>
                                    <?php foreach($schools as $lists){ ?>
                                    <option value="<?php echo $lists->schl_id;?>"><?php echo $lists->schl_name;?></option>
                                  <?php } ?>
                                  </select>
                                </div>
                                </div>
                                <div class="form-group col-lg-12">
                                  <label class="col-lg-3 control-label">Class</label>
                                  <div class="col-lg-9">
                                      <input type="text" class="form-control" name="class_name" placeholder="Enter class name">
                                  </div>
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-6">
                                    <button type="submit" class="btn btn-success" style="margin-left: 102px">Create Class</button>
                                </div>
                            </div>
                        </form>
                      <?php } ?>
                    </div>
                </div>
            </div>
          </div>
    </div>
</div>