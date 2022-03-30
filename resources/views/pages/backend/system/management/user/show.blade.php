@extends('layouts.datatable.__show', ['status' => 'false', 'daterange' => 'false'])
@push('title', 'Management Accesses')

@push('content-body')
<tr>
  <td class="align-middle font-weight-bold"> Access </td>
  <td class="align-middle"> {!! $data->accesses->name !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Name </td>
  <td class="align-middle"> {!! $data->name !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Email </td>
  <td class="align-middle"> {!! $data->email !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Phone </td>
  <td class="align-middle"> {!! $data->phone !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Address 1 </td>
  <td class="align-middle"> {!! $data->address_1 !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Address 2 </td>
  <td class="align-middle"> {!! $data->address_2 !!} </td>
</tr>
@endpush
