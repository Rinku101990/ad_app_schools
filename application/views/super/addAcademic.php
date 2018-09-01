<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Manage Academic Year</h4></div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p><a href="<?php echo base_url('super/academic');?>" class="btn btn-danger btn-xs"><i class="fa fa-plus"></i> View Academic Years</a></p></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <h4>Create New Academic Year</h4>
                        <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                            <?php echo $this->session->flashdata('message'); ?>
                        <?php } ?>
                    </div>
                    <div class="panel-body">
                        <?php if(!empty($year_update)){ ?>
                        <form method="post" action="<?php echo base_url('super/academic/update');?>" class="form-horizontal">
                            <fieldset>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-5 control-label">To</label>
                                    <div class="col-lg-7">
                                        <input type="hidden" name="year_id" id="year_id" value="<?php echo $year_update->acad_id;?>">
                                        <input type="date" class="form-control" name="udate_to" id="date_to" placeholder="Ex: 2018-2019" value="<?php echo $year_update->acad_start_year;?>">
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-5 control-label">From</label>
                                    <div class="col-lg-7">
                                        <input type="date" class="form-control" name="udate_from" id="date_from" placeholder="Ex: 2018-2019" value="<?php echo $year_update->acad_end_year;?>">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-6">
                                    <button type="submit" class="btn btn-success" style="margin-left: 30%">Update Academic</button>
                                </div>
                            </div>
                        </form>
                        <?php }else{ ?>
                        <form method="post" action="<?php echo base_url('super/academic/save');?>" class="form-horizontal">
                            <fieldset>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-5 control-label">To</label>
                                    <div class="col-lg-7">
                                        <input type="date" class="form-control" name="date_to" id="date_to" placeholder="Ex: 2018-2019">
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-5 control-label">From</label>
                                    <div class="col-lg-7">
                                        <input type="date" class="form-control" name="date_from" id="date_from" placeholder="Ex: 2018-2019">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-6">
                                    <button type="submit" class="btn btn-success" style="margin-left: 30%">Create Academic</button>
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