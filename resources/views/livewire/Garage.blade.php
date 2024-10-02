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

        <div class="fixed bottom-20 right-3 bg-gray-800 rounded-full shadow p-2"> <!-- Dark background -->
            <a href="#" class="group -m-2 flex items-center p-2" x-on:click="open = true">
                <!-- Garage Icon SVG -->
                <svg class="h-10 flex-shrink-0 text-teal-400 group-hover:text-teal-300" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 12l1.5 1.5v6h16.5v-6l1.5-1.5V8.25L12 3 2.25 8.25V12zM9 12h6v4.5H9V12z"></path> <!-- Garage icon path -->
                </svg>

                <!-- Item Count -->
                <span class="ml-2 text-sm font-medium text-teal-700 group-hover:text-teal-600 absolute top-0 right-0 bg-teal-100 w-1/2 rounded-full text-center p-1 bg-opacity-75">
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
                            <div class="flex h-full flex-col overflow-y-scroll bg-gray-900 shadow-xl"> <!-- Dark background -->
                                <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                    <div class="flex items-start justify-between">
                                        <h2 class="text-lg font-medium text-teal-200" id="slide-over-title">My Garage</h2> <!-- Teal text -->
                                        <div class="ml-3 flex h-7 items-center">
                                            <button type="button"
                                                    x-on:click="open = false"
                                                    class="relative -m-2 p-2 text-teal-400 hover:text-teal-300">
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
                                            <ul role="list" class="-my-6 divide-y divide-gray-700"> <!-- Dark divider -->
                                                @if($cart->serviceProducts->count())
                                                    @foreach($cart->serviceProducts as $product) <!-- Update to use serviceProducts -->
                                                    <li class="flex py-6">

                                                        <div class="ml-4 flex flex-1 flex-col">
                                                            <div>
                                                                <div
                                                                    class="flex justify-between text-base font-medium text-teal-200"> <!-- Teal text -->
                                                                    <h3>
                                                                        <a href="#" class="text-teal-200 hover:text-teal-400">{{ $product->name }}</a>
                                                                    </h3>
                                                                    <p class="ml-4 text-teal-300">$ {{ $product->price }}</p>
                                                                </div>
                                                                <p class="mt-1 text-sm text-teal-400">{{ $product->description }}</p> <!-- Teal text -->
                                                            </div>
                                                            <div
                                                                class="flex flex-1 items-end justify-between text-sm">


                                                                <div class="flex">
                                                                    <button type="button"
                                                                            wire:click="removeProduct({{ $product->id }})"
                                                                            class="font-medium text-teal-400 hover:text-teal-300">
                                                                        Remove
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                @else
                                                    <li>
                                                        <p class="text-teal-200">Sorry, your Garage is empty</p> <!-- Teal text -->
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-t border-gray-700 px-4 py-6 sm:px-6"> <!-- Dark border -->
                                    <div class="flex justify-between text-base font-medium text-teal-200"> <!-- Teal text -->
                                        <p>Subtotal</p>
                                        <p class="text-teal-300">${{ $cart->total }}</p> <!-- Teal text -->
                                    </div>
                                    <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                                    <div class="mt-6">
                                        <a href="{{ route('garage-checkout') }}"
                                           class="flex items-center justify-center rounded-md border border-transparent bg-teal-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-teal-700">Checkout</a>
                                    </div>
                                    <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                        <p>
                                            or
                                            <button type="button" x-on:click="open = false"
                                                    class="font-medium text-teal-400 hover:text-teal-300">
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
