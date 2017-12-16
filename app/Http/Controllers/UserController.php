<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Job;
use App\Models\Title;
use App\Models\State;
use App\Models\Dependent;
use App\Http\Requests\StoreNewUser;
use App\Http\Requests\UpdateUser;

class UserController extends Controller 
{

  public function index()
  {
    $users = User::where('role', User::USER)->get();

    return view('user.index', compact('users'));
  }

  public function indexUser()
  {

    return view('user.index_user', compact('users'));
  }

  public function create()
  {
    $jobs = Job::all();
    $titles = Title::all();
    $states = State::all();

    return view('user.create', compact('jobs', 'titles', 'states'));
  }

  public function store(StoreNewUser $request)
  {
    $request['kata_laluan'] = bcrypt($request->no_kp);
    $request['no_ahli'] = User::getNoAhli();
    $user = User::create($request->all());

    if ($request->hasFile('gambar')) {
      $path = $request->file('gambar')->store('avatars');
      
      $user->gambar = $path;
      $user->save();
    }

    if (!empty($request->tanggungan_nama) && count($request->tanggungan_nama) > 0 && $request->tanggungan_nama[0] != '') {
      for($count = 0; $count < count($request->tanggungan_nama); $count++) {
        Dependent::create([
          'user_id' => $user->id,
          'nama' => $request->tanggungan_nama[$count],
          'tarikh_lahir' => $request->tanggungan_tarikh_lahir[$count],
          'no_kp' => $request->tanggungan_no_kp[$count],
          'hubungan' => $request->tanggungan_hubungan[$count]
        ]);
      }
    }
    return back()->with('success', 'Maklumat berjaya disimpan');
  }

  public function edit(User $user)
  {
    $jobs = Job::all();
    $titles = Title::all();
    $states = State::all();

    return view('user.edit', compact('user', 'jobs', 'titles', 'states'));
  }

  public function editUser()
  {
    $user = auth()->user();
    $jobs = Job::all();
    $titles = Title::all();
    $states = State::all();

    return view('user.edit_user', compact('user', 'jobs', 'titles', 'states'));
  }

  public function update(User $user, UpdateUser $request)
  {
    if ($request->gambar_ahli === null) $request['gambar_ahli'] = 0;
    if ($request->serahan_sijil === null) $request['serahan_sijil'] = 0;
    if ($request->serahan_kad_ahli === null) $request['serahan_kad_ahli'] = 0;
    if ($request->kad_ahli === null) $request['kad_ahli'] = 0;
    if ($request->yuran_kad_ahli === null) $request['yuran_kad_ahli'] = 0;
    if ($request->yuran_masuk === null) $request['yuran_masuk'] = 0;
    if ($request->yuran_masuk === null) $request['yuran_masuk'] = 0;
    if ($request->yuran_tabung_khairat === null) $request['yuran_tabung_khairat'] = 0;
    $user->update($request->all());

    if ($request->hasFile('gambar')) {
      $path = $request->file('gambar')->store('avatars');
      
      $user->gambar = $path;
      $user->save();
    }

    if (!empty($request->tanggungan_nama) && count($request->tanggungan_nama) > 0 && $request->tanggungan_nama[0] != '') {
      for($count = 0; $count < count($request->tanggungan_nama); $count++) {

        $dependent = Dependent::where('no_kp', $request->tanggungan_no_kp[$count])
                              ->where('user_id', $user->id)->first();

        if($dependent == null) {
          $dependent = new Dependent;
          $dependent->create([
            'user_id' => $user->id,          
            'nama' => $request->tanggungan_nama[$count],
            'tarikh_lahir' => $request->tanggungan_tarikh_lahir[$count],
            'no_kp' => $request->tanggungan_no_kp[$count],
            'hubungan' => $request->tanggungan_hubungan[$count]
          ]);
        }
        else {
          $dependent->update([
            'user_id' => $user->id,          
            'nama' => $request->tanggungan_nama[$count],
            'tarikh_lahir' => $request->tanggungan_tarikh_lahir[$count],
            'no_kp' => $request->tanggungan_no_kp[$count],
            'hubungan' => $request->tanggungan_hubungan[$count]
          ]);
        }
      }
    }
    return back()->with('success', 'Maklumat berjaya dikemaskini');
    
  }
  public function updateUser(UpdateUser $request)
  {
    $user = auth()->user();

    if ($request->gambar_ahli === null) $request['gambar_ahli'] = 0;
    if ($request->serahan_sijil === null) $request['serahan_sijil'] = 0;
    if ($request->serahan_kad_ahli === null) $request['serahan_kad_ahli'] = 0;
    if ($request->kad_ahli === null) $request['kad_ahli'] = 0;
    if ($request->yuran_kad_ahli === null) $request['yuran_kad_ahli'] = 0;
    if ($request->yuran_masuk === null) $request['yuran_masuk'] = 0;
    if ($request->yuran_masuk === null) $request['yuran_masuk'] = 0;
    if ($request->yuran_tabung_khairat === null) $request['yuran_tabung_khairat'] = 0;
    if (!$request->kata_laluan) {
      unset($request['kata_laluan']);
    }

    $user->update($request->all());

    if ($request->hasFile('gambar')) {
      $path = $request->file('gambar')->store('avatars');
      
      $user->gambar = $path;
      $user->save();
    }

    if (!empty($request->tanggungan_nama) && count($request->tanggungan_nama) > 0 && $request->tanggungan_nama[0] != '') {
      for($count = 0; $count < count($request->tanggungan_nama); $count++) {

        $dependent = Dependent::where('no_kp', $request->tanggungan_no_kp[$count])
                              ->where('user_id', $user->id)->first();

        if($dependent == null) {
          $dependent = new Dependent;
          $dependent->create([
            'user_id' => $user->id,          
            'nama' => $request->tanggungan_nama[$count],
            'tarikh_lahir' => $request->tanggungan_tarikh_lahir[$count],
            'no_kp' => $request->tanggungan_no_kp[$count],
            'hubungan' => $request->tanggungan_hubungan[$count]
          ]);
        }
        else {
          $dependent->update([
            'user_id' => $user->id,          
            'nama' => $request->tanggungan_nama[$count],
            'tarikh_lahir' => $request->tanggungan_tarikh_lahir[$count],
            'no_kp' => $request->tanggungan_no_kp[$count],
            'hubungan' => $request->tanggungan_hubungan[$count]
          ]);
        }
      }
    }
    return back()->with('success', 'Maklumat berjaya dikemaskini');
    
  }

  public function delete(User $user)
  {
    if ($user) {
      $nama = $user->nama;
      $user->delete();
      return back()->with('success', "Maklumat $nama berjaya dibuang");
    }
    else {
      return back()->withErrors('error', 'Ralat dalam membuang data');      
    }
  }

  public function search(Request $request)
  {
    if ($request->search) {
      $users =  User::where('nama', 'LIKE', "%$request->search%")
                ->orWhere('no_kp', 'LIKE', "%$request->search%")  
                ->get();

      return view('user.search', compact('users'));
    }
    return back()->withErrors('error', 'Sila berikan maklumat untuk dicari');      
  }
  
}

?>