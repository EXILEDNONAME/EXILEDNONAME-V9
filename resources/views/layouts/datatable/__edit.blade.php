@extends('layouts.default')

@push('body')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ trans('default.label.edit') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ URL::Current() }}/../../#" class="btn btn-outline-primary font-weight-bolder mr-2">
            <i class="ki ki-long-arrow-back icon-xs"></i>
            {{ trans('default.label.back') }}
          </a>
          <div class="btn-group">
            <button type="submit" class="btn btn-outline-primary" form="form-exilednoname">
              <i class="flaticon2-paperplane"></i> <span class="font-weight-bolder"> {{ trans('default.label.update') }} </span>
            </button>
          </div>
        </div>
      </div>
      <div class="card-body" style="">

        @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert"> {{ $message }} </div><hr>
        @endif

        <form method="POST" id="form-exilednoname" action="{{ URL::current() }}/../../{{ $data->id }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
          {{ method_field('PATCH') }}
          {{ csrf_field() }}

          <input class="form-control" name="id" type="hidden" value="{{ $data->id }}">
          <input class="form-control" name="updated_by" type="hidden" value="{{ Auth::User()->id }}">

          @if ( !empty($daterange) && $daterange == 'true')
          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> Date Start </label>
            <div class="col-lg-9">
              {!! Form::text('date_start', (isset($data->date_start) ? $data->date_start : \Carbon\Carbon::now()->add(-30,'minute')->format('Y-m-d H:i')), ['id' => 'ex_datetimepicker_start','class' => $errors->has('date_start') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!}
              @error('date_start') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> Date End </label>
            <div class="col-lg-9">
              {!! Form::text('date_end', (isset($data->date_end) ? $data->date_end : \Carbon\Carbon::now()->format('Y-m-d H:i')), ['id' => 'ex_datetimepicker_finish','class' => $errors->has('date_end') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!}
              @error('date_end') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>
          @endif

          @include($path . 'form', ['formMode' => 'create'])

          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> Active </label>
            <div class="col-lg-9">
              {{ Form::select('active', ['1' => 'Yes', '0' => 'No'], (isset($data->active) ? $data->active : '1'), ['class' => $errors->has('active') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) }}
              @error('active') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>

          @if ( !empty($status) && $status == 'true')
          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> {{ trans('default.label.status') }} </label>
            <div class="col-lg-9">
              {{ Form::select('status', ['1' => 'Success', '2' => 'Pending', '3' => 'Delivered', '4' => 'Canceled'], (isset($data->status) ? $data->status : ''), ['class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) }}
              @error('status') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>
          @endif

        </form>
      </div>
    </div>
  </div>
</div>
@endpush

@push('js')
<script src="/assets/backend/js/pages/crud/forms/editors/summernote.js?v=7.0.5"></script>
<script src="/assets/backend/plugins/custom/tinymce/tinymce.bundle.js?v=7.0.5"></script>
<script src="/assets/backend/js/pages/crud/forms/editors/tinymce.js?v=7.0.5"></script>
@endpush
