ALTER TABLE `contents` CHANGE `details` `details` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;
    
CREATE TABLE `topics` ( `id` int(11) NOT NULL AUTO_INCREMENT, `subject_id` int(11) NOT NULL, `name` varchar(255) NOT NULL, `description` text DEFAULT NULL, `created_at` timestamp NOT NULL DEFAULT current_timestamp(), `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(), PRIMARY KEY (`id`) ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `subjects` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`description` text DEFAULT NULL,
`created_at` timestamp NOT NULL DEFAULT current_timestamp(),
`updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;    


CREATE TABLE `contents` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`title` varchar(255) NOT NULL,
`topic_id` int(11) NOT NULL DEFAULT 0,
`details` text NOT NULL,
`img` varchar(255) DEFAULT NULL,
`user_id` int(11) NOT NULL,
`created_at` timestamp NOT NULL DEFAULT current_timestamp(),
`updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci


ALTER TABLE `days` 
ADD `created_at` TIMESTAMP NULL DEFAULT NULL AFTER `is_done`, 
ADD `updated_at` TIMESTAMP NULL DEFAULT NULL AFTER `created_at`;

ALTER TABLE `days` CHANGE `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP, CHANGE `updated_at` `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP;
    
ALTER TABLE `tasks` ADD `end_date` DATE NULL DEFAULT NULL AFTER `name`;
ALTER TABLE `users` ADD `partner` BOOLEAN NOT NULL DEFAULT FALSE AFTER `remember_token`;
ALTER TABLE `tasks` CHANGE `duration` `duration` DECIMAL(6,2) NULL DEFAULT NULL, CHANGE `status` `status` BOOLEAN NOT NULL DEFAULT FALSE;
ALTER TABLE `tasks` ADD `details` LONGTEXT NULL DEFAULT NULL AFTER `name`;
ALTER TABLE `tags` CHANGE `slug` `slug` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `products` ADD `user_id` INT NOT NULL DEFAULT '0' AFTER `name`;
ALTER TABLE `products` ADD `category` VARCHAR(255) NULL DEFAULT NULL AFTER `subject`;

ALTER TABLE `tasks` CHANGE `points` `points` DOUBLE(6,2) NULL DEFAULT '0';
ALTER TABLE `users` ADD `rank` VARCHAR(255) NULL DEFAULT NULL AFTER `points`;



-- 
CREATE TABLE pcategories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,
    description TEXT NULL,
    parent_id INT NULL,
    image_url VARCHAR(255) NULL,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `products` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `description` text DEFAULT NULL,
 `price` decimal(10,2) NOT NULL,
 `discount_price` decimal(10,2) DEFAULT NULL,
 `category_id` int(11) NOT NULL,
 `brand_id` int(11) DEFAULT NULL,
 `stock_quantity` int(11) NOT NULL DEFAULT 0,
 `sku` varchar(100) NOT NULL,
 `weight` decimal(8,2) DEFAULT NULL,
 `dimensions` varchar(255) DEFAULT NULL,
 `image_url` varchar(255) DEFAULT NULL,
 `gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery`)),
 `status` enum('active','inactive','archived') DEFAULT 'active',
 `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
 `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
 PRIMARY KEY (`id`),
 UNIQUE KEY `sku` (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci


CREATE TABLE brands (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,
    description TEXT NULL,
    logo_url VARCHAR(255) NULL,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


-- after 06 - 04
RENAME TABLE `the_mentor`.`p_categories` TO `the_mentor`.`pcategories`;


CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    order_number VARCHAR(100) NOT NULL UNIQUE,
    total_amount DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'processing', 'shipped', 'delivered', 'cancelled') DEFAULT 'pending',
    payment_method VARCHAR(50) NOT NULL,
    shipping_address TEXT NOT NULL,
    billing_address TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

);


CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
);



CREATE TABLE `banners` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `subtitle` varchar(255) NOT NULL,
    `img` varchar(255) DEFAULT NULL,
    `description` text NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `passwords` (
 `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
 `title` varchar(255) NOT NULL,
 `password` text DEFAULT NULL,
 `product_id` int(11) NOT NULL,
 `created_at` timestamp NULL DEFAULT NULL,
 `updated_at` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`id`),
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci


ALTER TABLE `passwords` CHANGE `product_id` `user_id` INT(11) NOT NULL;