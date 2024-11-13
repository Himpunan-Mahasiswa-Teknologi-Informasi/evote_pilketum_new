<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - HMTI</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0046b8 0%, #00254f 100%);
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
            }
            100% {
                transform: translateY(-100vh) rotate(360deg);
            }
        }

        .login-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            position: relative;
            z-index: 2;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }

        .logos {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .logo {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
        }

        h1 {
            color: white;
            font-size: 1.5rem;
            margin-bottom: 5px;
        }

        h2 {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.8rem;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            text-align: left;
            color: white;
            margin-bottom: 5px;
            font-size: 0.9rem;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: white;
            font-size: 0.9rem;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #0046b8;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-btn:hover {
            background: #003285;
        }

        .login-info {
            margin-top: 20px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <div class="floating-shapes" id="shapes"></div>
    
    <div class="login-container">
        <div class="logos">
            <div class="logo"></div>
            <div class="logo"></div>
        </div>
        
        <h1>PEMILIHAN KETUA UMUM</h1>
        <h2>HIMPUNAN MAHASISWA TEKNOLOGI INFORMASI</h2>
        
        @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            <form action="{{ route('actionlogin') }}" method="post">
            @csrf
            <div class="input-group">
                <label for="nim">NIM</label>
                <input type="text" id="nim" name="nim" placeholder="username@gmail.com" required>
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            
            <button type="submit" class="login-btn">Login</button>
        </form>
        
        <p class="login-info">Login menggunakan akun siakad</p>
    </div>

    <script>
        // Create floating shapes
        const shapes = document.getElementById('shapes');
        for (let i = 0; i < 15; i++) {
            const shape = document.createElement('div');
            shape.className = 'shape';
            shape.style.width = Math.random() * 100 + 'px';
            shape.style.height = shape.style.width;
            shape.style.left = Math.random() * 100 + '%';
            shape.style.animationDuration = (Math.random() * 15 + 5) + 's';
            shape.style.opacity = Math.random() * 0.3;
            shapes.appendChild(shape);
        }

        // Form submission handling
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nim = document.getElementById('nim').value;
            const password = document.getElementById('password').value;
            
            // Add your login logic here
            console.log('Login attempt:', { nim, password });
            
            // Example validation
            if (nim && password) {
                alert('Login attempt successful! Add your authentication logic here.');
            } else {
                alert('Please fill in all fields');
            }
        });
    </script>
</body>
</html>