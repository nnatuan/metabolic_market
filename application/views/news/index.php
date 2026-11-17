<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');

   $slug_prefix = (!empty($slug_prefix)) ? $slug_prefix : 'tin-tuc';
   $cat_title   = (!empty($cat_title)) ? $cat_title : 'Tin tức';
   $article_title = (!empty($obj_news['ctitle'])) ? $obj_news['ctitle'] : '';
   $article_date  = (!empty($obj_news['ddate01'])) ? date('d/m/Y', strtotime($obj_news['ddate01'])) : date('d/m/Y');
   $article_content = (!empty($obj_news['ccontent'])) ? $obj_news['ccontent'] : '';
   $img_src = (!empty($obj_news['cimage'])) 
       ? base_url().'upload/image_article/'.$obj_news['cimage'] 
       : ((!empty($obj_news['cimage_thumb'])) ? base_url().'upload/image_article/'.$obj_news['cimage_thumb'] : '');
?>

<style>
/* --- CHI TIẾT BÀI VIẾT (ARTICLE DETAIL) --- */
.article-page-wrapper {
    padding-bottom: 60px;
}

.article-layout {
    display: grid;
    grid-template-columns: 1fr 340px;
    gap: 35px;
    align-items: flex-start;
}

/* Cột nội dung chính */
.article-main-card {
    background: var(--bg-card);
    border: 1px solid var(--border-light);
    border-radius: 14px;
    padding: 35px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
}

.article-header {
    margin-bottom: 25px;
    padding-bottom: 20px;
    border-bottom: 1px solid #f1f5f9;
}

.article-header h1 {
    font-size: 1.85rem;
    color: var(--secondary-blue);
    font-weight: 800;
    line-height: 1.35;
    margin-bottom: 15px;
}

.article-meta {
    display: flex;
    align-items: center;
    gap: 20px;
    font-size: 0.88rem;
    color: var(--text-muted);
    flex-wrap: wrap;
}

.article-meta span {
    display: flex;
    align-items: center;
    gap: 6px;
}

.article-meta i {
    color: var(--primary-green);
}

.article-featured-img {
    margin-bottom: 30px;
    border-radius: 12px;
    overflow: hidden;
}

.article-featured-img img {
    width: 100%;
    max-height: 480px;
    object-fit: cover;
    display: block;
}

.article-body {
    font-size: 1.05rem;
    line-height: 1.85;
    color: #334155;
}

.article-body p {
    margin-bottom: 18px;
    text-align: justify;
}

.article-body img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 15px 0;
}

.article-body h2, 
.article-body h3, 
.article-body h4 {
    color: var(--secondary-blue);
    margin: 25px 0 12px 0;
    font-weight: 700;
}

/* Định dạng danh sách ul, ol cho nội dung bài viết */
.article-body ul,
.article-body ol {
    margin: 16px 0 22px 0;
    padding-left: 32px;
    list-style-position: outside;
}

.article-body ul {
    list-style-type: disc;
}

.article-body ol {
    list-style-type: decimal;
}

.article-body li {
    margin-bottom: 10px;
    line-height: 1.8;
    padding-left: 6px;
    text-align: justify;
}

.article-body li:last-child {
    margin-bottom: 0;
}

/* Danh sách lồng nhau (Nested lists) */
.article-body ul ul,
.article-body ol ol,
.article-body ul ol,
.article-body ol ul {
    margin: 8px 0 10px 0;
    padding-left: 26px;
}

.article-body ul ul {
    list-style-type: circle;
}

.article-body ul ul ul {
    list-style-type: square;
}

.article-body ol ol {
    list-style-type: lower-alpha;
}

.article-body ol ol ol {
    list-style-type: lower-roman;
}

/* Đoạn văn bản p bên trong thẻ li */
.article-body li > p {
    margin-bottom: 8px;
    text-align: justify;
}

.article-body li > p:last-child {
    margin-bottom: 0;
}

.article-body blockquote {
    margin: 20px 0;
    padding: 15px 20px;
    background: #f8fafc;
    border-left: 4px solid var(--primary-green);
    border-radius: 0 8px 8px 0;
    font-style: italic;
    color: #475569;
}

.article-footer {
    margin-top: 35px;
    padding-top: 25px;
    border-top: 1px solid #f1f5f9;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

/* Sidebar bên phải */
.article-sidebar {
    position: sticky;
    top: 90px;
}

.sidebar-widget {
    background: var(--bg-card);
    border: 1px solid var(--border-light);
    border-radius: 14px;
    padding: 24px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
}

.sidebar-widget-title {
    font-size: 1.15rem;
    color: var(--secondary-blue);
    font-weight: 700;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--border-light);
    display: flex;
    align-items: center;
    gap: 8px;
}

.sidebar-widget-title i {
    color: var(--primary-green);
}

.related-news-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.related-news-item {
    display: flex;
    gap: 14px;
    margin-bottom: 16px;
    padding-bottom: 16px;
    border-bottom: 1px solid #f8fafc;
}

.related-news-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.related-thumb {
    width: 80px;
    height: 65px;
    border-radius: 8px;
    overflow: hidden;
    flex-shrink: 0;
    background: #f1f5f9;
}

.related-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.related-news-item:hover .related-thumb img {
    transform: scale(1.08);
}

.related-info h4 {
    font-size: 0.92rem;
    font-weight: 600;
    line-height: 1.4;
    margin-bottom: 6px;
}

.related-info h4 a {
    color: var(--text-main);
    transition: var(--transition-smooth);
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.related-info h4 a:hover {
    color: var(--primary-green);
}

.related-date {
    font-size: 0.78rem;
    color: var(--text-muted);
    display: flex;
    align-items: center;
    gap: 4px;
}

/* Box tư vấn trong sidebar */
.sidebar-cta-widget {
    background: linear-gradient(135deg, rgba(57, 163, 72, 0.06) 0%, rgba(46, 64, 148, 0.06) 100%);
    border: 1px dashed var(--primary-green);
    border-radius: 14px;
    padding: 22px;
    text-align: center;
}

.sidebar-cta-widget > i {
    font-size: 2.2rem;
    color: var(--primary-green);
    margin-bottom: 12px;
    display: inline-block;
}

.sidebar-cta-widget h4 {
    font-size: 1.05rem;
    color: var(--secondary-blue);
    font-weight: 700;
    margin-bottom: 8px;
}

.sidebar-cta-widget p {
    font-size: 0.88rem;
    color: var(--text-muted);
    margin-bottom: 16px;
    line-height: 1.5;
}

.sidebar-cta-widget .btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    color: #ffffff !important;
}

.sidebar-cta-widget .btn i {
    font-size: 0.95rem;
    color: #ffffff !important;
    margin: 0;
}

/* Responsive */
@media (max-width: 991px) {
    .article-layout {
        grid-template-columns: 1fr;
    }
    .article-sidebar {
        position: static;
    }
}

@media (max-width: 768px) {
    .article-main-card {
        padding: 22px 18px;
    }
    .article-header h1 {
        font-size: 1.45rem;
    }
    .article-body {
        font-size: 0.98rem;
    }
    .article-body ul,
    .article-body ol {
        padding-left: 24px;
        margin: 14px 0 18px 0;
    }
    .article-body li {
        margin-bottom: 8px;
        padding-left: 2px;
    }
}
</style>

<div class="container article-page-wrapper reveal">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> Trang chủ</a>
        <span class="sep">&rsaquo;</span>
        <a href="<?php echo base_url().$slug_prefix; ?>"><?php echo htmlspecialchars($cat_title); ?></a>
        <span class="sep">&rsaquo;</span>
        <span class="current"><?php echo htmlspecialchars($article_title); ?></span>
    </div>

    <div class="article-layout">
        <!-- Nội dung bài viết -->
        <main class="article-main-card">
            <header class="article-header">
                <h1><?php echo htmlspecialchars($article_title); ?></h1>
                <div class="article-meta">
                    <span><i class="far fa-calendar-alt"></i> <?php echo $article_date; ?></span>
                    <span><i class="fas fa-folder-open"></i> <?php echo htmlspecialchars($cat_title); ?></span>
                    <?php if (!empty($obj_news['cview'])): ?>
                        <span><i class="far fa-eye"></i> <?php echo $obj_news['cview']; ?> lượt xem</span>
                    <?php endif; ?>
                </div>
            </header>

            <?php if (!empty($img_src)): ?>
                <div class="article-featured-img">
                    <img src="<?php echo $img_src; ?>" alt="<?php echo htmlspecialchars($article_title); ?>">
                </div>
            <?php endif; ?>

            <div class="article-body">
                <?php echo fix_content_images($article_content); ?>
            </div>

            <div class="article-footer">
                <a href="<?php echo base_url().$slug_prefix; ?>" class="btn btn-outline btn-sm">
                    <i class="fas fa-arrow-left" style="margin-right: 6px;"></i> Quay lại <?php echo htmlspecialchars($cat_title); ?>
                </a>
            </div>
        </main>

        <!-- Sidebar bên phải -->
        <aside class="article-sidebar">
            <!-- Bài viết cùng chuyên mục -->
            <?php if (!empty($related_news)): ?>
                <div class="sidebar-widget">
                    <div class="sidebar-widget-title">
                        <i class="fas fa-newspaper"></i>
                        <span>Bài Viết Cùng Chuyên Mục</span>
                    </div>
                    <ul class="related-news-list">
                        <?php foreach ($related_news as $rel): 
                            if (!empty($obj_news['ccode']) && $rel['ccode'] == $obj_news['ccode']) continue;
                            $rel_thumb = (!empty($rel['cimage_thumb'])) 
                                ? base_url().'upload/image_article/'.$rel['cimage_thumb'] 
                                : ((!empty($rel['cimage'])) ? base_url().'upload/image_article/'.$rel['cimage'] : 'https://images.unsplash.com/photo-1497440001374-f26997328c1b?q=80&w=200&auto=format&fit=crop');
                            $rel_url = base_url().$slug_prefix.'/'.$rel['ccode'];
                            $rel_date = (!empty($rel['ddate01'])) ? date('d/m/Y', strtotime($rel['ddate01'])) : date('d/m/Y');
                        ?>
                            <li class="related-news-item">
                                <a href="<?php echo $rel_url; ?>" class="related-thumb">
                                    <img src="<?php echo $rel_thumb; ?>" alt="<?php echo htmlspecialchars($rel['ctitle']); ?>">
                                </a>
                                <div class="related-info">
                                    <h4>
                                        <a href="<?php echo $rel_url; ?>"><?php echo htmlspecialchars($rel['ctitle']); ?></a>
                                    </h4>
                                    <span class="related-date"><i class="far fa-clock"></i> <?php echo $rel_date; ?></span>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Box Liên hệ hỗ trợ -->
            <div class="sidebar-cta-widget">
                <i class="fas fa-headset"></i>
                <h4>Tư Vấn & Hỗ Trợ Kỹ Thuật</h4>
                <p>Quý khách có nhu cầu tư vấn giải pháp hoặc báo giá thiết bị xin vui lòng liên hệ ngay với chúng tôi.</p>
                <a href="tel:<?php echo get_value_by_config(12); ?>" class="btn btn-primary btn-sm" style="width: 100%;">
                    <i class="fas fa-phone-alt" style="margin-right: 6px;"></i> <?php echo get_value_by_config(12); ?>
                </a>
            </div>
        </aside>
    </div>
</div>

<?php 
   $this->load->view('modules/mod_footer');
   $this->load->view('footer');
?>