<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Locations;
use App\Models\Banners;
use App\Models\About;
use App\Models\Projects;
use App\Models\Studio;
use App\Models\Team;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['banner'] = Banners::select('*')->orderBy('created_at', 'desc')->first();
        $data['about'] = About::select('*')->orderBy('created_at', 'desc')->first();
        $data['location'] = Locations::select('*')->orderBy('created_at', 'desc')->get();
        $data['project'] = Projects::select('*')->orderBy('created_at', 'desc')->get();
        $data['studio'] = Studio::select('*')->orderBy('created_at', 'desc')->get();
        $data['team'] = Team::select('*')->orderBy('created_at', 'desc')->get();
        return view('home',$data);
    }
}
