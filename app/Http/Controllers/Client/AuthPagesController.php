<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\About as About_us;
use App\Models\Carousel;
use App\Models\Description;
use App\Models\Hr;
use App\Models\Image;
use App\Models\Line;
use App\Models\Link;
use App\Models\Question_answer;
use App\Models\Review as Reviews;
use App\Models\Sortable;
use App\Models\User;
use Illuminate\Http\Request;

class AuthPagesController extends Controller
{
    public function index()
    {

        return view('client.auth.index');
    }

    public function profile($slug)
    {
        $user = User::query()->where('slug', $slug)->first();
        $items = [];
        $loops = Sortable::where('user_id', $user->id)->orderBy('position')->get();
//        dd($loops);
        foreach ($loops as $loop) {
            if ($loop->type == 'description') {
                $items[$loop->id]['description'] = Description::find([$loop->type_id]);
//                dd($loop);
            }

            if ($loop->type == 'about') {
                $items[$loop->id]['about'] = About_us::find([$loop->type_id]);
            }
            if ($loop->type == 'carousel') {
                $items[$loop->id]['carousel'] = Carousel::find([$loop->type_id]);
            }
            if ($loop->type == 'link') {
                $items[$loop->id]['link'] = Link::find([$loop->type_id]);
            }
            if ($loop->type == 'review') {
                $items[$loop->id]['review'] = Reviews::find([$loop->type_id]);
            }
            if ($loop->type == 'question_answer') {
                $items[$loop->id]['question_answer'] = Question_answer::find([$loop->type_id]);
            }
        }


        return view('client.auth.profile',compact('user'), [
            'items' => $items
        ]);
    }
}
