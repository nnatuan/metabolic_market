<!-- Top Announcement Bar -->
<div class="site-topbar">
    <div class="container topbar-inner">
        <div class="topbar-left">
            <span class="topbar-badge"><i class="fas fa-check-circle"></i></span>
            <span class="topbar-text">Vì một tương lai xanh – Cùng Cycle Electric</span>
        </div>
        <div class="topbar-right">
            <a href="tel:<?php echo function_exists('get_value_by_config') ? get_value_by_config(12) : '035.353.8887'; ?>" class="topbar-link">
                <i class="fas fa-headset text-accent"></i>
                <span>Hỗ trợ khách hàng 24/7</span>
            </a>
            <span class="topbar-divider">|</span>
            <a href="<?php echo base_url(); ?>giai-phap" class="topbar-link">
                <i class="fas fa-map-marker-alt text-accent"></i>
                <span>Hệ thống trạm sạc toàn quốc</span>
            </a>
            <span class="topbar-divider">|</span>
            <div class="topbar-socials">
                <a href="<?php echo function_exists('get_value_by_config') ? get_value_by_config(16) : 'https://facebook.com'; ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="<?php echo function_exists('get_value_by_config') ? get_value_by_config(18) : 'https://youtube.com'; ?>" target="_blank" rel="noopener noreferrer" aria-label="Youtube"><i class="fab fa-youtube"></i></a>
                <a href="<?php echo base_url(); ?>" aria-label="Website Cycle Electric"><i class="fas fa-globe"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Main Sticky Header -->
<header class="site-header">
    <div class="container header-inner">
        <div class="logo">
            <a href="<?php echo base_url(); ?>" title="Cycle Electric">
                <img src="<?php echo base_url(); ?>images/logo.png" alt="CYCLE ELECTRIC Logo">
            </a>
        </div>
        
        <div class="header-search">
            <form action="<?php echo base_url(); ?>search" method="post" class="search-form">
                <input type="text" name="key_word" placeholder="Tìm kiếm sản phẩm, trạm sạc, dịch vụ..." value="<?php echo isset($key_word) ? htmlspecialchars($key_word) : ''; ?>" required autocomplete="off">
                <button type="submit" aria-label="Tìm kiếm">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        <?php
        $curr_menu = isset($menu_top) ? $menu_top : '';
        ?>
        <nav class="nav-links">
            <a href="<?php echo base_url(); ?>" class="nav-item <?php echo ($curr_menu == 'home' || empty($curr_menu)) ? 'active' : ''; ?>">
                <i class="fas fa-home nav-icon"></i>
                <span>Trang chủ</span>
            </a>
			<div class="nav-dropdown-item">
                <a href="<?php echo base_url(); ?>gioi-thieu" class="nav-item <?php echo (in_array($curr_menu, ['about', 'gioi-thieu'])) ? 'active' : ''; ?>">
                    <i class="fas fa-user nav-icon"></i>
                    <span>Giới thiệu</span>
                </a>
            </div>
			
            <div class="nav-dropdown-item">
                <a href="<?php echo base_url(); ?>san-pham" class="nav-item <?php echo (in_array($curr_menu, ['products', 'list_cat', 'list_sec', 'product_detail', 'sanpham'])) ? 'active' : ''; ?>">
                    <i class="fas fa-cube nav-icon"></i>
                    <span>Sản phẩm</span>
                    <i class="fas fa-chevron-down nav-arrow"></i>
                </a>
                <div class="nav-dropdown-menu">
                    <?php 
                    $nav_materials = function_exists('get_material_product_all') ? get_material_product_all() : [];
                    if (!empty($nav_materials)):
                        foreach ($nav_materials as $n_mat):
                            $n_slug = function_exists('get_clean_material_slug') ? get_clean_material_slug($n_mat) : (!empty($n_mat['ccode']) ? $n_mat['ccode'] : '');
                    ?>
                        <a href="<?php echo base_url(); ?>danh-muc/<?php echo $n_slug; ?>">
                            <?php echo htmlspecialchars($n_mat['cmaterial_products']); ?>
                        </a>
                    <?php 
                        endforeach;
                    else:
                    ?>
                        <a href="<?php echo base_url(); ?>san-pham">Trụ sạc xe điện</a>
                        <a href="<?php echo base_url(); ?>san-pham">Thiết bị quan trắc</a>
                        <a href="<?php echo base_url(); ?>san-pham">Bộ lọc sóng hài</a>
                        <a href="<?php echo base_url(); ?>san-pham">Bộ lưu trữ năng lượng (BESS)</a>
                        <a href="<?php echo base_url(); ?>san-pham">Làm mát & Phụ kiện tủ điện Rittal</a>
                        <a href="<?php echo base_url(); ?>san-pham">Đồng hồ đo đa năng</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="nav-dropdown-item">
                <a href="<?php echo base_url(); ?>giai-phap" class="nav-item <?php echo (in_array($curr_menu, ['giai-phap', 'solutions', 'dichvu'])) ? 'active' : ''; ?>">
                    <i class="fas fa-cog nav-icon"></i>
                    <span>Giải pháp</span>
                </a>
            </div>

            <a href="<?php echo base_url(); ?>tin-tuc" class="nav-item <?php echo (in_array($curr_menu, ['tin-tuc', 'news', 'tintuc'])) ? 'active' : ''; ?>">
                <i class="fas fa-newspaper nav-icon"></i>
                <span>Tin tức</span>
            </a>
        </nav>

        <!-- Mobile Menu Toggle Button -->
        <button class="mobile-menu-toggle" id="mobileMenuToggle" type="button" aria-label="Mở Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <!-- Mobile Drawer Navigation -->
    <div class="mobile-nav-backdrop" id="mobileNavBackdrop"></div>
    <div class="mobile-nav-drawer" id="mobileNavDrawer">
        <div class="mobile-nav-header">
            <a href="<?php echo base_url(); ?>" class="mobile-nav-logo">
                <img src="<?php echo base_url(); ?>images/logo.png" alt="Logo">
            </a>
            <button class="mobile-nav-close" id="mobileNavClose" type="button" aria-label="Đóng Menu">&times;</button>
        </div>
        <nav class="mobile-nav-links">
            <a href="<?php echo base_url(); ?>" class="<?php echo ($curr_menu == 'home' || empty($curr_menu)) ? 'active' : ''; ?>"><i class="fas fa-home"></i> Trang chủ</a>
            <a href="<?php echo base_url(); ?>san-pham" class="<?php echo (in_array($curr_menu, ['products', 'list_cat', 'list_sec', 'product_detail', 'sanpham'])) ? 'active' : ''; ?>"><i class="fas fa-cube"></i> Sản phẩm</a>
            <a href="<?php echo base_url(); ?>giai-phap" class="<?php echo (in_array($curr_menu, ['giai-phap', 'solutions', 'dichvu'])) ? 'active' : ''; ?>"><i class="fas fa-cog"></i> Giải pháp</a>
            <a href="<?php echo base_url(); ?>tin-tuc" class="<?php echo (in_array($curr_menu, ['tin-tuc', 'news', 'tintuc'])) ? 'active' : ''; ?>"><i class="fas fa-newspaper"></i> Tin tức</a>
            <a href="<?php echo base_url(); ?>gioi-thieu" class="<?php echo (in_array($curr_menu, ['about', 'gioi-thieu'])) ? 'active' : ''; ?>"><i class="fas fa-user"></i> Giới thiệu</a>
        </nav>
        <div class="mobile-nav-footer">
            <a href="tel:<?php echo function_exists('get_value_by_config') ? get_value_by_config(12) : '035.353.8887'; ?>" class="btn-mobile-contact">
                <i class="fas fa-headset"></i> Tư Vấn Kỹ Thuật
            </a>
        </div>
    </div>
</header>