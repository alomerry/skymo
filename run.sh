#! /bin/bash
# author:alomerry

cd /www/wwwroot/alomerry.com/usr/plugins/SkyMo

pwd

echo "start pull code..."
whoami
git reset --hard origin/develop
git pull

echo "repository update success! "