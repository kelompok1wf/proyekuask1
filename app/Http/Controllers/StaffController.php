<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_staff' => 'required',
            'role_staff' => 'required',
            'kontak_staff' => 'nullable',
            'password' => 'required',
        ]);

        Staff::create([
            'nama_staff' => $request->nama_staff,
            'role_staff' => $request->role_staff,
            'kontak_staff' => $request->kontak_staff,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('staff.index');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.edit', compact('staff'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_staff' => 'required',
            'role_staff' => 'required',
            'kontak_staff' => 'nullable',
        ]);

        $staff = Staff::findOrFail($id);

        $staff->nama_staff = $request->nama_staff;
        $staff->role_staff = $request->role_staff;
        $staff->kontak_staff = $request->kontak_staff;

        if ($request->password) {
            $staff->password = bcrypt($request->password);
        }

        $staff->save();

        return redirect()->route('staff.index');
    }

    public function destroy(string $id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->route('staff.index');
    }
}
