<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class NewsController extends Controller
{
    public function getData(){
    $client = new Client();
    $request = $client->get('https://newsapi.org/v2/top-headlines?country=id&apiKey=2c5ecacb7826476ea3d8886288deded2');
    $response = $request->getBody();
    $result = json_decode($response);
    return view('home',['artikel'=>$result->articles]);
    }
    public function searchData(Request $request){
        $client = new Client();
        $query = $request->keyword;
        $req = $client->get('https://newsapi.org/v2/topheadlines?country=id&apiKey=2c5ecacb7826476ea3d8886288deded2&q='.$query);
        $response = $req->getBody();
        $result = json_decode($response);
        return view('home',['artikel'=>$result->articles]);
       }
       
}
