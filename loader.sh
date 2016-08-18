echo "cargando datos del:"$(date)>> /loader_log.txt

#seteo la clave de postgres globalmente
export PGPASSWORD='12345678';

dirname=$(ls -lt /var/named/data/named.run-* | head -1)
log_bind=$(echo $dirname | cut -d ' ' -f 9-)
echo $log_bind

#lea desde la ultima linea ya leida
ultimo=$(cat /ultimo.txt)

#obtengo el numero de lineas que tiene el archivo
N=$(cat $log_bind | wc -l )

#capturo el tiempo inicial
ts=$(date +%s%N)
#recorro el archivo desde el numero linea $COUNTER hasta el final del archivo $N
while [ $ultimo -lt $N ]
do
    #caputora la linea en una variable
    LINEA=$(sed -n "${COUNTER}p" $log_bind)
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
    
    psql -h 192.168.1.50 -U postgres -d datos -c "insert into registros2(fecha,hora,origen,url,dir,tipo,destino) values $DATOS"
done

echo "$N" > /ultimo.txt
