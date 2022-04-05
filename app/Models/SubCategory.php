<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use App\Models\SubCategory;

class SubCategory extends Model {

  use LogsActivity, SoftDeletes;

  protected $table = 'sub_categories';
  protected $primaryKey = 'id';
  protected $guarded = ['id'];

  protected static $logAttributes = ['*'];

  public function getActivitylogOptions(): LogOptions {
    return LogOptions::defaults()->logOnly(['*']);
  }

  public function sub_categories(){
    return $this->belongsTo(SubCategory::class, 'category_id');
  }

}
