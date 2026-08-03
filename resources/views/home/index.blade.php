@extends('layouts.guest')

@section('title', $setting->site_name)

@section('content')

@include('components.guest.hero')

@include('components.guest.about')

@include('components.guest.classes')

@include('components.guest.gallery')

@include('components.guest.faq')

@include('components.guest.cta')

@include('components.guest.maps')

@include('components.guest.footer')

@endsection