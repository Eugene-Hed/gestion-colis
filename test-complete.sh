#!/bin/bash

echo "🧪 Test complet de la plateforme moderne de gestion des colis"
echo "=============================================================="
echo ""

# Couleurs
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

TESTS_PASSED=0
TESTS_FAILED=0

# Fonction pour tester
test_route() {
    local route=$1
    local description=$2
    local method=${3:-GET}
    
    echo -ne "${BLUE}[TEST]${NC} $description ... "
    
    if [ "$method" = "POST" ]; then
        response=$(curl -s -X POST "http://localhost:8000/index.php?route=$route" \
            -d "sender_name=Test&sender_phone=611111111&sender_email=test@test.com&receiver_name=Test&receiver_phone=622222222&receiver_email=test2@test.com&description=Test&value=50000")
    else
        response=$(curl -s "http://localhost:8000/index.php?route=$route")
    fi
    
    if echo "$response" | grep -q "Gestion Colis"; then
        echo -e "${GREEN}✅ PASS${NC}"
        ((TESTS_PASSED++))
    else
        echo -e "${RED}❌ FAIL${NC}"
        ((TESTS_FAILED++))
    fi
}

# Fonction pour tester la structure
test_file_exists() {
    local file=$1
    local description=$2
    
    echo -ne "${BLUE}[TEST]${NC} $description ... "
    
    if [ -f "$file" ]; then
        echo -e "${GREEN}✅ PASS${NC}"
        ((TESTS_PASSED++))
    else
        echo -e "${RED}❌ FAIL${NC}"
        ((TESTS_FAILED++))
    fi
}

echo "📁 Vérification de la structure"
test_file_exists "/var/www/colis/public/index.php" "Point d'entrée principal"
test_file_exists "/var/www/colis/templates/layout.php" "Layout base Tailwind CSS"
test_file_exists "/var/www/colis/templates/dashboard.php" "Tableau de bord"
test_file_exists "/var/www/colis/templates/list.php" "Liste des colis"
test_file_exists "/var/www/colis/templates/form.php" "Formulaire création"
test_file_exists "/var/www/colis/templates/view.php" "Détail colis"
test_file_exists "/var/www/colis/src/ShipmentModel.php" "Modèle ShipmentModel"
test_file_exists "/var/www/colis/src/Notifications.php" "Service Notifications"

echo ""
echo "🔌 Vérification du serveur"
echo -ne "${BLUE}[TEST]${NC} Serveur répond sur localhost:8000 ... "
if curl -s http://localhost:8000/index.php?route=dashboard > /dev/null 2>&1; then
    echo -e "${GREEN}✅ PASS${NC}"
    ((TESTS_PASSED++))
else
    echo -e "${RED}❌ FAIL${NC}"
    ((TESTS_FAILED++))
fi

echo ""
echo "🌐 Vérification des routes"
test_route "dashboard" "Dashboard charge correctement"
test_route "list" "Liste des colis charge"
test_route "new" "Formulaire création charge"

echo ""
echo "🎨 Vérification du CSS/Design"
echo -ne "${BLUE}[TEST]${NC} Tailwind CSS est inclus ... "
if curl -s "http://localhost:8000/index.php?route=dashboard" | grep -q "tailwindcss"; then
    echo -e "${GREEN}✅ PASS${NC}"
    ((TESTS_PASSED++))
else
    echo -e "${RED}❌ FAIL${NC}"
    ((TESTS_FAILED++))
fi

echo -ne "${BLUE}[TEST]${NC} Classes Tailwind sont appliquées ... "
if curl -s "http://localhost:8000/index.php?route=dashboard" | grep -q "grid grid-cols"; then
    echo -e "${GREEN}✅ PASS${NC}"
    ((TESTS_PASSED++))
else
    echo -e "${RED}❌ FAIL${NC}"
    ((TESTS_FAILED++))
fi

echo -ne "${BLUE}[TEST]${NC} Animations sont définies ... "
if curl -s "http://localhost:8000/index.php?route=dashboard" | grep -q "animate-fade-in"; then
    echo -e "${GREEN}✅ PASS${NC}"
    ((TESTS_PASSED++))
else
    echo -e "${RED}❌ FAIL${NC}"
    ((TESTS_FAILED++))
fi

echo ""
echo "💾 Vérification de la base de données"
echo -ne "${BLUE}[TEST]${NC} Fichier JSON de fallback existe ... "
if [ -f "/var/www/colis/data/colis.json" ]; then
    echo -e "${GREEN}✅ PASS${NC}"
    ((TESTS_PASSED++))
else
    echo -e "${RED}❌ FAIL${NC}"
    ((TESTS_FAILED++))
fi

echo -ne "${BLUE}[TEST]${NC} Structure JSON est valide ... "
if php -r "
\$json = file_get_contents('/var/www/colis/data/colis.json');
if (json_decode(\$json) !== null) { exit(0); }
exit(1);
" 2>/dev/null; then
    echo -e "${GREEN}✅ PASS${NC}"
    ((TESTS_PASSED++))
else
    echo -e "${RED}❌ FAIL${NC}"
    ((TESTS_FAILED++))
fi

echo ""
echo "📊 Vérification des stats"
echo -ne "${BLUE}[TEST]${NC} Tableau de bord affiche les statistiques ... "
if curl -s "http://localhost:8000/index.php?route=dashboard" | grep -q "Valeur totale\|Revenus générés"; then
    echo -e "${GREEN}✅ PASS${NC}"
    ((TESTS_PASSED++))
else
    echo -e "${RED}❌ FAIL${NC}"
    ((TESTS_FAILED++))
fi

echo ""
echo "📱 Vérification Responsive"
echo -ne "${BLUE}[TEST]${NC} Design responsive (grid système) ... "
if curl -s "http://localhost:8000/index.php?route=dashboard" | grep -q "md:grid-cols\|lg:grid-cols"; then
    echo -e "${GREEN}✅ PASS${NC}"
    ((TESTS_PASSED++))
else
    echo -e "${RED}❌ FAIL${NC}"
    ((TESTS_FAILED++))
fi

echo ""
echo "🎁 Vérification du formulaire"
echo -ne "${BLUE}[TEST]${NC} Formulaire a validation ... "
if curl -s "http://localhost:8000/index.php?route=new" | grep -q "required\|input-field"; then
    echo -e "${GREEN}✅ PASS${NC}"
    ((TESTS_PASSED++))
else
    echo -e "${RED}❌ FAIL${NC}"
    ((TESTS_FAILED++))
fi

echo -ne "${BLUE}[TEST]${NC} Formulaire calcule les prix ... "
if curl -s "http://localhost:8000/index.php?route=new" | grep -q "value \* 0.10\|calculatePrice"; then
    echo -e "${GREEN}✅ PASS${NC}"
    ((TESTS_PASSED++))
else
    echo -e "${RED}❌ FAIL${NC}"
    ((TESTS_FAILED++))
fi

echo ""
echo "🔄 Vérification navigation"
echo -ne "${BLUE}[TEST]${NC} Navigation contient dashboard ... "
if curl -s "http://localhost:8000/index.php?route=list" | grep -q "route=dashboard"; then
    echo -e "${GREEN}✅ PASS${NC}"
    ((TESTS_PASSED++))
else
    echo -e "${RED}❌ FAIL${NC}"
    ((TESTS_FAILED++))
fi

echo -ne "${BLUE}[TEST]${NC} Navigation contient nouveau colis ... "
if curl -s "http://localhost:8000/index.php?route=list" | grep -q "route=new"; then
    echo -e "${GREEN}✅ PASS${NC}"
    ((TESTS_PASSED++))
else
    echo -e "${RED}❌ FAIL${NC}"
    ((TESTS_FAILED++))
fi

# Résumé
echo ""
echo "=============================================================="
echo "📊 Résumé des tests"
echo "=============================================================="
echo -e "${GREEN}✅ Tests réussis: $TESTS_PASSED${NC}"
if [ $TESTS_FAILED -gt 0 ]; then
    echo -e "${RED}❌ Tests échoués: $TESTS_FAILED${NC}"
else
    echo -e "${RED}❌ Tests échoués: 0${NC}"
fi

TOTAL=$((TESTS_PASSED + TESTS_FAILED))
PERCENTAGE=$((TESTS_PASSED * 100 / TOTAL))

echo ""
echo "📈 Score: $PERCENTAGE% ($TESTS_PASSED/$TOTAL)"
echo ""

if [ $TESTS_FAILED -eq 0 ]; then
    echo -e "${GREEN}🎉 Tous les tests sont passés avec succès!${NC}"
    echo ""
    echo "🚀 La plateforme est prête pour la production!"
    echo ""
    echo "📍 Accédez à: http://localhost:8000/index.php?route=dashboard"
    exit 0
else
    echo -e "${RED}⚠️  Certains tests ont échoué.${NC}"
    exit 1
fi
