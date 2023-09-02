-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 08:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `quantity`, `image`, `Username`) VALUES
(53, 'New', 28, 7, 'off_the_wool_handmade_knitted_beanie_hat_ivory_lead_stripes-scaled.jpg', 'Salahaboushahla');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `cname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cname`) VALUES
(1, 'Food'),
(2, 'Art'),
(3, 'Cloth'),
(4, 'Furniture'),
(5, 'Jewelry'),
(6, 'Pets'),
(7, 'Toys');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `Discription` varchar(255) NOT NULL,
  `cid` int(255) NOT NULL,
  `uname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `Discription`, `cid`, `uname`) VALUES
(1, 'Mother Duck', 20, 'mother-duck-and-duckling-clay-sculpture-accessories-teshuah-tea-company-488537.jpg', 'The Mother Duck is the mother of ducks', 2, 'Youshida'),
(2, 'Bearded Dragon Hatchling', 150, '53d54d0dd476848d5234411bd7872ebc.jpg', 'Meet our adorable Bearded Dragon hatchling! This little one is full of personality and charm, and is the perfect addition to any reptile lover\'s family. With its vibrant colors and friendly demeanor, this hatchling is sure to steal your heart. Raised with', 6, 'Youshida'),
(3, 'Baby Leopard Gecko', 200, 'canva-photo-editor.png', 'Introducing our adorable Baby Leopard Gecko - the perfect addition to any reptile enthusiast\'s collection! With its distinctive spots and beautiful coloring, this little gecko is sure to captivate your heart. Raised with love and care, this baby gecko has', 6, 'Youshida'),
(4, 'Chocolate chip', 4, 'coocke1.jpg', 'Introducing our irresistible Chocolate Chip Cookies, the perfect indulgence for any cookie lover! Each cookie is loaded with chunks of premium chocolate that melt in your mouth with every bite. Our cookies are baked to perfection, with a soft, chewy textu', 1, 'Youshida'),
(5, 'Fresh fruit salad cup', 2, '61EX9KAEaoL._AC_UF894,1000_QL80_.jpg', 'Introducing our delightful Fresh Fruit Salad Cup, a colorful and refreshing blend of juicy fruits that will tantalize your taste buds and brighten up your day! Our cup is generously filled with a variety of freshly cut seasonal fruits, including succulent', 1, 'Youshida'),
(6, 'homemade blueberry jam', 50, 'blueberry-jam-500x500.png', 'Introducing our mouth-watering Homemade Blueberry Jam, made with love from the freshest, juiciest blueberries handpicked from our very own farm. Each jar of jam is bursting with flavor, and you can taste the difference that comes from using only the fines', 1, 'Youshida'),
(7, 'Rainbow cupcakes', 5, 'cupcakes01.png', 'Introducing our Rainbow Cupcakes, a colorful and fun treat that\'s perfect for any celebration! Our cupcakes are made with a light, fluffy vanilla cake that\'s bursting with vibrant colors, thanks to our special blend of all-natural food coloring. Each cupc', 1, 'ada'),
(8, 'Chocolate Cake', 10, 'easy_chocolate_cake_31070_16x9.jpg', 'Indulge in a rich and decadent experience with our heavenly chocolate cake! With its moist and fluffy texture, this cake is made with the finest cocoa powder and premium quality ingredients to satisfy your sweet tooth. The velvety smooth chocolate ganache', 1, 'ada'),
(9, 'funfetti cake', 8, 'funfetti-cake-recipe-4.jpg', 'Introducing our Funfetti Cake, a party in a cake! Our cake is made with a light and fluffy vanilla sponge, studded with rainbow sprinkles for a fun and festive look. Each layer is sandwiched with a creamy vanilla buttercream frosting and covered in a colo', 1, 'ada'),
(10, 'Red velvet cake', 10, 'IMG_1497.jpeg', 'Introducing our indulgent Red Velvet Cake, a classic treat that\'s sure to satisfy your sweet tooth! Our cake features layers of moist, velvety red chocolate cake that are sandwiched with rich, cream cheese frosting. The deep, decadent red color of our cak', 1, 'ada'),
(11, 'oranges', 5, 'les-oranges-avec-des-feuilles-vertes-vendu-dans-une-petite-caisse-kyx925.jpg', 'Introducing our juicy and refreshing oranges, hand-picked from the finest orchards around the world! Our oranges are bursting with sweet, tangy flavor and are packed with essential vitamins and minerals, making them the perfect addition to any healthy die', 1, 'ada'),
(12, 'blue Beanie', 5, 'Autumn-and-winter-parent-child-new-wool-hats-for-men-and-women-simple-college-style-striped.jpg_640x640.jpg', 'Introducing our cozy and stylish Blue Beanie - the perfect accessory to keep you warm and looking great during the colder months. Made from high-quality and soft materials, this beanie is designed to provide both comfort and style. The classic blue color ', 3, 'ada'),
(13, 'yellow pillows', 50, '5efa214e4dca681fed12e752.png', 'Looking to brighten up your living space with a pop of color? Our Yellow Pillows are just what you need! These pillows are made with high-quality, soft fabrics that feel great to the touch and provide plenty of support for your head and neck. The vibrant ', 4, 'Youshida'),
(14, 'Sofa Set for Living Room Wood Furniture', 200, '611C8z-xBfL.jpg', 'Transform your living room into a cozy and inviting space with our Sofa Set for Living Room Wood Furniture. This beautiful set includes a comfortable sofa, loveseat, and armchair, all crafted from high-quality wood for durability and longevity. The rich w', 4, 'Youshida'),
(15, 'Body Vase', 50, '61b9Q9-CW4L.jpg', 'The Body Vase is a unique and eye-catching piece of home decor that will add a touch of sophistication to any room. Handcrafted from high-quality porcelain, this vase features a smooth, glossy finish that accentuates the contours of the human form. The va', 4, 'Youshida'),
(16, 'picnic table', 100, 'd741f.png', 'Looking for the perfect outdoor table to enjoy meals and gatherings with family and friends? Look no further than our durable and stylish picnic table! Made from sturdy materials such as weather-resistant wood, metal or plastic, this table is designed to ', 4, 'Youshida'),
(17, 'dining table', 110, 'dining.jpg', 'This beautiful dining table is perfect for family gatherings and dinner parties. Made from solid wood, the table is sturdy and built to last. The table top features a stunning wood grain pattern that adds warmth and character to any dining space. The clea', 4, 'Youshida'),
(18, 'cat and dog', 5, '4bd17501ff8e8a2995791901c215fba6.jpg', 'introducing our charming wooden cat and dog on wheels toy - the perfect addition to any child\'s toy collection! This delightful toy is handcrafted from high-quality wood and features a cute and colorful design that is sure to capture your child\'s imaginat', 7, 'Youshida'),
(19, 'Handmade Moveable Squirrel Wooden Toy', 6, '71CTRg-7QUL._SY550_.jpg', 'Looking for a unique and whimsical addition to your child\'s toy collection? Check out our handmade moveable squirrel wooden toy! This delightful toy is lovingly crafted from high-quality wood and features a charming and detailed design that is sure to cap', 7, 'Youshida'),
(20, 'Spinning Top', 2, 'channapatna-toys-wooden-spinning-tops-spindle-top-for-kids-3-years-pack-of-1-multicolor-curiosity-fine-motor-skills-pambaram-3318814_image_1653536283.jpg', 'Introducing our classic and timeless spinning top - the perfect toy for children and adults of all ages! Made from high-quality materials and crafted with expert care and attention, this spinning top is built to last and provides hours of entertainment an', 7, 'Youshida'),
(21, 'whale plush', 3, 'handmade-toys.jpg', 'Looking for a soft and cuddly companion to share your adventures with? Look no further than our adorable whale plush toy! This cute and cuddly whale is expertly crafted from high-quality materials and features a super-soft and huggable design that is perf', 7, 'Youshida'),
(23, 'tractor wooden toy', 8, 'trac.png', 'Looking for a unique and fun toy for your little one? Check out our wooden rocking tractor - the perfect combination of classic charm and modern playtime fun! This beautifully crafted rocking tractor is expertly made from high-quality and sustainable wood', 7, 'Youshida'),
(24, 'book keychain', 20, '61cvUi7l5KL._SY450_.jpg', 'This adorable book keychain is the perfect accessory for any book lover! The miniature book charm features a hardcover design with intricate details like a faux gold-leaf spine and tiny pages that actually turn. The keychain is made from durable metal wit', 5, 'Youshida'),
(25, 'Celestia Swing Earrings', 50, 'eden-ellie-900x643.png', 'Add a touch of celestial charm to your style with these stunning Celestia Swing Earrings. Handcrafted by skilled artisans, these earrings feature a delicate gold-plated brass crescent moon and a twinkling star that dangle beautifully from a hypoallergenic', 5, 'Youshida'),
(26, 'Necklace', 60, 'p168178_2.png', 'Introducing the stunning Recycled Paper And Hematite Multi Color Waterfall Necklace! This unique necklace is a true statement piece, featuring a cascading waterfall of recycled paper beads in various colors, perfectly accented by hematite beads throughout', 5, 'Youshida'),
(27, 'keychain', 20, 'PC2.png', 'No description', 5, 'Youshida'),
(28, 'Neclas', 54, '371119_1_600 .png', 'Introducing our stunning collection of handcrafted necklaces, each one a unique piece of wearable art. Our skilled artisans use a variety of materials, from natural stones and precious metals to recycled materials and hand-painted beads, to create a range', 5, 'Youshida'),
(29, 'New Hat', 28, 'off_the_wool_handmade_knitted_beanie_hat_ivory_lead_stripes-scaled.jpg', 'no description', 3, 'ytuio');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Salahaboushahla', 'animeseries410@gmail.com', '$2y$10$5v/FA7R/HOdUaLmUC3KJkOOvdGpgaR95lu1/NnPIyHvSgXKvqGK36', 'user'),
(2, 'Youshida', 'youshidacompaney@gmail.com', '$2y$10$8qCkBrgJX3QYaNUBSC9WTe3Nth3sQnQywpmqJ2tdNUUUzyp3LiuOu', 'admin'),
(3, 'adam', 'test@gmail.com', 'Salahaboushahla', 'user'),
(4, 'ada', 'youshidacompaney@gmail.comu', 'Salahaboushahla', 'admin'),
(5, '', 'animeseries410@gmail.com', '$2y$10$5v/FA7R/HOdUaLmUC3KJkOOvdGpgaR95lu1/NnPIyHvSgXKvqGK36', ''),
(6, '', 'animeseries410@gmail.com', '$2y$10$5v/FA7R/HOdUaLmUC3KJkOOvdGpgaR95lu1/NnPIyHvSgXKvqGK36', ''),
(7, 'ytuio', 'abdshf037@gmail.com', '$2y$10$uSsQ/TrQfKGt0MUlpvqNoeXGkwowJzhYnhUGxNaUKHnxjz3HwNMZ.', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
