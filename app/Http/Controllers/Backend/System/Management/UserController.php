<?php

namespace App\Http\Controllers\Backend\System\Management;

use Auth;
use DataTables;
use Redirect,Response;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\Backend\System\Management\User\StoreRequest;
use App\Http\Requests\Backend\System\Management\User\UpdateRequest;

class UserController extends Controller {

  /**
  **************************************************
  * @return Authentication
  * @return Auto-Configurations
  **************************************************
  **/

  public function __construct() {

    $this->middleware('auth');
    $this->url = '/dashboard/managements/users';
    $this->path = 'pages.backend.system.management.user.';
    $this->model = 'App\User';

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
      ->editColumn('id_accesses', function($order) { return $order->accesses->name; })
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

    if(!(strcmp($request->get('password'), $request->get('confirm_password'))) == 0){
      return redirect()->back()->withInput($request->all())->with('error', trans('default.notification.error.password-confirm'));
    }

    User::create([
      'id_access' => $request->id_access,
      'name'      => $request->name,
      'username'  => $request->username,
      'email'     => $request->email,
      'phone'     => $request->phone,
      'address_1' => $request->address_1,
      'address_2' => $request->address_2,
      'password'  => Hash::make($request['password']),
    ]);

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
    if ($id == 1) {
      return redirect($this->url)->with('error', trans('default.notification.error.restrict'));
    }
    else {
      try {
        $this->model::destroy($id);
        return redirect($this->url)->with('success', trans('default.notification.success.item-deleted'));
      } catch (\Exception $e) {
        return redirect($this->url)->with('error', trans('default.notification.error'));
      }
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
    if ($id == 1) {
      return Response::json($data);
    }
    else {
      $this->model::destroy($id);
      $data = $this->model::where('id',$id)->delete();
      return Response::json($data);
    }
  }

  /**
  **************************************************
  * @return Delete-All
  **************************************************
  **/

  public function deleteall(Request $request) {
    if ($request->EXILEDNONAME == 1) {
      return Response::json($data);
    }
    else {
      $exilednoname = $request->EXILEDNONAME;
      $this->model::whereIn('id',explode(",",$exilednoname))->delete();
      return Response::json($exilednoname);
    }
  }

}
