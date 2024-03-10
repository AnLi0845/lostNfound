<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Responses;
use Illuminate\Http\Request;

class NoticeController extends Controller
{

    public function index()
    {
        $pendingNotices = Notice::where('status', 'pending')->get();
        return view('notices.index', compact('pendingNotices'));
    }

    public function create()
    {
        return view('notices.create');
    }

    public function show($id)
    {
        $notice = Notice::with('responses')->findOrFail($id);
        $responses = $notice->responses->first();
        return view('notices.show', compact('notice', 'responses'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|in:lost,found',
            'date' => 'required|date',
            'venue' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('notices', 'public');
            $validatedData['image'] = $imagePath;
        }

        $notice = new Notice($validatedData);
        $notice->user_id = auth()->id(); // assuming you have user authentication
        $notice->save();

        return redirect()->route('dashboard')->with('success', 'Notice created successfully!');
    }

    public function respond(Request $request, $noticeId)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $notice = Notice::findOrFail($noticeId);

        $response = new Responses();
        $response->notice_id = $noticeId;
        $response->responder_id = auth()->id();
        $response->message = $request->message;
        $response->save();

        $notice->status = 'completed';
        $notice->save();

        return redirect()->route('dashboard')->with('success', 'Response submitted successfully and notice marked as completed.');
    }
}
