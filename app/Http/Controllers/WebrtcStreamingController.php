<?php

namespace App\Http\Controllers;

use App\Events\StreamAnswer;
use App\Events\StreamOffer;
use Illuminate\Http\Request;

class WebrtcStreamingController extends Controller
{
    public function index()
    {
        return view('video-broadcast', ['type' => 'broadcaster', 'id' =>auth()->user()->id]);
    }

    public function consumer(Request $request, $streamId)
    {
        return view('video-broadcast', ['type' => 'consumer', 'streamId' => $streamId, 'id' => auth()->user()->id]);
    }

    public function makeStreamOffer(Request $request)
    {
        $data['broadcaster'] = $request->broadcaster;
        $data['receiver'] = $request->receiver;
        $data['offer'] = $request->offer;

        event(new StreamOffer($data));
    }

    public function makeStreamAnswer(Request $request)
    {
        $data['broadcaster'] = $request->broadcaster;
        $data['answer'] = $request->answer;
        event(new StreamAnswer($data));
    }
}
