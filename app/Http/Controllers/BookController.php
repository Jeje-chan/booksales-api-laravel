<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();

        return response()->json([
            "success" => true,
            "message"=> "get all book",
            "data"=> $books
        ],200);
    }
    public function store(Request $request){
        //1. validator
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max: 100',
            'description'=> 'required|string',
            'price'=> 'required|numeric',
            'stock'=> 'required|integer',
            'cover_photo'=> 'required|image|mimes:jpeg,jpg,png|max:2048',
            'genre_id'=> 'required|exists:genres,id',
            'author_id'=> 'required|exists:authors,id'
        ]);

        //2. cek validator
        if ($validator->fails()){
            return response()->json([
                'success'=> false,
                'message'=> 'validation eror',
                'data'=> $validator->errors()
            ], 422);
        }

        //upload image
        $image = $request->file('cover_photo');
        $image->store('books', 'public');

        // insert data
        $book = Book::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'price'=> $request->price,
            'stock'=> $request->stock,
            'cover_photo'=> $image->hashName(),
            'genre_id'=> $request->genre_id,
            'author_id'=> $request->author_id,
        ]);

        //response
        return response()->json([
            'success'=> true,
            'message'=> 'Resource added successfully',
            'data' => $book
        ],200);
    }

    public function show(string $id){
        $book = Book::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Get detail Resource',
            'data'=> $book
        ]);
    }



    public function update(Request $request, string $id){
        // mencari data
        $book = Book::find($id);
        if (!$book){
            return response()->json([
                'success'=> false,
                'message'=> 'Resource not Found'
                ],404);
            }
        // validasi data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max: 100',
            'description'=> 'required|string',
            'price'=> 'required|numeric',
            'stock'=> 'required|integer',
            'cover_photo'=> 'sometimes|image|mimes:jpeg,jpg,png|max:2048',
            'genre_id'=> 'required|exists:genres,id',
            'author_id'=> 'required|exists:authors,id'
        ]);

        

        if ($validator->fails()){
            return response()->json([
                'success'=> false,
                'message'=> 'validation eror',
                'data'=> $validator->errors()
            ], 422);
        }

        // siapkan data yang ingin diupdate
        $data = [
            'title'=> $request->title,
            'description'=> $request->description,
            'price'=> $request->price,
            'stock'=> $request->stock,
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id,
        ];

        // handle image (upload, delete image)
        if ($request->hasFile('cover_photo')){
            $image = $request->file('cover_photo');
            $image -> $image->store('books','public');

            if ($book -> cover_photo) {
            Storage::disk('public')->delete('books/' . $book -> cover_photo);
            }

            $data['cover_photo'] = $image->hashName();
        }
        // update data baru ke database
        $book -> update($data);

        return response()->json([
            'success'=> true,
            'message'=> 'Resource added successfully',
            'data' => $book
            ],200);
        }
    public function destroy(string $id){
        $book = Book::find($id);
        if (!$book){
            return response()->json([
                'success'=> false,
                'message'=> 'Resource not Found'
                ],404);
        }

        if($book->cover_photo){
            //delete from storage
            Storage::disk('public')->delete('books/' . $book->cover_photo);
        }
        $book->delete();
    }
}

