<?php

namespace App\Http\Controllers;

use App\Models\Emailing;
use Illuminate\Http\Request;

class EmailingController extends Controller
{
    
    public function index(Request $request)

    {


        $emails = Emailing::all();
        return view("emailng.emailing", compact("emails"));
    }



    
    public function filter(Request $request)
    {
        $emails = Emailing::query();

        if ($request->has('priority')) {
            $emails->where('priority', $request->priority);
        }

        if ($request->has('read')) {
            $emails->where('read', $request->read);
        }

        return view('emailng.updateemails', ['emails' => $emails->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            "name" => "required|max:28",
            "email" => "required",
            "phone" => "required|max:14",
            "message" => "required",
            "priority" => "required"
        ]);

        Emailing::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "message" => $request->message,
            "priority" => $request->priority,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Emailing $emailing)
    {
        $emails = Emailing::all();
        return view("emailng.updateemails", compact("emails"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emailing $emailing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emailing $emailing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emailing $emailing)

    {
        $emailing->delete();
        return back();
    }
    public function markAsRead(Request $request, Emailing $email)
    {
        $email->read = $request->read;
        $email->save();

        return back();
    }
}
