<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Sport;
use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizerController extends Controller
{
    public function __construct()
    {
        //$this->middleware(function ($request, $next) {
           // if (!auth()->user()->is_admin) {
             //   return redirect('/');
           // }
           // return $next($request);
        //});
    }
    public function index()
    {
        $organizers = Organizer::paginate(10);
        return view('admin.organizers.index', compact('organizers'));
    }

    public function create()
    {
        return view('admin.organizers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:organizers',
            'phone' => 'required|string|max:20',
            'description' => 'nullable|string'
        ]);

        Organizer::create($validated);

        return redirect()->route('admin.organizers.index')
            ->with('success', 'Организаторът беше създаден успешно.');
    }

    public function edit(Organizer $organizer)
    {
        return view('admin.organizers.edit', compact('organizer'));
    }

    public function update(Request $request, Organizer $organizer)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:organizers,email,' . $organizer->id,
            'phone' => 'required|string|max:20',
            'description' => 'nullable|string'
        ]);

        $organizer->update($validated);

        return redirect()->route('admin.organizers.index')
            ->with('success', 'Организаторът беше обновен успешно.');
    }

    public function destroy(Organizer $organizer)
    {
        $organizer->delete();

        return redirect()->route('admin.organizers.index')
            ->with('success', 'Организаторът беше изтрит успешно.');
    }
}
