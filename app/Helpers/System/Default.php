<?php

use App\Models\Access;
use Spatie\Activitylog\Models\Activity;
use App\Models\Backend\System\Dummy\Table\General;

function accesses() {
  $items = Access::orderBy('sort','asc')->where('active', 1)->pluck('name', 'id')->toArray();
  return $items;
}

function dummy_table_generals() {
  $items = General::orderBy('sort','asc')->where('active', 1)->pluck('name', 'id')->toArray();
  return $items;
}

function histories($model) {
  $items = Activity::where('subject_type', $model)->orderBy('created_at', 'desc')->get();
  return $items;
}

function chart_created($model) {
  $items = Activity::where('subject_type', $model)->where('description', 'created')->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-01%')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'created')->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-02%')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'created')->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-03%')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'created')->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-04%')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'created')->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-05%')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'created')->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-06%')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'created')->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-07%')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'created')->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-08%')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'created')->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-09%')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'created')->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-10%')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'created')->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-11%')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'created')->where('created_at', 'like', \Carbon\Carbon::now()->format('Y') . '-12%')->count();
  return $items;
}

function chart_updated($model) {
  $items = Activity::where('subject_type', $model)->where('description', 'updated')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-01%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'updated')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-02%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'updated')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-03%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'updated')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-04%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'updated')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-05%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'updated')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-06%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'updated')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-07%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'updated')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-08%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'updated')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-09%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'updated')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-10%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'updated')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-11%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'updated')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-12%')->where('updated_at', '!=', 'created_at')->count();
  return $items;
}

function chart_deleted($model) {
  $items = Activity::where('subject_type', $model)->where('description', 'deleted')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-01%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'deleted')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-02%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'deleted')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-03%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'deleted')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-04%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'deleted')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-05%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'deleted')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-06%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'deleted')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-07%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'deleted')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-08%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'deleted')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-09%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'deleted')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-10%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'deleted')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-11%')->where('updated_at', '!=', 'created_at')->count(); $items .= ', ';
  $items .= Activity::where('subject_type', $model)->where('description', 'deleted')->where('updated_at', 'like', \Carbon\Carbon::now()->format('Y') . '-12%')->where('updated_at', '!=', 'created_at')->count();
  return $items;
}
