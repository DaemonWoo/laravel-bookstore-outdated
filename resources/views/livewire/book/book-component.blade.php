<div class="min-h-screen bg-gray-100 py-10 px-4">

    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-md p-6 space-y-6">

        {{-- Header --}}
        <div class="text-center space-y-2">
            <h1 class="text-2xl font-bold text-gray-800">
                {{ $book->title }}
            </h1>

            {{-- Cover --}}
            <div class="flex justify-center">
                @php
                $isExternal = str_starts_with($book->cover, 'http');
                $cover = $isExternal
                ? $book->cover
                : asset('storage/' . substr($book->cover, 7));
                @endphp

                <img src="{{ $isExternal ? $cover : asset('storage/' . substr($book->cover, 7)) }}" onerror="this.src='https://img.freepik.com/free-vector/abstract-elegant-winter-book-cover_23-2148798745.jpg?w=800'" class="w-40 h-56 object-cover rounded-lg shadow" alt="Book cover" />
            </div>

            <p class="text-gray-600">Author: <span class="font-medium">{{ $book->author }}</span></p>
            <p class="text-yellow-600 font-semibold">
                Rating: {{ $book->rating }} / 5
            </p>
        </div>

        {{-- Comment Input --}}
        <div class="flex flex-col sm:flex-row gap-3 border rounded-xl p-3 bg-gray-50">

            <input wire:model.lazy="commentText" type="text" placeholder="Write a comment..." class="flex-1 px-3 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-blue-400" />

            <button wire:click="addComment({{ $book->id }})" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Add
            </button>
        </div>

        {{-- Comments --}}
        <div class="space-y-3">

            <h2 class="text-lg font-semibold text-gray-800">
                Comments
            </h2>

            @forelse($comments as $comment)
            <div class="border rounded-xl p-4 bg-white shadow-sm space-y-2">

                <p class="text-gray-800">
                    {{ $comment->text }}
                </p>

                <div class="flex justify-between items-center text-sm text-gray-500">

                    <span>
                        Author: <span class="font-medium text-gray-700">
                            {{ $comment->user->name }}
                        </span>
                    </span>

                    @if(auth()->check() && auth()->id() === $comment->user_id)
                    <button wire:click="deleteComment({{ $comment->id }})" class="text-red-500 hover:text-red-700">
                        Delete
                    </button>
                    @endif

                </div>

            </div>
            @empty
            <p class="text-gray-500 text-center py-6">
                No comments yet. Be the first to write one.
            </p>
            @endforelse

        </div>

    </div>
</div>
