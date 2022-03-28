@extends('layouts.default')

@push('head')
<link href="/assets/backend/plugins/custom/datatables/datatables.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
@endpush

@push('body')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
      <div class="card-header">
        <div class="card-title">
          <h4 class="card-label"> {{ trans('default.label.main') }} </h4>
        </div>
        <div class="card-toolbar">
          <a href="{{ URL::Current() }}/create" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ trans('default.label.create') }}"><i class="fas fa-plus"></i></a>
          <a id="table-refresh" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="reload" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ trans('default.label.refresh') }}"><i class="fas fa-sync-alt"></i></a>
          <div class="collapse show" id="toolbar_filter_show">
            <a id="table-filter-show" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="reload" data-toggle="tooltip" data-placement="top" title="" data-original-title="Filter Show"><i class="fas fa-filter"></i></a>
          </div>
          <div class="collapse" id="toolbar_filter_hide">
            <a id="table-filter-hide" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="reload" data-toggle="tooltip" data-placement="top" title="" data-original-title="Filter Hide"><i class="fas fa-filter"></i></a>
          </div>

          <a class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-toggle="modal" rel="tooltip" data-target="#ModalHistory" data-original-title="Show History"><i class="fas fa-history"></i></a>

          <div class="dropdown dropdown-inline">
            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-download"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <ul class="navi navi-hover py-5">
                <li class="navi-item" data-toggle="tooltip" title="{{ trans('default.label.export.description-copy') }}">
                  <a href="javascript:void(0);" id="export_copy" class="navi-link"><i class="navi-icon fa fa-copy"></i> {{ trans('default.label.export.copy') }}</a>
                </li>
                <li class="navi-item" data-toggle="tooltip" title="{{ trans('default.label.export.description-excel') }}">
                  <a href="javascript:void(0);" id="export_excel" class="navi-link"><i class="navi-icon fa fa-file-excel"></i> {{ trans('default.label.export.excel') }}</a>
                </li>
                <li class="navi-item" data-toggle="tooltip" title="{{ trans('default.label.export.description-pdf') }}">
                  <a href="javascript:void(0);" id="export_pdf" class="navi-link"><i class="navi-icon fa fa-file-pdf"></i> {{ trans('default.label.export.pdf') }}</a>
                </li>
                <li class="navi-item" data-toggle="tooltip" title="{{ trans('default.label.export.description-csv') }}">
                  <a href="javascript:void(0);" id="export_csv" class="navi-link"><i class="navi-icon fa fa-file"></i> {{ trans('default.label.export.csv') }}</a>
                </li>
                <li class="navi-item" data-toggle="tooltip" title="{{ trans('default.label.export.description-print') }}">
                  <a href="javascript:void(0);" id="export_print" class="navi-link"><i class="navi-icon fa fa-print"></i> {{ trans('default.label.export.print') }}</a>
                </li>
              </ul>
            </div>
          </div>
          <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ trans('default.label.minimize') }}"><i class="fas fa-caret-down"></i></a>
          <div class="collapse" id="toolbar_delete">
            <a data-url="" class="delete-all btn btn-sm btn-icon btn-clean btn-icon-md" data-toggle="tooltip" title="{{ trans('default.label.delete-selected') }}"><i class="text-danger fas fa-trash"></i></a>
          </div>
        </div>
      </div>

      <div class="card-body">

        @if ($message = Session::get('success'))
        <div id="toast-container" class="toast-bottom-right">
          <div class="toast toast-success" aria-live="polite">
            <div class="toast-message">{{ $message }}</div>
          </div>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div id="toast-container" class="toast-bottom-right">
          <div class="toast toast-error" aria-live="polite">
            <div class="toast-message">{{ $message }}</div>
          </div>
        </div>
        @endif

        <div class="collapse" id="toolbar_filter">
          @if ( !empty($daterange) && $daterange == 'true')
          <div class="mb-2">
            <div class="col-lg-12 my-2 my-md-0">
              <div class="d-flex align-items-center">
                <div class="input-daterange input-group" id="ex_datepicker_start">
                  <input type="text" id="date_start" class="form-control" name="date_start" autocomplete="off">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="la la-ellipsis-h"></i>
                    </span>
                  </div>
                  <input type="text" id="date_end" class="form-control" name="date_end" autocomplete="off">
                </div>
              </div>
            </div>
          </div>
          @endif

          <div class="mb-2">
            <div class="col-lg-12 my-2 my-md-0">
              <div class="d-flex align-items-center">
                <select data-column="-2" class="form-control filter-active">
                  <option value=""> - {{ trans('default.label.filter-active') }} - </option>
                  <option value="1"> {{ trans('default.label.yes') }} </option>
                  <option value="0"> {{ trans('default.label.no') }} </option>
                </select>
              </div>
            </div>
          </div>

          @if ( !empty($status) && $status == 'true')
          <div class="mb-2">
            <div class="col-lg-12 my-2 my-md-0">
              <div class="d-flex align-items-center">
                <select data-column="2" class="form-control filter-status">
                  <option value=""> - {{ trans('default.label.filter-status') }} - </option>
                  <option value="1"> {{ trans('default.label.success') }} </option>
                  <option value="2"> {{ trans('default.label.pending') }} </option>
                  <option value="3"> {{ trans('default.label.delivered') }} </option>
                  <option value="4"> {{ trans('default.label.canceled') }} </option>
                </select>
              </div>
            </div>
          </div>
          @endif

          @stack('filter-head')

          <div class="mb-2">
            <div class="col-lg-12 my-2 my-md-0">
              <div class="d-flex align-items-center">
                <button type="reset" name="reset" id="reset" class="form-control btn btn-sm btn-outline-info" data-toggle="tooltip" title="{{ trans('default.label.filter-reset') }}">
                  <i class="la la-refresh"></i>
                </button>
              </div>
            </div>
          </div>

          <hr>
        </div>

        <div class="table-responsive">
          <table width="100%" class="table table-striped-table-bordered table-hover table-checkable" id="exilednoname">
            <thead>
              <tr>
                <th class="no-export"> </th>
                <th> No. </th>
                @if ( !empty($status) && $status == 'true')
                <th> Status </th>
                @endif
                @if ( !empty($daterange) && $daterange == 'true')
                <th> Date Start </th>
                <th> Date End </th>
                @endif
                @stack('table-header')
                <th class="no-export"> Active </th>
                <th class="no-export"> </th>
              </tr>
            </thead>
          </table>
        </div>

        <div class="modal fade" id="ModalHistory" tabindex="-1" role="dialog" aria-labelledby="ModalHistoryLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> History </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i aria-hidden="true" class="ki ki-close"></i>
                </button>
              </div>
              <div class="modal-body">
                <div data-scroll="true" data-height="300">
                  <div class="timeline timeline-3">
                    <div class="timeline-items">

                      @php $history = histories($model)->take(10); @endphp
                      @if (!empty($history) && !empty($history->count()))
                      @foreach($history as $item)

                      @if ($item->description == 'created')
                      @foreach($item['properties'] as $data_object)
                      <div class="timeline-item">
                        <div class="timeline-media"><i class="fas fa-plus text-success"></i></div>
                        <div class="timeline-content">
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-2"><span class="text-muted"><small> {{ $item->created_at->diffForHumans() }} </small></span></div>
                            <div class="dropdown ml-2" data-toggle="tooltip" title="" data-placement="left">
                              @if (!empty($item->causer->name))
                              <span class="text-muted pull-right"><small> {{ $item->causer->name }} </small></span>
                              @else
                              <span class="text-muted pull-right"><small><s> {{ trans("default.label.not-found") }} </s></small></span>
                              @endif
                            </div>
                          </div>
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-2"><span class="font-weight-bold text-success"> {{ trans("default.label.item-created") }} </span><br>
                              @if (!empty($data_object['name']))
                              {{ $data_object['name'] }}
                              @endif
                            </div>
                            <div class="dropdown ml-2" data-toggle="tooltip" title="View" data-placement="left">
                              <span class="text-muted pull-right">
                                <small>
                                  <a href="{{ URL::Current() }}/{{ $item->subject_id }}"><i class="fas fa-eye"></i></a>
                                </small>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      @endif

                      @if ($item->description == 'updated')
                      <div class="timeline-item">
                        <div class="timeline-media"><i class="fas fa-magic text-warning"></i></div>
                        <div class="timeline-content">
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-2"><span class="text-muted"><small> {{ $item->created_at->diffForHumans() }} </small></span></div>
                            <div class="dropdown ml-2" data-toggle="tooltip" title="" data-placement="left">
                              @if (!empty($item->causer->name))
                              <span class="text-muted pull-right"><small> {{ $item->causer->name }} </small></span>
                              @else
                              <span class="text-muted pull-right"><small><s> {{ trans("default.label.not-found") }} </s></small></span>
                              @endif
                            </div>
                          </div>
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-2"><span class="font-weight-bold text-warning"> {{ trans("default.label.item-updated") }} </span><br>
                              From <b>{{ $item['properties']['old']['name'] }}</b> to <b>{{ $item['properties']['attributes']['name'] }}</b>
                            </div>
                            <div class="dropdown ml-2" data-toggle="tooltip" title="View" data-placement="left">
                              <span class="text-muted pull-right">
                                <small>
                                  <a href="{{ URL::Current() }}/{{ $item->subject_id }}"><i class="fas fa-eye"></i></a>
                                </small>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endif

                      @if ($item->description == 'deleted')
                      @foreach($item['properties'] as $data_object)
                      <div class="timeline-item">
                        <div class="timeline-media"><i class="fas fa-minus text-danger"></i></div>
                        <div class="timeline-content">
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-2"><span class="text-muted"><small> {{ $item->created_at->diffForHumans() }} </small></span></div>
                            <div class="dropdown ml-2" data-toggle="tooltip" title="" data-placement="left">
                              @if (!empty($item->causer->name))
                              <span class="text-muted pull-right"><small> {{ $item->causer->name }} </small></span>
                              @else
                              <span class="text-muted pull-right"><small><s> {{ trans("default.label.not-found") }} </s></small></span>
                              @endif
                            </div>
                          </div>
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-2"><span class="font-weight-bold text-danger"> {{ trans("default.label.item-deleted") }} </span><br>
                              @if (!empty($data_object['name']))
                              {{ $data_object['name'] }}
                              @endif
                            </div>
                            <div class="dropdown ml-2" data-toggle="tooltip" title="View" data-placement="left">
                              <span class="text-muted pull-right">
                                <small>
                                  <a href="{{ URL::Current() }}/{{ $item->subject_id }}"><i class="fas fa-eye"></i></a>
                                </small>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      @endif

                      @if ($item->description == 'restored')
                      @foreach($item['properties'] as $data_object)
                      <div class="timeline-item">
                        <div class="timeline-media"><i class="fas fa-undo text-info"></i></div>
                        <div class="timeline-content">
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-2"><span class="text-muted"><small> {{ $item->created_at->diffForHumans() }} </small></span></div>
                            <div class="dropdown ml-2" data-toggle="tooltip" title="" data-placement="left">
                              @if (!empty($item->causer->name))
                              <span class="text-muted pull-right"><small> {{ $item->causer->name }} </small></span>
                              @else
                              <span class="text-muted pull-right"><small><s> {{ trans("default.label.not-found") }} </s></small></span>
                              @endif
                            </div>
                          </div>
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-2"><span class="font-weight-bold text-info"> {{ trans("default.label.item-restored") }} </span><br>
                              @if (!empty($data_object['name']))
                              {{ $data_object['name'] }}
                              @endif
                            </div>
                            <div class="dropdown ml-2" data-toggle="tooltip" title="View" data-placement="left">
                              <span class="text-muted pull-right">
                                <small>
                                  <a href="{{ URL::Current() }}/{{ $item->subject_id }}"><i class="fas fa-eye"></i></a>
                                </small>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      @endif

                      @endforeach
                      @else
                      {{ trans("default.label.no-recent-history") }} ...
                      @endif
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  @if (!empty($history) && !empty($history->count()))
                  <a href="{{ URL::Current() }}/history"><button type="button" class="btn btn-light-primary font-weight-bold"> {{ trans("default.label.show-all-history") }} </button></a>
                  @endif
                  <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal"> {{ trans("default.label.close") }} </button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>


@if ( !empty($chart) && $chart == 'true')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b" data-card="true">
      <div class="card-header">
        <div class="card-title">
          <h4 class="card-label"> {{ trans('default.label.chart') }} </h4>
        </div>
        <div class="card-toolbar">
          <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ trans('default.label.minimize') }}"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>
      <div class="card-body">
        <div id="charts"></div>
      </div>
    </div>
  </div>
</div>
@endif

@endpush

@push('js')
<script src="/assets/backend/plugins/custom/datatables/datatables.bundle.js?v=7.0.5"></script>
<script src="/assets/backend/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.5"></script>
<script>
$(document).ready(function() {
  $('#toast-container').fadeOut(5000);
});

"use strict";
var KTDatatablesExtensionsKeytable = function() {

  var initTable2 = function() {
    var table = $('#exilednoname').DataTable({
      processing: true,
      "language": {
        processing: '<span class="font-weight-bolder text-center"> Please Wait ... </span>'
      },
      serverSide: true,
      searching: true,
      rowId: 'Collocation',
      select: {
        style: 'multi',
        selector: 'td:first-child .checkable',
      },
      ajax: {
        url: "{{ URL::current() }}",
        "data" : function (d) {
          @if ( !empty($daterange) && $daterange == 'true')
          d.date_start = $('#date_start').val();
          d.date_end = $('#date_end').val();
          @endif
          d.filter_active = $('.filter_active').val();
          @if ( !empty($status) && $status == 'true')
          d.filter_status = $('.filter-status').val();
          @endif
          @stack('filter-function')
        }
      },
      headerCallback: function(thead, data, start, end, display) {
        thead.getElementsByTagName('th')[0].innerHTML = `
        <label class="checkbox checkbox-single checkbox-solid checkbox-primary mb-0">
        <input type="checkbox" value="" class="group-checkable"/>
        <span></span>
        </label>`;
      },
      "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      buttons: [
        {
          extend: 'print',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export"
          },
        },
        {
          extend: 'copyHtml5',
          autoClose: 'true',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export"
          },
        },
        {
          extend: 'excelHtml5',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export"
          },
        },
        {
          extend: 'csvHtml5',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export"
          },
        },
        {
          extend: 'pdfHtml5',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export"
          },
        },
        {
          extend: 'pdfHtml5',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export",
            rows: { selected: true }
          },
        },
        {
          extend: 'excelHtml5',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export",
            rows: { selected: true }
          },
        },
        {
          extend: 'copyHtml5',
          autoClose: 'true',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export",
            rows: { selected: true }
          },
        },
        {
          extend: 'print',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export",
            rows: { selected: true }
          },
        },
      ],
      columns: [
        {
          data: 'checkbox', orderable: false, orderable: false, searchable: false, 'width': '1',
          render : function ( data, type, row, meta) { return '<label class="checkbox checkbox-single checkbox-primary mb-0"><input type="checkbox" data-id="' + row.id + '" class="checkable"><span></span></label>'; },
        },
        {
          data: 'autonumber', orderable: false, orderable: false, searchable: false, 'width': '1',
          render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        @if ( !empty($status) && $status == 'true')
        {
          data: 'status', orderable: true, 'className': 'align-middle', 'width': '1',
          render: function ( data, type, row ) {
            if ( data == 1 ) { return '<a href="javascript:void(0);" id="status_pending" data-toggle="tooltip" data-original-title="Success" data-id="' + row.id + '"><span class="label label-outline-success label-pill label-inline"> {{ trans("default.label.success") }} </span></a>'; }
            if ( data == 2 ) { return '<a href="javascript:void(0);" id="status_done" data-toggle="tooltip" data-original-title="Pending" data-id="' + row.id + '"><span class="label label-outline-warning label-pill label-inline"> {{ trans("default.label.pending") }} </span></a>'; }
            if ( data == 3 ) { return '<a href="javascript:void(0);" data-toggle="tooltip" data-original-title="Delivered" data-id="' + row.id + '"><span class="label label-outline-primary label-pill label-inline"> {{ trans("default.label.delivered") }} </span></a>'; }
            if ( data == 4 ) { return '<a href="javascript:void(0);" data-toggle="tooltip" data-original-title="Canceled" data-id="' + row.id + '"><span class="label label-outline-danger label-pill label-inline"> {{ trans("default.label.canceled") }} </span></a>'; }
          }
        },
        @endif
        @if ( !empty($daterange) && $daterange == 'true')
        {
          data: 'date_start', orderable: true, 'className': 'align-middle text-nowrap', 'width': '1',
          render: function ( data, type, row ) {
            return data;
          }
        },
        {
          data: 'date_end', orderable: true, 'className': 'align-middle text-nowrap', 'width': '1',
          render: function ( data, type, row ) {
            return data;
          }
        },
        @endif
        @stack('table-body')
        {
          data: 'active', orderable: true, 'className': 'align-middle text-center', 'width': '1',
          render: function ( data, type, row ) {
            if ( data == 0 ) { return '<a href="javascript:void(0);" id="active" data-toggle="tooltip" data-original-title="Enable" data-id="' + row.id + '"><span class="label label-dark label-inline"> {{ trans("default.label.no") }} </span></a>'; }
            if ( data == 1 ) { return '<a href="javascript:void(0);" id="inactive" data-toggle="tooltip" data-original-title="Disable" data-id="' + row.id + '"><span class="label label-info label-inline"> {{ trans("default.label.yes") }} </span></a>'; }
          }
        },
        {
          data: 'action', orderable: false, orderable: false, searchable: false, 'width': '1',
          render : function ( data, type, row) {
            return ''+
            '<div class="dropdown dropdown-inline">'+
            '<button type="button" class="btn btn-hover-light-dark btn-icon btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ki ki-bold-more-ver"></i></button>'+
            '<div class="dropdown-menu dropdown-menu-xs" style=""><ul class="navi navi-hover py-5">'+
            '<li class="navi-item"><a href="{{ URL::current() }}/' + row.id + '" class="navi-link"><span class="navi-icon"><i class="flaticon2-expand"></i></span><span class="navi-text">{{ trans("default.label.view") }}</span></a></li>'+
            '<li class="navi-item"><a href="{{ URL::current() }}/' + row.id + '/edit" class="navi-link"><span class="navi-icon"><i class="flaticon2-contract"></i></span><span class="navi-text">{{ trans("default.label.edit") }}</span></a></li>'+
            '<li class="navi-item"><a href="javascript:void(0);" class="navi-link delete" data-id="' + row.id + '"><span class="navi-icon"><i class="flaticon2-trash"></i></span><span class="navi-text"> {{ trans("default.label.delete") }} </span></a></li>';
          },
        },
      ],
      order: [[1, 'asc']]
    });

    // FILTER
    @if ( !empty($daterange) && $daterange == 'true')
    $('#date_start').change(function () { table.draw(); });
    $('#date_end').change(function () { table.draw(); });
    @endif
    $('.filter-active').change(function () {
      table.column(-2).search( $(this).val() ).draw();
    });
    @if ( !empty($status) && $status == 'true')
    $('.filter-status').change(function () {
      table.column(2)
      .search( $(this).val() )
      .draw();
    });
    @endif
    @stack('filter-body')
    // END FILTER

    $('#reset').click(function(){
      $('.filter-active').val('');
      $('.filter-status').val('');
      $('#date_start').val('');
      $('#date_end').val('');
      table.search( '' ).columns().search( '' ).draw();
    });

    $("#table-refresh").on("click", function() {
      $('#toolbar_delete').collapse('hide');
      table.ajax.reload();
    });
    $('#export_print').on('click', function(e) { e.preventDefault(); table.button(0).trigger(); });
    $('#export_copy').on('click', function(e) { e.preventDefault(); table.button(1).trigger(); });
    $('#export_excel').on('click', function(e) { e.preventDefault(); table.button(2).trigger(); });
    $('#export_csv').on('click', function(e) { e.preventDefault(); table.button(3).trigger(); });
    $('#export_pdf').on('click', function(e) { e.preventDefault(); table.button(4).trigger(); });

    $("#table-filter-show").on("click", function() {
      $('#toolbar_filter').collapse('show');
      $('#toolbar_filter_show').collapse('hide');
      $('#toolbar_filter_hide').collapse('show');
    });

    $("#table-filter-hide").on("click", function() {
      $('#toolbar_filter').collapse('hide');
      $('#toolbar_filter_show').collapse('show');
      $('#toolbar_filter_hide').collapse('hide');
    });

    table.on('change', '.group-checkable', function() {
      var set = $(this).closest('table').find('td:first-child .checkable');
      var checked = $(this).is(':checked');
      $(set).each(function() {
        if (checked) {
          $(this).prop('checked', true);
          table.rows($(this).closest('tr')).select();
          var checkedNodes = table.rows('.selected').nodes();
          var count = checkedNodes.length;
          $('#kt_datatable_selected_records').html(count);
          if (count > 0) { $('#toolbar_delete').collapse('show'); }
        }
        else {
          $(this).prop('checked', false);
          table.rows($(this).closest('tr')).deselect();
          $('#toolbar_delete').collapse('hide');
        }
      });
    });

    table.on('change', '.checkable', function() {
      var checkedNodes = table.rows('.selected').nodes();
      var count = checkedNodes.length;
      $('#kt_datatable_selected_records').html(count);
      if (count > 0) { $('#toolbar_delete').collapse('show'); }
      else { $('#toolbar_delete').collapse('hide'); }
    });

    $('body').on('click', '#active', function () {
      var id = $(this).data("id");
      $.ajax({
        type: "get",
        url: "{{ URL::current() }}/active/"+id,
        processing: true,
        serverSide: true,
        success: function (data) {
          var oTable = $('#exilednoname').dataTable();
          $('#toolbar_delete').collapse('hide');
          oTable.fnDraw(false);
          toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
          toastr.success("{{ trans('default.notification.success.active') }}");
        },
        error: function (data) {
          toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
          toastr.error("{{ trans('default.notification.error.restrict') }}!");
        }
      });
    });

    $('body').on('click', '#inactive', function () {
      var id = $(this).data("id");
      $.ajax({
        type: "get",
        url: "{{ URL::current() }}/inactive/"+id,
        processing: true,
        serverSide: true,
        success: function (data) {
          var oTable = $('#exilednoname').dataTable();
          $('#toolbar_delete').collapse('hide');
          oTable.fnDraw(false);
          toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
          toastr.success("{{ trans('default.notification.success.inactive') }}");
        },
        error: function (data) {
          toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
          toastr.error("{{ trans('default.notification.error.restrict') }}!");
        }
      });
    });

    $('.delete-all').on('click', function(e) {
      var exilednonameArr = [];
      $(".checkable:checked").each(function() { exilednonameArr.push($(this).attr('data-id')); });
      var strEXILEDNONAME = exilednonameArr.join(",");
      Swal.fire({
        title: "Are you sure?",
        text: "{{ trans('default.label.confirm-deleteall') }}",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        reverseButtons: false
      }).then(function(result) {
        if (result.value) {
          $.ajax({
            url: "{{ URL::current() }}/deleteall",
            type: 'get',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: 'EXILEDNONAME='+strEXILEDNONAME,
            success: function (data) {
              var oTable = $('#exilednoname').dataTable();
              $('#toolbar_delete').collapse('hide');
              oTable.fnDraw(false);
              toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
              toastr.success("{{ trans('default.notification.success.delete-selected') }}");
            },
            error: function (data) {
              toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
              toastr.error("{{ trans('default.notification.error.restrict') }}!");
            }
          });
        }
      });
    });

    $('body').on('click', '.delete', function () {
      var id = $(this).data("id");
      Swal.fire({
        title: "Are you sure?",
        text: "{{ trans('default.label.confirm-delete') }}",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        reverseButtons: false
      }).then(function(result) {
        if (result.value) {
          $.ajax({
            type: "get",
            url: "{{ URL::current() }}/delete/"+id,
            success: function (data) {
              var oTable = $('#exilednoname').dataTable();
              oTable.fnDraw(false);
              toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
              toastr.success("{{ trans('default.notification.success.delete') }}");
            },
            error: function (data) {
              toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
              toastr.error("{{ trans('default.notification.error.restrict') }}!");
            }
          });
        }
      });
    });

    $('body').on('click', '#delete', function () {
      var id = $(this).data("id");
      if(confirm("Are You sure want to delete !")){

      }
    });

  };

  return {
    init: function() {
      initTable2();
    },
  };

}();

jQuery(document).ready(function() {
  KTDatatablesExtensionsKeytable.init();
});
</script>

<script>
"use strict";

// Shared Colors Definition
const primary = '#6993FF';
const success = '#1BC5BD';
const info = '#8950FC';
const warning = '#FFA800';
const danger = '#F64E60';

// Class definition
function generateBubbleData(baseval, count, yrange) {
  var i = 0;
  var series = [];
  while (i < count) {
    var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;;
    var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
    var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

    series.push([x, y, z]);
    baseval += 86400000;
    i++;
  }
  return series;
}

function generateData(count, yrange) {
  var i = 0;
  var series = [];
  while (i < count) {
    var x = 'w' + (i + 1).toString();
    var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

    series.push({
      x: x,
      y: y
    });
    i++;
  }
  return series;
}

var KTApexChartsDemo = function () {
  // Private functions
  var _demo1 = function () {
    const apexChart = "#charts";
    var created = [{{ chart_created($model) }}];
    var updated = [{{ chart_updated($model) }}];
    var options = {
      series: [
        { name: 'Created', data: created },
        { name: 'Updated', data: updated },
      ],
      chart: {
        height: 350,
        type: 'line',
        zoom: {
          enabled: false
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'straight'
      },
      grid: {
        row: {
          colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
          opacity: 0.5
        },
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      },
      colors: [success, warning]
    };
    var chart = new ApexCharts(document.querySelector(apexChart), options);
    chart.render();
  }
  return {
    init: function () {
      _demo1();
    }
  };
}();
jQuery(document).ready(function () {
  KTApexChartsDemo.init();
});
</script>
@endpush
