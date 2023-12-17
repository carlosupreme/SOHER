<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Work\Domain\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use JsonException;

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
        try {
            Validator::make($request->input(), [
                'title' => 'required|min:10|max:70',
                'location' => 'required|min:10|max:100',
                'skills' => 'required',
                'deadline.*' => 'required',
                'description' => 'required|min:10|max:2000',
                'initialBudget' => 'required|numeric|min:1|max_digits:6',
                'finalBudget' => 'required|numeric|gte:initialBudget|max_digits:6'
            ])->validate();
        } catch (ValidationException $exception) {
            return response()->json(['statusText' => $exception->getMessage()], 400);
        }

        $work = new Work();
        $work->title = $request->input('title');
        $work->description = $request->input('description');
        $work->location = $request->input('location');
        try {
            $work->skills = json_decode($request->input('skills'), false, 512, JSON_THROW_ON_ERROR);
            $deadline = json_decode($request->input('deadline'), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $jsonException) {
            return response()->json(['statusText' => $jsonException->getMessage(), 'stackTrace' => $jsonException->getTrace()], 400);
        }

        $work->initial_budget = $request->input('initialBudget');
        $work->final_budget = $request->input('finalBudget');
        $work->deadline = Carbon::create($deadline['year'], $deadline['month'], $deadline['day']);
        $work->client_id = Auth::id();
        $work->status = Status::OPEN->value;

        $s = $request->file('photo')?->store('public/images');

        return response()->json([
            'statusText' => 'Work created successfully',
            'data' => $work,
            'user' => Auth::user(),
            "s" => $s
        ], 201);
    }

    public function show(int $work)
    {
        $workEntity = Work::with(['client' => fn($q) => $q->select('id', 'name', 'profile_photo_path')])
            ->where('id', $work)
            ->first();
        return response()->json($workEntity);
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
