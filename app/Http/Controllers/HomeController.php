<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Homeslider;
use App\Models\poststags;

use function PHPSTORM_META\map;

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
        $slidercontent= Homeslider::all();
        $havevideo=false;
        foreach($slidercontent as $slider){
            if ($slider->video) {
                $havevideo=true;
                $slidercontent= $slider;
            };
        };

        $recentposts = Post::orderBy('DATE_SCHEDULER', 'asc')->take(4)->get();
        $Monthsofpregnancy= Post::where('Monthsofpregnancy',"=","1")->orderBy('id', 'desc')->get();
        $tags= poststags::all();
        $first_tag = poststags::first();
        $defaultPosts = Post::take(4)->get();

        return view('pages.home',compact('slidercontent','recentposts', 'tags', 'Monthsofpregnancy', 'havevideo', 'defaultPosts', 'first_tag'));
    }
    public function tv_show(){
        return view('pages.TV');
    }

    
}
