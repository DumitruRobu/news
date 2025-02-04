<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitFormRequest;
use App\Http\Resources\NewsFeedResource;
use App\Models\Cereri;
use App\Models\NewsFeed;
use App\Models\Post;
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
    public function obtainInfo($id){
        $theNewsInfo = NewsFeed::findOrFail($id);
        return new NewsFeedResource($theNewsInfo);
    }
    public function getLastOne(){
        $theLastElement = NewsFeed::latest('id')->first();
        return $theLastElement;
    }
    public function submitForm(SubmitFormRequest $request){
        $data = $request->validated();
        NewsFeed::firstOrCreate($data);
        return response()->json(['The news has been created successfully!']);
    }

    public function getAllCereri(){
        $cereri = Cereri::all();
        return response()->json([
            'cereri'=>$cereri
        ]);
    }
}
