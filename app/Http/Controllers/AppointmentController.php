<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AppointmentStatusNotification;

class AppointmentController extends Controller
{
public function notify(Request $request)
{
$appointment = Appointment::find($request->appointment_id);

if ($appointment) {
// Check if action is confirm or reject
if ($request->action === 'confirm') {
$message = 'Your appointment has been confirmed.';
} elseif ($request->action === 'reject') {
$message = 'Your appointment has been rejected.';
}

// Send email notification
Notification::route('mail', $request->email)
->notify(new AppointmentStatusNotification($message));

return response()->json(['message' => 'Email sent successfully'], 200);
}

return response()->json(['error' => 'Appointment not found'], 404);
}
}
