@extends('layouts.datatable.__index', ['daterange' => 'false', 'status' => 'false'])
@push('title', 'Management Users')

@push('table-header')
<th> Access </th>
<th> Name </th>
<th> Email </th>
<th> Phone </th>
@endpush

@push('table-body')
{ data: 'id_accesses' },
{ data: 'name' },
{ data: 'email' },
{ data: 'phone' },
@endpush
