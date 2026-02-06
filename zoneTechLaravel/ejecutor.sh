#!/bin/bash
# Obtener fecha y hora actual en formato legible
ACTUAL_DATE=$(date +"%Y-%m-%d")
ACTUAL_TIME=$(date +"%H:%M:%S")
# Mensaje a enviar/mostrar
MENSAJE="Script Ejecutado Correctamente ${ACTUAL_DATE} ${ACTUAL_TIME}"

# 1. Imprimir en consola
echo "$MENSAJE"

# 2. Guardar en un archivo de log (opcional pero recomendado para seguimiento)
# Esto se guardará en la misma carpeta donde esté el script
echo "$MENSAJE" >> "$(dirname "$0")/registro_ejecucion.log"
