<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    // View File To Upload Image
    public function index()
    {
        return view('admin.index');
    }

    // Store Image
    public function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'required'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        // Public Folder
        $request->image->move(public_path('images'), $imageName);

        return redirect(route('image.form'))->with('success', 'Image uploaded Successfully!')
            ->with('image', $imageName);
    }

    // Destroy Image
    public function destroy($id)
    {
//        $data = User::find($id);
//        $image_path = public_path('images') . '/' . $data->avt;
//        unlink($image_path);
//        $data->delete();

        $data = User::find($id);
        $image_path = public_path('images') . '/' . $data->avt;
        // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        return redirect(route('admin.show.user', $id));
    }
}
