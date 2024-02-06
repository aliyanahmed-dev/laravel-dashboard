@extends('admin.layouts.simple.master')

@section('title', 'Default')

@section('css')

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Service</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Service</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row second-chart-list third-news-update">
        <div class="col-xl-8 xl-100 dashboard-sec box-col-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ isset($service) ? "Edit Service" : "Add Service" }}</h5>
                </div>
                <form class="form theme-form bold-labels" action="{{ isset($service) ? route('services.update', $service->id) : route('services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                            <strong>Updates ! </strong> {{ Session::get('message') }}.
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                        </div>
                        @endif
                        @if(isset($service))
                        @method('PUT')
                        @else
                        @endif

                        <div class="row">
                            <div class="col">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Name (en)</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" required name="name[en]" value="{{ (isset($service)) && ($service->getTranslations('name')['en']) ? $service->getTranslations('name')['en'] : ''}}" placeholder="Service Name" data-bs-original-title="" title="">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Name (ar)</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" required name="name[ar]" value="{{ (isset($service)) && ($service->getTranslations('name')['ar']) ? $service->getTranslations('name')['ar'] : ''}}" placeholder="Service Name" data-bs-original-title="" title="">
                                    </div>
                                </div>
                                @if($services->count())
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Parent</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="parent">
                                            <option selected value>None</option>
                                            @foreach($services as $ser)
                                            <option value="{{ $ser->id }}" {{ isset($service) && $ser->id == $service->parent ? 'selected' : '' }}>{{ $ser->getTranslations('name')['en'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Icon</label>
                                    <div class="col-sm-9">
                                        <label class="instruction_label">Service image (360 width)</label><br>
                                        <input class="form-control" name="icon" type="file" />
                                        @if((isset($service)) && ($service->hasMedia('icons')))
                                        <img src="{{ $service->getFirstMediaUrl('icons') }}" width="200" />
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Description (en)</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="5" required cols="5" name="description[en]" placeholder="Description">{{ (isset($service)) && ($service->getTranslations('description')['en']) ? $service->getTranslations('description')['en'] : ''}}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Description (ar)</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="5" required cols="5" name="description[ar]" placeholder="Description">{{ (isset($service)) && ($service->getTranslations('description')['ar']) ? $service->getTranslations('description')['ar'] : ''}}</textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Price</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" required name="price" value="{{ (isset($service)) && ($service->price) ? $service->price : ''}}" placeholder="Service Price" data-bs-original-title="" title="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="col-sm-9 offset-sm-3">
                            <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">{{ isset($service) ? "Update Service" : "Add Service" }}</button>
                            <a href="{{ route('services.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    var session_layout = '{{ session()->get('
    layout ') }}';
</script>
@endsection

@section('script')

@endsection