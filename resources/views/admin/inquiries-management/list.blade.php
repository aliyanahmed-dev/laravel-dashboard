 @extends('admin.layouts.simple.master')
 @section('title', 'Inquiries')

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
 <h3>All Inquiries</h3>
 @endsection

 @section('breadcrumb-items')
 <li class="breadcrumb-item">Dashboard</li>
 <li class="breadcrumb-item active">Inquiries</li>
 @endsection

 @section('content')
 <div class="container-fluid">
     <div class="row">
         <div class="col-sm-12">
             <div class="card">
                 <div class="card-header align-items-center card-header d-flex justify-content-between">
                     <h5>Inquiries</h5>
                    
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
                                 <th scope="col">Name</th>
                                 <th scope="col">Email</th>
                                 <th scope="col">Phone</th>
                                 <th scope="col">Subject</th>
                                 <th scope="col">Message</th>
                                  <th scope="col">Date</th>
                                 <th scope="col">Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($inquiries as $key => $inquiry)
                             <tr>
                                 <td>{{ $key}}</td>
                                
                                 <td>{{ ($inquiry->name) ?? '--' }}</td>
                                 <td>{{ ($inquiry->email) ?? '--' }}</td>
                                 <td>{{ ($inquiry->phone) ?? '--' }}</td>
                                 <td>{{ ($inquiry->subject) ?? '--' }}</td>
                                 <td>{{ ($inquiry->message) ?? '--' }}</td>
                                 <td>{{ ($inquiry->created_at) ?? '--' }}</td>
                                
                                 <td>
                                     <div class="btn-group">
                                         <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Actions </button>
                                         <ul class="dropdown-menu dropdown-block text-start">
                                             <!--<li><a class="dropdown-item" href="" title=""><i class="fa fa-pencil"></i> Edit</a></li>-->
                                            
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