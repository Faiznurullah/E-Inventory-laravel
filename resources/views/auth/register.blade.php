@extends('auth.layouts.app')
@section('icon-cdn')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
@section('content')


<section class="vh-90">
    <div class="container h-90">


      @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}.
       </div>  
      @endif

      <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="col-md-4 col-lg-5 col-xl-5">
          <img src="https://i.ibb.co/71P5gKJ/undraw-Investor-update-re-qnuu-removebg-preview.png"
            class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-6 col-xl-6 offset-xl-1">
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

           <a href="{{ 'auth/google' }}" class="btn btn-outline-danger btn-lg btn-block mt-2"><i class="bi bi-google"></i> Sign up With Google</a>
          
            <a href="{{ Route('auth.facebook') }}"  class="btn btn-outline-primary btn-lg btn-block mt-2"><i class="bi bi-facebook"></i> Sign up With Facebook</a>
          

          </div>
      </div>
    </div>
  </section>




@endsection
