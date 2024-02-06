@extends('layouts.main')

@section('content')


<!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper " data-bg-src="assets/img/bg/breadcumb-bg.png" data-overlay="title" data-opacity="8">
  <div class="breadcumb-shape" data-bg-src="assets/img/bg/breadcumb_shape_1_1.png">
  </div>
  <div class="shape-mockup breadcumb-shape2 jump d-lg-block d-none" data-right="30px" data-bottom="30px">
    <img src="assets/img/bg/breadcumb_shape_1_2.png" alt="shape">
  </div>
  <div class="shape-mockup breadcumb-shape3 jump-reverse d-lg-block d-none" data-left="50px" data-bottom="80px">
    <img src="assets/img/bg/breadcumb_shape_1_3.png" alt="shape">
  </div>
  <div class="container">
    <div class="breadcumb-content text-center">
      <h1 class="breadcumb-title">Update Profile </h1>
      <ul class="breadcumb-menu">
        <li><a href="{{route('home')}}">Home</a></li>
        <li>Profile</li>
      </ul>
    </div>
  </div>
</div>

<main>
  <div class="container py-5 basic-pkg">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center display-6 fw-normal primary-color pb-5"><span class="text-dark">{{__('Add Details')}} </span>
        </h1>
      </div>


      <div class="col-12">
        <form action="{{route('student_pofile_submission')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="profile-update-form">
            @if($errors->any())

            <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
              {!! implode('', $errors->all('<div>:message</div>')) !!}
              <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
            @endif
            <div class="row">
              <div class="col-sm-12">
                <div class="form-item">

                  <label for="profile-image">Add Your Image</label>
                  <input class="form-control" type="file" name="profile_image" id="profile-image">
                </div>

              </div>
              <div class="col-sm-6">
                <div class="form-item">
                  <label for="">Name</label>
                  <input type="text" name="" id="" placeholder="Name" disabled value="{{$user->name}}" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-item">
                  <label for="">Email</label>
                  <input type="text" name="" id="" placeholder="email" disabled value="{{$user->email}}" class="form-control">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-item">
                  <label for="">Full Name</label>
                  <input type="text" required name="fullname" id="" value="{{ ($user->full_name != null) ? $user->full_name : old('full_name') }}" placeholder="Add Your Name" class="form-control">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-item">
                  <label for="">Address</label>
                  <input type="text" required name="address" id="" value="{{ ($user->address != null) ? $user->address : old('address') }}" placeholder="Add Your Address" class="form-control">
                </div>
              </div>


              <div class="col-sm-6">
                <div class="form-item">
                  <label for="">Father/Guardian Name</label>
                  <input type="text" required name="guardian_name" id="" value="{{ ($user->guardian_name != null) ? $user->guardian_name : old('guardian_name') }}" placeholder="Add Name" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-item">
                  <label for="">Father/Guardian Number</label>
                  <input type="tel" required name="guardian_number" id="" value="{{ ($user->guardian_number != null) ? $user->guardian_number : old('guardian_number') }}" placeholder="Add Your Father/Guardian Contact Number" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-item">
                  <label for="">Religon</label>
                  <input type="text" required name="religon" id="" value="{{ ($user->religion != null) ? $user->religion : old('religon') }}" placeholder="Add Religon" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-item">
                  <label for="">Gender</label>
                  <select class="form-select" name="gender" required>
                    <option selected disabled>Select Your Gender</option>
                    <option value="male" {{ ($user->gender == 'male') ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ ($user->gender == 'female') ? 'selected' : '' }}>Female</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-item">
                  <label for="">CNIC/B-Form Number</label>
                  <input type="number" name="cnic_number" required id="" value="{{ ($user->cnic_number != null) ? $user->cnic_number : old('cnic_number') }}" placeholder="Add Your CNIC/B-Form Number" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-item">
                  <label for="cnic-front-image">Add Your CNIC Front Image</label>
                  <input class="form-control" name="cnic_front" type="file" id="cnic-front-image">
                </div>

              </div>
              <div class="col-sm-6">
                <div class="form-item">
                  <label for="cnic-back-image">Add Your CNIC Back Image</label>
                  <input class="form-control" name="cnic_back" type="file" id="cnic-back-image">
                </div>

              </div>
              <div class="col-12">
                <div class="form-btn col-12 mt-4 text-center ">
                  <button type="submit" class="th-btn">Submit<i class="fas fa-long-arrow-right ms-2"></i></button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>











    </div>







  </div>
</main>
@endsection

@section('css')
<style>
  .form-item {
    margin: 10px 00;
  }

  input[type="file"] {
    padding: 14px 20px;
  }
</style>
@endsection

@section('script')

@endsection