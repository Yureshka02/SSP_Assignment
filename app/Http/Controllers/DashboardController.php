<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all orders
        $orders = Order::all();

        // Fetch all appointments
        $appointments = Appointment::all();

        // Fetch all users where the role is 3
        $customers = User::where('role', 3)->get();


        // Return the view with orders and appointments
        return view('dashboard', [
            'orders' => $orders,
            'appointments' => $appointments,
            'customers' => $customers
        ]);
    }
}
