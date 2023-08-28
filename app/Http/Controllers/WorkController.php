<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Auth;

class WorkController extends Controller
{

    public function index()
    {
        if (Auth::user()?->can('work.index')) {
            return view('work.index');
        }

        abort(404);
    }

    public function create()
    {
        if (Auth::user()?->can('work.create')) {
            return view('work.create');
        }

        abort(404);
    }

    public function show(Work $trabajo)
    {
        return view('work.show', ['work' => $trabajo]);
    }

    public function edit(Work $trabajo)
    {
        if (Auth::user()?->can('work.edit')) {
            return view('work.edit', ['work' => $trabajo]);
        }

        abort(404);
    }

    public function myworks()
    {
        return view('work.myworks');
    }

    public function assign($work)
    {
        return view('work.assign', [
            'work' => Work::with('client')->findOrFail($work)
        ]);
    }

    public function assignedIndex()
    {
        return view('work.assigned-index');
    }

    public function assignedShow(Work $work)
    {
        return view('work.show', ['work' => $work]);
    }

}
