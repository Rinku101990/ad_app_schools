<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Add Holidays</h4></div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p><a href="<?php echo base_url('super/holidays');?>" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> View Holidays List</a></p></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <h4>Create New Holiday</h4></div>
                    <div class="panel-body">
                        <form method="post" action="" class="form-horizontal">
                            <fieldset>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Holiday Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="name" placeholder="Example: Deepawali">
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Start Date</label>
                                    <div class="col-lg-9">
                                        <input type="date" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Till Date</label>
                                    <div class="col-lg-9">
                                        <input type="date" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Description</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" name="name"></textarea>
                                    </div>
                                </div>


                            </fieldset>

                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-6">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


                  </div>
    </div>
</div>