<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Title;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'adminperbaiah',
            'no_kp' => 'adminperbaiah',
            'kata_laluan' => bcrypt('perbaiah@1'),
            'role' => 1
        ]);

        $perbaiahUsers = json_decode(file_get_contents(base_path('public/perbaiah1.json')));

        foreach($perbaiahUsers as $user) {
            User::create([
                'no_ahli' => $user->no_ahli,
                'title_id' => $this->convertJobNameToJobId($user->jawatan),
                'nama' => $user->nama,
                'kata_laluan' => bcrypt('secretabcd1234'),
                'no_kp' => str_replace('-','',$user->no_kp),
                'alamat' => $user->alamat,
                'tarikh_daftar' => $this->convertStringToDate($user->tarikh_daftar),
                'no_tel' => $user->no_tel
            ]);
        }

        $additionalInfoPerbaiahUsers = json_decode(file_get_contents(base_path('public/perbaiah2.json')));

        foreach($additionalInfoPerbaiahUsers as $user) {
            $user = User::where('no_ahli', $user->no_ahli)->first();

            if (!$user) continue;

            $user->update([
                'gambar_ahli' => $user->gamba !== '' ? 1 : 0,
                'kad_ahli' => $user->kad_ahli !== ''? 1 : 0,
                'yuran_kad_ahli' => $user->yuran_kad_ahli !== ''? 1 : 0,
                'serahan_kad_ahli' => $user->serahan_kad_ahli !== ''? 1 : 0,
                'serahan_sijil' => $user->serahan_sijil !== ''? 1 : 0
            ]);
        }

    }

    public function convertJobNameToJobId($jawatan)
    {
        $title = Title::where('name', $jawatan)->first();

        if ($title) return $title->id;

        return 7;
    }

    public function convertStringToDate($date)
    {
        if (!$date) return null;

        $tarikh_daftar = explode('.', $date);
        return Carbon::createFromDate($tarikh_daftar[2], $tarikh_daftar[1], $tarikh_daftar[0])->format('Y-m-d H:i:s');
    }

}
