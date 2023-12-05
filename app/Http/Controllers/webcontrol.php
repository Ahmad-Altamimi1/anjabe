<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


function datearray($data)
{
    /// for date
    $datawithtile = [];
    $datenow = strtotime("-3:00");
    $today = date("Y-m-d H:i:s", $datenow);
    foreach ($data as $singledata) {
        if ($singledata->DATE_SCHEDULER <= $today) {
            $datawithtile[] = $singledata;
        }
    }
    return $datawithtile;
}

class webcontrol extends Controller
{


    public function index()
    {

        $page = array(
            "name" => "طبكم - tebkum",
            "tital" => "طبكم - tebkum",
            "description" => "طبكم - tebkum",
            "url" => url('/'),
            "imgurl" => asset('img/logo_sport.png')
        );

        $visitors = DB::table('visitors')->get();
        $posts = DB::table('posts')->get();
        $REED = 0;
        foreach ($posts as $post) {
            $REED = $REED +   $post->REED;
        }
        // dd($visitors);

        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0 || Auth::user()->B1 || Auth::user()->B2) {
                return view('dashboard', ['visitors' => $visitors, 'REED' => $REED]);
            } else return view('soon');
        } else
        return view('dashboard', ['visitors' => $visitors, 'REED' => $REED]);
    }

    public function login()
    {
        $page = array(
            "name" => "طبكم - tebkum",
            "tital" => "طبكم - tebkum",
            "description" => "طبكم - tebkum",
            "url" => url('/'),
            "imgurl" => asset('img/Asset 1.png')
        );
        // dd($page);
        if (Auth::user()) {
            return redirect("/dashboard");
        } else  return view('webcontrol.login', ['page' => $page]);
    }

    public function register()
    {

        $page = array(
            "name" => "طبكم - tebkum",
            "tital" => "طبكم - tebkum",
            "description" => "طبكم - tebkum",
            "url" => url('/'),
            "imgurl" => asset('img/Asset 1.png')
        );
        if (Auth::user()) {
            return redirect("/");
        } else  return view('webcontrol.register', ['page' => $page]);
    }

    public function postbyid($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        $posts = DB::table('posts')->orderBy('id', 'DESC')->get();
        $tags = DB::table('poststags')->get();
        $groups = DB::table('groups')->get();

        $postswithtime = [];

        DB::table("posts")->where('id',  $id)->increment('REED');
        DB::table("groups")->where('id',  $post->TOPIC)->increment('REED');
        foreach ($groups as $group) {
            if ($post->TOPIC == $group->id) {
                $string = $group->TAG;
                $str_arr = explode(',', $string);
                $str_arr = array_filter($str_arr);
                foreach ($str_arr as $str) {
                    DB::table("poststags")->where('id',  $str)->increment('REED');
                }
            }
        }
        $datenow = strtotime('-3:00');
     
        foreach ($posts as $singlepost) {
            if (strtotime($singlepost->DATE_SCHEDULER) <= $datenow) {
                $postswithtime[] = $singlepost;
            }
        }

        $page = array(
            "name" => $post->TITLE,
            "tital" => $post->TITLE,
            "description" => $post->DESCRIPTION,
            "url" => url('/') . '/posts/' . $post->id . '/show',
            "imgurl" => asset('storage/' . $post->IMG . '')
        );
        if (strtotime($post->DATE_SCHEDULER) <= $datenow) {
            return view('public.singlepost', ['page' => $page, 'groups' => $groups, 'post' => $post, 'posts' => $postswithtime, 'tags' => $tags]);
        } else {
            return view('welcome', ['page' => $page, 'groups' => $groups, 'post' => $post, 'posts' => $postswithtime, 'tags' => $tags]);
        }
    }

    public function videobyid($id)
    {
        $video = DB::table('videos')->where('id', $id)->first();
        $videos = DB::table('videos')->orderBy('id', 'DESC')->get();
        $users = DB::table('users')->get();
        $tags = DB::table('poststags')->get();
        $mostposts = DB::table('posts')->orderBy('REED', 'DESC')->get();
        $mostvideos = DB::table('videos')->orderBy('REED', 'DESC')->get();
        DB::table("videos")->where('id',  $id)->increment('REED');
        DB::table("poststags")->where('id',  $video->TOPIC)->increment('REED');

        $page = array(
            "name" => $video->TITLE,
            "tital" => $video->TITLE,
            "description" => $video->DESCRIPTION,
            "url" => url('/') . '/videos/' . $video->id . '/show',
            "imgurl" => asset('storage/' . $video->IMG . '')
        );
        return view('public.singlevideo', ['page' => $page, 'mostposts' => $mostposts, 'mostvideos' => $mostvideos, 'video' => $video, 'videos' => $videos, 'users' => $users, 'tags' => $tags]);
    }

    public function videosshow()
    {

        $videos = DB::table('videos')->orderBy('id', 'DESC')->get();
        $users = DB::table('users')->get();
        $tags = DB::table('poststags')->get();
        $mostposts = DB::table('posts')->orderBy('REED', 'DESC')->get();
        $mostvideos = DB::table('videos')->orderBy('REED', 'DESC')->get();

        $page = array(
            "name" => "الفيديوهات",
            "tital" => "الفيديوهات",
            "description" => "الفيديوهات",
            "url" => url('/') . '/videos/show',
            "imgurl" => asset('img/logo_sport.png')
        );
        return view('public.videos', ['page' => $page, 'mostposts' => $mostposts, 'mostvideos' => $mostvideos, 'videos' => $videos, 'users' => $users, 'tags' => $tags]);
    }

    public function videosshownum($id)
    {

        $videos = DB::table('videos')->orderBy('id', 'DESC')->get();
        $users = DB::table('users')->get();
        $tags = DB::table('poststags')->get();
        $mostposts = DB::table('posts')->orderBy('REED', 'DESC')->get();
        $mostvideos = DB::table('videos')->orderBy('REED', 'DESC')->get();
        $num = $id;

        $page = array(
            "name" => "الفيديوهات",
            "tital" => "الفيديوهات",
            "description" => "الفيديوهات",
            "url" => url('/') . '/videos/show',
            "imgurl" => asset('img/logo_sport.png')
        );
        return view('public.videos', ['page' => $page, 'num' => $num, 'mostposts' => $mostposts, 'mostvideos' => $mostvideos, 'videos' => $videos, 'users' => $users, 'tags' => $tags]);
    }

    public function tagbyid($id)
    {
        $datenow = strtotime('-3:00');
        $tagposts = [];
        $tagpostswithtime = [];
        $posts = DB::table('posts')->orderBy('DATE_SCHEDULER', 'DESC')->get();
        $groups = DB::table('groups')->get();

        foreach ($posts as $singlepost) {
            foreach ($groups as $group) {
                if ($group->id == $singlepost->TOPIC) {
                    $string = $group->TAG;
                    $str_arr = explode(',', $string);
                    $str_arr = array_filter($str_arr);
                    if (in_array($id, $str_arr)) {
                        $tagposts[] = $singlepost;
                    }
                }
            }
        }



        foreach ($tagposts as $singlepost) {
            if (strtotime($singlepost->DATE_SCHEDULER) <= $datenow) {
                $tagpostswithtime[] = $singlepost;
            }
        }

        $tag = DB::table('poststags')->where('id', $id)->first();
        $page = array(
            "name" => $tag->TITLE,
            "tital" => $tag->TITLE,
            "description" => $tag->DESCRIPTION,
            "url" => url('/') . '/tags/' . $tag->id . '/show',
            "imgurl" => asset('storage/' . $tag->IMG . '')
        );
        $tags = DB::table('poststags')->get();
        $postswithtime = [];
        $datenow = strtotime('-3:00');
        foreach ($posts as $singlepost) {
            if (strtotime($singlepost->DATE_SCHEDULER) <= $datenow) {
                $postswithtime[] = $singlepost;
            }
        }
        $nm = 1;
        $wordCount = count($tagpostswithtime);
        return view('public.tags', ['page' => $page, 'tagposts' => $tagpostswithtime, 'posts' => $postswithtime, 'tag' => $tag, 'tags' => $tags, 'nm' => $nm, 'wordCount' => $wordCount]);
    }

    public function tagbyidnum($id, $nm)
    {
        $datenow = strtotime('-3:00');
        $tagposts = [];
        $tagpostswithtime = [];
        $posts = DB::table('posts')->orderBy('DATE_SCHEDULER', 'DESC')->get();

        // for subtopic
        foreach ($posts as $singlepost) {
            $string = $singlepost->TAG;
            $str_arr = explode(',', $string);

            foreach ($str_arr as $str_a) {
                if ($id == $str_a) {
                    $tagposts[] = $singlepost;
                }
            }
        }

        // for topic
        foreach ($posts as $singlepost) {
            if ($singlepost->TOPIC == $id) {
                $r = 0;
                foreach ($tagposts as $tagpost) {
                    if ($tagpost->id == $singlepost->id) {
                        $r = 1;
                    }
                }
                if ($r) {
                    /////
                } else  $tagposts[] = $singlepost;
            }
        }


        foreach ($tagposts as $singlepost) {
            if (strtotime($singlepost->DATE_SCHEDULER) <= $datenow) {
                $tagpostswithtime[] = $singlepost;
            }
        }

        $tag = DB::table('poststags')->where('id', $id)->first();
        $page = array(
            "name" => $tag->TITLE,
            "tital" => $tag->TITLE,
            "description" => $tag->DESCRIPTION,
            "url" => url('/') . '/tags/' . $tag->id . '/show',
            "imgurl" => asset('storage/' . $tag->IMG . '')
        );
        $tags = DB::table('poststags')->get();
        $postswithtime = [];
        $datenow = strtotime('-3:00');
        foreach ($posts as $singlepost) {
            if (strtotime($singlepost->DATE_SCHEDULER) <= $datenow) {
                $postswithtime[] = $singlepost;
            }
        }
        $wordCount = count($tagpostswithtime);
        return view('public.tags', ['page' => $page, 'tagposts' => $tagpostswithtime, 'posts' => $postswithtime, 'tag' => $tag, 'tags' => $tags, 'nm' => $nm, 'wordCount' => $wordCount, 'tagnum' => $id]);
    }

    public function aboutus()
    {
        $mostposts = DB::table('posts')->orderBy('REED', 'DESC')->get();
        $mostvideos = DB::table('videos')->orderBy('REED', 'DESC')->get();
        $page = array(
            "name" => "من نحن",
            "tital" => "من نحن",
            "description" => "من نحن",
            "url" => url('/"aboutus"'),
            "imgurl" => asset('img/logo_sport.png')
        );

        return view('public.aboutus', ['mostposts' => $mostposts, 'mostvideos' => $mostvideos, 'page' => $page]);
    }

    public function contactus()
    {
        $mostposts = DB::table('posts')->orderBy('REED', 'DESC')->get();
        $mostvideos = DB::table('videos')->orderBy('REED', 'DESC')->get();
        $page = array(
            "name" => "تواصل معنا",
            "tital" => "تواصل معنا",
            "description" => "تواصل معنا",
            "url" => url('/"contactus"'),
            "imgurl" => asset('img/logo_sport.png')
        );

        return view('public.contactus', ['mostposts' => $mostposts, 'mostvideos' => $mostvideos, 'page' => $page]);
    }
    public function policy()
    {
        $mostposts = DB::table('posts')->orderBy('REED', 'DESC')->get();
        $mostvideos = DB::table('videos')->orderBy('REED', 'DESC')->get();
        $page = array(
            "name" => "سياسة الخصوصية",
            "tital" => "سياسة الخصوصية",
            "description" => "سياسة الخصوصية",
            "url" => url('/"policy"'),
            "imgurl" => asset('img/logo_sport.png')
        );

        return view('public.policy', ['mostposts' => $mostposts, 'mostvideos' => $mostvideos, 'page' => $page]);
    }

    public function tagbyidvid($id)
    {
        $tagvideos = [];
        $videos = DB::table('videos')->get();
        foreach ($videos as $singlevideo) {
            $string = $singlevideo->TAG;
            $str_arr = explode(',', $string);
            foreach ($str_arr as $str_a) {
                if ($id == $str_a) {
                    $tagvideos[] = $singlevideo;
                }
            }
        }

        $tag = DB::table('poststags')->where('id', $id)->first();
        $page = array(
            "name" => $tag->TITLE,
            "tital" => $tag->TITLE,
            "description" => $tag->DESCRIPTION,
            "url" => url('/') . '/tagsvid/' . $tag->id . '/show',
            "imgurl" => asset('storage/' . $tag->IMG . '')
        );
        $tags = DB::table('poststags')->get();
        return view('public.tagsvid', ['page' => $page, 'tagvideos' => $tagvideos, 'videos' => $videos, 'tag' => $tag, 'tags' => $tags]);
    }


    ///////////////////////////////////////
    public function editprofile($id)
    {


        // $data = request()->validate([
        //     'password' => 'required|confirmed|min:8',
        // ]);
        dd($id);

        // $tag->TITLE = request('tital');
        // $tag->DESCRIPTION = request('description');
        // $tag->EDITOR = Auth::user()->id;
        // $tag->COLOR = request('COLOR');
        // $tag->TEXT = request('TEXT');
        // $tag->FACEBOOK = request('FACEBOOK');
        // $tag->YOUTUBE = request('YOUTUBE');
        // $tag->TWITTER = request('TWITTER');
        // $tag->INSTAGRAM = request('INSTAGRAM');
        // if (request('IMG')) {
        //     $tag->IMG = request('IMG')->store('uploads', 'public');
        // }

        // $tag->update();

        // return redirect("posts/tags");
    }


    public function edit(User $user)
    {
        if (Auth::user()) {
            if (Auth::user()->admin == "1") {
                return view('profiles.edit', compact('user'));
            } else return view('welcome');
        } else  return "You can't access here!";
    }




    //// 26/2/2023 add user control


    public function userscontrol()
    {

        $page = array(
            "name" => "طبكم - tebkum",
            "tital" => "طبكم - tebkum",
            "description" => "طبكم - tebkum",
            "url" => url('/'),
            "imgurl" => asset('img/logo_sport.png')
        );

        $users = User::all();
        $tags = DB::table('poststags')->get();
        $posts = DB::table('posts')->get();
        $videos = DB::table('videos')->get();
        $programs = DB::table('programs')->get();
        $programsvideos = DB::table('programsvideos')->get();

        if (Auth::user()) {
            if (Auth::user()->admin) {
                return view('users.admin_users_control', ['users' => $users, 'tags' => $tags, 'posts' => $posts, 'videos' => $videos, 'programs' => $programs, 'programsvideos' => $programsvideos]);
            } else return view('error');
        } else return view('error');
    }

    public function showdayaction()
    {

        $page = array(
            "name" => "طبكم - tebkum",
            "tital" => "طبكم - tebkum",
            "description" => "طبكم - tebkum",
            "url" => url('/'),
            "imgurl" => asset('img/logo_sport.png')
        );

        $datenow = strtotime('-3:00');
        $d = date('Y-m-d', $datenow);
        $posts = DB::table('posts')->whereDate('DATE', $d)->get();
        $poststags = DB::table('poststags')->get();
        $videos = DB::table('videos')->whereDate('DATE', $d)->get();
        $visitors = DB::table('visitors')->get();
        $postscount = DB::table('posts')->get();

        if (Auth::user()) {
            if (Auth::user()->admin) {
                return view('users.admin_posts_control', ['poststags' => $poststags, 'posts' => $posts, 'postscount' => $postscount, 'visitors' => $visitors, 'videos' => $videos, 'dateday' => $d]);
            } else return view('error');
        } else return view('error');
    }

    public function showdaysaction()
    {
        $page = array(
            "name" => "عمرة الفرقان",
            "tital" => "عمرة الفرقان",
            "description" => "عمرة الفرقان",
            "url" => url('/'),
            "imgurl" => asset('img/Asset 1.png')
        );
        $data = request()->validate([
            'date' => 'required',
        ]);
        $datan    =  strtotime(request('date'));
        $d = date('Y-m-d', $datan);
        $posts = DB::table('posts')->whereDate('DATE', $d)->get();
        $videos = DB::table('videos')->whereDate('DATE', $d)->get();
        $poststags = DB::table('poststags')->get();

        if (Auth::user()) {
            if (Auth::user()->admin) {
                return view('users.admin_posts_control', ['poststags' => $poststags, 'posts' => $posts, 'videos' => $videos, 'dateday' => $d]);
            } else return view('error');
        } else return view('error');
    }

    public function sitemap($value = '')
    {
        $datenow = strtotime('-3:00');
        $tagposts = [];
        $tagpostswithtime = [];
        $posts = DB::table('posts')->orderBy('DATE_SCHEDULER', 'DESC')->get()->toArray();
        $videos = DB::table('videos')->orderBy('DATE_SCHEDULER', 'DESC')->get()->toArray();

        $posts = array_merge($posts, $videos);

        // Sort the merged data by DATE_SCHEDULER in descending order
        usort($posts, function ($a, $b) {
            return strtotime($b->DATE_SCHEDULER) - strtotime($a->DATE_SCHEDULER);
        });

        $tags = DB::table('poststags')->get();

        $postswithtime = [];
        $datenow = strtotime('-3:00');
        foreach ($posts as $singlepost) {
            if (strtotime($singlepost->DATE_SCHEDULER) <= $datenow) {
                $postswithtime[] = $singlepost;
            }
        }
        $nm = 1;
        $wordCount = count($tagpostswithtime);

        return response()->view('sitemap', [
            'posts' => $postswithtime, 'tags' => $tags
        ])->header('Content-Type', 'text/xml');
    }
}
