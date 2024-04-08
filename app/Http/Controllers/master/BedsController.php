<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Http\Requests\BedRequest;
use App\Models\Master\Bed;
use App\Models\Master\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BedsController extends Controller
{

    public function index()
    {
        $beds=Bed::list()->get();
        return view('master.beds.bed-list',compact('beds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $rooms=Room::all();
       return view('master.beds.bed-create',compact('rooms'));
    }

    public function edit($bedid)
    {
        $bed = Bed::list()->where('beds.id', $bedid)->first();
        if(!$bed) return back()->with('error','Bed not found');
        $rooms = Room::all();
        return view('master.beds.bed-create',compact('rooms','bed'));

    }
    public function store(BedRequest $request)
    {
        $bedarray = $request->get('bed');
        if (empty($bedarray['id'])) { //new
            $bedarray['created_by'] = Auth::id();
            Bed::query()->create($bedarray);
        } else {//update
            $bed = Bed::query()->find($bedarray['id']);
            if (!$bed) redirect()->back()->with('error', 'Room not found');
            $bedarray['updated_by'] = Auth::id();
            $bed->update($bedarray);
        }
        return redirect()->route('bed')->with('success', 'Bed saved!');
    }



    public function destroy(string $id)
    {
    }
}
