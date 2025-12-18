<div class="animate-fade-in">
  <!-- Header avec stats -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
    <?php
      $total = count($shipments);
      $registered = count(array_filter($shipments, fn($s) => $s['status'] === 'registered'));
      $arrived = count(array_filter($shipments, fn($s) => $s['status'] === 'arrived'));
      $picked = count(array_filter($shipments, fn($s) => $s['status'] === 'picked_up'));
      $totalValue = array_sum(array_column($shipments, 'value'));
      $totalRevenue = array_sum(array_column($shipments, 'price'));
    ?>
    
    <div class="card p-6">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-gray-600 text-sm font-medium">Total Colis</p>
          <p class="text-4xl font-bold text-gray-900"><?= $total ?></p>
        </div>
        <span class="text-4xl">📦</span>
      </div>
    </div>
    
    <div class="card p-6">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-gray-600 text-sm font-medium">En Attente</p>
          <p class="text-4xl font-bold text-blue-600"><?= $registered ?></p>
        </div>
        <span class="text-4xl">⏳</span>
      </div>
    </div>
    
    <div class="card p-6">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-gray-600 text-sm font-medium">Arrivés</p>
          <p class="text-4xl font-bold text-yellow-600"><?= $arrived ?></p>
        </div>
        <span class="text-4xl">📍</span>
      </div>
    </div>
    
    <div class="card p-6">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-gray-600 text-sm font-medium">Retirés</p>
          <p class="text-4xl font-bold text-green-600"><?= $picked ?></p>
        </div>
        <span class="text-4xl">✅</span>
      </div>
    </div>
  </div>

  <!-- Revenus -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
    <div class="card p-6 bg-gradient-to-br from-slate-600 to-slate-700 text-white">
      <p class="text-white/80 text-sm font-medium">Valeur totale des colis</p>
      <p class="text-4xl font-bold"><?= number_format($totalValue, 0, ',', ' ') ?> FCFA</p>
    </div>
    <div class="card p-6 bg-gradient-to-br from-emerald-700 to-emerald-800 text-white">
      <p class="text-white/80 text-sm font-medium">Revenus générés (10%)</p>
      <p class="text-4xl font-bold"><?= number_format($totalRevenue, 0, ',', ' ') ?> FCFA</p>
    </div>
  </div>

  <!-- Tableau des colis -->
  <div class="card overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full">
        <thead class="bg-gray-100 border-b border-gray-200">
          <tr>
            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">#</th>
            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Expéditeur</th>
            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Destinataire</th>
            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">Valeur</th>
            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">Prix (10%)</th>
            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Statut</th>
            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php if (empty($shipments)): ?>
            <tr>
              <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                <p class="text-lg">Aucun colis enregistré</p>
                <a href="?route=new" class="btn-primary mt-4">Créer le premier colis</a>
              </td>
            </tr>
          <?php endif; ?>
          
          <?php foreach($shipments as $s): ?>
          <tr class="hover:bg-gray-50 transition">
            <td class="px-6 py-4">
              <span class="font-semibold text-blue-600">#<?= htmlspecialchars($s['id']) ?></span>
            </td>
            <td class="px-6 py-4">
              <div class="font-medium text-gray-900"><?= htmlspecialchars($s['sender_name']) ?></div>
              <div class="text-sm text-gray-500"><?= htmlspecialchars($s['sender_phone']) ?></div>
            </td>
            <td class="px-6 py-4">
              <div class="font-medium text-gray-900"><?= htmlspecialchars($s['receiver_name']) ?></div>
              <div class="text-sm text-gray-500"><?= htmlspecialchars($s['receiver_phone']) ?></div>
            </td>
            <td class="px-6 py-4 text-right">
              <span class="font-medium"><?= number_format($s['value'], 0, ',', ' ') ?></span>
            </td>
            <td class="px-6 py-4 text-right">
              <span class="font-semibold text-green-600"><?= number_format($s['price'], 0, ',', ' ') ?></span>
            </td>
            <td class="px-6 py-4 text-center">
              <?php
                $badges = [
                  'registered' => 'badge-registered',
                  'arrived' => 'badge-arrived',
                  'picked_up' => 'badge-picked'
                ];
                $badge = $badges[$s['status']] ?? 'badge-registered';
                $labels = [
                  'registered' => '⏳ Enregistré',
                  'arrived' => '📍 Arrivé',
                  'picked_up' => '✅ Retiré'
                ];
              ?>
              <span class="<?= $badge ?>"><?= $labels[$s['status']] ?? $s['status'] ?></span>
            </td>
            <td class="px-6 py-4 text-right space-x-2">
              <a href="?route=view&id=<?= $s['id'] ?>" class="btn-secondary text-sm">
                👁️ Voir
              </a>
              <?php if($s['status'] === 'registered'): ?>
                <a href="?route=arrive&id=<?= $s['id'] ?>" class="btn-success text-sm">
                  📍 Arrivé
                </a>
              <?php elseif($s['status'] === 'arrived'): ?>
                <a href="?route=pickup&id=<?= $s['id'] ?>" class="btn-primary text-sm">
                  ✅ Retiré
                </a>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
