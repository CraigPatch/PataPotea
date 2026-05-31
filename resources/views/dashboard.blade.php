@extends('layouts.app')

@section('title', 'Dashboard — Pata Potea')

@section('content')
<div style="max-width:900px; margin: 3rem auto; padding: 0 2rem;">
    <h1 style="font-family:'Playfair Display',serif; font-size:2rem; color:#0f2218; margin-bottom:.5rem;">
        Welcome back, {{ explode(' ', Auth::user()->name)[0] }} 👋
    </h1>
    <p style="color:#5a7a68; font-size:15px;">
        You are logged in to Pata Potea Tanzania.
        Your city: <strong>{{ Auth::user()->city ?? 'Not set' }}</strong>
    </p>
</div>
@endsection