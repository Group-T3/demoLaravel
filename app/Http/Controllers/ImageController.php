<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Service\Interfaces\UserServiceInterfaces;
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
        $data = User::find($id);
        $urlImg = $data->avt;
        $realUrl = str_replace(asset(''), '', $urlImg);
        if (File::exists($realUrl)) {
            File::delete($realUrl);
        }
        return redirect(route('myprofile', $id));
    }
}
