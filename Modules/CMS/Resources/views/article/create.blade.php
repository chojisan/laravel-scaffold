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
                <li class="breadcrumb-item active" aria-current="page">{{ __('Add New Article') }}</li>
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
              <h3 class="mb-0">{{ __('Add New Article') }}</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                @if($errors)
                    @foreach($errors as $error)
                        {{ $error }}
                    @endforeach
                @endif
              <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                  <label for="title" class="col-md-2 col-form-label form-control-label">Title</label>
                  <div class="col-md-10">
                    <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="slug" class="col-md-2 col-form-label form-control-label">Slug</label>
                    <div class="col-md-10">
                      <input class="form-control" type="text" id="slug" name="slug" value="{{ old('slug') }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="featured" class="col-md-2 col-form-label form-control-label">Featured Article</label>
                    <div class="col-md-10">
                        <label class="custom-toggle custom-toggle-success">
                            <input type="checkbox" name="featured" id="featured" value="1" @if(old('featured') == 1) checked @endif>
                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                          </label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="category_id" class="col-md-2 col-form-label form-control-label">Category</label>
                    <div class="col-md-10">
                        <select class="form-control" id="category_id" name="category_id">
                            @forelse($categories as $cat)
                                <option value="{{ $cat->id }}" @if($cat->id == old('category_id')) selected @endif>{{ $cat->name }}</option>
                                @empty
                            @endforelse
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="short_description" class="col-md-2 col-form-label form-control-label">Short Description</label>
                    <div class="col-md-10">
                      <textarea class="form-control" id="short_description" name="short_description" rows="3" resize="none">{{ old('short_description') }}</textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label form-control-label">Description</label>
                    <div class="col-md-10">
                        <textarea class="form-control" id="short_description" name="description" rows="3" resize="none">{{ old('description') }}</textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tags" class="col-md-2 col-form-label form-control-label">Tags</label>
                    <div class="col-md-10">
                        <select multiple class="form-control" id="tags" name="tags[]">
                            @forelse($tags as $tag)
                                <option value="{{ $tag->id }}" @if(old('tags')) @if(in_array($tag->id, old('tags'))) selected @endif @endif>{{ $tag->name }}</option>
                                @empty
                            @endforelse
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="cover_image" class="col-md-2 col-form-label form-control-label">Image</label>
                    <div class="col-md-10">
                        <div class="custom-file">
                        <input type="file" accept="image/*" class="custom-file-input" id="cover_image" name="cover_image" value="{{ old('cover_image') }}">
                        <label class="custom-file-label" for="cover_image">Select file</label>
                        </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="order" class="col-md-2 col-form-label form-control-label">Order</label>
                    <div class="col-md-10">
                        <select class="form-control" id="order" name="order">
                            @for($i = 1; $i <= $article_count; $i++)
                                <option @if($i == old('order')) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                  </div>
                <div class="form-group row">
                  <label for="status" class="col-md-2 col-form-label form-control-label">Published</label>
                  <div class="col-md-10">
                    <select class="form-control" id="status" name="status">
                        <option value="published" @if(old('status') == 'published') selected @endif>Publish</option>
                        <option value="unpublish" @if(old('status') == 'unpublish') selected @endif>Unpublish</option>
                      </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
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
