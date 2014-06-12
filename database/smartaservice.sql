-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2014 at 08:17 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smartaservice`
--
CREATE DATABASE IF NOT EXISTS `smartaservice` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `smartaservice`;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_name` varchar(100) NOT NULL DEFAULT 'Required',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `album_name`) VALUES
(16, 'ljsldjlfsdljf '),
(20, 'asdf'),
(21, 'dfdf');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL DEFAULT 'Required',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(10, 'File'),
(13, 'Featured Item'),
(14, 'Offers');

-- --------------------------------------------------------

--
-- Table structure for table `comment_store`
--

CREATE TABLE IF NOT EXISTS `comment_store` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(200) CHARACTER SET utf8 NOT NULL,
  `comment_association_id` varchar(64) NOT NULL,
  `comment_user_name` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `comment_store`
--

INSERT INTO `comment_store` (`Id`, `comment`, `comment_association_id`, `comment_user_name`) VALUES
(9, 'djasKSJHJDIHIUDSA', 'post/3', '');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rate` double NOT NULL,
  `exp_date` date NOT NULL,
  `user` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `key`, `rate`, `exp_date`, `user`, `status`) VALUES
(1, 'Q1LP3', 450, '2014-06-16', '', '0'),
(2, '2QI4U', 10, '2014-05-26', '', '0'),
(3, 'MCMDE', 50, '2014-05-28', '', '0'),
(4, 'FRPLZ', 1, '2014-06-30', '', '0'),
(5, 'KJUWP', 1, '2014-06-30', '', '0'),
(6, 'SLVUL', 1, '2014-06-30', '', '0'),
(7, '7CKMT', 1, '2014-06-30', '', '0'),
(8, 'KH1B6', 1, '2014-06-30', '', '0'),
(9, 'N794H', 1, '2014-06-23', '', '0'),
(10, 'GIGHF', 1, '2014-06-08', '', '0'),
(11, '9BZ7I', 1, '2014-06-16', '', '0'),
(12, '4H571', 1, '2014-06-09', '', '0'),
(13, 'DQ75A', 1, '2014-06-30', '', '0'),
(14, 'EV4CE', 1, '2014-06-09', '', '0'),
(15, '6YE2W', 1, '2014-06-10', '', '0'),
(16, '6LEE3', 1, '2014-06-16', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `design_setup`
--

CREATE TABLE IF NOT EXISTS `design_setup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `design_setup`
--

INSERT INTO `design_setup` (`id`, `name`, `description`) VALUES
(0, 'header_title', 'Smart Access Services'),
(1, 'header_logo', 'smartaccess_logo3.png'),
(2, 'header_description', 'Smart Access Services'),
(3, 'header_bgcolor', '#000000'),
(4, 'sidebar_title', 'Quick navigation'),
(5, 'sidebar_description', 'changed by ramu'),
(6, 'sidebar_bgcolor', 'FFFFFF');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `details` varchar(500) CHARACTER SET utf8 NOT NULL,
  `location` varchar(200) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `details`, `location`, `date`, `image`) VALUES
(1, 'first bdiufs shjaoibfdsbiusa sdihhdoisa daijhsbuibqsaoiedbsa uhsaouihdsouabdonsa', '                  hello<br>', 'nepal', '2014-06-08 18:15:00', 'LOGO100_100.png'),
(3, 'WE ARE PLEASED TO OFFER A SPECIAL IOFFER FOR THE HXGFHDHDSB VSAFCBV BDSHJBFJH BHDSJAF', '            We are pleased to inform all our valued customers that we are going tom launch the movie Chhadke by Nigam Shrestha.<br>', 'Melburne, Australia', '2014-06-19 06:00:00', 'booking12.jpg'),
(4, 'this is the new event', 'this the the detail page<br>', 'Melburne, Australia', '2014-06-10 18:15:00', 'sdfsd.png'),
(5, 'upcomming events', 'ashyuifguibhj sagyu gsvayu ysgaiyuas <br>', 'gasiu c', '2014-06-18 18:15:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gadgets`
--

CREATE TABLE IF NOT EXISTS `gadgets` (
  `gadget_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `textBox` varchar(100) CHARACTER SET utf8 NOT NULL,
  `defaultGadget` text CHARACTER SET utf8 NOT NULL,
  `type` text CHARACTER SET utf8 NOT NULL,
  `display` varchar(200) CHARACTER SET utf8 NOT NULL,
  `setting` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`gadget_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=231 ;

--
-- Dumping data for table `gadgets`
--

INSERT INTO `gadgets` (`gadget_id`, `name`, `textBox`, `defaultGadget`, `type`, `display`, `setting`) VALUES
(226, 'Social Network', 'textBox', '', 'Facebook<br>\r\nTwitter<br>\r\nLinkid<br>\r\nFacebook<br>\r\nFacebook<br>\r\nFacebook<br>', 'Footer', ''),
(225, 'Recent Post', '', 'recent post', '', 'Sidebar', 'post=3&titleBold=&titleUnderline=&titleColor='),
(224, '<b>Tihar Offer!!!</b>', 'textBox', '', '10% Discount in all the product you buy. Hurry your shopping.', 'Header', ''),
(229, 'sdlfhkahadslf', 'textBox', '', 'sdf', 'Choose', ''),
(228, 'sdhfsdfhsdfh', 'textBox', '', 'sd', 'Choose', '');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_name` varchar(100) NOT NULL DEFAULT 'Required',
  `media_type` varchar(64) DEFAULT 'Required',
  `media_association_id` int(11) DEFAULT NULL,
  `media_link` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_media` (`media_association_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `media_name`, `media_type`, `media_association_id`, `media_link`) VALUES
(20, 'sandjkaskl', 'monkey.jpg', NULL, 'http://localhost/bnw/content/images/monkey.jpg'),
(23, 'sdfdsf', 'logofinal_for_ico_19.png', 20, '0'),
(24, 'sdfdsf', 'tickets-185x1857.jpg', 21, '0');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) NOT NULL DEFAULT 'Required',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_name`) VALUES
(4, 'Home Menu');

-- --------------------------------------------------------

--
-- Table structure for table `meta_data`
--

CREATE TABLE IF NOT EXISTS `meta_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `meta_data`
--

INSERT INTO `meta_data` (`id`, `name`, `value`) VALUES
(1, 'siteurl', 'www.BnW.com'),
(2, 'title', 'B&W Dashboard'),
(3, 'keywords', 'cms'),
(4, 'description', 'cloud system'),
(5, 'favicon_icon', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `misc_setting`
--

CREATE TABLE IF NOT EXISTS `misc_setting` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `description` varchar(64) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `misc_setting`
--

INSERT INTO `misc_setting` (`Id`, `name`, `description`) VALUES
(0, 'show_comment', '1'),
(1, 'show_like', '1'),
(2, 'show_share', '1'),
(3, 'max_post_to_show', '10'),
(4, 'max_page_to_show', '5'),
(5, 'slide_height', '500'),
(6, 'slide_width', '500');

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE IF NOT EXISTS `navigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `navigation_name` varchar(100) NOT NULL DEFAULT 'Required',
  `navigation_link` mediumtext,
  `parent_id` int(11) DEFAULT NULL,
  `navigation_type` varchar(64) DEFAULT NULL,
  `navigation_slug` varchar(64) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_navigation` (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=145 ;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `navigation_name`, `navigation_link`, `parent_id`, `navigation_type`, `navigation_slug`, `menu_id`) VALUES
(92, 'File', 'category/10', 0, 'category', 'file', 4),
(93, 'Home', 'index', 0, ' ', 'Home', 4),
(95, ' Nepali', 'category/12', 92, 'category', 'nepali', 4),
(133, 'Contact Us', 'page/10', 92, 'page', 'ContactUs', 4),
(134, 'Product', 'http://localhost/smartaservice/index.php/view/category/14', 0, 'category', 'Product', 4),
(135, 'Contact Us', 'http://localhost/smartaservice/index.php/view/page/10', 0, 'page', 'ContactUs', 4),
(136, 'new category', 'http://localhost/smartaservice/index.php/view/category/15', 0, 'category', 'newcategory', 4),
(137, 'Contact Us', 'contact', 0, ' ', 'ContactUs', 4),
(138, 'Events', 'events', 0, ' ', 'Events', 4),
(139, 'File', 'http://localhost/SmartCart/index.php/view/category/10', 0, 'category', 'File', 4),
(140, 'Featured Item', 'http://localhost/SmartCart/index.php/view/category/13', 0, 'category', 'FeaturedItem', 4),
(141, 'Offers', 'http://localhost/SmartCart/index.php/view/category/14', 0, 'category', 'Offers', 4),
(142, 'File', 'http://localhost/SmartCart/index.php/view/category/10', 141, 'category', 'File', 4),
(143, 'Featured Item', 'http://localhost/SmartCart/index.php/view/category/13', 141, 'category', 'FeaturedItem', 4),
(144, 'Offers', 'http://localhost/SmartCart/index.php/view/category/14', 141, 'category', 'Offers', 4);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(100) NOT NULL DEFAULT 'Required',
  `page_content` text NOT NULL,
  `page_author_id` int(11) NOT NULL,
  `page_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `page_summary` mediumtext,
  `page_status` varchar(100) NOT NULL,
  `page_modifed_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `page_parent` int(11) NOT NULL,
  `page_order` int(11) DEFAULT NULL,
  `page_type` varchar(100) DEFAULT NULL,
  `page_tags` mediumtext,
  `allow_comment` tinyint(1) NOT NULL,
  `allow_like` tinyint(1) NOT NULL,
  `allow_share` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `page_name`, `page_content`, `page_author_id`, `page_date`, `page_summary`, `page_status`, `page_modifed_date`, `page_parent`, `page_order`, `page_type`, `page_tags`, `allow_comment`, `allow_like`, `allow_share`) VALUES
(10, 'Contact Us', '<b>&nbsp;Salyani Organization </b><br>Lions Chowk, Narayanghad<br>Chitwan<br>', 11, '2014-05-20 05:20:17', '<b>&nbsp;Salyani Organization </b><br>Lions Chowk, Narayanghad<br>Chitwan<br>', '1', '0000-00-00 00:00:00', 0, 0, '0', '0', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` mediumtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `post_author_id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_summary` mediumtext,
  `post_status` mediumtext NOT NULL,
  `comment_status` tinyint(1) DEFAULT NULL,
  `post_modified_date` date DEFAULT NULL,
  `post_tags` mediumtext,
  `post_content` text NOT NULL,
  `post_category` int(11) NOT NULL,
  `allow_comment` tinyint(1) NOT NULL,
  `allow_like` tinyint(1) NOT NULL,
  `allow_share` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_post` (`post_category`),
  KEY `idx_post_0` (`post_author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_title`, `image`, `post_author_id`, `post_date`, `post_summary`, `post_status`, `comment_status`, `post_modified_date`, `post_tags`, `post_content`, `post_category`, `allow_comment`, `allow_like`, `allow_share`) VALUES
(1, 'new ', NULL, 0, '2014-06-09 04:53:02', 'hello<br>', '0', NULL, NULL, NULL, 'hello<br>', 0, 0, 0, 0),
(2, 'DashaingsagfdagsyudgsayugdyusgayudguyasgdyugasyugduyasgduyagsuydgasuygduyasguydgyuasyudasyutduysagdyutsayugfjhcshksaOIDYHDSYUHOISAYUISffer', '', 0, '2014-06-09 06:30:57', '                              Dashaingsagfdagsyudgsayugdyusgayudguyasgdyugasyugduyasgduyagsuydgasuyg', '0', NULL, NULL, NULL, '                              DashaingsagfdagsyudgsayugdyusgayudguyasgdyugasyugduyasgduyagsuydgasuygduyasguydgyuasyudasyutduysagdyutsayugfjhcshksaOIDYHDSYUHOISAYUISffer<br>', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `description` longtext CHARACTER SET utf8 NOT NULL,
  `summary` varchar(200) CHARACTER SET utf8 NOT NULL,
  `category` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `image1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image3` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `shiping` varchar(255) CHARACTER SET utf8 NOT NULL,
  `like` varchar(50) CHARACTER SET utf8 NOT NULL,
  `share` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `qty`, `price`, `name`, `description`, `summary`, `category`, `featured`, `image1`, `image2`, `image3`, `shiping`, `like`, `share`, `status`) VALUES
(27, 1, 500, 'hood', '          ', '            hood<br>', 13, 0, 'tickets-185x1854.jpg', NULL, NULL, '', '', '', 0),
(28, 1, 5, 'cow', '      cow<br>', '      cow<br>', 10, 0, 'emerochino-tickets11.jpg', NULL, NULL, '', '', '', 0),
(29, 1, 11, 'sdfdsf', '                  sdfdsf<br>', '                  sdfdsf<br>', 10, 0, 'Forest-Animals-Deer-Leonid-Afremov-Antelope.jpg', NULL, NULL, '', '', '', 0),
(33, 1, 5000, 'Jacket and venture jacket', '                  This jacket is made up of the leather and regzin. Its a high quality jacket made in indonesia. Its of YCKMD.', '                  This jacket is made up of the leather and regzin. Its a high quality jacket made i', 13, 0, '', '', '', 'disabled', 'disabled', 'enabled', 0),
(34, 1, 2000, 'Paint', '                  This paint is of pure jeans . made in nepal. sakjdfhas', '                  This paint is of pure jeans . made in nepal. sakjdfhas', 13, 0, NULL, NULL, NULL, 'disabled', 'enabled', 'enabled', 0),
(51, 1, 120, 'last', 'sdf&#39;sdfds&quot;dsfsdfd&#39;dsfdsfsdf&#39;sdFSD&quot;Fsdf<br>', 'sdf&#39;sdfds&quot;dsfsdfd&#39;dsfdsfsdf&#39;sdFSD&quot;Fsdf<br>', 13, 0, NULL, NULL, NULL, 'disabled', 'enabled', 'enabled', 0),
(52, 0, 4, 'a', 'a<br>', 'a<br>', 10, 0, 'down1.png', NULL, NULL, 'disabled', '', '', 0),
(53, 1, 44, 'hello', 'sdf<br>', 'sdf<br>', 10, 0, NULL, NULL, NULL, 'disabled', 'enabled', 'enabled', 1),
(54, 1, 4, 'sdfgfdg', '      sdfgfdg<br>', '      sdfgfdg<br>', 10, 0, '', ' ', ' ', 'disabled', 'enabled', 'enabled', 1),
(55, 0, 6, 'jyhagsa', 'hqjagsjhcgdsh<br>', 'hqjagsjhcgdsh<br>', 13, 0, NULL, NULL, NULL, 'enabled', '', '', 0),
(56, 0, 2, 'jkhdsgxchjyvfgs', 'dsjhxgfyhjdg<br>', 'dsjhxgfyhjdg<br>', 10, 0, NULL, NULL, NULL, 'disabled', '', '', 0),
(57, 0, 4, 'whatchanfesftdfgasgudijhsaiohfiudshidsagyhbducsihgdiusahguydhiusagdiuahsuigfiuhadsuigfiudhfiodhuifsd', '      <br>', '      <br>', 10, 0, '', '', '', 'disabled', 'disabled', 'disabled', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
  `pimg_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`pimg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_oder`
--

CREATE TABLE IF NOT EXISTS `product_oder` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `deliver_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `city` varchar(255) CHARACTER SET utf8 NOT NULL,
  `state` varchar(255) CHARACTER SET utf8 NOT NULL,
  `zip` varchar(200) CHARACTER SET utf8 NOT NULL,
  `country` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`o_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product_oder`
--

INSERT INTO `product_oder` (`o_id`, `u_id`, `date`, `user_name`, `deliver_address`, `city`, `state`, `zip`, `country`, `email`, `contact`) VALUES
(1, 11, '2014-05-15', 'hello', 'naranghat', 'chitwan', 'chitwan', '12345', 'nepal', 'rsubedi@salyani.com.np', '123456'),
(4, 11, '0000-00-00', 'sfdf', 'lsdkjf', 'dlksfj', 'sdlkfj', 'sadlkjf', 'ldkjsf', 'ddfbefbf801adf18df823c64a4ae173d', 'sdlfkj');

-- --------------------------------------------------------

--
-- Table structure for table `product_oder_detail`
--

CREATE TABLE IF NOT EXISTS `product_oder_detail` (
  `od_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qty` varchar(255) CHARACTER SET utf8 NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL,
  `trans_id` varchar(11) CHARACTER SET utf8 NOT NULL,
  `trans_num` int(10) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`od_id`),
  KEY `p_id` (`p_id`),
  KEY `o_id` (`o_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `product_oder_detail`
--

INSERT INTO `product_oder_detail` (`od_id`, `o_id`, `p_id`, `qty`, `price`, `total`, `trans_id`, `trans_num`, `status`) VALUES
(80, 1, 34, '1', 0, 0, 'TRD1', 1, '1'),
(81, 1, 33, '1', 0, 0, 'TRD2', 2, '0'),
(83, 1, 29, '5', 50, 0, 'TRN3', 3, '0'),
(84, 1, 29, '8', 0, 0, 'TRN4', 4, '1'),
(85, 1, 27, '8', 6363, 0, 'TRN5', 5, '0'),
(86, 1, 28, '66', 2, 0, 'TRN6', 6, '1'),
(87, 1, 27, '5', 2, 0, 'TRN7', 7, '0'),
(88, 1, 28, '65', 5, 0, 'TRN8', 8, '0');

-- --------------------------------------------------------

--
-- Table structure for table `shiping_cost`
--

CREATE TABLE IF NOT EXISTS `shiping_cost` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `price` double NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `shiping_cost`
--

INSERT INTO `shiping_cost` (`sid`, `price`) VALUES
(1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_name` varchar(100) NOT NULL DEFAULT 'Required',
  `slide_image` varchar(100) NOT NULL DEFAULT 'Required',
  `slide_content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `slide_name`, `slide_image`, `slide_content`) VALUES
(1, 'tes', 'logofinal_for_ico_20.png', 'dfdf'),
(2, 'dsf', 'logofinal_for_ico_21.png', 'dsf'),
(3, 'sdf', 'logofinal_for_ico_22.png', 'asdfffffffffff');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL DEFAULT 'Required',
  `user_fname` varchar(100) DEFAULT NULL,
  `user_lname` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_pass` varchar(64) NOT NULL DEFAULT 'Required',
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_url` mediumtext,
  `user_registered_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_auth_key` varchar(64) DEFAULT NULL,
  `user_status` varchar(64) DEFAULT NULL,
  `user_type` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_fname`, `user_lname`, `user_email`, `user_pass`, `city`, `state`, `zip`, `country`, `contact`, `address`, `user_url`, `user_registered_date`, `user_auth_key`, `user_status`, `user_type`) VALUES
(11, 'admin', 'ramji', 'subedi', 'admin@ad.min', '21232f297a57a5a743894a0e4a801fc3', '', '', '', '', '', '', NULL, '2014-05-11 11:27:48', ' ', '1', '0'),
(12, 'ramji', 'ram', 'ram', 'ramji@salyani.com.np', 'ae3274d5bfa170ca69bb534be5a22467', '', '', '', '', '', 'sadfsdfdsfdsf', NULL, '2014-05-13 06:56:32', 'TL7UVI9645', '1', '1'),
(13, 'adfsdsf', 'sadfsd', 'sdf', 'admin@df.cd', '900150983cd24fb0d6963f7d28e17f72', '', '', '', '', '545', 'asdf', NULL, '2014-05-20 10:14:01', NULL, NULL, '1'),
(34, 'a', 'aa', 'asdfdsf', 'admin@a.l', '0cc175b9c0f1b6a831c399e269772661', '', '', '', '', 'a', 'aa', NULL, '2014-05-27 07:18:37', NULL, '1', '1'),
(35, 'a', 'aa', 'asdfdsf', 'admin@a.l', '0cc175b9c0f1b6a831c399e269772661', '', '', '', '', 'a', 'aa', NULL, '2014-05-27 07:19:03', NULL, '1', '1'),
(37, 'dfg', NULL, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', '', '', '', NULL, NULL, '2014-06-01 10:04:45', NULL, NULL, '1'),
(38, 'rajendra', '', '', 'raj@raj.raj', 'f81c2414e3f4685567201371a38aee4a', '', '', '', '', '', 'street', NULL, '2014-06-09 08:41:56', 'QDZETXPI6F', NULL, '1'),
(39, 'tikanidhi', NULL, NULL, 'tika@gmail.com', 'f152da90134bfbc6c8d5d478c4727dfc', '', '', '', '', '', NULL, NULL, '2014-06-10 08:31:06', NULL, NULL, '1'),
(40, 'dsgjhfvsdhfsd', NULL, NULL, 'asdf@asd.asd', 'a152e841783914146e4bcd4f39100686', '', '', '', '', '', NULL, NULL, '2014-06-10 08:40:09', NULL, NULL, '1'),
(41, 'Dinesh', NULL, NULL, 'madd@asd.asd', 'a152e841783914146e4bcd4f39100686', '', '', '', '', '', NULL, NULL, '2014-06-10 08:48:36', NULL, NULL, '1'),
(42, 'sangam', NULL, NULL, 'sangam@asd.asd', 'a152e841783914146e4bcd4f39100686', '', '', '', '', '', NULL, NULL, '2014-06-10 08:50:31', NULL, NULL, '1'),
(43, 'nabin', NULL, NULL, 'nabin@gmail.com', 'a152e841783914146e4bcd4f39100686', '', '', '', '', '', NULL, NULL, '2014-06-10 09:00:29', NULL, NULL, '1'),
(44, 'dilipa', NULL, NULL, 'dilipa@salyani.com.np', 'a152e841783914146e4bcd4f39100686', '', '', '', '', '', NULL, NULL, '2014-06-10 09:03:13', 'HXBEJ4KWMF', NULL, '1'),
(45, 'rambabu', NULL, NULL, 'ramu@salyani.com', 'a152e841783914146e4bcd4f39100686', '', '', '', '', '', NULL, NULL, '2014-06-10 09:08:45', NULL, NULL, '1'),
(46, 'radhika', NULL, NULL, 'radhika@gmail.com', 'a152e841783914146e4bcd4f39100686', '', '', '', '', '', NULL, NULL, '2014-06-10 09:09:47', NULL, NULL, '1'),
(47, 'radh', NULL, NULL, 'radha@asd.asd', 'a152e841783914146e4bcd4f39100686', '', '', '', '', '', NULL, NULL, '2014-06-10 09:10:45', NULL, NULL, '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `fk_media` FOREIGN KEY (`media_association_id`) REFERENCES `album` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `navigation`
--
ALTER TABLE `navigation`
  ADD CONSTRAINT `fk_navigation_menu` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`);

--
-- Constraints for table `product_oder`
--
ALTER TABLE `product_oder`
  ADD CONSTRAINT `product_oder_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `product_oder_detail`
--
ALTER TABLE `product_oder_detail`
  ADD CONSTRAINT `product_oder_detail_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_oder_detail_ibfk_2` FOREIGN KEY (`o_id`) REFERENCES `product_oder` (`o_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
