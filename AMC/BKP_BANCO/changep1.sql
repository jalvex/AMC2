-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Maio-2020 às 23:11
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `changep1`
--
CREATE DATABASE IF NOT EXISTS `changep1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `changep1`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_amc_user`
--

CREATE TABLE `tb_amc_user` (
  `registration` varchar(20) NOT NULL,
  `user_login` varchar(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_lvl` varchar(20) NOT NULL,
  `user_area` varchar(20) NOT NULL,
  `cd_profile` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `dt_activation` datetime NOT NULL,
  `dt_update` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `nm_sr_creation` varchar(20) NOT NULL,
  `update_by` varchar(20) DEFAULT NULL,
  `created_by` varchar(20) NOT NULL,
  `nm_sr_update` varchar(20) DEFAULT NULL,
  `nm_email_user` varchar(600) NOT NULL,
  `nm_email_dl_user` varchar(600) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_amc_user`
--

INSERT INTO `tb_amc_user` (`registration`, `user_login`, `user_name`, `user_lvl`, `user_area`, `cd_profile`, `status`, `dt_activation`, `dt_update`, `last_login`, `nm_sr_creation`, `update_by`, `created_by`, `nm_sr_update`, `nm_email_user`, `nm_email_dl_user`) VALUES
('F8039846', 'F8039846', 'Eduardo Cardoso', 'user', 'change', 1, 'ativo', '2020-04-14 00:00:00', NULL, NULL, 'SR00000000', NULL, 'F8039846', NULL, 'efcardoso@timbrasil.com.br', 'DL_IT_OPS_MUDANCAS@timbrasil.com.br');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_amc_user`
--
ALTER TABLE `tb_amc_user`
  ADD KEY `registration` (`registration`);
--
-- Database: `php_beginner_crud_level_1`
--
CREATE DATABASE IF NOT EXISTS `php_beginner_crud_level_1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `php_beginner_crud_level_1`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created`, `modified`) VALUES
(1, 'Basketball', 'A ball used in the NBA.', 49.99, '2015-08-02 12:04:03', '2015-08-06 09:59:18'),
(3, 'Gatorade', 'This is a very good drink for athletes.', 1.99, '2015-08-02 12:14:29', '2015-08-06 09:59:18'),
(4, 'Eye Glasses', 'It will make you read better.', 6, '2015-08-02 12:15:04', '2015-08-06 09:59:18'),
(5, 'Trash Can', 'It will help you maintain cleanliness.', 3.95, '2015-08-02 12:16:08', '2015-08-06 09:59:18'),
(6, 'Mouse', 'Very useful if you love your computer.', 11.35, '2015-08-02 12:17:58', '2015-08-06 09:59:18'),
(7, 'Earphone', 'You need this one if you love music.', 7, '2015-08-02 12:18:21', '2015-08-06 09:59:18'),
(8, 'Pillow', 'Sleeping well is important.', 8.99, '2015-08-02 12:18:56', '2015-08-06 09:59:18'),
(9, 'teste', 'teste', 1.99, '2020-01-23 14:21:36', '2020-01-23 13:21:36'),
(10, 'teste', 'teste', 2, '2020-01-23 14:21:52', '2020-01-23 13:21:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;--
-- Database: `php_event_calendar`
--
CREATE DATABASE IF NOT EXISTS `php_event_calendar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `php_event_calendar`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pec_admin_user_cals`
--

CREATE TABLE `pec_admin_user_cals` (
  `admin_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `cal_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pec_calendars`
--

CREATE TABLE `pec_calendars` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` enum('user','group','url') DEFAULT 'user',
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `color` varchar(7) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `status` enum('on','off') DEFAULT 'on',
  `show_in_list` enum('0','1') DEFAULT NULL,
  `public` tinyint(3) UNSIGNED DEFAULT '0',
  `reminder_message_email` text,
  `reminder_message_popup` text,
  `access_key` varchar(32) DEFAULT NULL COMMENT 'ical subscribe access key',
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pec_calendars`
--

INSERT INTO `pec_calendars` (`id`, `type`, `user_id`, `name`, `description`, `color`, `admin_id`, `status`, `show_in_list`, `public`, `reminder_message_email`, `reminder_message_popup`, `access_key`, `created_on`, `updated_on`) VALUES
(1, 'user', 1, 'Default Calendar', 'This is a default calendar', '#3a87ad', NULL, 'on', '1', 1, '', '', '', '2014-03-20 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pec_default_reminders`
--

CREATE TABLE `pec_default_reminders` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `cal_id` int(11) UNSIGNED DEFAULT NULL,
  `type` enum('email','popup') DEFAULT NULL,
  `time` smallint(6) DEFAULT NULL,
  `time_type` enum('minute','hour','day','week') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pec_event_calendar_settings`
--

CREATE TABLE `pec_event_calendar_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pec_events`
--

CREATE TABLE `pec_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `cal_id` int(10) UNSIGNED DEFAULT NULL,
  `type` enum('standard','multi_day') DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `start_time` char(5) DEFAULT NULL,
  `start_timestamp` int(10) UNSIGNED DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` char(5) DEFAULT NULL,
  `end_timestamp` int(10) UNSIGNED DEFAULT NULL,
  `repeat_type` enum('none','daily','everyWeekDay','everyMWFDay','everyTTDay','weekly','monthly','yearly') DEFAULT 'none',
  `repeat_interval` tinyint(3) UNSIGNED DEFAULT NULL,
  `repeat_count` tinyint(3) UNSIGNED DEFAULT '0',
  `repeat_start_date` date DEFAULT '0000-01-01',
  `repeat_end_on` date DEFAULT '0000-01-01',
  `repeat_end_after` int(11) DEFAULT '0',
  `repeat_never` tinyint(1) DEFAULT '0',
  `repeat_by` enum('repeat_by_day_of_the_month','repeat_by_day_of_the_week') DEFAULT NULL,
  `repeat_on_sun` tinyint(1) NOT NULL DEFAULT '0',
  `repeat_on_mon` tinyint(1) NOT NULL DEFAULT '0',
  `repeat_on_tue` tinyint(1) NOT NULL DEFAULT '0',
  `repeat_on_wed` tinyint(1) NOT NULL DEFAULT '0',
  `repeat_on_thu` tinyint(1) NOT NULL DEFAULT '0',
  `repeat_on_fri` tinyint(1) NOT NULL DEFAULT '0',
  `repeat_on_sat` tinyint(1) NOT NULL DEFAULT '0',
  `repeat_deleted_indexes` varchar(255) DEFAULT NULL,
  `title` text,
  `description` longblob,
  `allDay` varchar(10) DEFAULT NULL,
  `url` varchar(256) DEFAULT NULL,
  `color` varchar(15) DEFAULT NULL,
  `backgroundColor` varchar(20) DEFAULT NULL,
  `textColor` varchar(20) DEFAULT NULL,
  `borderColor` varchar(20) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `available` enum('0','1') DEFAULT '1',
  `privacy` enum('public','private') DEFAULT 'public',
  `image` varchar(100) DEFAULT NULL,
  `invitation` enum('1','0') DEFAULT '0',
  `invitation_event_id` int(10) UNSIGNED DEFAULT '0',
  `invitation_creator_id` int(10) UNSIGNED DEFAULT '0',
  `invitation_response` enum('yes','no','maybe','pending') DEFAULT 'pending',
  `free_busy` enum('free','busy') NOT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `modified_by` varchar(30) DEFAULT NULL,
  `created_on` varchar(19) DEFAULT NULL,
  `updated_on` varchar(19) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pec_events`
--

INSERT INTO `pec_events` (`id`, `cal_id`, `type`, `start_date`, `start_time`, `start_timestamp`, `end_date`, `end_time`, `end_timestamp`, `repeat_type`, `repeat_interval`, `repeat_count`, `repeat_start_date`, `repeat_end_on`, `repeat_end_after`, `repeat_never`, `repeat_by`, `repeat_on_sun`, `repeat_on_mon`, `repeat_on_tue`, `repeat_on_wed`, `repeat_on_thu`, `repeat_on_fri`, `repeat_on_sat`, `repeat_deleted_indexes`, `title`, `description`, `allDay`, `url`, `color`, `backgroundColor`, `textColor`, `borderColor`, `location`, `available`, `privacy`, `image`, `invitation`, `invitation_event_id`, `invitation_creator_id`, `invitation_response`, `free_busy`, `created_by`, `modified_by`, `created_on`, `updated_on`) VALUES
(1, 1, NULL, '2014-06-09', '11:30', 1402338600, '2014-06-09', '12:30', 1402342200, 'none', NULL, 0, '0000-01-01', '0000-01-01', 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, 'Click a date to create a new event and drag to change its date and time. Click on an existing event to modify. Click \"Show Standard Settings\" to set additional event properties.', NULL, NULL, NULL, NULL, '#3a87ad', NULL, '#3a87ad', NULL, '1', 'private', NULL, '0', 0, 0, 'pending', 'free', NULL, NULL, NULL, NULL),
(2, 1, NULL, '2020-01-27', '23:30', 1580164200, '2020-01-28', '01:00', 1580169600, 'none', NULL, 0, '0000-01-01', '0000-01-01', 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, 'DM19002581 - Forma de pagamento naked', 0x444d3139303032353831202d20466f726d6120646520706167616d656e746f206e616b65640d0a536f6c69636974616e74653a204665726e616e646f204c696d610d0a4368616e6765733a204120646566696e69720d0a5365676d656e746f3a205072c3a92d7061676f0d0a53697374656d617320656e766f6c7669646f733a204f5053432c204f4d532c205046452c204d57, '', '', NULL, '#3a87ad', '', '#3a87ad', '', '1', 'public', '', '0', 0, 0, 'pending', 'free', NULL, NULL, NULL, NULL),
(3, 1, NULL, '2020-03-08', '17:30', 1583685000, '2020-03-08', '18:30', 1583688600, 'none', NULL, 0, '0000-01-01', '0000-01-01', 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, 'teste', NULL, NULL, NULL, NULL, '#3a87ad', NULL, '#3a87ad', NULL, '1', 'public', NULL, '0', 0, 0, 'pending', 'free', NULL, NULL, NULL, NULL),
(4, 1, NULL, '2020-03-08', '01:00', 1583625600, '2020-03-08', '02:00', 1583629200, 'none', NULL, 0, '0000-01-01', '0000-01-01', 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, 'teste2', NULL, NULL, NULL, NULL, '#3a87ad', NULL, '#3a87ad', NULL, '1', 'public', NULL, '0', 0, 0, 'pending', 'free', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pec_guests`
--

CREATE TABLE `pec_guests` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `response` enum('yes','no','maybe','pending') DEFAULT 'pending',
  `note` varchar(255) DEFAULT NULL,
  `user_guest_count` tinyint(3) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pec_mobile_calendar_settings`
--

CREATE TABLE `pec_mobile_calendar_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `theme` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pec_reminders`
--

CREATE TABLE `pec_reminders` (
  `id` int(11) NOT NULL,
  `event_id` int(11) UNSIGNED DEFAULT NULL,
  `is_repeating_event` enum('0','1') DEFAULT '0',
  `type` enum('email','popup') DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `time_unit` enum('minute','hour','day','week') DEFAULT NULL,
  `ts` timestamp NULL DEFAULT NULL,
  `remind_time` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pec_settings`
--

CREATE TABLE `pec_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `shortdate_format` varchar(20) DEFAULT NULL,
  `longdate_format` varchar(20) DEFAULT NULL,
  `timeformat` enum('core','standard') DEFAULT NULL,
  `custom_view` tinyint(3) UNSIGNED DEFAULT NULL,
  `start_day` tinyint(1) DEFAULT '0',
  `default_view` varchar(20) DEFAULT NULL,
  `wysiwyg` enum('1','0') DEFAULT '0',
  `staff_mode` enum('0','1') DEFAULT '0',
  `calendar_mode` enum('vertical','timeline') DEFAULT 'vertical',
  `timeline_day_width` mediumint(8) UNSIGNED DEFAULT '360',
  `timeline_row_height` mediumint(8) UNSIGNED DEFAULT '28',
  `timeline_show_hours` tinyint(3) UNSIGNED DEFAULT '1',
  `timeline_mode` enum('horizontal','vertical') DEFAULT 'horizontal',
  `week_cal_timeslot_min` mediumint(8) UNSIGNED DEFAULT '30',
  `timeslot_height` tinyint(3) UNSIGNED DEFAULT '20',
  `week_cal_start_time` char(5) DEFAULT '00:00',
  `week_cal_end_time` char(5) DEFAULT '23:00',
  `week_cal_show_hours` tinyint(3) UNSIGNED DEFAULT '1',
  `event_tooltip` tinyint(3) UNSIGNED DEFAULT '1',
  `left_side_visible` tinyint(3) UNSIGNED DEFAULT '1',
  `language` varchar(64) DEFAULT 'English',
  `time_zone` varchar(4) DEFAULT '-12',
  `email_server` enum('PHPMailer','SendGrid') DEFAULT 'PHPMailer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pec_settings`
--

INSERT INTO `pec_settings` (`id`, `user_id`, `admin_id`, `shortdate_format`, `longdate_format`, `timeformat`, `custom_view`, `start_day`, `default_view`, `wysiwyg`, `staff_mode`, `calendar_mode`, `timeline_day_width`, `timeline_row_height`, `timeline_show_hours`, `timeline_mode`, `week_cal_timeslot_min`, `timeslot_height`, `week_cal_start_time`, `week_cal_end_time`, `week_cal_show_hours`, `event_tooltip`, `left_side_visible`, `language`, `time_zone`, `email_server`) VALUES
(1, 1, NULL, 'DD/MM/YYYY', 'dddd, DD MMMM YYYY', 'standard', NULL, 0, 'month', '0', '0', 'vertical', 360, 28, 1, 'horizontal', 30, 20, '00:00', '23:00', 1, 1, 1, 'English', '-03', 'PHPMailer');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pec_shared_calendars`
--

CREATE TABLE `pec_shared_calendars` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` enum('user','group','url') DEFAULT 'user',
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `cal_id` int(11) UNSIGNED DEFAULT NULL,
  `shared_user_id` int(11) DEFAULT NULL,
  `permission` enum('see','change') DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `color` varchar(7) DEFAULT NULL,
  `status` enum('on','off') DEFAULT 'on',
  `show_in_list` enum('0','1') DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pec_user_permissions`
--

CREATE TABLE `pec_user_permissions` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission` varchar(100) NOT NULL,
  `value` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pec_user_share_free_busy`
--

CREATE TABLE `pec_user_share_free_busy` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `shared_user_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pec_users`
--

CREATE TABLE `pec_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `access_key` varchar(32) DEFAULT NULL,
  `activated` tinyint(3) UNSIGNED DEFAULT '1',
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `role` enum('super','admin','user') DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `active_calendar_id` varchar(512) NOT NULL DEFAULT '0',
  `company` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `timezone` varchar(30) DEFAULT NULL,
  `language` varchar(10) DEFAULT NULL,
  `theme` varchar(20) DEFAULT NULL,
  `kbd_shortcuts` tinyint(3) UNSIGNED DEFAULT '1',
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pec_users`
--

INSERT INTO `pec_users` (`id`, `access_key`, `activated`, `admin_id`, `role`, `first_name`, `last_name`, `active_calendar_id`, `company`, `username`, `password`, `email`, `timezone`, `language`, `theme`, `kbd_shortcuts`, `created_on`, `updated_on`) VALUES
(1, '1', 1, 1, 'super', 'Admin', 'Admin', '1', 'Higpitch', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', '+6', 'English', 'default', 1, '2013-12-18 14:27:41', '2013-12-18 14:27:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pec_admin_user_cals`
--
ALTER TABLE `pec_admin_user_cals`
  ADD PRIMARY KEY (`admin_id`,`cal_id`);

--
-- Indexes for table `pec_calendars`
--
ALTER TABLE `pec_calendars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `pec_default_reminders`
--
ALTER TABLE `pec_default_reminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cal_id` (`cal_id`);

--
-- Indexes for table `pec_event_calendar_settings`
--
ALTER TABLE `pec_event_calendar_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pec_events`
--
ALTER TABLE `pec_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cal_id` (`cal_id`,`type`,`start_date`),
  ADD KEY `cal_id_2` (`cal_id`,`type`,`end_date`),
  ADD KEY `cal_id_3` (`cal_id`,`type`,`start_date`,`end_date`),
  ADD KEY `cal_id_4` (`cal_id`,`start_date`),
  ADD KEY `cal_id_5` (`cal_id`,`end_date`),
  ADD KEY `cal_id_6` (`cal_id`,`start_date`,`end_date`);

--
-- Indexes for table `pec_guests`
--
ALTER TABLE `pec_guests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `i_event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pec_mobile_calendar_settings`
--
ALTER TABLE `pec_mobile_calendar_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pec_reminders`
--
ALTER TABLE `pec_reminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `i_event_id` (`event_id`);

--
-- Indexes for table `pec_settings`
--
ALTER TABLE `pec_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `pec_shared_calendars`
--
ALTER TABLE `pec_shared_calendars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cal_id` (`cal_id`);

--
-- Indexes for table `pec_user_permissions`
--
ALTER TABLE `pec_user_permissions`
  ADD PRIMARY KEY (`user_id`,`permission`);

--
-- Indexes for table `pec_user_share_free_busy`
--
ALTER TABLE `pec_user_share_free_busy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `shared_user_id` (`shared_user_id`);

--
-- Indexes for table `pec_users`
--
ALTER TABLE `pec_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `i_username` (`username`),
  ADD KEY `fk_admin_id` (`admin_id`),
  ADD KEY `access_key` (`access_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pec_calendars`
--
ALTER TABLE `pec_calendars`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pec_default_reminders`
--
ALTER TABLE `pec_default_reminders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pec_event_calendar_settings`
--
ALTER TABLE `pec_event_calendar_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pec_events`
--
ALTER TABLE `pec_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pec_guests`
--
ALTER TABLE `pec_guests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pec_mobile_calendar_settings`
--
ALTER TABLE `pec_mobile_calendar_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pec_reminders`
--
ALTER TABLE `pec_reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pec_settings`
--
ALTER TABLE `pec_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pec_shared_calendars`
--
ALTER TABLE `pec_shared_calendars`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pec_user_share_free_busy`
--
ALTER TABLE `pec_user_share_free_busy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pec_users`
--
ALTER TABLE `pec_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pec_admin_user_cals`
--
ALTER TABLE `pec_admin_user_cals`
  ADD CONSTRAINT `pec_admin_user_cals_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `pec_users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pec_calendars`
--
ALTER TABLE `pec_calendars`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `pec_users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pec_default_reminders`
--
ALTER TABLE `pec_default_reminders`
  ADD CONSTRAINT `pec_default_reminders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pec_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pec_default_reminders_ibfk_2` FOREIGN KEY (`cal_id`) REFERENCES `pec_calendars` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pec_event_calendar_settings`
--
ALTER TABLE `pec_event_calendar_settings`
  ADD CONSTRAINT `pec_event_calendar_settings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pec_users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pec_events`
--
ALTER TABLE `pec_events`
  ADD CONSTRAINT `pec_events_ibfk_1` FOREIGN KEY (`cal_id`) REFERENCES `pec_calendars` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pec_guests`
--
ALTER TABLE `pec_guests`
  ADD CONSTRAINT `pec_guests_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `pec_events` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pec_mobile_calendar_settings`
--
ALTER TABLE `pec_mobile_calendar_settings`
  ADD CONSTRAINT `pec_mobile_calendar_settings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pec_users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pec_reminders`
--
ALTER TABLE `pec_reminders`
  ADD CONSTRAINT `fk_event_id` FOREIGN KEY (`event_id`) REFERENCES `pec_events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pec_reminders_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `pec_events` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pec_shared_calendars`
--
ALTER TABLE `pec_shared_calendars`
  ADD CONSTRAINT `fk_cal_id` FOREIGN KEY (`cal_id`) REFERENCES `pec_calendars` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pec_user_permissions`
--
ALTER TABLE `pec_user_permissions`
  ADD CONSTRAINT `pec_user_permissions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pec_users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pec_user_share_free_busy`
--
ALTER TABLE `pec_user_share_free_busy`
  ADD CONSTRAINT `pec_user_share_free_busy_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pec_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pec_user_share_free_busy_ibfk_2` FOREIGN KEY (`shared_user_id`) REFERENCES `pec_users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pec_users`
--
ALTER TABLE `pec_users`
  ADD CONSTRAINT `fk_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `pec_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
