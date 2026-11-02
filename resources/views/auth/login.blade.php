<div>
  
@extends('layouts.app')

@section('title', 'Login | TaskFlow')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-md-5">

                <h2 class="fw-bold mb-2">Welcome back</h2>
                <p class="text-muted mb-4">
                    Log in to manage your tasks.
                </p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ url('/login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">
                            Email address
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">
                            Password
                        </label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            required
                        >
                    </div>

                    <button class="btn btn-primary w-100" type="submit">
                        Log in
                    </button>
                </form>

                <p class="text-center mt-4 mb-0">
                    Don't have an account?
                    <a href="{{ url('/register') }}">Register</a>
                </p>

            </div>
        </div>
    </div>
</div>
@endsection

</div>
