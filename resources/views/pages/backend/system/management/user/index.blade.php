@extends('layouts.datatable.__index', ['page' => 'index', 'daterange' => 'false', 'status' => 'false', 'chart' => 'true'])
@push('title', 'Management Accesses')

@push('table-header')
<th> Name </th>
<th> Email </th>
<th> Phone </th>
<th> Address 1 </th>
<th> Address 2 </th>
@endpush

@push('table-body')
{ data: 'name' },
{ data: 'email' },
{ data: 'phone' },
{ data: 'address_1' },
{ data: 'address_2' },
@endpush
