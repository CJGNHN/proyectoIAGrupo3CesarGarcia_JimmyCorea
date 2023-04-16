#!/bin/bash
#echo "Prepando Selfie"
ruta="/var/www/proyectoia/ficheros/foto/"
sudo chmod -R 777 "$ruta"
cd "$ruta"
date=$(date)
fswebcam selfie."$date".jpg


