<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients=Client::where('user_id',Auth::guard('api')->user()->id)->get();

        return $clients;
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {

        try{
            $client=new Client;
            $client->client_name=$request->client_name;
            $client->country=$request->country;
            $client->town=$request->town;
            $client->phone_number=$request->phone_number;
            $client->client_email=$request->client_email;
            $client->user_id=Auth::guard('api')->user()->id;
            $client->isCompany=$request->isCompany;
            if($request->file('logo')){
                $file = $request->file('logo');
                $image_path = $file->store('clients', 'public');
                $client->logo=$image_path;
            }
            $client->save();

            return response()->json(['message'=>"client created successfully"],200);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'errors' => $e
              ], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client=Client::find($id);
        $client->delete();

        return response()->json(['message'=>"client delete successfully"],200);
    }
}
