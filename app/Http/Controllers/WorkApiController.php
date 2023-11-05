<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkApiController extends Controller
{
    public function index(Request $request)
    {
        $works = Work::with(['client' => fn($q) => $q->select('id', 'name', 'profile_photo_path')])
            ->matching($request->input('search'), 'title', 'description', 'skills')
            ->matching($request->input('status'), 'status')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($works);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Work $work)
    {
        //
    }

    public function update(Request $request, Work $work)
    {
        //
    }

    public function destroy(Work $work)
    {
        //
    }
}
