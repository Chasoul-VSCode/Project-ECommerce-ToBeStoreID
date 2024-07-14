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
  </head>
  <style>
    .chat-box {
      height: 400px;
      overflow-y: scroll;
      padding: 10px;
    }
  
    .chat-item {
      display: flex;
      margin-bottom: 15px;
    }
  
    .chat-item.outgoing {
      justify-content: flex-end;
    }
  
    .chat-item.incoming {
      justify-content: flex-start;
    }
  
    /* .chat-avatar {
      width: 60px;
      margin-right: 10px;
    } */
  
    .chat-item.outgoing .chat-avatar {
      order: 2;
      margin-right: 0;
      margin-left: 10px;
    }
  
    /* .chat-avatar img {
      width: 100%;
      border-radius: 50%;
    } */
  
    .chat-content {
      flex-grow: 1;
      max-width: 70%;
    }
  
    .chat-time {
      font-size: 12px;
      color: #aaa;
      margin-top: 5px;
      display: block;
      margin-left: 540px
    }
  
    .message {
      padding: 10px;
      border-radius: 10px;
      position: relative;
    }
  
    .outgoing .message {
      background-color: #007bff;
      color: #fff;
      border-top-right-radius: 10;
    }
  
    .incoming .message {
      background-color: #f1f0f0;
      color: #333;
      border-top-left-radius: 10;
    }
  
    .message p {
      margin: 0;
      word-wrap: break-word;
    }
  
    .input-group {
      margin-top: 15px;
    }
  </style>
  
  
  
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
            <div class="row">
              <div class="col-lg-4" id="participant-column">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Participants</h4>
                    <ul class="list-group">
                      <!-- Daftar peserta chat -->
                      <li class="list-group-item">
                        <div class="participant">
                            <img src="img/tobestore.png" class="participant-photo" alt="Ahmad Rifai">
                            <div class="participant-info">
                                <span class="participant-name">Ahmad Rifai</span>
                                <span class="chat-time">5 minutes ago</span>
                            </div>
                        </div>
                    </li>
                 
                    </ul>
                  </div>
                </div>
              </div>
            
              <!-- Chat box -->
              <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Chat</h4>
                        <div class="chat-box">
                            <ul class="chat-list">
                                <!-- Daftar pesan chat -->
                                @forelse($chats as $chat)
                                <li class="chat-item {{ $chat['kd_user'] ? 'incoming' : 'outgoing' }}">
                                    <div class="chat-content">
                                        <div class="message">
                                            <p>{{ $chat['text_chat'] }}</p>
                                            <span class="chat-time">{{ $chat['jam'] }}</span>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                <li class="chat-item">
                                    <div class="chat-content">
                                        <div class="message">
                                            <p>Belum ada chat yang tersedia</p>
                                        </div>
                                    </div>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                        <!-- Form chat -->
                        <form id="chat-form" class="mt-3" method="POST">
                          @csrf
                          <div class="input-group">
                              <input type="text" class="form-control" placeholder="Type your message..." name="text_chat" style="color: white;">
                              <input type="hidden" name="kd_user">
                              <button class="btn btn-primary" type="submit">Send</button>
                          </div>
                      </form>
                      
                    </div>
                </div>
            </div>
            
            
            <!-- Script for chat functionality -->
            <script>
                document.getElementById('chat-form').addEventListener('submit', function(event) {
                    event.preventDefault();
                    var messageInput = this.querySelector('input[type="text"]');
                    var message = messageInput.value.trim();
                    if (message !== '') {
                        var chatList = document.querySelector('.chat-list');
                        var newMessageItem = document.createElement('li');
                        newMessageItem.className = 'chat-item outgoing'; // Assume all messages are outgoing initially
                        newMessageItem.innerHTML = `
                            <div class="chat-content">
                                <div class="message">
                                    <p>${message}</p>
                                    <span class="chat-time">Now</span>
                                </div>
                            </div>
                        `;
                        chatList.appendChild(newMessageItem);
                        messageInput.value = '';
                        // Scroll down when new message added
                        chatList.scrollTop = chatList.scrollHeight;
                    }
                });
            
              
            </script>
            
            <style>
                .card {
                    display: flex;
                    flex-direction: column;
                    height: 100%;
                }
              
                .list-group {
                    overflow-y: auto;
                    flex-grow: 1;
                    padding-left: 0;
                }

                .list-group-item {
                    border: none;
                    padding: 10px;
                }

                .dark-bg {
                    background-color: #333; /* Warna latar belakang yang lebih gelap */
                    border-radius: 10px;
                    margin-bottom: 10px; /* Jarak antar item */
                }

                .participant {
                    display: flex;
                    align-items: center;
                }

                .participant-photo {
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    margin-right: 10px;
                } 

                .participant-info {
                    flex-grow: 1;
                }

                .participant-name {
                    font-style: italic;
                    font-size: 15px;
                    color: rgb(0, 0, 0); /* Warna teks nama */
                }

                .chat-time {
                    font-size: 12px;
                    color: #aaa;
                }
                        
                .chat-box {
                    flex-grow: 1;
                    overflow-y: auto;
                }
            
                .chat-list {
                    flex-grow: 1;
                    overflow-y: auto;
                    list-style-type: none;
                    padding: 0;
                }
            
                .chat-item {
                    margin-bottom: 10px;
                    clear: both;
                    overflow: hidden;
                }
            
                .incoming .chat-content {
                    background-color: #f2f2f2;
                    float: left;
                    border-radius: 15px; /* Border radius for incoming messages */
                }
            
                .outgoing .chat-content {
                    background-color: #007bff;
                    color: white;
                    float: right;
                     border-radius: 15px; /* Border radius for incoming messages */
                }
            
                .message {
                    padding: 10px;
                    border-radius: 8px;
                    max-width: 70%;
                }
            
                .chat-time {
                    font-size: 12px;
                    color: #aaa;
                    margin-left: 10px;
                }
            
                #resize-handle {
                    width: 5px;
                    background: #ccc;
                    cursor: ew-resize;
                    position: absolute;
                    top: 0;
                    bottom: 0;
                    right: 0;
                    z-index: 10;
                }
            
                #participant-column {
                    position: relative;
                }
            </style>
            
            
            
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
