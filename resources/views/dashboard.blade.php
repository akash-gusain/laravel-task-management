<div>
  
@extends('layouts.app')

@section('title', 'Dashboard | TaskFlow')

@section('content')
<div class="bg-white rounded-3 shadow-sm p-4">
    <h1 class="fw-bold">Dashboard</h1>

    <p class="text-muted">
        Welcome, {{ auth()->user()->name }}!
    </p>

    <p>
        Your account is ready. We'll add your task statistics
        and task list here next.
    </p>

    <form action="{{ url('/logout') }}" method="POST">
        @csrf

        <button type="submit" class="btn btn-outline-danger">
            Log out
        </button>
    </form>
</div>
@endsection

</div>
