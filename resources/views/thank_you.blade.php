<x-app-layout>
    <div class="bg-gray-900 h-full px-4 pb-24 sm:px-6 lg:px-8">
    <main class="bg-gray-900 px-4 pb-24 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl bg-gray-900">
            <div class="max-w-xl" >
                <h1 class="text-base font-medium text-gray-900  ">Thank you for Shopping with Us!</h1>


                <p class="mt-2 text-4xl font-bold tracking-tight text-teal-100">It's on the way!</p>
                <p class="mt-2 text-base text-teal-300">Your order #{{ $order->id }} has shipped and will be with you
                    soon.</p>

                <dl class="mt-12 text-sm font-medium">
                    <dt class="text-teal-100">Tracking number </dt>
                    <dd class="mt-2 text-teal-400">#000000{{ $order->id }}</dd>
                </dl>
            </div>

            <section aria-labelledby="order-heading" class="mt-10 border-t border-gray-700">
                <h2 id="order-heading" class="sr-only">Your order</h2>

                <h3 class="sr-only">Items</h3>
                @foreach($order->cart->products as $product)
                    <div class="flex space-x-6 border-b border-gray-700 py-10">
                        <img src="{{ $product->getFirstMediaUrl('featured') }}"
                             alt="{{ $product->name }}"
                             class="h-20 w-20 flex-none rounded-lg bg-gray-800 object-cover object-center sm:h-40 sm:w-40">
                        <div class="flex flex-auto flex-col">
                            <div>
                                <h4 class="font-medium text-teal-100">
                                    <a href="#">{{ $product->name }}</a>
                                </h4>
                                <p class="mt-2 text-sm text-teal-300">{{ $product->description }}</p>
                            </div>
                            <div class="mt-6 flex flex-1 items-end">
                                <dl class="flex space-x-4 divide-x divide-gray-700 text-sm sm:space-x-6">
                                    <div class="flex">
                                        <dt class="font-medium text-teal-200">Quantity</dt>
                                        <dd class="ml-2 text-teal-300">{{ $product->pivot->quantity }}</dd>
                                    </div>
                                    <div class="flex pl-4 sm:pl-6">
                                        <dt class="font-medium text-teal-200">Price</dt>
                                        <dd class="ml-2 text-teal-300">${{ $product->pivot->total }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="sm:ml-40 sm:pl-6">
                    <h3 class="sr-only">Your information</h3>

                    <h4 class="sr-only">Addresses</h4>
                    <dl class="grid grid-cols-2 gap-x-6 py-10 text-sm">
                        <div>
                            <dt class="font-medium text-teal-100">Billing address</dt>
                            <dd class="mt-2 text-teal-300">
                                <address class="not-italic">
                                    <span class="block">
                                        {{ $order->first_name }} {{ $order->last_name }}
                                    </span>
                                    <span class="block">{{ $order->address }}</span>
                                    <span class="block">
                                        {{ $order->apartment }},
                                        {{ $order->city }},
                                        {{ $order->country }},
                                        {{ $order->region }},
                                        {{ $order->postal_code }}
                                    </span>
                                </address>
                            </dd>
                        </div>
                    </dl>

                    <h3 class="sr-only">Summary</h3>

                    <dl class="space-y-6 border-t border-gray-700 pt-10 text-sm">
                        <div class="flex justify-between">
                            <dt class="font-medium text-teal-100">Subtotal</dt>
                            <dd class="text-teal-300">${{ $order->cart->total }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="font-medium text-teal-100">Total</dt>
                            <dd class="text-teal-100">${{ $order->cart->total }}</dd>
                        </div>
                    </dl>
                </div>
            </section>
        </div>
    </main>
    </div>

</x-app-layout>
