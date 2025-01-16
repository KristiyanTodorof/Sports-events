<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Sport;
use App\Models\Organizer;
class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->
        // $this->middleware(function ($request, $next): mixed {
        //     if (!auth()->user()->is_admin) {
        //         return redirect('/');
        //     }
        //     return $next($request);
        // });
    }
    public function index()
    {
        $stats = [
            'events_count' => Event::count(),
            'sports_count' => Sport::count(),
            'organizers_count' => Organizer::count(),
            'upcoming_events' => Event::where('start_time', '>', now())->count()
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
