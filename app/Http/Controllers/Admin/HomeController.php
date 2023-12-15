<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Text;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Illuminate\View\View as TypeView;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        View::share('nav', 'Dashboard');
    }

    public function index(): TypeView
    {
        $viewData = array();
        $viewData['text'] = Text::count();

        return view('home', $viewData);
    }
}
