<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Authors;
use App\Models\Konten;  
use App\Models\Type;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $param;
    public function index()
    {
        $this->param['artikel'] = Article::all()->count();
   
        $this->param['authors'] = Authors::all()->count();
    
        $this->param['content'] = Konten::all()->count();

        $this->param['type'] = Type::all()->count();

        return view('dashboard',$this->param);
   
    }

    // Untuk tampilan landing page
    public function landingPage()
    {
        $this->param['artikel'] = Article::all();

        return view('welcome', $this->param);
    }

}
