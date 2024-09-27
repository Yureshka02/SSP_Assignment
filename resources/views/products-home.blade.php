<x-app-layout>
    <div class="min-h-screen bg-gray-900" x-data="homepage"> <!-- Keep min-h-screen -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-4"> <!-- Added padding here -->
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="hidden sm:block">
                    <div class="border-b border-gray-700">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            @foreach($categories as $category)
                                <button type="button" x-on:click="changeTab({{ $category->id }})"
                                        class="whitespace-nowrap border-b-2 border-transparent px-1 py-4 text-sm font-medium text-gray-400 hover:border-teal-500 hover:text-teal-500">
                                    {{ $category->name }}
                                </button>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Added margin for spacing -->
            <div class="mt-6">
                <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($categories as $category_parent)
                        @foreach($category_parent->children as $category)
                            <li x-show="{{ $category->parent_id }} === activeTab"
                                x-on:click="changeCategory({{ $category->id }})"
                                class="col-span-1 divide-y divide-gray-700 rounded-lg bg-gray-800 shadow">
                                <div class="flex w-full items-center justify-between space-x-6 p-6">
                                    <div class="flex-1 truncate">
                                        <div class="flex items-center space-x-3">
                                            <h3 class="truncate text-sm font-medium text-gray-200">
                                                {{ $category->name }}
                                            </h3>
                                        </div>
                                        <p class="mt-1 truncate text-sm text-gray-400">
                                            {{ $category->description }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            </div>

            <!-- Added margin for spacing -->
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach($products as $product)
                    <div class="group relative bg-gray-800 p-2 rounded-xl border border-teal-500" x-show="activeCategory === {{ $product->category->id }}">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-700 lg:aspect-none group-hover:opacity-75 lg:h-80">
                            <img src="{{ $product->getFirstMediaUrl('featured') }}" alt="featured image" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-200">
                                    {{ $product->name }}
                                </h3>
                                <p class="mt-1 text-sm text-gray-400">
                                    {{ $product->description }}
                                </p>
                                {{-- @livewire('add-to-cart-btn', ['product' => $product]) --}}
                            </div>
                            <p class="text-sm font-medium text-gray-100">
                                ${{ $product->price }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('homepage', () => ({
                activeTab: 1,
                activeCategory: 1,
                changeTab(index) {
                    this.activeTab = index
                    this.activeCategory = index
                },
                changeCategory(index) {
                    this.activeCategory = index
                }
            }))
        })
    </script>
</x-app-layout>
