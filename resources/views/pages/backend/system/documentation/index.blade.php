@extends('layouts.default', ['page' => 'blank'])
@push('title', 'Documentation')

@push('body')
<div class="row">
  <div class="col-lg-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/assets/backend/media/svg/shapes/abstract-4.svg)">
      <div class="card-body" style="">
        <center>
          <a href="{{ URL::Current() }}/generals" class="text-info"><b> GENERALS </b></a><br>
          <span class="text-danger"> {{ \DB::table('dummy_table_generals')->get()->count() }} </span>
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
          <a href="{{ URL::Current() }}/reports" class="text-info"><b> VERSION </b></a><br>
          <span class="text-danger"> 1.0 </span>
        </center>
      </div>
    </div>
  </div>
</div>

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
                  <td> Naufal Haidir Ridha </td>
               </tr>
                <tr>
                  <td> Email </td>
                  <td> : </td>
                  <td> naufalhaidirridha@rocketmail.com </td>
               </tr>
                <tr>
                  <td> Address </td>
                  <td> : </td>
                  <td> Bandung, West Java </td>
               </tr>
                <tr>
                  <td> Phone </td>
                  <td> : </td>
                  <td> 08112448111 </td>
               </tr>
             </table>
            </div>
            <div class="tab-pane fade" id="release_note" role="tabpanel" aria-labelledby="release-note-tab">
              Application Version 1.0 <br>
              Base Application : PHP Framework Laravel V6 <br>
              Features : <br>
              - File Manager <br>
              - Generator Pages <br>
              - Messages
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>
@endpush
