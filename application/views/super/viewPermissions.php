<div class="top-bar clearfix">
    <div class="page-title">
      <h4>Permissions</h4>
    </div>
</div>
<div class="main-container">
  <div class="container-fluid">
    <div class="row gutter">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3">
        <div class="form-group col-lg-12">
          <div class="col-lg-12">
            <select class="selectpicker form-control" id="permission_role" data-container="body" data-live-search="true" title="select a role">
              <option value="" disabled="disabled">Select Role</option>
              <?php foreach($roles as $roles_list){ ?>
                <option value="<?php echo $roles_list->roles_id;?>" <?php echo $roles_list->roles_id==$role_id?'selected':''?>><?php echo $roles_list->roles_name;?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-lg-12 col-lg-offset-2" style="margin-top: -110px">
            <div id="permission_loader"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="menu_permission">
        <div class="panel panel-blue ">
          <form method="post" action="<?php echo base_url('super/permissions/save');?>">
          <div class="panel-body">
            <input type="hidden" name="role_id" value="<?php echo $role_id;?>">
            <div class="table-responsive">
              <table class="table table-bordered no-margin " cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th style="width:5%">#</th>
                    <th style="width:23%">Module Name</th>
                    <th style="width:18%">Add</th>
                    <th style="width:18%">Edit</th>
                    <th style="width:18%">Delete</th>
                    <th style="width:18%">View</th>
                  </tr>
                </thead>
              </table>

              <?php if(!empty($menu_list)){ ?>

                <?php $i=1; foreach($role_menu_permission as $roleMenuP){ 
                  $rolesP[$roleMenuP->menu_id] = $roleMenuP;
                }//print_r($rolesP);?>

                <?php foreach($menu_list as $menus){ 

                  $addPermission = $editPermission = $deletePermission = $viewPermission = '';

                  $addPermission    = (isset($rolesP[$menus->menu_id]->prms_add))?$rolesP[$menus->menu_id]->prms_add:0;
                  $editPermission   = (isset($rolesP[$menus->menu_id]->prms_edit))?$rolesP[$menus->menu_id]->prms_edit:0;
                  $deletePermission = (isset($rolesP[$menus->menu_id]->prms_delete))?$rolesP[$menus->menu_id]->prms_delete:0;
                  $viewPermission   = (isset($rolesP[$menus->menu_id]->prms_view))?$rolesP[$menus->menu_id]->prms_view:0;

                ?>
                  <table class="table table-bordered no-margin" cellspacing="0" width="100%">
                    <thead>
                      <?php if(!isset($menus->menu_id) || $menus->menu_id=="" || $menus->menu_id==0 || $menus->menu_parent_id=='0'){ ?>
                      <tr><td colspan="7"></td></tr>                 
                      <tr style="background-color:#dadfe2">
                        <th style="width:5%"></th>
                        <th colspan="5"><?php echo $menus->menu_name;?></th>
                        <input type="hidden" name="menu_id[]" value="<?php echo $menus->menu_id;?>">
                        <th width="175">
                          <input style="height: 20px;margin-left: -12px;"  type="checkbox" id="checkall" name="view_permission<?=$menus->menu_id?>" value="1" data-parent="<?=$menus->menu_id?>" class="form-control " <?php echo ($viewPermission==1?'checked' : '');?> <?php if($viewPermission==1) echo 'onchange="deSelectPerm('.$menus->menu_id.')"'; else echo 'onchange="selectPerm('.$menus->menu_id.')"'; ?>>
                        </th>
                      <tr>
                      <?php } ?>
                    </thead>
                    <tbody>
                    <?php if($menus->menu_parent_id!='0'){ ?>
                      <tr>
                        <td style="width:5%"><!-- <input type="checkbox" value="0" id="check2" name="all_permission"> --> </td>
                        <td style="width:23%"><?php echo $menus->menu_name;?></td>
                        <input type="hidden" name="menu_id[]" value="<?php echo $menus->menu_id;?>">
                        <td style="width:18%">
                          <input type="checkbox" style="height: 20px;" name="add_permission<?=$menus->menu_id;?>" value="1" class="form-control checkitem" <?php echo ($addPermission==1?'checked' : '');?> data-id="<?php echo $menus ->menu_id; ?>">
                        </td>
                        <td style="width:18%">
                          <input style="height: 20px;"  type="checkbox" name="edit_permission<?=$menus->menu_id;?>" value="1" class="form-control checkitem" <?php echo ($editPermission==1?'checked' : '');?> data-id="<?php echo $menus ->menu_id; ?>">
                        </td>
                        <td style="width:18%">
                          <input style="height: 20px;"  type="checkbox" name="delete_permission<?=$menus->menu_id;?>" value="1" class="form-control checkitem" <?php echo ($deletePermission==1?'checked' : '');?> data-id="<?php echo $menus ->menu_id; ?>">
                        </td>
                        <td style="width:18%">
                          <input style="height: 20px;"  type="checkbox" name="view_permission<?=$menus->menu_id;?>" value="1" class="form-control checkitem" <?php echo ($viewPermission==1?'checked' : '');?>  data-id="<?php echo $menus ->menu_id; ?>">
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                <?php } ?>

              <?php } ?>

            </div>
            <br />
            <input type="submit" class="btn btn-info pull-right" value="Save Permission">
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>