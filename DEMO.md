# Démonstration interactive

## Test rapide (sans UI)

### 1. Créer un colis avec cURL

```bash
curl -X POST http://localhost:8000 \
  -d "route=create" \
  -d "sender_name=Amir Tall" \
  -d "sender_phone=+237680123456" \
  -d "sender_email=amir@test.cm" \
  -d "receiver_name=Fatima Sissoko" \
  -d "receiver_phone=+237671234567" \
  -d "receiver_email=fatima@test.cm" \
  -d "description=Équipement électronique" \
  -d "value=200000" \
  -L
```

**Réponse** : Redirection vers `/view&id=3` avec notification email loggée.

### 2. Voir les détails d'un colis

```bash
curl http://localhost:8000?route=view&id=3
```

**Contenu** :
- ID, expéditeur, destinataire
- Valeur (200 000 FCFA)
- **Prix calculé : 20 000 FCFA (10%)**
- Statut : `registered`

### 3. Marquer comme arrivé

```bash
curl http://localhost:8000?route=arrive&id=3 -L
```

**Logs** : Notification SMS/Email envoyée au destinataire (Fatima)

### 4. Marquer comme retiré

```bash
curl http://localhost:8000?route=pickup&id=3 -L
```

**Logs** : Notification SMS/Email envoyée à l'expéditeur (Amir)

### 5. Voir tous les colis

```bash
curl http://localhost:8000?route=list
```

**Tableau** : Tous les colis avec :
- ID, expéditeur, destinataire
- Valeur & Prix (10%)
- Statut actuel
- Boutons d'action

## Exemple de réponse JSON (depuis `data/colis.json`)

```json
{
  "shipments": [
    {
      "id": 1,
      "created_at": "2025-12-18 10:00:00",
      "sender_name": "Amir Tall",
      "sender_phone": "+237680123456",
      "sender_email": "amir@test.cm",
      "receiver_name": "Fatima Sissoko",
      "receiver_phone": "+237671234567",
      "receiver_email": "fatima@test.cm",
      "description": "Équipement électronique",
      "value": 200000,
      "price": 20000,
      "status": "picked_up",
      "arrived_at": "2025-12-18 10:05:00",
      "picked_at": "2025-12-18 10:10:00"
    }
  ],
  "lastId": 1
}
```

## Scénario complet (étapes manuelles)

### Étape 1 : Réceptionniste enregistre un colis

1. Visite `http://localhost:8000`
2. Clique "Nouveau"
3. Remplit le formulaire :
   - **Expéditeur** : Jacques Martin (jacq@example.com, +237690987654)
   - **Destinataire** : Christiane Tembe (christ@example.com, +237671098765)
   - **Description** : Documents administratifs
   - **Valeur** : 30 000 FCFA
4. Clique "Enregistrer"

**Résultat** :
- Colis créé (ID #2)
- **Prix automatique : 3 000 FCFA**
- Email de confirmation envoyé à Jacques
- SMS de confirmation envoyé à Jacques

### Étape 2 : Colis arrive en agence (3 jours plus tard)

1. Agent clique sur "Marquer arrivé" depuis la liste
2. Statut change à `arrived`

**Résultat** :
- Email & SMS envoyés à Christiane pour venir retirer son colis
- Timestamp `arrived_at` enregistré

### Étape 3 : Client retire son colis

1. Agent clique "Marquer retiré"
2. Statut change à `picked_up`

**Résultat** :
- Email & SMS envoyés à Jacques pour confirmer livraison
- Timestamp `picked_at` enregistré

## Logs attendus

```
[Thu Dec 18 06:44:35 2025] [Notifications] Email skipped to yvonne@test.cm: Colis enregistré
[Thu Dec 18 06:44:35 2025] [Notifications] SMS skipped to +237690234567: Bonjour Yvonne Nkosi,Votre colis pour Paul Tala a été enregistré. Prix estimé: 75000 FCFA (10% = 7500 ).
[Thu Dec 18 06:44:56 2025] [Notifications] Email skipped to paul@test.cm: Colis arrivé en agence
[Thu Dec 18 06:44:56 2025] [Notifications] SMS skipped to +237671245678: Bonjour Paul Tala,Votre colis est arrivé en agence. Veuillez passer pour le récupérer.
```

## Configurer les vraies notifications

### Email (Gmail)

1. Active App Passwords sur Gmail
2. Dans `.env` :

```env
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USER=your-email@gmail.com
MAIL_PASS=your-app-password
MAIL_FROM=your-email@gmail.com
MAIL_FROM_NAME=Colis Agence Cameroun
```

### SMS (Twilio)

1. Crée un compte Twilio
2. Obtiens SID, Token, phone number
3. Dans `.env` :

```env
TWILIO_SID=ACxxxxxxxx
TWILIO_TOKEN=your_token
TWILIO_FROM=+1234567890
```

4. Modifie `src/Notifications.php` pour intégrer l'SDK Twilio :

```bash
composer require twilio/sdk
```

Puis ajoute la logique `sendSMS()` avec l'SDK officiel.

## Performance & scalabilité

### Actuellement

- ✓ File-based JSON : ~1000 colis (acceptable pour PME)
- ✓ Bootstrap 5 : responsive (mobile-friendly)
- ✓ Sans authentification (internal tool, réseau sécurisé)

### Pour croissance

- Migrer vers MySQL (production)
- Ajouter index sur `status`, `created_at`
- Implémenter pagination (liste limite à 50/page)
- Ajouter auth & rôles (receptionist, agent, admin)
- Exporter vers Redis pour cache

## Troubleshooting

### Erreur "Database not found"

```
PHP Fatal error: SQLSTATE[HY000] [2006] MySQL server has gone away
```

**Solution** : Revérifier MySQL connecté, ou utiliser le fallback JSON (auto).

### Notifications ne fonctionnent pas

Logs dans console/serveur :

```
[Notifications] Email skipped to john@example.com: ...
```

C'est **normal** → configure `.env` avec SMTP pour activer les vrais emails.

### Colis disparaît après refresh

Si utilisation JSON fallback, vérifie que `data/colis.json` existe et est lisible :

```bash
ls -la /var/www/colis/data/
cat /var/www/colis/data/colis.json
```

### Erreur 500 sur création

Regarde les logs du serveur PHP :

```
tail -f /var/log/php-error.log
```

Ou regarde la console où tu as lancé `php -S`.

## Test de charge

Script pour créer 100 colis rapidement :

```bash
#!/bin/bash
for i in {1..100}; do
  curl -X POST http://localhost:8000 \
    -d "route=create" \
    -d "sender_name=Exp$i" \
    -d "sender_phone=+237670000000" \
    -d "sender_email=exp$i@test.cm" \
    -d "receiver_name=Rec$i" \
    -d "receiver_phone=+237671111111" \
    -d "receiver_email=rec$i@test.cm" \
    -d "description=Item $i" \
    -d "value=$(( RANDOM % 500000 + 10000 ))" \
    -s > /dev/null
  echo "✓ Colis $i créé"
done
```

Performance :
- JSON : ~5-10s (100 colis)
- MySQL : instant

---

**Prêt à tester ?** Lance `php -S localhost:8000 -t public` et commence !
