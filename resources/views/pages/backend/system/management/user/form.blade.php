<div class="form-group row">
  <label class="col-lg-3 col-form-label"> <a href="/dashboard/management/accesses/create" target="_blank" class="text-danger font-weight-bold"><u> Access </u></a></label>
  <div class="col-lg-9">
    {!! Form::select('id_access', accesses(), (isset($data->id_access) ? $data->id_access : NULL), ['placeholder' => '- Select Access -', 'class' => 'form-control', 'required' => 'required']) !!}
    @error('id_access') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Name </label>
  <div class="col-lg-9">
    {!! Form::text('name', (isset($data->name) ? $data->name : ''), ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!}
    @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Username </label>
  <div class="col-lg-9">
    {!! Form::text('username', (isset($data->username) ? $data->username : ''), ['class' => $errors->has('username') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!}
    @error('username') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Email </label>
  <div class="col-lg-9">
    {!! Form::email('email', (isset($data->email) ? $data->email : ''), ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!}
    @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Phone </label>
  <div class="col-lg-9">
    {!! Form::text('phone', (isset($data->phone) ? $data->phone : ''), ['class' => $errors->has('phone') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!}
    @error('phone') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

@if(!empty($page) && $page != 'edit')
<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Password </label>
  <div class="col-lg-9">
    {!! Form::password('password', ['class' => $errors->has('password') ? 'form-control is-invalid' : 'form-control']) !!}
    @error('password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Confirm Password </label>
  <div class="col-lg-9">
    {!! Form::password('confirm_password', ['class' => $errors->has('confirm_password') ? 'form-control is-invalid' : 'form-control']) !!}
    @error('confirm_password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
@endif

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Address 1 </label>
  <div class="col-lg-9">
    {!! Form::text('address_1', (isset($data->address_1) ? $data->address_1 : ''), ['class' => $errors->has('address_1') ? 'form-control is-invalid' : 'form-control']) !!}
    @error('address_1') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Address 2 </label>
  <div class="col-lg-9">
    {!! Form::text('address_2', (isset($data->address_2) ? $data->address_2 : ''), ['class' => $errors->has('address_2') ? 'form-control is-invalid' : 'form-control']) !!}
    @error('address_2') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
