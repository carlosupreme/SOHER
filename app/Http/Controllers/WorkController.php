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

    public function show($id)
    {
        $solicitud = Work::findOrFail($id);
        if (Auth::id() === $solicitud->client->id && Auth::user()?->can('work.show')) {
            return view('work.show', ['work' => $solicitud]);
        }

        abort(404);
    }

    public function edit($id)
    {
        if (Auth::user()?->can('work.edit')) {
            return view('work.edit', ['work' => Work::findOrFail($id)]);
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

    public function details(Work $work)
    {
        return view('work.details', ['work' => $work]);
    }

}
