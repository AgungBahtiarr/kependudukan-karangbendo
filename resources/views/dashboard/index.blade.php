@extends('layouts.app')

@section('title', $title)

@role('Admin')
<p>Ini dashboard Admin</p>
@endrole

@role('Kader')
<p>Ini dashboard Kader</p>
@endrole