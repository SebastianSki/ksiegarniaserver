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
            return response()->json(['message' => 'wyjebałem to' , 'status'=>'success']);
        }
        return response()->json(['message' => 'wyjebałem się' , 'status'=>'failed']);
    }

    public function add(Request $request)
    {
        try{
            Book::insert(
                [
                    'author' => $request->author,
                    'name' => $request->name,
                    'date' => $request->date,
                    'type' => $request->type
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
        $dupa = Book::find($request->id);
        $dupa->author = $request->author;
        $dupa->name = $request->name;
        $dupa->date = $request->date;
        $dupa->type = $request->type;

        $dupa->update();
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

//data-ng-app="app"
//	data-ng-controller="myKontr">
//
//	<p>Szukaj:<input type="text" data-ng-model="search"></input></p>
//	<div class="container">
//
//		<div class="card" ng-repeat="p in pracownicy |filter:search">
//			<div class="name">{{p.name}} {{p.surname}}</div>
//			<div class="other">{{p.stanowisko}}<br>{{p.staz}}</div>
//		</div>
//<script>
//
//let app = angular.module("app", [])
//		app.controller("myKontr", function($scope, $http, $filter) {
//
//            $http.get("js/pracownicy.json").then(function(response){
//
//                $scope.pracownicy = response.data;
//            })
//		});
