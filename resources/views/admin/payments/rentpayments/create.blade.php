@extends('admin.layouts.app')

@section('title')
    Add Room
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3">
                @include('admin.layouts.sidebar')
            </div>

            <!-- Main Content Column -->
            <div>
                <main id="main" class="main">
                    <div class="pagetitle">
                        <h1>Add Rent Payment</h1>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.tenants.index') }}">Manage Payments</a>
                                </li>
                                <li class="breadcrumb-item">Tenants</li>
                                <li class="breadcrumb-item active">Add Rent Payment</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="row">
                        <!-- Tenant Info Box -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                    <img src="{{asset($tenant->tenant_image ? $tenant->tenant_image : 'storage/images/default.png') }}" 
                                            alt="Profile" 
                                            class="rounded-circle img-thumbnail w-25 h-auto">
                                            <p class="fw-bold fs-5 mb-1">{{$tenant->tenant_name}}</p>
                                            
                                            <p class="text-muted fs-6 mb-0">{{$tenant->room->room_name}}</p>
                                            
                                        <div class="social-links mt-2">
                                        <a href="{{$tenant->tenant_facebook_link}}" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Rent Payment Form -->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Add Rent Payment Details</h5>
                                    <form class="row g-3" action="{{route('admin.rentpayments.store')}}" method="post"  enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="tenant_id" id="tenant_id" value="{{$tenant->id}}" hidden>
                                        <input type="text" name="tenant_room_id" id="tenant_room_id" value="{{$tenant->room->id}}" hidden>
                                        <div class="col-md-6">
                                            <label for="payment_date" class="form-label">Payment Date</label>
                                            <input type="date" name="payment_date" id="payment_date" 
                                                value="{{old('payment_date')}}"
                                                class="form-control @error('payment_date') is-invalid @enderror" required>
                                                @error('payment_date')
                                                <span class="invalid-feedback">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="payment_amount" class="form-label">Amount</label>
                                            <input type="number" name="payment_amount" id="payment_amount" 
                                                value="{{$tenant->room->room_rate}}" 
                                                class="form-control @error('payment_amount') is-invalid @enderror" required>
                                                @error('payment_amount')
                                                    <span class="invalid-feedback">
                                                        {{$message}}
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="payment_billing_period_start" class="form-label">Period Start (Month - Year)</label>
                                            <input type="month" name="payment_billing_period_start" id="payment_billing_period_start" 
                                                class="form-control @error('payment_billing_period_start') is-invalid @enderror" readonly required>
                                                @error('payment_billing_period_start')
                                                    <span class="invalid-feedback">
                                                        {{$message}}
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="payment_billing_period_end" class="form-label">Period End (Month - Year)</label>
                                            <input type="month" name="payment_billing_period_end" id="payment_billing_period_end"  onchange="setBillingPeriodStart()" 
                                                class="form-control @error('payment_billing_period_end') is-invalid @enderror" required>
                                                @error('payment_billing_period_end')
                                                    <span class="invalid-feedback">
                                                        {{$message}}
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="payment_type" class="form-label">Payment Type</label>
                                            <select class="form-select" id="payment_type" name="payment_type" onchange="toggleFields()" required>
                                                <option value="Cash" selected>Cash</option>
                                                <option value="GCash">GCash</option>
                                                <option value="Maya">Maya</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="payment_reference_number" class="form-label">Reference Number</label>
                                            <input type="text" name="payment_reference_number" id="payment_reference_number" 
                                                value="{{old('payment_reference_number')}}"
                                                class="form-control @error('payment_reference_number') is-invalid @enderror" disabled>
                                                @error('payment_reference_number')
                                                    <span class="invalid-feedback">
                                                        {{$message}}
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="payment_receipt_url" class="form-label">Image</label>
                                            <input type="file" name="payment_receipt_url" id="payment_receipt_url" accept="image/*"
                                                class="form-control @error('payment_receipt_url') is-invalid @enderror" disabled>
                                                @error('payment_receipt_url')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="payment_status" class="form-label">Status</label>
                                            <select class="form-select" id="payment_status" name="payment_status">
                                                <option value="Pending" selected>Pending</option>
                                                <option value="Paid">Paid</option>
                                                <option value="Overdue">Overdue</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="payment_due_date" class="form-label">Due Date   
                                            <span class="text-secondary" style="font-size: 0.9rem;">{{ $tenant->tenant_note }}</span>
                                            </label>
                                            <input type="date" name="payment_due_date" id="payment_due_date" disabled
                                                value="{{old('payment_due_date')}}"
                                                class="form-control @error('payment_due_date') is-invalid @enderror" required>
                                                @error('payment_due_date')
                                                    <span class="invalid-feedback">
                                                        {{$message}}
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="payment_collected_by_id" class="form-label">Collected By</label>
                                            <select class="form-select" id="payment_collected_by_id" required>
                                                <option value="1" selected>Kenneth Delfino</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="payment_note" class="form-label">Note</label>
                                            <textarea id="payment_note"
                                                class="form-control @error('payment_note') is-invalid @enderror"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-center mt-3">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="reset" class="btn btn-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End Multi Columns Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </main><!-- End #main -->
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const paymentDate = document.getElementById('payment_date');
        if (paymentDate) {
            paymentDate.value = new Date().toISOString().split('T')[0];
        }

        const billingPeriodEndInput = document.getElementById('payment_billing_period_end');
        const dueDateInput = document.getElementById('payment_due_date');

        // Ensure Payment Due Date is set to the first day of the selected Billing Period End month
        billingPeriodEndInput.addEventListener('input', () => {
        const billingPeriodEnd = billingPeriodEndInput.value;

        if (billingPeriodEnd) {
          // Convert MM-YYYY to YYYY-MM-01 format for the due date
        dueDateInput.value = `${billingPeriodEnd}-01`;
        dueDateInput.disabled = false;
        } else {
        dueDateInput.value = '';
        dueDateInput.disabled = true;
        }
    });

      // Restrict due date picker to the specific month of the billing period end
        dueDateInput.addEventListener('focus', () => {
        const billingPeriodEnd = billingPeriodEndInput.value;
        if (billingPeriodEnd) {
            const [year, month] = billingPeriodEnd.split('-');
            const startDate = new Date(year, month - 1, 1);
            const endDate = new Date(year, month, 0); // Last day of the month

            dueDateInput.min = startDate.toISOString().split('T')[0];
            dueDateInput.max = endDate.toISOString().split('T')[0];
        }
    });

    });

    function setBillingPeriodStart() {
        const endDate = document.getElementById('payment_billing_period_end').value;
        const startDate = document.getElementById('payment_billing_period_start');

        if (endDate) {
            // Convert the end date to a Date object
            let date = new Date(endDate + '-01');
            date.setMonth(date.getMonth() - 1); // Subtract one month

            // Format back to YYYY-MM format
            const formattedDate = date.toISOString().slice(0, 7);

            // Set the value to start date
            startDate.value = formattedDate;
        }
    }

    function toggleFields() {
        const paymentType = document.getElementById('payment_type').value;
        const referenceNumber = document.getElementById('payment_reference_number');
        const receiptUrl = document.getElementById('payment_receipt_url');

        if (paymentType != 'Cash') {
            // Clear value and disable if "Cash" is selected
            referenceNumber.value = '';
            referenceNumber.disabled = false;
            receiptUrl.disabled = false;
        } else {
            // Enable fields for other payment types
            referenceNumber.disabled = true;
            receiptUrl.disabled = true;
        }
    }
</script>
