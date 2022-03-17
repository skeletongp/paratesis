<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    
    public function index()
    {
        return view('works.index');
    }

    public function show(Work $work)
    {
        $work=$work;
        return view('works.show', get_defined_vars());
    }

    public function edit(Work $work)
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
