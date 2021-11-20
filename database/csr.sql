-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 03:52 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csr`
--

-- --------------------------------------------------------

--
-- Table structure for table `analysis_processes`
--

CREATE TABLE `analysis_processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `analysis_process_human_resource`
--

CREATE TABLE `analysis_process_human_resource` (
  `analysis_process_id` bigint(20) UNSIGNED NOT NULL,
  `human_resource_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `analysis_process_job`
--

CREATE TABLE `analysis_process_job` (
  `analysis_process_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `analysis_process_method`
--

CREATE TABLE `analysis_process_method` (
  `analysis_process_id` bigint(20) UNSIGNED NOT NULL,
  `method_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `analysis_process_resource`
--

CREATE TABLE `analysis_process_resource` (
  `analysis_process_id` bigint(20) UNSIGNED NOT NULL,
  `resource_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `analysis_process_supporting_process`
--

CREATE TABLE `analysis_process_supporting_process` (
  `analysis_process_id` bigint(20) UNSIGNED NOT NULL,
  `supporting_process_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `atp_processes`
--

CREATE TABLE `atp_processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atp_processes`
--

INSERT INTO `atp_processes` (`id`, `activity`, `description`, `transaction`, `project`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Membuat RKA Departeman CSR', NULL, NULL, NULL, '2021-11-17 02:24:13', '2021-11-17 02:24:13', NULL),
(2, 'Pelaksanaan Program TJSL (BUIN dan Comdev)', NULL, NULL, NULL, '2021-11-17 02:24:22', '2021-11-17 02:24:22', NULL),
(3, 'Pelaksanaaan kolekting dan pembinaan  Mitra Binaan', NULL, NULL, NULL, '2021-11-17 02:24:31', '2021-11-17 02:24:31', NULL),
(4, 'Monitoring dan Evaluasi pelaksanaan Prog. TJSL', NULL, NULL, NULL, '2021-11-17 02:24:40', '2021-11-17 02:24:40', NULL),
(5, 'Laporan  Publikasi kegiatan CSR', NULL, NULL, NULL, '2021-11-17 02:24:49', '2021-11-17 02:24:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bribery_risk_assesments`
--

CREATE TABLE `bribery_risk_assesments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requirements` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bribery_risk` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `impact` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `risk_causes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `internal_control` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `l` int(11) NOT NULL,
  `c` int(11) NOT NULL,
  `criteria_impact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `risk_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proactive_mitigation` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_target` int(11) NOT NULL,
  `c_target` int(11) NOT NULL,
  `risk_level_target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opportunity` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `atp_process_id` bigint(20) UNSIGNED NOT NULL,
  `personal_identification_id` bigint(20) UNSIGNED NOT NULL,
  `document_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bribery_risk_assesments`
--

INSERT INTO `bribery_risk_assesments` (`id`, `requirements`, `bribery_risk`, `impact`, `risk_causes`, `internal_control`, `l`, `c`, `criteria_impact`, `risk_level`, `proactive_mitigation`, `l_target`, `c_target`, `risk_level_target`, `opportunity`, `description`, `created_at`, `updated_at`, `deleted_at`, `atp_process_id`, `personal_identification_id`, `document_id`) VALUES
(1, 'Tidak ada pemberian suap dari personil internal saat pembuatan RKA', 'Ada suap dari personil internal saat membuat RKA', 'Disetujuinya RKA yang seharusnya tidak layak untuk disetujui', 'Karyawan/staff yang melakukan pembuatan RKA belum sepenuhnya memahami Kebijakan Anti Penyuapan SIG', '1.  Kepatuhan  melakanakan :\r\n    -  Prosedur  & IK Dep. CSR.\r\n    -  Pedoman Etika Perusahaan, dg ttd surat \r\n       patuh Etika/  pegawai\r\n    - Prosedur Pengendalian Gratifikasi, \r\n      Whistleblowing System & Anti Penyuapan\r\n   - RM3P Dep. CSR\r\n2.  Sosialisasi Kebijakan Anti Penyuapan SIG pada Dep. CSR kegiatan membuat poster AP dan publikasi lewat Instagram dan banner (kantor PUK gresik)', 1, 2, 'operasional', 'low', '-', 1, 2, 'low', '-', 'Risiko sudah mempertimbangkan sebagai berikut :\r\n(Tabel 4.1 Konteks Organisasi) yang ada di pedoman SMSI', '2021-11-17 22:22:38', '2021-11-17 22:22:38', NULL, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `business_partners`
--

CREATE TABLE `business_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_partners`
--

INSERT INTO `business_partners` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Klien', '2021-11-17 02:25:48', '2021-11-17 02:25:48', NULL),
(2, 'Pelanggan', '2021-11-17 02:25:58', '2021-11-17 02:25:58', NULL),
(3, 'Usaha Bersama (Joint Venture)', '2021-11-17 02:26:06', '2021-11-17 02:26:06', NULL),
(4, 'Rekan Konsorsium', '2021-11-17 02:26:14', '2021-11-17 02:26:14', NULL),
(5, 'Pemasok, Vendor, Supplier', '2021-11-17 02:26:22', '2021-11-17 02:26:22', NULL),
(6, 'Penasihat', '2021-11-17 02:26:29', '2021-11-17 02:26:29', NULL),
(7, 'Agen', '2021-11-17 02:26:38', '2021-11-17 02:26:38', NULL),
(8, 'Distributor', '2021-11-17 02:26:44', '2021-11-17 02:26:44', NULL),
(9, 'Perwakilan', '2021-11-17 02:26:50', '2021-11-17 02:26:50', NULL),
(10, 'Kantor Akuntan Publik', '2021-11-17 02:26:57', '2021-11-17 02:26:57', NULL),
(11, 'Penyedia Alih Daya', '2021-11-17 02:27:05', '2021-11-17 02:27:05', NULL),
(12, 'Kontraktor', '2021-11-17 02:27:19', '2021-11-17 02:27:19', NULL),
(13, 'Lembaga Konsultan', '2021-11-17 02:27:27', '2021-11-17 02:27:27', NULL),
(14, 'Sub-kontraktor', '2021-11-17 02:27:34', '2021-11-17 02:27:34', NULL),
(15, 'JV Partners', '2021-11-17 02:27:43', '2021-11-17 02:27:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_partner_document`
--

CREATE TABLE `business_partner_document` (
  `id` bigint(20) NOT NULL,
  `document_number` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `validate` varchar(255) DEFAULT NULL,
  `validate_date` date DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `deleted_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `target` varchar(255) DEFAULT NULL,
  `goal` varchar(255) DEFAULT NULL,
  `revision` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_partner_document`
--

INSERT INTO `business_partner_document` (`id`, `document_number`, `note`, `validate`, `validate_date`, `created_at`, `deleted_at`, `updated_at`, `type`, `target`, `goal`, `revision`) VALUES
(1, 'FP/SIG/GRC/007', 'P/SMI/GRC/007', 'reject', NULL, '2021-11-18', NULL, '2021-11-18', 'business-partner', NULL, NULL, NULL),
(2, 'FP/SIG/GRC/009', NULL, NULL, NULL, '2021-11-18', '2021-11-18', '2021-11-18', 'bribery-risk-assesment', NULL, NULL, NULL),
(3, 'FP/SIG/GRC/007', 'P/SMI/GRC/004', NULL, NULL, '2021-11-18', NULL, '2021-11-18', 'bribery-risk', NULL, NULL, NULL),
(4, 'FP/SIG/GRC/009', NULL, NULL, NULL, '2021-11-18', NULL, '2021-11-18', 'rm3p', NULL, 's', 0);

-- --------------------------------------------------------

--
-- Table structure for table `business_partner_identifications`
--

CREATE TABLE `business_partner_identifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `risk_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_partner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smap_implementation` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `self_smap_control` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `business_partner_id` bigint(20) UNSIGNED NOT NULL,
  `document_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_partner_identifications`
--

INSERT INTO `business_partner_identifications` (`id`, `risk_level`, `business_partner_name`, `address`, `activity`, `smap_implementation`, `self_smap_control`, `description`, `created_at`, `updated_at`, `deleted_at`, `business_partner_id`, `document_id`) VALUES
(1, 'medium', 'Lembaga Penelitian UISI', 'Gresik', 'Survei', '-', 'yes', 'Belum ada sistem WBS,\r\nnamun sudah ada kebijakan Anti Penyuapan tertuang dalam Peraturan Perusahaan', '2021-11-17 02:49:27', '2021-11-17 19:14:59', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `goal_measurements`
--

CREATE TABLE `goal_measurements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kpi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `analysi_process_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `human_resources`
--

CREATE TABLE `human_resources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `competence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `awareness` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scope` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `jobdesc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `input_analysis`
--

CREATE TABLE `input_analysis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `input` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `analysis_process_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Prog TJSL (Comdev)', '2021-11-20 03:22:22', '2021-11-20 03:22:22', NULL),
(2, 'Prog TJSL ( BUIN)', '2021-11-20 03:22:30', '2021-11-20 03:22:30', NULL),
(3, 'Keuangan & Admin CSR', '2021-11-20 03:22:42', '2021-11-20 03:22:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `methods`
--

CREATE TABLE `methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `methods`
--

INSERT INTO `methods` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Permen KBUMN 5/thn 21 ttg TJSL', '2021-11-20 03:23:04', '2021-11-20 03:23:04', NULL),
(2, 'prosedur & IK', '2021-11-20 03:23:14', '2021-11-20 03:23:14', NULL),
(3, 'Pedoman perilaku etika', '2021-11-20 03:23:27', '2021-11-20 03:23:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2021_11_14_000001_create_media_table', 1),
(4, '2021_11_14_000002_create_positions_table', 1),
(5, '2021_11_14_000003_create_goal_measurements_table', 1),
(6, '2021_11_14_000004_create_output_analysis_table', 1),
(7, '2021_11_14_000005_create_input_analysis_table', 1),
(8, '2021_11_14_000006_create_analysis_processes_table', 1),
(9, '2021_11_14_000007_create_supporting_processes_table', 1),
(10, '2021_11_14_000008_create_methods_table', 1),
(11, '2021_11_14_000009_create_human_resources_table', 1),
(12, '2021_11_14_000010_create_jobs_table', 1),
(13, '2021_11_14_000011_create_permissions_table', 1),
(14, '2021_11_14_000012_create_risk_mitigation_monitorings_table', 1),
(15, '2021_11_14_000013_create_resources_table', 1),
(16, '2021_11_14_000014_create_users_table', 1),
(17, '2021_11_14_000015_create_roles_table', 1),
(18, '2021_11_14_000016_create_business_partner_identifications_table', 1),
(19, '2021_11_14_000017_create_business_partners_table', 1),
(20, '2021_11_14_000018_create_atp_processes_table', 1),
(21, '2021_11_14_000019_create_risks_table', 1),
(22, '2021_11_14_000020_create_bribery_risk_assesments_table', 1),
(23, '2021_11_14_000021_create_analysis_process_resource_pivot_table', 1),
(24, '2021_11_14_000022_create_permission_role_pivot_table', 1),
(25, '2021_11_14_000023_create_role_user_pivot_table', 1),
(26, '2021_11_14_000024_create_analysis_process_job_pivot_table', 1),
(27, '2021_11_14_000025_create_analysis_process_human_resource_pivot_table', 1),
(28, '2021_11_14_000026_create_analysis_process_method_pivot_table', 1),
(29, '2021_11_14_000027_create_analysis_process_supporting_process_pivot_table', 1),
(30, '2021_11_14_000028_add_relationship_fields_to_output_analysis_table', 1),
(31, '2021_11_14_000029_add_relationship_fields_to_bribery_risk_assesments_table', 1),
(32, '2021_11_14_000030_add_relationship_fields_to_input_analysis_table', 1),
(33, '2021_11_14_000031_add_relationship_fields_to_human_resources_table', 1),
(34, '2021_11_14_000032_add_relationship_fields_to_business_partner_identifications_table', 1),
(35, '2021_11_14_000033_add_relationship_fields_to_risk_mitigation_monitorings_table', 1),
(36, '2021_11_14_000034_add_relationship_fields_to_goal_measurements_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `output_analysis`
--

CREATE TABLE `output_analysis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `output` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `analysis_process_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'risk_create', NULL, NULL, NULL),
(18, 'risk_edit', NULL, NULL, NULL),
(19, 'risk_show', NULL, NULL, NULL),
(20, 'risk_delete', NULL, NULL, NULL),
(21, 'risk_access', NULL, NULL, NULL),
(22, 'atp_process_create', NULL, NULL, NULL),
(23, 'atp_process_edit', NULL, NULL, NULL),
(24, 'atp_process_show', NULL, NULL, NULL),
(25, 'atp_process_delete', NULL, NULL, NULL),
(26, 'atp_process_access', NULL, NULL, NULL),
(27, 'business_partner_create', NULL, NULL, NULL),
(28, 'business_partner_edit', NULL, NULL, NULL),
(29, 'business_partner_delete', NULL, NULL, NULL),
(30, 'business_partner_access', NULL, NULL, NULL),
(31, 'business_partner_identification_create', NULL, NULL, NULL),
(32, 'business_partner_identification_edit', NULL, NULL, NULL),
(33, 'business_partner_identification_show', NULL, NULL, NULL),
(34, 'business_partner_identification_delete', NULL, NULL, NULL),
(35, 'business_partner_identification_access', NULL, NULL, NULL),
(36, 'bribery_risk_assesment_create', NULL, NULL, NULL),
(37, 'bribery_risk_assesment_edit', NULL, NULL, NULL),
(38, 'bribery_risk_assesment_show', NULL, NULL, NULL),
(39, 'bribery_risk_assesment_delete', NULL, NULL, NULL),
(40, 'bribery_risk_assesment_access', NULL, NULL, NULL),
(41, 'position_create', NULL, NULL, NULL),
(42, 'position_edit', NULL, NULL, NULL),
(43, 'position_delete', NULL, NULL, NULL),
(44, 'position_access', NULL, NULL, NULL),
(45, 'risk_mitigation_monitoring_create', NULL, NULL, NULL),
(46, 'risk_mitigation_monitoring_edit', NULL, NULL, NULL),
(47, 'risk_mitigation_monitoring_show', NULL, NULL, NULL),
(48, 'risk_mitigation_monitoring_delete', NULL, NULL, NULL),
(49, 'risk_mitigation_monitoring_access', NULL, NULL, NULL),
(50, 'resource_create', NULL, NULL, NULL),
(51, 'resource_edit', NULL, NULL, NULL),
(52, 'resource_delete', NULL, NULL, NULL),
(53, 'resource_access', NULL, NULL, NULL),
(54, 'job_create', NULL, NULL, NULL),
(55, 'job_edit', NULL, NULL, NULL),
(56, 'job_delete', NULL, NULL, NULL),
(57, 'job_access', NULL, NULL, NULL),
(58, 'human_resource_create', NULL, NULL, NULL),
(59, 'human_resource_edit', NULL, NULL, NULL),
(60, 'human_resource_show', NULL, NULL, NULL),
(61, 'human_resource_delete', NULL, NULL, NULL),
(62, 'human_resource_access', NULL, NULL, NULL),
(63, 'method_create', NULL, NULL, NULL),
(64, 'method_edit', NULL, NULL, NULL),
(65, 'method_delete', NULL, NULL, NULL),
(66, 'method_access', NULL, NULL, NULL),
(67, 'supporting_process_create', NULL, NULL, NULL),
(68, 'supporting_process_edit', NULL, NULL, NULL),
(69, 'supporting_process_delete', NULL, NULL, NULL),
(70, 'supporting_process_access', NULL, NULL, NULL),
(71, 'analysis_process_create', NULL, NULL, NULL),
(72, 'analysis_process_edit', NULL, NULL, NULL),
(73, 'analysis_process_show', NULL, NULL, NULL),
(74, 'analysis_process_delete', NULL, NULL, NULL),
(75, 'analysis_process_access', NULL, NULL, NULL),
(76, 'input_analysi_create', NULL, NULL, NULL),
(77, 'input_analysi_edit', NULL, NULL, NULL),
(78, 'input_analysi_delete', NULL, NULL, NULL),
(79, 'input_analysi_access', NULL, NULL, NULL),
(80, 'output_analysi_create', NULL, NULL, NULL),
(81, 'output_analysi_edit', NULL, NULL, NULL),
(82, 'output_analysi_delete', NULL, NULL, NULL),
(83, 'output_analysi_access', NULL, NULL, NULL),
(84, 'goal_measurement_create', NULL, NULL, NULL),
(85, 'goal_measurement_edit', NULL, NULL, NULL),
(86, 'goal_measurement_delete', NULL, NULL, NULL),
(87, 'goal_measurement_access', NULL, NULL, NULL),
(88, 'profile_password_edit', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 76),
(2, 77),
(2, 78),
(2, 79),
(2, 80),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, ' CSR Program BUMN Jr Officer', '2021-11-17 01:15:48', '2021-11-17 01:15:48', NULL),
(2, ' CSR Publication & Doc Jr Officer', '2021-11-17 01:15:57', '2021-11-17 01:15:57', NULL),
(3, ' CSR Comdev & Partnership Jr Officer', '2021-11-17 01:16:06', '2021-11-17 01:16:06', NULL),
(4, ' GM of CSR', '2021-11-17 01:16:14', '2021-11-17 01:16:14', NULL),
(5, ' CSR Comdev & Partnership Jr Officer', '2021-11-17 01:16:23', '2021-11-17 01:45:20', '2021-11-17 01:45:20'),
(6, ' CSR Program BUMN Jr Officer', '2021-11-17 01:16:44', '2021-11-17 01:44:40', '2021-11-17 01:44:40'),
(7, ' CSR Program BUMN Sr Officer', '2021-11-17 01:16:52', '2021-11-17 01:16:52', NULL),
(8, ' CSR Comdev & Partnership Officer', '2021-11-17 01:17:01', '2021-11-17 01:17:01', NULL),
(9, ' CSR Program BUMN Jr Officer', '2021-11-17 01:17:10', '2021-11-17 01:44:32', '2021-11-17 01:44:32'),
(10, ' CSR Program BUMN Officer', '2021-11-17 01:17:19', '2021-11-17 01:17:19', NULL),
(11, ' CSR Monitoring & Evaluation Jr Officer', '2021-11-17 01:17:33', '2021-11-17 01:17:33', NULL),
(12, ' CSR Risk & Performance Officer', '2021-11-17 01:17:53', '2021-11-17 01:17:53', NULL),
(13, ' CSR Comdev & Partnership Sr Officer', '2021-11-17 01:18:03', '2021-11-17 01:18:03', NULL),
(14, ' CSR Monitoring & Evaluation Officer', '2021-11-17 01:18:13', '2021-11-17 01:18:13', NULL),
(15, ' CSR Comdev & Partnership Jr Officer', '2021-11-17 01:18:20', '2021-11-17 01:45:06', '2021-11-17 01:45:06'),
(16, ' CSR Program BUMN Jr Officer', '2021-11-17 01:18:28', '2021-11-17 01:43:51', '2021-11-17 01:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Computer', '2021-11-20 03:20:37', '2021-11-20 03:20:37', NULL),
(2, 'Printer', '2021-11-20 03:20:47', '2021-11-20 03:20:47', NULL),
(3, 'Internet', '2021-11-20 03:20:55', '2021-11-20 03:20:55', NULL),
(4, 'Ruang Kerja', '2021-11-20 03:21:03', '2021-11-20 03:21:03', NULL),
(5, 'Aplikasi Ruang Meeting', '2021-11-20 03:21:19', '2021-11-20 03:21:19', NULL),
(6, 'Software Keamanan Informasi', '2021-11-20 03:21:33', '2021-11-20 03:21:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `risks`
--

CREATE TABLE `risks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `risk_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `risk_process` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `likelihood_baseline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consequences_baseline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `existing_control` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `effectiveness` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `risk_cause` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `proactive_mitigation` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `likelihood_target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consequences_target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `impact` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `reactive_mitigation` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_schedule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `risk_mitigation_monitorings`
--

CREATE TABLE `risk_mitigation_monitorings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proactive_mitigation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_date` date NOT NULL,
  `realization_date` date DEFAULT NULL,
  `l` int(11) DEFAULT NULL,
  `c` int(11) DEFAULT NULL,
  `risk_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `responsible_id` bigint(20) UNSIGNED NOT NULL,
  `document_id` bigint(20) DEFAULT NULL,
  `l_after` int(11) DEFAULT NULL,
  `c_after` int(11) DEFAULT NULL,
  `risk_level_after` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `risk_mitigation_monitorings`
--

INSERT INTO `risk_mitigation_monitorings` (`id`, `proactive_mitigation`, `plan_date`, `realization_date`, `l`, `c`, `risk_level`, `status`, `created_at`, `updated_at`, `deleted_at`, `responsible_id`, `document_id`, `l_after`, `c_after`, `risk_level_after`) VALUES
(1, 'Membuat Banner anti penyuapan (kantor PUK, Gresik)', '2021-12-12', NULL, 1, 2, 'high', 'upcoming', '2021-11-18 02:38:34', '2021-11-18 02:38:34', NULL, 5, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `supporting_processes`
--

CREATE TABLE `supporting_processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supporting_processes`
--

INSERT INTO `supporting_processes` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Unit Kerja Institutional Relation', '2021-11-20 03:23:40', '2021-11-20 03:23:40', NULL),
(2, 'Unit Kerja Corporate Comunication', '2021-11-20 03:23:52', '2021-11-20 03:23:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `position_id` bigint(20) UNSIGNED DEFAULT NULL,
  `identity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `position_id`, `identity`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$GlEM9lqhF4JJUNXsmsrYf.IyrLGxnAoA.41jZ0X6Nk2ZdBUeVtTYK', NULL, '2021-11-16 04:22:22', NULL, NULL, NULL, ''),
(2, 'd', 'user@user.com', '2021-11-16 05:38:09', '$2y$10$GlEM9lqhF4JJUNXsmsrYf.IyrLGxnAoA.41jZ0X6Nk2ZdBUeVtTYK', NULL, '2021-11-16 04:38:09', NULL, NULL, NULL, ''),
(5, 'SUGENG PRAYITNO', 'gislason.cleora@example.com', NULL, '$2y$10$htLg4ZgnH2cpqZmtfR8aW.ZDj3.FHA.1uo.kMWfDtc9ghuxtIYAl6', NULL, '2021-11-17 02:19:05', '2021-11-17 02:19:05', NULL, 1, '632');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analysis_processes`
--
ALTER TABLE `analysis_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analysis_process_human_resource`
--
ALTER TABLE `analysis_process_human_resource`
  ADD KEY `analysis_process_id_fk_5335327` (`analysis_process_id`),
  ADD KEY `human_resource_id_fk_5335327` (`human_resource_id`);

--
-- Indexes for table `analysis_process_job`
--
ALTER TABLE `analysis_process_job`
  ADD KEY `analysis_process_id_fk_5335326` (`analysis_process_id`),
  ADD KEY `job_id_fk_5335326` (`job_id`);

--
-- Indexes for table `analysis_process_method`
--
ALTER TABLE `analysis_process_method`
  ADD KEY `analysis_process_id_fk_5335328` (`analysis_process_id`),
  ADD KEY `method_id_fk_5335328` (`method_id`);

--
-- Indexes for table `analysis_process_resource`
--
ALTER TABLE `analysis_process_resource`
  ADD KEY `analysis_process_id_fk_5335325` (`analysis_process_id`),
  ADD KEY `resource_id_fk_5335325` (`resource_id`);

--
-- Indexes for table `analysis_process_supporting_process`
--
ALTER TABLE `analysis_process_supporting_process`
  ADD KEY `analysis_process_id_fk_5335329` (`analysis_process_id`),
  ADD KEY `supporting_process_id_fk_5335329` (`supporting_process_id`);

--
-- Indexes for table `atp_processes`
--
ALTER TABLE `atp_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bribery_risk_assesments`
--
ALTER TABLE `bribery_risk_assesments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atp_process_fk_5335121` (`atp_process_id`),
  ADD KEY `personal_identification_fk_5335145` (`personal_identification_id`),
  ADD KEY `document_id` (`document_id`);

--
-- Indexes for table `business_partners`
--
ALTER TABLE `business_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_partner_document`
--
ALTER TABLE `business_partner_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_partner_identifications`
--
ALTER TABLE `business_partner_identifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_partner_fk_5335017` (`business_partner_id`),
  ADD KEY `document_id` (`document_id`);

--
-- Indexes for table `goal_measurements`
--
ALTER TABLE `goal_measurements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `analysi_process_fk_5335349` (`analysi_process_id`);

--
-- Indexes for table `human_resources`
--
ALTER TABLE `human_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_5335353` (`user_id`),
  ADD KEY `position_fk` (`position_id`);

--
-- Indexes for table `input_analysis`
--
ALTER TABLE `input_analysis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `analysis_process_fk_5335339` (`analysis_process_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `methods`
--
ALTER TABLE `methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `output_analysis`
--
ALTER TABLE `output_analysis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `analysis_process_fk_5335342` (`analysis_process_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_5283245` (`role_id`),
  ADD KEY `permission_id_fk_5283245` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `risks`
--
ALTER TABLE `risks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `risk_mitigation_monitorings`
--
ALTER TABLE `risk_mitigation_monitorings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `responsible_fk_5335259` (`responsible_id`),
  ADD KEY `document_id` (`document_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_5283254` (`user_id`),
  ADD KEY `role_id_fk_5283254` (`role_id`);

--
-- Indexes for table `supporting_processes`
--
ALTER TABLE `supporting_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `position_id` (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analysis_processes`
--
ALTER TABLE `analysis_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `atp_processes`
--
ALTER TABLE `atp_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bribery_risk_assesments`
--
ALTER TABLE `bribery_risk_assesments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_partners`
--
ALTER TABLE `business_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `business_partner_document`
--
ALTER TABLE `business_partner_document`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `business_partner_identifications`
--
ALTER TABLE `business_partner_identifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `goal_measurements`
--
ALTER TABLE `goal_measurements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `human_resources`
--
ALTER TABLE `human_resources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `input_analysis`
--
ALTER TABLE `input_analysis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `methods`
--
ALTER TABLE `methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `output_analysis`
--
ALTER TABLE `output_analysis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `risks`
--
ALTER TABLE `risks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `risk_mitigation_monitorings`
--
ALTER TABLE `risk_mitigation_monitorings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supporting_processes`
--
ALTER TABLE `supporting_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `analysis_process_human_resource`
--
ALTER TABLE `analysis_process_human_resource`
  ADD CONSTRAINT `analysis_process_id_fk_5335327` FOREIGN KEY (`analysis_process_id`) REFERENCES `analysis_processes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `human_resource_id_fk_5335327` FOREIGN KEY (`human_resource_id`) REFERENCES `human_resources` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `analysis_process_job`
--
ALTER TABLE `analysis_process_job`
  ADD CONSTRAINT `analysis_process_id_fk_5335326` FOREIGN KEY (`analysis_process_id`) REFERENCES `analysis_processes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_id_fk_5335326` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `analysis_process_method`
--
ALTER TABLE `analysis_process_method`
  ADD CONSTRAINT `analysis_process_id_fk_5335328` FOREIGN KEY (`analysis_process_id`) REFERENCES `analysis_processes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `method_id_fk_5335328` FOREIGN KEY (`method_id`) REFERENCES `methods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `analysis_process_resource`
--
ALTER TABLE `analysis_process_resource`
  ADD CONSTRAINT `analysis_process_id_fk_5335325` FOREIGN KEY (`analysis_process_id`) REFERENCES `analysis_processes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resource_id_fk_5335325` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `analysis_process_supporting_process`
--
ALTER TABLE `analysis_process_supporting_process`
  ADD CONSTRAINT `analysis_process_id_fk_5335329` FOREIGN KEY (`analysis_process_id`) REFERENCES `analysis_processes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supporting_process_id_fk_5335329` FOREIGN KEY (`supporting_process_id`) REFERENCES `supporting_processes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bribery_risk_assesments`
--
ALTER TABLE `bribery_risk_assesments`
  ADD CONSTRAINT `atp_process_fk_5335121` FOREIGN KEY (`atp_process_id`) REFERENCES `atp_processes` (`id`),
  ADD CONSTRAINT `personal_identification_fk_5335145` FOREIGN KEY (`personal_identification_id`) REFERENCES `positions` (`id`);

--
-- Constraints for table `business_partner_identifications`
--
ALTER TABLE `business_partner_identifications`
  ADD CONSTRAINT `business_partner_fk_5335017` FOREIGN KEY (`business_partner_id`) REFERENCES `business_partners` (`id`);

--
-- Constraints for table `goal_measurements`
--
ALTER TABLE `goal_measurements`
  ADD CONSTRAINT `analysi_process_fk_5335349` FOREIGN KEY (`analysi_process_id`) REFERENCES `analysis_processes` (`id`);

--
-- Constraints for table `human_resources`
--
ALTER TABLE `human_resources`
  ADD CONSTRAINT `position_fk` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `user_fk_5335353` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `input_analysis`
--
ALTER TABLE `input_analysis`
  ADD CONSTRAINT `analysis_process_fk_5335339` FOREIGN KEY (`analysis_process_id`) REFERENCES `analysis_processes` (`id`);

--
-- Constraints for table `output_analysis`
--
ALTER TABLE `output_analysis`
  ADD CONSTRAINT `analysis_process_fk_5335342` FOREIGN KEY (`analysis_process_id`) REFERENCES `analysis_processes` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_5283245` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_5283245` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `risk_mitigation_monitorings`
--
ALTER TABLE `risk_mitigation_monitorings`
  ADD CONSTRAINT `responsible_fk_5335259` FOREIGN KEY (`responsible_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_5283254` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_5283254` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `position_user_fk` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
