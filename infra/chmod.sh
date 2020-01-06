#!/bin/bash
BASE=/var/www/exam_manage/
cd "${BASE}"

PORT=10

while true
do
  echo $PORT
  PORT=`expr $PORT + 1`
  /usr/bin/chmod 777 -R app/Http/Controllers/Exam80$PORT/ 
  if [ $PORT -eq 100 ]; then
    exit 0
  fi
done

