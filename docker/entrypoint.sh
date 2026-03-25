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

rm -rf /var/www/html/*
cp -R "$TARGET_DIR"/. /var/www/html/

exec "$@"
