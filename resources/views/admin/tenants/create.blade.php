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
            </div>

                <section class="section">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Tenant Details</h5>

                        <form action="{{route('admin.tenants.store')}}" method="post"  enctype="multipart/form-data">
                            @csrf
                        <!-- Horizontal Form -->
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="tenant_name" class="form-label">Name</label>
                                <input type="text" name="tenant_name" id="tenant_name"
                                    value="{{old('tenant_name')}}"
                                    class="form-control @error('tenant_name') is-invalid @enderror">
                                    @error('tenant_name')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="tenant_contact" class="form-label">Contact Number</label>
                                <input type="number" name="tenant_contact" id="tenant_contact"
                                    value="{{old('tenant_contact')}}"
                                    class="form-control @error('tenant_contact') is-invalid @enderror">
                                    @error('tenant_contact')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="tenant_email" class="col-sm-2 col-form-label">Email</label>
                                <input type="email" name="tenant_email" id="tenant_email"
                                    value="{{old('tenant_email')}}"
                                    class="form-control @error('tenant_email') is-invalid @enderror">
                                    @error('tenant_email')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="col-sm-2 col-form-label">Marital Status</label>
                                <div class="col-sm-12">
                                    <select class="form-select" aria-label="Select" name="tenant_marital_status" id="tenant_marital_status">
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Annulled">Annulled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="tenant_birth_date" class="form-label">Birth Date</label>
                                <input type="date" name="tenant_birth_date" id="tenant_birth_date"
                                    value="{{old('tenant_birth_date')}}"
                                    class="form-control @error('tenant_birth_date') is-invalid @enderror">
                                    @error('tenant_birth_date')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="tenant_address" class="form-label">Address</label>
                                <input type="text" name="tenant_address" id="tenant_address"
                                    value="{{old('tenant_address')}}"
                                    class="form-control @error('tenant_address') is-invalid @enderror">
                                    @error('tenant_address')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="tenant_employer" class="form-label">Employer</label>
                                <input type="text" name="tenant_employer" id="tenant_employer"
                                    value="{{old('tenant_employer')}}"
                                    class="form-control @error('tenant_employer') is-invalid @enderror">
                                    @error('tenant_employer')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="tenant_emergency_contact" class="form-label">Emergency Contact</label>
                                <input type="text" name="tenant_emergency_contact" id="tenant_emergency_contact"
                                    value="{{old('tenant_emergency_contact')}}"
                                    class="form-control @error('tenant_emergency_contact') is-invalid @enderror">
                                    @error('tenant_emergency_contact')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="tenant_facebook_link" class="form-label">Facebook URL</label>
                                <input type="url" name="tenant_facebook_link" id="tenant_facebook_link"
                                    value="{{old('tenant_facebook_link')}}"
                                    class="form-control @error('tenant_facebook_link') is-invalid @enderror">
                                    @error('tenant_facebook_link')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tenant_image" class="form-label">Image</label>
                                <input type="file" name="tenant_image" id="tenant_image" accept="image/*" onchange="previewImage(event)"
                                    class="form-control @error('tenant_image') is-invalid @enderror">
                                    @error('tenant_image')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <img id="imagePreview" class="image-preview" src="" alt="Image Preview">
                            </div>

                            <div class="mb-2">
                                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image" onclick="clearImage()" id="btn_remove_preview" hidden><i class="bi bi-trash"></i></a> 
                            </div>


                        </div>

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
                                    <select class="form-select @error('tenant_room_id') is-invalid @enderror" aria-label="Select" name="tenant_room_id" id="tenant_room_id" onChange="updateRate()">
                                        <option value="" disabled selected>Select Room</option>
                                        @foreach($roomData as $room)
                                            <option value="{{ $room->id }}" {{ old('tenant_room_id') == $room->id ? 'selected' : '' }}>
                                                {{ $room->room_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tenant_room_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
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
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="tenant_note" id="tenant_note"   
                                            placeholder="Note" style="height: 100px;"
                                            class="form-control @error('tenant_note') is-invalid @enderror" 
                                            value="{{old('tenant_note')}}"></textarea>
                                        <label for="tenant_note"></label>
                                        @error('tenant_note')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    </div>

                    </div>

                    <div class="text-center">
                            <button class="btn btn-primary"> Submit </button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>                  
                    </form>

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
            
            if (selectedRoom) {
                document.getElementById('tenant_room_rate').value = selectedRoom.room_rate;
            } else {
                document.getElementById('tenant_room_rate').value = '';
            }
        }

    </script>

@endsection