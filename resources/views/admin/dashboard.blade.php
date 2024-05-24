@extends('admin.body')
@section('konten')


                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning {{session('nama_lengkap')}} </h3>
                        <!-- <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div> -->
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-end">
                            {{-- <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                                <option selected>Aug 23</option>
                                <option value="1">July 23</option>
                                <option value="2">Jun 23</option>
                            </select> --}}
                        </div>
                    </div>
                </div>


                <!-- card -->

                <div class="row mt-4">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium"></h2>
                                            <span
                                                class="badge bg-primary font-12 text-white font-weight-medium rounded-pill ms-2 d-lg-block d-md-none">+18.33%</span>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Data Akun
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h2 class="text-dark mb-1 font-weight-medium"></h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Kandidat</h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium"></h2>
                                            <span
                                                class="badge bg-success font-12 text-white font-weight-medium rounded-pill ms-2 d-md-none d-lg-block">-18.33%</span>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Vote
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                   
                                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"></h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Belum Vote                                            
                                        </h6>

                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="user-x"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Rata - Rata Voting</h4>
                <div id="campaign-v2" class="mt-2" style="height: 283px; width: 100%;"></div>
                <ul class="list-style-none mb-3 mt-4">
                   
                        <li>
                            <i class="fas fa-circle text-primary font-10 me-2"></i>
                            <span class="text-dark"></span>
                            <span class="text-dark float-end font-weight-medium"></span>
                        </li>

                </ul>
            </div>
        </div>
    </div>



</div>



<div class="col-lg-12 col-md-12">
                                <div class="card">
                                <div class="card-body">
                                <h2 class="card-title">Data Akun Belum Vote</h2>
                                <br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                        <thead class="bg-dark text-white">
                                            <tr>
                                            <th scope="col">Nis/Nip</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <tr>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>






{{-- <link rel="stylesheet" href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 
    <!--This page plugins -->
    <script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <script src="../assets/dist/js/pages/datatable/datatable-basic.init.js"></script> --}}

    @endsection
