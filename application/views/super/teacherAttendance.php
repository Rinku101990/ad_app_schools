<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Teachers Attendance</h4></div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
          <div class="col-lg-6">
              <a href="<?php echo base_url('super/teacherAttendance/add');?>" class="btn btn-danger pull-left"><i class="fa fa-plus"></i> Add Attendance </a>

              <div class="clearfix"></div>
              <br>
          </div>

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
              <div class="form-group">

                  <div class="col-lg-3">
                      <select class="form-control" name="country" data-bv-field="country">
                          <option value="">-- School --</option>
                          <option value="fr">DPS Delhi</option>
                          <option value="de">SMP, bareilly</option>
                      </select>
                  </div>


                  <div class="col-lg-3">
                      <input class="form-control" type="date" name="" value="">
                  </div>

                  <div class="col-lg-2">
                      <button type="submit" class="btn btn-info">Search</button>
                  </div>
                  <div class="clearfix"></div>
              </div>
          </div>
            <div class="clearfix"></div>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="panel panel-brown">
                            <div class="panel-heading">
                                <h4>Attendance Status Information</h4></div>
                            <div class="panel-body">
                                <ul class="list-group no-margin">
                                    <li class="list-group-item "><a href="#">Total Students<span class="badge red-bg pull-right">80</span></a></li>
                                    <li class="list-group-item "><a href="#">Present  <span class="badge green-bg pull-right">65</span></a></li>
                                    <li class="list-group-item "><a href="#">Absent <span class="badge blue-bg pull-right">7</span></a></li>
                                    <li class="list-group-item "><a href="#">Leave <span class="badge yellow-bg pull-right">3</span></a></li>
                                    <li class="list-group-item "><a href="#">Late <span class="badge grey-bg pull-right">5</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="panel panel-brown">
                            <div class="panel-heading">
                                <h4>Attendance abbreviations</h4></div>
                            <div class="panel-body">
                                <ul class="list-group no-margin">
                                    <li class="list-group-item "><a href="#">Present<span class="badge blue-bg pull-right">P</span></a></li>
                                    <li class="list-group-item "><a href="#">Absent  <span class="badge red-bg pull-right">A</span></a></li>
                                    <li class="list-group-item "><a href="#">Half Day <span class="badge green-bg pull-right">HD</span></a></li>
                                    <li class="list-group-item "><a href="#">Late Present<span class="badge yellow-bg pull-right">LP</span></a></li>
                                    <li class="list-group-item "><a href="#">Leave <span class="badge grey-bg pull-right">L</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-blue">
                    <div class="panel-heading">
                        <h4>Teachers Attendance</h4>
                      </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Type</th>
                                        <th>Subject</th>
                                        <th>Reason</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <td>1. </td>
                                      <td>Lavish Gangwar</td>
                                      <td>P</td>
                                      <td>-</td>
                                      <td>-</td>
                                      <td>-</td>
                                      <td>
                                        <button type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> </button>
                                         <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-bell"></i> </button>
                                         <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-mobile"></i> </button>

                                       </td>

                                    </tr>

                                    <tr>
                                      <td>1. </td>
                                      <td>Lavish Gangwar</td>
                                      <td>A</td>
                                      <td>Whole Day</td>
                                      <td>All Subjects</td>
                                      <td>No Information</td>
                                      <td>
                                        <button type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> </button>
                                         <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-bell"></i> </button>
                                         <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-mobile"></i> </button>

                                       </td>

                                    </tr>
                                    <tr>
                                      <td>1. </td>
                                      <td>Lavish Gangwar</td>
                                      <td>LP</td>
                                      <td>Queue</td>
                                      <td>-</td>
                                      <td>Traffic Issue</td>
                                      <td>
                                        <button type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> </button>
                                         <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-bell"></i> </button>
                                         <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-mobile"></i> </button>

                                       </td>

                                    </tr>
                                </tbody>



                                <tfoot>
                                    <tr>
                                      <th colspan="7">
                                         <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-bell"></i> Send Notification</button>
                                         <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-mobile"></i> Send SMS</button>
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
