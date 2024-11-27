<div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-4">
        {{ __('User Profile') }}
    </h2>
    <div class="mt-4">
        <div class="flex items-center mb-2">
            <strong class="mr-2">{{ __('Name:') }}</strong>
            <span class="text-gray-700 dark:text-gray-300">{{ Auth::user()->name }}</span>
        </div>
        <div class="flex items-center mb-2">
            <strong class="mr-2">{{ __('Email:') }}</strong>
            <span class="text-gray-700 dark:text-gray-300">{{ Auth::user()->email }}</span>
        </div>

        @if(Auth::user()->created_at)
            <div class="flex items-center mb-2">
                <strong class="mr-2">{{ __('Created At:') }}</strong>
                <span class="text-gray-700 dark:text-gray-300">{{ Auth::user()->created_at->format('d M Y') }}</span>
            </div>
        @else
            <div class="flex items-center mb-2">
                <strong class="mr-2">{{ __('Created At:') }}</strong>
                <span class="text-gray-700 dark:text-gray-300">{{ __('Not Available') }}</span>
            </div>
        @endif

        <div class="flex items-center mb-4">
            <strong class="mr-2">{{ __('Role:') }}</strong>
            <span class="text-gray-700 dark:text-gray-300">{{ ucfirst(Auth::user()->role) }}</span>
        </div>

        <!-- Tampilkan tambahan berdasarkan role -->
        @if(Auth::user()->role == 'admin')
            <div class="mt-4">
                <p class="text-sm text-green-600 dark:text-green-400">
                    {{ __('You have admin privileges.') }}
                </p>
            </div>
        @elseif(Auth::user()->role == 'user')
            <div class="mt-4">
                <p class="text-sm text-blue-600 dark:text-blue-400">
                    {{ __('You are a regular user.') }}
                </p>
            </div>
        @endif
    </div>
</div>
