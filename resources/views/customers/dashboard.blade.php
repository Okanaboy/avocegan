@extends('layouts.app')

@section('content')
    welcome {{ auth()->user()->username}}
@endsection