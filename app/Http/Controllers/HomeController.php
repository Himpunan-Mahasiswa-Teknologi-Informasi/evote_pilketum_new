<?php

namespace App\Http\Controllers;

use App\Models\Paslon;
use App\Models\Vote;
use App\Models\Mahasiswa;
use App\Models\Misi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Memuat data paslon beserta misinya secara lengkap
        $paslons = Paslon::with('misis')->get();

        return view('home', compact('paslons'));
    }


    public function vote(Request $request)
    {
        $userId = auth()->id();
        $request->validate([
            'no_urut' => 'required|string',
        ]);

        $paslon = Paslon::where('no_urut', '=', $request->no_urut)->first();

        $vote = new Vote();
        $vote->id_paslon = $paslon->id_paslon;
        $vote->id_mahasiswa = $userId;

        if ($vote->save()) {
            $mahasiswa = Mahasiswa::findOrFail($userId);
            $mahasiswa->update(['status_vote' => 'done']);
        }

        return redirect()->route('actionlogout');
    }
}
