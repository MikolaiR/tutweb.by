<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function privacyPolicy(): View
    {
        return view('pages.privacy-policy');
    }
}
