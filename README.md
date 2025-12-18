# Gestion Colis — Plateforme d'expédition légère

Petit système PHP léger et flexible pour gérer l'enregistrement, l'arrivée, et le retrait de colis en agence.

## Fonctionnalités

✅ **Enregistrement de colis**
- Expéditeur : nom, téléphone, email
- Destinataire : nom, téléphone, email
- Description du colis & valeur
- **Prix calculé automatiquement : 10% de la valeur du colis**
- Notification (email/SMS) au client

✅ **Suivi du colis**
- Statuts : `registered` → `arrived` → `picked_up`
- Marquer un colis comme arrivé en agence
- Marquer un colis comme retiré par le client
- Timestamps automatiques (création, arrivée, retrait)

✅ **Notifications**
- **Email** : via PHPMailer (si SMTP configuré)
- **SMS** : via Twilio (optionnel, log par défaut)
- Messages à l'expéditeur et au destinataire à chaque changement de statut

✅ **Persistance flexible**
- **Fallback** : JSON file-based si MySQL indisponible
- **MySQL** : support complet si disponible (créé automatiquement)

## Installation

### 1. Dépendances

```bash
cd /var/www/colis
composer install
```

### 2. Configuration

```bash
cp .env.example .env
```

Édite `.env` si nécessaire (défauts acceptent localhost MySQL):

```env
DB_HOST=localhost
DB_PORT=3306
DB_USER=root
DB_PASS=
DB_NAME=colis

# Optionnel : SMTP pour emails réels
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USER=your-email@example.com
MAIL_PASS=your-password
MAIL_FROM=noreply@colis.cm

# Optionnel : Twilio pour SMS réels
TWILIO_SID=your_sid
TWILIO_TOKEN=your_token
TWILIO_FROM=+1234567890
```

### 3. Initialiser la base de données

```bash
php scripts/migrate.php
```

**Output attendu :**
```
✓ Database initialized successfully.
✓ Using file-based storage.
✓ Visit http://localhost:8000 to get started.
```

### 4. Démarrer le serveur

```bash
php -S localhost:8000 -t public
```

Visite **`http://localhost:8000`** et commence à tester.

## Utilisation

### Interface Web

- **Liste** : voir tous les colis (`/`)
- **Nouveau** : créer un colis (`?route=new`)
- **Vue** : détails d'un colis (`?route=view&id=1`)
- **Marquer arrivé** : (`?route=arrive&id=1`)
- **Marquer retiré** : (`?route=pickup&id=1`)

### Exemple d'ajout via formulaire

1. Clique "Nouveau"
2. Remplissez les infos (expéditeur, destinataire, description, valeur)
3. Le prix (10%) est **calculé automatiquement**
4. Une notification est envoyée à l'expéditeur

### Exemple d'ajout via cURL

```bash
curl -X POST http://localhost:8000 \
  -d "route=create" \
  -d "sender_name=Jean Dupont" \
  -d "sender_phone=+237670123456" \
  -d "sender_email=jean@example.com" \
  -d "receiver_name=Marie Nkomo" \
  -d "receiver_phone=+237671234567" \
  -d "receiver_email=marie@example.com" \
  -d "description=Vêtements" \
  -d "value=50000"
```

## Stockage des données

### Fichier JSON (fallback)

Si MySQL est indisponible, les colis sont stockés dans `data/colis.json` :

```json
{
  "shipments": [
    {
      "id": 1,
      "sender_name": "Jean Dupont",
      "receiver_name": "Marie Nkomo",
      "value": 50000,
      "price": 5000,
      "status": "registered",
      "created_at": "2025-12-18 10:00:00",
      "arrived_at": null,
      "picked_at": null
    }
  ],
  "lastId": 1
}
```

### MySQL (optionnel)

Si une connexion MySQL est disponible, une base `colis` est créée avec la table `shipments`.

## Architecture

```
/var/www/colis/
├── public/
│   └── index.php           # Front controller & routing
├── src/
│   ├── Database.php        # Wrapper PDO (avec fallback)
│   ├── FileBasedDatabase.php # Fallback JSON-based DB
│   ├── ShipmentModel.php   # Logique métier (CRUD)
│   └── Notifications.php   # Email & SMS
├── templates/
│   ├── layout.php          # Layout HTML/Bootstrap
│   ├── list.php            # Liste des colis
│   ├── form.php            # Formulaire nouveau colis
│   └── view.php            # Détails d'un colis
├── scripts/
│   └── migrate.php         # Migration DB
├── data/
│   └── colis.json          # Stockage JSON (si MySQL indisponible)
├── composer.json           # Dépendances
├── .env.example            # Template config
└── README.md               # Cette doc
```

## Logique métier

### Calcul du prix

```php
$price = $value * 0.10;  // 10% de la valeur
```

Exemple :
- Valeur : **50 000 FCFA**
- Prix : **5 000 FCFA** (10%)

### États et flux

```
registered (enregistré en agence)
    ↓
arrived (livré en agence)
    ↓
picked_up (retiré par le client)
```

À chaque transition, des notifications sont envoyées :
- **registered** → Email/SMS à l'expéditeur
- **arrived** → Email/SMS au destinataire
- **picked_up** → Email/SMS à l'expéditeur

### Notifications

#### Email
- Requiert un serveur SMTP (gmail, sendgrid, etc.)
- Configure `MAIL_HOST`, `MAIL_PORT`, `MAIL_USER`, `MAIL_PASS` dans `.env`
- Par défaut (sans config), les emails sont loggés dans `error_log`

#### SMS
- Intégration Twilio (optionnel)
- Configure `TWILIO_SID`, `TWILIO_TOKEN`, `TWILIO_FROM` dans `.env`
- Par défaut (sans config), les SMS sont loggés dans `error_log`

## Développement & Amélioration

### Idées futures

- **Authentification** : rôles (réceptionniste, agent arrivée, admin)
- **Historique** : logs de chaque action avec timestamps
- **Recherche** : filter par statut, expéditeur, dates
- **Export** : CSV/PDF des rapports d'expédition
- **API JSON** : endpoints REST pour intégrations tierces
- **Tests** : phpunit pour logique métier

### Correction rapide (debugging)

**Logs** : vérifie `error_log` du serveur :

```bash
tail -f /var/log/php*.log
# ou regarde la console du terminal où tu as lancé le serveur
```

**Base de données** : inspecte `data/colis.json` ou via `mysql`:

```bash
mysql -u root colis -e "SELECT * FROM shipments;"
```

## Notes techniques

- **PHP** : 7.4+ (testé avec 8.4)
- **Bootstrap 5** : CSS framework (CDN)
- **PHPMailer 6.8** : pour les emails
- **Pas de dépendances externes** (sauf PHPMailer)
- **PDO** : abstraction DB (MySQL, SQLite, etc.)

## License

MIT — Libre d'utilisation & modification.
