<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Aula Virtual - Inicio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

  <style>
    /* ===== RESET ===== */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      color: #e0e6ed;
      background: #0a0f1c;
      overflow-x: hidden;
      display: flex;
      flex-direction: column;
    }

    /* ===== Fondo dinámico ===== */
    #particles-js {
      position: fixed;
      width: 100%;
      height: 100%;
      background: linear-gradient(-45deg,#0a0f1c,#141a2a,#1c2541,#111827);
      background-size: 400% 400%;
      animation: bgShift 30s ease infinite;
      z-index: -1;
    }
    @keyframes bgShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* ===== Navbar ===== */
    .navbar {
      background: rgba(10,15,28,0.7);
      backdrop-filter: blur(18px);
      padding: 0.9rem 1.8rem;
      border-bottom: 1px solid rgba(255,255,255,0.08);
      animation: fadeInDown 1s ease;
    }
    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .navbar-brand {
      font-weight: 800;
      font-size: 1.6rem;
      color: #fff !important;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    .navbar-brand i {
      color: #4dd2ff;
      text-shadow: 0 0 12px #4dd2ff;
    }
    .btn-auth {
      border-radius: 50px;
      font-weight: 600;
      padding: 0.45rem 1.5rem;
      border: 2px solid #4dd2ff;
      color: #4dd2ff;
      transition: all 0.3s ease;
    }
    .btn-auth:hover {
      background: #4dd2ff;
      color: #0a0f1c;
      box-shadow: 0 0 18px #4dd2ff;
    }

    /* ===== Contenido ===== */
    .menu-container {
      margin-top: 7rem;
      padding: 3rem 2rem;
      max-width: 1200px;
      margin-left: auto;
      margin-right: auto;
      text-align: center;
      animation: fadeInUp 1.2s ease;
    }
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(40px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .menu-container h1 {
      font-size: 3.2rem;
      font-weight: 800;
      margin-bottom: 0.5rem;
      background: linear-gradient(90deg,#4dd2ff,#66ffcc);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .menu-container p {
      color: rgba(255,255,255,0.7);
      margin-bottom: 3rem;
      font-size: 1.2rem;
    }

    /* ===== Tarjetas ===== */
    .menu-card {
      background: rgba(255,255,255,0.03);
      border-radius: 1.5rem;
      padding: 2.5rem 1rem;
      text-decoration: none;
      color: #fff;
      font-weight: 600;
      font-size: 1.15rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: all 0.4s ease;
      box-shadow: 0 0 0 rgba(0,255,255,0);
      border: 1px solid rgba(255,255,255,0.08);
    }
    .menu-card i {
      font-size: 3.5rem;
      margin-bottom: 1rem;
      color: #4dd2ff;
      transition: transform 0.3s ease, text-shadow 0.3s ease;
    }
    .menu-card:hover {
      transform: translateY(-12px) scale(1.05);
      background: rgba(77,210,255,0.08);
      box-shadow: 0 12px 40px rgba(77,210,255,0.3);
    }
    .menu-card:hover i {
      transform: rotate(-8deg) scale(1.2);
      text-shadow: 0 0 18px #4dd2ff;
    }

    /* ===== Footer ===== */
    footer {
      background: rgba(10,15,28,0.8);
      backdrop-filter: blur(12px);
      padding: 1rem;
      text-align: center;
      font-size: 0.9rem;
      color: rgba(255,255,255,0.6);
      border-top: 1px solid rgba(255,255,255,0.08);
    }
    footer a {
      color: #4dd2ff;
      text-decoration: none;
      margin: 0 0.4rem;
    }
    footer a:hover { text-decoration: underline; }

    /* ===== Responsive ===== */
    @media (max-width: 768px) {
      .menu-container h1 { font-size: 2.2rem; }
      .menu-card { padding: 2rem 1rem; font-size: 1rem; }
    }
  </style>
</head>
<body>
  <!-- Fondo partículas -->
  <div id="particles-js"></div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid px-4">
      <a class="navbar-brand" href="#">
        <i class="bi bi-magic"></i> Aula Virtual
      </a>
      <div class="d-flex">
        <a href="#" class="btn btn-auth">Iniciar sesión</a>
      </div>
    </div>
  </nav>

  <!-- Contenido -->
  <div class="menu-container">
    <h1>Bienvenido al Aula Virtual</h1>
    <p>Gestiona y administra todos los recursos en un entorno moderno</p>

    <div class="row g-4">
      <div class="col-md-4"><a href="{{ route('aulas.index') }}" class="menu-card"><i class="bi bi-building"></i>Aulas</a></div>
      <div class="col-md-4"><a href="{{ route('reservas.index') }}" class="menu-card"><i class="bi bi-calendar-check"></i>Reservas</a></div>
      <div class="col-md-4"><a href="{{ route('docentes.index') }}" class="menu-card"><i class="bi bi-person-badge"></i>Docentes</a></div>
      <div class="col-md-4"><a href="{{ route('materias.index') }}" class="menu-card"><i class="bi bi-journal-bookmark"></i>Materias</a></div>
      <div class="col-md-4"><a href="{{ route('disponibilidades.index') }}" class="menu-card"><i class="bi bi-clock-history"></i>Disponibilidades</a></div>
      <div class="col-md-4"><a href="{{ route('horarios.index') }}" class="menu-card"><i class="bi bi-clock"></i>Horarios</a></div>
      <div class="col-md-4"><a href="{{ route('aireacondicionados.index') }}" class="menu-card"><i class="bi bi-snow"></i>Aires Acondicionados</a></div>
      <div class="col-md-4"><a href="{{ route('focos.index') }}" class="menu-card"><i class="bi bi-lightbulb"></i>Focos</a></div>
      <div class="col-md-4"><a href="{{ route('cortinas.index') }}" class="menu-card"><i class="bi bi-window"></i>Cortinas</a></div>
      <div class="col-md-4"><a href="{{ route('muebles.index') }}" class="menu-card"><i class="bi bi-couch"></i>Muebles</a></div>
      <div class="col-md-4"><a href="{{ route('historialfocos.index') }}" class="menu-card"><i class="bi bi-archive"></i>Historial de Focos</a></div>
      <div class="col-md-4"><a href="{{ route('historial_uso_aireacondicionados.index') }}" class="menu-card"><i class="bi bi-database"></i>Historial Uso Aires</a></div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    © <span id="year"></span> Aula Virtual | Desarrollado con 💙 en Laravel
    <br>
    <a href="#"><i class="bi bi-github"></i></a>
    <a href="#"><i class="bi bi-linkedin"></i></a>
  </footer>

  <!-- Script año -->
  <script>document.getElementById("year").textContent = new Date().getFullYear();</script>

  <!-- Partículas (CDN) -->
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script>
    particlesJS("particles-js", {
      "particles": {
        "number": { "value": 65, "density": { "enable": true, "value_area": 800 } },
        "color": { "value": "#4dd2ff" },
        "shape": { "type": "circle" },
        "opacity": { "value": 0.35 },
        "size": { "value": 3 },
        "line_linked": { "enable": true, "distance": 150, "color": "#4dd2ff", "opacity": 0.15, "width": 1 },
        "move": { "enable": true, "speed": 2 }
      },
      "interactivity": {
        "events": { "onhover": { "enable": true, "mode": "repulse" } }
      }
    });
  </script>
</body>
</html>
