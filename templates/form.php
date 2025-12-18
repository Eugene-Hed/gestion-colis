<div class="max-w-2xl mx-auto animate-fade-in">
  <div class="card p-8">
    <h2 class="text-3xl font-bold text-gray-900 mb-8">📦 Enregistrer un nouveau colis</h2>
    
    <form method="POST" action="?route=create" class="space-y-6" id="shipmentForm">
      
      <!-- Section Expéditeur -->
      <div class="bg-slate-50 p-6 rounded-lg border border-slate-300">
        <h3 class="text-lg font-semibold text-slate-900 mb-4">👤 Informations de l'expéditeur</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label for="sender_name" class="block text-sm font-medium text-gray-700 mb-2">
              Nom complet <span class="text-red-500">*</span>
            </label>
            <input type="text" id="sender_name" name="sender_name" class="input-field" 
              placeholder="Ex: Jean Dupont" required>
            <span class="error-message text-red-500 text-sm mt-1 hidden">Ce champ est requis</span>
          </div>
          
          <div>
            <label for="sender_phone" class="block text-sm font-medium text-gray-700 mb-2">
              Téléphone <span class="text-red-500">*</span>
            </label>
            <input type="tel" id="sender_phone" name="sender_phone" class="input-field" 
              placeholder="Ex: +237 6XX XXX XXX" required>
            <span class="error-message text-red-500 text-sm mt-1 hidden">Téléphone invalide</span>
          </div>
          
          <div class="md:col-span-2">
            <label for="sender_email" class="block text-sm font-medium text-gray-700 mb-2">
              Email <span class="text-red-500">*</span>
            </label>
            <input type="email" id="sender_email" name="sender_email" class="input-field" 
              placeholder="Ex: jean@example.com" required>
            <span class="error-message text-red-500 text-sm mt-1 hidden">Email invalide</span>
          </div>
        </div>
      </div>
      
      <!-- Section Destinataire -->
      <div class="bg-emerald-50 p-6 rounded-lg border border-emerald-300">
        <h3 class="text-lg font-semibold text-emerald-900 mb-4">🎁 Informations du destinataire</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label for="receiver_name" class="block text-sm font-medium text-gray-700 mb-2">
              Nom complet <span class="text-red-500">*</span>
            </label>
            <input type="text" id="receiver_name" name="receiver_name" class="input-field" 
              placeholder="Ex: Marie Martin" required>
            <span class="error-message text-red-500 text-sm mt-1 hidden">Ce champ est requis</span>
          </div>
          
          <div>
            <label for="receiver_phone" class="block text-sm font-medium text-gray-700 mb-2">
              Téléphone <span class="text-red-500">*</span>
            </label>
            <input type="tel" id="receiver_phone" name="receiver_phone" class="input-field" 
              placeholder="Ex: +237 6XX XXX XXX" required>
            <span class="error-message text-red-500 text-sm mt-1 hidden">Téléphone invalide</span>
          </div>
          
          <div class="md:col-span-2">
            <label for="receiver_email" class="block text-sm font-medium text-gray-700 mb-2">
              Email <span class="text-red-500">*</span>
            </label>
            <input type="email" id="receiver_email" name="receiver_email" class="input-field" 
              placeholder="Ex: marie@example.com" required>
            <span class="error-message text-red-500 text-sm mt-1 hidden">Email invalide</span>
          </div>
        </div>
      </div>
      
      <!-- Section Colis -->
      <div class="bg-slate-50 p-6 rounded-lg border border-slate-300">
        <h3 class="text-lg font-semibold text-slate-900 mb-4">📋 Détails du colis</h3>
        
        <div>
          <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
            Description <span class="text-red-500">*</span>
          </label>
          <textarea id="description" name="description" class="input-field" 
            placeholder="Décrivez le contenu du colis..." rows="3" required></textarea>
          <span class="error-message text-red-500 text-sm mt-1 hidden">Ce champ est requis</span>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
          <div>
            <label for="value" class="block text-sm font-medium text-gray-700 mb-2">
              Valeur déclarée (FCFA) <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <input type="number" id="value" name="value" class="input-field" 
                placeholder="Ex: 50000" min="100" step="100" required>
              <span class="absolute right-3 top-3 text-gray-500">₣</span>
            </div>
            <span class="error-message text-red-500 text-sm mt-1 hidden">Valeur minimum: 100 FCFA</span>
          </div>
          
          <div>
            <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
              Prix calculé (10%) 💰
            </label>
            <div class="relative">
              <input type="number" id="price" name="price" class="input-field bg-green-100 font-semibold" 
                placeholder="0" readonly>
              <span class="absolute right-3 top-3 text-green-600 font-bold">₣</span>
            </div>
            <p class="text-sm text-gray-600 mt-1">Calculé automatiquement</p>
          </div>
        </div>
      </div>
      
      <!-- Actions -->
      <div class="flex gap-4 pt-6">
        <button type="submit" class="btn-primary flex-1">
          ✅ Créer le colis
        </button>
        <a href="?route=list" class="btn-secondary flex-1 text-center">
          ❌ Annuler
        </a>
      </div>
    </form>
  </div>
</div>

<script>
// Calcul automatique du prix (10%)
const valueInput = document.getElementById('value');
const priceInput = document.getElementById('price');

valueInput.addEventListener('input', function() {
  const value = parseFloat(this.value) || 0;
  const price = (value * 0.10).toFixed(0);
  priceInput.value = price;
});

// Validation du formulaire
const form = document.getElementById('shipmentForm');
const inputs = form.querySelectorAll('input[required], textarea[required]');

inputs.forEach(input => {
  input.addEventListener('blur', function() {
    validateField(this);
  });
});

function validateField(field) {
  const errorMsg = field.parentElement.querySelector('.error-message');
  let isValid = true;

  if (field.type === 'email') {
    isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value);
  } else if (field.type === 'tel') {
    isValid = field.value.trim().length >= 8;
  } else if (field.type === 'number') {
    isValid = parseFloat(field.value) >= 100;
  } else {
    isValid = field.value.trim().length > 0;
  }

  if (errorMsg) {
    errorMsg.classList.toggle('hidden', isValid);
  }
  
  field.classList.toggle('border-red-500 bg-red-50', !isValid);
  field.classList.toggle('border-green-500 bg-green-50', isValid && field.value);
}

form.addEventListener('submit', function(e) {
  let formValid = true;
  inputs.forEach(input => {
    validateField(input);
    if (input.classList.contains('border-red-500')) {
      formValid = false;
    }
  });

  if (!formValid) {
    e.preventDefault();
    alert('⚠️ Veuillez corriger les erreurs du formulaire');
  }
});
</script>
