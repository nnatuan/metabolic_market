<?php
/**
 * Module Sidebar Danh Mục Sản Phẩm (Phân cấp: Material Product > Category Product)
 * @param string $active_type ('all', 'sec', 'cat')
 * @param string $active_code (ccode_sec hoặc ccode_cat)
 */

$list_materials = get_material_product_all();
$active_type = isset($active_type) ? $active_type : 'all';
$active_code = isset($active_code) ? $active_code : '';
?>
<aside class="products-sidebar">
    <div class="sidebar-card">
        <div class="sidebar-title">
            <i class="fas fa-layer-group"></i>
            <span>Danh Mục Sản Phẩm</span>
        </div>
        <ul class="category-menu-list">
            <!-- Mục Tất cả sản phẩm -->
            <li class="menu-item-all">
                <a href="<?php echo base_url(); ?>san-pham" class="<?php echo ($active_type == 'all') ? 'active' : ''; ?>">
                    <i class="fas fa-th-large" style="margin-right: 8px; font-size: 0.85rem; flex-shrink: 0;"></i>
                    <span>Tất cả sản phẩm</span>
                </a>
            </li>

            <!-- Danh sách Phân cấp: Material Products (Cấp 1) > Cat Products (Cấp 2) -->
            <?php if (!empty($list_materials)): ?>
                <?php foreach ($list_materials as $mat): 
                    $mat_cats = get_cat_by_sec($mat['nid']);
                    $mat_slug = function_exists('get_clean_material_slug') ? get_clean_material_slug($mat) : (!empty($mat['ccode']) ? $mat['ccode'] : '');
                    $is_mat_active = ($active_type == 'sec' && !empty($active_code) && ($active_code == $mat['ccode'] || $active_code == $mat_slug || (isset($mat['nid']) && $active_code == $mat['nid'])));
                    
                    // Kiểm tra xem có category con nào đang active không
                    $has_active_child = false;
                    if (!empty($mat_cats) && $active_type == 'cat' && !empty($active_code)) {
                        foreach ($mat_cats as $c) {
                            if ($c['ccode'] == $active_code) {
                                $has_active_child = true;
                                break;
                            }
                        }
                    }
                    $is_expanded = ($is_mat_active || $has_active_child);
                ?>
                    <li class="material-group <?php echo $is_expanded ? 'expanded' : ''; ?> <?php echo $is_mat_active ? 'is-current-active' : ''; ?>">
                        <div class="material-header <?php echo $is_mat_active ? 'active' : ''; ?>">
                            <!-- Danh mục cha: tmaterial_product -> Đổ vào list_sec.php -->
                            <a href="<?php echo base_url(); ?>danh-muc/<?php echo $mat_slug; ?>" class="material-link" title="<?php echo htmlspecialchars($mat['cmaterial_products']); ?>">
                                <i class="fas fa-folder<?php echo $is_expanded ? '-open' : ''; ?>" style="margin-right: 8px; font-size: 0.85rem; flex-shrink: 0;"></i>
                                <span class="material-name"><?php echo htmlspecialchars($mat['cmaterial_products']); ?></span>
                            </a>
                            
                            <!-- Nút mũi tên thu gọn / mở rộng danh mục con -->
                            <?php if (!empty($mat_cats)): ?>
                                <button type="button" class="material-toggle-btn" title="Thu gọn / Mở rộng" aria-label="Toggle <?php echo htmlspecialchars($mat['cmaterial_products']); ?>">
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                            <?php endif; ?>
                        </div>

                        <!-- Danh mục con: tcat_products -> Đổ vào list_cat.php -->
                        <?php if (!empty($mat_cats)): ?>
                            <ul class="sub-category-list">
                                <?php foreach ($mat_cats as $cat): 
                                    $is_cat_active = ($active_type == 'cat' && !empty($active_code) && $cat['ccode'] == $active_code);
                                ?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>danh-muc/<?php echo $cat['ccode']; ?>" class="sub-cat-link <?php echo $is_cat_active ? 'active' : ''; ?>" title="<?php echo htmlspecialchars($cat['ccat_products']); ?>">
                                            <i class="fas fa-angle-right" style="margin-right: 6px; font-size: 0.75rem; opacity: 0.7; flex-shrink: 0;"></i>
                                            <span class="cat-name"><?php echo htmlspecialchars($cat['ccat_products']); ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Box Hỗ Trợ Nhanh -->
    <div class="sidebar-support">
        <i class="fas fa-headset"></i>
        <h4>Tư Vấn Kỹ Thuật</h4>
        <p>Liên hệ ngay để được hỗ trợ báo giá và tư vấn giải pháp tốt nhất.</p>
        <a href="tel:<?php echo get_value_by_config(12); ?>" class="hotline-btn"><i class="fas fa-phone-alt" style="font-size: 0.85rem; margin-right: 5px;"></i> Liên Hệ Ngay (<?php echo get_value_by_config(12); ?>)</a>
    </div>
</aside>

<style>
/* Material Header Container with Toggle Button */
.material-header {
    display: flex;
    align-items: stretch;
    justify-content: space-between;
    background: #f8fafc;
    border: 1px solid #edf2f7;
    border-radius: 8px;
    transition: all 0.2s ease;
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
    box-shadow: none !important;
    min-width: 0;
}

.material-header.active .material-link {
    color: var(--primary-green) !important;
}

.material-header .material-name {
    font-size: 0.88rem;
    text-transform: uppercase;
    letter-spacing: 0.2px;
    line-height: 1.35;
    word-break: break-word;
}

/* Nút mũi tên thu gọn / mở rộng */
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

/* Xoay icon mũi tên khi đóng / mở */
.material-toggle-btn i {
    transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    transform: rotate(-90deg); /* Mặc định mũi tên hướng sang phải khi thu gọn */
}

.material-group.expanded .material-toggle-btn i {
    transform: rotate(0deg); /* Mũi tên hướng xuống khi mở rộng */
}

/* Ẩn danh mục con khi chưa mở rộng */
.material-group:not(.expanded) .sub-category-list {
    display: none;
}

.material-group.expanded .sub-category-list {
    display: block;
    animation: fadeInSubMenu 0.2s ease-in-out;
}

@keyframes fadeInSubMenu {
    from {
        opacity: 0;
        transform: translateY(-4px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var toggleBtns = document.querySelectorAll('.material-toggle-btn');
    toggleBtns.forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var group = btn.closest('.material-group');
            if (group) {
                var folderIcon = group.querySelector('.material-link > i');
                if (group.classList.contains('expanded')) {
                    group.classList.remove('expanded');
                    if (folderIcon && !group.classList.contains('is-current-active')) {
                        folderIcon.className = 'fas fa-folder';
                    }
                } else {
                    group.classList.add('expanded');
                    if (folderIcon) {
                        folderIcon.className = 'fas fa-folder-open';
                    }
                }
            }
        });
    });
});
</script>
