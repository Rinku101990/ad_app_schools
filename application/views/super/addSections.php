<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Add Section</h4></div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p><a href="<?php echo base_url('super/sections');?>" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> View Sections</a></p></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <h4>Create New Section</h4>
                        <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                          <?php echo $this->session->flashdata('message'); ?>
                        <?php } ?>
                    </div>
                    <div class="panel-body">
                        <?php if(!empty($section_data)){ ?>
                        <form action="<?php echo base_url('super/sections/update');?>" method="post" class="form-horizontal">
                            <fieldset>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Select School</label>
                                    <div class="col-lg-9">
                                        <input type="hidden" name="section_id" id="section_id" value="<?php echo $section_data->sect_id;?>">
                                        <select class="form-control" name="school_name">
                                            <option>Select School</option>
                                            <?php foreach($schools as $school_list){ ?>
                                                <option value="<?php echo $school_list->schl_id;?>" <?php echo $school_list->schl_id==$section_data->schl_id?'selected':''?>><?php echo $school_list->schl_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Select Class</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="class_name">
                                            <option>Select Class</option>
                                            <?php foreach($classes as $classes_list){ ?>
                                                <option value="<?php echo $classes_list->cls_id;?>" <?php echo $classes_list->cls_id==$section_data->cls_id?'selected':''?>><?php echo $classes_list->cls_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Section</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="section_name" placeholder="Enter name of section" value="<?php echo $section_data->sect_name;?>">
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Category</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="category_name">
                                            <option value="best" <?php echo $section_data->sect_category=='best'?'selected':''?>>Best</option>
                                            <option value="average" <?php echo $section_data->sect_category=='average'?'selected':''?>>Average</option>
                                            <option value="good" <?php echo $section_data->sect_category=='good'?'selected':''?>>Good</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Capacity</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="section_capacity" placeholder="Enter section capacity" value="<?php echo $section_data->sect_capacity;?>">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-6">
                                    <button type="submit" class="btn btn-success" style="margin-left: 30px">Update Section</button>
                                    <button type="reset" class="btn btn-danger">Clear</button>
                                </div>
                            </div>
                        </form>
                        <?php }else{ ?>
                        <form action="<?php echo base_url('super/sections/create');?>" method="post" class="form-horizontal">
                            <fieldset>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Select School</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="school_name">
                                            <option>Select School</option>
                                            <?php foreach($schools as $school_list){ ?>
                                                <option value="<?php echo $school_list->schl_id;?>"><?php echo $school_list->schl_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Select Class</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="class_name">
                                            <option>Select Class</option>
                                            <?php foreach($classes as $classes_list){ ?>
                                                <option value="<?php echo $classes_list->cls_id;?>"><?php echo $classes_list->cls_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Section</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="section_name" placeholder="Enter name of section">
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Category</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="category_name">
                                            <option value="best">Best</option>
                                            <option value="average">Average</option>
                                            <option value="good">Good</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Capacity</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="section_capacity" placeholder="Enter section capacity">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-6">
                                    <button type="submit" class="btn btn-success" style="margin-left: 30px">Create Section</button>
                                    <button type="reset" class="btn btn-danger">Clear</button>
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