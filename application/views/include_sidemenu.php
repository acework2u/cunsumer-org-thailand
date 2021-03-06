<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Thailand<br>Consumer council</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="">
                <a href="<?php echo site_url('admin/dashboard')?>">
                    <i class="fa fa-dashboard"></i> <span><?php echo $this->lang->line('dashboard');?></span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo site_url('admin/volunteer-management')?>">
                    <i class="fa fa-user"></i> <span><?php echo $this->lang->line('volunteer_dashboard');?></span>
                </a>
            </li>
            <?php if(getUserRoleId() == 1 || getUserRoleId() == 2 || getUserRoleId() == 3 || getUserRoleId() == 4){ ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span><?php echo $this->lang->line('report');?></span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('admin/reports')?>"><i class="fa fa-circle-o"></i><?php echo $this->lang->line('organization_report');?></a></li>
                    <li><a href="<?php echo site_url('admin/report/volunteer')?>"><i class="fa fa-feed"></i><?php echo $this->lang->line('volunteer_report');?></a></li>

                </ul>
            </li>
            <?php }?>

            <?php if(getUserRoleId() == 5){ ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span><?php echo $this->lang->line('report');?></span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo site_url('admin/report/volunteer')?>"><i class="fa fa-feed"></i><?php echo $this->lang->line('volunteer_report');?></a></li>

                    </ul>
                </li>



            <?php } ?>

            <?php if(getUserRoleId() == 1 || getUserRoleId()==3){ ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span><?php echo $this->lang->line('users');?></span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('admin/user-management')?>"><i class="fa fa-circle-o"></i><?php echo $this->lang->line('users_management')?></a></li>
                </ul>
            </li>
            <?php } ?>
            <?php if(getUserRoleId() == 1){ ?>
            <li class="treeview ">
                <a href="#">
                    <i class="fa fa-comment"></i> <span>Logs</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('admin/logs/approved-logs')?>"><i class="fa fa-circle-o"></i>Approved Orz</a></li>

                </ul>
            </li>
            <?php } ?>
            <li class="hidden treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Tables</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                    <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                </ul>
            </li>
            <li class="hidden">
                <a href="pages/calendar.html">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
                </a>
            </li>
            <li class="hidden">
                <a href="pages/mailbox/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
                </a>
            </li>
            <li class="hidden treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Examples</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                    <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                    <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                    <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                    <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                    <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                    <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                    <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                    <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                </ul>
            </li>
            <li class="treeview hidden">
                <a href="#">
                    <i class="fa fa-gears"></i> <span>Setting</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>Users</a></li>
                    <li class="hidden treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Level One
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="hidden treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>Donate Campaign</a></li>
                </ul>
            </li>

            <li class="hidden"><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header hidden">LABELS</li>
            <li class="hidden"><a href="#"><i class=" fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li class="hidden"><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li class="hidden"><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
