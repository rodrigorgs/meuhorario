#!/bin/bash
URL_BASE="https://twiki.ufba.br/twiki/pub/SUPAC/MatriculaGraduacaoUnidade1/"

UNIDADES="ARQ
ENG
FIS
GEO
MAT
QUI
BIO
ENF
FAR
ICS
MED
MEV
NUT
FOF
ISC
ADM
FCC
ECO
COM
DIR
EDC
FCH
IPS
ICI
LET
EBA
DAN
TEA
MUS
HAC
IMS"

cd ../guia

for i in $UNIDADES
do
	wget ${URL_BASE}${i}.html
done

cd -
