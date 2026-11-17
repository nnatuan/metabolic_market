<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');

   $slug_prefix = (!empty($slug_prefix)) ? $slug_prefix : (($nid_cat == 2) ? 'giai-phap' : 'tin-tuc');
   $page_title  = (!empty($page_title)) ? $page_title : (($nid_cat == 2) ? 'Giải pháp' : 'Tin tức');
   $cur_page    = (!empty($cur_page) && $cur_page > 0) ? (int)$cur_page : 1;
   $total_page  = (!empty($total_page)) ? (int)$total_page : 1;
   $total_row   = (isset($total_row)) ? (int)$total_row : 0;
   $obj_news_list = (!empty($obj_news_list)) ? $obj_news_list : array();
?>

<style>
/* --- NEWS & SOLUTIONS PAGE STYLES --- */
.news-page-wrapper {
    padding-bottom: 60px;
}

/* Header Trang */
.news-page-header {
    background: var(--bg-card);
    border: 1px solid var(--border-light);
    border-radius: 12px;
    padding: 24px 30px;
    margin-bottom: 30px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
}

.news-page-header .header-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.news-page-header h1 {
    font-size: 1.6rem;
    color: var(--secondary-blue);
    font-weight: 700;
    margin: 0;
}

.news-count-tag {
    font-size: 0.9rem;
    color: var(--text-muted);
    background: rgba(0, 0, 0, 0.03);
    padding: 6px 14px;
    border-radius: 20px;
    border: 1px solid var(--border-light);
}

.news-count-tag strong {
    color: var(--primary-green);
}

.news-page-header .news-desc {
    color: var(--text-muted);
    font-size: 0.95rem;
    line-height: 1.6;
    margin-top: 12px;
    padding-top: 12px;
    border-top: 1px dashed var(--border-light);
}

/* Lưới Bài Viết (3 cột trên Desktop) */
.news-grid-wrapper {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 26px;
    margin-bottom: 40px;
}

.news-card {
    background: var(--bg-card);
    border: 1px solid var(--border-light);
    border-radius: 14px;
    overflow: hidden;
    transition: var(--transition-smooth);
    display: flex;
    flex-direction: column;
    height: 100%;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
}

.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
    border-color: var(--primary-green);
}

.news-thumb {
    position: relative;
    width: 100%;
    height: 220px;
    overflow: hidden;
    background: #f1f5f9;
}

.news-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.news-card:hover .news-thumb img {
    transform: scale(1.06);
}

.news-content {
    padding: 22px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.news-meta {
    display: flex;
    align-items: center;
    gap: 15px;
    font-size: 0.82rem;
    color: var(--text-muted);
    margin-bottom: 12px;
}

.news-meta span {
    display: flex;
    align-items: center;
    gap: 5px;
}

.news-meta i {
    color: var(--primary-green);
}

.news-title {
    font-size: 1.12rem;
    font-weight: 700;
    line-height: 1.45;
    margin-bottom: 12px;
}

.news-title a {
    color: var(--text-main);
    transition: var(--transition-smooth);
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.news-card:hover .news-title a {
    color: var(--primary-green);
}

.news-excerpt {
    font-size: 0.9rem;
    color: #64748b;
    line-height: 1.6;
    margin-bottom: 18px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.news-footer {
    margin-top: auto;
    padding-top: 14px;
    border-top: 1px solid #f1f5f9;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.read-more-link {
    color: var(--primary-green);
    font-weight: 600;
    font-size: 0.88rem;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: var(--transition-smooth);
}

.read-more-link i {
    font-size: 0.78rem;
    transition: transform 0.3s ease;
}

.news-card:hover .read-more-link {
    color: var(--secondary-blue);
}

.news-card:hover .read-more-link i {
    transform: translateX(4px);
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

/* Responsive */
@media (max-width: 991px) {
    .news-grid-wrapper {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
}

@media (max-width: 600px) {
    .news-grid-wrapper {
        grid-template-columns: 1fr;
    }
    .news-thumb {
        height: 200px;
    }
    .news-page-header {
        padding: 18px 20px;
    }
    .news-page-header h1 {
        font-size: 1.3rem;
    }
}
</style>

<div class="container news-page-wrapper reveal">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> Trang chủ</a>
        <span class="sep">&rsaquo;</span>
        <span class="current"><?php echo htmlspecialchars($page_title); ?></span>
    </div>

    <!-- Header Trang -->
    <div class="news-page-header">
        <div class="header-top">
            <h1><?php echo htmlspecialchars($page_title); ?></h1>
            <div class="news-count-tag">
                Tổng số <strong><?php echo $total_row; ?></strong> bài viết
            </div>
        </div>
        <div class="news-desc">
            <?php if ($nid_cat == 2): ?>
                Tổng hợp các giải pháp kỹ thuật, công nghệ và ứng dụng điện - năng lượng tiên tiến mang lại hiệu quả tối ưu.
            <?php else: ?>
                Cập nhật những tin tức mới nhất về hoạt động, sự kiện và xu hướng phát triển công nghệ năng lượng.
            <?php endif; ?>
        </div>
    </div>

    <!-- Lưới bài viết -->
    <?php if (!empty($obj_news_list)): ?>
        <div class="news-grid-wrapper">
            <?php 
            $delay = 0;
            foreach ($obj_news_list as $data): 
                $img_src = (!empty($data['cimage_thumb'])) 
                    ? base_url().'upload/image_article/'.$data['cimage_thumb'] 
                    : ((!empty($data['cimage'])) ? base_url().'upload/image_article/'.$data['cimage'] : 'https://images.unsplash.com/photo-1497440001374-f26997328c1b?q=80&w=600&auto=format&fit=crop');
                
                $delay_style = ($delay > 0) ? ' style="transition-delay: '.$delay.'s;"' : '';
                $item_url = base_url().$slug_prefix.'/'.$data['ccode'];
                $item_date = (!empty($data['ddate01'])) ? date('d/m/Y', strtotime($data['ddate01'])) : date('d/m/Y');
            ?>
                <article class="news-card reveal"<?php echo $delay_style; ?>>
                    <div class="news-thumb">
                        <a href="<?php echo $item_url; ?>">
                            <img src="<?php echo $img_src; ?>" alt="<?php echo htmlspecialchars($data['ctitle']); ?>">
                        </a>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span><i class="far fa-calendar-alt"></i> <?php echo $item_date; ?></span>
                            <span><i class="fas fa-tag"></i> <?php echo htmlspecialchars($page_title); ?></span>
                        </div>
                        <h3 class="news-title">
                            <a href="<?php echo $item_url; ?>" title="<?php echo htmlspecialchars($data['ctitle']); ?>">
                                <?php echo htmlspecialchars($data['ctitle']); ?>
                            </a>
                        </h3>
                        <?php if (!empty($data['cshort_content'])): ?>
                            <p class="news-excerpt">
                                <?php echo strip_tags($data['cshort_content']); ?>
                            </p>
                        <?php endif; ?>
                        <div class="news-footer">
                            <a href="<?php echo $item_url; ?>" class="read-more-link">
                                Xem chi tiết <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </article>
            <?php 
                $delay += 0.05;
                if ($delay > 0.3) $delay = 0;
            endforeach; 
            ?>
        </div>

        <!-- Phân Trang -->
        <?php if ($total_page > 1): ?>
            <div class="pagination-wrapper">
                <?php if ($cur_page > 1): ?>
                    <?php $prev_url = ($cur_page - 1 == 1) ? base_url().$slug_prefix : base_url().$slug_prefix.'/trang-'.($cur_page - 1); ?>
                    <a href="<?php echo $prev_url; ?>">&laquo;</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_page; $i++): ?>
                    <?php if ($i == $cur_page): ?>
                        <span class="active"><?php echo $i; ?></span>
                    <?php else: ?>
                        <?php $page_url = ($i == 1) ? base_url().$slug_prefix : base_url().$slug_prefix.'/trang-'.$i; ?>
                        <a href="<?php echo $page_url; ?>"><?php echo $i; ?></a>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($cur_page < $total_page): ?>
                    <a href="<?php echo base_url().$slug_prefix.'/trang-'.($cur_page + 1); ?>">&raquo;</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    <?php else: ?>
        <div class="empty-state">
            <i class="fas fa-newspaper" style="font-size: 3rem; margin-bottom: 15px; color: var(--text-muted);"></i>
            <h3>Chưa có bài viết nào trong chuyên mục này</h3>
            <p>Nội dung đang được cập nhật, vui lòng quay lại sau.</p>
            <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-sm" style="display: inline-flex; width: auto; margin-top: 15px;">Về trang chủ</a>
        </div>
    <?php endif; ?>
</div>

<?php 
   $this->load->view('modules/mod_footer');
   $this->load->view('footer');
?>