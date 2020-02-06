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

    public function album(){

        $albums = Album::with('images')->get();

        return view('welcome', compact('albums'));

    }

    public function show($id){

        $albums = Album::findOrFail($id);

        return view('gallery', compact('albums'));

    }

    public function store(Request $request){

        $this->validate($request, [

            'album'=>'required|min:3|max:50',
            'image'=>'required'

        ]);

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

        return "<div class='alert alert-success'>Album created successfully</div>";

    }

    public function destroy(){

        $id = request('id');

        $imageDelete = Image::findOrFail($id);

        $imageDelete->delete();

        //return redirect('/')->with('message', 'Imaged deleted succesfully.');
        return redirect()->back()->with('message','Image deleted successfully!');

        
    }
}
