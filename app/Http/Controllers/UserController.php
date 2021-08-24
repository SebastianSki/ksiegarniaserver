<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        if(User::destroy($id))
        {
            return response()->json(['message' => 'wyjebałem to' , 'status'=>'success']);
        }
        return response()->json(['message' => 'wyjebałem się' , 'status'=>'failed']);
    }

    public function add(Request $request)
    {
        try{
            User::insert(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password
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
        $dupa = User::find($request->id);
        $dupa->author = $request->author;
        $dupa->name = $request->name;
        $dupa->date = $request->date;
        $dupa->type = $request->type;

        $dupa->update();
    }

    public function all()
    {
        return response()->json(User::all());
    }

    public function getUser($id)
    {
        return response()->json(User::find($id));
    }
}
