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
              <option value="" disabled>Select Role</option>
              <?php foreach($roles as $roles_list){ ?>
                <option value="<?php echo $roles_list->roles_id;?>"><?php echo $roles_list->roles_name;?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-lg-12 col-lg-offset-2" style="margin-top: -110px">
              <div id="permission_loader"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>