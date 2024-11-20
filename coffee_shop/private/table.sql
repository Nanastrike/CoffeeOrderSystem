-- database: 'coffee shop' and php web application user
CREATE DATABASE coffee_shop;
GRANT USAGE ON *.* TO 'appuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON coffee_shop.* To 'appuser'@'localhost';
FLUSH PRIVILEGES;

USE coffee_shop;

-- table structure for table 
--
CREATE TABLE IF NOT EXISTS `registration`(
    `user_id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `email_address` varchar(200) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;

-- table history order list
--
CREATE TABLE IF NOT EXISTS `order_list`(
    `order_id` int NOT NULL AUTO_INCREMENT,
    `product_name` varchar(50) NOT NULL,
    `product_price` DECIMAL(10,2) NOT NULL,
    `product_num` int NOT NULL,
    `registration_user_id` int NOT NULL,
    PRIMARY KEY (`order_id`),
    FOREIGN KEY (`registration_user_id`) REFERENCES `registration`(`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;

-- table structure for coffee details
--
CREATE TABLE IF NOT EXISTS `coffee_details`(
    `coffee_name` varchar(50) NOT NULL,
    `coffee_price` DECIMAL  (10,2) NOT NULL,
    `cup_size` varchar(45) NOT NULL,
    `ice` varchar(45) NOT NULL,
    `milk` varchar(45) NOT NULL,
    `coffee_description` varchar(200) NOT NULL,
    `order_list_order_id` int NULL,
    PRIMARY KEY (`coffee_name`),
    FOREIGN KEY (`order_list_order_id`) REFERENCES `order_list`(`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;

-- Insert data into registration
INSERT INTO `registration` (`name`, `email_address`, `password`)
VALUES ('Alice', 'alice@example.com', 'hashed_password');

-- Insert data into order_list
INSERT INTO `order_list` (`product_name`, `product_price`, `product_num`, `registration_user_id`)
VALUES ('Latte', 4.50, 2, 1);

-- Insert data into coffee_details
INSERT INTO `coffee_details` (`coffee_name`, `coffee_price`, `cup_size`, `ice`, `milk`, `coffee_description`, `order_list_order_id`)
VALUES ('Latte', 4.50, 'Medium', 'No', 'Whole Milk', 'Delicious creamy latte', 1);