<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Master\Room;
use App\Models\Master\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::list()->get();
        return view('master.rooms.room-list', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wards=Ward::all();
        return view('master.rooms.create-room',compact('wards'));
    }

    public function edit($roomid)
    {
        $room = Room::list()->where('rooms.id', $roomid)->first();
        if(!$room) return back()->with('error','Room not found');
        $wards = Ward::all();
        return view('master.rooms.create-room',compact('wards','room'));
    }
    public function store(Request $request)
    {
        $roomarray = $request->get('room');
        if (empty($roomarray['id'])) {//new
            $roomarray['created_by'] = Auth::id();
            Room::query()->create($roomarray);
        } else {//update
            $room = Room::query()->find($roomarray['id']);
            if (!$room) redirect()->back()->with('error', 'Room not found');
            $roomarray['updated_by'] = Auth::id();
            $room->update($roomarray);
        }
        return redirect()->route('room')->with('success', 'Room saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
