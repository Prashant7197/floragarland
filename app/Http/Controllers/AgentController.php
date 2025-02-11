<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = Agent::all();
        return view('admin.agent.index',compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.agent.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $agent = new Agent();
        $agent->name = $request->name;
        $agent->contact = $request->contact;
        $agent->address = $request->address;
        $agent->password = Hash::make($request->password);
        $agent->email = $request->email;
        $agent->designation = $request->designation;
        if (isset($request->status)) {
            if ($request->status == "on") {
                $agent->status = true;
            } else {
                $agent->status = false;
            }
        } else {
            $agent->status = false;
        }
        $imageName = rand(1000, 9999) . time() . '.' . $request->profile->extension();

        $request->profile->move('images/agent', $imageName);
        $agent->profile = $imageName;

        $agent->save();
        $agents = Agent::all();
        // App('App\Htt p\Controllers\backendController')->sendsms(['name' => 'dad', 'subject' => 'dadsa', 'massege' => 'fsdffsfsdfsfer']);
        return view('admin.agent.index', compact('agents'))->with('msg', 'Vendore successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agent $agent)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agent $agent)
    {
        return view('admin.agent.edit',compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agent $agent)
    {
        $agent->name = $request->name;
        $agent->contact = $request->contact;
        $agent->email = $request->email;
        $agent->address = $request->address;
        $agent->designation = $request->designation;
        $agent->status = 1;
        if (isset($request->status)) {
            if ($request->status == "on") {
                $agent->status = true;
            } else {
                $agent->status = false;
            }
        }else{
            
            $agent->status = false;
        }
        if (isset($request->profile)) {
            // unlink('/images/agent/' . $agent->profile);
            $profileName = rand(1000, 9999) . time() . '.' . $request->profile->extension();

            $request->profile->move('images/agent', $profileName);
            $agent->profile = $profileName;
        }
        $agent->update();
        $agents = Agent::all();
        // App('App\Http\Controllers\backendController')->sendsms(['name' => 'dad', 'subject' => 'dadsa', 'massege' => 'fsdffsfsdfsfer']);
        return view('admin.agent.index', compact('agents'))->with('msg', 'Agent successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
      $agent->delete();
      $agents =Agent::all();
      return view('admin.agent.index', compact('agents'))->with('msg','Agent Deleted Successfuly');
    }
}
