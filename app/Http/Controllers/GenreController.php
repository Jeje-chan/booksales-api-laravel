<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index(){
        $genres = Genre::all();
        
        return response()->json([
            "success" => true,
            "message"=> "get all resources",
            "data"=> $genres
        ],200);
    }

    public function store(Request $request){
        // validator
        $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'description'=> 'required|string'
        ]);
        
        // cek validator
        if ($validator->fails()) { 
            return response()->json([
                'success'=> false,
                'message'=> 'Validation eror',
                'data'=> $validator->errors()
                ],400);
            }

        // insert data
        $genre = Genre::create([
            'name'=> $request->name,
            'description'=> $request->description,
            ]);
        
        //response
        return response()->json([
            'success'=> true,
            'message'=> 'Resource added successfully',
            'data' => $genre
            ],200);
        }

    public function show($id){
        $genre = Genre::find($id);
        return response()->json([
            'success'=> true,
            'message'=> 'Get Detail Resource',
            'data'=> $genre
        ]);
    }

    public function update(Request $request, $id){
        $genre = Genre::find($id);
        if (! $genre) {
            return response()->json([
                'success'=> false,
                'message'=> 'Resource Not Found'
                ],400);
        }
    $validator = Validator::make($request->all(), [
        'name'=> 'required|string',
        'description'=> 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'=> false,
                'message'=> 'Validation eror',
                'data'=> $validator->errors()
                ],400);
        }

        $data = [
            'name'=> $request->name,
            'description'=> $request->description,
        ];
        
        $genre -> update($data) ;

        return response()->json([
            'success'=> true,
            'message'=> 'Resource added successfully',
            'data'=> $genre
            ],200);
    }

    public function destroy($id){
        $genre = Genre::find($id);
        if (! $genre) {
            return response()->json([
                'success'=> false,
                'message'=> 'Resource not Found'
                ],400);
            }
        
        $genre -> delete();
    }
}
