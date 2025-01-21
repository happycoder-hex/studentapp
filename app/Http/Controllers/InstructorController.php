<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Instructor;
use Illuminate\View\View;

class InstructorController extends Controller
{
    public function index(): View
    {
        $instructors = Instructor::all();
        return view ('instructors.index')->with('instructors', $instructors);
    }
 
    public function create(): View
    {
        return view('instructors.create');
    }
  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Instructor::create($input);
        return redirect('instructors')->with('flash_message', 'Instructor Added!');
    }
    public function show(string $id): View
    {
        $instructors = Instructor::find($id);
        return view('instructors.show')->with('instructors', $instructors);
    }
    public function edit(string $id): View
    {
        $instructors = Instructor::find($id);
        return view('instructors.edit')->with('instructors', $instructors);
    }
    public function update(Request $request, string $id): RedirectResponse
    {
        $instructors = Instructor::find($id);
        $input = $request->all();
        $instructors->update($input);
        return redirect('instructors')->with('flash_message', 'Instructor Upxdated!');  
    }
    
    public function destroy(string $id): RedirectResponse
    {
        Instructor::destroy($id);
        return redirect('instructors')->with('flash_message', 'Instructor deleted!'); 
    }
}