<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Garage;
use Illuminate\Http\Request;

class GarageController extends Controller
{
    public function garage_checkOut(Request $request)

        {

            $cart = (new Garage())
                ->where('user_id', auth()->id())
                ->where('is_paid', 0)
                ->first();

            if (!$cart) {
                return redirect()->route('services-home');
            }


            if ($cart->serviceProducts->count() == 0) {
                return redirect()->route('services-home');
            }

            return view('garage.checkout', [
                'cart' => $cart,
                'user' => auth()->user(),

            ]);
        }


    public function completeGarage(Request $request)
            {
                // validate
                $request->validate([
                    'email' => 'required|email',
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'company' => 'nullable',
                    'address' => 'required',
                    'apartment' => 'nullable',
                    'city' => 'required',
                    'country' => 'required',
                    'region' => 'required',
                    'postal_code' => 'required',
                    'phone' => 'required',
                    'card_number' => 'required',
                    'name_on_card' => 'required',
                    'expiration_date' => 'required',
                    'cvc' => 'required',
                ]);

                // create an Appointment
                $order = (new Appointment())->create([
                    'user_id' => auth()->id(),
                    'garage_id' => $request->garage_id,
                    'email' => $request->email,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'company' => $request->company,
                    'address' => $request->address,
                    'apartment' => $request->apartment,
                    'city' => $request->city,
                    'country' => $request->country,
                    'region' => $request->region,
                    'postal_code' => $request->postal_code,
                    'phone' => $request->phone,
                    'card_number' => $request->card_number,
                    'name_on_card' => $request->name_on_card,
                    'expiration_date' => $request->expiration_date,
                    'cvc' => $request->cvc,
                    'status' => 'pending'
                ]);

                // cart status set to paid
                $order->garage->update([
                    'is_paid' => 1,
                    'total' => $order->garage->total + $order->garage->service_charge
                ]);

                return redirect()->route('garage.confirm', $order->id);


            }



    public function appointmentConfirmation(Request $request, Appointment $appointment)
    {
        return view('garage.thank_you', [
            'order' => $appointment
        ]);
    }







}
