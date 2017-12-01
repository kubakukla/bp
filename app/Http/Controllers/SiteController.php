<?php

namespace App\Http\Controllers;

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

            $path = $request->file('plik')->store('pliki');

            return response()->json(['text' => 'form sent successfully'], 201);
        }
    }
}
