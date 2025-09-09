<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Icepeak BD</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #e2e8f0;
            /* Light Gray */
            margin: 0;
        }

        .welcome-container {
            text-align: center;
            padding: 3rem 2rem;
            background: #f8fafc;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 90%;
        }

        .logo {
            width: 200px;
            height: auto;
            margin-bottom: 2rem;
        }

        .welcome-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            /* Stone Blue */
            margin-bottom: 1rem;
        }

        .welcome-subtitle {
            font-size: 1rem;
            color: #475569;
            margin-bottom: 2.5rem;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 10px;
            text-decoration: none;
            margin: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #3b82f6;
            /* Blue */
            color: white;
        }

        .btn-primary:hover {
            background-color: #2563eb;
        }

        .btn-secondary {
            background-color: transparent;
            color: #3b82f6;
            border: 2px solid #3b82f6;
        }

        .btn-secondary:hover {
            background-color: #3b82f6;
            color: white;
        }

        .footer-text {
            margin-top: 2rem;
            font-size: 0.85rem;
            color: #64748b;
        }
    </style>
</head>

<body>
    <div class="welcome-container">
        <!-- Logo -->
        <img src="{{ asset('images/icepeak-logo.png') }}" alt="Logo" class="logo">

        <!-- Welcome Message -->
        <h1 class="welcome-title">Welcome to Icepeak BD</h1>
        <p class="welcome-subtitle">
            Explore our platform and discover its amazing features.
        </p>

        <!-- Action Buttons -->
        <a href="https://www.icepeakbd.com" class="btn btn-primary" target="_blank">Visit Website</a>
        <a href="/admin/login" class="btn btn-secondary">Go to Admin Panel</a>

        <!-- Footer -->
        <p class="footer-text">Powered by Icepeak BD</p>
    </div>
</body>

</html>