@extends('admin.layouts.app')

@section('title')
    Add Room
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.sidebar')

            <main id="main" class="main">

                <div class="pagetitle">
                <h1>Add Room</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.rooms.index')}}">Manage Rooms</a></li>
                            <li class="breadcrumb-item active">Add Room</li>
                        </ol>
                    </nav>
                </div><!-- End Page Title -->


                <section class="section">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">

                                <h5 class="card-title">Room Detail</h5>

                                <form action="{{route('admin.rooms.store')}}" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Room Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="room_name" id="room_name"
                                                placeholder="Name"
                                                value="{{old('room_name')}}"
                                                class="form-control @error('room_name') is-invalid @enderror">
                                        </div>
                                        @error('room_name')
                                                <span class="invalid-feedback">
                                                    {{$message}}
                                                </span>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Room Rate</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="room_rate" id="room_rate"
                                            placeholder="Rate"
                                                value="{{old('room_rate')}}"
                                                class="form-control @error('room_rate') is-invalid @enderror">
                                        </div>
                                        @error('room_rate')
                                                <span class="invalid-feedback">
                                                    {{$message}}
                                                </span>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button class="btn btn-primary"> Add </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            



            </main><!-- End #main -->
          
        </div>
    </div>
@endsection