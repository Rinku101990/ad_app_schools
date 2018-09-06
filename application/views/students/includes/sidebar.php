<body class="purple">
    <div class="sunrise-loading"></div>
    <div class="vertical-nav">
        <button class="collapse-menu"><i class="icon-dehaze"></i></button>
        <div class="logo">
            <!-- <a href="<?php echo base_url('super/dashboard');?>"><img src="<?php echo base_url('assets/img/logos11.png');?>" alt="Super Admin"></a> -->
        </div>
        <div class="user-info">
            <div class="user-img">
                <?php if(!empty($profile->stud_picture)){ ?>
                    <img src="<?php echo base_url();?>/<?php echo $profile->stud_picture;?>" alt="<?php echo $profile->stud_name;?>">
                    <a href="#" class="likes-info"><i class="icon-person_pin"></i></a>
                <?php }else{ ?>
                    <img src="<?php echo base_url('upload/students/profile/profile.jpg');?>" alt="<?php echo $profile->stud_name;?>">
                    <a href="#" class="likes-info"><i class="icon-person_pin"></i></a>
                <?php } ?>
            </div>
            <h5 class="user-name-o"><?php echo $profile->stud_ref_id;?></h5>
            <p class="profile-complete">Email-<?php echo $profile->stud_email;?></p>
        </div>
        <?php if(!empty($menus)){?>
            <?php foreach($menus as $menu_list){ ?>
                <ul class="menu clearfix">

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Dashboard") {?>
                    <li class="active selected"><a href="<?php echo base_url('students/dashboard');?>"><i class="icon-graphic_eq"></i> <span class="menu-item">Dashboards</span></a></li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Manage Profile") {?>
                    <li><a href="<?php echo base_url('students/profile/edit')?>/<?php echo $profile->stud_id;?>"><i class="fa fa-user"></i> <span class="menu-item"> Manage Profile</span></a></li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Student Attendance") {?>
                    <li><a href="<?php echo base_url('students/academic')?>"><i class="fa fa-area-chart"></i> <span class="menu-item"> Student Attendance</span></a></li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Marks") {?>
                    <li><a href="<?php echo base_url('students/marks')?>"><i class="fa fa-newspaper-o"></i> <span class="menu-item"> Marks</span></a></li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Notications") {?>
                    <li><a href="<?php echo base_url('students/notifications/log')?>"><i class="fa fa-envelope-o"></i> <span class="menu-item"> Notifications</span></a></li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Academic") {?>
                    <li><a href="#"><i class="icon-devices_other"></i> <span class="menu-item">Academic</span> <span class="down-arrow"></span></a>
                        <ul>
                            <li><a href="<?php echo base_url('students/academic');?>">Subjects</a></li>
                            <li><a href="<?php echo base_url('students/academic');?>">Assignments</a></li>
                            <li><a href="<?php echo base_url('students/academic');?>">Routine</a></li>
                        </ul>
                    </li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Students") {?>
                     <li><a href="#"><i class="icon-shopping_basket"></i> <span class="menu-item">Students</span> <span class="down-arrow"></span></a>
                        <ul class="collapse">
                            <li><a href="<?php echo base_url('students/dashboard');?>">Students</a></li>
                        </ul>
                    </li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Parents") {?>
                    <li><a href="<?php echo base_url('students/dashboard');?>"><i class="icon-timeline"></i> <span class="menu-item">Parents</span></a></li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Teachers") {?>
                    <li><a href="<?php echo base_url('students/dashboard');?>"><i class="icon-av_timer"></i> <span class="menu-item">Teachers</span></a></li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Attendance") {?>
                    <li><a href="#"><i class="icon-pie_chart_outlined"></i> <span class="menu-item">Attendance</span> <span class="down-arrow"></span></a>
                        <ul>
                            <li><a href="#">Teachers</a></li>
                            <li><a href="#">Students</a></li>
                            <li><a href="#">Other Employees</a></li>
                            <li><a href="#">Attendance Reports</a></li>
                        </ul>
                    </li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Accounts") {?>
                    <li><a href="#"><i class="icon-shopping_basket"></i> <span class="menu-item">Accounts</span> <span class="down-arrow"></span></a>
                        <ul class="collapse">
                            <li><a href="#">Fees Collection</a></li>
                            <li><a href="#">Expenses Types</a></li>
                            <li><a href="#">All Expenses</a></li>
                            <li><a href="#">Transactions</a></li>
                            <li><a href="#">Transaction Mode</a></li>
                            <li><a href="#">Transaction Reports</a></li>
                        </ul>
                    </li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Human Resources") {?>
                    <li><a href="#"><i class="icon-shopping_basket"></i> <span class="menu-item">Human Resources</span> <span class="down-arrow"></span></a>
                        <ul class="collapse">
                            <li><a href="#">Employees</a></li>
                            <li><a href="#">Salary</a></li>
                            <li><a href="#">Interviews</a></li>
                        </ul>
                    </li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Notifications") {?>
                    <li><a href="#"><i class="icon-shopping_basket"></i> <span class="menu-item">Notifications</span> <span class="down-arrow"></span></a>
                        <ul class="collapse">
                            <li><a href="#">Students</a></li>
                            <li><a href="#">Parents</a></li>
                            <li><a href="#">Teachers</a></li>
                            <li><a href="#">Others</a></li>
                        </ul>
                    </li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Messages") {?>
                    <li><a href="#"><i class="icon-shopping_basket"></i> <span class="menu-item">Messages</span> <span class="down-arrow"></span></a>
                        <ul class="collapse">
                            <li><a href="#">Students</a></li>
                            <li><a href="#">Parents</a></li>
                            <li><a href="#">Teachers</a></li>
                            <li><a href="#">Others</a></li>
                        </ul>
                    </li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Hostel") {?>
                    <li><a href="#"><i class="icon-monochrome_photos"></i> <span class="menu-item">Hostel</span></a></li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Library") {?>
                    <li><a href="#"><i class="icon-monochrome_photos"></i> <span class="menu-item">Library</span></a></li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Transport") {?>
                    <li><a href="#"><i class="fa fa-cab"></i> <span class="menu-item">Transport</span></a></li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Gate Pass") {?>
                    <li><a href="#"><i class="icon-monochrome_photos"></i> <span class="menu-item">Gate Pass</span></a></li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Announcement") {?>
                    <li><a href="<?php echo base_url('students/academic')?>"><i class="fa fa-volume-up"></i> <span class="menu-item"> Announcement</span></a></li>
                    <?php }else{ ?>
                    <?php } ?>

                    <?php if(($menu_list->prms_view)==1 && ($menu_list->menu_name)=="Complain") {?>
                    <li><a href="<?php echo base_url('students/academic')?>"><i class="fa fa-comment"></i> <span class="menu-item"> Complain</span></a></li>
                    <?php }else{ ?>
                    <?php } ?>

                </ul>
            <?php } ?>
            <ul class="menu clearfix">
                <li><a href="<?php echo base_url('welcome/logout');?>"><i class="icon-exit_to_app"></i> <span class="menu-item">Logout</span></a></li>
            </ul>
        <?php } ?>
    </div>