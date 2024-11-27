<div class="group relative bg-white/5 backdrop-blur-sm rounded-2xl overflow-hidden hover:bg-white/10 transition-all duration-300">
    <!-- Album Cover -->
    <div class="relative aspect-video cursor-pointer" 
         onclick="viewAlbum('{{ $album->album_id }}')">
        @if($album->cover_image)
            <img src="{{ asset('storage/' . $album->cover_image) }}" 
                 alt="{{ $album->album_name }}"
                 class="w-full h-full object-cover transform group-hover:scale-110 transition-all duration-500">
        @else
            <div class="w-full h-full bg-gradient-to-br from-indigo-500/30 to-purple-500/30 flex items-center justify-center">
                <svg class="w-12 h-12 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        @endif

        <!-- Hover Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <div class="absolute bottom-4 left-4 right-4">
                <div class="flex items-center justify-between text-white text-sm">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ $album->photos->count() }} Photos
                    </span>
                    <span class="px-2 py-1 text-xs bg-white/20 rounded-full">
                        {{ $album->kategori->kategori_judul }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Album Info -->
    <div class="p-4">
        <h4 class="text-lg font-semibold text-white group-hover:text-indigo-300 transition-colors">
            {{ $album->album_name }}
        </h4>
        @if($album->description)
            <p class="mt-1 text-sm text-gray-400 line-clamp-2">
                {{ $album->description }}
            </p>
        @endif
    </div>
</div> 