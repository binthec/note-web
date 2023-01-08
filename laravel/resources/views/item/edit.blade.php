@extends('layouts.app')

@section('content')
    <item-edit
        :uuid='{{ json_encode($uuid) }}'
    ></item-edit>
@endsection
