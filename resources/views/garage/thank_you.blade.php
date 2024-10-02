<x-app-layout>


    <main class="bg-gray-900 px-4 pb-24 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl">
            <div class="max-w-xl">
                <h1 class="text-base font-medium text-gray-900">Thank you!</h1>
                <p class="mt-2 text-4xl font-bold tracking-tight text-teal-100">Your Appointment has been booked !</p>
                <p class="mt-2 text-base text-gray-400">Thank You For Choosing Toretto's {{ $order->first_name }} ! Your Appointment has been booked. Toretto's will contact you within 24 hours to confirm your appointment.
                    </p>

                <dl class="mt-12 text-sm font-medium">
                    <dt class="text-teal-200">Progress Tracking number</dt>
                    <dd class="mt-2 text-teal-400">AP000000{{$order->id}}</dd>
                </dl>
            </div>

            <section aria-labelledby="order-heading" class="mt-10 border-t border-gray-700">
                <h2 id="order-heading" class="sr-only">Your order</h2>

                <h3 class="sr-only">Items</h3>
                @foreach($order->garage->serviceProducts as $product)
                    <div class="flex space-x-6 border-b border-gray-700 py-10">
                        <div class="flex flex-auto flex-col">
                            <div>
                                <h4 class="font-medium text-teal-100">
                                    <a href="#" class="hover:text-teal-300">{{ $product->name }}</a>
                                </h4>
                                <p class="mt-2 text-sm text-gray-400">{{ $product->description }}</p>
                            </div>
                            <div class="mt-6 flex flex-1 items-end">
                                <dl class="flex space-x-4 divide-x divide-gray-700 text-sm sm:space-x-6">

                                    <div class="flex pl-4 sm:pl-6">
                                        <dt class="font-medium text-teal-200">Price</dt>
                                        <dd class="ml-2 text-gray-300">${{ $product->pivot->total }}</dd>
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
                            <dt class="font-medium text-teal-200">Toretto's will meet you at below Location</dt>
                            <dd class="mt-2 text-gray-300">
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
                            <dt class="font-medium text-teal-200">Subtotal</dt>
                            <dd class="text-gray-300">${{ $order->garage->total }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="font-medium text-teal-200">Total</dt>
                            <dd class="text-teal-100">${{ $order->garage->total }}</dd>

                        </div>
                        <dt class="font-medium text-teal-600">Notice : Above prices may change after inspection.</dt>
                    </dl>
                </div>
            </section>
        </div>
    </main>
</x-app-layout>
