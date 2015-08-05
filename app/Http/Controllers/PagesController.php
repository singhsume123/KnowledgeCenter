<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {
    	$people = ['Elon Musk', 'Lalit Kundu'];
    	return view('pages.about', compact('people'));
    }
}
