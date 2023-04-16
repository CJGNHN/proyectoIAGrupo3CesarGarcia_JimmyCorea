#!/bin/bash

num="17"
log="on"

ruta="/var/www/proyectoia/ficheros/registros/"
sudo chmod -R 777 "$ruta"

cd "$ruta"
echo -e 1 >> gpio"$num".txt
#echo "Preparando Correo"
now=$(date) # Una variable con la fecha y hora de la Maquina
status="Se encendio el GPIO#""$num" # Una variable mas

echo -e "$now""\n""$status" >> "$log"log.txt

correo="proyectoiahn@gmail.com"
msg="Enviado desde Linux"

sudo mail -s "GPIO ""$num"" ENCENDIDO" "$correo" -A "$log"log.txt <<< "$msg"

