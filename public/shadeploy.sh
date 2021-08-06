#!/bin/sh

#deploy sha256 message folder for godjango apk

ndir="../../messages/"
mkdir $ndir
hs=$(echo $1 | shasum -a 256 | cut -f1 -d" ")
hs=${hs}".sd"
echo $hs > hash
ndir=${ndir}${hs}
mkdir $ndir

exit 0
