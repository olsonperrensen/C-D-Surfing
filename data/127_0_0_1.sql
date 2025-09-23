USE `pets`;

CREATE TABLE `pet_details` (
  `pet_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `size` varchar(255) NOT NULL DEFAULT 'Medium',
  `color` varchar(255) NOT NULL DEFAULT 'Black',
  `story` varchar(255) NOT NULL,
  `diet` text NOT NULL,
  `register_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `healthcare_id` int(11) DEFAULT 5, 
  `online_purchased` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `shipping_info` (
  `shipping_id` int(11) NOT NULL,
  `shipping_type` varchar(255) NOT NULL DEFAULT 'BusinessWeek',
  `shipping_cost` float DEFAULT NULL,
  `shipping_region_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `shopping_cart` (
  `cart_id` int(11) NOT NULL,
  `pet_id` int(11) DEFAULT NULL,
  `dateAdded` datetime DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) DEFAULT NULL,
  `is_regional` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `zipcode` varchar(25) NOT NULL,
  `looking_for` varchar(20) DEFAULT NULL,
  `can_advertise` tinyint(1) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `warnings` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `pet_details` ADD PRIMARY KEY (`pet_id`);
ALTER TABLE `shipping_info` ADD PRIMARY KEY (`shipping_id`);
ALTER TABLE `shopping_cart` ADD PRIMARY KEY (`cart_id`);
ALTER TABLE `users` ADD PRIMARY KEY (`user_id`);

ALTER TABLE `pet_details` MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `shipping_info` MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `shopping_cart` MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users` MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users` ADD UNIQUE KEY `email` (`email`);

-- User roles
INSERT INTO `users` (`user_id`, `email`, `password`, `naam`, `zipcode`, `looking_for`, `can_advertise`, `isAdmin`, `warnings`) VALUES
(1, 'GUNTHER.MERGAN@CDSurfing.be', '$2y$10$8o.mgGy3.wZFCF1WJAKvn.BDbyn6V4JRhkqMXtEZGPxaAcoJVuh1a', 'GUNTHER MERGAN', '2800', 'Cat', 0, 0, 1),
(2, 'MARCEL.VANDENBERGE@CDSurfing.be', 'mu923', 'MARCEL VANDENBERGE', '2800', 'Dog', 1, 0, 0),
(3, 'JEROEN.VANBERKEL@CDSurfing.be', 'xe854', 'JEROEN VANBERKEL', '2800', 'Dog', 0, 0, 0),
(4, 'CINDY.EEKELS@CDSurfing.be', '$2y$10$zqRgQ.YDzJuH5tecBH9m3.OrN41klCrp8aNA4Ojxem7PQGWKrdMG6', 'CINDY EEKELS', '2800', 'Cat', 1, 0, 4);
-- A normal visitor is not included, not necessary because no account
