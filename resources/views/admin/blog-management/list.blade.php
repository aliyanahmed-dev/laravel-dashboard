 @extends('admin.layouts.simple.master')
 @section('title', 'Courses')

 @section('css')
 @endsection

 @section('style')
 <style>
     div .action {
         display: flex;
     }

     div .action i {
         font-size: 16px;
     }

     div .action .pdf i {
         font-size: 20px;
         color: #FC4438;
     }

     div .action .edit {
         margin-right: 5px;
     }

     div .action .edit i {
         color: #54BA4A;
     }

     [dir=rtl] div .action .edit {
         margin-left: 5px;
     }

     div .action .delete i {
         color: #FC4438;
     }
 </style>
 @endsection

 @section('breadcrumb-title')
 <h3>All Blogs</h3>
 @endsection

 @section('breadcrumb-items')
 <li class="breadcrumb-item">Dashboard</li>
 <li class="breadcrumb-item active">Blogs</li>
 @endsection

 @section('content')
 <div class="container-fluid">
     <div class="row">
         <div class="col-sm-12">
             <div class="card">
                 <div class="card-header align-items-center card-header d-flex justify-content-between">
                     <h5>Blogs</h5>
                     <a href="{{ route('blogs.create') }}" class="btn btn-primary">Add Blogs</a>
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
                                 <th scope="col">Category</th>
                                 <th scope="col">Short Description</th>
                                 <th scope="col">Description</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($blogs as $key => $blog)
                             <tr>
                                 <td>{{ $key}}</td>
                                 <td>

                                     <!-- <img src="{{ asset( ($blog->image != null) ? $blog->image : 'user-image.webp' )  }}" width="50" /> -->

                                     <img src="{{ $blog->getFirstMediaUrl('thumbnail') }}" width="50" />

                                 </td>
                                 <td>{{ $blog->name }}</td>
                                 <td>{{ $blog->slug }}</td>
                                 <td>{{ $blog->category->name }}</td>
                                 <td>{!! ($blog->short_description != null) ? $blog->short_description : '--' !!}</td>
                                 <td>{!! ($blog->description != null) ? $blog->description : '--' !!}</td>
                                 <td>{{ ($blog->is_active == 1) ? 'Active' : 'Non Active' }}</td>
                                 <td>
                                     <div class="btn-group">
                                         <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Actions </button>
                                         <ul class="dropdown-menu dropdown-block text-start">
                                             <li><a class="dropdown-item" href="{{ route('blogs.edit', $blog->id) }}" title=""><i class="fa fa-pencil"></i> Edit</a></li>
                                             <li><a class="dropdown-item" href="{{ route('blogs.suspend', $blog->id) }}" title=""><i class="fa fa-pencil"></i> {{ ($blog->is_active == 1) ? 'Suspend' : 'Active' }}</a></li>
                                             <li>
                                                 <form action="{{ route('blogs.destroy', $blog->id) }}" class="d-inline" method="POST">
                                                     @method('DELETE')
                                                     @csrf
                                                     <button class="dropdown-item">
                                                         <i class="fa fa-trash"></i> Delete
                                                     </button>
                                                 </form>
                                                 <!-- <a class="dropdown-item" href="#">What are you doing?</a></li-->
                                         </ul>
                                     </div>

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
 @endsection

 @section('script')
 @endsection