-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 09:39 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_cart_you_5p6`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, '2019-04-23 18:35:03', '2019-04-23 13:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `title`, `link`, `status`, `created_at`, `updated_at`) VALUES
(3, '5829.png', 'Banner Second', 'Banner Second', 1, '2019-04-15 17:08:32', '2019-04-15 17:08:32'),
(4, '80595.png', 'Banner Second', 'Banner Second', 1, '2019-04-15 17:32:03', '2019-04-15 17:32:03'),
(5, '35409.png', 'Banner First', 'Banner First', 1, '2019-04-15 17:32:14', '2019-04-15 17:32:14');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `url`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 0, 'Shoes', 'Shoes', 'Shoes', 1, NULL, '2019-04-02 02:25:24', '2019-04-02 02:25:24'),
(12, 10, 'Causal T-Shirts', 'Causal T-Shirts', 'Causal-T-Shirts', 1, NULL, '2019-04-02 02:25:44', '2019-04-02 02:25:44'),
(13, 11, 'Causal Shoes', 'Causal Shoes', 'Causal-Shoes', 1, NULL, '2019-04-02 02:26:02', '2019-04-02 02:26:02'),
(14, 11, 'Sports Shoes', 'Sports Shoes', 'Sports-Shoes', 1, NULL, '2019-04-02 02:26:18', '2019-04-02 02:26:18'),
(15, 10, 'Formal T-Shirts', 'Formal T-Shirts', 'Formal-T-Shirts', 1, NULL, '2019-04-02 02:26:37', '2019-04-02 02:26:37'),
(16, 10, 'New Brand Casusl T-Shirt', 'New Brand Casusl T-Shirt', 'New Brand Casusl T-Shirt', 0, NULL, '2019-04-06 05:07:37', '2019-04-06 05:18:23'),
(17, 10, 'Polo T-Shirt', 'Polo T-Shirt', 'Polo T-Shirt', 1, NULL, '2019-04-06 23:40:40', '2019-04-06 23:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'SS', 'South Sudan'),
(203, 'ES', 'Spain'),
(204, 'LK', 'Sri Lanka'),
(205, 'SH', 'St. Helena'),
(206, 'PM', 'St. Pierre and Miquelon'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard and Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syrian Arab Republic'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania, United Republic of'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad and Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks and Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States minor outlying islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (U.S.)'),
(241, 'WF', 'Wallis and Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_type` varchar(255) NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `amount`, `amount_type`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TEST123', 10, 'Percentage', '2019-04-30', 1, '2019-04-20 04:59:14', '2019-04-20 04:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `created_at`, `updated_at`) VALUES
(1, '7', 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', 'India', '201002', '9910625707', '2019-04-23 18:18:26', '2019-04-23 12:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_27_065209_create_category_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `shipping_charges` float NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_amount` float NOT NULL,
  `orders_status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `grand_total` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `pincode`, `country`, `mobile`, `shipping_charges`, `coupon_code`, `coupon_amount`, `orders_status`, `payment_method`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'In Process', 'COD', 250, '2019-04-20 17:38:45', '2019-04-23 06:01:11'),
(2, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'COD', 250, '2019-04-21 05:36:44', '2019-04-22 18:45:52'),
(3, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 400, '2019-04-21 06:06:21', '2019-04-22 18:45:52'),
(4, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 400, '2019-04-21 06:16:39', '2019-04-22 18:45:52'),
(5, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 06:44:19', '2019-04-22 18:45:52'),
(6, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 06:46:14', '2019-04-22 18:45:52'),
(7, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 06:46:55', '2019-04-22 18:45:52'),
(8, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 06:48:06', '2019-04-22 18:45:52'),
(9, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 06:48:40', '2019-04-22 18:45:52'),
(10, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 06:53:31', '2019-04-22 18:45:52'),
(11, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 06:53:49', '2019-04-22 18:45:52'),
(12, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 06:56:29', '2019-04-22 18:45:52'),
(13, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 06:56:51', '2019-04-22 18:45:52'),
(14, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 06:57:17', '2019-04-22 18:45:52'),
(15, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 06:57:53', '2019-04-22 18:45:52'),
(16, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 06:58:13', '2019-04-22 18:45:52'),
(17, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 07:58:35', '2019-04-22 18:45:52'),
(18, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 07:59:33', '2019-04-22 18:45:52'),
(19, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 08:00:21', '2019-04-22 18:45:52'),
(20, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 08:02:45', '2019-04-22 18:45:52'),
(21, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 08:03:10', '2019-04-22 18:45:52'),
(22, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 08:03:52', '2019-04-22 18:45:52'),
(23, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 08:04:26', '2019-04-22 18:45:52'),
(24, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 08:04:58', '2019-04-22 18:45:52'),
(25, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 08:05:46', '2019-04-22 18:45:52'),
(26, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 08:06:09', '2019-04-22 18:45:52'),
(27, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 08:06:46', '2019-04-22 18:45:52'),
(28, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 234, '2019-04-21 08:21:29', '2019-04-22 18:45:52'),
(29, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'Paypal', 100, '2019-04-21 08:23:02', '2019-04-22 18:45:52'),
(30, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, 'TEST123', 25, 'New', 'Paypal', 225, '2019-04-22 05:41:20', '2019-04-22 18:45:52'),
(31, 7, 'sunilbhaskar.infotrench@gmail.com', 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', '201002', 'India', '', 9910630000, '', 0, 'New', 'COD', 250, '2019-04-23 18:18:31', '2019-04-23 12:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `user_id`, `product_id`, `product_code`, `product_name`, `product_size`, `product_color`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 250, 1, '2019-04-20 17:38:45', '2019-04-20 12:08:45'),
(2, 2, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 250, 1, '2019-04-21 05:36:44', '2019-04-21 00:06:44'),
(3, 3, 7, 7, 'medium', 'My Formal Shirt', 'L1', 'green', 400, 1, '2019-04-21 06:06:21', '2019-04-21 00:36:21'),
(4, 4, 7, 7, 'medium', 'My Formal Shirt', 'L1', 'green', 400, 1, '2019-04-21 06:16:39', '2019-04-21 00:46:39'),
(5, 5, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 06:44:19', '2019-04-21 01:14:19'),
(6, 6, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 06:46:15', '2019-04-21 01:16:15'),
(7, 7, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 06:46:55', '2019-04-21 01:16:55'),
(8, 8, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 06:48:06', '2019-04-21 01:18:06'),
(9, 9, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 06:48:41', '2019-04-21 01:18:41'),
(10, 10, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 06:53:32', '2019-04-21 01:23:32'),
(11, 11, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 06:53:49', '2019-04-21 01:23:49'),
(12, 12, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 06:56:29', '2019-04-21 01:26:29'),
(13, 13, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 06:56:51', '2019-04-21 01:26:51'),
(14, 14, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 06:57:17', '2019-04-21 01:27:17'),
(15, 15, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 06:57:53', '2019-04-21 01:27:53'),
(16, 16, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 06:58:13', '2019-04-21 01:28:13'),
(17, 17, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 07:58:35', '2019-04-21 02:28:35'),
(18, 18, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 07:59:34', '2019-04-21 02:29:34'),
(19, 19, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 08:00:21', '2019-04-21 02:30:21'),
(20, 20, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 08:02:45', '2019-04-21 02:32:45'),
(21, 21, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 08:03:10', '2019-04-21 02:33:10'),
(22, 22, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 08:03:52', '2019-04-21 02:33:52'),
(23, 23, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 08:04:26', '2019-04-21 02:34:26'),
(24, 24, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 08:04:58', '2019-04-21 02:34:58'),
(25, 25, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 08:05:46', '2019-04-21 02:35:46'),
(26, 26, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 08:06:09', '2019-04-21 02:36:09'),
(27, 27, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 08:06:46', '2019-04-21 02:36:46'),
(28, 28, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 234, 1, '2019-04-21 08:21:29', '2019-04-21 02:51:29'),
(29, 29, 7, 7, 'L123', 'My Formal Shirt', 'L', 'green', 100, 1, '2019-04-21 08:23:02', '2019-04-21 02:53:02'),
(30, 30, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 250, 1, '2019-04-22 05:41:20', '2019-04-22 00:11:20'),
(31, 31, 7, 7, 'M123', 'My Formal Shirt', 'M', 'green', 250, 1, '2019-04-23 18:18:31', '2019-04-23 12:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `care` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_code`, `product_color`, `description`, `care`, `price`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 10, 'My T-Shirts Second', 'T1234', 'red', 'My T-Shirts Second', '', 200, '39884.jpg', 1, '2019-04-12 12:36:51', '2019-04-02 07:34:37'),
(3, 12, 'My T-Shirts Casual', 'T1235', 'Blue', 'My T-Shirts Casual', '', 400, '32697.jpg', 1, '2019-04-12 12:36:54', '2019-04-02 07:35:39'),
(4, 12, 'My T-Shirts Black Red', 'T1237', 'Red and Black', 'My T-Shirts Black Red', '', 350, '10377.jpg', 1, '2019-04-12 12:36:57', '2019-04-02 07:36:40'),
(5, 11, 'My Shoes', 'S123', 'black', 'My Shoes', '', 300, '96512.jpg', 1, '2019-04-12 12:37:00', '2019-04-02 11:41:16'),
(6, 11, 'My White Shoes', 'S1234', 'white', 'My White Shoes', '', 400, '19851.jpg', 1, '2019-04-12 12:37:02', '2019-04-02 11:41:49'),
(7, 15, 'My Formal Shirt', 'F123', 'green', 'My Formal Shirt', 'My Formal Shirt Material And Care', 234, '73422.jpg', 1, '2019-04-12 12:37:04', '2019-04-07 00:12:59'),
(8, 12, 'My Casual', 'MYS123', 'red', 'My Casual', 'My Casual', 500, '28126.jpg', 1, '2019-04-12 11:22:54', '2019-04-12 05:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `sku`, `size`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 7, 'L123', 'L', 100, 3, '2019-04-13 06:50:40', '2019-04-11 06:16:53'),
(2, 7, 'M123', 'M', 250, 10, '2019-04-11 11:46:54', '2019-04-11 06:16:54'),
(3, 7, 'XM12', 'XL', 500, 10, '2019-04-11 11:46:54', '2019-04-11 06:16:54'),
(4, 7, 'Small 123', 'Small', 250, 60, '2019-04-11 11:46:54', '2019-04-11 06:16:54'),
(5, 7, 'medium', 'L1', 400, 60, '2019-04-11 11:46:54', '2019-04-11 06:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(3, 7, '8327.jpg', '2019-04-07 08:37:34', '2019-04-07 03:07:34'),
(4, 7, '50929.jpg', '2019-04-07 08:37:35', '2019-04-07 03:07:35'),
(5, 7, '85924.jpg', '2019-04-08 12:51:49', '2019-04-08 07:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `password`, `admin`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sunil Kumar Bhaskar', '', '', '', '', '', '', 'sunilhrit143@gmail.com', '$2y$10$DprOoYCQhy6p5bzmeWQzxOuCpUnkHcM5vJfXUQTgF7/5fZD6de8XO', 1, 0, 'Vr5wuqIIHZtXkOVFd1GbYU8kZEj2xnweATwe3fNNWIIr9Lf7ZHYbjhSemtCR', '2019-03-17 04:01:01', '2019-04-18 07:32:33'),
(7, 'Sunil Kumar', 'Maliwara 610', 'Ghazibad', 'Uttra pradesh', 'India', '201002', '9910625707', 'sunilbhaskar.infotrench@gmail.com', '$2y$10$yiZ.z1BDoHgQeZz14NZFFuolKSZp7OKP9ZmURzUfPbC5Z472UkvBG', 0, 1, 'gQ31mTi0YCuQNPcLafAr8qzytI5KKhP0emYzv4LIZ7HQqdEhn8s9Vv3rioOq', '2019-04-17 07:25:09', '2019-04-23 12:48:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
