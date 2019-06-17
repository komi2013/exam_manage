#!/bin/bash
BASE=/var/www/exam_manage/
cd "${BASE}"app/Http/Controllers
/usr/bin/rsync -a --delete Exam8001/ Exam$1/
/usr/bin/find ./Exam$1/ -type f -print0 | xargs -0 sed -i -e "s/8001/$1/"
#echo "${E}""${N}""${S}"
BASE=/var/www/exam_manage/
cd "${BASE}"resources/views/
/usr/bin/rsync -a --delete exam8001/ exam$1/
#/usr/bin/find ./exam$1/ -type f -print0 | xargs -0 sed -i -e "s/8001/$1/"

