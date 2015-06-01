-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2015 at 10:40 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flight`
--

-- --------------------------------------------------------

--
-- Table structure for table `flightlog`
--

CREATE TABLE IF NOT EXISTS `flightlog` (
  `flight_id` int(11) NOT NULL AUTO_INCREMENT,
  `flight_date` date NOT NULL,
  `airfield` varchar(200) NOT NULL,
  `alt_setting` varchar(200) NOT NULL,
  `unit` varchar(200) NOT NULL,
  PRIMARY KEY (`flight_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `flightlog`
--

INSERT INTO `flightlog` (`flight_id`, `flight_date`, `airfield`, `alt_setting`, `unit`) VALUES
(1, '0000-00-00', '', '', ''),
(2, '1970-01-01', '', '', ''),
(3, '2015-05-29', '', '', ''),
(4, '2015-05-26', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `flightlog_details`
--

CREATE TABLE IF NOT EXISTS `flightlog_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flight_id` int(11) NOT NULL,
  `plane` varchar(250) NOT NULL,
  `glider` varchar(250) NOT NULL,
  `takeoff` varchar(250) NOT NULL,
  `plane_landing` varchar(250) NOT NULL,
  `glider_landing` varchar(250) NOT NULL,
  `plane_time` varchar(250) NOT NULL,
  `glider_time` varchar(250) NOT NULL,
  `towplane_max_alt` varchar(250) NOT NULL,
  `pilot` varchar(250) NOT NULL,
  `comments` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `flightlog_details`
--

INSERT INTO `flightlog_details` (`id`, `flight_id`, `plane`, `glider`, `takeoff`, `plane_landing`, `glider_landing`, `plane_time`, `glider_time`, `towplane_max_alt`, `pilot`, `comments`) VALUES
(1, 1, 'sdf', 'sdf', 'asdf', 'asdf', 'asdf', '', '', '', '', ''),
(2, 2, 'sadf', 'asdf', 'asdf', '', '', '', '', '', '', ''),
(3, 3, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'sda', 'fsad', 'sdfa', '', 'sdfasdfasdf'),
(4, 4, 'sadf', 'df', 'sdfa', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `preflight`
--

CREATE TABLE IF NOT EXISTS `preflight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `glider` varchar(250) NOT NULL,
  `pilot_name_seat_1` varchar(250) NOT NULL,
  `pilot_name_seat_2` varchar(250) NOT NULL,
  `launch_method` varchar(200) NOT NULL,
  `flight_type` varchar(100) NOT NULL,
  `training_flight` varchar(100) NOT NULL,
  `guest_start` varchar(100) NOT NULL,
  `flight_date` date NOT NULL,
  `takeoff_time` varchar(200) NOT NULL,
  `landing_time` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `preflight`
--

INSERT INTO `preflight` (`id`, `glider`, `pilot_name_seat_1`, `pilot_name_seat_2`, `launch_method`, `flight_type`, `training_flight`, `guest_start`, `flight_date`, `takeoff_time`, `landing_time`) VALUES
(1, 'asdf', 'asdf', 'asdfasdf', 'asdfasdfasdf', 'Solo', 'Yes', 'Yes', '2015-05-29', 'asdf', 'asdf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
