<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
?>

<style>
/* --- ABOUT PAGE STYLES --- */
.about-page-wrapper {
    padding-bottom: 60px;
}

/* Intro Section */
.about-intro-card {
    background: var(--bg-card);
    border: 1px solid var(--border-light);
    border-radius: 16px;
    padding: 40px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
    margin-bottom: 35px;
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 40px;
    align-items: center;
}

.about-intro-text .sub-title {
    display: inline-block;
    color: var(--primary-green);
    font-weight: 700;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 10px;
    background: rgba(57, 163, 72, 0.1);
    padding: 4px 14px;
    border-radius: 20px;
}

.about-intro-text h1 {
    font-size: 2.2rem;
    color: var(--secondary-blue);
    font-weight: 800;
    line-height: 1.3;
    margin-bottom: 20px;
}

.about-intro-text p {
    font-size: 1.05rem;
    color: #4a5568;
    line-height: 1.8;
    margin-bottom: 20px;
    text-align: justify;
}

.about-intro-text .intro-btn-group {
    display: flex;
    gap: 15px;
    align-items: center;
    flex-wrap: nowrap;
}

.about-intro-text .intro-btn-group .btn {
    width: auto;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 11px 22px;
    font-size: 0.95rem;
    font-weight: 600;
    text-decoration: none;
    border-radius: 8px;
    transition: var(--transition-smooth);
}

.about-intro-text .intro-btn-group .btn-primary {
    background: var(--primary-green);
    color: #ffffff;
    border: 1px solid var(--primary-green);
}

.about-intro-text .intro-btn-group .btn-primary:hover {
    background: var(--primary-green-hover);
    border-color: var(--primary-green-hover);
    transform: translateY(-2px);
}

.about-intro-text .intro-btn-group .btn-outline {
    background: transparent;
    color: var(--primary-green);
    border: 1px solid var(--primary-green);
}

.about-intro-text .intro-btn-group .btn-outline:hover {
    background: rgba(57, 163, 72, 0.08);
    transform: translateY(-2px);
}

.about-intro-img {
    position: relative;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
}

.about-intro-img img {
    width: 100%;
    height: 380px;
    object-fit: cover;
    display: block;
    transition: transform 0.5s ease;
}

.about-intro-img:hover img {
    transform: scale(1.03);
}

/* Tầm nhìn & Sứ mệnh (Vision & Mission) Section */
.about-vm-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
    margin-bottom: 35px;
}

.about-vision-card,
.about-mission-card {
    background: linear-gradient(135deg, #2E4094 0%, #1e2b66 100%);
    border-radius: 16px;
    padding: 35px 35px;
    color: #ffffff;
    position: relative;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(46, 64, 148, 0.18);
    display: flex;
    flex-direction: column;
}

.about-mission-card {
    background: linear-gradient(135deg, #1b4332 0%, #2D6A4F 100%);
    box-shadow: 0 10px 25px rgba(45, 106, 79, 0.18);
}

.about-vision-card::after,
.about-mission-card::after {
    content: '';
    position: absolute;
    right: -30px;
    bottom: -30px;
    width: 150px;
    height: 150px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 50%;
    pointer-events: none;
}

.about-vision-header,
.about-mission-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 15px;
}

.about-vision-icon,
.about-mission-icon {
    width: 48px;
    height: 48px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #5be06f;
    font-size: 1.4rem;
    flex-shrink: 0;
}

.about-mission-icon {
    color: #ffd166;
}

.about-vision-card h2,
.about-mission-card h2 {
    font-size: 1.5rem;
    font-weight: 700;
    letter-spacing: 0.5px;
    margin: 0;
    color: #ffffff;
}

.about-vision-card p,
.about-mission-card p {
    font-size: 1.02rem;
    line-height: 1.75;
    color: #e2e8f0;
    margin: 0;
    flex-grow: 1;
}

/* Giá trị cốt lõi (Core Values) Section */
.about-values-section {
    background: var(--bg-card);
    border: 1px solid var(--border-light);
    border-radius: 16px;
    padding: 40px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
    margin-bottom: 35px;
}

.about-values-title {
    text-align: center;
    margin-bottom: 35px;
}

.about-values-title .sub-title {
    display: inline-block;
    color: var(--primary-green);
    font-weight: 700;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 8px;
}

.about-values-title h2 {
    font-size: 1.85rem;
    color: var(--secondary-blue);
    font-weight: 800;
    margin: 0;
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
}

.value-item {
    background: #fdfdfd;
    border: 1px solid #edf2f7;
    border-radius: 12px;
    padding: 26px;
    display: flex;
    gap: 20px;
    align-items: flex-start;
    transition: var(--transition-smooth);
}

.value-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
    border-color: var(--primary-green);
}

.value-icon-box {
    width: 52px;
    height: 52px;
    flex-shrink: 0;
    border-radius: 12px;
    background: rgba(57, 163, 72, 0.1);
    color: var(--primary-green);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    transition: var(--transition-smooth);
}

.value-item:hover .value-icon-box {
    background: var(--primary-green);
    color: #ffffff;
}

.value-item-content h3 {
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--secondary-blue);
    margin-bottom: 8px;
}

.value-item-content p {
    font-size: 0.95rem;
    color: #4a5568;
    line-height: 1.6;
    margin: 0;
}

/* Call To Action Banner */
.about-cta-card {
    background: linear-gradient(135deg, rgba(57, 163, 72, 0.08) 0%, rgba(46, 64, 148, 0.08) 100%);
    border: 1.5px dashed var(--primary-green);
    border-radius: 16px;
    padding: 35px 30px;
    text-align: center;
}

.about-cta-card h3 {
    font-size: 1.4rem;
    color: var(--secondary-blue);
    font-weight: 700;
    margin-bottom: 10px;
}

.about-cta-card p {
    color: var(--text-muted);
    font-size: 1rem;
    margin-bottom: 20px;
}

.about-cta-card .btn-group {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
    flex-wrap: nowrap;
}

.about-cta-card .btn-group .btn {
    white-space: nowrap;
}

/* Responsive */
@media (max-width: 991px) {
    .about-intro-card {
        grid-template-columns: 1fr;
        padding: 30px 25px;
        gap: 30px;
    }
    .about-intro-img img {
        height: 300px;
    }
    .about-vm-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    .values-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .about-intro-text h1 {
        font-size: 1.7rem;
    }
    .about-vision-card,
    .about-mission-card {
        padding: 25px 20px;
    }
    .about-values-section {
        padding: 30px 20px;
    }
    .value-item {
        padding: 20px 16px;
        gap: 15px;
    }
}

@media (max-width: 576px) {
    .about-intro-text .intro-btn-group {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        gap: 8px;
        width: 100%;
    }
    .about-intro-text .intro-btn-group .btn {
        flex: 1;
        min-width: 0;
        padding: 9px 6px;
        font-size: 0.8rem;
        text-align: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .about-cta-card {
        padding: 25px 12px;
    }
    .about-cta-card h3 {
        font-size: 1.15rem;
    }
    .about-cta-card p {
        font-size: 0.9rem;
    }
    .about-cta-card .btn-group {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        gap: 8px;
        justify-content: center;
        width: 100%;
    }
    .about-cta-card .btn-group .btn {
        flex: 1;
        min-width: 0;
        padding: 9px 6px;
        font-size: 0.8rem;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
    }
}
</style>

<div class="container about-page-wrapper reveal">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> Trang chủ</a>
        <span class="sep">&rsaquo;</span>
        <span class="current">Giới thiệu</span>
    </div>

    <!-- Giới thiệu chung -->
    <section class="about-intro-card">
        <div class="about-intro-text">
            <span class="sub-title">Về chúng tôi</span>
            <h1>CÔNG TY TNHH KỸ THUẬT VÀ CÔNG NGHỆ CYCLE ELECTRIC</h1>
            <p>
                Công ty chúng tôi chuyên cung cấp các giải pháp công nghệ tiên tiến trong lĩnh vực điện và năng lượng tái tạo. Với mục tiêu mang lại những sản phẩm và dịch vụ tối ưu cho các khách hàng trong mọi lĩnh vực, chúng tôi tự hào là đơn vị tiên phong trong việc nâng cao hiệu quả sử dụng năng lượng và bảo vệ môi trường.
            </p>
            <div class="intro-btn-group">
                <a href="<?php echo base_url(); ?>san-pham" class="btn btn-primary btn-sm">Xem Sản Phẩm</a>
                <a href="<?php echo base_url(); ?>#contact" class="btn btn-outline btn-sm">Liên Hệ Với Chúng Tôi</a>
            </div>
        </div>

        <div class="about-intro-img">
            <!-- Link ảnh đại diện: Bạn có thể cập nhật đường dẫn ảnh (src) bên dưới -->
            <img src="<?php echo base_url(); ?>images/about.jpg" alt="Giới thiệu Cycle Electric">
        </div>
    </section>

    <!-- Tầm nhìn & Sứ mệnh -->
    <div class="about-vm-grid">
        <!-- Tầm nhìn -->
        <section class="about-vision-card">
            <div class="about-vision-header">
                <div class="about-vision-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h2>TẦM NHÌN</h2>
            </div>
            <p>
                Chúng tôi phấn đấu trở thành đối tác chiến lược hàng đầu tại Việt Nam trong lĩnh vực điện, năng lượng và công nghệ. Không ngừng đổi mới, phát triển các giải pháp toàn diện từ thiết bị điện, cảm biến, trạm sạc xe điện đến năng lượng tái tạo, kiến tạo hệ sinh thái công nghệ thông minh, góp phần thúc đẩy tương lai xanh và bền vững.
            </p>
        </section>

        <!-- Sứ mệnh -->
        <section class="about-mission-card">
            <div class="about-mission-header">
                <div class="about-mission-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h2>SỨ MỆNH</h2>
            </div>
            <p>
                Cung cấp các giải pháp công nghệ và năng lượng toàn diện, thông minh, an toàn và bền vững, đáp ứng nhu cầu đa dạng của khách hàng và đối tác. Cycle Electric không ngừng đổi mới, tối ưu hóa hiệu quả vận hành và mở rộng hợp tác, góp phần thúc đẩy chuyển đổi xanh, nâng cao chất lượng cuộc sống và kiến tạo tương lai bền vững.
            </p>
        </section>
    </div>

    <!-- Giá trị cốt lõi -->
    <section class="about-values-section">
        <div class="about-values-title">
            <span class="sub-title">Nguyên tắc hoạt động</span>
            <h2>GIÁ TRỊ CỐT LÕI</h2>
        </div>

        <div class="values-grid">
            <!-- 1. Tiên phong công nghệ -->
            <div class="value-item">
                <div class="value-icon-box">
                    <i class="fas fa-microchip"></i>
                </div>
                <div class="value-item-content">
                    <h3>Tiên phong công nghệ</h3>
                    <p>Cập nhật và ứng dụng những công nghệ mới nhất trong lĩnh vực năng lượng.</p>
                </div>
            </div>

            <!-- 2. Bảo vệ môi trường -->
            <div class="value-item">
                <div class="value-icon-box">
                    <i class="fas fa-leaf"></i>
                </div>
                <div class="value-item-content">
                    <h3>Bảo vệ môi trường</h3>
                    <p>Phát triển các sản phẩm và giải pháp thân thiện với môi trường, giảm thiểu tác động của năng lượng hóa thạch.</p>
                </div>
            </div>

            <!-- 3. Khách hàng là trọng tâm -->
            <div class="value-item">
                <div class="value-icon-box">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="value-item-content">
                    <h3>Khách hàng là trọng tâm</h3>
                    <p>Cam kết mang đến sự hài lòng tối đa cho khách hàng với các sản phẩm và dịch vụ chất lượng.</p>
                </div>
            </div>

            <!-- 4. Tinh thần hợp tác và phát triển -->
            <div class="value-item">
                <div class="value-icon-box">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="value-item-content">
                    <h3>Tinh thần hợp tác và phát triển</h3>
                    <p>Xây dựng mối quan hệ bền vững với khách hàng và đối tác trên nền tảng hợp tác win-win.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Box -->
    <div class="about-cta-card">
        <h3>Đồng hành cùng chúng tôi trên hành trình phát triển bền vững</h3>
        <p>Liên hệ ngay với đội ngũ chuyên gia của chúng tôi để được tư vấn giải pháp năng lượng tối ưu nhất.</p>
        <div class="btn-group">
            <a href="tel:<?php echo get_value_by_config(12); ?>" class="btn btn-primary btn-sm"><i class="fas fa-phone-alt" style="margin-right: 6px;"></i> Hotline: <?php echo get_value_by_config(12); ?></a>
            <a href="<?php echo base_url(); ?>san-pham" class="btn btn-outline btn-sm">Khám Phá Giải Pháp</a>
        </div>
    </div>
</div>

<?php 
   $this->load->view('modules/mod_footer');
   $this->load->view('footer');
?>