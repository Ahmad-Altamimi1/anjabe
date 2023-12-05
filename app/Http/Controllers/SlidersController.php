<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\Homeslider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class SlidersController extends Controller
{

    public function show()
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0 || Auth::user()->B1) {
                $sliders = Homeslider::all();
                return view('webcontrol.slider.slider', compact('sliders'));
            } else return view('welcome');
        } else  return "You can't access here!";
    }
    public function create()
    {
        if (Auth::user()) {

            if (Auth::user()->admin || Auth::user()->B0 || Auth::user()->B1) {
                $posts = DB::table('posts')->get();
                $users = DB::table('users')->get();
                return view('webcontrol.slider.slidercreate', ['posts' => $posts, 'users' => $users]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }
    public function storeslider()
    {

        $data = request()->validate([
    'post_id' => 'required_without:video',
    'video' => 'required_without:post_id|mimes:mp4,mov,avi,wmv',
    'DATE_SCHEDULER' => 'required',
    'DESCRIPTION' => 'required',
], [
    'post_id.required_without' => 'يجب أن تختار صورة أو فيديو.',
    'video.required_without' => 'يجب أن تختار صورة أو فيديو.',
    'video.mimes' => 'يرجى تحميل ملف فيديو صالح (mp4, mov, avi, wmv).',
]);



        $saveddata = new Homeslider;
        $saveddata->postId = request('post_id');
        $saveddata->DESCRIPTION = request('DESCRIPTION');
        $saveddata->DATE_SCHEDULER = request('DATE_SCHEDULER');
        $saveddata->WRITER = Auth::user()->id;
        $saveddata->EDITOR = Auth::user()->id;
        if (request('video')) {

            $video = request('video');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('uploads/'), $videoName);
            $saveddata->video = 'uploads/' . $videoName;
        }
        $saveddata->save();

        return redirect("sliders");
    }
    public function slideredit($id)
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0 || Auth::user()->B1) {
                $slider =Homeslider::findOrfail($id) ;
                $havevideo = false;
                    if ($slider->video) {
                        $havevideo = true;
                    };
                $posts = DB::table('posts')->get();
                
                return view('webcontrol.slider.editslider', ['slider' => $slider, 'posts' => $posts, 'havevideo'=> $havevideo]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    public function sliderupdate(Homeslider $id)
    {

      
            $data = request()->validate([
                // 'post_id' => 'required_without:video',
            // 'video' => 'required_without:post_id|mimes:mp4,mov,avi,wmv',
                'DATE_SCHEDULER' => 'required',
                'DESCRIPTION' => 'required',
            ]);
        
        $id->postId = request('post_id');
        $id->DATE_SCHEDULER = request('DATE_SCHEDULER');
        $id->EDITOR = Auth::user()->id;
        $id->DESCRIPTION = request('DESCRIPTION');
        if ($id->video) {
          
            $previousVideoPath = public_path($id->video);
            if (file_exists($previousVideoPath)) {
                unlink($previousVideoPath);
            }
        }
        if (request('video')) {

            $video = request('video');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('uploads/'), $videoName);
            $id->video = 'uploads/' . $videoName;
        }
        $id->update();
        return redirect("sliders");

    }
    public function destroy(Homeslider $id)
    {
      
        $id->delete();
        return redirect("sliders");
    }
}
