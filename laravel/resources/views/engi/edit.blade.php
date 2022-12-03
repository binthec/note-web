@extends('layouts.app')

@section('content')
    <engi-edit
        :uuid='{{ json_encode($uuid) }}'
    ></engi-edit>
@endsection
