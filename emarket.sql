-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2016 at 08:30 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `emarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `gtt_01_dtbl_images`
--

CREATE TABLE IF NOT EXISTS `gtt_01_dtbl_images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `is_active` varchar(20) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `gtt_01_dtbl_images`
--

INSERT INTO `gtt_01_dtbl_images` (`image_id`, `image_name`, `image_title`, `category`, `link`, `is_active`) VALUES
(4, 'Gurkha Tours and Travels_b1c214e96ab157b60878f9e6f1eae8ce.jpg', 'Government of Nepal', 'associations', '', 'yes'),
(6, 'Gurkha Tours and Travels_06c3e074d82964f22f1940f462813109.jpg', 'Nepal Tourism Board', 'associations', '', 'yes'),
(9, 'Gurkha Tours and Travels_c9f4edc5c03f940a3e6df275629ce1d1.jpg', 'India Fishing', 'gallery', '', 'yes'),
(10, 'Gurkha Tours and Travels_2607e3922e7bdbfd4aa876fd85ee83b5.jpg', 'Myanmar', 'gallery', '', 'yes'),
(11, 'Gurkha Tours and Travels_5cc6b39ad37f28f738a9de1d389cc5cc.jpg', 'Ghandruk', 'gallery', '', 'yes'),
(12, 'Gurkha Tours and Travels_8d17410e762ff8784f02aa23bd19e585.jpg', 'Mount Everest', 'gallery', '', 'yes'),
(13, 'Gurkha Tours and Travels_ffed685be3ff48fa71be09bc34689fb6.jpg', 'Boudhanath Stupa', 'gallery', '', 'yes'),
(14, 'Gurkha Tours and Travels_55a95e469b72dc140c231a4e0cc9f363.jpg', 'Patan Lalitpur, Kathmandu', 'gallery', '', 'yes'),
(15, 'Gurkha Tours and Travels_cdf1e40a3a9193f538b205a9b33c77a9.jpg', 'Rice Planting in Nepal', 'banner', '', 'yes'),
(16, 'Gurkha Tours and Travels_f811b3b8259165598e1863ae3ef27ee0.jpg', 'Rice Grown in Nepal', 'banner', '', 'yes'),
(17, 'Gurkha Tours and Travels_1730ac108ed9258219a470ac2252467e.jpg', 'Green Leafy Vegetables', 'banner', '', 'yes'),
(18, 'Gurkha Tours and Travels_35fc50cdb5eed086abcbd6bd9e6e96e8.gif', 'Rural Development Program', 'associations', '', 'yes'),
(19, 'Gurkha Tours and Travels_c57caa44b994de5bf85b04c9d3fbe3e8.png', 'Rural development contact', 'associations', '', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `gtt_02_dtbl_services`
--

CREATE TABLE IF NOT EXISTS `gtt_02_dtbl_services` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_title` varchar(100) NOT NULL,
  `keywords` mediumtext NOT NULL,
  `service_description` longtext NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `is_active` varchar(20) NOT NULL,
  `include_search` varchar(20) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gtt_02_dtbl_services`
--

INSERT INTO `gtt_02_dtbl_services` (`service_id`, `service_title`, `keywords`, `service_description`, `image_name`, `image_title`, `is_active`, `include_search`) VALUES
(1, 'Vegetable', 'Cheap fligh in Nepal, International Flights, Domestic Flights, Travels, Tours, Thamel, Kathmandu, Tickets, Flight Tickets,', 'Fresh vegetables is found here.', 'Gurkha Tours and Travels_7b3f6183761e31848c5f8162fc7b1103.jpg', 'Gurkha Flights', 'yes', 'yes'),
(2, 'Animals', 'Hotels, Kathmandu, Nepal, Cheap Hotels, Luxirious Hotels, Pokhara, Chitwan.', 'you can cart different variety of meat product.', 'Gurkha Tours and Travels_8f2fc6d3a4b0554432c76fb4762df272.jpg', 'Hotels', 'yes', 'yes'),
(3, 'Birds', 'Tours, Nepal Tours, Trekking, International Tours,', 'Different types of birds meat are available here.', 'Gurkha Tours and Travels_7452872f4cd00a97a6b29f9a881ef593.jpg', 'Tours', 'yes', 'yes'),
(4, 'Dairy Products', 'Vehicle, Nepal, Kathmandu, Vehicle Hire, Thamel, Cheap Vehicles, Cheap Vehicle hire.', 'Fresh and pure dairy product are available here.', 'Gurkha Tours and Travels_b463f30636baf382bc83d7059d89a743.jpg', 'Vehicle Hire', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `gtt_03_dtbl_offers`
--

CREATE TABLE IF NOT EXISTS `gtt_03_dtbl_offers` (
  `offer_id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_title` varchar(200) NOT NULL,
  `keywords` mediumtext NOT NULL,
  `offer_description` longtext NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `is_active` varchar(20) NOT NULL,
  PRIMARY KEY (`offer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gtt_03_dtbl_offers`
--

INSERT INTO `gtt_03_dtbl_offers` (`offer_id`, `offer_title`, `keywords`, `offer_description`, `image_name`, `image_title`, `is_active`) VALUES
(4, 'Honey Hunting in Nepal', 'Honey Hunting in Nepal, Honey Hunting, Honey Products in Nepal.', 'Honey hunting involves gathering honey from the nests of wild honey bees, and Nepal is especially rich in honeybee diversity, with at least five different honeybee species found in the country. The art of honey hunting is an ancient practice of aboriginal communities who use equipment made of local materials, especially bamboo and bamboo-based fiber materials. The honey hunters of Nepal usually use the following tools when going honey hunting: prang (long bamboo ladders, some as long as 70 m); tokari (bamboo basket); chhyakhal (basket lining); tango (long bamboo stick with a sickle at one end); saaton (bamboo stick with notched end); chcora (filter); donga (wooden wax pot); dabilo (wooden knife); and different kinds of ropes made of bamboo fibers for different functions, such as uab, pecho  koili cho,  koho cho, tuju, and whibe.rnAlthough honey hunting techniques are different in different regions of the country, the basic method of lighting a fire under the bee cliffs to smoke out the bees from the combs is universal. However, the traditional cultural-religious practices carried out before honey hunting by different communities varies from region to region. Generally, about a dozen men at a time are involved in honey hunting. They carry with them the above mentioned items and go to the cliff where colonies of wild honey bees have built their nests. Before starting, the honey hunters first perform a sacrifice and offer worship to the gods. Then, a fire is built from wood and foliage at the cliff base. The smoke disperses the bees upwards from their combs, thus revealing the brood and honey sections.rn', 'Gurkha Tours and Travels_d284f6f1bae644efb653a4cc0a18952f.jpg', 'Honey Hunting', 'yes'),
(5, 'Krishi  Mahotsav', 'Agriculture Mahotsav in Nepal. Agriculture Mela.', 'Krishi Mahotsav is an intensive convergence and mass contact strategy held every year for one full month during May-June. Its critical components include Krishi Mela, Exhibition and Seminars/Talks. Experts from agricultural universities directly interact with farmers at the village level and area specific and crop specific issues and concerns of farmers are attended to. As a result of this programme, State has achieved impressive growth.', 'Gurkha Tours and Travels_b90b7351e76a7a176ea615c7995d6ab4.jpg', 'Agriculture Mela', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `gtt_04_dtbl_general`
--

CREATE TABLE IF NOT EXISTS `gtt_04_dtbl_general` (
  `general_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `keywords` longtext NOT NULL,
  `description` longtext NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `google_plus` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `map` longtext NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  PRIMARY KEY (`general_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gtt_04_dtbl_general`
--

INSERT INTO `gtt_04_dtbl_general` (`general_id`, `owner`, `email`, `username`, `password`, `contact`, `company`, `address`, `keywords`, `description`, `facebook`, `google_plus`, `twitter`, `map`, `image_name`, `image_title`) VALUES
(1, 'FIRST attempt', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '9851236706', 'Rural Emarket', '<b>Nepal</b>, Kathmandu, ', 'FIRST attempt, hackathon, rural emarket, etc.', 'FIRST attempt is a group of freelance web developers', '', '', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.1025445110567!2d85.30877442442923!3d27.714119991877638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fcf7979973%3A0x36be106bda65cd13!2sGurkha+Adventures+-+CLIMB%2C+HIKE%2C+RIDE%2C+PADDLE!5e0!3m2!1sen!2snp!4v1449072812682', 'Gurkha Tours and Travels_28e813bf5b3ef817b1d5a35497dd4324.png', 'Rural Emarket');

-- --------------------------------------------------------

--
-- Table structure for table `gtt_05_dtbl_members`
--

CREATE TABLE IF NOT EXISTS `gtt_05_dtbl_members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(200) NOT NULL,
  `post` varchar(110) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `google_plus` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `is_active` varchar(11) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gtt_05_dtbl_members`
--

INSERT INTO `gtt_05_dtbl_members` (`member_id`, `full_name`, `post`, `image_name`, `image_title`, `facebook`, `google_plus`, `twitter`, `is_active`) VALUES
(1, 'Vjay Thapa', 'System Administrator', 'Gurkha Tours and Travels_0284c33ff25da839969460d4b47b38be.jpg', 'Vijay Thapa', 'https://www.facebook.com/vijaythapa333', 'Asmg anaaanau', 'R  Uafrahhnlaun', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `gtt_06_dtbl_point_of_contact`
--

CREATE TABLE IF NOT EXISTS `gtt_06_dtbl_point_of_contact` (
  `point_of_contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(150) NOT NULL,
  `post` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `address` mediumtext NOT NULL,
  `po_box` varchar(10) NOT NULL,
  `is_active` varchar(10) NOT NULL,
  PRIMARY KEY (`point_of_contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `gtt_06_dtbl_point_of_contact`
--

INSERT INTO `gtt_06_dtbl_point_of_contact` (`point_of_contact_id`, `full_name`, `post`, `email`, `contact`, `country`, `address`, `po_box`, `is_active`) VALUES
(7, 'Gorkha Store House', '', 'gorkha@gmail.com', '54255254524', 'Nepal', 'Gorkha, Nepal', '9491', 'yes'),
(8, 'Chitwan Breeding Center', '', 'chitwan@yahoo.com', '452542525', 'Nepal', 'Chitwan, Nepal', '9485', 'yes'),
(9, 'Pokhara Fisheries', '', 'pokhara@gmail.com', '', 'Nepal', 'Pokhara, Kaski, Nepal', '8343', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `gtt_07_dtbl_pages`
--

CREATE TABLE IF NOT EXISTS `gtt_07_dtbl_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) NOT NULL,
  `keywords` mediumtext NOT NULL,
  `page_description` longtext NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `is_active` varchar(10) NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gtt_07_dtbl_pages`
--

INSERT INTO `gtt_07_dtbl_pages` (`page_id`, `page_title`, `keywords`, `page_description`, `image_name`, `image_title`, `is_active`) VALUES
(1, 'About Us Gurkha Travels', 'Gurkha Tours and Travels, Cheap Flights, International Flights, Domestic Flights Nepal, Cheap Flights in Nepal, Thamel, Kathmandu, Mountain Flights in Nepal, Cheap Flights in Nepal', '<p>Gurkha Travel and Tours is a leader in the Travel Management Industry geared towards providing high quality, enhanced services for travellers. We have the ability to administer a Company-wide travel policy with exceptional data management capability.</p><p>Our purpose-driven, goal-oriented and hard-core dedicated staff within a proactive and responsive Management structure is second to none in the Industry.We operate bearing in mind combinations of low transaction cost with enhanced service level, effective technology solution to optimize objective performance and creative strategies to guide travelers to the point of mutual market share attainment. Gurkha Travel is a well-established Travel Management Company, equipped with modern facilities to meet the needs of the traveling public.</p><p>Gurkha Travels commenced operation in June 1997 and became IATA licensed operator as at 1999. Our operational scope extended internationally to Pretoria, South Africa as at 2010 and London, United Kingdom as at 2012 while we currently operate own offices across five key commercial cities in Nigeria namely: Lagos Island, Lagos Mainland, Ibadan, Port Harcourt and Abuja</p>', 'Gurkha Tours and Travels_a16e18918b4d80ad29880df4d1e3cc96.jpg', 'Gurkha Tours and Travels', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `gtt_08_dtbl_reviews`
--

CREATE TABLE IF NOT EXISTS `gtt_08_dtbl_reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(150) NOT NULL,
  `review` longtext NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `is_active` varchar(10) NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gtt_08_dtbl_reviews`
--

INSERT INTO `gtt_08_dtbl_reviews` (`review_id`, `full_name`, `review`, `image_name`, `image_title`, `is_active`) VALUES
(5, 'Ranabhat', 'Ecupo peco rabfohaw muronmij nemagip culkek de zomrulpu tuz muhu deho coz efasmu izejhud et vuw kiiwa. Lipave duv malka kaaj zikeg ucdatuv ji zac lus gu vihkedil duvwo wosefawev vakninom mafenme or tehi. Ti laju fi tecec ecu lulzawe aki biwegfet gejupes azjuh unesli hewhufrap ziwzujfo gobgabno.', '', 'L ihkgra', 'yes'),
(6, 'Japs', 'Lav sub akeupe gozazjiz harov julazu zibelere jab vag fud tezo ubede kitkoeb. Suk wuhucihed tuvdije jav ifooroos kilvas upifoub uwi dokolvuf kuuj on cipir magmab ceka oga. Leled kuj jimugsu gidu eluaca he budeh sinab konhan pecokidaj vel nuvgoz nikcefdu gifve jato.', 'Gurkha Tours and Travels_0e7992aeb60e8c1292e732b17c060fc5.jpg', 'Uk', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_title` varchar(255) NOT NULL,
  `keywords` longtext NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` mediumtext NOT NULL,
  `category` varchar(255) NOT NULL,
  `is_active` varchar(10) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `keywords`, `rate`, `contact`, `address`, `category`, `is_active`) VALUES
(4, 'Tomato', 'Tomato, Golveda Price in Nepal, Tomato Price in Nepal.', '50', '9753875873', 'Kathmandu, Nepal', 'Vegetable', 'yes'),
(5, 'Cauliflower', 'CauliflowerrnCaulirncauli in kathmandurn', '60', '9843650853', 'Kalimati, kathmandurnrn', 'Vegetable', 'yes'),
(6, 'Cabbage', 'Cabbagernbandarnbandharnvandharnvandarn', '25', '9856234567', 'Tarkari Mandi,Ganesthan', 'Vegetable', 'yes'),
(7, 'Brinjal', 'brinjalrnbhentarnbhantarnventa', '35', '9815232476', 'Tarkari Bajar, Kalimati', 'Vegetable', 'yes'),
(8, 'Bodi', 'bodi', '30', '9812345678', 'chabahill, kathmandu', 'Vegetable', 'yes'),
(9, 'Carrot', 'carrotrngajarrngagar', '65', '9810236590', 'Tarkari Mandi, Ranibari', 'Vegetable', 'yes'),
(10, 'Pumpkin', 'pumpkinrnfarshirnfarsi', '50', '9813253676', 'Kalimati, Kathmandu', 'Vegetable', 'yes'),
(11, 'Cucumber', 'cucumberrnkakrornkaakroorn', '65', '9801235462', 'Tarkari Mandi, Baniyatar', 'Vegetable', 'yes'),
(12, 'Raddish', 'Raddishrnmularnmuularnmullarnmulaa', '54', '9806543210', 'Tarkari Mandi, Rani Bari', 'Vegetable', 'yes'),
(13, 'Spanich', 'spanichrnsaagrnsagrnsaaag', '20', '9806543879', 'Kalimati, Kathmandu', 'Vegetable', 'yes'),
(14, 'EGG', 'eggrnandarnaandarnEGGrnAandarnfulrnfoolrn', '12', '9807654327', 'jagat farm, Jamal', 'Dairy Products', 'yes'),
(15, 'Milk', 'milkrndoodhrndudh', '30', '9805434231', 'Shrestha cow farm, Manamaiju', 'Dairy Products', 'yes'),
(16, 'Cheese', 'cheese', '250', '9807642317', 'sharma dairy, Kalimati', 'Dairy Products', 'yes'),
(17, 'Paneer', 'paneer', '300', '9801243874', 'kajol dairy, sanothimi', 'Dairy Products', 'yes'),
(18, 'curd', 'curdrndahirndhahirn', '45', '9843657612', 'juju dhou dairy, bhaktapur', 'Dairy Products', 'yes'),
(21, 'Ice cream', 'ICE CREAMrnicecream', '45', '9805432789', 'nDs, mahaboudha', 'Dairy Products', 'yes'),
(22, 'Butter', 'butterrnmakhhanrnmakhan', '340', '9801232121', 'nDs, mahaboudha', 'Dairy Products', 'yes'),
(23, 'Lassi', 'lassirnlasirnlaasirnlasssi', '60', '9803245413', 'Indrachowk,Kathmandu ', 'Dairy Products', 'yes'),
(24, 'Powder milk', 'powder milkrnpowder doodh', '560', '9801212121', 'everest store, thamel', 'Dairy Products', 'yes'),
(25, 'Yak Butter', 'yak butterrnyak makhhanrnyak makan', '840', '9807676543', 'shrestha dairy, bhaktapur', 'Dairy Products', 'yes'),
(26, 'chicken', 'henrncockrnkukhurarnmasurnchicken', '320', '9812323465', 'ram dai ko masu pasal, gangabu', 'Birds', 'yes'),
(27, 'ostrich meat', 'ostrichrnostrich meatrnostrich masu', '1000', '984333333', 'Gongabu Fresh House', 'Birds', 'yes'),
(28, 'Local Bhale', 'rato bhalernkukhurarnhenrnchickenrn', '1000', '2345234545', 'Valley Cold Store', 'Birds', 'yes'),
(29, 'Boiler Chicken', 'boiler chickenrncold store ko chickenrnhenrnchickenrn', '320', '8876349023', 'Shrestha Fresh House', 'Birds', 'yes'),
(30, 'Duck', 'haasrnmasurnhasko masu', '500', '9801243874', 'Ram dai ko Pasal', 'Birds', 'yes'),
(31, 'khashi', 'khashirngoat', '840', '9803241526', 'hari daiko mashu pasal, samakhushi', 'Animals', 'yes'),
(32, 'boka', 'bokarngoatrnboka ko mashu', '760', '9806666600', 'krishna cold store, greenland', 'Animals', 'yes'),
(33, 'buff', 'buffrnragornthullo khashi', '400', '9815231423', 'hareran cold store, dhapashi', 'Animals', 'yes'),
(34, ' pork', 'sungoorrnpork', '540', '9804343216', 'thapa cold store, basundhara', 'Animals', 'yes'),
(35, 'dharane kalo bungoor', 'porkrndhrane bungurrnbungur', '540', '98078786543', 'rai cold store, thamel', 'Animals', 'yes'),
(36, 'yak', 'yak ko mashurnyakrnchourigai', '1400', '9843526543', 'thakali cold store, basbari', 'Animals', 'yes'),
(37, 'sheep', 'sheeprnbhedako mashurnbheda ko masurnbheda', '1350', '9843121212', 'thakali cold store, basbari', 'Animals', 'yes');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
