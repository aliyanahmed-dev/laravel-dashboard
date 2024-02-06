@extends('admin.layouts.authentication.master')
@section('title', 'Login')

@section('css')
<style>
    
.login-card .logo img {
  width: 320px;
}

</style>
@endsection

@section('style')
@endsection

@section('content')

<div class="container-fluid p-0">
   <div class="row m-0">
      <div class="col-12 p-0">
         <div class="login-card">
            <div>
               <div><a class="logo" href="#"><img class="img-fluid for-light" src="{{$setting['logo']}}" alt="looginpage"><img class="img-fluid for-dark" src="{{$setting['logo']}}" alt="looginpage"></a></div>
               <div class="login-main">
                  <form class="theme-form" action="{{ URL('admin/signin') }}" method="POST">
                    @csrf
                    
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach($errors->all() as $errors)
                        <li>{{$errors}}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                    <h4>Sign in to account</h4>
                    <p>Enter your email & password to login</p>
                    <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" type="email" required="" placeholder="Test@gmail.com" name="email" >
                    </div>

                    <div class="form-group position-relative">
                        <label class="col-form-label">Password</label>
                        <input class="form-control" id="passwordInput" type="password" required="" placeholder="*********" name="password">
                        <!-- <i class="fa-regular fa-eye-slash position-absolute end-0 fs-4 mt-2 me-2"></i> -->
                        <i class="toggle-password far fa-eye-slash position-absolute" style="top: 63%; right: 3%;" onclick="togglePasswordVisibility()"></i>
                    </div>

                    <div class="form-group mb-0">
                    <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                    
                    </div>
                    <div style="text-align: end;"><a href="{{ route('forget.password.get') }}">Reset Password</a></div>
                  </form>
                  @if(session('message'))
                    <div class="alert alert-success">
                      {{ session('message') }}
                    </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
@endsection