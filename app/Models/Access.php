<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Access extends Model {

  protected $table = 'accesses';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];

  protected static $logAttributes = ['*'];

}
