#!/usr/bin/env bash

echo '############################################################'
echo '# PROVISION START'
echo '############################################################'

if [ ! -e /setup_completed ]; then
	echo '------------------------------------------------------------'
	echo '# INSTALL SOFTWARE'
	echo '------------------------------------------------------------'
	yum install -y httpd
	yum install -y mariadb mariadb-server mariadb-devel
	yum install -y php php-mbstring php-mysql
	yum install -y git vim
	yum install -y epel-release
	yum install --enablerepo=epel -y phpMyAdmin


	echo '------------------------------------------------------------'
	echo '# Firewall Setting'
	echo '------------------------------------------------------------'
	systemctl stop firewalld.service
	systemctl disable firewalld.service


	echo '------------------------------------------------------------'
	echo '# Apache Setting'
	echo '------------------------------------------------------------'
	systemctl enable httpd.service
	cp -f /vagrant/vagrant/conf/httpd.conf /etc/httpd/conf/httpd.conf
	cp -f /vagrant/vagrant/conf/phpMyAdmin.conf /etc/httpd/conf.d/phpMyAdmin.conf
	systemctl start httpd.service


	echo '------------------------------------------------------------'
	echo '# MySQL Setting'
	echo '------------------------------------------------------------'
	systemctl enable mariadb.service
	systemctl start mariadb.service
	mysql -u root -e "DELETE FROM mysql.user where host <> 'localhost' or user <> 'root';"
	mysql -u root -e "CREATE DATABASE cms DEFAULT CHARACTER SET utf8;"
	mysql -u root -e "SET PASSWORD FOR root@localhost = PASSWORD('root');"


	echo '------------------------------------------------------------'
	echo '# FuelPHP Setting'
	echo '------------------------------------------------------------'
	curl get.fuelphp.com/oil | sh

	touch /setup_completed
fi

cd /vagrant
oil refine migrate --version=0
oil refine migrate
oil refine migrate:current
oil refine provider
oil refine install

echo '############################################################'
echo '# PROVISION FINISH'
echo '############################################################'
