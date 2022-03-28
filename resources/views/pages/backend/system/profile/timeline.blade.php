@extends('layouts.default', ['page' => 'blank', 'page' => 'profile'])
@push('title', 'Profile')

@push('body')
<div class="d-flex flex-row">
  @include('pages.backend.system.profile.sidebar')

  <div class="flex-row-fluid ml-lg-8">
    <div class="card card-custom">
        <div class="card-body pt-4">
          <hr>
          TEST
        </div>
    </div>
  </div>
</div>
@endpush

@push('js')
<script src="/assets/backend/js/pages/custom/profile/profile.js?v=7.0.5"></script>
<script src="/assets/backend/js/pages/custom/education/student/profile.js?v=7.0.5"></script>
@endpush
