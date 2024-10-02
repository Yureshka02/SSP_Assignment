<x-app-layout>
 <div class="bg-gray-900 min-h-screen">



    <div class="py-12 bg-gray-900 " x-data="homepage">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="hidden sm:block">
                    <div class="border-b border-gray-700">
                        <!-- Category Tabs -->
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            @foreach($categories as $category)
                                <button type="button" x-on:click="changeTab({{ $category->id }})"
                                        class="whitespace-nowrap border-b-2 border-transparent px-1 py-4 text-sm font-medium text-teal-300 hover:border-teal-400 hover:text-teal-200">
                                    {{ $category->name }}
                                </button>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Child Categories Display -->
            <div class="mt-4">
                <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($categories as $category_parent)
                        @foreach($category_parent->children as $category)
                            <li x-show="activeTab === {{ $category_parent->id }}"
                                x-on:click="changeCategory({{ $category->id }})"
                                class="col-span-1 divide-y divide-gray-700 rounded-lg bg-gray-800 shadow">
                                <div class="flex w-full items-center justify-between space-x-6 p-6">
                                    <div class="flex-1 truncate">
                                        <div class="flex items-center space-x-3">
                                            <h3 class="truncate text-sm font-medium text-teal-100">
                                                {{ $category->name }}
                                            </h3>
                                        </div>
                                        <p class="mt-1 truncate text-sm text-teal-300">
                                            {{ $category->description }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            </div>

            <!-- Products Display -->
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach($products as $product)
                    <div class="group relative bg-gray-800 p-2 rounded-xl" x-show="activeCategory === {{ $product->serviceCategory->id }}">
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-teal-100">
                                    {{ $product->name }}
                                </h3>
                                <p class="mt-1 text-sm text-teal-300">
                                    {{ $product->description }}
                                </p>
                                @livewire('add-to-garage-btn', ['product' => $product])
                            </div>
                            <p class="text-sm font-medium text-teal-200">
                                ${{ $product->price }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
 </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('homepage', () => ({
                activeTab: 1, // Default active tab for parent category
                activeCategory: 1, // Default active category for products

                changeTab(index) {
                    this.activeTab = index;
                    this.activeCategory = index; // Change both active tab and category
                },

                changeCategory(index) {
                    this.activeCategory = index;
                }
            }))
        })
    </script>

</x-app-layout>
