<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::find(Auth::id());
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('edit-profile', compact('user'));
    }

    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'dob' => 'required|date',
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
    ]);

    $user = User::find(Auth::id());

    $user->name = $request->name;
    $user->dob = $request->dob;
    $user->address = $request->address;
    $user->phone = $request->phone;
    $user->save(); 

    return redirect()->route('profile.show')->with('success', 'Cập nhật thành công!');
}

}