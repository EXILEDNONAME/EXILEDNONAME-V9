@extends('layouts.datatable.__trash', ['daterange' => 'false', 'status' => 'false'])
@push('title', 'Management Accesses')

@push('table-header')
<th width="1" class="text-nowrap"> Deleted At </th>
<th> Name </th>
@endpush

@push('table-body')
{ data: 'deleted_at', 'className': 'align-middle text-nowrap', 'width': '1', },
{ data: 'name' },
@endpush
