<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        // Kiểm tra xem có từ khóa tìm kiếm không
        if (!empty($keyword)) {
            // Tìm kiếm ảnh có tiêu đề chứa từ khóa
            $images = Image::where('title', 'like', '%' . $keyword . '%')->paginate(12);
        } else {
            // Nếu không có từ khóa, hiển thị tất cả ảnh
            $images = Image::paginate(12);
        }

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

        // Tăng số lượt xem khi mỗi lần hiển thị chi tiết ảnh
        $image->increment('viewed');

        return view('photo-detail', compact('image')); 
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
    public function download($id)
    {
        $image = Image::findOrFail($id);

        // Kiểm tra xem tệp ảnh có tồn tại không
        if (!Storage::exists('public/uploadimages/' . $image->image)) {
            return abort(404);
        }

        // Lấy đường dẫn đến tệp ảnh
        $filePath = storage_path('app/public/uploadimages/' . $image->image);

        // Tải tệp ảnh về local
        return response()->download($filePath);
    }
    public function like(string $id)
    {
        $image = Image::findOrFail($id);

        // Tăng số lượt tim khi người dùng nhấn tim
        $image->increment('liked');

        return redirect()->back();
    }
    
}
