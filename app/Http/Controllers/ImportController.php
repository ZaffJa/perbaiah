<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ImportController extends Controller
{
    public function index()
    {
        return view('import');
    }

    public function upload()
    {

    }

    public function info()
    {
        $perbaiahUsers = json_decode(file_get_contents(base_path('public/perbaiah1.json')));
        $additionalInfoPerbaiahUsers = json_decode(file_get_contents(base_path('public/perbaiah2.json')));
        
        foreach($additionalInfoPerbaiahUsers as $user) {
            $user = User::where('no_ahli', $user->no_ahli)->first();
            if (!$user) continue;

            echo ("<br>$user->id");

            $user->update([
                'gambar_ahli' => $user->gamba !== '' ? 1 : 0,
                'kad_ahli' => $user->kad_ahli !== ''? 1 : 0,
                'yuran_kad_ahli' => $user->yuran_kad_ahli !== ''? 1 : 0,
                'serahan_kad_ahli' => $user->serahan_kad_ahli !== ''? 1 : 0,
                'serahan_sijil' => $user->serahan_sijil !== ''? 1 : 0
            ]);
        }

        // return response()->json($perbaiahUsers);
    }
}
