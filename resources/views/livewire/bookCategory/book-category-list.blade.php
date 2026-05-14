<div class="space-y-4">

    @forelse($cats as $cat)

        <div class="bg-white border border-gray-200 rounded-2xl p-4 shadow-sm hover:shadow-md transition">

            {{-- Category Title --}}
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                {{ $cat->title }}
            </h3>

            {{-- Actions --}}
            @if(auth()->check() && auth()->user()->isWorker())

                <div class="flex gap-2">

                    <a
                        href="/categories/{{ $cat->id }}/edit"
                        class="flex-1 text-center px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition"
                    >
                        Edit
                    </a>

                    <button
                        wire:click="deleteCategory({{ $cat->id }})"
                        class="flex-1 px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition"
                    >
                        Delete
                    </button>

                </div>

            @endif

        </div>

    @empty

        <div class="text-center py-8 bg-gray-50 rounded-2xl border border-dashed border-gray-300">

            <p class="text-gray-500">
                No categories yet!
            </p>

        </div>

    @endforelse

</div>
