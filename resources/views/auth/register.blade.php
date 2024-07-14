<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}" />

    <style>
        /* login.css */

/* Set the background color for the body to a dark color */
body {
    background-color: #2c3e50; /* Dark color */
    color: #ecf0f1; /* Light text color for contrast */
    font-family: 'Poppins', sans-serif;
    height: 100vh;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Container styling */
.container {
    position: relative;
    width: 100%;
    height: 100%;
    background: #1a252f; /* Dark background for the container */
    overflow: hidden;
}

/* Form container styling */
.forms-container {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Sign-in and sign-up form styling */
.signin-signup {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: 1s 0.7s ease-in-out;
}

/* Form styling */
.sign-in-form {
    width: 100%;
    max-width: 580px;
    /* padding: 20px; */
    padding-right: 50px;
    background: #34495e; /* Dark background for the form */
    border-radius: 30px;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
}

/* Input field styling */
.input-field {
    /* display: flex; */
    justify-content: center;
    align-items: center;
    background: #1a252f; /* Dark input field background */
    border-radius: 5px;
    margin: 10px 0;
    padding: 10px 20px;
    width: 90%;
    height: 50px;
}

/* .input-field i {
    color: #ecf0f1;
    font-size: 1.1rem;
    margin-right: 10px;
} */

.input-field input {
    background: none;
    border: none;
    outline: none;
    color: #ecf0f1;
    font-size: 1rem;
    flex: 1;
}

/* Button styling */
.btn {
    width: 30%;
    background-color: #3498db; /* Button background color */
    border: none;
    outline: none;
    height: 49px;
    border-radius: 5px;
    color: #fff;
    text-transform: uppercase;
    font-weight: 600;
    margin: 10px 0;
    cursor: pointer;
    transition: 0.5s;
}

.btn:hover {
    background-color: #2980b9;
}

.btn.solid {
    background-color: #3498db;
}

/* Title styling */
.title {
    font-size: 2.2rem;
    color: #ecf0f1;
    margin-bottom: 10px;
    text-align: center;
}

/* Link styling */
a {
    color: #3498db;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Alert styling */
.alert.alert-danger {
    background-color: #e74c3c;
    color: #ecf0f1;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="{{ route('register.post') }}" id="register-form" class="sign-in-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h2 class="title">Registration</h2>
                    <div class="input-columns">
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" value="{{ old('nama_seller') }}" placeholder="Nama Lengkap" name="nama_seller" id="nama_seller" required />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email" value="{{ old('email') }}" placeholder="Email" name="email" id="email" required />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" value="{{ old('username') }}" placeholder="Username" name="username" id="username" required />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Password" name="pass" id="pass" required />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-phone"></i>
                            <input type="text" value="{{ old('no_wa') }}" placeholder="Nomor WhatsApp" name="no_wa" id="no_wa" required />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-map-marker-alt"></i>
                            <input type="text" value="{{ old('alamat') }}" placeholder="Alamat" name="alamat" id="alamat" required />
                        </div>
                    </div>
                    <button type="submit" class="btn solid">Register</button>
                    <p>Already have an account? <a href="{{ route('login') }}">Login Here</a></p>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const registerForm = document.getElementById('register-form');
    
            registerForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Menghentikan pengiriman form default
    
                // Ambil data dari form
                const formData = new FormData(registerForm);
    
                // Ganti URL API dengan alamat API yang sesuai
                const apiUrl = 'http://localhost:1323/sellers'; // Ganti dengan alamat API yang sesuai
    
                // Kirim data ke endpoint Laravel dengan fetch API
                fetch(apiUrl, {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Handle response dari server
                    console.log('Registration successful:', data);
                    // Tampilkan SweetAlert untuk sukses
                    Swal.fire({
                        icon: 'success',
                        title: 'Registration Successful',
                        text: 'Please login with your credentials.',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Redirect ke halaman login
                        window.location.href = '{{ route('login') }}';
                    });
                })
                .catch(error => {
                    console.error('Registration error:', error);
                    // Tampilkan SweetAlert untuk gagal
                    Swal.fire({
                        icon: 'error',
                        title: 'Registration Failed',
                        text: 'Please try again later.',
                        confirmButtonText: 'OK'
                    });
                });
            });
        });
    </script>
        
</body>
</html>
