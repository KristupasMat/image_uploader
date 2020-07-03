<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImagesController extends Controller
{
    public function index()
    {
        $images = Image::orderBy('created_at', 'DESC')->paginate(9);
        return view('index', compact('images'));
    }


    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'capturedImage' => ['string', 'nullable'],
            'image' => ['image', 'nullable'],
        ]);


        if(request('image')) {
            $imagePath = request('image')->store('uploads', 'public');
        } else {
            $imagePath = request('capturedImage');
        }


        Image::create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        return redirect('/');

        // $data = request()->validate([
        //     'caption' => 'required',
        //     'image' => ['required', 'image']
        // ]);

        // $imagePath = request('image')->store('uploads', 'public');

        // Image::create([
        //     'caption' => $data['caption'],
        //     'image' => $imagePath
        // ]);

        // return redirect('/');
    }
}

