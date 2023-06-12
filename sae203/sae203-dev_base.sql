-- phpMyAdmin SQL Dump
-- version 5.1.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql-sae203-dev.alwaysdata.net
-- Generation Time: Jun 13, 2023 at 12:05 AM
-- Server version: 10.6.13-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sae203-dev_base`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `auteur_id` int(11) DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `chapo` longtext NOT NULL,
  `contenu` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)',
  `lien_yt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `auteur_id`, `titre`, `chapo`, `contenu`, `image`, `date_creation`, `lien_yt`) VALUES
(1, 1, 'Les meilleurs endroits pour travailler à l\'IUT MMI : Des espaces inspirants pour l\'apprentissage et la création', 'L\'IUT MMI (Métiers du Multimédia et de l\'Internet) est un lieu dynamique et stimulant où les étudiants peuvent s\'immerger pleinement dans leur parcours d\'apprentissage. En plus des salles de cours traditionnelles, l\'IUT offre une variété d\'espaces spécialement conçus pour favoriser le travail collaboratif, la créativité et l\'épanouissement des étudiants. Dans cet article, nous mettons en avant les meilleurs endroits où travailler à l\'IUT MMI.', '1. Les Espaces de Co-working\r\n\r\nL\'IUT MMI dispose de plusieurs espaces de co-working, offrant un environnement idéal pour les projets en groupe et la collaboration entre étudiants. Ces espaces sont équipés de tables, de chaises confortables, de prises électriques et d\'une connexion Internet haut débit. Les étudiants peuvent s\'y retrouver pour travailler ensemble, partager des idées et bénéficier d\'un soutien mutuel.\r\n\r\n2. La Bibliothèque et les Espaces de Lecture\r\n\r\nLa bibliothèque de l\'IUT MMI constitue un espace calme et studieux où les étudiants peuvent se concentrer et approfondir leurs connaissances. Elle propose une vaste collection de livres, de revues spécialisées, de ressources numériques et d\'ouvrages de référence dans les domaines du multimédia et de l\'informatique. Les espaces de lecture sont aménagés de manière ergonomique, offrant des conditions optimales pour les étudiants souhaitant étudier ou se plonger dans des projets individuels.\r\n\r\n3. Les Salles de Créativité et de Réunion\r\n\r\nL\'IUT MMI dispose de salles de créativité et de réunion qui favorisent les échanges et les sessions de travail en groupe. Ces espaces sont équipés de tableaux blancs interactifs, de vidéoprojecteurs et d\'un mobilier flexible pour s\'adapter aux besoins de chaque projet. Ils offrent un cadre idéal pour les séances de brainstorming, les présentations de groupe et les réunions de travail.\r\n\r\n\r\n\r\n', '//sae203-dev.alwaysdata.net/sae203/ressources/images/espace.png', '2023-05-16 13:51:58', ''),
(2, 1, 'Festival de Créations : Un événement incontournable organisé par l\'IUT', 'L\'IUT de la ville est fier de présenter la première édition de son Festival de Créations, un événement exceptionnel dédié à la célébration des arts et de l\'innovation. Cette manifestation unique en son genre réunira des talents émergents et des professionnels confirmés dans un cadre propice à la découverte, à l\'inspiration et à l\'échange.', 'Organisé par les étudiants de l\'IUT, le Festival de Créations vise à promouvoir la créativité sous toutes ses formes, que ce soit dans les domaines de l\'art visuel, du design, de la musique, de la mode, du cinéma ou de la technologie. L\'événement est ouvert à tous, que vous soyez étudiant, amateur d\'art ou simplement curieux de découvrir de nouvelles tendances artistiques.\r\n\r\nLe festival se déroulera sur trois jours, du 7 au 9 juin, dans les locaux de l\'IUT. Les visiteurs auront l\'opportunité de plonger dans un univers artistique foisonnant, rythmé par des expositions, des ateliers interactifs, des conférences, des projections de films et des performances en direct. Cet événement propose une programmation variée qui saura satisfaire les goûts les plus éclectiques.\r\n\r\nLe festival comprendra également des ateliers animés par des professionnels renommés, permettant aux participants d\'apprendre les techniques et les méthodes utilisées dans différents domaines créatifs. Que vous souhaitiez vous initier à la peinture, à la photographie, à la création musicale ou à la programmation informatique, vous trouverez certainement un atelier adapté à vos intérêts.\r\n\r\nL\'IUT est résolu à faire du Festival de Créations un rendez-vous annuel incontournable pour les amateurs d\'art et les passionnés de créativité. En offrant une plateforme aux artistes émergents et en favorisant les échanges entre les acteurs de l\'industrie créative, l\'IUT souhaite contribuer à l\'épanouissement de la scène artistique locale et encourager la collaboration interdisciplinaire.\r\n\r\nNe manquez pas le Festival de Créations de l\'IUT, un événement qui célèbre l\'innovation, l\'expression artistique et la passion créative. Venez découvrir de nouveaux talents, vous inspirer et partager votre amour pour l\'art dans une ambiance conviviale et stimulante.', '//sae203-dev.alwaysdata.net/sae203/ressources/images/festival.png', '2023-02-27 20:38:09', ''),
(3, 2, 'Les Dernières Tendances en Création Numérique : L\'IUT MMI à l\'avant-garde de l\'innovation', 'L\'IUT MMI (Métiers du Multimédia et de l\'Internet) se positionne comme un acteur majeur dans le domaine de la création numérique. Avec une expertise reconnue et des enseignants passionnés, cet établissement est à l\'avant-garde des dernières tendances en matière de conception et de production digitale. Dans cet article, nous explorerons quelques-unes des tendances les plus marquantes qui façonnent le paysage de la création numérique, avec un focus sur les réalisations de l\'IUT MMI.', '1. Réalité Virtuelle (RV) et Réalité Augmentée (RA)\r\n\r\nLa Réalité Virtuelle et la Réalité Augmentée sont deux technologies qui ouvrent de nouvelles perspectives créatives. L\'IUT MMI intègre ces tendances émergentes dans ses programmes d\'études, permettant aux étudiants d\'explorer les possibilités offertes par ces environnements immersifs. Que ce soit pour le développement de jeux, la conception d\'expériences interactives ou la création d\'applications innovantes, les étudiants de l\'IUT MMI sont à l\'avant-garde de ces nouvelles formes d\'expression artistique.\r\n\r\n2. Design d\'Interfaces Intuitives\r\n\r\nL\'expérience utilisateur est au cœur de la conception numérique moderne. Les interfaces intuitives et conviviales sont devenues essentielles pour captiver et engager les utilisateurs. L\'IUT MMI met l\'accent sur le design d\'interfaces ergonomiques et esthétiques, en formant les étudiants aux meilleures pratiques de l\'industrie. Des projets concrets sont réalisés, allant de la création de sites web interactifs à la conception d\'applications mobiles, mettant ainsi en pratique les dernières tendances en matière de design d\'interfaces.\r\n\r\n3. Animation 3D et Effets Visuels\r\n\r\nL\'animation 3D et les effets visuels jouent un rôle prépondérant dans de nombreux domaines, notamment le cinéma, la publicité et les jeux vidéo. Les étudiants de l\'IUT MMI sont initiés aux techniques de modélisation, de texturage et d\'animation 3D, ainsi qu\'aux logiciels et aux outils de pointe utilisés par les professionnels de l\'industrie. Grâce à cette formation spécialisée, les étudiants de l\'IUT MMI sont en mesure de créer des visuels captivants et immersifs, repoussant constamment les limites de la créativité numérique.\r\n', '//sae203-dev.alwaysdata.net/sae203/ressources/images/RA.png', '2022-10-10 10:12:20', ''),
(4, 3, 'L\'IUT MMI à l\'écoute des avis étudiants : Une démarche participative pour une formation en constante évolution', 'L\'IUT MMI (Métiers du Multimédia et de l\'Internet) attache une grande importance à la voix de ses étudiants. Conscient de l\'importance de leurs avis pour améliorer la qualité de la formation, l\'IUT a mis en place une démarche participative visant à recueillir les retours et les suggestions des étudiants. Cette approche collaborative permet à l\'IUT MMI de rester en constante évolution, en adaptant ses programmes d\'études et ses méthodes pédagogiques aux besoins et aux attentes des étudiants.', 'Le principal moyen de recueillir les avis étudiants à l\'IUT MMI est à travers des enquêtes de satisfaction. Ces enquêtes sont régulièrement menées tout au long de l\'année académique, offrant ainsi aux étudiants l\'opportunité de donner leur opinion sur différents aspects de leur expérience au sein de l\'IUT. Des questions portant sur la qualité de l\'enseignement, l\'encadrement pédagogique, les ressources disponibles, les infrastructures, et bien d\'autres sujets sont abordées dans ces enquêtes.\r\n\r\nUne équipe dédiée à l\'évaluation et à l\'amélioration continue se charge de l\'analyse des réponses et des commentaires des étudiants. Ces données sont ensuite utilisées pour identifier les points forts de la formation, ainsi que les axes d\'amélioration potentiels. Les résultats des enquêtes sont communiqués aux enseignants et à l\'administration de l\'IUT, favorisant ainsi une réflexion collective et une prise de décision éclairée pour apporter des améliorations concrètes.\r\n\r\nLes avis étudiants recueillis sont pris en compte de manière proactive. L\'IUT MMI met tout en œuvre pour apporter des ajustements et des améliorations en fonction des retours reçus. Cela peut se traduire par des modifications des contenus de cours, des ajustements des méthodes d\'enseignement, des investissements dans de nouvelles technologies ou encore des améliorations des services offerts aux étudiants.\r\n\r\nL\'objectif ultime de cette démarche participative est de garantir une formation de qualité, alignée sur les besoins et les attentes des étudiants. L\'IUT MMI considère les avis étudiants comme une ressource précieuse pour l\'amélioration continue de ses programmes et s\'engage à maintenir un dialogue ouvert et transparent avec sa communauté étudiante.', '//sae203-dev.alwaysdata.net/sae203/ressources/images/etudiants.png', '2022-09-03 14:08:46', '');

-- --------------------------------------------------------

--
-- Table structure for table `auteur`
--

CREATE TABLE `auteur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `lien_twitter` varchar(255) NOT NULL,
  `lien_avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`, `prenom`, `lien_twitter`, `lien_avatar`) VALUES
(1, 'NICAUD', 'Rosalie', 'https://www.linkedin.com/in/rosalie-nicaud-243330256/', 'http://sae203-dev.alwaysdata.net/sae203/ressources/images/avatar-rosalie.png'),
(2, 'REISSMAN', 'Lévana', 'https://www.linkedin.com/in/levana-reissman-672554210/', 'http://sae203-dev.alwaysdata.net/sae203/ressources/images/avatar-levana.png'),
(3, 'LUKOJI', 'Jessica', 'https://www.linkedin.com/in/jessica-lukoji-b91177243/', 'http://sae203-dev.alwaysdata.net/sae203/ressources/images/avatar-jessical.png'),
(4, 'JEUDY', 'Jessica', 'https://www.linkedin.com/in/jessica-jeudy-576516256/', 'http://sae203-dev.alwaysdata.net/sae203/ressources/images/avatar-jessicaj.png');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contenu` longtext NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `nom`, `prenom`, `email`, `contenu`, `type`, `date_creation`) VALUES
(1, 'Van-Rhouten', 'Mathis', 'van.r.mathis@gmail.com', 'Quels sont les moyens de se restaurer dans la cafétéria ? (distributeur de boisson,...)', 'Parent', '2023-01-22 10:40:07'),
(2, 'SORA', 'Chrisely', 'chrichri2@outlook.com', 'Comment se déroule et s\'organise les différentes matières ? Sont elles mélangées peu importe le projet en cours ou pour chaque nouveau projet les matières changent ?', 'Étudiant / Étudiante', '2022-11-04 17:00:40'),
(3, 'Totou', 'Sarahya', 'sarahya.to2@gmail.com', 'Les étudiants sont ils accompagnés pour leurs recherches de stage et d\'alternance ?\r\nEst-il possible d\'aller à l\'étranger ?', 'Étudiant / Étudiante', '2023-02-11 14:20:27'),
(13, 'Jeudy', 'Jessica', 'jessica.jeudy@outlook.fr', 'Est- ce que vous allez me r&eacute;pondre si je vous &eacute;crit ici ?', 'Je ne souhaite pas le préciser', '2023-06-09 17:40:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_23A0E6660BB6FE6` (`auteur_id`);

--
-- Indexes for table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E6660BB6FE6` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
