<div class="min-h-screen bg-gray-100 ">

    {{-- Optional navigation --}}
    @if(str_ends_with($cUrl, 'books'))
        @livewire('components.navigation')
    @endif

    <div class="max-w-6xl mx-auto px-4 space-y-6">

        {{-- Header / Actions --}}
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">

            @if(auth()->check() && auth()->user()->isWorker())
                <a href="/books/create"
                   class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    + Create Book
                </a>
            @endif

        </div>

        {{-- Books grid --}}
        <div class="bg-white rounded-2xl shadow-md p-6">

            @if(!$books->count())
                <p class="text-center text-gray-500 py-10">
                    No books yet
                </p>
            @endif

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                @foreach($books as $book)
                    <div class="border rounded-xl p-4 bg-gray-50 hover:shadow-md transition flex flex-col">

                        {{-- Category --}}
                        {{-- <span class="text-xs text-gray-500 mb-2">
                            Category: {{ $book->category_id }}
                        </span> --}}

                        {{-- Link --}}
                        <a href="/books/{{ $book->id }}" class="space-y-2 flex-1">

                            <h2 class="text-lg font-semibold text-gray-800">
                                {{ $book->title }}
                            </h2>

                            <p class="text-sm text-gray-600">
                                {{ $book->author }}
                            </p>

                            <p class="text-sm text-gray-500 line-clamp-3">
                                {{ $book->description }}
                            </p>

                            <p class="text-yellow-600 font-medium">
                                Rating: {{ $book->rating }}
                            </p>

                            @php
                                $isExternal = str_starts_with($book->cover, 'http');
                                $cover = $isExternal
                                ? $book->cover
                                : asset('storage/' . substr($book->cover, 7));
                            @endphp

                            <img src="{{ $cover }}" class="w-full h-48 object-cover rounded-lg mt-2" alt="cover"/>

                        </a>

                        {{-- Admin actions --}}
                        @if(auth()->check() && auth()->user()->isWorker())
                            <div class="flex gap-2 mt-4">

                                <a href="/books/{{ $book->id }}/edit"
                                   class="flex-1 text-center bg-sky-500 hover:bg-sky-600 text-white rounded-lg py-2">
                                    Edit
                                </a>

                                <button wire:click="deleteBook({{ $book->id }})"
                                        class="flex-1 bg-red-500 hover:bg-red-600 text-white rounded-lg py-2">
                                    Delete
                                </button>

                            </div>
                        @endif

                    </div>
                @endforeach

            </div>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $books->links() }}
            </div>

        </div>
    </div>
</div>
