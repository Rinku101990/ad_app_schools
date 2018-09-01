<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Leaves Types</h4></div>
</div>
<div class="main-container">
    <div class="container-fluid">
      <div class="row gutter">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p><a href="<?php echo base_url('super/Leaves/leaveType');?>" class="btn btn-danger"><i class="fa fa-eye"></i> Leave Types</a></p></div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="panel panel-yellow">
                          <div class="panel-body">
                              <form method="post" class="form-horizontal bv-form" novalidate="novalidate">

                                  <fieldset>
                                      <legend>Leave Type Details</legend>
                                      <div class="form-group has-feedback">
                                          <label class="col-lg-4 control-label">Leave Type</label>
                                          <div class="col-lg-8">
                                              <input type="text" class="form-control" name="username" data-bv-field="username" placeholder="Ex: Medical Leave">
                                          </div>
                                      </div>

                                      <div class="form-group has-feedback">
                                          <label class="col-lg-4 control-label">Leave Description</label>
                                          <div class="col-lg-8">
                                              <textarea class="form-control" name="username" data-bv-field="username"></textarea>
                                          </div>
                                      </div>
                                  </fieldset>


                                  <div class="form-group">
                                      <div class="col-lg-6 col-lg-offset-6">
                                          <button type="submit" class="btn btn-success">Submit</button>
                                          <button type="reset" class="btn btn-danger">Cancel</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>

              </div>
    </div>
</div>
