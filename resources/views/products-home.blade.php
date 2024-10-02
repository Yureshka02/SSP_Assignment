<x-app-layout>
    <div class="h-screen bg-gray-900" x-data="homepage">
    <div class="py-12 bg-gray-900" x-data="homepage">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="hidden sm:block">
                    <div class="border-b border-gray-700">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            @foreach($categories as $category)
                                <button type="button" x-on:click="changeTab({{ $category->id }})"
                                        :class="{'border-teal-500 text-teal-400': activeTab === {{ $category->id }}, 'border-transparent text-gray-400 hover:text-gray-300 hover:border-gray-300': activeTab !== {{ $category->id }}}"
                                        class="whitespace-nowrap border-b-2 px-1 py-4 text-sm font-medium">
                                    {{ $category->name }}
                                </button>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($categories as $category_parent)
                        @foreach($category_parent->children as $category)
                            <li x-show="{{ $category->parent_id }} === activeTab"
                                x-on:click="changeCategory({{ $category->id }})"
                                class="col-span-1 divide-y divide-gray-700 rounded-lg bg-gray-800 shadow hover:bg-gray-700 transition duration-150 cursor-pointer">
                                <div class="flex w-full items-center justify-between space-x-6 p-6">
                                    <div class="flex-1 truncate">
                                        <div class="flex items-center space-x-3">
                                            <h3 class="truncate text-sm font-medium text-teal-300">
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

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach($products as $product)
                    <div class="group relative bg-gray-800 p-4 rounded-xl" x-show="activeCategory === {{ $product->category->id }}">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-700 lg:aspect-none group-hover:opacity-75 lg:h-80">
                            <img src="{{ $product->getFirstMediaUrl('featured') }}" alt="Product image" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-teal-300">
                                    {{ $product->name }}
                                </h3>
                                <p class="mt-1 text-sm text-gray-400">
                                    {{ $product->description }}
                                </p>
                                @livewire('add-to-cart-btn', ['product' => $product])
                            </div>
                            <p class="text-sm font-medium text-teal-400">
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
    <footer class="bg-black text-white py-2">  <!-- Reduced vertical padding -->
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">  <!-- Centered vertically -->
            <div class="logo mb-2 md:mb-0 flex-shrink-0">  <!-- Added flex-shrink to prevent logo resizing -->
                <img src="{{ asset('/assets/logo.png') }}" alt="Footer Logo" class="max-w-xs">
            </div>
            <div class="flex flex-col md:flex-row md:space-x-10 items-center">  <!-- Center items vertically -->
                <div class="company mb-2 md:mb-0 text-center md:text-left">  <!-- Center text in smaller screens -->
                    <h4 class="font-semibold mb-1 text-sm">Company</h4>  <!-- Reduced font size -->
                    <ul>
                        <li><a href="#" class="hover:underline text-xs">Home</a></li>  <!-- Reduced font size -->
                        <li><a href="#" class="hover:underline text-xs">About</a></li>
                        <li><a href="#" class="hover:underline text-xs">Services</a></li>
                    </ul>
                </div>
                <div class="legal mb-2 md:mb-0 text-center md:text-left">  <!-- Center text in smaller screens -->
                    <h4 class="font-semibold mb-1 text-sm">Legal</h4>  <!-- Reduced font size -->
                    <ul>
                        <li><a href="#" class="hover:underline text-xs">Terms & Conditions</a></li>
                        <li><a href="#" class="hover:underline text-xs">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="social mb-2 md:mb-0 text-center md:text-left">  <!-- Center text in smaller screens -->
                    <h4 class="font-semibold mb-1 text-sm">Social</h4>  <!-- Reduced font size -->
                    <ul>
                        <li><a href="#" class="hover:underline text-xs">Instagram</a></li>
                        <li><a href="#" class="hover:underline text-xs">Twitter</a></li>
                    </ul>
                </div>
                <div class="contact text-center md:text-left">  <!-- Center text in smaller screens -->
                    <h4 class="font-semibold mb-1 text-sm">Contact</h4>  <!-- Reduced font size -->
                    <p class="text-xs">Email: <a href="mailto:info@thetorettos.com" class="hover:underline">info@thetorettos.com</a></p>
                    <p class="text-xs">Phone: (123) 456-7890</p>
                    <p class="text-xs">Location: 1234 Detailing Ave, City, State</p>
                </div>
            </div>
        </div>
    </footer>
</x-app-layout>
