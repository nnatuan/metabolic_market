<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');

   // Xử lý ảnh đại diện chính
   $img_main = (!empty($obj_detail['cimage'])) 
      ? base_url().'upload/images_product/full_images/'.$obj_detail['cimage'] 
      : base_url().'images/logo.png';
?>  
<style>
/* Product Detail Layout */
.product-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    background: #ffffff;
    padding: 35px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
    margin-bottom: 35px;
}
.product-gallery {
    display: flex;
    flex-direction: column;
    gap: 15px;
    width: 100%;
}
.main-image {
    width: 100%;
    height: 420px;
    background: #f8fafc;
    border-radius: 8px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    border: 1px solid #e2e8f0;
}
.main-image img {
    max-width: 90%;
    max-height: 90%;
    object-fit: contain;
    transition: transform 0.3s ease;
}
.main-image:hover img {
    transform: scale(1.05);
}

@media (max-width: 991px) {
    .product-grid {
        grid-template-columns: 1fr !important;
        gap: 25px !important;
        padding: 24px 18px !important;
    }
    .main-image {
        height: 350px !important;
    }
}

@media (max-width: 768px) {
    .product-grid {
        grid-template-columns: 1fr !important;
        gap: 20px !important;
        padding: 16px 12px !important;
        margin-bottom: 20px !important;
        border-radius: 10px !important;
    }
    .main-image {
        height: 280px !important;
    }
    .product-info h1 {
        font-size: 1.3rem !important;
        line-height: 1.35 !important;
        margin-bottom: 12px !important;
    }
    .description {
        font-size: 0.92rem !important;
        margin-bottom: 18px !important;
        line-height: 1.6 !important;
    }
    .action-buttons {
        gap: 10px !important;
    }
    .action-buttons .btn-primary {
        padding: 12px 14px !important;
        font-size: 0.92rem !important;
    }
    .contact-grid {
        display: grid !important;
        grid-template-columns: 1fr 1fr !important;
        gap: 8px !important;
    }
    .contact-grid .btn {
        padding: 10px 4px !important;
        font-size: 0.82rem !important;
        white-space: nowrap !important;
    }
    .thumbnails {
        grid-template-columns: repeat(auto-fill, minmax(60px, 1fr)) !important;
        gap: 8px !important;
    }
    .thumb {
        height: 60px !important;
    }
    .product-tabs-wrapper {
        margin-top: 25px !important;
        margin-bottom: 25px !important;
    }
    .tab-btn {
        padding: 10px 16px !important;
        font-size: 0.92rem !important;
    }
}

@media (max-width: 420px) {
    .product-grid {
        padding: 14px 10px !important;
        gap: 15px !important;
    }
    .main-image {
        height: 220px !important;
    }
    .product-info h1 {
        font-size: 1.15rem !important;
    }
    .contact-grid {
        grid-template-columns: 1fr !important;
        gap: 8px !important;
    }
    .contact-grid .btn {
        padding: 10px 12px !important;
        font-size: 0.85rem !important;
    }
}

/* CSS Tabs */
.product-tabs-wrapper {
    margin-top: 40px;
    margin-bottom: 40px;
}
.tab-nav {
    display: flex;
    gap: 12px;
    border-bottom: 2px solid #e5e7eb;
    margin-bottom: 25px;
}
.tab-btn {
    background: none;
    border: none;
    padding: 12px 24px;
    font-size: 16px;
    font-weight: 600;
    color: #4b5563;
    cursor: pointer;
    position: relative;
    transition: all 0.3s ease;
    text-transform: uppercase;	
}
.tab-btn.active {
    color: #00703c;
}
.tab-btn.active::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 100%;
    height: 3px;
    background-color: #00703c;
    border-radius: 2px;
}
.tab-pane {
    display: none;
    line-height: 1.7;
    color: #374151;
    overflow-x: hidden;
}
.tab-pane.active {
    display: block;
}
.tab-pane table {
    width: 100%;
    border-collapse: collapse;
}
.tab-pane table th, .tab-pane table td {
    border: 1px solid #e5e7eb;
    padding: 10px 14px;
}
/* Responsive Media, Video & Containers */
.tab-pane .table-container,
.table-container {
    width: 100%;
    max-width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    margin-bottom: 20px;
}
.tab-pane .video-container,
.video-container {
    position: relative;
    width: 100%;
    max-width: 850px;
    margin: 20px auto;
    text-align: center;
    border-radius: 8px;
    overflow: hidden;
    background-color: #000;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}
.tab-pane video,
.tab-pane .responsive-video,
.video-container video,
video.responsive-video,
.tab-pane video.responsive-video {
    max-width: 100% !important;
    width: 100% !important;
    height: auto !important;
    max-height: 520px;
    display: block;
    margin: 0 auto;
    object-fit: contain;
    border-radius: 8px;
}
.tab-pane img {
    max-width: 100% !important;
    height: auto !important;
    border-radius: 6px;
}
.tab-pane iframe,
.tab-pane embed,
.tab-pane object {
    max-width: 100% !important;
    border-radius: 8px;
}
/* Product Gallery Thumbnails */
.thumbnails {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(75px, 1fr));
    gap: 10px;
    margin-top: 10px;
}
.thumb {
    height: 75px;
    background: #f8fafc;
    border: 2px solid #e2e8f0;
    border-radius: 6px;
    cursor: pointer;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 4px;
    transition: all 0.2s ease;
}
.thumb.active,
.thumb:hover {
    border-color: #00703c;
    box-shadow: 0 2px 8px rgba(0, 112, 60, 0.2);
}
.thumb img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

/* Product Content Gallery - Dàn đều khung */
.product-content-gallery {
    margin-top: 30px;
    padding-top: 25px;
    border-top: 1px dashed #e2e8f0;
}
.product-content-gallery-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 14px;
    width: 100%;
}
@media (max-width: 991px) {
    .product-content-gallery-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}
@media (max-width: 576px) {
    .product-content-gallery-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }
}
.product-content-gallery-item {
    width: 100%;
    aspect-ratio: 1 / 1;
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid #e2e8f0;
    box-shadow: 0 2px 6px rgba(0,0,0,0.04);
    cursor: pointer;
    background: #f8fafc;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}
.product-content-gallery-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(0, 112, 60, 0.15);
    border-color: #00703c;
}
.product-content-gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.3s ease;
}
.product-content-gallery-item:hover img {
    transform: scale(1.06);
}

/* Lightbox Modal Popup */
.image-lightbox-modal {
    display: none;
    position: fixed;
    z-index: 999999;
    left: 0;
    top: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.85);
    backdrop-filter: blur(4px);
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.25s ease;
}
.image-lightbox-modal.active {
    display: flex;
    opacity: 1;
}
.image-lightbox-content {
    max-width: 90vw;
    max-height: 85vh;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}
.image-lightbox-content img {
    max-width: 100%;
    max-height: 85vh;
    object-fit: contain;
    border-radius: 8px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.6);
    animation: zoomInLightBox 0.25s ease;
}
@keyframes zoomInLightBox {
    from { transform: scale(0.85); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}
.image-lightbox-close {
    position: absolute;
    top: 20px;
    right: 25px;
    color: #fff;
    font-size: 32px;
    font-weight: bold;
    cursor: pointer;
    background: rgba(0,0,0,0.5);
    width: 44px;
    height: 44px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
    transition: all 0.2s ease;
}
.image-lightbox-close:hover {
    background: rgba(255,255,255,0.25);
    transform: scale(1.1);
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
            <?php if (!empty($obj_detail['ccat_products'])): ?>
                <span class="sep">&rsaquo;</span>
                <a href="<?php echo base_url(); ?>danh-muc/<?php echo $obj_detail['ccode_cat']; ?>"><?php echo htmlspecialchars($obj_detail['ccat_products']); ?></a>
            <?php endif; ?>
            <span class="sep">&rsaquo;</span>
            <span class="current"><?php echo htmlspecialchars($obj_detail['cproducts']); ?></span>
        </div>

        <!-- Product Detail Main Section -->
        <div class="product-grid">
            <!-- Left: Gallery -->
            <div class="product-gallery">
                <div class="main-image">
                    <img id="main-product-img" src="<?php echo $img_main; ?>" alt="<?php echo htmlspecialchars($obj_detail['cproducts']); ?>">
                </div>
                <?php 
                $list_sub_images = get_img_by_product($obj_detail['nid']); 
                ?>
                <div class="thumbnails">
                    <div class="thumb active" onclick="changeProductImage(this, '<?php echo $img_main; ?>')">
                        <img src="<?php echo $img_main; ?>" alt="<?php echo htmlspecialchars($obj_detail['cproducts']); ?>">
                    </div>
                    <?php if (!empty($list_sub_images)): ?>
                        <?php foreach ($list_sub_images as $sub_img): ?>
                            <?php if (!empty($sub_img['cimage'])): 
                                $sub_img_src = base_url().'upload/images_product/sub_images/'.$sub_img['cimage'];
                            ?>
                                <div class="thumb" onclick="changeProductImage(this, '<?php echo $sub_img_src; ?>')">
                                    <img src="<?php echo $sub_img_src; ?>" alt="<?php echo htmlspecialchars($obj_detail['cproducts']); ?>">
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right: Info & Actions -->
            <div class="product-info">
                <h1><?php echo htmlspecialchars($obj_detail['cproducts']); ?></h1>

                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <span>(Đánh giá cao)</span>
                </div>

                <div class="description">
                    <?php echo !empty($obj_detail['cdescription']) ? fix_content_images($obj_detail['cdescription']) : '<p>Chưa có mô tả ngắn cho sản phẩm này.</p>'; ?>
                </div>

                <div class="action-buttons">
                    <button class="btn btn-primary" onclick="window.location.href='tel:<?php echo get_value_by_config(12); ?>';" style="box-shadow: 0 4px 15px rgba(57, 163, 72, 0.4);">
                        <i class="fas fa-headset"></i> LIÊN HỆ KỸ THUẬT
                    </button>
                    <div class="contact-grid">
                        <button class="btn btn-outline" onclick="window.location.href='tel:0333872153';"><i class="fas fa-phone-alt"></i> 0333.872.153</button>
                        <button class="btn btn-outline" onclick="window.location.href='tel:0986303910';"><i class="fas fa-phone-alt"></i> 0986.303.910</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs Section: Mô tả (cdetail) & Thông số kỹ thuật (cgioi_thieu) -->
        <div class="product-tabs-wrapper reveal">
            <div class="tab-nav">
                <button class="tab-btn active" type="button">Mô Tả Sản Phẩm</button>
            </div>
            
            <div id="tab-detail" class="tab-pane active">
                <?php 
                $detail_str = isset($obj_detail['cdetail']) ? trim($obj_detail['cdetail']) : '';
                $specs_str = isset($obj_detail['cgioi_thieu']) ? trim($obj_detail['cgioi_thieu']) : '';

                if ($detail_str !== '') {
                    echo fix_content_images($detail_str);
                } elseif ($specs_str === '') {
                    echo '<p>Thông tin chi tiết đang được cập nhật...</p>';
                }

                if ($specs_str !== '') {
                    echo '<div class="product-specs-section" style="margin-top: 35px; padding-top: 25px; border-top: 1px dashed #e2e8f0;">';
                    echo '<h3 style="color: var(--primary-green, #00703c); font-size: 1.25rem; font-weight: 700; margin-bottom: 18px;"><i class="fas fa-sliders-h" style="margin-right: 8px;"></i>Thông số kỹ thuật</h3>';
                    echo fix_content_images($specs_str);
                    echo '</div>';
                }
                ?>
            </div>
        </div>

        <!-- Related Products -->
        <div class="related-products">
            <h2 class="section-title reveal">Sản phẩm liên quan</h2>
            <div class="related-grid">
                <?php 
                $list_relate = get_product_relate($obj_detail['nid'], $obj_detail['nid_cat_products']);
                if (!empty($list_relate)) {
                    $delay = 0;
                    foreach ($list_relate as $rel) {
                        $rel_img = (!empty($rel['cimage_resize'])) 
                            ? base_url().'upload/images_product/resize_images/'.$rel['cimage_resize'] 
                            : base_url().'images/logo.png';
                        $delay_style = ($delay > 0) ? ' style="transition-delay: '.$delay.'s;"' : '';
                ?>
                    <div class="product-card reveal"<?php echo $delay_style; ?>>
                        <a href="<?php echo base_url(); ?>san-pham/<?php echo $rel['ccode']; ?>">
                            <img src="<?php echo $rel_img; ?>" alt="<?php echo htmlspecialchars($rel['cproducts']); ?>">
                        </a>
                        <h3><?php echo htmlspecialchars($rel['cproducts']); ?></h3>
                        <a href="<?php echo base_url(); ?>san-pham/<?php echo $rel['ccode']; ?>" class="btn btn-outline btn-sm">XEM CHI TIẾT</a>
                    </div>
                <?php 
                        $delay += 0.1;
                    }
                } else {
                    echo '<p>Không có sản phẩm liên quan nào.</p>';
                }
                ?>
            </div>
        </div>
</div>

<!-- Image Lightbox Modal -->
<div id="imageLightboxModal" class="image-lightbox-modal" onclick="closeImagePopup(event)">
    <span class="image-lightbox-close" onclick="closeImagePopup(event)" title="Đóng">&times;</span>
    <div class="image-lightbox-content" onclick="event.stopPropagation()">
        <img id="imageLightboxImg" src="" alt="Popup Image">
    </div>
</div>

<script>
function changeProductImage(elem, imgSrc) {
    var mainImg = document.getElementById('main-product-img');
    if (mainImg) {
        mainImg.src = imgSrc;
    }
    var thumbs = document.querySelectorAll('.product-gallery .thumb');
    thumbs.forEach(function(th) {
        th.classList.remove('active');
    });
    if (elem) {
        elem.classList.add('active');
    }
}

function switchTab(evt, tabId) {
    var panes = document.querySelectorAll('.tab-pane');
    panes.forEach(function(pane) {
        pane.classList.remove('active');
    });

    var buttons = document.querySelectorAll('.tab-btn');
    buttons.forEach(function(btn) {
        btn.classList.remove('active');
    });

    document.getElementById(tabId).classList.add('active');
    evt.currentTarget.classList.add('active');
}

function openImagePopup(target) {
    var modal = document.getElementById('imageLightboxModal');
    var modalImg = document.getElementById('imageLightboxImg');
    if (!modal || !modalImg) return;

    var src = '';
    if (typeof target === 'string') {
        src = target;
    } else if (target && target.nodeType) {
        if (target.tagName === 'IMG') {
            src = target.src || target.getAttribute('src');
        } else {
            var innerImg = target.querySelector('img');
            src = innerImg ? (innerImg.src || innerImg.getAttribute('src')) : (target.getAttribute('href') || target.getAttribute('data-src') || '');
        }
    }

    if (src) {
        // Tự động chuẩn hóa base_url nếu đường dẫn là tương đối hoặc bắt đầu bằng /fileman /upload
        if (!src.startsWith('http://') && !src.startsWith('https://') && !src.startsWith('data:') && !src.startsWith('blob:')) {
            var baseUrl = '<?php echo base_url(); ?>'.replace(/\/+$/, '') + '/';
            var cleanPath = src.replace(/^\/+/, '');
            src = baseUrl + cleanPath;
        }
        modalImg.src = src;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

function closeImagePopup(event) {
    var modal = document.getElementById('imageLightboxModal');
    if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeImagePopup();
    }
});

// Tự động gán sự kiện click mở Lightbox cho tất cả ảnh trong product-content-gallery
document.addEventListener('DOMContentLoaded', function() {
    var galleryItems = document.querySelectorAll('.product-content-gallery-item, .product-content-gallery a, .product-content-gallery img');
    galleryItems.forEach(function(el) {
        el.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            openImagePopup(this);
        });
    });
});
</script>

<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>