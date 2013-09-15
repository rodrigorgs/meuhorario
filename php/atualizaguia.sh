#!/bin/bash

URL_BASE="https://twiki.ufba.br/twiki/pub/SUPAC/"
AREAS="GradGuiaAreaI" # GradGuiaAreaII GradGuiaAreaIII GradGuiaAreaIV GradGuiaAreaV GradGuiaIHAC GradGuiaICAD GradGuiaIMS"
MATERIAS="112"

cd guia

for area in $AREAS
do
    for i in $MATERIAS
    do
	    wget ${URL_BASE}/${area}/${i}.html -O ${i}.html
    done
done


cd ..
