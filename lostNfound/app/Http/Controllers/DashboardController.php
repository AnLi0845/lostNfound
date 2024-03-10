<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Responses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $userId = Auth::id();
        $noticesGroupedByType = Notice::where('user_id', $userId)
            ->get()
            ->groupBy('type');
        $respondedNoticesGroupedByType = Notice::whereIn('id', Responses::where('responder_id', $userId)->pluck('notice_id'))
            ->get()
            ->groupBy('type');

        return view('dashboard', compact('noticesGroupedByType', 'respondedNoticesGroupedByType'));
    }

}
