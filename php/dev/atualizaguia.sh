#!/bin/bash

URL_BASE="https://twiki.ufba.br/twiki/pub/SUPAC/"
MATERIAS="GradGuiaAreaI1/101
GradGuiaAreaI1/102
GradGuiaAreaI1/103
GradGuiaAreaI1/104
GradGuiaAreaI1/105
GradGuiaAreaI1/106
GradGuiaAreaI1/107
GradGuiaAreaI1/108
GradGuiaAreaI1/109
GradGuiaAreaI1/110
GradGuiaAreaI1/111
GradGuiaAreaI1/112
GradGuiaAreaI1/113
GradGuiaAreaI1/116
GradGuiaAreaI1/118
GradGuiaAreaI1/119
GradGuiaAreaI1/181
GradGuiaAreaI1/182
GradGuiaAreaI1/183
GradGuiaAreaI1/184
GradGuiaAreaI1/185
GradGuiaAreaI1/186
GradGuiaAreaI1/187
GradGuiaAreaI1/188
GradGuiaAreaI1/194
GradGuiaAreaI1/195
GradGuiaAreaI1/196
GradGuiaAreaI1/197
GradGuiaAreaII1/202
GradGuiaAreaII1/203
GradGuiaAreaII1/204
GradGuiaAreaII1/205
GradGuiaAreaII1/206
GradGuiaAreaII1/207
GradGuiaAreaII1/208
GradGuiaAreaII1/209
GradGuiaAreaII1/210
GradGuiaAreaII1/219
GradGuiaAreaII1/222
GradGuiaAreaII1/280
GradGuiaAreaII1/281
GradGuiaAreaII1/282
GradGuiaAreaII1/283
GradGuiaAreaII1/284
GradGuiaAreaIII1/303
GradGuiaAreaIII1/304
GradGuiaAreaIII1/305
GradGuiaAreaIII1/306
GradGuiaAreaIII1/307
GradGuiaAreaIII1/308
GradGuiaAreaIII1/309
GradGuiaAreaIII1/310
GradGuiaAreaIII1/311
GradGuiaAreaIII1/312
GradGuiaAreaIII1/313
GradGuiaAreaIII1/314
GradGuiaAreaIII1/315
GradGuiaAreaIII1/316
GradGuiaAreaIII1/317
GradGuiaAreaIII1/325
GradGuiaAreaIII1/380
GradGuiaAreaIII1/381
GradGuiaAreaIII1/382
GradGuiaAreaIII1/383
GradGuiaAreaIII1/384
GradGuiaAreaIII1/385
GradGuiaAreaIII1/386
GradGuiaAreaIV1/401
GradGuiaAreaIV1/402
GradGuiaAreaIV1/403
GradGuiaAreaIV1/480
GradGuiaAreaIV1/481
GradGuiaAreaV1/501
GradGuiaAreaV1/502
GradGuiaAreaV1/503
GradGuiaAreaV1/505
GradGuiaAreaV1/506
GradGuiaAreaV1/507
GradGuiaAreaV1/508
GradGuiaAreaV1/509
GradGuiaAreaV1/512
GradGuiaAreaV1/513
GradGuiaAreaV1/514
GradGuiaAreaV1/581"

cd ../guia

for i in $MATERIAS
do
  echo wget ${URL_BASE}${i}.html
	wget ${URL_BASE}${i}.html
done

cd -
