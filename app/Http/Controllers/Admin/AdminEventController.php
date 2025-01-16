<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Sport;
use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdminEventController extends Controller
{
    public function __construct()
    {
        //$this->middleware(function ($request, $next) {
           // if (!auth()->user()->is_admin) {
                //return redirect('/');
            //}
            //return $next($request);
        //});
    }
    public function index()
    {
        $events = Event::with(['sport', 'organizer'])->latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $sports = Sport::all();
        $organizers = Organizer::all();
        return view('admin.events.create', compact('sports', 'organizers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'start_time' => 'required|date',
            'duration' => 'required|integer|min:1',
            'sport_id' => 'required|exists:sports,id',
            'organizer_id' => 'required|exists:organizers,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('events', 'public');
            $validated['image_path'] = $path;
        }

        Event::create($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Събитието беше създадено успешно.');
    }

    public function edit(Event $event)
    {
        $sports = Sport::all();
        $organizers = Organizer::all();
        return view('admin.events.edit', compact('event', 'sports', 'organizers'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'start_time' => 'required|date',
            'duration' => 'required|integer|min:1',
            'sport_id' => 'required|exists:sports,id',
            'organizer_id' => 'required|exists:organizers,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($event->image_path) {
                Storage::disk('public')->delete($event->image_path);
            }
            $path = $request->file('image')->store('events', 'public');
            $validated['image_path'] = $path;
        }

        $event->update($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Събитието беше обновено успешно.');
    }

    public function destroy(Event $event)
    {
        if ($event->image_path) {
            Storage::disk('public')->delete($event->image_path);
        }
        
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Събитието беше изтрито успешно.');
    }
}
