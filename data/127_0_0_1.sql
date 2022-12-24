SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `pets` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pets`;

CREATE TABLE `ads` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `pet_id` int(11) NOT NULL,
  `advertised_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `ads` (`id`, `pet_id`, `advertised_date`) VALUES
(100, 1380, '2022-03-11 14:49:48'),
(103, 1374, '2022-03-02 14:49:48'),
(126, 1373, '2022-02-09 14:49:48'),
(128, 1371, '2022-01-16 14:49:48'),
(140, 1382, '2022-03-02 14:49:48'),
(171, 1376, '2022-02-17 14:49:48'),
(186, 1377, '2022-02-02 14:49:48'),
(220, 1375, '2022-04-03 14:49:48'),
(285, 1383, '2022-04-20 14:49:48'),
(318, 1387, '2022-04-13 14:49:48'),
(372, 1345, '2022-01-05 14:49:48'),
(559, 1336, '2022-12-20 23:04:22'),
(560, 1296, '2022-12-20 23:04:22'),
(562, 1329, '2022-12-20 23:04:23'),
(563, 1308, '2022-12-20 23:04:23'),
(564, 1364, '2022-12-20 23:04:23'),
(565, 1301, '2022-12-20 23:04:23'),
(566, 1326, '2022-12-20 23:04:23'),
(567, 1334, '2022-12-20 23:04:23'),
(568, 1300, '2022-12-20 23:04:23'),
(569, 1309, '2022-12-20 23:04:23'),
(570, 1355, '2022-12-20 23:04:23'),
(572, 1318, '2022-12-20 23:04:23'),
(574, 1335, '2022-12-20 23:04:23'),
(577, 1369, '2022-12-20 23:04:23'),
(578, 1324, '2022-12-20 23:04:23'),
(580, 1358, '2022-12-20 23:04:24'),
(581, 1323, '2022-12-20 23:04:24'),
(582, 1351, '2022-12-20 23:04:24'),
(584, 1338, '2022-12-20 23:04:24'),
(585, 1307, '2022-12-20 23:04:24'),
(587, 1356, '2022-12-20 23:04:24'),
(588, 1388, '2022-12-20 23:04:24'),
(589, 1378, '2022-12-20 23:04:24'),
(590, 1337, '2022-12-20 23:04:24'),
(591, 1359, '2022-12-20 23:04:24'),
(592, 1291, '2022-12-20 23:04:24'),
(593, 1391, '2022-12-20 23:04:24'),
(596, 1311, '2022-12-20 23:04:24'),
(597, 1347, '2022-12-20 23:04:24'),
(598, 1310, '2022-12-20 23:04:24'),
(599, 1321, '2022-12-20 23:04:24'),
(602, 1352, '2022-12-20 23:04:24'),
(603, 1294, '2022-12-20 23:04:24'),
(604, 1327, '2022-12-20 23:04:24'),
(605, 1362, '2022-12-20 23:04:24'),
(607, 1299, '2022-12-20 23:04:24'),
(609, 1313, '2022-12-20 23:04:25'),
(613, 1314, '2022-12-20 23:04:25'),
(617, 1384, '2022-12-20 23:04:25'),
(625, 1319, '2022-12-20 23:04:25'),
(626, 1322, '2022-12-20 23:04:25'),
(627, 1363, '2022-12-20 23:04:25'),
(637, 1297, '2022-12-20 23:04:25'),
(642, 1304, '2022-12-20 23:04:26'),
(646, 1357, '2022-12-20 23:04:26'),
(647, 1341, '2022-12-20 23:04:26'),
(650, 1330, '2022-12-20 23:04:26'),
(652, 1339, '2022-12-20 23:04:26'),
(654, 1360, '2022-12-20 23:04:26'),
(656, 1366, '2022-12-20 23:04:26'),
(657, 1315, '2022-12-20 23:04:26'),
(659, 1303, '2022-12-20 23:04:26'),
(660, 1361, '2022-12-20 23:04:26'),
(663, 1389, '2022-12-20 23:04:26'),
(666, 1320, '2022-12-20 23:04:26'),
(674, 1325, '2022-12-20 23:04:27'),
(675, 1333, '2022-12-20 23:04:27'),
(682, 1372, '2022-12-20 23:04:27'),
(689, 1317, '2022-12-20 23:04:27'),
(692, 1350, '2022-12-20 23:04:27'),
(699, 1381, '2022-12-20 23:04:27'),
(701, 1354, '2022-12-20 23:04:28'),
(702, 1367, '2022-12-20 23:04:28'),
(710, 1343, '2022-12-20 23:04:28'),
(711, 1368, '2022-12-20 23:04:28'),
(719, 1312, '2022-12-20 23:04:28'),
(720, 1342, '2022-12-20 23:04:28'),
(721, 1379, '2022-12-20 23:04:28'),
(724, 1305, '2022-12-20 23:04:28'),
(734, 1340, '2022-12-20 23:04:29'),
(735, 1306, '2022-12-20 23:04:29'),
(741, 1316, '2022-12-20 23:04:29'),
(742, 1293, '2022-12-20 23:04:29'),
(746, 1295, '2022-12-20 23:04:29'),
(747, 1348, '2022-12-20 23:04:29'),
(766, 1353, '2022-12-20 23:04:30'),
(781, 1328, '2022-12-20 23:04:30'),
(792, 1302, '2022-12-20 23:04:31'),
(797, 1349, '2022-12-20 23:04:31'),
(823, 1390, '2022-12-20 23:04:32'),
(836, 1386, '2022-12-20 23:04:32'),
(851, 1385, '2022-12-20 23:04:32'),
(864, 1365, '2022-12-20 23:04:33'),
(871, 1331, '2022-12-20 23:04:33'),
(976, 1298, '2022-12-20 23:04:37'),
(1000, 1332, '2022-12-20 23:04:37'),
(1072, 1344, '2022-12-20 23:04:40'),
(1830, 1370, '2022-12-21 00:19:12'),
(3650, 1292, '2022-12-21 01:20:27'),
(3652, 1346, '2022-12-21 01:20:27');

CREATE TABLE `breeds` (
  `breed_id` int(11) NOT NULL,
  `isFeline` tinyint(1) NOT NULL,
  `image_link` varchar(255) NOT NULL,
  `length` varchar(255) NOT NULL,
  `good_with_children` int(11) NOT NULL,
  `good_with_dogs` int(11) NOT NULL,
  `shedding` int(11) NOT NULL,
  `grooming` int(11) NOT NULL,
  `drooling` int(11) NOT NULL,
  `coat_length` int(11) NOT NULL,
  `good_with_strangers` int(11) NOT NULL,
  `playfulness` int(11) NOT NULL,
  `protectiveness` int(11) NOT NULL,
  `trainability` int(11) NOT NULL,
  `energy` int(11) NOT NULL,
  `vocal_communication` int(11) NOT NULL,
  `min_life_expectancy` int(11) NOT NULL,
  `max_life_expectancy` int(11) NOT NULL,
  `max_height_male` int(11) NOT NULL,
  `max_height_female` int(11) NOT NULL,
  `max_weight_male` int(11) NOT NULL,
  `max_weight_female` int(11) NOT NULL,
  `min_height_male` int(11) NOT NULL,
  `min_height_female` int(11) NOT NULL,
  `min_weight_male` int(11) NOT NULL,
  `min_weight_female` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `intelligence` int(11) NOT NULL,
  `other_pets_friendly` int(11) NOT NULL,
  `family_friendly` int(11) NOT NULL,
  `general_health` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `breeds` (`breed_id`, `isFeline`, `image_link`, `length`, `good_with_children`, `good_with_dogs`, `shedding`, `grooming`, `drooling`, `coat_length`, `good_with_strangers`, `playfulness`, `protectiveness`, `trainability`, `energy`, `vocal_communication`, `min_life_expectancy`, `max_life_expectancy`, `max_height_male`, `max_height_female`, `max_weight_male`, `max_weight_female`, `min_height_male`, `min_height_female`, `min_weight_male`, `min_weight_female`, `name`, `origin`, `intelligence`, `other_pets_friendly`, `family_friendly`, `general_health`) VALUES
(1, 0, 'https://api-ninjas.com/images/dogs/airedale_terrier.jpg', 'Large', 3, 3, 1, 3, 1, 2, 3, 3, 5, 3, 3, 3, 11, 14, 23, 23, 70, 70, 23, 23, 50, 50, 'Airedale Terrier', 'Canada', 5, 3, 4, 4),
(2, 0, 'https://api-ninjas.com/images/dogs/akita.jpg', 'Large', 3, 1, 3, 3, 1, 1, 2, 3, 5, 3, 4, 2, 10, 14, 28, 28, 130, 100, 26, 26, 100, 70, 'Akita', 'Belgium', 1, 4, 1, 3),
(3, 0, 'https://api-ninjas.com/images/dogs/american_staffordshire_terrier.jpg', 'Large', 3, 3, 2, 1, 1, 1, 4, 3, 5, 3, 3, 3, 12, 16, 19, 19, 70, 55, 18, 18, 55, 40, 'American Staffordshire Terrier', 'Canada', 4, 5, 5, 3),
(4, 0, 'https://api-ninjas.com/images/dogs/anatolian_shepherd_dog.jpg', 'Large', 3, 3, 3, 2, 1, 1, 1, 3, 5, 2, 3, 3, 11, 13, 29, 29, 150, 120, 29, 29, 110, 80, 'Anatolian Shepherd Dog', 'Belgium', 5, 4, 1, 3),
(5, 0, 'https://api-ninjas.com/images/dogs/black_russian_terrier.jpg', 'Large', 3, 3, 3, 4, 3, 2, 2, 3, 5, 4, 4, 3, 10, 12, 30, 30, 130, 130, 27, 27, 80, 80, 'Black Russian Terrier', 'Canada', 3, 1, 4, 2),
(6, 0, 'https://api-ninjas.com/images/dogs/boerboel.jpg', 'Large', 4, 2, 3, 2, 3, 1, 3, 3, 5, 4, 3, 3, 9, 11, 27, 27, 200, 200, 24, 24, 150, 150, 'Boerboel', 'Belgium', 5, 1, 3, 2),
(7, 0, 'https://api-ninjas.com/images/dogs/bullmastiff.jpg', 'Large', 3, 3, 3, 1, 3, 1, 3, 3, 5, 4, 4, 1, 7, 9, 27, 27, 130, 120, 25, 25, 110, 100, 'Bullmastiff', 'Canada', 4, 5, 2, 2),
(8, 0, 'https://api-ninjas.com/images/dogs/cane_corso.jpg', 'Large', 3, 3, 2, 1, 3, 1, 3, 3, 5, 4, 4, 3, 9, 12, 28, 28, 110, 99, 25, 25, 99, 88, 'Cane Corso', 'Belgium', 4, 5, 4, 5),
(9, 0, 'https://api-ninjas.com/images/dogs/caucasian_shepherd_dog.jpg', 'Large', 3, 2, 4, 3, 4, 1, 2, 2, 5, 3, 3, 2, 10, 12, 30, 30, 170, 170, 23, 23, 99, 99, 'Caucasian Shepherd Dog', 'Canada', 2, 1, 5, 5),
(10, 0, 'https://api-ninjas.com/images/dogs/central_asian_shepherd_dog.jpg', 'Large', 3, 3, 3, 1, 3, 1, 1, 3, 5, 4, 3, 3, 12, 15, 31, 27, 170, 140, 26, 24, 110, 88, 'Central Asian Shepherd Dog', 'Belgium', 3, 2, 5, 1),
(11, 0, 'https://api-ninjas.com/images/dogs/chow_chow.jpg', 'Large', 3, 2, 3, 3, 3, 1, 2, 3, 5, 3, 3, 1, 8, 12, 20, 20, 70, 70, 17, 17, 45, 45, 'Chow Chow', 'Canada', 4, 2, 3, 5),
(12, 0, 'https://api-ninjas.com/images/dogs/croatian_sheepdog.jpg', 'Large', 3, 3, 2, 1, 3, 1, 2, 3, 5, 3, 3, 3, 13, 14, 20, 20, 44, 44, 16, 16, 29, 29, 'Croatian Sheepdog', 'Belgium', 1, 3, 2, 3),
(13, 0, 'https://api-ninjas.com/images/dogs/czechoslovakian_vlcak.jpg', 'Large', 1, 1, 5, 2, 3, 1, 3, 3, 5, 3, 3, 3, 10, 15, 26, 26, 66, 57, 24, 24, 66, 57, 'Czechoslovakian Vlcak', 'Canada', 2, 5, 3, 2),
(14, 0, 'https://api-ninjas.com/images/dogs/doberman_pinscher.jpg', 'Large', 5, 3, 4, 1, 2, 1, 4, 4, 5, 5, 5, 3, 10, 12, 28, 28, 100, 90, 26, 26, 75, 60, 'Doberman Pinscher', 'Belgium', 5, 1, 3, 2),
(15, 0, 'https://api-ninjas.com/images/dogs/dogo_argentino.jpg', 'Large', 3, 3, 4, 1, 3, 1, 4, 4, 5, 5, 5, 3, 9, 15, 27, 27, 100, 100, 24, 24, 80, 80, 'Dogo Argentino', 'Canada', 3, 2, 5, 5),
(16, 0, 'https://api-ninjas.com/images/dogs/dogue_de_bordeaux.jpg', 'Large', 3, 3, 4, 1, 5, 1, 3, 3, 5, 4, 3, 3, 5, 8, 23, 23, 140, 140, 23, 23, 120, 120, 'Dogue de Bordeaux', 'Belgium', 3, 1, 2, 2),
(17, 0, 'https://api-ninjas.com/images/dogs/dutch_shepherd.jpg', 'Large', 3, 3, 3, 2, 2, 1, 3, 4, 5, 5, 5, 2, 11, 14, 25, 25, 75, 75, 22, 22, 42, 42, 'Dutch Shepherd', 'Canada', 3, 3, 3, 5),
(18, 0, 'https://api-ninjas.com/images/dogs/entlebucher_mountain_dog.jpg', 'Large', 3, 5, 3, 1, 2, 1, 3, 3, 5, 3, 5, 3, 11, 13, 21, 21, 65, 55, 17, 17, 50, 40, 'Entlebucher Mountain Dog', 'Belgium', 5, 2, 1, 3),
(19, 0, 'https://api-ninjas.com/images/dogs/estrela_mountain_dog.jpg', 'Large', 5, 3, 3, 2, 4, 1, 2, 3, 5, 4, 3, 3, 10, 14, 29, 29, 132, 132, 25, 25, 77, 77, 'Estrela Mountain Dog', 'Canada', 5, 2, 2, 1),
(20, 0, 'https://api-ninjas.com/images/dogs/german_shepherd_dog.jpg', 'Large', 5, 3, 4, 2, 2, 1, 3, 4, 5, 5, 5, 3, 7, 10, 26, 26, 90, 70, 24, 24, 65, 50, 'German Shepherd Dog', 'Belgium', 4, 4, 2, 1),
(21, 0, 'https://api-ninjas.com/images/dogs/alaskan_malamute.jpg', 'Large', 3, 3, 3, 3, 1, 1, 3, 3, 4, 5, 4, 3, 10, 14, 25, 25, 85, 75, 25, 25, 85, 75, 'Alaskan Malamute', 'Canada', 4, 4, 1, 2),
(22, 0, 'https://api-ninjas.com/images/dogs/australian_cattle_dog.jpg', 'Large', 3, 3, 3, 1, 1, 1, 3, 3, 4, 4, 5, 1, 12, 16, 20, 20, 50, 50, 18, 18, 35, 35, 'Australian Cattle Dog', 'Belgium', 4, 1, 1, 2),
(23, 0, 'https://api-ninjas.com/images/dogs/australian_kelpie.jpg', 'Large', 3, 3, 3, 1, 1, 1, 3, 3, 4, 4, 5, 1, 10, 13, 20, 20, 50, 50, 17, 17, 35, 35, 'Australian Kelpie', 'Canada', 3, 4, 2, 2),
(24, 0, 'https://api-ninjas.com/images/dogs/australian_terrier.jpg', 'Large', 5, 3, 1, 2, 1, 1, 3, 4, 4, 4, 4, 5, 11, 15, 11, 11, 20, 20, 10, 10, 15, 15, 'Australian Terrier', 'Belgium', 5, 4, 3, 5),
(25, 0, 'https://api-ninjas.com/images/dogs/beauceron.jpg', 'Large', 3, 3, 4, 3, 1, 1, 2, 3, 4, 3, 5, 3, 10, 12, 28, 28, 110, 110, 26, 26, 70, 70, 'Beauceron', 'Canada', 2, 3, 4, 4),
(26, 0, 'https://api-ninjas.com/images/dogs/bedlington_terrier.jpg', 'Large', 3, 3, 1, 3, 1, 1, 3, 3, 4, 3, 4, 3, 11, 16, 18, 18, 23, 23, 15, 15, 17, 17, 'Bedlington Terrier', 'Belgium', 4, 3, 1, 3),
(27, 0, 'https://api-ninjas.com/images/dogs/belgian_laekenois.jpg', 'Large', 3, 3, 3, 2, 1, 1, 3, 3, 4, 5, 4, 3, 10, 12, 26, 26, 65, 65, 24, 24, 55, 55, 'Belgian Laekenois', 'Canada', 3, 5, 2, 3),
(28, 0, 'https://api-ninjas.com/images/dogs/belgian_malinois.jpg', 'Large', 3, 3, 3, 2, 1, 1, 3, 3, 4, 5, 4, 3, 14, 16, 26, 26, 80, 60, 24, 24, 60, 40, 'Belgian Malinois', 'Belgium', 3, 4, 2, 5),
(29, 0, 'https://api-ninjas.com/images/dogs/belgian_sheepdog.jpg', 'Large', 3, 3, 3, 2, 1, 1, 3, 3, 4, 5, 4, 3, 12, 14, 26, 26, 75, 60, 24, 24, 55, 45, 'Belgian Sheepdog', 'Canada', 4, 1, 2, 2),
(30, 0, 'https://api-ninjas.com/images/dogs/belgian_tervuren.jpg', 'Large', 3, 3, 3, 2, 1, 1, 3, 3, 4, 5, 4, 3, 12, 14, 26, 26, 75, 60, 24, 24, 55, 45, 'Belgian Tervuren', 'Belgium', 2, 4, 4, 4),
(31, 0, 'https://api-ninjas.com/images/dogs/bergamasco_sheepdog.jpg', 'Large', 3, 3, 1, 1, 2, 1, 3, 3, 4, 3, 3, 1, 13, 15, 24, 24, 84, 71, 24, 24, 70, 57, 'Bergamasco Sheepdog', 'Canada', 3, 5, 4, 4),
(32, 0, 'https://api-ninjas.com/images/dogs/berger_picard.jpg', 'Large', 3, 3, 3, 1, 1, 1, 3, 3, 4, 4, 4, 2, 12, 13, 26, 26, 70, 70, 24, 24, 50, 50, 'Berger Picard', 'Belgium', 1, 3, 2, 2),
(33, 0, 'https://api-ninjas.com/images/dogs/bouvier_des_flandres.jpg', 'Large', 3, 3, 3, 4, 2, 1, 3, 3, 4, 4, 4, 3, 10, 12, 28, 28, 110, 110, 25, 25, 70, 70, 'Bouvier des Flandres', 'Canada', 2, 3, 3, 2),
(34, 0, 'https://api-ninjas.com/images/dogs/boxer.jpg', 'Large', 5, 3, 2, 2, 3, 1, 4, 4, 4, 4, 4, 3, 10, 12, 25, 25, 80, 65, 23, 23, 65, 50, 'Boxer', 'Belgium', 1, 1, 2, 2),
(35, 0, 'https://api-ninjas.com/images/dogs/briard.jpg', 'Large', 3, 3, 1, 4, 2, 1, 3, 3, 4, 3, 3, 1, 12, 12, 27, 27, 100, 100, 23, 23, 55, 55, 'Briard', 'Canada', 5, 4, 2, 4),
(36, 0, 'https://api-ninjas.com/images/dogs/broholmer.jpg', 'Large', 3, 3, 3, 1, 3, 1, 3, 3, 4, 3, 2, 1, 8, 10, 30, 30, 150, 150, 28, 28, 90, 90, 'Broholmer', 'Belgium', 3, 3, 4, 4),
(37, 0, 'https://api-ninjas.com/images/dogs/cairn_terrier.jpg', 'Large', 3, 3, 2, 2, 1, 1, 3, 4, 4, 3, 3, 4, 13, 15, 10, 10, 14, 13, 10, 10, 14, 13, 'Cairn Terrier', 'Canada', 1, 3, 2, 2),
(38, 0, 'https://api-ninjas.com/images/dogs/canaan_dog.jpg', 'Large', 3, 3, 4, 2, 1, 1, 3, 3, 4, 4, 3, 5, 12, 15, 24, 24, 55, 45, 20, 20, 45, 35, 'Canaan Dog', 'Belgium', 1, 4, 5, 3),
(39, 0, 'https://api-ninjas.com/images/dogs/catahoula_leopard_dog.jpg', 'Large', 3, 3, 3, 2, 2, 1, 3, 3, 4, 4, 5, 1, 10, 14, 24, 24, 95, 95, 22, 22, 50, 50, 'Catahoula Leopard Dog', 'Canada', 4, 5, 1, 3),
(40, 0, 'https://api-ninjas.com/images/dogs/chesapeake_bay_retriever.jpg', 'Large', 3, 3, 3, 3, 2, 1, 3, 3, 4, 5, 4, 3, 10, 13, 26, 26, 80, 70, 23, 23, 65, 55, 'Chesapeake Bay Retriever', 'Belgium', 5, 3, 3, 5),
(41, 0, 'https://api-ninjas.com/images/dogs/affenpinscher.jpg', 'Large', 3, 3, 3, 3, 1, 2, 5, 3, 3, 3, 3, 3, 12, 15, 12, 12, 10, 10, 9, 9, 7, 7, 'Affenpinscher', 'Canada', 5, 1, 4, 5),
(42, 0, 'https://api-ninjas.com/images/dogs/afghan_hound.jpg', 'Large', 3, 3, 1, 4, 1, 1, 3, 3, 3, 1, 4, 3, 12, 18, 27, 27, 60, 60, 25, 25, 50, 50, 'Afghan Hound', 'Belgium', 2, 4, 1, 5),
(43, 0, 'https://api-ninjas.com/images/dogs/american_english_coonhound.jpg', 'Large', 3, 5, 2, 1, 1, 1, 3, 3, 3, 3, 4, 4, 11, 12, 26, 26, 65, 65, 24, 24, 45, 45, 'American English Coonhound', 'Canada', 4, 2, 3, 1),
(44, 0, 'https://api-ninjas.com/images/dogs/american_eskimo_dog.jpg', 'Large', 5, 3, 3, 3, 1, 1, 5, 3, 3, 4, 4, 3, 13, 15, 26, 26, 65, 65, 24, 24, 45, 45, 'American Eskimo Dog', 'Belgium', 4, 3, 1, 4),
(45, 0, 'https://api-ninjas.com/images/dogs/american_foxhound.jpg', 'Large', 5, 5, 3, 1, 1, 1, 3, 3, 3, 3, 4, 5, 11, 13, 25, 25, 70, 65, 22, 22, 65, 60, 'American Foxhound', 'Canada', 2, 3, 5, 3),
(46, 0, 'https://api-ninjas.com/images/dogs/american_hairless_terrier.jpg', 'Large', 5, 3, 1, 1, 1, 1, 3, 3, 3, 5, 3, 3, 14, 16, 16, 16, 16, 16, 12, 12, 12, 12, 'American Hairless Terrier', 'Belgium', 2, 5, 3, 4),
(47, 0, 'https://api-ninjas.com/images/dogs/american_leopard_hound.jpg', 'Large', 5, 3, 3, 1, 1, 1, 3, 3, 3, 3, 4, 3, 12, 15, 27, 27, 70, 70, 21, 21, 45, 45, 'American Leopard Hound', 'Canada', 5, 3, 5, 3),
(48, 0, 'https://api-ninjas.com/images/dogs/american_water_spaniel.jpg', 'Large', 3, 3, 1, 3, 1, 1, 3, 3, 3, 5, 3, 3, 10, 14, 18, 18, 45, 40, 15, 15, 30, 25, 'American Water Spaniel', 'Belgium', 4, 1, 3, 4),
(49, 0, 'https://api-ninjas.com/images/dogs/appenzeller_sennenhund.jpg', 'Large', 3, 3, 3, 2, 1, 1, 3, 3, 3, 3, 3, 4, 12, 15, 22, 22, 70, 70, 19, 19, 48, 48, 'Appenzeller Sennenhund', 'Canada', 1, 3, 5, 2),
(50, 0, 'https://api-ninjas.com/images/dogs/australian_shepherd.jpg', 'Large', 5, 3, 3, 2, 1, 1, 3, 4, 3, 5, 5, 3, 12, 15, 23, 23, 65, 55, 20, 20, 50, 40, 'Australian Shepherd', 'Belgium', 4, 5, 1, 3),
(51, 0, 'https://api-ninjas.com/images/dogs/australian_stumpy_tail_cattle_dog.jpg', 'Large', 3, 1, 3, 3, 1, 1, 1, 3, 3, 3, 5, 1, 12, 15, 20, 20, 45, 35, 18, 18, 38, 32, 'Australian Stumpy Tail Cattle Dog', 'Canada', 3, 2, 5, 5),
(52, 0, 'https://api-ninjas.com/images/dogs/azawakh.jpg', 'Large', 3, 3, 2, 2, 1, 1, 1, 3, 3, 2, 3, 1, 12, 15, 29, 29, 55, 44, 25, 25, 44, 33, 'Azawakh', 'Belgium', 3, 2, 4, 1),
(53, 0, 'https://api-ninjas.com/images/dogs/barbet.jpg', 'Large', 5, 5, 1, 3, 1, 2, 3, 3, 3, 4, 3, 3, 12, 14, 25, 25, 65, 65, 19, 19, 35, 35, 'Barbet', 'Canada', 3, 1, 3, 4),
(54, 0, 'https://api-ninjas.com/images/dogs/basenji.jpg', 'Large', 3, 3, 2, 1, 1, 1, 3, 3, 3, 2, 4, 1, 13, 14, 17, 17, 24, 22, 17, 17, 24, 22, 'Basenji', 'Belgium', 4, 1, 5, 3),
(55, 0, 'https://api-ninjas.com/images/dogs/basset_fauve_de_bretagne.jpg', 'Large', 5, 4, 3, 2, 1, 1, 3, 3, 3, 3, 4, 4, 12, 12, 16, 16, 35, 35, 13, 13, 27, 27, 'Basset Fauve de Bretagne', 'Canada', 3, 4, 2, 2),
(56, 0, 'https://api-ninjas.com/images/dogs/basset_hound.jpg', 'Large', 5, 5, 2, 3, 4, 1, 3, 3, 3, 3, 2, 4, 12, 13, 15, 14, 65, 65, 12, 11, 40, 40, 'Basset Hound', 'Belgium', 4, 3, 4, 4),
(57, 0, 'https://api-ninjas.com/images/dogs/bavarian_mountain_scent_hound.jpg', 'Large', 3, 3, 3, 2, 2, 1, 3, 3, 3, 4, 4, 2, 12, 15, 21, 21, 66, 66, 17, 17, 37, 37, 'Bavarian Mountain Scent Hound', 'Canada', 1, 4, 3, 1),
(58, 0, 'https://api-ninjas.com/images/dogs/bearded_collie.jpg', 'Large', 5, 5, 3, 4, 1, 1, 4, 4, 3, 3, 4, 5, 12, 14, 22, 22, 55, 55, 21, 21, 45, 45, 'Bearded Collie', 'Belgium', 5, 3, 4, 1),
(59, 0, 'https://api-ninjas.com/images/dogs/bernese_mountain_dog.jpg', 'Large', 5, 5, 5, 3, 3, 1, 4, 4, 3, 4, 4, 3, 7, 10, 28, 28, 115, 95, 25, 25, 80, 70, 'Bernese Mountain Dog', 'Canada', 1, 1, 1, 3),
(60, 0, 'https://api-ninjas.com/images/dogs/bohemian_shepherd.jpg', 'Large', 5, 3, 3, 2, 2, 1, 4, 3, 3, 4, 3, 3, 12, 15, 22, 22, 60, 53, 21, 21, 41, 37, 'Bohemian Shepherd', 'Belgium', 2, 3, 3, 1),
(61, 0, 'https://api-ninjas.com/images/dogs/beagle.jpg', 'Large', 5, 5, 3, 2, 1, 1, 3, 4, 2, 3, 4, 4, 10, 15, 16, 15, 20, 30, 14, 13, 15, 20, 'Beagle', 'Canada', 1, 5, 4, 5),
(62, 0, 'https://api-ninjas.com/images/dogs/bichon_frise.jpg', 'Large', 5, 5, 1, 5, 1, 1, 5, 4, 2, 4, 4, 3, 14, 15, 12, 12, 18, 18, 10, 10, 12, 12, 'Bichon Frise', 'Belgium', 2, 5, 5, 1),
(63, 0, 'https://api-ninjas.com/images/dogs/biewer_terrier.jpg', 'Large', 3, 5, 1, 3, 1, 1, 3, 4, 2, 3, 3, 3, 16, 16, 11, 11, 8, 8, 7, 7, 4, 4, 'Biewer Terrier', 'Canada', 3, 3, 5, 2),
(64, 0, 'https://api-ninjas.com/images/dogs/black_and_tan_coonhound.jpg', 'Large', 5, 5, 3, 2, 3, 1, 3, 3, 2, 3, 3, 4, 10, 12, 27, 27, 110, 110, 25, 25, 65, 65, 'Black and Tan Coonhound', 'Belgium', 3, 1, 3, 3),
(65, 0, 'https://api-ninjas.com/images/dogs/bloodhound.jpg', 'Large', 3, 3, 3, 2, 5, 1, 3, 3, 2, 4, 3, 5, 10, 12, 27, 27, 110, 100, 25, 25, 90, 80, 'Bloodhound', 'Canada', 1, 5, 5, 2),
(66, 0, 'https://api-ninjas.com/images/dogs/bluetick_coonhound.jpg', 'Large', 3, 5, 3, 2, 2, 1, 3, 3, 2, 4, 4, 4, 11, 12, 27, 27, 80, 65, 22, 22, 55, 45, 'Bluetick Coonhound', 'Belgium', 3, 2, 4, 2),
(67, 0, 'https://api-ninjas.com/images/dogs/bolognese.jpg', 'Large', 3, 3, 1, 3, 1, 1, 3, 4, 2, 3, 4, 3, 12, 14, 12, 12, 9, 9, 10, 10, 6, 6, 'Bolognese', 'Canada', 3, 1, 1, 2),
(68, 0, 'https://api-ninjas.com/images/dogs/hanoverian_scenthound.jpg', 'Large', 3, 5, 3, 2, 2, 1, 3, 3, 2, 4, 4, 4, 10, 14, 21, 21, 99, 99, 19, 19, 79, 79, 'Hanoverian Scenthound', 'Belgium', 2, 2, 4, 1),
(69, 0, 'https://api-ninjas.com/images/dogs/sloughi.jpg', 'Large', 3, 3, 3, 1, 1, 1, 2, 3, 2, 3, 4, 2, 10, 15, 29, 29, 50, 50, 26, 26, 35, 35, 'Sloughi', 'Canada', 5, 1, 1, 5),
(70, 0, 'https://api-ninjas.com/images/dogs/saluki.jpg', 'Large', 3, 3, 2, 1, 1, 1, 3, 3, 1, 3, 4, 3, 10, 17, 28, 28, 65, 65, 23, 23, 40, 40, 'Saluki', 'Belgium', 5, 5, 3, 4),
(71, 0, 'https://api-ninjas.com/images/dogs/siberian_husky.jpg', 'Large', 5, 5, 4, 2, 1, 1, 5, 5, 1, 3, 5, 5, 12, 14, 24, 24, 60, 50, 21, 21, 45, 35, 'Siberian Husky', 'Canada', 3, 5, 2, 3),
(72, 1, 'https://api-ninjas.com/images/cats/norwegian_forest.jpg', '12 to 18 inches', 4, 2, 4, 2, 4, 2, 2, 3, 2, 1, 2, 4, 12, 16, 9, 16, 13, 22, 13, 4, 13, 16, 'Norwegian Forest', 'Norway', 3, 4, 2, 2),
(73, 1, 'https://api-ninjas.com/images/cats/abyssinian.jpg', '12 to 16 inches', 5, 5, 3, 3, 4, 2, 0, 5, 2, 1, 2, 1, 9, 15, 6, 18, 10, 10, 11, 21, 6, 13, 'Abyssinian', 'Southeast Asia', 2, 5, 3, 2),
(74, 1, 'https://api-ninjas.com/images/cats/american_shorthair.jpg', '12 to 15 inches', 4, 2, 3, 4, 5, 4, 4, 2, 3, 1, 2, 1, 15, 20, 16, 20, 8, 12, 18, 4, 7, 20, 'American Shorthair', 'United States', 2, 3, 3, 4),
(75, 1, 'https://api-ninjas.com/images/cats/british_shorthair.jpg', '22 to 25 inches, not including tail', 4, 3, 3, 4, 4, 3, 4, 2, 1, 1, 4, 4, 12, 17, 7, 11, 10, 17, 16, 7, 7, 20, 'British Shorthair', 'Great Britain', 3, 5, 3, 4),
(76, 1, 'https://api-ninjas.com/images/cats/chartreux.jpg', '15 to 18 inches', 3, 3, 4, 2, 5, 5, 3, 3, 3, 2, 2, 5, 11, 15, 22, 5, 15, 16, 17, 18, 7, 15, 'Chartreux', 'France', 4, 4, 3, 4),
(77, 1, 'https://api-ninjas.com/images/cats/chinese_li_hua.jpg', 'Medium to large', 4, 3, 3, 4, 3, 4, 0, 4, 2, 2, 5, 1, 9, 16, 17, 17, 13, 12, 9, 4, 9, 7, 'Chinese Li Hua', 'China', 4, 4, 3, 3),
(78, 1, 'https://api-ninjas.com/images/cats/maine_coon.jpg', '30 to 40 inches', 5, 5, 4, 4, 2, 4, 2, 4, 3, 2, 4, 4, 9, 15, 22, 9, 12, 18, 13, 22, 9, 13, 'Maine Coon', 'Maine, USA', 1, 5, 3, 3),
(79, 1, 'https://api-ninjas.com/images/cats/persian.jpg', '14 to 18 inches, not including tail', 2, 2, 5, 2, 1, 2, 2, 2, 1, 1, 2, 3, 10, 15, 13, 22, 12, 12, 9, 6, 7, 17, 'Persian', 'Persia (known as Iran today)', 1, 2, 3, 2),
(80, 1, 'https://api-ninjas.com/images/cats/turkish_van.jpg', '14 to 17 inches', 3, 4, 2, 4, 1, 4, 2, 4, 1, 2, 3, 2, 12, 17, 8, 22, 6, 18, 17, 10, 10, 11, 'Turkish Van', 'Lake Van, Turkey', 5, 3, 3, 4),
(81, 1, 'https://api-ninjas.com/images/cats/american_bobtail.jpg', 'Medium', 4, 5, 4, 3, 4, 2, 4, 4, 3, 2, 1, 3, 11, 15, 21, 13, 15, 13, 17, 15, 8, 20, 'American Bobtail', 'United States and Canada', 5, 4, 4, 4),
(82, 1, 'https://api-ninjas.com/images/cats/american_wirehair.jpg', 'Medium to large', 4, 5, 3, 5, 5, 5, 3, 3, 3, 1, 3, 1, 14, 18, 15, 13, 14, 15, 8, 16, 8, 12, 'American Wirehair', 'United States', 2, 3, 4, 5),
(83, 1, 'https://api-ninjas.com/images/cats/aphrodite_giant.jpg', 'Large', 5, 2, 4, 2, 5, 5, 4, 4, 2, 1, 4, 2, 12, 15, 8, 19, 11, 24, 12, 7, 11, 16, 'Aphrodite Giant', 'Cyprus', 2, 4, 4, 3),
(84, 1, 'https://api-ninjas.com/images/cats/arabian_mau.jpg', 'Medium', 4, 5, 2, 5, 1, 2, 4, 4, 1, 1, 3, 3, 12, 14, 14, 20, 17, 16, 22, 15, 8, 7, 'Arabian Mau', 'Saudi Arabia', 4, 3, 4, 4),
(85, 1, 'https://api-ninjas.com/images/cats/balinese.jpg', 'Up to 18 inches, not including tail', 4, 2, 3, 4, 1, 1, 4, 4, 2, 2, 3, 1, 9, 15, 22, 13, 12, 10, 17, 9, 5, 9, 'Balinese', 'United States and Thailand', 2, 4, 4, 2),
(86, 1, 'https://api-ninjas.com/images/cats/bambino.jpg', 'Short', 4, 3, 1, 2, 3, 1, 3, 4, 2, 2, 1, 3, 9, 15, 13, 15, 13, 9, 17, 5, 4, 10, 'Bambino', 'United States', 4, 3, 4, 3),
(87, 1, 'https://api-ninjas.com/images/cats/bombay.jpg', '13 to 20 inches', 4, 1, 2, 4, 2, 1, 4, 4, 2, 2, 1, 3, 12, 20, 10, 17, 14, 15, 16, 17, 8, 12, 'Bombay', 'Kentucky, USA', 4, 4, 4, 4),
(88, 1, 'https://api-ninjas.com/images/cats/brazilian_shorthair.jpg', 'Medium to large', 5, 4, 1, 4, 5, 4, 4, 4, 3, 2, 3, 3, 14, 20, 8, 19, 8, 22, 19, 10, 10, 8, 'Brazilian Shorthair', 'Brazil', 2, 4, 4, 3),
(89, 1, 'https://api-ninjas.com/images/cats/british_longhair.jpg', 'Medium to Large', 4, 3, 4, 2, 3, 2, 4, 3, 2, 1, 5, 3, 15, 17, 6, 22, 13, 18, 14, 8, 9, 15, 'British Longhair', 'Great Britain', 1, 3, 4, 3),
(90, 1, 'https://api-ninjas.com/images/cats/burmilla.jpg', 'Medium', 4, 4, 3, 4, 4, 2, 0, 5, 3, 2, 5, 1, 10, 15, 8, 12, 15, 13, 14, 5, 7, 16, 'Burmilla', 'England', 5, 4, 4, 3),
(91, 1, 'https://api-ninjas.com/images/cats/california_spangled.jpg', 'Medium to Large', 4, 3, 2, 5, 2, 3, 4, 4, 1, 2, 1, 2, 9, 16, 6, 15, 15, 15, 8, 8, 8, 16, 'California Spangled', 'USA', 5, 3, 4, 4),
(92, 1, 'https://api-ninjas.com/images/cats/chantilly-tiffany.jpg', 'Medium', 4, 2, 3, 2, 3, 4, 2, 4, 1, 1, 5, 5, 7, 16, 15, 20, 17, 12, 21, 13, 6, 16, 'Chantilly-Tiffany', 'United States', 5, 3, 4, 4),
(93, 1, 'https://api-ninjas.com/images/cats/chausie.jpg', 'Large', 1, 1, 1, 5, 1, 4, 3, 4, 2, 2, 1, 3, 12, 14, 17, 16, 6, 30, 18, 12, 15, 22, 'Chausie', 'Egypt', 4, 4, 4, 4),
(94, 1, 'https://api-ninjas.com/images/cats/cyprus.jpg', 'Medium', 4, 3, 2, 4, 3, 4, 3, 5, 2, 2, 2, 3, 12, 15, 13, 14, 10, 16, 21, 17, 8, 17, 'Cyprus', 'Cyprus', 2, 4, 4, 4),
(95, 1, 'https://api-ninjas.com/images/cats/desert_lynx.jpg', 'Medium', 4, 1, 1, 4, 4, 1, 3, 4, 2, 2, 4, 3, 13, 15, 10, 17, 12, 16, 7, 12, 8, 19, 'Desert Lynx', 'United States', 4, 3, 4, 4),
(96, 1, 'https://api-ninjas.com/images/cats/donskoy.jpg', 'Medium', 4, 2, 1, 2, 2, 4, 4, 4, 3, 1, 2, 3, 12, 15, 15, 17, 16, 15, 5, 12, 6, 5, 'Donskoy', 'Russia', 2, 4, 4, 3),
(97, 1, 'https://api-ninjas.com/images/cats/european_shorthair.jpg', 'Medium', 5, 2, 2, 5, 4, 5, 4, 4, 3, 1, 3, 3, 15, 20, 21, 12, 12, 15, 21, 8, 8, 12, 'European Shorthair', 'Italy', 4, 4, 4, 4),
(98, 1, 'https://api-ninjas.com/images/cats/exotic.jpg', 'Medium', 3, 2, 3, 2, 3, 5, 0, 4, 1, 2, 5, 5, 8, 15, 11, 18, 17, 12, 7, 17, 7, 6, 'Exotic', 'United States', 5, 3, 4, 2),
(99, 1, 'https://api-ninjas.com/images/cats/german_rex.jpg', 'Small to medium', 4, 3, 2, 2, 5, 4, 4, 4, 1, 2, 5, 2, 9, 14, 12, 18, 14, 8, 13, 19, 5, 13, 'German Rex', 'Germany', 3, 4, 4, 3),
(100, 1, 'https://api-ninjas.com/images/cats/highlander.jpg', 'Medium to large', 4, 5, 2, 3, 2, 4, 4, 4, 2, 1, 2, 3, 10, 15, 4, 18, 18, 20, 12, 4, 10, 19, 'Highlander', 'United States', 3, 5, 4, 4),
(101, 1, 'https://api-ninjas.com/images/cats/aegean.jpg', 'Medium', 5, 4, 3, 4, 5, 3, 4, 4, 3, 1, 2, 4, 9, 10, 4, 15, 21, 10, 17, 20, 7, 8, 'Aegean', 'Greece', 5, 3, 5, 4),
(102, 1, 'https://api-ninjas.com/images/cats/american_curl.jpg', 'Medium', 4, 5, 4, 4, 5, 2, 4, 4, 1, 2, 4, 5, 12, 16, 15, 7, 7, 10, 10, 5, 5, 13, 'American Curl', 'California, USA', 5, 4, 5, 5),
(103, 1, 'https://api-ninjas.com/images/cats/asian.jpg', 'Medium', 5, 4, 1, 3, 1, 1, 4, 4, 1, 2, 4, 4, 15, 15, 7, 12, 15, 10, 18, 21, 10, 11, 'Asian', 'Great Britain', 3, 4, 5, 4),
(104, 1, 'https://api-ninjas.com/images/cats/australian_mist.jpg', 'Medium', 4, 5, 2, 4, 3, 4, 3, 4, 2, 2, 5, 2, 15, 18, 5, 10, 11, 15, 4, 21, 8, 15, 'Australian Mist', 'Australia', 3, 3, 5, 4),
(105, 1, 'https://api-ninjas.com/images/cats/bengal_cats.jpg', '17 to 22 inches, not including tail', 5, 5, 2, 4, 3, 4, 3, 5, 2, 1, 5, 2, 10, 16, 8, 10, 22, 17, 22, 18, 8, 4, 'Bengal Cats', 'USA', 4, 5, 5, 3),
(106, 1, 'https://api-ninjas.com/images/cats/birman.jpg', '15 to 18 inches', 5, 2, 3, 2, 4, 5, 0, 4, 3, 1, 2, 4, 12, 16, 21, 11, 8, 12, 22, 9, 6, 12, 'Birman', 'Unknown', 2, 5, 5, 2),
(107, 1, 'https://api-ninjas.com/images/cats/burmese.jpg', '15 to 18 inches', 5, 2, 2, 5, 2, 1, 5, 4, 1, 1, 1, 1, 10, 16, 11, 16, 22, 12, 4, 6, 8, 16, 'Burmese', 'Burma and Thailand', 3, 4, 5, 2),
(108, 1, 'https://api-ninjas.com/images/cats/colorpoint_shorthair.jpg', 'Small to medium', 4, 3, 2, 4, 5, 2, 0, 5, 3, 1, 2, 1, 12, 17, 21, 14, 5, 10, 16, 22, 5, 4, 'Colorpoint Shorthair', 'England', 1, 4, 5, 2),
(109, 1, 'https://api-ninjas.com/images/cats/cornish_rex.jpg', 'Small', 5, 4, 2, 5, 1, 3, 5, 5, 3, 2, 1, 2, 11, 15, 9, 8, 10, 10, 5, 8, 6, 21, 'Cornish Rex', 'United Kingdom', 4, 5, 5, 3),
(110, 1, 'https://api-ninjas.com/images/cats/cymric.jpg', '14 to 18 inches', 3, 3, 4, 2, 1, 2, 4, 0, 1, 1, 1, 2, 8, 14, 21, 20, 16, 12, 14, 20, 8, 18, 'Cymric', 'Isle of Man, UK', 3, 3, 5, 3),
(111, 1, 'https://api-ninjas.com/images/cats/devon_rex.jpg', '15 to 18 inches', 5, 1, 1, 5, 2, 5, 5, 4, 2, 1, 4, 3, 9, 15, 7, 16, 18, 10, 19, 20, 5, 20, 'Devon Rex', 'Devon, England', 4, 4, 5, 1),
(112, 1, 'https://api-ninjas.com/images/cats/egyptian_mau.jpg', 'Medium', 4, 1, 3, 4, 1, 1, 2, 4, 1, 2, 2, 2, 12, 15, 15, 13, 17, 14, 5, 9, 6, 7, 'Egyptian Mau', 'Egypt', 5, 3, 5, 4),
(113, 1, 'https://api-ninjas.com/images/cats/european_burmese.jpg', 'Medium', 5, 2, 2, 5, 5, 5, 5, 5, 1, 1, 4, 1, 10, 15, 22, 10, 20, 10, 9, 20, 6, 11, 'European Burmese', 'Burma and Thailand', 3, 5, 5, 1),
(114, 1, 'https://api-ninjas.com/images/cats/foldex.jpg', 'Medium', 5, 1, 3, 3, 4, 3, 4, 4, 3, 1, 2, 3, 12, 15, 12, 4, 18, 14, 19, 16, 5, 22, 'Foldex', 'Quebec, Canada', 5, 4, 5, 4),
(115, 1, 'https://api-ninjas.com/images/cats/havana_brown.jpg', '12 to 15 inches', 4, 2, 3, 5, 2, 3, 3, 3, 1, 2, 4, 1, 10, 15, 20, 10, 6, 10, 15, 17, 6, 15, 'Havana Brown', 'England', 5, 4, 5, 4),
(116, 1, 'https://api-ninjas.com/images/cats/japanese_bobtail.jpg', 'Medium', 5, 3, 3, 4, 3, 5, 0, 5, 1, 2, 2, 1, 9, 15, 21, 18, 7, 10, 14, 7, 6, 8, 'Japanese Bobtail', 'China and Japan', 2, 5, 5, 4),
(117, 1, 'https://api-ninjas.com/images/cats/javanese.jpg', 'Small to medium', 4, 5, 3, 4, 4, 2, 4, 4, 3, 2, 3, 1, 10, 15, 18, 22, 14, 10, 20, 19, 5, 10, 'Javanese', 'United States and Canada', 3, 4, 5, 2),
(118, 1, 'https://api-ninjas.com/images/cats/korat.jpg', '15 to 18 inches', 3, 5, 1, 5, 5, 5, 2, 0, 2, 2, 3, 5, 10, 15, 7, 4, 12, 10, 7, 14, 6, 7, 'Korat', 'Thailand', 2, 3, 5, 4),
(119, 1, 'https://api-ninjas.com/images/cats/peterbald.jpg', 'Medium', 4, 4, 1, 2, 4, 1, 4, 4, 2, 2, 3, 4, 12, 15, 11, 12, 21, 10, 10, 19, 6, 6, 'Peterbald', 'Russia', 1, 4, 5, 3),
(120, 1, 'https://api-ninjas.com/images/cats/pixie-bob.jpg', '20 to 24 inches', 5, 5, 4, 2, 2, 1, 3, 4, 1, 2, 3, 3, 13, 15, 9, 21, 20, 17, 12, 15, 8, 16, 'Pixie-Bob', 'Washington, USA', 3, 4, 5, 5);

CREATE TABLE `healthcare` (
  `healthcare_id` int(11) NOT NULL,
  `healthcare_name` varchar(255) DEFAULT NULL,
  `price` double NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `healthcare` (`healthcare_id`, `healthcare_name`, `price`, `description`) VALUES
(4, 'Free', 0, 'Adopt-only. No controls for pet'),
(5, 'Basic Care', 7.99, 'Vaccinations and health checks'),
(6, 'Complete Care', 12.5, 'Basic Care + Regular parasite treatments'),
(7, 'Complete Care Plus', 15.5, 'Complete Care + VIP Club exclusive offers');

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_shipped` datetime DEFAULT (current_timestamp() + interval 7 day),
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `shipping_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `unit_cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `pet_details` (
  `pet_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `size` varchar(255) NOT NULL DEFAULT 'Medium',
  `color` varchar(255) NOT NULL DEFAULT 'Black',
  `story` varchar(255) NOT NULL,
  `diet` text NOT NULL,
  `register_date` datetime DEFAULT current_timestamp(),
  `healthcare_id` int(11) DEFAULT floor(4 + rand() * (7 - 4 + 1)),
  `online_purchased` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pet_details` (`pet_id`, `owner_id`, `breed_id`, `name`, `gender`, `age`, `size`, `color`, `story`, `diet`, `register_date`, `healthcare_id`, `online_purchased`) VALUES
(1291, 30, 115, 'Chaos', 'Male', 10, 'Medium', 'Blue', 'He\'s got the looks, he\'s got the vibe, he\'s got it all! And then some. Mickey is more fun than a barrel of monkeys, especially if you are into high-energy and endlessly enthusiastic young dogs. Currently Mickey is getting trained at our San Quentin Pen Pa', 'Apricots', '2022-09-21 14:39:36', 5, 0),
(1292, 69, 11, 'Rusty', 'Female', 3, 'Medium', 'Chestnut', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Angelica', '2022-09-21 14:39:36', 6, 0),
(1293, 44, 67, 'Molly', 'Male', 10, 'Small', 'Light', 'Well hello there! My name is Slate! I’m a very handsome boy that is looking for a home! I am currently at Happy Hound Doggie Daycare having a BLAST! I get to go into playgroup everyday and play with many dogs! it’s seriously the BEST! I’m not sure what my', 'Duck', '2022-09-21 14:39:36', 6, 0),
(1294, 87, 8, 'Josie', 'Female', 6, 'Medium', 'Silver', 'Highly energetic and friendly Ella needs lots of play time! Super sweet and goofy, but not a beginner dog.Her favorite activities are:- running- tug games- chewing heavy duty rubber toys- napping with her peopleShe wants to be involved in whatever', 'Cider with golden cheese', '2022-09-21 14:39:36', 5, 0),
(1295, 87, 42, 'Peppy', 'Female', 9, 'Small', 'Beige', 'Lucy was born Jan 2021. We adopted her from a rescue at 3 months. She\'s current on all vaccines. She is the sweeeeetest dog you\'ll ever meet. Zero aggression but barks at strange sounds/people at night. Lucy is very treat-motivated. She knows sit, down, s', 'Canola Oil', '2022-09-21 14:39:36', 4, 0),
(1296, 44, 96, 'Amigo', 'Female', 6, 'Small', 'Red', 'Ollie is a wonderful dog with lots of energy. He loves to swim and loves to play fetch. He really loves affection. Unfortunately we can no longer provide him with what he needs as we have a new born and cannot provide him with the life he needs anymore. I', 'Cannellini Beans', '2022-09-21 14:39:36', 6, 0),
(1297, 44, 105, 'Chi Chi', 'Male', 5, 'Small', 'Gold', 'Lookit this guy. Such a lovable dork. Milton is a leggy American Bully, full of good fun, super affectionate and in love with people. Like, wants to follow you everywhere and gaze into your eyes affectionate. He\'s just over 1yo, is house trained now (uses', 'Chocolate', '2022-09-21 14:39:36', 7, 0),
(1298, 4, 108, 'Booker', 'Male', 9, 'Medium', 'Black', 'Ace is a puppy acquired from a litter of a friend that I know. He is an extremely friendly dog and unfortunately has too much energy for us. He has never been aggressive but he does like to play rough/play bite. He gets along with other dogs that can matc', 'Cumin', '2022-09-21 14:39:36', 7, 0),
(1299, 69, 20, 'Earl', 'Female', 7, 'Small', 'Brown', 'I acquired my pet from the next door crack house around the year 2015. She was 4 months at the time and pooping worms. Siblings and I took her on park strolls, dog park, grooming services, vaccines at spca, etc. I moved out and became a mother so my atten', 'Spearmint', '2022-09-21 14:39:36', 5, 0),
(1300, 69, 101, 'Precious', 'Female', 7, 'Small', 'Yellow', 'Hi, I’m Bobby! I’m a very sweet boy! I’d love a home to call my own! I’m currently in foster and loving it! I’m with my brother Ricky and he’s also available! I’m super sweet and loving and would love a home that can continue training me and getting me to', 'Cider', '2022-09-21 14:39:36', 7, 0),
(1301, 34, 108, 'Puddles', 'Female', 5, 'Small', 'Tan', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Salsa', '2022-09-21 14:39:36', 7, 0),
(1302, 38, 41, 'Callie', 'Male', 9, 'Small', 'Wheaten', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Artificial Sweetener', '2022-09-21 14:39:36', 5, 0),
(1303, 11, 100, 'Koba', 'Male', 9, 'Small', 'White', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Passion Fruit', '2022-09-21 14:39:36', 4, 0),
(1304, 55, 48, 'Josie', 'Male', 7, 'Small', 'Darka', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Tonic Water', '2022-09-21 14:39:36', 6, 0),
(1305, 22, 88, 'Niko', 'Female', 3, 'Small', 'Gray', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Succotash', '2022-09-21 14:39:36', 5, 0),
(1306, 9, 71, 'Nibby', 'Male', 2, 'Medium', 'Creama', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Spearmint', '2022-09-21 14:39:36', 4, 0),
(1307, 53, 46, 'Tuck', 'Male', 7, 'Small', 'Rust', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Brown Rice', '2022-09-21 14:39:36', 6, 0),
(1308, 8, 7, 'Puddles', 'Male', 2, 'Small', 'Lilac', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Cumin', '2022-09-21 14:39:36', 7, 0),
(1309, 5, 68, 'Crackers', 'Male', 9, 'Medium', 'Apricot', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Croutons', '2022-09-21 14:39:36', 7, 0),
(1310, 54, 114, 'Quinn', 'Male', 7, 'Medium', 'Orange', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Rice', '2022-09-21 14:39:36', 4, 0),
(1311, 61, 7, 'Puddles', 'Male', 8, 'Medium', 'Fawn', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Wasabi', '2022-09-21 14:39:36', 5, 0),
(1312, 14, 31, 'Boots', 'Female', 10, 'Small', 'Blue', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Raspberries', '2022-09-21 14:39:36', 6, 0),
(1313, 12, 53, 'Hans', 'Female', 10, 'Small', 'Chestnut', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Artificial Sweetener', '2022-09-21 14:39:36', 4, 0),
(1314, 32, 60, 'Yaka', 'Female', 8, 'Small', 'Light', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Soymilk', '2022-09-21 14:39:36', 6, 0),
(1315, 8, 2, 'Bubbles', 'Male', 4, 'Small', 'Silver', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Flounder', '2022-09-21 14:39:36', 7, 0),
(1316, 11, 41, 'Cujo', 'Female', 4, 'Small', 'Beige', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Geese', '2022-09-21 14:39:36', 7, 0),
(1317, 51, 78, 'Barbie', 'Male', 9, 'Small', 'Red', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Salmon', '2022-09-21 14:39:36', 4, 0),
(1318, 43, 85, 'Peppy', 'Male', 4, 'Small', 'Gold', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Sea Cucumbers', '2022-09-21 14:39:36', 6, 0),
(1319, 8, 71, 'Crackers', 'Male', 6, 'Small', 'Black', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Bay Leaves', '2022-09-21 14:39:36', 6, 0),
(1320, 41, 119, 'Gromit', 'Male', 1, 'Medium', 'Brown', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Pomegranates', '2022-09-21 14:39:36', 7, 0),
(1321, 4, 29, 'Amigo', 'Male', 5, 'Medium', 'Yellow', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Sazon', '2022-09-21 14:39:36', 5, 0),
(1322, 4, 86, 'Mo', 'Female', 3, 'Medium', 'Tan', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Lemon Peel', '2022-09-21 14:39:36', 4, 0),
(1323, 8, 6, 'Admiral', 'Female', 4, 'Medium', 'Wheaten', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Plums', '2022-09-21 14:39:36', 6, 0),
(1324, 14, 20, 'Fritz', 'Male', 4, 'Medium', 'White', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Wasabi', '2022-09-21 14:39:36', 6, 0),
(1325, 25, 77, 'Shiloh', 'Female', 2, 'Small', 'Darka', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Rice Vinegar', '2022-09-21 14:39:36', 6, 0),
(1326, 35, 22, 'Oscar', 'Male', 9, 'Small', 'Gray', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Kidney Beans', '2022-09-21 14:39:36', 6, 0),
(1327, 42, 14, 'Puddles', 'Female', 1, 'Medium', 'Creama', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Apples', '2022-09-21 14:39:36', 6, 0),
(1328, 32, 25, 'Beauty', 'Female', 4, 'Medium', 'Rust', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Spearmint', '2022-09-21 14:39:36', 6, 0),
(1329, 14, 107, 'Pumpkin', 'Female', 7, 'Medium', 'Lilac', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Salmon', '2022-09-21 14:39:36', 5, 0),
(1330, 48, 95, 'Bruiser', 'Male', 7, 'Small', 'Apricot', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Cottage Cheese', '2022-09-21 14:39:36', 4, 0),
(1331, 26, 67, 'Pete', 'Male', 5, 'Small', 'Orange', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Hoisin Sauce', '2022-09-21 14:39:36', 6, 0),
(1332, 29, 115, 'Callie', 'Male', 6, 'Small', 'Fawn', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Five-Spice Powder', '2022-09-21 14:39:36', 7, 0),
(1333, 51, 118, 'Prissy', 'Male', 1, 'Medium', 'Blue', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Hoisin Sauce', '2022-09-21 14:39:36', 6, 0),
(1334, 44, 83, 'Sierra', 'Female', 9, 'Small', 'Chestnut', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Cantaloupes', '2022-09-21 14:39:36', 5, 0),
(1335, 39, 117, 'Paco', 'Female', 2, 'Small', 'Light', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Chocolate', '2022-09-21 14:39:36', 4, 0),
(1336, 22, 13, 'Sheena', 'Male', 6, 'Small', 'Silver', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Alligator', '2022-09-21 14:39:36', 7, 0),
(1337, 35, 55, 'Boots', 'Female', 3, 'Small', 'Beige', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Artificial Sweetener', '2022-09-21 14:39:36', 6, 0),
(1338, 11, 103, 'Oscar', 'Male', 5, 'Small', 'Red', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Pomegranates', '2022-09-21 14:39:36', 5, 0),
(1339, 67, 82, 'Butchy', 'Female', 5, 'Small', 'Gold', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Sugar', '2022-09-21 14:39:36', 6, 0),
(1340, 51, 11, 'Peppy', 'Female', 8, 'Small', 'Black', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Pecans', '2022-09-21 14:39:36', 6, 0),
(1341, 22, 55, 'Pete', 'Male', 7, 'Small', 'Brown', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Alligator', '2022-09-21 14:39:36', 4, 0),
(1342, 15, 63, 'Lady', 'Female', 6, 'Medium', 'Yellow', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Mustard Seeds', '2022-09-21 14:39:36', 7, 0),
(1343, 31, 119, 'Bucko', 'Female', 8, 'Medium', 'Tan', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Lemon Peel', '2022-09-21 14:39:36', 5, 0),
(1344, 38, 60, 'Savannah', 'Male', 7, 'Medium', 'Wheaten', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Mustard Seeds', '2022-09-21 14:39:36', 6, 0),
(1345, 51, 35, 'Bucko', 'Male', 7, 'Medium', 'White', 'Thank you for inquiring interest in Flash.\n\nThis guy is a quiet, well behaved bundle of love. To learn more about him please tell us about your current or past breed experience, yard and fencing, area you live in, your activity level, other dogs and or ca', 'Okra', '2022-09-21 14:39:36', 4, 0),
(1346, 69, 86, 'Tuck', 'Male', 5, 'Medium', 'Darka', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Peas', '2022-09-21 14:39:36', 5, 0),
(1347, 27, 16, 'Red', 'Female', 7, 'Small', 'Gray', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Chives', '2022-09-21 14:39:36', 6, 0),
(1348, 32, 45, 'Chaos', 'Female', 7, 'Small', 'Creama', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Salsa', '2022-09-21 14:39:36', 6, 0),
(1349, 28, 70, 'Sierra', 'Male', 10, 'Medium', 'Rust', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Succotash', '2022-09-21 14:39:36', 4, 0),
(1350, 29, 24, 'Max', 'Female', 6, 'Small', 'Lilac', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Chocolate', '2022-09-21 14:39:36', 5, 0),
(1351, 67, 46, 'Peppy', 'Female', 9, 'Small', 'Apricot', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Green Beans', '2022-09-21 14:39:36', 7, 0),
(1352, 4, 7, 'Gavin', 'Male', 6, 'Small', 'Orange', 'Hi! My name is Sweeney, and I am the goodest boy ever, can\'t you tell?!\n\nI\'m only 6 months old, but I\'ve seen and been through a lot in my short life. My siblings and I found ourselves malnourished in a Texas shelter with parvo and coccidia at about 6 wee', 'Cumin', '2022-09-21 14:39:36', 6, 0),
(1353, 4, 20, 'Tilly', 'Female', 6, 'Medium', 'Fawn', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Eggplants', '2022-09-21 14:39:36', 7, 0),
(1354, 3, 69, 'Oscar', 'Female', 7, 'Small', 'Blue', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Cannellini Beans', '2022-09-21 14:39:36', 6, 0),
(1355, 61, 36, 'Meadow', 'Female', 9, 'Small', 'Chestnut', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Watermelons', '2022-09-21 14:39:36', 4, 0),
(1356, 51, 75, 'Bubbles', 'Female', 7, 'Medium', 'Light', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Cantaloupes', '2022-09-21 14:39:36', 5, 0),
(1357, 18, 15, 'Elliot', 'Male', 1, 'Medium', 'Silver', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Lentils', '2022-09-21 14:39:36', 4, 0),
(1358, 39, 113, 'Callie', 'Female', 7, 'Medium', 'Beige', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Sugar', '2022-09-21 14:39:36', 4, 0),
(1359, 63, 65, 'Josie', 'Male', 10, 'Medium', 'Red', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Salmon', '2022-09-21 14:39:36', 4, 0),
(1360, 30, 35, 'Gavin', 'Female', 4, 'Medium', 'Gold', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Pomegranates', '2022-09-21 14:39:36', 6, 0),
(1361, 49, 69, 'Beauty', 'Female', 6, 'Medium', 'Black', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Panko Bread Crumbs', '2022-09-21 14:39:36', 4, 0),
(1362, 42, 42, 'Admiral', 'Female', 3, 'Small', 'Brown', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Cappuccino Latte', '2022-09-21 14:39:36', 4, 0),
(1363, 58, 103, 'Bullet', 'Female', 6, 'Small', 'Yellow', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Breadfruit', '2022-09-21 14:39:36', 7, 0),
(1364, 2, 107, 'Bunky', 'Male', 6, 'Medium', 'Tan', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Wild Rice', '2022-09-21 14:39:36', 7, 0),
(1365, 54, 85, 'Madison', 'Male', 10, 'Medium', 'Wheaten', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Flax Seed', '2022-09-21 14:39:36', 4, 0),
(1366, 12, 113, 'Josie', 'Male', 5, 'Small', 'White', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Dill', '2022-09-21 14:39:36', 5, 0),
(1367, 39, 60, 'Puddles', 'Female', 6, 'Medium', 'Darka', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Milk', '2022-09-21 14:39:36', 5, 0),
(1368, 61, 39, 'Mister', 'Male', 5, 'Medium', 'Gray', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Cantaloupes', '2022-09-21 14:39:36', 5, 0),
(1369, 50, 17, 'Mitzi', 'Female', 4, 'Small', 'Creama', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Cloves', '2022-09-21 14:39:36', 6, 0),
(1370, 69, 97, 'Paco', 'Male', 3, 'Medium', 'Rust', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Cappuccino Latte', '2022-09-21 14:39:36', 5, 0),
(1371, 39, 40, 'Mister', 'Female', 6, 'Medium', 'Lilac', 'I am a puppy. I\'m very cute\nI\'m not potty trained because I\'m a puppy\nI\'m not trained in anything because I\'m a puppy\nI\'m teething because I\'m a puppy\nI\'m a puppy please remember I\'m a puppy.', 'Condensed Milk', '2022-09-21 14:39:36', 6, 0),
(1372, 4, 66, 'Goldie', 'Female', 3, 'Small', 'Apricot', 'Diego is an owner surrender which we had to fully vet. He is the sweetest daintiest little boy. He loves dogs his size but is not a huge fan of any larger dogs. He loves running indie 500\'s in the yard with one of the biggest smiles. He is all around a gr', 'Brandy', '2022-09-21 14:39:36', 6, 0),
(1373, 28, 100, 'Koba', 'Male', 8, 'Small', 'Orange', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Soymilk', '2022-09-21 14:39:36', 5, 0),
(1374, 37, 33, 'Boo-boo', 'Female', 1, 'Small', 'Fawn', 'This little feller is sweet as pie and loves to play with other doggos. He’s on steroids for an autoimmune issue. We have taken him to specialists and have him on the perfect low dose of inexpensive meds once a day to keep him playful and happy. So that’s', 'Granola', '2022-09-21 14:39:36', 6, 0),
(1375, 65, 74, 'Rags', 'Male', 9, 'Medium', 'Blue', 'London is a confident and curious  10 month-old, 35 -pound terrier shepherd mix from Texas.\n\nShe loves every person and dog she meets, and will sit down politely to greet people before doing a very cute wiggle-scoot on her butt to get close to them for pe', 'Canadian Bacon', '2022-09-21 14:39:36', 4, 0),
(1376, 6, 51, 'Precious', 'Female', 2, 'Small', 'Chestnut', 'I have issues with my ACL which is common for my breed.\nI need a low energy lifestyle but I don\'t know my limitations and want to jump around.\nI\'m still not getting this whole potty training thing.\nI\'ve learned to kennel and crate myself.\nI will do anythi', 'Alligator', '2022-09-21 14:39:36', 5, 0),
(1377, 31, 39, 'Cocoa', 'Male', 1, 'Small', 'Light', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Vanilla Bean', '2022-09-21 14:39:36', 5, 0),
(1378, 87, 82, 'Sunday', 'Female', 8, 'Medium', 'Silver', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Lentils and pumpkins', '2022-09-21 14:39:36', 4, 0),
(1379, 1, 9, 'Molly', 'Male', 4, 'Small', 'Beige', 'We are still trying to figure out what this puppy is mixed with but we do not think he will be bigger then thirty pounds. He is active and gets very excited to play. He is super friendly but he is a puppy.\nI am a puppy. I\'m very cute\nI\'m not potty trained', 'Rice Vinegar', '2022-09-21 14:39:36', 5, 0),
(1380, 42, 79, 'Bambi', 'Female', 7, 'Small', 'Red', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Eggplants', '2022-09-21 14:39:36', 6, 0),
(1381, 87, 18, 'Harley', 'Female', 8, 'Small', 'Gold', 'I am a puppy. I\'m very cute\nI\'m not potty trained because I\'m a puppy\nI\'m not trained in anything because I\'m a puppy\nI\'m teething because I\'m a puppy\nI\'m a puppy please remember I\'m a puppy.\nI do not like car rides they make me sick.', 'Okra', '2022-09-21 14:39:36', 4, 0),
(1382, 7, 1, 'Rosebud', 'Female', 6, 'Medium', 'Black', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Duck', '2022-09-21 14:39:36', 4, 0),
(1383, 66, 95, 'Barbie', 'Male', 7, 'Small', 'Brown', 'Is a great buddy. I\'ve had many cats and dogs since they were 9 weeks old. Big cuddle loaf. Loves people and sitting on laps and going outside just to lay in the sun. Is a pretty ideal easy going pet. Unfortunately I haven\'t had a house of my own since Ap', 'Spearmint', '2022-09-21 14:39:36', 7, 0),
(1384, 1, 23, 'Amigo', 'Male', 8, 'Medium', 'Yellow', 'When I see Luke I remember the day we got him. He was rushed to the hospital with parvo he was so sick I hoped he would make it.10 days of critical care then off to another vet for 14 days of isolation. This poor boy had a very tuff start. Then off to to ', 'Panko Bread Crumbs', '2022-09-21 14:39:36', 6, 0),
(1385, 1, 94, 'Sumo', 'Male', 4, 'Medium', 'Tan', 'Rambo is a great kitty. I\'ve had her and Costanza since they were 9 weeks old. She is a big cuddle loaf. She loves people and sitting on laps and going outside just to lay in the sun.\nRambo is a pretty ideal easy going kitty.\n\nUnfortunately I haven\'t had ', 'Brandy', '2022-09-21 14:39:36', 7, 0),
(1386, 44, 26, 'Porche', 'Male', 2, 'Small', 'Wheaten', 'Hi we are looking for someone who could take care of this pet. For more information contact +32498123456', 'Rice', '2022-09-21 14:39:36', 4, 0),
(1387, 1, 99, 'Sheena', 'Male', 2, 'Small', 'White', '\nSheet\n\nZozo was born in early October 2019. She and her littermates were abandoned by their feral mom just a few days old. A family friend took them in and nursed them until they were ready to go to individual homes. She also helped her get spayed a few ', 'Summer Squash', '2022-09-21 14:39:36', 4, 0),
(1388, 44, 40, 'Quinn', 'Female', 10, 'Small', 'Darka', 'He is very loving, human friendly, great hugger and adorable cat. Has to be Dog free Home.\nThanks ', 'Pecans', '2022-09-21 14:39:36', 6, 0),
(1389, 79, 92, 'Punkin', 'Female', 5, 'Small', 'Gray', 'Max Is a complex cat who we believe would do well in a quiet household.\n\nWhen in a good mood, Max is the best. He loves to demand lap space and drape himself across your legs like a cat-shaped blanket. When he’s content, Max has a deep rumbly purr that ca', 'Rice Vinegar', '2022-09-21 14:39:36', 7, 0),
(1390, 69, 103, 'Amigo', 'Male', 6, 'Medium', 'Creama', 'Sylvester is sweet with people, and calm. He was abandoned by a neighbor when she moved. Something happened while he was out in the streets and his tail was badly damaged, so the vet had to remove most of it, so it\'s short now. He was an indoor/outdoor an', 'Pheasants', '2022-09-21 14:39:36', 6, 0),
(1391, 79, 1, 'Akira', 'Female', 1, 'Medium', 'Black', 'Akira is a great great boy!', 'Carrots', '2022-11-29 22:10:12', 6, 0);

CREATE TABLE `shipping_info` (
  `shipping_id` int(11) NOT NULL,
  `shipping_type` varchar(255) NOT NULL DEFAULT 'BusinessWeek',
  `shipping_cost` float DEFAULT NULL,
  `shipping_region_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `shopping_cart` (
  `cart_id` int(11) NOT NULL,
  `pet_id` int(11) DEFAULT NULL,
  `dateAdded` datetime DEFAULT current_timestamp(),
  `userid` int(11) DEFAULT NULL,
  `is_regional` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `zipcode` varchar(25) NOT NULL,
  `looking_for` varchar(20) DEFAULT NULL,
  `can_advertise` tinyint(1) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `warnings` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`user_id`, `email`, `password`, `naam`, `zipcode`, `looking_for`, `can_advertise`, `isAdmin`, `warnings`) VALUES
(1, 'GUNTHER.MERGAN@CDSurfing.be', '$2y$10$8o.mgGy3.wZFCF1WJAKvn.BDbyn6V4JRhkqMXtEZGPxaAcoJVuh1a', 'GUNTHER MERGAN', '2800', 'Cat', 0, 0, 1),
(2, 'MARCEL.VANDENBERGE@CDSurfing.be', 'mu923', 'MARCEL VANDENBERGE', '2800', 'Dog', 1, 0, 0),
(3, 'JEROEN.VANBERKEL@CDSurfing.be', 'xe854', 'JEROEN VANBERKEL', '2800', 'Dog', 0, 0, 0),
(4, 'CINDY.EEKELS@CDSurfing.be', '$2y$10$zqRgQ.YDzJuH5tecBH9m3.OrN41klCrp8aNA4Ojxem7PQGWKrdMG6', 'CINDY EEKELS', '2800', 'Cat', 1, 0, 4),
(5, 'BOB.VANDENBERGHEN@CDSurfing.be', 're877', 'BOB VANDENBERGHEN', '2800', 'Cat', 0, 0, 0),
(6, 'NICOLAS.DEDOBBELEER@CDSurfing.be', 'su373', 'NICOLAS DEDOBBELEER', '2800', 'Cat', 1, 0, 0),
(7, 'BRAM.HENNEBERT@CDSurfing.be', 'ru323', 'BRAM HENNEBERT', '2800', 'Cat', 0, 0, 0),
(8, 'STEVE.ORIS@CDSurfing.be', '2022.Dewalt', 'STEVE ORIS', '2800', 'Cat', 1, 0, 0),
(9, 'CHRISTIAN.DARMONT@CDSurfing.be', 'xu808', 'CHRISTIAN DARMONT', '2800', 'Cat', 0, 0, 0),
(10, 'FRANK.MENTENS@CDSurfing.be', 'su039', 'FRANK MENTENS', '2800', 'Cat', 1, 0, 0),
(11, 'ETIENNE.DELVOSALLE@CDSurfing.be', 'mu847', 'ETIENNE DELVOSALLE', '2800', 'Cat', 0, 0, 0),
(12, 'JEROEN.DECHERF@CDSurfing.be', 'pu470', 'JEROEN DECHERF', '2800', 'Cat', 1, 0, 0),
(13, 'CARLOS.DEBRUIJN@CDSurfing.be', 'yi659', 'CARLOS DEBRUIJN', '2800', 'Dog', 0, 0, 0),
(14, 'MICHIEL.VLIEK@CDSurfing.be', 'xo902', 'MICHIEL VLIEK', '2800', 'Cat', 1, 0, 0),
(15, 'WOUTER.ROOK@CDSurfing.be', 'so705', 'WOUTER ROOK', '2800', 'Dog', 0, 0, 0),
(16, 'ARNOLD.WEVER@CDSurfing.be', 'we764', 'ARNOLD WEVER', '2800', 'Dog', 1, 0, 0),
(17, 'OSCAR.LAUREIJS@CDSurfing.be', 'ku426', 'OSCAR LAUREIJS', '2800', 'Cat', 0, 0, 0),
(18, 'KEVIN.MARKESTEIN@CDSurfing.be', '$2y$10$IG6.rhv5mJyN0SmcTdB0yOLj1pT0v6J6zcp9NF4gqVWAOGOePYd1C', 'KEVIN MARKESTEIN', '2800', 'Cat', 1, 0, 0),
(19, 'DAVID.GOUBERT@CDSurfing.be', 'ha697', 'DAVID GOUBERT', '2800', 'Cat', 0, 0, 0),
(20, 'JURGEN.DELEEUW@CDSurfing.be', 'wo037', 'JURGEN DELEEUW', '2800', 'Dog', 1, 0, 0),
(21, 'THOMAS.MOLENDIJK@CDSurfing.be', 'ze008', 'THOMAS MOLENDIJK', '2800', 'Dog', 0, 0, 0),
(22, 'MARCELINO.PAPPERSE@CDSurfing.be', 'qu222', 'MARCELINO PAPPERSE', '2800', 'Dog', 1, 0, 0),
(23, 'ANDOR.DEVRIES@CDSurfing.be', 'ga632', 'ANDOR DEVRIES', '2800', 'Dog', 0, 0, 0),
(24, 'IVO.SCHOUTEN@CDSurfing.be', 'ma974', 'IVO SCHOUTEN', '2800', 'Dog', 1, 0, 0),
(25, 'PATRICK.DIEPENBACH@CDSurfing.be', 'ba739', 'PATRICK DIEPENBACH', '2800', 'Cat', 0, 0, 0),
(26, 'PIET.VERSTRAETE@CDSurfing.be', 'si738', 'PIET VERSTRAETE', '2580', 'Cat', 1, 0, 0),
(27, 'VINCENT.BROERTJES@CDSurfing.be', 'le870', 'VINCENT BROERTJES', '2580', 'Dog', 0, 0, 0),
(28, 'JEAN-CHRISTOPHE.PINTIAUX@CDSurfing.', 'ma317', 'JEAN-CHRISTOPHE PINTIAUX', '2580', 'Cat', 1, 0, 0),
(29, 'KIM.MARIS@CDSurfing.be', 'bu593', 'KIM MARIS', '2580', 'Cat', 0, 0, 0),
(30, 'MARIO.REVERSE@CDSurfing.be', '$2y$10$Sp0h56K2unkf64w6U9doMuPJCNTMKDQrgnTnmymwjNrYuuxr33eAy', 'MARIO REVERSE', '2580', 'Cat', 1, 0, 0),
(31, 'PETER.SCHAEKERS@CDSurfing.be', 'ki898', 'PETER SCHAEKERS', '2580', 'Cat', 0, 0, 0),
(32, 'ROBIN.ROELS@CDSurfing.be', 'ge042', 'ROBIN ROELS', '2580', 'Cat', 1, 0, 0),
(33, 'STEFAN.SACK@CDSurfing.be', 'pe045', 'STEFAN SACK', '2580', 'Cat', 0, 0, 0),
(34, 'VINCENT.LENAIN@CDSurfing.be', 'fu102', 'VINCENT LENAIN', '2580', 'Cat', 1, 0, 0),
(35, 'VINCENT.PIREYN@CDSurfing.be', 'ru407', 'VINCENT PIREYN', '2580', 'Cat', 0, 0, 0),
(36, 'YVES.DEWAAL@CDSurfing.be', 'te119', 'YVES DEWAAL', '2580', 'Cat', 1, 0, 0),
(37, 'ADRIAAN.ARKERAATS@CDSurfing.be', 'ho310', 'ADRIAAN ARKERAATS', '2580', 'Dog', 0, 0, 0),
(38, 'ARNO.DEJAGER@CDSurfing.be', 'da839', 'ARNO DEJAGER', '2580', 'Dog', 1, 0, 0),
(39, 'DUNCAN.DEWITH@CDSurfing.be', 'fo792', 'DUNCAN DEWITH', '2580', 'Cat', 0, 0, 0),
(40, 'KEN.LEYSEN@CDSurfing.be', 'Sbdinc123*', 'KEN LEYSEN', '2860', 'Dog', 1, 0, 0),
(41, 'JEAN-FRANCOIS.FORTON@CDSurfing.be', 'Arco0107', 'JEAN-FRANCOIS FORTON', '2800', 'Cat', 0, 0, 0),
(42, 'MARTIN.VAN@CDSurfing.be', 'Mechelen2022.', 'MARTIN VAN', '2860', 'Dog', 1, 0, 0),
(43, 'PAUL.KERKHOVEN@CDSurfing.be', 'nu710', 'PAUL KERKHOVEN', '2860', 'Dog', 0, 0, 0),
(44, 'CEDRIC.BICQUE@CDSurfing.be', 'Marlboro@123', 'CEDRIC BICQUE', '2860', 'Cat', 1, 0, 0),
(45, 'CHRISTIAN.FONTEYN@CDSurfing.be', 'zo855', 'CHRISTIAN FONTEYN', '2860', 'Cat', 0, 0, 0),
(46, 'KLAASJAN.BOSGRAAF@CDSurfing.be', 'Fmst1-71969!', 'KLAASJAN BOSGRAAF', '2860', 'Dog', 1, 0, 0),
(47, 'AMMAAR.BASNOE@CDSurfing.be', 'ku674', 'AMMAAR BASNOE', '2860', 'Dog', 0, 0, 0),
(48, 'ROBERT.VANSTRATEN@CDSurfing.be', 'na556', 'ROBERT VANSTRATEN', '2860', 'Dog', 1, 0, 0),
(49, 'SVEN.PIETERS@CDSurfing.be', 'fu995', 'SVEN PIETERS', '2860', 'Cat', 0, 0, 0),
(50, 'NIEK.NIJLAND@CDSurfing.be', 'vi613', 'NIEK NIJLAND', '2860', 'Dog', 1, 0, 0),
(51, 'GEERT.MAES@CDSurfing.be', 'cu351', 'GEERT MAES', '2800', 'Cat', 0, 0, 0),
(52, 'MARLEEN.VANGRONSVELD@CDSurfing.be', 'qo364', 'MARLEEN VANGRONSVELD', '2800', 'Cat', 1, 0, 0),
(53, 'MARLON.VANZUNDERT@CDSurfing.be', 'ma944', 'MARLON VANZUNDERT', '2800', 'Cat', 0, 0, 0),
(54, 'MICHAEL.SOENEN@CDSurfing.be', 'nu060', 'MICHAEL SOENEN', '2800', 'Cat', 1, 0, 0),
(55, 'MICHAEL.TISTAERT@CDSurfing.be', 'de489', 'MICHAEL TISTAERT', '2800', 'Cat', 0, 0, 0),
(56, 'RONALD.WESTRA@CDSurfing.be', 'wo840', 'RONALD WESTRA', '2800', 'Cat', 1, 0, 0),
(57, 'VICKY.DEDECKER@CDSurfing.be', 'ku548', 'VICKY DEDECKER', '2800', 'Cat', 0, 0, 0),
(58, 'CHRISTELLE.MARRO@CDSurfing.be', 'ce087', 'CHRISTELLE MARRO', '2800', 'Cat', 1, 0, 0),
(59, 'FREDERIC.BARZIN@CDSurfing.be', 'ye188', 'FREDERIC BARZIN', '2800', 'Cat', 0, 0, 0),
(60, 'LUC.CLAES@CDSurfing.be', 'tu251', 'LUC CLAES', '2800', 'Cat', 1, 0, 0),
(61, 'MARC.GHIJS@CDSurfing.be', 'tu337', 'MARC GHIJS', '2800', 'Cat', 0, 0, 0),
(62, 'RONNY.CALLEWAERT@CDSurfing.be', 'ye360', 'RONNY CALLEWAERT', '2800', 'Cat', 1, 0, 0),
(63, 'HENDRIK.PIETERS@CDSurfing.be', 'du497', 'HENDRIK PIETERS', '2800', 'Cat', 0, 0, 0),
(64, 'MALVIN.PUTS@CDSurfing.be', 'co485', 'MALVIN PUTS', '2800', 'Cat', 1, 0, 0),
(65, 'NIELS.GROTERS@CDSurfing.be', 'he476', 'NIELS GROTERS', '2800', 'Cat', 0, 0, 0),
(66, 'REMCO.ROZING@CDSurfing.be', 'gu820', 'REMCO ROZING', '2800', 'Cat', 1, 0, 0),
(67, 'ERIC.NIEUWMANS@CDSurfing.be', 'de853', 'ERIC NIEUWMANS', '2800', 'Dog', 0, 0, 0),
(69, 'Joe.Biden@whitehouse.gov', '$2y$10$836481Q/GP.ijbl.PVVDletnkfOBSaReUNaQ6bHkh3FqFBa1v39BW', 'Joe Biden', '1222', 'Dog', 0, 1, 0),
(78, 'mark.rutte@holland.nl', '$2y$10$scAH5azc4Zwpm/ylZpLXEukmdsERg8uQp3HzB/t7.DKdzOPOmye8K', 'Mark Rutte', '1221', 'None', 0, 1, 0),
(79, 'jeac@gmail.be', '$2y$10$i5gHnbUYFP89uwmlodc6ru/2dKHm5wBHj.9cfc8eyFPFaiCdw9HTG', 'Jeac Paul Gauther', '1227', 'Dog', 1, 1, 0),
(85, 'joana.darco@france.fr', '$2y$10$8rzhpTGrt6PMbWJUaHvF8uerZBMfVtI2hqzw/gIHdinCgqTG2PAVi', 'Joana D Arco', '1200', 'Dog', 1, 1, 0),
(87, 'hans@hans.be', '$2y$10$lqJ/m0zRyXwePdUEsbg1rOPbbH4Cd23Q90k3E.zxqKHnkPL3ePc1O', 'Hans', '2800', 'Dog', 0, 0, NULL);


ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ads_unique_pet_id` (`pet_id`);

ALTER TABLE `breeds`
  ADD PRIMARY KEY (`breed_id`);

ALTER TABLE `healthcare`
  ADD PRIMARY KEY (`healthcare_id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `shipping_id` (`shipping_id`);

ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`pet_id`),
  ADD KEY `pet_id` (`pet_id`);

ALTER TABLE `pet_details`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `fk_ads_cats_ownerID` (`owner_id`),
  ADD KEY `fk_foreign_key_breed` (`breed_id`),
  ADD KEY `fk_foreign_healthcare_id` (`healthcare_id`);

ALTER TABLE `shipping_info`
  ADD PRIMARY KEY (`shipping_id`);

ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `pet_id` (`pet_id`),
  ADD KEY `userid` (`userid`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UQ_Users_Email` (`email`);


ALTER TABLE `ads`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4108;

ALTER TABLE `breeds`
  MODIFY `breed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9992;

ALTER TABLE `healthcare`
  MODIFY `healthcare_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1030;

ALTER TABLE `order_details`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1030;

ALTER TABLE `pet_details`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1404;

ALTER TABLE `shipping_info`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;


ALTER TABLE `ads`
  ADD CONSTRAINT `fk_ads_petid` FOREIGN KEY (`pet_id`) REFERENCES `pet_details` (`pet_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`shipping_id`) REFERENCES `shipping_info` (`shipping_id`);

ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pet_details` (`pet_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

ALTER TABLE `pet_details`
  ADD CONSTRAINT `fk_foreign_healthcare_id` FOREIGN KEY (`healthcare_id`) REFERENCES `healthcare` (`healthcare_id`),
  ADD CONSTRAINT `fk_foreign_key_breed` FOREIGN KEY (`breed_id`) REFERENCES `breeds` (`breed_id`);

ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `fkPetId` FOREIGN KEY (`pet_id`) REFERENCES `pet_details` (`pet_id`),
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`user_id`);

GRANT USAGE ON *.* TO `Webuser`@`%` IDENTIFIED BY PASSWORD '*BCDEF042B5116D7C31C58A8937821A7BF4242BCB';

GRANT SELECT, INSERT, UPDATE, DELETE ON `pets`.* TO `Webuser`@`%`;
  
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
