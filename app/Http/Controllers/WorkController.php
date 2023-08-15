<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Auth;

class WorkController extends Controller
{

    public function index()
    {
        if (Auth::user()->hasAnyPermission('work.index')) {
            return view('work.index');
        }

        abort(404);
    }

    public function create()
    {
        if (Auth::user()->hasAnyPermission('work.create')) {
            return view('work.create');
        }

        abort(404);
    }

    public function show(Work $trabajo)
    {
        if (Auth::user()->hasAnyPermission('work.show')) {
            return view('work.show', ['work' => $trabajo]);
        }

        abort(404);
    }

    public function edit(Work $trabajo)
    {
        if (Auth::user()->can('work.edit')) {
            return view('work.edit', ['work' => $trabajo]);
        }

        abort(404);
    }

    public function myworks()
    {
        return view('work.myworks');
    }

    public function assign(Work $work)
    {
        return $work;
    }

    public function assignedIndex()
    {
        return "lista de asignadas";
    }

    public function assignedShow(Work $work)
    {
        return $work;
    }

}
