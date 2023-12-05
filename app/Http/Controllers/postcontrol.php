<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\pictures;
use App\Models\poststags;
use App\Models\Videos;
use App\Models\programs;
use App\Models\programsvideos;
use App\Models\groups;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Rules\YouTubeUrl;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
class postcontrol extends Controller
{


    public function create()
    {
        if (Auth::user()) {

            if (Auth::user()->admin || Auth::user()->B0 || Auth::user()->B1) {
                $poststags = DB::table('poststags')->get();
                $users = DB::table('users')->get();
                $groups = DB::table('groups')->get();
                return view('webcontrol.posts.postcreate', ['poststags' => $poststags, 'users' => $users, 'groups' => $groups]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    public function createvideos()
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0 || Auth::user()->B1) {
                $poststags = DB::table('poststags')->get();
                $users = DB::table('users')->get();
                $groups = DB::table('groups')->get();
                return view('webcontrol.videos.videocreate', ['poststags' => $poststags, 'users' => $users, 'groups' => $groups]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }


    public function createprograms()
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B2) {
                $users = DB::table('users')->get();
                return view('webcontrol.programcreate', ['users' => $users]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    public function createprogramsvid($id)
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B2) {
                $programs = DB::table('programs')->get();
                $program = DB::table('programs')->where('id', $id)->first();
                $videos = DB::table('programsvideos')->where('PROGRAM', $id)->get();
                $users = DB::table('users')->get();
                return view('webcontrol.programsvidcreate', ['programs' => $programs, 'program' => $program, 'videos' => $videos, 'users' => $users]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    public function tags()
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0) {
                $poststags = DB::table('poststags')->get();
                $posts = DB::table('posts')->get();
                $users = DB::table('users')->get();
                $groups = DB::table('groups')->get();
                return view('webcontrol.tags', ['poststags' => $poststags, 'groups' => $groups, 'users' => $users, 'posts' => $posts]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    public function groups()
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0) {
                $poststags = DB::table('poststags')->get();
                $posts = DB::table('posts')->get();
                $users = DB::table('users')->get();
                $groups = DB::table('groups')->get();

                return view('webcontrol.groups.groups', ['poststags' => $poststags, 'users' => $users, 'groups' => $groups, 'posts' => $posts]);
            } else return redirect()->route('welcome');
        } else  return "You can't access here!";
    }

    public function pictures()
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0) {
                $poststags = DB::table('poststags')->get();
                $users = DB::table('users')->get();
                $groups = DB::table('groups')->get();
                $pictures = DB::table('pictures')->get();
                return view('webcontrol.pictures.pictures', ['poststags' => $poststags, 'users' => $users, 'groups' => $groups, 'pictures' => $pictures]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    public function posts()
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0 || Auth::user()->B1) {
                $poststags = DB::table('poststags')->get();
                $posts = DB::table('posts')->get();
                $users = DB::table('users')->get();
                $groups = DB::table('groups')->get();
                return view('webcontrol.posts.posts', ['poststags' => $poststags, 'groups' => $groups, 'posts' => $posts, 'users' => $users]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    public function videos()
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0 || Auth::user()->B1) {
                $poststags = DB::table('poststags')->get();
                $videos = DB::table('videos')->get();
                $users = DB::table('users')->get();
                $groups = DB::table('groups')->get();
                return view('webcontrol.videos.videos', ['poststags' => $poststags, 'videos' => $videos, 'users' => $users, 'groups' => $groups]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    public function programs()
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B2) {
                $programs = DB::table('programs')->get();
                $videos = DB::table('programsvideos')->get();
                $users = DB::table('users')->get();
                return view('webcontrol.programs', ['programs' => $programs, 'videos' => $videos, 'users' => $users]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    public function programsvideos($id)
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B2) {
                $programs = DB::table('programs')->get();
                $videos = DB::table('programsvideos')->where('PROGRAM', $id)->get();
                $prog = DB::table('programs')->where('id', $id)->first();
                $users = DB::table('users')->get();
                return view('webcontrol.programsvideos', ['programs' => $programs, 'prog' => $prog, 'users' => $users, 'videos' => $videos]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    public function editprogramdata($id)
    {

        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B2) {
                $programs = DB::table('programs')->get();
                $videos = DB::table('programsvideos')->get();
                $program = DB::table('programs')->where('id', $id)->first();
                $users = DB::table('users')->get();
                return view('webcontrol.editprogram', ['programs' => $programs, 'program' => $program, 'users' => $users, 'videos' => $videos]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    public function addtags()
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0) {
                $poststags = DB::table('poststags')->get();
                $users = DB::table('users')->get();
                return view('webcontrol.addtags', ['poststags' => $poststags, 'users' => $users]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }
    public function addgroups()
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0) {
                $users = DB::table('users')->get();
                $groups = DB::table('groups')->get();
                $poststags = DB::table('poststags')->get();

                return view('webcontrol.groups.addgroups', ['groups' => $groups, 'users' => $users, 'poststags' => $poststags]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }


    public function addpicture()
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0) {
                $users = DB::table('users')->get();
                $groups = DB::table('groups')->get();
                $poststags = DB::table('poststags')->get();
                $pictures = DB::table('pictures')->get();

                return view('webcontrol.pictures.pictures_create', ['groups' => $groups,'pictures' => $pictures, 'users' => $users, 'poststags' => $poststags]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }


    public function tagsedit($id)
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0) {
                $poststag = DB::table('poststags')->where('id', $id)->first();
                return view('webcontrol.edittag', ['poststag' => $poststag]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    public function groupsedit($id)
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0) {
                $group = DB::table('groups')->where('id', $id)->first();
                $poststags = DB::table('poststags')->get();

                return view('webcontrol.groups.editgroups', ['group' => $group, 'poststags' => $poststags]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    public function picturesedit($id)
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0) {
                $groups = DB::table('groups')->get();
                $poststags = DB::table('poststags')->get();
                $picture = DB::table('pictures')->where('id', $id)->first();
                return view('webcontrol.pictures.edit_pictures', ['groups' => $groups, 'poststags' => $poststags, 'picture' => $picture]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }


    public function postedit($id)
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0 || Auth::user()->B1) {
                $post = DB::table('posts')->where('id', $id)->first();
                $poststags = DB::table('poststags')->get();
                $groups = DB::table('groups')->get();
                return view('webcontrol.posts.editposts', ['groups' => $groups, 'poststags' => $poststags, 'post' => $post]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    public function videoedit($id)
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0 || Auth::user()->B1) {
                $video = DB::table('videos')->where('id', $id)->first();
                $poststags = DB::table('poststags')->get();
                $groups = DB::table('groups')->get();

                return view('webcontrol.videos.editvideos', ['groups' => $groups, 'poststags' => $poststags, 'video' => $video]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    public function editprogramsvid($id)
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B2) {
                $video = DB::table('programsvideos')->where('id', $id)->first();
                $program = DB::table('programs')->where('id', $video->PROGRAM)->first();
                $videos = DB::table('programsvideos')->get();

                return view('webcontrol.programsvidedit', ['video' => $video, 'videos' => $videos, 'program' => $program]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    public function storeposts()
    {
        // dd(request()->all());

        $data = request()->validate([
            'TITLE' => 'required',
            'TOPIC' => 'required',
            'TEXT' => 'required',
            'DATE_SCHEDULER' => 'required',
            'DESCRIPTION' => 'required',
            'IMG' => 'required|image',
            "ofpregnancy"
            => 'required',
        ]);



        $saveddata = new Post;
        $saveddata->TOPIC = request('TOPIC');
        $group=groups::where('id','=', request('TOPIC'))->first();
        
                                                    $string = $group->TAG;
                                                    $str_arr = explode(',', $string);
                                                    $lastNonEmpty = null;
for ($i = count($str_arr) - 1; $i >= 0; $i--) {
    if (!empty($str_arr[$i])) {
        $lastNonEmpty = $str_arr[$i];
        break;
    }}

        $saveddata->TAG = $lastNonEmpty;
        $saveddata->Monthsofpregnancy =  request('ofpregnancy');
        $saveddata->PIC_Name = request('PIC_Name');
        $saveddata->TITLE = request('TITLE');
        $saveddata->DESCRIPTION = request('DESCRIPTION');
        $saveddata->TEXT1 = request('TEXT');
        $saveddata->REFERENCES = request('REFERENCES');
        $saveddata->DATE_SCHEDULER = request('DATE_SCHEDULER');
        $saveddata->TEXT2 = 0;
        $saveddata->TEXT3 = 0;
        $image= request('IMG');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/'), $imageName);
        $saveddata->IMG = 'uploads/'. $imageName;
        $saveddata->WRITER = Auth::user()->id;
        $saveddata->EDITOR = Auth::user()->id;
        $saveddata->REED = 0;
        $saveddata->save();

        return redirect("posts");
    }

    public function store_pictures()
    {
        $data = request()->validate([
            'TITLE' => 'required',
            'TOPIC' => 'required',
            'DATE_SCHEDULER' => 'required',
            'IMG' => 'required|image',
        ]);

        $saveddata = new pictures;
        $saveddata->TOPIC = request('TOPIC');
        $saveddata->TITLE = request('TITLE');
        $saveddata->DESCRIPTION = request('DESCRIPTION');
        $saveddata->DATE_SCHEDULER = request('DATE_SCHEDULER');
        $saveddata->IMG1 = request('IMG')->store('uploads', 'public');
        $saveddata->WRITER = Auth::user()->id;
        $saveddata->EDITOR = Auth::user()->id;
        $saveddata->REED = 0;
        $saveddata->save();

        return redirect("posts/pictures");
    }

    public function storegroups()
    {
        $data = request()->validate([
            'tital' => 'required'
        ]);

        // dd(request()->all());


        $TAG = '';
        for ($i = 1; $i <= 10; $i++) {
            if (request('TOPIC' . $i)) $TAG .=  request('TOPIC' . $i) . ',';
        }

        // dd($TAG);

        $saveddata = new groups;

        $saveddata->TITLE = request('tital');
        $saveddata->DESCRIPTION = request('description');
        $saveddata->TAG = $TAG;
        $saveddata->WRITER = Auth::user()->id;
        $saveddata->EDITOR = Auth::user()->id;
        $saveddata->REED = 0;
        $saveddata->save();

        return redirect("posts/groups");
    }

    public function storevideos()
    {
        $data = request()->validate([
            'TITLE' => 'required',
            'TOPIC' => 'required',
            'TEXT' => 'required',
            'DATE_SCHEDULER' => 'required',
            'DESCRIPTION' => 'required',
            'IMG' => 'required|image',
            'VID' => ['required', new YouTubeUrl]
        ]);

        parse_str(parse_url(request('VID'), PHP_URL_QUERY), $my_array_of_vars);
        $video = $my_array_of_vars['v'];


        $saveddata = new Videos;
        $saveddata->TOPIC = request('TOPIC');
        $saveddata->TITLE = request('TITLE');
        $saveddata->VID = $video;
        $saveddata->DESCRIPTION = request('DESCRIPTION');
        $saveddata->TEXT1 = request('TEXT');
        $saveddata->DATE_SCHEDULER = request('DATE_SCHEDULER');
        $saveddata->TEXT2 = 0;
        $saveddata->TEXT3 = 0;
        $saveddata->IMG = request('IMG')->store('uploads', 'public');
        $saveddata->WRITER = Auth::user()->id;
        $saveddata->EDITOR = Auth::user()->id;
        $saveddata->REED = 0;
        $saveddata->save();

        return redirect("videos");
    }

    public function storeprogramsvid()
    {
        $data = request()->validate([
            'TITLE' => 'required',
            'TEXT' => 'required',
            'DESCRIPTION' => 'required',
            'IMG' => 'required|image',
            'NO' => 'required',
            'VID' => ['required', new YouTubeUrl]
        ]);

        parse_str(parse_url(request('VID'), PHP_URL_QUERY), $my_array_of_vars);
        $video = $my_array_of_vars['v'];



        // dd(request()->all());
        $saveddata = new programsvideos;
        $saveddata->TITLE = request('TITLE');
        $saveddata->VID = $video;
        $saveddata->PROGRAM = request('PROGRAM');
        $saveddata->NO = request('NO');
        $saveddata->DESCRIPTION = request('DESCRIPTION');
        $saveddata->TEXT = request('TEXT');
        $saveddata->IMG = request('IMG')->store('uploads', 'public');
        $saveddata->WRITER = Auth::user()->id;
        $saveddata->EDITOR = Auth::user()->id;
        $saveddata->REED = 0;
        $saveddata->save();

        return redirect("/programs/" . request('PROGRAM') . "/edit");
    }

    public function storetags()
    {

        $data = request()->validate([
            'tital' => 'required',
            'description' => 'required',
            'IMG' => 'required|image',
        ]);

        $saveddata = new poststags;
        $saveddata->TITLE = request('tital');
        $saveddata->DESCRIPTION = request('description');
        $saveddata->WRITER = Auth::user()->id;
        $saveddata->EDITOR = Auth::user()->id;
        $saveddata->COLOR = request('COLOR');
        $saveddata->FACEBOOK = request('FACEBOOK');
        $saveddata->YOUTUBE = request('YOUTUBE');
        $saveddata->TWITTER = request('TWITTER');
        $saveddata->INSTAGRAM = request('INSTAGRAM');
        $image = request('IMG');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/'), $imageName);
        $saveddata->IMG = $imageName;
        
        $saveddata->TEXT = request('TEXT');
        $saveddata->REED = 0;
        $saveddata->save();

        return redirect("posts/tags");
    }

    public function storeprograms()
    {
        $data = request()->validate([
            'tital' => 'required',
            'description' => 'required',
            'COLOR' => 'required',
            'FACEBOOK' => 'url',
            'YOUTUBE' => 'url',
            'TWITTER' => 'url',
            'INSTAGRAM' => 'url',
            'IMG' => 'required|image',
            'TEXT' => 'required',
            'NO' => 'required',
        ]);

        $saveddata = new programs;
        $saveddata->TITLE = request('tital');
        $saveddata->DESCRIPTION = request('description');
        $saveddata->WRITER = Auth::user()->id;
        $saveddata->EDITOR = Auth::user()->id;
        $saveddata->COLOR = request('COLOR');
        $saveddata->NO = request('NO');
        $saveddata->PERSON = request('PERSON');
        $saveddata->FACEBOOK = request('FACEBOOK');
        $saveddata->YOUTUBE = request('YOUTUBE');
        $saveddata->TWITTER = request('TWITTER');
        $saveddata->INSTAGRAM = request('INSTAGRAM');
        $saveddata->IMG = request('IMG')->store('uploads', 'public');
        $saveddata->TEXT = request('TEXT');
        $saveddata->REED = 0;
        $saveddata->save();

        return redirect("programs");
    }

    public function edittags(poststags $tag)
    {

        if (request('IMG')) {
            $data = request()->validate([
                'tital' => 'required',
                'description' => 'required',
                'IMG' => 'required|image',
            ]);
        } else {
            $data = request()->validate([
                'tital' => 'required',
                'description' => 'required',
            ]);
        }

        $tag->TITLE = request('tital');
        $tag->DESCRIPTION = request('description');
        $tag->EDITOR = Auth::user()->id;
        $tag->COLOR = request('COLOR');
        $tag->TEXT = request('TEXT');
        $tag->FACEBOOK = request('FACEBOOK');
        $tag->YOUTUBE = request('YOUTUBE');
        $tag->TWITTER = request('TWITTER');
        $tag->INSTAGRAM = request('INSTAGRAM');
        if (request('IMG')) {
            $image = request('IMG');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/'), $imageName);
            $tag->IMG = "uploads/". $imageName;
        }

        $tag->update();

        return redirect("posts/tags");
    }

    public function editgroups(groups $group)
    {


        $data = request()->validate([
            'tital' => 'required',
        ]);

        $TAG = '';
        for ($i = 1; $i <= 10; $i++) {
            if (request('TOPIC' . $i)) $TAG .=  request('TOPIC' . $i) . ',';
        }

        $group->TITLE = request('tital');
        $group->DESCRIPTION = request('description');
        $group->EDITOR = Auth::user()->id;
        $group->TAG = $TAG;

        $group->update();
        return redirect("posts/groups");
    }
    public function editprograms(programs $id)
    {
        $maxValue = programsvideos::orderBy('NO', 'DESC')->where('PROGRAM', '=', $id->id)->get();

        if (request('IMG')) {
            $data = request()->validate([
                'TITLE' => 'required',
                'DESCRIPTION' => 'required',
                'COLOR' => 'required',
                'FACEBOOK' => 'url',
                'YOUTUBE' => 'url',
                'TWITTER' => 'url',
                'INSTAGRAM' => 'url',
                'IMG' => 'required|image',
                'TEXT' => 'required',
                'NO' => 'required|integer|between:' . $maxValue[0]->NO . ',10000',
            ]);
        } else {
            $data = request()->validate([
                'TITLE' => 'required',
                'DESCRIPTION' => 'required',
                'COLOR' => 'required',
                'FACEBOOK' => 'url',
                'YOUTUBE' => 'url',
                'TWITTER' => 'url',
                'INSTAGRAM' => 'url',
                'TEXT' => 'required',
                'NO' => 'required|integer|between:' . $maxValue[0]->NO . ',10000',
            ]);
        }

        $id->TITLE = request('TITLE');
        $id->DESCRIPTION = request('DESCRIPTION');
        $id->EDITOR = Auth::user()->id;
        $id->COLOR = request('COLOR');
        $id->TEXT = request('TEXT');
        $id->NO = request('NO');
        $id->PERSON = request('PERSON');
        $id->FACEBOOK = request('FACEBOOK');
        $id->YOUTUBE = request('YOUTUBE');
        $id->TWITTER = request('TWITTER');
        $id->INSTAGRAM = request('INSTAGRAM');
        if (request('IMG')) {
            $id->IMG = request('IMG')->store('uploads', 'public');
        }

        $id->update();

        return redirect("programs/" . $id->id . "/edit");
    }

    public function editposts(Post $id)
    {

        if (request('IMG')) {
            $data = request()->validate([
                'TITLE' => 'required',
                'TOPIC' => 'required',
                'TEXT' => 'required',
                'DATE_SCHEDULER' => 'required',
                'DESCRIPTION' => 'required',
                'IMG' => 'required|image',
            ]);
        } else {
            $data = request()->validate([
                'TITLE' => 'required',
                'TOPIC' => 'required',
                'TEXT' => 'required',
                'DATE_SCHEDULER' => 'required',
                'DESCRIPTION' => 'required',
            ]);
        }




        $id->TITLE = request('TITLE');
        $id->PIC_Name = request('PIC_Name');
        $id->TOPIC = request('TOPIC');
        $group = groups::where('id', '=', request('TOPIC'))->first();

        $string = $group->TAG;
        $str_arr = explode(',', $string);
        $lastNonEmpty = null;
        for ($i = count($str_arr) - 1; $i >= 0; $i--) {
            if (!empty($str_arr[$i])) {
                $lastNonEmpty = $str_arr[$i];
                break;
            }
        }

        $id->TAG = $lastNonEmpty;
        $id->DATE_SCHEDULER = request('DATE_SCHEDULER');
        $id->EDITOR = Auth::user()->id;
        $id->DESCRIPTION = request('DESCRIPTION');
        $id->TEXT1 = request('TEXT');
        $id->REFERENCES = request('REFERENCES');
        $id->Monthsofpregnancy =  request('ofpregnancy');
        if (request('IMG')) {
           
            $image = request('IMG');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/'), $imageName);
            $id->IMG = 'uploads/' . $imageName;
        }
        $id->update();
        return redirect("posts");
    }

    
    public function editpicture(pictures $id)
    {

        if (request('IMG')) {
            $data = request()->validate([
                'TITLE' => 'required',
                'TOPIC' => 'required',
                'DATE_SCHEDULER' => 'required',
                'IMG' => 'required|image',
            ]);
        } else {
            $data = request()->validate([
                'TITLE' => 'required',
                'TOPIC' => 'required',
                'DATE_SCHEDULER' => 'required',
            ]);
        }




        $id->TITLE = request('TITLE');
        $id->TOPIC = request('TOPIC');
        $id->DATE_SCHEDULER = request('DATE_SCHEDULER');
        $id->EDITOR = Auth::user()->id;
        $id->DESCRIPTION = request('DESCRIPTION');
        if (request('IMG')) {
            $id->IMG = request('IMG')->store('uploads', 'public');
        }
        $id->update();
        return redirect("posts/pictures");
    }

    public function editvideos(Videos $id)
    {

        if (request('IMG')) {
            $data = request()->validate([
                'TITLE' => 'required',
                'TOPIC' => 'required',
                'TAG' => 'required',
                'TEXT' => 'required',
                'DESCRIPTION' => 'required',
                'DATE_SCHEDULER' => 'required',
                'IMG' => 'required|image',
                'VID' => ['required', new YouTubeUrl]
            ]);
        } else {
            $data = request()->validate([
                'TITLE' => 'required',
                'TOPIC' => 'required',
                'TAG' => 'required',
                'TEXT' => 'required',
                'DATE_SCHEDULER' => 'required',
                'DESCRIPTION' => 'required',
                'VID' => ['required', new YouTubeUrl]
            ]);
        }

        $tags = '';
        foreach (request('TAG') as $value) {
            $tags .=  $value . ',';
        }
        parse_str(parse_url(request('VID'), PHP_URL_QUERY), $my_array_of_vars);
        $video = $my_array_of_vars['v'];

        $id->TITLE = request('TITLE');
        $id->TOPIC = request('TOPIC');
        $id->DATE_SCHEDULER = request('DATE_SCHEDULER');
        $id->EDITOR = Auth::user()->id;
        $id->TAG = $tags;
        $id->VID = $video;
        $id->DESCRIPTION = request('DESCRIPTION');
        $id->TEXT1 = request('TEXT');
        if (request('IMG')) {
            $id->IMG = request('IMG')->store('uploads', 'public');
        }
        $id->update();
        return redirect("videos");
    }

    public function editprogramsvideo(programsvideos $id)
    {
        // dd(request()->all());
        $video = DB::table('programsvideos')->where('id', $id)->first();
        if (request('IMG')) {
            $data = request()->validate([
                'TITLE' => 'required',
                'TEXT' => 'required',
                'DESCRIPTION' => 'required',
                'IMG' => 'required|image',
                'VID' => ['required', new YouTubeUrl]
            ]);
        } else {
            $data = request()->validate([
                'TITLE' => 'required',
                'TEXT' => 'required',
                'DESCRIPTION' => 'required',
                'VID' => ['required', new YouTubeUrl]
            ]);
        }

        parse_str(parse_url(request('VID'), PHP_URL_QUERY), $my_array_of_vars);
        $video = $my_array_of_vars['v'];

        $id->TITLE = request('TITLE');
        $id->EDITOR = Auth::user()->id;
        $id->VID = $video;
        $id->NO = request('NO');
        $id->DESCRIPTION = request('DESCRIPTION');
        $id->TEXT = request('TEXT');
        if (request('IMG')) {
            $id->IMG = request('IMG')->store('uploads', 'public');
        }
        $id->update();

        return redirect("/programs/" . $id->PROGRAM . "/edit");
    }

    public function destroy(Post $id)
    {
        File::delete("storage/" . $id->IMG);
        $id->delete();
        return redirect("posts");
    }

    public function destroyvid(Videos $id)
    {
        File::delete("storage/" . $id->IMG);
        $id->delete();
        return redirect("videos");
    }

    public function destroyprogramsvid(programsvideos $id)
    {
        File::delete("storage/" . $id->IMG);
        $id->delete();
        return redirect("/programs/" . $id->PROGRAM . "/edit");
    }

    // public function destroyprogramsvideointernal(programsvideos $id)
    // {
    //     // dd($id);
    //      $id->delete();
    // }

    public function destroyprogram(programs $id)
    {
        // $videos = DB::table('programsvideos')->get();
        // foreach ($videos as $video) {
        //     $this->destroyprogramsvideointernal($video->id);
        // }
        File::delete("storage/" . $id->IMG);
        $id->delete();
        return redirect("programs");
    }

    // public function destroyprogramvid(Videos $id)
    // {
    //     $id->delete();
    //     return redirect("videos");
    // }

    public function color()
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0 || Auth::user()->B1 || Auth::user()->B2) {
                return view('webcontrol.color');
            } else return view('welcome');
        } else  return view('welcome');
    }

    public function showChangePasswordGet()
    {
        return view('auth.passwords.change-password');
    }
    public function showtag(Request $request,$tag){
        $tags = poststags::all();

        $sortingOption = request('sort');
      
        switch ($sortingOption) {
            case 'popularity':
                $postintag = Post::where("TAG", "=", $tag)->orderBy('SHOW', 'asc')->paginate(4);
                
                break;
            case 'new':
                $postintag = Post::where("TAG", "=", $tag)->orderBy('DATE_SCHEDULER', 'asc')->paginate(4);
                break;
            default:
                $postintag = Post::where("TAG", "=", $tag)->paginate(4);

                break;
            }
$pageid= $tag;

        $popularpost = Post::where("TAG", "=", $tag)->orderBy('SHOW', 'asc')->first();
        
        if ($request->ajax()) {
            return view('pages.tag', compact('postintag', 'pageid', 'popularpost', 'tags'));
        }
        return view("pages.tag",compact('postintag', 'pageid', 'popularpost', 'tags'));
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $postongroup = groups::where('id', '=', $post->TAG)->first();
        $tags = poststags::all();
        
        $string = $postongroup->TAG;
        $Categories = explode(',', $string);

        $Otherposts= Post::where("TAG", "=", $post->TAG)->orderBy('SHOW', 'asc')->take(4)->get();
        try {
            $post->increment('show');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        $similar_and_popular_post = Post::where("TAG", "=", $post->TAG)->orderBy('SHOW', 'asc')->first();

        $recentposts = Post::where('id',"!=",$id)->orderBy('DATE_SCHEDULER', 'asc')->take(4)->get(); 
        $secondPost = Post::where('id', '>', $post->id)
            ->orderBy('id', 'asc')
            ->first();
$previousPost = Post::where('id', '<', $post->id)
    ->orderBy('id', 'desc')
    ->first();
    $sharebutton = \Share::page(
        url('/المقال/'.$id),
        
    )->facebook()->linkedin()->telegram()->twitter();
        return view('pages.details',compact('post', 'previousPost', 'secondPost', 'recentposts', 'tags', 'sharebutton', 'similar_and_popular_post', 'Otherposts', 'Categories'));

    }

    public function changePasswordPost(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            // Current password and new password same
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success", "Password successfully changed!");
    }


    /// edit at 27/2/2023


    public function destroytags(poststags $id)
    {
        File::delete("storage/" . $id->IMG);
        $id->delete();
        return redirect("posts/tags");
    }

    public function destroygroups(groups $id)
    {
        $id->delete();
        return redirect("posts/groups");
    }

    
    public function destroypictures(pictures $id)
    {
        File::delete("storage/" . $id->IMG1);
        $id->delete();
        return redirect("posts/pictures");
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $request->new_password);
        $lowercase = preg_match('@[a-z]@', $request->new_password);
        $number    = preg_match('@[0-9]@', $request->new_password);
        $specialChars = preg_match('@[^\w]@', $request->new_password);
        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($request->new_password) < 8) {
            return back()->with("error", "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");
        }


        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }

    public function search(Request $request)
    {
        $poststags = DB::table('poststags')->get();
        $posts = DB::table('posts')->orderBy('id', 'DESC')->get();
        $users = DB::table('users')->get();
        $searchQuery = $request->input('q');

        $filteredPosts = Post::where('TITLE', 'like', '%' . $searchQuery . '%')
            ->orWhere('TEXT1', 'like', '%' . $searchQuery . '%')
            ->get();

        return view('webcontrol.posts.search-results', ['poststags' => $poststags, 'searchQuery' => $searchQuery, 'posts' => $posts, 'users' => $users, 'filteredPosts' => $filteredPosts]);
    }
}
