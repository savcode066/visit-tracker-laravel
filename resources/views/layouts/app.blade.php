<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Visit Tracker') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <style>
        :root {
            --chess-cream: #f5f5f0;
            --chess-ivory: #fffaf0;
            --chess-brown: #d4b88c;
            --chess-dark: #2c3e50;
            --chess-accent: #34495e;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--chess-cream);
            color: var(--chess-dark);
            line-height: 1.6;
            min-height: 100vh;
            position: relative;
            background-image: 
                linear-gradient(45deg, rgba(212, 184, 140, 0.05) 25%, transparent 25%),
                linear-gradient(-45deg, rgba(212, 184, 140, 0.05) 25%, transparent 25%),
                linear-gradient(45deg, transparent 75%, rgba(212, 184, 140, 0.05) 75%),
                linear-gradient(-45deg, transparent 75%, rgba(212, 184, 140, 0.05) 75%);
            background-size: 20px 20px;
            background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M19 22H5V20H19V22Z' fill='%232c3e50' fill-opacity='0.03'/%3E%3Cpath d='M16 2H8L6 4H18L16 2Z' fill='%232c3e50' fill-opacity='0.03'/%3E%3Cpath d='M12 4V8H14V6H16V8H18V6H20V8H22V4H12Z' fill='%232c3e50' fill-opacity='0.03'/%3E%3Cpath d='M8 8H10V10H12V12H10V14H12V16H10V18H8V16H6V14H8V12H6V10H8V8Z' fill='%232c3e50' fill-opacity='0.03'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: bottom right;
            background-size: 300px;
            pointer-events: none;
            z-index: 0;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'DM Sans', sans-serif;
            color: var(--chess-accent);
            font-weight: 700;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 1rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            padding: 2.5rem;
        }

        .glass-card:hover {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .btn-chess {
            background: linear-gradient(135deg, var(--chess-brown) 0%, #e8d0aa 100%);
            color: var(--chess-accent);
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(212, 184, 140, 0.3);
            transition: all 0.3s ease;
        }

        .btn-chess:hover {
            background: linear-gradient(135deg, #c4a87c 0%, #d4b88c 100%);
            box-shadow: 0 6px 16px rgba(212, 184, 140, 0.4);
        }

        input, textarea {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid rgba(212, 184, 140, 0.2);
            border-radius: 0.5rem;
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
            font-family: 'DM Sans', sans-serif;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: var(--chess-brown);
            box-shadow: 0 0 0 3px rgba(212, 184, 140, 0.2);
        }

        label {
            display: block;
            color: var(--chess-accent);
            font-weight: 500;
            margin-bottom: 0.5rem;
            font-family: 'DM Sans', sans-serif;
        }

        .header-gradient {
            background: linear-gradient(135deg, var(--chess-brown) 0%, #e8d0aa 100%);
            padding: 2rem 0;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .header-gradient::before {
            content: '♞';
            position: absolute;
            right: 2rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 3rem;
            opacity: 0.2;
            color: white;
        }

        .header-title {
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 2.5rem;
            margin: 0;
            text-align: center;
            font-weight: 700;
        }

        .footer-quote {
            background: rgba(255, 255, 255, 0.9);
            color: var(--chess-accent);
            font-style: italic;
            font-size: 1.1rem;
            text-align: center;
            padding: 1.5rem 0;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            margin-top: 3rem;
            position: relative;
            z-index: 1;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 1rem;
            font-family: 'DM Sans', sans-serif;
        }

        th {
            background: rgba(212, 184, 140, 0.1);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 1rem;
            text-align: left;
            color: var(--chess-accent);
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        tr:hover {
            background: rgba(212, 184, 140, 0.05);
        }

        .success-message {
            background: rgba(72, 187, 120, 0.1);
            border: 1px solid rgba(72, 187, 120, 0.2);
            color: #2f855a;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            font-family: 'DM Sans', sans-serif;
        }

        .error-message {
            color: #e53e3e;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            font-family: 'DM Sans', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }
            
            .glass-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <header class="header-gradient">
        <div class="container">
            <h1 class="header-title">
                Welcome to Savio's Visit Tracker ♟️
            </h1>
        </div>
    </header>

    <main class="container py-8">
        @yield('content')
    </main>

    <footer class="container">
        <p class="footer-quote">
            "When you see a good move, look for a better one." — Emanuel Lasker
        </p>
    </footer>
</body>
</html> 