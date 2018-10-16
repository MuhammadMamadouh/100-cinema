<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Movies;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = DB::table('movies')->orderBy('created_at')->limit(3)->get();
        return view('home', compact('movies'));
    }

    public function search()
    {
        $query = \request('query');
        $cast = Cast::where('name', 'like', '%' . $query . '%')->select('id', 'name', 'image')->get();
        $movies = Movies::where('title', 'like', '%' . $query . '%')->select('id', 'title', 'poster')->get();
        $users = User::where('name', 'like', '%' . $query . '%')->select('id', 'name', 'image')->get();
//        $results = $movies->merge($cast)->merge($users);

        return view('search', compact('cast', 'movies', 'users'));


    }

}
