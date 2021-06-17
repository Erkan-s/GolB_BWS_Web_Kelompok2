<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Authors;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $article = Article::all()->count();
        $authors = Authors::all()->count();

        return view('dashboard', compact('article','authors'));
    }

    // Untuk tampilan landing page
    public function landingPage()
    {
        $this->param['artikel'] = Article::all();

        return view('welcome', $this->param);
    }
}
