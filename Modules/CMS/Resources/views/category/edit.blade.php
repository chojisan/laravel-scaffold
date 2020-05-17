@extends('layouts.backend')

@section('content')
<dashboard-navbar></dashboard-navbar>
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">{{ __('Categories') }}</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">{{ __('CMS') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ __('Categories') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Update Category') }}</li>
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
              <h3 class="mb-0">{{ __('Update Category') }}</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <form method="POST" action="{{ route('categories.update', $category->id) }}">
                @method('PUT')
                @csrf
                <div class="form-group row">
                  <label for="name" class="col-md-2 col-form-label form-control-label">Name</label>
                  <div class="col-md-10">
                    <input class="form-control" type="text" id="name" name="name" value="{{ $category->name }}">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="slug" class="col-md-2 col-form-label form-control-label">Slug</label>
                    <div class="col-md-10">
                      <input class="form-control" type="text" id="slug" name="slug" value="{{ $category->slug }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="parent_id" class="col-md-2 col-form-label form-control-label">Parent Category</label>
                    <div class="col-md-10">
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value="0">root</option>
                            @forelse($categories as $cat)
                                @if($category->prent_id == $cat->id)
                                    <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                                @else
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endif

                                @empty
                            @endforelse
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="order" class="col-md-2 col-form-label form-control-label">Order</label>
                    <div class="col-md-10">
                        <select class="form-control" id="order" name="order">
                            @for($i = 1; $i <= count($categories); $i++)
                                @if($category->order == $i)
                                    <option selected>{{ $i }}</option>
                                @else
                                    <option>{{ $i }}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                  </div>
                <div class="form-group row">
                  <label for="published" class="col-md-2 col-form-label form-control-label">Published</label>
                  <div class="col-md-10">
                    <select class="form-control" id="published" name="published">
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
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

        $('#name').change(function() {
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
