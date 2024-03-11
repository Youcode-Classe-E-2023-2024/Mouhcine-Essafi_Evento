<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showFormAdd()
    {
        $content = file_get_contents('https://raw.githubusercontent.com/alaouy/sql-moroccan-cities/master/json/ville.json');
        $data = json_decode($content);
        $categories = Category::all();
        return view('organisateur.formAddEvent', compact('data', 'categories'));
    }

    public function showFormUpdate($id)
    {
        $content = file_get_contents('https://raw.githubusercontent.com/alaouy/sql-moroccan-cities/master/json/ville.json');
        $data = json_decode($content);
        $categories = Category::all();
        $event = Event::find($id);
        return view('organisateur.formUpdateEvent', compact('data', 'categories', 'event'));
    }

    public function AllEvents()
    {
        $events = Event::where('status', 'Public')->get();
        $categories = Category::all();
        return view('organisateur.evento', compact('events', 'categories'));
    }

    public function EventsWithCategory($category)
    {
        $events = Event::where('category', $category)->where('status', 'Public')->get();
        $categories = Category::all();
        return view('organisateur.evento', compact('events', 'categories'));
    }

    public function showEvent($event_slug)
    {
        $event = Event::where('slug', $event_slug)->first();
        $categories = Category::all();
        return view('detailsEvent', compact('event', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::id();

        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'price' => 'required|numeric',
            'nbr_place' => 'required|integer',
            'description' => 'nullable',
            'reservation_type' => 'required|in:manuel,auto',
            'category' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('image', $fileName, 'public');
            $picturePath = Storage::url($path);
        } else {
            $picturePath = null;
        }

        Event::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'location' => $request->location,
            'date' => $request->date,
            'time' => $request->time,
            'price' => $request->price,
            'nbr_place' => $request->nbr_place,
            'description' => $request->description,
            'reservation_type' => $request->reservation_type,
            'image' => $picturePath,
            'creator' => $user,
            'category' => $request->category,
        ]);

        return redirect('/evento');
    }

    /**
     * Display the specified resource.
     */
    public function editEvent($id)
    {
        $content = file_get_contents('https://raw.githubusercontent.com/alaouy/sql-moroccan-cities/master/json/ville.json');
        $data = json_decode($content);

        $event = Event::find($id);

        return view('organiser.updateEvent', compact('event', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateEvent(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'price' => 'required|numeric',
            'nbr_place' => 'required|integer',
            'description' => 'nullable|string',
            'reservation_type' => 'required|in:manuel,auto',
            'category' => 'required|string|max:255',
        ]);

        $event = Event::find($request->event_id);

        $event->title = $validatedData['title'];
        $event->location = $validatedData['location'];
        $event->date = $validatedData['date'];
        $event->time = $validatedData['time'];
        $event->price = $validatedData['price'];
        $event->nbr_place = $validatedData['nbr_place'];
        $event->description = $validatedData['description'];
        $event->reservation_type = $validatedData['reservation_type'];
        $event->category = $validatedData['category'];
        $event->status = 'Decline';

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $event->image = $imagePath;
        }

        $event->save();
        return redirect('/evento')->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect('/evento')->with('success', 'Event deleted successfully');;
    }

    public function getEventdeclined()
    {
        $events = Event::where('status', 'Decline')->get();
        return view('dashboard.events', compact('events'));
    }

    public function approveEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->status = 'Public';
        $event->save();

        return redirect()->back();
    }

    public function declineEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->status = 'Decline';
        $event->save();

        return redirect()->back();
    }
}