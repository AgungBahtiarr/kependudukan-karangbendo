@extends('layouts.app')

@section('title', $title)


@section('content')
    @role('Admin')
        <p>Ini dashboard Admin</p>
    @endrole

    @role('Kader')
        <p>Ini dashboard Kader</p>
    @endrole
@endsection
