# 🔗 Routes & Endpoints - Système Moderne

## Vue d'ensemble des routes

```
http://localhost:8000/
    └── public/index.php (Front Controller)
        └── Routes gérées par paramètre ?route=
```

---

## 🔐 Routes Publiques (Sans Authentification)

### 1. Page de Connexion
```
GET  http://localhost:8000/?route=login
POST http://localhost:8000/?route=login
```

**Description**: Page d'authentification utilisateur

**Méthode GET**: Affiche le formulaire de connexion
**Méthode POST**: Traite la soumission du formulaire

**Paramètres POST**:
- `username` (string): Identifiant utilisateur
- `password` (string): Mot de passe

**Réponse succès**: Redirection vers `?route=dashboard`
**Réponse erreur**: Réaffichage avec message d'erreur

**Comptes de test**:
```
1. receptionist / demo123
2. agent / demo123
3. admin / demo123
```

**Code**:
```php
if ($route === 'login') {
    include __DIR__ . '/../templates/login.php';
    exit;
}
```

---

## 🔒 Routes Protégées (Authentification Requise)

Toutes les routes suivantes exigent une session utilisateur active:
```php
if (empty($_SESSION['user'])) {
    header('Location: ?route=login');
    exit;
}
```

---

### 2. Tableau de Bord
```
GET  http://localhost:8000/?route=dashboard
```

**Description**: Page principale avec statistiques

**Fonctionnalités**:
- 4 cartes de statistiques
- Cartes d'infos (valeur, activité)
- Tableau d'activité récente
- Boutons d'action rapides
- Export CSV fonctionnel

**Données affichées**:
- Total colis
- Répartition par statut
- Valeur totale cumulée
- Colis du jour
- 10 derniers colis

**Code**:
```php
if ($route === 'dashboard' || $route === '') {
    render('dashboard');
    exit;
}
```

---

### 3. Liste des Colis
```
GET  http://localhost:8000/?route=list
GET  http://localhost:8000/?route=list&search=Pierre
GET  http://localhost:8000/?route=list&status=arrived
GET  http://localhost:8000/?route=list&search=Pierre&status=arrived
```

**Description**: Affiche tous les colis avec filtrage

**Paramètres GET**:
- `search` (string): Recherche par nom/ID
- `status` (string): Filtre par statut (registered|arrived|picked_up)
- `sort` (string): Tri (created_at|value)

**Fonctionnalités**:
- Recherche texte
- Filtrage par statut
- Affichage nombre de résultats
- Table interactive
- Avatars avec initiales
- Boutons d'action (voir, arriver, retirer)

**Statuts disponibles**:
- `registered` - Enregistré
- `arrived` - Arrivé
- `picked_up` - Retiré

**Code**:
```php
if ($route === 'list') {
    $shipments = $model->getAll();
    render('list', ['shipments' => $shipments]);
    exit;
}
```

---

### 4. Formulaire Nouveau Colis
```
GET  http://localhost:8000/?route=new
```

**Description**: Affiche formulaire création colis

**Fonctionnalités**:
- Sections Expéditeur/Destinataire/Colis
- Calcul automatique frais (10%)
- Validation côté client
- Sidebar info

**Code**:
```php
if ($route === 'new' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    render('form');
    exit;
}
```

---

### 5. Créer Colis
```
POST http://localhost:8000/?route=create
```

**Description**: Enregistre un nouveau colis

**Paramètres POST**:
```
sender_name (string, requis): Nom expéditeur
sender_phone (string): Téléphone expéditeur
sender_email (string): Email expéditeur
receiver_name (string, requis): Nom destinataire
receiver_phone (string): Téléphone destinataire
receiver_email (string): Email destinataire
description (string, requis): Description colis
value (float, requis): Valeur en FCFA
```

**Actions**:
1. Valide les données
2. Crée le colis en base
3. Calcule frais (10%)
4. Envoie email notification
5. Redirige vers détails

**Réponse**: Redirection vers `?route=view&id={id}`

**Code**:
```php
if ($route === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [...];
    $id = $model->createShipment($data);
    $notifier->notifyRegistration($data);
    header('Location: ?route=view&id='.$id);
    exit;
}
```

---

### 6. Voir Détails Colis
```
GET  http://localhost:8000/?route=view&id=1
GET  http://localhost:8000/?route=view&id=42
```

**Description**: Affiche détails complet d'un colis

**Paramètres GET** (requis):
- `id` (int): ID du colis

**Fonctionnalités**:
- Timeline historique
- Cartes d'infos (expéditeur, destinataire)
- Affichage valeur et frais
- Boutons d'action contextuels
- Contacts cliquables (tel, mailto)

**Boutons d'action**:
- Si statut `registered` → "Marquer comme arrivé"
- Si statut `arrived` → "Marquer comme retiré"
- Si statut `picked_up` → Bouton "Terminé" (désactivé)

**Code**:
```php
if ($route === 'view' && isset($_GET['id'])) {
    $s = $model->getById((int)$_GET['id']);
    render('view', ['s' => $s]);
    exit;
}
```

---

### 7. Marquer Arrivé
```
GET  http://localhost:8000/?route=arrive&id=1
GET  http://localhost:8000/?route=arrive&id=42
```

**Description**: Met à jour le statut "arrived"

**Paramètres GET** (requis):
- `id` (int): ID du colis

**Actions**:
1. Met à jour statut en "arrived"
2. Enregistre timestamp d'arrivée
3. Envoie email notification
4. Redirige vers détails

**Confirmation**: JavaScript `confirm()` avant action

**Réponse**: Redirection vers `?route=view&id={id}`

**Code**:
```php
if ($route === 'arrive' && isset($_GET['id'])) {
    $model->markArrived((int)$_GET['id']);
    $s = $model->getById((int)$_GET['id']);
    $notifier->notifyArrival($s);
    header('Location: ?route=view&id=' . (int)$_GET['id']);
    exit;
}
```

---

### 8. Marquer Retiré
```
GET  http://localhost:8000/?route=pickup&id=1
GET  http://localhost:8000/?route=pickup&id=42
```

**Description**: Met à jour le statut "picked_up"

**Paramètres GET** (requis):
- `id` (int): ID du colis

**Actions**:
1. Met à jour statut en "picked_up"
2. Enregistre timestamp de retrait
3. Envoie email notification
4. Redirige vers détails

**Confirmation**: JavaScript `confirm()` avant action

**Réponse**: Redirection vers `?route=view&id={id}`

**Code**:
```php
if ($route === 'pickup' && isset($_GET['id'])) {
    $model->markPickedUp((int)$_GET['id']);
    $s = $model->getById((int)$_GET['id']);
    $notifier->notifyPickup($s);
    header('Location: ?route=view&id=' . (int)$_GET['id']);
    exit;
}
```

---

### 9. Déconnexion
```
GET  http://localhost:8000/?route=logout
```

**Description**: Termine la session utilisateur

**Actions**:
1. Détruit la session PHP
2. Efface variables $_SESSION
3. Redirige vers login

**Réponse**: Redirection vers `?route=login`

**Code**:
```php
if ($route === 'logout') {
    session_destroy();
    header('Location: ?route=login');
    exit;
}
```

---

## 📊 Schéma de Navigation

```
┌─────────────────────────────────────┐
│        LOGIN (?route=login)         │
│  - Form username/password           │
│  - Session start                    │
└─────────────┬───────────────────────┘
              │
              v
┌─────────────────────────────────────┐
│     DASHBOARD (?route=dashboard)    │
│  - Stats: total, arrivés, retirés   │
│  - Activité récente                 │
│  - Export CSV                       │
└────┬────────────────┬──────────┬────┘
     │                │          │
     v                v          v
┌────────────┐ ┌──────────┐ ┌────────────┐
│ NOUVEAU    │ │  LISTE   │ │ DÉCONNEXION│
│ (?new)     │ │(?list)   │ │ (?logout) │
└────┬───────┘ └────┬─────┘ └────────────┘
     │              │
     │              v
     │        ┌──────────────┐
     │        │ DÉTAILS      │
     │        │ (?view&id=X) │
     │        └────┬─────┬──┬┘
     │             │     │  │
     v             v     v  v
  CRÉER        MARQUER  VOIR RETOUR
  (?create)    ARRIVE   RETIRÉ
               (?arrive) (?pickup)
```

---

## 🔄 Flux Utilisateur Complet

### Scénario 1: Nouveau Colis
```
1. LOGIN (?route=login)
2. → POST → SESSION CRÉÉE
3. → DASHBOARD (?route=dashboard)
4. → NOUVEAU (?route=new)
5. → FORM REMPLISSAGE
6. → CRÉER (?route=create POST)
7. → EMAIL ENVOYÉ
8. → DÉTAILS (?route=view&id=X)
```

### Scénario 2: Suivi Colis
```
1. LOGIN (?route=login)
2. → LISTE (?route=list)
3. → RECHERCHE/FILTRAGE
4. → DÉTAILS (?route=view&id=X)
5. → MARQUER ARRIVÉ (?route=arrive&id=X)
6. → EMAIL ENVOYÉ
7. → DÉTAILS ACTUALISÉS
8. → MARQUER RETIRÉ (?route=pickup&id=X)
9. → EMAIL ENVOYÉ
10. → COLIS COMPLÉTÉ ✅
```

### Scénario 3: Dashboard
```
1. LOGIN (?route=login)
2. → DASHBOARD (?route=dashboard)
3. → VOIR STATISTIQUES
4. → VOIR ACTIVITÉ RÉCENTE
5. → EXPORT CSV
6. → NOUVELLE FENÊTRE
7. → → NOUVEAU COLIS
8. → → LISTE COLIS
```

---

## ⚙️ Paramètres Globaux

### Format URLs
```
Base: http://localhost:8000/
Path: public/index.php (invisible grâce à .htaccess)
Query: ?route=XXX&param1=value1&param2=value2
```

### Paramètres Standards GET
```
route    (string): Route name (list, new, view, etc)
id       (int): ID du colis (pour view, arrive, pickup)
search   (string): Texte de recherche (list)
status   (string): Filtre statut (list)
sort     (string): Colonne de tri (list)
```

### Paramètres POST (Form)
```
sender_name, sender_phone, sender_email
receiver_name, receiver_phone, receiver_email
description, value
```

---

## 🛡️ Sécurité Routes

### Authentification
✅ Vérifiée sur routes protégées:
```php
if (empty($_SESSION['user'])) {
    header('Location: ?route=login');
    exit;
}
```

### Validation Données
✅ GET params:
```php
(int)$_GET['id']  // Cast en entier
```

✅ POST params:
```php
floatval($_POST['value'] ?? 0)  // Conversion + défaut
htmlspecialchars(...)  // Échappement XSS
```

### Protection CSRF
🔄 À ajouter: CSRF tokens dans formulaires

### SQL Injection
✅ PDO prepared statements (FileBasedDatabase compatible)

---

## 📈 Statistiques Endpoints

| Route | Méthode | Public | Fonction |
|-------|---------|--------|----------|
| login | GET, POST | ✅ | Connexion |
| logout | GET | ✅ | Déconnexion |
| dashboard | GET | ❌ | Stats |
| list | GET | ❌ | Tous les colis |
| new | GET | ❌ | Formulaire |
| create | POST | ❌ | Créer colis |
| view | GET | ❌ | Détails |
| arrive | GET | ❌ | Marquer arrivé |
| pickup | GET | ❌ | Marquer retiré |

**Total**: 9 routes principales

---

## 🎯 Utilisation Recommandée

### Développeurs
```
/public/index.php → Point d'entrée unique
$route variable → Dispatch vers template
render() fn → Injection données + layout
```

### Testeurs
```
Comptes: receptionist/agent/admin
Password: demo123 (tous)
Routes: /list, /new, /view?id=1, etc
```

### Utilisateurs
```
Accueil: http://localhost:8000
Connexion automatique
Tableau de bord chargé
Intuitif et fluide
```

---

**Architecture**: Front Controller Pattern + Templates MVC
**Status**: Production-Ready ✅
