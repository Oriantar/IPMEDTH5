<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\sensorids;

class CameraController extends Controller
{
    public function index(): View
    {
        $sensorids = sensorids::where("user_id", Auth()->user()->id)->get();

        return view(
            'camera.index',
            ['sensors' => $sensorids]
        );
    }

    public function add(Request $request): View
    {
        return view('camera.add');
    }

    public function store(Request $request): RedirectResponse{

        $validated = $request->validate([
            'sensorid' => 'required|string|max:15',
            'cameraBeeld' => 'required|string',
            "cameraNaam" => 'required|string',
            ]);

        sensorids::create([
            'user_id' => Auth()->user()->id,
        ] + $validated);

        return redirect(route('camera.index'));
    }
}
