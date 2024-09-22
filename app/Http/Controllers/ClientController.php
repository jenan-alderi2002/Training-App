<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
    return Client::all();
    }
    public function show($id){
   $client=Client::find($id);
    if(!$client){
        return response()->json(['message'=>'Client not found'],404);
    }
    return new ClientResource($client);
    }
}
