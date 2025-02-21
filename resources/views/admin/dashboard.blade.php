@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.sidebar')
        </div>
        <main id="main" class="main">

        <div class="pagetitle">
        <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Tenants Active Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">


                <div class="card-body">
                  <h5 class="card-title"> Tenants <span>| Active </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>145</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- Tenants Active Card -->

          <!-- Rooms Occupied Card -->
          <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title"> Rooms <span>| Occupied </span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-door-closed"></i>
                </div>
                <div class="ps-3">
                  <h6>50</h6>
                </div>
              </div>
            </div>
          </div>

          </div><!-- Rooms Occupied Card -->

            <!-- Rent Collected Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Rent Collected <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>P3,264.00</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- Rent Collected Card -->

          <!-- Overdue Payments Card -->
          <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title"> Overdue Payments <span>| Total </span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-cash-stack"></i>

                </div>
                <div class="ps-3">
                  <h6>50</h6>
                </div>
              </div>
            </div>
          </div>

          </div><!-- Overdue Payments Card -->


            <!-- Rooms Available Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Rooms <span>| Available </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-door-closed"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- Rooms Available Card -->

            <!-- Electric Bill Collected Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Electric Bill Collected <span>| This month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>P1,244.00</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- Electric Bill Collected Card -->


            <!-- Recent Rent Collected -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent Rent Collected </h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tenant</th>
                        <th scope="col">Previous Month</th>
                        <th scope="col">Current Month</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>Brandon Jacob</td>
                        <td>January 01, 2025</td>
                        <td>February 01, 2025</td>
                        <td>P2,500.00</td>
                        <td><span class="badge bg-success">Paid</span></td>
                      </tr>
                      <tr>
                      <th scope="row"><a href="#">#2457</a></th>
                        <td>Brandon Jacob</td>
                        <td>January 01, 2025</td>
                        <td>February 01, 2025</td>
                        <td>P2,500.00</td>
                        <td><span class="badge bg-success">Paid</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>Brandon Jacob</td>
                        <td>January 01, 2025</td>
                        <td>February 01, 2025</td>
                        <td>P2,500.00</td>
                        <td><span class="badge bg-success">Paid</span></td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- Recent Rent Collected -->



            <!-- Recent Electric Bill Collected -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent Electric Bill Collected </h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tenant</th>
                        <th scope="col">Previous Month</th>
                        <th scope="col">Current Month</th>
                        <th scope="col">Prev-Current KWH</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>Brandon Jacob</td>
                        <td>January 01, 2025</td>
                        <td>February 01, 2025</td>
                        <td> 56-77KWH </td>
                        <td> P75.00 </td>
                        <td><span class="badge bg-success">Paid</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>Brandon Jacob</td>
                        <td>January 01, 2025</td>
                        <td>February 01, 2025</td>
                        <td> 56-77KWH </td>
                        <td> P75.00 </td>
                        <td><span class="badge bg-success">Paid</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>Brandon Jacob</td>
                        <td>January 01, 2025</td>
                        <td>February 01, 2025</td>
                        <td> 56-77KWH </td>
                        <td> P75.00 </td>
                        <td><span class="badge bg-success">Paid</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>Brandon Jacob</td>
                        <td>January 01, 2025</td>
                        <td>February 01, 2025</td>
                        <td> 56-77KWH </td>
                        <td> P75.00 </td>
                        <td><span class="badge bg-success">Paid</span></td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- Recent Electric Bill Collected -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Overdue Rent Payments -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title"> Overdue Rent Payments <span>| Today</span></h5>

                <div class="activity">
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Tenant</th>
                        <th scope="col">Room</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Days Ago</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Test Name</th>
                        <td>Room - 1</td>
                        <td>P2,500.00</a></td>
                        <td>8</td>
                      </tr>
                      <tr>
                        <th scope="row">Test Name</th>
                        <td>Room - 2</td>
                        <td>P2,500.00</td>
                        <td>5</td>
                      </tr>
                      <tr>
                        <th scope="row">Test Name</th>
                        <td>Room - 3</td>
                        <td>P2,500.00</td>
                        <td>2</td>
                      </tr>
                      <tr>
                        <th scope="row">Test Name</th>
                        <td>Room - 4</td>
                        <td>P2,500.00</td>
                        <td>1</td>
                      </tr>
                      <tr>
                        <th scope="row">Test Name</th>
                        <td>Room - 5</td>
                        <td>P2,500.00</td>
                        <td>2</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

            </div>
          </div><!-- Overdue Rent Payments -->

          <!-- Overdue Electric Bill Payments -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title"> Overdue Electric Bill Payments <span>| Today </span></h5>
              <div class="activity">
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Tenant</th>
                        <th scope="col">Room</th>
                        <th scope="col">Prev KWH</th>
                        <th scope="col">Days Ago</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Test Name</th>
                        <td>Room - 1</td>
                        <td>45KWH</td>
                        <td>8</td>
                      </tr>
                      <tr>
                        <th scope="row">Test Name</th>
                        <td>Room - 2</td>
                        <td>60KWH</td>
                        <td>5</td>
                      </tr>
                      <tr>
                        <th scope="row">Test Name</th>
                        <td>Room - 3</td>
                        <td>65KWH</td>
                        <td>2</td>
                      </tr>
                      <tr>
                        <th scope="row">Test Name</th>
                        <td>Room - 4</td>
                        <td>77KWH</td>
                        <td>1</td>
                      </tr>
                      <tr>
                        <th scope="row">Test Name</th>
                        <td>Room - 5</td>
                        <td>32KWH</td>
                        <td>2</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
          </div><!-- Overdue Electric Bill Payments -->



        

        </div><!-- End Right side columns -->

      </div>
    </section>
    
    </main>
    </div>
@endsection