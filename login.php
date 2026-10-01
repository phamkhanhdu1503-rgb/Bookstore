<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Bookstore — Tiệm Sách Xanh Bơ Kem</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Playfair Display & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .font-serif-title {
            font-family: 'Playfair Display', Georgia, serif;
        }
        .font-sans-ui {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }

        /* Khung nhìn 3D */
        .stage-3d {
            perspective: 1200px;
            perspective-origin: 50% 50%;
        }

        /* Khối quyển sách 3D */
        .book-3d {
            transform-style: preserve-3d;
            transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .book-closed {
            transform: rotateX(12deg) rotateY(-15deg) scale(0.95);
            opacity: 0;
        }

        .book-open {
            transform: rotateX(0deg) rotateY(0deg) scale(1);
            opacity: 1;
        }

        /* Bìa sách: Xanh Lá Đậm & Xanh Bơ */
        .avocado-leaf-cover {
            background: linear-gradient(135deg, #2E5325 0%, #4E7C3A 50%, #68994B 100%);
            box-shadow: inset 0 0 35px rgba(20, 40, 15, 0.35);
        }

        /* Giấy sách: Xanh Bơ Kem & Trắng */
        .cream-avocado-page {
            background-color: #F8FAF4;
            background-image: 
                radial-gradient(#E2EBD8 0.8px, transparent 0.8px),
                linear-gradient(to right, rgba(46, 83, 37, 0.03) 0%, transparent 6%, transparent 94%, rgba(46, 83, 37, 0.02) 100%);
            background-size: 12px 12px, 100% 100%;
        }

        /* Bóng chồng trang */
        .stacked-pages-right {
            box-shadow: 
                2px 0 0 #FFFFFF,
                3px 0 0 #EEF4E8,
                5px 0 0 #E1EBD5,
                8px 8px 20px rgba(46, 83, 37, 0.12);
        }

        /* Bóng gáy sách */
        .spine-shadow-right {
            background: linear-gradient(to left, rgba(0,0,0,0) 0%, rgba(46,83,37,0.03) 70%, rgba(20,40,15,0.18) 100%);
        }
        .spine-shadow-left {
            background: linear-gradient(to right, rgba(0,0,0,0) 0%, rgba(46,83,37,0.03) 70%, rgba(20,40,15,0.18) 100%);
        }

        /* TRANG LẬT ĐỘNG 3D - ĐÃ CẤU HÌNH TỐI ƯU MOBILE & DESKTOP */
        .flipping-leaf {
            transform-origin: center center; /* Mặc định Mobile: Lật tại chỗ không văng màn hình */
            transform-style: preserve-3d;
            transition: transform 0.8s cubic-bezier(0.645, 0.045, 0.355, 1.000);
        }

        /* Màn hình máy tính (md: >= 768px): Lật quanh gáy sách bên trái */
        @media (min-width: 768px) {
            .flipping-leaf {
                transform-origin: left center;
            }
        }

        .flipping-leaf.flipped {
            transform: rotateY(-180deg);
        }

        .leaf-face {
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
        }

        .leaf-back {
            transform: rotateY(180deg);
        }

        /* Ô nhập liệu Trắng viền Xanh Bơ Kem */
        .input-avocado-cream {
            background: #FFFFFF;
            border: 1.5px solid #D8E5CC;
            color: #1E293B;
            transition: all 0.2s ease;
        }

        .input-avocado-cream:focus {
            background: #FFFFFF;
            border-color: #4E7C3A;
            box-shadow: 0 0 0 3px rgba(78, 124, 58, 0.2);
            outline: none;
        }

        /* Nút bấm Xanh Lá */
        .btn-leaf-green {
            background: linear-gradient(135deg, #4E7C3A 0%, #2E5325 100%);
            box-shadow: 0 4px 12px rgba(78, 124, 58, 0.3);
            transition: all 0.2s ease;
        }

        .btn-leaf-green:hover {
            background: linear-gradient(135deg, #5D9146 0%, #39632E 100%);
            transform: translateY(-1px);
        }

        .btn-leaf-green:active {
            transform: translateY(1px);
        }

        /* Dải Ribbon */
        .ribbon-avocado {
            background: linear-gradient(180deg, #82B366 0%, #39632E 100%);
            box-shadow: 2px 3px 6px rgba(30, 50, 20, 0.3);
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #F0F5EB;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #A3C989;
            border-radius: 4px;
        }

        .checkbox-avocado:checked {
            background-color: #4E7C3A;
            border-color: #4E7C3A;
        }

        #ambient-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }
    </style>
</head>
<body class="bg-slate-900 text-slate-800 min-h-screen font-sans-ui flex flex-col justify-between overflow-x-hidden select-none relative">

    <!-- Canvas hạt không khí -->
    <canvas id="ambient-canvas"></canvas>

    <!-- Phông nền Gradient Xanh Bơ Kem & Trắng -->
    <div class="fixed inset-0 bg-gradient-to-br from-white via-[#EDF4E8] to-[#E2EBD8] pointer-events-none z-0"></div>
    <div class="fixed top-[-10%] left-1/2 -translate-x-1/2 w-[600px] sm:w-[800px] h-[300px] sm:h-[400px] bg-[#C3DCB1]/40 blur-[100px] sm:blur-[130px] pointer-events-none z-0"></div>

    <!-- Header Header -->
    <header class="relative z-20 px-4 sm:px-6 py-3.5 sm:py-4 flex justify-between items-center max-w-7xl mx-auto w-full">
        <div class="flex items-center space-x-2.5">
            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-[#4E7C3A] text-white flex items-center justify-center shadow-md">
                <i class="fa-solid fa-book-open text-sm sm:text-base"></i>
            </div>
            <div>
                <span class="font-serif-title tracking-wide text-xl sm:text-2xl text-[#1E3317] font-bold block leading-none">BOOKSTORE</span>
                <span class="text-[10px] sm:text-[11px] text-[#4E7C3A] font-bold tracking-wider uppercase">Xanh Bơ & Kem</span>
            </div>
        </div>

        <div class="flex items-center space-x-2 sm:space-x-3 text-xs">
            <button id="sound-toggle-btn" onclick="toggleSound()" class="flex items-center space-x-1.5 sm:space-x-2 bg-white/90 backdrop-blur border border-[#CDE0BE] hover:border-[#4E7C3A] px-3 py-1.5 sm:px-3.5 sm:py-2 rounded-full text-slate-700 shadow-sm transition-all">
                <i id="sound-icon" class="fa-solid fa-volume-high text-[#4E7C3A]"></i>
                <span id="sound-label" class="hidden sm:inline font-medium">Âm thanh: Bật</span>
            </button>

            <button onclick="reopenBookAnimation()" class="flex items-center space-x-1.5 sm:space-x-2 bg-white/90 backdrop-blur border border-[#CDE0BE] hover:border-[#4E7C3A] px-3 py-1.5 sm:px-3.5 sm:py-2 rounded-full text-slate-700 shadow-sm transition-all" title="Mở lại sách">
                <i class="fa-solid fa-rotate-left text-[#4E7C3A]"></i>
                <span class="hidden sm:inline font-medium">Mở lại</span>
            </button>
        </div>
    </header>

    <!-- QUYỂN SÁCH 3D -->
    <main class="relative z-10 flex-1 flex items-center justify-center p-2.5 sm:p-6 my-auto">
        <div class="stage-3d w-full max-w-4xl flex justify-center items-center py-1">
            
            <div id="book" class="book-3d book-closed relative w-full h-[530px] sm:h-[580px] flex rounded-xl">
                
                <div class="absolute -bottom-4 left-4 right-4 h-8 bg-[#1E3317]/15 blur-lg rounded-full pointer-events-none"></div>

                <!-- CÁNH TRÁI: BÌA SÁCH (Chỉ hiện trên Máy tính) -->
                <div class="hidden md:flex w-1/2 h-full avocado-leaf-cover rounded-l-xl border border-white/20 relative overflow-hidden flex-col justify-between p-8 stacked-pages-left text-white">
                    <div class="absolute inset-4 border border-white/30 rounded-lg pointer-events-none"></div>

                    <div class="relative z-10 text-center mt-2">
                        <div class="inline-flex w-12 h-12 rounded-2xl bg-white/15 backdrop-blur border border-white/40 items-center justify-center mb-2 shadow-inner">
                            <i class="fa-solid fa-book-bookmark text-xl text-emerald-100"></i>
                        </div>
                        <h1 class="font-serif-title text-3xl font-bold tracking-wider text-white uppercase drop-shadow-sm">
                            BOOKSTORE
                        </h1>
                        <div class="w-12 h-0.5 bg-gradient-to-r from-transparent via-white/80 to-transparent mx-auto my-2"></div>
                        <p class="font-serif-title italic text-emerald-100 text-base">
                            "Mỗi trang sách là một mầm sống mới."
                        </p>
                    </div>

                    <div class="relative z-10 my-auto text-center">
                        <div class="w-24 h-24 mx-auto border border-white/30 rounded-full flex items-center justify-center p-2 bg-white/10 backdrop-blur-sm">
                            <div class="w-full h-full border border-dashed border-white/40 rounded-full flex flex-col items-center justify-center p-2 text-emerald-100">
                                <i class="fa-solid fa-seedling text-xl mb-1 text-lime-200"></i>
                                <span class="font-sans-ui text-[9px] tracking-widest uppercase font-semibold">Tủ Sách Tươi Mới</span>
                            </div>
                        </div>
                    </div>

                    <div class="relative z-10 text-center text-[11px] text-emerald-100/90 font-sans-ui tracking-wide border-t border-white/20 pt-2">
                        Tone Màu Xanh Bơ & Kem Ấm Cúng
                    </div>

                    <div class="absolute top-0 right-0 w-10 h-full spine-shadow-left pointer-events-none"></div>
                </div>

                <!-- GÁY SÁCH & RIBBON (Hiển thị trên Desktop) -->
                <div class="hidden md:block absolute top-0 bottom-0 left-1/2 -translate-x-1/2 w-6 z-30 pointer-events-none">
                    <div class="w-full h-full bg-gradient-to-r from-[#1A3314]/30 via-black/20 to-[#1A3314]/30 shadow-inner"></div>
                    <div class="ribbon-avocado absolute top-0 left-1/2 -translate-x-1/2 w-3 h-[110%] rounded-b-sm z-40"></div>
                </div>

                <!-- ĐÁY PHẢI: TRANG TRÍ DỰ PHÒNG KHI LẬT TẠI MÁY TÍNH -->
                <div class="hidden md:flex w-1/2 h-full cream-avocado-page rounded-r-xl relative overflow-hidden flex-col justify-between p-8 stacked-pages-right text-slate-800">
                    <div class="absolute top-0 left-0 w-8 h-full spine-shadow-right pointer-events-none z-10"></div>

                    <div class="relative z-10 text-center border-b border-[#D8E5CC] pb-3">
                        <span class="text-[10px] font-bold text-[#4E7C3A] uppercase tracking-widest">Không Gian Đọc Trực Tuyến</span>
                        <h3 class="font-serif-title text-2xl font-bold text-[#1E3317] mt-1">Trang Sách Yêu Thích</h3>
                    </div>

                    <div class="my-auto text-center p-5 border border-[#D8E5CC] rounded-xl bg-white/80 backdrop-blur-sm shadow-sm">
                        <i class="fa-solid fa-quote-left text-xl text-[#4E7C3A]/30 mb-2"></i>
                        <p class="font-serif-title italic text-slate-700 text-base leading-relaxed">
                            "Sách nuôi dưỡng tâm hồn như mầm xanh vươn mình đón ánh nắng mặt trời."
                        </p>
                        <span class="block mt-2 font-sans-ui text-xs text-[#4E7C3A] font-semibold uppercase tracking-wider">— Tủ Sách Xanh Bơ</span>
                    </div>

                    <div class="relative z-10 text-center border-t border-[#D8E5CC] pt-3">
                        <p class="text-xs text-slate-500">Bookstore Online &copy; 2026</p>
                    </div>
                </div>

                <!-- TRANG LẬT CHÍNH (Hoạt động hoàn hảo cả Mobile & Desktop) -->
                <div id="flipper-leaf" class="absolute top-0 right-0 w-full md:w-1/2 h-full z-20 flipping-leaf">
                    
                    <!-- MẶT TRƯỚC: FORM ĐĂNG NHẬP -->
                    <div class="leaf-face absolute inset-0 cream-avocado-page rounded-xl md:rounded-l-none md:rounded-r-xl p-5 sm:p-8 flex flex-col justify-between stacked-pages-right text-slate-800 border border-[#D8E5CC]">
                        <div class="hidden md:block absolute top-0 left-0 w-8 h-full spine-shadow-right pointer-events-none z-10"></div>

                        <div class="relative z-10">
                            <div class="flex justify-between items-start border-b border-[#D8E5CC] pb-2 mb-2">
                                <div>
                                    <span class="text-[10px] sm:text-[11px] font-bold text-[#4E7C3A] tracking-wider uppercase">Chào Mừng Độc Giả</span>
                                    <h2 class="font-serif-title text-2xl sm:text-3xl font-bold text-[#1E3317]">Đăng Nhập</h2>
                                </div>
                                <span class="font-serif-title italic text-slate-400 text-xs sm:text-sm">Trang 01</span>
                            </div>
                        </div>

                        <!-- Form Đăng Nhập -->
                        <form id="login-form" onsubmit="handleLoginSubmit(event)" class="relative z-10 space-y-3 my-auto">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Email / Tên đăng nhập</label>
                                <div class="relative">
                                    <i class="fa-regular fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                                    <input type="text" id="login-email" required placeholder="docgia@bookstore.com" class="w-full input-avocado-cream rounded-lg px-3 py-2 sm:py-2.5 pl-9 text-xs sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between items-center mb-1">
                                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Mật khẩu</label>
                                    <button type="button" onclick="openForgotModal()" class="text-[11px] sm:text-xs text-[#4E7C3A] hover:underline font-semibold">Quên mật khẩu?</button>
                                </div>
                                <div class="relative">
                                    <i class="fa-solid fa-key absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                                    <input type="password" id="login-password" required placeholder="••••••••" class="w-full input-avocado-cream rounded-lg px-3 py-2 sm:py-2.5 pl-9 pr-10 text-xs sm:text-sm">
                                    <button type="button" onclick="togglePasswordVisibility('login-password', 'password-toggle-icon')" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-700">
                                        <i id="password-toggle-icon" class="fa-regular fa-eye text-xs"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="checkbox" class="checkbox-avocado w-3.5 h-3.5 sm:w-4 sm:h-4 rounded border-slate-300 text-[#4E7C3A] focus:ring-[#4E7C3A]">
                                    <span class="text-xs text-slate-600">Ghi nhớ đăng nhập</span>
                                </label>
                            </div>

                            <button type="submit" class="w-full btn-leaf-green text-white font-semibold py-2.5 sm:py-3 rounded-lg shadow-md flex items-center justify-center space-x-2 text-xs sm:text-sm">
                                <span>Đăng Nhập</span>
                                <i class="fa-solid fa-right-to-bracket text-xs"></i>
                            </button>
                        </form>

                        <div class="relative z-10 border-t border-[#D8E5CC] pt-2 text-center">
                            <p class="text-xs text-slate-600">
                                Chưa có tài khoản? 
                                <button type="button" onclick="flipToRegister()" class="text-[#4E7C3A] font-bold hover:underline ml-1 inline-flex items-center">
                                    <span>Đăng ký ngay</span>
                                    <i class="fa-solid fa-arrow-right text-[10px] ml-1"></i>
                                </button>
                            </p>
                        </div>
                    </div>

                    <!-- MẶT SAU: FORM ĐĂNG KÝ -->
                    <div class="leaf-face leaf-back absolute inset-0 cream-avocado-page rounded-xl md:rounded-l-none md:rounded-r-xl p-5 sm:p-8 flex flex-col justify-between stacked-pages-left text-slate-800 border border-[#D8E5CC]">
                        <div class="hidden md:block absolute top-0 right-0 w-8 h-full spine-shadow-left pointer-events-none z-10"></div>

                        <div class="relative z-10">
                            <div class="flex justify-between items-start border-b border-[#D8E5CC] pb-2 mb-2">
                                <div>
                                    <span class="text-[10px] sm:text-[11px] font-bold text-[#4E7C3A] tracking-wider uppercase">Gia Nhập Thành Viên</span>
                                    <h2 class="font-serif-title text-2xl sm:text-3xl font-bold text-[#1E3317]">Đăng Ký Tài Khoản</h2>
                                </div>
                                <span class="font-serif-title italic text-slate-400 text-xs sm:text-sm">Trang 02</span>
                            </div>
                        </div>

                        <!-- Form Đăng Ký -->
                        <form id="register-form" onsubmit="handleRegisterSubmit(event)" class="relative z-10 space-y-2.5 sm:space-y-3 my-auto custom-scrollbar overflow-y-auto max-h-[340px] pr-1">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Họ và tên</label>
                                <div class="relative">
                                    <i class="fa-regular fa-user absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                                    <input type="text" required placeholder="Nguyễn Văn A" class="w-full input-avocado-cream rounded-lg px-3 py-1.5 sm:py-2 pl-9 text-xs sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Email</label>
                                <div class="relative">
                                    <i class="fa-regular fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                                    <input type="email" required placeholder="docgia@bookstore.com" class="w-full input-avocado-cream rounded-lg px-3 py-1.5 sm:py-2 pl-9 text-xs sm:text-sm">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Mật khẩu</label>
                                    <input type="password" required placeholder="••••••••" class="w-full input-avocado-cream rounded-lg px-3 py-1.5 sm:py-2 text-xs sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Xác nhận</label>
                                    <input type="password" required placeholder="••••••••" class="w-full input-avocado-cream rounded-lg px-3 py-1.5 sm:py-2 text-xs sm:text-sm">
                                </div>
                            </div>

                            <div class="flex items-center space-x-2 pt-0.5">
                                <input type="checkbox" id="terms" required class="checkbox-avocado w-3.5 h-3.5 rounded border-slate-300 text-[#4E7C3A] focus:ring-[#4E7C3A]">
                                <label for="terms" class="text-[11px] text-slate-600">Đồng ý <a href="#" class="text-[#4E7C3A] font-semibold underline">Điều khoản tiệm sách</a></label>
                            </div>

                            <button type="submit" class="w-full btn-leaf-green text-white font-semibold py-2 sm:py-2.5 rounded-lg shadow mt-1 flex items-center justify-center space-x-2 text-xs sm:text-sm">
                                <span>Tạo Tài Khoản</span>
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </button>
                        </form>

                        <div class="relative z-10 border-t border-[#D8E5CC] pt-2 text-center">
                            <p class="text-xs text-slate-600">
                                Đã có tài khoản? 
                                <button type="button" onclick="flipToLogin()" class="text-[#4E7C3A] font-bold hover:underline ml-1 inline-flex items-center">
                                    <i class="fa-solid fa-arrow-left text-[10px] mr-1"></i>
                                    <span>Trở lại Đăng nhập</span>
                                </button>
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>

    <!-- MODAL KHÔI PHỤC MẬT KHẨU -->
    <div id="forgot-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300">
        <div id="forgot-modal-card" class="cream-avocado-page w-full max-w-md rounded-2xl p-5 sm:p-6 shadow-2xl border border-[#D8E5CC] relative transform scale-95 transition-transform duration-300 text-slate-800">
            
            <button onclick="closeForgotModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-800 transition-colors">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>

            <div class="flex items-center space-x-3 border-b border-[#D8E5CC] pb-3 mb-4">
                <div class="w-9 h-9 rounded-xl bg-white border border-[#D8E5CC] text-[#4E7C3A] flex items-center justify-center font-bold">
                    <i class="fa-solid fa-key"></i>
                </div>
                <div>
                    <h3 class="font-serif-title text-lg sm:text-xl font-bold text-[#1E3317]">Khôi Phục Mật Khẩu</h3>
                    <p class="text-xs text-slate-500">Nhập email đăng ký tài khoản</p>
                </div>
            </div>

            <form onsubmit="handleForgotSubmit(event)" class="space-y-3.5">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Email của bạn</label>
                    <input type="email" required placeholder="docgia@bookstore.com" class="w-full input-avocado-cream rounded-lg px-3 py-2 text-xs sm:text-sm">
                </div>

                <p class="text-xs text-slate-500 italic">
                    Chúng tôi sẽ gửi liên kết tạo lại mật khẩu vào hòm thư của bạn.
                </p>

                <div class="flex justify-end space-x-2 pt-1">
                    <button type="button" onclick="closeForgotModal()" class="px-3.5 py-1.5 text-xs font-semibold text-slate-600 hover:text-slate-900">Hủy</button>
                    <button type="submit" class="btn-leaf-green px-4 py-1.5 text-xs text-white rounded-lg font-semibold">Gửi Liên Kết</button>
                </div>
            </form>
        </div>
    </div>

    <!-- TOAST NOTIFICATION -->
    <div id="toast-container" class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 z-50 flex flex-col space-y-2 pointer-events-none"></div>

    <!-- FOOTER -->
    <footer class="relative z-20 py-3 text-center text-[11px] sm:text-xs text-slate-500 font-sans-ui">
        &copy; <span id="year-span">2026</span> Bookstore Online. Thiết kế tối ưu Mobile & Desktop.
    </footer>

    <!-- JAVASCRIPT XỬ LÝ -->
    <script>
        let soundEnabled = true;
        let isFlipped = false;
        let audioCtx = null;

        document.getElementById('year-span').textContent = new Date().getFullYear();

        /* Âm thanh lật trang nhẹ nhàng */
        function playPaperFlipSound() {
            if (!soundEnabled) return;
            try {
                const AudioContext = window.AudioContext || window.webkitAudioContext;
                if (!audioCtx) audioCtx = new AudioContext();
                if (audioCtx.state === 'suspended') audioCtx.resume();

                const bufferSize = audioCtx.sampleRate * 0.16;
                const buffer = audioCtx.createBuffer(1, bufferSize, audioCtx.sampleRate);
                const data = buffer.getChannelData(0);

                for (let i = 0; i < bufferSize; i++) {
                    data[i] = (Math.random() * 2 - 1) * Math.exp(-i / (bufferSize * 0.3));
                }

                const noise = audioCtx.createBufferSource();
                noise.buffer = buffer;

                const filter = audioCtx.createBiquadFilter();
                filter.type = 'bandpass';
                filter.frequency.setValueAtTime(850, audioCtx.currentTime);
                filter.frequency.exponentialRampToValueAtTime(320, audioCtx.currentTime + 0.14);
                filter.Q.value = 2.0;

                const gain = audioCtx.createGain();
                gain.gain.setValueAtTime(0.2, audioCtx.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.15);

                noise.connect(filter);
                filter.connect(gain);
                gain.connect(audioCtx.destination);

                noise.start();
            } catch (e) {
                console.log("Audio not supported:", e);
            }
        }

        function toggleSound() {
            soundEnabled = !soundEnabled;
            const label = document.getElementById('sound-label');
            const icon = document.getElementById('sound-icon');
            if (soundEnabled) {
                label.textContent = 'Âm thanh: Bật';
                icon.className = 'fa-solid fa-volume-high text-[#4E7C3A]';
                playPaperFlipSound();
            } else {
                label.textContent = 'Âm thanh: Tắt';
                icon.className = 'fa-solid fa-volume-xmark text-slate-400';
            }
        }

        function reopenBookAnimation() {
            const book = document.getElementById('book');
            book.classList.remove('book-open');
            book.classList.add('book-closed');
            
            setTimeout(() => {
                book.classList.remove('book-closed');
                book.classList.add('book-open');
                playPaperFlipSound();
            }, 200);
        }

        function flipToRegister() {
            const leaf = document.getElementById('flipper-leaf');
            leaf.classList.add('flipped');
            isFlipped = true;
            playPaperFlipSound();
        }

        function flipToLogin() {
            const leaf = document.getElementById('flipper-leaf');
            leaf.classList.remove('flipped');
            isFlipped = false;
            playPaperFlipSound();
        }

        function togglePasswordVisibility(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'fa-regular fa-eye-slash text-[#4E7C3A]';
            } else {
                input.type = 'password';
                icon.className = 'fa-regular fa-eye text-slate-400';
            }
        }

        function openForgotModal() {
            const modal = document.getElementById('forgot-modal');
            const card = document.getElementById('forgot-modal-card');
            modal.classList.remove('opacity-0', 'pointer-events-none');
            card.classList.remove('scale-95');
            card.classList.add('scale-100');
        }

        function closeForgotModal() {
            const modal = document.getElementById('forgot-modal');
            const card = document.getElementById('forgot-modal-card');
            card.classList.remove('scale-100');
            card.classList.add('scale-95');
            modal.classList.add('opacity-0', 'pointer-events-none');
        }

        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            const isSuccess = type === 'success';

            toast.className = `pointer-events-auto flex items-center space-x-2 px-3.5 py-2.5 rounded-xl shadow-lg border text-xs font-semibold transition-all duration-300 transform translate-y-2 opacity-0 ${
                isSuccess 
                ? 'bg-white border-[#D8E5CC] text-slate-800' 
                : 'bg-white border-rose-200 text-rose-900'
            }`;
            
            toast.innerHTML = `
                <i class="fa-solid ${isSuccess ? 'fa-circle-check text-[#4E7C3A]' : 'fa-circle-xmark text-rose-600'} text-sm"></i>
                <span>${message}</span>
            `;
            
            container.appendChild(toast);
            
            requestAnimationFrame(() => {
                toast.classList.remove('translate-y-2', 'opacity-0');
            });

            setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-y-2');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        function handleLoginSubmit(e) {
            e.preventDefault();
            showToast('Đăng nhập thành công!', 'success');
        }

        function handleRegisterSubmit(e) {
            e.preventDefault();
            showToast('Đăng ký thành công! Chuyển sang Đăng nhập.', 'success');
            setTimeout(() => flipToLogin(), 1000);
        }

        function handleForgotSubmit(e) {
            e.preventDefault();
            closeForgotModal();
            showToast('Đã gửi liên kết khôi phục qua Email!', 'success');
        }

        /* Canvas Hạt Không Khí */
        const canvas = document.getElementById('ambient-canvas');
        const ctx = canvas.getContext('2d');
        let particles = [];

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        for (let i = 0; i < 25; i++) {
            particles.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                radius: Math.random() * 2 + 0.5,
                alpha: Math.random() * 0.4 + 0.1,
                vx: (Math.random() - 0.5) * 0.2,
                vy: -Math.random() * 0.2 - 0.1
            });
        }

        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.x += p.vx;
                p.y += p.vy;
                if (p.y < 0) p.y = canvas.height;
                if (p.x < 0) p.x = canvas.width;
                if (p.x > canvas.width) p.x = 0;

                ctx.beginPath();
                ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(120, 165, 95, ${p.alpha})`;
                ctx.fill();
            });
            requestAnimationFrame(animateParticles);
        }
        animateParticles();

        window.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const book = document.getElementById('book');
                book.classList.remove('book-closed');
                book.classList.add('book-open');
                playPaperFlipSound();
            }, 250);
        });
    </script>
</body>
</html>