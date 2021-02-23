-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 19, 2020 at 10:30 AM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `zoo_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bird`
--

CREATE TABLE `bird` (
  `id` int(11) NOT NULL,
  `species` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `captivity_wild` varchar(255) NOT NULL,
  `date_joined` date NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `average_dimension` varchar(255) NOT NULL,
  `life` varchar(255) NOT NULL,
  `dietary` varchar(255) NOT NULL,
  `habitat` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `bird_net_construction` varchar(255) NOT NULL,
  `bird_clutch` varchar(255) NOT NULL,
  `bird_wing_span` varchar(255) NOT NULL,
  `bird_ability_fly` varchar(255) NOT NULL,
  `bird_plumage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bird`
--

INSERT INTO `bird` (`id`, `species`, `category`, `name`, `photo`, `date_of_birth`, `location`, `captivity_wild`, `date_joined`, `dimension`, `average_dimension`, `life`, `dietary`, `habitat`, `note`, `bird_net_construction`, `bird_clutch`, `bird_wing_span`, `bird_ability_fly`, `bird_plumage`) VALUES
(7, 'Great Horned Owl', 'Bird', 'Great Horned Owl', 'owl.jpg', '1994-06-15', 'AV1-A1', 'Captivity', '2003-02-12', 'Height 5m and Weight 5 kg', 'Height 4.5-22m, and in Weight 4-5 kg', '10-15 years', 'Mice, Voles', 'North America', 'In Central and South America, the great horned owl is the heaviest owl. In North America, only the snowy owl is heavier.', 'trees such as cottonwood, pine, beech', '1-4', '3-5 feet', 'Yes', 'gray-brown'),
(8, 'North African Ostrich', 'BIrd', 'Ostrich', 'ostrich.jpg', '2005-02-14', 'AV1-A2', 'Captivity', '2014-06-16', ' Height 2.4m Weight 110 kg', 'Height 2.1-2.8 m , and in weight 100-120 kg ', '30-40 years', '1 kg leaves', 'Africa', 'North African Ostrich can tolerate a wide range of extreme temperatures', 'small pit in a ground ', '7-10 ', '6 feet ', 'No', 'Grayish-Brown'),
(9, 'American Flamingo', 'Bird', 'Flamin', 'americanflamingo.jpg', '1991-03-14', 'AV2-A1', 'Captivity', '1999-06-16', 'Height 1.3m Weight 3kg', '1.2-1.4  m, and in weight 2.1-4.1 kg', '25-40 years', 'Moistened food called Mazuri Flamingo Complete and Flamingo Breeder.', 'West Indies, Yucatan', 'Flamingos are an iconic bird in American popular culture', 'Mud, Stones and Feathers', '1 ', '1.5 feet', 'Yes', 'white and pink'),
(10, 'Giant Kingfisher', 'Bird', 'Giant', 'giants kingfisher.jpeg', '2000-04-05', 'AV2-A3', 'Captivity', '2005-01-06', 'Height 4 inch, Weight 4 kg', 'Height 4-5 inch, Weight -5 kg', '9-10 years', 'Termites, Wasps, Locusts', 'North America', 'Kingfishers are very good at catching prey.', 'arboreal termite nest', '3-6', '5 feet', 'Yes', 'dark blue, orange '),
(11, 'Australian King Parrot', 'Bird', 'King', 'australian king.jpg', '2003-03-12', 'AV1-A3', 'Captivity', '2007-06-10', 'Height 2 inch, Weight 3 kg', 'Height 2-3 inch, Weight 3-4 kg', '8-9 years', 'Nuts, Seeds, Fruits', 'Africa', 'Parrots tend to favor using one foot more than the other', ' Hollows or cavities dug into cliffs, banks, or the ground', '1-2', '4 feet', 'Yes', 'Red, Green'),
(12, 'Collar Kingfisher', 'Bird', 'Collar', 'collared kingfisher.jpeg', '2007-10-23', 'AV1-A4', 'Captivity', '2013-08-22', 'Height 5 inch, Weight 6 kg', 'Height 4-5 inch, Weight 5-6 kg', '10-15 years', 'Termites, Wasps, Locusts', 'North America', 'Kingfishers are very good at catching prey.', 'Arboreal termite nest', '3-4', '5 feet', 'Yes', 'Blue, Green');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `archive_feedback` varchar(255) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `name`, `message`, `archive_feedback`) VALUES
(15, 'ashesh', 'the animals are very nice', 'false'),
(17, 'carol', 'animals should be at large number', 'true'),
(18, 'samrit', 'animals are very fun to watch', 'true'),
(27, 'akira', 'staff members are very kind', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `fish`
--

CREATE TABLE `fish` (
  `id` int(11) NOT NULL,
  `species` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `captivity_wild` varchar(255) NOT NULL,
  `date_joined` date NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `average_dimension` varchar(255) NOT NULL,
  `life` varchar(255) NOT NULL,
  `dietary` varchar(255) NOT NULL,
  `habitat` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `fish_average_temperature` varchar(255) NOT NULL,
  `fish_water_type` varchar(255) NOT NULL,
  `fish_colour` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fish`
--

INSERT INTO `fish` (`id`, `species`, `category`, `name`, `photo`, `date_of_birth`, `location`, `captivity_wild`, `date_joined`, `dimension`, `average_dimension`, `life`, `dietary`, `habitat`, `note`, `fish_average_temperature`, `fish_water_type`, `fish_colour`) VALUES
(6, 'Common Clown Fish', 'Fish', 'Nemo', 'fish.jpg', '2001-02-08', 'AQ1-A1', 'Wild', '2010-06-16', 'Height 4 inch, Weight 200 grams', 'Height 4.9 inches weight 250 grams ', '6-10 years', '1kg zooplankton and also eat bottom dwelling invertebrates and algae', 'Coastal seaward reefs and in shallow and sheltered lagoons ', 'common clownfish should be kept at the 75°F – 80°F water temperature', '24°C – 28°C', 'Freshwater', 'Orange, White and Black'),
(7, 'Clarkii Clown Fish', 'Fish', 'Clarkii', 'clarki clown fish .jpg', '2012-02-14', 'AQ1-A2', 'Captivity', '2016-07-22', 'Height 5 inch, Weight 180 gram', 'Height 5.5 inches Weight 200 grams', '10-13 years', '1 kg of wide variety of live, frozen flake foods and naturally growing algae in the tank', 'Western Australia', 'Clarkii clownfish should be kept at the 75°F – 80°F water temperature', '23.3° C -27.8° C', 'Fresh Water', ' yellowish orange in color with three white stripes on each side of the body which are dark brown to black base with white stripes. The anal fin is white with a yellow stripe on the top and bottom.'),
(8, 'Tropical Mandarin Fish', 'Fish', 'Mandarin', 'mandarinfish .jpg', '2008-02-20', 'AQ1-A3', 'Wild', '2018-03-20', 'Height 3 inch, Weight 160 grams', 'Height 4 icnhes, weight 200 grams', '10-15 years', '1.5 kg Food Flakes', 'Western Pacific from the Ryukyu Islands to Australia', 'Tropical Mandarin fish  should be kept at the 75°F – 80°F water temperature', '22.2° C - 28.9° C', 'Saltwater', 'Mandarin has a greenish turquoise body with orange to deep orangish red, curving, maze-like bars that are finely edged in deep blue'),
(9, 'Scribbled Fish', 'Fish', 'Scrib', 'scribbled fish.jpeg', '2011-02-23', 'AQ2-A1', 'Captivity', '2017-10-24', 'Height 4 inch, Weight 120 grams', 'Height 4 inch, Weight 150 grams', '8-10 years', '1 kg Food Flakes', 'Australia', 'Scribbled Fish should be kept at the 75°F – 80°F water temperature', '23° C -27° C', 'Freshwater', 'blue in colour of the scribbled body with yellow and white stripes'),
(10, 'Moon Jelly Fish', 'Fish', 'Jello', 'jellyfish.jpg', '2006-02-14', 'AQ2-A2', 'Captivity', '2019-06-20', 'Height 4.5 inch, weight 200 grams', 'Height 5 inch, weight 300 grams', '6-10 years', '1 kg brine shrimp', 'Australia, Ireland', 'Moon Jelly fish should be kept at the 75°F – 80°F water temperature', '23.3° C -27.8° C', 'Salt Water', 'orange-brown '),
(11, 'Common Gold Fish', 'Fish', 'Golden', 'goldfish.png', '2001-07-10', 'AQ1-A5', 'Captivity', '2012-03-15', 'Height 3 inch, Weight 2 kg', 'Height 3 inch, Weight 2.3 kg', '6-9 years', '1 kg food flakes', ' Europe, South Africa, Madagascar and America', 'Common Gold fish should be kept at the 75°F – 80°F water temperature', '23.3° C -27.8° C', 'Fresh Water', 'Orange in colour');

-- --------------------------------------------------------

--
-- Table structure for table `mammal`
--

CREATE TABLE `mammal` (
  `id` int(11) NOT NULL,
  `species` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `captivity_wild` varchar(255) NOT NULL,
  `date_joined` date NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `average_dimension` varchar(255) NOT NULL,
  `life` varchar(255) NOT NULL,
  `dietary` varchar(255) NOT NULL,
  `habitat` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `gestational` varchar(255) NOT NULL,
  `mammal_category` varchar(255) NOT NULL,
  `mammal_colour` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mammal`
--

INSERT INTO `mammal` (`id`, `species`, `category`, `name`, `photo`, `date_of_birth`, `location`, `captivity_wild`, `date_joined`, `dimension`, `average_dimension`, `life`, `dietary`, `habitat`, `note`, `gestational`, `mammal_category`, `mammal_colour`) VALUES
(11, 'Lowland Gorilla', 'Mammal', 'Redwell', 'gorilla.jpg', '1995-03-15', 'MC1-A1', 'Captivity', '2007-08-22', 'Height 1.75m  Weight 200kg', 'height 1.65–1.75 metres (5 ft 5 in–5 ft 9 in), and in weight 140–200 kg (310–440 lb)', '30-50 years', '2.2 Kg Green Leaf,  1.5 Kg Assorted Fruit  ', 'West and Central Africa', 'N/A', '8 months', 'Eutheria', 'black'),
(16, 'Reticulated Giraffe', 'Mammal', 'Reti', 'giraffe.jpg', '2012-08-21', 'MC1-A6', 'Captivity', '2015-02-09', 'Height 4.8 m Weight 130 kg', 'Height 4.6-6.1 m Weight 100- 200 kg', '22-25 years', '1 kg Green Leaves', 'Africa', 'Giraffe is tallest animal 0on earth', '15 months', 'Prototheria', 'The coat has dark blotches or patches (which can be orange, chestnut, brown, or nearly black in colour) separated by light hair (usually white or cream in colour.)'),
(17, 'Chile Horse', 'Mammal', 'Chile', 'horse.jpeg', '2012-05-21', 'MC1-A3', 'Captivity', '2015-10-06', 'Height 10 inch , Weight 20 kg', 'Height 9-10 inch, Weight 20-23 kg', '20-30 years', 'Bran, Rolled oats, Barley and Hay', 'South America', 'Chile Horse  much used for working cattle', '11 months', 'Eutheria', 'Brown '),
(18, 'Vervet Monkey', 'Mammal', 'Vervet', 'monkey.jpg', '2007-06-19', 'MC1-A4', 'Captivity', '2012-04-19', 'Height 9 inch Weight 12 kg', 'Height 8-9 inch Weight 10-13 kg', '20-30 years', '1 kg Fruits', 'Africa, Central America, South America and Asia', 'Vervet monkey is also known as the blue monkey in South Africa', '5 months ', 'Metatheria ', 'Brown'),
(19, 'African Elephant', 'Mammal', 'Ari', 'elephant.jpg', '2001-11-14', 'MC2-A5', 'Wild', '2006-11-16', 'Height 3 m, Weight 21 kg', 'Height 3 m, Weight 30 kg', '30-40 years', 'Grasses, Small plants, Bushes, Fruit', 'Africa', 'Elephants are the largest land animals on Earth', '22 months', 'Eutheria ', 'Brown'),
(20, 'Plain Zebra', 'Mammal', 'Zeb', 'zebra.jpg', '2005-10-06', 'MC1-A6', 'Wild', '2012-04-02', 'Height 6 m, Weight 70 kg', 'Height 6-7 m, Weight 60-120 kg', '30-40 years', '1 kg Grass', 'South Africa', 'Plain Zebra cannot see the color orange', '10 months', 'Eutheria', 'white with black Stripes'),
(21, 'Great Panda', 'Mammal', 'Great', 'panda.jpeg', '2009-11-18', 'MC1-A2', 'Captivity', '2014-10-27', 'Height 3m, Weight 30 kg', 'Height 3-4 m, Weight 70-75 kg', '20-30 years', '1 kg Green Leaves, 1 kg Bamboo', 'China', 'Great pandas are good at climbing trees ', '10 months', 'Metatheria', 'Black and White');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `firstname`, `lastname`, `address`, `email`, `contact`, `date_of_birth`, `gender`, `username`, `password`, `user_type`) VALUES
(7, 'Sneha', 'Gauchan', 'North Yorkshire, UK', 'sneha@gmail.com', '9835267372', '2012-04-10', 'Female', 'admin', '$2y$10$WPFUTfNpBb9OShFfn/pTgeWNc0pbWg33wvJtrtsN8LYMgmXvb6V3y', 'admin'),
(25, 'Carol', 'Ghale', 'Plumstead, UK', 'carol@gmail.com', '9867453626', '1998-06-17', 'Female', 'carol', '$2y$10$88wb4VImCkWueakX1KSDauMxQPrGC2AlCXhXY1MetWtF56fyEUTrO', 'user'),
(26, 'Kribina ', 'Gurung', 'North Yorkshire, UK', 'kribina@gmail.com', '9845637272', '2003-02-11', 'Female', 'kribina', '$2y$10$bOyxO9sYcTbzCDe0VAS.KeKhnaJJp7LcsLsr8CsLnucNH2mFh9JeC', 'user'),
(27, 'Samrit', 'Gurung', 'Plumstead, UK', 'samrit@gmail.com', '9856372732', '1996-06-20', 'Male', 'samrit', '$2y$10$DF196Vbapoabvd2ZfvodxOgihY59lzve0X7IrUFh6LXY.eJhdxuAq', 'user'),
(28, 'Akira', 'Gurung', 'Plumstead, UK', 'akira@gmail.com', '9837324237', '2005-08-25', 'Male', 'akira', '$2y$10$kwk4ZSpJSaP55cPPAUMtnOzludHGOX6jSJo.H3bAIrB03uo3ueM/u', 'user'),
(29, 'Anip', 'Sherchan', 'North Yorkshire, UK', 'anip@gmail.com', '9865364367', '2001-11-22', 'Male', 'anip', '$2y$10$ODhMKLXtsI5GkfvOgYPaL.uolTaj04/sUyoT4Oq5V1SSR.cHOdzXy', 'user'),
(31, 'Dawa', 'Sherpa', 'North Yorkshire, UK', 'dawa@gmail.com', '9847343637', '1997-05-19', 'Male', 'dawa', '$2y$10$ri3UCJmfK92/RFVTn4nhje481BgIWd5oXqyWWZtizHX33zlN.Mhiy', 'user'),
(32, 'Deepil', 'Gauchan', 'Plumstead, UK', 'deepil@gmail.com', '9846623778', '1986-01-14', 'Male', 'deepil', '$2y$10$AiHRXQ3/HdxvkkkD9/NXy.Baiku0LyES9A6W0MOXwCnCEtgc/3n1C', 'user'),
(34, 'Ashesh', 'Shrestha', 'North Yorkshire, UK', 'ashesh@gmail.com', '9853672788', '2005-02-23', 'Male', 'ashesh', '$2y$10$dTdqaJCxUyP55j5IvTOwgu4gJv0Pd0io.fzi1WVcPFoeAKEWIxpoa', 'user'),
(36, 'Gresha', 'Shrestha', 'North Yorkshire, UK', 'gresha@gmail.com', '9863524637', '1990-04-19', 'Female', 'gresha', '$2y$10$tl/Xl4Y/Tw3gWKY3Qnj56.G4RVXSv20tRAQl2wn.1pwPcuHuSLREG', 'zookeeper'),
(37, 'Malllika', 'Thallang', 'North Yorkshire, UK', 'mallika@gmail.com', '9836723727', '1985-12-10', 'Female', 'mallika', '$2y$10$kVwGwsoMB/XT6v2kUqp4Z.Ez76GxH.CSlwNp.206P1z3xXU6RZKKu', 'zookeeper'),
(38, 'Roshni', 'Gurung', 'North Yorkshire, UK', 'roshni@gmail.com', '9863637432', '1995-03-21', 'Female', 'roshni', '$2y$10$SbGCUJcrfKYsCsGpcvkq1uqlMagMcZ0hCyPjc2CEXuDlUyS1vxxwm', 'zookeeper'),
(39, 'Aashraya ', 'Gauchan', 'North Yorkshire, UK', 'aashraya@gmail.com', '9862327282', '1978-03-14', 'Male', 'aashraya', '$2y$10$TglmXgwJIwvztmB/u2mg7edD.OU24PsfV1Ky8J8BFFDummLB.evGS', 'zookeeper'),
(40, 'Mahima', 'Sherchan', 'North Yorkshire, UK', 'mahima@gmail.com', '9873723382', '1980-04-16', 'Female', 'mahima', '$2y$10$cx5rf/7cF8BYXT4NdWnMcONCPRcFTcZsllZBinGPMDlsyNDI//au2', 'zookeeper'),
(41, 'Salon', 'Gurung', 'North Yorkshire, UK', 'salon@gmail.com', '9865327634', '1982-09-21', 'Male', 'salon', '$2y$10$0s.XusV3A1VoDl7iCO1S4uvMsmVVjQyQRBYwEIsmY7MPC4eJUxhpa', 'zookeeper'),
(43, 'Shreya', 'Gauchan', 'Plumstead, Uk', 'shreya@gmail.com', '9845678283', '2020-06-16', 'Female', 'shreya', '$2y$10$4Ql2WSskPuH7iRZBL8YhT.76m7ajK0YpaZJilk5yiEeXN4hgzUMyG', 'user'),
(44, 'Alex', 'Bhattachan', 'Plumstead, Uk', 'alex@gmail.com', '9845678765', '2020-07-14', 'Male', 'alex', '$2y$10$w0Az4tk9vmHqQq0L0ZMAkeG.5BcXwIrpjpoci7BYJGL5PUKiwDId2', 'user'),
(45, 'John ', 'Gurung', 'Plumstead, Uk', 'john@gmail.com', '9856745677', '2020-07-01', 'Male', 'john', '$2y$10$ab0cr8VoVQm2tTQE0sIAf.TZWekcQUY15fg6OnlWy4wK4iIW2mitK', 'user'),
(46, 'Luna', 'Gurung', 'Plumstead,Uk', 'luna@gmail.com', '9852678343', '2020-07-03', 'Female', 'luna', '$2y$10$Xm12ZRm6vDHiV8wOtrAcbuj3mEPA4VLCDzm3SDGg1kpr/ITJWyT82', 'user'),
(47, 'Amber', 'Gurung', 'PLumsetad,Uk', 'amber@gmail.com', '9283462734', '2020-07-11', 'Male', 'amber', '$2y$10$pOyhj83/1WTTY.j7b.quQegKBxM91CdibWXRYe8ryxfI3ZxGYbHnO', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `reptile`
--

CREATE TABLE `reptile` (
  `id` int(11) NOT NULL,
  `species` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `captivity_wild` varchar(255) NOT NULL,
  `date_joined` date NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `average_dimension` varchar(255) NOT NULL,
  `life` varchar(255) NOT NULL,
  `dietary` varchar(255) NOT NULL,
  `habitat` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `reptile_reproduction_type` varchar(255) NOT NULL,
  `reptile_average_offspring` varchar(255) NOT NULL,
  `reptile_clutch_size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reptile`
--

INSERT INTO `reptile` (`id`, `species`, `category`, `name`, `photo`, `date_of_birth`, `location`, `captivity_wild`, `date_joined`, `dimension`, `average_dimension`, `life`, `dietary`, `habitat`, `note`, `reptile_reproduction_type`, `reptile_average_offspring`, `reptile_clutch_size`) VALUES
(2, 'American Bull Frog', 'Reptile', 'Bull', 'frog.jpg', '2033-02-01', 'H1-A1', 'Wild', '2045-02-01', 'Height 4 inch, Weight 80 grams', 'Height 3.6-6 inch,  Weight 5-175 grams', '7-9  years', '1 kg  locusts, crickets and other invertebrates', 'North America', 'Frog is an amphibian animal, it can live both in water and land', 'Egg Layer', 'N/A', '30-40'),
(3, 'Aldabra Tortoise', 'Reptile', 'aldabra', 'tortoise.jpeg', '1988-06-14', 'H1-A2', 'Captivity', '2002-06-10', 'Height 4 inch, Weight 4 kg', 'Height 4-5inch, Weight 4-5 kg', '8-11 years', '1 kg Plants, 0.5 kg Lettuce', ' North America, Central America, and South America', 'Aldabra Tortoise is an amphibian which lives in both water and land', 'Egg Layer', 'N/A', '7-9'),
(4, 'Green Anaconda', 'Reptile', 'Anacon', 'anaconda.jpeg', '2000-10-24', 'H1-A4', 'Captivity', '2008-03-13', 'Height 4inch, Weight 7 kg', 'Height 3-4 inch, Weight 8-10 kg', '10-11 years', '1 kg Worms', 'America, Africa', 'Green Anaconda is a reptile', 'Egg Layer', 'N/A', '8-10'),
(5, 'Parson Chameleon', 'Reptile', 'Parson', 'chameleon.jpg', '2009-06-14', 'H1-A3', 'Captivity', '2005-11-15', 'Height 3 inch , Weight 4.5 kg', 'Height 3-4 inch, Weight 4-5 kg', '7-8 years', '1 kg Green Vegetables ', 'Madagascar and Africa', 'Parson Chameleon is a reptile', 'Egg Layer', 'N/A', '4-5'),
(6, 'Nile Crocodile', 'Reptile', 'Nile', 'crocodile.jpg', '2004-03-17', 'H2-A4', 'Wild', '2007-01-15', 'Height 7 inch,  Weight 5 kg', 'Height 6-7 inch, Weight 4-5 kg', '8-10 years', ' Africa, Asia, Australia and America', '1 kg fruits and vegetables', 'Nile Crocodile is an amphibian living both water and land ', 'Egg Layer', 'N/A', '40-90'),
(7, 'Blue Poison Dart Frog', 'Reptile', 'Fice', 'blue frog .jpg', '2003-08-04', 'H4-A4', 'Wild', '2015-12-31', 'Height 4 inch , Weight 4 kg', 'Height 3-5 inch, Weight 4-6 kg', '6-8 years', '1 kg locusts, crickets and other invertebrates', 'Africa, Australia', 'Blue Poison Dart Frog is an amphibian living  in both water and land', 'Egg layer', 'N/A', '8-9');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `sponsor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `existing_customer` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `primary_telephone` varchar(255) NOT NULL,
  `secondary_telephone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sponsored_animal` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `sponsorship_band` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `agreement_period` varchar(255) NOT NULL,
  `signage_area` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `agreement` varchar(255) NOT NULL,
  `signed_name` varchar(255) NOT NULL,
  `signed_date` date NOT NULL,
  `payment` varchar(255) NOT NULL,
  `payment_received` varchar(255) NOT NULL,
  `review_date` varchar(255) NOT NULL,
  `signed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`sponsor_id`, `name`, `existing_customer`, `id`, `primary_telephone`, `secondary_telephone`, `address`, `sponsored_animal`, `location`, `sponsorship_band`, `price`, `agreement_period`, `signage_area`, `photo`, `note`, `agreement`, `signed_name`, `signed_date`, `payment`, `payment_received`, `review_date`, `signed`) VALUES
(8, 'Zenth Staybrite Ltd', 'Yes', 'SP1000', '9846346372', '9823456765', 'Plumstead, Uk', 'Great Panda', 'MC1-A2', 'A', '£2500 ', '06/08/2020 - 06/12/2020', '1/8', 'zenith.jpg', 'Sponsorship details ', 'Yes', 'Purnima Gurung', '2020-06-05', 'Transfer of funds to zoo sponsorship account', 'No', '2020-06-10', 'Jenisha Gurung'),
(9, 'STP Company', 'No', 'SP1001', '9845367485', '9834567865', 'North Yorkshire, UK', 'Scribbled Fish', 'AQ2_A1', 'B', '£4000 ', '07/11/2018 - 04/15/2020', '1/8', 'stp.jpg', 'Sponsorship details', 'Yes', 'Pratikshya Rana', '2018-07-11', 'No transfer of fund to zoo sponsorship account', 'No', '2018-07-18', 'Kanti Gurung'),
(10, 'Ren Company', 'Yes', 'SP1002', '9834567876', '9834565334', 'North Yorkshire, UK', 'Australian King Parrot', 'AV1-A3', 'C', '£4500', '05/08/2019 - 03/12/2020', '1/8', 'ren.jpg', 'Sponsorship details', 'Yes', 'DawaSherpa', '2019-05-08', 'No Transfer of funds to zoo sponsorship accountn', 'No', '2019-11-20', 'Mahima Sherchan');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `ticket_date` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `child_under` varchar(255) NOT NULL,
  `child_quantity` varchar(255) NOT NULL,
  `adult_quantity` varchar(255) NOT NULL,
  `archive_ticket` varchar(255) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `ticket_date`, `username`, `child_under`, `child_quantity`, `adult_quantity`, `archive_ticket`) VALUES
(45, '2020-01-16', 'carol', '0', '1', '1', 'false'),
(46, '2020-06-07', 'kribina', '2', '1', '1', 'false'),
(47, '2020-06-11', 'dawa', '2', '3', '1', 'false'),
(49, '2020-06-17', 'anip', '2', '2', '3', 'true'),
(50, '2020-06-06', 'deepil', '1', '3', '2', 'true'),
(52, '2020-06-24', 'amisha', '0', '2', '3', 'true'),
(53, '2020-06-11', 'simran', '2', '3', '1', 'true'),
(54, '2020-06-10', 'shreya', '2', '3', '4', 'true'),
(55, '2020-07-09', 'alex', '2', '3', '2', 'false'),
(56, '2020-07-01', 'john', '2', '3', '4', 'false'),
(58, '2020-07-09', 'amber', '2', '3', '4', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bird`
--
ALTER TABLE `bird`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `fish`
--
ALTER TABLE `fish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mammal`
--
ALTER TABLE `mammal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reptile`
--
ALTER TABLE `reptile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bird`
--
ALTER TABLE `bird`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `fish`
--
ALTER TABLE `fish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mammal`
--
ALTER TABLE `mammal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `reptile`
--
ALTER TABLE `reptile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
