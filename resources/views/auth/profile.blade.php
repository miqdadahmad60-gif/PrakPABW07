@extends('layouts.app')
@section('title', 'Profil Petugas')
@section('content')
<h2>Profil Petugas BPBD</h2>
<div class="card">
    <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    <p><strong>Akun dibuat:</strong> {{ Auth::user()->created_at }}</p>
</div>
@endsection
