<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }
    function profile()
    {
        $admin = Auth::user();

        return view('admin.profile', compact('admin'));
    }
    function profile_data(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'current_password' => 'required_with:password',
            'password' => 'nullable|min:8|confirmed'
        ]);

        /** @var User $admin */
        $admin = Auth::user();

        $data = [
            'name' => $request->name
        ];

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $admin->update($data);

        if ($request->hasFile('image')) {
            if ($admin->image) {
                File::delete(public_path('images/' . $admin->image->path));
                $admin->image()->delete();
            }
            $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $img_name);
            $admin->image()->create([
                'path' => $img_name
            ]);
        }
        return redirect()->back()->with('msg', 'Profile updated successfully');
    }
    function check_password(Request $request)
    {
        return Hash::check($request->password, Auth::user()->password);
    }
    
    function orders() {
        if(request()->has('id')) {
            $id = request()->id;
            Auth::user()->notifications->find($id)->markAsRead();
        }

        return 'Order page';
    }

    function notifications() {
        Auth::user()->notifications->markAsRead();
        return view('admin.notifications');
    }
}
