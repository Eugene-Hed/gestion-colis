<div class="animate-fade-in">
  
  <!-- Hero Section avec gradient sobre -->
  <div class="relative overflow-hidden mb-16">
    <!-- Gradient background subtle -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-100 via-blue-50 to-slate-100 opacity-80"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-slate-300 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob"></div>
    <div class="absolute -bottom-8 left-20 w-72 h-72 bg-slate-400 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000"></div>
    
    <!-- Contenu Hero -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 py-20 sm:py-24 lg:py-28">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <!-- Texte -->
        <div class="text-slate-900 animate-slide-in">
          <h1 class="text-4xl lg:text-5xl font-bold mb-4 leading-tight text-slate-900">
            Gestion simple des <span class="text-slate-600">colis en ligne</span>
          </h1>
          <p class="text-lg lg:text-xl text-slate-700 mb-8 leading-relaxed">
            Gérez vos expéditions, suivez vos colis et générez des revenus automatiquement avec un système fiable et discret.
          </p>
          
          <!-- Stats -->
          <div class="grid grid-cols-3 gap-4 mb-8">
            <div class="bg-white/60 backdrop-blur-sm rounded-lg p-4 border border-slate-200">
              <div class="text-2xl font-semibold text-slate-800">10K+</div>
              <p class="text-slate-600 text-sm">Colis gérés</p>
            </div>
            <div class="bg-white/60 backdrop-blur-sm rounded-lg p-4 border border-slate-200">
              <div class="text-2xl font-semibold text-slate-800">500K</div>
              <p class="text-slate-600 text-sm">₣ Revenus</p>
            </div>
            <div class="bg-white/60 backdrop-blur-sm rounded-lg p-4 border border-slate-200">
              <div class="text-2xl font-semibold text-slate-800">98%</div>
              <p class="text-slate-600 text-sm">Satisfaction</p>
            </div>
          </div>
          
          <!-- Boutons CTA -->
          <div class="flex flex-col sm:flex-row gap-4">
            <a href="?route=dashboard" class="btn-primary px-6 py-3 text-base font-medium shadow-md hover:shadow-lg transform hover:scale-105 transition">
              Commencer
            </a>
            <a href="#features" class="px-6 py-3 bg-white text-slate-700 font-medium rounded-lg hover:bg-slate-50 transition border border-slate-300">
              En savoir plus
            </a>
          </div>
        </div>
        
        <!-- Image mockup -->
        <div class="relative hidden lg:block">
          <div class="absolute inset-0 bg-gradient-to-r from-slate-300 to-slate-400 rounded-3xl blur-2xl opacity-20"></div>
          <div class="relative bg-white rounded-2xl p-6 shadow-lg border border-slate-200">
            <!-- Mockup téléphone -->
            <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-2 aspect-square">
              <div class="bg-white rounded-xl h-full overflow-hidden flex flex-col">
                <!-- Status bar mockup -->
                <div class="bg-slate-800 text-white text-xs px-4 py-2 flex justify-between items-center">
                  <span>9:41</span>
                  <span>📶 📡 🔋</span>
                </div>
                <!-- Contenu mockup -->
                <div class="flex-1 p-3 overflow-auto">
                  <div class="text-lg font-semibold text-slate-800 mb-3">Colis</div>
                  <div class="space-y-2">
                    <div class="bg-blue-50 rounded-lg p-2 border-l-4 border-blue-600">
                      <div class="font-medium text-slate-900 text-sm">#123</div>
                      <div class="text-xs text-slate-600">Jean → Marie</div>
                      <div class="text-xs font-semibold text-emerald-700 mt-1">✅ Retiré</div>
                    </div>
                    <div class="bg-amber-50 rounded-lg p-2 border-l-4 border-amber-500">
                      <div class="font-medium text-slate-900 text-sm">#124</div>
                      <div class="text-xs text-slate-600">Pierre → Anne</div>
                      <div class="text-xs font-semibold text-amber-700 mt-1">📍 Arrivé</div>
                    </div>
                    <div class="bg-blue-50 rounded-lg p-2 border-l-4 border-blue-400">
                      <div class="font-medium text-slate-900 text-sm">#125</div>
                      <div class="text-xs text-slate-600">Luc → Sophie</div>
                      <div class="text-xs font-semibold text-blue-600 mt-1">⏳ En attente</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Features Section -->
  <div id="features" class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl lg:text-4xl font-bold text-center text-slate-900 mb-3">
      Fonctionnalités <span class="text-slate-600">complètes</span>
    </h2>
    <p class="text-center text-slate-700 text-base mb-12 max-w-2xl mx-auto">
      Tout ce dont vous avez besoin pour gérer vos expéditions de manière efficace et professionnelle
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Feature 1 -->
      <div class="card p-8 hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
        <div class="text-5xl mb-5">📊</div>
        <h3 class="text-xl font-semibold text-slate-900 mb-3">Tableau de bord</h3>
        <p class="text-slate-600 text-sm mb-4 leading-relaxed">
          Consultez vos statistiques en temps réel : nombre de colis, revenus, taux de completion.
        </p>
        <div class="text-slate-700 font-semibold text-sm">→ Voir les stats</div>
      </div>

      <!-- Feature 2 -->
      <div class="card p-8 hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
        <div class="text-5xl mb-5">📦</div>
        <h3 class="text-xl font-semibold text-slate-900 mb-3">Gestion des colis</h3>
        <p class="text-slate-600 text-sm mb-4 leading-relaxed">
          Créez, suivez et mettez à jour vos expéditions avec une interface simple.
        </p>
        <div class="text-slate-700 font-semibold text-sm">→ Créer un colis</div>
      </div>

      <!-- Feature 3 -->
      <div class="card p-8 hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
        <div class="text-5xl mb-5">💬</div>
        <h3 class="text-xl font-semibold text-slate-900 mb-3">Notifications</h3>
        <p class="text-slate-600 text-sm mb-4 leading-relaxed">
          Vos clients reçoivent des emails automatiques à chaque étape de leur colis.
        </p>
        <div class="text-slate-700 font-semibold text-sm">→ En savoir plus</div>
      </div>

      <!-- Feature 4 -->
      <div class="card p-8 hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
        <div class="text-5xl mb-5">💰</div>
        <h3 class="text-xl font-semibold text-slate-900 mb-3">Calcul automatique</h3>
        <p class="text-slate-600 text-sm mb-4 leading-relaxed">
          Commission 10% calculée automatiquement. Visualisez vos revenus en temps réel.
        </p>
        <div class="text-slate-700 font-semibold text-sm">→ Voir les revenus</div>
      </div>

      <!-- Feature 5 -->
      <div class="card p-8 hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
        <div class="text-5xl mb-5">📱</div>
        <h3 class="text-xl font-semibold text-slate-900 mb-3">Responsive</h3>
        <p class="text-slate-600 text-sm mb-4 leading-relaxed">
          Accédez depuis n'importe quel appareil : mobile, tablette ou desktop.
        </p>
        <div class="text-slate-700 font-semibold text-sm">→ Essayer maintenant</div>
      </div>

      <!-- Feature 6 -->
      <div class="card p-8 hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
        <div class="text-5xl mb-5">⚡</div>
        <h3 class="text-xl font-semibold text-slate-900 mb-3">Rapide et fiable</h3>
        <p class="text-slate-600 text-sm mb-4 leading-relaxed">
          Plateforme performante avec temps de chargement optimisé et haute disponibilité.
        </p>
        <div class="text-slate-700 font-semibold text-sm">→ Vérifier la performance</div>
      </div>
    </div>
  </div>

  <!-- Comment ça marche -->
  <div class="bg-white py-16 mt-16 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4">
      <h2 class="text-3xl lg:text-4xl font-bold text-center text-slate-900 mb-12">
        Comment ça <span class="text-slate-600">marche</span>
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Step 1 -->
        <div class="relative">
          <div class="flex flex-col items-center">
            <div class="w-14 h-14 bg-slate-700 text-white rounded-full flex items-center justify-center text-lg font-bold mb-3">
              1
            </div>
            <h3 class="text-base font-semibold text-slate-900 text-center mb-2">Créer</h3>
            <p class="text-center text-slate-700 text-sm">
              Remplissez le formulaire avec les informations.
            </p>
          </div>
          <div class="hidden md:block absolute top-16 -right-3 w-6 h-1 bg-slate-400"></div>
        </div>

        <!-- Step 2 -->
        <div class="relative">
          <div class="flex flex-col items-center">
            <div class="w-14 h-14 bg-slate-700 text-white rounded-full flex items-center justify-center text-lg font-bold mb-3">
              2
            </div>
            <h3 class="text-base font-semibold text-slate-900 text-center mb-2">Notifier</h3>
            <p class="text-center text-slate-700 text-sm">
              Un email est envoyé à votre client.
            </p>
          </div>
          <div class="hidden md:block absolute top-16 -right-3 w-6 h-1 bg-slate-400"></div>
        </div>

        <!-- Step 3 -->
        <div class="relative">
          <div class="flex flex-col items-center">
            <div class="w-14 h-14 bg-slate-700 text-white rounded-full flex items-center justify-center text-lg font-bold mb-3">
              3
            </div>
            <h3 class="text-base font-semibold text-slate-900 text-center mb-2">Suivre</h3>
            <p class="text-center text-slate-700 text-sm">
              Mettez à jour le statut du colis.
            </p>
          </div>
          <div class="hidden md:block absolute top-16 -right-3 w-6 h-1 bg-slate-400"></div>
        </div>

        <!-- Step 4 -->
        <div>
          <div class="flex flex-col items-center">
            <div class="w-14 h-14 bg-emerald-700 text-white rounded-full flex items-center justify-center text-lg font-bold mb-3">
              ✓
            </div>
            <h3 class="text-base font-semibold text-slate-900 text-center mb-2">Complété</h3>
            <p class="text-center text-slate-700 text-sm">
              Le client reçoit une notification finale.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Logos clients -->
  <div class="max-w-7xl mx-auto px-4 py-16">
    <p class="text-center text-slate-600 font-medium mb-10">
      Utilisé par les meilleures agences de voyage
    </p>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 items-center justify-center">
      <div class="flex items-center justify-center h-14 bg-white border border-slate-200 rounded-lg hover:border-slate-300 transition">
        <span class="text-slate-700 font-medium text-sm">✈️ Agence X</span>
      </div>
      <div class="flex items-center justify-center h-14 bg-white border border-slate-200 rounded-lg hover:border-slate-300 transition">
        <span class="text-slate-700 font-medium text-sm">🌍 Voyage Plus</span>
      </div>
      <div class="flex items-center justify-center h-14 bg-white border border-slate-200 rounded-lg hover:border-slate-300 transition">
        <span class="text-slate-700 font-medium text-sm">🎫 Tours Co</span>
      </div>
      <div class="flex items-center justify-center h-14 bg-white border border-slate-200 rounded-lg hover:border-slate-300 transition">
        <span class="text-slate-700 font-medium text-sm">🏖️ Holidays</span>
      </div>
    </div>
  </div>

  <!-- Pricing Section -->
  <div class="bg-white py-16 mt-16 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4">
      <h2 class="text-3xl lg:text-4xl font-bold text-center text-slate-900 mb-3">
        Tarification <span class="text-slate-600">simple</span>
      </h2>
      <p class="text-center text-slate-700 text-base mb-12 max-w-2xl mx-auto">
        Commencez gratuitement, payez seulement quand vous grandissez
      </p>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Plan Gratuit -->
        <div class="card p-8 hover:shadow-xl transition-all duration-300">
          <h3 class="text-2xl font-semibold text-slate-900 mb-4">Gratuit</h3>
          <div class="mb-6">
            <span class="text-4xl font-bold text-slate-800">0</span>
            <span class="text-slate-600 ml-1">₣</span>
          </div>
          <ul class="space-y-3 mb-8 text-slate-700 text-sm">
            <li class="flex items-center gap-2">
              <span class="text-emerald-600">✓</span> Jusqu'à 100 colis/mois
            </li>
            <li class="flex items-center gap-2">
              <span class="text-emerald-600">✓</span> Tableau de bord basique
            </li>
            <li class="flex items-center gap-2">
              <span class="text-emerald-600">✓</span> Notifications email
            </li>
            <li class="flex items-center gap-2">
              <span class="text-slate-400">✗</span> Support prioritaire
            </li>
            <li class="flex items-center gap-2">
              <span class="text-slate-400">✗</span> API
            </li>
          </ul>
          <button class="w-full btn-secondary">Commencer</button>
        </div>

        <!-- Plan Pro (vedette) -->
        <div class="card p-8 bg-gradient-to-br from-slate-800 to-slate-900 text-white hover:shadow-2xl transition-all duration-300 relative">
          <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-emerald-600 text-white px-4 py-1 rounded-full text-xs font-semibold">
            Populaire
          </div>
          <h3 class="text-2xl font-semibold mb-4">Pro</h3>
          <div class="mb-6">
            <span class="text-5xl font-bold">5.000</span>
            <span class="text-white/70 ml-2">₣</span>
            <div class="text-sm text-white/60 mt-2">/mois</div>
          </div>
          <ul class="space-y-3 mb-8 text-sm">
            <li class="flex items-center gap-2">
              <span class="text-emerald-400">✓</span> Colis illimités
            </li>
            <li class="flex items-center gap-2">
              <span class="text-emerald-400">✓</span> Dashboard avancé
            </li>
            <li class="flex items-center gap-2">
              <span class="text-emerald-400">✓</span> Notifications SMS + Email
            </li>
            <li class="flex items-center gap-2">
              <span class="text-emerald-400">✓</span> Support prioritaire 24/7
            </li>
            <li class="flex items-center gap-2">
              <span class="text-emerald-400">✓</span> API REST
            </li>
          </ul>
          <button class="w-full bg-emerald-600 text-white font-semibold py-3 rounded-lg hover:bg-emerald-700 transition-colors">
            Essayer maintenant
          </button>
        </div>

        <!-- Plan Enterprise -->
        <div class="card p-8 hover:shadow-xl transition-all duration-300">
          <h3 class="text-2xl font-semibold text-slate-900 mb-4">Enterprise</h3>
          <div class="mb-6">
            <span class="text-3xl font-bold text-slate-800">Sur devis</span>
          </div>
          <ul class="space-y-3 mb-8 text-slate-700 text-sm">
            <li class="flex items-center gap-2">
              <span class="text-emerald-600">✓</span> Tout du plan Pro
            </li>
            <li class="flex items-center gap-2">
              <span class="text-emerald-600">✓</span> Intégrations personnalisées
            </li>
            <li class="flex items-center gap-2">
              <span class="text-emerald-600">✓</span> SLA garantis
            </li>
            <li class="flex items-center gap-2">
              <span class="text-emerald-600">✓</span> Dedicated manager
            </li>
            <li class="flex items-center gap-2">
              <span class="text-emerald-600">✓</span> Training personnalisé
            </li>
          </ul>
          <button class="w-full btn-secondary">Nous contacter</button>
        </div>
      </div>
    </div>
  </div>

  <!-- FAQ Section -->
  <div class="max-w-4xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-center text-slate-900 mb-12">
      Questions <span class="text-slate-600">fréquentes</span>
    </h2>

    <div class="space-y-3">
      <details class="card p-5 cursor-pointer group border border-slate-200">
        <summary class="flex justify-between items-center font-semibold text-base text-slate-900 group-open:text-slate-700">
          Comment créer mon premier colis?
          <span class="transform group-open:rotate-180 transition text-sm">▼</span>
        </summary>
        <p class="text-slate-700 mt-3 text-sm">
          Cliquez sur "Nouveau colis", remplissez les informations de l'expéditeur et du destinataire, et le système calculera automatiquement le prix. Un email est envoyé à votre client.
        </p>
      </details>

      <details class="card p-5 cursor-pointer group border border-slate-200">
        <summary class="flex justify-between items-center font-semibold text-base text-slate-900 group-open:text-slate-700">
          Comment fonctionnent les notifications?
          <span class="transform group-open:rotate-180 transition text-sm">▼</span>
        </summary>
        <p class="text-slate-700 mt-3 text-sm">
          Nos clients reçoivent automatiquement des emails à chaque étape : enregistrement du colis, notification d'arrivée, et confirmation de retrait. C'est automatisé et gratuit.
        </p>
      </details>

      <details class="card p-5 cursor-pointer group border border-slate-200">
        <summary class="flex justify-between items-center font-semibold text-base text-slate-900 group-open:text-slate-700">
          Combien coûte chaque expédition?
          <span class="transform group-open:rotate-180 transition text-sm">▼</span>
        </summary>
        <p class="text-slate-700 mt-3 text-sm">
          Nous prélevons une commission de 10% sur la valeur déclarée de chaque colis. Le système calcule automatiquement le prix. Par exemple, pour un colis de 50.000 FCFA, la commission sera 5.000 FCFA.
        </p>
      </details>

      <details class="card p-5 cursor-pointer group border border-slate-200">
        <summary class="flex justify-between items-center font-semibold text-base text-slate-900 group-open:text-slate-700">
          Puis-je utiliser sur mobile?
          <span class="transform group-open:rotate-180 transition text-sm">▼</span>
        </summary>
        <p class="text-slate-700 mt-3 text-sm">
          Oui! Notre plateforme est entièrement responsive. Vous pouvez gérer vos colis depuis n'importe quel appareil : smartphone, tablette ou ordinateur.
        </p>
      </details>

      <details class="card p-5 cursor-pointer group border border-slate-200">
        <summary class="flex justify-between items-center font-semibold text-base text-slate-900 group-open:text-slate-700">
          Mes données sont-elles sécurisées?
          <span class="transform group-open:rotate-180 transition text-sm">▼</span>
        </summary>
        <p class="text-slate-700 mt-3 text-sm">
          Oui, vos données sont stockées de manière sécurisée avec chiffrement. Nous respectons les meilleures pratiques de sécurité pour protéger vos informations et celles de vos clients.
        </p>
      </details>
    </div>
  </div>

  <!-- CTA Final -->
  <div class="bg-slate-700 text-white py-16 rounded-2xl mt-16 mx-4">
    <div class="max-w-4xl mx-auto text-center px-4">
      <h2 class="text-3xl lg:text-4xl font-bold mb-4">
        Prêt à commencer?
      </h2>
      <p class="text-lg text-slate-100 mb-8 max-w-2xl mx-auto">
        Rejoignez des agences de voyage qui font confiance à notre plateforme.
      </p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="?route=dashboard" class="px-6 py-3 bg-white text-slate-700 font-semibold rounded-lg hover:bg-slate-100 transition">
          Accédez au tableau de bord
        </a>
        <a href="#" class="px-6 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-slate-800 transition">
          Contactez-nous
        </a>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-slate-900 text-slate-300 py-12 mt-16">
    <div class="max-w-7xl mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
        <!-- About -->
        <div>
          <h3 class="text-base font-semibold text-white mb-3">Gestion Colis</h3>
          <p class="text-slate-400 text-sm">
            La plateforme idéale pour gérer vos expéditions avec simplicité et professionnalisme.
          </p>
        </div>

        <!-- Product -->
        <div>
          <h4 class="font-semibold text-white mb-3 text-sm">Produit</h4>
          <ul class="space-y-2 text-slate-400 text-sm">
            <li><a href="#features" class="hover:text-white transition">Fonctionnalités</a></li>
            <li><a href="#" class="hover:text-white transition">Tarification</a></li>
            <li><a href="#" class="hover:text-white transition">Sécurité</a></li>
            <li><a href="#" class="hover:text-white transition">API</a></li>
          </ul>
        </div>

        <!-- Company -->
        <div>
          <h4 class="font-semibold text-white mb-3 text-sm">Entreprise</h4>
          <ul class="space-y-2 text-slate-400 text-sm">
            <li><a href="#" class="hover:text-white transition">À propos</a></li>
            <li><a href="#" class="hover:text-white transition">Blog</a></li>
            <li><a href="#" class="hover:text-white transition">Carrières</a></li>
            <li><a href="#" class="hover:text-white transition">Contact</a></li>
          </ul>
        </div>

        <!-- Legal -->
        <div>
          <h4 class="font-semibold text-white mb-3 text-sm">Légal</h4>
          <ul class="space-y-2 text-slate-400 text-sm">
            <li><a href="#" class="hover:text-white transition">Confidentialité</a></li>
            <li><a href="#" class="hover:text-white transition">Conditions</a></li>
            <li><a href="#" class="hover:text-white transition">Cookies</a></li>
            <li><a href="#" class="hover:text-white transition">Compliance</a></li>
          </ul>
        </div>
      </div>

      <div class="border-t border-slate-700 pt-8">
        <div class="flex flex-col md:flex-row justify-between items-center text-slate-400 text-sm">
          <p>© 2025 Gestion Colis. Tous droits réservés.</p>
          <div class="flex gap-6 mt-4 md:mt-0">
            <a href="#" class="hover:text-white transition">Twitter</a>
            <a href="#" class="hover:text-white transition">Facebook</a>
            <a href="#" class="hover:text-white transition">LinkedIn</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

</div>
