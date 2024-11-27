<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .glass-nav {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }

        .elegant-gradient {
            background: linear-gradient(135deg, #1a1c2c 0%, #2a3042 100%);
        }

        .elegant-text-gradient {
            background: linear-gradient(135deg, #c2c8ff 0%, #ffffff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        .elegant-border {
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .elegant-shadow {
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }

        .section-spacing {
            padding: 120px 0;
        }

        .elegant-button {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            transition: all 0.3s ease;
        }

        .elegant-button:hover {
            background: linear-gradient(135deg, #4338ca 0%, #6d28d9 100%);
            transform: scale(1.05);
        }

        .elegant-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
        }

        .elegant-input:focus {
            border-color: rgba(99, 102, 241, 0.5);
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.25);
        }

        .scroll-indicator {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-30px); }
            60% { transform: translateY(-15px); }
        }

        .bg-pattern {
            background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.05) 1px, transparent 0);
            background-size: 40px 40px;
        }

        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slide-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce-slow {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0) translateX(-50%); }
            40% { transform: translateY(-20px) translateX(-50%); }
            60% { transform: translateY(-10px) translateX(-50%); }
        }

        @keyframes gradient-shift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .animate-fade-in {
            animation: fade-in 1.5s ease-out forwards;
        }

        .animate-slide-up {
            animation: slide-up 1s ease-out forwards;
        }

        .animate-gradient {
            background: linear-gradient(
                270deg,
                rgba(0,0,0,0.7) 0%,
                rgba(0,0,0,0.5) 50%,
                rgba(0,0,0,0.7) 100%
            );
            background-size: 200% 200%;
            animation: gradient-shift 15s ease infinite;
        }

        .glass-nav.scrolled {
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body class="antialiased elegant-gradient min-h-screen">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl border-b border-gray-100 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-12 w-auto" src="{{ asset('assets/img/logo.svg') }}" alt="SMKN 4 Bogor Logo">
                    </div>
                    <div class="ml-4 flex flex-col">
                        <span class="text-lg font-bold text-gray-800 dark:text-white">SMK NEGERI 4 BOGOR</span>
                        <span class="text-sm text-gray-600 dark:text-gray-300">NEBRAZKA</span>
                    </div>
                    <div class="hidden md:flex md:items-center md:space-x-8 ml-8">
                        <a href="#beranda" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white px-3 py-2 text-sm font-medium transition-all duration-300 hover:scale-105">Beranda</a>
                        <a href="#profil" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white px-3 py-2 text-sm font-medium transition-all duration-300 hover:scale-105">Profil</a>
                        <a href="#galeri" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white px-3 py-2 text-sm font-medium transition-all duration-300 hover:scale-105">Galeri</a>
                        <a href="#berita" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white px-3 py-2 text-sm font-medium transition-all duration-300 hover:scale-105">Berita</a>
                        <a href="#kontak" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white px-3 py-2 text-sm font-medium transition-all duration-300 hover:scale-105">Kontak</a>
                    </div>
                </div>
                <div class="flex items-center">
                    @if (Route::has('login'))
                        <div class="space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="elegant-button px-6 py-2 rounded-full text-white text-sm font-medium shadow-lg">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="glass-card px-6 py-2 rounded-full text-gray-600 hover:text-gray-900 dark:text-white text-sm font-medium hover:bg-gray-50 dark:hover:bg-white/10 transition-all duration-300">
                                    Login
                                </a>
                            @endauth
                        </div>
                    @endif
                </div>
                <div class="flex items-center">
                    <button id="theme-toggle" 
                            type="button"
                            class="mr-4 p-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 
                                   focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 
                                   rounded-lg text-sm transition-all duration-300">
                        <!-- Dark Mode Icon -->
                        <svg id="theme-toggle-dark-icon" 
                             class="hidden w-5 h-5" 
                             fill="currentColor" 
                             viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <!-- Light Mode Icon -->
                        <svg id="theme-toggle-light-icon" 
                             class="hidden w-5 h-5" 
                             fill="currentColor" 
                             viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="min-h-screen flex items-center justify-center relative overflow-hidden">
        <!-- Background Video dengan animasi fade in -->
        <div class="absolute inset-0 w-full h-full animate-fade-in">
            <video 
                class="w-full h-full object-cover object-center scale-105 transform transition-transform duration-[20s] hover:scale-100"
                autoplay
                muted
                loop
                playsinline
                poster="{{ asset('assets/img/bg.jpg') }}"
            >
                <source src="{{ asset('assets/video/smkn4bogor.mp4') }}" type="video/mp4">
                <img src="{{ asset('assets/img/bg.jpg') }}" alt="Aerial View SMKN 4 Bogor" 
                     class="w-full h-full object-cover object-center">
            </video>
            <!-- Overlay dengan animasi gradient -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/60 backdrop-blur-[1px] animate-gradient"></div>
        </div>

        <!-- Content dengan animasi -->
        <div class="relative z-10 text-center px-4 max-w-5xl mx-auto">
            <h1 class="text-6xl md:text-7xl font-bold mb-8 text-white drop-shadow-lg animate-slide-up opacity-0"
                style="animation-delay: 300ms;">
                SMK NEGERI 4 BOGOR
            </h1>
            <p class="text-xl md:text-2xl text-gray-200 mb-12 drop-shadow-md animate-slide-up opacity-0"
               style="animation-delay: 600ms;">
                Membentuk Generasi Unggul dan Berakhlak Mulia
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-6 animate-slide-up opacity-0"
                 style="animation-delay: 900ms;">
                <a href="#profil" 
                   class="elegant-button px-8 py-3 rounded-full text-white text-lg font-medium shadow-lg group hover:scale-110 transition-all duration-300">
                    <span class="flex items-center">
                        <span>Jelajahi</span>
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-2 transition-all duration-300" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </span>
                </a>
                <a href="#kontak" 
                   class="glass-card px-8 py-3 rounded-full text-white text-lg font-medium 
                          hover:bg-white/20 hover:scale-110 transition-all duration-300">
                    Hubungi Kami
                </a>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce-slow opacity-0"
                 style="animation: bounce-slow 2s infinite, fade-in 1s forwards 1.2s;">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </div>
        </div>
    </section>

    <!-- Profil Section -->
    <section id="profil" class="section-spacing relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold elegant-text-gradient mb-4">Profil Sekolah</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto rounded-full"></div>
            </div>

            <!-- Kepala Sekolah Profile -->
            <div class="glass-card rounded-2xl p-8 mb-12" data-aos="fade-up">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
                    <!-- Foto dan Info Kepala Sekolah -->
                    <div class="text-center">
                        <div class="w-64 h-80 mx-auto mb-6 rounded-2xl overflow-hidden border-4 border-indigo-500/30 hover:border-indigo-500/50 transition-all duration-300 shadow-xl">
                            <img src="{{ asset('assets/img/kpl_sklh.jpg') }}" alt="Foto Kepala Sekolah" 
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">Drs. Mulya Mulprihartono. M,Si</h3>
                        <p class="text-gray-400 mb-4">NIP. 196503151990031007</p>
                    </div>

                    <!-- Kata Sambutan -->
                    <div class="md:col-span-2">
                        <div class="space-y-4">
                            <h4 class="text-xl font-semibold text-indigo-400 mb-4">Kata Sambutan Kepala Sekolah</h4>
                            <div class="text-gray-300 space-y-4">
                                <p>
                                    Assalamu'alaikum Warahmatullahi Wabarakatuh
                                </p>
                                <p>
                                    Puji syukur kita panjatkan ke hadirat Allah SWT atas segala rahmat dan karunia-Nya. Selamat datang di website resmi sekolah kami. Sebagai lembaga pendidikan, kami berkomitmen untuk memberikan pelayanan pendidikan terbaik bagi generasi penerus bangsa.
                                </p>
                                <p>
                                    Di era digital ini, pendidikan tidak hanya tentang transfer pengetahuan, tetapi juga pembentukan karakter dan keterampilan yang dibutuhkan untuk menghadapi tantangan masa depan. Kami terus berinovasi dalam metode pembelajaran dan pengembangan fasilitas untuk menciptakan lingkungan belajar yang optimal.
                                </p>
                                <p>
                                    Melalui website ini, kami berharap dapat membangun komunikasi yang lebih baik dengan seluruh stakeholder pendidikan. Mari bersama-sama kita wujudkan pendidikan berkualitas untuk Indonesia yang lebih baik.
                                </p>
                                <p>
                                    Wassalamu'alaikum Warahmatullahi Wabarakatuh
                                </p>
                            </div>
                            <div class="mt-6 text-right">
                                <p class="text-white font-semibold">Hormat Saya,</p>
                                <p class="text-indigo-400">Kepala Sekolah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <!-- Visi Card -->
                <div class="glass-card rounded-2xl p-8 hover-lift" data-aos="fade-right" data-aos-delay="100">
                    <div class="text-indigo-400 mb-6">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4">Visi</h3>
                    <p class="text-gray-400">
                        "Mewujudkan sekolah yang unggul dalam prestasi akademik dan non-akademik, berkarakter, berakhlak mulia, berbudaya lingkungan, dan berdaya saing global"
                    </p>
                </div>

                <!-- Misi Card -->
                <div class="glass-card rounded-2xl p-8 hover-lift" data-aos="fade-left" data-aos-delay="200">
                    <div class="text-purple-400 mb-6">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4">Misi</h3>
                    <ul class="text-gray-400 space-y-2 list-disc list-inside">
                        <li>Mengembangkan pembelajaran aktif, inovatif, kreatif, efektif, dan menyenangkan</li>
                        <li>Meningkatkan prestasi akademik dan non-akademik yang kompetitif</li>
                        <li>Menumbuhkan karakter dan akhlak mulia melalui pengamalan nilai-nilai agama</li>
                        <li>Mengembangkan budaya literasi dan keterampilan abad 21</li>
                        <li>Menciptakan lingkungan sekolah yang bersih, sehat, dan ramah lingkungan</li>
                        <li>Meningkatkan kompetensi pendidik dan tenaga kependidikan</li>
                    </ul>
                </div>
            </div>

            <!-- Tujuan Sekolah -->
            <div class="glass-card rounded-2xl p-8 hover-lift">
                <div class="text-pink-400 mb-6">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Tujuan Sekolah</h3>
                <ul class="text-gray-400 space-y-2 list-disc list-inside">
                    <li>Menghasilkan lulusan yang kompeten dan berdaya saing</li>
                    <li>Membentuk peserta didik yang berkarakter dan berakhlak mulia</li>
                    <li>Menciptakan lingkungan belajar yang kondusif dan inovatif</li>
                    <li>Mengembangkan kemitraan dengan dunia usaha dan industri</li>
                    <li>Meningkatkan prestasi sekolah di tingkat nasional dan internasional</li>
                </ul>
            </div>

            <!-- Program Unggulan -->
            <div class="mt-16">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold elegant-text-gradient mb-4">Program Unggulan</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto rounded-full"></div>
                    <p class="text-gray-300 mt-4">Program Keahlian yang Siap Mencetak Generasi Unggul dan Profesional</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- PPLG Card -->
                    <div class="glass-card rounded-2xl p-6 hover-lift group" data-aos="fade-up" data-aos-delay="100">
                        <div class="h-48 mb-6 rounded-xl overflow-hidden">
                            <img src="{{ asset('assets/img/logo_pplg.png') }}" alt="PPLG" 
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="text-indigo-400 mb-4">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">PPLG</h3>
                        <h4 class="text-sm text-indigo-400 mb-4">Pengembangan Perangkat Lunak dan Gim</h4>
                        <p class="text-gray-400 text-sm">
                            Program keahlian yang fokus pada pengembangan aplikasi, website, dan game dengan teknologi terkini. 
                            Lulusan siap menjadi developer profesional di industri teknologi.
                        </p>
                    </div>

                    <!-- TJKT Card -->
                    <div class="glass-card rounded-2xl p-6 hover-lift group" data-aos="fade-up" data-aos-delay="200">
                        <div class="h-48 mb-6 rounded-xl overflow-hidden">
                            <img src="{{ asset('assets/img/logo_tjkt.png') }}" alt="TJKT" 
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="text-purple-400 mb-4">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">TJKT</h3>
                        <h4 class="text-sm text-purple-400 mb-4">Teknik Jaringan Komputer dan Telekomunikasi</h4>
                        <p class="text-gray-400 text-sm">
                            Membekali siswa dengan keahlian dalam instalasi jaringan, keamanan sistem, dan manajemen infrastruktur IT modern.
                        </p>
                    </div>

                    <!-- TO Card -->
                    <div class="glass-card rounded-2xl p-6 hover-lift group" data-aos="fade-up" data-aos-delay="300">
                        <div class="h-48 mb-6 rounded-xl overflow-hidden">
                            <img src="{{ asset('assets/img/logo_to.png') }}" alt="TO" 
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="text-pink-400 mb-4">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">TO</h3>
                        <h4 class="text-sm text-pink-400 mb-4">Teknik Otomotif</h4>
                        <p class="text-gray-400 text-sm">
                            Program keahlian yang mempelajari teknologi kendaraan modern, sistem kelistrikan, dan perawatan mesin dengan standar industri.
                        </p>
                    </div>

                    <!-- TFL Card -->
                    <div class="glass-card rounded-2xl p-6 hover-lift group" data-aos="fade-up" data-aos-delay="400">
                        <div class="h-48 mb-6 rounded-xl overflow-hidden">
                            <img src="{{ asset('assets/img/logo_tfl.png') }}" alt="TFL" 
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="text-emerald-400 mb-4">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">TFL</h3>
                        <h4 class="text-sm text-emerald-400 mb-4">Teknik Fabrikasi Logam dan Manufaktur</h4>
                        <p class="text-gray-400 text-sm">
                            Mempersiapkan siswa dalam bidang pengolahan logam, pengelasan, dan manufaktur dengan teknologi modern untuk industri.
                        </p>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="text-center mt-12">
                    <a href="#kontak" class="elegant-button inline-flex items-center px-8 py-3 rounded-full text-white text-lg font-medium shadow-lg group">
                        <span>Daftar Sekarang</span>
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita & Agenda Section -->
    <section id="berita-agenda" class="section-spacing relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold elegant-text-gradient mb-4">Berita & Agenda</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Berita Column -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-semibold text-white">Berita Terbaru</h3>
                        <a href="#" class="text-indigo-400 hover:text-indigo-300 text-sm">Lihat Semua</a>
                    </div>

                    <!-- News Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($beritas as $berita)
                            <div class="glass-card rounded-2xl overflow-hidden hover-lift cursor-pointer group"
                                 onclick="showBeritaPreview('{{ $berita->berita_id }}')">
                                <!-- Thumbnail -->
                                <div class="relative h-48 overflow-hidden">
                                    @if($berita->thumbnail)
                                        <img src="{{ asset('storage/berita/' . $berita->thumbnail) }}" 
                                             alt="{{ $berita->judul }}"
                                             class="w-full h-full object-cover transform group-hover:scale-110 transition-all duration-500">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-indigo-500/30 to-purple-500/30 flex items-center justify-center">
                                            <svg class="w-12 h-12 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-.586-1.414l-4.5-4.5A2 2 0 0012.586 3H9"/>
                                            </svg>
                                        </div>
                                    @endif
                                    @if($berita->is_featured)
                                        <div class="absolute top-2 right-2">
                                            <span class="px-2 py-1 bg-gradient-to-r from-yellow-400 to-yellow-600 text-white text-xs font-semibold rounded-full">
                                                Featured
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Content -->
                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-white group-hover:text-indigo-300 transition-colors mb-2 line-clamp-2">
                                        {{ $berita->judul }}
                                    </h3>
                                    <div class="flex items-center text-sm text-gray-400 mb-4">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ $berita->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                    <p class="text-gray-400 text-sm line-clamp-3">
                                        {!! Str::limit(strip_tags($berita->konten), 150) !!}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Agenda Column -->
                <div class="lg:col-span-1">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-semibold text-white">Agenda Mendatang</h3>
                        <a href="#" class="text-indigo-400 hover:text-indigo-300 text-sm">Lihat Semua</a>
                    </div>

                    <div class="space-y-4">
                        @foreach($agendas as $agenda)
                            <div class="glass-card rounded-xl p-4 hover:bg-white/5 transition-all duration-300">
                                <div class="flex items-start space-x-4">
                                    <!-- Tanggal -->
                                    <div class="flex-shrink-0 w-16 text-center">
                                        <div class="bg-indigo-500/20 rounded-lg p-2">
                                            <span class="block text-xs text-indigo-400">
                                                {{ $agenda->tanggal_mulai->format('M') }}
                                            </span>
                                            <span class="block text-2xl font-bold text-white">
                                                {{ $agenda->tanggal_mulai->format('d') }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Konten -->
                                    <div class="flex-1">
                                        <h4 class="text-lg font-semibold text-white mb-1">{{ $agenda->judul }}</h4>
                                        <div class="space-y-2 text-sm text-gray-400">
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                {{ $agenda->tanggal_mulai->format('H:i') }} - 
                                                {{ $agenda->tanggal_selesai->format('H:i') }} WIB
                                            </div>
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                                {{ $agenda->lokasi }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Status Badge -->
                                    <div class="flex-shrink-0">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            {{ $agenda->status === 'upcoming' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                            {{ ucfirst($agenda->status) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section id="events" class="section-spacing relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold elegant-text-gradient mb-4">Upcoming Events</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto rounded-full"></div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-12">
                <!-- Upcoming Events -->
                <div class="glass-card rounded-xl p-6 hover-lift">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-indigo-400 text-sm font-medium">Upcoming</p>
                            <p class="text-3xl font-bold text-white mt-1">{{ $upcomingCount }}</p>
                        </div>
                        <div class="bg-indigo-500/20 p-3 rounded-full">
                            <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Ongoing Events -->
                <div class="glass-card rounded-xl p-6 hover-lift">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-emerald-400 text-sm font-medium">Ongoing</p>
                            <p class="text-3xl font-bold text-white mt-1">{{ $ongoingCount }}</p>
                        </div>
                        <div class="bg-emerald-500/20 p-3 rounded-full">
                            <svg class="w-8 h-8 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Completed Events -->
                <div class="glass-card rounded-xl p-6 hover-lift">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-400 text-sm font-medium">Completed</p>
                            <p class="text-3xl font-bold text-white mt-1">{{ $completedCount }}</p>
                        </div>
                        <div class="bg-purple-500/20 p-3 rounded-full">
                            <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            @if($events->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($events as $event)
                        <div class="glass-card rounded-2xl overflow-hidden hover-lift group">
                            <div class="relative aspect-video">
                                @if($event->thumbnail)
                                    <img src="{{ asset('storage/events/' . $event->thumbnail) }}" 
                                         alt="{{ $event->event_name }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-indigo-500/30 to-purple-500/30 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                                
                                <!-- Event Date Badge -->
                                <div class="absolute top-4 right-4">
                                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-2 text-center">
                                        <span class="block text-sm text-indigo-300">
                                            {{ $event->event_date->format('M') }}
                                        </span>
                                        <span class="block text-2xl font-bold text-white">
                                            {{ $event->event_date->format('d') }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6">
                                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-indigo-300 transition-colors">
                                    {{ $event->event_name }}
                                </h3>
                                
                                <div class="space-y-3 text-gray-300">
                                    <!-- Location -->
                                    <div class="flex items-center text-sm">
                                        <svg class="w-4 h-4 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        {{ $event->location }}
                                    </div>

                                    @if($event->description)
                                        <p class="text-sm text-gray-400 line-clamp-2 mt-3">
                                            {{ $event->description }}
                                        </p>
                                    @endif

                                    <!-- Status Badge -->
                                    <div class="pt-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            {{ $event->status === 'upcoming' ? 'bg-blue-100 text-blue-800' : 
                                               ($event->status === 'ongoing' ? 'bg-green-100 text-green-800' : 
                                               'bg-purple-100 text-purple-800') }}">
                                            {{ ucfirst($event->status) }}
                                        </span>
                            </div>
                        </div>
                </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center text-gray-400">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-lg">Tidak ada events dalam waktu dekat</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Galeri Section -->
    <section id="galeri" class="section-spacing relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold elegant-text-gradient mb-4">Galeri Sekolah</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto rounded-full"></div>
            </div>

            <!-- Search Bar -->
            <div class="max-w-2xl mx-auto mb-8">
                <div class="relative">
                    <input type="text" 
                           id="albumSearch"
                           placeholder="Cari album atau kategori..."
                           class="w-full px-4 py-3 rounded-lg bg-white/10 backdrop-blur-sm border border-white/20 
                                  text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500
                                  transition-all duration-300">
                    <svg class="absolute right-3 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>

            <!-- Gallery Categories -->
            <div class="mb-12">
                <div class="flex flex-wrap justify-center gap-4">
                    <!-- All Albums Tab -->
                    <button onclick="showGalleryCategory('all-albums')"
                            class="gallery-category-tab px-6 py-2 rounded-full text-sm font-medium text-white 
                                   bg-gradient-to-r from-indigo-500 to-purple-500 backdrop-blur-sm
                                   hover:from-indigo-600 hover:to-purple-600 transition-all duration-300">
                        Semua Album
                        <span class="ml-2 px-2 py-0.5 text-xs bg-white/10 rounded-full">
                            {{ $allAlbums->count() }}
                        </span>
                    </button>

                    @foreach($kategoris as $kategori)
                        <button onclick="showGalleryCategory('gallery-{{ $kategori->kategori_id }}')"
                                class="gallery-category-tab px-6 py-2 rounded-full text-sm font-medium text-white 
                                       bg-gradient-to-r from-indigo-500/50 to-purple-500/50 backdrop-blur-sm
                                       hover:from-indigo-500 hover:to-purple-500 transition-all duration-300">
                            {{ $kategori->kategori_judul }}
                            <span class="ml-2 px-2 py-0.5 text-xs bg-white/10 rounded-full">
                                {{ $kategori->albums->count() }}
                            </span>
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Gallery Content Container -->
            <div class="gallery-content">
                <!-- All Albums Section -->
                <div id="all-albums" class="gallery-category-content">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach($allAlbums as $album)
                            <!-- Album Card -->
                            @include('components.album-card', ['album' => $album])
                        @endforeach
                    </div>
                </div>

                <!-- Category Sections -->
                @foreach($kategoris as $kategori)
                    <div id="gallery-{{ $kategori->kategori_id }}" class="gallery-category-content hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            @foreach($kategori->albums as $album)
                                <!-- Album Card -->
                                @include('components.album-card', ['album' => $album])
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Search Results Section -->
            <div id="search-results" class="hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <!-- Search results will be populated here -->
                </div>
            </div>
        </div>
    </section>

    <!-- Mitra Industri Section -->
    <section id="mitra" class="section-spacing relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold elegant-text-gradient mb-4">Mitra Industri</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto rounded-full"></div>
                <p class="text-gray-300 mt-4">Perusahaan yang Menjalin Kerja Sama dengan SMKN 4 Bogor</p>
            </div>

            <!-- Partner Categories -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
                <!-- IT & Software Partners -->
                <div class="glass-card rounded-2xl p-8 hover-lift" data-aos="zoom-in" data-aos-delay="100">
                    <h3 class="text-xl font-bold text-white mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Mitra PPLG & TJKT
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
                        <div class="p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-all">
                            <img src="/path/to/telkom.png" alt="Telkom Indonesia" class="h-12 w-auto mx-auto">
                            <p class="text-center text-sm text-gray-400 mt-2">Telkom Indonesia</p>
                        </div>
                        <div class="p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-all">
                            <img src="/path/to/microsoft.png" alt="Microsoft" class="h-12 w-auto mx-auto">
                            <p class="text-center text-sm text-gray-400 mt-2">Microsoft</p>
                        </div>
                        <div class="p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-all">
                            <img src="/path/to/cisco.png" alt="Cisco" class="h-12 w-auto mx-auto">
                            <p class="text-center text-sm text-gray-400 mt-2">Cisco</p>
                        </div>
                    </div>
                </div>

                <!-- Automotive Partners -->
                <div class="glass-card rounded-2xl p-8 hover-lift" data-aos="zoom-in" data-aos-delay="200">
                    <h3 class="text-xl font-bold text-white mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/>
                        </svg>
                        Mitra Teknik Otomotif
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
                        <div class="p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-all">
                            <img src="/path/to/toyota.png" alt="Toyota" class="h-12 w-auto mx-auto">
                            <p class="text-center text-sm text-gray-400 mt-2">Toyota</p>
                        </div>
                        <div class="p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-all">
                            <img src="/path/to/honda.png" alt="Honda" class="h-12 w-auto mx-auto">
                            <p class="text-center text-sm text-gray-400 mt-2">Honda</p>
                        </div>
                        <div class="p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-all">
                            <img src="/path/to/yamaha.png" alt="Yamaha" class="h-12 w-auto mx-auto">
                            <p class="text-center text-sm text-gray-400 mt-2">Yamaha</p>
                        </div>
                    </div>
                </div>

                <!-- Manufacturing Partners -->
                <div class="glass-card rounded-2xl p-8 hover-lift" data-aos="zoom-in" data-aos-delay="300">
                    <h3 class="text-xl font-bold text-white mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                        </svg>
                        Mitra TFL
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
                        <div class="p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-all">
                            <img src="/path/to/krakatau-steel.png" alt="Krakatau Steel" class="h-12 w-auto mx-auto">
                            <p class="text-center text-sm text-gray-400 mt-2">Krakatau Steel</p>
                        </div>
                        <div class="p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-all">
                            <img src="/path/to/pupuk-kujang.png" alt="Pupuk Kujang" class="h-12 w-auto mx-auto">
                            <p class="text-center text-sm text-gray-400 mt-2">Pupuk Kujang</p>
                        </div>
                        <div class="p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-all">
                            <img src="/path/to/astra.png" alt="Astra" class="h-12 w-auto mx-auto">
                            <p class="text-center text-sm text-gray-400 mt-2">Astra</p>
                        </div>
                    </div>
                </div>

                <!-- Other Partners -->
                <div class="glass-card rounded-2xl p-8 hover-lift" data-aos="zoom-in" data-aos-delay="400">
                    <h3 class="text-xl font-bold text-white mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Mitra Lainnya
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
                        <div class="p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-all">
                            <img src="/path/to/dinas-pendidikan.png" alt="Dinas Pendidikan" class="h-12 w-auto mx-auto">
                            <p class="text-center text-sm text-gray-400 mt-2">Dinas Pendidikan</p>
                        </div>
                        <div class="p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-all">
                            <img src="/path/to/kemendikbud.png" alt="Kemendikbud" class="h-12 w-auto mx-auto">
                            <p class="text-center text-sm text-gray-400 mt-2">Kemendikbud</p>
                        </div>
                        <div class="p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-all">
                            <img src="/path/to/pemkot-bogor.png" alt="Pemkot Bogor" class="h-12 w-auto mx-auto">
                            <p class="text-center text-sm text-gray-400 mt-2">Pemkot Bogor</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Partnership Benefits -->
            <div class="text-center">
                <p class="text-gray-300 mb-8">
                    Kemitraan industri kami memastikan lulusan SMKN 4 Bogor siap menghadapi dunia kerja dengan:
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="glass-card p-6 rounded-xl">
                        <div class="text-indigo-400 mb-4">
                            <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h4 class="text-white font-semibold mb-2">Praktek Kerja Industri</h4>
                        <p class="text-gray-400 text-sm">Pengalaman kerja langsung di perusahaan partner</p>
                    </div>
                    <div class="glass-card p-6 rounded-xl">
                        <div class="text-purple-400 mb-4">
                            <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h4 class="text-white font-semibold mb-2">Sertifikasi Industri</h4>
                        <p class="text-gray-400 text-sm">Sertifikasi resmi dari perusahaan partner</p>
                    </div>
                    <div class="glass-card p-6 rounded-xl">
                        <div class="text-pink-400 mb-4">
                            <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h4 class="text-white font-semibold mb-2">Prioritas Rekrutmen</h4>
                        <p class="text-gray-400 text-sm">Kesempatan kerja langsung setelah lulus</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="section-spacing relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold elegant-text-gradient mb-4">Hubungi Kami</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Contact Form -->
                <div class="glass-card rounded-2xl p-8 hover-lift">
                    <form class="space-y-6">
                        <div>
                            <input type="text" placeholder="Nama Lengkap" class="elegant-input w-full px-4 py-3 rounded-lg text-white">
                        </div>
                        <div>
                            <input type="email" placeholder="Email" class="elegant-input w-full px-4 py-3 rounded-lg text-white">
                        </div>
                        <div>
                            <textarea placeholder="Pesan" rows="4" class="elegant-input w-full px-4 py-3 rounded-lg text-white"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="elegant-button w-full py-3 rounded-lg text-white font-medium">
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Contact Info and Map -->
                <div class="glass-card rounded-2xl p-8 hover-lift">
                    <h3 class="text-2xl font-bold text-white mb-6">Informasi Kontak</h3>
                    <div class="space-y-6">
                        <div class="flex items-center text-gray-300">
                            <svg class="w-6 h-6 mr-3 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Alamat Sekolah</span>
                        </div>
                        <!-- Google Maps Embed -->
                        <div class="rounded-lg overflow-hidden">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.049882521668!2d106.82211897505155!3d-6.640728064917778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sid!2sid!4v1731640706433!5m2!1sid!2sid" class="w-full h-64" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-gray-400">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to top button -->
    <button id="scrollToTop" class="fixed bottom-8 right-8 elegant-button p-3 rounded-full opacity-0 transition-opacity duration-300">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    <script>
        // Scroll to top functionality
        const scrollButton = document.getElementById('scrollToTop');
        
        window.addEventListener('scroll', () => {
            scrollButton.style.opacity = window.scrollY > 500 ? '1' : '0';
        });

        scrollButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scroll for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100,
            easing: 'ease-in-out'
        });
    </script>
    <script>
        // Load YouTube API
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        var player;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('youtube-player', {
                videoId: 'lVi_HkzsKbg', // ID video YouTube
                playerVars: {
                    'autoplay': 1,
                    'controls': 0,
                    'showinfo': 0,
                    'modestbranding': 1,
                    'loop': 1,
                    'playlist': 'lVi_HkzsKbg', // Sama dengan videoId untuk loop
                    'mute': 1,
                    'playsinline': 1,
                    'rel': 0
                },
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        function onPlayerReady(event) {
            event.target.playVideo();
            // Set quality to highest available
            player.setPlaybackQuality('hd1080');
        }

        function onPlayerStateChange(event) {
            if (event.data === YT.PlayerState.ENDED) {
                player.playVideo();
            }
        }

        // Handle visibility change to prevent video stopping when switching tabs
        document.addEventListener("visibilitychange", function() {
            if (document.hidden) {
                player.pauseVideo();
            } else {
                player.playVideo();
            }
        });
    </script>
    <script>
        // Navbar Animation on Scroll
        const navbar = document.querySelector('nav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth Scroll dengan easing
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                const offset = 80; // Adjust based on navbar height
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            });
        });

        // Intersection Observer untuk animasi scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe all sections
        document.querySelectorAll('section').forEach(section => {
            observer.observe(section);
        });
    </script>
    <script>
        async function showBeritaPreview(beritaId) {
            const modal = document.getElementById('beritaPreviewModal');
            const title = document.getElementById('beritaPreviewTitle');
            const content = document.getElementById('beritaPreviewContent');
            
            try {
                const response = await fetch(`/preview-berita/${beritaId}`);
                const data = await response.json();
                
                title.textContent = data.judul;
                
                let contentHtml = `
                    <div class="space-y-6">
                        ${data.thumbnail ? `
                            <div class="relative h-[300px] rounded-xl overflow-hidden">
                                <img src="/storage/berita/${data.thumbnail}" 
                                     alt="${data.judul}"
                                     class="w-full h-full object-cover">
                            </div>
                        ` : ''}
                        
                        <div class="flex items-center space-x-4 text-gray-400 text-sm">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                ${new Date(data.created_at).toLocaleDateString('id-ID', { 
                                    day: 'numeric', 
                                    month: 'long', 
                                    year: 'numeric'
                                })}
                            </span>
                            ${data.user ? `
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                ${data.user.name}
                            </span>
                        ` : ''}
                        </div>
                        
                        <div class="prose prose-invert max-w-none">
                            ${data.konten}
                        </div>
                    </div>
                `;
                
                content.innerHTML = contentHtml;
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                
            } catch (error) {
                console.error('Error fetching berita:', error);
            }
        }

        function closeBeritaPreview() {
            const modal = document.getElementById('beritaPreviewModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeBeritaPreview();
            }
        });
    </script>

    <!-- Album View Modal -->
    <div id="albumViewModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="min-h-screen px-4 text-center">
            <div class="fixed inset-0 bg-black/75 transition-opacity"></div>
            
            <!-- Modal Content -->
            <div class="inline-block w-full max-w-6xl my-8 text-left align-middle transition-all transform bg-gray-900 shadow-xl rounded-2xl">
                <div class="relative p-6">
                    <!-- Close Button -->
                    <button onclick="closeAlbumView()" class="absolute top-4 right-4 text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    <!-- Album Title & Breadcrumb -->
                    <h2 id="albumViewTitle" class="text-2xl font-bold text-white mb-2"></h2>
                    <p id="albumBreadcrumb" class="text-gray-400 mb-6"></p>

                    <!-- Album Content -->
                    <div id="albumViewContent" class="space-y-8">
                        <!-- Content will be populated by JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Photo View Modal -->
    <div id="photoViewModal" class="fixed inset-0 z-[60] hidden">
        <div class="min-h-screen flex items-center justify-center px-4">
            <div class="fixed inset-0 bg-black/90 transition-opacity"></div>
            
            <div class="relative max-w-5xl w-full">
                <!-- Close Button -->
                <button onclick="closePhotoView()" class="absolute -top-12 right-0 text-white hover:text-gray-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Photo Content -->
                <div id="photoViewContent">
                    <!-- Content will be populated by JavaScript -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk menampilkan album berdasarkan kategori
        function showGalleryCategory(categoryId) {
            // Sembunyikan semua konten kategori
            const allContents = document.querySelectorAll('.gallery-category-content');
            allContents.forEach(content => {
                content.classList.add('hidden');
            });

            // Tampilkan konten kategori yang dipilih
            const selectedContent = document.getElementById(categoryId);
            if (selectedContent) {
                selectedContent.classList.remove('hidden');
            }

            // Update style tombol kategori
            const allTabs = document.querySelectorAll('.gallery-category-tab');
            allTabs.forEach(tab => {
                // Reset semua tab ke style default
                tab.classList.remove('from-indigo-500', 'to-purple-500');
                tab.classList.add('from-indigo-500/50', 'to-purple-500/50');
            });

            // Aktifkan tab yang dipilih
            const activeTab = document.querySelector(`[onclick="showGalleryCategory('${categoryId}')"]`);
            if (activeTab) {
                activeTab.classList.remove('from-indigo-500/50', 'to-purple-500/50');
                activeTab.classList.add('from-indigo-500', 'to-purple-500');
            }
        }

        // Tampilkan semua album saat halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            showGalleryCategory('all-albums');
        });
    </script>

    <script>
        // Fungsi pencarian album
        function searchAlbums() {
            const searchInput = document.getElementById('albumSearch');
            const searchQuery = searchInput.value.toLowerCase();
            const searchResults = document.getElementById('search-results');
            const galleryContent = document.querySelector('.gallery-content');
            const allAlbumCards = document.querySelectorAll('.group.relative'); // Album cards

            // Jika search query kosong, tampilkan kembali gallery content
            if (searchQuery === '') {
                searchResults.classList.add('hidden');
                galleryContent.classList.remove('hidden');
                return;
            }

            // Sembunyikan gallery content dan tampilkan search results
            galleryContent.classList.add('hidden');
            searchResults.classList.remove('hidden');

            // Clear previous search results
            const searchResultsGrid = searchResults.querySelector('.grid');
            searchResultsGrid.innerHTML = '';

            // Filter dan tampilkan hasil pencarian
            let found = false;
            allAlbumCards.forEach(card => {
                const albumName = card.querySelector('h4').textContent.toLowerCase();
                const albumCategory = card.querySelector('.rounded-full').textContent.toLowerCase();
                const albumDescription = card.querySelector('p')?.textContent.toLowerCase() || '';

                if (albumName.includes(searchQuery) || 
                    albumCategory.includes(searchQuery) || 
                    albumDescription.includes(searchQuery)) {
                    searchResultsGrid.appendChild(card.cloneNode(true));
                    found = true;
                }
            });

            // Tampilkan pesan jika tidak ada hasil
            if (!found) {
                searchResultsGrid.innerHTML = `
                    <div class="col-span-full text-center py-8">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <h3 class="text-xl font-semibold text-white mb-2">Tidak ada hasil</h3>
                        <p class="text-gray-400">Tidak ditemukan album yang sesuai dengan pencarian "${searchQuery}"</p>
                    </div>
                `;
            }
        }

        // Event listener untuk input pencarian
        document.getElementById('albumSearch').addEventListener('input', debounce(searchAlbums, 300));

        // Fungsi debounce untuk mengurangi frekuensi pencarian
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Reset pencarian saat kategori diganti
        function showGalleryCategory(categoryId) {
            // Reset search input
            document.getElementById('albumSearch').value = '';
            
            // Hide search results
            document.getElementById('search-results').classList.add('hidden');
            document.querySelector('.gallery-content').classList.remove('hidden');

            // Original category switching logic
            const allContents = document.querySelectorAll('.gallery-category-content');
            allContents.forEach(content => {
                content.classList.add('hidden');
            });

            const selectedContent = document.getElementById(categoryId);
            if (selectedContent) {
                selectedContent.classList.remove('hidden');
            }

            // Update active tab styles
            const allTabs = document.querySelectorAll('.gallery-category-tab');
            allTabs.forEach(tab => {
                tab.classList.remove('from-indigo-500', 'to-purple-500');
                tab.classList.add('from-indigo-500/50', 'to-purple-500/50');
            });

            const activeTab = document.querySelector(`[onclick="showGalleryCategory('${categoryId}')"]`);
            if (activeTab) {
                activeTab.classList.remove('from-indigo-500/50', 'to-purple-500/50');
                activeTab.classList.add('from-indigo-500', 'to-purple-500');
            }
        }
    </script>

    <!-- Tambahkan script ini di bagian bawah sebelum closing body tag -->
    <script>
        // Fungsi untuk menangani tema
        function handleTheme() {
            const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
            const themeToggleBtn = document.getElementById('theme-toggle');
            
            // Cek preferensi tema yang tersimpan
            if (localStorage.getItem('color-theme') === 'dark' || 
                (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
                themeToggleLightIcon.classList.remove('hidden');
            } else {
                document.documentElement.classList.remove('dark');
                themeToggleDarkIcon.classList.remove('hidden');
            }

            // Toggle tema saat tombol diklik
            themeToggleBtn.addEventListener('click', function() {
                // Toggle icons
                themeToggleDarkIcon.classList.toggle('hidden');
                themeToggleLightIcon.classList.toggle('hidden');

                // Toggle tema
                if (localStorage.getItem('color-theme')) {
                    if (localStorage.getItem('color-theme') === 'light') {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    }
                } else {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    }
                }
                
                // Animasi tombol
                this.classList.add('scale-110');
                setTimeout(() => {
                    this.classList.remove('scale-110');
                }, 200);
            });
        }

        // Jalankan fungsi saat DOM sudah siap
        document.addEventListener('DOMContentLoaded', handleTheme);

        // Tambahkan listener untuk perubahan preferensi sistem
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            if (!localStorage.getItem('color-theme')) {
                if (e.matches) {
                    document.documentElement.classList.add('dark');
                    document.getElementById('theme-toggle-light-icon').classList.remove('hidden');
                    document.getElementById('theme-toggle-dark-icon').classList.add('hidden');
                } else {
                    document.documentElement.classList.remove('dark');
                    document.getElementById('theme-toggle-light-icon').classList.add('hidden');
                    document.getElementById('theme-toggle-dark-icon').classList.remove('hidden');
                }
            }
        });
    </script>

    <script>
        async function viewAlbum(albumId) {
            const modal = document.getElementById('albumViewModal');
            const content = document.getElementById('albumViewContent');
            const title = document.getElementById('albumViewTitle');
            const breadcrumb = document.getElementById('albumBreadcrumb');
            
            try {
                // Ganti URL dari /api/albums ke /view-album
                const response = await fetch(`/view-album/${albumId}`);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                
                const result = await response.json();
                if (result.status === 'error') {
                    throw new Error(result.message);
                }
                
                const data = result.data;
                
                // Tampilkan modal dan isi kontennya
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                
                // Isi judul dan breadcrumb
                title.textContent = data.album_name;
                breadcrumb.innerHTML = `
                    <div class="flex items-center text-sm text-gray-400">
                        <span class="text-indigo-400">${data.kategori.kategori_judul}</span>
                        ${data.parent ? `
                            <span class="mx-2">/</span>
                            <span class="text-gray-400 cursor-pointer hover:text-white" 
                                  onclick="viewAlbum('${data.parent.album_id}')">
                                ${data.parent.album_name}
                            </span>
                        ` : ''}
                        <span class="mx-2">/</span>
                        <span class="text-white">${data.album_name}</span>
                    </div>
                `;

                // Isi konten album
                let contentHtml = '';
                
                // Tampilkan deskripsi jika ada
                if (data.description) {
                    contentHtml += `
                        <div class="bg-white/5 rounded-xl p-4 backdrop-blur-sm mb-6">
                            <p class="text-gray-300">${data.description}</p>
                        </div>
                    `;
                }

                // Tampilkan sub-album jika ada
                if (data.sub_albums && data.sub_albums.length > 0) {
                    contentHtml += `
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold text-white flex items-center mb-4">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                                Sub Album (${data.sub_albums.length})
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                ${data.sub_albums.map(subAlbum => `
                                    <div class="group relative bg-white/5 backdrop-blur-sm rounded-xl overflow-hidden hover:bg-white/10 transition-all duration-300 cursor-pointer"
                                         onclick="viewAlbum('${subAlbum.album_id}')">
                                        <!-- Sub album content -->
                                        <div class="relative aspect-video">
                                            ${subAlbum.cover_image ? 
                                                `<img src="/storage/${subAlbum.cover_image}" 
                                                      alt="${subAlbum.album_name}"
                                                      class="w-full h-full object-cover transform group-hover:scale-110 transition-all duration-500">` :
                                                `<div class="w-full h-full bg-gradient-to-br from-indigo-500/30 to-purple-500/30 flex items-center justify-center">
                                                    <svg class="w-12 h-12 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                    </svg>
                                                </div>`
                                            }
                                        </div>
                                        <div class="p-4">
                                            <h4 class="text-lg font-semibold text-white group-hover:text-indigo-300 transition-colors">
                                                ${subAlbum.album_name}
                                            </h4>
                                            ${subAlbum.description ? 
                                                `<p class="mt-1 text-sm text-gray-400 line-clamp-2">${subAlbum.description}</p>` : 
                                                ''}
                                        </div>
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                    `;
                }

                // Tampilkan foto-foto jika ada
                if (data.photos && data.photos.length > 0) {
                    contentHtml += `
                        <div class="space-y-4">
                            <h3 class="text-xl font-semibold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Foto (${data.photos.length})
                            </h3>
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                ${data.photos.map(photo => `
                                    <div class="group relative aspect-square rounded-xl overflow-hidden cursor-pointer"
                                         onclick="openPhotoModal('${photo.image_path}', '${photo.title}', '${photo.description || ''}')">
                                        <img src="/storage/${photo.image_path}" 
                                             alt="${photo.title}"
                                             class="w-full h-full object-cover transform group-hover:scale-110 transition-all duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                                            <div class="absolute bottom-4 left-4 right-4">
                                                <h4 class="text-white font-medium truncate">${photo.title}</h4>
                                                ${photo.description ? 
                                                    `<p class="text-sm text-gray-300 line-clamp-2 mt-1">${photo.description}</p>` 
                                                    : ''}
                                            </div>
                                        </div>
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                    `;
                }

                // Tampilkan pesan jika album kosong
                if ((!data.photos || data.photos.length === 0) && (!data.sub_albums || data.sub_albums.length === 0)) {
                    contentHtml += `
                        <div class="text-center py-8">
                            <svg class="w-16 h-16 mx-auto text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-gray-400">Album ini masih kosong</p>
                        </div>
                    `;
                }

                content.innerHTML = contentHtml;
                
            } catch (error) {
                console.error('Error loading album:', error);
                alert('Gagal memuat album. Silakan coba lagi nanti.');
            }
        }

        // Fungsi untuk membuka modal foto
        function openPhotoModal(imagePath, title, description) {
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/90';
            modal.innerHTML = `
                <div class="relative max-w-5xl w-full">
                    <button onclick="this.closest('.fixed').remove()" 
                            class="absolute -top-12 right-0 text-white hover:text-gray-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                    <img src="/storage/${imagePath}" 
                         alt="${title}"
                         class="w-full h-auto rounded-lg shadow-2xl">
                    <div class="mt-4 text-white">
                        <h3 class="text-xl font-semibold">${title}</h3>
                        ${description ? `<p class="mt-2 text-gray-300">${description}</p>` : ''}
                    </div>
                </div>
            `;
            
            document.body.appendChild(modal);
            document.body.style.overflow = 'hidden';
            
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.remove();
                    document.body.style.overflow = 'auto';
                }
            });
        }

        function closeAlbumView() {
            const modal = document.getElementById('albumViewModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function closePhotoView() {
            const modal = document.getElementById('photoViewModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modals on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAlbumView();
                const photoModal = document.querySelector('.fixed.inset-0.z-50.flex');
                if (photoModal) {
                    photoModal.remove();
                    document.body.style.overflow = 'auto';
                }
            }
        });
    </script>
</body>
</html>
