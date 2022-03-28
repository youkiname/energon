@extends('layouts.app')

@section('title', "Контрагенты")

@section('content')
@include('components.decor-images')
<livewire:company-list /> 
@endsection
