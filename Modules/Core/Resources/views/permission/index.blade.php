@extends('layouts.backend')

@section('content')
<dashboard-navbar></dashboard-navbar>
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">{{ __('Permissions') }}</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Permissions') }}</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="#" class="btn btn-sm btn-neutral">New</a>
            <a href="#" class="btn btn-sm btn-neutral">Filters</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <div class="row">
                <div class="col-6">
                <h3 class="mb-0">{{ __('Permissions') }}</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="#" class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="tooltip" data-original-title="Edit product">
                        <span class="btn-inner--icon"><i class="fas fa-file"></i></span>
                        <span class="btn-inner--text">Add New</span>
                      </a>
                  <a href="#" class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="tooltip" data-original-title="Edit product">
                    <span class="btn-inner--icon"><i class="fas fa-share-square"></i></span>
                    <span class="btn-inner--text">Export</span>
                  </a>
                </div>
              </div>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($permissions as $permission)
                        <tr>
                            <td>
                            {{ $permission->id }}
                            </td>
                            <td>
                            <b>{{ $permission->name }}</b>
                            </td>
                            <td class="table-actions">
                            <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit product">
                                <i class="fas fa-user-edit"></i>
                            </a>
                            <a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete product">
                                <i class="fas fa-trash"></i>
                            </a>
                            </td>
                        </tr>

                        @empty
                            <tr>
                                <td colspan="3">
                                    <p class="text-center">No categories yet.</p>
                                </td>
                            </tr>
                  @endforelse

                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
