<div class="animate-fade-in">
  
  <!-- Hero Section -->
  <div class="mb-12">
    <div class="card p-12 bg-gradient-to-r from-slate-700 to-slate-600 text-white relative overflow-hidden">
      <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-32 -mt-32"></div>
      <div class="relative z-10">
        <h1 class="text-4xl lg:text-5xl font-bold mb-2">📊 Tableau de Bord</h1>
        <p class="text-lg text-white/80">Bienvenue dans le centre de contrôle de votre plateforme</p>
        <p class="text-sm text-white/60 mt-2">Mise à jour en temps réel</p>
      </div>
    </div>
  </div>

  <!-- KPI Cards -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <?php
      $stats = [
        [
          'label' => 'Total Colis',
          'value' => count($shipments),
          'icon' => '📦',
          'color' => 'blue',
          'bgColor' => 'bg-blue-50',
          'textColor' => 'text-blue-600'
        ],
        [
          'label' => 'En Attente',
          'value' => count(array_filter($shipments, fn($s) => $s['status'] === 'registered')),
          'icon' => '⏳',
          'color' => 'blue',
          'bgColor' => 'bg-blue-50',
          'textColor' => 'text-blue-600'
        ],
        [
          'label' => 'Arrivés',
          'value' => count(array_filter($shipments, fn($s) => $s['status'] === 'arrived')),
          'icon' => '📍',
          'color' => 'yellow',
          'bgColor' => 'bg-yellow-50',
          'textColor' => 'text-yellow-600'
        ],
        [
          'label' => 'Retirés',
          'value' => count(array_filter($shipments, fn($s) => $s['status'] === 'picked_up')),
          'icon' => '✅',
          'color' => 'green',
          'bgColor' => 'bg-green-50',
          'textColor' => 'text-green-600'
        ]
      ];
      foreach($stats as $stat):
    ?>
    <div class="card p-8 bg-white hover:shadow-xl transition-all duration-300">
      <div class="flex items-start justify-between">
        <div>
          <p class="text-slate-600 text-sm font-semibold uppercase tracking-wider"><?= $stat['label'] ?></p>
          <p class="text-5xl font-bold <?= $stat['textColor'] ?> mt-4 leading-tight"><?= $stat['value'] ?></p>
        </div>
        <span class="text-6xl opacity-40"><?= $stat['icon'] ?></span>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <!-- Revenue Cards -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <?php
      $totalValue = array_sum(array_column($shipments, 'value'));
      $totalRevenue = array_sum(array_column($shipments, 'price'));
      $avgValue = count($shipments) > 0 ? $totalValue / count($shipments) : 0;
    ?>
    
    <div class="card p-8 bg-gradient-to-br from-slate-700 to-slate-800 text-white hover:shadow-xl transition-all duration-300">
      <p class="text-white/70 text-sm font-semibold uppercase tracking-wider">Valeur totale</p>
      <p class="text-5xl font-bold mt-4"><?= number_format($totalValue, 0, ',', ' ') ?></p>
      <p class="text-sm text-white/60 mt-2">₣ FCFA</p>
      <div class="mt-6 pt-6 border-t border-white/10">
        <p class="text-xs text-white/60">Somme de tous les colis</p>
      </div>
    </div>

    <div class="card p-8 bg-gradient-to-br from-emerald-700 to-emerald-800 text-white hover:shadow-xl transition-all duration-300">
      <p class="text-white/70 text-sm font-semibold uppercase tracking-wider">Revenus générés</p>
      <p class="text-5xl font-bold mt-4"><?= number_format($totalRevenue, 0, ',', ' ') ?></p>
      <p class="text-sm text-white/60 mt-2">₣ FCFA (10%)</p>
      <div class="mt-6 pt-6 border-t border-white/10">
        <p class="text-xs text-white/60">Commission sur transport</p>
      </div>
    </div>

    <div class="card p-8 bg-gradient-to-br from-slate-700 to-slate-800 text-white hover:shadow-xl transition-all duration-300">
      <p class="text-white/70 text-sm font-semibold uppercase tracking-wider">Valeur moyenne</p>
      <p class="text-5xl font-bold mt-4"><?= number_format($avgValue, 0, ',', ' ') ?></p>
      <p class="text-sm text-white/60 mt-2">₣ FCFA / colis</p>
      <div class="mt-4 pt-4 border-t border-white/20">
        <p class="text-xs text-white/70">Moyenne par expédition</p>
      </div>
    </div>
  </div>

  <!-- Charts Row -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    
    <!-- Status Distribution -->
    <div class="card p-6">
      <h3 class="text-lg font-bold text-gray-900 mb-6">Distribution des statuts</h3>
      <?php
        $statuses = [
          'registered' => 'Enregistrés',
          'arrived' => 'Arrivés',
          'picked_up' => 'Retirés'
        ];
        $colors = [
          'registered' => 'bg-blue-100 text-blue-700 border-blue-300',
          'arrived' => 'bg-yellow-100 text-yellow-700 border-yellow-300',
          'picked_up' => 'bg-green-100 text-green-700 border-green-300'
        ];
        $total = count($shipments);
        foreach($statuses as $status => $label):
          $count = count(array_filter($shipments, fn($s) => $s['status'] === $status));
          $percent = $total > 0 ? ($count / $total) * 100 : 0;
      ?>
      <div class="mb-6">
        <div class="flex justify-between mb-2">
          <span class="font-medium text-gray-700"><?= $label ?></span>
          <span class="font-bold text-gray-900"><?= $count ?> (<?= round($percent, 1) ?>%)</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-3">
          <div class="h-3 rounded-full <?= strpos($colors[$status], 'bg-') ?> transition-all duration-500"
            style="width: <?= $percent ?>%; background: <?= $status === 'registered' ? '#3b82f6' : ($status === 'arrived' ? '#eab308' : '#22c55e') ?>"></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Recent Activity -->
    <div class="card p-6">
      <h3 class="text-lg font-bold text-gray-900 mb-6">🕒 Activité récente</h3>
      <?php
        $recent = array_slice($shipments, 0, 5);
        if (empty($recent)):
      ?>
        <p class="text-gray-500 text-center py-8">Aucune activité récente</p>
      <?php else: ?>
        <div class="space-y-4">
          <?php foreach($recent as $item): ?>
          <div class="flex items-start gap-3 pb-4 border-b border-gray-200 last:border-0">
            <span class="text-2xl">
              <?php
                $icons = ['registered' => '⏳', 'arrived' => '📍', 'picked_up' => '✅'];
                echo $icons[$item['status']] ?? '❓';
              ?>
            </span>
            <div class="flex-1 min-w-0">
              <p class="font-medium text-gray-900 truncate"><?= htmlspecialchars($item['sender_name']) ?></p>
              <p class="text-sm text-gray-600">vers <?= htmlspecialchars($item['receiver_name']) ?></p>
              <p class="text-xs text-gray-500 mt-1"><?= date('d M Y à H:i', strtotime($item['created_at'] ?? 'now')) ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>

  </div>

  <!-- Actions rapides -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <a href="?route=new" class="card p-6 text-center hover:shadow-lg transition group cursor-pointer">
      <span class="text-5xl block mb-3">📝</span>
      <h3 class="font-bold text-gray-900 group-hover:text-blue-600 transition">Nouveau colis</h3>
      <p class="text-sm text-gray-600 mt-1">Créer une nouvelle expédition</p>
    </a>

    <a href="?route=list" class="card p-6 text-center hover:shadow-lg transition group cursor-pointer">
      <span class="text-5xl block mb-3">📋</span>
      <h3 class="font-bold text-gray-900 group-hover:text-blue-600 transition">Tous les colis</h3>
      <p class="text-sm text-gray-600 mt-1">Gérer vos expéditions</p>
    </a>

    <div class="card p-6 text-center bg-gradient-to-br from-green-50 to-emerald-50">
      <span class="text-5xl block mb-3">💰</span>
      <h3 class="font-bold text-gray-900">Revenus totaux</h3>
      <p class="text-2xl font-bold text-green-600 mt-2"><?= number_format($totalRevenue, 0, ',', ' ') ?> ₣</p>
    </div>
  </div>

</div>
