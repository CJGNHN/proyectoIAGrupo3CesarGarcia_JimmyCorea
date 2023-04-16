#!/bin/bash

cd /etc/cron.d # Nos dirigimos a la ruta

tcron="21" # Son variables
num="777" # Son variables

# Damos permiso completo de edicion, lectura y ejecucion
sudo chmod -R "$num" ontest"$tcron"
sudo chmod -R "$num" offtest"$tcron"

# Hacemos una pausa de 1 Segundo para que haga efecto
sleep 1
# /var/syslog/ --- para ver las acciones ocurridas
