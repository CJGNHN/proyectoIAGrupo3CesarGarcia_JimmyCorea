#!/bin/bash
num="27"
log="on"

ruta="/var/www/proyectoia/ficheros/registros/"

#pwd

sudo chmod -R 777 "$ruta"

cd "$ruta"
sudo echo -e 1 >> gpio"$num".txt
#echo "Preparando Correo"
now=$(date)
status="Se encendio el GPIO#""$num"
sudo echo -e "$now""\n""$status" >> "$log"log.txt

#sudo chmod -R 755 "$ruta"

correo="proyectoiahn@gmail.com"
msg="Enviado desde Linux"

sudo mail -s "GPIO ""$num"" ENCENDIDO" "$correo" -A "$log"log.txt <<< "$msg"

