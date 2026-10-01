<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore - Nhà Sách Trực Tuyến Xanh</title>

    <!-- Google Fonts: Be Vietnam Pro & Lora -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700&family=Lora:ital,wght@0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- FontAwesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            /* Font chữ */
            --bs-font-sans-serif: 'Be Vietnam Pro', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-serif: 'Lora', Georgia, serif;

            /* Bảng màu Xanh bơ - Xanh bơ kem - Xanh lá - Trắng */
            --primary-avocado: #789950;      /* Xanh bơ tự nhiên */
            --primary-dark: #364e23;         /* Xanh lá đậm sang trọng */
            --accent-green: #5a8235;         /* Xanh lá tươi nổi bật */
            --bg-avocado-cream: #f5f8f2;     /* Xanh bơ kem dịu nhẹ (Nền trang web) */
            --bg-light-green: #e9f0e1;       /* Xanh bơ nhạt (Khối/Highlight) */
            --card-white: #ffffff;           /* Trắng tinh tế (Thẻ sản phẩm) */
            --text-dark: #1f2b16;            /* Xanh đen trầm cho chữ chính */
            --text-muted: #647556;           /* Xanh trầm nhẹ cho phụ đề */
            --border-color: #d8e3cd;         /* Viền xanh nhạt */

            /* Hiệu ứng bóng đổ tông xanh nhạt */
            --card-shadow: 0 10px 25px -5px rgba(54, 78, 35, 0.06), 0 8px 10px -6px rgba(54, 78, 35, 0.04);
            --card-shadow-hover: 0 20px 30px -10px rgba(120, 153, 80, 0.2), 0 10px 15px -5px rgba(54, 78, 35, 0.08);
        }

        body {
            font-family: var(--bs-font-sans-serif);
            background-color: var(--bg-avocado-cream);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Typography */
        h1, h2, h3, h4, .font-serif {
            font-family: var(--font-serif);
        }

        /* Custom Utility Override */
        .text-primary { color: var(--primary-avocado) !important; }
        .bg-primary { background-color: var(--primary-avocado) !important; }
        .btn-primary { 
            background-color: var(--primary-avocado) !important; 
            border-color: var(--primary-avocado) !important;
            color: #ffffff !important;
        }
        .btn-primary:hover { 
            background-color: var(--primary-dark) !important; 
            border-color: var(--primary-dark) !important; 
        }

        /* Glassmorphism Navbar */
        .glass-navbar {
            background: rgba(245, 248, 242, 0.92) !important;
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-bottom: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .brand-logo {
            font-family: var(--font-serif);
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, var(--primary-avocado), var(--primary-dark));
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 4px 12px rgba(120, 153, 80, 0.28);
        }

        /* Search Bar Navigation */
        .nav-search .input-group {
            background-color: var(--bg-light-green);
            border-radius: 50px;
            padding: 3px 6px 3px 16px;
            border: 1px solid var(--border-color);
            transition: all 0.25s ease;
        }

        .nav-search .input-group:focus-within {
            background-color: #ffffff;
            border-color: var(--primary-avocado);
            box-shadow: 0 0 0 4px rgba(120, 153, 80, 0.15);
        }

        .nav-search input {
            background: transparent;
            border: none;
            box-shadow: none !important;
            font-size: 0.9rem;
            color: var(--text-dark);
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            background: radial-gradient(circle at top right, #e9f0e1 0%, var(--bg-avocado-cream) 60%, #dfebce 100%);
            padding: 80px 0 90px;
            overflow: hidden;
            border-bottom: 1px solid var(--border-color);
        }

        .hero-title {
            font-size: 3.3rem;
            font-weight: 700;
            line-height: 1.2;
            color: var(--primary-dark);
        }

        .text-gradient {
            background: linear-gradient(135deg, var(--primary-avocado), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* 3D Stacked Book Cards in Hero */
        .hero-book-showcase {
            position: relative;
            height: 380px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-book-card {
            position: absolute;
            width: 220px;
            border-radius: 16px;
            box-shadow: 0 20px 40px -10px rgba(54, 78, 35, 0.25);
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            overflow: hidden;
            border: 2px solid #ffffff;
        }

        .hero-book-card img {
            width: 100%;
            height: 310px;
            object-fit: cover;
            display: block;
        }

        .hero-book-1 {
            transform: rotate(-10deg) translateX(-60px) scale(0.92);
            z-index: 1;
            opacity: 0.85;
        }

        .hero-book-2 {
            transform: rotate(8deg) translateX(60px) scale(0.95);
            z-index: 2;
            opacity: 0.9;
        }

        .hero-book-3 {
            transform: rotate(0deg) translateY(-10deg) scale(1.05);
            z-index: 3;
        }

        .hero-book-showcase:hover .hero-book-1 {
            transform: rotate(-16deg) translateX(-100px) scale(0.95);
        }

        .hero-book-showcase:hover .hero-book-2 {
            transform: rotate(14deg) translateX(100px) scale(0.98);
        }

        .hero-book-showcase:hover .hero-book-3 {
            transform: rotate(0deg) translateY(-20deg) scale(1.1);
        }

        /* Floating Stat Badges */
        .stat-badge {
            position: absolute;
            background: var(--card-white);
            padding: 10px 18px;
            border-radius: 50px;
            box-shadow: 0 10px 25px rgba(54, 78, 35, 0.1);
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            font-size: 0.85rem;
            z-index: 10;
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .stat-badge-1 { top: 20px; left: 10px; animation-delay: 0s; }
        .stat-badge-2 { bottom: 30px; right: 10px; animation-delay: 2s; }

        /* Category Card Styling */
        .category-card {
            background: var(--card-white);
            border-radius: 20px;
            padding: 24px 20px;
            border: 1px solid var(--border-color);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            text-decoration: none;
            color: var(--text-dark);
            display: block;
            position: relative;
            overflow: hidden;
        }

        .category-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--card-shadow-hover);
            border-color: var(--primary-avocado);
            color: var(--primary-dark);
        }

        .category-icon {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 16px;
            background-color: var(--bg-light-green);
            color: var(--primary-dark);
            transition: all 0.3s ease;
        }

        .category-card:hover .category-icon {
            background-color: var(--primary-avocado);
            color: #ffffff;
        }

        /* Book Showcase Cards */
        .book-card {
            background: var(--card-white);
            border-radius: 20px;
            border: 1px solid var(--border-color);
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            height: 100%;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            position: relative;
        }

        .book-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--card-shadow-hover);
            border-color: rgba(120, 153, 80, 0.35);
        }

        .book-thumb-wrapper {
            position: relative;
            padding-top: 135%;
            overflow: hidden;
            background-color: var(--bg-light-green);
        }

        .book-thumb {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .book-card:hover .book-thumb {
            transform: scale(1.06);
        }

        .book-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            z-index: 2;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.725rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-avocado { background-color: var(--primary-avocado); color: white; }
        .badge-darkgreen { background-color: var(--primary-dark); color: white; }
        .badge-cream { background-color: var(--bg-light-green); color: var(--primary-dark); }

        .book-actions-overlay {
            position: absolute;
            bottom: 12px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            gap: 8px;
            opacity: 0;
            transform: translateY(15px);
            transition: all 0.3s ease;
            z-index: 3;
            padding: 0 12px;
        }

        .book-card:hover .book-actions-overlay {
            opacity: 1;
            transform: translateY(0);
        }

        .btn-quick-view {
            background: rgba(255, 255, 255, 0.95);
            color: var(--primary-dark);
            border: none;
            border-radius: 50px;
            padding: 8px 16px;
            font-size: 0.8rem;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(0,0,0,0.12);
            backdrop-filter: blur(4px);
        }

        .btn-quick-view:hover {
            background: var(--primary-dark);
            color: white;
        }

        /* Flash Sale Box */
        .flash-sale-box {
            background: linear-gradient(135deg, #28391a 0%, var(--primary-dark) 100%);
            border-radius: 28px;
            padding: 40px;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: var(--card-shadow);
        }

        .timer-unit {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 10px 14px;
            min-width: 60px;
            text-align: center;
            backdrop-filter: blur(8px);
        }

        .timer-val {
            font-size: 1.5rem;
            font-weight: 700;
            color: #d4f09a;
            line-height: 1;
        }

        .timer-lbl {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            opacity: 0.8;
            margin-top: 4px;
        }

        /* Nav Pills Custom Filter */
        .nav-pills-custom .nav-link {
            color: var(--text-muted);
            font-weight: 600;
            padding: 10px 22px;
            border-radius: 50px;
            transition: all 0.25s ease;
            background: var(--card-white);
            border: 1px solid var(--border-color);
            margin: 0 4px 8px;
        }

        .nav-pills-custom .nav-link.active {
            background: var(--primary-avocado);
            color: white;
            border-color: var(--primary-avocado);
            box-shadow: 0 4px 14px rgba(120, 153, 80, 0.3);
        }

        /* Feature Cards */
        .feature-card {
            background: var(--card-white);
            padding: 28px 24px;
            border-radius: 20px;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-shadow);
        }

        .feature-icon {
            width: 52px;
            height: 52px;
            background: var(--bg-light-green);
            color: var(--primary-dark);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            margin-bottom: 18px;
        }

        /* Offcanvas & Modal Restyling */
        .cart-item-img {
            width: 70px;
            height: 95px;
            object-fit: cover;
            border-radius: 10px;
        }

        /* Newsletter Section */
        .newsletter-box {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-avocado) 100%);
            border-radius: 28px;
        }

        /* Toast Container */
        .toast-container { z-index: 1090; }
        .custom-toast {
            border-radius: 16px;
            border: none;
            background-color: var(--primary-dark);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

    <!-- Sticky Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top glass-navbar py-3">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand brand-logo" href="#">
                <div class="brand-icon">
                    <i class="fa-solid fa-leaf"></i>
                </div>
                <span>Bookstore<span class="text-primary">.</span></span>
            </a>

            <!-- Mobile Toggler -->
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Collapse Content -->
            <div class="collapse navbar-collapse" id="navbarMenu">
                
                <!-- Quick Search Bar -->
                <div class="nav-search ms-lg-4 me-auto my-3 my-lg-0 w-100" style="max-width: 380px;">
                    <div class="input-group">
                        <input type="text" id="searchInput" class="form-control" placeholder="Tìm tên sách, tác giả..." onkeyup="handleSearch(event)">
                        <button class="btn text-muted px-2" type="button" onclick="executeSearch()">
                            <i class="fa-solid fa-magnifying-glass text-primary"></i>
                        </button>
                    </div>
                </div>

                <!-- Navigation Links -->
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-semibold fs-6">
                    <li class="nav-item"><a class="nav-link text-dark active" href="#hero">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#categories">Thể loại</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#flashsale">Flash Sale</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#books">Sách hay</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#testimonials">Đánh giá</a></li>
                </ul>

                <!-- Action Buttons: Cart & Auth -->
                <div class="d-flex align-items-center gap-3">
                    <!-- Cart Button -->
                    <button class="btn btn-light position-relative rounded-circle p-2 px-3 border" style="background-color: var(--bg-light-green); border-color: var(--border-color) !important;" type="button" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">
                        <i class="fa-solid fa-bag-shopping text-dark fs-5"></i>
                        <span id="cartBadge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            0
                        </span>
                    </button>

                    <!-- Auth Buttons -->
                    <a href="#" class="btn btn-outline-dark rounded-pill px-3 py-2 fw-medium fs-7 d-none d-sm-inline-block" style="border-color: var(--primary-avocado); color: var(--primary-dark);">
                        <i class="fa-regular fa-user me-1"></i> Đăng nhập
                    </a>
                    <a href="#" class="btn btn-primary rounded-pill px-3 py-2 fw-medium fs-7 shadow-sm">
                        Đăng ký
                    </a>
                </div>

            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="hero-section">
        <div class="container">
            <div class="row align-items-center gy-5">
                
                <!-- Left Column -->
                <div class="col-lg-6">
                    <div class="badge fw-bold rounded-pill px-3 py-2 mb-3 fs-7 border" style="background-color: var(--bg-light-green); color: var(--primary-dark); border-color: var(--border-color) !important;">
                        🥑 Tiệm sách không gian xanh • Ưu đãi 30% đơn đầu
                    </div>
                    
                    <h1 class="hero-title">
                        Khám phá tri thức <br>
                        trong <span class="text-gradient">từng trang sách</span>
                    </h1>
                    
                    <p class="lead text-secondary mt-3 mb-4 pe-lg-4 fs-6" style="line-height: 1.8;">
                        Nơi gửi gắm những tâm hồn yêu sách. Cung cấp hàng ngàn tựa sách chính hãng với không gian mua sắm tươi mát, nhẹ nhàng và thư thái.
                    </p>

                    <!-- Hero Search Box -->
                    <div class="bg-white p-2 rounded-4 shadow-sm d-flex align-items-center mb-4 border" style="max-width: 500px; border-color: var(--border-color) !important;">
                        <i class="fa-solid fa-magnifying-glass text-muted ms-3 me-2"></i>
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Tìm tác phẩm bạn yêu thích..." id="heroSearchInput">
                        <button class="btn btn-primary rounded-3 px-4 py-2 fw-semibold" onclick="searchFromHero()">
                            Tìm ngay
                        </button>
                    </div>

                    <!-- Trust Stats -->
                    <div class="d-flex align-items-center gap-4 pt-2">
                        <div>
                            <h4 class="fw-bold mb-0 text-dark font-serif">50,000+</h4>
                            <small class="text-muted">Đầu sách tuyển chọn</small>
                        </div>
                        <div class="vr opacity-25"></div>
                        <div>
                            <h4 class="fw-bold mb-0 text-dark font-serif">4.9 ★</h4>
                            <small class="text-muted">Hơn 12k đánh giá</small>
                        </div>
                        <div class="vr opacity-25"></div>
                        <div>
                            <h4 class="fw-bold mb-0 text-dark font-serif">100%</h4>
                            <small class="text-muted">Sách chính hãng</small>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Visual Mockup -->
                <div class="col-lg-6">
                    <div class="hero-book-showcase">
                        <!-- Floating Badge 1 -->
                        <div class="stat-badge stat-badge-1">
                            <span class="text-warning fs-5"><i class="fa-solid fa-star"></i></span>
                            <div>
                                <div class="lh-1">Sách Bán Chạy</div>
                                <small class="text-muted">Top 1 Tuần Nay</small>
                            </div>
                        </div>

                        <!-- Stacked Books -->
                        <div class="hero-book-card hero-book-1">
                            <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&w=600&q=80" alt="Book 1">
                        </div>
                        <div class="hero-book-card hero-book-2">
                            <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=600&q=80" alt="Book 2">
                        </div>
                        <div class="hero-book-card hero-book-3">
                            <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=600&q=80" alt="Book 3">
                        </div>

                        <!-- Floating Badge 2 -->
                        <div class="stat-badge stat-badge-2">
                            <span class="text-success fs-5"><i class="fa-solid fa-truck-fast"></i></span>
                            <div>
                                <div class="lh-1">Giao Nhanh 2h</div>
                                <small class="text-muted">Đóng gói eco xanh</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="py-5">
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <span class="text-primary fw-bold text-uppercase fs-7 tracking-wider">Danh mục tuyển chọn</span>
                    <h2 class="fw-bold text-dark mb-0 mt-1">Khám Phá Theo Thể Loại</h2>
                </div>
                <a href="#books" class="btn btn-link text-primary text-decoration-none fw-semibold">
                    Xem tất cả <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-3">
                <!-- Category Items -->
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#books" onclick="filterCategory('Văn học')" class="category-card">
                        <div class="category-icon"><i class="fa-solid fa-book-bookmark"></i></div>
                        <h5 class="fw-bold mb-1 fs-6 font-serif">Văn Học Trong Nước</h5>
                        <p class="small text-muted mb-0">1,240+ đầu sách</p>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#books" onclick="filterCategory('Kinh tế')" class="category-card">
                        <div class="category-icon"><i class="fa-solid fa-chart-line"></i></div>
                        <h5 class="fw-bold mb-1 fs-6 font-serif">Kinh Tế & Quản Trị</h5>
                        <p class="small text-muted mb-0">850+ đầu sách</p>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#books" onclick="filterCategory('Kỹ năng')" class="category-card">
                        <div class="category-icon"><i class="fa-solid fa-seedling"></i></div>
                        <h5 class="fw-bold mb-1 fs-6 font-serif">Kỹ Năng Sống</h5>
                        <p class="small text-muted mb-0">1,120+ đầu sách</p>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#books" onclick="filterCategory('Tâm lý')" class="category-card">
                        <div class="category-icon"><i class="fa-solid fa-brain"></i></div>
                        <h5 class="fw-bold mb-1 fs-6 font-serif">Tâm Lý Học</h5>
                        <p class="small text-muted mb-0">640+ đầu sách</p>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#books" onclick="filterCategory('Thiếu nhi')" class="category-card">
                        <div class="category-icon"><i class="fa-solid fa-child-reaching"></i></div>
                        <h5 class="fw-bold mb-1 fs-6 font-serif">Sách Thiếu Nhi</h5>
                        <p class="small text-muted mb-0">980+ đầu sách</p>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#books" onclick="filterCategory('Manga')" class="category-card">
                        <div class="category-icon"><i class="fa-solid fa-mask"></i></div>
                        <h5 class="fw-bold mb-1 fs-6 font-serif">Manga & Comic</h5>
                        <p class="small text-muted mb-0">1,450+ đầu sách</p>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#books" onclick="filterCategory('Giáo dục')" class="category-card">
                        <div class="category-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                        <h5 class="fw-bold mb-1 fs-6 font-serif">Giáo Dục & Ngoại Ngữ</h5>
                        <p class="small text-muted mb-0">520+ đầu sách</p>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#books" onclick="filterCategory('Công nghệ')" class="category-card">
                        <div class="category-icon"><i class="fa-solid fa-laptop-code"></i></div>
                        <h5 class="fw-bold mb-1 fs-6 font-serif">Công Nghệ & Lập Trình</h5>
                        <p class="small text-muted mb-0">310+ đầu sách</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Flash Sale Banner Section -->
    <section id="flashsale" class="py-4">
        <div class="container">
            <div class="flash-sale-box">
                <div class="row align-items-center gy-4">
                    
                    <!-- Left Timer Header -->
                    <div class="col-lg-4">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge text-dark px-3 py-1 rounded-pill uppercase fw-bold" style="background-color: #d4f09a;">
                                <i class="fa-solid fa-bolt me-1"></i> Flash Sale
                            </span>
                            <span class="text-white-50 fs-7">Ưu đãi giới hạn</span>
                        </div>
                        <h3 class="fw-bold text-white mb-2 font-serif">Giờ Vàng Giá Tốt!</h3>
                        <p class="text-white-50 mb-3 fs-7">Săn sách HAY với ưu đãi đặc biệt dành riêng cho độc giả hôm nay.</p>
                        
                        <!-- Countdown Timer -->
                        <div class="d-flex align-items-center gap-2">
                            <div class="timer-unit">
                                <div class="timer-val" id="hoursVal">04</div>
                                <div class="timer-lbl">Giờ</div>
                            </div>
                            <span class="fw-bold fs-4 text-white-50">:</span>
                            <div class="timer-unit">
                                <div class="timer-val" id="minsVal">28</div>
                                <div class="timer-lbl">Phút</div>
                            </div>
                            <span class="fw-bold fs-4 text-white-50">:</span>
                            <div class="timer-unit">
                                <div class="timer-val" id="secsVal">45</div>
                                <div class="timer-lbl">Giây</div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Items Grid -->
                    <div class="col-lg-8">
                        <div class="row g-3" id="flashSaleGrid">
                            <!-- Rendered dynamically -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Main Books Showcase Section -->
    <section id="books" class="py-5">
        <div class="container py-3">
            
            <div class="text-center max-w-xl mx-auto mb-4">
                <span class="text-primary fw-bold text-uppercase fs-7 tracking-wider">Bộ Sưu Tập Tuyển Chọn</span>
                <h2 class="fw-bold text-dark mt-1">Sách Mới & Bán Chạy</h2>
                <p class="text-muted fs-6">Những tác phẩm giàu cảm hứng được đông đảo cộng đồng yêu sách lựa chọn.</p>
            </div>

            <!-- Filter Tabs -->
            <div class="d-flex justify-content-center flex-wrap mb-4 nav-pills-custom">
                <button class="nav-link active" onclick="filterTab('all', this)">Tất cả</button>
                <button class="nav-link" onclick="filterTab('bestseller', this)">🔥 Bán chạy</button>
                <button class="nav-link" onclick="filterTab('new', this)">✨ Sách mới</button>
                <button class="nav-link" onclick="filterTab('sale', this)">🏷️ Giảm giá sâu</button>
            </div>

            <!-- Book Grid -->
            <div class="row g-4" id="booksGrid">
                <!-- Rendered dynamically -->
            </div>

        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-5 bg-white border-top border-bottom" style="border-color: var(--border-color) !important;">
        <div class="container py-2">
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="feature-card text-center text-sm-start">
                        <div class="feature-icon mx-auto mx-sm-0">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1 font-serif">Sách Chính Hãng 100%</h6>
                        <p class="small text-muted mb-0">Cam kết bản quyền từ các nhà xuất bản uy tín nhất.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="feature-card text-center text-sm-start">
                        <div class="feature-icon mx-auto mx-sm-0">
                            <i class="fa-solid fa-truck-fast"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1 font-serif">Giao Siêu Tốc 2 Giờ</h6>
                        <p class="small text-muted mb-0">Giao hàng nhanh chóng, bọc lót bảo vệ thân thiện môi trường.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="feature-card text-center text-sm-start">
                        <div class="feature-icon mx-auto mx-sm-0">
                            <i class="fa-solid fa-rotate-left"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1 font-serif">Đổi Trả 7 Ngày</h6>
                        <p class="small text-muted mb-0">Đổi mới miễn phí nếu sách có lỗi do sản xuất.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="feature-card text-center text-sm-start">
                        <div class="feature-icon mx-auto mx-sm-0">
                            <i class="fa-solid fa-leaf"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1 font-serif">Tích Điểm Thưởng</h6>
                        <p class="small text-muted mb-0">Tích lũy điểm đổi Bookmark & quà tặng độc quyền.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5">
        <div class="container py-3">
            <div class="text-center max-w-xl mx-auto mb-5">
                <span class="text-primary fw-bold text-uppercase fs-7 tracking-wider">Cảm Nhận Độc Giả</span>
                <h2 class="fw-bold text-dark mt-1">Góc Độc Giả Nói Về Chúng Tôi</h2>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="bg-white p-4 rounded-4 border h-100 d-flex flex-column justify-content-between shadow-sm" style="border-color: var(--border-color) !important;">
                        <div>
                            <div class="text-warning mb-2">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                            <p class="text-secondary fs-6 mb-4">"Chất lượng sách tuyệt vời, đóng gói kỹ. Giao diện trang web tone màu xanh bơ dịu mắt, cho cảm giác rất mát mẻ và sảng khoái."</p>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=120&q=80" class="rounded-circle" width="48" height="48" alt="Avatar">
                            <div>
                                <h6 class="fw-bold mb-0 text-dark font-serif">Nguyễn Hải Yến</h6>
                                <small class="text-muted">Độc giả thân thiết</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="bg-white p-4 rounded-4 border h-100 d-flex flex-column justify-content-between shadow-sm" style="border-color: var(--border-color) !important;">
                        <div>
                            <div class="text-warning mb-2">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                            <p class="text-secondary fs-6 mb-4">"Trang web dễ dùng, thao tác cực nhanh. Sách luôn nguyên màng co màng ép, giá mềm hơn nhiều so với nhà sách truyền thống."</p>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=120&q=80" class="rounded-circle" width="48" height="48" alt="Avatar">
                            <div>
                                <h6 class="fw-bold mb-0 text-dark font-serif">Trần Hoàng Minh</h6>
                                <small class="text-muted">Chuyên viên Marketing</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="bg-white p-4 rounded-4 border h-100 d-flex flex-column justify-content-between shadow-sm" style="border-color: var(--border-color) !important;">
                        <div>
                            <div class="text-warning mb-2">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                            <p class="text-secondary fs-6 mb-4">"Dịch vụ chăm sóc khách hàng cực kỳ nhiệt tình. Sách được bọc bằng bìa giấy kẹp lá khô rất tinh tế và mộc mạc."</p>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=120&q=80" class="rounded-circle" width="48" height="48" alt="Avatar">
                            <div>
                                <h6 class="fw-bold mb-0 text-dark font-serif">Lê Thu Thảo</h6>
                                <small class="text-muted">Giáo viên</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-5">
        <div class="container">
            <div class="newsletter-box text-white p-5 rounded-5 position-relative overflow-hidden shadow-lg">
                <div class="row align-items-center position-relative z-1">
                    <div class="col-lg-7">
                        <span class="badge fw-bold mb-2 px-3 py-2 rounded-pill" style="background-color: #d4f09a; color: var(--primary-dark);">🎁 Voucher 10% Cho Bạn</span>
                        <h2 class="fw-bold mb-2 font-serif">Đăng Ký Nhận Tin Tức & Ưu Đãi</h2>
                        <p class="text-white-50 mb-0">Nhận thông báo khi có các tựa sách mới phát hành và mã giảm giá độc quyền.</p>
                    </div>
                    <div class="col-lg-5 mt-4 mt-lg-0">
                        <form onsubmit="handleSubscribe(event)" class="d-flex gap-2 bg-white p-2 rounded-pill">
                            <input type="email" id="newsletterEmail" class="form-control border-0 shadow-none px-3" placeholder="Nhập email của bạn..." required>
                            <button type="submit" class="btn btn-primary rounded-pill px-4 text-nowrap">
                                Đăng ký
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="pt-5 pb-4" style="background-color: var(--primary-dark); color: #dce3d5;">
        <div class="container">
            <div class="row g-4 mb-5">
                
                <!-- Col 1: Brand Info -->
                <div class="col-lg-4 col-md-6">
                    <div class="brand-logo text-white mb-3">
                        <div class="brand-icon">
                            <i class="fa-solid fa-leaf"></i>
                        </div>
                        <span class="text-white">Bookstore<span style="color: #d4f09a;">.</span></span>
                    </div>
                    <p class="small mb-4 pe-lg-4" style="line-height: 1.8; color: #b7c7aa;">
                        Bookstore là tiệm sách trực tuyến phong cách xanh mộc mạc, đồng hành cùng bạn trên hành trình nuôi dưỡng tri thức và sự an yên trong tâm hồn.
                    </p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-outline-light rounded-circle btn-sm p-2" style="width:36px; height:36px;"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-outline-light rounded-circle btn-sm p-2" style="width:36px; height:36px;"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="btn btn-outline-light rounded-circle btn-sm p-2" style="width:36px; height:36px;"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>

                <!-- Col 2: Links -->
                <div class="col-lg-2 col-md-6">
                    <h6 class="fw-bold mb-3 text-white font-serif">Khám Phá</h6>
                    <ul class="list-unstyled small" style="color: #b7c7aa;">
                        <li class="mb-2"><a href="#books" class="text-decoration-none text-reset">Sách Bán Chạy</a></li>
                        <li class="mb-2"><a href="#categories" class="text-decoration-none text-reset">Thể Loại Sách</a></li>
                        <li class="mb-2"><a href="#flashsale" class="text-decoration-none text-reset">Khuyến Mãi Flash Sale</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-reset">Sách Mới Phát Hành</a></li>
                    </ul>
                </div>

                <!-- Col 3: Support -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="fw-bold mb-3 text-white font-serif">Hỗ Trợ Khách Hàng</h6>
                    <ul class="list-unstyled small" style="color: #b7c7aa;">
                        <li class="mb-2"><a href="#" class="text-decoration-none text-reset">Hướng dẫn mua hàng</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-reset">Chính sách giao hàng</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-reset">Chính sách đổi trả</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-reset">Bảo mật thông tin</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="fw-bold mb-3 text-white font-serif">Liên Hệ</h6>
                    <p class="small mb-1" style="color: #b7c7aa;"><i class="fa-solid fa-location-dot me-2" style="color: #d4f09a;"></i> 123 Đường Sách, Q.1, TP. Hồ Chí Minh</p>
                    <p class="small mb-1" style="color: #b7c7aa;"><i class="fa-solid fa-envelope me-2" style="color: #d4f09a;"></i> tiemsach@bookstore.vn</p>
                    <p class="small mb-3" style="color: #b7c7aa;"><i class="fa-solid fa-phone me-2" style="color: #d4f09a;"></i> 1900 6868 (8:00 - 21:00)</p>
                </div>

            </div>

            <hr class="opacity-25" style="border-color: #b7c7aa;">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small pt-2" style="color: #9ab08c;">
                <p class="mb-2 mb-md-0">© 2026 Bookstore Inc. Tất cả quyền được bảo lưu.</p>
                <div class="d-flex gap-3">
                    <a href="#" class="text-reset text-decoration-none">Điều khoản</a>
                    <a href="#" class="text-reset text-decoration-none">Bảo mật</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Offcanvas Cart Drawer -->
    <div class="offcanvas offcanvas-end border-0 shadow-lg" tabindex="-1" id="cartOffcanvas" style="width: 400px; background-color: var(--bg-avocado-cream);">
        <div class="offcanvas-header border-bottom py-3" style="border-color: var(--border-color) !important;">
            <h5 class="offcanvas-title fw-bold text-dark d-flex align-items-center gap-2 font-serif">
                <i class="fa-solid fa-bag-shopping text-primary"></i> Giỏ Hàng Của Bạn
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body d-flex flex-column justify-content-between p-3">
            <div id="cartItemsList" class="overflow-y-auto pe-1">
                <!-- Dynamically Rendered -->
            </div>

            <div class="border-top pt-3 mt-3" style="border-color: var(--border-color) !important;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-muted fs-7">Tạm tính:</span>
                    <span id="cartSubtotal" class="fw-semibold text-dark">0đ</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="fw-bold text-dark font-serif">Tổng tiền:</span>
                    <span id="cartTotal" class="fw-bold fs-5 text-primary">0đ</span>
                </div>
                <button class="btn btn-primary w-100 rounded-pill py-2.5 fw-bold shadow-sm" onclick="checkout()">
                    Tiến Hành Thanh Toán
                </button>
            </div>
        </div>
    </div>

    <!-- Quick View Modal -->
    <div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden" style="background-color: var(--bg-avocado-cream);">
                <div class="modal-body p-0">
                    <div class="row g-0">
                        <div class="col-md-5 p-4 d-flex align-items-center justify-content-center" style="background-color: var(--bg-light-green);">
                            <img id="modalBookImage" src="" class="img-fluid rounded-3 shadow" style="max-height: 320px; object-fit: cover;" alt="Book Detail">
                        </div>
                        <div class="col-md-7 p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span id="modalBookCategory" class="badge rounded-pill px-3 py-1" style="background-color: var(--bg-light-green); color: var(--primary-dark);">Thể loại</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <h4 id="modalBookTitle" class="fw-bold text-dark mb-1 font-serif">Tên Sách</h4>
                                <p id="modalBookAuthor" class="text-muted small mb-3">Tác giả: N/A</p>
                                
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <span class="text-warning fw-bold fs-6"><i class="fa-solid fa-star"></i> <span id="modalBookRating">4.9</span></span>
                                    <span class="text-muted small">• Đã bán <span id="modalBookSales">1.2k</span></span>
                                </div>

                                <div class="d-flex align-items-baseline gap-2 mb-3">
                                    <h3 id="modalBookPrice" class="fw-bold text-primary mb-0 font-serif">0đ</h3>
                                    <span id="modalBookOldPrice" class="text-decoration-line-through text-muted small">0đ</span>
                                </div>

                                <p id="modalBookDesc" class="text-secondary fs-7 mb-4">Mô tả tóm tắt sách...</p>
                            </div>

                            <div class="d-flex align-items-center gap-3">
                                <div class="input-group" style="width: 120px;">
                                    <button class="btn btn-outline-secondary btn-sm" type="button" onclick="adjustModalQty(-1)">-</button>
                                    <input type="text" id="modalQtyInput" class="form-control text-center form-control-sm bg-white" value="1" readonly>
                                    <button class="btn btn-outline-secondary btn-sm" type="button" onclick="adjustModalQty(1)">+</button>
                                </div>
                                <button id="modalAddToCartBtn" class="btn btn-primary rounded-pill px-4 py-2 flex-grow-1 fw-bold shadow-sm">
                                    <i class="fa-solid fa-cart-plus me-1"></i> Thêm vào giỏ
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast custom-toast text-white p-2" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex align-items-center">
                <div class="toast-body d-flex align-items-center gap-2 fs-7">
                    <i class="fa-solid fa-circle-check text-warning fs-5"></i>
                    <span id="toastMessage">Đã thêm sản phẩm vào giỏ hàng!</span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script tương tác logic -->
    <script>
        const BOOKS_DATA = [
            {
                id: 1,
                title: "Đắc Nhân Tâm (How to Win Friends)",
                author: "Dale Carnegie",
                category: "Kỹ năng",
                price: 96000,
                oldPrice: 120000,
                rating: 4.9,
                sales: "12.4k",
                image: "https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&w=600&q=80",
                tag: "bestseller",
                tagLabel: "Bán chạy",
                badgeBg: "badge-avocado",
                desc: "Đắc Nhân Tâm đưa ra những lời khuyên về cách ứng xử, giao tiếp và cư xử với mọi người để đạt được thành công trong cuộc sống."
            },
            {
                id: 2,
                title: "Thói Quen Nguyên Tử (Atomic Habits)",
                author: "James Clear",
                category: "Kỹ năng",
                price: 151000,
                oldPrice: 189000,
                rating: 5.0,
                sales: "9.8k",
                image: "https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=600&q=80",
                tag: "bestseller",
                tagLabel: "Top 1",
                badgeBg: "badge-darkgreen",
                desc: "Hệ thống đơn giản giúp bạn thay đổi 1% mỗi ngày để đạt được kết quả phi thường trong dài hạn."
            },
            {
                id: 3,
                title: "Nhà Giả Kim (The Alchemist)",
                author: "Paulo Coelho",
                category: "Văn học",
                price: 63000,
                oldPrice: 79000,
                rating: 4.8,
                sales: "15.1k",
                image: "https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=600&q=80",
                tag: "bestseller",
                tagLabel: "-20%",
                badgeBg: "badge-avocado",
                desc: "Hành trình theo đuổi vận mệnh của chàng chăn cừu Santiago gửi gắm thông điệp sâu sắc về ước mơ và lẽ sống."
            },
            {
                id: 4,
                title: "Tâm Lý Học Về Tiền (Psychology of Money)",
                author: "Morgan Housel",
                category: "Tâm lý",
                price: 132000,
                oldPrice: 165000,
                rating: 4.9,
                sales: "6.3k",
                image: "https://images.unsplash.com/photo-1592496431122-2349e0fbc666?auto=format&fit=crop&w=600&q=80",
                tag: "new",
                tagLabel: "Sách mới",
                badgeBg: "badge-cream",
                desc: "Khám phá cách tư duy, cảm xúc và thói quen ảnh hưởng đến quyết định tài chính của con người."
            },
            {
                id: 5,
                title: "Sapiens: Lược Sử Loài Người",
                author: "Yuval Noah Harari",
                category: "Giáo dục",
                price: 184000,
                oldPrice: 230000,
                rating: 4.9,
                sales: "8.2k",
                image: "https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=600&q=80",
                tag: "sale",
                tagLabel: "-20%",
                badgeBg: "badge-avocado",
                desc: "Cái nhìn tổng quan sâu sắc về lịch sử tiến hóa và phát triển của loài người từ thời kỳ đồ đá đến hiện đại."
            },
            {
                id: 6,
                title: "Cây Cam Ngọt Của Tôi",
                author: "José Mauro de Vasconcelos",
                category: "Văn học",
                price: 86000,
                oldPrice: 108000,
                rating: 4.9,
                sales: "11.5k",
                image: "https://images.unsplash.com/photo-1543002588-bfa74002ed7e?auto=format&fit=crop&w=600&q=80",
                tag: "bestseller",
                tagLabel: "Yêu thích",
                badgeBg: "badge-darkgreen",
                desc: "Câu chuyện cảm động về cậu bé Zezé và những bài học chan chứa yêu thương, nỗi buồn và sự trưởng thành."
            },
            {
                id: 7,
                title: "Khéo Ăn Khéo Nói Sẽ Có Được Thiên Hạ",
                author: "Trác Nhã",
                category: "Kỹ năng",
                price: 88000,
                oldPrice: 110000,
                rating: 4.7,
                sales: "7.4k",
                image: "https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&w=600&q=80",
                tag: "sale",
                tagLabel: "-20%",
                badgeBg: "badge-avocado",
                desc: "Bí quyết nâng cao kỹ năng giao tiếp, thuyết phục và làm chủ các cuộc trò chuyện trong công việc & cuộc sống."
            },
            {
                id: 8,
                title: "Tuổi Trẻ Đáng Giá Bao Nhiêu?",
                author: "Rosie Nguyễn",
                category: "Kỹ năng",
                price: 72000,
                oldPrice: 90000,
                rating: 4.8,
                sales: "18.3k",
                image: "https://images.unsplash.com/photo-1495640388908-05fa85288e61?auto=format&fit=crop&w=600&q=80",
                tag: "bestseller",
                tagLabel: "Hot",
                badgeBg: "badge-avocado",
                desc: "Cuốn sách truyền cảm hứng sống, học tập và trải nghiệm dành cho các bạn trẻ đang tìm kiếm lối đi cho bản thân."
            }
        ];

        const FLASH_SALE_ITEMS = [
            {
                id: 101,
                title: "Dune - Hành Tinh Cát (Tập 1)",
                price: 125000,
                oldPrice: 210000,
                image: "https://images.unsplash.com/photo-1541963463532-d68292c34b19?auto=format&fit=crop&w=500&q=80",
                soldPercent: 84
            },
            {
                id: 102,
                title: "Tư Duy Nhanh Và Chậm",
                price: 139000,
                oldPrice: 220000,
                image: "https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=500&q=80",
                soldPercent: 92
            }
        ];

        let cart = [];
        let currentModalBook = null;

        document.addEventListener("DOMContentLoaded", () => {
            renderBooks(BOOKS_DATA);
            renderFlashSale();
            initCountdownTimer();
        });

        function formatVND(amount) {
            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(amount).replace('✕', '').trim();
        }

        function renderBooks(books) {
            const container = document.getElementById("booksGrid");
            if (!container) return;

            if (books.length === 0) {
                container.innerHTML = `
                    <div class="col-12 text-center py-5">
                        <i class="fa-solid fa-book-open text-muted fs-1 mb-3"></i>
                        <h5>Không tìm thấy cuốn sách nào phù hợp</h5>
                        <p class="text-muted small">Bạn hãy thử tìm kiếm với từ khóa khác nhé!</p>
                    </div>
                `;
                return;
            }

            container.innerHTML = books.map(book => `
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="book-card">
                        <div class="book-thumb-wrapper">
                            <span class="book-badge ${book.badgeBg}">${book.tagLabel}</span>
                            <img src="${book.image}" class="book-thumb" alt="${book.title}">
                            <div class="book-actions-overlay">
                                <button class="btn btn-quick-view" onclick="openQuickView(${book.id})">
                                    <i class="fa-regular fa-eye me-1"></i> Xem nhanh
                                </button>
                            </div>
                        </div>

                        <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                            <div>
                                <small class="text-primary fw-semibold">${book.category}</small>
                                <h6 class="fw-bold text-dark text-truncate mt-1 mb-1 font-serif" title="${book.title}">${book.title}</h6>
                                <p class="small text-muted mb-2">${book.author}</p>
                            </div>

                            <div>
                                <div class="d-flex align-items-center gap-1 mb-2">
                                    <span class="text-warning small"><i class="fa-solid fa-star"></i> ${book.rating}</span>
                                    <span class="text-muted fs-7">(${book.sales})</span>
                                </div>

                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="fw-bold text-primary fs-6 font-serif">${formatVND(book.price)}</span>
                                        <small class="text-decoration-line-through text-muted ms-1 fs-7">${formatVND(book.oldPrice)}</small>
                                    </div>
                                    <button class="btn btn-light text-primary rounded-circle p-2 border" style="width:36px; height:36px; background-color: var(--bg-light-green); border-color: var(--border-color) !important;" onclick="addToCart(${book.id})">
                                        <i class="fa-solid fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function renderFlashSale() {
            const container = document.getElementById("flashSaleGrid");
            if (!container) return;

            container.innerHTML = FLASH_SALE_ITEMS.map(item => `
                <div class="col-md-6">
                    <div class="bg-white text-dark p-3 rounded-4 d-flex gap-3 align-items-center shadow-sm">
                        <img src="${item.image}" class="rounded-3" style="width: 80px; height: 110px; object-fit: cover;" alt="${item.title}">
                        <div class="flex-grow-1">
                            <span class="badge text-white fs-7 mb-1" style="background-color: var(--accent-green);">-40% 🔥</span>
                            <h6 class="fw-bold text-truncate mb-1 font-serif" style="max-width: 180px;">${item.title}</h6>
                            <div class="mb-2">
                                <span class="fw-bold text-primary font-serif">${formatVND(item.price)}</span>
                                <small class="text-decoration-line-through text-muted ms-1 fs-7">${formatVND(item.oldPrice)}</small>
                            </div>
                            <div class="progress" style="height: 6px; background-color: var(--bg-light-green);">
                                <div class="progress-bar" style="width: ${item.soldPercent}%; background-color: var(--primary-avocado);"></div>
                            </div>
                            <small class="text-muted fs-7 mt-1 d-block">Đã bán ${item.soldPercent}%</small>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function initCountdownTimer() {
            let totalSeconds = 4 * 3600 + 28 * 60 + 45;

            setInterval(() => {
                if (totalSeconds <= 0) return;
                totalSeconds--;

                const hours = Math.floor(totalSeconds / 3600);
                const mins = Math.floor((totalSeconds % 3600) / 60);
                const secs = totalSeconds % 60;

                document.getElementById('hoursVal').innerText = String(hours).padStart(2, '0');
                document.getElementById('minsVal').innerText = String(mins).padStart(2, '0');
                document.getElementById('secsVal').innerText = String(secs).padStart(2, '0');
            }, 1000);
        }

        function filterTab(type, element) {
            document.querySelectorAll('.nav-pills-custom .nav-link').forEach(btn => btn.classList.remove('active'));
            if (element) element.classList.add('active');

            if (type === 'all') {
                renderBooks(BOOKS_DATA);
            } else {
                const filtered = BOOKS_DATA.filter(b => b.tag === type);
                renderBooks(filtered);
            }
        }

        function filterCategory(catName) {
            const filtered = BOOKS_DATA.filter(b => b.category.toLowerCase().includes(catName.toLowerCase()));
            renderBooks(filtered);
        }

        function handleSearch(event) {
            const query = event.target.value.toLowerCase().trim();
            const filtered = BOOKS_DATA.filter(b => 
                b.title.toLowerCase().includes(query) || 
                b.author.toLowerCase().includes(query) ||
                b.category.toLowerCase().includes(query)
            );
            renderBooks(filtered);
        }

        function executeSearch() {
            const query = document.getElementById("searchInput").value.toLowerCase().trim();
            const filtered = BOOKS_DATA.filter(b => 
                b.title.toLowerCase().includes(query) || 
                b.author.toLowerCase().includes(query)
            );
            renderBooks(filtered);
        }

        function searchFromHero() {
            const query = document.getElementById("heroSearchInput").value;
            document.getElementById("searchInput").value = query;
            executeSearch();
            document.getElementById("books").scrollIntoView({ behavior: 'smooth' });
        }

        function addToCart(bookId, qty = 1) {
            const book = BOOKS_DATA.find(b => b.id === bookId);
            if (!book) return;

            const existingItem = cart.find(item => item.id === bookId);
            if (existingItem) {
                existingItem.qty += qty;
            } else {
                cart.push({ ...book, qty: qty });
            }

            updateCartUI();
            showToast(`Đã thêm "${book.title}" vào giỏ hàng!`);
        }

        function updateCartQty(bookId, delta) {
            const item = cart.find(i => i.id === bookId);
            if (!item) return;

            item.qty += delta;
            if (item.qty <= 0) {
                cart = cart.filter(i => i.id !== bookId);
            }
            updateCartUI();
        }

        function removeFromCart(bookId) {
            cart = cart.filter(i => i.id !== bookId);
            updateCartUI();
        }

        function updateCartUI() {
            const totalQty = cart.reduce((sum, item) => sum + item.qty, 0);
            const subtotal = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);

            document.getElementById("cartBadge").innerText = totalQty;

            const listContainer = document.getElementById("cartItemsList");
            if (cart.length === 0) {
                listContainer.innerHTML = `
                    <div class="text-center py-5">
                        <i class="fa-solid fa-basket-shopping text-muted fs-1 mb-3"></i>
                        <h6>Giỏ hàng đang trống</h6>
                        <small class="text-muted">Hãy chọn thêm vài cuốn sách yêu thích nhé!</small>
                    </div>
                `;
            } else {
                listContainer.innerHTML = cart.map(item => `
                    <div class="d-flex gap-3 mb-3 pb-3 border-bottom align-items-center" style="border-color: var(--border-color) !important;">
                        <img src="${item.image}" class="cart-item-img" alt="${item.title}">
                        <div class="flex-grow-1">
                            <h6 class="fw-bold text-dark fs-7 mb-1 text-truncate font-serif" style="max-width: 170px;">${item.title}</h6>
                            <span class="fw-bold text-primary fs-7 font-serif">${formatVND(item.price)}</span>
                            
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <div class="input-group input-group-sm" style="width: 90px;">
                                    <button class="btn btn-outline-secondary" onclick="updateCartQty(${item.id}, -1)">-</button>
                                    <span class="form-control text-center px-1 bg-white">${item.qty}</span>
                                    <button class="btn btn-outline-secondary" onclick="updateCartQty(${item.id}, 1)">+</button>
                                </div>
                                <button class="btn btn-link text-danger p-0" onclick="removeFromCart(${item.id})">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `).join('');
            }

            document.getElementById("cartSubtotal").innerText = formatVND(subtotal);
            document.getElementById("cartTotal").innerText = formatVND(subtotal);
        }

        function openQuickView(bookId) {
            const book = BOOKS_DATA.find(b => b.id === bookId);
            if (!book) return;

            currentModalBook = book;
            document.getElementById("modalBookImage").src = book.image;
            document.getElementById("modalBookCategory").innerText = book.category;
            document.getElementById("modalBookTitle").innerText = book.title;
            document.getElementById("modalBookAuthor").innerText = "Tác giả: " + book.author;
            document.getElementById("modalBookRating").innerText = book.rating;
            document.getElementById("modalBookSales").innerText = book.sales;
            document.getElementById("modalBookPrice").innerText = formatVND(book.price);
            document.getElementById("modalBookOldPrice").innerText = formatVND(book.oldPrice);
            document.getElementById("modalBookDesc").innerText = book.desc;
            document.getElementById("modalQtyInput").value = 1;

            document.getElementById("modalAddToCartBtn").onclick = () => {
                const qty = parseInt(document.getElementById("modalQtyInput").value) || 1;
                addToCart(book.id, qty);
                const modalEl = document.getElementById('quickViewModal');
                const modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
            };

            const modal = new bootstrap.Modal(document.getElementById('quickViewModal'));
            modal.show();
        }

        function adjustModalQty(delta) {
            const input = document.getElementById("modalQtyInput");
            let val = parseInt(input.value) || 1;
            val += delta;
            if (val < 1) val = 1;
            input.value = val;
        }

        function checkout() {
            if (cart.length === 0) {
                showToast("Giỏ hàng của bạn đang trống!");
                return;
            }
            showToast("Đang chuyển hướng đến trang thanh toán...");
        }

        function handleSubscribe(e) {
            e.preventDefault();
            const email = document.getElementById("newsletterEmail").value;
            showToast(`Cảm ơn! Mã giảm giá 10% đã gửi tới: ${email}`);
            document.getElementById("newsletterEmail").value = "";
        }

        function showToast(message) {
            document.getElementById("toastMessage").innerText = message;
            const toastEl = document.getElementById('liveToast');
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    </script>
</body>
</html>