-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2017 at 05:28 PM
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
('member', 8, 1487783200),
('member', 10, 1488502577),
('member', 17, 1488503972),
('member', 18, 1488504076),
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
  `benf_first_name` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_middle_name` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_last_name` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
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
  `benf_local_address_line2` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_local_address_taluk` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_local_address_district` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_local_address_state` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_local_pincode` mediumint(9) DEFAULT NULL,
  `benf_prmt_address_line1` varchar(175) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_prmt_address_line2` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_prmt_address_taluk` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_prmt_address_district` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_prmt_address_state` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_prmt_address_pincode` mediumint(9) DEFAULT NULL,
  `employer_full_name` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `emplr_address_line1` varchar(175) COLLATE latin1_general_ci DEFAULT NULL,
  `emplr_address_line2` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `emplr_address_taluk` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `emplr_address_district` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `emplr_address_state` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
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
  `benf_acknowledgement_number` text COLLATE latin1_general_ci,
  `benf_registration_number` varchar(35) COLLATE latin1_general_ci DEFAULT NULL,
  `benf_registration_old_number` varchar(35) COLLATE latin1_general_ci DEFAULT NULL,
  `admin_comments` text COLLATE latin1_general_ci,
  `benf_identity_card_type` enum('EPIC','ADHAR','NPR') COLLATE latin1_general_ci DEFAULT NULL,
  `benf_identity_card_number` varchar(20) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `beneficiary_master`
--

INSERT INTO `beneficiary_master` (`id`, `benf_first_name`, `benf_middle_name`, `benf_last_name`, `benf_mobile_no`, `benf_alternate_mobile_no`, `benf_date_of_birth`, `beneficiary_age`, `benf_sex`, `nationality`, `benf_caste`, `benf_martial_status`, `benf_blood_group`, `benf_local_address_line1`, `benf_local_address_line2`, `benf_local_address_taluk`, `benf_local_address_district`, `benf_local_address_state`, `benf_local_pincode`, `benf_prmt_address_line1`, `benf_prmt_address_line2`, `benf_prmt_address_taluk`, `benf_prmt_address_district`, `benf_prmt_address_state`, `benf_prmt_address_pincode`, `employer_full_name`, `emplr_address_line1`, `emplr_address_line2`, `emplr_address_taluk`, `emplr_address_district`, `emplr_address_state`, `emplr_address_pincode`, `benf_nature_of_work`, `benf_date_of_employment`, `benf_wages_per_day`, `benf_wages_per_month`, `benf_bank_account_number`, `benf_bank_account_type`, `benf_bank_name`, `benf_bank_branch`, `benf_bank_ifsc`, `created_date`, `created_by_user_id`, `updated_date`, `updated_by_user_id`, `benf_application_status`, `benf_acknowledgement_number`, `benf_registration_number`, `benf_registration_old_number`, `admin_comments`, `benf_identity_card_type`, `benf_identity_card_number`) VALUES
(1, 'Sravan', 'Vanteru', 'Kumar', 8892233720, NULL, '1991-07-26', 25, 'MALE', 'INDIAN', 'General (Others)', 'SINGLE', 'A+', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Happiest Minds Techonologies', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'PLUMBING', '2014-02-07', 100, 3000, 2147483647, 'SAVINGS', 'ICIC Bank', 'ECity Bangalore', NULL, '2017-03-04 06:08:34', 4, '2017-03-04 06:09:18', 4, 'APPROVED', 'BNG000000001', '0000000001', '', 'Approved', 'EPIC', '213131313'),
(2, 'Sravan', 'Vanteru', 'Kumar', 8892233720, NULL, '1991-07-26', 25, 'MALE', 'INDIAN', 'General (Others)', 'SINGLE', 'A+', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Happiest Minds Techonologies', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'PLUMBING', '2014-02-07', 100, 3000, 2147483647, 'SAVINGS', 'ICIC Bank', 'ECity Bangalore', NULL, '2017-03-04 06:09:29', 4, '2017-03-04 06:17:49', 4, 'APPROVED', 'BNG000000002', '0000000002', '', 'approved', 'EPIC', '213131313'),
(3, 'Sravan', 'Test', 'Test', 8892233720, NULL, '1991-07-26', 25, 'MALE', 'INDIAN', 'General (Others)', 'SINGLE', 'A+', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Happiest Minds Techonologies', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'PLUMBING', '2014-02-07', 100, 3000, 2147483647, 'SAVINGS', 'ICIC Bank', 'ECity Bangalore', NULL, '2017-03-04 06:18:04', 4, '2017-03-04 06:18:17', 4, 'APPROVED', 'BNG000000003', '0000000003', '', 'asdad', 'EPIC', '213131313'),
(4, 'Nominee', 'Dependents', 'Dependents', 8892233720, NULL, '1991-07-26', 25, 'MALE', 'INDIAN', 'General (Others)', 'SINGLE', 'A+', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Happiest Minds Techonologies', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'PLUMBING', '2014-02-07', 100, 3000, 2147483647, 'SAVINGS', 'ICIC Bank', 'ECity Bangalore', NULL, '2017-03-04 09:18:48', 4, '2017-03-04 09:18:48', 4, 'DRAFT', 'BNG000000004', NULL, '', NULL, 'EPIC', '213131313'),
(5, 'Nominee Sravan', 'Dependents', 'Dependents', 8892233720, NULL, '1991-07-26', 25, 'MALE', 'INDIAN', 'General (Others)', 'SINGLE', 'A+', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Happiest Minds Techonologies', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'PLUMBING', '2014-02-07', 100, 3000, 2147483647, 'SAVINGS', 'ICIC Bank', 'ECity Bangalore', NULL, '2017-03-04 09:20:38', 4, '2017-03-04 09:20:38', 1, 'DRAFT', 'BNG000000005', NULL, '', NULL, 'EPIC', '213131313'),
(6, 'Sravan', 'Vanteru', 'Kumar', 8892233720, NULL, '1991-07-26', 25, 'MALE', 'INDIAN', 'General (Others)', 'SINGLE', 'A+', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Happiest Minds Techonologies', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'PLUMBING', '2014-02-07', 100, 3000, 2147483647, 'SAVINGS', 'ICIC Bank', 'ECity Bangalore', NULL, '2017-03-04 09:23:03', 4, '2017-03-04 09:23:03', 4, 'DRAFT', 'BNG000000006', NULL, '', NULL, 'EPIC', '213131313'),
(7, 'Sravan', 'Vanteru', 'Kumar', 8892233720, NULL, '1991-07-26', 25, 'MALE', 'INDIAN', 'General (Others)', 'SINGLE', 'A+', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Happiest Minds Techonologies', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'PLUMBING', '2014-02-07', 100, 3000, 2147483647, 'SAVINGS', 'ICIC Bank', 'ECity Bangalore', NULL, '2017-03-04 09:30:49', 4, '2017-03-04 09:30:49', 4, 'DRAFT', 'BNG000000007', NULL, '', NULL, 'EPIC', '213131313'),
(8, 'Sravan', 'Vanteru', 'Kumar', 8892233720, NULL, '1991-07-26', 25, 'MALE', 'INDIAN', 'General (Others)', 'SINGLE', 'A+', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Happiest Minds Techonologies', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'PLUMBING', '2014-02-07', 100, 3000, 2147483647, 'SAVINGS', 'ICIC Bank', 'ECity Bangalore', NULL, '2017-03-04 09:37:00', 4, '2017-03-04 09:37:00', 4, 'DRAFT', 'BNG000000008', NULL, '', NULL, 'EPIC', '213131313'),
(9, 'Sravan', 'Vanteru', 'Kumar', 8892233720, NULL, '1991-07-26', 25, 'MALE', 'INDIAN', 'General (Others)', 'SINGLE', 'A+', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Happiest Minds Techonologies', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'PLUMBING', '2014-02-07', 100, 3000, 2147483647, 'SAVINGS', 'ICIC Bank', 'ECity Bangalore', NULL, '2017-03-04 09:40:03', 4, '2017-03-04 09:40:03', 4, 'DRAFT', 'BNG000000009', NULL, '', NULL, 'EPIC', '213131313'),
(10, 'Sravan', 'Kumar', 'Kumar', 8892233720, NULL, '1991-07-26', 25, 'MALE', 'INDIAN', 'General (Others)', 'SINGLE', 'A+', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Happiest Minds Techonologies', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'PLUMBING', '2014-02-07', 100, 3000, 2147483647, 'SAVINGS', 'ICIC Bank', 'ECity Bangalore', NULL, '2017-03-05 03:47:41', 1, '2017-03-06 18:05:15', 1, 'DRAFT', 'BNG000000010', NULL, '', NULL, 'EPIC', '213131313'),
(11, 'Sravan', 'Vanteru', 'Kumar', 8892233720, NULL, '1991-07-26', 25, 'MALE', 'INDIAN', 'General (Others)', 'SINGLE', 'A+', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Happiest Minds Techonologies', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'PLUMBING', '2014-02-07', 100, 3000, 2147483647, 'SAVINGS', 'ICIC Bank', 'ECity Bangalore', NULL, '2017-03-05 03:58:58', 1, '2017-03-05 04:06:31', 1, 'APPROVED', 'BNG000000011', '0000000004', '', '', 'EPIC', '213131313'),
(12, 'Sravan', 'Vanteru', 'Kumar', 8892233720, NULL, '1991-07-26', 25, 'MALE', 'INDIAN', 'General (Others)', 'SINGLE', 'A+', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Happiest Minds Techonologies', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'PLUMBING', '2014-02-07', 100, 3000, 2147483647, 'SAVINGS', 'ICIC Bank', 'ECity Bangalore', NULL, '2017-03-05 04:07:02', 1, '2017-03-05 04:07:34', 1, 'REJECTED', 'BNG000000012', '0000000005', '', 'Hiii', 'EPIC', '213131313'),
(13, 'SSSSS', 'KKKKK', 'RRRRR', 8892233720, NULL, '1991-07-26', 25, 'MALE', 'INDIAN', 'General (Others)', 'SINGLE', 'A+', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Happiest Minds Techonologies', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'PLUMBING', '2014-02-07', 100, 3000, 2147483647, 'SAVINGS', 'ICIC Bank', 'ECity Bangalore', NULL, '2017-03-06 18:19:23', 1, '2017-03-13 04:37:46', 1, 'APPROVED', 'BNG000000013', '0000000007', '', 'Ok Boss It''s Approved !!', 'EPIC', '213131313'),
(14, 'Sravan', 'Vanteru', 'Kumar', 8892233720, NULL, '1991-07-26', 25, 'MALE', 'INDIAN', 'General (Others)', 'SINGLE', 'A+', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'Happiest Minds Techonologies', 'Bangalore', 'Bangalore', 'Bangalore North', 'Bangalore', 'KARNATAKA', 560037, 'PLUMBING', '2014-02-07', 100, 3000, 2147483647, 'SAVINGS', 'ICIC Bank', 'ECity Bangalore', NULL, '2017-03-13 10:47:22', 1, '2017-03-13 10:47:22', 1, 'DRAFT', 'BNG000000014', NULL, '', NULL, 'EPIC', '213131313');

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

--
-- Dumping data for table `benf_dependents`
--

INSERT INTO `benf_dependents` (`id`, `benf_master_id`, `depnt_full_name`, `depnt_address`, `depnt_age`, `depnt_dob`, `depnt_relationship_with_benf`, `last_updated_by_user_id`, `last_updated_time`) VALUES
(1, 8, 'dependen', 'dependen', 34, '1983-03-04', 'dependen', 4, '2017-03-04 09:37:21'),
(2, 8, 'Satheesh Kumar', 'Marathahalli', 34, '1983-03-04', 'dependen', 4, '2017-03-04 09:37:49'),
(3, 8, 'Satheesh Kumar', 'Marathahalli', 34, '1983-03-04', 'dependen', 4, '2017-03-04 09:38:19'),
(4, 9, 'pk', 'pk, Bangalore', 27, '1990-03-04', 'pk', 4, '2017-03-04 09:40:29');

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
  `emp_union_full_name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `emp_union_branch_address` text COLLATE latin1_general_ci NOT NULL,
  `emp_union-address` text COLLATE latin1_general_ci NOT NULL,
  `last_updated_by_user_id` bigint(20) NOT NULL,
  `last_updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `benf_emp_work_details`
--

CREATE TABLE `benf_emp_work_details` (
  `id` bigint(20) NOT NULL,
  `benf_emp_certificate_id` bigint(20) NOT NULL,
  `work_start_date` date NOT NULL,
  `work_end_date` date NOT NULL,
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

--
-- Dumping data for table `benf_nominee`
--

INSERT INTO `benf_nominee` (`id`, `benf_master_id`, `nominee_full_name`, `nominee_address`, `nominee_age`, `nominee_dob`, `nominee_share`, `nominee_relationship_with_benf`, `last_updated_by_user_id`, `last_updated_time`) VALUES
(1, 113, 'jbjbk', 'jnknjknkjn', 25, '1992-03-04', 100, 'bjbj', 3, '2017-03-04 01:13:36'),
(2, 4, 'Sravan', 'Bangalore', 23, '1994-03-04', 100, 'me', 4, '2017-03-04 09:19:38'),
(3, 5, 'Jaffa Testing', 'Jaffa Testing', 39, '1978-03-04', 100, 'Jaffa Testing', 1, '2017-03-04 09:21:11'),
(4, 6, 'Biryanai', 'Biryanai, Bangalore', 34, '1983-03-04', 100, 'Jaffa Biryanai', 4, '2017-03-04 09:23:27'),
(5, 7, 'Vanteru Sravan', 'Bangalore', 56, '1961-03-04', 100, 'aaaaaaa SS', 4, '2017-03-04 09:31:11'),
(6, 8, 'Satheesh Kumar', 'Satheesh Kumar', 34, '1983-03-04', 100, 'dependen', 4, '2017-03-04 09:37:21'),
(7, 9, 'pk', 'pk', 23, '1994-03-04', 100, 'pk', 4, '2017-03-04 09:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `benf_payments`
--

CREATE TABLE `benf_payments` (
  `id` int(11) NOT NULL,
  `benf_master_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_of_payment` date NOT NULL,
  `notes` text,
  `created_by_user_id` int(11) NOT NULL,
  `updated_by_user_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benf_payments`
--

INSERT INTO `benf_payments` (`id`, `benf_master_id`, `amount`, `date_of_payment`, `notes`, `created_by_user_id`, `updated_by_user_id`, `created_date`, `updated_date`) VALUES
(1, 13, 1016, '2017-03-06', 'hohijoiojoi', 1, 1, '2017-03-13 09:19:00', '2017-03-13 09:19:00'),
(2, 13, 1000, '2017-03-01', 'Yes 2nd payment success', 1, 1, '2017-03-13 09:21:31', '2017-03-13 09:21:31'),
(3, 13, 555, '2017-03-08', 'Hii', 1, 1, '2017-03-13 10:08:26', '2017-03-13 10:08:26'),
(4, 13, 1234, '2017-02-01', 'paid', 1, 1, '2017-03-13 10:08:59', '2017-03-13 10:08:59'),
(5, 13, 505, '2017-03-08', 'with tax', 1, 1, '2017-03-13 10:09:14', '2017-03-13 10:09:14'),
(6, 13, 2999, '2017-03-08', NULL, 1, 1, '2017-03-13 10:14:26', '2017-03-13 10:14:26'),
(7, 13, 2700, '2017-03-03', NULL, 1, 1, '2017-03-13 10:21:53', '2017-03-13 10:21:53');

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
('0ch79ugjhc7jtjbk20kbogf0u1', 1488606159, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a313b),
('99202bk847ic8qauk7q3r2age3', 1488620376, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a343b),
('9il7fqpgk100vdvsai8dhj3d25', 1488620376, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a343b),
('9qdj2lod3fho2clijqj46c2gb3', 1488338576, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a343b),
('cgd25g8dm5sk7pl0jl0ud7iov0', 1488600905, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a333b),
('ea9iut8hhrneejlsebrmbmhb50', 1489405203, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a313b),
('hf6sepsggti24b4u6pd89pskq5', 1488600905, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a333b),
('jda22m3u2ahcvb8gho0n55d1b3', 1488606160, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a313b),
('kmjshdmcmgu7rodcno9kasa122', 1488600905, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a333b),
('nhdfp84dcmg57u29pur5ocntv6', 1488620376, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a343b),
('nov7fnjvoe44bpio9fvqu1uj24', 1488899569, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a313b),
('smcrdkp7918dfqd6kjcfodg8g1', 1488472622, 0x5f5f666c6173687c613a303a7b7d);

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
(3, 'sravan', 'sravan@sravan.com', NULL, 'Bangalore South', '$2y$13$/TtC89z0b7qmOF.ReSwYl.BLWsRmniw1DUUJnp7F/YFGMpHWoRglS', 10, 'hblrgv2kGfg4oQvsjBt2ZVi5OAE0dBiO', NULL, NULL, 1487051249, 1487347143),
(4, 'prashanth', 'prashanth100@gmail.com', NULL, 'Bangalore North', '$2y$13$6nGKmP85dqBVXkci2qB8VOM4ZP2WVwkl1qYzlYWDGhgcwh.rnGJ6G', 10, '03NqoZdpsGz2v3wgAhjgAd7NvPprdq48', NULL, NULL, 1487347713, 1488037061);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `benf_attachments`
--
ALTER TABLE `benf_attachments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `benf_dependents`
--
ALTER TABLE `benf_dependents`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `benf_nominee`
--
ALTER TABLE `benf_nominee`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `benf_payments`
--
ALTER TABLE `benf_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
