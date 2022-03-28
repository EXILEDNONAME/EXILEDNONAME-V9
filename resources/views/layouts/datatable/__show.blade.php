@extends('layouts.default')

@push('body')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ trans('default.label.details') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ URL::Current() }}/../#" class="btn btn-outline-primary font-weight-bolder mr-2">
            <i class="ki ki-long-arrow-back icon-xs"></i>
            {{ trans('default.label.back') }}
          </a>
          <a data-toggle="modal" class="btn btn-icon btn-outline-primary mr-2" data-target="#qrcode_modal"><i class="fas fa-qrcode"></i></a>
          <a data-toggle="modal" class="btn btn-icon btn-outline-primary mr-2" onclick="printData('printData')"><i class="fas fa-print"></i></a>
          <div class="btn-group">
            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
              <ul class="nav nav-hover flex-column">
                <li class="nav-item">
                  <a href="{{ URL::current() }}/edit" class="nav-link">
                    <i class="nav-icon flaticon2-contract"></i>
                    <span class="nav-text"> {{ trans('default.label.edit') }} </span>
                  </a>
                </li>
                <li class="nav-item">
                  <form method="POST" class="nav-link" action="{{ URL::current() }}/../{{ $data->id }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    @method('DELETE')
                    @csrf
                    <i class="nav-icon flaticon2-trash"></i>
                    <a href="" class="nav-text delete"> {{ trans('default.label.delete') }} </a>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div id="printData">
        <div class="card-body" style="">
          <div class="table-responsive">
            <table width="100%" class="table table-bordered table-hover table-checkable" id="exilednoname">
              @if ( !empty($daterange) && $daterange == 'true')
              <tr>
                <td class="align-middle font-weight-bold"> Date Start </td>
                <td class="align-middle">
                  {!! \Carbon\Carbon::parse($data->date_start)->format('d F Y, H:i') !!}
                </td>
              </tr>
              <tr>
                <td class="align-middle font-weight-bold"> Date End </td>
                <td class="align-middle">
                  {!! \Carbon\Carbon::parse($data->date_end)->format('d F Y, H:i') !!}
                </td>
              </tr>
              @endif
              @stack('content-body')
              <tr>
                <td class="align-middle font-weight-bold"> {{ trans('default.label.active') }} </td>
                <td class="align-middle">
                  @if ( $data->active == 1 ) Yes
                  @else No
                  @endif
                </td>
              </tr>
              @if ( !empty($status) && $status == 'true')
              <tr>
                <td class="align-middle font-weight-bold"> Status </td>
                <td class="align-middle">
                  @if ( $data->status == 1 ) Success
                  @else Pending
                  @endif
                </td>
              </tr>
              @endif
              <tr>
                <td class="align-middle font-weight-bold"> Created By </td>
                <td class="align-middle">
                  @if ($data->created_by == 0 || $data->created_by == NULL)
                  @else
                  {{ \DB::table('users')->where('id', $data->created_by)->first()->name }}
                  @endif
                </td>
              </tr>
              <tr>
                <td class="align-middle font-weight-bold"> Updated By </td>
                <td class="align-middle">
                  @if ($data->updated_by == 0 || $data->updated_by == NULL)
                  @else
                  {{ \DB::table('users')->where('id', $data->updated_by)->first()->name }}
                  @endif
                </td>
              </tr>
              <tr>
                <td class="align-middle font-weight-bold"> Created At </td>
                <td class="align-middle"> {!! \Carbon\Carbon::parse($data->created_at)->format('d F Y, H:i') !!} </td>
              </tr>
              <tr>
                <td class="align-middle font-weight-bold"> Updated At </td>
                <td class="align-middle"> {!! \Carbon\Carbon::parse($data->updated_at)->format('d F Y, H:i') !!} </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="qrcode_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> QR Code </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <div id="printQR">
          <p class="text-center"> {!! QrCode::size(300)->generate(URL::current()); !!} </p>
        </div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-icon btn-outline-primary" onclick="printQR('printQR')"><i class="fas fa-print"></i></button>
        <button type="button" class="btn btn-outline-primary font-weight-bolder" data-dismiss="modal"> Close </button>
      </div>
    </div>
  </div>
</div>
@endpush

@push('js')
<script>
function printData(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
}
</script>

<script>
function printQR(divName){
  var myWindow=window.open('','','');
  myWindow.document.write(document.getElementById(divName).innerHTML);
  myWindow.document.close();
  myWindow.focus();
  myWindow.print();
  myWindow.document.close();
}

$('.delete').click(function(e){
  e.preventDefault()
  if (confirm('Are you sure?')) {
    $(e.target).closest('form').submit()
  }
});

</script>
@endpush
