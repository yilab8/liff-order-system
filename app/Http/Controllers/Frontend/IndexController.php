<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // 首頁
    public function index()
    {
        return view('frontend-page.liff');
    }
}
