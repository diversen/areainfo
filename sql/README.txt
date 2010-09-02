Create mysql database:

# go into mysql mode
mysql -uusername -ppassword;

# create database
create database areainfo;

If ok (you will get something like this):
Query OK, 1 row affected (0,07 sec)

# leave mysql mode
exit

# insert table into created database
mysql -uusername -ppassword areainfo < ./sql/mysql.sql
