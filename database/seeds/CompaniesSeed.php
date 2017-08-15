<?php

use Illuminate\Database\Seeder;

class CompaniesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Company::create([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'website' => 'www.example.com.br',
            'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfP-ALWDKJCdW81cavM4x4WNicWdAofmf61mbJS-j28cHjiDMXHA'
        ]);
    }
}
