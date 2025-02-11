<?php

namespace App\Http\Controllers;

use App\Models\Feedback;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('admin.feedback.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.feedback.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $feedback = new Feedback();
        $feedback->name = $request->name;
        $feedback->description = $request->description;
        $feedback->feedback = $request->feedback;
       
        if (isset($request->status)) {
            if ($request->status == "on") {
                $feedback->status = true;
            } else {
                $feedback->status = false;
            }
        } else {
            $feedback->status = false;
        }
        $imageName = rand(1000, 9999) . time() . '.' . $request->profile->extension();

        $request->profile->move('images/feedback', $imageName);
        $feedback->profile = $imageName;

        $feedback->save();
        $feedbacks = Feedback::all();
        // App('App\Htt p\Controllers\backendController')->sendsms(['name' => 'dad', 'subject' => 'dadsa', 'massege' => 'fsdffsfsdfsfer']);
        return view('admin.feedback.index', compact('feedbacks'))->with('msg', 'Feedbacke successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        return view('admin.feedback.view', compact($feedback));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        // return $feedback;

        return view('admin.feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        $feedback->name = $request->name;
        $feedback->description = $request->description;
        $feedback->feedback = $request->feedback;
        $feedback->status = 1;
        if (isset($request->status)) {
            if ($request->status == "on") {
                $feedback->status = true;
            } else {
                $feedback->status = false;
            }
        }else{
            
            $feedback->status = false;
        }
        if (isset($request->profile)) {
            unlink('/images/feedback/' . $feedback->profile);
            $profileName = rand(1000, 9999) . time() . '.' . $request->profile->extension();

            $request->profile->move('images/feedback', $profileName);
            $feedback->profile = $profileName;
        }
        $feedback->update();
        $feedbacks = Feedback::all();
        // App('App\Http\Controllers\backendController')->sendsms(['name' => 'dad', 'subject' => 'dadsa', 'massege' => 'fsdffsfsdfsfer']);
        return view('admin.feedback.index', compact('feedbacks'))->with('msg', 'Feedbacke successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        $feedbacks = Feedback::all();
        return view('admin.feedback.index', compact('feedbacks'))->with('msg', 'Feedbacke successfully deleted');
    }
}
