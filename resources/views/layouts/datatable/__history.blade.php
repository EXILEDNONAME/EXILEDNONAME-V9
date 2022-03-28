@extends('layouts.default', ['page' => 'history'])

@push('head')
<link href="/assets/backend/plugins/custom/datatables/datatables.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
@endpush

@push('body')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
      <div class="card-header">
        <div class="card-title">
          <h4 class="card-label"> {{ trans('default.label.history') }} </h4>
        </div>
        <div class="card-toolbar">
          <a id="table-refresh" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="reload" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ trans('default.label.refresh') }}"><i class="fas fa-sync-alt"></i></a>
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
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table width="100%" class="table table-striped-table-bordered table-hover table-checkable" id="exilednoname">
            <thead>
              <tr>
                <th> No. </th>
                <th> </th>
                <th> Status </th>
                <th> Subject </th>
                <th> Created By </th>
                <th> Date </th>
                @stack('table-header')
                <th class="no-export"> </th>
              </tr>
            </thead>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>

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
      ajax: { url: "{{ URL::current() }}", },
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
          data: 'autonumber', orderable: false, orderable: false, searchable: false, 'width': '1',
          render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {
          data: 'description', orderable: false, 'className': 'align-middle', 'width': '1',
          render: function ( data, type, row ) {
            if ( data == 'created' ) { return '<span class="label label-dot label-success"></span>'; }
            else if ( data == 'updated' ) { return '<span class="label label-dot label-warning"></span>'; }
            else if ( data == 'deleted' ) { return '<span class="label label-dot label-danger"></span>'; }
            else if ( data == 'restored' ) { return '<span class="label label-dot label-info"></span>'; }
            else { return ''; }
          }
        },
        {
          data: 'description', orderable: true, 'className': 'align-middle',
          render: function ( data, type, row ) {
            if ( data == 'created' ) { return 'Created'; }
            else if ( data == 'updated' ) { return 'Updated'; }
            else if ( data == 'deleted' ) { return 'Deleted'; }
            else if ( data == 'restored' ) { return 'Restored'; }
            else { return ''; }
          }
        },
        { data: 'subjects' },
        { data: 'causer_id', 'className': 'align-middle text-nowrap', 'width': '1' },
        { data: 'updated_at', 'className': 'align-middle text-nowrap', 'width': '1' },
        {
          data: 'action', orderable: false, orderable: false, searchable: false, 'width': '1',
          render : function ( data, type, row) {
            return '<a href="{{ URL::Current() }}/../' + row.subject_id + '" class="navi-link" target="_blank"><span class="navi-icon"><i class="fas fa-eye"></i></span><span class="navi-text"></span></a>';
          },
        },
      ]
    });

    $("#table-refresh").on("click", function() { table.ajax.reload(); });
    $('#export_print').on('click', function(e) { e.preventDefault(); table.button(0).trigger(); });
    $('#export_copy').on('click', function(e) { e.preventDefault(); table.button(1).trigger(); });
    $('#export_excel').on('click', function(e) { e.preventDefault(); table.button(2).trigger(); });
    $('#export_csv').on('click', function(e) { e.preventDefault(); table.button(3).trigger(); });
    $('#export_pdf').on('click', function(e) { e.preventDefault(); table.button(4).trigger(); });

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
@endpush
