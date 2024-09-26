<?php


namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
public function index()
{
return view('admin.user.customers.index', [
'users' => User::where('role', 3)->paginate(10),
]);
}

public function create()
{
//
}

public function store(Request $request)
{
$request->validate([
'name' => 'required',
'email' => 'required|email|unique:users,email',
'password' => 'required|min:8',
]);

User::create([
'name' => $request->name,
'email' => $request->email,
'password' => bcrypt($request->password), // Use bcrypt to hash passwords
'role' => 3,
]);

return redirect()
->route('admin.user.customers.index')
->with('flash.bannerStyle', 'success')
->with('flash.banner', 'Customer created successfully.');
}

public function edit(User $user)
{
return view('admin.user.customers.edit', compact('user'));
}

public function update(Request $request, User $user)
{
$request->validate([
'name' => 'required',
'email' => 'required|email|unique:users,email,' . $user->id,
]);

$user->update([
'name' => $request->name,
'email' => $request->email,
'password' => $request->password ? bcrypt($request->password) : $user->password, // Only update password if it's provided
]);

return redirect()
->route('admin.user.customers.index')
->with('flash.bannerStyle', 'success')
->with('flash.banner', 'Customer updated successfully.');
}

public function destroy(User $user)
{
$user->forceDelete();

return redirect()
->route('admin.user.customers.index')
->with('flash.bannerStyle', 'warning')
->with('flash.banner', 'Customer deleted successfully.');
}
}
