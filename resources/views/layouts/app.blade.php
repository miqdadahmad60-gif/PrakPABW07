<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'LaporBanjir - BPBD Kabupaten Bandung')</title>
<style>
body{font-family:Arial,sans-serif;margin:0;background:#f4f7f6;color:#333}
header{background:#004080;color:#fff;padding:15px 4%;display:flex;justify-content:space-between;align-items:center;gap:15px;flex-wrap:wrap}
header h2{margin:0;font-size:20px}nav{display:flex;gap:15px;align-items:center;flex-wrap:wrap}nav a{color:#fff;text-decoration:none;font-weight:bold}
.container{max-width:1100px;margin:30px auto;background:#fff;padding:25px;border-radius:8px;box-shadow:0 4px 8px #00000012}
footer{text-align:center;padding:18px;background:#ddd;margin-top:40px;font-size:14px}
label{display:block;font-weight:bold;margin:12px 0 5px}input,textarea,select{width:100%;padding:10px;margin-bottom:10px;border:1px solid #ccc;border-radius:4px;box-sizing:border-box}
button,.btn{padding:9px 14px;background:#007bff;color:#fff;border:0;border-radius:4px;cursor:pointer;text-decoration:none;display:inline-block;font-size:14px}
.btn-warning{background:#e0a800}.btn-danger{background:#dc3545}.btn-secondary{background:#6c757d}
.card{border:1px solid #ddd;padding:18px;border-radius:6px;margin:15px 0;background:#fafafa}
.alert-success{background:#d4edda;color:#155724;padding:12px;border-radius:5px;margin:15px 0}
.alert-error{background:#f8d7da;color:#721c24;padding:12px;border-radius:5px;margin:15px 0}
.badge{background:#e9ecef;padding:5px 8px;border-radius:4px;font-size:12px}
table{width:100%;border-collapse:collapse}th,td{padding:10px;border:1px solid #ddd;text-align:left}th{background:#eef3f8}
.actions{white-space:nowrap}.actions form{display:inline}
.pagination{display:flex;gap:8px;list-style:none;padding:15px 0}.pagination a,.pagination span{padding:6px 10px;border:1px solid #ddd;border-radius:4px;text-decoration:none;color:#004080}
@media(max-width:650px){.container{margin:12px;padding:15px}header{align-items:flex-start}.actions{white-space:normal}}
</style>
</head>
<body>
<header>
    <h2>BPBD Kab. Bandung - LaporBanjir</h2>
    <nav>
        <a href="{{ route('lapor.form') }}">Buat Laporan</a>
        @guest
            <a href="{{ route('login') }}">Login Petugas</a>
            <a href="{{ route('register') }}">Register</a>
        @endguest
        @auth
            <a href="{{ route('petugas.laporan.index') }}">Kelola Laporan</a>
            <a href="{{ route('petugas.profil') }}">Profil</a>
            <form action="{{ route('petugas.logout') }}" method="POST">@csrf<button type="submit">Logout</button></form>
        @endauth
    </nav>
</header>
<main class="container">@yield('content')</main>
<footer>&copy; 2026 Badan Penanggulangan Bencana Daerah (BPBD) Kabupaten Bandung</footer>
</body>
</html>
