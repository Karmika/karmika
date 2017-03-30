-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2017 at 06:30 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karmika`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', 3, 1487051249),
('admin', 4, 1487347713),
('member', 2, 1486984733),
('member', 5, 1489489922),
('member', 6, 1490419100),
('member', 8, 1487783200),
('member', 10, 1488502577),
('member', 17, 1488503972),
('member', 18, 1488504076),
('subAdmin', 7, NULL),
('theCreator', 1, 1486804995);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Administrator of this application', NULL, NULL, 1486799475, 1486799475),
('adminArticle', 2, 'Allows admin+ roles to manage articles', NULL, NULL, 1486799475, 1486799475),
('createArticle', 2, 'Allows editor+ roles to create articles', NULL, NULL, 1486799475, 1486799475),
('deleteArticle', 2, 'Allows admin+ roles to delete articles', NULL, NULL, 1486799475, 1486799475),
('editor', 2, 'Editor of this application', NULL, NULL, 1486799475, 1486799475),
('manageUsers', 2, 'Allows admin+ roles to manage users', NULL, NULL, 1486799475, 1486799475),
('member', 1, 'Registered users, members of this site', NULL, NULL, 1486799475, 1486799475),
('premium', 2, 'Premium members. They have more permissions than normal members', NULL, NULL, 1486799475, 1486799475),
('subAdmin', 1, 'Sub-administrator is an administrator on a account with limited authority to approve and deny', NULL, NULL, 1486799475, 1486799475),
('support', 2, 'Support staff', NULL, NULL, 1486799475, 1486799475),
('theCreator', 1, 'You!', NULL, NULL, 1486799475, 1486799475),
('updateArticle', 2, 'Allows editor+ roles to update articles', NULL, NULL, 1486799475, 1486799475),
('updateOwnArticle', 2, 'Update own article', 'isAuthor', NULL, 1486799475, 1486799475),
('usePremiumContent', 2, 'Allows premium+ roles to use premium content', NULL, NULL, 1486799475, 1486799475);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'deleteArticle'),
('admin', 'editor'),
('admin', 'manageUsers'),
('admin', 'updateArticle'),
('editor', 'adminArticle'),
('editor', 'createArticle'),
('editor', 'support'),
('editor', 'updateOwnArticle'),
('premium', 'usePremiumContent'),
('support', 'member'),
('support', 'premium'),
('theCreator', 'admin'),
('updateOwnArticle', 'updateArticle');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isAuthor', 'O:28:"common\\rbac\\rules\\AuthorRule":3:{s:4:"name";s:8:"isAuthor";s:9:"createdAt";i:1486799475;s:9:"updatedAt";i:1486799475;}', 1486799475, 1486799475);

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_master`
--

CREATE TABLE `beneficiary_master` (
  `id` int(11) NOT NULL,
  `benf_first_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_middle_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_last_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_mobile_no` bigint(10) DEFAULT NULL,
  `benf_alternate_mobile_no` bigint(11) DEFAULT NULL,
  `benf_date_of_birth` date DEFAULT NULL,
  `beneficiary_age` int(2) DEFAULT NULL,
  `benf_sex` enum('MALE','FEMALE','OTHERS','') COLLATE latin1_general_ci DEFAULT NULL,
  `nationality` varchar(25) COLLATE latin1_general_ci DEFAULT 'INDIAN',
  `benf_caste` enum('Schedule Caste (SC)','Schedule Tribe (ST)','Other Backward Caste (OBC)','General (Others)') COLLATE latin1_general_ci DEFAULT NULL,
  `benf_martial_status` enum('SINGLE','MARRIED','Widowed','Divorced / Separated') COLLATE latin1_general_ci DEFAULT NULL,
  `benf_blood_group` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') COLLATE latin1_general_ci DEFAULT NULL,
  `benf_local_address_line1` varchar(175) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_local_address_line2` varchar(175) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_local_address_taluk` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_local_address_district` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_local_address_state` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_local_pincode` mediumint(9) DEFAULT NULL,
  `benf_prmt_address_line1` varchar(175) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_prmt_address_line2` varchar(175) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_prmt_address_taluk` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_prmt_address_district` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_prmt_address_state` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_prmt_address_pincode` mediumint(9) DEFAULT NULL,
  `employer_full_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `emplr_address_line1` varchar(175) COLLATE latin1_general_ci DEFAULT NULL,
  `emplr_address_line2` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `emplr_address_taluk` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `emplr_address_district` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `emplr_address_state` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `emplr_address_pincode` mediumint(9) DEFAULT NULL,
  `benf_nature_of_work` enum('MASON','BARBENDING','CARPENTRY','ELECTRICIAN','CENTRING','HELPER','PLUMBING','OTHERS') COLLATE latin1_general_ci DEFAULT NULL,
  `benf_date_of_employment` date DEFAULT NULL,
  `benf_wages_per_day` int(11) DEFAULT NULL,
  `benf_wages_per_month` int(11) DEFAULT NULL,
  `benf_bank_account_number` int(11) DEFAULT NULL,
  `benf_bank_account_type` enum('SAVINGS','JAN-DAN','CURRENT','') COLLATE latin1_general_ci DEFAULT NULL,
  `benf_bank_name` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_bank_branch` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_bank_ifsc` varchar(16) COLLATE latin1_general_ci DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by_user_id` int(11) NOT NULL,
  `benf_application_status` text COLLATE latin1_general_ci,
  `benf_application_number` varchar(35) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_acknowledgement_number` varchar(35) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_registration_number` varchar(35) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_registration_old_number` varchar(35) COLLATE latin1_general_ci DEFAULT NULL,
  `admin_comments` text COLLATE latin1_general_ci,
  `benf_identity_card_type` enum('EPIC','ADHAR','NPR') COLLATE latin1_general_ci DEFAULT NULL,
  `benf_identity_card_number` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `applied_date` datetime DEFAULT NULL,
  `accepted_date` datetime DEFAULT NULL,
  `approved_or_rejected_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `benf_attachments`
--

CREATE TABLE `benf_attachments` (
  `id` bigint(20) NOT NULL,
  `benf_master_id` bigint(20) NOT NULL,
  `attachment_type` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `attachment_name` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `attachment` blob NOT NULL,
  `last_updated_by_user_id` bigint(20) NOT NULL,
  `last_updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `benf_dependents`
--

CREATE TABLE `benf_dependents` (
  `id` bigint(20) NOT NULL,
  `benf_master_id` bigint(20) NOT NULL,
  `depnt_full_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `depnt_address` text COLLATE latin1_general_ci NOT NULL,
  `depnt_age` int(11) NOT NULL,
  `depnt_dob` date NOT NULL,
  `depnt_relationship_with_benf` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `last_updated_by_user_id` bigint(20) NOT NULL,
  `last_updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `benf_emp_certificate`
--

CREATE TABLE `benf_emp_certificate` (
  `id` bigint(20) NOT NULL,
  `benf_master_id` bigint(20) NOT NULL,
  `benf_employer_full_name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `benf_present_work_address` text COLLATE latin1_general_ci NOT NULL,
  `benf_present_project_name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `emp_union_full_name` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `emp_union_branch_address` text COLLATE latin1_general_ci,
  `benf_work_start_date` date DEFAULT NULL,
  `benf_work_end_date` date DEFAULT NULL,
  `emp_union_address` text COLLATE latin1_general_ci,
  `last_updated_by_user_id` bigint(20) NOT NULL,
  `last_updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `benf_nominee`
--

CREATE TABLE `benf_nominee` (
  `id` bigint(20) NOT NULL,
  `benf_master_id` bigint(20) NOT NULL,
  `nominee_full_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nominee_address` text COLLATE latin1_general_ci NOT NULL,
  `nominee_age` int(11) NOT NULL,
  `nominee_dob` date NOT NULL,
  `nominee_share` tinyint(4) NOT NULL,
  `nominee_relationship_with_benf` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `last_updated_by_user_id` bigint(20) NOT NULL,
  `last_updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `benf_payments`
--

CREATE TABLE `benf_payments` (
  `id` int(11) NOT NULL,
  `benf_master_id` int(11) NOT NULL,
  `payment_reference_id` int(11) DEFAULT NULL,
  `payment_mode` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `amount` bigint(32) DEFAULT NULL,
  `payment_for` int(11) DEFAULT NULL,
  `chequeordd_no` varchar(64) DEFAULT NULL,
  `bank_name` varchar(32) DEFAULT NULL,
  `ifsc_code` varchar(20) DEFAULT NULL,
  `notes` text,
  `created_by_user_id` int(11) NOT NULL,
  `updated_by_user_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `parent_location_id` int(11) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `parent_location_id`, `location`) VALUES
(1, NULL, 'Bagalkot'),
(2, NULL, 'Belagavi'),
(3, NULL, 'Vijayapura'),
(4, NULL, 'Dharwad'),
(5, NULL, 'Gadag'),
(6, NULL, 'Haveri'),
(7, NULL, 'Uttara Kannada'),
(8, NULL, 'Bengaluru Urban'),
(9, NULL, 'Bengaluru Rural'),
(10, NULL, 'Chikkaballapur'),
(11, NULL, 'Chitradurga'),
(12, NULL, 'Davanagere'),
(13, NULL, 'Kolar'),
(14, NULL, 'Ramanagara'),
(15, NULL, 'Shivamogga'),
(16, NULL, 'Tumakuru'),
(17, NULL, 'Ballari'),
(18, NULL, 'Bidar'),
(19, NULL, 'Kalaburagi'),
(20, NULL, 'Koppal'),
(21, NULL, 'Raichur'),
(22, NULL, 'Yadgir'),
(23, NULL, 'Chamarajanagar'),
(24, NULL, 'Chikkamagaluru'),
(25, NULL, 'Dakshina Kannada'),
(26, NULL, 'Hassan'),
(27, NULL, 'Kodagu'),
(28, NULL, 'Mandya'),
(29, NULL, 'Mysuru'),
(30, NULL, 'Udupi'),
(31, 9, 'Krishnarajapura'),
(32, 9, 'Bangalore North'),
(33, 9, 'Anekal'),
(34, 9, 'Bangalore South');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1486797988),
('m141022_115823_create_user_table', 1486797990),
('m141022_115912_create_rbac_tables', 1486797991),
('m141022_115922_create_session_table', 1486797991),
('m150104_153617_create_article_table', 1486797991),
('m170211_070818_create_news_table', 1486797991);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `selection_seed_data`
--

CREATE TABLE `selection_seed_data` (
  `id` int(11) UNSIGNED NOT NULL,
  `entity_type` varchar(45) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `entity_value` varchar(150) DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selection_seed_data`
--

INSERT INTO `selection_seed_data` (`id`, `entity_type`, `entity_id`, `entity_value`, `created_datetime`, `updated_datetime`, `updated_by`) VALUES
(1, 'subscription_duration', 1, '1 Year', '2016-04-29 23:14:30', '2016-04-19 08:05:05', NULL),
(2, 'subscription_duration', 2, '3 Years', '2016-04-29 23:14:30', '2016-04-19 08:05:05', NULL),
(3, 'subscription_duration', 3, '5 Years', '2016-04-29 23:14:30', '2016-04-19 08:05:05', NULL),
(4, 'subscription_duration', 4, '10 Years', '2016-04-29 23:14:30', '2016-04-19 08:05:05', NULL),
(5, 'subscription_duration', 5, '20 Years', '2016-04-29 23:14:30', '2016-04-19 08:05:05', NULL),
(6, 'subscription_duration', 0, 'Life', '2016-04-29 23:14:30', '2016-04-19 08:05:05', NULL),
(8, 'payment_mode', 1, 'Challan', '2016-04-29 23:14:30', '2017-03-28 00:52:17', NULL),
(9, 'payment_mode', 2, 'DD', '2016-04-29 23:14:30', '2017-03-28 00:51:53', NULL),
(13, 'payment_status', 1, 'Received', '2016-04-29 23:14:30', '2016-04-19 08:22:31', NULL),
(14, 'payment_status', 2, 'Paid', '2016-04-29 23:14:30', '2016-04-19 08:22:31', NULL),
(15, 'payment_status', 3, 'Cancelled', '2016-04-29 23:14:30', '2016-04-19 08:22:31', NULL),
(16, 'payment_for', 1, 'Subscription', '2016-04-29 23:14:30', '2016-04-19 08:29:10', NULL),
(17, 'payment_for', 2, 'Application Fee', '2016-04-29 23:14:30', '2016-04-19 08:29:10', NULL),
(18, 'payment_for', 3, 'Late Payment Fee', '2016-04-29 23:14:30', '2016-04-19 08:29:10', NULL),
(19, 'payment_for', 4, 'Others', '2016-04-29 23:14:30', '2016-04-19 08:29:10', NULL),
(20, 'rejection_reason', 1, 'The data provided is not valid', '2017-03-27 23:38:50', '2017-03-28 00:05:37', NULL),
(21, 'rejection_reason', 2, 'Not eligible to apply', '2017-03-27 23:38:50', '2017-03-28 00:05:44', NULL),
(22, 'rejection_reason', 3, 'Other Reason', '2017-03-27 23:38:50', '2017-03-28 00:05:40', NULL),
(23, 'payment_mode', 3, 'NEFT', '2016-04-29 23:14:30', '2017-03-28 00:53:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `expire` int(11) NOT NULL,
  `data` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `expire`, `data`) VALUES
('3iaqn9potd71bo636cdcq6c5v1', 1490849338, 0x5f5f666c6173687c613a303a7b7d5f5f72657475726e55726c7c733a32363a222f6b61726d696b612f62656e65666963696172792f696e646578223b5f5f69647c693a313b),
('a7ai7s81id3d7kl364dro9hg26', 1490701031, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a343b),
('bctfvu818c6to01vbept3m5086', 1490701031, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a343b),
('fbcgptetno6c00pffarks8akg5', 1490701031, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a343b),
('g0l9n5j9t73u5kfok1eti7hp12', 1490694320, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a343b),
('k55odq1gfsjq1tp0dt8edn7vj0', 1490701031, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a343b),
('os4qn86v7hsckp3danstl9rq52', 1490516987, 0x5f5f666c6173687c613a303a7b7d5f5f72657475726e55726c7c733a32363a222f6b61726d696b612f62656e65666963696172792f696e646578223b5f5f69647c693a313b);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_activation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `mobile`, `location`, `password_hash`, `status`, `auth_key`, `password_reset_token`, `account_activation_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'sravan.vanteru@gmail.com', NULL, NULL, '$2y$13$XrAQa1pKdeKMzeO3Zb8ojetshkajpmDjJnOP0mF74oc94Ok2E6EC2', 10, 'fCVnB_lk4CpmN-gBqKYarK_koxnheAkW', 'L3Sy05jwVbLYWxnDR6Rueivvae1mxwjE_1488023153', NULL, 1486804995, 1488023153),
(3, 'sravan', 'sravan@sravan.com', NULL, 'Bangalore South', '$2y$13$/TtC89z0b7qmOF.ReSwYl.BLWsRmniw1DUUJnp7F/YFGMpHWoRglS', 10, 'hblrgv2kGfg4oQvsjBt2ZVi5OAE0dBiO', NULL, NULL, 1487051249, 1490846969),
(4, 'prashanth', 'prashanth100@gmail.com', NULL, 'Bangalore North', '$2y$13$6nGKmP85dqBVXkci2qB8VOM4ZP2WVwkl1qYzlYWDGhgcwh.rnGJ6G', 10, '03NqoZdpsGz2v3wgAhjgAd7NvPprdq48', NULL, NULL, 1487347713, 1490846949),
(5, 'test', 'test@best.com', '', NULL, '$2y$13$hgQqcSNimfbUYV7PDEa9SO5mJT24o8uTbS/ZxZo4Az.q7CbWm5wxy', 10, 'qTCcl2dxj63-KBeZoAGZF6DoNV0r5BJG', NULL, NULL, 1489489922, 1489489922),
(6, 'kumar', '', '123456', NULL, '$2y$13$M3EyTyuhMH6ce3xd6fxzQOymNEjofgp3ezMOdwxt3x8kmH9KBRW5y', 10, 'TTl0BaQCM4FXyNJqktULNBzkGD1fgq5-', NULL, NULL, 1490419100, 1490419100),
(7, 'Reddy', '', NULL, '2', '$2y$13$ptGnPKZoSRmiwjRNDR8IMenltstVF3BOS1aRD.N/uwlS/PMdrzYgi', 10, 'bASRP19gQAyfdxcGcD_MvIz1GZYluad7', NULL, NULL, 1490515421, 1490809209);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `beneficiary_master`
--
ALTER TABLE `beneficiary_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `benf_registration_number` (`benf_registration_number`,`benf_registration_old_number`);

--
-- Indexes for table `benf_attachments`
--
ALTER TABLE `benf_attachments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `benf_dependents`
--
ALTER TABLE `benf_dependents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `benf_emp_certificate`
--
ALTER TABLE `benf_emp_certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benf_nominee`
--
ALTER TABLE `benf_nominee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benf_payments`
--
ALTER TABLE `benf_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selection_seed_data`
--
ALTER TABLE `selection_seed_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `beneficiary_master`
--
ALTER TABLE `beneficiary_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `benf_attachments`
--
ALTER TABLE `benf_attachments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `benf_dependents`
--
ALTER TABLE `benf_dependents`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `benf_emp_certificate`
--
ALTER TABLE `benf_emp_certificate`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `benf_nominee`
--
ALTER TABLE `benf_nominee`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `benf_payments`
--
ALTER TABLE `benf_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `selection_seed_data`
--
ALTER TABLE `selection_seed_data`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
