@extends('layouts.default', ['page' => 'trash'])

@push('head')
<link href="/assets/backend/plugins/custom/datatables/datatables.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
@endpush

@push('body')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
      <div class="card-header">
        <div class="card-title">
          <h4 class="card-label"> {{ trans('default.label.trash') }} </h4>
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
          <div class="collapse" id="toolbar_default">
            <a data-url="" class="restoreall btn btn-sm btn-icon btn-clean btn-icon-md" data-toggle="tooltip" title="{{ trans('default.label.restoreall-selected') }}"><i class="text-success fas fa-undo"></i></a>
            <a data-url="" class="deletepermanent-all btn btn-sm btn-icon btn-clean btn-icon-md" data-toggle="tooltip" title="{{ trans('default.label.deleteall-permanently-selected') }}"><i class="text-danger fas fa-trash"></i></a>
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
        <div class="table-responsive">
          <table width="100%" class="table table-striped-table-bordered table-hover table-checkable" id="exilednoname">
            <thead>
              <tr>
                <th class="no-export"> </th>
                <th> No. </th>
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
        @stack('table-body')
        {
          data: 'action', orderable: false, orderable: false, searchable: false, 'width': '1',
          render : function ( data, type, row) {
            return ''+
            '<div class="dropdown dropdown-inline">'+
            '<button type="button" class="btn btn-hover-light-dark btn-icon btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ki ki-bold-more-ver"></i></button>'+
            '<div class="dropdown-menu dropdown-menu-xs" style=""><ul class="navi navi-hover py-5">'+
            '<li class="navi-item"><a href="javascript:void(0);" class="navi-link" data-id="' + row.id + '" id="restore"><span class="navi-icon"><i class="flaticon2-expand"></i></span><span class="navi-text">{{ trans("default.label.restore") }}</span></a></li>'+
            '<li class="navi-item"><a href="javascript:void(0);" class="navi-link" data-id="' + row.id + '" id="delete_permanent"><span class="navi-icon"><i class="text-danger fas fa-trash"></i></span><span class="navi-text">{{ trans("default.label.delete") }}</span></a></li>';
          },
        },
      ],
      order: [[1, 'asc']]
    });

    // FILTER
    @stack('filter-body')
    // END FILTER

    $('#reset').click(function(){
      table.search( '' ).columns().search( '' ).draw();
    });

    $("#table-refresh").on("click", function() {
      $('#toolbar_default').collapse('hide');
      table.ajax.reload();
    });
    $('#export_print').on('click', function(e) { e.preventDefault(); table.button(0).trigger(); });
    $('#export_copy').on('click', function(e) { e.preventDefault(); table.button(1).trigger(); });
    $('#export_excel').on('click', function(e) { e.preventDefault(); table.button(2).trigger(); });
    $('#export_csv').on('click', function(e) { e.preventDefault(); table.button(3).trigger(); });
    $('#export_pdf').on('click', function(e) { e.preventDefault(); table.button(4).trigger(); });

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
          if (count > 0) { $('#toolbar_default').collapse('show'); }
        }
        else {
          $(this).prop('checked', false);
          table.rows($(this).closest('tr')).deselect();
          $('#toolbar_default').collapse('hide');
        }
      });
    });

    table.on('change', '.checkable', function() {
      var checkedNodes = table.rows('.selected').nodes();
      var count = checkedNodes.length;
      $('#kt_datatable_selected_records').html(count);
      if (count > 0) { $('#toolbar_default').collapse('show'); }
      else { $('#toolbar_default').collapse('hide'); }
    });

    $('body').on('click', '#restore', function () {
      var id = $(this).data("id");
      Swal.fire({
        title: "Are you sure?",
        text: "{{ trans('default.label.confirm-restore') }}",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        reverseButtons: false
      }).then(function(result) {
        if (result.value) {
          $.ajax({
            type: "get",
            url: "{{ URL::current() }}/../restore/"+id,
            processing: true,
            serverSide: true,
            success: function (data) {
              var oTable = $('#exilednoname').dataTable();
              oTable.fnDraw(false);
              toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
              toastr.success("{{ trans('default.notification.success.restore') }}");
            },
            error: function (data) {
              toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
              toastr.error("{{ trans('default.notification.error.restrict') }}!");
            }
          });
        }
      });
    });

    $('.restoreall').on('click', function(e) {
      var exilednonameArr = [];
      $(".checkable:checked").each(function() { exilednonameArr.push($(this).attr('data-id')); });
      var strEXILEDNONAME = exilednonameArr.join(",");
      Swal.fire({
        title: "Are you sure?",
        text: "{{ trans('default.label.confirm-restoreall') }}",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        reverseButtons: false
      }).then(function(result) {
        if (result.value) {
          $.ajax({
            url: "{{ URL::current() }}/../restoreall",
            type: 'get',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: 'EXILEDNONAME='+strEXILEDNONAME,
            success: function (data) {
              var oTable = $('#exilednoname').dataTable();
              $('#toolbar_default').collapse('hide');
              oTable.fnDraw(false);
              toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
              toastr.success("{{ trans('default.notification.success.delete-permanentall-selected') }}");
            },
            error: function (data) {
              toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
              toastr.error("{{ trans('default.notification.error.restrict') }}!");
            }
          });
        }
      });
    });

    $('body').on('click', '#delete_permanent', function () {
      var id = $(this).data("id");
      Swal.fire({
        title: "Are you sure?",
        text: "{{ trans('default.label.confirm-delete-permanent') }}",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        reverseButtons: false
      }).then(function(result) {
        if (result.value) {
          $.ajax({
            type: "get",
            url: "{{ URL::current() }}/../delete-permanent/"+id,
            processing: true,
            serverSide: true,
            success: function (data) {
              var oTable = $('#exilednoname').dataTable();
              oTable.fnDraw(false);
              toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
              toastr.success("{{ trans('default.notification.success.active') }}");
            },
            error: function (data) {
              toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
              toastr.error("{{ trans('default.notification.error.restrict') }}!");
            }
          });
        }
      });
    });

    $('.deletepermanent-all').on('click', function(e) {
      var exilednonameArr = [];
      $(".checkable:checked").each(function() { exilednonameArr.push($(this).attr('data-id')); });
      var strEXILEDNONAME = exilednonameArr.join(",");
      Swal.fire({
        title: "Are you sure?",
        text: "{{ trans('default.label.confirm-delete-permanentall') }}",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        reverseButtons: false
      }).then(function(result) {
        if (result.value) {
          $.ajax({
            url: "{{ URL::current() }}/../delete-permanentall",
            type: 'get',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: 'EXILEDNONAME='+strEXILEDNONAME,
            success: function (data) {
              var oTable = $('#exilednoname').dataTable();
              $('#toolbar_default').collapse('hide');
              oTable.fnDraw(false);
              toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
              toastr.success("{{ trans('default.notification.success.delete-permanentall-selected') }}");
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
        text: "You will permanently delete this item",
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
@endpush
