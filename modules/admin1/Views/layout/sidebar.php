<?php
$controller=$this->uri->segment(2);
?>

    <div class="container_full">

      <div class="side_bar scroll_auto">

        <div class="user-panel">

          <div class="user_image">

            <img src="<?= base_url().'assets/images/admin/'.$admin_info['image'];?>" class="img-circle" alt="User Image">

          </div>

          <div class="info">

            <p>

              <?= $admin_info['username'];?>

            </p>

            <a href="<?php echo base_url('Admin/dashboard');?>">

              <i class="fa fa-circle text-success"></i> Online</a>

          </div>

        </div>

        <ul id="dc_accordion" class="sidebar-menu tree">

          <li>

            <a href="<?php echo base_url('Admin/dashboard');?>">

              <i class="fa fa-home"></i>

              <span>Dashboard</span>

            </a>

          </li>

          <li class="menu_sub">

            <a href="#">

              <i class="fa fa-address-book"></i>

              <span>Caregiver Management</span>

              <span class="arrow"></span>

            </a>

            <ul class="down_menu">

              <li>

                <a href="<?php echo base_url('Admin/caregiver-list');?>">Caregiver List</a>

              </li>

            </ul>

          </li>

          <li class="menu_sub">

            <a href="#">

              <i class="fa fa-address-book"></i>

              <span>Provider Management</span>

              <span class="arrow"></span>

            </a>

            <ul class="down_menu">

              <li>

                <a href="<?php echo base_url('Admin/provider-list');?>">Provider List</a>

              </li>

            </ul>

          </li>

         <li class="menu_sub">

            <a href="#">

              <i class="fa fa-commenting"></i>

              <span>Request Management</span>

              <span class="arrow"></span>

            </a>

            <ul class="down_menu">

              <li>

                <a href="<?php echo base_url('Admin/provider-request');?>">Provider Request</a>

              </li>
              <li>

                <a href="<?php echo base_url('Admin/cancel-request');?>">Provider Cancel Request</a>

              </li>

            </ul>

          </li>
          

          <li class="menu_sub">

            <a href="#">

              <i class="fa fa-certificate"></i>

              <span>Certification & Courses</span>

              <span class="arrow"></span>

            </a>

            <ul class="down_menu">

              <li>

                <a href="<?php  echo base_url('Admin/courses-list');?>">Courses List</a>

              </li>

              <li>

                <a href="<?php  echo base_url('Admin/add-courses');?>">Add Courses</a>

              </li>

            </ul>

          </li>

<!--          <li class="menu_sub">

            <a href="#">

              <i class="fa fa-clock-o"></i>

              <span>Shift Management</span>

              <span class="arrow"></span>

            </a>

            <ul class="down_menu">

              <li>

                <a href="<?php// echo base_url('available-shift');?>">Available Shift</a>

              </li>

              <li>

                <a href="<?php //echo base_url('accept-shift');?>">Accept Shift</a>

              </li>

            </ul>

          </li>

          <li class="menu_sub">

            <a href="#">

              <i class="fa fa-money"></i>

              <span>Payroll Management</span>

              <span class="arrow"></span>

            </a>

            <ul class="down_menu">

              <li>

                <a href="<?php // echo base_url('payroll-detail');?>">Payroll Detail</a>

              </li>

            </ul>

          </li>

 -->         <li class="menu_sub">

            <a href="#">

              <i class="fa fa-gear"></i>

              <span>Admin Setting</span>

              <span class="arrow"></span>

            </a>

            <ul class="down_menu">

              <li>

                <a href="<?php echo base_url('Admin/add-speciality');?>">Add Speciality</a>

              </li>

             <li>

                <a href="<?php echo base_url('Admin/add-city');?>">Add City</a>

              </li>

<!--              <li>

                <a href="<?php //echo base_url('admin-managers-list');?>">Admin Managers List</a>

              </li>
              <li>

                <a href="<?php //echo base_url('create-admin-managers');?>">Create Admin Managers</a>

              </li>
              <li>

                <a href="<?php //echo base_url('alert-message');?>">Alert Message</a>

              </li>-->

            </ul>

          </li>

        </ul>

      </div>

      