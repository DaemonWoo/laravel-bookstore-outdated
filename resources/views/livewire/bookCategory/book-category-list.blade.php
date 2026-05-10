<div class="space-y-3">

    @forelse($cats as $cat)

    <div class="flex items-center justify-between bg-white border rounded-xl p-4 shadow-sm hover:shadow-md transition">

        {{-- Title --}}
        <h3 class="text-gray-800 font-medium">
            {{ $cat->title }}
        </h3>

        {{-- Actions --}}
        @if(auth()->check() && auth()->user()->isWorker())
        <div class="flex gap-2">

            <a href="/categories/{{ $cat->id }}/edit" class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                Edit
            </a>

            <button wire:click="deleteCategory({{ $cat->id }})" class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                Delete
            </button>

        </div>
        @endif

    </div>

    @empty

    <div class="text-center py-6 text-gray-500">
        No categories yet!
    </div>

    @endforelse

</div>
