<?php

use function Livewire\Volt\{state, mount};

state([
    'product' => null
]);

mount(function () {

});

$addToGarage = function () {


    if (!auth()->check()) {
        return redirect()->route('login');
    }


    $cart = (new \App\Models\Garage())
        ->where('user_id', auth()->id())
        ->where('is_paid', 0)
        ->first();


    if (!$cart) {
        $cart = (new \App\Models\Garage())->create([
            'user_id' => auth()->id(),
            'is_paid' => 0,
            'total' => 0
        ]);
    }

    // check if the product exists in the cart
    $product = $cart->serviceProducts()->where('service_product_id', $this->product->id)->first(); // Updated here

// if found, increment the quantity
    if($product) {
        $product->pivot->quantity += 1;
        $product->pivot->total += $this->product->price;
        $product->pivot->save();
    } else {
        // add the product to the cart
        $cart->serviceProducts()->attach($this->product->id, [
            'quantity' => 1,
            'total' => $this->product->price
        ]);
    }


    // calculate the cart total and update the cart
    $cart->total = $cart->serviceProducts()->sum('total');

    $cart->save();

    // emit event to open the cart
    $this->dispatch('openCart');

};

?>

<div class="mt-4">
    <button wire:click="addToGarage" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Add to Garage
    </button>
</div>