@extends('layouts.default', ['page' => 'blank'])

@push('body')
<div class="row">
  <div class="col-lg-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/assets/backend/media/svg/shapes/abstract-4.svg)">
      <div class="card-body" style="">
        <center>
          <a href="{{ URL::Current() }}/generals" class="text-info"><b> GENERALS </b></a><br>
          <span class="text-danger"><a href="{{ URL::Current() }}/generals" class="text-danger"><b> {{ \DB::table('dummy_table_generals')->get()->count() }} </b></a> items </span>
        </center>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/assets/backend/media/svg/shapes/abstract-4.svg)">
      <div class="card-body" style="">
        <center>
          <a href="{{ URL::Current() }}/relations" class="text-info"><b> RELATIONS </b></a><br>
        </center>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/assets/backend/media/svg/shapes/abstract-4.svg)">
      <div class="card-body" style="">
        <center>
          <a href="{{ URL::Current() }}/invoices" class="text-info"><b> INVOICES </b></a>
        </center>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/assets/backend/media/svg/shapes/abstract-4.svg)">
      <div class="card-body" style="">
        <center>
          <a href="{{ URL::Current() }}/reports" class="text-info"><b> REPORTS </b></a>
        </center>
      </div>
    </div>
  </div>
</div>
@endpush
