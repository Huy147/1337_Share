<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Image;

class ProfileController extends Controller
{
    //
    public function show()
    {
        // Lấy thông tin của người dùng hiện tại, ví dụ: Auth::user()
        $user = auth()->user();

        // Trả về view hiển thị profile và truyền thông tin người dùng vào view
        return view('profile', ['user' => $user]);
    }
    public function profile()
    {
        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();

        // Lấy danh sách các ảnh mà người dùng đã đăng
        $images = Image::where('created_by', $user->id)->paginate(4);

        // Trả về view profile và truyền thông tin người dùng và danh sách ảnh vào view
        return view('profile', compact('user', 'images'));
    }
    // Phương thức trong controller để xử lý yêu cầu xóa ảnh
    public function destroy($imageId)
    {
        // Tìm ảnh cần xóa
        $image = Image::findOrFail($imageId);
    
        // Xóa ảnh khỏi cơ sở dữ liệu
        $image->delete();
    
        return response()->json(['message' => 'Image deleted successfully'], 200);
    }
    
}
