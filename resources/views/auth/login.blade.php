@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 400px; margin-top: 50px;">
    <h2>Login Petugas BPBD</h2>

    <!-- Menampilkan pesan error jika login gagal -->
    @if($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        
        <div style="margin-bottom: 15px;">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required style="width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required style="width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box;">
        </div>

        <button type="submit" class="btn" style="width: 100%;">Login</button>
    </form>
</div>
@endsection