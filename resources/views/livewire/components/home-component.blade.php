<div x-data="{ show: true }" class="min-h-screen bg-gray-100">

    {{-- Navigation --}}
    @livewire('components.navigation', [
    'cats' => $cats
    ])

    {{-- Flash Message --}}
    @if(session('message'))
    <div x-show="show" x-transition class="max-w-7xl mx-auto mt-6 px-4">
        <div class="relative flex items-center justify-between rounded-lg bg-blue-600 text-white px-5 py-4 shadow-md">
            <p class="text-sm md:text-base">
                {{ session('message') }}
            </p>

            <button x-on:click="show = false" class="ml-4 text-white hover:text-gray-200 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    {{-- Main Content --}}
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

            {{-- Sidebar --}}
            <aside class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-md p-6 sticky top-4">

                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-800">
                            Categories
                        </h2>

                        @if(auth()->user()->isWorker())
                        <a href="/categories/create" class="inline-flex items-center rounded-lg bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-700 transition">
                            + New
                        </a>
                        @endif
                    </div>

                    @livewire('book-categories.book-category-list', [
                    'cats' => $cats
                    ])
                </div>
            </aside>

            {{-- Content --}}
            <main class="lg:col-span-3">
                <div class="bg-white rounded-2xl shadow-md p-6">
                    @livewire('books.books-component', [
                    'user' => $user
                    ])
                </div>
            </main>

        </div>
    </div>
</div>
