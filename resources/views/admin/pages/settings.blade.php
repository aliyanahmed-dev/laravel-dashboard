@extends('admin.layouts.simple.master')

@section('title', 'Default')

@section('css')

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3></h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Setting</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row second-chart-list third-news-update">
        <div class="col-xl-8 xl-100 dashboard-sec box-col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Settings</h5>
                </div>
                <form class="form theme-form bold-labels" action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                            <strong>Updates ! </strong> {{ Session::get('message') }}.
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                        </div>
                        @endif
                        @if($errors->any())

                        <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label" for="logo">Logo</label>
                                    <div class="col-sm-12">

                                        <input class="form-control" type="file" id="logo" name="logo" placeholder="Logo">
                                        @if($setting['logo'])
                                        <img src="{{$setting['logo']}}" alt="" class="image-place">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label" for="logo_2">Logo 2</label>
                                    <div class="col-sm-12">

                                        <input class="form-control" type="file" id="logo_2" name="logo_2" placeholder="Logo">
                                        @if($setting['logo_2'])
                                        <img src="{{$setting['logo_2']}}" alt="" class="image-place">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label" for="logo_3">Logo 3</label>
                                    <div class="col-sm-12">

                                        <input class="form-control" id="logo_3" type="file" name="logo_3" placeholder="Logo">
                                        @if($setting['logo_3'])
                                        <img src="{{$setting['logo_3']}}" alt="" class="image-place">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label">Phone</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="tel" name="phone" placeholder="Enter Phone Number" value="{{$setting['phone']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label">Phone 2</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="tel" name="phone_2" placeholder="Enter Second Phone Number" value="{{$setting['phone_2']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label">Email</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="email" name="email" placeholder="Enter Email" value="{{$setting['email']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label">Email 2</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="email" name="email_2" placeholder="Enter Second Email" value="{{$setting['email_2']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label">Address</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" name="address" placeholder="Enter Address" value="{{$setting['address']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label">Address 2</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" name="address_2" placeholder="Enter Second Address" value="{{$setting['address_2']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label">Timing</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" name="timing" placeholder="Enter Timing" value="{{$setting['timing']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label">Timing 2</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" name="timing_2" placeholder="Enter Second Timing" value="{{$setting['timing_2']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label">Copyright</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" name="copyright" placeholder="Enter Copyright" value="{{$setting['copyright']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label">Footer About</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" name="footer_about" placeholder="Enter Footer About" value="{{$setting['footer_about']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 pt-0">Select Color</label>
                                    <div class="col-sm-12">
                                        <input class="form-control form-control-color" name="color" type="color" value="{{$setting['color']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 pt-0">Select Second Color</label>
                                    <div class="col-sm-12">
                                        <input class="form-control form-control-color" name="color_2" type="color" value="{{$setting['color_2']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 pt-0">Select Third Color</label>
                                    <div class="col-sm-12">
                                        <input class="form-control form-control-color" name="color_3" type="color" value="{{$setting['color_3']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 pt-0">Select Dashboard Color</label>
                                    <div class="col-sm-12">
                                        <input class="form-control form-control-color" name="color_4" type="color" value="{{$setting['color_4']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label">Facebook</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="url" name="facebook" placeholder="Enter Facebook" value="{{$setting['facebook']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label">Twitter</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="url" name="twitter" placeholder="Enter Twitter" value="{{$setting['twitter']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label">Instagram</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="url" name="instagram" placeholder="Enter Instagram" value="{{$setting['instagram']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label">Linkedin</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="url" name="linkedin" placeholder="Enter Linkedin" value="{{$setting['linkedin']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label">Behance</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="url" name="behance" placeholder="Enter Behance" value="{{$setting['behance']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label">Pinterest</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="url" name="pinterest" placeholder="Enter Pinterest" value="{{$setting['pinterest']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-12 col-form-label">Youtube</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="url" name="youtube" placeholder="Enter Youtube" value="{{$setting['youtube']}}">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="col-sm-9 offset-sm-3">
                            <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Update Setting</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    var session_layout = '{{ session()->get("layout") }}';
</script>
@endsection

@section('script')

@endsection