<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::all(); // Fetch all images from database
        // Pass the images to the view with compact
        return view('index', compact('images'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('images');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'fileToUpload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
        'hashtag' => 'nullable|string|max:255',
      ]);
    
      if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()->with('error', 'Vui lòng sửa các lỗi sau:');
      }
    
      $image = new Image;
      $image->title = $request->title;
      $image->description = $request->description;
      $image->hashtag = $request->hashtag;
      $image->created_by = Auth::user()->id ?? null; // Set created_by if user is logged in
    
      // Store the uploaded image
      $imageName = time() . '.' . $request->fileToUpload->getClientOriginalExtension();
      $request->fileToUpload->storeAs('public/uploadimages', $imageName);
    
      $image->image = $imageName; // Update image attribute in model
    
      $image->save();
    
      return redirect()->route("images")->with('success', 'Ảnh đã được tạo thành công!');
    }
    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $validator = Validator::make(compact('id'), [
            'id' => 'required|numeric|exists:images,id', // Validate image ID
        ]);
    
        if ($validator->fails()) {
            return abort(404); // Abort with 404 Not Found if validation fails
        }
    
        $image = Image::findOrFail($id); // Find the image by ID or throw 404
        
    
        return view('photo-detail', compact('image')); // Pass the image to the show_image view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
