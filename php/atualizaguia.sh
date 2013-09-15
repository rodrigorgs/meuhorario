#!/bin/bash

URL_BASE="https://twiki.ufba.br/twiki/pub/SUPAC/"
AREA_1="GradGuiaAreaI/"
AREA_2="GradGuiaAreaII/"
AREA_3="GradGuiaAreaIII/"
AREA_4="GradGuiaAreaIV/"
AREA_5="GradGuiaAreaV/"
AREA_6="GradGuiaIHAC/"

MAT_1="101 102 103 104 105 106 107 108 109 110 111 112 113 116 118 119 181 182 183 184 185 186 187 188 194 195 196 197"
MAT_2="202 203 204 205 206 207 208 209 210 219 222 280 281 282 283 284"
MAT_3="303 304 305 306 307 308 309 310 311 312 313 314 315 316 317 325 380 381 382 383 384 385 386"
MAT_4="401 402 403 480 481"
MAT_5="501 502 503 505 506 507 508 509 512 513 514 581"
MAT_6="189 190 226 286 327 387 515 580"

cd guia

# for i in ${MAT_1}
# do
# 	wget ${URL_BASE}${AREA_1}${i}.html -O ${i}.html
# done
# for i in ${MAT_2}
# do
# 	wget ${URL_BASE}${AREA_2}${i}.html -O ${i}.html
# done
# for i in ${MAT_3}
# do
# 	wget ${URL_BASE}${AREA_3}${i}.html -O ${i}.html
# done
# for i in ${MAT_4}
# do
# 	wget ${URL_BASE}${AREA_4}${i}.html -O ${i}.html
# done
# for i in ${MAT_5}
# do
# 	wget ${URL_BASE}${AREA_5}${i}.html -O ${i}.html
# done
for i in ${MAT_6}
do
	wget ${URL_BASE}${AREA_6}${i}.html -O ${i}.html
done
cd ..
