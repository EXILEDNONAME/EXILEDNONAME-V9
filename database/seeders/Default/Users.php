<?php

namespace Database\Seeders\Default;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class Users extends Seeder
{

  public function run()
  {
    $users = [
      [
        'id_access'         => '1',
        'name'              => 'Naufal Haidir Ridha',
        'username'          => 'admin',
        'phone'             => '08112448111',
        'email'             => 'naufalhaidirridha@rocketmail.com',
        // 'api_token'         => hash('sha256', Str::random(60)),
        'password'          => bcrypt('1234'),
        'created_at'        => Carbon::now(),
      ],
    ];

    User::insert($users);
  }
}
