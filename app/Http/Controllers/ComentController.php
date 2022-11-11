<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ComentController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check())
        {

            $validator = Validator::make($request->all(),[
                'comment_body' => 'required|string'
            ]);

            if ($validator->fails())
            {

                return redirect()->back()->with('message','Comment area is mandetory');

            }

            $post = Product::where('slug', $request->post_slug)->first()  ;



            if ($post)
            {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body
                ]);


                return redirect()->back()->with('message','Commented Successfully');

            }
            else
            {
                return redirect()->back()->with('message','No Such Post Found');
            }

        }
        else
        {
            return redirect('login')->with('message','Login first to comment');
        }

    }
}
