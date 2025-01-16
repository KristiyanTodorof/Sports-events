<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Sport;
use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SportController extends Controller
{
    public function index()
    {
        $sports = Sport::paginate(10);
        return view('admin.sports.index', compact('sports'));
    }

    public function create()
    {
        return view('admin.sports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string'
        ]);

        Sport::create($validated);

        return redirect()->route('admin.sports.index')
            ->with('success', 'Спортът беше създаден успешно.');
    }

    public function edit(Sport $sport)
    {
        return view('admin.sports.edit', compact('sport'));
    }

    public function update(Request $request, Sport $sport)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string'
        ]);

        $sport->update($validated);

        return redirect()->route('admin.sports.index')
            ->with('success', 'Спортът беше обновен успешно.');
    }

    public function destroy(Sport $sport)
    {
        $sport->delete();

        return redirect()->route('admin.sports.index')
            ->with('success', 'Спортът беше изтрит успешно.');
    }
}
