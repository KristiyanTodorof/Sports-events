<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Sport;
use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicEventController extends Controller
{
    public function index(Request $request)
    {
        // Започваме с основната заявка
    $query = Event::with(['sport', 'organizer']);

    // Филтриране по спорт
    if ($request->filled('sport_id')) {
        $query->where('sport_id', $request->sport_id);
    }

    // Филтриране по организатор
    if ($request->filled('organizer_id')) {
        $query->where('organizer_id', $request->organizer_id);
    }

    // Филтриране по дата
    if ($request->filled('date')) {
        $query->whereDate('start_time', $request->date);
    }

    // Вземаме резултатите
    $events = $query->orderBy('start_time', 'asc')->simplePaginate(8);
    
    // Вземаме всички спортове и организатори за dropdown менютата
    $sports = Sport::all();
    $organizers = Organizer::all();

    return view('events.index', compact('events', 'sports', 'organizers'));
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function search(Request $request)
    {
        $query = Event::query();

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhereHas('sport', function($q) use ($searchTerm) {
                      $q->where('name', 'LIKE', "%{$searchTerm}%");
                  })
                  ->orWhereHas('organizer', function($q) use ($searchTerm) {
                      $q->where('name', 'LIKE', "%{$searchTerm}%");
                  });
        }

        $events = $query->with(['sport', 'organizer'])->paginate(12);
        return view('events.search', compact('events'));
    }
}