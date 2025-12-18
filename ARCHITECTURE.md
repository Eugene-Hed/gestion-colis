# Architecture du système

## Vue d'ensemble

```
┌─────────────────────────────────────────────────────────┐
│                  Client Web (Browser)                    │
│              Bootstrap 5 Responsive UI                   │
└────────────────────┬────────────────────────────────────┘
                     │
                     ├─ HTTP GET/POST
                     │
┌────────────────────▼────────────────────────────────────┐
│           public/index.php (Front Controller)            │
│  • Routing simple (GET/POST)                             │
│  • Env loader                                            │
│  • Session manager                                       │
└────────────────────┬────────────────────────────────────┘
                     │
        ┌────────────┼────────────┐
        │            │            │
        ▼            ▼            ▼
    ┌──────────┐  ┌──────────┐  ┌────────────┐
    │ Router   │  │ Model    │  │Notifier    │
    │ (routes) │  │ (CRUD)   │  │(Email/SMS) │
    └──────────┘  └──────────┘  └────────────┘
        │            │            │
        └────────────┼────────────┘
                     │
         ┌───────────▼───────────┐
         │  Database Abstraction  │
         │  (src/Database.php)    │
         └───────────┬───────────┘
                     │
       ┌─────────────┴──────────────┐
       │                            │
       ▼                            ▼
  ┌──────────────┐         ┌─────────────────┐
  │ MySQL/PDO    │  OR     │ JSON File-based │
  │ (Production) │         │ (Fallback)      │
  └──────────────┘         └─────────────────┘
```

## Composants clés

### 1. Front Controller (`public/index.php`)

**Responsabilité** : Routage et orchestration

```php
// Récupère route depuis GET/POST
$route = $_GET['route'] ?? $_POST['route'] ?? 'list';

// Créé instances de service
$db = Database::getInstance();
$model = new ShipmentModel($db);
$notifier = new Notifications();

// Route vers handler
if ($route === 'create') {
  $id = $model->createShipment($data);
  $notifier->notifyRegistration($data);
  header('Location: ?route=view&id='.$id);
}
```

**Routes disponibles** :
- `GET  /` → list.php (liste tous les colis)
- `GET  ?route=new` → form.php (formulaire)
- `POST ?route=create` → crée colis + notifie
- `GET  ?route=view&id=1` → view.php (détails)
- `GET  ?route=arrive&id=1` → mark arrived
- `GET  ?route=pickup&id=1` → mark picked up

### 2. Modèle (`src/ShipmentModel.php`)

**Responsabilité** : Logique métier + CRUD

```php
class ShipmentModel {
  public function createShipment(array $data) {
    $price = $data['value'] * 0.10; // Calcul 10%
    // INSERT into DB
  }
  
  public function getAll() {
    // SELECT all shipments ORDER BY id DESC
  }
  
  public function markArrived($id) {
    // UPDATE status='arrived', arrived_at=NOW()
  }
  
  public function markPickedUp($id) {
    // UPDATE status='picked_up', picked_at=NOW()
  }
}
```

**Métier implémenté** :
- Prix = 10% de la valeur
- Statuts : registered → arrived → picked_up
- Timestamps : created_at, arrived_at, picked_at

### 3. Abstraction DB (`src/Database.php`)

**Responsabilité** : Connexion + fallback

```php
// Tente MySQL
try {
  $pdo = new PDO("mysql:host=localhost...", $user, $pass);
} catch (Exception $e) {
  // Fallback vers FileBasedDatabase
  return new FileBasedDatabase(__DIR__.'/../data/colis.json');
}
```

**Avantage** : Zero downtime si MySQL indisponible.

### 4. Base JSON (`src/FileBasedDatabase.php`)

**Responsabilité** : Persistance fichier (PDO-like)

Implémente les méthodes PDO essentielles :
- `prepare()` → FileBasedStatement
- `query()` → FileBasedStatement
- `lastInsertId()` → int

**FileBasedStatement** exécute :
- INSERT (ajout shipment)
- UPDATE (changement statut)
- SELECT (lecture)

**Format** : JSON simple, lisible directement :

```json
{
  "shipments": [
    { "id": 1, "status": "registered", ... },
    { "id": 2, "status": "arrived", ... }
  ],
  "lastId": 2
}
```

### 5. Notifications (`src/Notifications.php`)

**Responsabilité** : Email + SMS

```php
class Notifications {
  public function notifyRegistration(array $data) {
    $this->sendEmail($data['sender_email'], ...);
    $this->sendSMS($data['sender_phone'], ...);
  }
  
  public function notifyArrival(array $shipment) {
    $this->sendEmail($shipment['receiver_email'], ...);
    $this->sendSMS($shipment['receiver_phone'], ...);
  }
  
  public function notifyPickup(array $shipment) {
    $this->sendEmail($shipment['sender_email'], ...);
    $this->sendSMS($shipment['sender_phone'], ...);
  }
}
```

**Email** :
- Utilise PHPMailer v6.8
- Envoie si SMTP configuré, sinon log dans error_log
- Body = HTML

**SMS** :
- Stub/log par défaut
- Intégration Twilio optionnelle (à développer)

### 6. Templates (`templates/`)

**layout.php** : HTML de base + navbar Bootstrap

**list.php** : Tableau avec :
- Tous les colis
- Boutons Voir / Marquer arrivé / Marquer retiré
- Tri par ID DESC

**form.php** : Formulaire POST create
- 2 colonnes : expéditeur, destinataire
- Champs : nom, téléphone, email
- Description + valeur (prix auto-calculé)

**view.php** : Détails d'un colis
- Affiche toutes les infos
- Boutons d'action (selon statut)

## Flux données

### Création de colis

```
User clique "Nouveau"
    ↓
form.php affichée (GET ?route=new)
    ↓
User remplit + click "Enregistrer"
    ↓
POST ?route=create reçu
    ↓
ShipmentModel::createShipment($data)
  ├─ Calcule price = value * 0.10
  ├─ INSERT into DB
  └─ return new_id
    ↓
Notifications::notifyRegistration($data)
  ├─ sendEmail() à expéditeur
  └─ sendSMS() à expéditeur
    ↓
Redirect à ?route=view&id=<new_id>
```

### Changement de statut

```
User clique "Marquer arrivé" (lien ?route=arrive&id=1)
    ↓
ShipmentModel::markArrived(1)
  ├─ UPDATE shipments SET status='arrived', arrived_at=NOW()
  └─ return bool
    ↓
ShipmentModel::getById(1)
    ↓
Notifications::notifyArrival($shipment)
  ├─ sendEmail() au destinataire
  └─ sendSMS() au destinataire
    ↓
Redirect à ?route=view&id=1
```

## Flux architectural

```
┌─────────────────────────────────────────────────────────────┐
│ Request (GET/POST from browser or cURL)                     │
└──────────────────┬──────────────────────────────────────────┘
                   │
         ┌─────────▼──────────┐
         │  index.php         │
         │  env loader        │
         │  routing           │
         └─────────┬──────────┘
                   │
         ┌─────────▼──────────────────┐
         │  Match route               │
         │  Create instances          │
         │  $model, $notifier         │
         └─────────┬──────────────────┘
                   │
    ┌──────────────┼──────────────┐
    │              │              │
    ▼              ▼              ▼
  [list]       [create]        [arrive/pickup]
    │              │              │
    ▼              ▼              ▼
 query()      createShipment   markArrived/PickedUp
              + notifyReg      + notify
    │              │              │
    └──────────────┼──────────────┘
                   │
         ┌─────────▼──────────────────┐
         │ Database::getInstance()    │
         │ (MySQL || FileBasedDB)     │
         └─────────┬──────────────────┘
                   │
      ┌────────────┴────────────┐
      │                         │
      ▼                         ▼
  PDO (real)         FileBasedDatabase (mock)
      │                         │
      ▼                         ▼
  MySQL            data/colis.json
      │                         │
      └────────────┬────────────┘
                   │
         ┌─────────▼──────────────────┐
         │ Return result array         │
         │ (PDO::FETCH_ASSOC)          │
         └─────────┬──────────────────┘
                   │
         ┌─────────▼──────────────────┐
         │ Render template             │
         │ (list.php / view.php / ...) │
         └─────────┬──────────────────┘
                   │
         ┌─────────▼──────────────────┐
         │ HTML Response               │
         │ (or redirect Location)      │
         └────────────────────────────┘
```

## Sécurité (basique)

✓ **Fait** :
- Prepared statements (PDO ? placeholders)
- htmlspecialchars() dans templates
- No eval() or dynamic code

⚠️ **À ajouter** :
- Authentification (login)
- Rôles (receptionist/agent/admin)
- CSRF tokens
- Input validation + sanitization
- Rate limiting

## Performance

**Petit volume (~1000 colis)** :
- JSON file-based : ~10-50ms par query
- MySQL : ~5-20ms par query

**Moyen volume (~10k colis)** :
- JSON : slow (~500ms+)
- **MySQL recommandé** : index sur status, created_at

**Gros volume (~100k+)** :
- MySQL + Redis cache
- Partitionner par date
- API async (Queue)

## Tests

Unit tests suggérés (phpunit) :

```php
// tests/ShipmentModelTest.php
public function testCalculatePrice() {
  $price = $model->calculatePrice(100000);
  $this->assertEquals(10000, $price); // 10%
}

public function testCreateShipment() {
  $id = $model->createShipment([...]);
  $this->assertIsInt($id);
  $this->assertGreater($id, 0);
}

public function testMarkArrived() {
  $result = $model->markArrived(1);
  $this->assertTrue($result);
  
  $s = $model->getById(1);
  $this->assertEquals('arrived', $s['status']);
}
```

Run :
```bash
composer require --dev phpunit/phpunit
./vendor/bin/phpunit tests/
```

## Déploiement

### Dev (local)

```bash
php -S localhost:8000 -t public
```

### Staging (shared hosting)

```bash
# Upload files
rsync -av . user@host:/var/www/colis/

# SSH
ssh user@host
cd /var/www/colis
composer install --no-dev
php scripts/migrate.php

# Configure .env (MySQL credentials)
nano .env

# Test
curl http://staging.colis.cm/
```

### Production

**Recommandations** :
- Serveur web (Apache/Nginx) au lieu de `php -S`
- HTTPS (Let's Encrypt)
- MySQL avec backups
- Logging (Sentry/Monolog)
- Monitoring (Grafana/New Relic)
- CDN pour assets statiques

**Nginx config** :

```nginx
server {
  listen 443 ssl http2;
  server_name colis.agence.cm;
  
  root /var/www/colis/public;
  index index.php;
  
  location / {
    try_files $uri $uri/ /index.php?$query_string;
  }
  
  location ~ \.php$ {
    fastcgi_pass php:9000;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    include fastcgi_params;
  }
}
```

---

**Fin de la doc architecture.** Voir README.md pour installation.
