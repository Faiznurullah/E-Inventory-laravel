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
          <form method="POST" action="{{ route('register') }}">
           @csrf

             <!-- Email input -->
             <div class="form-outline mb-4">
                <label class="form-label" for="form1Example13">Nama</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form1Example13">Email address</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-outline mb-4">
            <div class="mb-3">
              <label for="disabledTextInput" class="form-label">Level User</label>
              <input type="text" id="disabledTextInput" class="form-control" placeholder="User" name="kelas" value="user" required autocomplete="kelas" autofocus>
            </div>
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form1Example23">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form1Example23">Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
  
  
            <!-- Submit button -->
            <button type="submit" class="btn btn-success btn-lg btn-block">Sign up</button>
  
          </form>
        </div>
      </div>
    </div>
  </section>




@endsection
