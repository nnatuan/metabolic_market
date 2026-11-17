<?php
   $this->load->view('header');
   $this->load->view('header_end');
?>

<!-- ==========================================================================
     METABOLIC MARKET by GỌN KHOẺ (QCARE)
     Curated Clinical Marketplace Sức Khỏe Chuyển Hóa & Giảm Cân Y Khoa
     Tài liệu tham chiếu: Gon_Khoe_Metabolic_Market_Partner_Pitch_Deck_v1.0.pdf
     ========================================================================== -->

<style>
html {
    scroll-behavior: smooth !important;
}

/* Offset vị trí cuộn cho toàn bộ các section/element có id để không bị dính vào sticky navbar */
section[id], div[id], [id] {
    scroll-margin-top: 88px;
}

:root {
    --mm-teal-dark: #062b2b;
    --mm-teal-main: #0B3B3C;
    --mm-teal-light: #0d4a4b;
    --mm-emerald: #10B981;
    --mm-emerald-light: #E6F7F2;
    --mm-emerald-dark: #065F46;
    --mm-amber: #F59E0B;
    --mm-amber-light: #FEF3C7;
    --mm-amber-dark: #92400E;
    --mm-sky: #0284C7;
    --mm-sky-light: #E0F2FE;
    --mm-sky-dark: #0369A1;
    --mm-slate-50: #F8FAFC;
    --mm-slate-100: #F1F5F9;
    --mm-slate-200: #E2E8F0;
    --mm-slate-600: #475569;
    --mm-slate-700: #334155;
    --mm-slate-800: #1E293B;
    --mm-slate-900: #0F172A;
    --mm-radius-sm: 8px;
    --mm-radius-md: 14px;
    --mm-radius-lg: 20px;
    --mm-radius-full: 9999px;
    --mm-shadow-subtle: 0 4px 20px -2px rgba(11, 59, 60, 0.08);
    --mm-shadow-hover: 0 12px 30px -4px rgba(11, 59, 60, 0.16);
}

.mm-wrapper {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background-color: var(--mm-slate-50);
    color: var(--mm-slate-800);
    line-height: 1.6;
    overflow-x: hidden;
}

.mm-container {
    width: 100%;
    max-width: 1240px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
}

.mm-section {
    padding: 70px 0;
    position: relative;
}

/* Announcement Topbar */
.mm-topbar {
    background: var(--mm-teal-dark);
    color: #e2f4ee;
    font-size: 0.85rem;
    padding: 7px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}
.mm-topbar-inner {
    width: 100%;
    padding-left: 28px;
    padding-right: 28px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
}
.mm-topbar-left {
    display: flex;
    align-items: center;
    gap: 10px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.mm-topbar-tag {
    background: rgba(16, 185, 129, 0.2);
    color: #34d399;
    padding: 2px 8px;
    border-radius: var(--mm-radius-full);
    font-weight: 600;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    white-space: nowrap;
}
.mm-topbar-right {
    display: flex;
    align-items: center;
    gap: 18px;
    white-space: nowrap;
    flex-shrink: 0;
}
.mm-topbar-link {
    color: #cbd5e1;
    text-decoration: none;
    transition: color 0.2s;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
}
.mm-topbar-link:hover {
    color: #34d399;
}

/* Navbar Full-Width (Giàn như Gọn Khoẻ) */
.mm-navbar {
    background: #ffffff;
    box-shadow: 0 2px 15px rgba(0,0,0,0.04);
    position: sticky;
    top: 0;
    z-index: 1000;
    border-bottom: 1px solid var(--mm-slate-200);
}
.mm-navbar-inner {
    width: 100%;
    padding-left: 28px;
    padding-right: 28px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 74px;
    gap: 16px;
}
.mm-brand-group {
    display: flex;
    align-items: center;
    gap: 14px;
    text-decoration: none;
    flex-shrink: 0;
}
.mm-brand-logo-img {
    height: 46px;
    max-height: 48px;
    width: auto;
    object-fit: contain;
    display: block;
}
.mm-brand-badge {
    background: var(--mm-emerald-light);
    color: var(--mm-emerald-dark);
    font-size: 0.75rem;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: var(--mm-radius-full);
    border: 1px solid rgba(16, 185, 129, 0.3);
    white-space: nowrap;
}

.mm-nav-links {
    display: flex;
    align-items: center;
    gap: clamp(16px, 1.5vw, 28px);
    margin: 0 auto;
    padding: 0 12px;
}
.mm-nav-link {
    color: #1e293b;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.94rem;
    transition: color 0.2s ease;
    position: relative;
    padding: 8px 2px;
    white-space: nowrap; /* Chống rớt chữ */
    letter-spacing: 0.1px;
}
.mm-nav-link:hover, .mm-nav-link.active {
    color: var(--mm-teal-main);
}
.mm-nav-link:hover::after, .mm-nav-link.active::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2.5px;
    background: var(--mm-emerald);
    border-radius: 2px;
}

.mm-nav-actions {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-shrink: 0; /* Chống co bóp nút bấm */
}
.mm-btn-outline {
    border: 1.5px solid var(--mm-teal-main);
    color: var(--mm-teal-main);
    background: transparent;
    padding: 9px 18px;
    border-radius: var(--mm-radius-full);
    font-weight: 600;
    font-size: 0.88rem;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
    flex-shrink: 0;
}
.mm-btn-outline.bg-white {
    background: #ffffff;
}
.mm-btn-outline:hover,
.mm-btn-outline.bg-white:hover {
    background: var(--mm-teal-main) !important;
    color: #ffffff !important;
    border-color: var(--mm-teal-main);
}
.mm-btn-primary {
    background: var(--mm-teal-main);
    color: #ffffff;
    border: 1.5px solid var(--mm-teal-main);
    padding: 9px 20px;
    border-radius: var(--mm-radius-full);
    font-weight: 600;
    font-size: 0.88rem;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0 4px 12px rgba(11, 59, 60, 0.2);
    white-space: nowrap;
    flex-shrink: 0;
}
.mm-btn-primary:hover {
    background: var(--mm-teal-light);
    border-color: var(--mm-teal-light);
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(11, 59, 60, 0.28);
}

/* Hero Section (Split Layout) */
.mm-hero {
    background: linear-gradient(135deg, #062b2b 0%, #0B3B3C 55%, #0f4d4e 100%);
    color: #ffffff;
    padding: 75px 0 85px;
    position: relative;
    overflow: hidden;
}
.mm-hero::after {
    content: '';
    position: absolute;
    right: -5%;
    top: -20%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(16, 185, 129, 0.15) 0%, rgba(16, 185, 129, 0) 70%);
    border-radius: 50%;
    pointer-events: none;
}
.mm-hero-grid {
    display: grid;
    grid-template-columns: 1.22fr 0.88fr;
    gap: 36px;
    align-items: center;
    position: relative;
    z-index: 2;
    margin-bottom: 50px;
}
.mm-hero-left {
    text-align: left;
}
.mm-hero-badges {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    flex-wrap: nowrap;
    gap: 8px;
    margin-bottom: 20px;
}
.mm-pill-badge {
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #bbf7d0;
    padding: 6px 14px;
    border-radius: var(--mm-radius-full);
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.3px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
    flex-shrink: 0;
}
.mm-hero-title {
    font-size: 2.9rem;
    font-weight: 900;
    line-height: 1.15;
    letter-spacing: -0.8px;
    margin-bottom: 16px;
    color: #ffffff;
}
.mm-hero-title span {
    background: linear-gradient(90deg, #34d399, #6ee7b7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.mm-hero-desc {
    font-size: 1.08rem;
    color: #e2e8f0;
    line-height: 1.65;
    margin-bottom: 30px;
    max-width: 620px;
}
.mm-hero-actions {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 12px;
    flex-wrap: nowrap;
    margin-bottom: 0;
}

/* Hero Right: Real Store Visual Card */
.mm-hero-right {
    position: relative;
}
.mm-hero-img-wrapper {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.45), 0 0 0 1px rgba(255, 255, 255, 0.15);
    background: #0f172a;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
}
.mm-hero-img-wrapper:hover {
    transform: translateY(-4px);
    box-shadow: 0 30px 60px -12px rgba(16, 185, 129, 0.25), 0 0 0 2px rgba(52, 211, 153, 0.5);
}
.mm-hero-main-img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: cover;
    aspect-ratio: 4 / 3;
}
.mm-img-floating-tag {
    position: absolute;
    background: rgba(6, 43, 43, 0.88);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(52, 211, 153, 0.4);
    color: #ffffff;
    font-size: 0.8rem;
    font-weight: 700;
    padding: 7px 14px;
    border-radius: var(--mm-radius-full);
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    z-index: 3;
}
.mm-img-floating-tag.top-left {
    top: 14px;
    left: 14px;
}
.mm-img-floating-tag.bottom-right {
    bottom: 14px;
    right: 14px;
}
.mm-img-floating-tag i {
    color: #34d399;
}
.mm-btn-hero-primary {
    background: #10B981;
    color: #062b2b;
    font-weight: 700;
    font-size: 0.94rem;
    padding: 12px 22px;
    border-radius: var(--mm-radius-full);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.25s ease;
    box-shadow: 0 8px 24px rgba(16, 185, 129, 0.35);
    white-space: nowrap;
    flex-shrink: 0;
}
.mm-btn-hero-primary:hover {
    background: #34d399;
    transform: translateY(-2px);
    box-shadow: 0 12px 28px rgba(16, 185, 129, 0.45);
}
.mm-btn-hero-secondary {
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(8px);
    border: 1.5px solid rgba(255, 255, 255, 0.3);
    color: #ffffff;
    font-weight: 600;
    font-size: 0.94rem;
    padding: 12px 22px;
    border-radius: var(--mm-radius-full);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.25s ease;
    white-space: nowrap;
    flex-shrink: 0;
}
.mm-btn-hero-secondary:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: #ffffff;
}

/* 4 Pillars */
.mm-pillars-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    text-align: left;
    margin-top: 20px;
}
.mm-pillar-card {
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.14);
    border-radius: var(--mm-radius-md);
    padding: 18px 20px;
    transition: transform 0.2s, background 0.2s;
}
.mm-pillar-card:hover {
    background: rgba(255, 255, 255, 0.14);
    transform: translateY(-3px);
}
.mm-pillar-num {
    color: #34d399;
    font-size: 0.8rem;
    font-weight: 800;
    margin-bottom: 4px;
}
.mm-pillar-title {
    font-size: 1.05rem;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 6px;
}
.mm-pillar-text {
    font-size: 0.82rem;
    color: #cbd5e1;
    line-height: 1.45;
}

/* Slogan Callout (Slide 2: Đối tác không chỉ mua mét kệ) */
.mm-slogan-callout {
    background: #062b2b;
    border: 1.5px solid rgba(52, 211, 153, 0.45);
    border-radius: 16px;
    padding: 20px 32px;
    margin-top: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 16px;
    box-shadow: 0 15px 35px -5px rgba(0, 0, 0, 0.35);
    text-align: center;
    position: relative;
    overflow: hidden;
}
.mm-slogan-callout::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at center, rgba(16, 185, 129, 0.15) 0%, transparent 70%);
    pointer-events: none;
}
.mm-slogan-icon {
    font-size: 1.5rem;
    color: #34d399;
    flex-shrink: 0;
    opacity: 0.9;
}
.mm-slogan-text {
    font-size: 1.15rem;
    font-weight: 800;
    color: #ffffff;
    line-height: 1.55;
    letter-spacing: 0.2px;
}
.mm-slogan-text span {
    color: #34d399;
}

/* Guardrail Banner */
.mm-guardrail-banner {
    background: #0f172a;
    color: #ffffff;
    padding: 28px 0;
    border-top: 3px solid #10B981;
    border-bottom: 1px solid var(--mm-slate-800);
}
.mm-guardrail-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
    flex-wrap: wrap;
}
.mm-guardrail-left {
    display: flex;
    align-items: center;
    gap: 18px;
    flex: 1;
    min-width: 300px;
}
.mm-guardrail-icon {
    width: 52px;
    height: 52px;
    border-radius: var(--mm-radius-md);
    background: rgba(16, 185, 129, 0.15);
    border: 1px solid rgba(16, 185, 129, 0.3);
    color: #34d399;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    flex-shrink: 0;
}
.mm-guardrail-quote {
    font-size: 1.25rem;
    font-weight: 800;
    color: #ffffff;
    letter-spacing: -0.2px;
    margin-bottom: 4px;
}
.mm-guardrail-quote span {
    color: #34d399;
}
.mm-guardrail-sub {
    font-size: 0.88rem;
    color: #94a3b8;
    line-height: 1.4;
}
.mm-guardrail-tiers {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}
.mm-tier-pill {
    padding: 8px 14px;
    border-radius: var(--mm-radius-sm);
    font-size: 0.78rem;
    font-weight: 700;
    display: flex;
    flex-direction: column;
    gap: 2px;
}
.mm-tier-pill.sky {
    background: rgba(2, 132, 199, 0.15);
    border: 1px solid rgba(2, 132, 199, 0.3);
    color: #7dd3fc;
}
.mm-tier-pill.emerald {
    background: rgba(16, 185, 129, 0.15);
    border: 1px solid rgba(16, 185, 129, 0.35);
    color: #6ee7b7;
}
.mm-tier-pill.amber {
    background: rgba(245, 158, 11, 0.15);
    border: 1px solid rgba(245, 158, 11, 0.35);
    color: #fcd34d;
}
.mm-tier-pill small {
    font-weight: 500;
    font-size: 0.7rem;
    opacity: 0.85;
}

/* Section Header */
.mm-section-header {
    text-align: center;
    max-width: 720px;
    margin: 0 auto 45px;
}
.mm-sub-title {
    color: var(--mm-emerald);
    font-size: 0.82rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    margin-bottom: 8px;
    display: inline-block;
}
.mm-main-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--mm-teal-main);
    letter-spacing: -0.5px;
    line-height: 1.25;
    margin-bottom: 12px;
}
.mm-title-desc {
    color: var(--mm-slate-600);
    font-size: 1rem;
    line-height: 1.6;
}

/* Stepper Cards */
.mm-journey-nav {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 40px;
}
.mm-journey-step {
    background: #ffffff;
    border: 2px solid var(--mm-slate-200);
    border-radius: var(--mm-radius-lg);
    padding: 24px 20px;
    cursor: pointer;
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    text-align: left;
}
.mm-journey-step:hover {
    border-color: var(--mm-emerald);
    transform: translateY(-3px);
    box-shadow: var(--mm-shadow-subtle);
}
.mm-journey-step.active {
    border-color: var(--mm-teal-main);
    background: #ffffff;
    box-shadow: 0 10px 25px -3px rgba(11, 59, 60, 0.12);
}
.mm-journey-step.active::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 0;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    border-top: 8px solid var(--mm-teal-main);
}
.mm-step-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 14px;
}
.mm-step-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: var(--mm-slate-100);
    color: var(--mm-teal-main);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    transition: all 0.2s;
}
.mm-journey-step.active .mm-step-icon {
    background: var(--mm-teal-main);
    color: #ffffff;
}
.mm-step-tag {
    font-size: 0.75rem;
    font-weight: 800;
    color: var(--mm-slate-600);
    background: var(--mm-slate-100);
    padding: 3px 10px;
    border-radius: var(--mm-radius-full);
}
.mm-journey-step.active .mm-step-tag {
    background: var(--mm-emerald-light);
    color: var(--mm-emerald-dark);
}
.mm-step-title {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--mm-slate-900);
    margin-bottom: 4px;
}
.mm-step-subtitle {
    font-size: 0.88rem;
    font-weight: 600;
    color: var(--mm-emerald);
    margin-bottom: 8px;
}
.mm-step-skus {
    font-size: 0.8rem;
    color: var(--mm-slate-600);
    line-height: 1.45;
}

/* Filter Bar */
.mm-filter-bar {
    background: #ffffff;
    border: 1px solid var(--mm-slate-200);
    border-radius: var(--mm-radius-lg);
    padding: 16px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 30px;
    box-shadow: var(--mm-shadow-subtle);
}
.mm-filter-group {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}
.mm-filter-label {
    font-size: 0.84rem;
    font-weight: 700;
    color: var(--mm-slate-700);
    margin-right: 4px;
    display: flex;
    align-items: center;
    gap: 6px;
}
.mm-filter-btn {
    border: 1px solid var(--mm-slate-200);
    background: #ffffff;
    color: var(--mm-slate-700);
    padding: 6px 14px;
    border-radius: var(--mm-radius-full);
    font-size: 0.82rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
}
.mm-filter-btn:hover {
    border-color: var(--mm-teal-main);
    color: var(--mm-teal-main);
}
.mm-filter-btn.active {
    background: var(--mm-teal-main);
    color: #ffffff;
    border-color: var(--mm-teal-main);
}

/* Products Grid */
.mm-products-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
}
.mm-product-card {
    background: #ffffff;
    border: 1px solid var(--mm-slate-200);
    border-radius: var(--mm-radius-lg);
    padding: 20px 16px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
}
.mm-product-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--mm-shadow-hover);
    border-color: rgba(16, 185, 129, 0.4);
}
.mm-card-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 14px;
    gap: 6px;
    flex-wrap: nowrap;
}
.mm-stage-badge {
    background: var(--mm-slate-100);
    color: var(--mm-slate-700);
    font-weight: 700;
    font-size: 0.68rem;
    padding: 3px 8px;
    border-radius: var(--mm-radius-full);
    letter-spacing: 0.2px;
    white-space: nowrap;
    display: inline-flex;
    align-items: center;
    flex-shrink: 0;
    line-height: 1.3;
}
.mm-tier-tag {
    font-size: 0.67rem;
    font-weight: 700;
    padding: 3px 8px;
    border-radius: var(--mm-radius-full);
    display: inline-flex;
    align-items: center;
    gap: 4px;
    white-space: nowrap;
    flex-shrink: 0;
    letter-spacing: 0.2px;
    line-height: 1.3;
}
.mm-tier-tag.emerald {
    background: var(--mm-emerald-light);
    color: var(--mm-emerald-dark);
    border: 1px solid rgba(16, 185, 129, 0.3);
}
.mm-tier-tag.amber {
    background: var(--mm-amber-light);
    color: var(--mm-amber-dark);
    border: 1px solid rgba(245, 158, 11, 0.3);
}
.mm-tier-tag.sky {
    background: var(--mm-sky-light);
    color: var(--mm-sky-dark);
    border: 1px solid rgba(2, 132, 199, 0.3);
}

.mm-product-brand {
    font-size: 0.78rem;
    font-weight: 600;
    color: var(--mm-slate-600);
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin-bottom: 4px;
}
.mm-product-name {
    font-size: 1.12rem;
    font-weight: 800;
    color: var(--mm-slate-900);
    line-height: 1.35;
    margin-bottom: 12px;
    min-height: 48px;
}
.mm-job-box {
    background: #f8fafc;
    border-left: 3px solid var(--mm-emerald);
    padding: 10px 12px;
    border-radius: 4px;
    font-size: 0.83rem;
    color: var(--mm-slate-700);
    line-height: 1.45;
    margin-bottom: 12px;
}
.mm-job-box strong {
    color: var(--mm-teal-main);
    display: block;
    margin-bottom: 2px;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.mm-guardrail-micro {
    background: #fffbeb;
    border: 1px dashed #fde68a;
    padding: 8px 10px;
    border-radius: 6px;
    font-size: 0.76rem;
    color: #92400e;
    line-height: 1.35;
    margin-bottom: 16px;
    display: flex;
    align-items: flex-start;
    gap: 6px;
}
.mm-guardrail-micro i {
    margin-top: 2px;
    color: var(--mm-amber);
    flex-shrink: 0;
}

.mm-card-foot {
    border-top: 1px solid var(--mm-slate-200);
    padding-top: 14px;
    margin-top: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.mm-price-block {
    display: flex;
    flex-direction: column;
}
.mm-price-main {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--mm-teal-main);
}
.mm-price-original {
    font-size: 0.8rem;
    color: #94a3b8;
    text-decoration: line-through;
}
.mm-stock-badge {
    font-size: 0.72rem;
    color: #059669;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 4px;
    margin-top: 3px;
}
.mm-btn-detail {
    background: var(--mm-teal-main);
    color: #ffffff;
    border: none;
    padding: 8px 16px;
    border-radius: var(--mm-radius-full);
    font-weight: 600;
    font-size: 0.82rem;
    cursor: pointer;
    transition: all 0.2s;
    text-decoration: none;
}
.mm-btn-detail:hover {
    background: var(--mm-emerald);
    color: var(--mm-slate-900);
}

/* Compare Grid */
.mm-compare-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}
.mm-compare-box {
    border-radius: var(--mm-radius-lg);
    padding: 36px 32px;
    position: relative;
    box-shadow: var(--mm-shadow-subtle);
}
.mm-compare-box.is-la {
    background: #ffffff;
    border: 2px solid #a7f3d0;
}
.mm-compare-box.is-khong {
    background: #ffffff;
    border: 2px solid #fecdd3;
}
.mm-compare-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 1px solid var(--mm-slate-200);
}
.mm-compare-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
}
.mm-compare-box.is-la .mm-compare-icon {
    background: var(--mm-emerald-light);
    color: var(--mm-emerald-dark);
}
.mm-compare-box.is-khong .mm-compare-icon {
    background: #ffe4e6;
    color: #e11d48;
}
.mm-compare-header h3 {
    font-size: 1.45rem;
    font-weight: 800;
    color: var(--mm-slate-900);
}
.mm-compare-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 16px;
}
.mm-compare-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    font-size: 0.95rem;
    line-height: 1.5;
}
.mm-compare-box.is-la .mm-compare-item i {
    color: #059669;
    margin-top: 3px;
    font-size: 1.05rem;
    flex-shrink: 0;
}
.mm-compare-box.is-khong .mm-compare-item i {
    color: #e11d48;
    margin-top: 3px;
    font-size: 1.05rem;
    flex-shrink: 0;
}

/* 4 Models */
.mm-models-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}
.mm-model-card {
    background: #ffffff;
    border: 1px solid var(--mm-slate-200);
    border-radius: var(--mm-radius-lg);
    padding: 28px 22px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.25s;
    position: relative;
    box-shadow: var(--mm-shadow-subtle);
}
.mm-model-card:hover {
    transform: translateY(-5px);
    border-color: var(--mm-teal-main);
    box-shadow: var(--mm-shadow-hover);
}
.mm-model-num {
    width: 36px;
    height: 36px;
    border-radius: var(--mm-radius-full);
    background: var(--mm-teal-main);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 0.9rem;
    margin-bottom: 16px;
}
.mm-model-title {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--mm-slate-900);
    margin-bottom: 4px;
}
.mm-model-badge {
    display: inline-block;
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    color: var(--mm-emerald);
    background: var(--mm-emerald-light);
    padding: 3px 10px;
    border-radius: var(--mm-radius-full);
    margin-bottom: 14px;
}
.mm-model-desc {
    font-size: 0.85rem;
    color: var(--mm-slate-700);
    line-height: 1.5;
    margin-bottom: 16px;
}
.mm-model-fit {
    background: var(--mm-slate-50);
    border-radius: var(--mm-radius-sm);
    padding: 10px 12px;
    font-size: 0.78rem;
    color: var(--mm-slate-600);
    margin-top: auto;
    border: 1px dashed var(--mm-slate-200);
}

.mm-pilot-rule-callout {
    background: linear-gradient(90deg, #062b2b, #0B3B3C);
    color: #ffffff;
    border-radius: var(--mm-radius-md);
    padding: 18px 24px;
    margin-top: 30px;
    text-align: center;
    font-weight: 600;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
}
.mm-pilot-rule-callout span {
    color: #34d399;
    font-weight: 800;
}

/* Timeline */
.mm-timeline {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    position: relative;
    margin-bottom: 35px;
}
.mm-timeline::before {
    content: '';
    position: absolute;
    top: 36px;
    left: 40px;
    right: 40px;
    height: 4px;
    background: #cbd5e1;
    z-index: 1;
}
.mm-timeline-step {
    position: relative;
    z-index: 2;
    text-align: center;
}
.mm-timeline-dot {
    width: 72px;
    height: 72px;
    border-radius: var(--mm-radius-full);
    background: #ffffff;
    border: 4px solid var(--mm-teal-main);
    color: var(--mm-teal-main);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    font-weight: 900;
    margin: 0 auto 16px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    transition: all 0.25s;
}
.mm-timeline-step:hover .mm-timeline-dot {
    background: var(--mm-teal-main);
    color: #ffffff;
    transform: scale(1.08);
}
.mm-timeline-title {
    font-size: 1.15rem;
    font-weight: 800;
    color: var(--mm-slate-900);
    margin-bottom: 6px;
}
.mm-timeline-desc {
    font-size: 0.82rem;
    color: var(--mm-slate-600);
    line-height: 1.45;
    padding: 0 8px;
}

/* KPI Matrix */
.mm-kpi-matrix {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 12px;
}
.mm-kpi-card {
    background: #ffffff;
    border: 1px solid var(--mm-slate-200);
    border-radius: var(--mm-radius-md);
    padding: 16px 14px;
    text-align: center;
    box-shadow: var(--mm-shadow-subtle);
}
.mm-kpi-val {
    font-size: 1.25rem;
    font-weight: 900;
    color: var(--mm-teal-main);
    margin-bottom: 4px;
}
.mm-kpi-name {
    font-size: 0.75rem;
    font-weight: 600;
    color: var(--mm-slate-600);
    text-transform: uppercase;
}

/* Onboard & Form */
.mm-onboard-wrapper {
    background: #ffffff;
    border-radius: var(--mm-radius-lg);
    box-shadow: var(--mm-shadow-hover);
    border: 1px solid var(--mm-slate-200);
    overflow: hidden;
    display: grid;
    grid-template-columns: 1fr 1.2fr;
}
.mm-onboard-info {
    background: linear-gradient(135deg, #062b2b, #0B3B3C);
    color: #ffffff;
    padding: 48px 40px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.mm-onboard-info h3 {
    font-size: 1.85rem;
    font-weight: 800;
    margin-bottom: 12px;
    line-height: 1.25;
}
.mm-onboard-info p {
    color: #cbd5e1;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 28px;
}
.mm-check-points {
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-bottom: 30px;
}
.mm-check-point {
    display: flex;
    gap: 12px;
    align-items: flex-start;
}
.mm-check-num {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: #10B981;
    color: #062b2b;
    font-weight: 800;
    font-size: 0.78rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-top: 2px;
}
.mm-check-title {
    font-weight: 700;
    color: #ffffff;
    font-size: 0.92rem;
    margin-bottom: 2px;
}
.mm-check-desc {
    color: #94a3b8;
    font-size: 0.8rem;
    line-height: 1.4;
}
.mm-sla-banner {
    background: rgba(16, 185, 129, 0.15);
    border: 1px solid rgba(16, 185, 129, 0.35);
    border-radius: var(--mm-radius-md);
    padding: 16px;
    color: #bbf7d0;
    font-size: 0.85rem;
    line-height: 1.45;
}
.mm-sla-banner strong {
    color: #34d399;
}

.mm-form-side {
    padding: 45px 40px;
    background: #ffffff;
}
.mm-form-head {
    margin-bottom: 24px;
}
.mm-form-title {
    font-size: 1.4rem;
    font-weight: 800;
    color: var(--mm-slate-900);
    margin-bottom: 4px;
}
.mm-form-sub {
    font-size: 0.85rem;
    color: var(--mm-slate-600);
}
.mm-form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 16px;
    align-items: end;
}
.mm-form-grid .mm-form-group {
    margin-bottom: 0;
}
.mm-form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
    margin-bottom: 16px;
    min-width: 0;
}
.mm-form-group.full {
    grid-column: span 2;
    margin-bottom: 16px;
}
.mm-form-label {
    font-size: 0.82rem;
    font-size: 0.81rem;
    font-weight: 700;
    color: var(--mm-slate-700);
    white-space: nowrap;
}
.mm-form-label span {
    color: #ef4444;
}
.mm-form-control {
    width: 100%;
    padding: 11px 14px;
    border: 1.5px solid var(--mm-slate-200);
    border-radius: var(--mm-radius-sm);
    font-size: 0.9rem;
    color: var(--mm-slate-800);
    background: #f8fafc;
    transition: all 0.2s;
}
.mm-form-control:focus {
    outline: none;
    border-color: var(--mm-teal-main);
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(11, 59, 60, 0.1);
}
.mm-btn-submit-lead {
    width: 100%;
    background: var(--mm-teal-main);
    color: #ffffff;
    border: none;
    padding: 14px 20px;
    border-radius: var(--mm-radius-full);
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-top: 10px;
}
.mm-btn-submit-lead:hover {
    background: #10B981;
    color: #062b2b;
}

/* Footer */
.mm-footer {
    background: #062b2b;
    color: #94a3b8;
    padding: 70px 0 25px;
    font-size: 0.88rem;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
}
.mm-footer-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1.5fr;
    gap: 40px;
    margin-bottom: 50px;
}
.mm-footer-brand h4 {
    font-size: 1.35rem;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 12px;
}
.mm-footer-brand h4 span {
    color: #10B981;
}
.mm-footer-brand p {
    color: #cbd5e1;
    line-height: 1.6;
    margin-bottom: 18px;
}
.mm-footer-col h5 {
    color: #ffffff;
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 18px;
}
.mm-footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.mm-footer-links a {
    color: #94a3b8;
    text-decoration: none;
    transition: color 0.2s;
}
.mm-footer-links a:hover {
    color: #34d399;
}
.mm-footer-contact-item {
    display: flex;
    gap: 10px;
    margin-bottom: 12px;
    line-height: 1.5;
}
.mm-footer-contact-item i {
    color: #10B981;
    margin-top: 4px;
}
.mm-footer-disclaimer {
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: var(--mm-radius-md);
    padding: 16px 20px;
    font-size: 0.78rem;
    color: #94a3b8;
    line-height: 1.6;
    margin-bottom: 30px;
}
.mm-footer-bottom {
    text-align: center;
    padding-top: 25px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
    font-size: 0.8rem;
    color: #64748b;
}

/* Modal */
.mm-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(15, 23, 42, 0.7);
    backdrop-filter: blur(4px);
    z-index: 10000;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: all 0.25s ease;
    padding: 20px;
}
.mm-modal-overlay.open {
    opacity: 1;
    visibility: visible;
}
.mm-modal-card {
    background: #ffffff;
    border-radius: var(--mm-radius-lg);
    max-width: 650px;
    width: 100%;
    max-height: 90vh;
    overflow-y: auto;
    padding: 32px;
    position: relative;
    box-shadow: 0 20px 40px rgba(0,0,0,0.25);
    transform: scale(0.95);
    transition: transform 0.25s ease;
}
.mm-modal-overlay.open .mm-modal-card {
    transform: scale(1);
}
.mm-modal-close {
    position: absolute;
    top: 20px;
    right: 20px;
    background: #f1f5f9;
    border: none;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 1.1rem;
    color: #475569;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
}
.mm-modal-close:hover {
    background: #e2e8f0;
    color: #0f172a;
}

/* 4 Standard Categories Bar (Mã 23) */
.mm-categories-bar {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 25px;
}
.mm-category-card {
    background: #ffffff;
    border: 1.5px solid #e2e8f0;
    border-radius: var(--mm-radius-md);
    padding: 14px 16px;
    display: flex;
    align-items: center;
    gap: 14px;
    cursor: pointer;
    transition: all 0.25s ease;
}
.mm-category-card:hover, .mm-category-card.active {
    border-color: #10B981;
    background: #f0fdf4;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(16, 185, 129, 0.12);
}
.mm-category-icon {
    width: 42px;
    height: 42px;
    background: rgba(16, 185, 129, 0.12);
    color: #10B981;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    flex-shrink: 0;
}
.mm-category-title {
    font-size: 0.9rem;
    font-weight: 700;
    color: #0f172a;
    line-height: 1.3;
}
.mm-category-sub {
    font-size: 0.74rem;
    color: #64748b;
    margin-top: 3px;
}

/* Franchise & Partnership Section (Mã 28 - 33) */
.mm-franchise-section {
    background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%);
    border-top: 1px solid #e2e8f0;
    border-bottom: 1px solid #e2e8f0;
    position: relative;
    padding: 80px 0;
}
.mm-franchise-status-badge {
    background: rgba(16, 185, 129, 0.15);
    border: 1px solid rgba(16, 185, 129, 0.35);
    color: #065f46;
    padding: 6px 16px;
    border-radius: var(--mm-radius-full);
    font-size: 0.85rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 15px;
}
.mm-franchise-models-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
    margin: 40px 0 50px;
}
.mm-franchise-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: var(--mm-radius-lg);
    padding: 30px 26px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-shadow: var(--mm-shadow-sm);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}
.mm-franchise-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: #10B981;
    opacity: 0;
    transition: opacity 0.3s;
}
.mm-franchise-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 30px -10px rgba(0,0,0,0.08);
    border-color: #cbd5e1;
}
.mm-franchise-card:hover::before {
    opacity: 1;
}
.mm-franchise-badge {
    font-size: 0.74rem;
    font-weight: 800;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 6px;
    background: #f1f5f9;
    color: #475569;
    display: inline-block;
    margin-bottom: 12px;
}
.mm-franchise-title {
    font-size: 1.35rem;
    font-weight: 800;
    color: #0B3B3C;
    margin-bottom: 10px;
}
.mm-franchise-desc {
    font-size: 0.9rem;
    color: #475569;
    line-height: 1.6;
    margin-bottom: 18px;
}
.mm-franchise-scope {
    background: #f8fafc;
    border-radius: 8px;
    padding: 14px 16px;
    font-size: 0.85rem;
    color: #334155;
    line-height: 1.5;
    margin-bottom: 22px;
}
.mm-franchise-scope strong {
    color: #0B3B3C;
    display: block;
    margin-bottom: 4px;
}
.mm-franchise-btn {
    width: 100%;
    padding: 12px 18px;
    background: #f1f5f9;
    color: #0B3B3C;
    border: 1px solid #cbd5e1;
    border-radius: var(--mm-radius-full);
    font-weight: 700;
    font-size: 0.92rem;
    cursor: pointer;
    text-align: center;
    transition: all 0.2s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}
.mm-franchise-btn:hover {
    background: #10B981;
    color: #ffffff;
    border-color: #10B981;
}

/* 7 Steps Franchise Process (Mã 32) */
.mm-franchise-steps {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 12px;
    margin: 35px 0 45px;
    position: relative;
}
.mm-step-box {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 16px 10px;
    text-align: center;
    transition: transform 0.2s;
}
.mm-step-box:hover {
    transform: translateY(-3px);
    border-color: #10B981;
}
.mm-step-box-num {
    width: 28px;
    height: 28px;
    background: #0B3B3C;
    color: #34d399;
    border-radius: 50%;
    font-size: 0.8rem;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 10px;
}
.mm-step-box-title {
    font-size: 0.8rem;
    font-weight: 700;
    color: #0f172a;
    line-height: 1.35;
}

/* Qcare Support Grid (Mã 30) */
.mm-support-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 45px;
}
.mm-support-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: var(--mm-radius-md);
    padding: 22px 20px;
}
.mm-support-card h4 {
    font-size: 1rem;
    font-weight: 700;
    color: #0B3B3C;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.mm-support-card h4 i {
    color: #10B981;
}
.mm-support-card p {
    font-size: 0.85rem;
    color: #475569;
    line-height: 1.55;
    margin: 0;
}

/* Checkbox Styling (Mã 35) */
.mm-checkbox-label {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 0.84rem;
    color: #475569;
    line-height: 1.45;
    cursor: pointer;
    margin-top: 10px;
}
.mm-checkbox-label input[type="checkbox"] {
    margin-top: 3px;
    accent-color: #10B981;
    width: 16px;
    height: 16px;
    cursor: pointer;
    flex-shrink: 0;
}

/* Responsive */
@media (max-width: 1100px) {
    .mm-products-grid { grid-template-columns: repeat(2, 1fr); }
    .mm-models-grid { grid-template-columns: repeat(2, 1fr); }
    .mm-pillars-grid { grid-template-columns: repeat(2, 1fr); }
    .mm-timeline { grid-template-columns: repeat(2, 1fr); gap: 30px; }
    .mm-timeline::before { display: none; }
    .mm-kpi-matrix { grid-template-columns: repeat(3, 1fr); }
    .mm-onboard-wrapper { grid-template-columns: 1fr; }
    .mm-footer-grid { grid-template-columns: 1fr 1fr; }
    .mm-categories-bar { grid-template-columns: repeat(2, 1fr); }
    .mm-franchise-models-grid { grid-template-columns: 1fr; }
    .mm-franchise-steps { grid-template-columns: repeat(4, 1fr); }
    .mm-support-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
    .mm-hero-title { font-size: 2.2rem; }
    .mm-hero-grid { grid-template-columns: 1fr; gap: 30px; }
    .mm-hero-badges { flex-wrap: wrap; }
    .mm-hero-actions { flex-direction: column; width: 100%; gap: 10px; }
    .mm-btn-hero-primary, .mm-btn-hero-secondary { width: 100%; justify-content: center; }
    .mm-nav-links { display: none; }
    .mm-journey-nav { grid-template-columns: 1fr; }
    .mm-products-grid { grid-template-columns: 1fr; }
    .mm-compare-grid { grid-template-columns: 1fr; }
    .mm-models-grid { grid-template-columns: 1fr; }
    .mm-pillars-grid { grid-template-columns: 1fr; }
    .mm-kpi-matrix { grid-template-columns: repeat(2, 1fr); }
    .mm-form-grid { grid-template-columns: 1fr; }
    .mm-form-label { white-space: normal; }
    .mm-form-group.full { grid-column: span 1; }
    .mm-footer-grid { grid-template-columns: 1fr; }
    .mm-categories-bar { grid-template-columns: 1fr; }
    .mm-franchise-steps { grid-template-columns: repeat(2, 1fr); }
    .mm-support-grid { grid-template-columns: 1fr; }
}
</style>

<div class="mm-wrapper">

    <!-- Top Announcement Bar (Full-Width) -->
    <div class="mm-topbar">
        <div class="mm-topbar-inner">
            <div class="mm-topbar-left">
                <span class="mm-topbar-tag"><i class="fas fa-check-circle"></i> Thử Nghiệm Pilot 90 Ngày</span>
                <span>Khởi động tiếp nhận hồ sơ thương hiệu sức khỏe chuyển hóa & dinh dưỡng y khoa</span>
            </div>
            <div class="mm-topbar-right">
                <a href="tel:0353538887" class="mm-topbar-link"><i class="fas fa-phone-alt"></i> Hotline: 035.353.8887</a>
                <span>|</span>
                <a href="mailto:info@qcare.com.vn" class="mm-topbar-link"><i class="fas fa-envelope"></i> info@qcare.com.vn</a>
                <span>|</span>
                <a href="#partner-form" class="mm-topbar-link"><i class="fas fa-file-signature"></i> Đăng Ký F-MM01 (Thẩm định 48-72h)</a>
            </div>
        </div>
    </div>

    <!-- Main Sticky Navigation (Full-Width giàn như Gọn Khoẻ) -->
    <header class="mm-navbar">
        <div class="mm-navbar-inner">
            <a href="<?php echo base_url(); ?>" class="mm-brand-group">
                <img src="<?php echo base_url(); ?>images/logo.png" alt="Gọn Khoẻ by Qcare - Trung tâm Giảm cân & Sức khỏe Chuyển hóa" class="mm-brand-logo-img">
            </a>

            <nav class="mm-nav-links">
                <a href="#journey" class="mm-nav-link active">Hành Trình Y Khoa</a>
                <a href="#products" class="mm-nav-link">Sản Phẩm Tuyển Chọn</a>
                <a href="#compare" class="mm-nav-link">Mô Hình Hoạt Động</a>
                <a href="#models" class="mm-nav-link">Mô Hình Hợp Tác</a>
                <a href="#pilot" class="mm-nav-link">Lộ Trình Thử Nghiệm</a>
                <a href="#franchise" class="mm-nav-link">Hợp Tác & Nhượng Quyền</a>
            </nav>

            <div class="mm-nav-actions">
                <a href="tel:0353538887" class="mm-btn-outline"><i class="fas fa-headset"></i> 035.353.8887</a>
                <a href="#partner-form" class="mm-btn-primary"><i class="fas fa-handshake"></i> Hợp Tác Đối Tác</a>
            </div>
        </div>
    </header>

    <!-- Hero Banner Section -->
    <section class="mm-hero">
        <div class="mm-container">
            <div class="mm-hero-grid">
                <!-- Left Column: Value Proposition & CTAs -->
                <div class="mm-hero-left">
                    <div class="mm-hero-badges">
                        <span class="mm-pill-badge"><i class="fas fa-map-marker-alt"></i> Thử nghiệm 90 ngày</span>
                        <span class="mm-pill-badge"><i class="fas fa-feather-pointed"></i> Vận hành tinh gọn</span>
                        <span class="mm-pill-badge"><i class="fas fa-shield-virus"></i> Quản trị chuyên môn y khoa</span>
                    </div>

                    <h1 class="mm-hero-title">
                        METABOLIC MARKET<br>
                        <span>Curated Clinical Marketplace</span>
                    </h1>

                    <p class="mm-hero-desc">
                        Nền tảng thương mại y tế tuyển chọn giúp người bệnh biến kế hoạch điều trị thành lựa chọn dinh dưỡng mỗi ngày — đồng thời giúp đối tác tiếp cận nhóm khách hàng có nhu cầu điều trị thực tế, trong môi trường được quản trị chuyên môn y khoa.
                    </p>

                    <div class="mm-hero-actions">
                        <a href="#partner-form" class="mm-btn-hero-primary">
                            <i class="fas fa-paper-plane"></i> Đăng Ký Thử Nghiệm 90 Ngày (F-MM01)
                        </a>
                        <a href="#products" class="mm-btn-hero-secondary">
                            <i class="fas fa-cubes"></i> Khám Phá Sản Phẩm Tuyển Chọn
                        </a>
                    </div>
                </div>

                <!-- Right Column: Flagship 3D Physical Store Visual Showcase -->
                <div class="mm-hero-right">
                    <div class="mm-hero-img-wrapper" onclick="openMmImageModal()" title="Nhấp để phóng to không gian thực tế">
                        <span class="mm-img-floating-tag top-left">
                            <i class="fas fa-store"></i> Không Gian Thực Tế · Gọn Khoẻ by Qcare
                        </span>
                        <img src="<?php echo base_url(); ?>images/main.webp" alt="Không gian trưng bày Metabolic Market tại phòng khám Gọn Khoẻ by Qcare" class="mm-hero-main-img">
                        <span class="mm-img-floating-tag bottom-right">
                            <i class="fas fa-user-doctor"></i> Tư Vấn Dinh Dưỡng 1-1
                        </span>
                    </div>
                </div>
            </div>

            <!-- Bối cảnh & 4 Trụ Cột (Slide 2: Gọn Khoẻ không xây một "cửa hàng supplement") -->
            <div style="margin-top: 55px; text-align: center;">
                <h2 style="font-size: 1.85rem; font-weight: 800; color: #ffffff; margin-bottom: 10px;">
                    Gọn Khoẻ không xây một “cửa hàng thực phẩm bổ sung đại trà”.
                </h2>
                <p style="font-size: 1.05rem; color: #cbd5e1; max-width: 720px; margin: 0 auto 28px; line-height: 1.55;">
                    Chúng tôi xây dựng một nền tảng thương mại gắn liền với hành trình chăm sóc cân nặng và sức khỏe chuyển hóa.
                </p>

                <!-- 4 Pillars Grid (Slide 2) -->
                <div class="mm-pillars-grid">
                    <div class="mm-pillar-card">
                        <div class="mm-pillar-num">01</div>
                        <div class="mm-pillar-title">Nhu cầu thật</div>
                        <div class="mm-pillar-text">Khách hàng đã có mục tiêu cụ thể: giảm cân, giữ cơ, kiểm soát chuyển hóa, theo dõi tại nhà.</div>
                    </div>
                    <div class="mm-pillar-card">
                        <div class="mm-pillar-num">02</div>
                        <div class="mm-pillar-title">Tuyển chọn y khoa</div>
                        <div class="mm-pillar-text">Ít mã sản phẩm hơn bán lẻ đại trà, nhưng mỗi sản phẩm đều đáp ứng một vai trò điều trị rõ ràng.</div>
                    </div>
                    <div class="mm-pillar-card">
                        <div class="mm-pillar-num">03</div>
                        <div class="mm-pillar-title">Thuận tiện tiếp cận</div>
                        <div class="mm-pillar-text">Sản phẩm nằm ngay nơi bệnh nhân được đánh giá, hướng dẫn và theo dõi chuyên môn.</div>
                    </div>
                    <div class="mm-pillar-card">
                        <div class="mm-pillar-num">04</div>
                        <div class="mm-pillar-title">Đồng hành liên tục</div>
                        <div class="mm-pillar-text">CHECK → LOSE → REMIT → KEEP tạo nhiều điểm chạm giá trị, không chỉ dừng lại ở một lần mua.</div>
                    </div>
                </div>

                <!-- Khẩu hiệu cốt lõi Slide 2 (Pitch Deck Callout) -->
                <div class="mm-slogan-callout">
                    <i class="fas fa-quote-left mm-slogan-icon"></i>
                    <div class="mm-slogan-text">
                        Đối tác không chỉ mua <span>“mét kệ”</span>. Đối tác tham gia một <span>kênh phân phối có ngữ cảnh lâm sàng</span>, trải nghiệm thực tế, giáo dục sức khỏe và đo lường <span>sức mua thực tế</span>.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clinical Guardrail Callout (Slide 7) -->
    <div class="mm-guardrail-banner">
        <div class="mm-container mm-guardrail-inner">
            <div class="mm-guardrail-left">
                <div class="mm-guardrail-icon">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <div>
                    <div class="mm-guardrail-quote">Tiếp cận thương mại <span>≠ Chỉ định chuyên môn y khoa</span></div>
                    <div class="mm-guardrail-sub">Khoản tài trợ thương mại mua quyền tiếp cận không gian bán lẻ. Không mua được chỉ định, đơn thuốc hoặc lời khuyên của bác sĩ.</div>
                </div>
            </div>

            <div class="mm-guardrail-tiers">
                <div class="mm-tier-pill sky">
                    <span>LƯU HÀNH ĐẠI TRÀ</span>
                    <small>Duyệt: Thương mại & Pháp lý</small>
                </div>
                <div class="mm-tier-pill emerald">
                    <span>GỌN KHOẺ TUYỂN CHỌN</span>
                    <small>Duyệt: Y khoa & Thương mại</small>
                </div>
                <div class="mm-tier-pill amber">
                    <span>BÁC SĨ CHỈ ĐỊNH</span>
                    <small>Duyệt: Bác sĩ điều trị</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 1: Patient Journey 4 Stages (Slide 3) -->
    <section id="journey" class="mm-section">
        <div class="mm-container">
            <div class="mm-section-header">
                <span class="mm-sub-title">Hành Trình Người Bệnh (Patient Journey)</span>
                <h2 class="mm-main-title">CHECK → LOSE → REMIT → KEEP</h2>
                <p class="mm-title-desc">Metabolic Market được gắn trực tiếp vào từng giai đoạn điều trị y khoa, thay vì bán sản phẩm rời rạc không ngữ cảnh.</p>
            </div>

            <!-- Stepper Interactive Grid -->
            <div class="mm-journey-nav">
                <div class="mm-journey-step active" onclick="filterByStage('ALL', this)">
                    <div class="mm-step-top">
                        <div class="mm-step-icon"><i class="fas fa-layer-group"></i></div>
                        <span class="mm-step-tag">Tất Cả</span>
                    </div>
                    <div class="mm-step-title">Toàn Bộ Chu Trình</div>
                    <div class="mm-step-subtitle">CHECK-to-KEEP</div>
                    <div class="mm-step-skus">Tổng quan giải pháp dinh dưỡng, thiết bị và vi chất toàn diện</div>
                </div>

                <div class="mm-journey-step" onclick="filterByStage('CHECK', this)">
                    <div class="mm-step-top">
                        <div class="mm-step-icon"><i class="fas fa-stethoscope"></i></div>
                        <span class="mm-step-tag">Giai Đoạn 1</span>
                    </div>
                    <div class="mm-step-title">CHECK</div>
                    <div class="mm-step-subtitle">Hiểu tình trạng</div>
                    <div class="mm-step-skus">Cân phân tích thành phần cơ thể · Máy đo huyết áp · Cảm biến đường huyết CGM</div>
                </div>

                <div class="mm-journey-step" onclick="filterByStage('LOSE', this)">
                    <div class="mm-step-top">
                        <div class="mm-step-icon"><i class="fas fa-fire-flame-curved"></i></div>
                        <span class="mm-step-tag">Giai Đoạn 2</span>
                    </div>
                    <div class="mm-step-title">LOSE</div>
                    <div class="mm-step-subtitle">Giảm cân an toàn</div>
                    <div class="mm-step-skus">Đạm bổ sung Isolate · Bù nước điện giải · Hỗ trợ tiêu hóa · Dinh dưỡng y khoa tiện lợi</div>
                </div>

                <div class="mm-journey-step" onclick="filterByStage('REMIT', this)">
                    <div class="mm-step-top">
                        <div class="mm-step-icon"><i class="fas fa-heart-pulse"></i></div>
                        <span class="mm-step-tag">Giai Đoạn 3</span>
                    </div>
                    <div class="mm-step-title">REMIT</div>
                    <div class="mm-step-subtitle">Phục hồi chuyển hóa</div>
                    <div class="mm-step-skus">Dinh dưỡng chuyển hóa · Chất xơ hòa tan Prebiotic · Hỗ trợ nhạy insulin · Theo dõi chỉ số</div>
                </div>
            </div>

            <!-- Products Section with Filter (Yêu cầu IT Trang 5 - Mã 22 & 23) -->
            <div id="products" style="margin-top: 60px;">
                <div class="mm-section-header" style="text-align: center; margin-bottom: 25px;">
                    <span class="mm-sub-title">Không Gian Bán Lẻ Y Khoa</span>
                    <h2 class="mm-main-title">Metabolic Market</h2>
                    <p class="mm-title-desc" style="max-width: 720px; margin: 0 auto 18px;">
                        Không gian sản phẩm dinh dưỡng & chăm sóc sức khỏe chuyển hóa được tuyển chọn và bảo chứng bởi Hội đồng Y khoa Gọn Khoẻ by Qcare.
                    </p>
                    <div style="display: flex; justify-content: center; gap: 14px; flex-wrap: wrap; margin-bottom: 12px;">
                        <a href="#products-container" class="mm-btn-hero-primary" style="font-size: 0.92rem; padding: 10px 22px;">
                            <i class="fas fa-basket-shopping"></i> Khám Phá Sản Phẩm (Dành Cho Khách Hàng)
                        </a>
                        <a href="#partner-form" class="mm-btn-outline bg-white" style="font-size: 0.92rem; padding: 10px 22px;">
                            <i class="fas fa-store"></i> Đăng Ký Thuê Kệ & Hợp Tác Thương Hiệu (Doanh Nghiệp)
                        </a>
                    </div>
                </div>

                <!-- 4 Nhóm Danh Mục Chuẩn Y Tế (Mã 23) -->
                <div class="mm-categories-bar">
                    <div class="mm-category-card active" data-cat="ALL" onclick="filterByCategory('ALL', this)">
                        <div class="mm-category-icon"><i class="fas fa-boxes-stacked"></i></div>
                        <div>
                            <div class="mm-category-title">Tất Cả Danh Mục</div>
                            <div class="mm-category-sub">12 sản phẩm tuyển chọn chuyên sâu</div>
                        </div>
                    </div>
                    <div class="mm-category-card" data-cat="MEAL_NUTRITION" onclick="filterByCategory('MEAL_NUTRITION', this)">
                        <div class="mm-category-icon"><i class="fas fa-utensils"></i></div>
                        <div>
                            <div class="mm-category-title">Dinh Dưỡng & Bữa Ăn</div>
                            <div class="mm-category-sub">Bữa ăn thay thế, đồ ăn nhẹ chỉ số đường huyết thấp</div>
                        </div>
                    </div>
                    <div class="mm-category-card" data-cat="PROTEIN_FIBER" onclick="filterByCategory('PROTEIN_FIBER', this)">
                        <div class="mm-category-icon"><i class="fas fa-seedling"></i></div>
                        <div>
                            <div class="mm-category-title">Đạm & Chất Xơ Bổ Sung</div>
                            <div class="mm-category-sub">Đạm Isolate, chất xơ hòa tan tự nhiên</div>
                        </div>
                    </div>
                    <div class="mm-category-card" data-cat="HEALTH_DEVICES" onclick="filterByCategory('HEALTH_DEVICES', this)">
                        <div class="mm-category-icon"><i class="fas fa-laptop-medical"></i></div>
                        <div>
                            <div class="mm-category-title">Thiết Bị Theo Dõi Tại Nhà</div>
                            <div class="mm-category-sub">Cảm biến đường huyết CGM, cân thông minh InBody</div>
                        </div>
                    </div>
                </div>

                <div class="mm-filter-bar">
                    <div class="mm-filter-group">
                        <span class="mm-filter-label"><i class="fas fa-filter"></i> Lọc Giai Đoạn:</span>
                        <button class="mm-filter-btn active" data-filter="stage" data-val="ALL" onclick="filterProducts('stage', 'ALL', this)">Tất cả</button>
                        <button class="mm-filter-btn" data-filter="stage" data-val="CHECK" onclick="filterProducts('stage', 'CHECK', this)">CHECK</button>
                        <button class="mm-filter-btn" data-filter="stage" data-val="LOSE" onclick="filterProducts('stage', 'LOSE', this)">LOSE</button>
                        <button class="mm-filter-btn" data-filter="stage" data-val="REMIT" onclick="filterProducts('stage', 'REMIT', this)">REMIT</button>
                        <button class="mm-filter-btn" data-filter="stage" data-val="KEEP" onclick="filterProducts('stage', 'KEEP', this)">KEEP</button>
                    </div>

                    <div class="mm-filter-group">
                        <span class="mm-filter-label"><i class="fas fa-shield-halved"></i> Cấp Thẩm Định:</span>
                        <button class="mm-filter-btn active" data-filter="tier" data-val="ALL" onclick="filterProducts('tier', 'ALL', this)">Tất cả</button>
                        <button class="mm-filter-btn" data-filter="tier" data-val="CLINICALLY_RECOMMENDED" onclick="filterProducts('tier', 'CLINICALLY_RECOMMENDED', this)">Bác sĩ chỉ định</button>
                        <button class="mm-filter-btn" data-filter="tier" data-val="CURATED" onclick="filterProducts('tier', 'CURATED', this)">Gọn Khoẻ Tuyển Chọn</button>
                        <button class="mm-filter-btn" data-filter="tier" data-val="AVAILABLE" onclick="filterProducts('tier', 'AVAILABLE', this)">Lưu hành đại trà</button>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="mm-products-grid" id="products-container">

                    <!-- SKU 1: CGM (CHECK / CLINICALLY_RECOMMENDED) -->
                    <div class="mm-product-card" data-stage="CHECK" data-tier="CLINICALLY_RECOMMENDED" data-category="HEALTH_DEVICES">
                        <div>
                            <div class="mm-card-head">
                                <span class="mm-stage-badge">CHECK · Hiểu tình trạng</span>
                                <span class="mm-tier-tag amber"><i class="fas fa-user-md"></i> BÁC SĨ CHỈ ĐỊNH</span>
                            </div>
                            <div class="mm-product-brand">FreeStyle Libre / Dexcom</div>
                            <h3 class="mm-product-name">Cảm biến theo dõi đường huyết liên tục (CGM) 14 ngày</h3>
                            <div class="mm-job-box">
                                <strong>Vai trò & Lợi ích lâm sàng:</strong>
                                Theo dõi biến thiên glucose theo thời gian thực, hỗ trợ ghi nhận các đợt dao động đường huyết sau ăn để cá nhân hóa khẩu phần.
                            </div>
                            <div class="mm-guardrail-micro">
                                <i class="fas fa-info-circle"></i>
                                <span>Chỉ định lâm sàng theo phác đồ bác sĩ cho bệnh nhân tiền đái tháo đường & kháng insulin.</span>
                            </div>
                        </div>
                        <div class="mm-card-foot">
                            <div class="mm-price-block">
                                <div class="mm-price-main">1.690.000 đ</div>
                                <div class="mm-price-original">1.850.000 đ</div>
                                <div class="mm-stock-badge"><i class="fas fa-check"></i> Sẵn hàng tại phòng khám</div>
                            </div>
                            <button class="mm-btn-detail" onclick="openSkuModal('Cảm biến theo dõi đường huyết liên tục (CGM) 14 ngày', 'FreeStyle Libre / Dexcom', '1.690.000 đ', 'CHECK', 'BÁC SĨ CHỈ ĐỊNH', 'Theo dõi biến thiên glucose liên tục theo thời gian thực, ghi nhận các đợt dao động đường huyết sau bữa ăn giúp tối ưu chế độ dinh dưỡng theo hướng dẫn chuyên môn.', 'Chỉ định lâm sàng theo phác đồ bác sĩ cho bệnh nhân kháng insulin, thừa cân chuyển hóa. Thiết bị lưu hành chính hãng được Bộ Y Tế cấp phép.')">Chi Tiết</button>
                        </div>
                    </div>

                    <!-- SKU 2: InBody Dial (CHECK / CURATED) -->
                    <div class="mm-product-card" data-stage="CHECK" data-tier="CURATED" data-category="HEALTH_DEVICES">
                        <div>
                            <div class="mm-card-head">
                                <span class="mm-stage-badge">CHECK · Hiểu tình trạng</span>
                                <span class="mm-tier-tag emerald"><i class="fas fa-check-double"></i> GỌN KHOẺ TUYỂN CHỌN</span>
                            </div>
                            <div class="mm-product-brand">InBody Medical Dial</div>
                            <h3 class="mm-product-name">Cân phân tích thành phần cơ thể y tế đa tần số Smart Body Scale</h3>
                            <div class="mm-job-box">
                                <strong>Vai trò & Lợi ích lâm sàng:</strong>
                                Hỗ trợ đo lường mỡ nội tạng, khối cơ nạc và lượng nước cơ thể tại nhà, đồng bộ dữ liệu vào hồ sơ sức khỏe phòng khám.
                            </div>
                            <div class="mm-guardrail-micro">
                                <i class="fas fa-info-circle"></i>
                                <span>Dữ liệu ước tính BIA đối chiếu định kỳ cùng máy đo chuyển hóa chuyên sâu tại phòng khám.</span>
                            </div>
                        </div>
                        <div class="mm-card-foot">
                            <div class="mm-price-block">
                                <div class="mm-price-main">2.190.000 đ</div>
                                <div class="mm-price-original">2.450.000 đ</div>
                                <div class="mm-stock-badge"><i class="fas fa-check"></i> Sẵn hàng tại phòng khám</div>
                            </div>
                            <button class="mm-btn-detail" onclick="openSkuModal('Cân phân tích thành phần cơ thể Smart Body Scale', 'InBody Medical Dial', '2.190.000 đ', 'CHECK', 'GỌN KHOẺ TUYỂN CHỌN', 'Đo lường các chỉ số thành phần cơ thể: mỡ nội tạng, khối lượng cơ xương (SMM) và mỡ cơ thể với công nghệ phân tích trở kháng sinh học BIA đa tần số.', 'Thiết bị theo dõi sức khỏe tại nhà. Không thay thế các xét nghiệm máu và chẩn đoán hình ảnh của Bác sĩ.')">Chi Tiết</button>
                        </div>
                    </div>

                    <!-- SKU 3: Whey Isolate (LOSE / CURATED) -->
                    <div class="mm-product-card" data-stage="LOSE" data-tier="CURATED" data-category="PROTEIN_FIBER">
                        <div>
                            <div class="mm-card-head">
                                <span class="mm-stage-badge">LOSE · Giảm cân an toàn</span>
                                <span class="mm-tier-tag emerald"><i class="fas fa-check-double"></i> GỌN KHOẺ TUYỂN CHỌN</span>
                            </div>
                            <div class="mm-product-brand">Metabolic Pro-Lab</div>
                            <h3 class="mm-product-name">Đạm bổ sung Isolate Protein (Zero Sugar - Low GI)</h3>
                            <div class="mm-job-box">
                                <strong>Vai trò & Lợi ích lâm sàng:</strong>
                                Cung cấp 25g đạm Isolate/khẩu phần, hỗ trợ bảo toàn khối cơ nạc khi đang kiểm soát calo trong liệu trình giảm mỡ.
                            </div>
                            <div class="mm-guardrail-micro">
                                <i class="fas fa-info-circle"></i>
                                <span>Không dùng thay thế hoàn toàn bữa ăn hàng ngày; uống đủ nước theo chỉ định dinh dưỡng.</span>
                            </div>
                        </div>
                        <div class="mm-card-foot">
                            <div class="mm-price-block">
                                <div class="mm-price-main">1.220.000 đ</div>
                                <div class="mm-price-original">1.350.000 đ</div>
                                <div class="mm-stock-badge"><i class="fas fa-check"></i> Sẵn hàng tại phòng khám</div>
                            </div>
                            <button class="mm-btn-detail" onclick="openSkuModal('Đạm bổ sung Isolate Protein (Zero Sugar - Low GI)', 'Metabolic Pro-Lab', '1.220.000 đ', 'LOSE', 'GỌN KHOẺ TUYỂN CHỌN', 'Cung cấp nguồn đạm Isolate tiêu chuẩn hấp thu tốt, không chứa đường lactose, hỗ trợ duy trì khối cơ trong quá trình điều chỉnh cân nặng y khoa.', 'Sản phẩm hỗ trợ dinh dưỡng bổ sung, phù hợp người tập luyện và bệnh nhân tham gia phác đồ giảm mỡ Gọn Khoẻ.')">Chi Tiết</button>
                        </div>
                    </div>

                    <!-- SKU 4: Meal Replacement (LOSE / CLINICALLY_RECOMMENDED) -->
                    <div class="mm-product-card" data-stage="LOSE" data-tier="CLINICALLY_RECOMMENDED" data-category="MEAL_NUTRITION">
                        <div>
                            <div class="mm-card-head">
                                <span class="mm-stage-badge">LOSE · Giảm cân an toàn</span>
                                <span class="mm-tier-tag amber"><i class="fas fa-user-md"></i> BÁC SĨ CHỈ ĐỊNH</span>
                            </div>
                            <div class="mm-product-brand">Qcare Nutrition Balance</div>
                            <h3 class="mm-product-name">Bữa ăn thay thế chuẩn y khoa cân bằng đa lượng Low Carb</h3>
                            <div class="mm-job-box">
                                <strong>Vai trò & Lợi ích lâm sàng:</strong>
                                Định mức năng lượng khoảng 180 kcal/khẩu phần với chỉ số đường huyết thấp (GI < 30), giúp tạo cảm giác no và kiểm soát cơn thèm ăn.
                            </div>
                            <div class="mm-guardrail-micro">
                                <i class="fas fa-info-circle"></i>
                                <span>Sử dụng theo lịch trình dinh dưỡng do Bác sĩ và Chuyên gia dinh dưỡng Gọn Khoẻ thiết lập.</span>
                            </div>
                        </div>
                        <div class="mm-card-foot">
                            <div class="mm-price-block">
                                <div class="mm-price-main">890.000 đ</div>
                                <div class="mm-price-original">980.000 đ</div>
                                <div class="mm-stock-badge"><i class="fas fa-check"></i> Sẵn hàng tại phòng khám</div>
                            </div>
                            <button class="mm-btn-detail" onclick="openSkuModal('Bữa ăn thay thế chuẩn y khoa Low Carb', 'Qcare Nutrition Balance', '890.000 đ', 'LOSE', 'BÁC SĨ CHỈ ĐỊNH', 'Công thức dinh dưỡng y khoa cân bằng đa lượng, giàu chất xơ hòa tan và vi chất, hỗ trợ giảm áp lực chuẩn bị bữa ăn giảm cân cho người bận rộn.', 'Chỉ sử dụng khi có sự hướng dẫn và giám sát trực tiếp từ Chuyên gia dinh dưỡng điều trị.')">Chi Tiết</button>
                        </div>
                    </div>

                    <!-- SKU 5: Myo-Inositol (REMIT / CLINICALLY_RECOMMENDED) -->
                    <div class="mm-product-card" data-stage="REMIT" data-tier="CLINICALLY_RECOMMENDED" data-category="PROTEIN_FIBER">
                        <div>
                            <div class="mm-card-head">
                                <span class="mm-stage-badge">REMIT · Phục hồi chuyển hóa</span>
                                <span class="mm-tier-tag amber"><i class="fas fa-user-md"></i> BÁC SĨ CHỈ ĐỊNH</span>
                            </div>
                            <div class="mm-product-brand">InsoMetabolic Advanced</div>
                            <h3 class="mm-product-name">Vi chất hỗ trợ độ nhạy Insulin (Myo-Inositol & D-Chiro 40:1)</h3>
                            <div class="mm-job-box">
                                <strong>Vai trò & Lợi ích lâm sàng:</strong>
                                Tối ưu độ nhạy tế bào với insulin, cải thiện chuyển hóa glucose nội bào và hỗ trợ phụ nữ buồng trứng đa nang PCOS.
                            </div>
                            <div class="mm-guardrail-micro">
                                <i class="fas fa-info-circle"></i>
                                <span>Chỉ dùng theo đúng liều lượng bác sĩ chỉ định; không tự ý kết hợp cùng thuốc hạ đường huyết.</span>
                            </div>
                        </div>
                        <div class="mm-card-foot">
                            <div class="mm-price-block">
                                <div class="mm-price-main">790.000 đ</div>
                                <div class="mm-price-original">890.000 đ</div>
                                <div class="mm-stock-badge"><i class="fas fa-check"></i> Sẵn hàng tại phòng khám</div>
                            </div>
                            <button class="mm-btn-detail" onclick="openSkuModal('Vi chất hỗ trợ độ nhạy Insulin Myo-Inositol', 'InsoMetabolic Advanced', '790.000 đ', 'REMIT', 'BÁC SĨ CHỈ ĐỊNH', 'Hỗ trợ cải thiện kháng insulin ở mức độ tế bào, thúc đẩy hấp thu đường vào cơ bắp, hỗ trợ điều hòa chu kỳ rụng trứng ở phụ nữ PCOS.', 'Thực phẩm bảo vệ sức khỏe, tuân thủ đúng liều lượng theo phác đồ chỉ định của Bác sĩ.')">Chi Tiết</button>
                        </div>
                    </div>

                    <!-- SKU 6: Prebiotic Fiber (REMIT / CURATED) -->
                    <div class="mm-product-card" data-stage="REMIT" data-tier="CURATED" data-category="PROTEIN_FIBER">
                        <div>
                            <div class="mm-card-head">
                                <span class="mm-stage-badge">REMIT · Phục hồi chuyển hóa</span>
                                <span class="mm-tier-tag emerald"><i class="fas fa-check-double"></i> GỌN KHOẺ TUYỂN CHỌN</span>
                            </div>
                            <div class="mm-product-brand">BioMetabolic Fiber</div>
                            <h3 class="mm-product-name">Chất xơ hòa tan lên men sinh học Prebiotic Fiber Complex</h3>
                            <div class="mm-job-box">
                                <strong>Vai trò & Lợi ích lâm sàng:</strong>
                                Làm chậm hấp thu tinh bột sau ăn, giảm đỉnh nhọn glucose và nuôi dưỡng hệ vi sinh đường ruột sinh butyrate có lợi.
                            </div>
                            <div class="mm-guardrail-micro">
                                <i class="fas fa-info-circle"></i>
                                <span>Hòa tan cùng 250ml nước ấm uống trước bữa ăn chính 15-20 phút.</span>
                            </div>
                        </div>
                        <div class="mm-card-foot">
                            <div class="mm-price-block">
                                <div class="mm-price-main">560.000 đ</div>
                                <div class="mm-price-original">620.000 đ</div>
                                <div class="mm-stock-badge"><i class="fas fa-check"></i> Sẵn hàng tại phòng khám</div>
                            </div>
                            <button class="mm-btn-detail" onclick="openSkuModal('Chất xơ hòa tan Prebiotic Fiber Complex', 'BioMetabolic Fiber', '560.000 đ', 'REMIT', 'GỌN KHOẺ TUYỂN CHỌN', 'Hợp chất Inulin & FOS tự nhiên giúp tăng thể tích bã thức ăn, làm chậm tốc độ tiêu hóa tinh bột, giữ ổn định đường huyết sau bữa ăn.', 'Không gây đầy hơi khi dùng đúng liều lượng hướng dẫn.')">Chi Tiết</button>
                        </div>
                    </div>

                    <!-- SKU 7: Grab & Go Protein Bar (KEEP / AVAILABLE) -->
                    <div class="mm-product-card" data-stage="KEEP" data-tier="AVAILABLE" data-category="MEAL_NUTRITION">
                        <div>
                            <div class="mm-card-head">
                                <span class="mm-stage-badge">KEEP · Duy trì dài hạn</span>
                                <span class="mm-tier-tag sky"><i class="fas fa-tag"></i> LƯU HÀNH ĐẠI TRÀ</span>
                            </div>
                            <div class="mm-product-brand">SmartBite Keto Lab</div>
                            <h3 class="mm-product-name">Thanh dinh dưỡng kiểm soát đường huyết Grab & Go Protein Bar</h3>
                            <div class="mm-job-box">
                                <strong>Vai trò & Lợi ích lâm sàng:</strong>
                                Giải pháp tiện lợi khi thèm ăn vặt hoặc đi công tác bận rộn, chỉ 2g Net Carb, không gây dao động đường huyết đột ngột.
                            </div>
                            <div class="mm-guardrail-micro">
                                <i class="fas fa-info-circle"></i>
                                <span>Sản phẩm tiện lợi cho lối sống bận rộn, dùng xen kẽ các bữa ăn chính.</span>
                            </div>
                        </div>
                        <div class="mm-card-foot">
                            <div class="mm-price-block">
                                <div class="mm-price-main">420.000 đ</div>
                                <div class="mm-price-original">480.000 đ</div>
                                <div class="mm-stock-badge"><i class="fas fa-check"></i> Sẵn hàng tại phòng khám</div>
                            </div>
                            <button class="mm-btn-detail" onclick="openSkuModal('Thanh dinh dưỡng Grab & Go Protein Bar', 'SmartBite Keto Lab', '420.000 đ', 'KEEP', 'LƯU HÀNH ĐẠI TRÀ', 'Thanh dinh dưỡng tiện lợi giàu đạm và chất xơ, vị hạt giòn tan tự nhiên, không bổ sung đường tinh luyện.', 'Sản phẩm tiêu dùng tiện lợi, bảo quản nơi thoáng mát.')">Chi Tiết</button>
                        </div>
                    </div>

                    <!-- SKU 8: KEEP Club Membership (KEEP / CURATED) -->
                    <div class="mm-product-card" data-stage="KEEP" data-tier="CURATED" data-category="MEAL_NUTRITION">
                        <div>
                            <div class="mm-card-head">
                                <span class="mm-stage-badge">KEEP · Duy trì dài hạn</span>
                                <span class="mm-tier-tag emerald"><i class="fas fa-check-double"></i> GỌN KHOẺ TUYỂN CHỌN</span>
                            </div>
                            <div class="mm-product-brand">Gọn Khoẻ by Qcare</div>
                            <h3 class="mm-product-name">Gói thành viên duy trì KEEP Club (12 tuần đồng hành chuyển hóa)</h3>
                            <div class="mm-job-box">
                                <strong>Vai trò & Lợi ích lâm sàng:</strong>
                                Đo InBody miễn phí hàng tuần, tái khám bác sĩ định kỳ, cập nhật thực đơn món Việt và ưu đãi 10% tại Metabolic Market.
                            </div>
                            <div class="mm-guardrail-micro">
                                <i class="fas fa-info-circle"></i>
                                <span>Dành riêng cho khách hàng đã hoàn thành phác đồ giảm mỡ tích cực tại Gọn Khoẻ.</span>
                            </div>
                        </div>
                        <div class="mm-card-foot">
                            <div class="mm-price-block">
                                <div class="mm-price-main">2.970.000 đ</div>
                                <div class="mm-price-original">/ quý (12 tuần)</div>
                                <div class="mm-stock-badge"><i class="fas fa-check"></i> Đăng ký trực tiếp tại Clinic</div>
                            </div>
                            <button class="mm-btn-detail" onclick="openSkuModal('Gói thẻ thành viên duy trì KEEP Club', 'Gọn Khoẻ by Qcare', '2.970.000 đ/quý', 'KEEP', 'GỌN KHOẺ TUYỂN CHỌN', 'Chương trình đồng hành ngăn ngừa tái tăng cân Yo-yo sau khi kết thúc liệu trình giảm mỡ. Bao gồm 12 tuần đo chỉ số cơ thể, cố vấn dinh dưỡng món Việt và ưu đãi tại Metabolic Market.', 'Khách hàng có thể gia hạn theo quý để duy trì thói quen lối sống khoa học, bền vững.')">Chi Tiết</button>
                        </div>
                    </div>

                    <!-- SKU 9: Sách dinh dưỡng món Việt (KEEP / AVAILABLE) -->
                    <div class="mm-product-card" data-stage="KEEP" data-tier="AVAILABLE" data-category="FITNESS_TOOLS">
                        <div>
                            <div class="mm-card-head">
                                <span class="mm-stage-badge">KEEP · Duy trì dài hạn</span>
                                <span class="mm-tier-tag sky"><i class="fas fa-tag"></i> LƯU HÀNH ĐẠI TRÀ</span>
                            </div>
                            <div class="mm-product-brand">Viện Dinh Dưỡng Qcare</div>
                            <h3 class="mm-product-name">Sổ tay dinh dưỡng món Việt & Bảng tra cứu chỉ số GL/GI</h3>
                            <div class="mm-job-box">
                                <strong>Vai trò & Lợi ích lâm sàng:</strong>
                                Hướng dẫn cách ăn cơm nhà chuẩn y khoa, công thức nêm nếm ít đường và bảng tính tải lượng đường huyết hơn 300 món Việt.
                            </div>
                            <div class="mm-guardrail-micro">
                                <i class="fas fa-info-circle"></i>
                                <span>Tài liệu giáo dục sức khỏe và thói quen nấu nướng gia đình.</span>
                            </div>
                        </div>
                        <div class="mm-card-foot">
                            <div class="mm-price-block">
                                <div class="mm-price-main">190.000 đ</div>
                                <div class="mm-price-original">250.000 đ</div>
                                <div class="mm-stock-badge"><i class="fas fa-check"></i> Sẵn hàng tại phòng khám</div>
                            </div>
                            <button class="mm-btn-detail" onclick="openSkuModal('Sổ tay dinh dưỡng món Việt & Bảng tra cứu chỉ số GL/GI', 'Viện Dinh Dưỡng Qcare', '190.000 đ', 'KEEP', 'LƯU HÀNH ĐẠI TRÀ', 'Tài liệu hướng dẫn trực quan cách kết hợp món ăn Việt Nam truyền thống với nguyên lý kiểm soát đường huyết và bảo tồn khối cơ nạc.', 'Ấn phẩm in màu sắc nét, kèm mã QR cập nhật món ăn online định kỳ.')">Chi Tiết</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: What It Is & What It Is Not (Slide 4) -->
    <section id="compare" class="mm-section" style="background: #ffffff;">
        <div class="mm-container">
            <div class="mm-section-header">
                <span class="mm-sub-title">Mô Hình Khác Biệt</span>
                <h2 class="mm-main-title">Metabolic Market Là Gì — Và Không Là Gì</h2>
                <p class="mm-title-desc">Chúng tôi không xây dựng một cửa hàng bán lẻ đại trà, mà thiết lập một kênh phân phối y khoa có trách nhiệm và ngữ cảnh rõ ràng.</p>
            </div>

            <div class="mm-compare-grid">
                <!-- LÀ -->
                <div class="mm-compare-box is-la">
                    <div class="mm-compare-header">
                        <div class="mm-compare-icon"><i class="fas fa-check-circle"></i></div>
                        <h3>LÀ</h3>
                    </div>
                    <ul class="mm-compare-list">
                        <li class="mm-compare-item">
                            <i class="fas fa-check"></i>
                            <div><strong>Nền tảng tuyển chọn tại phòng khám:</strong> Sản phẩm nằm ngay trong không gian tư vấn, đồng hành cùng bệnh nhân giảm cân & chuyển hóa.</div>
                        </li>
                        <li class="mm-compare-item">
                            <i class="fas fa-check"></i>
                            <div><strong>Vận hành tinh gọn (Asset-light):</strong> Ưu tiên mô hình ký gửi và chia sẻ doanh thu, tối ưu dòng vốn cho đối tác.</div>
                        </li>
                        <li class="mm-compare-item">
                            <i class="fas fa-check"></i>
                            <div><strong>Thẩm định y khoa từng sản phẩm:</strong> Mỗi sản phẩm được Hội đồng Y khoa đánh giá nghiêm ngặt về chất lượng, an toàn và tính tương thích.</div>
                        </li>
                        <li class="mm-compare-item">
                            <i class="fas fa-check"></i>
                            <div><strong>Hoạt động đối tác có kiểm soát:</strong> Trải nghiệm dùng thử sản phẩm, hội thảo khoa học, giới thiệu và quét mã hướng dẫn có chuẩn mực chuyên môn.</div>
                        </li>
                        <li class="mm-compare-item">
                            <i class="fas fa-check"></i>
                            <div><strong>Dữ liệu tiêu thụ tổng hợp:</strong> Minh bạch số liệu bán lẻ, tỷ lệ khách hàng mua lại ở mức số liệu tổng hợp (aggregate).</div>
                        </li>
                        <li class="mm-compare-item">
                            <i class="fas fa-check"></i>
                            <div><strong>Thử nghiệm 90 ngày trước khi mở rộng:</strong> Thời gian thử nghiệm đủ ngắn để đúc rút nhanh và đủ dài để đo lường mức độ tương thích vận hành.</div>
                        </li>
                    </ul>
                </div>

                <!-- KHÔNG LÀ -->
                <div class="mm-compare-box is-khong">
                    <div class="mm-compare-header">
                        <div class="mm-compare-icon"><i class="fas fa-times-circle"></i></div>
                        <h3>KHÔNG LÀ</h3>
                    </div>
                    <ul class="mm-compare-list">
                        <li class="mm-compare-item">
                            <i class="fas fa-times"></i>
                            <div><strong>Kệ hàng trăm loại thực phẩm bổ sung:</strong> Không nhồi nhét sản phẩm tràn lan làm bệnh nhân hoang mang và mất phương hướng.</div>
                        </li>
                        <li class="mm-compare-item">
                            <i class="fas fa-times"></i>
                            <div><strong>Gọn Khoẻ ôm tồn kho ngay từ đầu:</strong> Không áp đặt các điều khoản mua đứt rủi ro khi chưa kiểm chứng mức độ tiêu thụ thực tế.</div>
                        </li>
                        <li class="mm-compare-item">
                            <i class="fas fa-times"></i>
                            <div><strong>Trả tiền để được bác sĩ khuyên dùng:</strong> Quyết định chuyên môn của Bác sĩ giữ tính độc lập khách quan, không bị chi phối bởi tài trợ thương mại.</div>
                        </li>
                        <li class="mm-compare-item">
                            <i class="fas fa-times"></i>
                            <div><strong>Khai thác dữ liệu người bệnh:</strong> Tuân thủ quy chuẩn bảo mật dữ liệu y tế cá nhân; chỉ phân tích số liệu tổng hợp (aggregate) phục vụ chuyên môn.</div>
                        </li>
                        <li class="mm-compare-item">
                            <i class="fas fa-times"></i>
                            <div><strong>Ký độc quyền làm khóa lựa chọn y khoa:</strong> Không cam kết độc quyền làm hạn chế các lựa chọn can thiệp phù hợp cho người bệnh.</div>
                        </li>
                        <li class="mm-compare-item">
                            <i class="fas fa-times"></i>
                            <div><strong>Khuyến mại tự phát phá trải nghiệm:</strong> Không giảm giá hỗn loạn hay bán phá giá ảnh hưởng đến hình ảnh thương hiệu đối tác.</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Commercial Architecture (Slide 6) -->
    <section id="models" class="mm-section">
        <div class="mm-container">
            <div class="mm-section-header">
                <span class="mm-sub-title">Cấu Trúc Hợp Tác Thương Mại</span>
                <h2 class="mm-main-title">Bốn Cách Thức Hợp Tác Cùng Gọn Khoẻ</h2>
                <p class="mm-title-desc">Chọn mô hình linh hoạt theo từng nhóm ngành hàng và mức độ hỗ trợ của đối tác; không cố ép một cấu trúc cứng nhắc cho tất cả.</p>
            </div>

            <div class="mm-models-grid">
                <!-- Model 1 -->
                <div class="mm-model-card">
                    <div>
                        <div class="mm-model-num">1</div>
                        <h3 class="mm-model-title">Ký Gửi</h3>
                        <span class="mm-model-badge">Mặc Định</span>
                        <div class="mm-model-desc">
                            Đối tác chủ động quản lý tồn kho; Gọn Khoẻ lưu mẫu trưng bày và hưởng tỷ lệ chia sẻ doanh thu trên mỗi đơn bán thành công.
                        </div>
                    </div>
                    <div class="mm-model-fit">
                        <i class="fas fa-tag"></i> <strong>Phù hợp:</strong> Phần lớn sản phẩm tiêu chuẩn (Thực phẩm đường huyết thấp, Trà thảo mộc, Bữa ăn tiện lợi).
                    </div>
                </div>

                <!-- Model 2 -->
                <div class="mm-model-card">
                    <div>
                        <div class="mm-model-num">2</div>
                        <h3 class="mm-model-title">Phí Trưng Bày & Doanh Thu</h3>
                        <span class="mm-model-badge" style="background:#e0f2fe; color:#0369a1;">Chọn Lọc</span>
                        <div class="mm-model-desc">
                            Cấu trúc kết hợp: Phí cố định vị trí trưng bày ưu tiên + Chia sẻ doanh thu ưu đãi trên lượng tiêu thụ thực tế.
                        </div>
                    </div>
                    <div class="mm-model-fit">
                        <i class="fas fa-tag"></i> <strong>Phù hợp:</strong> Thương hiệu cần gia tăng độ nhận diện nổi bật và triển khai dùng thử sản phẩm trực tiếp.
                    </div>
                </div>

                <!-- Model 3 -->
                <div class="mm-model-card">
                    <div>
                        <div class="mm-model-num">3</div>
                        <h3 class="mm-model-title">Đối Tác Ngành Hàng</h3>
                        <span class="mm-model-badge" style="background:#fef3c7; color:#92400e;">Trọng Điểm</span>
                        <div class="mm-model-desc">
                            Quyền đồng hành & tổ chức hoạt động chuyên biệt theo ngành hàng + Giá trị cố định + Chia sẻ doanh thu cùng phát triển.
                        </div>
                    </div>
                    <div class="mm-model-fit">
                        <i class="fas fa-tag"></i> <strong>Phù hợp:</strong> Đối tác chiến lược dẫn đầu muốn khẳng định vị thế và thị phần trong phân khúc chuyên môn.
                    </div>
                </div>

                <!-- Model 4 -->
                <div class="mm-model-card">
                    <div>
                        <div class="mm-model-num">4</div>
                        <h3 class="mm-model-title">Tích Hợp Phác Đồ</h3>
                        <span class="mm-model-badge" style="background:#fce7f3; color:#9d174d;">Chiến Lược</span>
                        <div class="mm-model-desc">
                            Sản phẩm được tích hợp trực tiếp vào các gói khám và phác đồ điều trị của Gọn Khoẻ (GON3, GON5, GON10, KEEP).
                        </div>
                    </div>
                    <div class="mm-model-fit">
                        <i class="fas fa-tag"></i> <strong>Phù hợp:</strong> Thiết bị y tế (cảm biến CGM, cân thông minh) & Dinh dưỡng y khoa chuyên biệt.
                    </div>
                </div>
            </div>

            <div class="mm-pilot-rule-callout">
                <i class="fas fa-lightbulb"></i>
                <div>
                    <span>Nguyên tắc thử nghiệm cốt lõi:</span> Gọn Khoẻ không ôm hàng tồn kho, trừ ngoại lệ được Tổng Giám Đốc phê duyệt sau khi đã có dữ liệu tiêu thụ thực tế rõ ràng.
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: 90-Day Pilot Roadmap (Slide 8) -->
    <section id="pilot" class="mm-section" style="background: #ffffff;">
        <div class="mm-container">
            <div class="mm-section-header">
                <span class="mm-sub-title">Lộ Trình Thử Nghiệm</span>
                <h2 class="mm-main-title">Lộ Trình Thử Nghiệm 90 Ngày</h2>
                <p class="mm-title-desc">Thời gian đủ ngắn để đúc rút nhanh, và đủ dài để đo lường tỷ lệ mua lại cùng mức độ tương thích vận hành.</p>
            </div>

            <!-- Timeline visual -->
            <div class="mm-timeline">
                <div class="mm-timeline-step">
                    <div class="mm-timeline-dot">D0</div>
                    <h3 class="mm-timeline-title">Chốt Sản Phẩm & Thỏa Thuận</h3>
                    <p class="mm-timeline-desc">Thẩm định hồ sơ, chọn 2–5 sản phẩm tối ưu, thống nhất mô hình thương mại và hoàn tất sơ đồ trưng bày kệ.</p>
                </div>
                <div class="mm-timeline-step">
                    <div class="mm-timeline-dot">D30</div>
                    <h3 class="mm-timeline-title">Đo Lường Tiêu Thụ & Tương Thích</h3>
                    <p class="mm-timeline-desc">Đo lường lượng bán tại chỗ, ghi nhận phản hồi trải nghiệm từ bệnh nhân và tính tương thích lâm sàng.</p>
                </div>
                <div class="mm-timeline-step">
                    <div class="mm-timeline-dot">D60</div>
                    <h3 class="mm-timeline-title">Tỷ Lệ Mua Lại & Hiệu Quả Kinh Tế</h3>
                    <p class="mm-timeline-desc">Đánh giá tỷ lệ mua lại, tối ưu chu kỳ bổ sung hàng và kiểm soát chặt chẽ hàng cận hạn sử dụng.</p>
                </div>
                <div class="mm-timeline-step">
                    <div class="mm-timeline-dot">D90</div>
                    <h3 class="mm-timeline-title">Mở Rộng / Điều Chỉnh / Dừng</h3>
                    <p class="mm-timeline-desc">Hội đồng thẩm định quyết định nhân rộng toàn hệ thống phòng khám, tinh chỉnh hoặc dừng phân phối.</p>
                </div>
            </div>

            <!-- Quantitative KPIs Matrix -->
            <div class="mm-kpi-matrix">
                <div class="mm-kpi-card">
                    <div class="mm-kpi-val">≥ 30%</div>
                    <div class="mm-kpi-name">Tỷ Lệ Mua Kèm</div>
                </div>
                <div class="mm-kpi-card">
                    <div class="mm-kpi-val">≥ 25%</div>
                    <div class="mm-kpi-name">Tỷ Lệ Mua Hàng</div>
                </div>
                <div class="mm-kpi-card">
                    <div class="mm-kpi-val">≥ 25%</div>
                    <div class="mm-kpi-name">Mua Lại Sau 60 Ngày</div>
                </div>
                <div class="mm-kpi-card">
                    <div class="mm-kpi-val">> 20%</div>
                    <div class="mm-kpi-name">Biên Lợi Nhuận Gộp</div>
                </div>
                <div class="mm-kpi-card">
                    <div class="mm-kpi-val">< 1%</div>
                    <div class="mm-kpi-name">Cận Hạn / Hủy Hàng</div>
                </div>
                <div class="mm-kpi-card">
                    <div class="mm-kpi-val">≥ 95%</div>
                    <div class="mm-kpi-name">Cam Kết Dịch Vụ Đối Tác</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: Partner Intake & Form F-MM01 (Slides 9 & 10) -->
    <section id="partner-form" class="mm-section">
        <div class="mm-container">
            <div class="mm-onboard-wrapper">
                <!-- Left Details -->
                <div class="mm-onboard-info">
                    <div>
                        <span class="mm-pill-badge" style="background: rgba(16, 185, 129, 0.2); color: #34d399; margin-bottom: 14px;">
                            <i class="fas fa-clock"></i> Cam kết 48 - 72 Giờ
                        </span>
                        <h3>Để đi từ cuộc họp → triển khai thử nghiệm trong 7–10 ngày</h3>
                        <p>Quy trình thẩm định tinh gọn giúp thương hiệu tiếp cận nhanh chóng nhóm khách hàng có nhu cầu điều trị thực sự tại Gọn Khoẻ by Qcare.</p>

                        <div class="mm-check-points">
                            <div class="mm-check-point">
                                <div class="mm-check-num">1</div>
                                <div>
                                    <div class="mm-check-title">Danh mục: 2–5 sản phẩm phù hợp nhất</div>
                                    <div class="mm-check-desc">Không gửi toàn bộ danh mục đại trà; chỉ chọn những sản phẩm có vai trò điều trị rõ ràng nhất.</div>
                                </div>
                            </div>
                            <div class="mm-check-point">
                                <div class="mm-check-num">2</div>
                                <div>
                                    <div class="mm-check-title">Hồ sơ sản phẩm: Nhãn & Pháp lý</div>
                                    <div class="mm-check-desc">Công bố tiêu chuẩn cơ sở, phiếu kiểm nghiệm chất lượng (COA/spec), nội dung công bố dự kiến.</div>
                                </div>
                            </div>
                            <div class="mm-check-point">
                                <div class="mm-check-num">3</div>
                                <div>
                                    <div class="mm-check-title">Thương mại & Vận hành</div>
                                    <div class="mm-check-desc">Thống nhất phương thức ký gửi, thời gian bổ sung tồn kho và chính sách đổi trả.</div>
                                </div>
                            </div>
                            <div class="mm-check-point">
                                <div class="mm-check-num">4</div>
                                <div>
                                    <div class="mm-check-title">Cuộc họp 45 phút</div>
                                    <div class="mm-check-desc">Quyết định chốt thỏa thuận thương mại, duyệt sơ đồ trưng bày kệ và lên kệ trong 7–10 ngày.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mm-sla-banner">
                        <i class="fas fa-hand-holding-medical"></i> <strong>Cam kết Qcare:</strong> Hội đồng Y khoa & Thương mại cam kết phản hồi đánh giá sơ bộ trong vòng <strong>48–72 giờ</strong> sau khi nhận đủ hồ sơ.
                    </div>
                </div>

                <!-- Right Form F-MM01 -->
                <div class="mm-form-side">
                    <div class="mm-form-head">
                        <h3 class="mm-form-title">Đăng Ký Hồ Sơ Đối Tác (F-MM01)</h3>
                        <p class="mm-form-sub">Điền thông tin thương hiệu để nhận lịch hẹn họp 45 phút cùng Ban Giám đốc Qcare.</p>
                    </div>

                    <form id="lead-form" onsubmit="handleLeadSubmit(event)">
                        <div class="mm-form-grid">
                            <div class="mm-form-group">
                                <label class="mm-form-label">Tên Thương Hiệu / Doanh Nghiệp <span>*</span></label>
                                <input type="text" name="brand_name" class="mm-form-control" placeholder="Ví dụ: Dexcom / NutriLab" required>
                            </div>
                            <div class="mm-form-group">
                                <label class="mm-form-label">Người Đại Diện Phụ Trách <span>*</span></label>
                                <input type="text" name="contact_person" class="mm-form-control" placeholder="Họ và tên" required>
                            </div>
                        </div>

                        <div class="mm-form-grid">
                            <div class="mm-form-group">
                                <label class="mm-form-label">Số Điện Thoại Zalo / Hotline <span>*</span></label>
                                <input type="tel" name="phone" class="mm-form-control" placeholder="090x xxx xxx" required>
                            </div>
                            <div class="mm-form-group">
                                <label class="mm-form-label">Email Doanh Nghiệp <span>*</span></label>
                                <input type="email" name="email" class="mm-form-control" placeholder="contact@domain.vn" required>
                            </div>
                        </div>

                        <div class="mm-form-grid">
                            <div class="mm-form-group">
                                <label class="mm-form-label">Mô Hình Hợp Tác Đề Xuất <span>*</span></label>
                                <select name="model" class="mm-form-control" required>
                                    <option value="CONSIGNMENT">1. Ký gửi (Consignment - Mặc định)</option>
                                    <option value="SHELF_FEE_SHARE">2. Phí thuê kệ + Chia sẻ doanh thu (Shelf Fee + Revenue Share)</option>
                                    <option value="CATEGORY_PARTNER">3. Đối tác chủ lực ngành hàng (Category Partnership)</option>
                                    <option value="PROGRAM_PARTNER">4. Đối tác gói chương trình điều trị (Program Partnership)</option>
                                </select>
                            </div>
                            <div class="mm-form-group">
                                <label class="mm-form-label">Số Lượng Sản Phẩm Dự Kiến (2 - 5 Sản Phẩm) <span>*</span></label>
                                <label class="mm-form-label">Số Lượng Sản Phẩm Dự Kiến (2 - 5) <span>*</span></label>
                                <input type="number" name="sku_count" min="1" max="10" value="3" class="mm-form-control" required>
                            </div>
                        </div>

                        <div class="mm-form-group">
                            <label class="mm-form-label">Nhóm Ngành Hàng Đăng Ký (Theo 4 Nhóm Chuẩn Mã 23) <span>*</span></label>
                            <select name="category" class="mm-form-control" required>
                                <option value="Dinh dưỡng & Bữa ăn thuận tiện">1. Dinh dưỡng & Bữa ăn thuận tiện (Chỉ số đường huyết thấp, Đạm dinh dưỡng, Bữa ăn thay thế)</option>
                                <option value="Bổ sung Đạm & Chất xơ">2. Bổ sung Đạm & Chất xơ (Đạm Isolate, Chất xơ hòa tan Prebiotic)</option>
                                <option value="Thiết bị theo dõi tại nhà">3. Thiết bị theo dõi tại nhà (Cảm biến CGM, Cân thông minh InBody, Máy đo huyết áp)</option>
                                <option value="Dụng cụ hỗ trợ vận động & Gói thành viên">4. Dụng cụ hỗ trợ vận động & Gói thành viên (Dây kháng lực, Câu lạc bộ KEEP Club)</option>
                            </select>
                        </div>

                        <div class="mm-form-grid">
                            <div class="mm-form-group">
                                <label class="mm-form-label">Địa Điểm Kệ Trưng Bày Mong Muốn <span>*</span></label>
                                <select name="location" class="mm-form-control" required>
                                    <option value="Số 1/05 Đường 0, Garden Court 2, Phường Tân Hưng, TP.HCM">Số 1/05 Đường 0, Garden Court 2, Phường Tân Hưng, TP.HCM</option>
                                </select>
                            </div>
                            <div class="mm-form-group">
                                <label class="mm-form-label">Thời Gian Dự Kiến Lên Kệ <span>*</span></label>
                                <select name="timeline" class="mm-form-control" required>
                                    <option value="Ngay trong tuần Pilot đầu tiên">Ngay trong tuần Pilot đầu tiên</option>
                                    <option value="Trong vòng 30 ngày">Trong vòng 30 ngày</option>
                                    <option value="1 - 3 tháng tới">1 - 3 tháng tới</option>
                                </select>
                            </div>
                        </div>

                        <div class="mm-form-group">
                            <label class="mm-form-label">Link Hồ Sơ Pháp Lý / Nhãn / COA (Google Drive / PDF)</label>
                            <input type="url" name="document_link" class="mm-form-control" placeholder="https://drive.google.com/drive/folders/...">
                        </div>

                        <div class="mm-form-group">
                            <label class="mm-form-label">Đề Xuất Khung Giờ Họp 45 Phút Trực Tiếp Hoặc Online</label>
                            <input type="text" name="meeting_slot" class="mm-form-control" placeholder="Ví dụ: Chiều thứ 4 tuần này (14h00 - 14h45)">
                        </div>

                        <!-- Checkbox Tuân Thủ Dữ Liệu (Yêu cầu IT Trang 7 - Mã 35) -->
                        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 14px; margin-bottom: 20px;">
                            <label class="mm-checkbox-label">
                                <input type="checkbox" name="agree_terms" required checked>
                                <span><strong>Tôi đồng ý</strong> để Gọn Khoẻ by Qcare liên hệ xử lý thông tin hồ sơ theo chính sách bảo mật dữ liệu y tế. <em>(Bắt buộc)</em></span>
                            </label>
                            <label class="mm-checkbox-label">
                                <input type="checkbox" name="agree_marketing">
                                <span>Đồng ý nhận bản tin cập nhật thị trường chuyển hóa & chính sách đối tác định kỳ. <em>(Tùy chọn)</em></span>
                            </label>
                        </div>

                        <button type="submit" class="mm-btn-submit-lead">
                            <i class="fas fa-check-circle"></i> Gửi Hồ Sơ F-MM01 & Đăng Ký Họp 45 Phút
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 6: Hợp Tác & Nhượng Quyền Gọn Khoẻ (Yêu cầu IT Trang 6 - Mã 28 - 33) -->
    <section id="franchise" class="mm-section mm-franchise-section">
        <div class="mm-container">
            <!-- Header (Mã 28) -->
            <div class="mm-section-header" style="text-align: center;">
                <div class="mm-franchise-status-badge">
                    <i class="fas fa-handshake-angle"></i> Tiếp nhận đối tác phát triển mô hình
                </div>
                <h2 class="mm-main-title">Hợp Tác & Nhượng Quyền</h2>
                <p class="mm-title-desc" style="max-width: 720px; margin: 0 auto 20px;">
                    Cùng Gọn Khoẻ phát triển dịch vụ giảm cân và sức khỏe chuyển hóa tại cộng đồng.
                </p>
                <div style="display: flex; justify-content: center; gap: 12px;">
                    <a href="#franchise-form" class="mm-btn-hero-primary" style="padding: 11px 24px;">
                        <i class="fas fa-file-signature"></i> Đăng Ký Trao Đổi Hợp Tác
                    </a>
                </div>
            </div>

            <!-- 3 Thẻ Mô Hình (Mã 29) -->
            <div class="mm-franchise-models-grid">
                <!-- Mô hình 1 -->
                <div class="mm-franchise-card">
                    <div>
                        <span class="mm-franchise-badge">Mô hình 01 · Tiếp cận</span>
                        <h3 class="mm-franchise-title">Đối Tác Kết Nối</h3>
                        <p class="mm-franchise-desc">
                            Dành cho Gym, Studio Pilates, Yoga, Trung tâm thể hình & Doanh nghiệp quan tâm sức khỏe nhân sự.
                        </p>
                        <div class="mm-franchise-scope">
                            <strong><i class="fas fa-cube"></i> Phạm vi hợp tác:</strong>
                            Đặt tài liệu thông tin, quầy trải nghiệm dùng thử sản phẩm dinh dưỡng Metabolic Market; hưởng tỷ lệ chia sẻ doanh thu khi giới thiệu hội viên/nhân sự tham gia liệu trình kiểm tra & điều trị chuyển hóa tại Gọn Khoẻ.
                        </div>
                    </div>
                    <a href="#franchise-form" onclick="selectFranchiseModel('CONNECT_PARTNER')" class="mm-franchise-btn">
                        <i class="fas fa-arrow-right"></i> Đăng Ký Đối Tác Kết Nối
                    </a>
                </div>

                <!-- Mô hình 2 -->
                <div class="mm-franchise-card" style="border-color: #10B981; box-shadow: 0 10px 25px rgba(16, 185, 129, 0.1);">
                    <div>
                        <span class="mm-franchise-badge" style="background: #e0f2fe; color: #0369a1;">Mô hình 02 · Trải nghiệm</span>
                        <h3 class="mm-franchise-title">Gọn Khoẻ Express</h3>
                        <p class="mm-franchise-desc">
                            Điểm tiếp cận và trải nghiệm tinh gọn (Quầy kiểm tra sức khỏe nhanh, điểm dinh dưỡng tại TTTM hoặc tòa nhà văn phòng).
                        </p>
                        <div class="mm-franchise-scope">
                            <strong><i class="fas fa-store-alt"></i> Phạm vi trải nghiệm:</strong>
                            Cung cấp bữa ăn dinh dưỡng chuyển hóa thuận tiện, đo thành phần cơ thể InBody nhanh và tư vấn lối sống.
                            <div style="margin-top: 6px; font-size: 0.78rem; color: #92400e; background: #fffbeb; padding: 6px 8px; border-radius: 4px;">
                                <i class="fas fa-info-circle"></i> <em>Lưu ý: Express là điểm trải nghiệm & dinh dưỡng, không mặc nhiên là cơ sở khám chữa bệnh.</em>
                            </div>
                        </div>
                    </div>
                    <a href="#franchise-form" onclick="selectFranchiseModel('EXPRESS_KIOSK')" class="mm-franchise-btn" style="background: #10B981; color: #ffffff; border-color: #10B981;">
                        <i class="fas fa-arrow-right"></i> Đăng Ký Gọn Khoẻ Express
                    </a>
                </div>

                <!-- Mô hình 3 -->
                <div class="mm-franchise-card">
                    <div>
                        <span class="mm-franchise-badge" style="background: #fef3c7; color: #92400e;">Mô hình 03 · Toàn diện</span>
                        <h3 class="mm-franchise-title">Trung Tâm Gọn Khoẻ</h3>
                        <p class="mm-franchise-desc">
                            Mô hình phòng khám chuyên khoa điều trị Giảm cân & Sức khỏe chuyển hóa toàn diện theo điều kiện triển khai y tế.
                        </p>
                        <div class="mm-franchise-scope">
                            <strong><i class="fas fa-hospital"></i> Phạm vi chuyên sâu:</strong>
                            Đầy đủ chức năng y khoa: Bác sĩ chuyên khoa trực tiếp thăm khám, xét nghiệm máu chuyển hóa, phác đồ điều trị y khoa có cam kết và không gian bán lẻ Metabolic Market tiêu chuẩn.
                        </div>
                    </div>
                    <a href="#franchise-form" onclick="selectFranchiseModel('FULL_CENTER')" class="mm-franchise-btn">
                        <i class="fas fa-arrow-right"></i> Đăng Ký Trung Tâm Đầy Đủ
                    </a>
                </div>
            </div>

            <!-- Phạm vi Qcare Hỗ Trợ (Mã 30) -->
            <div style="margin-bottom: 25px;">
                <h3 style="font-size: 1.25rem; font-weight: 800; color: #0B3B3C; text-align: center; margin-bottom: 25px;">
                    Phạm Vi Đồng Hành & Năng Lực Qcare Hỗ Trợ Đối Tác
                </h3>
                <div class="mm-support-grid">
                    <div class="mm-support-card">
                        <h4><i class="fas fa-certificate"></i> Thương Hiệu & Định Vị</h4>
                        <p>Quyền sử dụng thương hiệu Gọn Khoẻ by Qcare và nhận diện chuẩn y khoa chuyên nghiệp.</p>
                    </div>
                    <div class="mm-support-card">
                        <h4><i class="fas fa-user-graduate"></i> Đào Tạo & Quy Chuẩn Vận Hành</h4>
                        <p>Chuyển giao toàn bộ quy trình vận hành chuẩn y khoa, phác đồ dinh dưỡng và đào tạo nhân sự.</p>
                    </div>
                    <div class="mm-support-card">
                        <h4><i class="fas fa-mobile-screen-button"></i> Nền Tảng Công Nghệ</h4>
                        <p>Hệ thống quản lý hồ sơ người bệnh, ứng dụng theo dõi chỉ số và công cụ tính toán phác đồ chuẩn.</p>
                    </div>
                    <div class="mm-support-card">
                        <h4><i class="fas fa-bullhorn"></i> Tiếp Thị & Khách Hàng</h4>
                        <p>Hỗ trợ chiến dịch truyền thông ra mắt, kết nối mạng lưới đối tác và điều phối khách hàng khu vực.</p>
                    </div>
                </div>
            </div>

            <!-- Quy trình 7 bước (Mã 32) -->
            <div style="margin-bottom: 50px;">
                <h3 style="font-size: 1.25rem; font-weight: 800; color: #0B3B3C; text-align: center; margin-bottom: 10px;">
                    Quy Trình 7 Bước Hợp Tác & Triển Khai Mô Hình
                </h3>
                <p style="text-align: center; color: #64748b; font-size: 0.9rem; margin-bottom: 25px;">
                    Minh bạch, bài bản và tuân thủ chặt chẽ các quy chuẩn y tế chuyên môn.
                </p>
                <div class="mm-franchise-steps">
                    <div class="mm-step-box">
                        <div class="mm-step-box-num">1</div>
                        <div class="mm-step-box-title">Đăng Ký Thông Tin</div>
                    </div>
                    <div class="mm-step-box">
                        <div class="mm-step-box-num">2</div>
                        <div class="mm-step-box-title">Trao Đổi Ban Đầu</div>
                    </div>
                    <div class="mm-step-box">
                        <div class="mm-step-box-num">3</div>
                        <div class="mm-step-box-title">Đánh Giá Phù Hợp</div>
                    </div>
                    <div class="mm-step-box">
                        <div class="mm-step-box-num">4</div>
                        <div class="mm-step-box-title">Đề Xuất Mô Hình</div>
                    </div>
                    <div class="mm-step-box">
                        <div class="mm-step-box-num">5</div>
                        <div class="mm-step-box-title">Thẩm Định Năng Lực</div>
                    </div>
                    <div class="mm-step-box">
                        <div class="mm-step-box-num">6</div>
                        <div class="mm-step-box-title">Ký Kết Thỏa Thuận</div>
                    </div>
                    <div class="mm-step-box">
                        <div class="mm-step-box-num">7</div>
                        <div class="mm-step-box-title">Đào Tạo & Triển Khai</div>
                    </div>
                </div>
            </div>

            <!-- Biểu Mẫu Riêng Biệt (Mã 31) & Checkbox Tuân Thủ Dữ Liệu (Mã 35) -->
            <div id="franchise-form" class="mm-onboard-wrapper" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.06);">
                <div class="mm-onboard-info" style="background: #062b2b;">
                    <div>
                        <span class="mm-pill-badge" style="background: rgba(16, 185, 129, 0.2); color: #34d399; margin-bottom: 14px;">
                            <i class="fas fa-handshake"></i> Đối Tác Đồng Hành
                        </span>
                        <h3>Tiếp nhận đối tác phát triển mô hình Gọn Khoẻ</h3>
                        <p>Bộ phận phát triển đối tác Qcare sẽ liên hệ trao đổi chi tiết trong vòng 24–48 giờ làm việc sau khi tiếp nhận hồ sơ.</p>

                        <div class="mm-check-points" style="margin-top: 30px;">
                            <div class="mm-check-point">
                                <div class="mm-check-num"><i class="fas fa-shield-alt"></i></div>
                                <div>
                                    <div class="mm-check-title">Cam kết bảo mật thông tin</div>
                                    <div class="mm-check-desc">Mọi thông tin tổ chức, tài chính và kế hoạch hợp tác được bảo mật nghiêm ngặt theo cam kết hai bên.</div>
                                </div>
                            </div>
                            <div class="mm-check-point">
                                <div class="mm-check-num"><i class="fas fa-hand-holding-dollar"></i></div>
                                <div>
                                    <div class="mm-check-title">Không thu phí giữ chỗ tự ý</div>
                                    <div class="mm-check-desc">Qcare không nhận đặt cọc hoặc tự ý ký hợp đồng khi chưa thẩm định đầy đủ điều kiện chuyên môn.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Guardrail Thương Mại (Mã 33) -->
                    <div class="mm-sla-banner" style="background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.15); color: #cbd5e1; font-size: 0.8rem; line-height: 1.5;">
                        <i class="fas fa-scale-balanced" style="color: #f59e0b;"></i>
                        <span><strong>Ràng buộc pháp lý & thương mại (Mã 33):</strong> Thông tin tài chính, phí chuyển giao và điều kiện triển khai chỉ được cung cấp sau bước thẩm định trực tiếp bởi Ban điều hành Qcare. Không công bố số liệu ước đoán khi chưa được phê duyệt.</span>
                    </div>
                </div>

                <!-- Right Franchise Form -->
                <div class="mm-form-side" style="padding: 35px 30px;">
                    <div class="mm-form-head">
                        <h3 class="mm-form-title">Đăng Ký Trao Đổi Hợp Tác & Nhượng Quyền</h3>
                        <p class="mm-form-sub">Vui lòng điền thông tin để chúng tôi chuẩn bị tài liệu trao đổi phù hợp nhất.</p>
                    </div>

                    <form id="franchise-lead-form" onsubmit="handleFranchiseSubmit(event)">
                        <div class="mm-form-grid">
                            <div class="mm-form-group">
                                <label class="mm-form-label">Họ và Tên Người Đại Diện <span>*</span></label>
                                <input type="text" name="fullname" class="mm-form-control" placeholder="Nguyễn Văn A" required>
                            </div>
                            <div class="mm-form-group">
                                <label class="mm-form-label">Số Điện Thoại / Zalo <span>*</span></label>
                                <input type="tel" name="phone" class="mm-form-control" placeholder="090x xxx xxx" required>
                            </div>
                        </div>

                        <div class="mm-form-grid">
                            <div class="mm-form-group">
                                <label class="mm-form-label">Email Liên Hệ <span>*</span></label>
                                <input type="email" name="email" class="mm-form-control" placeholder="contact@domain.com" required>
                            </div>
                            <div class="mm-form-group">
                                <label class="mm-form-label">Tên Tổ Chức / Doanh Nghiệp</label>
                                <input type="text" name="organization" class="mm-form-control" placeholder="Công ty / Phòng khám / Gym Studio">
                            </div>
                        </div>

                        <div class="mm-form-grid">
                            <div class="mm-form-group">
                                <label class="mm-form-label">Tỉnh / Thành Phố Dự Kiến Triển Khai <span>*</span></label>
                                <input type="text" name="province" class="mm-form-control" placeholder="Ví dụ: TP.HCM, Hà Nội, Bình Dương,..." required>
                            </div>
                            <div class="mm-form-group">
                                <label class="mm-form-label">Mô Hình Quan Tâm <span>*</span></label>
                                <select name="model_interested" id="franchise-select-model" class="mm-form-control" required>
                                    <option value="CONNECT_PARTNER">1. Đối tác kết nối (Gym / Pilates / Doanh nghiệp)</option>
                                    <option value="EXPRESS_KIOSK">2. Gọn Khoẻ Express (Kiosk / Điểm tiếp cận & trải nghiệm)</option>
                                    <option value="FULL_CENTER">3. Trung tâm Gọn Khoẻ (Mô hình đầy đủ chuẩn y tế)</option>
                                </select>
                            </div>
                        </div>

                        <div class="mm-form-grid">
                            <div class="mm-form-group">
                                <label class="mm-form-label">Tình Trạng Mặt Bằng</label>
                                <select name="premise_status" class="mm-form-control">
                                    <option value="Đã có mặt bằng sẵn">Đã có mặt bằng sẵn</option>
                                    <option value="Đang tìm kiếm vị trí">Đang tìm kiếm vị trí</option>
                                    <option value="Chưa có / Cần tư vấn chọn mặt bằng">Chưa có / Cần tư vấn chọn mặt bằng</option>
                                    <option value="Không cần mặt bằng (Đối tác kết nối online/referral)">Không cần mặt bằng (Đối tác kết nối)</option>
                                </select>
                            </div>
                            <div class="mm-form-group">
                                <label class="mm-form-label">Khoảng Ngân Sách Đầu Tư Dự Kiến (Tự Nguyện)</label>
                                <label class="mm-form-label">Ngân Sách Đầu Tư Dự Kiến (Tự Nguyện)</label>
                                <select name="budget_range" class="mm-form-control">
                                    <option value="Chưa xác định / Cần tư vấn">Chưa xác định / Cần tư vấn</option>
                                    <option value="Dưới 300 triệu VNĐ">Dưới 300 triệu VNĐ</option>
                                    <option value="300 - 800 triệu VNĐ">300 - 800 triệu VNĐ</option>
                                    <option value="800 triệu - 2 tỷ VNĐ">800 triệu - 2 tỷ VNĐ</option>
                                    <option value="Trên 2 tỷ VNĐ">Trên 2 tỷ VNĐ</option>
                                </select>
                            </div>
                        </div>

                        <div class="mm-form-group">
                            <label class="mm-form-label">Kinh Nghiệm Trong Ngành Y Tế / Thể Thao / F&B</label>
                            <input type="text" name="experience" class="mm-form-control" placeholder="Ví dụ: Đang vận hành 2 phòng tập Pilates hoặc 5 năm kinh nghiệm quản lý phòng khám">
                        </div>

                        <div class="mm-form-group">
                            <label class="mm-form-label">Ghi Chú & Đề Xuất Hợp Tác</label>
                            <textarea name="notes" class="mm-form-control" rows="3" placeholder="Mong muốn cụ thể hoặc thời điểm thuận tiện để Ban phát triển đối tác liên hệ..."></textarea>
                        </div>

                        <!-- Checkbox Tuân Thủ Dữ Liệu (Yêu cầu IT Trang 7 - Mã 35) -->
                        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 14px; margin-bottom: 20px;">
                            <label class="mm-checkbox-label">
                                <input type="checkbox" name="agree_terms" required checked>
                                <span><strong>Tôi đồng ý</strong> để Gọn Khoẻ by Qcare liên hệ xử lý thông tin hồ sơ theo chính sách bảo mật dữ liệu y tế và tiếp nhận đối tác. <em>(Bắt buộc)</em></span>
                            </label>
                            <label class="mm-checkbox-label">
                                <input type="checkbox" name="agree_marketing">
                                <span>Đồng ý nhận bản tin cập nhật thị trường chuyển hóa và chính sách thương mại Gọn Khoẻ định kỳ. <em>(Tùy chọn)</em></span>
                            </label>
                        </div>

                        <button type="submit" class="mm-btn-submit-lead">
                            <i class="fas fa-paper-plane"></i> Gửi Hồ Sơ Đăng Ký Hợp Tác & Nhượng Quyền
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="mm-footer">
        <div class="mm-container">
            <div class="mm-footer-grid">
                <!-- Col 1 -->
                <div class="mm-footer-brand">
                    <h4>GỌN KHOẺ <span>by Qcare</span></h4>
                    <p>Trung tâm Giảm cân & Sức khỏe Chuyển hóa. Nền tảng phân phối y tế có trách nhiệm, gắn liền thương mại với hành trình chăm sóc lâm sàng dài hạn.</p>
                    <div style="display: flex; gap: 10px; margin-top: 15px;">
                        <span class="mm-brand-badge" style="background: rgba(16, 185, 129, 0.15); color: #34d399; border: 1px solid rgba(16, 185, 129, 0.3);">
                            <i class="fas fa-hospital-user"></i> Tiêu chuẩn Y khoa Chuyển hóa
                        </span>
                    </div>
                </div>

                <!-- Col 2 -->
                <div class="mm-footer-col">
                    <h5>Metabolic Market</h5>
                    <ul class="mm-footer-links">
                        <li><a href="#journey">Hành trình CHECK-LOSE-REMIT-KEEP</a></li>
                        <li><a href="#products">SKU Tuyển chọn lâm sàng</a></li>
                        <li><a href="#compare">Tiêu chí LÀ & KHÔNG LÀ</a></li>
                        <li><a href="#models">4 Mô hình hợp tác</a></li>
                        <li><a href="#pilot">Lộ trình Pilot 90 ngày</a></li>
                        <li><a href="#franchise">Hợp tác & Nhượng quyền</a></li>
                        <li><a href="#partner-form">Đăng ký Pilot F-MM01</a></li>
                    </ul>
                </div>

                <!-- Col 3 -->
                <div class="mm-footer-col">
                    <h5>Gói Khám Qcare</h5>
                    <ul class="mm-footer-links">
                        <li><a href="javascript:void(0)">CHECK Bác Sĩ (500k)</a></li>
                        <li><a href="javascript:void(0)">Gói GỌN 3 (12.300.000 đ)</a></li>
                        <li><a href="javascript:void(0)">Gói GỌN 5 (19.500.000 đ)</a></li>
                        <li><a href="javascript:void(0)">Gói GỌN 10 (34.900.000 đ)</a></li>
                        <li><a href="javascript:void(0)">GỌN KHOẺ KEEP (2.970.000 đ/quý)</a></li>
                    </ul>
                </div>

                <!-- Col 4 -->
                <div class="mm-footer-col">
                    <h5>Thông Tin Liên Hệ</h5>
                    <div class="mm-footer-contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div><strong>Địa chỉ:</strong> Số 1/05 Đường 0, Garden Court 2, Phường Tân Hưng, TP.HCM</div>
                    </div>
                    <div class="mm-footer-contact-item">
                        <i class="fas fa-phone-alt"></i>
                        <div><strong>Hotline:</strong> <a href="tel:0353538887" style="color: inherit; text-decoration: none;">035.353.8887</a></div>
                    </div>
                    <div class="mm-footer-contact-item">
                        <i class="fas fa-envelope"></i>
                        <div><strong>Email:</strong> <a href="mailto:info@qcare.com.vn" style="color: inherit; text-decoration: none;">info@qcare.com.vn</a></div>
                    </div>
                </div>
            </div>

            <!-- Medical Disclaimer -->
            <div class="mm-footer-disclaimer">
                <strong><i class="fas fa-exclamation-triangle"></i> Miễn trừ y tế & Ràng buộc pháp lý (Clinical Guardrail):</strong><br>
                Sản phẩm và thông tin được tuyển chọn tại Metabolic Market chỉ mang tính chất hỗ trợ lối sống, bổ sung dinh dưỡng và theo dõi chỉ số cá nhân; không tự ý thay thế việc khám chữa bệnh trực tiếp, phác đồ điều trị hay đơn thuốc chỉ định của Bác sĩ. Các xét nghiệm và chỉ số sinh học cần được Bác sĩ chuyên khoa đánh giá tại phòng khám. Khoản tài trợ thương mại mua quyền tiếp cận không gian bán lẻ, không mua được chỉ định hoặc lời khuyên của Bác sĩ.
            </div>

            <div class="mm-footer-bottom">
                &copy; <?php echo date('Y'); ?> Gọn Khoẻ by Qcare · Metabolic Market. Bản quyền được bảo hộ.
            </div>
        </div>
    </footer>

</div>

<!-- Modal Dialog SKU Detail -->
<div id="sku-modal" class="mm-modal-overlay" onclick="closeModalOutside(event)">
    <div class="mm-modal-card">
        <button class="mm-modal-close" onclick="closeSkuModal()"><i class="fas fa-times"></i></button>
        <div style="display: flex; gap: 8px; margin-bottom: 10px;">
            <span id="modal-stage" class="mm-stage-badge">CHECK</span>
            <span id="modal-tier" class="mm-tier-tag emerald">GỌN KHOẺ CURATED</span>
        </div>
        <div id="modal-brand" class="mm-product-brand">Brand</div>
        <h3 id="modal-title" style="font-size: 1.4rem; font-weight: 800; color: #0f172a; margin-bottom: 12px;">Product Title</h3>
        <div id="modal-price" style="font-size: 1.5rem; font-weight: 800; color: #0B3B3C; margin-bottom: 16px;">1.000.000 đ</div>
        
        <div style="background: #f8fafc; border-left: 4px solid #10B981; padding: 14px 16px; border-radius: 6px; margin-bottom: 16px;">
            <strong style="color: #0B3B3C; font-size: 0.8rem; text-transform: uppercase;">Vai trò & Lợi ích lâm sàng:</strong>
            <p id="modal-job" style="margin: 4px 0 0; font-size: 0.92rem; color: #334155; line-height: 1.5;"></p>
        </div>

        <div style="background: #fffbeb; border: 1px dashed #fde68a; padding: 12px 14px; border-radius: 8px; margin-bottom: 22px;">
            <strong style="color: #92400e; font-size: 0.8rem;"><i class="fas fa-shield-alt"></i> Lưu ý chuyên môn & Phạm vi áp dụng:</strong>
            <p id="modal-guardrail" style="margin: 4px 0 0; font-size: 0.85rem; color: #78350f; line-height: 1.45;"></p>
        </div>

        <div style="display: flex; gap: 12px;">
            <a href="tel:0353538887" class="mm-btn-primary" style="flex: 1; justify-content: center;">
                <i class="fas fa-phone-alt"></i> Tư Vấn Đặt Mua Tại Clinic
            </a>
            <button class="mm-btn-outline" onclick="closeSkuModal()" style="flex: 1; justify-content: center;">Đóng</button>
        </div>
    </div>
</div>

<!-- Modal Dialog Physical Store 3D Visual Detail -->
<div id="image-modal" class="mm-modal-overlay" onclick="closeImageModalOutside(event)">
    <div class="mm-modal-card" style="max-width: 950px; padding: 22px; background: #0c1a1a; border: 1px solid rgba(52, 211, 153, 0.35); box-shadow: 0 25px 50px -12px rgba(0,0,0,0.7);">
        <button class="mm-modal-close" onclick="closeMmImageModal()" style="background: rgba(255,255,255,0.18); color: #fff;"><i class="fas fa-times"></i></button>
        <div style="border-radius: 12px; overflow: hidden; margin-bottom: 16px;">
            <img src="<?php echo base_url(); ?>images/main.webp" alt="Không gian thực tế Metabolic Market tại Gọn Khoẻ by Qcare" style="width: 100%; height: auto; display: block; border-radius: 12px;">
        </div>
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px;">
            <div style="max-width: 680px;">
                <h4 style="color: #ffffff; font-size: 1.15rem; font-weight: 800; margin: 0 0 6px;">Không Gian Thực Tế Metabolic Market · Gọn Khoẻ by Qcare</h4>
                <p style="color: #94a3b8; font-size: 0.88rem; margin: 0; line-height: 1.5;">
                    Phân khu trưng bày chuyên biệt: Kệ Protein & Bữa ăn thay thế, Chất xơ & Gut Health, Vitamin & Bổ sung, Thiết bị y tế theo dõi CGM, Khu vực Ăn nhanh Grab & Go và Bàn tư vấn dinh dưỡng 1-1 của Bác sĩ.
                </p>
            </div>
            <a href="#partner-form" class="mm-btn-hero-primary" onclick="closeMmImageModal()" style="padding: 10px 22px; font-size: 0.9rem;">
                <i class="fas fa-paper-plane"></i> Đăng Ký Trưng Bày Kệ
            </a>
        </div>
    </div>
</div>

<!-- Interactive JavaScript -->
<script>
// Image Modal Open/Close
function openMmImageModal() {
    var modal = document.getElementById('image-modal');
    if (modal) modal.classList.add('open');
}

function closeMmImageModal() {
    var modal = document.getElementById('image-modal');
    if (modal) modal.classList.remove('open');
}

function closeImageModalOutside(event) {
    if (event.target === document.getElementById('image-modal')) {
        closeMmImageModal();
    }
}
// Filter by Stage from Header Stepper
function filterByStage(stage, element) {
    document.querySelectorAll('.mm-journey-step').forEach(function(el) {
        el.classList.remove('active');
    });
    if (element) element.classList.add('active');

    // Sync with filter buttons
    document.querySelectorAll('[data-filter="stage"]').forEach(function(btn) {
        if (btn.getAttribute('data-val') === stage) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }
    });

    applyProductFilters();
}

// Filter products by stage, tier & category (Mã 23)
var currentStageFilter = 'ALL';
var currentTierFilter = 'ALL';
var currentCategoryFilter = 'ALL';

function filterByCategory(cat, element) {
    document.querySelectorAll('.mm-category-card').forEach(function(el) {
        el.classList.remove('active');
    });
    if (element) element.classList.add('active');
    currentCategoryFilter = cat;
    applyProductFilters();
}

function filterProducts(type, value, btn) {
    var parent = btn.parentNode;
    parent.querySelectorAll('.mm-filter-btn').forEach(function(b) {
        b.classList.remove('active');
    });
    btn.classList.add('active');

    if (type === 'stage') {
        currentStageFilter = value;
    } else if (type === 'tier') {
        currentTierFilter = value;
    }

    applyProductFilters();
}

function applyProductFilters() {
    var cards = document.querySelectorAll('.mm-product-card');
    cards.forEach(function(card) {
        var cardStage = card.getAttribute('data-stage');
        var cardTier = card.getAttribute('data-tier');
        var cardCategory = card.getAttribute('data-category');

        var matchStage = (currentStageFilter === 'ALL' || cardStage === currentStageFilter);
        var matchTier = (currentTierFilter === 'ALL' || cardTier === currentTierFilter);
        var matchCategory = (currentCategoryFilter === 'ALL' || cardCategory === currentCategoryFilter);

        if (matchStage && matchTier && matchCategory) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
}

// Select Franchise Model from Card Buttons (Mã 29)
function selectFranchiseModel(modelCode) {
    var select = document.getElementById('franchise-select-model');
    if (select) select.value = modelCode;
}

// Modal open/close logic
function openSkuModal(title, brand, price, stage, tier, job, guardrail) {
    document.getElementById('modal-title').innerText = title;
    document.getElementById('modal-brand').innerText = brand;
    document.getElementById('modal-price').innerText = price;
    document.getElementById('modal-stage').innerText = stage;
    document.getElementById('modal-tier').innerText = tier;
    document.getElementById('modal-job').innerText = job;
    document.getElementById('modal-guardrail').innerText = guardrail;

    var tierEl = document.getElementById('modal-tier');
    tierEl.className = 'mm-tier-tag';
    if (tier.indexOf('RECOMMENDED') !== -1 || tier.indexOf('BÁC SĨ') !== -1) {
        tierEl.classList.add('amber');
    } else if (tier.indexOf('CURATED') !== -1 || tier.indexOf('TUYỂN CHỌN') !== -1) {
        tierEl.classList.add('emerald');
    } else {
        tierEl.classList.add('sky');
    }

    document.getElementById('sku-modal').classList.add('open');
}

function closeSkuModal() {
    document.getElementById('sku-modal').classList.remove('open');
}

function closeModalOutside(event) {
    if (event.target === document.getElementById('sku-modal')) {
        closeSkuModal();
    }
}

// Handle Form Submission F-MM01 (Market Lead - Mã 25 & 34)
function handleLeadSubmit(event) {
    event.preventDefault();
    var form = event.target;
    var brand = form.brand_name.value;
    var person = form.contact_person.value;

    alert('Cảm ơn Quý đối tác: ' + brand + ' (' + person + ')!\n\nHồ sơ hợp tác F-MM01 đã được tiếp nhận thành công.\nHội đồng Y khoa & Thương mại Gọn Khoẻ by Qcare sẽ tiến hành thẩm định và liên hệ xếp lịch họp 45 phút trong vòng 48–72 giờ làm việc.');
    form.reset();
}

// Handle Franchise Lead Submission (Franchise Lead - Mã 31 & 34)
function handleFranchiseSubmit(event) {
    event.preventDefault();
    var form = event.target;
    var name = form.fullname.value;
    var phone = form.phone.value;
    var model = form.model_interested.value;
    var modelName = (model === 'CONNECT_PARTNER') ? 'Đối Tác Kết Nối' : (model === 'EXPRESS_KIOSK' ? 'Gọn Khoẻ Express' : 'Trung Tâm Gọn Khoẻ');

    alert('Cảm ơn Quý đối tác: ' + name + ' (' + phone + ')!\n\nYêu cầu trao đổi mô hình [' + modelName + '] đã được gửi tới Ban Phát Triển Đối Tác Gọn Khoẻ by Qcare.\nChuyên viên phụ trách sẽ liên hệ trao đổi chi tiết trong vòng 24–48 giờ làm việc.');
    form.reset();
}

// Global Smooth Scroll Handler for all in-page links
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            var targetId = this.getAttribute('href');
            if (targetId && targetId !== '#' && targetId.length > 1) {
                var targetEl = document.querySelector(targetId);
                if (targetEl) {
                    e.preventDefault();
                    var headerOffset = 85;
                    var elementPosition = targetEl.getBoundingClientRect().top;
                    var offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });

                    // Update URL hash cleanly
                    if (history.pushState) {
                        history.pushState(null, null, targetId);
                    }
                }
            }
        });
    });
});
</script>

<?php 
   $this->load->view('footer');
?>