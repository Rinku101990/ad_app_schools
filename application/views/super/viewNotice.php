<div class="top-bar clearfix">
  <div class="page-title">
    <h4>Noticeboard</h4>
  </div>
</div>
<div class="main-container">
  <div class="container-fluid">
    <div class="row gutter">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p><a href="<?php echo base_url('super/noticeboard/add');?>" class="btn btn-danger btn-xs"><i class="fa fa-plus"></i> Add New Notice</a></p></div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="panel panel-blue">
            <div class="panel-heading">
              <h4>Notices List</h4>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th><input type="checkbox" value="None" id="check2" name="check"> All</th>
                      <th>Title</th>
                      <th>Date</th>
                      <th>By</th>
											<th>Description</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="checkbox" value="None" id="check2" name="check"></td>
                      <td>Deewali Notice</td>
                      <td>23/02/2019</td>
                      <td>Admin</td>
											<td>Holi is a Hindu spring festival, originating from the Indian subcontinent, celebrated in India and Nepal, also known as the "festival of colours"</td>
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
                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-file-pdf-o"></i> PDF</button></th>
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