<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;

class AdministratorsController extends Controller
{
    public function index()
    {
        return view('admin.user.administrators.index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(User $user)
    {
    }

    public function edit(User $user)
    {
    }

    public function update(Request $request, User $user)
    {
    }

    public function destroy(User $user)
    {
    }
}
