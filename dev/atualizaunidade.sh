#!/bin/bash
URL_BASE="http://www.supac.ufba.br/GuiaUnid/"

UNIDADES="ADM \
AGR  \
ARQ \
BIO \
COM \
DAN \
DIR \
EBA \
ECO \
EDC \
ENF \
ENG \
FAR \
FCC \
FCH \
FIS \
FOF \
GEO \
ICI \
ICS \
LET \
MAT \
MED \
MEV \
MUS \
NUT \
QUI \
TEA"

cd ../guia

for i in $UNIDADES
do
	wget ${URL_BASE}${i}.html -O ${i}.html
done

cd -
