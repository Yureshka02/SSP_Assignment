<x-app-layout>


    <div class="bg-gray-900 min-h-screen">
        <div class="mx-auto max-w-2xl px-4 pb-24 pt-8 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Checkout</h2>

            <form class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16"
                  method="post" action="{{ route('garage.complete') }}">
                @csrf

                <input type="hidden" name="garage_id" value="{{ $cart->id }}" />

                <div>
                    <div class="">
                        <h2 class="text-lg font-medium text-teal-100">Customer information</h2>

                        <div class="mt-4">
                            <label for="email-address" class="block text-sm font-medium text-teal-200">Email address</label>
                            <div class="mt-1">
                                <input type="email" id="email-address" name="email" autocomplete="email"
                                       value="{{ $user->email }}"
                                       class="block w-full rounded-md border-gray-700 bg-gray-800 text-teal-100 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                            <div>
                                <label for="first-name" class="block text-sm font-medium text-teal-200">First name</label>
                                <div class="mt-1">
                                    <input type="text" id="first-name" name="first_name" autocomplete="given-name"
                                           value="{{$user->name}}" class="block w-full rounded-md border-gray-700 bg-gray-800 text-teal-100 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="last-name" class="block text-sm font-medium text-teal-200">Last name</label>
                                <div class="mt-1">
                                    <input type="text" id="last-name" name="last_name" autocomplete="family-name" class="block w-full rounded-md border-gray-700 bg-gray-800 text-teal-100 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="company" class="block text-sm font-medium text-teal-200">Company</label>
                                <div class="mt-1">
                                    <input type="text" name="company" id="company" class="block w-full rounded-md border-gray-700 bg-gray-800 text-teal-100 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="address" class="block text-sm font-medium text-teal-200">Address</label>
                                <div class="mt-1">
                                    <input type="text" name="address" id="address" autocomplete="street-address" class="block w-full rounded-md border-gray-700 bg-gray-800 text-teal-100 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="apartment" class="block text-sm font-medium text-teal-200">Apartment, suite, etc.</label>
                                <div class="mt-1">
                                    <input type="text" name="apartment" id="apartment" class="block w-full rounded-md border-gray-700 bg-gray-800 text-teal-100 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="city" class="block text-sm font-medium text-teal-200">City</label>
                                <div class="mt-1">
                                    <input type="text" name="city" id="city" autocomplete="address-level2" class="block w-full rounded-md border-gray-700 bg-gray-800 text-teal-100 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="country" class="block text-sm font-medium text-teal-200">Country</label>
                                <div class="mt-1">
                                    <select id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-gray-700 bg-gray-800 text-teal-100 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                        <option>Sri Lanka</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="region" class="block text-sm font-medium text-teal-200">State / Province</label>
                                <div class="mt-1">
                                    <input type="text" name="region" id="region" autocomplete="address-level1" class="block w-full rounded-md border-gray-700 bg-gray-800 text-teal-100 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="postal-code" class="block text-sm font-medium text-teal-200">Postal code</label>
                                <div class="mt-1">
                                    <input type="text" name="postal_code" id="postal-code" autocomplete="postal-code" class="block w-full rounded-md border-gray-700 bg-gray-800 text-teal-100 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="phone" class="block text-sm font-medium text-teal-200">Phone</label>
                                <div class="mt-1">
                                    <input type="text" name="phone" id="phone" autocomplete="tel" class="block w-full rounded-md border-gray-700 bg-gray-800 text-teal-100 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment -->
                    <div class="mt-10 border-t border-gray-700 pt-10">
                        <h2 class="text-lg font-medium text-teal-100">Payment</h2>
                        <div class="mt-6 grid grid-cols-4 gap-x-4 gap-y-6">
                            <div class="col-span-4">
                                <label for="card-number" class="block text-sm font-medium text-teal-200">Card number</label>
                                <div class="mt-1">
                                    <input type="text" id="card-number" name="card_number" autocomplete="cc-number" class="block w-full rounded-md border-gray-700 bg-gray-800 text-teal-100 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="col-span-4">
                                <label for="name-on-card" class="block text-sm font-medium text-teal-200">Name on card</label>
                                <div class="mt-1">
                                    <input type="text" id="name-on-card" name="name_on_card" autocomplete="cc-name" class="block w-full rounded-md border-gray-700 bg-gray-800 text-teal-100 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="col-span-3">
                                <label for="expiration-date" class="block text-sm font-medium text-teal-200">Expiration date (MM/YY)</label>
                                <div class="mt-1">
                                    <input type="text" name="expiration_date" id="expiration_date" autocomplete="cc-exp" class="block w-full rounded-md border-gray-700 bg-gray-800 text-teal-100 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="cvc" class="block text-sm font-medium text-teal-200">CVC</label>
                                <div class="mt-1">
                                    <input type="text" name="cvc" id="cvc" autocomplete="csc" class="block w-full rounded-md border-gray-700 bg-gray-800 text-teal-100 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order summary -->
                <div class="mt-10 lg:mt-0">
                    <h2 class="text-lg font-medium text-teal-100">Order summary</h2>

                    <div class="mt-4 rounded-lg border border-gray-700 bg-gray-800 shadow-sm">
                        <h3 class="sr-only">Items in your cart</h3>
                        <ul role="list" class="divide-y divide-gray-700">
                            @foreach($cart->serviceProducts as $product)
                                <li class="flex px-4 py-6 sm:px-6">
                                    <div class="ml-6 flex flex-1 flex-col">
                                        <div class="flex">
                                            <div class="min-w-0 flex-1">
                                                <h4 class="text-sm">
                                                    <a href="#" class="font-medium text-teal-300 hover:text-teal-200">{{ $product->name }}</a>
                                                </h4>
                                                <p class="mt-1 text-sm text-gray-400">{{ $product->description }}</p>
                                            </div>

                                            <div class="ml-4 flow-root flex-shrink-0">
                                                <button type="button" class="-m-2.5 flex items-center justify-center bg-gray-800 p-2.5 text-gray-400 hover:text-teal-500">
                                                    <span class="sr-only">Remove</span>
                                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="flex flex-1 items-end justify-between pt-2">
                                            <p class="mt-1 text-sm font-medium text-teal-200">$ {{ $product->pivot->total }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <dl class="space-y-6 border-t border-gray-700 px-4 py-6 sm:px-6">
                            <div class="flex items-center justify-between">
                                <dt class="text-sm text-teal-200">Subtotal</dt>
                                <dd class="text-sm font-medium text-teal-100">${{ $cart->total }}</dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-sm text-teal-200">Service Charge</dt>
                                <dd class="text-sm font-medium text-teal-100">${{ $cart->service_charge }}</dd>
                            </div>
                            <div class="flex items-center justify-between border-t border-gray-700 pt-6">
                                <dt class="text-base font-medium text-teal-100">Total</dt>
                                <dd class="text-base font-medium text-teal-100">${{ $cart->total + $cart->service_charge }}</dd>
                            </div>
                        </dl>

                        <div class="border-t border-gray-700 px-4 py-6 sm:px-6">
                            <button type="submit" class="w-full rounded-md border border-transparent bg-teal-600 px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 focus:ring-offset-gray-900">Confirm order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
