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
                <h1>Add Tenant</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.tenants.index')}}">Manage Tenants</a></li>
                            <li class="breadcrumb-item active">Add Tenant</li>
                        </ol>
                    </nav>
                </div><!-- End Page Title -->

                <section class="section">
                <div class="row">
                    <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Tenant Details</h5>

                        <!-- Horizontal Form -->
                        <form class="row g-3">
                            <div class="col-md-12">
                            <label for="tenant_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="tenant_name">
                            </div>

                            <div class="col-md-12">
                            <label for="tenant_contact" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="tenant_contact">
                            </div>

                            <div class="col-md-12">
                            <label for="tenant_email" class="col-sm-2 col-form-label">Email</label>
                                <input type="email" class="form-control" id="tenant_email">
                            </div>

                            <div class="col-md-12">
                                <label class="col-sm-2 col-form-label">Marital Status</label>
                                <div class="col-sm-12">
                                    <select class="form-select" aria-label="Select" id="tenant_marital_status">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Annulled">Annulled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                            <label for="tenant_birth_date" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" id="tenant_birth_date">
                            </div>

                            <div class="col-md-12">
                            <label for="tenant_address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="tenant_address">
                            </div>

                            <div class="col-md-12">
                            <label for="tenant_employer" class="form-label">Employer</label>
                            <input type="text" class="form-control" id="tenant_employer">
                            </div>

                            <div class="col-md-12">
                                <label for="tenant_emergency_contact" class="form-label">Emergency Contact</label>
                                <input type="email" class="form-control" id="tenant_emergency_contact">
                            </div>

                            <div class="col-md-12">
                            <label for="tenant_facebook_link" class="form-label">Facebook URL</label>
                            <input type="url" class="form-control" id="tenant_facebook_link">
                            </div>
                            
                            <div class="mb-3">
                                <label for="tenant_image" class="form-label">Image</label>
                                <input class="form-control" type="file" id="tenant_image" name="tenant_image" accept="image/*" onchange="previewImage(event)">
                            </div>
                            <div class="mb-3">
                                <img id="imagePreview" class="image-preview" src="" alt="Image Preview">
                            </div>
                        </form>
                            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image" onclick="clearImage()" id="btn_remove_preview" hidden><i class="bi bi-trash"></i></a>
                        </div>

                        



                        
                    </div>

                    </div>

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">


                            <h5 class="card-title"> Room Info </h5>
                            <div class="col-md-12">
                                <label class="col-sm-2 col-form-label">Room</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" aria-label="Select" id="tenant_room_id" onChange="updateRate()">
                                            <option value="" disabled selected> </option>
                                            
                                            @foreach($roomData as $room)
                                            <option value="{{$room->id}}">{{$room->room_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>

                            <div class="col-md-12">
                            <label for="tenant_room_rate" class="form-label">Rate</label>
                            <input type="text" class="form-control" id="tenant_room_rate" disabled>
                            </div>
                        </div>
                    </div>

                    

                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title"> Note </h5>
                    <!--
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title"> Note </h5>

                            <div class="row mb-5">

                                <div class="col-sm-10">
                                    <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Enable Account</label>
                                    </div>
                                    <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Billing Notification</label>
                                    </div>
                                </div>
                            </div>
                -->


                        <form class="row g-3">
                            <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Note" id="tenant_note" style="height: 100px;"></textarea>
                                <label for="tenant_note"></label>
                            </div>
                            </div>


                        </div>
                    </div>

                            
                    <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>
                </section>

            </main><!-- End #main -->
          
        </div>
    </div>


    <script>

        const output = document.getElementById('imagePreview');

        function previewImage(event) {
            const reader = new FileReader();

            reader.onload = function() {
                output.src = reader.result;
                output.style.display = 'block';
                document.getElementById('btn_remove_preview').hidden = false;
        };
            reader.readAsDataURL(event.target.files[0]);


            console.log(tenant_image);
        }

        function clearImage() {
            document.getElementById('tenant_image').value = null;
            output.src = '';
            output.style.display = 'none';
            document.getElementById('btn_remove_preview').hidden = true;
        }

        //Update Rate Text Box after Selecting a Room
        function updateRate() {
            var roomId = document.getElementById('tenant_room_id').value;
            var rooms = @json($roomData);
            var selectedRoom = rooms.find(room => room.id == roomId);

            console.log('selected room ' + selectedRoom);
            
            if (selectedRoom) {
                document.getElementById('tenant_room_rate').value = selectedRoom.room_rate;
            } else {
                document.getElementById('tenant_room_rate').value = '';
            }
        }

    </script>

@endsection