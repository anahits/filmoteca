## Disabled interactive prompt ##
export DEBIAN_FRONTEND=noninteractive

apt-get update
apt-get install -y apache2 php5 php5-mysql php-pear php5-dev php5-mcrypt php5-cli php5-gd php5-xdebug curl mysql-client postfix mysql-server vim npm git

rm -rf /var/www
ln -fs /vagrant /var/www

curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

npm install -g bower

## Repairing npm not found by bower.
ln -s /usr/bin/nodejs /usr/bin/node

################################
## Creating database and user ##
################################

sql1="create database if not exists filmoteca;"

sql2="create user 'homestead' IDENTIFIED BY 'homestead';"

sql3="grant all on filmoteca.* to 'homestead'@'localhost' identified by 'homestead';"

sql4="flush privileges;"

sql5="use filmoteca;"

sql="${sql1}${slq2}${sql3}${sql4}${sql5}"

echo $sql | mysql

###########################
## Creating virtualhost  ##
###########################

VHOST=$(cat <<EOF
<VirtualHost *:80>
  DocumentRoot "/var/www/htdocs"
  ServerName filmoteca.dev
  <Directory "/var/www/htdocs">
    AllowOverride All
    Require all granted
  </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-available/filmoteca.dev.conf

ln -s /etc/apache2/sites-available/filmoteca.dev.conf /etc/apache2/sites-enabled/filmoteca.dev.conf

rm /etc/apache2/sites-enabled/000-default.conf


####################################
## Enable Apache's rewrite module ##
####################################

a2enmod rewrite

php5enmod mcrypt

service apache2 restart

####################################
## Running migrations and seeders ##
####################################

cd ..

php artisan migrate --env=local
php artisan db:seed --env=local
