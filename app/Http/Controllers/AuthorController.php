<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::all();

        return response()->json([
            "success" => true,
            "message"=> "get all resources",
            "data"=> $authors
        ],200);
    }
    public function store(Request $request){
    // validator
    $validator = Validator::make($request->all(), [
        "name"=> "required|string",
        "bio" => "required|string",
        ]);
    // cek validator
    if ($validator->fails()) {
        return response()->json([
            "success"=> false,
            "message"=> 'Validation Eror',
            'data'=> $validator->errors()
            ],400);
        }
    // insert data
    $author = Author::create([
        'name'=> $request->name,
        'bio'=> $request->bio,
    ]);

    // response
    return response()->json([
        'success'=> true,
        'message'=> 'Resource added successfully',
        'data'=> $author
        ],200);
    }
    public function show($id){
        $author = Author::find($id);
        return response()->json([
            'success'=> true,
            'message'=> 'Get Detail Resource',
            'data'=> $author
        ]);
    }
    public function update(Request $request, $id){
        // validator
        $validator = Validator::make($request->all(), [
            "name"=> "required|string",
            "bio" => "required|string",
        ]);
        // cek validator
        if ($validator->fails()) {
            return response()->json([
                "success"=> false,
                "message"=> 'Validation Eror',
                'data'=> $validator->errors()
                ],400);
            }
        // update data
        $author = Author::find($id);
        $author->update([
            'name'=> $request->name,
            'bio'=> $request->bio,
        ]);

        // response
        return response()->json([
            'success'=> true,
            'message'=> 'Resource updated successfully',
            'data'=> $author
            ],200);
    }
    public function destroy($id){
        $author = Author::find($id);
        if (!$author){
            return response()->json([
                'success'=> false,
                'message'=> 'Resource not Found'
            ],404);
        }
        $author->delete();
        return response()->json([
            'success'=> true,
            'message'=> 'Resource deleted successfully',
            'data'=> $author
        ],200);
    }
}
