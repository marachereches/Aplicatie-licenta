<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function loginAdmin(Request $request)
    {

        if (Auth::guard('admin')->attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return Redirect('admin');
        } else {
            return Redirect()->back()->with('error', 'Username sau parolă greșită');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return Redirect('admin');
    }
}
