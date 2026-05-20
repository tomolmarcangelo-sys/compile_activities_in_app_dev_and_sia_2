<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VibeFeedbackController extends Controller
{
    // Requirement 2: Show the form
    public function create()
    {
        return view('vibe_form');
    }

    // Requirement 3: Handle validation
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'      => 'required|min:3|max:50',
            'email_address'  => 'required|email',
            'vibe_score'     => 'required|numeric|min:1|max:10',
            'preferred_mood' => 'required',
            'message'        => 'required|min:15',
        ], [
            // BONUS: Custom Validation Messages
            'full_name.min' => 'Your name is a bit too short, Vibe-seeker!',
            'vibe_score.min' => 'The minimum vibe score is 1.',
            'message.min' => 'Please give us a more detailed description (15+ chars).'
        ]);

        // BONUS: Redirect with success message
        return redirect()->route('vibe.create')->with('success', 'Vibe received! Your feedback is now part of the rhythm.');
    }
}