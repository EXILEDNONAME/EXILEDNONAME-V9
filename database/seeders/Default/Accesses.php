<?php

namespace Database\Seeders\Default;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;
use App\Models\Access;

class Accesses extends Seeder {
  public function run() {
    $data = [
      [
        'name'          => 'Administrator',
        'created_at'    => Carbon::now(),
      ],
      [
        'name'          => 'Operator',
        'created_at'    => Carbon::now(),
      ],
      [
        'name'          => 'User',
        'created_at'    => Carbon::now(),
      ],
    ];

    Access::insert($data);
  }
}
