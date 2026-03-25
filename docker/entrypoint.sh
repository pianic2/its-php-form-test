#!/bin/sh
set -eu

NUMERO="${NUMERO:-1}"
BASE_DIR="/var/www/esercizi"
TARGET_DIR="${BASE_DIR}/esercizio-${NUMERO}"
ESERCIZI_COUNT="$(find "$BASE_DIR" -mindepth 1 -maxdepth 1 -type d -name 'esercizio-*' | wc -l | tr -d '[:space:]')"

if [ "$ESERCIZI_COUNT" -eq 0 ]; then
  echo "Nessuna directory trovata con pattern esercizio-* in $BASE_DIR" >&2
  exit 1
fi

case "$NUMERO" in
  ''|*[!0-9]*)
    echo "Valore NUMERO non valido: $NUMERO (deve essere un intero positivo)" >&2
    exit 1
    ;;
esac

if [ "$NUMERO" -lt 1 ] || [ "$NUMERO" -gt "$ESERCIZI_COUNT" ]; then
  echo "Valore NUMERO non valido: $NUMERO (usa un valore tra 1 e $ESERCIZI_COUNT)" >&2
  exit 1
fi

if [ ! -d "$TARGET_DIR" ]; then
  echo "Cartella non trovata: $TARGET_DIR. Verifica che esista una directory con quel numero." >&2
  exit 1
fi

# Punta Apache direttamente all'esercizio selezionato.
sed -ri "s|/var/www/html|$TARGET_DIR|g" /etc/apache2/sites-available/000-default.conf /etc/apache2/apache2.conf

# Espone asset condivisi da path assoluti.
cat >/etc/apache2/conf-available/shared-assets.conf <<'EOF'
Alias /css /var/www/css
<Directory /var/www/css>
    Options Indexes FollowSymLinks
    AllowOverride None
    Require all granted
</Directory>

Alias /js /var/www/js
<Directory /var/www/js>
    Options Indexes FollowSymLinks
    AllowOverride None
    Require all granted
</Directory>
EOF

a2enconf shared-assets >/dev/null

exec "$@"
