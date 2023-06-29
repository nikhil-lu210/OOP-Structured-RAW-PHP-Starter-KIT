-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------
-- Dumping structure for table website_subscriber.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `website_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_website_id_foreign` (`website_id`),
  CONSTRAINT `posts_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website_subscriber.posts: ~2 rows (approximately)
INSERT INTO `posts` (`id`, `website_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
	(1, 1, 'demo post', 'demo', '2023-06-26 02:58:22', '2023-06-26 02:58:22'),
	(2, 1, 'demo post', 'demo', '2023-06-26 03:00:05', '2023-06-26 03:00:05');

-- Dumping structure for table website_subscriber.subscribers
CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `website_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `website_email_unique` (`website_id`,`email`),
  CONSTRAINT `subscribers_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website_subscriber.subscribers: ~100 rows (approximately)
INSERT INTO `subscribers` (`id`, `website_id`, `name`, `email`, `created_at`, `updated_at`) VALUES
	(1, 3, 'Houston Williamson', 'berge.laron@hotmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(2, 1, 'Dr. Buford Fahey', 'ywilkinson@yost.net', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(3, 2, 'Dr. Vena Nader II', 'mazie.wyman@smith.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(4, 1, 'Miss Jaida Dietrich', 'dena.frami@fisher.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(5, 3, 'Arno Koss', 'zemlak.ernest@osinski.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(6, 4, 'Ron Gutmann', 'kunze.natalia@feeney.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(7, 5, 'Layla VonRueden', 'eric.mann@yahoo.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(8, 5, 'Prof. Curtis McGlynn DVM', 'zprosacco@yahoo.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(9, 5, 'Fatima Kuphal', 'yasmeen96@hotmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(10, 5, 'Yazmin Beer', 'nyasia75@flatley.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(11, 2, 'Caroline Johns', 'rosemary56@terry.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(12, 5, 'Ben Simonis', 'gkautzer@hotmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(13, 4, 'Sandy Hodkiewicz', 'pouros.dulce@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(14, 3, 'Estella Kilback', 'jameson.jaskolski@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(15, 1, 'Ms. Marianne Kuhic', 'hettie01@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(16, 5, 'Mr. Solon Bins', 'esmeralda37@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(17, 5, 'Layne Collins PhD', 'consuelo.klocko@yahoo.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(18, 1, 'Pansy Bartoletti', 'nmorar@ernser.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(19, 3, 'Myles Schroeder', 'eichmann.junior@boyer.biz', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(20, 5, 'Kyle Gislason', 'bednar.anne@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(21, 3, 'Mrs. Casandra Rogahn', 'joel08@yahoo.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(22, 5, 'Jaren Nikolaus', 'robel.alvina@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(23, 1, 'Zora Schroeder', 'ucarter@cartwright.biz', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(24, 2, 'Rosalee Gaylord', 'skylar.adams@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(25, 3, 'Mr. Einar Hoeger II', 'beahan.hipolito@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(26, 3, 'Susanna Huel', 'donnelly.pietro@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(27, 2, 'Mr. Omer Keeling DDS', 'ewisoky@yahoo.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(28, 5, 'Prof. Jessy Dach III', 'vlang@lynch.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(29, 3, 'Viola Windler', 'benjamin.aufderhar@bashirian.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(30, 2, 'Lazaro Lang', 'uruecker@yahoo.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(31, 2, 'Mr. Ralph Harris DDS', 'vpfannerstill@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(32, 1, 'Marquise Wintheiser', 'ellen69@yahoo.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(33, 2, 'Jackeline Stiedemann II', 'brown.jaylon@breitenberg.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(34, 4, 'Prof. Clay Kuhn', 'donnelly.maria@yahoo.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(35, 3, 'Osborne Bechtelar', 'bhilpert@breitenberg.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(36, 4, 'Marilie Rosenbaum', 'shea09@effertz.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(37, 1, 'Dovie Bogan', 'gusikowski.dino@yahoo.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(38, 1, 'Watson Lehner', 'ena50@lynch.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(39, 1, 'Laney West', 'rice.kenya@ferry.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(40, 5, 'Gudrun Shields', 'udietrich@hayes.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(41, 1, 'Berniece Rosenbaum IV', 'steuber.everardo@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(42, 3, 'Turner Mayert', 'arnoldo30@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(43, 2, 'Kristoffer Bartoletti', 'uhilpert@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(44, 3, 'Miss Maybell Barrows', 'dejah.moore@buckridge.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(45, 5, 'Gustave Kessler PhD', 'ruecker.christa@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(46, 3, 'Major Oberbrunner', 'kris.price@johns.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(47, 5, 'Cordie Zulauf', 'kaycee.beer@lueilwitz.biz', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(48, 5, 'Garry Weissnat PhD', 'kuvalis.buford@steuber.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(49, 2, 'Warren Tremblay', 'earlene.krajcik@yahoo.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(50, 1, 'Diamond Runolfsson', 'mathilde42@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(51, 4, 'Danyka Dietrich', 'haley.camylle@sawayn.org', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(52, 5, 'Barrett Casper', 'bfunk@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(53, 1, 'Vickie Wolff', 'sschinner@oberbrunner.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(54, 4, 'Dortha Schulist', 'travis.mckenzie@wiegand.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(55, 5, 'Mrs. Myra Ledner', 'elyssa90@gibson.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(56, 4, 'Melba Harris', 'beverly.little@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(57, 1, 'Jimmy Brekke', 'rosetta.bednar@bins.biz', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(58, 2, 'Dr. Tyra Cruickshank IV', 'dooley.jarrett@yahoo.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(59, 2, 'Dillan Mohr', 'kelli.fritsch@hotmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(60, 1, 'Prof. Antonio Nader III', 'dooley.tevin@hotmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(61, 3, 'Pierce Terry', 'olin.hauck@gmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(62, 1, 'Miss Mercedes Kertzmann', 'xemard@hotmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(63, 2, 'Dr. Maud Kerluke II', 'karlee02@dare.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(64, 3, 'Carolina Veum', 'ycarter@hotmail.com', '2023-06-26 02:55:43', '2023-06-26 02:55:43'),
	(65, 2, 'Serena Johnston II', 'jlehner@abshire.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(66, 5, 'Zakary Bogisich', 'karli.klein@heidenreich.info', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(67, 2, 'Mrs. Rosalia Keebler I', 'jaleel69@schoen.info', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(68, 1, 'Prof. Eliseo Kuhic', 'west.cristian@yahoo.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(69, 5, 'Ayden Kovacek', 'schneider.louisa@yahoo.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(70, 4, 'Hipolito Halvorson', 'altenwerth.julien@kohler.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(71, 3, 'Miss Aurore Auer Jr.', 'randy41@jacobs.org', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(72, 1, 'Margarita Grady', 'greta42@rippin.biz', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(73, 4, 'Allan Kulas', 'vschoen@weber.biz', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(74, 2, 'Mustafa Schultz', 'kovacek.reba@yahoo.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(75, 1, 'Prof. Micheal Strosin Sr.', 'lcronin@ferry.biz', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(76, 4, 'Prof. Greg Torphy', 'kris.guadalupe@tromp.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(77, 2, 'Naomi Bradtke', 'srunolfsson@langosh.net', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(78, 3, 'Prof. Paolo Weissnat III', 'cornell.fahey@corkery.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(79, 5, 'Ubaldo Swift', 'viva.terry@yahoo.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(80, 4, 'Maegan Volkman', 'fisher.phyllis@doyle.org', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(81, 5, 'Barry Bosco', 'jace.hermann@gmail.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(82, 5, 'Ludie Homenick', 'ncarroll@gmail.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(83, 1, 'Prof. Carlotta Borer Sr.', 'okertzmann@yahoo.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(84, 5, 'Miss Anabel Rempel V', 'paolo05@murphy.info', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(85, 1, 'Stella Torphy', 'cturner@ruecker.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(86, 4, 'Mitchel Boyer MD', 'rolfson.candice@williamson.org', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(87, 3, 'Toni Ebert', 'elsie.schultz@hotmail.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(88, 4, 'Jerel Hickle', 'haag.norwood@yahoo.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(89, 1, 'Odessa Upton PhD', 'colin81@gmail.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(90, 3, 'Gloria Cremin', 'nigel.jenkins@pfannerstill.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(91, 5, 'Mr. Floy Weber III', 'dorcas92@okon.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(92, 2, 'Dr. Schuyler Gislason V', 'clara.keeling@wisozk.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(93, 4, 'Felipe Hansen', 'ncollier@hotmail.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(94, 1, 'Hortense Shanahan', 'rhackett@sanford.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(95, 4, 'Demario Dibbert DDS', 'leta11@windler.net', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(96, 3, 'Estrella Glover', 'wanda91@abshire.info', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(97, 5, 'Simone Reinger', 'nya68@hackett.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(98, 1, 'Lavinia Champlin', 'susanna.donnelly@gmail.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(99, 5, 'Dianna Fay', 'wwunsch@greenholt.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44'),
	(100, 3, 'Mrs. Karianne Casper', 'ernestine.rohan@yahoo.com', '2023-06-26 02:55:44', '2023-06-26 02:55:44');

-- Dumping structure for table website_subscriber.websites
CREATE TABLE IF NOT EXISTS `websites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website_subscriber.websites: ~5 rows (approximately)
INSERT INTO `websites` (`id`, `name`, `url`, `created_at`, `updated_at`) VALUES
	(1, 'Cummerata, Fahey and Flatley', 'https://www.maggio.biz/quia-quae-qui-at', '2023-06-26 02:55:42', '2023-06-26 02:55:42'),
	(2, 'Kiehn, Mosciski and Buckridge', 'http://www.herzog.com/eum-a-qui-dignissimos-qui.html', '2023-06-26 02:55:42', '2023-06-26 02:55:42'),
	(3, 'Hahn, Buckridge and Schmeler', 'http://russel.com/et-voluptatem-possimus-esse', '2023-06-26 02:55:42', '2023-06-26 02:55:42'),
	(4, 'Langosh PLC', 'http://stokes.com/molestias-et-possimus-id-omnis', '2023-06-26 02:55:42', '2023-06-26 02:55:42'),
	(5, 'Mosciski, Crona and Rohan', 'http://www.considine.com/quam-dolorum-nulla-veniam-distinctio', '2023-06-26 02:55:42', '2023-06-26 02:55:42');
