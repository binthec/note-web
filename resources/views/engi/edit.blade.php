@extends('layouts.app')

@section('content')
    <engi-edit
        :props-uuid='{{ json_encode($uuid) }}'
    ></engi-edit>
@endsection
