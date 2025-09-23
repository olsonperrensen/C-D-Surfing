USE `railway`;

-- Create tables in proper order to respect foreign key dependencies
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `zipcode` varchar(25) NOT NULL,
  `looking_for` varchar(20) DEFAULT NULL,
  `can_advertise` tinyint(1) NOT NULL DEFAULT 0,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `warnings` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL,
  `profile_image` varchar(500) DEFAULT 'assets/img/profile_generic.png',
  `bio` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `city` varchar(100) DEFAULT 'Mechelen',
  `country` varchar(100) DEFAULT 'Belgium',
  `verified` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `breeds` (
  `breed_id` int(11) NOT NULL AUTO_INCREMENT,
  `isFeline` tinyint(1) NOT NULL COMMENT '1 for cat, 0 for dog',
  `image_link` varchar(500) DEFAULT 'assets/img/generic_0.png',
  `length` varchar(255) DEFAULT 'Medium',
  `good_with_children` int(1) DEFAULT 3,
  `good_with_dogs` int(1) DEFAULT 3,
  `shedding` int(1) DEFAULT 3,
  `grooming` int(1) DEFAULT 3,
  `drooling` int(1) DEFAULT 3,
  `coat_length` varchar(50) DEFAULT 'Medium',
  `good_with_strangers` int(1) DEFAULT 3,
  `playfulness` int(1) DEFAULT 3,
  `protectiveness` int(1) DEFAULT 3,
  `trainability` int(1) DEFAULT 3,
  `energy` int(1) DEFAULT 3,
  `vocal_communication` int(1) DEFAULT 3,
  `min_life_expectancy` int(2) DEFAULT 10,
  `max_life_expectancy` int(2) DEFAULT 15,
  `max_height_male` decimal(4,1) DEFAULT NULL,
  `max_height_female` decimal(4,1) DEFAULT NULL,
  `max_weight_male` decimal(5,1) DEFAULT NULL,
  `max_weight_female` decimal(5,1) DEFAULT NULL,
  `min_height_male` decimal(4,1) DEFAULT NULL,
  `min_height_female` decimal(4,1) DEFAULT NULL,
  `min_weight_male` decimal(5,1) DEFAULT NULL,
  `min_weight_female` decimal(5,1) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `origin` varchar(100) DEFAULT 'Unknown',
  `intelligence` int(1) DEFAULT 3,
  `other_pets_friendly` int(1) DEFAULT 3,
  `family_friendly` int(1) DEFAULT 3,
  `general_health` int(1) DEFAULT 3,
  `popularity_rank` int(3) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`breed_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `healthcare_plans` (
  `healthcare_id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `monthly_cost` decimal(6,2) DEFAULT 0.00,
  `coverage_percentage` int(3) DEFAULT 80,
  `annual_limit` decimal(8,2) DEFAULT 5000.00,
  `deductible` decimal(6,2) DEFAULT 100.00,
  `is_active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`healthcare_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `pet_details` (
  `pet_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `healthcare_id` int(11) DEFAULT 1,
  `name` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `age` int(11) NOT NULL,
  `size` enum('Small','Medium','Large','Extra Large') NOT NULL DEFAULT 'Medium',
  `color` varchar(255) NOT NULL DEFAULT 'Mixed',
  `story` text NOT NULL,
  `diet` text NOT NULL,
  `temperament` varchar(255) DEFAULT 'Friendly',
  `special_needs` text DEFAULT NULL,
  `vaccination_status` enum('Current','Needs Update','Unknown') DEFAULT 'Current',
  `microchipped` tinyint(1) DEFAULT 0,
  `spayed_neutered` tinyint(1) DEFAULT 0,
  `adoption_fee` decimal(6,2) DEFAULT 0.00,
  `status` enum('Available','Pending','Adopted','Not Available') DEFAULT 'Available',
  `featured` tinyint(1) DEFAULT 0,
  `view_count` int(11) DEFAULT 0,
  `register_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `online_purchased` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`pet_id`),
  KEY `owner_id` (`owner_id`),
  KEY `breed_id` (`breed_id`),
  KEY `healthcare_id` (`healthcare_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `pet_images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `pet_id` int(11) NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `is_primary` tinyint(1) DEFAULT 0,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`image_id`),
  KEY `pet_id` (`pet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `shipping_regions` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(100) NOT NULL,
  `country_code` varchar(3) DEFAULT 'BE',
  `base_cost` decimal(6,2) DEFAULT 0.00,
  `delivery_time_days` int(3) DEFAULT 3,
  `is_active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `shipping_info` (
  `shipping_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipping_type` varchar(255) NOT NULL DEFAULT 'Standard',
  `shipping_cost` decimal(6,2) DEFAULT 15.00,
  `shipping_region_id` int(11) DEFAULT 1,
  `estimated_days` int(3) DEFAULT 3,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`shipping_id`),
  KEY `shipping_region_id` (`shipping_region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `shopping_cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `pet_id` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `added_price` decimal(8,2) DEFAULT 0.00,
  `dateAdded` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_regional` tinyint(1) DEFAULT 0,
  `session_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `pet_id` (`pet_id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `adoption_applications` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `pet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `application_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Pending','Approved','Rejected','Under Review') DEFAULT 'Pending',
  `family_members` int(2) DEFAULT NULL,
  `children_ages` varchar(100) DEFAULT NULL,
  `other_pets` text DEFAULT NULL,
  `home_type` enum('Apartment','House','Farm','Other') DEFAULT 'House',
  `yard_size` varchar(50) DEFAULT NULL,
  `work_schedule` text DEFAULT NULL,
  `previous_experience` text DEFAULT NULL,
  `reason_for_adoption` text DEFAULT NULL,
  `vet_reference` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `contacted_date` datetime DEFAULT NULL,
  `decision_date` datetime DEFAULT NULL,
  PRIMARY KEY (`application_id`),
  KEY `pet_id` (`pet_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pet_id` int(11) DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL,
  `transaction_type` enum('Adoption Fee','Donation','Membership','Product') DEFAULT 'Adoption Fee',
  `payment_method` varchar(50) DEFAULT 'Credit Card',
  `status` enum('Pending','Completed','Failed','Refunded') DEFAULT 'Pending',
  `stripe_payment_intent_id` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `completed_at` datetime DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `user_id` (`user_id`),
  KEY `pet_id` (`pet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `pet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(1) NOT NULL CHECK (rating >= 1 AND rating <= 5),
  `title` varchar(255) DEFAULT NULL,
  `comment` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_verified` tinyint(1) DEFAULT 0,
  `response` text DEFAULT NULL,
  `response_date` datetime DEFAULT NULL,
  PRIMARY KEY (`review_id`),
  KEY `pet_id` (`pet_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Add foreign key constraints after all tables are created
ALTER TABLE `pet_details` 
  ADD CONSTRAINT `fk_pet_owner` FOREIGN KEY (`owner_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pet_breed` FOREIGN KEY (`breed_id`) REFERENCES `breeds` (`breed_id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `fk_pet_healthcare` FOREIGN KEY (`healthcare_id`) REFERENCES `healthcare_plans` (`healthcare_id`) ON DELETE SET NULL;

ALTER TABLE `pet_images` 
  ADD CONSTRAINT `fk_image_pet` FOREIGN KEY (`pet_id`) REFERENCES `pet_details` (`pet_id`) ON DELETE CASCADE;

ALTER TABLE `shipping_info` 
  ADD CONSTRAINT `fk_shipping_region` FOREIGN KEY (`shipping_region_id`) REFERENCES `shipping_regions` (`region_id`) ON DELETE SET NULL;

ALTER TABLE `shopping_cart` 
  ADD CONSTRAINT `fk_cart_pet` FOREIGN KEY (`pet_id`) REFERENCES `pet_details` (`pet_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cart_user` FOREIGN KEY (`userid`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

ALTER TABLE `adoption_applications` 
  ADD CONSTRAINT `fk_application_pet` FOREIGN KEY (`pet_id`) REFERENCES `pet_details` (`pet_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_application_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

ALTER TABLE `transactions` 
  ADD CONSTRAINT `fk_transaction_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_transaction_pet` FOREIGN KEY (`pet_id`) REFERENCES `pet_details` (`pet_id`) ON DELETE SET NULL;

ALTER TABLE `reviews` 
  ADD CONSTRAINT `fk_review_pet` FOREIGN KEY (`pet_id`) REFERENCES `pet_details` (`pet_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_review_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

-- Insert healthcare plans
INSERT INTO `healthcare_plans` (`healthcare_id`, `plan_name`, `description`, `monthly_cost`, `coverage_percentage`, `annual_limit`, `deductible`) VALUES
(1, 'Basic Care', 'Essential veterinary coverage for routine care', 25.00, 80, 2000.00, 100.00),
(2, 'Premium Care', 'Comprehensive coverage including emergencies', 45.00, 90, 5000.00, 50.00),
(3, 'Platinum Care', 'Full coverage with lowest deductible', 65.00, 95, 10000.00, 25.00),
(4, 'Senior Care', 'Specialized care for older pets', 35.00, 85, 3000.00, 75.00),
(5, 'No Plan', 'Self-insured option', 0.00, 0, 0.00, 0.00);

-- Insert shipping regions
INSERT INTO `shipping_regions` (`region_id`, `region_name`, `country_code`, `base_cost`, `delivery_time_days`) VALUES
(1, 'Flanders', 'BE', 15.00, 2),
(2, 'Wallonia', 'BE', 20.00, 3),
(3, 'Brussels', 'BE', 10.00, 1),
(4, 'Netherlands', 'NL', 25.00, 3),
(5, 'Germany', 'DE', 30.00, 4),
(6, 'France', 'FR', 35.00, 5),
(7, 'UK', 'GB', 45.00, 7);

-- Insert shipping info
INSERT INTO `shipping_info` (`shipping_id`, `shipping_type`, `shipping_cost`, `shipping_region_id`, `estimated_days`, `description`) VALUES
(1, 'Standard', 15.00, 1, 3, 'Regular delivery within Flanders'),
(2, 'Express', 25.00, 1, 1, 'Next day delivery'),
(3, 'International', 45.00, 4, 5, 'Delivery to neighboring countries'),
(4, 'Premium', 35.00, 1, 2, 'Priority handling and delivery');

-- Insert breeds with generic images (dogs: generic_1.png, cats: generic_0.png)
INSERT INTO `breeds` (`breed_id`, `isFeline`, `image_link`, `name`, `origin`, `min_life_expectancy`, `max_life_expectancy`, `min_weight_male`, `max_weight_male`, `min_weight_female`, `max_weight_female`, `good_with_children`, `good_with_dogs`, `shedding`, `grooming`, `energy`, `trainability`, `popularity_rank`, `description`) VALUES
-- Dogs (isFeline = 0, image_link = assets/img/generic_1.png)
(1, 0, 'assets/img/generic_1.png', 'Golden Retriever', 'Scotland', 10, 12, 27.0, 34.0, 25.0, 32.0, 5, 5, 4, 3, 4, 5, 3, 'Friendly, intelligent and devoted. Perfect family dogs with gentle nature.'),
(2, 0, 'assets/img/generic_1.png', 'German Shepherd', 'Germany', 9, 13, 30.0, 40.0, 22.0, 32.0, 4, 3, 4, 3, 5, 5, 2, 'Confident, courageous and smart. Excellent working dogs and loyal companions.'),
(3, 0, 'assets/img/generic_1.png', 'Labrador Retriever', 'Canada', 10, 12, 29.0, 36.0, 25.0, 32.0, 5, 5, 4, 2, 5, 5, 1, 'Kind, pleasant and outgoing. The most popular breed for good reason.'),
(4, 0, 'assets/img/generic_1.png', 'French Bulldog', 'France', 10, 12, 11.0, 13.0, 9.0, 11.0, 5, 4, 2, 2, 3, 3, 4, 'Adaptable, playful and smart. Perfect for apartment living.'),
(5, 0, 'assets/img/generic_1.png', 'Siberian Husky', 'Russia', 12, 15, 20.0, 27.0, 16.0, 23.0, 4, 5, 5, 3, 5, 3, 12, 'Loyal, outgoing and mischievous. Beautiful dogs with striking eyes.'),

-- Cats (isFeline = 1, image_link = assets/img/generic_0.png)
(21, 1, 'assets/img/generic_0.png', 'Persian', 'Iran', 12, 17, 3.5, 7.0, 3.0, 5.5, 3, 2, 5, 5, 2, 3, 5, 'Sweet, gentle and quiet. Luxurious long coat requires regular grooming.'),
(22, 1, 'assets/img/generic_0.png', 'Maine Coon', 'United States', 12, 15, 6.0, 8.0, 4.0, 6.0, 5, 4, 4, 3, 3, 4, 8, 'Gentle giants with dog-like personality. Very sociable and friendly.'),
(23, 1, 'assets/img/generic_0.png', 'Siamese', 'Thailand', 12, 15, 4.0, 6.0, 3.0, 4.5, 4, 3, 2, 2, 5, 5, 3, 'Talkative, social and demanding. Very vocal and intelligent cats.'),
(24, 1, 'assets/img/generic_0.png', 'Bengal', 'United States', 12, 16, 4.5, 6.5, 3.5, 5.5, 4, 3, 2, 2, 5, 5, 7, 'Energetic, athletic and wild-looking. Very active and playful.'),
(25, 1, 'assets/img/generic_0.png', 'British Shorthair', 'England', 12, 20, 4.5, 8.0, 3.5, 6.5, 4, 3, 3, 2, 2, 3, 6, 'Calm, easygoing and dignified. The classic British companion.');

-- Insert realistic users from around the world
INSERT INTO `users` (`user_id`, `email`, `password`, `naam`, `zipcode`, `looking_for`, `can_advertise`, `isAdmin`, `warnings`, `city`, `country`, `verified`, `bio`, `phone`) VALUES
(1, 'admin@cdsurfing.be', '$2y$10$8o.mgGy3.wZFCF1WJAKvn.BDbyn6V4JRhkqMXtEZGPxaAcoJVuh1a', 'Admin User', '2800', 'Both', 1, 1, 0, 'Mechelen', 'Belgium', 1, 'Platform administrator ensuring all pets find loving homes.', '+32 123 456 789'),
(2, 'sophie.dupont@email.com', '$2y$10$zqRgQ.YDzJuH5tecBH9m3.OrN41klCrp8aNA4Ojxem7PQGWKrdMG6', 'Sophie Dupont', '1000', 'Cat', 1, 0, 0, 'Brussels', 'Belgium', 1, 'Animal lover with 10 years of experience fostering cats. Volunteer at local shelter.', '+32 234 567 890'),
(3, 'mark.vanbroek@email.com', 'mu923', 'Mark Van Broek', '3000', 'Dog', 1, 0, 0, 'Leuven', 'Belgium', 1, 'Professional dog trainer specializing in rescue dogs. Happy to help new owners!', '+32 345 678 901'),
(4, 'lisa.muller@email.com', 'xe854', 'Lisa Müller', '50667', 'Both', 1, 0, 0, 'Cologne', 'Germany', 1, 'Veterinary student passionate about animal welfare. Foster home for senior pets.', '+49 221 123 456'),
(5, 'pierre.lefevre@email.com', '$2y$10$8o.mgGy3.wZFCF1WJAKvn.BDbyn6V4JRhkqMXtEZGPxaAcoJVuh1a', 'Pierre Lefèvre', '75008', 'Dog', 0, 0, 1, 'Paris', 'France', 1, 'Looking for a running companion. Active lifestyle with plenty of park access.', '+33 1 2345 6789'),
(6, 'maria.rodriguez@email.com', '$2y$10$zqRgQ.YDzJuH5tecBH9m3.OrN41klCrp8aNA4Ojxem7PQGWKrdMG6', 'Maria Rodríguez', '28013', 'Cat', 1, 0, 0, 'Madrid', 'Spain', 1, 'Cat behavior specialist. Small apartment but perfect for indoor cats.', '+34 91 234 5678'),
(7, 'john.smith@email.com', 'mu923', 'John Smith', 'SW1A 1AA', 'Both', 1, 0, 0, 'London', 'United Kingdom', 1, 'Family of four looking to adopt our first pet. Children ages 8 and 10.', '+44 20 7946 0958'),
(8, 'anna.kowalski@email.com', 'xe854', 'Anna Kowalski', '00-001', 'Dog', 1, 0, 0, 'Warsaw', 'Poland', 1, 'Experienced with large breeds. Have a fenced yard perfect for active dogs.', '+48 22 123 4567');

-- Insert pet details with realistic stories and diverse backgrounds
INSERT INTO `pet_details` (`pet_id`, `owner_id`, `breed_id`, `healthcare_id`, `name`, `gender`, `age`, `size`, `color`, `story`, `diet`, `temperament`, `special_needs`, `vaccination_status`, `microchipped`, `spayed_neutered`, `adoption_fee`, `status`, `featured`, `view_count`) VALUES
(1, 2, 21, 2, 'Luna', 'Female', 3, 'Medium', 'White', 'Rescued from a hoarding situation, Luna has blossomed into a confident and loving companion. She was one of 25 cats living in unsuitable conditions but has made remarkable progress in foster care.', 'Royal Canin Persian dry food, wet food twice daily', 'Gentle', 'Requires daily grooming due to long coat', 'Current', 1, 1, 150.00, 'Available', 1, 124),
(2, 3, 1, 3, 'Max', 'Male', 2, 'Large', 'Golden', 'Max was surrendered when his family moved overseas. He is fully trained, knows basic commands, and gets along wonderfully with children and other dogs.', 'High-quality kibble twice daily, loves carrots as treats', 'Friendly', 'None', 'Current', 1, 1, 250.00, 'Pending', 1, 89),
(3, 4, 22, 2, 'Simba', 'Male', 4, 'Large', 'Brown Tabby', 'Simba was found as a stray and taken in by a Good Samaritan. He is a gentle giant who enjoys watching birds from the window and cuddling on the couch.', 'Grain-free dry food, occasional fish treats', 'Calm', 'None', 'Current', 1, 1, 200.00, 'Available', 0, 67),
(4, 2, 23, 1, 'Milo', 'Male', 1, 'Medium', 'Seal Point', 'Milo is a playful Siamese kitten who was born in foster care. He is very social and will follow you around the house chatting about his day.', 'Kitten formula wet food three times daily', 'Playful', 'None', 'Current', 1, 1, 180.00, 'Available', 1, 156),
(5, 3, 2, 3, 'Bella', 'Female', 5, 'Large', 'Black and Tan', 'Bella is a retired service dog looking for a quiet retirement home. She is exceptionally well-trained and has experience with various commands and tasks.', 'Senior dog formula, joint supplements', 'Obedient', 'Arthritis medication twice daily', 'Current', 1, 1, 300.00, 'Available', 1, 203),
(6, 6, 24, 2, 'Zara', 'Female', 2, 'Medium', 'Spotted Rosette', 'Zara has incredible energy and intelligence. She enjoys puzzle toys and needs an active family who can keep up with her curiosity and playfulness.', 'High-protein diet, raw food preferred', 'Energetic', 'Requires mental stimulation', 'Current', 1, 1, 350.00, 'Available', 0, 45),
(7, 4, 25, 4, 'Winston', 'Male', 7, 'Medium', 'Blue', 'Winston is a senior gentleman looking for a quiet home to enjoy his golden years. He prefers a calm environment and enjoys napping in sunny spots.', 'Renal support diet, wet food preferred', 'Quiet', 'Annual blood work recommended', 'Current', 1, 1, 100.00, 'Available', 0, 23),
(8, 2, 3, 2, 'Charlie', 'Male', 4, 'Large', 'Yellow', 'Charlie is a therapy dog candidate with excellent temperament. He has experience visiting nursing homes and brings joy to everyone he meets.', 'Standard adult dog food, no allergies', 'Therapeutic', 'None', 'Current', 1, 1, 275.00, 'Available', 1, 178);

-- Insert pet images
INSERT INTO `pet_images` (`pet_id`, `image_url`, `is_primary`) VALUES
(1, 'assets/img/persian_luna_1.jpg', 1),
(1, 'assets/img/persian_luna_2.jpg', 0),
(2, 'assets/img/golden_max_1.jpg', 1),
(3, 'assets/img/mainecoon_simba_1.jpg', 1),
(4, 'assets/img/siamese_milo_1.jpg', 1),
(5, 'assets/img/germanshepherd_bella_1.jpg', 1),
(6, 'assets/img/bengal_zara_1.jpg', 1),
(7, 'assets/img/british_winston_1.jpg', 1),
(8, 'assets/img/labrador_charlie_1.jpg', 1);

-- Insert adoption applications showing real interest
INSERT INTO `adoption_applications` (`pet_id`, `user_id`, `family_members`, `children_ages`, `other_pets`, `home_type`, `yard_size`, `work_schedule`, `previous_experience`, `reason_for_adoption`) VALUES
(2, 7, 4, '8,10', 'None', 'House', 'Medium (500m²)', 'Both parents work from home 3 days/week', 'First-time dog owners but have done extensive research', 'Looking for a family pet to teach children responsibility'),
(1, 5, 2, 'None', 'None', 'Apartment', 'Balcony only', 'Work from home full-time', 'Grew up with cats, had Persians as a child', 'Companionship for working from home'),
(5, 8, 1, 'None', 'None', 'House', 'Large (1000m²)', 'Flexible schedule, often work from home', 'Previous experience with German Shepherds', 'Looking for a running partner and home companion');

-- Insert shopping cart items showing active user engagement
INSERT INTO `shopping_cart` (`pet_id`, `userid`, `added_price`, `is_regional`) VALUES
(1, 5, 150.00, 0),
(3, 7, 200.00, 0),
(6, 8, 350.00, 1),
(8, 5, 275.00, 0);

-- Insert successful transactions
INSERT INTO `transactions` (`user_id`, `pet_id`, `amount`, `transaction_type`, `payment_method`, `status`, `completed_at`) VALUES
(7, 2, 250.00, 'Adoption Fee', 'Credit Card', 'Completed', '2024-01-15 14:30:00'),
(5, NULL, 50.00, 'Donation', 'PayPal', 'Completed', '2024-01-10 09:15:00'),
(8, NULL, 25.00, 'Membership', 'Credit Card', 'Completed', '2024-01-08 16:45:00');

-- Insert genuine reviews from adopters
INSERT INTO `reviews` (`pet_id`, `user_id`, `rating`, `title`, `comment`, `is_verified`, `response`) VALUES
(2, 7, 5, 'Perfect family addition!', 'Max has settled in wonderfully with our family. The adoption process was smooth and the support from the shelter has been exceptional. Highly recommend!', 1, 'Thank you for giving Max a loving home! We are thrilled to hear he is doing well.'),
(1, 5, 4, 'Beautiful Persian princess', 'Luna is adjusting well to apartment life. She requires more grooming than I anticipated, but she is worth every minute. Wonderful temperament!', 1, 'So happy to hear Luna is doing well in her new home!');

-- Update the auto-increment values to continue from appropriate numbers
ALTER TABLE `users` AUTO_INCREMENT = 100;
ALTER TABLE `breeds` AUTO_INCREMENT = 100;
ALTER TABLE `pet_details` AUTO_INCREMENT = 100;
ALTER TABLE `healthcare_plans` AUTO_INCREMENT = 10;
ALTER TABLE `shipping_regions` AUTO_INCREMENT = 10;
ALTER TABLE `transactions` AUTO_INCREMENT = 1000;

-- Create indexes for better performance
CREATE INDEX idx_pet_status ON `pet_details` (`status`, `featured`);
CREATE INDEX idx_pet_breed_size ON `pet_details` (`breed_id`, `size`, `age`);
CREATE INDEX idx_user_activity ON `users` (`last_login`, `created_at`);
CREATE INDEX idx_transaction_dates ON `transactions` (`created_at`, `status`);
CREATE INDEX idx_application_status ON `adoption_applications` (`status`, `application_date`);
