<?php 
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');

   // Thiết lập biến phân trang và lấy danh sách sản phẩm
   $ncurr_page = (!empty($ncurr_page) && $ncurr_page > 0) ? (int)$ncurr_page : 1;
   $nrow_per_page = (!empty($nrow_per_page)) ? (int)$nrow_per_page : 20;

   $key_word = isset($key_word) ? $key_word : '';
   $list_products = (!empty($list_products)) ? $list_products : get_search($key_word, $nrow_per_page, $ncurr_page);
   
   $total_row_search = (isset($total_row) && $total_row >= 0) ? (int)$total_row : get_count_search($key_word);
   $ntotal_page = (isset($ntotal_page) && $ntotal_page > 0) ? (int)$ntotal_page : (int)ceil($total_row_search / $nrow_per_page);
?>

<style>
/* Header Trang Tìm Kiếm */
.search-page-header {
    background: var(--bg-card);
    border: 1px solid var(--border-light);
    border-radius: 12px;
    padding: 24px 30px;
    margin-bottom: 30px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
}

.search-page-header .header-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.search-page-header h1 {
    font-size: 1.6rem;
    color: var(--secondary-blue);
    font-weight: 700;
    margin: 0;
}

.search-page-header h1 span {
    color: var(--primary-green);
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

.search-page-header .search-desc {
    color: var(--text-muted);
    font-size: 0.95rem;
    line-height: 1.6;
    margin-top: 12px;
    padding-top: 12px;
    border-top: 1px dashed var(--border-light);
}

/* Lưới sản phẩm toàn trang (4 cột trên Desktop) */
.search-products-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 22px;
    margin-bottom: 40px;
}

.search-products-grid .product-card {
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

.search-products-grid .product-card:hover {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    border-color: var(--primary-green);
    transform: translateY(-5px);
}

.search-products-grid .product-card .img-box {
    width: 100%;
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
    overflow: hidden;
}

.search-products-grid .product-card img {
    max-height: 100%;
    max-width: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.search-products-grid .product-card:hover img {
    transform: scale(1.05);
}

.search-products-grid .product-card h3 {
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

.search-products-grid .product-card .btn-sm {
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
    margin-bottom: 40px;
}

/* Responsive Styles */
@media (max-width: 1100px) {
    .search-products-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 768px) {
    .search-products-grid {
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 12px !important;
    }
    .search-products-grid .product-card {
        padding: 12px 10px;
        border-radius: 10px;
    }
    .search-products-grid .product-card .img-box {
        height: 140px;
        margin-bottom: 10px;
    }
    .search-products-grid .product-card img {
        max-height: 130px;
    }
    .search-products-grid .product-card h3 {
        font-size: 0.88rem;
        line-height: 1.35;
        margin-bottom: 10px;
        height: 2.7em;
    }
    .search-products-grid .product-card .btn-sm {
        padding: 7px 10px;
        font-size: 0.8rem;
    }
    .search-page-header {
        padding: 16px 15px;
    }
    .search-page-header h1 {
        font-size: 1.25rem;
    }
}

@media (max-width: 480px) {
    .search-products-grid {
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 10px !important;
    }
    .search-products-grid .product-card {
        padding: 10px 8px;
    }
    .search-products-grid .product-card .img-box {
        height: 125px;
    }
    .search-products-grid .product-card img {
        max-height: 115px;
    }
    .search-products-grid .product-card h3 {
        font-size: 0.84rem;
    }
    .search-products-grid .product-card .btn-sm {
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
        <span class="sep">&rsaquo;</span>
        <span class="current">Tìm kiếm</span>
    </div>

    <!-- Header Trang Tìm Kiếm -->
    <div class="search-page-header">
        <div class="header-top">
            <h1>
                <?php if (!empty($key_word)): ?>
                    Kết quả tìm kiếm cho: <span>"<?php echo htmlspecialchars($key_word); ?>"</span>
                <?php else: ?>
                    Tất cả kết quả tìm kiếm
                <?php endif; ?>
            </h1>
            <div class="products-count-tag">
                Tìm thấy <strong><?php echo $total_row_search; ?></strong> sản phẩm
            </div>
        </div>
        <div class="search-desc">
            <?php if (!empty($key_word)): ?>
                Danh sách các sản phẩm và thiết bị phù hợp với từ khóa "<strong><?php echo htmlspecialchars($key_word); ?></strong>".
            <?php else: ?>
                Vui lòng nhập từ khóa tìm kiếm trên thanh điều hướng để tìm kiếm sản phẩm mong muốn.
            <?php endif; ?>
        </div>
    </div>

    <!-- Lưới Sản Phẩm Tìm Kiếm -->
    <?php if (!empty($list_products)): ?>
        <div class="search-products-grid">
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

        <!-- Phân Trang Cho Tìm Kiếm -->
        <?php if ($ntotal_page > 1): ?>
            <div class="pagination-wrapper">
                <?php 
                    $kw_param = (!empty($key_word)) ? 'key_word='.urlencode($key_word).'&' : ''; 
                ?>
                <?php if ($ncurr_page > 1): ?>
                    <a href="<?php echo base_url().'search?'.$kw_param.'page='.($ncurr_page - 1); ?>">&laquo;</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $ntotal_page; $i++): ?>
                    <?php if ($i == $ncurr_page): ?>
                        <span class="active"><?php echo $i; ?></span>
                    <?php else: ?>
                        <a href="<?php echo base_url().'search?'.$kw_param.'page='.$i; ?>"><?php echo $i; ?></a>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($ncurr_page < $ntotal_page): ?>
                    <a href="<?php echo base_url().'search?'.$kw_param.'page='.($ncurr_page + 1); ?>">&raquo;</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    <?php else: ?>
        <div class="empty-state">
            <i class="fas fa-search" style="font-size: 3rem; margin-bottom: 15px; color: var(--text-muted);"></i>
            <h3>Không tìm thấy sản phẩm nào phù hợp</h3>
            <p><?php echo (!empty($key_word)) ? 'Không có sản phẩm nào khớp với từ khóa "'.htmlspecialchars($key_word).'".' : 'Hãy nhập từ khóa để tìm kiếm sản phẩm.'; ?> Vui lòng thử lại với từ khóa khác.</p>
            <a href="<?php echo base_url(); ?>san-pham" class="btn btn-primary btn-sm" style="display: inline-flex; width: auto; margin-top: 15px;">Xem tất cả sản phẩm</a>
        </div>
    <?php endif; ?>
</div>

<?php 
   $this->load->view('modules/mod_footer');
   $this->load->view('footer');
?>