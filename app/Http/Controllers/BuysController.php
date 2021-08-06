<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buy;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class BuysController extends Controller
{
    public function index()
    {
        $config = Setting::find(1);
        $buys = Buy::with(['card'])->where('user_id', Auth::user()->id)->paginate(6);

        return view('buys.index', compact('buys', 'config'));
    }
}
