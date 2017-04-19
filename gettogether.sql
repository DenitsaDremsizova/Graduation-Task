-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2017 at 06:41 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gettogether`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `datetime` datetime NOT NULL,
  `author_id` int(11) NOT NULL,
  `commented_post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments_likes`
--

CREATE TABLE `comments_likes` (
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`) VALUES
(1, 'Afghanistan'),
(2, 'Aland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia, Plurinational State of'),
(28, 'Bonaire, Sint Eustatius and Saba'),
(29, 'Bosnia and Herzegovina'),
(30, 'Botswana'),
(31, 'Bouvet Island'),
(32, 'Brazil'),
(33, 'British Indian Ocean Territory'),
(34, 'Brunei Darussalam'),
(35, 'Bulgaria'),
(36, 'Burkina Faso'),
(37, 'Burundi'),
(38, 'Cambodia'),
(39, 'Cameroon'),
(40, 'Canada'),
(41, 'Cape Verde'),
(42, 'Cayman Islands'),
(43, 'Central African Republic'),
(44, 'Chad'),
(45, 'Chile'),
(46, 'China'),
(47, 'Christmas Island'),
(48, 'Cocos (Keeling) Islands'),
(49, 'Colombia'),
(50, 'Comoros'),
(51, 'Congo'),
(52, 'Congo, the Democratic Republic of the'),
(53, 'Cook Islands'),
(54, 'Costa Rica'),
(55, 'Cote d''Ivoire'),
(56, 'Croatia'),
(57, 'Cuba'),
(58, 'Curacao'),
(59, 'Cyprus'),
(60, 'Czech Republic'),
(61, 'Denmark'),
(62, 'Djibouti'),
(63, 'Dominica'),
(64, 'Dominican Republic'),
(65, 'Ecuador'),
(66, 'Egypt'),
(67, 'El Salvador'),
(68, 'Equatorial Guinea'),
(69, 'Eritrea'),
(70, 'Estonia'),
(71, 'Ethiopia'),
(72, 'Falkland Islands (Malvinas)'),
(73, 'Faroe Islands'),
(74, 'Fiji'),
(75, 'Finland'),
(76, 'France'),
(77, 'French Guiana'),
(78, 'French Polynesia'),
(79, 'French Southern Territories'),
(80, 'Gabon'),
(81, 'Gambia'),
(82, 'Georgia'),
(83, 'Germany'),
(84, 'Ghana'),
(85, 'Gibraltar'),
(86, 'Greece'),
(87, 'Greenland'),
(88, 'Grenada'),
(89, 'Guadeloupe'),
(90, 'Guam'),
(91, 'Guatemala'),
(92, 'Guernsey'),
(93, 'Guinea'),
(94, 'Guinea-Bissau'),
(95, 'Guyana'),
(96, 'Haiti'),
(97, 'Heard Island and McDonald Islands'),
(98, 'Holy See (Vatican City State)'),
(99, 'Honduras'),
(100, 'Hong Kong'),
(101, 'Hungary'),
(102, 'Iceland'),
(103, 'India'),
(104, 'Indonesia'),
(105, 'Iran, Islamic Republic of'),
(106, 'Iraq'),
(107, 'Ireland'),
(108, 'Isle of Man'),
(109, 'Israel'),
(110, 'Italy'),
(111, 'Jamaica'),
(112, 'Japan'),
(113, 'Jersey'),
(114, 'Jordan'),
(115, 'Kazakhstan'),
(116, 'Kenya'),
(117, 'Kiribati'),
(118, 'Korea, Democratic People''s Republic of'),
(119, 'Korea, Republic of'),
(120, 'Kuwait'),
(121, 'Kyrgyzstan'),
(122, 'Lao People''s Democratic Republic'),
(123, 'Latvia'),
(124, 'Lebanon'),
(125, 'Lesotho'),
(126, 'Liberia'),
(127, 'Libya'),
(128, 'Liechtenstein'),
(129, 'Lithuania'),
(130, 'Luxembourg'),
(131, 'Macao'),
(132, 'Macedonia, the former Yugoslav Republic of'),
(133, 'Madagascar'),
(134, 'Malawi'),
(135, 'Malaysia'),
(136, 'Maldives'),
(137, 'Mali'),
(138, 'Malta'),
(139, 'Marshall Islands'),
(140, 'Martinique'),
(141, 'Mauritania'),
(142, 'Mauritius'),
(143, 'Mayotte'),
(144, 'Mexico'),
(145, 'Micronesia, Federated States of'),
(146, 'Moldova, Republic of'),
(147, 'Monaco'),
(148, 'Mongolia'),
(149, 'Montenegro'),
(150, 'Montserrat'),
(151, 'Morocco'),
(152, 'Mozambique'),
(153, 'Myanmar'),
(154, 'Namibia'),
(155, 'Nauru'),
(156, 'Nepal'),
(157, 'Netherlands'),
(158, 'New Caledonia'),
(159, 'New Zealand'),
(160, 'Nicaragua'),
(161, 'Niger'),
(162, 'Nigeria'),
(163, 'Niue'),
(164, 'Norfolk Island'),
(165, 'Northern Mariana Islands'),
(166, 'Norway'),
(167, 'Oman'),
(168, 'Pakistan'),
(169, 'Palau'),
(170, 'Palestinian Territory, Occupied'),
(171, 'Panama'),
(172, 'Papua New Guinea'),
(173, 'Paraguay'),
(174, 'Peru'),
(175, 'Philippines'),
(176, 'Pitcairn'),
(177, 'Poland'),
(178, 'Portugal'),
(179, 'Puerto Rico'),
(180, 'Qatar'),
(181, 'Reunion'),
(182, 'Romania'),
(183, 'Russian Federation'),
(184, 'Rwanda'),
(185, 'Saint Bartholemy'),
(186, 'Saint Helena, Ascension and Tristan da Cunha'),
(187, 'Saint Kitts and Nevis'),
(188, 'Saint Lucia'),
(189, 'Saint Martin (French part)'),
(190, 'Saint Pierre and Miquelon'),
(191, 'Saint Vincent and the Grenadines'),
(192, 'Samoa'),
(193, 'San Marino'),
(194, 'Sao Tome and Principe'),
(195, 'Saudi Arabia'),
(196, 'Senegal'),
(197, 'Serbia'),
(198, 'Seychelles'),
(199, 'Sierra Leone'),
(200, 'Singapore'),
(201, 'Sint Maarten (Dutch part)'),
(202, 'Slovakia'),
(203, 'Slovenia'),
(204, 'Solomon Islands'),
(205, 'Somalia'),
(206, 'South Africa'),
(207, 'South Georgia and the South Sandwich Islands'),
(208, 'South Sudan'),
(209, 'Spain'),
(210, 'Sri Lanka'),
(211, 'Sudan'),
(212, 'Suriname'),
(213, 'Svalbard and Jan Mayen'),
(214, 'Swaziland'),
(215, 'Sweden'),
(216, 'Switzerland'),
(217, 'Syrian Arab Republic'),
(218, 'Taiwan, Province of China'),
(219, 'Tajikistan'),
(220, 'Tanzania, United Republic of'),
(221, 'Thailand'),
(222, 'Timor-Leste'),
(223, 'Togo'),
(224, 'Tokelau'),
(225, 'Tonga'),
(226, 'Trinidad and Tobago'),
(227, 'Tunisia'),
(228, 'Turkey'),
(229, 'Turkmenistan'),
(230, 'Turks and Caicos Islands'),
(231, 'Tuvalu'),
(232, 'Uganda'),
(233, 'Ukraine'),
(234, 'United Arab Emirates'),
(235, 'United Kingdom'),
(236, 'United States'),
(237, 'United States Minor Outlying Islands'),
(238, 'Uruguay'),
(239, 'Uzbekistan'),
(240, 'Vanuatu'),
(241, 'Venezuela, Bolivarian Republic of'),
(242, 'Viet Nam'),
(243, 'Virgin Islands, British'),
(244, 'Virgin Islands, U.S.'),
(245, 'Wallis and Futuna'),
(246, 'Western Sahara'),
(247, 'Yemen'),
(248, 'Zambia'),
(249, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `friendships`
--

CREATE TABLE `friendships` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friendships`
--

INSERT INTO `friendships` (`user_id`, `friend_id`, `date`) VALUES
(1, 2, '2017-04-19 00:00:00'),
(1, 3, '2017-04-19 00:00:00'),
(2, 5, '2017-04-19 00:00:00'),
(4, 1, '2017-04-19 00:00:00'),
(5, 3, '2017-04-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_requests`
--

CREATE TABLE `group_requests` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` int(11) NOT NULL,
  `interest` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `language` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`) VALUES
(1, 'Abkhaz'),
(2, 'Afar'),
(3, 'Afrikaans'),
(4, 'Akan'),
(5, 'Albanian'),
(6, 'Amharic'),
(7, 'Arabic'),
(8, 'Aragonese'),
(9, 'Armenian'),
(10, 'Assamese'),
(11, 'Avaric'),
(12, 'Avestan'),
(13, 'Aymara'),
(14, 'Azerbaijani'),
(15, 'Bambara'),
(16, 'Bashkir'),
(17, 'Basque'),
(18, 'Belarusian'),
(19, 'Bengali (Bangla)'),
(20, 'Bihari'),
(21, 'Bislama'),
(22, 'Bosnian'),
(23, 'Breton'),
(24, 'Bulgarian'),
(25, 'Burmese'),
(26, 'Catalan'),
(27, 'Chamorro'),
(28, 'Chechen'),
(29, 'Chichewa (Chewa)'),
(30, 'Chinese'),
(31, 'Chuvash'),
(32, 'Cornish'),
(33, 'Corsican'),
(34, 'Cree'),
(35, 'Croatian'),
(36, 'Czech'),
(37, 'Danish'),
(38, 'Diveh (Maldivian)'),
(39, 'Dutch'),
(40, 'Dzongkha'),
(41, 'English'),
(42, 'Esperanto'),
(43, 'Estonian'),
(44, 'Ewe'),
(45, 'Faroese'),
(46, 'Fijian'),
(47, 'Finnish'),
(48, 'French'),
(49, 'Fulah (Pular)'),
(50, 'Galician'),
(51, 'Georgian'),
(52, 'German'),
(53, 'Greek (modern)'),
(54, 'Guaraní'),
(55, 'Gujarati'),
(56, 'Haitian (Haitian Creole)'),
(57, 'Hausa'),
(58, 'Hebrew (modern)'),
(59, 'Herero'),
(60, 'Hindi'),
(61, 'Hiri Motu'),
(62, 'Hungarian'),
(63, 'Interlingua'),
(64, 'Indonesian'),
(65, 'Interlingue'),
(66, 'Irish'),
(67, 'Igbo'),
(68, 'Inupiaq'),
(69, 'Ido'),
(70, 'Icelandic'),
(71, 'Italian'),
(72, 'Inuktitut'),
(73, 'Japanese'),
(74, 'Javanese'),
(75, 'Kalaallisut (Greenlandic)'),
(76, 'Kannada'),
(77, 'Kanuri'),
(78, 'Kashmiri'),
(79, 'Kazakh'),
(80, 'Khmer'),
(81, 'Kikuyu (Gikuyu)'),
(82, 'Kinyarwanda'),
(83, 'Kyrgyz'),
(84, 'Komi'),
(85, 'Kongo'),
(86, 'Korean'),
(87, 'Kurdish'),
(88, 'Kwanyama (Kuanyama)'),
(89, 'Latin'),
(90, 'Luxembourgish (Letzeburgesch)'),
(91, 'Ganda'),
(92, 'Limburgish (Limburger)'),
(93, 'Lingala'),
(94, 'Lao'),
(95, 'Lithuanian'),
(96, 'Luba-Katanga'),
(97, 'Latvian'),
(98, 'Manx'),
(99, 'Macedonian'),
(100, 'Malagasy'),
(101, 'Malay'),
(102, 'Malayalam'),
(103, 'Maltese'),
(104, 'Maori'),
(105, 'Marathi'),
(106, 'Marshallese'),
(107, 'Mongolian'),
(108, 'Nauruan'),
(109, 'Navajo (Navaho)'),
(110, 'Northern Ndebele'),
(111, 'Nepali'),
(112, 'Ndonga'),
(113, 'Norwegian Bokmal'),
(114, 'Norwegian Nynorsk'),
(115, 'Norwegian'),
(116, 'Nuosu'),
(117, 'Southern Ndebele'),
(118, 'Occitan'),
(119, 'Ojibwe (Ojibwa)'),
(120, 'Old Church Slavonic (Old Bulgarian)'),
(121, 'Oromo'),
(122, 'Oriya'),
(123, 'Ossetian (Ossetic)'),
(124, '(Eastern) Punjabi'),
(125, 'Pali'),
(126, 'Persian (Farsi)'),
(127, 'Polish'),
(128, 'Pashto (Pushto)'),
(129, 'Portuguese'),
(130, 'Quechua'),
(131, 'Romansh'),
(132, 'Kirundi'),
(133, 'Romanian'),
(134, 'Russian'),
(135, 'Sanskrit (Samskrta)'),
(136, 'Sardinian'),
(137, 'Sindhi'),
(138, 'Northern Sami'),
(139, 'Samoan'),
(140, 'Sango'),
(141, 'Serbian'),
(142, 'Scottish Gaelic (Gaelic)'),
(143, 'Shona'),
(144, 'Sinhalese (Sinhala)'),
(145, 'Slovak'),
(146, 'Slovene'),
(147, 'Somali'),
(148, 'Southern Sotho'),
(149, 'Spanish'),
(150, 'Sundanese'),
(151, 'Swahili'),
(152, 'Swati'),
(153, 'Swedish'),
(154, 'Tamil'),
(155, 'Telugu'),
(156, 'Tajik'),
(157, 'Thai'),
(158, 'Tigrinya'),
(159, 'Tibetan Standard (Tibetan)'),
(160, 'Turkmen'),
(161, 'Tagalog'),
(162, 'Tswana'),
(163, 'Tonga (Tonga Islands)'),
(164, 'Turkish'),
(165, 'Tsonga'),
(166, 'Tatar'),
(167, 'Twi'),
(168, 'Tahitian'),
(169, 'Uyghur'),
(170, 'Ukrainian'),
(171, 'Urdu'),
(172, 'Uzbek'),
(173, 'Venda'),
(174, 'Vietnamese'),
(175, 'Volapük'),
(176, 'Walloon'),
(177, 'Welsh'),
(178, 'Wolof'),
(179, 'Western Frisian'),
(180, 'Xhosa'),
(181, 'Yiddish'),
(182, 'Yoruba'),
(183, 'Zhuang (Chuang)'),
(184, 'Zulu');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `text` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `file` varchar(200) CHARACTER SET utf8 NOT NULL,
  `album_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timeline_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `type`, `date_time`, `timeline_id`) VALUES
(1, 1, 'text_posts', '2017-03-19 17:16:56', 1),
(2, 1, 'text_posts', '2017-03-30 18:21:00', 1),
(3, 1, 'text_posts', '2017-04-19 17:00:06', 1),
(4, 1, 'text_posts', '2017-02-19 17:16:56', 1),
(5, 1, 'text_posts', '2017-04-19 15:36:35', 2),
(6, 3, 'text_posts', '2016-04-19 15:36:35', 1),
(7, 2, 'text_posts', '2017-04-19 17:25:32', 2),
(8, 1, 'video_posts', '2017-04-19 18:09:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts_likes`
--

CREATE TABLE `posts_likes` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `text_posts`
--

CREATE TABLE `text_posts` (
  `id` int(11) NOT NULL,
  `text` varchar(1000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `text_posts`
--

INSERT INTO `text_posts` (`id`, `text`) VALUES
(1, 'post 1'),
(2, 'post 2'),
(3, 'post 3'),
(4, 'post 4'),
(5, 'post 5'),
(6, 'post 6'),
(7, 'post 7');

-- --------------------------------------------------------

--
-- Table structure for table `timelines`
--

CREATE TABLE `timelines` (
  `id` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `date_started` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timelines`
--

INSERT INTO `timelines` (`id`, `type`, `date_started`) VALUES
(1, 'users', '2017-19-04'),
(2, 'users', '2017-19-04'),
(3, 'users', '2017-19-04'),
(4, 'users', '2017-19-04'),
(5, 'users', '2017-19-04');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_videos`
--

CREATE TABLE `uploaded_videos` (
  `id` int(11) NOT NULL,
  `text` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `file` varchar(200) CHARACTER SET utf8 NOT NULL,
  `album_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(70) NOT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `date_of_birth` datetime NOT NULL,
  `personal_info` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`, `date_of_birth`, `personal_info`) VALUES
(1, 'Denitsa', 'Dremsizova', 'denitsa.dremsizova@gmail.com', '3a7306a7751a1079497609b718251c4a4d76a375f3d893280f1e50db6cbaf5a8', 'F', '1985-03-07 00:00:00', 'bla-bla'),
(2, 'Luka-Bokluka', 'Makariopolski', 'bokluka@yahoo.com', '3a7306a7751a1079497609b718251c4a4d76a375f3d893280f1e50db6cbaf5a8', 'M', '1987-08-15 00:00:00', NULL),
(3, 'Yan', 'Bibiyan', 'yan@abv.bg', '3a7306a7751a1079497609b718251c4a4d76a375f3d893280f1e50db6cbaf5a8', 'M', '1990-09-23 00:00:00', NULL),
(4, 'Fred', 'Flinstone', 'fred@bedrock.com', '3a7306a7751a1079497609b718251c4a4d76a375f3d893280f1e50db6cbaf5a8', 'M', '1970-01-01 00:00:00', NULL),
(5, 'Pesho', 'Ivanov', 'pesho@yahoo.com', '3a7306a7751a1079497609b718251c4a4d76a375f3d893280f1e50db6cbaf5a8', 'M', '1998-03-02 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quae cum essent dicta, discessimus. Duo Reges: constructio interrete. Illud dico, ea, quae dicat, praeclare inter se cohaerere. Ergo opifex plus sibi proponet ad formarum quam civis excellens ad factorum pulchritudinem? Inquit, dasne adolescenti veniam? Quamquam tu hanc copiosiorem etiam soles dicere. ');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `users_id` int(11) NOT NULL,
  `groups_id` int(11) NOT NULL,
  `is_owner` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_languages`
--

CREATE TABLE `users_languages` (
  `user_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `street_address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video_posts`
--

CREATE TABLE `video_posts` (
  `id` int(11) NOT NULL,
  `link` varchar(500) CHARACTER SET utf8 NOT NULL,
  `text` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_posts`
--

INSERT INTO `video_posts` (`id`, `link`, `text`) VALUES
(8, 'https://www.youtube.com/watch?v=BWXggB-T1jQ', 'some text');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `position` varchar(100) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_albums_users1_idx` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comments_users_idx` (`author_id`),
  ADD KEY `FK_comments_posts_idx` (`commented_post_id`);

--
-- Indexes for table `comments_likes`
--
ALTER TABLE `comments_likes`
  ADD PRIMARY KEY (`user_id`,`comment_id`),
  ADD KEY `FK_comments_likes_comments_idx` (`comment_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`user_id`,`friend_id`),
  ADD KEY `FK_friendships_users2_idx` (`friend_id`),
  ADD KEY `FK_friendships_users1_idx` (`user_id`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`sender_id`,`reciever_id`),
  ADD KEY `fk_friend_requests_users1_idx` (`sender_id`),
  ADD KEY `fk_friend_requests_users2_idx` (`reciever_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_requests`
--
ALTER TABLE `group_requests`
  ADD PRIMARY KEY (`group_id`,`user_id`),
  ADD KEY `fk_group_requests_groups1_idx` (`group_id`),
  ADD KEY `fk_group_requests_users1_idx` (`user_id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_interests_users_idx` (`user_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_photos_albums_idx` (`album_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_posts_users_idx` (`author_id`),
  ADD KEY `FK_posts_timelines_idx` (`type`),
  ADD KEY `FK_posts_timelines_idx1` (`timeline_id`);

--
-- Indexes for table `posts_likes`
--
ALTER TABLE `posts_likes`
  ADD PRIMARY KEY (`user_id`,`post_id`),
  ADD KEY `FK_posts_likes_posts_idx` (`post_id`);

--
-- Indexes for table `text_posts`
--
ALTER TABLE `text_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timelines`
--
ALTER TABLE `timelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploaded_videos`
--
ALTER TABLE `uploaded_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_uploaded_videos_albums_idx` (`album_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`users_id`,`groups_id`),
  ADD KEY `FK_users_groups_groups_idx` (`groups_id`);

--
-- Indexes for table `users_languages`
--
ALTER TABLE `users_languages`
  ADD PRIMARY KEY (`user_id`,`lang_id`),
  ADD KEY `FK_users_languages_languages_idx` (`lang_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_address_users1_idx` (`user_id`),
  ADD KEY `FK_user_address_countries_idx` (`country_id`);

--
-- Indexes for table `video_posts`
--
ALTER TABLE `video_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_work_experience_users1_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `timelines`
--
ALTER TABLE `timelines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `fk_albums_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_comments_posts` FOREIGN KEY (`commented_post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_comments_users` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments_likes`
--
ALTER TABLE `comments_likes`
  ADD CONSTRAINT `FK_comments_likes_comments` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_comments_likes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friendships`
--
ALTER TABLE `friendships`
  ADD CONSTRAINT `FK_friendships_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_friendships_users2` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD CONSTRAINT `FK_friend_requests_users1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_friend_requests_users2` FOREIGN KEY (`reciever_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `FK_groups_timelines` FOREIGN KEY (`id`) REFERENCES `timelines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_requests`
--
ALTER TABLE `group_requests`
  ADD CONSTRAINT `FK_group_requests_groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_group_requests_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `interests`
--
ALTER TABLE `interests`
  ADD CONSTRAINT `fk_interests_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `FK_photos_albums` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_photos_posts` FOREIGN KEY (`id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_posts_timelines` FOREIGN KEY (`timeline_id`) REFERENCES `timelines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_posts_users` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts_likes`
--
ALTER TABLE `posts_likes`
  ADD CONSTRAINT `FK_posts_likes_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_posts_likes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `text_posts`
--
ALTER TABLE `text_posts`
  ADD CONSTRAINT `FK_text_posts_posts` FOREIGN KEY (`id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uploaded_videos`
--
ALTER TABLE `uploaded_videos`
  ADD CONSTRAINT `FK_uploaded_videos_albums` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_uploaded_videos_posts` FOREIGN KEY (`id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_timelines` FOREIGN KEY (`id`) REFERENCES `timelines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `FK_users_groups_groups` FOREIGN KEY (`groups_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_users_groups_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_languages`
--
ALTER TABLE `users_languages`
  ADD CONSTRAINT `FK_users_languages_languages` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_users_languages_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `FK_user_address_countries` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_address_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `video_posts`
--
ALTER TABLE `video_posts`
  ADD CONSTRAINT `FK_video_posts_posts` FOREIGN KEY (`id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD CONSTRAINT `fk_work_experience_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
