#!/bin/bash 
#seteand pasword de postgres
#tamano de disco antes de ejecutar:
#/dev/mapper/centos-root   6,7G   1,3G  5,5G  19% /

#seteo la clave de postgres globalmente
export PGPASSWORD='12345678';

#funciones para imprimir las cabeceras
function cabeceras(){
    echo "---------------"
    #echo "20-Nov-2015 09:01:57.945 queries: client 10.102.20.97#36557: query: i.instagram.com IN A + (10.102.12.2)"
    echo $1
    echo "---------------"
    echo "0:fecha"
    echo "1:hora"
    echo "4:queries"
    echo "5:client"
    echo "6:ip origen#puerto virtual"
    echo "7:query"
    echo "8:url peticion"
    echo "9:IN"
    echo "10:A"
    echo "12:ip destino"
}
#funcion para verificar si un string contiene un determinado string
contains() {
    string="$1"
    substring="$2"
    if test "${string#*$substring}" != "$string"
    then
        return 0    # $substring is in $string
    else
        return 1    # $substring is not in $string
    fi
}

cabeceras 

#limpio el archivo facebook.txt
echo ""> "facebook.txt"
echo ""> "uta.txt"

#numero de linea desde la que recorro el archivo
COUNTER=80100
#contador
INDICE=0
DATOS=""
#obtengo el numero de lineas que tiene el archivo
N=$(cat named.run.11 | wc -l )

#capturo el tiempo inicial
ts=$(date +%s%N)
#recorro el archivo desde el numero linea $COUNTER hasta el final del archivo $N
while [ $COUNTER -lt $N ]
do
    #caputora la linea en una variable
    LINEA=$(sed -n "${COUNTER}p" "named.run.10")
    #divido la linea en partes,separandolas por :
    PARTES=( $(echo $LINEA| tr : " ") )    
    #echo '--------'$COUNTER'--------'$INDICE'======='$LINEA
    fecha=${PARTES[0]}
    hora=${PARTES[1]}:${PARTES[2]}:${PARTES[3]}
    #echo ${PARTES[4]}:${PARTES[5]}
    origen=${PARTES[6]}
    #echo ${PARTES[7]}
    url=${PARTES[8]}
    tipo=${PARTES[9]}
    a=${PARTES[10]}
    #echo ${PARTES[11]}
    destino=${PARTES[12]}
    COUNTER=$[COUNTER + 1]
    INDICE=$[INDICE + 1]
    #agrego los datos del insert a DATOS
    DATOS+="('$fecha','$hora','$origen','$url','$ipo','$a','$destino'), "
    
    #verifico si ya son 100 registros para crear el insert
    if [ $INDICE -eq 100 ];
    then
        #capturo el tiempo transcurrido
        tt=$((($(date +%s%N) - $ts)/1000000))
        INDICE=0
        #tomo la longitud de la cadena DATOS
        size=${#DATOS}
        echo '--------'$COUNTER'------'$tt' milisegundos'
        #echo "insert into registros values  ${DATOS:0:$[$size-2]}"
        #envio a insertar en el servidor postgres los 100 datos
        psql -h 192.168.1.50 -U postgres -d datos -c "insert into registros2(fecha,hora,origen,url,dir,tipo,destino) values ${DATOS:0:$[$size-2]}"
        DATOS=""
        #reinicio el tiempo inicial
        ts=$(date +%s%N)
    fi
    
    if contains $url "facebook"
    then
        echo $COUNTER":::::"$fecha" : "$hora"      "$origen"   :   "$url"    :  "$tipo"  "$a"  :  "$destino >> "facebook.txt"
    fi
    
    if contains $url "uta"
    then
        echo $COUNTER":::::"$fecha" : "$hora"      "$origen"   :   "$url"    :  "$tipo"  "$a"  :  "$destino >> "uta.txt"
    fi
done
