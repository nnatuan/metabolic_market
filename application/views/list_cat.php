<?php 
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');

   // Thiết lập biến phân trang và lấy danh sách sản phẩm
   $ncurr_page = (!empty($ncurr_page) && $ncurr_page > 0) ? (int)$ncurr_page : 1;
   $nrow_per_page = (!empty($nrow_per_page)) ? (int)$nrow_per_page : 24;

   // Lấy dữ liệu sản phẩm theo danh mục và toàn bộ danh mục cho menu
   $list_products = (!empty($list_products)) ? $list_products : get_product_page_by_cat($ccode_cat, $nrow_per_page, $ncurr_page);
   $list_cats = (!empty($list_cats)) ? $list_cats : get_cat_product_all();
   
   $total_row_all = get_count_product();
   $total_row_cat = (isset($total_row) && $total_row > 0) ? (int)$total_row : get_count_product_by_cat($ccode_cat);
   $ntotal_page = (isset($ntotal_page) && $ntotal_page > 0) ? (int)$ntotal_page : (int)ceil($total_row_cat / $nrow_per_page);
?>

<style>
/* Layout 2 cột: Sidebar bên trái + Sản phẩm bên phải */
.products-page-container {
    display: flex;
    gap: 30px;
    margin-bottom: 50px;
    align-items: flex-start;
}

/* Sidebar bên trái */
.products-sidebar {
    width: 290px;
    flex-shrink: 0;
    position: sticky;
    top: 90px;
}

.sidebar-card {
    background: var(--bg-card);
    border: 1px solid var(--border-light);
    border-radius: 12px;
    padding: 18px 14px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
    margin-bottom: 25px;
}

.sidebar-title {
    font-size: 1.1rem;
    color: var(--secondary-blue);
    font-weight: 700;
    margin-bottom: 14px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--border-light);
    display: flex;
    align-items: center;
    gap: 8px;
}

.sidebar-title i {
    color: var(--primary-green);
    font-size: 1.05rem;
}

.category-menu-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.category-menu-list > li {
    margin-bottom: 6px;
}

.category-menu-list > li:last-child {
    margin-bottom: 0;
}

.category-menu-list a {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    padding: 9px 12px;
    border-radius: 8px;
    color: var(--text-main);
    text-decoration: none;
    font-size: 0.92rem;
    font-weight: 500;
    line-height: 1.35;
    transition: var(--transition-smooth);
    border: 1px solid transparent;
}

.category-menu-list a:hover {
    background: rgba(57, 163, 72, 0.08);
    color: var(--primary-green);
    border-color: rgba(57, 163, 72, 0.2);
    transform: translateX(3px);
}

.category-menu-list a.active {
    background: var(--primary-green) !important;
    color: #ffffff !important;
    font-weight: 600;
    box-shadow: 0 4px 10px rgba(57, 163, 72, 0.25);
}

/* Material Header & Link (Cấp 1) */
.material-header {
    display: flex;
    align-items: stretch;
    justify-content: space-between;
    background: #f8fafc;
    border: 1px solid #edf2f7;
    border-radius: 8px;
    transition: var(--transition-smooth);
    overflow: hidden;
}

.material-header:hover {
    background: #f1f5f9;
    border-color: #cbd5e1;
}

.material-header.active {
    background: #eef7f0;
    border-color: rgba(57, 163, 72, 0.35);
}

.material-header .material-link {
    flex: 1;
    display: flex;
    align-items: center;
    padding: 9px 8px 9px 12px !important;
    font-weight: 700 !important;
    color: var(--secondary-blue) !important;
    text-decoration: none;
    background: transparent !important;
    border: none !important;
    border-radius: 0 !important;
    transform: none !important;
    min-width: 0;
}

.material-header.active .material-link {
    color: var(--primary-green) !important;
}

.material-name {
    font-size: 0.88rem;
    text-transform: uppercase;
    letter-spacing: 0.2px;
    line-height: 1.35;
    word-break: break-word;
}

.material-toggle-btn {
    background: transparent;
    border: none;
    border-left: 1px solid rgba(0, 0, 0, 0.06);
    padding: 0 12px;
    cursor: pointer;
    color: #64748b;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    transition: background 0.2s ease, color 0.2s ease;
    flex-shrink: 0;
}

.material-toggle-btn:hover {
    background: rgba(57, 163, 72, 0.12);
    color: var(--primary-green);
}

.material-toggle-btn i {
    transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    transform: rotate(-90deg);
}

.material-group.expanded .material-toggle-btn i {
    transform: rotate(0deg);
}

.material-group:not(.expanded) .sub-category-list {
    display: none;
}

/* Sub-category list (Cấp 2) */
.sub-category-list {
    list-style: none;
    padding: 0 0 0 6px;
    margin: 3px 0 5px 6px;
    border-left: 2px solid #e2e8f0;
}

.sub-category-list li {
    margin-bottom: 2px;
}

.sub-category-list li:last-child {
    margin-bottom: 0;
}

.sub-cat-link {
    padding: 7px 10px !important;
    font-size: 0.88rem !important;
    font-weight: 500;
    color: #4a5568 !important;
    line-height: 1.35;
}

.sub-cat-link:hover {
    color: var(--primary-green) !important;
    background: rgba(57, 163, 72, 0.08) !important;
}

.sub-cat-link.active {
    background: var(--primary-green) !important;
    color: #ffffff !important;
    font-weight: 600 !important;
}

.cat-name {
    line-height: 1.35;
}

/* Khối hỗ trợ nhanh trong sidebar */
.sidebar-support {
    background: linear-gradient(135deg, rgba(30, 168, 76, 0.05) 0%, rgba(16, 52, 96, 0.05) 100%);
    border: 1px dashed var(--primary-green);
    border-radius: 12px;
    padding: 20px;
    text-align: center;
}

.sidebar-support > i {
    font-size: 2rem;
    color: var(--primary-green);
    margin-bottom: 10px;
    display: inline-block;
}

.sidebar-support h4 {
    font-size: 1rem;
    color: var(--secondary-blue);
    font-weight: 700;
    margin-bottom: 6px;
}

.sidebar-support p {
    font-size: 0.85rem;
    color: var(--text-muted);
    margin-bottom: 12px;
    line-height: 1.4;
}

.sidebar-support .hotline-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    background: var(--primary-green);
    color: #ffffff !important;
    padding: 9px 18px;
    border-radius: 20px;
    font-weight: 700;
    font-size: 0.95rem;
    text-decoration: none;
    transition: var(--transition-smooth);
}

.sidebar-support .hotline-btn i {
    color: #ffffff !important;
    font-size: 0.85rem !important;
    margin: 0 !important;
    display: inline-block !important;
}

.sidebar-support .hotline-btn:hover {
    background: var(--secondary-blue);
    transform: scale(1.03);
    color: #ffffff !important;
}

/* Phần nội dung chính bên phải */
.products-main-content {
    flex: 1;
    min-width: 0;
}

.products-page-header {
    background: var(--bg-card);
    border: 1px solid var(--border-light);
    border-radius: 12px;
    padding: 24px 30px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
}

.products-page-header .header-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.products-page-header h1 {
    font-size: 1.6rem;
    color: var(--secondary-blue);
    font-weight: 700;
    margin: 0;
}

.products-count-tag {
    font-size: 0.9rem;
    color: var(--text-muted);
    background: rgba(0, 0, 0, 0.03);
    padding: 6px 14px;
    border-radius: 20px;
    border: 1px solid var(--border-light);
}

.products-count-tag strong {
    color: var(--primary-green);
}

.products-page-header .cat-desc {
    color: #334155;
    font-size: 1.02rem;
    line-height: 1.8;
    margin-top: 18px;
    padding-top: 18px;
    border-top: 1px solid #edf2f7;
}

.products-page-header .cat-desc p {
    margin-bottom: 16px;
    color: #334155;
    line-height: 1.8;
}

.products-page-header .cat-desc h2,
.products-page-header .cat-desc h3,
.products-page-header .cat-desc h4 {
    color: var(--secondary-blue);
    margin: 24px 0 12px 0;
    font-weight: 700;
    line-height: 1.4;
}

.products-page-header .cat-desc h2 {
    font-size: 1.35rem;
}

.products-page-header .cat-desc h3 {
    font-size: 1.18rem;
}

.products-page-header .cat-desc h4 {
    font-size: 1.05rem;
}

.products-page-header .cat-desc em strong,
.products-page-header .cat-desc strong em,
.products-page-header .cat-desc p > em {
    color: var(--secondary-blue);
    display: inline-block;
    font-style: italic;
    font-size: 1.05rem;
}

.products-page-header .cat-desc hr {
    border: none;
    border-top: 1px solid #e2e8f0;
    margin: 22px 0;
}

.products-page-header .cat-desc strong,
.products-page-header .cat-desc b {
    color: #1e293b;
    font-weight: 700;
}

.products-page-header .cat-desc img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 16px auto;
    display: block;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
}

.products-page-header .cat-desc ul,
.products-page-header .cat-desc ol {
    margin: 12px 0 16px 20px;
    padding-left: 10px;
    color: #334155;
}

.products-page-header .cat-desc li {
    margin-bottom: 8px;
    line-height: 1.75;
}

.products-page-header .cat-desc table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 0.95rem;
}

.products-page-header .cat-desc table th,
.products-page-header .cat-desc table td {
    border: 1px solid #e2e8f0;
    padding: 10px 14px;
    text-align: left;
}

.products-page-header .cat-desc table th {
    background: #f8fafc;
    color: var(--secondary-blue);
    font-weight: 600;
}

.products-page-header .cat-desc blockquote {
    border-left: 4px solid var(--primary-green);
    background: #f8fafc;
    padding: 15px 20px;
    margin: 20px 0;
    border-radius: 0 8px 8px 0;
    color: #475569;
}

/* Lưới sản phẩm bên phải (3 cột trên Desktop) */
.products-grid-wrapper {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
    margin-bottom: 40px;
}

.products-grid-wrapper .product-card {
    background: var(--bg-card);
    border: 1px solid var(--border-light);
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    transition: var(--transition-smooth);
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 100%;
}

.products-grid-wrapper .product-card:hover {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    border-color: var(--primary-green);
    transform: translateY(-5px);
}

.products-grid-wrapper .product-card .img-box {
    width: 100%;
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
    overflow: hidden;
}

.products-grid-wrapper .product-card img {
    max-height: 100%;
    max-width: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.products-grid-wrapper .product-card:hover img {
    transform: scale(1.05);
}

.products-grid-wrapper .product-card h3 {
    font-size: 1.02rem;
    font-weight: 600;
    color: var(--text-main);
    margin-bottom: 15px;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    height: 2.8em;
}

.products-grid-wrapper .product-card .btn-sm {
    margin-top: auto;
    width: 100%;
}

/* Phân trang (Pagination) */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    margin: 40px 0;
}

.pagination-wrapper a, 
.pagination-wrapper span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 0 12px;
    border-radius: 8px;
    font-size: 0.95rem;
    font-weight: 600;
    border: 1px solid var(--border-light);
    background: var(--bg-card);
    color: var(--text-main);
    transition: var(--transition-smooth);
    text-decoration: none;
}

.pagination-wrapper a:hover {
    border-color: var(--primary-green);
    color: var(--primary-green);
}

.pagination-wrapper .active {
    background: var(--primary-green);
    border-color: var(--primary-green);
    color: #ffffff;
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    background: var(--bg-card);
    border-radius: 12px;
    border: 1px solid var(--border-light);
    color: var(--text-muted);
}

/* Responsive Styles */
@media (max-width: 992px) {
    .products-page-container {
        flex-direction: column;
    }
    .products-sidebar {
        width: 100%;
        position: static;
    }
    .products-grid-wrapper {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 768px) {
    .products-grid-wrapper {
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 12px !important;
    }
    .products-grid-wrapper .product-card {
        padding: 12px 10px;
        border-radius: 10px;
    }
    .products-grid-wrapper .product-card .img-box {
        height: 140px;
        margin-bottom: 10px;
    }
    .products-grid-wrapper .product-card img {
        max-height: 130px;
    }
    .products-grid-wrapper .product-card h3 {
        font-size: 0.88rem;
        line-height: 1.35;
        margin-bottom: 10px;
        height: 2.7em;
    }
    .products-grid-wrapper .product-card .btn-sm {
        padding: 7px 10px;
        font-size: 0.8rem;
    }
    .products-page-header {
        padding: 16px 15px;
    }
    .products-page-header h1 {
        font-size: 1.25rem;
    }
}

@media (max-width: 480px) {
    .products-grid-wrapper {
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 10px !important;
    }
    .products-grid-wrapper .product-card {
        padding: 10px 8px;
    }
    .products-grid-wrapper .product-card .img-box {
        height: 125px;
    }
    .products-grid-wrapper .product-card img {
        max-height: 115px;
    }
    .products-grid-wrapper .product-card h3 {
        font-size: 0.84rem;
    }
    .products-grid-wrapper .product-card .btn-sm {
        padding: 6px 8px;
        font-size: 0.76rem;
    }
}
</style>

<div class="container reveal">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> Trang chủ</a>
        <span class="sep">&rsaquo;</span>
        <a href="<?php echo base_url(); ?>san-pham">Sản phẩm</a>
        <?php if (!empty($obj_sec['cmaterial_products'])): 
            $sec_slug = function_exists('get_clean_material_slug') ? get_clean_material_slug($obj_sec) : (!empty($obj_sec['ccode']) ? $obj_sec['ccode'] : '');
        ?>
            <span class="sep">&rsaquo;</span>
            <a href="<?php echo base_url(); ?>danh-muc/<?php echo $sec_slug; ?>"><?php echo htmlspecialchars($obj_sec['cmaterial_products']); ?></a>
        <?php endif; ?>
        <span class="sep">&rsaquo;</span>
        <span class="current"><?php echo htmlspecialchars($obj_cat['ccat_products']); ?></span>
    </div>

    <!-- Layout 2 Cột: Danh mục bên trái, Sản phẩm bên phải -->
    <div class="products-page-container">
        
        <!-- Cột Trái: Menu Danh Mục -->
        <?php 
        $this->load->view('modules/mod_product_sidebar', [
            'active_type' => 'cat',
            'active_code' => $ccode_cat
        ]); 
        ?>

        <!-- Cột Phải: Danh Sách Sản Phẩm Thuộc Danh Mục & Phân Trang -->
        <main class="products-main-content">
            <!-- Header Trang Danh Mục -->
            <div class="products-page-header">
                <div class="header-top">
                    <h1><?php echo htmlspecialchars($obj_cat['ccat_products']); ?></h1>
                    <div class="products-count-tag">
                        Hiển thị <strong><?php echo count($list_products); ?></strong> trên tổng số <strong><?php echo $total_row_cat; ?></strong> sản phẩm
                    </div>
                </div>
                <?php if (!empty($obj_cat['cnote'])): ?>
                    <div class="cat-desc"><?php echo fix_content_images($obj_cat['cnote']); ?></div>
                <?php else: ?>
                    <div class="cat-desc">Danh sách các sản phẩm và thiết bị thuộc danh mục <?php echo htmlspecialchars($obj_cat['ccat_products']); ?> chính hãng, bảo hành tiêu chuẩn.</div>
                <?php endif; ?>
            </div>

            <!-- Lưới Sản Phẩm -->
            <?php if (!empty($list_products)): ?>
                <div class="products-grid-wrapper">
                    <?php 
                    $delay = 0;
                    foreach ($list_products as $item): 
                        $img_src = (!empty($item['cimage_resize'])) 
                            ? base_url().'upload/images_product/resize_images/'.$item['cimage_resize'] 
                            : ((!empty($item['cimage'])) ? base_url().'upload/images_product/full_images/'.$item['cimage'] : base_url().'images/logo.png');
                        $delay_style = ($delay > 0) ? ' style="transition-delay: '.$delay.'s;"' : '';
                    ?>
                        <div class="product-card reveal"<?php echo $delay_style; ?>>
                            <a href="<?php echo base_url(); ?>san-pham/<?php echo $item['ccode']; ?>" class="img-box">
                                <img src="<?php echo $img_src; ?>" alt="<?php echo htmlspecialchars($item['cproducts']); ?>">
                            </a>
                            <h3>
                                <a href="<?php echo base_url(); ?>san-pham/<?php echo $item['ccode']; ?>">
                                    <?php echo htmlspecialchars($item['cproducts']); ?>
                                </a>
                            </h3>
                            <a href="<?php echo base_url(); ?>san-pham/<?php echo $item['ccode']; ?>" class="btn btn-outline btn-sm">Xem Chi Tiết</a>
                        </div>
                    <?php 
                        $delay += 0.05;
                        if ($delay > 0.3) $delay = 0;
                    endforeach; 
                    ?>
                </div>

                <!-- Phân Trang Theo Danh Mục -->
                <?php if ($ntotal_page > 1): ?>
                    <div class="pagination-wrapper">
                        <?php if ($ncurr_page > 1): ?>
                            <?php $prev_url = ($ncurr_page - 1 == 1) ? base_url().'danh-muc/'.$ccode_cat : base_url().'danh-muc/'.$ccode_cat.'/trang-'.($ncurr_page - 1); ?>
                            <a href="<?php echo $prev_url; ?>">&laquo;</a>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $ntotal_page; $i++): ?>
                            <?php if ($i == $ncurr_page): ?>
                                <span class="active"><?php echo $i; ?></span>
                            <?php else: ?>
                                <?php $page_url = ($i == 1) ? base_url().'danh-muc/'.$ccode_cat : base_url().'danh-muc/'.$ccode_cat.'/trang-'.$i; ?>
                                <a href="<?php echo $page_url; ?>"><?php echo $i; ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($ncurr_page < $ntotal_page): ?>
                            <a href="<?php echo base_url(); ?>danh-muc/<?php echo $ccode_cat; ?>/trang-<?php echo ($ncurr_page + 1); ?>">&raquo;</a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            <?php else: ?>
                <div class="empty-state">
                    <i class="fas fa-box-open" style="font-size: 3rem; margin-bottom: 15px; color: var(--text-muted);"></i>
                    <h3>Hiện chưa có sản phẩm nào trong danh mục này</h3>
                    <p>Vui lòng quay lại sau hoặc liên hệ với chúng tôi để được tư vấn sản phẩm phù hợp.</p>
                    <a href="<?php echo base_url(); ?>san-pham" class="btn btn-primary btn-sm" style="display: inline-flex; width: auto; margin-top: 15px;">Xem tất cả sản phẩm</a>
                </div>
            <?php endif; ?>
        </main>
    </div>
</div>

<?php 
   $this->load->view('modules/mod_footer');
   $this->load->view('footer');
?>