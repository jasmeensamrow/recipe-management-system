-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 10:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsmdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `favour`
--

CREATE TABLE `favour` (
  `favid` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favour`
--

INSERT INTO `favour` (`favid`, `recipe_id`, `user_id`) VALUES
(32, 1, 20),
(49, 6, 18),
(51, 1, 18),
(52, 9, 18),
(53, 8, 18);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `recipe_id` int(11) NOT NULL,
  `rating` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `recipe_id`, `rating`, `timestamp`) VALUES
(1, 18, 1, 2, '2024-04-05 02:00:30'),
(2, 18, 2, 3, '2024-04-05 02:01:32'),
(3, 18, 4, 4, '2024-04-05 02:01:41'),
(4, 1, 1, 3, '2024-04-05 02:04:29'),
(5, 1, 1, 5, '2024-04-05 02:04:43'),
(6, 3, 1, 5, '2024-04-05 02:05:32'),
(7, 18, 6, 1, '2024-04-05 02:20:08'),
(8, 18, 7, 3, '2024-04-05 02:20:24'),
(9, 21, 6, 4, '2024-04-05 02:26:46'),
(10, 21, 8, 5, '2024-04-05 04:41:05'),
(11, 19, 8, 3, '2024-04-05 04:42:20'),
(12, 18, 9, 5, '2024-04-05 07:06:55'),
(13, 19, 9, 3, '2024-04-05 07:09:00'),
(14, 19, 11, 3, '2024-04-05 07:18:40'),
(15, 19, 11, 4, '2024-04-05 07:19:08'),
(16, 19, 11, 3, '2024-04-05 07:23:58'),
(17, 19, 11, 3, '2024-04-05 07:24:34'),
(18, 19, 11, 1, '2024-04-05 07:25:28'),
(19, 19, 11, 1, '2024-04-05 07:25:33'),
(20, 19, 11, 5, '2024-04-05 07:25:41'),
(21, 19, 10, 3, '2024-04-05 07:26:53'),
(22, 19, 4, 3, '2024-04-05 07:31:27'),
(23, 19, 4, 2, '2024-04-05 07:33:41'),
(24, 19, 11, 3, '2024-04-05 07:34:01'),
(25, 19, 4, 3, '2024-04-05 07:34:23'),
(26, 19, 4, 3, '2024-04-05 07:36:11'),
(27, 19, 4, 3, '2024-04-05 07:37:16'),
(28, 19, 4, 4, '2024-04-05 07:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipe_id` int(11) NOT NULL,
  `diet` text NOT NULL,
  `cuisinetype` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `ingred` text NOT NULL,
  `instructions` text NOT NULL,
  `img_url` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `diet`, `cuisinetype`, `title`, `description`, `ingred`, `instructions`, `img_url`, `user_id`) VALUES
(1, 'Diary Free', 'Canadian', 'Lemon-Coconut Almond Cake', 'This moist Lemon-Coconut Almond Flour Cake is good is not just a treat for those following a gluten-free or dairy-free diet but a delightful dessert everyone will love. The perfect cake for any occasion!\r\n', 'Almond Flour, Sweetener, Lemons, Eggs, Extract, Salt, Coconut Whipped Cream, Coconut', 'Combine All the Ingredients: Stir in a quarter of the egg whites to the yolk mixture with a rubber spatula. Then, gently fold the remaining egg whites and half of the almond flour into the yolk mixture. Gently fold in the rest of the flour until it’s all blended.\r\n\r\nBake: Pour the batter into the prepared pan and bake for 30 to 35 minutes until the top is golden and springy to the touch.\r\n\r\nRemove the Cake from the Pan: Let the hot cake cool on a wire rack for 5 minutes. Then, run a butter knife along the edges of the pan and invert it onto the rack. Remove the sides and bottom of the springform pan and peel off the parchment. Turn the cake right side up and let it cool completely.\r\n\r\nDecorate the Cake: Before serving the lemon almond coconut cake, spread the whipped coconut cream over the top and sprinkle it with toasted coconut.\r\n', 'Coconut-Lemon-Almond-Cake-2.jpg', 18),
(2, 'Gluten Free', 'Canadian', 'Berry Cottage Cheese Breakfast Bowl', 'I love cottage cheese, and now that the weather is warmer, I love eating it with fresh berries. It’s so simple and quick to whip up, topped with blackberries, raspberries, blueberries, sliced strawberries, and slivered almonds. Excellent for breakfast or snack and an easy way to get more protein in your day, a whopping 19 grams! If you’re not a fan of the taste of cottage cheese, you can use yogurt instead. For more recipes that use cottage cheese, see my Savory Cottage Cheese Bowl and Protein Oat Waffles recipes.', '¾ cup low fat cottage cheese, I like Good Culture, 1/4 cup each blackberries, raspberries, blueberries, sliced strawberries, 2 tablespoons slivered almonds, drizzle of honey or maple syrup, optional\r\n', 'Put cottage cheese in a small bowl and top with berries.\r\nAdd slivered almonds and honey or maple syrup if using.\r\n', 'Very-Berry-Cottage-Cheese-Bowl-7.jpg', 18),
(4, 'Diary Free', 'Indian', 'Indian Shrimp Curry', 'Indian curries at my favorite restaurants have always been difficult to enjoy on Weight Watchers because of the heavy use of cream in recipes. I wish I could say that recreating those recipes at home was a breeze, but most people are pretty intimidated by cooking Indian food.\r\n', '1 tablespoon  canola oil, divided, 1 pound shrimp, peeled and deveined, 1/2 yellow onion, finely chopped, 1 teaspoon ground ginger, 1 teaspoon ground cumin, 1 teaspoon ground coriander, 1 1/2 teaspoons ground turmeric, 1 teaspoon curry powder, 1 teaspoon paprika, 1/2 teaspoon chili powder, 2 cloves garlic, minced,  \r\n1 15 ounce can tomato sauce, 3/4 cup lite canned coconut milk, /2 teaspoon Kosher salt, cilantro and chili peppers for garnish\r\n', 'Add 2 teaspoons of the canola oil on high heat in a large skillet.\r\nAdd the shrimp and cook for 1 minute on each side then remove the shrimp from the pan.\r\nAdd the remaining teaspoon of the canola oil to the skillet with the onions.\r\nCook the onions for 5 minutes on medium heat, stirring occasionally.\r\nAdd in the ginger, cumin, coriander, turmeric, paprika, curry powder, chili powder, salt and garlic.\r\nStir well, letting cook for 30 seconds then add in the tomato sauce and combine.\r\nAdd in the coconut milk and shrimp to the pan and stir well.\r\nGarnish with cilantro and chili peppers if desired.', 'Indian-Shrimp-Curry-6-550x844.jpg', 18),
(6, 'High Protein', 'Chinees', 'Chicken Florentine', 'Chicken breast can be so boring, so when I make it for dinner, I need to find ways to make me fall in love. This simple Chicken Florentine recipe made with a creamy spinach sauce, most certainly did! This chicken recipe is a variation of the popular Fish Florentine and Marry Me Chicken, so good over pasta, with roasted potatoes or any grain you like. It’s so easy to make, and my picky husband loved it!', 'Chicken: I used boneless, skinless chicken breasts sliced into chicken cutlets, but chicken thighs would also work, \r\nSeasoning: Kosher salt, black pepper and garlic powder. You can add dried herbs like oregano or thyme,\r\nFlour: If you’re gluten-free, use a gluten-free flour mixture instead of all- purpose to dredge the chicken. You can omit this to keep it low carb,\r\nShallots and Garlic give the sauce great flavor,\r\nVegetables: Red bell pepper and baby spinach. You can sub tomatoes for the pepper, if you wish,\r\nCream: I use small amounts of reduced-fat cream cheese and half-and- half for a healthy chicken Florentine that’s still creamy,\r\nBroth: You’ll need three-quarters of a cup of chicken broth. You can also use half broth, and half dry white wine like a sauvignon blanc or Pinot grigio,\r\nParmesan Cheese: Add Parmesan to the Florentine sauce and save some for topping your chicken,', 'Gently pound the thicker end of the breast to 1/2-inch thickness so the chicken cooks evenly. Season chicken on both sides with 1 teaspoon salt, garlic powder and black pepper, to taste.\r\nDredge each chicken piece in flour, shaking off any excess.\r\nHeat 1 tablespoon of olive oil in a large deep skillet over medium heat. Add the chicken and cook for about 3 to 4 minutes per side or until the chicken is cooked through and has a golden-brown crust. Remove the chicken from the skillet and set it aside and wipe the skillet.\r\nIn the same skillet, reduce heat to medium-low and add the remaining 1/2 tablespoon of olive oil. Add the minced shallot and garlic and sauté for about 2-3 minutes until they become fragrant and translucent.\r\nAdd the bell pepper and spinach, season with a pinch of salt and pepper and cover, cook until the spinach wilts down stirring 2 to 3 times, about 4 to 5 minutes.\r\nReduce the heat to low, and then add the cream cheese, chicken broth, half-and- half, 1/4 teaspoon salt and parmesan cheese and mix well until cream cheese is melted and the sauce is well combined.\r\nReturn the chicken and any of its juices to the skillet with the spinach and let it simmer in the sauce for a few minutes until heated through.', 'chicken-florentine-4.jpg', 20),
(7, 'High Protein', 'Chinese', 'Grilled Chicken and Zucchini Yakitori', 'Chicken Yakitori reminds me of my college days in Soho living on a student budget. Me and my girlfriend met after class 3 to 4 times a week in this cute little Japanese restaurant in the Village where paper origami birds hung from the ceiling. I was broke, so I usually ordered the chicken yakitori off the appetizer menu which always came with a bowl of white rice. I recreated that dish, only I added some zucchini as well to add some veggies.', '2 tablespoons mirin sake,\r\n1/2 cup low sodium soy sauce, for GF use low sodium Tamari,\r\n1 1/2 tablespoons honey,\r\n1 garlic clove, crushed,\r\n1 lb boneless skinless chicken thighs, all fat trimmed (Purdue Fit & Easy),\r\n5 large green onions, cut 1-inch-long,\r\n1 medium zucchini, sliced into 1/2-inch thick rings,\r\n18 10 inch bamboo skewers', 'Bring mirin, low sodium soy sauce, honey and crushed garlic to a boil in a medium-sized sauce pan, and cook over medium heat for about 5 minutes.\r\nSet aside to cool.\r\nCut the chicken into 1-inch pieces and place in a ziplock bag; pour half of the marinade over the chicken.\r\nPlace the zucchini in a second large ziplock bag and pour the remaining marinade over the zucchini.\r\nRefrigerate for at least 30 minutes.\r\nMeanwhile, soak the skewers in water 30 minutes so they don\'t burn.\r\nThread the chicken onto skewers, alternating with green onion so that each stick has 3 cubes of chicken and two pieced of green onion, discarding the chicken marinade.\r\nThread the zucchini onto skewers, alternating with remaining green onion, reserving the marinade for basting.\r\nPreheat the grill or a grill pan over medium-high heat.\r\nWhen hot, spray with oil then reduced heat to medium; grill the zucchini and chicken skewers about 5 to 6 minutes on each side brushing both sides of the skewers with the yakitori sauce during the last few minutes of cooking time.', 'grilled-chicken-and-zucchini-yakitori-550x795.jpg', 18),
(8, 'High Protein', 'Chinese', 'Crispy Togarashi Chicken with Sesame Cucumber Relish', 'This is great served over brown rice. Other breaded chicken cutlet recipes you might enjoy are Chicken Cutlets with Deconstructed Guac and Broccoli and Cheese stuffed Chicken.', 'Cucumber Relish\r\n\r\n2 tablespoons unseasoned rice vinegar,\r\n1 teaspoon sugar,\r\n1 teaspoon toasted sesame oil,\r\n½ teaspoon grated ginger,\r\n1 garlic clove, grated or finely minced,\r\n¼ teaspoon kosher salt,\r\n1 large English cucumber, seeded and diced,\r\n3 tablespoons minced red onion,\r\n1 tablespoon toasted sesame seeds,\r\n\r\nChicken\r\n\r\n1 pound 2 boneless, skinless chicken breast, cut lengthwise, into thin cutlets,\r\n2 tablespoons all-purpose flour,\r\n1 large egg, lightly beaten,\r\n1 cup whole wheat panko breadcrumbs,\r\n1 teaspoon Shichimi Togarashi , Japanese 7 Spice Blend,\r\n1/2 teaspoon kosher salt, divided,\r\nFreshly ground black pepper, to taste,\r\n1 tablespoon toasted sesame seeds,\r\nolive oil spray,\r\n4 teaspoons reduced sodium soy sauce,', 'Preheat oven to 400F degrees.\r\nIn a small bowl, whisk together vinegar, sugar, sesame oil, ginger, garlic, and salt.  Add cucumber, onion and sesame seeds and stir.  Set aside to allow flavors to combine.\r\nSeason chicken cutlets with ¼ teaspoon salt and pepper. Place flour on a shallow plate and egg in a medium bowl.  Place panko, Togarashi, ¼ teaspoon salt, pepper and sesame seeds on another shallow plate.  Dredge each cutlet lightly in flour, then egg (shaking off excess), then panko mixture.  Place on a sheet pan covered in parchment.  Spray cutlets lightly with olive oil and bake for 20 minutes, rotating pan halfway through.\r\nTop each cutlet with about 1/2 cup relish, 1 teaspoon soy sauce and sriracha (if desired). Serve.', 'Japanese-Chicken-with-Cukes-3.jpg', 18),
(9, 'Vegetarian', 'Italian', 'Beef Negimaki Stir Fry', 'This Beef Negimaki Stir Fry takes all the delicious flavors of beef negimaki and puts them into a stir fry, so dinner is ready in under 30 minutes. Although green beans aren’t part of traditional negimaki, they’re added to this stir fry for extra vegetables. The flank steak, green beans, and scallions are covered in a sweet and savory sauce and served over watercress for a light dinner. Rice is optional, but I personally love it and thought it was great as a side. For more beef stir fry recipes, try my Broccoli Beef, Skirt Steak, Baby Bok Choy, and Zucchini Stir Fry, and Spiralized Shanghai Beef and Broccoli.', '1 pound flank steak,\r\nSea salt and freshly ground black pepper,\r\n1/4 cup sake or dry white wine, optional,\r\n1/4 cup gluten-free tamari or coconut aminos,\r\n2 tablespoons rice vinegar or white wine vinegar,\r\n1 tablespoon clover honey or pure maple syrup,\r\nCoconut or avocado oil,\r\n8 ounces French green beans, cut in half,\r\n1 bunch scallions, green parts only, cut into 1-inch pieces,\r\n5 ounces watercress, about 4 cups packed', 'Slice the steak as thinly as possible against the grain. Season generously with salt and pepper. Set aside.\r\nIn a small bowl, stir together the sake (if using), tamari, vinegar, and honey until dissolved.\r\nSet a large wok or heavy-bottomed skillet over high heat. Add a thin layer of oil and arrange the steak in an even layer.\r\nBrown the meat, flipping once, until there’s a dark sear on both sides, about 3 minutes total. Transfer to a bowl.\r\nbeef in wok \r\nAdd the green beans and sauce to the pan. Simmer vigorously, stirring occasionally, until the sauce has reduced by half and the beans are al dente, about 3 minutes.\r\nReturn the beef to the pan along with the scallions and toss to coat in the sauce.\r\nTo serve, arrange the watercress on a platter and top with the beef stir-fry and sauce. Serve immediately alongside white rice, if you like.', 'Beef-Negimaki-Stir-Fry-9.jpg', 19),
(10, 'High Protein', 'Italian', 'Beef Negimaki Stir Fry', 'This Beef Negimaki Stir Fry takes all the delicious flavors of beef negimaki and puts them into a stir fry, so dinner is ready in under 30 minutes. Although green beans aren’t part of traditional negimaki, they’re added to this stir fry for extra vegetables. The flank steak, green beans, and scallions are covered in a sweet and savory sauce and served over watercress for a light dinner. Rice is optional, but I personally love it and thought it was great as a side. For more beef stir fry recipes, try my Broccoli Beef, Skirt Steak, Baby Bok Choy, and Zucchini Stir Fry, and Spiralized Shanghai Beef and Broccoli.', '1 pound flank steak,\r\nSea salt and freshly ground black pepper,\r\n1/4 cup sake or dry white wine, optional,\r\n1/4 cup gluten-free tamari or coconut aminos,\r\n2 tablespoons rice vinegar or white wine vinegar,\r\n1 tablespoon clover honey or pure maple syrup,\r\nCoconut or avocado oil,\r\n8 ounces French green beans, cut in half,\r\n1 bunch scallions, green parts only, cut into 1-inch pieces,\r\n5 ounces watercress, about 4 cups packed', 'Slice the steak as thinly as possible against the grain. Season generously with salt and pepper. Set aside.\r\nIn a small bowl, stir together the sake (if using), tamari, vinegar, and honey until dissolved.\r\nSet a large wok or heavy-bottomed skillet over high heat. Add a thin layer of oil and arrange the steak in an even layer.\r\nBrown the meat, flipping once, until there’s a dark sear on both sides, about 3 minutes total. Transfer to a bowl.\r\nbeef in wok \r\nAdd the green beans and sauce to the pan. Simmer vigorously, stirring occasionally, until the sauce has reduced by half and the beans are al dente, about 3 minutes.\r\nReturn the beef to the pan along with the scallions and toss to coat in the sauce.\r\nTo serve, arrange the watercress on a platter and top with the beef stir-fry and sauce. Serve immediately alongside white rice, if you like.', 'Beef-Negimaki-Stir-Fry-3.jpg', 19),
(11, 'Weight Watchers', 'Japanese', 'Arugula Salad', 'This healthy Arugula Salad with shaved parmesan requires no chopping, takes just minutes to whip up, and is so good! I make it all the time, and can’t believe I have never posted it here. It’s the perfect side dish with so many meals, or you can double the portion and add grilled shrimp, salmon, or chicken to make it a main dish. For more arugula salad recipes, try my Arugula Salmon Salad with Capers and Shaved Parmesan, or this Peach Arugula Salad.', '6 cups baby arugula, 4 oounces,\r\n2 tablespoons extra virgin olive oil,\r\n1/2 large lemon,\r\n1/4 teaspoon kosher salt,\r\nblack pepper, to taste,\r\n1 ounce shaved Parmesan Cheese, about 1/2 cup', 'Add arugula to a bowl, toss with 2 tablespoons of olive oil, juice from 1/2 lemon, 1/4 teaspoon kosher salt and black pepper.\r\nTo serve, divide 1 cup arugula on each plate and top each with 2 tablespoons shaved Parmesan cheese.\r\n', 'Arugula-Salad-4.jpg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'rajpatiala', 'rajkhanna1091@gmail.com', 'Pass@123#@'),
(3, 'karan', 'karan@patiala.com', 'Pass@123'),
(4, 'karan', 'karan@patiala.com', 'Pass@123'),
(5, 'jashan', 'jashan@patiala.com', '123456'),
(7, 'rajkhanna1091@gmail.', 'rajkhanna1091@gmail.com', '123456'),
(10, 'mukesh', 'mukesh@patiala.com', '12345'),
(12, 'arjun', 'arjun@patiala.com', 'Pass@123#@'),
(13, 'arjun', 'arjun@patiala.com', 'Pass@123#@'),
(14, 'suman', 'suman@patiala.om', '123456'),
(15, 'kapil', 'kapil@patiala.com', '123456'),
(16, 'kapil', 'kapil@patiala.com', '123456'),
(17, 'kapil', 'kapil@patiala.com', '123456'),
(18, 'stream', 'stream@patiala.com', 'Pass@123#@'),
(19, 'navot123', 'navjot@123', 'pass@123#@'),
(20, 'Perjinder123', 'perjinder@123', 'Pass@123#@'),
(21, 'ujjwal', 'khannaujjwal123@mail.com', 'Iamujjwal2000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favour`
--
ALTER TABLE `favour`
  ADD PRIMARY KEY (`favid`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favour`
--
ALTER TABLE `favour`
  MODIFY `favid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
