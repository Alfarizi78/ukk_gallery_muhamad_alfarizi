<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Add Photos to Album:') }} {{ $album->album_name }}
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Upload multiple photos to this album</p>
            </div>
            <a href="{{ route('admin.album.show', $album->album_id) }}" 
               class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-gray-500 hover:bg-gray-700 text-white font-bold rounded-lg transition-all duration-300 hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Album
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6">
                    <form action="{{ route('admin.photo.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <input type="hidden" name="album_id" value="{{ $album->album_id }}">

                        <!-- Title Prefix -->
                        <div>
                            <x-input-label for="title_prefix" :value="__('Title Prefix (for multiple photos)')" />
                            <x-text-input id="title_prefix" 
                                         name="title_prefix" 
                                         type="text" 
                                         class="mt-1 block w-full" 
                                         :value="old('title_prefix')" 
                                         placeholder="e.g., Event 2024"/>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Photos will be titled: [Prefix] - Photo 1, [Prefix] - Photo 2, etc.</p>
                        </div>

                        <!-- Description -->
                        <div>
                            <x-input-label for="description" :value="__('Description (will apply to all photos)')" />
                            <textarea id="description" 
                                      name="description" 
                                      class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                      rows="4">{{ old('description') }}</textarea>
                        </div>

                        <!-- Multiple Images -->
                        <div>
                            <x-input-label for="images" :value="__('Photos (You can select multiple files)')" />
                            <div class="mt-2">
                                <input type="file" 
                                       id="images" 
                                       name="images[]" 
                                       accept="image/*" 
                                       multiple
                                       class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400
                                              file:mr-4 file:py-2 file:px-4
                                              file:rounded-lg file:border-0
                                              file:text-sm file:font-medium
                                              file:bg-indigo-50 file:text-indigo-700
                                              hover:file:bg-indigo-100
                                              dark:file:bg-indigo-900 dark:file:text-indigo-300
                                              dark:hover:file:bg-indigo-800
                                              transition-colors duration-200"
                                       required />
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    <span class="hidden sm:inline">You can select multiple photos by holding Ctrl (Windows) or Cmd (Mac)</span>
                                    <span class="sm:hidden">Tap to select multiple photos</span>
                                </p>
                            </div>
                        </div>

                        <!-- Preview Images -->
                        <div id="imagePreview" class="hidden mt-6">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Preview</h3>
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4" id="previewGrid"></div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex flex-col sm:flex-row justify-end gap-3 pt-6">
                            <button type="button"
                                    onclick="history.back()"
                                    class="w-full sm:w-auto inline-flex justify-center items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="w-full sm:w-auto inline-flex justify-center items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                </svg>
                                Upload Photos
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const imageInput = document.getElementById('images');
        const previewGrid = document.getElementById('previewGrid');
        const previewContainer = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function() {
            previewGrid.innerHTML = ''; // Clear previous previews
            
            if (this.files.length > 0) {
                previewContainer.classList.remove('hidden');
                
                Array.from(this.files).forEach((file, index) => {
                    const reader = new FileReader();
                    const previewCard = document.createElement('div');
                    previewCard.className = 'relative group';
                    
                    reader.onload = function(e) {
                        previewCard.innerHTML = `
                            <div class="relative aspect-square rounded-lg overflow-hidden shadow-md bg-gray-100 dark:bg-gray-700">
                                <img src="${e.target.result}" 
                                     class="w-full h-full object-cover" 
                                     alt="Preview ${index + 1}">
                                <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <div class="text-white text-center p-2">
                                        <p class="text-sm font-medium">Photo ${index + 1}</p>
                                        <p class="text-xs mt-1">${formatFileSize(file.size)}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                    }
                    
                    reader.readAsDataURL(file);
                    previewGrid.appendChild(previewCard);
                });
            } else {
                previewContainer.classList.add('hidden');
            }
        });

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
    </script>
    @endpush
</x-app-layout> 