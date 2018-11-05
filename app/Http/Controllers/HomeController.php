<?php

namespace App\Http\Controllers;

use App\CleanHistory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        $history = CleanHistory::with('people')->orderBy('id', 'desc')->first();

        return view('welcome', [
            'history' => $history
        ]);
    }
}
