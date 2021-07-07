-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 08:52 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_ordering`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(8, 'john', 'john@gmail.com', '29c65f781a1068a41f735e1b092546de'),
(32, 'ayushi', 'ayushig123', 'ec72e08f1ced07d781fb749d7608a0d4'),
(39, '7896', 'abcd@gmail.com', '2a4f61809daef37ddacf226ab8734f09'),
(41, 'erica', 'eric@yahoo.com', '2a4f61809daef37ddacf226ab8734f09'),
(42, 'az', 'bz', '2a4f61809daef37ddacf226ab8734f09'),
(45, '12345', '12345@mail.com', '2a4f61809daef37ddacf226ab8734f09'),
(50, 'jennifer', 'jennifer@mail.com', '2a4f61809daef37ddacf226ab8734f09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(130, 'Appetizers', 'Food_category_1617209381.jpg', 'YES', 'YES'),
(131, 'Tandoor special', 'Food_category_1617203803.png', 'YES', 'YES'),
(132, 'Vegetarian delicacies', 'Food_category_1617209613.png', 'YES', 'YES'),
(133, 'Paratha party', 'Food_category_1617209344.png', 'YES', 'YES'),
(134, 'Indian breads', 'Food_category_1617213987.png', 'YES', 'YES'),
(135, 'Indian dal', 'Food_category_1617210973.png', 'YES', 'YES'),
(136, 'Specials', 'Food_category_1617213848.jpg', 'YES', 'YES'),
(137, 'Deserts', 'Food_category_1617215078.jpg', 'YES', 'YES'),
(139, 'Smoothies and more', 'Food_category_1617285709.png', 'YES', 'YES'),
(140, 'Get your caffeine', 'Food_category_1617289567.png', 'YES', 'YES'),
(141, 'Rice', 'Food_category_1617292191.png', 'YES', 'YES'),
(142, 'Icecreams', 'Food_category_1617294322.png', 'YES', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dishes`
--

CREATE TABLE `tbl_dishes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dishes`
--

INSERT INTO `tbl_dishes` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(28, 'Samosa', 'Crispy deep fried pouches filled with mildly spiced tomatoes and peas. (2pcs)', '15.00', 'Food_1617202017.jpg', 130, 'YES', 'YES'),
(29, 'Paneer pakoda', 'Cheese rich in flavor marinated in batter and deep fried. (1 plate)', '100.00', 'Food_1617202647.png', 130, 'YES', 'YES'),
(30, 'Aalo tikki chat', 'Potato patties deep fried with green chillies in gram flour. (1 plate)', '100.00', 'Food_1617202805.jpg', 130, 'YES', 'YES'),
(31, 'Mixed vegetable bhajia', 'Marinated batter deep fried vegetable fritters. (1 plate)', '100.00', 'Food_1617202891.png', 130, 'YES', 'YES'),
(32, 'Chicken nuggets', 'Boneless chicken dipped in spiced batter and deep fried. (1 plate)', '100.00', 'Food_1617203333.png', 130, 'YES', 'YES'),
(33, 'Chilli paneer', 'Cottage cheese rich in flavor cooked with chopped chillies , garlic, and ginger.(1 plate)\r\n', '100.00', 'Food_1617203425.png', 130, 'YES', 'YES'),
(34, 'Chilli chicken', 'Boneless chicken pieces cooked with chopped green chilies,garlic and soya sauce.', '100.00', 'Food_1617203464.png', 130, 'YES', 'YES'),
(35, 'Tandoori chicken', 'Marinated skinless whole chicken in tomato yogurt sauce served with sausauteed bell pepper and onion.', '100.00', 'Food_1617203717.png', 131, 'YES', 'YES'),
(36, 'Seekh kabab chicken', 'Finely minced chicken marinated with a combination of freshly ground herbs and spices. wrapped on skewer and grilled.', '100.00', 'Food_1617203947.png', 131, 'YES', 'YES'),
(37, 'Tandoori chicken tikka', 'Marinated boneless chicken in tomato yogurt sauce served with sauted bell pepper and onion', '100.00', 'Food_1617204228.png', 131, 'YES', 'YES'),
(38, 'Matar paneer', 'Rich in flavor cheese cubes with green peas in onion and tomato base gravy. (1 plate)', '100.00', 'Food_1617204419.png', 132, 'YES', 'YES'),
(39, 'Palak paneer', 'Homemade cheese cubes cooked in lightly spiced spinach. (1 plate)', '100.00', 'Food_1617204557.png', 132, 'YES', 'YES'),
(40, 'Shahi paneer', 'Cheese cubes cooked in a spiced cream sauce.', '100.00', 'Food_1617204713.png', 132, 'YES', 'YES'),
(41, 'Chana masala', 'Garbanzo beans cooked in a special blend of spices. (1 plate)', '100.00', 'Food_1617204923.png', 132, 'YES', 'YES'),
(42, 'Kala chana', 'Black garbanzo beans cooked in a brown spice in a gravy base.', '100.00', 'Food_1617205158.png', 132, 'YES', 'YES'),
(43, 'Rajma', 'Red kidney beans cooked in onion based spiced gravy. (1 plate)', '100.00', 'Food_1617205306.png', 132, 'YES', 'YES'),
(44, 'Aaloo gobhi', 'Cauliflower and potatoes cooked with onions and spices. (1 plate)', '100.00', 'Food_1617205461.png', 132, 'YES', 'YES'),
(45, 'Baingan bharta', 'Roasted eggplant sauteed in tomato,onion and spices.\r\n', '100.00', 'Food_1617205682.png', 132, 'YES', 'YES'),
(46, 'Paneer bhurji', 'Rich in flavor shredded cheese bits cooked with spices,bell peppers and onions. (1 plate)', '100.00', 'Food_1617205885.png', 132, 'YES', 'YES'),
(47, 'Bhindi masala', 'Okra cooked in a spiced masala sauce with onion and tomato.', '100.00', 'Food_1617206046.png', 132, 'YES', 'YES'),
(48, 'Malai kofta', 'Grated vegetable and cheese fritters cooked in a creamed tomato and onion sauce.(1 plate)', '100.00', 'Food_1617206183.png', 132, 'YES', 'YES'),
(49, 'Indian curry pakora', 'Vegetable fritters cooked in spiced gram flour gravy. (1 plate)', '100.00', 'Food_1617206324.png', 132, 'YES', 'YES'),
(50, 'Pani puri', 'Round hollow puri , filled with a imli pani, tamarind chutney, chili powder, chaat masala, potato mash, onion or chickpeas. (6pcs)', '100.00', 'Food_1617206491.jpg', 130, 'YES', 'YES'),
(51, 'Aaloo paratha', 'Unleavened dough rolled with a mixture of mashed potato and spices, which is cooked on a hot tawa with butter or ghee.', '100.00', 'Food_1617206818.png', 133, 'YES', 'YES'),
(52, 'Gobhi paratha', 'Stuffed with flavored cauliflower and vegetables usually consumed with curd, butter or pickle.', '100.00', 'Food_1617207019.png', 133, 'YES', 'YES'),
(53, 'Paneer paratha', 'A delicious indian flat bread stuffed with grated cottage cheese and spice powders.', '100.00', 'Food_1617207409.png', 133, 'YES', 'YES'),
(54, 'Methi paratha', 'The wheat flour dough combined with methi leaves and carom seeds, both of which are excellent aroma and flavour boosters.', '100.00', 'Food_1617207583.png', 133, 'YES', 'YES'),
(55, 'Matar paratha', 'An Indian unleavened flatbread made with whole wheat flour, green peas, low fat curds, green chillies and ajwain.', '100.00', 'Food_1617207800.png', 133, 'YES', 'YES'),
(56, 'Egg paratha', 'An easy Indian brunch made with scrambled egg stuffed in chapati dough rolled and cooked in a pan.', '100.00', 'Food_1617208494.png', 133, 'YES', 'YES'),
(57, 'Garlic paratha', 'An Indian Unleavened Flatbread Made With Whole Wheat Flour, chopped garlic, Green Chillies And Ajwain.', '100.00', 'Food_1617208996.png', 133, 'YES', 'YES'),
(58, 'Palak paratha', 'Healthy & delicious flat-breads made with whole wheat flour and Indian spinach', '100.00', 'Food_1617209223.png', 133, 'YES', 'YES'),
(59, 'Naan', 'leavened bread basket in clay oven', '100.00', 'Food_1617210020.png', 134, 'YES', 'YES'),
(60, 'Fulka roti', 'Indian style wheat flour tortilla made in clay oven', '100.00', 'Food_1617210210.png', 134, 'YES', 'YES'),
(61, 'Poori', 'Deep-fat fried bread made from unleavened whole-wheat flour served with a savory curry or bhaji', '100.00', 'Food_1617210508.png', 134, 'YES', 'YES'),
(62, 'Arhar dal', 'One of the most common dish that is made in homes on daily basis with tomatoes, ginger, garlic and onions.', '100.00', 'Food_1617211085.png', 135, 'YES', 'YES'),
(63, 'Urad dal', 'Also referred to as \"black gram\", is a primary ingredient of the south Indian dishes idli and dosa.', '100.00', 'Food_1617211652.png', 135, 'YES', 'YES'),
(64, 'Toor dal', '', '100.00', 'Food_1617212081.png', 135, 'YES', 'YES'),
(65, 'Lobia', 'Used in various soup and salad recipes as well as dal and vegetable preparations to enhance their nutritive value multi-fold. ', '100.00', 'Food_1617212530.png', 135, 'YES', 'YES'),
(66, 'Chole bhature', 'An amazing combination of chana masala and bhatura/Puri, a fried bread made from maida served with onion rings and fried green chillis.', '100.00', 'Food_1617212842.png', 136, 'YES', 'YES'),
(67, 'Rajma chawal', 'A delicious, simple Indian comfort food of instant pot rajma with steamed rice.', '100.00', 'Food_1617213126.png', 136, 'YES', 'YES'),
(68, 'Pav bhaji', 'Consisting of a thick vegetable curry served with a soft bread roll, often served with potatoes, onions, chillies, and lemons.', '100.00', 'Food_1617213313.png', 136, 'YES', 'YES'),
(69, 'Chicken biryani', 'Boneless pieces of chicken cooked with lightly spiced , onion and bell peppers', '100.00', 'Food_1617213591.png', 136, 'YES', 'YES'),
(70, 'Pizza', 'Flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients.', '100.00', 'Food_1617213826.jpg', 136, 'YES', 'YES'),
(71, 'Hakka noodles', 'Made from unleavened dough (rice or wheat flour) cooked in a boiling liquid, stir fried with sauces and vegetables or meats.', '100.00', 'Food_1617214247.jpg', 136, 'YES', 'YES'),
(72, 'Smoky burger', 'Sweet and smoky chickpea burgers are the perfect homemade veggie burger. They’re tasty, delicious, and made with simple ingredients. ', '100.00', 'Food_1617214679.png', 136, 'YES', 'YES'),
(73, 'Momos', 'A type of steamed dumpling with some form of filling, also served as dry fried. ', '100.00', 'Food_1617215034.png', 136, 'YES', 'YES'),
(74, 'Gulab jamun', 'A milk-solid-based sweet, made traditionally  from khoya, which is milk reduced to the consistency of a soft dough.', '100.00', 'Food_1617215274.png', 137, 'YES', 'YES'),
(75, 'Jalebi', 'A hot indian sweet made by deep-frying a maida flour batter in pretzel or circular shapes, which are then soaked in sugar syrup. ', '100.00', 'Food_1617215525.png', 137, 'YES', 'YES'),
(76, 'Ras-malai', 'Made of flattened balls of chhana soaked in malai (clotted cream) flavoured with cardamom.', '100.00', 'Food_1617215755.png', 137, 'YES', 'YES'),
(77, 'Pancake', 'A flat cake,  prepared from eggs, milk and butter and cooked on a hot surface, often frying with oil or butter. ', '100.00', 'Food_1617215989.png', 137, 'YES', 'YES'),
(78, 'Gujiya', 'Made with suji or maida, stuffed with a mixture of sweetened khoya and dried fruits, and fried in ghee. ', '100.00', 'Food_1617216156.png', 137, 'YES', 'YES'),
(79, 'Rasgulla', 'Made from ball-shaped dumplings of chhena and semolina dough, cooked in light syrup made of sugar.', '100.00', 'Food_1617216286.png', 137, 'YES', 'YES'),
(80, 'Balushahi', 'Made of maida flour, and deep-fried in clarified butter and then dipped in sugar syrup', '100.00', 'Food_1617216524.png', 137, 'YES', 'YES'),
(81, 'Moon dal halwa', 'An addictive and delicious halwa variety made from mung lentils and ghee (clarified butter)', '100.00', 'Food_1617216762.png', 137, 'YES', 'YES'),
(82, 'Banana smoothie', 'Made with banana, frozen mixed berries, oat milk and yogurt, the banana smoothie gives an extra creamy and fruity experience.', '100.00', 'Food_1617286247.png', 139, 'YES', 'YES'),
(83, 'Strawberry Smoothie', 'A creamy, indulgent and satisfying recepie with double-thick ice-cold strawberries and cream refreshing shareable', '100.00', 'Food_1617286588.png', 139, 'YES', 'YES'),
(84, 'Chocolate smoothie', 'Craving for chocolate? Grab a chocolate smoothie and experience the treasures of choco-land.', '100.00', 'Food_1617287166.png', 139, 'YES', 'YES'),
(85, 'Green smoothie', 'A healthy and tasty drink made from bananas, pineapple chunks, low-fat yogart and spinach', '100.00', 'Food_1617287610.png', 139, 'YES', 'YES'),
(86, 'Mango smoothie', 'Made with frozen mango, yogurt, dry-fruits blended into an ultra creamy drink - super refreshing way to cool off on a warm day', '100.00', 'Food_1617288266.png', 139, 'YES', 'YES'),
(87, 'Blueberry smoothie', 'Full of antioxidants, this healthy blueberry smoothie recipe is perfect for breakfast', '100.00', 'Food_1617289077.png', 139, 'YES', 'YES'),
(88, 'Almond smoothie', 'Recipe blended with fresh or frozen strawberries with yogurt and gets a citrus boost from orange juice.', '100.00', 'Food_1617289343.png', 139, 'YES', 'YES'),
(89, 'Americano', 'Prepared by diluting an espresso with hot water, giving it a different flavor from, traditionally brewed coffee.', '100.00', 'Food_1617289781.png', 140, 'YES', 'YES'),
(90, 'Flat white', 'Consisting of espresso with microfoam having more velvety in consistency – allowing the espresso to dominate the flavour', '100.00', 'Food_1617290019.png', 140, 'YES', 'YES'),
(91, 'Tea', ' An aromatic beverage prepared by pouring hot or boiling water over cured or fresh leaves of Camellia sinensis.', '100.00', 'Food_1617290282.png', 140, 'YES', 'YES'),
(92, 'Affogato al caffe', 'An Italian coffee-based dessert in the form of a scoop of vanilla gelato topped with a shot of hot espresso.', '100.00', 'Food_1617290493.png', 140, 'YES', 'YES'),
(93, 'Latte', 'Made with espresso and steamed milk, perfect drink for coffee lovers wanting \"more cofee, less milk\".', '100.00', 'Food_1617290713.png', 140, 'YES', 'YES'),
(94, 'Frappe', 'Made from instant coffee, water, sugar, and milk, with special characteristic of a thick layer of foam ', '100.00', 'Food_1617291274.png', 140, 'YES', 'YES'),
(95, 'Mocaccino', 'Based on espresso and hot milk, with added chocolate flavouring and sweetener, typically in the form of cocoa powder and sugar.', '100.00', 'Food_1617291614.png', 140, 'YES', 'YES'),
(96, 'Steam rice', 'The most common food item from the restaurant is the steam rice which is now available at your doorstep with just a click', '100.00', 'Food_1617292317.png', 141, 'YES', 'YES'),
(97, 'Vegetable Pulav', 'Spicy rice dish prepared by cooking rice with various vegetables and spices with perfect assortment of ghee and oil.', '100.00', 'Food_1617292467.png', 141, 'YES', 'YES'),
(98, 'Chicken biryani', 'Boneless Pieces Of Chicken Cooked With Lightly Spiced , Onion And Bell Peppers', '100.00', 'Food_1617292565.png', 141, 'YES', 'YES'),
(99, 'Lemon rice', 'One of the authentic South Indian main course, with cooked rice is flavoured with zesty tangy lemon juice and seasoned with assorted spices.', '100.00', 'Food_1617292797.png', 141, 'YES', 'YES'),
(100, 'Tomato rice', 'A simple, spicy, flavorful & delicious one pot dish made with rice, tomatoes, spices & herbs.', '100.00', 'Food_1617293195.png', 141, 'YES', 'YES'),
(101, 'Jeera rice', 'Consisting of rice and cumin seeds, onions, and coriander leaves, it is a popular dish in North India', '100.00', 'Food_1617293379.png', 141, 'YES', 'YES'),
(102, 'Brown rice', 'A healthy rice product for those craving for rice, but are on a diet.', '100.00', 'Food_1617293964.png', 141, 'YES', 'YES'),
(103, 'Chocolate icecream', 'Flavour: chocolate with choco chips (1 pkt)', '100.00', 'Food_1617295035.png', 142, 'YES', 'YES'),
(104, 'Vanilla Icecream', 'Flavour: Vanilla (1pkt)', '100.00', 'Food_1617295370.png', 142, 'YES', 'YES'),
(105, 'Strawberry Icecream', 'Made from real strawberries.', '100.00', 'Food_1617296110.png', 142, 'YES', 'YES'),
(106, 'Black current', ' Delicious French-style ice cream made with fresh black currants, cream, milk, and egg yolks.', '100.00', 'Food_1617296712.png', 142, 'YES', 'YES'),
(107, 'Kesar Pista', 'Flavour: Kesar pista (1 pkt)', '100.00', 'Food_1617297064.png', 142, 'YES', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `order_date`) VALUES
(13, 'chowmein', '420.00', 1, '420.00', 'Cancelled', 'Ayushi Gupta', '8755821947', 'gayushi790@gmail.com', 'Deen Dayal Colony40, Shantanu Netralaya, Kabirnagar', '2021-03-30 04:57:35'),
(14, 'pizza', '150.00', 1, '150.00', 'On-Delivery', 'Ayushi Gupta', '8755821947', 'gayushi790@gmail.com', 'Deen Dayal Colony', '2021-03-30 08:09:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dishes`
--
ALTER TABLE `tbl_dishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `tbl_dishes`
--
ALTER TABLE `tbl_dishes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
