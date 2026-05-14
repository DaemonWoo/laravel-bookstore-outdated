<div class="min-h-screen bg-gray-100 py-10 px-4">

    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-md p-8">

        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                Edit Category
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Update category information below.
            </p>
        </div>

        {{-- Form --}}
        <form wire:submit.prevent="updateCategory" class="space-y-6">

            {{-- Title --}}
            <div>
                <label for="title"
                       class="block text-sm font-medium text-gray-700 mb-1">
                    Title
                </label>

                <input
                    wire:model.lazy="title"
                    id="title"
                    type="text"
                    required
                    autofocus
                    placeholder="Enter category title"
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                    @error('title') border-red-500 @else border-gray-300 @enderror"
                />

                <p class="mt-1 text-sm text-gray-500">
                    Current: {{ $cat->title }}
                </p>

                @error('title')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
                @enderror
            </div>

            {{-- Slug --}}
            <div>
                <label for="slug"
                       class="block text-sm font-medium text-gray-700 mb-1">
                    Slug
                </label>

                <input
                    wire:model.lazy="slug"
                    id="slug"
                    type="text"
                    required
                    placeholder="Enter category slug"
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                    @error('slug') border-red-500 @else border-gray-300 @enderror"
                />

                <p class="mt-1 text-sm text-gray-500">
                    Current: {{ $cat->slug }}
                </p>

                @error('slug')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
                @enderror
            </div>

            {{-- Submit --}}
            <div>
                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 rounded-lg transition"
                >
                    Update Category
                </button>
            </div>

        </form>

    </div>
</div>
