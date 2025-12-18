# 📦 Plateforme de Gestion des Colis - Édition Moderne

> Une **plateforme légère et moderne** pour gérer les expéditions de colis des agences de voyage camerounaises avec interface Tailwind CSS fluidique et responsive.

[![PHP](https://img.shields.io/badge/PHP-8.4-blue.svg)](https://www.php.net/)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.0-06b6d4.svg)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

## ✨ Caractéristiques principales

### 📊 Tableau de bord interactif
- **Statistiques en temps réel** : Nombre total de colis, revenus générés, taux de completion
- **Graphiques de distribution** : Visualisation du statut des expéditions
- **Activité récente** : Historique des 5 dernières opérations
- **KPI Cards** : Valeur totale, revenus, moyenne par colis

### 📋 Gestion complète des colis
- ✅ **Création** : Formulaire moderne avec validation en temps réel
- ✅ **Suivi** : Timeline visuelle du statut (Enregistré → Arrivé → Retiré)
- ✅ **Recherche** : Localiser rapidement un colis
- ✅ **Mise à jour** : Marquer l'arrivée et le retrait avec notifications

### 💬 Système de notifications
- 📧 **Emails** : Intégration Gmail SMTP avec PHPMailer
- 📱 **SMS** : Prêt pour l'intégration Twilio (stub en place)
- 🔔 **Déclenchement automatique** : Lors de l'enregistrement, l'arrivée et le retrait

### 💰 Calcul automatique des prix
- 📊 **Commission 10%** : Calculée automatiquement sur la valeur déclarée
- 💵 **Plusieurs devises** : FCFA (Francs CFA) avec formatage localisé
- 📈 **Rapports financiers** : Suivi des revenus totaux

### 🎨 Interface moderne et fluide
- 🌈 **Tailwind CSS** : Styling moderne avec animations smooth
- 📱 **Responsive** : Fonctionne parfaitement sur mobile, tablette, desktop
- ⚡ **Performance** : CDN pour les ressources, optimisé pour vitesse
- 🎯 **UX amélioré** : Formulaires avec validation, timelines visuelles

## 🚀 Démarrage rapide

### Prérequis
- PHP 7.4+ (testé avec 8.4.11)
- Composer
- MySQL (optionnel - JSON fallback disponible)

### Installation

```bash
# 1. Cloner/télécharger le projet
cd /var/www/colis

# 2. Installer les dépendances
composer install

# 3. Configurer les variables d'environnement
cp .env.example .env
# Éditer .env avec vos paramètres (MySQL, SMTP)

# 4. Initialiser la base de données
php scripts/migrate.php

# 5. Démarrer le serveur
cd public && php -S 0.0.0.0:8000
```

Accédez à **http://localhost:8000/index.php?route=dashboard**

## 📁 Structure du projet

```
colis/
├── public/
│   └── index.php              # Point d'entrée (Front Controller)
├── src/
│   ├── Database.php           # Abstraction BD (MySQL + JSON)
│   ├── FileBasedDatabase.php  # Stockage JSON (fallback)
│   ├── ShipmentModel.php      # Logique métier (CRUD, calcul prix)
│   └── Notifications.php      # Emails et SMS
├── templates/
│   ├── layout.php             # Layout base (Tailwind CSS)
│   ├── dashboard.php          # Tableau de bord avec stats
│   ├── list.php               # Liste des colis (tableau moderne)
│   ├── form.php               # Formulaire création (validation)
│   └── view.php               # Détail colis (timeline)
├── data/
│   └── colis.json             # Stockage JSON (si pas MySQL)
├── scripts/
│   └── migrate.php            # Initialisation BD
├── composer.json              # Dépendances PHP
├── .env                       # Configuration
└── README.md                  # Documentation
```

## 🎯 Routes disponibles

| Route | Méthode | Description |
|-------|---------|------------|
| `dashboard` | GET | Tableau de bord avec statistiques |
| `list` | GET | Liste tous les colis |
| `new` | GET | Affiche formulaire création |
| `create` | POST | Crée un nouveau colis |
| `view` | GET | Affiche détail d'un colis |
| `arrive` | GET | Marque colis comme arrivé |
| `pickup` | GET | Marque colis comme retiré |

## 💾 Base de données

### Schéma (MySQL)
```sql
CREATE TABLE shipments (
  id INT PRIMARY KEY AUTO_INCREMENT,
  sender_name VARCHAR(255),
  sender_phone VARCHAR(20),
  sender_email VARCHAR(255),
  receiver_name VARCHAR(255),
  receiver_phone VARCHAR(20),
  receiver_email VARCHAR(255),
  description TEXT,
  value DECIMAL(10, 2),
  price DECIMAL(10, 2),
  status ENUM('registered', 'arrived', 'picked_up'),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  arrived_at TIMESTAMP NULL,
  picked_up_at TIMESTAMP NULL
);
```

### Fallback JSON
Si MySQL n'est pas disponible, les données se stockent dans `data/colis.json` avec une interface PDO-compatible.

## 📧 Configuration Email (Gmail)

```env
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USER=votre.email@gmail.com
MAIL_PASS=votre_mot_de_passe_app (16 caractères)
MAIL_FROM=votre.email@gmail.com
MAIL_FROM_NAME=Agence de Voyage
```

**Générer un mot de passe application** :
1. Aller sur https://myaccount.google.com/apppasswords
2. Sélectionner Mail et Custom App
3. Générer le mot de passe 16 caractères
4. Copier dans `.env`

## 🧪 Tests automatisés

```bash
# Exécuter la suite de tests (10 tests)
bash test-suite.sh

# Tests inclus:
# ✅ Vérification serveur
# ✅ CRUD complet
# ✅ Calcul des prix (10%)
# ✅ Transitions de statut
# ✅ Persistance des données
# ✅ Notifications
```

## 🎨 Customisation

### Couleurs et thème
Éditer `templates/layout.php` - section `tailwind.config`:
```javascript
tailwind.config = {
  theme: {
    extend: {
      colors: {
        primary: '#3B82F6',   // Bleu
        success: '#10B981',   // Vert
        warning: '#F59E0B',   // Jaune
        danger: '#EF4444'     // Rouge
      }
    }
  }
}
```

### Ajouter une page
1. Créer `templates/ma-page.php`
2. Ajouter la route dans `public/index.php`
3. Appeler `render('ma-page', $vars)`

## 📊 Statistiques du système

- **Tailles de fichier** :
  - `public/index.php` : ~2 KB
  - `src/ShipmentModel.php` : ~1.5 KB
  - `templates/dashboard.php` : ~3 KB
  - Total code métier : ~15 KB

- **Performance** :
  - Temps de chargement du dashboard : < 100ms
  - Requête CRUD : < 50ms
  - Envoi email : ~500ms

## 🔐 Sécurité

- ✅ Échappement HTML (`htmlspecialchars()`)
- ✅ Validations côté serveur
- ✅ Préparation des requêtes SQL (PDO)
- ✅ Variables d'environnement pour les secrets

## 🚀 Améliorations futures

- [ ] Authentification utilisateur
- [ ] Rôles et permissions (Admin, Agent, Courrier)
- [ ] Export PDF des bons d'expédition
- [ ] Mode sombre (Dark mode toggle)
- [ ] API REST pour mobile app
- [ ] WebSocket pour notifications en temps réel
- [ ] Intégration Twilio SMS
- [ ] Géolocalisation des colis

## 📦 Dépendances

```json
{
  "require": {
    "php": "^7.4",
    "phpmailer/phpmailer": "^6.8"
  },
  "require-dev": {
    "phpstan/phpstan": "^1.0"
  }
}
```

## 📄 Licence

MIT License - Gratuit pour usage commercial et personnel

## 👨‍💻 Support

Pour toute question ou bug :
- Consulter la documentation
- Vérifier les logs serveur : `/tmp/server.log`
- Tester directement via PHP CLI

---

**Créé pour les agences de voyage camerounaises 🇨🇲**

Version: **2.0.0** | Moderne UI Edition
Dernière mise à jour: Décembre 2025
