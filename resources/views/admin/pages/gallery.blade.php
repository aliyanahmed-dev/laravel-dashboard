@extends('admin.layouts.simple.master')

@section('title', 'Default')

@section('css')

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>gallery</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">gallery</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row second-chart-list third-news-update">
		<div class="col-xl-8 xl-100 dashboard-sec box-col-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ isset($gallery) ? "Edit gallery" : "Add gallery" }}</h5>
            </div>
            <form class="form theme-form bold-labels" action="{{ isset($gallery) ? route('galleries.update', $gallery->id) : route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                        <strong>Updates ! </strong> {{ Session::get('message') }}.
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                    </div>
                @endif
                @if(isset($gallery))
                    @method('PUT')
                @else
                @endif
                
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Name (en)</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" required name="name[en]" value="{{ isset($gallery) && $gallery->getTranslations('name')['en'] ? $gallery->getTranslations('name')['en'] : ''}}"placeholder="gallery Name" data-bs-original-title="" title="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Name (ar)</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" required name="name[ar]" value="{{ isset($gallery) && $gallery->getTranslations('name')['ar'] ? $gallery->getTranslations('name')['ar'] : ''}}"placeholder="gallery Name" data-bs-original-title="" title="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Gallery Image</label>
                                <div class="col-sm-9">
                                    <label class="instruction_label">Gallery image (316*200)</label><br>
                                    <input class="form-control" name="gallery_image" type="file"/>
                                    @if((isset($gallery)) && ($gallery->hasMedia('gallery_image')))
										<img src="{{ $gallery->getFirstMediaUrl('gallery_image') }}" width="200" />
									@endif

                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Description (en)</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="5" required cols="5" name="description[en]" placeholder="Description">{{ isset($gallery) && $gallery->getTranslations('description')['en'] ? $gallery->getTranslations('description')['en'] : ''}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Description (ar)</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="5" required cols="5" name="description[ar]" placeholder="Description">{{ isset($gallery) && $gallery->getTranslations('description')['ar'] ? $gallery->getTranslations('description')['ar'] : ''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <div class="col-sm-9 offset-sm-3">
                        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">{{ isset($gallery) ? "Update gallery" : "Add gallery" }}</button>
                        <a href="{{ route('galleries.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
		</div>
		
	</div>
</div>
<script type="text/javascript">
	var session_layout = '{{ session()->get('layout') }}';
</script>
@endsection

@section('script')

@endsection
