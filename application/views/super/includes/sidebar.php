<body class="purple">
    <div class="sunrise-loading"></div>
    <div class="vertical-nav">
        <button class="collapse-menu"><i class="icon-dehaze"></i></button>
        <div class="logo">
            <!-- <a href="<?php echo base_url('super/dashboard');?>"><img src="<?php echo base_url('assets/img/logos11.png');?>" alt="Super Admin"></a> -->
        </div>
        <div class="user-info">
            <div class="user-img"><img src="<?php echo base_url('assets/img/admin3.png');?>" alt="Super Admin"></div>
            <h5 class="user-name-o">Super Admin</h5>
            <p class="profile-complete">Email-info@super.admin.com</p>
        </div>
        <ul class="menu clearfix">
            
            <li class="active selected"><a href="<?php echo base_url('super/dashboard');?>"><i class="icon-graphic_eq"></i> <span class="menu-item">Dashboards</span></a></li>
            
            <li><a href="#"><i class="fa fa-university"></i> <span class="menu-item">Academic</span> <span class="down-arrow"></span></a>
                <ul>
                    <li><a href="<?php echo base_url('super/classes');?>">Class</a></li>
                    <li><a href="<?php echo base_url('super/sections');?>">Section</a></li>
                    <li><a href="<?php echo base_url('super/subjects');?>">Subjects</a></li>
                    <li><a href="<?php echo base_url('super/syllabus');?>">Syllabus</a></li>
                    <li><a href="<?php echo base_url('super/timetable');?>">Time Table</a></li>
                    <li><a href="<?php echo base_url('super/assignments');?>">Assignments</a></li>
                    <li><a href="<?php echo base_url('super/importantlinks');?>">Important Links</a></li>
                    <li><a href="<?php echo base_url('super/holidays');?>">Holidays</a></li>
                    <li><a href="<?php echo base_url('super/events');?>">News and Events</a></li>
                    <li><a href="<?php echo base_url('super/noticeboard');?>">Notice Board</a></li>
                </ul>
            </li>
            

			<li><a href="<?php echo base_url('super/students');?>"><i class="fa fa-child"></i> <span class="menu-item">Students</span></a></li>
            
			<li><a href="<?php echo base_url('super/parents');?>"><i class="fa fa-users"></i> <span class="menu-item">Parents</span></a></li>
            
			<li><a href="<?php echo base_url('super/teachers');?>"><i class="fa fa-user-md"></i> <span class="menu-item">Teachers</span></a></li>
            
			<li><a href="#"><i class="fa fa-clock-o"></i> <span class="menu-item">Attendance</span> <span class="down-arrow"></span></a>
                <ul>
                    <li><a href="<?php echo base_url('super/teacherAttendance');?>">Teachers</a></li>
                    <li><a href="<?php echo base_url('super/studentAttendance');?>">Students</a></li>
                    <li><a href="<?php echo base_url('super/employeeAttendance');?>">Other Employees</a></li>
                    <li><a href="#">Attendance Reports</a></li>


                </ul>
            </li>

            <li><a href="#"><i class="fa fa-sign-out"></i> <span class="menu-item">Leave Management</span> <span class="down-arrow"></span></a>
                     <ul class="collapse">
                         <li><a href="<?php echo base_url('super/leaves/leaveType');?>">Leave Types</a></li>
                          <li><a href="<?php echo base_url('super/leaves/');?>">Student Leaves</a></li>
                         <li><a href="<?php echo base_url('super/leaves/leaveTeacherRequests');?>">Teacher Leaves</a></li>
                         <li><a href="<?php echo base_url('super/leaves/leaveEmpRequests');?>">Employee Leaves</a></li>
                     </ul>
            </li>
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
            
            <li><a href="#"><i class="icon-shopping_basket"></i> <span class="menu-item">Human Resources</span> <span class="down-arrow"></span></a>
                <ul class="collapse">
                    <li><a href="#">Employees</a></li>
                    <li><a href="#">Salary</a></li>
                    <li><a href="#">Interviews</a></li>
                </ul>
            </li>
            

            <li><a href="#"><i class="fa fa-bell"></i> <span class="menu-item">Notifications</span> <span class="down-arrow"></span></a>
                <ul class="collapse">
					<li><a href="<?php echo base_url('super/notifications/templates');?>">Notification Templates</a></li>
                    <li><a href="<?php echo base_url('super/notifications');?>">Notification History</a></li>
                    <li><a href="<?php echo base_url('super/notifications/send');?>">Send Notification</a></li>
                </ul>
            </li>

            
            <li><a href="#"><i class="icon-shopping_basket"></i> <span class="menu-item">Messages</span> <span class="down-arrow"></span></a>

            
            <li><a href="#"><i class="icon-monochrome_photos"></i> <span class="menu-item">Hostel</span></a></li>
            
            <li><a href="#"><i class="icon-monochrome_photos"></i> <span class="menu-item">Library</span></a></li>
            
            <li><a href="#"><i class="icon-monochrome_photos"></i> <span class="menu-item">Gate Pass</span></a></li>
            
            <li><a href="#"><i class="fa fa-bus"></i> <span class="menu-item">Transport</span> <span class="down-arrow"></span></a>
				 <ul class="collapse">
					 <li><a href="<?php echo base_url('super/transport/vehicles');?>">Vehicles</a></li>
					 <li><a href="<?php echo base_url('super/transport/drivers');?>">Drivers</a></li>
					 <li><a href="<?php echo base_url('super/transport/route');?>">Routes</a></li>
					 <li><a href="<?php echo base_url('super/transport');?>">Schedules</a></li>
				 </ul>
            </li>
            <li><a href="<?php echo base_url('super/gatepass');?>"><i class="fa fa-ticket"></i> <span class="menu-item">Gate Pass</span></a></li>
            <li><a href="#"><i class="fa fa-cog"></i> <span class="menu-item">Settings</span> <span class="down-arrow"></span></a>
                <ul class="collapse">

                    <li><a href="<?php echo base_url('super/master/view');?>">Profile Settings</a></li>
                    <li><a href="<?php echo base_url('super/academic');?>">Academic Year</a></li>
                    <li><a href="<?php echo base_url('super/schools');?>">School Settings</a></li>
                    <li><a href="<?php echo base_url('super/roles');?>">Roles</a></li>
                    <li><a href="<?php echo base_url('super/users');?>">Users</a></li>
                    <li><a href="<?php echo base_url('super/permissions');?>">Permissions</a></li>
                    <li><a href="#">SMS/Notification Templates</a></li>
                    <li><a href="#>">Reset Password</a></li>
                    <li><a href="#">Languages</a></li>

				</ul>
            </li>

        </ul>
    </div>
