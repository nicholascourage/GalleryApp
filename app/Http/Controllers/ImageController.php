<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Image;

Use App\Album;

class ImageController extends Controller
{
    public function index(){

        $images = Image::get();

        return view('home', compact('images'));

    }

    public function store(Request $request){

        $album = Album::create(['name'=>$request->get('album')]);


        if($request->hasFile('image')){

            foreach($request->file('image') as $image){

                $path = $image->store('uploads', 'public');
                Image::create([

                    'name' => $path,
                    'album_id' => $album->id
    
                ]);

            }


        }

    }
}
