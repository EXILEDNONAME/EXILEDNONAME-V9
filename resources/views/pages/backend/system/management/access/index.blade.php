@extends('layouts.datatable.__index', ['daterange' => 'false', 'status' => 'false'])
@push('title', 'Management Accesses')

@push('table-header')
<th> Name </th>
<th> Description </th>
@endpush

@push('table-body')
{ data: 'name' },
{ data: 'description' },
@endpush
