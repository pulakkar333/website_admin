-- Statistics Table Data Insert
-- Run this SQL if you prefer manual insertion over seeder

-- Table structure for statistics
CREATE TABLE IF NOT EXISTS `statistics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `statistics_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default statistics data
INSERT INTO `statistics` (`key`, `label`, `value`, `order`, `status`, `created_at`, `updated_at`) VALUES
('years', 'Years Experience', 30, 1, 1, NOW(), NOW()),
('products', 'Products', 400, 2, 1, NOW(), NOW()),
('solutions', 'Product Solution', 300, 3, 1, NOW(), NOW()),
('support', 'Support', 50, 4, 1, NOW(), NOW());

-- Verify the data
SELECT * FROM statistics ORDER BY `order` ASC;

