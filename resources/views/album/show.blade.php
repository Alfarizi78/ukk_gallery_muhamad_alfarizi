<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $album->album_name }} - Gallery</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased elegant-gradient min-h-screen">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl border-b border-gray-100 dark:border-gray-700">
        <!-- ... (gunakan navigasi yang sama dengan welcome.blade.php) ... -->
    </nav>

    <div class="pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <div class="mb-6 flex items-center space-x-2 text-sm text-gray-300">
                <a href="{{ route('welcome') }}#galeri" class="hover:text-white transition-colors">Galeri</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                @foreach($breadcrumbs as $parent)
                    <a href="{{ route('album.show', $parent) }}" class="hover:text-white transition-colors">
                        {{ $parent->album_name }}
                    </a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                @endforeach
                <span class="text-white">{{ $album->album_name }}</span>
            </div>

            <!-- Album Header -->
            <div class="glass-card rounded-2xl p-6 mb-8">
                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Cover Image -->
                    <div class="w-full md:w-1/3">
                        @if($album->cover_image)
                            <img src="{{ asset('storage/' . $album->cover_image) }}" 
                                 alt="{{ $album->album_name }}"
                                 class="w-full rounded-lg aspect-video object-cover">
                        @else
                            <div class="w-full aspect-video bg-gradient-to-br from-indigo-500/30 to-purple-500/30 rounded-lg flex items-center justify-center">
                                <svg class="w-16 h-16 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <!-- Album Info -->
                    <div class="w-full md:w-2/3">
                        <h1 class="text-3xl font-bold text-white mb-2">{{ $album->album_name }}</h1>
                        <div class="flex items-center gap-4 mb-4">
                            <span class="px-3 py-1 bg-indigo-500/20 rounded-full text-indigo-300 text-sm">
                                {{ $album->kategori->kategori_judul }}
                            </span>
                            <span class="text-gray-400 text-sm flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ $album->photos->count() }} Photos
                            </span>
                        </div>
                        @if($album->description)
                            <p class="text-gray-300">{{ $album->description }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sub Albums (if any) -->
            @if($album->children->count() > 0)
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-white mb-4">Sub Albums</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach($album->children as $subAlbum)
                            <a href="{{ route('album.show', $subAlbum) }}" 
                               class="group bg-white/5 backdrop-blur-sm rounded-2xl overflow-hidden hover:bg-white/10 transition-all duration-300">
                                <div class="relative aspect-video">
                                    @if($subAlbum->cover_image)
                                        <img src="{{ asset('storage/' . $subAlbum->cover_image) }}" 
                                             alt="{{ $subAlbum->album_name }}"
                                             class="w-full h-full object-cover transform group-hover:scale-110 transition-all duration-500">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-indigo-500/30 to-purple-500/30 flex items-center justify-center">
                                            <svg class="w-12 h-12 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-white group-hover:text-indigo-300 transition-colors">
                                        {{ $subAlbum->album_name }}
                                    </h3>
                                    <div class="flex items-center justify-between mt-2 text-sm text-gray-400">
                                        <span>{{ $subAlbum->photos->count() }} Photos</span>
                                        <span>{{ $subAlbum->children->count() }} Sub Albums</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Photos Grid -->
            @if($album->photos->count() > 0)
                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">Photos</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                        @foreach($album->photos as $photo)
                            <div class="group relative aspect-square rounded-lg overflow-hidden cursor-pointer"
                                 onclick="openLightbox('{{ asset('storage/' . $photo->image_path) }}', '{{ $photo->title }}', '{{ $photo->description }}')">
                                <img src="{{ asset('storage/' . $photo->image_path) }}" 
                                     alt="{{ $photo->title }}"
                                     class="w-full h-full object-cover transform group-hover:scale-110 transition-all duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    @if($photo->title || $photo->description)
                                        <div class="absolute bottom-2 left-2 right-2 text-white">
                                            @if($photo->title)
                                                <h4 class="font-medium">{{ $photo->title }}</h4>
                                            @endif
                                            @if($photo->description)
                                                <p class="text-sm text-gray-200 line-clamp-2">{{ $photo->description }}</p>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 bg-black/90 hidden z-50">
        <!-- ... (gunakan lightbox yang sama dengan welcome.blade.php) ... -->
    </div>

    <script>
        // ... (gunakan script lightbox yang sama dengan welcome.blade.php) ...
    </script>
</body>
</html> 