<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;
use Validator;

class SiteController extends Controller
{
    public function index() {
        return view('site.index');
    }

    public function upload(Request $request) {

        $rules = [
            'imie' => 'required',
            'plik' => 'mimes:jpeg,jpg,png'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 400);
        }
        else {
            $img = $request->file('plik');
            $img_raw = $img->getClientOriginalName();

            $img = $img->store('pliki');

            $person = new Person();
            $person->imie = filter_var($request->imie, FILTER_SANITIZE_STRING);
            $person->nazwisko = filter_var($request->nazwisko, FILTER_SANITIZE_STRING);
            $person->img = $img;
            $person->img_raw = $img_raw;
            $person->save();

            return response()->json(['text' => 'form sent successfully'], 201);
        }
    }
}
