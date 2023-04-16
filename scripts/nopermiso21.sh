#!/bin/bash

cd /etc/cron.d # Nos dirigimos a la ruta

tcron="21" # Son variables
num="755" # Son variables

# Damos permiso completo de edicion, lectura y ejecucion
# ontest y offtest es un archivo pero sin extension asi como 
# permiso.sh que lleva extension
sudo chmod -R "$num" ontest"$tcron"
sudo chmod -R "$num" offtest"$tcron"

# Hacemos una pausa de 1 Segundo para que haga efecto
sleep 1
# /var/syslog/ --- para ver las acciones ocurridas
