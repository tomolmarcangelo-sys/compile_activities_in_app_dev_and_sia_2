<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VibeFeedbackController extends Controller
{
    public function create()
    {
        return view('vibe_feedback');
    }

    public function store(Request $request)
    {
        // Requirement 3: Validation (5+ fields, multiple rules)
        $request->validate([
            'listener_name' => 'required|min:3|max:30',
            'listener_email' => 'required|email',
            'vibe_rating' => 'required|numeric|min:1|max:5',
            'favorite_genre' => 'required',
            'suggestions' => 'required|min:10',
        ], [
            // BONUS: Custom Validation Messages
            'listener_name.min' => 'We need at least 3 characters to recognize your name!',
            'vibe_rating.required' => 'Please give us a star rating from 1 to 5.',
            'suggestions.min' => 'Tell us a bit more! (Minimum 10 characters).',
        ]);

        // BONUS: Redirect with success message
        return redirect()->route('feedback.create')->with('success', 'Rock on! Your feedback has been tuned in.');
    }
}