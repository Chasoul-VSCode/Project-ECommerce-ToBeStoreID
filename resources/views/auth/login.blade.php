<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    
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
    max-width: 400px;
    padding: 20px;
    background: #34495e; /* Dark background for the form */
    border-radius: 10px;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
}

/* Input field styling */
.input-field {
    display: flex;
    justify-content: center;
    align-items: center;
    background: #1a252f; /* Dark input field background */
    border-radius: 5px;
    margin: 10px 0;
    padding: 10px 20px;
    width: 100%;
    height: 55px;
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
    width: 100%;
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
    color: #c0c0c0;
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
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('login.post') }}" class="sign-in-form" method="POST">
                    @csrf
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="pass" placeholder="Password" required />
                    </div>
                    <button type="submit" class="btn solid">Login</button>
                    <p>Don't have an account? <a href="{{ route('register') }}">Register Here</a></p>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/login.js') }}"></script>

    <script>
        // login.js

document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.sign-in-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        
        let formData = new FormData(this);
        
        fetch('{{ route("login.post") }}', {
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
            if (data.message === 'Login successful') {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Your login was successful!',
                    showConfirmButton: false,
                    timer: 1500
                });
                setTimeout(() => {
                    window.location.href = '/dashboard';
                }, 1500);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Invalid username or password!',
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            });
        });
    });
});

    </script>
</body>
</html>
