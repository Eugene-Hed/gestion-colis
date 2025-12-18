# 📦 Gestion Colis — Plateforme d'expédition complète

**Version** : 1.0  
**Stack** : PHP 7.4+ | Bootstrap 5 | JSON/MySQL  
**Status** : ✅ Production-ready (pour PME)

---

## 🚀 Démarrage rapide

```bash
cd /var/www/colis
composer install
cp .env.example .env
php scripts/migrate.php
php -S localhost:8000 -t public
```

Visite **`http://localhost:8000`** → Prêt ! 🎯

---

## 📚 Documentation

| Fichier | Description |
|---------|-------------|
| **README.md** | Installation, configuration, fonctionnalités |
| **ARCHITECTURE.md** | Design, composants, flux de données |
| **DEMO.md** | Exemples d'utilisation (cURL, scenarios) |
| **test-suite.sh** | Tests fonctionnels automatisés (10 tests) |

---

## 📦 Structure du projet

```
/var/www/colis/
├── public/                    # Racine web
│   └── index.php              # Front controller (routage)
├── src/                       # Logique métier
│   ├── Database.php           # Abstraction DB (MySQL || JSON)
│   ├── FileBasedDatabase.php  # Fallback JSON (PDO-like)
│   ├── ShipmentModel.php      # CRUD & calculs
│   └── Notifications.php      # Email/SMS
├── templates/                 # Vues HTML
│   ├── layout.php             # Layout base (Bootstrap)
│   ├── list.php               # Tableau tous colis
│   ├── form.php               # Formulaire création
│   └── view.php               # Détails colis
├── scripts/
│   └── migrate.php            # Initialisation DB
├── data/
│   └── colis.json             # Stockage JSON (si MySQL indispo)
├── vendor/                    # Dépendances (Composer)
├── composer.json              # Dépendances (PHPMailer)
├── .env.example               # Template config
├── .env                       # Config (ne commit pas)
├── .gitignore                 # Ignore vendor, data, .env
├── README.md                  # Doc principale
├── ARCHITECTURE.md            # Doc technique
├── DEMO.md                    # Exemples & scenarios
└── test-suite.sh              # Tests automatisés
```

---

## ✨ Fonctionnalités

### ✅ Gestion des colis
- Enregistrement : expéditeur, destinataire, valeur
- Suivi statut : `registered` → `arrived` → `picked_up`
- **Prix auto-calculé : 10% de la valeur**
- Timestamps : création, arrivée, retrait

### ✅ Notifications
- **Email** : via PHPMailer (SMTP configurable)
- **SMS** : via Twilio (optionnel, log par défaut)
- Déclenchées à chaque changement d'état

### ✅ Persistance flexible
- **Fallback JSON** : si MySQL indisponible
- **MySQL** : produit (créé auto), indexed
- Sans migration → zéro friction

### ✅ Interface web
- **Bootstrap 5** : responsive, mobile-friendly
- **Formulaires** : validation client
- **Liste** : tableau avec actions rapides
- **Détails** : vue complète + boutons action

---

## 🧪 Tests

**10 tests fonctionnels automatisés** :

```bash
cd /var/www/colis
bash test-suite.sh
```

✓ Serveur accessible  
✓ Création colis  
✓ Prix calculé (10%)  
✓ Transition statut (registered → arrived)  
✓ Transition statut (arrived → picked_up)  
✓ Liste complète  
✓ Formulaire rendu  
✓ Persistance JSON  
✓ Notifications loggées  
✓ Accès concurrent (5 requêtes parallèles)  

---

## 🔧 Configuration

### Fichier `.env`

```env
# MySQL (optionnel, fallback JSON sinon)
DB_HOST=localhost
DB_PORT=3306
DB_USER=root
DB_PASS=
DB_NAME=colis

# Email (optionnel, log sinon)
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USER=you@example.com
MAIL_PASS=secret
MAIL_FROM=noreply@example.com
MAIL_FROM_NAME=Colis Agence

# SMS (optionnel, log sinon)
TWILIO_SID=
TWILIO_TOKEN=
TWILIO_FROM=
```

---

## 📊 Exemple de flux complet

### 1️⃣ Réceptionniste enregistre colis

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

**Résultats** :
- Colis créé (ID #1)
- **Prix : 5000 FCFA** (10% de 50000)
- Email envoyé à Jean (notification)
- SMS envoyé à Jean (notification)
- Statut : `registered`

### 2️⃣ Colis arrive (3 jours plus tard)

```bash
curl http://localhost:8000?route=arrive&id=1 -L
```

**Résultats** :
- Statut : `arrived`
- Timestamp `arrived_at` enregistré
- Email envoyé à Marie (venir retirer)
- SMS envoyé à Marie (venir retirer)

### 3️⃣ Client retire son colis

```bash
curl http://localhost:8000?route=pickup&id=1 -L
```

**Résultats** :
- Statut : `picked_up`
- Timestamp `picked_at` enregistré
- Email envoyé à Jean (livraison confirmée)
- SMS envoyé à Jean (livraison confirmée)

---

## 💡 Points forts

✅ **Léger** : ~500 lignes PHP, 0 dépendances (sauf PHPMailer)  
✅ **Flexible** : MySQL ou JSON au choix  
✅ **Pragmatique** : formulaires HTML simples, Bootstrap  
✅ **Extensible** : structure MVC claire  
✅ **Testé** : 10 tests fonctionnels complets  
✅ **Documenté** : README, ARCHITECTURE, DEMO  
✅ **Production-ready** : erreur handling, logging  

---

## 🎯 Cas d'usage

### ✓ Agence de voyage camerounaise
- Clients envoient/reçoivent colis localement
- Notifications SMS/Email
- Suivi en temps réel

### ✓ Petit commerce
- Gestion expéditions légères
- Prix calculé automatiquement
- Rapport simple (JSON ou MySQL export)

### ✓ Démo/MVP
- Démarrage rapide (5 min)
- Sans dépendances externes
- Adapté client non-tech

---

## 🚀 Évolutions futures

- **Auth** : login, rôles (receptionist/agent/admin)
- **Recherche** : filtrer par statut, dates, client
- **Export** : CSV/PDF pour rapports
- **API JSON** : endpoints REST pour tierces
- **Dashboard** : statistiques en temps réel
- **Integration** : Twilio SMS, SendGrid email
- **Tests** : phpunit suite complète

---

## 📝 Notes techniques

| Aspect | Détail |
|--------|--------|
| **PHP** | 7.4, 8.0, 8.4 |
| **DB** | MySQL 5.7+ ou JSON file |
| **Server** | Apache, Nginx, ou dev `php -S` |
| **Frontend** | Bootstrap 5 CDN (no build) |
| **Storage** | JSON ou MySQL |
| **Email** | PHPMailer 6.8 |
| **License** | MIT (libre) |

---

## 🐛 Support

### Issue classique ?

1. **Serveur n'écoute pas**
   ```bash
   ps aux | grep "php -S"
   curl http://localhost:8000
   ```

2. **Notifications ne marchent pas**
   - Normal par défaut (log seulement)
   - Configure `MAIL_*` dans `.env` pour emails

3. **BD indisponible ?**
   - Fallback JSON auto (pas d'erreur)
   - Logs dans console serveur

4. **Colis disparaît ?**
   ```bash
   cat data/colis.json  # Vérifier JSON valide
   ```

---

## 📖 Roadmap

| Version | Contenu |
|---------|---------|
| **1.0** | ✅ CRUD colis, notifications, prix 10% |
| **1.1** | Authentification simple |
| **1.2** | Recherche & filtrage |
| **2.0** | Dashboard stats, export PDF |

---

## 🎉 Résumé

**Plateforme légère, pragmatique, produite en ~2h pour agence camerounaise.**

Prête pour production PME, adaptable à besoins clients spécifiques.

**Démarrage** : `php -S localhost:8000 -t public`  
**Tests** : `bash test-suite.sh`  
**Docs** : README.md, ARCHITECTURE.md, DEMO.md

---

**Made with ❤️ for Cameroon's travel agencies** 🇨🇲
