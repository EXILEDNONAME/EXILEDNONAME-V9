@extends('layouts.default', ['page' => 'blank'])
@push('title', 'Documentation')

@push('body')
<div class="row">
  <div class="col-xl-12">
    <div class="card card-custom gutter-b" data-card="true">
      <div class="card-body">
        <div class="example-preview">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home">
                <span class="nav-icon">
                  <i class="flaticon2-chat-1"></i>
                </span>
                <span class="nav-text"> Home </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="release-note-tab" data-toggle="tab" href="#release_note">
                <span class="nav-icon">
                  <i class="flaticon2-layers-1"></i>
                </span>
                <span class="nav-text"> Release Notes </span>
              </a>
            </li>
          </ul>
          <div class="tab-content mt-5" id="myTabContent">
            <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
              <table width="100%">
                <tr>
                  <td> Name </td>
                  <td> : </td>
                  <td> {{ env('CONTACT_NAME')}} </td>
               </tr>
                <tr>
                  <td> Email </td>
                  <td> : </td>
                  <td> {{ env('CONTACT_EMAIL')}} </td>
               </tr>
                <tr>
                  <td> Address </td>
                  <td> : </td>
                  <td> {{ env('CONTACT_ADDRESS')}} </td>
               </tr>
                <tr>
                  <td> Phone </td>
                  <td> : </td>
                  <td> {{ env('CONTACT_PHONE')}} </td>
               </tr>
             </table>
            </div>
            <div class="tab-pane fade" id="release_note" role="tabpanel" aria-labelledby="release-note-tab">
              Application Version {{ env('APP_VERSION') }} <br>
              Base Application : PHP Framework Laravel V9
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>
@endpush
