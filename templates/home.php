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
      <div class="card p-6 hover:shadow-lg transform hover:scale-102 transition duration-300 border border-slate-200">
        <div class="text-4xl mb-4">📊</div>
        <h3 class="text-lg font-semibold text-slate-900 mb-2">Tableau de bord</h3>
        <p class="text-slate-700 text-sm mb-3">
          Consultez vos statistiques en temps réel : nombre de colis, revenus, taux de completion.
        </p>
        <div class="text-slate-600 font-medium text-sm">→ Voir les stats</div>
      </div>

      <!-- Feature 2 -->
      <div class="card p-6 hover:shadow-lg transform hover:scale-102 transition duration-300 border border-slate-200">
        <div class="text-4xl mb-4">📦</div>
        <h3 class="text-lg font-semibold text-slate-900 mb-2">Gestion des colis</h3>
        <p class="text-slate-700 text-sm mb-3">
          Créez, suivez et mettez à jour vos expéditions avec une interface simple.
        </p>
        <div class="text-slate-600 font-medium text-sm">→ Créer un colis</div>
      </div>

      <!-- Feature 3 -->
      <div class="card p-6 hover:shadow-lg transform hover:scale-102 transition duration-300 border border-slate-200">
        <div class="text-4xl mb-4">💬</div>
        <h3 class="text-lg font-semibold text-slate-900 mb-2">Notifications</h3>
        <p class="text-slate-700 text-sm mb-3">
          Vos clients reçoivent des emails automatiques à chaque étape de leur colis.
        </p>
        <div class="text-slate-600 font-medium text-sm">→ En savoir plus</div>
      </div>

      <!-- Feature 4 -->
      <div class="card p-6 hover:shadow-lg transform hover:scale-102 transition duration-300 border border-slate-200">
        <div class="text-4xl mb-4">💰</div>
        <h3 class="text-lg font-semibold text-slate-900 mb-2">Calcul automatique</h3>
        <p class="text-slate-700 text-sm mb-3">
          Commission 10% calculée automatiquement. Visualisez vos revenus en temps réel.
        </p>
        <div class="text-slate-600 font-medium text-sm">→ Voir les revenus</div>
      </div>

      <!-- Feature 5 -->
      <div class="card p-6 hover:shadow-lg transform hover:scale-102 transition duration-300 border border-slate-200">
        <div class="text-4xl mb-4">📱</div>
        <h3 class="text-lg font-semibold text-slate-900 mb-2">Responsive</h3>
        <p class="text-slate-700 text-sm mb-3">
          Accédez depuis n'importe quel appareil : mobile, tablette ou desktop.
        </p>
        <div class="text-slate-600 font-medium text-sm">→ Essayer maintenant</div>
      </div>

      <!-- Feature 6 -->
      <div class="card p-6 hover:shadow-lg transform hover:scale-102 transition duration-300 border border-slate-200">
        <div class="text-4xl mb-4">⚡</div>
        <h3 class="text-lg font-semibold text-slate-900 mb-2">Rapide et fiable</h3>
        <p class="text-slate-700 text-sm mb-3">
          Plateforme performante avec temps de chargement optimisé et haute disponibilité.
        </p>
        <div class="text-slate-600 font-medium text-sm">→ Vérifier la performance</div>
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

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Plan Gratuit -->
        <div class="card p-6 border border-slate-200">
          <h3 class="text-lg font-semibold text-slate-900 mb-3">Gratuit</h3>
          <div class="text-3xl font-bold text-slate-800 mb-4">0 ₣</div>
          <ul class="space-y-2 mb-6 text-slate-700 text-sm">
            <li>✅ Jusqu'à 100 colis/mois</li>
            <li>✅ Tableau de bord basique</li>
            <li>✅ Notifications email</li>
            <li>❌ Support prioritaire</li>
            <li>❌ API</li>
          </ul>
          <button class="w-full btn-secondary">Commencer</button>
        </div>

        <!-- Plan Pro (vedette) -->
        <div class="card p-6 border-2 border-slate-700 transform scale-105 relative">
          <div class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-slate-700 text-white px-3 py-1 rounded-full text-xs font-medium">
            Populaire
          </div>
          <h3 class="text-lg font-semibold text-slate-900 mb-3">Pro</h3>
          <div class="text-3xl font-bold text-slate-800 mb-1">5.000 ₣</div>
          <div class="text-slate-700 text-sm mb-4">/mois</div>
          <ul class="space-y-2 mb-6 text-slate-700 text-sm">
            <li>✅ Colis illimités</li>
            <li>✅ Dashboard avancé</li>
            <li>✅ Notifications SMS + Email</li>
            <li>✅ Support prioritaire 24/7</li>
            <li>✅ API REST</li>
          </ul>
          <button class="w-full btn-primary">Essayer maintenant</button>
        </div>

        <!-- Plan Enterprise -->
        <div class="card p-6 border border-slate-200">
          <h3 class="text-lg font-semibold text-slate-900 mb-3">Enterprise</h3>
          <div class="text-3xl font-bold text-slate-800 mb-4">Sur devis</div>
          <ul class="space-y-2 mb-6 text-slate-700 text-sm">
            <li>✅ Tout du plan Pro</li>
            <li>✅ Intégrations personnalisées</li>
            <li>✅ SLA garantis</li>
            <li>✅ Dedicated manager</li>
            <li>✅ Training personnalisé</li>
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
    
    <!-- Contenu Hero -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 py-24 sm:py-32 lg:py-40">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <!-- Texte -->
        <div class="text-white animate-slide-in">
          <h1 class="text-5xl lg:text-6xl font-bold mb-6 leading-tight">
            Plateforme de gestion des <span class="text-yellow-300">colis</span> en ligne
          </h1>
          <p class="text-xl lg:text-2xl text-white/90 mb-8 leading-relaxed">
            Gérez vos expéditions, suivez vos colis en temps réel et générez des revenus automatiquement avec notre système intelligent.
          </p>
          
          <!-- Stats -->
          <div class="grid grid-cols-3 gap-4 mb-8">
            <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
              <div class="text-3xl font-bold text-white">10K+</div>
              <p class="text-white/80 text-sm">Colis gérés</p>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
              <div class="text-3xl font-bold text-white">500K</div>
              <p class="text-white/80 text-sm">₣ Revenus</p>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
              <div class="text-3xl font-bold text-white">98%</div>
              <p class="text-white/80 text-sm">Satisfaction</p>
            </div>
          </div>
          
          <!-- Boutons CTA -->
          <div class="flex flex-col sm:flex-row gap-4">
            <a href="?route=dashboard" class="btn-primary px-8 py-4 text-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition">
              🚀 Commencer maintenant
            </a>
            <a href="#features" class="px-8 py-4 bg-white/20 backdrop-blur-sm text-white font-semibold rounded-lg hover:bg-white/30 transition border border-white/30">
              ℹ️ En savoir plus
            </a>
          </div>
        </div>
        
        <!-- Image mockup -->
        <div class="relative hidden lg:block">
          <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-500 rounded-3xl blur-3xl opacity-50 animate-pulse"></div>
          <div class="relative bg-gradient-to-br from-white to-gray-50 rounded-3xl p-8 shadow-2xl transform hover:scale-105 transition duration-300">
            <!-- Mockup téléphone -->
            <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-3xl p-3 aspect-square">
              <div class="bg-white rounded-2xl h-full overflow-hidden flex flex-col">
                <!-- Status bar mockup -->
                <div class="bg-gray-900 text-white text-xs px-4 py-2 flex justify-between items-center">
                  <span>9:41</span>
                  <span>📶 📡 🔋</span>
                </div>
                <!-- Contenu mockup -->
                <div class="flex-1 p-4 overflow-auto">
                  <div class="text-2xl font-bold text-blue-600 mb-4">📦 Colis</div>
                  <div class="space-y-3">
                    <div class="bg-blue-50 rounded-lg p-3 border-l-4 border-blue-600">
                      <div class="font-semibold text-gray-900">#123</div>
                      <div class="text-sm text-gray-600">Jean → Marie</div>
                      <div class="text-sm font-bold text-green-600 mt-1">✅ Retiré</div>
                    </div>
                    <div class="bg-yellow-50 rounded-lg p-3 border-l-4 border-yellow-500">
                      <div class="font-semibold text-gray-900">#124</div>
                      <div class="text-sm text-gray-600">Pierre → Anne</div>
                      <div class="text-sm font-bold text-yellow-600 mt-1">📍 Arrivé</div>
                    </div>
                    <div class="bg-blue-50 rounded-lg p-3 border-l-4 border-blue-400">
                      <div class="font-semibold text-gray-900">#125</div>
                      <div class="text-sm text-gray-600">Luc → Sophie</div>
                      <div class="text-sm font-bold text-blue-600 mt-1">⏳ En attente</div>
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
  <div id="features" class="max-w-7xl mx-auto px-4 py-20">
    <h2 class="text-4xl lg:text-5xl font-bold text-center text-gray-900 mb-4">
      Fonctionnalités <span class="text-blue-600">puissantes</span>
    </h2>
    <p class="text-center text-gray-600 text-xl mb-16 max-w-2xl mx-auto">
      Tout ce dont vous avez besoin pour gérer vos expéditions de manière efficace et professionnelle
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Feature 1 -->
      <div class="card p-8 hover:shadow-2xl transform hover:scale-105 transition duration-300">
        <div class="text-5xl mb-4">📊</div>
        <h3 class="text-2xl font-bold text-gray-900 mb-3">Tableau de bord intelligent</h3>
        <p class="text-gray-600 mb-4">
          Consultez vos statistiques en temps réel : nombre de colis, revenus générés, taux de completion.
        </p>
        <div class="text-blue-600 font-semibold">→ Voir les stats</div>
      </div>

      <!-- Feature 2 -->
      <div class="card p-8 hover:shadow-2xl transform hover:scale-105 transition duration-300">
        <div class="text-5xl mb-4">📦</div>
        <h3 class="text-2xl font-bold text-gray-900 mb-3">Gestion complète des colis</h3>
        <p class="text-gray-600 mb-4">
          Créez, suivez et mettez à jour vos expéditions avec une interface simple et intuitive.
        </p>
        <div class="text-blue-600 font-semibold">→ Créer un colis</div>
      </div>

      <!-- Feature 3 -->
      <div class="card p-8 hover:shadow-2xl transform hover:scale-105 transition duration-300">
        <div class="text-5xl mb-4">💬</div>
        <h3 class="text-2xl font-bold text-gray-900 mb-3">Notifications automatiques</h3>
        <p class="text-gray-600 mb-4">
          Vos clients reçoivent des emails automatiques à chaque étape du suivi de leur colis.
        </p>
        <div class="text-blue-600 font-semibold">→ En savoir plus</div>
      </div>

      <!-- Feature 4 -->
      <div class="card p-8 hover:shadow-2xl transform hover:scale-105 transition duration-300">
        <div class="text-5xl mb-4">💰</div>
        <h3 class="text-2xl font-bold text-gray-900 mb-3">Calcul de prix automatique</h3>
        <p class="text-gray-600 mb-4">
          Commission 10% calculée automatiquement. Visualisez vos revenus en temps réel.
        </p>
        <div class="text-blue-600 font-semibold">→ Voir les revenus</div>
      </div>

      <!-- Feature 5 -->
      <div class="card p-8 hover:shadow-2xl transform hover:scale-105 transition duration-300">
        <div class="text-5xl mb-4">📱</div>
        <h3 class="text-2xl font-bold text-gray-900 mb-3">Design responsive</h3>
        <p class="text-gray-600 mb-4">
          Accédez à votre plateforme depuis n'importe quel appareil : mobile, tablette ou desktop.
        </p>
        <div class="text-blue-600 font-semibold">→ Essayer maintenant</div>
      </div>

      <!-- Feature 6 -->
      <div class="card p-8 hover:shadow-2xl transform hover:scale-105 transition duration-300">
        <div class="text-5xl mb-4">⚡</div>
        <h3 class="text-2xl font-bold text-gray-900 mb-3">Rapide et fiable</h3>
        <p class="text-gray-600 mb-4">
          Plateforme ultra-performante avec temps de chargement optimisé et haute disponibilité.
        </p>
        <div class="text-blue-600 font-semibold">→ Vérifier la performance</div>
      </div>
    </div>
  </div>

  <!-- Comment ça marche -->
  <div class="bg-gradient-to-br from-gray-50 to-gray-100 py-20 mt-20">
    <div class="max-w-7xl mx-auto px-4">
      <h2 class="text-4xl lg:text-5xl font-bold text-center text-gray-900 mb-16">
        Comment ça <span class="text-blue-600">marche</span>
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Step 1 -->
        <div class="relative">
          <div class="flex flex-col items-center">
            <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mb-4">
              1
            </div>
            <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Créer un colis</h3>
            <p class="text-center text-gray-600">
              Remplissez le formulaire avec les informations de l'expéditeur et du destinataire.
            </p>
          </div>
          <div class="hidden md:block absolute top-20 -right-4 w-8 h-1 bg-blue-600"></div>
        </div>

        <!-- Step 2 -->
        <div class="relative">
          <div class="flex flex-col items-center">
            <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mb-4">
              2
            </div>
            <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Notification envoyée</h3>
            <p class="text-center text-gray-600">
              Un email automatique est envoyé à votre client pour confirmer la réception.
            </p>
          </div>
          <div class="hidden md:block absolute top-20 -right-4 w-8 h-1 bg-blue-600"></div>
        </div>

        <!-- Step 3 -->
        <div class="relative">
          <div class="flex flex-col items-center">
            <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mb-4">
              3
            </div>
            <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Marquer arrivé</h3>
            <p class="text-center text-gray-600">
              Mettez à jour le statut du colis au fur et à mesure du traitement.
            </p>
          </div>
          <div class="hidden md:block absolute top-20 -right-4 w-8 h-1 bg-blue-600"></div>
        </div>

        <!-- Step 4 -->
        <div>
          <div class="flex flex-col items-center">
            <div class="w-16 h-16 bg-green-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mb-4">
              ✓
            </div>
            <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Colis retiré</h3>
            <p class="text-center text-gray-600">
              Confirmez le retrait et le client reçoit une notification finale.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Logos des clients -->
  <div class="max-w-7xl mx-auto px-4 py-20">
    <h3 class="text-center text-gray-600 text-lg font-semibold mb-12">
      Utilisé par les meilleures agences de voyage
    </h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center justify-center">
      <div class="flex items-center justify-center h-16 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
        <span class="text-gray-700 font-bold">✈️ Agence X</span>
      </div>
      <div class="flex items-center justify-center h-16 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
        <span class="text-gray-700 font-bold">🌍 Voyage Plus</span>
      </div>
      <div class="flex items-center justify-center h-16 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
        <span class="text-gray-700 font-bold">🎫 Tours Co</span>
      </div>
      <div class="flex items-center justify-center h-16 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
        <span class="text-gray-700 font-bold">🏖️ Holidays</span>
      </div>
    </div>
  </div>

  <!-- Pricing Section -->
  <div class="bg-gradient-to-br from-blue-50 to-purple-50 py-20 mt-20">
    <div class="max-w-7xl mx-auto px-4">
      <h2 class="text-4xl lg:text-5xl font-bold text-center text-gray-900 mb-4">
        Tarification <span class="text-blue-600">simple</span>
      </h2>
      <p class="text-center text-gray-600 text-xl mb-16 max-w-2xl mx-auto">
        Commencez gratuitement, payez seulement quand vous grandissez
      </p>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Plan Gratuit -->
        <div class="card p-8">
          <h3 class="text-2xl font-bold text-gray-900 mb-4">🎁 Gratuit</h3>
          <div class="text-4xl font-bold text-blue-600 mb-6">0 ₣</div>
          <ul class="space-y-3 mb-8 text-gray-600">
            <li>✅ Jusqu'à 100 colis/mois</li>
            <li>✅ Tableau de bord basique</li>
            <li>✅ Notifications email</li>
            <li>❌ Support prioritaire</li>
            <li>❌ API</li>
          </ul>
          <button class="w-full btn-secondary">Commencer</button>
        </div>

        <!-- Plan Pro (vedette) -->
        <div class="card p-8 border-2 border-blue-600 transform scale-105 relative">
          <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-blue-600 text-white px-4 py-1 rounded-full text-sm font-semibold">
            Populaire
          </div>
          <h3 class="text-2xl font-bold text-gray-900 mb-4">⭐ Pro</h3>
          <div class="text-4xl font-bold text-blue-600 mb-2">5.000 ₣</div>
          <div class="text-gray-600 text-sm mb-6">/mois</div>
          <ul class="space-y-3 mb-8 text-gray-600">
            <li>✅ Colis illimités</li>
            <li>✅ Dashboard avancé avec analytics</li>
            <li>✅ Notifications SMS + Email</li>
            <li>✅ Support prioritaire 24/7</li>
            <li>✅ API REST</li>
          </ul>
          <button class="w-full btn-primary">Essayer maintenant</button>
        </div>

        <!-- Plan Enterprise -->
        <div class="card p-8">
          <h3 class="text-2xl font-bold text-gray-900 mb-4">🚀 Enterprise</h3>
          <div class="text-4xl font-bold text-gray-900 mb-6">Sur devis</div>
          <ul class="space-y-3 mb-8 text-gray-600">
            <li>✅ Tout du plan Pro</li>
            <li>✅ Intégrations personnalisées</li>
            <li>✅ SLA garantis</li>
            <li>✅ Dedicated account manager</li>
            <li>✅ Training personnalisé</li>
          </ul>
          <button class="w-full btn-secondary">Nous contacter</button>
        </div>
      </div>
    </div>
  </div>

  <!-- FAQ Section -->
  <div class="max-w-4xl mx-auto px-4 py-20">
    <h2 class="text-4xl font-bold text-center text-gray-900 mb-16">
      Questions <span class="text-blue-600">fréquentes</span>
    </h2>

    <div class="space-y-4">
      <details class="card p-6 cursor-pointer group">
        <summary class="flex justify-between items-center font-bold text-lg text-gray-900 group-open:text-blue-600">
          Comment puis-je créer mon premier colis?
          <span class="transform group-open:rotate-180 transition">▼</span>
        </summary>
        <p class="text-gray-600 mt-4">
          Cliquez sur "Nouveau colis" dans le menu, remplissez les informations de l'expéditeur et du destinataire, et le système calculera automatiquement le prix. Un email est envoyé à votre client.
        </p>
      </details>

      <details class="card p-6 cursor-pointer group">
        <summary class="flex justify-between items-center font-bold text-lg text-gray-900 group-open:text-blue-600">
          Comment fonctionnent les notifications?
          <span class="transform group-open:rotate-180 transition">▼</span>
        </summary>
        <p class="text-gray-600 mt-4">
          Nos clients reçoivent automatiquement des emails à chaque étape: enregistrement du colis, notification d'arrivée, et confirmation de retrait. C'est automatisé et gratuit.
        </p>
      </details>

      <details class="card p-6 cursor-pointer group">
        <summary class="flex justify-between items-center font-bold text-lg text-gray-900 group-open:text-blue-600">
          Combien coûte chaque expédition?
          <span class="transform group-open:rotate-180 transition">▼</span>
        </summary>
        <p class="text-gray-600 mt-4">
          Nous prélevons une commission de 10% sur la valeur déclarée de chaque colis. Le système calcule automatiquement le prix. Par exemple, pour un colis de 50.000 FCFA, la commission sera 5.000 FCFA.
        </p>
      </details>

      <details class="card p-6 cursor-pointer group">
        <summary class="flex justify-between items-center font-bold text-lg text-gray-900 group-open:text-blue-600">
          Puis-je utiliser sur mobile?
          <span class="transform group-open:rotate-180 transition">▼</span>
        </summary>
        <p class="text-gray-600 mt-4">
          Oui! Notre plateforme est entièrement responsive. Vous pouvez gérer vos colis depuis n'importe quel appareil: smartphone, tablette ou ordinateur.
        </p>
      </details>

      <details class="card p-6 cursor-pointer group">
        <summary class="flex justify-between items-center font-bold text-lg text-gray-900 group-open:text-blue-600">
          Mes données sont-elles sécurisées?
          <span class="transform group-open:rotate-180 transition">▼</span>
        </summary>
        <p class="text-gray-600 mt-4">
          Oui, vos données sont stockées de manière sécurisée avec chiffrement. Nous respectons les meilleures pratiques de sécurité pour protéger vos informations et celles de vos clients.
        </p>
      </details>
    </div>
  </div>

  <!-- CTA Final -->
  <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20 rounded-3xl mt-20 mx-4">
    <div class="max-w-4xl mx-auto text-center px-4">
      <h2 class="text-4xl lg:text-5xl font-bold mb-6">
        Prêt à commencer?
      </h2>
      <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
        Rejoignez des centaines d'agences de voyage qui font confiance à notre plateforme pour gérer leurs expéditions.
      </p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="?route=dashboard" class="px-8 py-4 bg-white text-blue-600 font-bold rounded-lg hover:bg-gray-100 transition transform hover:scale-105">
          🚀 Accédez au tableau de bord
        </a>
        <a href="#" class="px-8 py-4 border-2 border-white text-white font-bold rounded-lg hover:bg-white/10 transition">
          📞 Contactez-nous
        </a>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-16 mt-20">
    <div class="max-w-7xl mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
        <!-- About -->
        <div>
          <h3 class="text-xl font-bold mb-4">📦 Gestion Colis</h3>
          <p class="text-gray-400">
            La plateforme idéale pour gérer vos expéditions avec simplicité et professionnalisme.
          </p>
        </div>

        <!-- Product -->
        <div>
          <h4 class="font-bold mb-4">Produit</h4>
          <ul class="space-y-2 text-gray-400">
            <li><a href="#features" class="hover:text-white transition">Fonctionnalités</a></li>
            <li><a href="#" class="hover:text-white transition">Tarification</a></li>
            <li><a href="#" class="hover:text-white transition">Sécurité</a></li>
            <li><a href="#" class="hover:text-white transition">API</a></li>
          </ul>
        </div>

        <!-- Company -->
        <div>
          <h4 class="font-bold mb-4">Entreprise</h4>
          <ul class="space-y-2 text-gray-400">
            <li><a href="#" class="hover:text-white transition">À propos</a></li>
            <li><a href="#" class="hover:text-white transition">Blog</a></li>
            <li><a href="#" class="hover:text-white transition">Carrières</a></li>
            <li><a href="#" class="hover:text-white transition">Contact</a></li>
          </ul>
        </div>

        <!-- Legal -->
        <div>
          <h4 class="font-bold mb-4">Légal</h4>
          <ul class="space-y-2 text-gray-400">
            <li><a href="#" class="hover:text-white transition">Confidentialité</a></li>
            <li><a href="#" class="hover:text-white transition">Conditions</a></li>
            <li><a href="#" class="hover:text-white transition">Cookies</a></li>
            <li><a href="#" class="hover:text-white transition">Compliance</a></li>
          </ul>
        </div>
      </div>

      <div class="border-t border-gray-800 pt-8">
        <div class="flex flex-col md:flex-row justify-between items-center text-gray-400">
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

<style>
@keyframes blob {
  0%, 100% { transform: translate(0, 0) scale(1); }
  33% { transform: translate(30px, -50px) scale(1.1); }
  66% { transform: translate(-20px, 20px) scale(0.9); }
}

.animate-blob {
  animation: blob 7s infinite;
}

.animation-delay-2000 {
  animation-delay: 2s;
}
</style>
