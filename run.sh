#! /bin/bash
# April 17 2023
#Mostafa Khastkhodaei

apt update -y

apt upgrade -y

gitt pull https://github.com/khastkhodaei/cloudprg.git

sudo docker compose up -d

sudo docker start mongoexprg
