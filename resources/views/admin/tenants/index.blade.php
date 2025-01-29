@extends('admin.layouts.app')

@section('title')
    Manage Tenants
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.sidebar')
        </div>

        <main id="main" class="main">

        <div class="pagetitle">
          <h1>Manage Tenants</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item active"><a href="{{route('admin.tenants.index')}}">Manage Tenants</a></li>
            </ol>
          </nav>
        </div><!-- End Page Title -->

        <section class="section">
          <div class="row">
            <div class="col-lg-12">
            
            <div class="d-flex justify-content-end mb-2">
              <a href="{{ route('admin.tenants.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i>
              </a>


            </div>

              <div class="card">
                <br>
                <div class="card-body">
                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th> <b>Name</b> </th>
                        <th>Room</th>
                        <th> </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($tenants as $tenant)
                      <tr>
                        <td>
                          @if($tenant->tenant_image)
                          <img src="{{ asset($tenant->tenant_image) }}" style="width: 80px; height: 80px;   border-radius: 50%;">
                          @else
                          <img src="{{ asset('storage/images/user.png') }}" alt="test" style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%;">
                          @endif
                        </td>
                        <td>{{$tenant->tenant_name}}</td>
                        <td> {{ $tenant->room ? $tenant->room->room_name : 'No Room Assigned' }}</td>
                        <td>
                          <a href="{{route('admin.tenants.edit', $tenant)}}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                          </a>
                          <a onclick="deleteItem({{$tenant->id}})" href="#" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                          </a>
                          <form id="{{1}}" action="{{route('admin.tenants.destroy', $tenant)}}" method="post">
                            @csrf
                            @method('DELETE')
                          </form>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <!-- End Table with stripped rows -->

                </div>
              </div>

            </div>
          </div>
        </section>

</main><!-- End #main -->

    </div>
@endsection