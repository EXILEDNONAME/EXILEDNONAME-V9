<?php

namespace App\Models\Backend\System\Dummy\Table;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Relation extends Model {

  use LogsActivity, SoftDeletes;

  protected $table = 'dummy_table_relations';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];

  protected static $logAttributes = ['*'];

  public function dummy_table_generals(){
    return $this->belongsTo(General::class, 'id_general');
  }

}
