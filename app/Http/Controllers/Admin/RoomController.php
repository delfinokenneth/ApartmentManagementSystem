<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rooms = Room::latest()->get();
        return view('admin.rooms.index')->with([
            'rooms' => $rooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        //
        if ($request->validated()) {
            Room::create([
                'room_name' => $request->room_name,
                'room_rate' => $request->room_rate
            ]);

            return redirect()->route('admin.rooms.index')->with([
                'success' => 'Room added successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
        return view('admin.rooms.edit')->with([
            'room' => $room
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        //
        if ($request->validated()) {
            $room->update([
                'room_name' => $request->room_name,
                'room_rate' => $request->room_rate
            ]);

            return redirect()->route('admin.rooms.index')->with([
                'success' => 'Room updated successfully'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
        $room->delete();

        return redirect()->route('admin.rooms.index')->with([
            'success' => 'Category deleted successfully'
        ]);
    }
}
