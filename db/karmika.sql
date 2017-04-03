-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2017 at 10:32 AM
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
(174, 1, 'Bagalkote'),
(175, 1, 'Jamkhandi'),
(176, 1, 'Mudhool'),
(177, 1, 'Badami'),
(178, 1, 'Bilagi'),
(179, 1, 'Hungund'),
(180, 1, 'Ilkal'),
(181, 1, 'Rabkavi Banhatti'),
(182, 1, 'Guledgudda'),
(183, 2, 'Athani'),
(184, 2, 'Bailahongal'),
(185, 2, 'Belagaum'),
(186, 2, 'Chikodi'),
(187, 2, 'Gokak'),
(188, 2, 'Hukkeri'),
(189, 2, 'Khanapur'),
(190, 2, 'Ramdurg'),
(191, 2, 'Raybag'),
(192, 2, 'Saundatti'),
(193, 2, 'Kittur'),
(194, 2, 'Nipani'),
(195, 2, 'Mudalgi'),
(196, 2, 'Kagawad'),
(197, 3, 'Bijapur'),
(198, 3, 'Basavan Bagevadi'),
(199, 3, 'Indi'),
(200, 3, 'Sindagi'),
(201, 3, 'Talikota'),
(202, 3, 'Chadchan'),
(203, 3, 'Devar Hipparagi'),
(204, 3, 'Kolhar'),
(205, 3, 'Nidagundi'),
(206, 3, 'Babaleshwar'),
(207, 3, 'Tikota'),
(208, 4, 'Kalghatgi'),
(209, 4, 'Dharwad'),
(210, 4, 'Hubli'),
(211, 4, 'Hubli city'),
(212, 4, 'Kundgol'),
(213, 4, 'Navalgund'),
(214, 4, 'Alnavar'),
(215, 4, 'Annigeri'),
(216, 5, 'Gadag-Betigeri'),
(217, 5, 'Nargund'),
(218, 5, 'Mundargi'),
(219, 5, 'Ron'),
(220, 5, 'Shirahatti'),
(221, 6, 'Ranibennur'),
(222, 6, 'Byadgi'),
(223, 6, 'Hangal'),
(224, 6, 'Haveri'),
(225, 6, 'Savanur'),
(226, 6, 'Hirekerur'),
(227, 6, 'Shiggaon'),
(228, 7, 'Karwar'),
(229, 7, 'Sirsi'),
(230, 7, 'Joida'),
(231, 7, 'Dandeli'),
(232, 7, 'Bhatkal'),
(233, 7, 'Kumta'),
(234, 7, 'Ankola'),
(235, 7, 'Haliyal'),
(236, 7, 'Honavar'),
(237, 7, 'Mundgod'),
(238, 7, 'Siddapur'),
(239, 7, 'Yellapur'),
(240, 8, 'Anekal'),
(241, 8, 'Bangalore South'),
(242, 8, 'Bangalore North'),
(243, 8, 'Bengaluru East'),
(244, 9, 'Doddaballapura'),
(245, 9, 'Devanhalli'),
(246, 9, 'Hosakote'),
(247, 9, 'Nelmangala'),
(248, 10, 'Chikkaballapur'),
(249, 10, 'Bagepalli'),
(250, 10, 'Chintamani'),
(251, 10, 'Gauribidanur'),
(252, 10, 'Gudibanda'),
(253, 10, 'Sidlaghatta'),
(254, 11, 'Chitradurga'),
(255, 11, 'Challakere'),
(256, 11, 'Hiriyur'),
(257, 11, 'Holalkere'),
(258, 11, 'Hosdurga'),
(259, 11, 'Molakalmuru'),
(260, 12, 'Davanagere'),
(261, 12, 'Harihar'),
(262, 12, 'Channagiri'),
(263, 12, 'Harpanahalli'),
(264, 12, 'Honnali'),
(265, 12, 'Jagalur'),
(266, 13, 'Kolar'),
(267, 13, 'Bangarapet'),
(268, 13, 'Malur'),
(269, 13, 'Mulbagal'),
(270, 13, 'Srinivaspur'),
(271, 14, 'Ramanagara'),
(272, 14, 'Magadi'),
(273, 14, 'Kanakapura'),
(274, 14, 'Channapatna'),
(275, 15, 'Sagar'),
(276, 15, 'Shimoga'),
(277, 15, 'Bhadravati'),
(278, 15, 'Hosanagara'),
(279, 15, 'Shikaripura'),
(280, 15, 'Sorab'),
(281, 15, 'Tirthahalli'),
(282, 16, 'Tumkuru'),
(283, 16, 'Chiknayakanhalli'),
(284, 16, 'Kunigal'),
(285, 16, 'Madhugiri'),
(286, 16, 'Sira'),
(287, 16, 'Tiptur'),
(288, 16, 'Gubbi'),
(289, 16, 'Koratagere'),
(290, 16, 'Pavagada'),
(291, 16, 'Turuvekere'),
(292, 17, 'Bellary'),
(293, 17, 'Hospet'),
(294, 17, 'Hoovina Hadagalli'),
(295, 17, 'Hagaribommanahalli'),
(296, 17, 'Kudligi'),
(297, 17, 'Sanduru'),
(298, 17, 'Siruguppa'),
(299, 17, 'Kotturu'),
(300, 17, 'Kampli'),
(301, 17, 'Kurugodu'),
(302, 18, 'Aurad'),
(303, 18, 'Basavakalyan'),
(304, 18, 'Bidar'),
(305, 18, 'Bhalki'),
(306, 18, 'Homnabad'),
(307, 18, 'Chitgoppa'),
(308, 18, 'Kamalnagar'),
(309, 19, 'Gulbarga'),
(310, 19, 'Afzalpur'),
(311, 19, 'Aland'),
(312, 19, 'Chincholi'),
(313, 19, 'Chitapur'),
(314, 19, 'Jevargi'),
(315, 19, 'Sedam'),
(316, 20, 'Gangawati'),
(317, 20, 'Koppal'),
(318, 20, 'Kushtagi'),
(319, 20, 'Yelbarga'),
(320, 21, 'Raichur'),
(321, 21, 'Manvi'),
(322, 21, 'Sindhnur'),
(323, 21, 'Devadurga'),
(324, 21, 'Lingsugur'),
(325, 21, 'Sirwar'),
(326, 21, 'Maski'),
(327, 22, 'Yadgir'),
(328, 22, 'Shahpur'),
(329, 22, 'Shorapur'),
(330, 23, 'Chamrajnagar'),
(331, 23, 'Gundlupet'),
(332, 23, 'Kollegal'),
(333, 23, 'Yelandur'),
(334, 23, 'Hanur'),
(335, 24, 'Chikmagalur'),
(336, 24, 'Kadur'),
(337, 24, 'Koppa'),
(338, 24, 'Mudigere'),
(339, 24, 'Narasimharajapura'),
(340, 24, 'Sringeri'),
(341, 24, 'Tarikere'),
(342, 25, 'Mangalore'),
(343, 25, 'Ullal'),
(344, 25, 'Kotekar'),
(345, 25, 'Mulki'),
(346, 25, 'Puttur'),
(347, 25, 'Bantwal'),
(348, 25, 'Sulya'),
(349, 25, 'Moodbidri'),
(350, 26, 'Hassan'),
(351, 26, 'Arsikere'),
(352, 26, 'Channarayapattana'),
(353, 26, 'Holenarsipur'),
(354, 26, 'Sakleshpur'),
(355, 26, 'Alur'),
(356, 26, 'Arkalgud'),
(357, 26, 'Belur'),
(358, 27, 'Madikeri'),
(359, 27, 'Somvarpet'),
(360, 27, 'Virajpet'),
(361, 28, 'Mandya'),
(362, 28, 'Maddur'),
(363, 28, 'Malavalli'),
(364, 28, 'Shrirangapattana'),
(365, 28, 'Krishnarajpet'),
(366, 28, 'Nagamangala'),
(367, 28, 'Pandavapura'),
(368, 29, 'Mysuru'),
(369, 29, 'Hunsur'),
(370, 29, 'Krishnarajanagar'),
(371, 29, 'Nanjangud'),
(372, 29, 'Heggadadevanakote'),
(373, 29, 'Piriyapatna'),
(374, 29, 'Tirumakudalu Narasipura'),
(375, 30, 'Udupi'),
(376, 30, 'Kaup'),
(377, 30, 'Bramahavara'),
(378, 30, 'Karkala'),
(379, 30, 'Kundapura'),
(380, 30, 'Byndoor');

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
(20, 'rejection_reason', 1, 'Those who have not completed eighteen (18) years of age but\n\ncompleted sixty (60) years of age', '2017-03-27 23:38:50', '2017-04-02 02:41:35', NULL),
(21, 'rejection_reason', 2, 'Those who have been not engaged in building or other construction\n\nwork for ninety (90) days in preceding 12 months', '2017-03-27 23:38:50', '2017-04-02 02:41:47', NULL),
(22, 'rejection_reason', 3, 'Those who are not submitting the application to the authorised\n\n‘Registering Authority’ in the requisite ‘Form’ prescribed by the Board', '2017-03-27 23:38:50', '2017-04-02 02:41:57', NULL),
(23, 'payment_mode', 3, 'NEFT', '2016-04-29 23:14:30', '2017-03-28 00:53:52', NULL),
(24, 'rejection_reason', 4, 'Those applications which are not accompanied by the necessary relevant\r\n\r\ndocuments as prescribed in the Act', '2017-03-27 23:38:50', '2017-04-02 02:41:57', NULL),
(25, 'rejection_reason', 5, 'Those applications which are not accompanied by necessary fees as\r\n\r\nprescribed in the Act', '2017-03-27 23:38:50', '2017-04-02 02:41:57', NULL);

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
('cfl3puiahfk6ccasgq42rsdrc6', 1491191680, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a333b),
('ct9kh075gg1bcoicdhqs78df86', 1491111445, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a333b),
('h8rh8ds5u6gqdd3o3g5ndu6v55', 1491111445, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a333b),
('j2ive7i2mbbdjsqba0tsl4ks43', 1491209551, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a363b),
('j690b0402lhtk2bqngnmknc9p7', 1491111445, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a333b);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `benf_master_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `updated_by_user_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 'sravan', 'sravan@sravan.com', NULL, 'Bangalore South', '$2y$13$/TtC89z0b7qmOF.ReSwYl.BLWsRmniw1DUUJnp7F/YFGMpHWoRglS', 10, 'hblrgv2kGfg4oQvsjBt2ZVi5OAE0dBiO', NULL, NULL, 1487051249, 1490974516),
(4, 'prashanth', 'prashanth100@gmail.com', NULL, 'Bangalore North', '$2y$13$6nGKmP85dqBVXkci2qB8VOM4ZP2WVwkl1qYzlYWDGhgcwh.rnGJ6G', 10, '03NqoZdpsGz2v3wgAhjgAd7NvPprdq48', NULL, NULL, 1487347713, 1490974626),
(5, 'test', 'test@best.com', '', NULL, '$2y$13$hgQqcSNimfbUYV7PDEa9SO5mJT24o8uTbS/ZxZo4Az.q7CbWm5wxy', 10, 'qTCcl2dxj63-KBeZoAGZF6DoNV0r5BJG', NULL, NULL, 1489489922, 1489489922),
(6, 'kumar', '', '123456', NULL, '$2y$13$M3EyTyuhMH6ce3xd6fxzQOymNEjofgp3ezMOdwxt3x8kmH9KBRW5y', 10, 'TTl0BaQCM4FXyNJqktULNBzkGD1fgq5-', NULL, NULL, 1490419100, 1490419100);

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
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `selection_seed_data`
--
ALTER TABLE `selection_seed_data`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
