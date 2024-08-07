<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function Showlogin() {
        return view('client.auth.login');
    }

    public function login(Request $request)
    {
        // Check if the user is already authenticated
        if (auth()->check()) {
            return redirect()->route('home'); // or redirect to '/admin' if that is where you want to redirect authenticated users
        }
    
        // Validate the login form input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        // Handle validation errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Attempt to authenticate the user
        if (auth()->attempt($request->only('email', 'password'))) {
            $user = auth()->user();
            // Redirect based on the role of the authenticated user
            return redirect()->route($user->role == 'admin' ? 'admin.dashboard' : 'home');
        }
    
        // Handle failed login attempt
        return redirect()->back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->withInput();
    }
    


    public function Showregister() {
        return view('client.auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ho_ten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tb_tai_khoan,email',
            'so_dien_thoai' => 'nullable|string|max:20',
            'gioi_tinh' => 'nullable|integer',
            'dia_chi' => 'nullable|string',
            'ngay_sinh' => 'nullable|date',
            'password' => 'required|string|min:6|confirmed',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Create the user
        $taiKhoan = User::create([
            'ho_ten' => $request->ho_ten,
            'email' => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'gioi_tinh' => $request->gioi_tinh,
            'dia_chi' => $request->dia_chi,
            'ngay_sinh' => $request->ngay_sinh,
            'mat_khau' => Hash::make($request->password),
            'chuc_vu_id' => null, // Set default role or position if needed
            'trang_thai' => 1, // Active status
        ]);
    
        // Log the user in
        Auth::login($taiKhoan);
    
        // Redirect to the intended page or home
        return redirect('/');
    }
    


    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('status', 'Đăng xuất thành công'); // Redirect to login page
    }

    // Show the user profile
    public function profile()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user')); // Create a profile view for this
    }
}
