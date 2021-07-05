<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ClientRequest; 
use App\Models\Photo;

class ClientController extends Controller
{
    //


    public function index()
    {
        $clients = Client::all();
        return view('client.client-index', compact('clients'));
    }

    public function create()
    {
        return view('client.client-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {


        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        Client::create($input);

        return back()->with('client_success','Client created successfully!');
    }



    public function edit(Client $client)
    {
        return view('client.client-edit', compact('client'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        
        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/media/', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }


        $client->update($input);

        return back()->with('client_success','Client updated successfully!');
    }

    public function delete_client(Request $request, Client $client) {


        if(isset($request->delete_all) && !empty($request->checkbox_array)) {
            $clients = Client::findOrFail($request->checkbox_array);
            foreach ($clients as $client) {
                $client->delete();
            }
            return back()->with('clients_success','Client/s deleted successfully!');
        } else {
            return back();
        }

        $clients = Client::findOrFail($request->checkbox_array);
        foreach ($clients as $client) {
            $client->delete();
        }

        return back();
        //return 'works';
    }



}
