<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #0a0f1a;
            --card: #0f1623;
            --border: #2a3040;
            --accent: #d4af37;
            --accent2: #b89628;
            --text: #e8e6d0;
            --muted: #7a7560;
            --input-bg: #141e2e;
        }

        body {
            background: var(--bg);
            font-family: 'DM Sans', sans-serif;
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow-x: hidden;
        }

        body::before, body::after {
            content: '';
            position: fixed;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.12;
            pointer-events: none;
        }
        body::before {
            width: 500px; height: 500px;
            background: #d4af37;
            top: -150px; left: -150px;
        }
        body::after {
            width: 400px; height: 400px;
            background: #b89628;
            bottom: -100px; right: -100px;
        }

        .card {
            background: var(--card);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 24px;
            padding: 3rem;
            width: 100%;
            max-width: 500px;
            position: relative;
            box-shadow: 0 0 60px rgba(212, 175, 55, 0.07);
            animation: slideUp 0.6s ease forwards;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0; left: 10%; right: 10%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #d4af37, #f0c842, transparent);
            border-radius: 2px;
        }

        .header {
            margin-bottom: 2.5rem;
            text-align: center;
        }

        .badge {
            display: inline-block;
            background: rgba(212, 175, 55, 0.12);
            border: 1px solid rgba(212, 175, 55, 0.35);
            color: var(--accent);
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 0.35rem 1rem;
            border-radius: 999px;
            margin-bottom: 1rem;
        }

        h1 {
            font-family: 'Syne', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            background: linear-gradient(135deg, #fff 40%, #d4af37);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            color: var(--muted);
            font-size: 0.9rem;
        }

        .grid {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            animation: fadeIn 0.5s ease forwards;
            opacity: 0;
        }

        .field:nth-child(1) { animation-delay: 0.1s; }
        .field:nth-child(2) { animation-delay: 0.15s; }
        .field:nth-child(3) { animation-delay: 0.2s; }

        @keyframes fadeIn { to { opacity: 1; } }

        label {
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--muted);
            letter-spacing: 0.04em;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        input {
            background: var(--input-bg);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 10px;
            padding: 0.8rem 1rem;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.92rem;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            outline: none;
            width: 100%;
        }

        input::placeholder { color: #3a3820; }

        input:focus {
            border-color: var(--accent);
            background: #182030;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.12);
        }

        .divider {
            height: 1px;
            background: rgba(212, 175, 55, 0.15);
            margin: 0.5rem 0;
        }

        .btn {
            background: linear-gradient(135deg, #d4af37, #f0c842);
            color: #0a0f1a;
            border: none;
            padding: 1rem;
            border-radius: 12px;
            font-family: 'Syne', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .btn::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.15), transparent);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(212, 175, 55, 0.4);
        }

        .btn:active { transform: translateY(0); opacity: 0.9; }

        .error-msg {
            color: #ff6b6b;
            font-size: 0.78rem;
            margin-top: 0.2rem;
        }

        .footer-text {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.82rem;
            color: var(--muted);
        }

        .footer-text a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
        }

        @media (max-width: 520px) {
            .card { padding: 2rem 1.5rem; }
        }
    </style>
</head>
<body>

    {{-- ✅ SUCCESS ALERT --}}
    @if(session('success'))
    <script>
        window.onload = function() {
            alert("✅ {{ session('success') }}");
        }
    </script>
    @endif

    <div class="card">
        <div class="header">
            <div class="badge">⚖️ Student Portal</div>
            <h1>Register Now</h1>
            <p class="subtitle">Create your student account</p>
        </div>

        <form action="{{ route('employee.store') }}" method="POST">
            @csrf
            <div class="grid">

                <div class="field">
                    <label>👤 Username</label>
                    <input type="text" name="username" placeholder="e.g. ahmad_raza" required>
                    @error('username') <p class="error-msg">⚠️ {{ $message }}</p> @enderror
                </div>

                <div class="divider"></div>

                <div class="field">
                    <label>✉️ Email</label>
                    <input type="email" name="email" placeholder="you@example.com" required>
                    @error('email') <p class="error-msg">⚠️ {{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <label>🔒 Password</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                    @error('password') <p class="error-msg">⚠️ {{ $message }}</p> @enderror
                </div>

                <button type="submit" class="btn">Create Account →</button>

            </div>
        </form>

        <p class="footer-text">Already have an account? <a href="#">Login here</a></p>
    </div>

</body>
</html>