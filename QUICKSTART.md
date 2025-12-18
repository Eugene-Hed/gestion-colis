# 🚀 Guide Rapide - Démarrage en 5 minutes

## 1️⃣ Installation (< 2 min)

```bash
# Accéder au dossier
cd /var/www/colis

# Installer les dépendances
composer install

# Vérifier la structure
ls -la
```

## 2️⃣ Démarrer le serveur (< 1 min)

```bash
# Méthode simple (recommandée)
cd /var/www/colis/public
php -S 0.0.0.0:8000

# Ou dans un terminal séparé en arrière-plan
cd /var/www/colis/public && php -S 0.0.0.0:8000 &
```

## 3️⃣ Accéder à l'application

Ouvrez votre navigateur:

```
🏠 Dashboard (page d'accueil):
   http://localhost:8000/index.php?route=dashboard

📋 Liste des colis:
   http://localhost:8000/index.php?route=list

📝 Créer un nouveau colis:
   http://localhost:8000/index.php?route=new
```

## 4️⃣ Tester le système (< 2 min)

```bash
# Lancer la suite de tests
bash test-complete.sh

# Résultat attendu: 23/23 tests ✅
```

## 5️⃣ Configurer les emails (optionnel)

### Gmail (recommandé):
```bash
# 1. Ouvrir le fichier .env
nano .env

# 2. Ajouter vos paramètres Gmail:
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USER=votre.email@gmail.com
MAIL_PASS=votre_mot_de_passe_app
MAIL_FROM=votre.email@gmail.com
MAIL_FROM_NAME=Agence Voyage

# 3. Générer le mot de passe app:
#    https://myaccount.google.com/apppasswords
#    → Sélectionner Mail et Custom device
#    → Générer et copier le mot de passe 16 caractères

# 4. Tester l'envoi:
php test-email.php
```

---

## 📊 Utilisation quotidienne

### Créer un colis
1. Cliquer sur **"➕ Nouveau colis"** (en haut)
2. Remplir formulaire (validation auto)
3. Le prix (10%) se calcule automatiquement
4. Cliquer **"✅ Créer le colis"**
5. Email envoyé à l'expéditeur et destinataire

### Suivi d'un colis
1. Aller à **"📋 Liste"**
2. Cliquer sur **"👁️ Voir"** pour un colis
3. Voir la timeline avec les dates
4. Cliquer **"📍 Marquer comme arrivé"** quand reçu
5. Email envoyé au destinataire
6. Cliquer **"✅ Marquer comme retiré"** à la fin
7. Email envoyé à l'expéditeur

### Consulter les stats
1. Aller au **"📊 Tableau de bord"** (défaut)
2. Voir:
   - **KPIs**: Total, En attente, Arrivés, Retirés
   - **Revenus**: Valeur totale, Commission (10%), Moyenne
   - **Graphiques**: Distribution des statuts
   - **Activité**: 5 derniers colis

---

## 🎯 Routes disponibles (URL)

```
GET  /index.php?route=dashboard    → Tableau de bord
GET  /index.php?route=list         → Liste des colis
GET  /index.php?route=new          → Formulaire création
POST /index.php?route=create       → Créer un colis
GET  /index.php?route=view&id=123  → Détail colis #123
GET  /index.php?route=arrive&id=123→ Marquer arrivé
GET  /index.php?route=pickup&id=123→ Marquer retiré
```

---

## 💾 Données - Où ça se sauvegarde?

### Option 1: MySQL (si configuré)
```
Serveur: localhost
Port: 3306
Utilisateur: hedric
Mot de passe: Hedric&2002
Base: colis

Table: shipments (avec timestamps)
```

### Option 2: JSON (par défaut)
```
Fichier: /var/www/colis/data/colis.json

Format:
{
  "shipments": [
    { "id": 1, "sender_name": "...", "value": 50000, ... },
    { "id": 2, "sender_name": "...", "value": 75000, ... }
  ],
  "lastId": 2
}
```

---

## 🔧 Configuration

### Fichier .env
```env
# Base de données
DB_HOST=localhost
DB_PORT=3306
DB_USER=hedric
DB_PASS=Hedric&2002
DB_NAME=colis

# Email (Gmail)
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USER=simohedric2023@gmail.com
MAIL_PASS=votre_mot_de_passe_app
MAIL_FROM=simohedric2023@gmail.com
MAIL_FROM_NAME=Colis Agence

# SMS (prêt pour Twilio)
SMS_ACCOUNT_SID=votre_sid
SMS_AUTH_TOKEN=votre_token
SMS_FROM=+237XXXXXXXXX
```

---

## 📱 Responsive - Fonctionne sur:
- ✅ Smartphone (375px - iPhone)
- ✅ Tablette (768px - iPad)
- ✅ Desktop (1920px - Écran large)
- ✅ Très grand écran (2560px+)

Testez: Appuyez sur `F12` → `Ctrl+Shift+M` (mode responsive)

---

## 🐛 Dépannage

### Erreur: "Page not found"
```bash
# Vous avez peut-être oublié le /index.php
❌ http://localhost:8000/?route=list
✅ http://localhost:8000/index.php?route=list

# Ou lancé depuis le mauvais dossier
cd /var/www/colis/public  # ← Important!
php -S 0.0.0.0:8000
```

### Erreur: "MySQL Access Denied"
```
C'est normal! Le système bascule automatiquement à JSON.
Pas besoin de faire quoi que ce soit.
```

### Erreur: "Email not sending"
```bash
# Vérifier la configuration .env
grep MAIL_ .env

# Tester l'envoi d'email
php test-email.php

# Vérifier les logs serveur
tail -20 /tmp/server.log
```

### Erreur: "Composer not found"
```bash
# Installer Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
composer install
```

---

## 📊 Fichiers importants

```
/var/www/colis/
├── public/index.php              ← Point d'entrée
├── src/ShipmentModel.php         ← Logique métier
├── src/Notifications.php         ← Emails/SMS
├── templates/
│   ├── layout.php                ← Design Tailwind
│   ├── dashboard.php             ← Tableau de bord
│   ├── list.php                  ← Liste colis
│   ├── form.php                  ← Formulaire
│   └── view.php                  ← Détail colis
├── data/colis.json               ← Base de données JSON
├── .env                          ← Configuration
└── test-complete.sh              ← Tests automatisés
```

---

## ✅ Checklist démarrage

- [ ] `cd /var/www/colis`
- [ ] `composer install`
- [ ] `cd public && php -S 0.0.0.0:8000`
- [ ] Ouvrir `http://localhost:8000/index.php?route=dashboard`
- [ ] Créer un test colis
- [ ] Voir la liste
- [ ] Consulter les stats
- [ ] Lancer `bash test-complete.sh`

---

## 🎓 Formation utilisateur (5 min)

### Pour gérant/admin:
1. **Consulter les stats** (Dashboard)
2. **Voir les colis en attente** (Liste)
3. **Marquer arrivée/retrait** (Detail)
4. **Vérifier les revenus** (Statistiques)

### Pour support client:
1. **Créer nouveau colis** (Formulaire)
2. **Voir l'historique** (Liste → Détail)
3. **Donner le statut** (Timeline dans Détail)

### Cas d'usage courants:
```
Client appelle: "Où est mon colis #123?"
→ Aller à Liste → Chercher #123 → Cliquer "Voir"
→ Lui lire la timeline: "Enregistré le X, Arrivé le Y, ..."

Nouveau colis à enregistrer
→ Cliquer "Nouveau colis"
→ Remplir le formulaire
→ Système envoie email auto à expéditeur et destinataire

Colis arrivé
→ Aller à Détail du colis
→ Cliquer "Marquer comme arrivé"
→ Système envoie email au destinataire
```

---

## 💡 Tips & Tricks

### Accès direct (signet)
```
Ajouter un signet à:
http://localhost:8000/index.php?route=dashboard
```

### Shortcuts clavier
```
Ctrl+K  → Ouvre la recherche (si configurée)
Ctrl+/  → Aide (si configurée)
F5      → Rafraîchir
```

### Mode développement
```bash
# Voir les erreurs PHP détaillées
php -d display_errors=1 -S localhost:8000

# Voir les logs
tail -f /tmp/server.log
```

---

## 📞 Support rapide

| Problème | Solution |
|----------|----------|
| Serveur ne démarre pas | `cd public` puis `php -S 0.0.0.0:8000` |
| Emails ne s'envoient pas | Vérifier `.env` et `test-email.php` |
| Pages blanches | Vérifier `php -v` (8.4+) et logs |
| Données perdues | Vérifier `data/colis.json` existe |
| Lent | Vérifier pas de requête MySQL bloquée |

---

## 🎯 Objectif atteint?

- ✅ Créer des colis facilement
- ✅ Suivre le statut
- ✅ Recevoir des notifications
- ✅ Voir les stats
- ✅ Interface moderne et fluide

**Félicitations! 🎉 Vous êtes prêt à utiliser la plateforme!**

---

*Version 2.0.0 - Édition Moderne*
*Dernière mise à jour: Décembre 2025*
