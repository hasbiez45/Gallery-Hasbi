<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class PhotosController extends Controller
{
    //
    public function create(int $album_id)
    {
        return view('photos.create', compact('album_id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'required|image|max:1999',
            'description' => 'required'

        ]);

        // Get filename with extension
        $filenameWithExt = $request->file('photo')->getClientOriginalName();

        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // Get just extension
        $extension = $request->file('photo')->getClientOriginalExtension();

        // Filename to store
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

        // Upload image
        $path = $request->file('photo')->storeAs('public/albums/'. $request->input('album_id') ,$fileNameToStore);
// dd($path);
        // Create photo
        $photo = new Photo;
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->album_id = $request->input('album_id');
        $photo->photo = $fileNameToStore;
        $photo->size = $request->file('photo')->getSize();
        $photo->save();

        return redirect('/albums/' . $request->input('album_id'))->with('success', 'Photo created');
    }

    public function show(Photo $photo)
    {
        $photo = Photo::findOrFail($photo->id);
        $user = Auth::user();
        $existingLike = Like::where('user_id', $user->id)
        ->where('photo_id', $photo->id)
        ->first();
        $likes = Like::where('photo_id', $photo->id)->get(); // Mengambil semua data Like berdasarkan photo_id
        return view('photos.show', compact('photo','existingLike','likes'));
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->delete();
        return redirect('/albums/' . $photo->album_id)->with('success', 'Photo deleted');
    }
}
