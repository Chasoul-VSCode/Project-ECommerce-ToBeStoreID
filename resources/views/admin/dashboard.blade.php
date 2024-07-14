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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                  <h5 class="mb-0 font-weight-normal">Chasoul vs code</h5>
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
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">Chasoul vs code</p>
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

            {{-- wallet --}}
            <div class="row">
              <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 d-flex justify-content-between align-items-center">
                        <h6 class="text-muted font-weight-normal">My Wallet</h6>
                        <i class="fas fa-wallet" style="font-size: 24px; color: #6c757d;"></i>
                    </div>
                    
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0" id="totalIncome">
                        </div>
                      </div>
                      <div class="col-3">
                        <p class="mb-0 text-muted ml-2" id="incomeDifference">
                          <i id="incomeDifferenceIcon"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <script>
                // Fungsi untuk memformat angka menjadi Rupiah
                function formatRupiah(number) {
                    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
                }
            
                document.addEventListener('DOMContentLoaded', function () {
                    let previousTotalIncome = null;
            
                    function fetchTotalIncome() {
                        fetch('{{ route('admin.dashboard.income') }}')
                            .then(response => response.json())
                            .then(data => {
                                const totalIncomeElement = document.getElementById('totalIncome');
                                const incomeDifferenceIconElement = document.getElementById('incomeDifferenceIcon');
                                const newTotalIncome = data.total_harga || 0;
            
                                totalIncomeElement.textContent = formatRupiah(newTotalIncome);
            
                                if (previousTotalIncome !== null) {
                                    if (newTotalIncome > previousTotalIncome) {
                                        incomeDifferenceIconElement.className = 'fas fa-arrow-up text-success';
                                    } else if (newTotalIncome < previousTotalIncome) {
                                        incomeDifferenceIconElement.className = 'fas fa-arrow-down text-danger';
                                    } else {
                                        incomeDifferenceIconElement.className = 'fas fa-arrow-up text-success';
                                    }
                                } else {
                                    incomeDifferenceIconElement.className = 'fas fa-arrow-up text-success'
                                }
            
                                previousTotalIncome = newTotalIncome;
                            })
                            .catch(error => {
                                console.error('Error fetching total income:', error);
                                document.getElementById('totalIncome').textContent = 'NA';
                                document.getElementById('incomeDifferenceIcon').className = 'fas fa-minus text-muted';
                            });
                    }
            
                    fetchTotalIncome();
                    setInterval(fetchTotalIncome, 1000);
                });
            </script>

            {{-- wallet --}}
            <div class="col-xl-2 col-sm-4 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-12 d-flex justify-content-between align-items-center">
                              <h6 class="text-muted font-weight-normal">Transfer</h6>
                          </div>
                          <div class="col-12 d-flex justify-content-between align-items-center mt-2">
                              <div class="d-flex align-items-center">
                                  <button id="transferButton" class="btn btn-primary">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="15" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                          <path d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3zm2-1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                                          <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V7zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H2z"/>
                                      </svg>
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          
          <script>
            document.addEventListener('DOMContentLoaded', function () {
                const transferButton = document.getElementById('transferButton');
                
                transferButton.addEventListener('click', function () {
                    Swal.fire({
                        title: 'Enter Transfer Details',
                        html: `
                            <input type="text" id="rekening" class="swal2-input" placeholder="Rekening BCA">
                            <input type="number" id="nominal" class="swal2-input" placeholder="Amount">
                        `,
                        showCancelButton: true,
                        background: '#333',
                        color: '#fff',
                        preConfirm: () => {
                            const rekening = Swal.getPopup().querySelector('#rekening').value;
                            const nominal = Swal.getPopup().querySelector('#nominal').value;
                            if (!rekening) {
                                Swal.showValidationMessage('You need to enter an account number!');
                            } else if (!nominal) {
                                Swal.showValidationMessage('You need to enter an amount!');
                            } else if (nominal <= 0) {
                                Swal.showValidationMessage('The amount must be greater than zero!');
                            }
                            return { rekening: rekening, nominal: nominal };
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const { rekening, nominal } = result.value;
                            const transferData = {
                                rekening: rekening,
                                nominal: nominal
                            };
        
                            // Format the nominal to IDR
                            const formattedNominal = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(nominal);
        
                            // Your transfer functionality here, using the transferData JSON object
                            console.log(JSON.stringify(transferData));
        
                            Swal.fire({
                                title: 'Transfer Successful!',
                                text: `Account: ${rekening}\nAmount: ${formattedNominal}`,
                                icon: 'success',
                                background: '#333',
                                color: '#fff'
                            });
                        }
                    });
                });
            });
        </script>
        
        <!-- Include SweetAlert2 CSS for dark theme -->
        <style>
            .swal2-popup {
                background: #333 !important;
                color: #fff !important;
            }
            .swal2-title {
                color: #fff !important;
            }
            .swal2-input {
                background: #555 !important;
                color: #fff !important;
            }
        </style>
          
            
              {{-- Jumlah stock barang --}}
              <div class="col-xl-2 col-sm-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h6 class="text-muted font-weight-normal">Total Stock</h6>
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <h3 class="mb-0" id="totalStock"></h3>
                                </div>
                                <div>
                                    <p class="mb-0 text-muted ml-2" id="stockDifference">
                                        <i id="stockDifferenceIcon"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    let previousTotalStock = null;
            
                    function fetchTotalStock() {
                        fetch('/stokbarang')
                            .then(response => response.json())
                            .then(data => {
                                const totalStockElement = document.getElementById('totalStock');
                                const stockDifferenceIconElement = document.getElementById('stockDifferenceIcon');
                                const newTotalStock = data.total;
            
                                totalStockElement.textContent = newTotalStock;
            
                                if (previousTotalStock !== null) {
                                    if (newTotalStock > previousTotalStock) {
                                        stockDifferenceIconElement.className = 'fas fa-arrow-up text-success';
                                    } else if (newTotalStock < previousTotalStock) {
                                        stockDifferenceIconElement.className = 'fas fa-arrow-down text-danger';
                                    } else {
                                        stockDifferenceIconElement.className = 'fas fa-arrow-up text-success';
                                    }
                                } else {
                                    stockDifferenceIconElement.className = 'fas fa-arrow-up text-success';
                                }
            
                                previousTotalStock = newTotalStock;
                            })
                            .catch(error => {
                                console.error('Error fetching total stock:', error);
                                document.getElementById('totalStock').textContent = 'NA';
                                document.getElementById('stockDifferenceIcon').className = 'fas fa-arrow-up text-success';
                            });
                    }
            
                    fetchTotalStock();
                    setInterval(fetchTotalStock, 1000);
                });
            </script>
            
          
            {{-- jumlah transaksi --}}
            <div class="col-xl-2 col-sm-4 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <h6 class="text-muted font-weight-normal">Total Order</h6>
                          <div class="col-12 d-flex justify-content-between align-items-center">
                              <div class="d-flex align-items-center">
                                  <h3 class="mb-0" id="totalOrder"></h3>
                              </div>
                              <div>
                                  <p class="mb-0 text-muted ml-2" id="orderDifference">
                                      <i id="orderDifferenceIcon"></i>
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          
          <script>
              document.addEventListener('DOMContentLoaded', function () {
                  let previousTotalOrder = null;
          
                  function fetchTotalOrder() {
                      fetch('/totaltransaksi')
                          .then(response => response.json())
                          .then(data => {
                              const totalOrderElement = document.getElementById('totalOrder');
                              const orderDifferenceIconElement = document.getElementById('orderDifferenceIcon');
                              const newTotalOrder = data.total;
          
                              totalOrderElement.textContent = newTotalOrder;
          
                              if (previousTotalOrder !== null) {
                                  if (newTotalOrder > previousTotalOrder) {
                                      orderDifferenceIconElement.className = 'fas fa-arrow-up text-success';
                                  } else if (newTotalOrder < previousTotalOrder) {
                                      orderDifferenceIconElement.className = 'fas fa-arrow-down text-danger';
                                  } else {
                                      orderDifferenceIconElement.className = 'fas fa-arrow-up text-success';
                                  }
                              } else {
                                  orderDifferenceIconElement.className = 'fas fa-arrow-up text-success';
                              }
          
                              previousTotalOrder = newTotalOrder;
                          })
                          .catch(error => {
                              console.error('Error fetching total order:', error);
                              document.getElementById('totalOrder').textContent = 'NA';
                              document.getElementById('orderDifferenceIcon').className = 'fas fa-minus text-muted';
                          });
                  }
          
                  fetchTotalOrder();
                  setInterval(fetchTotalOrder, 1000);
              });
          </script>
                  
            
{{-- ratting --}}
            <div class="col-xl-2 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="d-flex flex-column align-items-center">
                        <h3 class="mb-2">4.5/5</h3>
                        <div class="d-flex align-items-center mb-1">
                          <span class="mdi mdi-star text-warning"></span>
                          <span class="mdi mdi-star text-warning"></span>
                          <span class="mdi mdi-star text-warning"></span>
                          <span class="mdi mdi-star text-warning"></span>
                          <span class="mdi mdi-star-outline"></span>
                        </div>
                     
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
              
            </div>
            
            {{-- Form Report Transastion--}}
            <div class="row">
              <style>
                .transaction-chart {
                    width: 100% !important;
                    height: 100% !important;
                }
            </style>
            
            <div class="col-md-4 grid-margin stretch-card historyproduct">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Transaction History</h4>
                        <div style="position: relative; height: 250px;">
                            <canvas id="transaction-product" class="transaction-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Function to fetch total stock
                    function fetchTotalStock() {
                        return fetch('/stokbarang')
                            .then(response => response.json())
                            .then(data => {
                                console.log('Total Stock Data:', data);
                                return data.total;
                            })
                            .catch(error => {
                                console.error('Error fetching total stock:', error);
                                return 0; // Return 0 if there's an error
                            });
                    }
            
                    // Function to fetch total order
                    function fetchTotalOrder() {
                        return fetch('/totaltransaksi')
                            .then(response => response.json())
                            .then(data => {
                                console.log('Total Order Data:', data);
                                return data.total;
                            })
                            .catch(error => {
                                console.error('Error fetching total order:', error);
                                return 0; // Return 0 if there's an error
                            });
                    }
            
                    // Initialize the chart
                    const ctx = document.getElementById('transaction-product').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Total Stock', 'Total Order'],
                            datasets: [{
                                label: 'Transaction Overview',
                                data: [0, 0], // Initial data
                                backgroundColor: [
                                    'rgba(54, 162, 235, 0.5)',
                                    'rgba(255, 99, 132, 0.5)',
                                ],
                                borderColor: [
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 99, 132, 1)',
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
            
                    // Function to update chart with current data
                    function updateChart(totalStock, totalOrder) {
                        myChart.data.datasets[0].data = [totalStock, totalOrder];
                        myChart.update();
                    }
            
                    // Function to update data and chart periodically
                    function updateDataAndChart() {
                        Promise.all([fetchTotalStock(), fetchTotalOrder()])
                            .then(([totalStock, totalOrder]) => {
                                updateChart(totalStock, totalOrder);
                            })
                            .catch(error => {
                                console.error('Error updating data and chart:', error);
                            });
                    }
            
                    // Initial update of data and chart
                    updateDataAndChart();
                    setInterval(updateDataAndChart, 1000); // Update every 10 seconds
                });
            </script>
            
              {{-- Your Report Form --}}
              <style>
                /* Style for scrollbar */
                ::-webkit-scrollbar {
                    width: 8px; /* Width of the scrollbar */
                }
            
                /* Track */
                ::-webkit-scrollbar-track {
                    background: #333; /* Color of the track */
                }
            
                /* Handle */
                ::-webkit-scrollbar-thumb {
                    background: #555; /* Color of the scrollbar handle */
                }
            
                /* Handle on hover */
                ::-webkit-scrollbar-thumb:hover {
                    background: #777; /* Color of scrollbar handle when hovered */
                }
            
                /* Thin scrollbar for horizontal overflow */
                ::-webkit-scrollbar-horizontal {
                    height: 6px; /* Height of the horizontal scrollbar */
                }
            </style>
            
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title mb-1">Your Order Customers</h4>
                            <p class="text-muted mb-1">Your data status</p>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="preview-list">
                                    <div class="preview-item border-bottom">
                                        <div class="table-responsive" style="max-height: 240px; overflow: auto;">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                      
                                                      <th>Status</th>
                                                        <th>ID Transaction</th>
                                                        <th>Buyers</th>
                                                        <th>Seller</th>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Total Price</th>
                                                        <th>Method</th>
                                                        <th>Transaction Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(isset($transaksis) && count($transaksis) > 0)
                                                        @foreach($transaksis as $transaksi)
                                                            <tr>
                                                               <td class="status-cell">{{ $transaksi['status_pembayaran'] }}</td>
                                                                <td>{{ $transaksi['kd_transaksi'] }}</td>
                                                                <td>{{ $transaksi['nama_users'] }}</td>
                                                                <td>{{ $transaksi['nama_seller'] }}</td>
                                                                <td>{{ $transaksi['nama_barang'] }}</td>
                                                                <td>{{ $transaksi['jumlah_barang'] }}</td>
                                                                <td>IDR {{ number_format($transaksi['total_harga'], 0, ',', '.') }}</td>
                                                                <td>{{ $transaksi['metode_pembayaran'] }}</td>
                                                                <td>{{ $transaksi['tgl_transaksi'] }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="8">belum ada transaksi yang dilakukan</td>
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

            <script>
              document.addEventListener('DOMContentLoaded', function() {
                  const statusCells = document.querySelectorAll('.status-cell');
          
                  statusCells.forEach(cell => {
                      const status = cell.textContent.trim();
                      let icon = '';
          
                      if (status === 'Sukses') {
                          icon = '<span class="status-icon success">✔️</span> Sukses';
                      } else if (status === 'Pending') {
                          icon = '<span class="status-icon pending">⌛</span> Pending';
                      } else if (status === 'Cancel') {
                          icon = '<span class="status-icon cancel">❌</span> Cancel';
                      }
          
                      cell.innerHTML = icon;
                  });
              });
          </script>

<style>
  .status-icon {
      margin-right: 5px;
  }
  .status-icon.success {
      color: green;
  }
  .status-icon.pending {
      color: yellow;
  }
  .status-icon.cancel {
      color: red;
  }
</style>

            
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
