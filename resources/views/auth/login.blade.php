@extends('auth.layouts.app')

@section('content')

<section class="vh-90">
    <div class="container h-90">
      <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="https://i.ibb.co/71P5gKJ/undraw-Investor-update-re-qnuu-removebg-preview.png"
            class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">

          <form method="POST" action="{{ route('login') }}">
           @csrf

            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form1Example13">Email address</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
             @enderror
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form1Example23">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
  
            <div class="d-flex justify-content-around align-items-center mb-4">
              <!-- Checkbox -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="form1Example3"> Remember me </label>
              </div>
              @if (Route::has('password.request'))
              <a class="btn btn-link text-success" href="{{ route('password.request') }}">
                Forgot Your Password?
              </a>
          @endif
            </div>
  
            <!-- Submit button -->
            <button type="submit" class="btn btn-success btn-lg btn-block">Sign in</button>
  
          </form>
        </div>
      </div>
    </div>
  </section>


@endsection
