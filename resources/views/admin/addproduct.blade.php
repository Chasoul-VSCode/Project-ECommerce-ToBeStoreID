<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ToBeStore.id</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <style>
      .form-control {
          color: #6b6b6b; /* Default text color */
      }
      .form-control:focus {
          color: #cacaca; /* Lighter text color when focused */
      }
      .form-control.textarea-expanded {
            width: 100%; /* Full width */
            height: 200px; /* Adjust height as needed */
        }
        .table-wrapper {
    max-height: 300px; /* Atur ketinggian maksimal sesuai kebutuhan */
    overflow-y: auto; /* Tambahkan scrollbar jika konten lebih panjang dari ketinggian maksimal */
}
  </style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<style>
    /* Theme dark untuk SweetAlert */
    .swal2-popup {
        background-color: #343a40; /* Warna latar belakang modal */
        color: #ffffff; /* Warna teks */
    }

    .swal2-title {
        color: #ffffff; /* Warna judul */
    }

    .swal2-content {
        color: #ffffff; /* Warna isi konten */
    }

    .swal2-actions button {
        background-color: #343a40; /* Warna latar belakang tombol */
        color: #ffffff; /* Warna teks tombol */
    }

    .swal2-close {
        color: #ffffff; /* Warna ikon close */
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
        </div>
      </div>

      {{-- sidebar --}}
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <p class="sidebar-brand brand-logo">ToBeStore.id</p>
          <p class="sidebar-brand brand-logo-mini">TB</p>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="img/tobestore.png" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">ToBe Store ID</h5>
                  <span>Admin</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="/profile" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>

          {{-- Navigation --}}
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/dashboard">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/addproduct">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Manage Product</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/store">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Market Store</span>
            </a>
          </li>
        
          <li class="nav-item menu-items">
            <a class="nav-link" href="/chat">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Messages</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="img/trans-logo.png" alt="logo" /></a>
        </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
                 <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                  <h6 class="p-3 mb-0">Projects</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-file-outline text-primary"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Software Development</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-web text-info"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">UI Development</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-layers text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Software Testing</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all projects</p>
                </div>
              </li>
              <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="#">
                  <i class="mdi mdi-view-grid"></i>
                </a>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email"></i>
                  <span class="count bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                      <p class="text-muted mb-0"> 1 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                      <p class="text-muted mb-0"> 15 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                      <p class="text-muted mb-0"> 18 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">4 new messages</p>
                </div>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-calendar text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Event today</p>
                      <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                      <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-link-variant text-warning"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Launch Admin</p>
                      <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all notifications</p>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="img/tobestore.png" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">ToBe Store ID</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="/profile">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Profile</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="/logout">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                    </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Advanced settings</p>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                  </div>
                </div>
              </div>
            </div>

            {{-- Body Design --}}
            {{-- Header --}}
            <div class="row">
                <div class="col-md-5 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Data Product</h4>
                            <form class="forms-sample" action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="namaBarang">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_b" name="nama_b" placeholder="Nama Barang" required>
                                </div>
                                <div class="form-group">
                                    <label for="stokBarang">Stok Barang</label>
                                    <input type="number" class="form-control" id="stok_b" name="stok_b" placeholder="Stok Barang" required>
                                </div>
                                <div class="form-group">
                                  <label for="hargaBarang">Harga Barang</label>
                                  <input type="text" class="form-control" id="harga_b" name="harga_b" placeholder="Harga Barang" oninput="formatRupiah(this.value, 'harga_b')" required>
                              </div>
                              
                              <script>
                                  function formatRupiah(angka, id) {
                                      var number_string = angka.replace(/[^,\d]/g, '').toString(),
                                          split = number_string.split(','),
                                          sisa = split[0].length % 3,
                                          rupiah = split[0].substr(0, sisa),
                                          ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                              
                                      if (ribuan) {
                                          separator = sisa ? '.' : '';
                                          rupiah += separator + ribuan.join('.');
                                      }
                              
                                      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                                      document.getElementById(id).value = "IDR " + rupiah;
                                  }
                              </script>
                              
                                <div class="form-group">
                                    <label for="gambarBarang">Gambar Barang</label>
                                    <input type="file" class="form-control" id="gambar_product" name="gambar_product">
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Deskripsi Produk</h4>
                            <div class="form-group">
                                <label for="deskripsiBarang">Deskripsi Barang</label>
                                <textarea class="form-control textarea-expanded" id="deskripsi" name="deskripsi" placeholder="Deskripsi Barang" required></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button type="button" class="btn btn-dark">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          
          
            
            {{-- Tabel Produk --}}
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex flex-row justify-content-between">
                          <h4 class="card-title mb-1">Your List Product</h4>
                          <p class="text-muted mb-1">Your data status</p>
                      </div>
                      <div class="row">
                          <div class="col-12">
                              <button id="toggleHeightBtn" class="btn btn-primary mb-2">Minimize</button>
                              <div class="preview-list">
                                  <div class="preview-item border-bottom">
                                      <div class="preview-thumbnail"></div>
                                      <div class="table-wrapper">
                                          <div class="table-responsive" id="tableContainer">
                                              <table class="table" id="productTable">
                                                  <thead>
                                                      <tr>
                                                          <th>Kode Barang</th>
                                                          <th>Nama Product</th>
                                                          <th style="width: 320px; text-align: center;">Deskripsi</th>
                                                          <th>Stok Barang</th>
                                                          <th>Harga</th>
                                                          <th>Actions</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      @if($barangs && count($barangs) > 0)
                                                      @foreach($barangs as $barang)
                                                      <tr>
                                                          <td>{{ $barang['kd_barang'] }}</td>
                                                          <td>{{ $barang['nama_b'] }}</td>
                                                          <td>{{ $barang['deskripsi'] }}</td>
                                                          <td>{{ $barang['stok_b'] }}</td>
                                                          <td>{{ formatRupiah($barang['harga_b']) }}</td>
                                                          <td>
                                                              <button type="button"
                                                              class="btn btn-sm btn-warning edit-btn"
                                                              data-toggle="modal"
                                                              data-target="#editModal"
                                                              data-kd="{{ $barang['kd_barang'] }}"
                                                              data-nama="{{ $barang['nama_b'] }}"
                                                              data-deskripsi="{{ $barang['deskripsi'] }}"
                                                              data-stok="{{ $barang['stok_b'] }}"
                                                              data-harga="{{ $barang['harga_b'] }}"
                                                              data-url="{{ route('admin.editproduct', ['kd_barang' => $barang['kd_barang']]) }}">
                                                                  Edit
                                                              </button>
                                                      
                                                                <form action="{{ route('admin.deleteproduct', $barang['kd_barang']) }}"
                                                                    method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                                </form>
                                                                
                                                          </td>
                                                      </tr>
                                                      @endforeach
                                                      @else
                                                      <tr>
                                                          <td colspan="6" class="text-center">Belum ada Product yang tersedia</td>
                                                      </tr>
                                                      @endif
                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      
          <script>
            $(document).ready(function() {
                var originalHeight = $('#tableContainer').height();
                var isMinimized = false;
        
                $('#toggleHeightBtn').on('click', function() {
                    if (isMinimized) {
                        $('#tableContainer').animate({ height: originalHeight }, 500);
                    } else {
                        $('#tableContainer').animate({ height: 0 }, 500);
                    }
                    isMinimized = !isMinimized;
                });
            });
            </script>
        
          
          
          <!-- Edit Modal -->
          <div class="container">
            @if (empty($barangs))
                <p>Belum ada barang yang tersedia.</p>
            @else
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header" style="display: flex; justify-content: space-between; align-items: center;">
                                <h5 class="modal-title" id="editModalLabel" style="color: #fff; flex-grow: 1;">
                                    Edit Product
                                </h5>
                                <div style="flex-shrink: 0;">
                                    <input class="form-control text-muted" id="edit_kd_barang_display" disabled style="background-color: #000000; color: #fff; width: 150px;">
                                </div>
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close" style="color: #fff; border: none; outline: none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M.646 1.646a.5.5 0 0 1 .708 0L8 7.293 15.646.646a.5.5 0 0 1 .708.708L8.707 8l7.647 7.646a.5.5 0 0 1-.708.708L8 8.707.354 16.354a.5.5 0 0 1-.708-.708L7.293 8 .646 1.646a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                            </div>
                            <form id="editForm" action="{{ route('admin.updateproduct', $barang['kd_barang']) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <input type="hidden" id="edit_kd_barang" name="edit_kd_barang">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="edit_nama_b">Nama Barang</label>
                                                            <input type="text" class="form-control" id="edit_nama_b" name="edit_nama_b" placeholder="Nama Barang" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="edit_stok_b">Stok Barang</label>
                                                            <input type="number" class="form-control" id="edit_stok_b" name="edit_stok_b" placeholder="Stok Barang" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="edit_harga_b">Harga Barang</label>
                                                            <input type="text" class="form-control" id="edit_harga_b" name="edit_harga_b" placeholder="Harga Barang" required>
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="gambar_product">Photo Profile</label>
                                                          <input type="file" class="form-control" id="gambar_product" name="gambar_product">
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Deskripsi Produk</h4>
                                                        <div class="form-group">
                                                            <label for="edit_deskripsi">Deskripsi Barang</label>
                                                            <textarea class="form-control textarea-expanded" id="edit_deskripsi" name="edit_deskripsi" placeholder="Deskripsi Barang" required></textarea>
                                                        </div>
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        

            <div class="row">
                @foreach ($barangs as $barang)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                              <img class="card-img-top img-fluid" style="max-width: 50%;" src="{{ asset('images/' . $barang['gambar_product']) }}" alt="Card image cap">
                              <br><br>  
                              <h5 class="card-title">{{ $barang['nama_b'] }}</h5>
                                <p class="card-text">Stok: {{ $barang['stok_b'] }}</p>
                                <p class="card-text">IDR {{ number_format($barang['harga_b'], 0, ',', '.') }}</p>
                                  <button type="button" class="btn btn-sm btn-warning edit-btn"
                                        data-kd="{{ $barang['kd_barang'] }}"
                                        data-nama="{{ $barang['nama_b'] }}"
                                        data-deskripsi="{{ $barang['deskripsi'] }}"
                                        data-stok="{{ $barang['stok_b'] }}"
                                        data-harga="{{ $barang['harga_b'] }}"
                                        data-url="{{ route('admin.editproduct', $barang['kd_barang']) }}">
                                    Add Stock
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

document.addEventListener("DOMContentLoaded", function() {
    // Event listener untuk setiap tombol Edit
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            var kd_barang = this.getAttribute('data-kd');
            var url = `http://localhost:1323/barang/${kd_barang}`;

            // Mengisi nilai form edit dalam modal
            document.getElementById('edit_kd_barang').value = kd_barang;
            document.getElementById('edit_kd_barang_display').value = kd_barang; // Untuk menampilkan kd_barang di input disabled

            // Mengambil data barang dari API untuk diisi ke dalam form edit
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal mengambil data barang');
                    }
                    return response.json();
                })
                .then(data => {
                    // Mengisi nilai form dengan data yang diterima dari API
                    document.getElementById('edit_nama_b').value = data.nama_b;
                    document.getElementById('edit_deskripsi').value = data.deskripsi;
                    document.getElementById('edit_stok_b').value = data.stok_b;
                    document.getElementById('edit_harga_b').value = data.harga_b.toFixed(2); // Menampilkan harga dengan 2 desimal
                })
                .catch(error => {
                    console.error('Gagal mengambil data barang:', error);
                    // Tampilkan pesan error kepada pengguna
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan saat mengambil data barang!'
                    });
                });

            // Menampilkan modal
            $('#editModal').modal('show');
        });
    });

    // Event listener untuk form edit yang disubmit
    document.getElementById('editForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Menghentikan default form submission

    var form = event.target;
    var formData = new FormData(form);
    var kd_barang = formData.get('edit_kd_barang');
    var url = `http://localhost:1323/barang/${kd_barang}`;

    // Ambil nilai dari semua field yang diperlukan
    var edit_nama_b = formData.get('edit_nama_b');
    var edit_deskripsi = formData.get('edit_deskripsi');
    var edit_stok_b = parseInt(formData.get('edit_stok_b'));
    var edit_harga_b = parseFloat(formData.get('edit_harga_b'));

    // Buat objek untuk dikirim sebagai body request
    var requestBody = {
        nama_b: edit_nama_b,
        deskripsi: edit_deskripsi,
        stok_b: edit_stok_b,
        harga_b: edit_harga_b
        // tidak perlu menyertakan edit_gambar_product di sini
    };

    // Kirim data menggunakan metode PUT
    fetch(url, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json' // Pastikan menggunakan tipe konten yang sesuai
        },
        body: JSON.stringify(requestBody) // Mengubah objek JavaScript menjadi JSON
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Gagal mengirimkan data update');
        }
        return response.json();
    })
    .then(data => {
        // Handle response dari API
        console.log('Data berhasil diupdate:', data);
        // Tampilkan notifikasi atau feedback kepada pengguna
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Produk berhasil diupdate!'
        }).then(() => {
            // Refresh halaman atau lakukan tindakan lain jika diperlukan
            location.reload(); // Contoh: refresh halaman
        });
    })
    .catch(error => {
        console.error('Gagal mengirimkan data update:', error);
        // Tampilkan pesan error kepada pengguna
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Terjadi kesalahan saat mengirimkan data update!'
        });
    });
});
});

</script>


          
            @php
            function formatRupiah($number) {
                return 'IDR ' . number_format($number, 0, ',', '.');
            }
        @endphp


    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
