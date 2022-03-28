<?php

namespace App\Http\Controllers\Backend\System\Dummy\Table;

use Auth;
use DataTables;
use Redirect,Response;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

use App\Http\Requests\Backend\System\Dummy\Table\General\StoreRequest;
use App\Http\Requests\Backend\System\Dummy\Table\General\UpdateRequest;

class GeneralController extends Controller {

  /**
  **************************************************
  * @return Authentication
  * @return Auto-Configurations
  **************************************************
  **/

  public function __construct() {

    $this->middleware('auth');
    $this->url = '/dashboard/dummy/tables/generals';
    $this->path = 'pages.backend.system.dummy.table.general.';
    $this->model = 'App\Models\Backend\System\Dummy\Table\General';

    if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date_start', 'desc')->whereBetween('date_start', [request('date_start'), request('date_end')])->get(); }
    else { $this->data = $this->model::get(); }

  }

  /**
  **************************************************
  * @return Index
  **************************************************
  **/

  public function index() {
    $model = $this->model;
    if(request()->ajax()) {
      return DataTables::of($this->data)
      ->editColumn('date_start', function($order) { return \Carbon\Carbon::parse($order->date_start)->format('d F Y, H:i'); })
      ->editColumn('date_end', function($order) { return \Carbon\Carbon::parse($order->date_end)->format('d F Y, H:i'); })
      ->rawColumns(['description'])
      ->addIndexColumn()
      ->make(true);
    }
    return view($this->path . 'index', compact('model'));
  }

  /**
  **************************************************
  * @return Show
  **************************************************
  **/

  public function show($id) {
    $model = $this->model;
    $data = $this->model::findOrFail($id);
    return view($this->path . 'show', compact('data', 'model'));
  }

  /**
  **************************************************
  * @return Create
  **************************************************
  **/

  public function create() {
    $path = $this->path;
    $model = $this->model;
    return view($this->path . 'create', compact('path', 'model'));
  }

  /**
  **************************************************
  * @return Store
  **************************************************
  **/

  public function store(StoreRequest $request) {
    $store = $request->all();
    $this->model::create($store);
    $userSchema = User::first();
    return redirect($this->url)->with('success', trans('default.notification.success.item-created'));

  }

  /**
  **************************************************
  * @return Edit
  **************************************************
  **/

  public function edit($id) {
    $path = $this->path;
    $model = $this->model;
    $data = $this->model::findOrFail($id);
    return view($this->path . 'edit', compact('path', 'data', 'model'));
  }

  /**
  **************************************************
  * @return Update
  **************************************************
  **/

  public function update(UpdateRequest $request, $id) {
    $data = $this->model::findOrFail($id);
    $update = $request->all();
    $data->update($update);
    return redirect($this->url)->with('success', trans('default.notification.success.item-updated'));
  }

  /**
  **************************************************
  * @return Destroy
  **************************************************
  **/

  public function destroy($id) {
    try {
      $this->model::destroy($id);
      return redirect($this->url)->with('success', trans('default.notification.success.item-deleted'));
    } catch (\Exception $e) {
      return redirect($this->url)->with('error', trans('default.notification.error'));
    }
  }

  /**
  **************************************************
  * @return Enable
  * @return Disable
  **************************************************
  **/

  public function active($id) {
    $data = $this->model::where('id', $id)->update([ 'active' => 1 ]);
    return Response::json($data);
  }

  public function inactive($id) {
    $data = $this->model::where('id', $id)->update([ 'active' => 0 ]);
    return Response::json($data);
  }

  /**
  **************************************************
  * @return Delete
  **************************************************
  **/

  public function delete($id) {
    $this->model::destroy($id);
    $data = $this->model::where('id',$id)->delete();
    return Response::json($data);
  }

  /**
  **************************************************
  * @return Delete-All
  **************************************************
  **/

  public function deleteall(Request $request) {
    $exilednoname = $request->EXILEDNONAME;
    $this->model::whereIn('id',explode(",",$exilednoname))->delete();
    return Response::json($exilednoname);
  }

  /**
  **************************************************
  * @return TRASH
  * @return RESTORE
  * @return RESTORE-ALL
  * @return DELETE-PERMANENT
  * @return DELETE-PERMANENT-ALL
  **************************************************
  **/

  public function trash() {
    $data = $this->model::onlyTrashed()->get();
    if(request()->ajax()) {
      return DataTables::of($data)
      ->editColumn('deleted_at', function($order) { return \Carbon\Carbon::parse($order->deleted_at)->format('d F Y, H:i'); })
      ->rawColumns(['description'])
      ->addIndexColumn()
      ->make(true);
    }
    return view($this->path . 'trash', compact('data'));
  }

  public function restore($id) {
    $data = $this->model::withTrashed()->findOrFail($id);
    if ($data->trashed()) {
      $data->restore();
      $data = $this->model::where('id', $id)->update(['deleted_at' => NULL]);
      return Response::json($data);
    } else { return Response::json($data);}
  }

  public function restoreall(Request $request) {
    $exilednoname = $request->EXILEDNONAME;
    $this->model::whereIn('id',explode(",",$exilednoname))->restore();
    return Response::json($exilednoname);
  }

  public function delete_permanent($id) {
    $data = $this->model::withTrashed()->findOrFail($id);
    if(!$data->trashed()) { return Response::json($data); }
    else {
      $data->forceDelete();
      return Response::json($data);
    }
  }

  public function delete_permanentall(Request $request) {
    $exilednoname = $request->EXILEDNONAME;
    $this->model::whereIn('id',explode(",",$exilednoname))->forceDelete();
    return Response::json($exilednoname);
  }

  /**
  **************************************************
  * @return HISTORY
  **************************************************
  **/

  public function history() {
    $data = Activity::where('subject_type', $this->model)->orderby('updated_at', 'desc')->get();
    if(request()->ajax()) {
      return DataTables::of($data)
      ->editColumn('subjects', function($order) { if(!empty($order->properties['attributes']['name'])) { return $order->properties['attributes']['name']; } else { return ''; }})
      ->editColumn('causer_id', function($order) { return $order->causer->name; })
      ->editColumn('updated_at', function($order) { return \Carbon\Carbon::parse($order->updated_at)->format('d F Y, H:i'); })
      ->rawColumns(['description'])
      ->addIndexColumn()
      ->make(true);
    }
    return view($this->path . 'history', compact('data'));
  }

}
