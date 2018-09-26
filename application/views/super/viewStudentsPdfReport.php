<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
              <div class="panel panel-red">
                <div id="MsgStatus" class="alert alert-success" style="float:right;padding: 15px;margin-right: 17px;font-size: 15px"></div>
                  <div class="panel-body">
                      <div class="tabbable">
                          <ul class="nav nav-tabs">
                              <li class="active"><a href="#all" data-toggle="tab">All</a></li>
                          </ul>
                          <div class="tab-content no-margin">
                            <div class="tab-pane active" id="all">
                              <div class="panel-body">
                                <div class="table-responsive">
                                  <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                                    <thead>
                                      <tr>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Roll No</th>
                                        <th>UserId</th>
                                        <th>Parents</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <!-- <tbody id="searchResult"> -->
                                    <?php foreach($pdf as $pdf_list){ ?>
                                      <tr>
                                        <td>
                                          <?php echo $pdf_list->stud_name;?>
                                        </td>
                                        <td><?php echo $pdf_list->stud_mobile_no;?></td>
                                        <td><?php echo $pdf_list->stud_email;?></td>
                                        <td><?php echo $pdf_list->stud_id;?></td>
                                        <td><?php echo $pdf_list->stud_ref_id;?></td>
                                        <td><?php echo $pdf_list->prnt_gaurdian_name;?></td>

                                        <?php if(($pdf_list->stud_status)=='0'){ ?>
                                        <td>
                                          <label class="switch">
                                            <input type="checkbox" name="status" id="statusOff" class="switch-input statusOff" checked="checked" value="1">
                                            <span class="switch-label" data-on="On" data-off="Off"></span> 
                                            <span class="switch-handle"></span>
                                          </label>
                                        </td>
                                        <?php }else{ ?>
                                        <td>
                                          <label class="switch">
                                            <input type="checkbox" name="status" id="statusOn" class="switch-input statusOn" value="0">
                                            <span class="switch-label" data-on="On" data-off="Off"></span> 
                                            <span class="switch-handle"></span>
                                          </label>
                                        </td>
                                        <?php } ?>
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
                </div>
              </div>
            </div>