<?php

namespace App\Http\Controllers;

use App\Person;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id, $name) {
        $select = Person::find($id);
        $contentType = Storage::mimeType($select->img);

        if($select->img_raw === $name) { // aby użytkownik nie mający linku nie dostał się do obrazka po samym id
            $img = Storage::get($select->img);

            return response()->make($img, 200, ['content-type' => $contentType]);
        }
    }
}
