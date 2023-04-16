#!/bin/bash
num="27"
log="off"

ruta="/var/www/proyectoia/ficheros/registros/"

sudo chmod -R 777 "$ruta"

cd "$ruta"
sudo echo -e 0 >> gpio"$num".txt
#echo "Preparando Correo"
now=$(date)
status="Se apago el GPIO#""$num"
sudo echo -e "$now""\n""$status" >> "$log"log.txt

#sudo chmod -R 755 "$ruta"

correo="proyectoiahn@gmail.com"
msg="Enviado desde Linux"

sudo mail -s "GPIO ""$num"" APAGADO" "$correo" -A "$log"log.txt <<< "$msg"

