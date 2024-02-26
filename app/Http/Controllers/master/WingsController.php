<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\Wing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class WingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wings = Wing::latest()->paginate(5);
        return view('master.wings.list-wing', compact('wings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.wings.create-wing');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:wings',
        ]);
        $wing=new Wing();
        $wing->name=$request->name;
        $wing->save();
        return redirect()->route('wing.index')->with('wing Successfully saved');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
     $wing=Wing::find($id);
     if(!$wing) return back()->with('error','Wing not found');
     return view('master.wings.edit-wing',compact('wing'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required', Rule::unique('wings', 'name')->ignore('id'),

        ]);


        $wing=Wing::find($id);
        $wing->name=$request->name;
        $wing->update();
        return redirect()->route('wing.index')->with('wing Successfully saved');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
   $wing=Wing::find($id);
   if(!$wing) return back()->with('error','Wing successfully deleted');
   $wing->delete();
   return redirect()->route('wing.index');
    }
}
