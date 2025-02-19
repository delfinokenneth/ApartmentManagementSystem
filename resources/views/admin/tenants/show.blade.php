@extends('admin.layouts.app')

@section('title')
    Edit Room
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.sidebar')
        </div>
        <main id="main" class="main">

        <div class="pagetitle">
        <h1>Tenant Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.tenants.index')}}">Manage Tenant</a></li>
                    <li class="breadcrumb-item active">Tenant Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{ asset($tenant->tenant_image ? $tenant->tenant_image : 'storage/images/default.png') }}" alt="Profile" class="rounded-circle">
              <h2>{{$tenant->tenant_name}}</h2>
              <h3>{{$tenant->room->room_name}}</h3>
              <div class="social-links mt-2">
                <a href="{{$tenant->tenant_facebook_link}}" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Tenant Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Name</div>
                    <div class="col-lg-9 col-md-8">{{$tenant->tenant_name}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contact #</div>
                    <div class="col-lg-9 col-md-8">{{$tenant->tenant_contact}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{$tenant->tenant_email}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Marital Status</div>
                    <div class="col-lg-9 col-md-8">{{$tenant->tenant_marital_status}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Birth Date</div>
                    <div class="col-lg-9 col-md-8">{{$tenant->tenant_birth_date->format('F d, Y')}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">{{$tenant->tenant_address}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Employer</div>
                    <div class="col-lg-9 col-md-8">{{$tenant->tenant_employer}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Emergency #</div>
                    <div class="col-lg-9 col-md-8">{{$tenant->tenant_emergency_contact}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Note </div>
                    <div class="col-lg-9 col-md-8">{{$tenant->tenant_note}}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="{{route('admin.tenants.updateProfile', $tenant)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Tenant Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img id="imagePreview" name="imagePreview" src="{{asset($tenant->tenant_image)}}" alt="Profile" style="max-width: 150px; display: {{ $tenant->tenant_image ? 'block' : 'none' }};">
                        <div class="pt-2">
                          <input type="file" name="tenant_image" id="tenant_image" accept="image/*" onchange="previewImage(event)" class="d-none">
                          <input type="hidden" name="remove_image" id="remove_image" value="0"> 
                          
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image" onclick="document.getElementById('tenant_image').click()"><i class="bi bi-upload"></i></a>
                          <a href="#" id="btn_remove_preview" class="btn btn-danger btn-sm" title="Remove profile image" onclick="clearImage()" style="{{ $tenant->tenant_image ? '' : 'display:none;' }}">
                            <i class="bi bi-trash"></i>
                          </a>

                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Room</label>
                      <div class="col-md-8 col-lg-9">
                          <select class="form-select @error('tenant_room_id') is-invalid @enderror" 
                                  aria-label="Select" 
                                  name="tenant_room_id" 
                                  id="tenant_room_id" 
                                  onChange="updateRate()">
                              <option value="" disabled>Select Room</option>
                              @foreach($roomData as $room)
                                  <option value="{{ $room->id }}" 
                                      {{ (old('tenant_room_id', $tenant->tenant_room_id) == $room->id) ? 'selected' : '' }}>
                                      {{ $room->room_name }}
                                  </option>
                              @endforeach
                          </select>
                          @error('tenant_room_id')
                              <span class="invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="tenant_name" class="col-md-4 col-lg-3 col-form-label">Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="tenant_name" id="tenant_name"
                          placeholder="Name"
                          value="{{ old('tenant_name',$tenant->tenant_name)}}" 
                          class="form-control @error('tenant_name') is-invalid @enderror">
                      </div>
                      @error('tenant_name')
                        <span class="invalid-feedback">
                          {{$message}}
                        </span>
                      @enderror
                    </div>

                    <div class="row mb-3">
                      <label for="tenant_contact" class="col-md-4 col-lg-3 col-form-label">Contact #</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="number" name="tenant_contact" id="tenant_contact"
                          placeholder="Contact Number"
                          value="{{old('tenant_contact',$tenant->tenant_contact)}}"
                          class="form-control @error('tenant_contact') is-invalid @enderror">
                      </div>
                      @error('tenant_contact')
                      <span class="invalid-feedback d-block">
                          {{$message}}
                        </span>
                      @enderror
                    </div>

                    <div class="row mb-3">
                      <label for="tenant_email" class="col-md-4 col-lg-3 col-form-label">Email Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="email" name="tenant_email" id="tenant_email"
                        placeholder="Email" 
                        value="{{old('tenant_email',$tenant->tenant_email)}}"
                        class="form-control @error('tenant_email') is-invalid @enderror">
                      </div>
                      @error('tenant_email')
                      <span class="invalid-feedback d-block">
                          {{$message}}
                        </span>
                      @enderror
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Marital Status</label>
                      <div class="col-md-8 col-lg-9">
                        <select class="form-select" aria-label="Select" name="tenant_marital_status" id="tenant_marital_status">
                          <option value="Single" {{ $tenant->tenant_marital_status == 'Single' ? 'selected' : '' }}>Single</option>
                          <option value="Married" {{ $tenant->tenant_marital_status == 'Married' ? 'selected' : '' }}>Married</option>
                          <option value="Widowed" {{ $tenant->tenant_marital_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                          <option value="Annulled" {{ $tenant->tenant_marital_status == 'Annulled' ? 'selected' : '' }}>Annulled</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="tenant_birth_date" class="col-md-4 col-lg-3 col-form-label">Birth Date</label>
                        <div class="col-md-8 col-lg-9">
                            <div class="col-sm-10">
                            <input type="date" name="tenant_birth_date" id="tenant_birth_date"
                              placeholder="Birth Date"
                              value="{{ old('tenant_birth_date', $tenant->tenant_birth_date->format('Y-m-d')) }}"
                              class="form-control @error('tenant_birth_date') is-invalid @enderror">
                        </div>
                            @error('tenant_birth_date')
                              <span class="invalid-feedback d-block">
                                {{$message}}
                              </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                      <label for="tenant_address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="tenant_address" id="tenant_address"
                          placeholder="Address"
                          value="{{old('tenant_address',$tenant->tenant_address)}}"
                          class="form-control @error('tenant_address') is-invalid @enderror">
                      </div>
                      @error('tenant_address')
                        <span class="invalid-feedback d-block">
                          {{$message}}
                        </span>
                      @enderror
                    </div>

                    <div class="row mb-3">
                      <label for="tenant_employer" class="col-md-4 col-lg-3 col-form-label">Employer</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="tenant_employer" id="tenant_employer"
                          placeholder="Employer"
                          value="{{old('tenant_employer',$tenant->tenant_employer)}}"
                          class="form-control @error('tenant_employer') is-invalid @enderror">
                      </div>
                      @error('tenant_employer')
                        <span class="invalid-feedback d-block">
                          {{$message}}
                        </span>
                      @enderror
                    </div>

                    <div class="row mb-3">
                      <label for="tenant_emergency_contact" class="col-md-4 col-lg-3 col-form-label">Emergency #</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="tenant_emergency_contact" id="tenant_emergency_contact" 
                          placeholder="Emergency Contact"
                          value="{{old('tenant_emergency_contact',$tenant->tenant_emergency_contact)}}"
                          class="form-control @error('tenant_emergency_contact') is-invalid @enderror">
                      </div>
                      @error('tenant_emergency_contact')
                        <span class="invalid-feedback d-block">
                          {{$message}}
                        </span>
                      @enderror
                    </div>

                    <div class="row mb-3">
                      <label for="tenant_facebook_link" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="url" name="tenant_facebook_link" id="tenant_facebook_link" 
                          placeholder="Facebook URL"
                          value="{{old('tenant_facebook_link',$tenant->tenant_facebook_link)}}"
                          class="form-control @error('tenant_facebook_link') is-invalid @enderror">
                      </div>
                      @error('tenant_facebook_link')
                        <span class="invalid-feedback d-block">
                          {{$message}}
                        </span>
                      @enderror
                    </div>

                    <div class="row mb-3">
                      <label for="tenant_note" class="col-md-4 col-lg-3 col-form-label">Note</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea class="form-control @error('tenant_note') is-invalid @enderror"
                          name="tenant_note"
                          id="tenant_note"
                          style="height: 100px;">{{ old('tenant_note', $tenant->tenant_note) }}</textarea>
                      </div>
                      @error('tenant_note')
                        <span class="invalid-feedback d-block">
                          {{$message}}
                        </span>
                      @enderror
                    </div>


                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form action="{{route('admin.tenants.updateSetting', $tenant)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Account & Billing</label>
                    <div class="col-md-8 col-lg-9">
                        <!-- Account Enabled -->
                        <div class="form-check">
                            <input type="hidden" name="tenant_account_enable" value="0"> 
                            <input class="form-check-input" type="checkbox" id="tenant_account_enable" name="tenant_account_enable" value="1"
                                {{ old('tenant_account_enable', $tenant->tenant_account_enable) ? 'checked' : '' }}>
                            <label class="form-check-label" for="tenant_account_enable">
                                Enable Account
                            </label>
                        </div>

                        <!-- Billing Notification -->
                        <div class="form-check">
                            <input type="hidden" name="tenant_account_bill_notif" value="0"> 
                            <input class="form-check-input" type="checkbox" id="tenant_account_bill_notif" name="tenant_account_bill_notif" value="1"
                                {{ old('tenant_account_bill_notif', $tenant->tenant_account_bill_notif) ? 'checked' : '' }}>
                            <label class="form-check-label" for="tenant_account_bill_notif">
                                Billing Notification
                            </label>
                        </div>
                    </div>
                  </div>


                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
    
    </main>
    </div>
@endsection



<script>
  document.addEventListener("DOMContentLoaded", function () {
      // Check if there are validation errors
      let hasErrors = document.querySelector(".is-invalid"); // Adjust this selector based on your validation feedback elements

      if (hasErrors) {
          // If there are errors, stay on the last active tab
          let activeTab = localStorage.getItem("activeTab");
          if (activeTab) {
              let tabElement = document.querySelector(`[data-bs-target="${activeTab}"]`);
              if (tabElement) {
                  new bootstrap.Tab(tabElement).show();
              }
          }
      } else {
          // No errors? Reset to Overview
          new bootstrap.Tab(document.querySelector('[data-bs-target="#profile-overview"]')).show();
          localStorage.removeItem("activeTab"); // Clear saved tab
      }

      // Store the active tab when clicked
      document.querySelectorAll('[data-bs-toggle="tab"]').forEach(tab => {
          tab.addEventListener("click", function () {
              localStorage.setItem("activeTab", this.getAttribute("data-bs-target"));
          });
      });
  });

function previewImage(event) {
    const reader = new FileReader();
    const output = document.getElementById('imagePreview');
    const removeBtn = document.getElementById('btn_remove_preview');

    reader.onload = function() {
        output.src = reader.result;
        output.style.display = 'block';
        removeBtn.style.display = 'inline-block';
        document.getElementById('remove_image').value = "0"; // Reset removal flag
};
    reader.readAsDataURL(event.target.files[0]);
}


function clearImage() {
    document.getElementById('imagePreview').style.display = "none"; // Hide image
    document.getElementById('btn_remove_preview').style.display = "none"; // Hide remove button
    document.getElementById('remove_image').value = "1"; // Set removal flag
    document.getElementById('tenant_image').value = ""; // Clear file input
}


</script>