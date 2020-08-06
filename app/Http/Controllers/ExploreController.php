<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ExploreController extends Controller
{
    // usable on routes and controllers that will only ever have one method
    public function __invoke()
    {
        return view('explore', [
            'users' => User::paginate(50),
        ]);
    }
}
