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
                    <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="tooltip" data-original-title="Edit product">
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
                                <a href="{{ route('permissions.show', $permission->id) }}" class="table-action" data-toggle="tooltip" data-original-title="Show permission">
                                    <i class="fas fa-file"></i>
                                </a>
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="table-action" data-toggle="tooltip" data-original-title="Edit permission">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <a href="#" class="table-action table-action-delete delete-confirm" data-toggle="tooltip" data-original-title="Delete permission">
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
              <form method="POST" action="" id="delete-form">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script defer async>
$('document').ready(function () {
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('data-href');
        swal.fire({
            title: 'Are you sure?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                let form = $('#delete-form')

                form.attr('action', url);
                form.submit();
            }
        });
    });
});
</script>
@endpush

