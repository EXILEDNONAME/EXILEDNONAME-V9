@extends('layouts.datatable.__show', ['status' => 'false', 'daterange' => 'false'])
@push('title', 'Management Accesses')

@push('content-body')
<tr>
  <td class="align-middle font-weight-bold"> Name </td>
  <td class="align-middle"> {!! $data->name !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Description </td>
  <td class="align-middle"> {!! $data->description !!} </td>
</tr>
@endpush
