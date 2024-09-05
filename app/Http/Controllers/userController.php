<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class userController extends Controller
{
    public function getUsers()
    {
        $user = Auth::user();
        return view('users', compact('user'));
    }
}
