@extends('admin.layouts.app')

@section('title')
    Manage Rooms
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.sidebar')
        </div>
       
        <main id="main" class="main">

        <div class="pagetitle">
          <h1>Manage Rooms</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item active"><a href="{{route('admin.rooms.index')}}">Manage Rooms</a></li>
            </ol>
          </nav>
        </div><!-- End Page Title -->

        <section class="section">
          <div class="row">
            <div class="col-lg-12">
            
            <div class="d-flex justify-content-end mb-2">
              <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary">
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
                        <th> <b>Name</b> </th>
                        <th>Room Rate</th>
                        <th> </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($rooms as $room)
                      <tr>
                        <td>{{$room->room_name}}</td>
                        <td>{{$room->room_rate}}</td>
                        <td>
                          <a href="{{route('admin.rooms.edit', $room)}}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a onclick="deleteItem({{$room->id}})" href="#" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                          </a>
                          <form id="{{1}}" action="{{route('admin.rooms.destroy', $room)}}" method="post">
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