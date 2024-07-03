<?php

namespace App\Http\Controllers;

use App\Models\Clasification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClasificationController extends Controller
{
    public function index_clasification() {
        $clasifications = Clasification::all();

        return view('clasification.index', compact('clasifications'));
    }

    public function create_clasification(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        Clasification::create([
            'name' => $request->name,
        ]);

        return Redirect::back();
    }

    public function edit_clasification(Clasification $clasification) {
        return view('clasification.edit', compact('clasification'));
    }

    public function update_clasification(Request $request, Clasification $clasification) {
        $request->validate([
            'name' => 'required',
        ]);

        $clasification->update([
            'name' => $request->name,
        ]);

        return Redirect::route('clasification.index');
    }

    public function delete_clasification(Clasification $clasification) {
        $clasification->delete();

        return Redirect::back();
    }
}
