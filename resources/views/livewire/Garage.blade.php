<?php

use function Livewire\Volt\{state, mount, on};

state([
    'cart' => null,
    'show_garage' => false
]);

mount(function () {
    $this->cart = (new \App\Models\Garage())
        ->where('user_id', auth()->id())
        ->where('is_paid', 0)
        ->with('serviceProducts') // Use the correct relationship name
        ->first();
});

// Listen to the event openCart and show the cart
on(['openGarage' => function () {
    $this->show_garage = true;
}]);

$removeProduct = function ($product_id) {
    // Remove the product from the cart based on the ID
    $this->cart->serviceProducts()->detach($product_id);
};

?>

<div x-data="{ open: @entangle('show_garage') }">
    @if($cart)
        {{-- Cart Icon --}}
        <div class="fixed bottom-20 right-3 bg-white rounded-full shadow p-2"> <!-- Moved higher with bottom-20 -->
            <a href="#" class="group -m-2 flex items-center p-2" x-on:click="open = true">
                <!-- Garage Icon SVG -->
                <svg class="h-10 flex-shrink-0 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 12l1.5 1.5v6h16.5v-6l1.5-1.5V8.25L12 3 2.25 8.25V12zM9 12h6v4.5H9V12z"></path> <!-- Garage icon path -->
                </svg>

                <!-- Item Count -->
                <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800 absolute top-0 right-0 bg-red-100 w-1/2 rounded-full text-center p-1 bg-opacity-75">
            {{ $cart->serviceProducts->count() }} <!-- Update to use serviceProducts -->
        </span>

                <span class="sr-only">items in garage, view garage</span> <!-- Updated label -->
            </a>
        </div>


        <div x-show="open" class="relative z-10"
             aria-labelledby="slide-over-title" role="dialog"
             aria-modal="true">
            <div x-show="open" x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500"
                 x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">

                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10"
                         x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                         x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                         x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                         x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
                        <div class="pointer-events-auto w-screen max-w-md">
                            <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                                <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                    <div class="flex items-start justify-between">
                                        <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">My Garage</h2>
                                        <div class="ml-3 flex h-7 items-center">
                                            <button type="button"
                                                    x-on:click="open = false"
                                                    class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                                                <span class="absolute -inset-0.5"></span>
                                                <span class="sr-only">Close panel</span>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                     stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mt-8">
                                        <div class="flow-root">
                                            <ul role="list" class="-my-6 divide-y divide-gray-200">
                                                @if($cart->serviceProducts->count())
                                                    @foreach($cart->serviceProducts as $product) <!-- Update to use serviceProducts -->
                                                    <li class="flex py-6">

                                                        <div class="ml-4 flex flex-1 flex-col">
                                                            <div>
                                                                <div
                                                                    class="flex justify-between text-base font-medium text-gray-900">
                                                                    <h3>
                                                                        <a href="#">{{ $product->name }}</a>
                                                                    </h3>
                                                                    <p class="ml-4">$ {{ $product->price }}</p>
                                                                </div>
                                                                <p class="mt-1 text-sm text-gray-500">{{ $product->description }}</p>
                                                            </div>
                                                            <div
                                                                class="flex flex-1 items-end justify-between text-sm">


                                                                <div class="flex">
                                                                    <button type="button"
                                                                            wire:click="removeProduct({{ $product->id }})"
                                                                            class="font-medium text-indigo-600 hover:text-indigo-500">
                                                                        Remove
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                @else
                                                    <li>
                                                        Sorry, your Garage is empty
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <p>Subtotal</p>
                                        <p>${{ $cart->total }}</p>
                                    </div>
                                    <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                                    <div class="mt-6">
                                        <a href="{{ route('checkout') }}"
                                           class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
                                    </div>
                                    <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                        <p>
                                            or
                                            <button type="button" x-on:click="open = false"
                                                    class="font-medium text-indigo-600 hover:text-indigo-500">
                                                Continue Shopping
                                                <span aria-hidden="true"> &rarr;</span>
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
