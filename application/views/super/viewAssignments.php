<div class="top-bar clearfix">
  <div class="page-title">
    <h4>Assignments</h4>
  </div>
</div>
<div class="main-container">
  <div class="container-fluid">
    <div class="row gutter">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p><a href="<?php echo base_url('super/assignments/add');?>" class="btn btn-danger btn-xs"><i class="fa fa-plus"></i> Create New Assignment</a></p></div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 pull-right">
            <div class="form-group has-feedback">
              <div class="col-lg-6">
                <select class="form-control" name="country" data-bv-field="country">
                  <option value="">-- Select School --</option>
                  <option value="fr">DPS Delhi</option>
                  <option value="de">SMP, bareilly</option>
                </select>
                <i class="form-control-feedback" data-bv-icon-for="country" style="display: none;"></i>
                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="country" data-bv-result="NOT_VALIDATED" style="display: none;">The country is required and can't be empty</small>
              </div>
              <div class="col-lg-6 pull-right">
                <select class="form-control" name="country" data-bv-field="country">
                  <option value="">-- Select a Class --</option>
                  <option value="fr">One</option>
                  <option value="de">Two</option>
                  <option value="it">Three</option>
                </select>
                <i class="form-control-feedback" data-bv-icon-for="country" style="display: none;"></i>
                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="country" data-bv-result="NOT_VALIDATED" style="display: none;">The country is required and can't be empty</small>
              </div>
            </div>
          </div>
          <div class="clearfix"></div> <br>
          <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
            <div class="panel panel-red">
              <div class="panel-body">
                <div class="tabbable">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#all" data-toggle="tab">All</a></li>
                    <li class=""><a href="#one" data-toggle="tab">Section A</a></li>
                    <li><a href="#three" data-toggle="tab">Section B</a></li>
                  </ul>
                  <div class="tab-content no-margin">
                    <div class="tab-pane active" id="all">
                      <div class="panel-body">
                        <div class="table-responsive">
                          <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th><input type="checkbox" value="None" id="check2" name="check"> All</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Submission Date</th>
                                <th>Assign Date</th>
                                <th>Section</th>
                                <th>Students</th>
                                <th>Assignment File</th>
                                <th>Posted By</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input type="checkbox" value="None" id="check2" name="check"></td>
                                <td>Mathematics Ch1</td>
                                <td>All questions and Answers to be submitted</td>
                                <td>21/08/2018</td>
                                <td>25/08/2018</td>
                                <td>All</td>
                                <td>All</td>
                                <td><a href="http://localhost/schools_app/assets/img/logo.png" class="btn btn-success btn-xs" download=""><i class="fa fa-download"></i> Download</a></td>
                                <td>Admin</td>
                                <td>
                                  <label class="switch">
                                    <input type="checkbox" class="switch-input" checked="checked"> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span>
                                  </label>
                                </td>
                                <td>
                                  <button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </button>
                                  <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </button></td>
                              </tr>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th colspan="5">
                                  <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Disable</button>
                                  <button type="button" class="btn btn-info btn-xs"><i class="fa fa-flag"></i> Enable</button>
                                  <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                  <button type="button" class="btn btn-success btn-xs"><i class="fa fa-file-excel-o"></i> Excel</button>
                                  <button type="button" class="btn btn-default btn-xs"><i class="fa fa-file-pdf-o"></i> PDF</button></th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="one">
                      <div class="panel-body">
                        <div class="table-responsive">
                          <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th><input type="checkbox" value="None" id="check2" name="check"> All</th>
                                <th>Subject Name</th>
                                <th>Author</th>
                                <th>Subject Code</th>
                                <th>Created On</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input type="checkbox" value="None" id="check2" name="check"></td>
                                <td>Mathematics</td>
                                <td>R.D. Verma</td>
                                <td>MATH0023</td>
                                <td>21/08/2018</td>
                                <td>
                                  <label class="switch">
                                    <input type="checkbox" class="switch-input" checked="checked"> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span>
                                  </label>
                                </td>
                                <td>    
                                  <button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </button>
                                  <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </button></td>
                              </tr>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th colspan="5">
                                  <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Disable</button>
                                  <button type="button" class="btn btn-info btn-xs"><i class="fa fa-flag"></i> Enable</button>
                                  <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                  <button type="button" class="btn btn-success btn-xs"><i class="fa fa-file-excel-o"></i> Excel</button>
                                  <button type="button" class="btn btn-default btn-xs"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="three">
                      <div class="panel-body">
                        <div class="table-responsive">
                          <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th><input type="checkbox" value="None" id="check2" name="check"> All</th>
                                <th>Subject Name</th>
                                <th>Author</th>
                                <th>Subject Code</th>
                                <th>Created On</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input type="checkbox" value="None" id="check2" name="check"></td>
                                <td>Mathematics</td>
                                <td>R.D. Verma</td>
                                <td>MATH0023</td>
                                <td>21/08/2018</td>
                                <td>
                                  <label class="switch">
                                    <input type="checkbox" class="switch-input" checked="checked"> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span>
                                  </label>
                                </td>
                                <td>    
                                  <button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </button>
                                  <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </button>
                                </td>
                              </tr>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th colspan="5">
                                  <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Disable</button>
                                  <button type="button" class="btn btn-info btn-xs"><i class="fa fa-flag"></i> Enable</button>
                                  <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                  <button type="button" class="btn btn-success btn-xs"><i class="fa fa-file-excel-o"></i> Excel</button>
                                  <button type="button" class="btn btn-default btn-xs"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </th>
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
        </div>
      </div>
    </div>
  </div>