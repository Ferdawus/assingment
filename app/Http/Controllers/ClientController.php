<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = DB::table('clients')->get();
        return json_encode($clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "dkdjk0";

        // $client = array();
        // $client['name'] = $request->name;
        // $client['email'] = $request->email;
        // $client['phone'] = $request->phone;
        // $client['address'] = $request->address;
        // DB::table('clients')->insert($client);
        $client = Client::create([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'address' => request('address'),
        ]);
        return $client;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editClient = DB::table('clients')->where('id',$id)->first();
        return json_encode($editClient);

        // return DB::table('clients')->where('id',$id)->get();
        // $clientEdit = DB::table('clients')->where('id',$id)->get();
        // return json_encode($clientEdit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $clientEdit = DB::table('clients')->where('id',$id)->get();
        // return json_encode($clientEdit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // echo "update";
       return Client::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('clients')->where('id',$id)->delete();
       return response()->json(['message' => 'data deleted'],200);
    }
}
