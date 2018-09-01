<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Routes</h4></div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><a href="<?php echo base_url('super/transport/addRoute');?>" class="btn btn-danger"><i class="fa fa-plus"></i> Create New Route</a></div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 pull-right"><div class="form-group has-feedback">

                                            <div class="col-lg-6 pull-right">
                                                <select class="form-control" name="country" data-bv-field="country">
                                                    <option value="">-- Select School --</option>
                                                    <option value="fr">DPS Delhi</option>
                                                    <option value="de">SMP, bareilly</option>

                                                </select><i class="form-control-feedback" data-bv-icon-for="country" style="display: none;"></i>
                                            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="country" data-bv-result="NOT_VALIDATED" style="display: none;">The country is required and can't be empty</small></div>
                                          </div></div>

                                        <div class="clearfix"></div> <br>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-blue">
                    <div class="panel-heading">
                        <h4>Routes</h4></div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" value="None" id="check2" name="check"> All</th>
                                        <th>Route Name</th>
                                        <th>Stops</th>
                                        <th>Status</th>
                                          <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <td><input type="checkbox" value="None" id="check2" name="check"></td>
                                      <td>Noida to Ghaziabad</td>
                                      <td>Sector 62 Noida - 10:30AM, Noida Sector 22 - 11:00 AM</td>
                                      <td><label class="switch">
                          <input type="checkbox" class="switch-input" checked="checked"> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span></label></td>

                          <td>    <button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </button>
                          <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </button></td>
                                    </tr>

                                    <tr>
                                      <td><input type="checkbox" value="None" id="check2" name="check"></td>
                                      <td>Noida to Ghaziabad</td>
                                      <td>Sector 62 Noida - 10:30AM, Noida Sector 22 - 11:00 AM</td>
                                      <td><label class="switch">
                          <input type="checkbox" class="switch-input" checked="checked"> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span></label></td>

                          <td>    <button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </button>
                          <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </button></td>
                                    </tr>

                                    <tr>
                                      <td><input type="checkbox" value="None" id="check2" name="check"></td>
                                      <td>Noida to Ghaziabad</td>
                                      <td>Sector 62 Noida - 10:30AM, Noida Sector 22 - 11:00 AM</td>
                                      <td><label class="switch">
                          <input type="checkbox" class="switch-input" checked="checked"> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span></label></td>

                          <td>    <button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </button>
                          <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </button></td>
                                    </tr>


                                </tbody>



                                <tfoot>
                                    <tr>
                                      <th colspan="5">
                                        <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Disable</button>
                                        <button type="button" class="btn btn-success btn-xs"><i class="fa fa-flag"></i> Enable</button>
                                         <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>

                                    </tr>
                                </tfoot>

                            </table>

                        </div>
                    </div>
                </div>
            </div>

                  </div>
    </div>
</div>
