@extends('layouts.app')

@section('title', 'Login')

@section('header_title', 'LOGIN PORTOFOLIO')

@section('content')

<div class="project-grid fade-in" style="max-width:400px; margin:auto">

    <div class="project-card">

        <h3 style="text-align:center">Form Login</h3>

        {{-- PESAN BERHASIL --}}
        @if(session('success'))
            <p style="color:green; text-align:center">
                {{ session('success') }}
            </p>
        @endif

        {{-- PESAN ERROR --}}
        @if(session('error'))
            <p style="color:red; text-align:center">
                {{ session('error') }}
            </p>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf

            <label>Email</label>
            <input type="email" name="email"
                   value="{{ old('email') }}"
                   required
                   style="width:100%; padding:10px; margin-bottom:10px">

            <label>Password</label>
            <input type="password" name="password"
                   required
                   style="width:100%; padding:10px; margin-bottom:15px">

           <div class="center" style="margin-top:20px">
    <button type="submit"
        style="
            width:100%;
            padding:15px;
            font-family:'Bangers', cursive;
            font-size:1.3rem;
            background:#ff9800;
            border:4px solid #e65100;
            box-shadow:0 6px 0 #bf360c;
            color:white;
            cursor:pointer;
        ">
        🌻 LOGIN
    </button>
</div>

        </form>

    </div>

</div>

@endsection
