@extends('layouts.backend')

@section('content')
<dashboard-navbar></dashboard-navbar>
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">{{ __('Tags') }}</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">{{ __('CMS') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ __('Tags') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Preview Tag') }}</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
          <!-- HTML5 inputs -->
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">{{ __('Preview Tag') }}</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="form-group row">
                  <label for="name" class="col-md-2 col-form-label form-control-label">Name</label>
                  <div class="col-md-10">
                    <p>{{ $tag->name }}</p>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="published" class="col-md-2 col-form-label form-control-label">Published</label>
                  <div class="col-md-10">
                      <p>{{ $publish = $tag->published == 1 ? 'Published' : 'Unpublish' }}</p>
                  </div>
                </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
