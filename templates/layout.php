<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>📦 Gestion Colis — Plateforme d'expédition</title>
    
    <!-- Tailwind CSS (Modern) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: '#5B6B7F',
              success: '#6B9080',
              warning: '#C99A6F',
              danger: '#9B6B7F',
              dark: '#3D4454'
            }
          }
        }
      }
    </script>
    
    <!-- Icons (Heroicons) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/heroicons/outline/index.css">
    
    <!-- Fonts (Poppins + Outfit) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
      * { font-family: 'Poppins', sans-serif; }
      h1, h2, h3, h4, h5, h6 { font-family: 'Outfit', sans-serif; font-weight: 600; }
      
      [x-cloak] { display: none; }
      
      @keyframes slideIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
      }
      
      @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
      }
      
      .animate-slide-in { animation: slideIn 0.3s ease-out; }
      .animate-fade-in { animation: fadeIn 0.3s ease-out; }
      
      .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); }
      
      .btn-base {
        @apply px-4 py-2 rounded-lg font-medium transition duration-200 cursor-pointer inline-flex items-center gap-2;
      }
      
      .btn-primary {
        @apply btn-base bg-slate-700 text-white hover:bg-slate-800 active:scale-95;
      }
      
      .btn-secondary {
        @apply btn-base bg-slate-200 text-slate-700 hover:bg-slate-300 active:scale-95;
      }
      
      .btn-success {
        @apply btn-base bg-emerald-700 text-white hover:bg-emerald-800 active:scale-95;
      }
      
      .btn-danger {
        @apply btn-base bg-rose-600 text-white hover:bg-rose-700 active:scale-95;
      }
      
      .badge {
        @apply inline-block px-3 py-1 rounded-full text-sm font-medium;
      }
      
      .badge-registered {
        @apply badge bg-blue-100 text-blue-800;
      }
      
      .badge-arrived {
        @apply badge bg-yellow-100 text-yellow-800;
      }
      
      .badge-picked {
        @apply badge bg-green-100 text-green-800;
      }
      
      .card {
        @apply bg-white rounded-xl shadow-md hover:shadow-lg transition duration-200 overflow-hidden;
      }
      
      .input-field {
        @apply w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition;
      }
      
      .input-error {
        @apply border-red-500 focus:ring-red-500;
      }
      
      .gradient-bg {
        background: linear-gradient(135deg, #6B7280 0%, #5B6B7F 100%);
      }
      
      body {
        color: #4B5563;
        background-color: #FAFBFC;
      }
    </style>
  </head>
  <body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
      <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <a href="?route=home" class="flex items-center gap-3 hover:opacity-80 transition">
          <span class="text-3xl">📦</span>
          <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Gestion Colis
          </h1>
        </a>
        <div class="flex items-center gap-4">
          <a href="?route=home" class="text-gray-600 hover:text-blue-600 transition font-medium <?= ($_GET['route'] ?? 'home') === 'home' ? 'text-blue-600 font-bold' : '' ?>">🏠 Accueil</a>
          <a href="?route=dashboard" class="text-gray-600 hover:text-blue-600 transition font-medium <?= ($_GET['route'] ?? '') === 'dashboard' ? 'text-blue-600 font-bold' : '' ?>">📊 Tableau de bord</a>
          <a href="?route=list" class="text-gray-600 hover:text-blue-600 transition font-medium <?= ($_GET['route'] ?? '') === 'list' ? 'text-blue-600 font-bold' : '' ?>">📋 Liste</a>
          <a href="?route=new" class="btn-primary">➕ Nouveau colis</a>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
      <?php include __DIR__ . '/' . $template . '.php'; ?>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-100 border-t border-gray-200 mt-12 py-6">
      <div class="max-w-7xl mx-auto px-4 text-center text-gray-600 text-sm">
        <p>© 2025 Gestion Colis — Plateforme légère pour agences de voyage camerounaises 🇨🇲</p>
      </div>
    </footer>
  </body>
</html>
