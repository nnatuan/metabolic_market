<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;    margin-bottom: 10px;">
			  <a href="<?php echo base_url(); ?>index.php/do_home" class="site_title"><img src="<?php $fr_img = Fstr_replace('admin/', '', base_url()); $cf = get_config_by_id(8); echo $fr_img.'upload/fb/'.$cf['cimage']; ?>" style="height: 30px;margin-right: 5px;"> <span style="font-weight: bold;letter-spacing: 5px;font-size: 20px;">CMS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url(); ?>images/user.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Xin chào,</span>
                <h2><?php echo Fget_userdata('session_user_full_name'); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url(); ?>index.php/do_home"><i class="fa fa-home"></i> Trang Chủ </a></li>

				  <li><a href="<?php echo base_url(); ?>index.php/do_config_listview"><i class="fa fa-cogs"></i> Quản Lý Cấu Hình </a></li>
				  
				  <li><a href="<?php echo base_url(); ?>index.php/do_employee_listview"><i class="fa fa-user"></i> Quản Lý Người Dùng </a></li>

                  <li><a href="<?php echo base_url(); ?>index.php/do_module_listview"><i class="fa fa-puzzle-piece"></i> Quản Lý Module </a></li>

					
				 


				  <li><a href="<?php echo base_url(); ?>index.php/do_banner_images_listview"><i class="fa fa-picture-o"></i> Quản Lý Slide </a></li>

				  

				  <li><a href="<?php echo base_url(); ?>index.php/do_article_listview"><i class="fa fa-pencil-square-o"></i> Quản Lý Bài Viết </a></li>
					
		
				  <li><a><i class="fa fa-sitemap"></i> Quản Lý Sản Phẩm <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="<?php echo base_url(); ?>index.php/do_cat_product_listview">Nhóm Sản Phẩm</a></li>
				
					  
					
                      <li><a href="<?php echo base_url(); ?>index.php/do_product_listview">Sản Phẩm</a></li>

                    </ul>
                  </li>

				 
					<li><a href="<?php echo base_url(); ?>index.php/do_news_listview"><i class="fa fa-newspaper-o"></i> Quản Lý Tin Tức </a></li>	
					<li><a href="<?php echo base_url(); ?>index.php/do_gallery_img_listview/get/35"><i class="fa fa-picture-o"></i> Thư viện ảnh </a></li>

                </ul>
              </div>
              
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url().'index.php/do_logout'?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url(); ?>images/user.jpg" alt=""><?php echo Fget_userdata('session_user_full_name'); ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                    <a class="dropdown-item"  href="<?php echo base_url().'index.php/do_logout'?>"><i class="fa fa-sign-out pull-right"></i> Đăng xuất</a>
                  </div>
                </li>
			  </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->