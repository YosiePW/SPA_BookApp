<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all()->toArray();
        return array_reverse($books);
    }

    public function add(Request $request)
    {
        $book = new Book([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'publisher' => $request->input('publisher'),
            'year' => $request->input('year')
        ]);
        $book->save();

        return response()->json('The book successfully added');
    }    
    
    public function edit($id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    public function update($id, Request $request)
    {
        $book = Book::find($id);
        $book->update($request->all());
        
        return response()->json("Berhasil mengupdate buku");
    }
    
    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();

        return response()->json("Berhasil menghapus buku");
    }
}


