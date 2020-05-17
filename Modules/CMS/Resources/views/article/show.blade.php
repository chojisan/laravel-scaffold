@extends('layouts.backend')

@section('content')
<dashboard-navbar></dashboard-navbar>
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">{{ __('Articles') }}</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">{{ __('CMS') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ __('Articles') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Show Article') }}</li>
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
              <h3 class="mb-0">{{ __('Show Article') }}</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="form-group row">
                  <label for="title" class="col-md-2 col-form-label form-control-label">Title</label>
                  <div class="col-md-10">
                    <p>{{ $article->title }}</p>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="slug" class="col-md-2 col-form-label form-control-label">Slug</label>
                    <div class="col-md-10">
                      <p>{{ $article->slug }}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="featured" class="col-md-2 col-form-label form-control-label">Featured Article</label>
                    <div class="col-md-10">
                        <label class="custom-toggle custom-toggle-success">
                            <input type="checkbox" name="featured" id="featured" value="1" @if($article->featured == 1) checked @endif disabled>
                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                          </label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="category_id" class="col-md-2 col-form-label form-control-label">Category</label>
                    <div class="col-md-10">
                        <p>{{ $article->category->name }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="short_description" class="col-md-2 col-form-label form-control-label">Short Description</label>
                    <div class="col-md-10">
                      <p>{{ $article->short_description }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label form-control-label">Description</label>
                    <div class="col-md-10">
                        <p>{{ $article->description }}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tags" class="col-md-2 col-form-label form-control-label">Tags</label>
                    <div class="col-md-10">
                        <ol>
                        @forelse($article->tags as $tag)
                            <li>{{ $tag->name }}</li>
                            @empty
                        @endforelse
                        </ol>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="cover_image" class="col-md-2 col-form-label form-control-label">Image</label>
                    <div class="col-md-10">
                        <img src="{{ $article->cover_image }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="order" class="col-md-2 col-form-label form-control-label">Order</label>
                    <div class="col-md-10">
                        <p>{{ $article->order }}</p>
                    </div>
                  </div>
                <div class="form-group row">
                  <label for="status" class="col-md-2 col-form-label form-control-label">Status</label>
                  <div class="col-md-10">
                    <p>{{ ucfirst($article->status) }}</p>
                  </div>
                </div>
                <a type="button" href="{{ route('articles.index') }}" class="btn btn-primary">Back Article List</a>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script defer>
    $('document').ready(function () {

        $('#title').change(function() {
            console.log($(this).val())
            var slug = slugify($(this).val());
            console.log(slug)
            $('#slug').val(slug);
        });

        function slugify(text)
        {
            return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');            // Trim - from end of text
        }
    });
</script>
@endpush
