@extends('layouts.default', ['page' => 'blank'])

@push('body')
<div class="row">
  <div class="col-lg-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/assets/backend/media/svg/shapes/abstract-4.svg)">
      <div class="card-body" style="">
        <center>
          <a href="{{ URL::Current() }}/tables" class="text-info"><b> TABLES </b></a>
        </center>
      </div>
    </div>
  </div>
</div>
@endpush
