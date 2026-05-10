<div x-data="{ open: false }">
    <nav class="bg-white border-b border-gray-200 dark:bg-gray-900 dark:border-gray-700">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">

                {{-- Logo --}}
                <a href="/" class="flex items-center space-x-2">
                    <img src="/images/logo.png" class="h-8 w-8" alt="Logo" />

                    <span class="text-xl font-semibold text-gray-800 dark:text-white">
                        Bookstore
                    </span>
                </a>

                {{-- Desktop Menu --}}
                <div class="hidden md:flex items-center space-x-6">

                    <a href="/" class="nav-link">Home</a>

                    @if(auth()->user()->isWorker())
                    <a href="/workers" class="nav-link">Workers</a>
                    @endif

                    <a href="/books" class="nav-link">Books</a>

                    @if($user)
                    <a href="/logout" class="btn-outline">Logout</a>
                    @else
                    <a href="/login" class="btn-outline">Login</a>
                    @endif

                </div>

                {{-- Mobile Button --}}
                <button @click="open = !open" class="md:hidden p-2 rounded-md text-gray-600 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-800" aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 5h14M3 10h14M3 15h14" clip-rule="evenodd" />
                    </svg>
                </button>

            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="open" x-transition class="md:hidden border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900">

            <div class="px-4 py-3 space-y-2">

                <a href="/" class="mobile-link">Home</a>

                @if(auth()->user()->isWorker())
                <a href="/workers" class="mobile-link">Workers</a>
                @endif

                <a href="/books" class="mobile-link">Books</a>

                <a href="/parse-table" class="mobile-link">Parse table</a>

                @if($user)
                <a href="/logout" class="mobile-link">Logout</a>
                @else
                <a href="/login" class="mobile-link">Login</a>
                @endif

            </div>
        </div>

    </nav>
</div>

{{-- Reusable styles (Blade-friendly) --}}
<style>
    .nav-link {
        @apply text-gray-700 dark: text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 font-medium;
    }

    .btn-outline {
        @apply px-3 py-1 border border-cyan-500 text-gray-700 dark: text-gray-200 rounded-md hover:bg-cyan-50 dark:hover:bg-gray-800;
    }

    .mobile-link {
        @apply block px-3 py-2 rounded-md text-gray-700 dark: text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800;
    }

</style>
