@extends('layouts.datatable.__index', ['page' => 'index', 'daterange' => 'false', 'status' => 'false', 'chart' => 'true'])
@push('title', 'Table Relations')

@push('table-header')
<th> General </th>
<th> Description </th>
@endpush

@push('table-body')
{ data: 'id_generals' },
{ data: 'description' },
@endpush
