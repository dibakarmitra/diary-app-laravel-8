<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $record = [
            'entries' => count($user->entries),
        ];
        return view('dashboard')->with('record', $record);
    }
}
