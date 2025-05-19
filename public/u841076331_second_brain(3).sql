-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 19, 2025 at 03:32 PM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u841076331_second_brain`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `details` text NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `topic`, `details`, `img`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'this is test for project', '1', '<p>Learn how to harness the power of Laravel CORS in this tutorial. Discover what it is and unlock its potential for seamless cross-origin resource sharing.\n\nLaravel has supported CORS for quite a while; however, until more recent versions, it has been from third-party packages only. Let\'s dive into CORS in Laravel, what it is, and why it is important.\n\nCORS stands for Cross-Origin Resource Sharing. It is a mechanism that allows you to make requests to a different domain than your own securely. It defines a set of headers the server can use to control which origins can access its resources. But what does this mean to you?\n\nAs someone who builds a lot of APIs, I am very used to CORS. It has become second nature at this point. Laravel, by default, has CORS support built in, where it will read from config/cors.php to programmatically build up the protection rules based on the values configured. Let\'s walk through the options in this file to see what they mean to us.</p>', 'http://127.0.0.1/the_mentor/storage/app/uploads/Laravel From Scratch 2022 _ 4+ Hour Course.mp4_snapshot_03.24.18.433.jpg', 1, '2023-12-17 12:12:27', '2024-04-23 16:22:48'),
(12, 'learnig to think in programming', '1', '<p>test</p>', 'http://127.0.0.1/the_mentor/storage/app/uploads/earth343434.jpg', 1, '2023-12-19 11:11:43', '2023-12-19 11:11:43'),
(13, 'this is another test', '1', '<p>hello this test is for tst</p>', NULL, 1, '2023-12-22 10:44:14', '2023-12-22 10:44:14'),
(14, 'how to use import in node module', '3', '<p>so in this example you can see the &nbsp;<span style=\"color: rgb(156, 220, 254);\">\"type\"</span>: <span style=\"color: rgb(206, 145, 120);\">\"module\"</span>, which will enable the import functionality in you app by the way if you dont want touse that you can always use \"const express = require(\"express\")\"</p>', 'http://127.0.0.1/the_mentor/storage/app/uploads/blog1.jpg', 1, '2024-01-02 11:31:07', '2024-01-02 11:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `logo_url` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `resume` varchar(20) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `name`, `email`, `phone`, `resume`, `details`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', 'test', 'test', 'test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `parent_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Tech', 'tech', 'tech', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('pending','approved','spam') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `topic_id` int(11) NOT NULL DEFAULT 0,
  `details` longtext DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `topic_id`, `details`, `img`, `user_id`, `created_at`, `updated_at`) VALUES
(15, 'Imp Links', 1, '<p><a href=\"https://github.com/Prajwal100/Complete-Ecommerce-in-laravel-10?tab=readme-ov-file\">https://github.com/Prajwal100/Complete-Ecommerce-in-laravel-10?tab=readme-ov-file</a></p><p><a href=\"https://www.youtube.com/watch?v=NNU6easVvRI\">https://www.youtube.com/watch?v=NNU6easVvRI</a></p><p><a href=\"https://www.inc.com/elizabeth-gore/consider-these-3-things-before-starting-a-business-in-todays-tough-economy/91177975\">https://www.inc.com/elizabeth-gore/consider-these-3-things-before-starting-a-business-in-todays-tough-economy/91177975</a></p><p><a href=\"https://webformatter.com/html\">https://webformatter.com/html</a></p><p><a href=\"https://www.1043labs.com/\">https://www.1043labs.com/</a> &nbsp; &nbsp;for ui for portfolio website</p><p><a href=\"https://github.com/awesome-bootstrap-org/awesome-bootstrap\">https://github.com/awesome-bootstrap-org/awesome-bootstrap</a> &nbsp;links where important design tools are mentioned for any kind of service business to use.</p><p><a href=\"https://nuxt.com/templates\">https://nuxt.com/templates</a> &nbsp; for learning the design patterns</p><p><a href=\"https://www.figma.com/design/AoUJWmF3KjGTZf4tcIPGhE/PMS-APP?node-id=0-1&amp;p=f&amp;t=mOPQgSCr0oDCvzn6-0\">https://www.figma.com/design/AoUJWmF3KjGTZf4tcIPGhE/PMS-APP?node-id=0-1&amp;p=f&amp;t=mOPQgSCr0oDCvzn6-0</a></p>', NULL, 3, '2025-04-22 17:14:14', '2025-05-09 16:15:14'),
(16, 'Productivity improvement', 1, '<ul><li>&nbsp;Writting with pencil push pen in separate blank paper helps</li><li>&nbsp;Listening to lofi music helps</li><li>Using hand gestures for guiding self, clearing concepts and better imageination.</li><li>Using WhatsApp chats to assigning quick tasks are helpful.</li></ul>', NULL, 3, '2025-04-25 13:57:20', '2025-05-01 07:59:38'),
(17, 'Reading Observations', 2, '<p>- Reading with three words at a time helps</p><p>- Reading and then interpreting content in hindi language improves speed while focusing on nails</p>', NULL, 3, '2025-04-25 15:39:48', '2025-04-28 13:04:38'),
(18, 'Ideas to potentially work in the future', 3, '<ul><li>adding a pomodoro timer if getting useful data</li><li>creating an acoordian type of ui for tasks showing on main dashboard page</li><li>Rebranding the youtube channel to make new videos for cresting distribution.</li><li>Wroking on next js deployment procedure</li><li>Prepare a system of notes with .php file extensions with already written code by you</li></ul>', NULL, 3, '2025-04-25 17:25:42', '2025-04-29 17:00:00'),
(19, 'Tasks for Ecommerce project', 4, '<ul><li>Creating a login page =X</li><li>multiimage feature for product detail page</li><li>finding solution for uploading multiple image upload feature with jquery</li><li>refactor the code for delete-modal</li><li>product delete is sending double requests</li><li>adding a logout button at sidebar</li></ul>', NULL, 3, '2025-04-28 12:16:33', '2025-05-02 11:46:19'),
(20, 'Links for study related materials and videos', 5, '<p><a href=\"http://learnerservices.baou.edu.in/SwadhyayTV/vlecture.aspx?prg_code=MSCIT\">http://learnerservices.baou.edu.in/SwadhyayTV/vlecture.aspx?prg_code=MSCIT</a></p>', NULL, 3, '2025-04-29 09:38:28', '2025-04-29 09:38:28'),
(21, 'Extra work for free time', 6, '<ul><li>complete bob account queries</li></ul>', NULL, 3, '2025-05-01 12:50:27', '2025-05-01 12:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `is_done` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `date`, `project_id`, `is_done`, `created_at`, `updated_at`) VALUES
(76, NULL, 12, 0, NULL, NULL),
(77, NULL, 12, 0, NULL, NULL),
(78, NULL, 12, 0, NULL, NULL),
(79, NULL, 12, 0, NULL, NULL),
(80, NULL, 12, 0, NULL, NULL),
(81, NULL, 12, 0, NULL, NULL),
(82, NULL, 12, 0, NULL, NULL),
(83, NULL, 12, 0, NULL, NULL),
(84, NULL, 12, 0, NULL, NULL),
(85, NULL, 12, 0, NULL, NULL),
(86, NULL, 13, 0, NULL, NULL),
(87, NULL, 13, 0, NULL, NULL),
(88, NULL, 13, 0, NULL, NULL),
(89, NULL, 13, 0, NULL, NULL),
(90, NULL, 13, 0, NULL, NULL),
(91, NULL, 13, 0, NULL, NULL),
(92, NULL, 13, 0, NULL, NULL),
(93, NULL, 13, 0, NULL, NULL),
(94, NULL, 13, 0, NULL, NULL),
(95, NULL, 13, 0, NULL, NULL),
(96, NULL, 13, 0, NULL, NULL),
(97, NULL, 13, 0, NULL, NULL),
(98, NULL, 13, 0, NULL, NULL),
(99, NULL, 13, 0, NULL, NULL),
(100, NULL, 13, 0, NULL, NULL),
(101, NULL, 13, 0, NULL, NULL),
(102, NULL, 13, 0, NULL, NULL),
(103, NULL, 13, 0, NULL, NULL),
(104, NULL, 13, 0, NULL, NULL),
(105, NULL, 13, 0, NULL, NULL),
(106, NULL, 13, 0, NULL, NULL),
(107, NULL, 14, 0, NULL, NULL),
(108, NULL, 14, 0, NULL, NULL),
(109, NULL, 14, 0, NULL, NULL),
(110, NULL, 14, 0, NULL, NULL),
(111, NULL, 14, 0, NULL, NULL),
(112, NULL, 14, 0, NULL, NULL),
(113, NULL, 14, 0, NULL, NULL),
(114, NULL, 14, 0, NULL, NULL),
(115, NULL, 14, 0, NULL, NULL),
(116, NULL, 14, 0, NULL, NULL),
(117, NULL, 14, 0, NULL, NULL),
(118, NULL, 14, 0, NULL, NULL),
(119, NULL, 14, 0, NULL, NULL),
(120, NULL, 14, 0, NULL, NULL),
(121, NULL, 14, 0, NULL, NULL),
(122, NULL, 14, 0, NULL, NULL),
(123, NULL, 14, 0, NULL, NULL),
(124, NULL, 14, 0, NULL, NULL),
(125, NULL, 14, 0, NULL, NULL),
(126, NULL, 14, 0, NULL, NULL),
(127, NULL, 14, 0, NULL, NULL),
(128, NULL, 15, 1, NULL, NULL),
(129, NULL, 15, 1, NULL, NULL),
(130, NULL, 15, 0, NULL, NULL),
(131, NULL, 15, 0, NULL, NULL),
(132, NULL, 15, 0, NULL, NULL),
(133, NULL, 15, 0, NULL, NULL),
(134, NULL, 15, 0, NULL, NULL),
(135, NULL, 15, 0, NULL, NULL),
(136, NULL, 15, 0, NULL, NULL),
(137, NULL, 15, 0, NULL, NULL),
(138, NULL, 15, 0, NULL, NULL),
(139, NULL, 15, 0, NULL, NULL),
(140, NULL, 15, 0, NULL, NULL),
(141, NULL, 15, 0, NULL, NULL),
(142, NULL, 15, 0, NULL, NULL),
(143, NULL, 15, 0, NULL, NULL),
(144, NULL, 15, 0, NULL, NULL),
(145, NULL, 15, 0, NULL, NULL),
(146, NULL, 15, 0, NULL, NULL),
(147, NULL, 15, 0, NULL, NULL),
(148, NULL, 15, 0, NULL, NULL),
(149, NULL, 15, 0, NULL, NULL),
(150, NULL, 15, 0, NULL, NULL),
(151, NULL, 15, 0, NULL, NULL),
(152, NULL, 15, 0, NULL, NULL),
(153, NULL, 15, 0, NULL, NULL),
(154, NULL, 15, 0, NULL, NULL),
(155, NULL, 15, 0, NULL, NULL),
(156, NULL, 15, 0, NULL, NULL),
(157, NULL, 15, 0, NULL, NULL),
(158, NULL, 16, 1, NULL, NULL),
(159, NULL, 16, 1, NULL, NULL),
(160, NULL, 16, 1, NULL, NULL),
(161, NULL, 16, 1, NULL, NULL),
(162, NULL, 16, 1, NULL, NULL),
(163, NULL, 16, 1, NULL, NULL),
(164, NULL, 16, 1, NULL, NULL),
(165, NULL, 16, 1, NULL, NULL),
(166, NULL, 16, 1, NULL, '2025-03-16 17:14:24'),
(167, NULL, 16, 0, NULL, NULL),
(168, NULL, 16, 0, NULL, NULL),
(169, NULL, 16, 0, NULL, NULL),
(170, NULL, 16, 0, NULL, NULL),
(171, NULL, 16, 0, NULL, NULL),
(172, NULL, 16, 0, NULL, NULL),
(173, NULL, 16, 0, NULL, NULL),
(174, NULL, 16, 0, NULL, NULL),
(175, NULL, 16, 0, NULL, NULL),
(176, NULL, 16, 0, NULL, NULL),
(177, NULL, 16, 0, NULL, NULL),
(178, NULL, 16, 0, NULL, NULL),
(179, NULL, 16, 0, NULL, NULL),
(180, NULL, 16, 0, NULL, NULL),
(181, NULL, 16, 0, NULL, NULL),
(182, NULL, 16, 0, NULL, NULL),
(183, NULL, 16, 0, NULL, NULL),
(184, NULL, 16, 0, NULL, NULL),
(185, NULL, 16, 0, NULL, NULL),
(186, NULL, 16, 0, NULL, NULL),
(187, NULL, 16, 0, NULL, NULL),
(188, NULL, 17, 1, NULL, NULL),
(189, NULL, 17, 0, NULL, NULL),
(190, NULL, 17, 0, NULL, NULL),
(191, NULL, 17, 0, NULL, NULL),
(192, NULL, 17, 0, NULL, NULL),
(193, NULL, 17, 0, NULL, NULL),
(194, NULL, 17, 0, NULL, NULL),
(195, NULL, 17, 0, NULL, NULL),
(196, NULL, 17, 0, NULL, NULL),
(197, NULL, 17, 0, NULL, NULL),
(198, NULL, 17, 0, NULL, NULL),
(199, NULL, 17, 0, NULL, NULL),
(200, NULL, 17, 0, NULL, NULL),
(201, NULL, 17, 0, NULL, NULL),
(202, NULL, 17, 0, NULL, NULL),
(203, NULL, 17, 0, NULL, NULL),
(204, NULL, 17, 0, NULL, NULL),
(205, NULL, 17, 0, NULL, NULL),
(206, NULL, 18, 1, NULL, NULL),
(207, NULL, 18, 1, NULL, NULL),
(208, NULL, 18, 1, NULL, NULL),
(209, NULL, 18, 1, NULL, NULL),
(210, NULL, 18, 1, NULL, NULL),
(211, NULL, 18, 1, NULL, NULL),
(212, NULL, 18, 1, NULL, NULL),
(213, NULL, 18, 1, NULL, NULL),
(214, NULL, 18, 1, NULL, NULL),
(215, NULL, 18, 1, NULL, NULL),
(216, NULL, 18, 1, NULL, NULL),
(217, NULL, 18, 1, NULL, NULL),
(218, NULL, 18, 1, NULL, NULL),
(219, NULL, 18, 1, NULL, NULL),
(220, NULL, 18, 1, NULL, NULL),
(221, NULL, 18, 1, NULL, '2025-03-16 17:14:38'),
(222, NULL, 18, 1, NULL, '2025-03-26 10:48:34'),
(223, NULL, 18, 1, NULL, '2025-03-26 10:48:35'),
(224, NULL, 18, 1, NULL, '2025-03-26 10:48:36'),
(225, NULL, 18, 1, NULL, '2025-03-26 10:48:37'),
(226, NULL, 18, 1, NULL, '2025-03-26 10:48:38'),
(227, NULL, 18, 1, NULL, '2025-03-26 10:48:39'),
(228, NULL, 18, 1, NULL, '2025-03-26 10:48:40'),
(229, NULL, 18, 1, NULL, '2025-03-26 10:48:43'),
(230, NULL, 18, 1, NULL, '2025-03-26 10:48:46'),
(231, NULL, 18, 1, NULL, '2025-04-09 11:50:07'),
(232, NULL, 18, 1, NULL, '2025-04-09 11:50:08'),
(233, NULL, 18, 1, NULL, '2025-04-09 11:50:09'),
(234, NULL, 18, 1, NULL, '2025-04-09 11:50:10'),
(235, NULL, 18, 1, NULL, '2025-04-09 11:50:10'),
(236, NULL, 18, 1, NULL, '2025-04-09 11:50:11'),
(237, NULL, 18, 1, NULL, '2025-04-09 11:50:11'),
(238, NULL, 18, 1, NULL, '2025-04-09 11:50:12'),
(239, NULL, 18, 1, NULL, '2025-04-09 11:50:12'),
(240, NULL, 18, 1, NULL, '2025-04-09 11:50:13'),
(241, NULL, 18, 1, NULL, '2025-04-09 11:50:13'),
(242, NULL, 18, 1, NULL, '2025-04-09 11:50:14'),
(243, NULL, 18, 1, NULL, '2025-04-09 11:50:14'),
(244, NULL, 18, 0, NULL, NULL),
(245, NULL, 18, 0, NULL, NULL),
(246, NULL, 18, 0, NULL, NULL),
(247, NULL, 18, 0, NULL, NULL),
(248, NULL, 18, 0, NULL, NULL),
(249, NULL, 18, 0, NULL, NULL),
(250, NULL, 18, 0, NULL, NULL),
(251, NULL, 18, 0, NULL, NULL),
(252, NULL, 18, 0, NULL, NULL),
(253, NULL, 18, 0, NULL, NULL),
(254, NULL, 18, 0, NULL, NULL),
(255, NULL, 18, 0, NULL, NULL),
(256, NULL, 18, 0, NULL, NULL),
(257, NULL, 18, 0, NULL, NULL),
(258, NULL, 18, 0, NULL, NULL),
(259, NULL, 18, 0, NULL, NULL),
(260, NULL, 18, 0, NULL, NULL),
(261, NULL, 18, 0, NULL, NULL),
(262, NULL, 18, 0, NULL, NULL),
(263, NULL, 18, 0, NULL, NULL),
(264, NULL, 18, 0, NULL, NULL),
(265, NULL, 18, 0, NULL, NULL),
(266, NULL, 18, 0, NULL, NULL),
(267, NULL, 18, 0, NULL, NULL),
(268, NULL, 18, 0, NULL, NULL),
(269, NULL, 18, 0, NULL, NULL),
(270, NULL, 18, 0, NULL, NULL),
(271, NULL, 18, 0, NULL, NULL),
(272, NULL, 18, 0, NULL, NULL),
(273, NULL, 18, 0, NULL, NULL),
(274, NULL, 18, 0, NULL, NULL),
(275, NULL, 18, 0, NULL, NULL),
(276, NULL, 18, 0, NULL, NULL),
(277, NULL, 18, 0, NULL, NULL),
(278, NULL, 18, 0, NULL, NULL),
(279, NULL, 18, 0, NULL, NULL),
(280, NULL, 18, 0, NULL, NULL),
(281, NULL, 18, 0, NULL, NULL),
(282, NULL, 18, 0, NULL, NULL),
(283, NULL, 18, 0, NULL, NULL),
(284, NULL, 18, 0, NULL, NULL),
(285, NULL, 18, 0, NULL, NULL),
(286, NULL, 18, 0, NULL, NULL),
(287, NULL, 18, 0, NULL, NULL),
(288, NULL, 18, 0, NULL, NULL),
(289, NULL, 18, 0, NULL, NULL),
(290, NULL, 18, 0, NULL, NULL),
(291, NULL, 18, 0, NULL, NULL),
(292, NULL, 18, 0, NULL, NULL),
(293, NULL, 18, 0, NULL, NULL),
(294, NULL, 18, 0, NULL, NULL),
(295, NULL, 18, 0, NULL, NULL),
(296, NULL, 18, 0, NULL, NULL),
(297, NULL, 18, 0, NULL, NULL),
(298, NULL, 18, 0, NULL, NULL),
(299, NULL, 18, 0, NULL, NULL),
(300, NULL, 18, 0, NULL, NULL),
(301, NULL, 18, 0, NULL, NULL),
(302, NULL, 18, 0, NULL, NULL),
(303, NULL, 18, 0, NULL, NULL),
(304, NULL, 18, 0, NULL, NULL),
(305, NULL, 18, 0, NULL, NULL),
(306, NULL, 18, 0, NULL, NULL),
(307, NULL, 18, 0, NULL, NULL),
(308, NULL, 18, 0, NULL, NULL),
(309, NULL, 18, 0, NULL, NULL),
(310, NULL, 18, 0, NULL, NULL),
(311, NULL, 18, 0, NULL, NULL),
(312, NULL, 18, 0, NULL, NULL),
(313, NULL, 18, 0, NULL, NULL),
(314, NULL, 18, 0, NULL, NULL),
(315, NULL, 18, 0, NULL, NULL),
(316, NULL, 18, 0, NULL, NULL),
(317, NULL, 18, 0, NULL, NULL),
(318, NULL, 18, 0, NULL, NULL),
(319, NULL, 18, 0, NULL, NULL),
(320, NULL, 18, 0, NULL, NULL),
(321, NULL, 18, 0, NULL, NULL),
(322, NULL, 18, 0, NULL, NULL),
(323, NULL, 18, 0, NULL, NULL),
(324, NULL, 18, 0, NULL, NULL),
(325, NULL, 18, 0, NULL, NULL),
(326, NULL, 18, 0, NULL, NULL),
(327, NULL, 18, 0, NULL, NULL),
(328, NULL, 18, 0, NULL, NULL),
(329, NULL, 18, 0, NULL, NULL),
(330, NULL, 18, 0, NULL, NULL),
(331, NULL, 18, 0, NULL, NULL),
(332, NULL, 18, 0, NULL, NULL),
(333, NULL, 18, 0, NULL, NULL),
(334, NULL, 18, 0, NULL, NULL),
(335, NULL, 18, 0, NULL, NULL),
(336, NULL, 18, 0, NULL, NULL),
(337, NULL, 18, 0, NULL, NULL),
(338, NULL, 18, 0, NULL, NULL),
(339, NULL, 18, 0, NULL, NULL),
(340, NULL, 18, 0, NULL, NULL),
(341, NULL, 18, 0, NULL, NULL),
(342, NULL, 18, 0, NULL, NULL),
(343, NULL, 18, 0, NULL, NULL),
(344, NULL, 18, 0, NULL, NULL),
(345, NULL, 18, 0, NULL, NULL),
(346, NULL, 18, 0, NULL, NULL),
(347, NULL, 18, 0, NULL, NULL),
(348, NULL, 18, 0, NULL, NULL),
(349, NULL, 18, 0, NULL, NULL),
(350, NULL, 18, 0, NULL, NULL),
(351, NULL, 18, 0, NULL, NULL),
(352, NULL, 18, 0, NULL, NULL),
(353, NULL, 18, 0, NULL, NULL),
(354, NULL, 18, 0, NULL, NULL),
(355, NULL, 18, 0, NULL, NULL),
(356, NULL, 18, 0, NULL, NULL),
(357, NULL, 18, 0, NULL, NULL),
(358, NULL, 18, 0, NULL, NULL),
(359, NULL, 18, 0, NULL, NULL),
(360, NULL, 18, 0, NULL, NULL),
(361, NULL, 18, 0, NULL, NULL),
(362, NULL, 18, 0, NULL, NULL),
(363, NULL, 18, 0, NULL, NULL),
(364, NULL, 18, 0, NULL, NULL),
(365, NULL, 18, 0, NULL, NULL),
(366, NULL, 18, 0, NULL, NULL),
(367, NULL, 18, 0, NULL, NULL),
(368, NULL, 18, 0, NULL, NULL),
(369, NULL, 18, 0, NULL, NULL),
(370, NULL, 18, 0, NULL, NULL),
(371, NULL, 18, 0, NULL, NULL),
(372, NULL, 18, 0, NULL, NULL),
(373, NULL, 18, 0, NULL, NULL),
(374, NULL, 18, 0, NULL, NULL),
(375, NULL, 18, 0, NULL, NULL),
(376, NULL, 18, 0, NULL, NULL),
(377, NULL, 18, 0, NULL, NULL),
(378, NULL, 18, 0, NULL, NULL),
(379, NULL, 18, 0, NULL, NULL),
(380, NULL, 18, 0, NULL, NULL),
(381, NULL, 18, 0, NULL, NULL),
(382, NULL, 18, 0, NULL, NULL),
(383, NULL, 18, 0, NULL, NULL),
(384, NULL, 18, 0, NULL, NULL),
(385, NULL, 18, 0, NULL, NULL),
(386, NULL, 18, 0, NULL, NULL),
(387, NULL, 18, 0, NULL, NULL),
(388, NULL, 18, 0, NULL, NULL),
(389, NULL, 18, 0, NULL, NULL),
(390, NULL, 18, 0, NULL, NULL),
(391, NULL, 18, 0, NULL, NULL),
(392, NULL, 18, 0, NULL, NULL),
(393, NULL, 18, 0, NULL, NULL),
(394, NULL, 18, 0, NULL, NULL),
(395, NULL, 18, 0, NULL, NULL),
(396, NULL, 18, 0, NULL, NULL),
(397, NULL, 18, 0, NULL, NULL),
(398, NULL, 18, 0, NULL, NULL),
(399, NULL, 18, 0, NULL, NULL),
(400, NULL, 18, 0, NULL, NULL),
(401, NULL, 18, 0, NULL, NULL),
(402, NULL, 18, 0, NULL, NULL),
(403, NULL, 18, 0, NULL, NULL),
(404, NULL, 18, 0, NULL, NULL),
(405, NULL, 18, 0, NULL, NULL),
(406, NULL, 18, 0, NULL, NULL),
(407, NULL, 18, 0, NULL, NULL),
(408, NULL, 18, 0, NULL, NULL),
(409, NULL, 18, 0, NULL, NULL),
(410, NULL, 18, 0, NULL, NULL),
(411, NULL, 18, 0, NULL, NULL),
(412, NULL, 18, 0, NULL, NULL),
(413, NULL, 18, 0, NULL, NULL),
(414, NULL, 18, 0, NULL, NULL),
(415, NULL, 18, 0, NULL, NULL),
(416, NULL, 18, 0, NULL, NULL),
(417, NULL, 18, 0, NULL, NULL),
(418, NULL, 18, 0, NULL, NULL),
(419, NULL, 18, 0, NULL, NULL),
(420, NULL, 18, 0, NULL, NULL),
(421, NULL, 18, 0, NULL, NULL),
(422, NULL, 18, 0, NULL, NULL),
(423, NULL, 18, 0, NULL, NULL),
(424, NULL, 18, 0, NULL, NULL),
(425, NULL, 18, 0, NULL, NULL),
(426, NULL, 18, 0, NULL, NULL),
(427, NULL, 18, 0, NULL, NULL),
(428, NULL, 18, 0, NULL, NULL),
(429, NULL, 18, 0, NULL, NULL),
(430, NULL, 18, 0, NULL, NULL),
(431, NULL, 18, 0, NULL, NULL),
(432, NULL, 18, 0, NULL, NULL),
(433, NULL, 18, 0, NULL, NULL),
(434, NULL, 18, 0, NULL, NULL),
(435, NULL, 18, 0, NULL, NULL),
(436, NULL, 18, 0, NULL, NULL),
(437, NULL, 18, 0, NULL, NULL),
(438, NULL, 18, 0, NULL, NULL),
(439, NULL, 18, 0, NULL, NULL),
(440, NULL, 18, 0, NULL, NULL),
(441, NULL, 18, 0, NULL, NULL),
(442, NULL, 18, 0, NULL, NULL),
(443, NULL, 18, 0, NULL, NULL),
(444, NULL, 18, 0, NULL, NULL),
(445, NULL, 18, 0, NULL, NULL),
(446, NULL, 18, 0, NULL, NULL),
(447, NULL, 18, 0, NULL, NULL),
(448, NULL, 18, 0, NULL, NULL),
(449, NULL, 18, 0, NULL, NULL),
(450, NULL, 18, 0, NULL, NULL),
(451, NULL, 18, 0, NULL, NULL),
(452, NULL, 18, 0, NULL, NULL),
(453, NULL, 18, 0, NULL, NULL),
(454, NULL, 18, 0, NULL, NULL),
(455, NULL, 18, 0, NULL, NULL),
(456, NULL, 18, 0, NULL, NULL),
(457, NULL, 18, 0, NULL, NULL),
(458, NULL, 18, 0, NULL, NULL),
(459, NULL, 18, 0, NULL, NULL),
(460, NULL, 18, 0, NULL, NULL),
(461, NULL, 18, 0, NULL, NULL),
(462, NULL, 18, 0, NULL, NULL),
(463, NULL, 18, 0, NULL, NULL),
(464, NULL, 18, 0, NULL, NULL),
(465, NULL, 18, 0, NULL, NULL),
(466, NULL, 18, 0, NULL, NULL),
(467, NULL, 18, 0, NULL, NULL),
(468, NULL, 18, 0, NULL, NULL),
(469, NULL, 18, 0, NULL, NULL),
(470, NULL, 18, 0, NULL, NULL),
(471, NULL, 18, 0, NULL, NULL),
(472, NULL, 18, 0, NULL, NULL),
(473, NULL, 18, 0, NULL, NULL),
(474, NULL, 18, 0, NULL, NULL),
(475, NULL, 18, 0, NULL, NULL),
(476, NULL, 18, 0, NULL, NULL),
(477, NULL, 18, 0, NULL, NULL),
(478, NULL, 18, 0, NULL, NULL),
(479, NULL, 18, 0, NULL, NULL),
(480, NULL, 18, 0, NULL, NULL),
(481, NULL, 18, 0, NULL, NULL),
(482, NULL, 18, 0, NULL, NULL),
(483, NULL, 18, 0, NULL, NULL),
(484, NULL, 18, 0, NULL, NULL),
(485, NULL, 18, 0, NULL, NULL),
(486, NULL, 18, 0, NULL, NULL),
(487, NULL, 18, 0, NULL, NULL),
(488, NULL, 18, 0, NULL, NULL),
(489, NULL, 18, 0, NULL, NULL),
(490, NULL, 18, 0, NULL, NULL),
(491, NULL, 18, 0, NULL, NULL),
(492, NULL, 18, 0, NULL, NULL),
(493, NULL, 18, 0, NULL, NULL),
(494, NULL, 18, 0, NULL, NULL),
(495, NULL, 18, 0, NULL, NULL),
(496, NULL, 18, 0, NULL, NULL),
(497, NULL, 18, 0, NULL, NULL),
(498, NULL, 18, 0, NULL, NULL),
(499, NULL, 18, 0, NULL, NULL),
(500, NULL, 18, 0, NULL, NULL),
(501, NULL, 18, 0, NULL, NULL),
(502, NULL, 18, 0, NULL, NULL),
(503, NULL, 18, 0, NULL, NULL),
(504, NULL, 18, 0, NULL, NULL),
(505, NULL, 18, 0, NULL, NULL),
(506, NULL, 19, 0, NULL, NULL),
(507, NULL, 19, 0, NULL, NULL),
(508, NULL, 19, 0, NULL, NULL),
(509, NULL, 19, 0, NULL, NULL),
(510, NULL, 19, 0, NULL, NULL),
(511, NULL, 19, 0, NULL, NULL),
(512, NULL, 19, 0, NULL, NULL),
(513, NULL, 19, 0, NULL, NULL),
(514, NULL, 19, 0, NULL, NULL),
(515, NULL, 19, 0, NULL, NULL),
(516, NULL, 19, 0, NULL, NULL),
(517, NULL, 19, 0, NULL, NULL),
(518, NULL, 19, 0, NULL, NULL),
(519, NULL, 19, 0, NULL, NULL),
(520, NULL, 19, 0, NULL, NULL),
(521, NULL, 19, 0, NULL, NULL),
(522, NULL, 19, 0, NULL, NULL),
(523, NULL, 19, 0, NULL, NULL),
(524, NULL, 19, 0, NULL, NULL),
(525, NULL, 19, 0, NULL, NULL),
(526, NULL, 19, 0, NULL, NULL),
(527, NULL, 19, 0, NULL, NULL),
(528, NULL, 19, 0, NULL, NULL),
(529, NULL, 19, 0, NULL, NULL),
(530, NULL, 19, 0, NULL, NULL),
(531, NULL, 19, 0, NULL, NULL),
(532, NULL, 19, 0, NULL, NULL),
(533, NULL, 19, 0, NULL, NULL),
(534, NULL, 19, 0, NULL, NULL),
(535, NULL, 19, 0, NULL, NULL),
(536, NULL, 20, 0, NULL, NULL),
(537, NULL, 20, 0, NULL, NULL),
(538, NULL, 20, 0, NULL, NULL),
(539, NULL, 20, 0, NULL, NULL),
(540, NULL, 20, 0, NULL, NULL),
(541, NULL, 20, 0, NULL, NULL),
(542, NULL, 20, 0, NULL, NULL),
(543, NULL, 20, 0, NULL, NULL),
(544, NULL, 20, 0, NULL, NULL),
(545, NULL, 20, 0, NULL, NULL),
(546, NULL, 20, 0, NULL, NULL),
(547, NULL, 20, 0, NULL, NULL),
(548, NULL, 20, 0, NULL, NULL),
(549, NULL, 20, 0, NULL, NULL),
(550, NULL, 20, 0, NULL, NULL),
(551, NULL, 20, 0, NULL, NULL),
(552, NULL, 20, 0, NULL, NULL),
(553, NULL, 20, 0, NULL, NULL),
(554, NULL, 20, 0, NULL, NULL),
(555, NULL, 20, 0, NULL, NULL),
(556, NULL, 20, 0, NULL, NULL),
(557, NULL, 20, 0, NULL, NULL),
(558, NULL, 20, 0, NULL, NULL),
(559, NULL, 20, 0, NULL, NULL),
(560, NULL, 20, 0, NULL, NULL),
(561, NULL, 20, 0, NULL, NULL),
(562, NULL, 20, 0, NULL, NULL),
(563, NULL, 20, 0, NULL, NULL),
(564, NULL, 20, 0, NULL, NULL),
(565, NULL, 20, 0, NULL, NULL),
(566, NULL, 21, 1, NULL, NULL),
(567, NULL, 21, 1, NULL, NULL),
(568, NULL, 21, 1, NULL, NULL),
(569, NULL, 21, 1, NULL, NULL),
(570, NULL, 21, 1, NULL, NULL),
(571, NULL, 21, 1, NULL, NULL),
(572, NULL, 21, 1, NULL, NULL),
(573, NULL, 21, 1, NULL, NULL),
(574, NULL, 21, 1, NULL, NULL),
(575, NULL, 21, 1, NULL, '2025-03-16 17:14:53'),
(576, NULL, 21, 1, NULL, '2025-03-28 13:40:01'),
(577, NULL, 21, 1, NULL, '2025-03-28 13:40:01'),
(578, NULL, 21, 1, NULL, '2025-03-28 13:40:02'),
(579, NULL, 21, 1, NULL, '2025-03-28 13:40:03'),
(580, NULL, 21, 1, NULL, '2025-03-28 13:40:03'),
(581, NULL, 21, 1, NULL, '2025-03-28 13:40:05'),
(582, NULL, 21, 1, NULL, '2025-03-28 13:40:06'),
(583, NULL, 21, 1, NULL, '2025-03-28 13:40:08'),
(584, NULL, 21, 1, NULL, '2025-03-28 13:40:08'),
(585, NULL, 21, 1, NULL, '2025-03-28 13:40:09'),
(586, NULL, 21, 1, NULL, '2025-03-28 13:40:09'),
(587, NULL, 21, 1, NULL, '2025-03-28 13:40:09'),
(588, NULL, 21, 1, NULL, '2025-04-09 11:47:35'),
(589, NULL, 21, 1, NULL, '2025-04-09 11:47:35'),
(590, NULL, 21, 1, NULL, '2025-04-09 11:47:36'),
(591, NULL, 21, 1, NULL, '2025-04-09 11:47:37'),
(592, NULL, 21, 1, NULL, '2025-04-09 11:47:37'),
(593, NULL, 21, 1, NULL, '2025-04-09 11:47:38'),
(594, NULL, 21, 1, NULL, '2025-04-09 11:47:38'),
(595, NULL, 21, 1, NULL, '2025-04-09 11:47:39'),
(596, NULL, 21, 1, NULL, '2025-04-09 11:47:39'),
(597, NULL, 21, 1, NULL, '2025-04-09 11:47:40'),
(598, NULL, 21, 0, NULL, NULL),
(599, NULL, 21, 0, NULL, NULL),
(600, NULL, 21, 0, NULL, NULL),
(601, NULL, 21, 0, NULL, NULL),
(602, NULL, 21, 0, NULL, NULL),
(603, NULL, 21, 0, NULL, NULL),
(604, NULL, 21, 0, NULL, NULL),
(605, NULL, 21, 0, NULL, NULL),
(606, NULL, 21, 0, NULL, NULL),
(607, NULL, 21, 0, NULL, NULL),
(608, NULL, 21, 0, NULL, NULL),
(609, NULL, 21, 0, NULL, NULL),
(610, NULL, 21, 0, NULL, NULL),
(611, NULL, 21, 0, NULL, NULL),
(612, NULL, 21, 0, NULL, NULL),
(613, NULL, 21, 0, NULL, NULL),
(614, NULL, 21, 0, NULL, NULL),
(615, NULL, 21, 0, NULL, NULL),
(616, NULL, 21, 0, NULL, NULL),
(617, NULL, 21, 0, NULL, NULL),
(618, NULL, 21, 0, NULL, NULL),
(619, NULL, 21, 0, NULL, NULL),
(620, NULL, 21, 0, NULL, NULL),
(621, NULL, 21, 0, NULL, NULL),
(622, NULL, 21, 0, NULL, NULL),
(623, NULL, 21, 0, NULL, NULL),
(624, NULL, 21, 0, NULL, NULL),
(625, NULL, 21, 0, NULL, NULL),
(626, NULL, 22, 0, NULL, NULL),
(627, NULL, 22, 0, NULL, NULL),
(628, NULL, 22, 0, NULL, NULL),
(629, NULL, 22, 0, NULL, NULL),
(630, NULL, 22, 0, NULL, NULL),
(631, NULL, 22, 0, NULL, NULL),
(632, NULL, 22, 0, NULL, NULL),
(633, NULL, 22, 0, NULL, NULL),
(634, NULL, 22, 0, NULL, NULL),
(635, NULL, 22, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) NOT NULL DEFAULT 1,
  `total_points` int(11) DEFAULT NULL,
  `total_days` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `trash` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `name`, `user_id`, `project_id`, `total_points`, `total_days`, `points`, `days`, `trash`) VALUES
(1, 'Tea fast for 10 days', NULL, 1, 500, 10, 0, 0, 1),
(3, 'work on second brain for ', NULL, 1, 500, 20, 300, 8, 0),
(6, 'test', NULL, 2, 10, 10, 0, 0, 0),
(7, 'test1', NULL, 2, 10, 10, 4, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `qty` varchar(20) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `name`, `price`, `category`, `qty`, `img`, `details`, `created_at`, `updated_at`) VALUES
(1, 'thid', 1234, 'test1', 'test', NULL, '<p>test</p>', '2024-09-18 16:36:39', '2024-09-26 12:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `details` text NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `topic`, `details`, `img`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'this is test for project', '1', '<p>My grandparents were actually card-carrying Communists. As an\nactive member in the Communist Party, my grandfather Phil Horowitz\nlost his job as a schoolteacher during the McCarthy era. My father was a\nred-diaper baby and grew up indoctrinated in the philosophy of the left.\nIn 1968, he moved our family west to Berkeley, California, and became\neditor of the famed New Left magazine Ramparts.\nAs a result, I grew up in the city affectionately known by its\ninhabitants as the People’s Republic of Berkeley. As a young child, I was\nincredibly shy and terrified of adults. When my mother dropped me off\nat nursery school for the first time, I began to cry. The teacher told my\nmother to just leave, while reassuring her that crying was common\namong nursery school children. But when Elissa Horowitz returned three\nhours later, she found me soaking wet and still crying. The teacher\nexplained that I hadn’t stopped, and now my clothes were drenched as a\nresult. I got kicked out of nursery school that day. If my mother hadn’t\nbeen the most patient person in the world, I might never have gone to\nschool. When everybody around her recommended psychiatric treatment,\nshe was patient, willing to wait until I got comfortable with the world, no\nmatter how long it took.\nWhen I was five years old, we moved from a one-bedroom house on\nGlen Avenue, which had become far too small for a six-person family, to\na larger one on Bonita Avenue. Bonita was middle-class Berkeley, which\nmeans something a bit different from what one finds in most middle-\nclass neighborhoods. The block was a collection of hippies, crazy\npeople, lower-class people working hard to move up, and upper-class\npeople taking enough drugs to move down. One day, one of my older\nbrother Jonathan’s friends, Roger (not his real name), was over at our\nhouse. Roger pointed to an African American kid down the block who\nwas riding in a red wagon. Roger dared me: “Go down the street, tell that\nkid to give you his wagon, and if he says anything, spit in his face and\ncall him a nigger.”\nA few things require clarification here. First, we were in Berkeley, so\nthat was not common language. In fact, I had never heard the word\nnigger before and didn’t know what it meant, though I guessed it wasn’t\na compliment. Second, Roger wasn’t racist and he wasn’t raised in a bad\nhome. His father was a Berkeley professor and both his parents were\nsome of the nicest people in the world, but we later found out that Roger\nsuffered from schizophrenia, and his dark side wanted to see a fight.</p>', 'http://127.0.0.1/the_mentor/storage/app/uploads/Laravel From Scratch 2022 _ 4+ Hour Course.mp4_snapshot_03.24.18.433.jpg', 1, '2023-12-17 12:12:27', '2024-11-17 17:55:30'),
(12, 'learnig to think in programming', '1', '<p>test</p>', 'http://127.0.0.1/the_mentor/storage/app/uploads/earth343434.jpg', 1, '2023-12-19 11:11:43', '2023-12-19 11:11:43'),
(13, 'this is another test', '1', '<p>hello this test is for tst</p>', NULL, 1, '2023-12-22 10:44:14', '2023-12-22 10:44:14'),
(14, 'how to use import in node module', '3', '<p>so in this example you can see the &nbsp;<span style=\"color: rgb(156, 220, 254);\">\"type\"</span>: <span style=\"color: rgb(206, 145, 120);\">\"module\"</span>, which will enable the import functionality in you app by the way if you dont want touse that you can always use \"const express = require(\"express\")\"</p>', 'http://127.0.0.1/the_mentor/storage/app/uploads/blog1.jpg', 1, '2024-01-02 11:31:07', '2024-01-02 11:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `passwords`
--

CREATE TABLE `passwords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `password` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `passwords`
--

INSERT INTO `passwords` (`id`, `title`, `password`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 'eyJpdiI6ImgxbDB0NEl2eTgrVE1mZk10NG1ZUXc9PSIsInZhbHVlIjoiRWIzd29vcHBGOHBKcGZmZ0ZaQnZjSmxBbTVhQ29hTG1QcWo3cWozYVlqcz0iLCJtYWMiOiI1ZmRhMDIwMzllY2JiZWYyYjUzOGZjMTI4NjcxMGZkMThiYmIzZWMxOGNkMDc3YzNmZDJkYTk0ZTVjYzBlODJmIiwidGFnIjoiIn0=', 'Mnkch1pc@kunj', 3, '2025-05-09 16:39:58', '2025-05-09 16:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `meta_description` varchar(160) DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `views_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `featured_image`, `meta_description`, `status`, `category_id`, `user_id`, `published_at`, `views_count`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'This is very first post by admin', 'this-is-very-first-post-by-admin', '<p>sample text</p>', NULL, NULL, 'draft', 1, 3, NULL, 0, '2025-02-13 19:37:40', '2025-02-13 19:37:40', NULL),
(10, 'SEO for Beginners: No Jargon, Just the Basics', 'seo-for-beginners-no-jargon-just-the-basics', '<p>Ever wondered how some websites magically pop up at the top of Google? It\'s not magic, it\'s SEO – Search Engine Optimization. And don\'t worry, it\'s not as scary as it sounds. This post breaks down the basics in plain English, no jargon needed.</p><p><strong>What\'s the Deal with SEO?</strong></p><p>Think of SEO as making your website super attractive to Google and other search engines. The higher you rank, the more people see your site. It\'s like having a shop on the busiest street corner – more foot traffic means more potential customers.</p><p><strong>Why Should You Care About SEO?</strong></p><p>These days, everyone Googles everything. If your website isn\'t optimized, you\'re missing out on a huge chunk of potential visitors. SEO helps you get free (organic) traffic, which is gold for any business.</p><p><strong>The Nitty-Gritty (But Not Too Much):</strong></p><p>SEO has a few key parts:</p><ul><li><strong>Keywords:</strong> These are the words people type into Google. If you sell handmade jewelry, keywords might be \"handmade necklaces,\" \"unique earrings,\" or \"custom bracelets.\" Finding the right keywords is like knowing what your customers are asking for.</li><li><strong>On-Page Stuff:</strong> This is about tweaking things <i>on</i> your website itself. Think of it as tidying up your shop window. You want your website\'s content, titles, and descriptions to be clear and relevant, so Google knows what you\'re selling.</li><li><strong>Off-Page Stuff:</strong> This is about getting other websites to link to you. It\'s like getting recommendations from other shop owners. The more good recommendations you have, the more trustworthy you seem.</li><li><strong>Techy Bits:</strong> This is the behind-the-scenes stuff that makes your website run smoothly. Think of it as having a well-organized stockroom. A fast, easy-to-use website is essential for happy customers (and happy search engines).</li><li><strong>Great Content:</strong> Writing interesting and helpful stuff about your business is key. It\'s like having friendly shop assistants who can answer all your questions. Good content keeps people coming back for more.</li></ul><p><strong>SEO is a Marathon, Not a Sprint:</strong></p><p>SEO isn\'t a quick fix. It takes time and effort to see results. Think of it as building a good reputation – it takes time and consistency.</p><p><strong>Where Do You Start?</strong></p><p>Don\'t feel overwhelmed! Start with the basics: figure out your keywords and make sure your website content is top-notch. There are tons of resources online to help you learn more. And if you\'re feeling lost, you can always hire an SEO expert to guide you.</p><p><strong>The Bottom Line:</strong></p><p>SEO is all about making your website easy for search engines to find and understand, so potential customers can find you too. It\'s a long-term game, but it\'s definitely worth playing.</p><p><strong>What\'s Next?</strong></p><ul><li>Start brainstorming keywords related to your business.</li><li>Double-check that your website content is helpful and engaging.</li><li>Explore some basic on-page optimization tips.</li></ul><p>This is just a taster of SEO. We\'ll be diving deeper into specific topics in future posts, so stay tuned!</p>', NULL, NULL, 'draft', 1, 5, NULL, 0, '2025-02-17 16:25:34', '2025-02-17 16:25:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 9, 6, NULL, NULL),
(2, 10, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `stock_quantity` int(11) NOT NULL DEFAULT 0,
  `sku` varchar(100) NOT NULL,
  `weight` decimal(8,2) DEFAULT NULL,
  `dimensions` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery`)),
  `status` enum('active','inactive','archived') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cycles` int(11) NOT NULL DEFAULT 0,
  `description` longtext DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `name`, `cycles`, `description`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(12, NULL, 'run for 10 days', 0, NULL, '2025-01-30', 1, '2025-01-20 16:53:22', '2025-01-20 16:53:22'),
(13, NULL, 'Avoid tea for 21 days', 0, NULL, '2025-01-31', 1, '2025-01-20 16:54:32', '2025-01-20 16:54:32'),
(14, 3, 'Getting better at english', 0, NULL, '2025-02-28', 1, '2025-01-27 14:00:55', '2025-01-27 14:00:55'),
(15, 3, 'Run for 30 days', 0, NULL, '2025-02-28', 1, '2025-01-27 18:27:43', '2025-01-27 18:27:43'),
(16, 3, 'Do meditation for 30 days', 0, NULL, '2025-03-05', 1, '2025-02-04 14:13:33', '2025-02-04 14:13:33'),
(17, 3, 'Preparing admin panel for dynamic web', 0, NULL, '2025-02-28', 1, '2025-02-11 18:13:22', '2025-02-11 18:13:22'),
(18, 3, 'Reaching to the income of 50000', 0, NULL, '2025-12-31', 1, '2025-02-24 04:23:15', '2025-02-24 04:23:15'),
(19, 3, 'Mac care', 0, NULL, '2025-09-15', 1, '2025-02-24 19:21:23', '2025-02-24 19:21:23'),
(20, 3, 'Morning routine', 0, NULL, '2025-03-31', 1, '2025-02-25 18:13:56', '2025-02-25 18:13:56'),
(21, 3, 'Creating an ecommerce app', 0, NULL, '2025-04-30', 1, '2025-03-04 05:46:28', '2025-03-04 05:46:28'),
(22, 3, 'Hometown Visit', 0, NULL, '2025-03-14', 1, '2025-03-08 17:59:33', '2025-03-08 17:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `p_categories`
--

CREATE TABLE `p_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Development', 'dev', '2025-04-22 17:12:10', '2025-04-22 17:12:10'),
(2, 'Productivity', 'productivity', '2025-04-25 13:01:14', '2025-04-25 13:01:14'),
(3, 'Project', 'Project which is a broad topic', '2025-04-25 17:22:34', '2025-04-25 17:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(6, 'technology', NULL, NULL, '2025-02-13 19:37:40', '2025-02-13 19:37:40'),
(7, '#seo #degital marketing #tech', NULL, NULL, '2025-02-17 16:25:34', '2025-02-17 16:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `goal_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `details` longtext DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `duration` decimal(6,2) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `goal_id`, `project_id`, `name`, `details`, `end_date`, `duration`, `points`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, NULL, 'Landing page sections finalize', NULL, NULL, NULL, NULL, 0, '2025-02-06 18:18:39', '2025-02-06 18:18:39'),
(2, 4, NULL, NULL, 'starting admin panel for ecommerce products', NULL, NULL, NULL, NULL, 1, '2025-02-06 18:20:27', '2025-02-09 18:42:33'),
(3, 5, NULL, NULL, 'Make Reel & posts', NULL, NULL, NULL, NULL, 1, '2025-02-07 16:58:36', '2025-02-07 17:00:27'),
(4, 5, NULL, NULL, 'Product research', NULL, NULL, NULL, NULL, 0, '2025-02-07 16:58:53', '2025-02-07 16:58:53'),
(5, 4, NULL, NULL, 'Add tool teap secound dream', NULL, NULL, NULL, NULL, 1, '2025-02-07 17:04:21', '2025-02-12 16:58:51'),
(6, 3, NULL, 17, 'Preparing blogs crud', 'This should take minnimum of 2 days', NULL, NULL, NULL, 0, '2025-02-11 18:15:08', '2025-02-11 18:15:08'),
(7, 3, NULL, 17, 'Creating centralized toast', '', NULL, NULL, NULL, 1, '2025-02-11 18:17:44', '2025-02-12 16:59:43'),
(8, 3, NULL, 17, 'tags color class setting', 'min of 1', NULL, NULL, NULL, 0, '2025-02-13 15:20:05', '2025-02-13 15:20:05'),
(9, 3, NULL, 14, 'user id edit form', 'user id in edit form should not be changed while editing', NULL, NULL, NULL, 1, '2025-02-13 16:40:43', '2025-02-13 16:41:20'),
(10, 3, NULL, 17, 'user id update', 'user id in edit form should not be changed while editing', NULL, NULL, NULL, 1, '2025-02-13 16:41:09', '2025-02-25 07:49:59'),
(11, 4, NULL, 0, 'researching dynamic blog images from rich editor', '', NULL, NULL, NULL, 0, '2025-02-13 17:10:48', '2025-02-13 17:10:48'),
(12, 3, NULL, 17, 'Dofferent images for goals', '<p>We can add dynamic images and their path from data base&nbsp;</p>', NULL, NULL, NULL, 0, '2025-02-14 05:58:37', '2025-02-14 05:58:37'),
(13, 3, NULL, 17, 'Preparing a blog website structure', '<p>Try to complete within week.</p>', NULL, NULL, NULL, 0, '2025-02-24 04:20:47', '2025-02-24 04:20:47'),
(14, 3, NULL, 19, 'Firstly keep keyboard at reach', '<p>11</p>', NULL, NULL, NULL, 0, '2025-02-24 19:26:59', '2025-02-24 19:26:59'),
(15, 3, NULL, 19, 'Clean keyboard and screen after using', '<p>222</p>', NULL, NULL, NULL, 0, '2025-02-24 19:27:23', '2025-02-24 19:27:23'),
(16, 3, NULL, 19, 'Dont worry too much and work to buy new', '<p>3333</p>', NULL, NULL, NULL, 0, '2025-02-24 19:29:43', '2025-02-24 19:29:43'),
(17, 3, NULL, 19, 'Use hanky to clean hands', '<p>444</p>', NULL, NULL, NULL, 0, '2025-02-24 19:32:09', '2025-02-24 19:32:09'),
(18, 3, NULL, 18, 'Working for few mins is better than not working.', '<p>12</p>', NULL, NULL, NULL, 0, '2025-02-25 07:55:18', '2025-02-25 07:55:18'),
(19, 3, NULL, 18, 'You have a pattern of stuck thinker fight against it.', '<p>123</p>', NULL, NULL, NULL, 0, '2025-02-25 07:56:13', '2025-02-25 07:56:13'),
(20, 3, NULL, 20, 'Do the stretching', '<p>123</p>', NULL, NULL, NULL, 0, '2025-02-25 18:14:51', '2025-02-25 18:14:51'),
(21, 3, NULL, 20, 'Do the cleaning and clearing', '<p>Ert</p>', NULL, NULL, NULL, 0, '2025-02-25 18:15:48', '2025-02-25 18:15:48'),
(22, 3, NULL, 20, 'Listen to achary for 30 to 60 mins', '<p>Tre</p>', NULL, NULL, NULL, 0, '2025-02-25 18:16:18', '2025-02-25 18:16:18'),
(23, 3, NULL, 20, 'Start working on goals', '<p>Yiio</p>', NULL, NULL, NULL, 0, '2025-02-25 18:16:38', '2025-02-25 18:16:38'),
(24, 3, NULL, 20, 'Listen to ambient music for 20 mins', '<p>pdf</p>', NULL, NULL, NULL, 0, '2025-02-27 07:28:10', '2025-02-27 07:28:10'),
(25, 3, NULL, 22, 'Bring mouse for use', '<p>home visit task</p>', NULL, NULL, NULL, 0, '2025-03-08 18:43:10', '2025-03-08 18:43:10'),
(26, 3, NULL, 18, '100s of booms and 100s of mac book are cheaper than my time.', '<p>100s of bhoomis and 100s of mac books are cheaper than my time.</p>', NULL, NULL, NULL, 0, '2025-03-11 20:36:49', '2025-03-11 20:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `subject_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'Work', 'test', '2025-04-25 13:01:27', '2025-04-25 13:01:27'),
(2, 2, 'Reading', 'test', '2025-04-25 15:38:14', '2025-04-25 15:38:14'),
(3, 3, 'Ideas', NULL, '2025-04-25 17:23:10', '2025-04-25 17:23:10'),
(4, 3, 'Tasks', 'Tasks', '2025-04-28 12:06:27', '2025-04-28 12:06:27'),
(5, 1, 'Study', 'links related to study of development and coding and overall it related stuff', '2025-04-29 09:37:54', '2025-04-29 09:37:54'),
(6, 2, 'Extra', 'Extra', '2025-05-01 12:49:41', '2025-05-01 12:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `partner` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `partner`, `created_at`, `updated_at`) VALUES
(1, 'kunj', 'kunj@troika.com', NULL, '$2y$10$slusA1YvPFYb/afnqFTOG.0ncVeL96Yfyj.JMjSz0.6j/5GIGT.Hi', NULL, 0, '2023-07-31 05:33:52', '2023-07-31 05:33:52'),
(2, 'kunj', 'kunj@code.com', NULL, '$2y$12$gSRC7KX3sTBC6dI2xDeaGO5puoapVdkeirLnnGGH6aHIOc4b5mKRO', NULL, 0, '2024-09-26 12:21:54', '2024-09-26 12:21:54'),
(3, 'kunj', 'kunj@stoic.com', NULL, '$2y$12$Y0QWvkeH6Paj9GkUvFHxJuDOW.Toz5rHIj3ABCj4iOzebqRXgbR4a', NULL, 0, '2025-01-27 12:14:57', '2025-01-27 12:14:57'),
(4, 'kj', 'kj@stoic.com', NULL, '$2y$12$GKvJ9i6VI3VlDS94WWgq8eMF9N4DPQEP5YNyLHoQTv85/bZDsi6U.', NULL, 1, '2025-02-06 18:00:18', '2025-02-06 18:00:18'),
(5, 'Yash suthar', 'yash@suthar', NULL, '$2y$12$tiIn1tTFk6Coj5mODPHtQOMXUkZoZ9jO8GoEO1OI.JHy.YSm1ZzoG', NULL, 1, '2025-02-07 16:56:42', '2025-02-07 16:56:42'),
(6, 'mgBFxYkATgeeG', 'gmolinatp86@gmail.com', NULL, '$2y$12$hR5oFLOjNzqGF7xtF0iwUO.jAyrn7/6uHRMVerOKjO61ypA5VKUyu', NULL, 1, '2025-02-23 04:57:14', '2025-02-23 04:57:14'),
(7, 'umrDagoTot', 'connickmtau@yahoo.com', NULL, '$2y$12$3wg0K5Wowtf8RLmtLx/4u.ORrU4AChmw8qYLACs0i8CZZgzY/WmFa', NULL, 1, '2025-02-23 23:13:45', '2025-02-23 23:13:45'),
(8, 'Douglasstype', 'barboursu.ndin@gmail.com', NULL, '$2y$12$9ZGD67sqm.mElGWcIZySZOx9meYUBDvSUE7h04srnwyFAHZM5xDMC', NULL, 1, '2025-03-12 11:20:59', '2025-03-12 11:20:59'),
(9, 'WilsonNus', 'barbours.undin@gmail.com', NULL, '$2y$12$Qh/zVcnLUSIfbO1r0kBJ8.RAePLiOqZU/CXqUj/tiWkbd5.Uy2et.', NULL, 1, '2025-03-13 06:31:21', '2025-03-13 06:31:21'),
(10, 'faNGkHAtkQhmW', 'aetlandu11@gmail.com', NULL, '$2y$12$h2FNew3YFIAatkzek.Xpjulb6z.kMz8TkpScYHPKVDJJzNdERiRa.', NULL, 1, '2025-03-22 23:05:22', '2025-03-22 23:05:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_index` (`parent_id`),
  ADD KEY `categories_slug_index` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passwords`
--
ALTER TABLE `passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_status_index` (`status`),
  ADD KEY `posts_published_at_index` (`published_at`),
  ADD KEY `posts_status_published_at_index` (`status`,`published_at`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_tag_post_id_tag_id_unique` (`post_id`,`tag_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_categories`
--
ALTER TABLE `p_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`),
  ADD KEY `tags_slug_index` (`slug`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=636;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `passwords`
--
ALTER TABLE `passwords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `p_categories`
--
ALTER TABLE `p_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
