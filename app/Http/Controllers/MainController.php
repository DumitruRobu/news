<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsFeedResource;
use App\Models\NewsFeed;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function selectAll(){
        $allTheNews = NewsFeed::all();
        return NewsFeedResource::collection($allTheNews);
    }
}
