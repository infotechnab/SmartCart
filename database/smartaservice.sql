-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2014 at 06:22 AM
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
(12, 'Nepali'),
(13, 'Featured Item'),
(14, 'Product');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `comment_store`
--

INSERT INTO `comment_store` (`Id`, `comment`, `comment_association_id`, `comment_user_name`) VALUES
(9, 'djasKSJHJDIHIUDSA', 'post/3', ''),
(10, 'djasKSJHJDIHIUDSA', 'post/3', ''),
(11, 'comment', 'view/addcomment', ''),
(12, 'djjkdjudhsufjdaksfoipokwDJICOUJSJA', 'page/2', ''),
(13, 'hi this is a post comment', 'post/3', ''),
(15, 'now the comment is added', 'post/3', ''),
(16, 'now the comment is added', 'post/3', ''),
(17, 'epofojigkosdk[pfs', 'page/3', ' '),
(18, 'now the commenting is easy', 'page/3', ' '),
(19, 'comment is added to page 4', 'page/4', ' '),
(20, 'jewijfowpofiewpoew', 'post/3', ' '),
(21, 'mynew comment', 'post/3', ' '),
(22, 'The last comment', 'post/3', ' '),
(23, 'last added is shown at first', 'post/3', ' '),
(24, 'ramji commented', 'post/3', ' '),
(25, '', 'post/3', ' '),
(26, '', 'post/3', ' '),
(27, 'hdiuhfjhf', 'post/3', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `rate` double NOT NULL,
  `exp_date` date NOT NULL,
  `user` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `key`, `rate`, `exp_date`, `user`, `status`) VALUES
(1, 'Q1LP3', 45, '2014-05-01', '', '0'),
(2, '2QI4U', 10, '2014-05-23', '', '0'),
(3, 'E3Q6H', 5, '2014-05-30', '', '0'),
(4, 'LBMR6', 11, '2014-05-30', '', '0'),
(5, 'JDZSC', 25, '2014-05-31', '', '0'),
(6, 'ESVFM', 12, '2014-05-30', '', '0');

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
(1, 'header_logo', 'addtocart1.png'),
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
  `date` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `details`, `location`, `date`, `image`) VALUES
(1, 'upcoming', 'details are shown here', 'kathmandu nepal', '2014/06/10', ''),
(2, 'TODAY', 'DSGFGSKNBCXVG HDBGSFH HFGDS VCSY GSDUIGW FGQIUGSVFD HGUI EBGIYFDEW', 'CVGXYUHWEIDOF HBEUIHF HBGOIUHV ', '2014/06/01', ''),
(3, 'LAST MONTHS', 'UUDHSUFHDS', 'SDHHFSDUHBBGDUISFS BDHDSVF SUHBFDS', '2014/06/04', ''),
(4, 'UPCOMINHGVDSUGF BVHDS ', 'DBDSHGFYDS GDSYUIFVS HFUDSGF UGDSUYFISD HGIUDSGHUFSDV DIGSFIUDS ', 'DSFGYDSH HBDSIFSD NMASDFVSD XHUSFVDSI', '2014/06/15', '');

-- --------------------------------------------------------

--
-- Table structure for table `gadgets`
--

CREATE TABLE IF NOT EXISTS `gadgets` (
  `gadget_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `textBox` varchar(100) NOT NULL,
  `defaultGadget` text NOT NULL,
  `type` text NOT NULL,
  `display` varchar(200) NOT NULL,
  `setting` text NOT NULL,
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
(1, 'siteurl', 'http://smartaservices.com'),
(2, 'title', 'Smart Access Services'),
(3, 'keywords', 'Cart '),
(4, 'description', 'Shopping Cart'),
(5, 'favicon_icon', 'favicon.png');

-- --------------------------------------------------------

--
-- Table structure for table `misc_setting`
--

CREATE TABLE IF NOT EXISTS `misc_setting` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `description` varchar(64) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=111 ;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `navigation_name`, `navigation_link`, `parent_id`, `navigation_type`, `navigation_slug`, `menu_id`) VALUES
(93, 'Home', 'index', 0, ' ', 'Home', 4),
(94, 'File', 'category/10', 0, 'category', 'file', 4),
(95, ' Nepali', 'category/12', 0, 'category', 'nepali', 4),
(96, 'Featured Item', 'category/13', 0, 'category', 'FeaturedItem', 4),
(102, 'Product', 'category/14', 95, 'category', 'Product', 4),
(103, 'Contact Us', 'page/10', 0, 'page', 'ContactUs', 4),
(104, 'salyani', 'http://salyani.com.np', 0, ' ', 'salyani', 4),
(105, 'dsdadasd', 'index.php/view/page/5', 0, 'page', 'dsdadasd', 4),
(106, 'Contact Us also edited', 'http://localhost/smartaservice/index.php/view/page/4', 0, 'page', 'ContactUsalsoedited', 4),
(107, 'File', 'http://localhost/smartaservice/index.php/view/category/10', 0, 'category', 'File', 4),
(108, 'Featured ', 'category/10', 0, ' ', 'Featured', 4),
(110, 'ramji ', 'http://ramji.com.np', 0, ' ', 'ramji', 4);

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
(4, 'Contact Us also edited', '      Every SDK comes bundled with a couple of sample apps. If you want to \r\nlearn how to use all the Facebook Platform features just download and \r\ninstall the SDK and start hacking.', 10, '2014-03-14 04:44:49', '      Every SDK comes bundled with a couple of sample apps. If you want to \r\nlearn how to use all th', '0', '0000-00-00 00:00:00', 0, 0, '', '0', 0, 0, 0),
(5, 'dsdadasd', 'dasddsad<br>', 10, '2014-03-18 08:28:40', 'dasddsad<br>', '1', '0000-00-00 00:00:00', 0, 0, '0', '0', 0, 0, 0),
(6, 'asdsaddsad', 'dsadaddds<br>', 10, '2014-03-18 08:28:48', 'dsadaddds<br>', '1', '0000-00-00 00:00:00', 0, 0, '0', '0', 0, 0, 0),
(7, 'sdsadadsdddd', 'asdasdasdsasad<br>', 10, '2014-03-18 08:28:56', 'asdasdasdsasad<br>', '1', '0000-00-00 00:00:00', 0, 0, '0', '0', 0, 0, 0),
(8, 'axsas', 'saxasa<br>', 10, '2014-03-18 08:42:00', 'saxasa<br>', '1', '0000-00-00 00:00:00', 0, 0, '0', '0', 0, 0, 0),
(9, 'ssacdsfrgv', 'bgtrgtgdsfcqw<br>', 10, '2014-03-18 08:42:09', 'bgtrgtgdsfcqw<br>', '1', '0000-00-00 00:00:00', 0, 0, '0', '0', 0, 0, 0),
(10, 'Contact Us', '<b>&nbsp;Salyani Organization </b><br>Lions Chowk, Narayanghad<br>Chitwan<br>', 11, '2014-05-20 05:20:17', '<b>&nbsp;Salyani Organization </b><br>Lions Chowk, Narayanghad<br>Chitwan<br>', '1', '0000-00-00 00:00:00', 0, 0, '0', '0', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` mediumtext NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_title`, `post_author_id`, `post_date`, `post_summary`, `post_status`, `comment_status`, `post_modified_date`, `post_tags`, `post_content`, `post_category`, `allow_comment`, `allow_like`, `allow_share`) VALUES
(1, 'Earn $100 in one day by sushil', 11, '2014-03-20 06:05:22', '                                    Entrepreneurs are a different kind of people. They are never \r\nc', '0', 2, NULL, '', '                                    Entrepreneurs are a different kind of people. They are never \r\ncompletely satisfied with the normal, acceptable lifestyle commonly \r\ncalled “successful” by the rest of society. This traditional “success” \r\noften includes a good job, a nice house with a 30-year mortgage, a \r\ncouple of nice cars (on which it’s considered OK to owe a lot of money),\r\n a few weeks of vacation every year from the job you don’t really enjoy,\r\n etc.<br>If you’re reading this blog, you’re probably not content with that kind of success.', 14, 1, 1, 1),
(2, 'how can you freelance by deepika', 11, '2014-03-20 06:07:11', '                                    I’ve been getting a lot of emails lately from people who are l', '0', 2, NULL, '', '                                    I’ve been getting a lot of emails lately from people who are looking \r\nto start working for themselves. &nbsp;Whether it’s a small business on \r\nthe side, or they’re looking to create a full time location independent \r\nbusiness, it’s obvious there’s a lot of entrepreneurial spirit out \r\nthere.<div absolute;="" top:="" -1999px;="" left:="" -1988px;"="" id="stcpDiv">\r\n<p>Along with questions about building a business, I’m asked frequently what business <em>I </em>run.</p>\r\n<p>If we’re going to start getting real about creating a location \r\nindependent income, I’m going to have to build a little bit of \r\ncredibilty.</p>\r\n<p>So here’s what I do:</p>\r\n<h3><em><strong>I’m an SEO Freelancer (for lack of a better term).</strong></em></h3>\r\n<p>For those of you who don’t know what SEO means, it stands for Search \r\nEngine Optimization. Essentially it’s my job to make sure my clients \r\nrank as highly as possible in Google (or other search engines) for the \r\nkey terms that we’ve decided are most important to their success.</p> - \r\nSee more at: \r\nfile:///G:/websites/How to Become an SEO Freelancer in 48 Hours — Location 180 _ Build a Business, Live Anywhere, Achieve Free.</div><div absolute;="" top:="" -1999px;="" left:="" -1988px;"="" id="stcpDiv"><p><br></p><p><br></p><br></div>', 14, 1, 1, 1),
(3, 'Post allowing comment', 10, '2014-03-26 06:35:17', '                                          duifhioakfkdopfuijcnydsbc wdjiofj whoidjc jwpos ciwqsf oiw', '0', 2, NULL, '', '                                          duifhioakfkdopfuijcnydsbc wdjiofj whoidjc jwpos ciwqsf oiwnsdc iwn cdoiqwos hsfoiwejsf coiwbfu d qwhoifbv eifwed wd woijdoqwf vi2whdiwe qwdb weso9jmqw<br>', 7, 1, 0, 1),
(4, 'ramji changed', 11, '2014-04-04 09:32:03', '            sdajsdksal<br>', '0', 2, NULL, '', '            sdajsdksal<br>', 14, 1, 1, 1),
(5, 'dsadasdsa', 10, '2014-04-04 09:32:12', 'dsadasdass<br>', '1', 1, NULL, '', 'dsadasdass<br>', 1, 0, 0, 0),
(6, 'deepika', 11, '2014-04-04 09:32:20', '                                    sadasdsadasdsa<br>', '0', 2, NULL, '', '                                    sadasdsadasdsa<br>', 14, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `summary` varchar(200) NOT NULL,
  `category` int(11) NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `shiping` varchar(255) NOT NULL,
  `like` varchar(50) CHARACTER SET utf8 NOT NULL,
  `share` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `qty`, `price`, `name`, `description`, `summary`, `category`, `image1`, `image2`, `image3`, `shiping`, `like`, `share`, `status`) VALUES
(26, 1, 100, 'ramayan', '      nepali movie<br>', '      nepali movie<br>', 12, 'tickets-185x185.jpg', 'tickets-185x1851.jpg', 'tickets-185x1852.jpg', '', '', '', 0),
(27, 1, 500, 'hood', '            hood<br>', '            hood<br>', 10, 'tickets-185x1854.jpg', NULL, NULL, '', '', '', 0),
(28, 1, 5, 'cow', '      cow<br>', '      cow<br>', 10, 'emerochino-tickets11.jpg', NULL, NULL, '', '', '', 0),
(29, 1, 11, 'sdfdsf', '                  sdfdsf<br>', '                  sdfdsf<br>', 10, 'Forest-Animals-Deer-Leonid-Afremov-Antelope.jpg', NULL, NULL, '', '', '', 0),
(33, 1, 5000, 'Jacket', '            This jacket is made up of the leather and regzin. Its a high quality jacket made in indonesia. Its of YCKMD.', '            This jacket is made up of the leather and regzin. Its a high quality jacket made in indo', 13, NULL, NULL, NULL, 'disabled', 'disabled', 'enabled', 0),
(34, 1, 2000, 'Paint', '                  This paint is of pure jeans . made in nepal. sakjdfhas', '                  This paint is of pure jeans . made in nepal. sakjdfhas', 13, NULL, NULL, NULL, 'disabled', 'enabled', 'enabled', 0),
(38, 1, 12, 'Product', 'sdfsdf<br>', 'sdfsdf<br>', 14, NULL, NULL, NULL, '', '', '', 0),
(40, 1, 0, 'sdas', 'sadas<br>', 'sadas<br>', 10, NULL, NULL, NULL, 'disabled', '', '', 0),
(41, 1, 0, 'adsa', 'sada<br>', 'sada<br>', 10, NULL, NULL, NULL, 'enabled', '', '', 0),
(42, 1, 0, 'nadd ', 'jhgh<br>', 'jhgh<br>', 10, NULL, NULL, NULL, 'enabled', '', '', 0),
(43, 1, 0, 'ramji', '      sqdf<br>', '      sqdf<br>', 10, NULL, NULL, NULL, 'enabled', 'enabled', 'disabled', 0),
(44, 1, 12345, 'nayaupdated', '      new<br>', '      new<br>', 10, NULL, NULL, NULL, 'enabled', '', '', 0),
(45, 1, 0, 'newwithlike', '                  sdas<br>', '                  sdas<br>', 10, 'sss.jpg', NULL, NULL, 'enabled', 'enabled', 'enabled', 0),
(46, 1, 0, 'new with share', '      zx<br>', '      zx<br>', 10, NULL, NULL, NULL, 'disabled', 'disabled', 'enabled', 0),
(47, 1, 0, 'like n share both n ship', '            sa<br>', '            sa<br>', 10, 'charo.jpg', NULL, NULL, 'enabled', 'enabled', 'enabled', 0),
(48, 1, 0, 'gkgkgk', 'jgkg kgg&nbsp; kugkg&nbsp; gk urfufj<br>', 'jgkg kgg&nbsp; kugkg&nbsp; gk urfufj<br>', 10, 'samart_Access_Services.jpg', NULL, NULL, 'disabled', 'enabled', 'enabled', 0),
(49, 1, 29, 'kali', 'bcbcbs<br>', 'bcbcbs<br>', 13, '3-signup.jpg', NULL, NULL, 'disabled', 'enabled', 'enabled', 0),
(50, 1, 500, 'my product', '      dskgfytgw vwqsjhf wqb huwifdc hhwui dbc whsaio dcjsx dsagyudfs svaudgvas sgvfduysa tdfsayudxas gdfy ywqgsiudxv sagdyqs vwsqgd ugfduysx gfsyd duyqwg ydqgdy duihnwqsfgci dgchsdouifb cqwisohnd<br>', '      dskgfytgw vwqsjhf wqb huwifdc hhwui dbc whsaio dcjsx dsagyudfs svaudgvas sgvfduysa tdfsayudxas', 13, 'logo1.png', '', '', 'disabled', 'enabled', 'enabled', 0),
(51, 1, 66, 'bhai ', '            After Successful show of NAI Nabhannu la 2 we are giving back to back hit Nepali Movie Kabaddi.<br rgb(55,="" 64,="" 78);="" font-family:="" helvetica,="" arial,="" ''lucida="" grande'',="" tahoma,="" verdana,="" sans-serif;="" font-size:="" 14px;="" line-height:="" 20px;"=""><span rgb(55,="" 64,="" 78);="" font-family:="" helvetica,="" arial,="" ''lucida="" grande'',="" tahoma,="" verdana,="" sans-serif;="" font-size:="" 14px;="" line-height:="" 20px;"="">Due\r\n to high demand of friends,viewers and supporters we are showing Kabaddi\r\n - Nepali Feature Film in Melbourne on these days respectively</span><br rgb(55,="" 64,="" 78);="" font-family:="" helvetica,="" arial,="" ''lucida="" grande'',="" tahoma,="" verdana,="" sans-serif;="" font-size:="" 14px;="" line-height:="" 20px;"=""><span rgb(55,="" 64,="" 78);="" font-family:="" helvetica,="" arial,="" ''lucida="" grande'',="" tahoma,="" verdana,="" sans-serif;="" font-size:="" 14px;="" line-height:="" 20px;"="">1. J</span><span class="text_exposed_show" inline;="" color:="" rgb(55,="" 64,="" 78);="" font-family:="" helvetica,="" arial,="" ''lucida="" grande'',="" tahoma,="" verdana,="" sans-serif;="" font-size:="" 14px;="" line-height:="" 20px;"="">une 1st 2014 Sunday 6:15 pm (Sold Out)<br>2. June 5th 2014 Thursday 6:15 pm Limited seats (Booking open)<br>3. Jun 15th 2014 Sunday 6:15 pm (Booking Open)<br>Please Contact on these numbers 0430418980, 0433335515, 0426500259 or 0410744289.<br>Booking and ticket purchase online soon from<a href="http://www.smartaservices.com/" rel="nofollow nofollow" target="_blank">http://www.smartaservices.com</a></span>', '            After Successful show of NAI Nabhannu la 2 we are giving back to back hit Nepali Movie K', 13, '1-HOme.jpg', '', '', 'disabled', 'enabled', 'enabled', 0),
(52, 1, 33334, 'Suzuki Katana 1100', 'Suzuki Katana 1100 wire wheel', 'Suzuki Katana 1100 wire wheel', 12, 'forest-animals-pictures1.jpg', NULL, NULL, 'disabled', 'enabled', 'enabled', 0);

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
  `user_name` varchar(255) NOT NULL,
  `deliver_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(200) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
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
  `qty` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `trans_id` varchar(11) NOT NULL,
  `trans_num` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`od_id`),
  KEY `p_id` (`p_id`),
  KEY `o_id` (`o_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `product_oder_detail`
--

INSERT INTO `product_oder_detail` (`od_id`, `o_id`, `p_id`, `qty`, `price`, `trans_id`, `trans_num`, `status`) VALUES
(79, 1, 33, '1', 0, 'TRD1', 1, '0'),
(80, 1, 34, '1', 0, 'TRD1', 1, '1'),
(81, 1, 33, '1', 0, 'TRD2', 2, '0'),
(82, 1, 34, '1', 0, 'TRD2', 2, '0'),
(83, 1, 29, '5', 50, 'TRN3', 3, '0'),
(84, 1, 29, '8', 0, 'TRN4', 4, '1'),
(85, 1, 27, '8', 6363, 'TRN5', 5, '0'),
(86, 1, 28, '66', 2, 'TRN6', 6, '1'),
(87, 1, 27, '5', 2, 'TRN7', 7, '0'),
(88, 1, 28, '65', 5, 'TRN8', 8, '0');

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
(1, 5);

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
  `address` varchar(255) NOT NULL,
  `user_url` mediumtext,
  `user_registered_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_auth_key` varchar(64) DEFAULT NULL,
  `user_status` varchar(64) DEFAULT NULL,
  `user_type` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_fname`, `user_lname`, `user_email`, `user_pass`, `city`, `state`, `zip`, `country`, `contact`, `address`, `user_url`, `user_registered_date`, `user_auth_key`, `user_status`, `user_type`) VALUES
(11, 'admin', 'ramji', 'subedi', 'admin@ad.min', '21232f297a57a5a743894a0e4a801fc3', '', '', '', '', '', '', NULL, '2014-05-11 11:27:48', ' ', '1', '0'),
(12, 'ramji', 'ram', 'ram', 'ramji@salyani.com.np', 'ae3274d5bfa170ca69bb534be5a22467', '', '', '', '', '', 'sadfsdfdsfdsf', NULL, '2014-05-13 06:56:32', '', '1', '1'),
(53, 'asdfgh', NULL, NULL, 'asd@asd.asd', '7815696ecbf1c96e6894b779456d330e', '', '', '', '', '', '', NULL, '2014-05-30 09:49:20', 'K2DCL2K5SM', NULL, '1'),
(54, 'ramhari', NULL, NULL, 'ramu@ramu.ramu', 'f81e1273d28fd16562d236ea966809f1', '', '', '', '', '', '', NULL, '2014-05-30 09:53:05', NULL, NULL, '1'),
(56, 'rajendra', 'asd', 'sadsa', 'raj@raj.raj', 'f81c2414e3f4685567201371a38aee4a', 'SASASDA-11', 'SASASAZ', '555555', 'AZSDASA', '98899889888', 'aVGDSHFAS-10', NULL, '2014-06-02 06:17:33', NULL, NULL, '1'),
(57, 'rajendrasdfsd', NULL, NULL, 'lsldjf@ljsd.com', '84d9cfc2f395ce883a41d7ffc1bbcf4e', '', '', '', '', '', '', NULL, '2014-06-03 11:25:05', NULL, NULL, '1'),
(58, 'sldjflsjdf', NULL, NULL, 'lssjddlfjls@kljsdlj.com', '87a0d5726ffc75d0ff4613aec6f0b085', '', '', '', '', '', '', NULL, '2014-06-03 11:26:29', NULL, NULL, '1'),
(59, 'infotechnab', NULL, NULL, 'infotechnab@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '', '', NULL, '2014-06-03 11:44:08', NULL, NULL, '1'),
(60, 'thisnamehas2', NULL, NULL, 'shda@assdsa.as', 'be3f449389755766189956f845811ea0', '', '', '', '', '', '', NULL, '2014-06-03 11:49:59', NULL, NULL, '1'),
(61, 'homnathbag', NULL, NULL, 'bhomnath@outlook.com', 'a152e841783914146e4bcd4f39100686', '', '', '', '', '', '', NULL, '2014-06-03 12:39:05', NULL, NULL, '1'),
(63, 'homna', NULL, NULL, 'bhomnath@gmail.com', '2f85c77edb006d5caa5c52d14f88f044', '', '', '', '', '', '', NULL, '2014-06-05 07:15:33', NULL, NULL, '1'),
(64, 'homnathbaga', NULL, NULL, 'asdfg@gmail.com', '040b7cf4a55014e185813e0644502ea9', '', '', '', '', '', '', NULL, '2014-06-06 11:38:33', NULL, NULL, '1');

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
