-- database: 'coffee shop' and php web application user
CREATE DATABASE coffee_shop;
GRANT USAGE ON *.* TO 'appuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON coffee_shop.* To 'appuser'@'localhost';
FLUSH PRIVILEGES;

USE coffee_shop;

-- table structure for table 
--
