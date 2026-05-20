<?php

namespace App\Http\Controllers;

use App\Models\Sorcerer;
use Illuminate\Http\Request;

class SorcererController extends Controller
{
    public function index() {
        $sorcerers = Sorcerer::all(); // Fetch all from DB
        return view('sorcerers.index', compact('sorcerers'));
    }

    public function show($id) {
        $sorcerer = Sorcerer::findOrFail($id); // Fetch single item
        return view('sorcerers.show', compact('sorcerer'));
    }
}
