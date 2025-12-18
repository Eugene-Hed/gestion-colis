<div class="max-w-4xl mx-auto animate-fade-in">
  
  <!-- Header -->
  <div class="card p-8 mb-8">
    <div class="flex items-center justify-between">
      <div>
        <h2 class="text-4xl font-bold text-gray-900">📦 Colis #<?= htmlspecialchars($s['id']) ?></h2>
        <p class="text-gray-600 mt-2">Enregistré le <?= date('d/m/Y à H:i', strtotime($s['created_at'] ?? 'now')) ?></p>
      </div>
      <div class="text-right">
        <span class="text-5xl">
          <?php
            $icons = ['registered' => '⏳', 'arrived' => '📍', 'picked_up' => '✅'];
            echo $icons[$s['status']] ?? '❓';
          ?>
        </span>
      </div>
    </div>
  </div>

  <!-- Timeline de statut -->
  <div class="card p-8 mb-8">
    <h3 class="text-xl font-bold text-gray-900 mb-8">📈 Historique du statut</h3>
    
    <div class="space-y-6">
      <!-- Enregistrement -->
      <div class="flex gap-4">
        <div class="flex flex-col items-center">
          <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-xl font-bold text-blue-600">
            ✓
          </div>
          <div class="w-1 h-16 bg-blue-200 my-2"></div>
        </div>
        <div class="pt-2">
          <h4 class="font-semibold text-blue-900">Enregistré</h4>
          <p class="text-gray-600 text-sm">
            <?= date('d M Y à H:i', strtotime($s['created_at'] ?? 'now')) ?>
          </p>
        </div>
      </div>

      <!-- Arrivée -->
      <div class="flex gap-4">
        <div class="flex flex-col items-center">
          <div class="w-12 h-12 rounded-full <?= $s['status'] !== 'registered' ? 'bg-yellow-100 text-yellow-600' : 'bg-gray-200 text-gray-400' ?> flex items-center justify-center text-xl font-bold">
            ✓
          </div>
          <?php if ($s['status'] !== 'registered'): ?>
            <div class="w-1 h-16 bg-yellow-200 my-2"></div>
          <?php endif; ?>
        </div>
        <div class="pt-2">
          <h4 class="font-semibold <?= $s['status'] !== 'registered' ? 'text-yellow-900' : 'text-gray-500' ?>">
            Arrivé
          </h4>
          <?php if ($s['status'] !== 'registered'): ?>
            <p class="text-gray-600 text-sm">
              <?= date('d M Y à H:i', strtotime($s['arrived_at'] ?? 'now')) ?>
            </p>
          <?php else: ?>
            <p class="text-gray-500 text-sm italic">En attente...</p>
          <?php endif; ?>
        </div>
      </div>

      <!-- Retrait -->
      <div class="flex gap-4">
        <div class="flex flex-col items-center">
          <div class="w-12 h-12 rounded-full <?= $s['status'] === 'picked_up' ? 'bg-green-100 text-green-600' : 'bg-gray-200 text-gray-400' ?> flex items-center justify-center text-xl font-bold">
            ✓
          </div>
        </div>
        <div class="pt-2">
          <h4 class="font-semibold <?= $s['status'] === 'picked_up' ? 'text-green-900' : 'text-gray-500' ?>">
            Retiré
          </h4>
          <?php if ($s['status'] === 'picked_up'): ?>
            <p class="text-gray-600 text-sm">
              <?= date('d M Y à H:i', strtotime($s['picked_up_at'] ?? 'now')) ?>
            </p>
          <?php else: ?>
            <p class="text-gray-500 text-sm italic">En attente...</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Informations Expéditeur & Destinataire -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
    <!-- Expéditeur -->
    <div class="card p-6 bg-blue-50 border border-blue-200">
      <h3 class="text-lg font-bold text-blue-900 mb-4">👤 Expéditeur</h3>
      <div class="space-y-3">
        <div>
          <p class="text-gray-600 text-sm">Nom</p>
          <p class="font-semibold text-gray-900"><?= htmlspecialchars($s['sender_name']) ?></p>
        </div>
        <div>
          <p class="text-gray-600 text-sm">Téléphone</p>
          <p class="font-semibold text-gray-900">
            <a href="tel:<?= htmlspecialchars($s['sender_phone']) ?>" class="text-blue-600 hover:underline">
              <?= htmlspecialchars($s['sender_phone']) ?>
            </a>
          </p>
        </div>
        <div>
          <p class="text-gray-600 text-sm">Email</p>
          <p class="font-semibold text-gray-900">
            <a href="mailto:<?= htmlspecialchars($s['sender_email']) ?>" class="text-blue-600 hover:underline">
              <?= htmlspecialchars($s['sender_email']) ?>
            </a>
          </p>
        </div>
      </div>
    </div>

    <!-- Destinataire -->
    <div class="card p-6 bg-green-50 border border-green-200">
      <h3 class="text-lg font-bold text-green-900 mb-4">🎁 Destinataire</h3>
      <div class="space-y-3">
        <div>
          <p class="text-gray-600 text-sm">Nom</p>
          <p class="font-semibold text-gray-900"><?= htmlspecialchars($s['receiver_name']) ?></p>
        </div>
        <div>
          <p class="text-gray-600 text-sm">Téléphone</p>
          <p class="font-semibold text-gray-900">
            <a href="tel:<?= htmlspecialchars($s['receiver_phone']) ?>" class="text-green-600 hover:underline">
              <?= htmlspecialchars($s['receiver_phone']) ?>
            </a>
          </p>
        </div>
        <div>
          <p class="text-gray-600 text-sm">Email</p>
          <p class="font-semibold text-gray-900">
            <a href="mailto:<?= htmlspecialchars($s['receiver_email']) ?>" class="text-green-600 hover:underline">
              <?= htmlspecialchars($s['receiver_email']) ?>
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Détails du colis -->
  <div class="card p-6 mb-8 bg-purple-50 border border-purple-200">
    <h3 class="text-lg font-bold text-purple-900 mb-4">📋 Détails du colis</h3>
    <div class="space-y-4">
      <div>
        <p class="text-gray-600 text-sm font-medium">Description</p>
        <p class="text-gray-900 mt-1"><?= nl2br(htmlspecialchars($s['description'])) ?></p>
      </div>
      <div class="grid grid-cols-2 gap-4 pt-4 border-t border-purple-200">
        <div>
          <p class="text-gray-600 text-sm font-medium">Valeur déclarée</p>
          <p class="text-2xl font-bold text-gray-900 mt-1">
            <?= number_format($s['value'], 0, ',', ' ') ?> ₣
          </p>
        </div>
        <div>
          <p class="text-gray-600 text-sm font-medium">Prix de transport (10%)</p>
          <p class="text-2xl font-bold text-green-600 mt-1">
            <?= number_format($s['price'], 0, ',', ' ') ?> ₣
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Actions -->
  <div class="flex gap-4">
    <?php if($s['status'] === 'registered'): ?>
      <a href="?route=arrive&id=<?= $s['id'] ?>" class="btn-success flex-1 text-center">
        📍 Marquer comme arrivé
      </a>
    <?php elseif($s['status'] === 'arrived'): ?>
      <a href="?route=pickup&id=<?= $s['id'] ?>" class="btn-primary flex-1 text-center">
        ✅ Marquer comme retiré
      </a>
    <?php else: ?>
      <div class="flex-1 text-center py-3 bg-green-100 text-green-700 font-semibold rounded-lg">
        ✅ Colis retiré le <?= date('d/m/Y', strtotime($s['picked_up_at'] ?? 'now')) ?>
      </div>
    <?php endif; ?>
    
    <a href="?route=list" class="btn-secondary flex-1 text-center">
      ← Retour à la liste
    </a>
  </div>

</div>
