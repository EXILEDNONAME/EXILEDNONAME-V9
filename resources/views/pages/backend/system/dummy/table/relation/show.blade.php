@extends('layouts.datatable.__show', ['status' => 'false', 'daterange' => 'false'])
@push('title', 'Table Relations')

@push('content-body')
<tr>
  <td class="align-middle font-weight-bold"> ID General </td>
  <td class="align-middle"> {!! $data->dummy_table_generals->name !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Description </td>
  <td class="align-middle"> {!! $data->description !!} </td>
</tr>
@endpush
