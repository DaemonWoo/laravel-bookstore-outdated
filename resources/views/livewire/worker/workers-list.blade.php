<div x-data="{ show: true }" class="min-h-screen bg-gray-100">

    {{-- Navigation --}}
    @livewire('components.navigation')

    <div class="max-w-5xl mx-auto px-4 py-10 space-y-6">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">

            <h1 class="text-2xl font-bold text-gray-800">
                Workers
            </h1>

            <a href="/workers/create" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                + Create Worker
            </a>

        </div>

        {{-- Alert --}}
        @if(session('status'))
        <div x-show="show" x-transition class="relative bg-blue-600 text-white px-4 py-3 rounded-lg shadow">
            <p>{{ session('status') }}</p>

            <button x-on:click="show = false" class="absolute top-2 right-2 text-white hover:text-gray-200">
                ✕
            </button>
        </div>
        @endif

        {{-- Workers list --}}
        <div class="space-y-4">

            @forelse($workers as $worker)

            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition p-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                {{-- Info --}}
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        {{ $worker->name }}
                    </h2>
                    <p class="text-gray-600 text-sm">
                        {{ $worker->email }}
                    </p>
                </div>

                {{-- Actions --}}
                <div class="flex gap-2">

                    <a href="/workers/{{ $worker->id }}/edit" class="px-3 py-1 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition">
                        Edit
                    </a>

                    <button wire:click="deleteWorker({{ $worker->id }})" class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                        Delete
                    </button>

                </div>

            </div>

            @empty

            <div class="text-center text-gray-500 py-10">
                No workers found.
            </div>

            @endforelse

        </div>

    </div>
</div>
