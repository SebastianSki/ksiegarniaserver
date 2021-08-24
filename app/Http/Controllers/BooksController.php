<?php

namespace App\Http\Controllers;

use App\Models\Book;
use http\Env\Response;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return response()->json([200,'success']);
    }


    public function delete($id)
    {
        if(Book::destroy($id))
        {
            return response()->json(['message' => 'usunięta' , 'status'=>'success']);
        }
        return response()->json(['message' => 'nie udało się usunąć' , 'status'=>'failed']);
    }

    public function add(Request $request)
    {
        try{
            Book::insert(
                [
                    'author' => $request->author,
                    'name' => $request->name,
                    'date' => $request->date,
                    'type' => $request->type,
                    'rating' => $request->rating,
                    'cover' => $request->cover
                ]
            );
            return response()->json(['message' => 'udalo sie' , 'status'=>'success']);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }

    }

    public function update(Request $request)
    {
        $book = Book::find($request->id);
        $book->author = $request->author;
        $book->name = $request->name;
        $book->date = $request->date;
        $book->type = $request->type;
        $book->rating = $request->rating;

        $book->update();
    }

    public function all()
    {
        return response()->json(Book::all());
    }

    public function getBook($id)
    {
        return response()->json(Book::find($id));
    }
}

