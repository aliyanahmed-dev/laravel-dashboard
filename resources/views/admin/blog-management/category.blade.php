@extends('admin.layouts.simple.master')

@section('title', 'Default')

@section('css')

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Blogs Categories</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row second-chart-list third-news-update">
        <div class="col-sm-4 dashboard-sec ">
            <div class="card">
                <div class="card-header">
                    <h5>Add Category</h5>
                </div>
                <form class="form theme-form bold-labels" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="blog">
                    <div class="card-body p-3">
                        @if($errors->any())

                        <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                        </div>
                        @endif
                        @if(Session::has('message'))
                        <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                            <strong>Updates ! </strong> {{ Session::get('message') }}.
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                        </div>
                        @endif


                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Name </label>
                                            <div class="">
                                                <input class="form-control" type="text" required id="name" name="name" value="{{ old('name') }}" placeholder="Course Name" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Slug </label>
                                            <div class="">
                                                <input class="form-control" type="text" required name="slug" id="slug" value="{{ old('slug') }}" placeholder="Course Slug" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>





                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Image</label>
                                            <div class="">
                                                <label class="instruction_label">Student image (360 width)</label><br>
                                                <input class="form-control" onchange="thumb(this);" name="image" type="file" />

                                                <img src="" width="200" class="thumbnail-img" />

                                            </div>
                                        </div>
                                    </div>

                                </div>






                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-start  p-3">
                        <div class="col-sm-12">
                            <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Add Course</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header align-items-center card-header d-flex justify-content-between">
                    <h5>Categories</h5>

                </div>
                @if(Session::has('message'))
                <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                    <strong>Updates ! </strong> {{ Session::get('message') }}.
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>

                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key => $course)
                            <tr>
                                <td>{{ $key}}</td>
                                <td>

                                    <img src="{{  asset(($course->hasMedia('thumbnail')) ? $course->getFirstMediaUrl('thumbnail') : 'user-image.webp')  }}" width="50" />



                                </td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->slug }}</td>


                                <td>{{ ($course->is_active == 1) ? 'Active' : 'Non Active' }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Actions </button>
                                        <ul class="dropdown-menu dropdown-block text-start">
                                            <li><a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#editcatModal" data-id="{{ $course->id }}" data-name="{{ $course->name }}" data-slug="{{ $course->slug }}" data-image="{{  asset(($course->hasMedia('thumbnail')) ? $course->getFirstMediaUrl('thumbnail') : 'user-image.webp')  }}"><i class="fa fa-pencil"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="{{ route('categories.suspend', $course->id) }}" title=""><i class="fa fa-pencil"></i> {{ ($course->is_active == 1) ? 'Suspend' : 'Active' }}</a></li>
                                            <li>

                                                <!-- <a class="dropdown-item" href="#">What are you doing?</a></li>-->
                                                <form action="{{ route('categories.destroy', $course->id) }}" class="d-inline" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="dropdown-item">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                        </ul>
                                    </div>
                                    {{--<a class="btn btn-primary btn-sm" href="{{ route('courses.edit', $course->id) }}" title=""><i class="fa fa-pencil"></i> Edit</a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('courses.suspend', $course->id) }}" title=""><i class="fa fa-pencil"></i> {{ ($course->is_active == 1) ? 'Suspend' : 'Active' }}</a>
                                    <form action="{{ route('courses.destroy', $course->id) }}" class="d-inline" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="editcatModal" tabindex="-1" aria-labelledby="editcatModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editcatModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">

                    <form class="form theme-form bold-labels" action="{{ route('categories.update_cat') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" class="edit-cat-id-input" value="">
                        <input type="hidden" name="type" value="course">
                        <div class="card-body p-3">
                            @if($errors->any())
                            <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                            </div>
                            @endif
                            @if(Session::has('message'))
                            <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                                <strong>Updates ! </strong> {{ Session::get('message') }}.
                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class=" col-form-label">Name </label>
                                                <div class="">
                                                    <input class="form-control edit-cat-name-input" type="text" required id="name" name="name" value="" placeholder="Course Name" data-bs-original-title="" title="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class=" col-form-label">Slug </label>
                                                <div class="">
                                                    <input class="form-control edit-cat-slug-input" type="text" required name="slug" id="slug" value="" placeholder="Course Slug" data-bs-original-title="" title="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class=" col-form-label">Image</label>
                                                <div class="">
                                                    <label class="instruction_label">Student image (360 width)</label><br>
                                                    <input class="form-control" onchange="catthumb(this);" name="image" type="file" />

                                                    <img src="" width="200" class="edit-thumbnail-img edit-cat-img-tag" />

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-start  p-3">
                            <div class="col-sm-12">
                                <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Update Course</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    var session_layout = "{{ session()->get('layout ') }}";
</script>
@endsection

@section('script')
<script>
    $('#name').change(function(e) {
        $.get('{{route("admin.check_slug")}}', {
                'name': $(this).val()
            },
            function(data) {
                $('#slug').val(data.slug);
            }
        );
    });

    function thumb(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
                $('.thumbnail-img')
                    .attr('src', e.target.result);

            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function catthumb(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
                $('.edit-thumbnail-img')
                    .attr('src', e.target.result);

            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    var exampleModal = document.getElementById('editcatModal')
    exampleModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var id = button.getAttribute('data-id')
        var name = button.getAttribute('data-name')
        var slug = button.getAttribute('data-slug')
        var image = button.getAttribute('data-image')

        var valueid = exampleModal.querySelector('.edit-cat-id-input')
        var valuename = exampleModal.querySelector('.edit-cat-name-input')
        var valueslug = exampleModal.querySelector('.edit-cat-slug-input')
        var valueimage = exampleModal.querySelector('.edit-cat-img-tag')

        valueid.value = id
        valuename.value = name
        valueslug.value = slug
        $(valueimage).attr('src', image)
    })
</script>
@endsection