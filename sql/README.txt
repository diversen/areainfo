# go into mysql mode with a user who can create databases:

mysql -uusername -ppassword;

# create database
create database areainfo;

#If ok (you will get something like this):
Query OK, 1 row affected (0,07 sec)

# leave mysql mode
exit

# insert table into created database
mysql -uusername -ppassword areainfo < ./sql/mysql.sql

# you have the database and table set up. Edit config file

cp config/config.ini-dist config/config.ini
gedit config/config.ini

# set db url, user and password. Insert into database table.

./run.php
