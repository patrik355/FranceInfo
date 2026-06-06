-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2026 at 11:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `franceinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `korisnicko_ime` varchar(50) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(6, 'admin', 'admin', 'admin', '$2y$10$D/G6fg38FDT/n1BzFRKuxuYHbOeATkRd/p5J9bZDSj8882nhesanW', 1),
(7, 'korisnik', 'korisnik', 'korisnik', '$2y$10$EtX86K4.baJNpyeY6EzA.OF5hNlrQcFgMNRFzlZf3wRRxxVWQp4qC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(255) NOT NULL,
  `kategorija` varchar(50) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(13, '2026-06-03 16:59:55', '\"Je vis sur la route, mais sans concert au bout\" : on a passé une journée avec Francis Lalanne, tête de liste \"gilets jaunes\" aux européennes', 'Le chanteur et candidat aux élections européennes poursuit sa campagne auprès des citoyens à travers la France.', 'Francis Lalanne poursuit sa tournée électorale dans plusieurs villes françaises afin de rencontrer les citoyens et présenter les propositions de sa liste pour les élections européennes.\r\n\r\nAu cours de cette journée de campagne, le candidat a multiplié les échanges avec les habitants et les sympathisants présents lors des différents rassemblements organisés dans la région.\r\n\r\nL\'artiste affirme vouloir défendre davantage la participation citoyenne et encourager une représentation plus directe des préoccupations exprimées par les électeurs.\r\n\r\nUne campagne au plus près du terrain\r\n\r\nSelon son entourage, cette approche permet de maintenir un contact permanent avec la population et de mieux comprendre les attentes des électeurs à quelques jours du scrutin.\r\n\r\nLes échanges ont porté sur plusieurs sujets majeurs comme le pouvoir d\'achat, les institutions européennes, la fiscalité et les services publics.\r\n\r\nMalgré les difficultés rencontrées par les petites listes pour obtenir une visibilité nationale, Francis Lalanne continue de défendre son projet politique et de parcourir le pays à la rencontre des citoyens.', 'vijest1.jpg', 'elections', 0),
(14, '2026-06-03 17:12:33', 'INFO FRANCEINFO. Européennes : les Républicains et le RN n\'ont pas signé le plaidoyer de Transparency International pour la lutte contre la corruption', '149 candidats français d\'autres partis ont signé le document proposé par l\'organisation.', 'Dans le cadre des élections européennes, Transparency International a invité les candidats à signer un engagement visant à renforcer la transparence des institutions européennes et à lutter contre la corruption.\r\n\r\nSelon les premières informations publiées par l\'organisation, plusieurs listes ont répondu favorablement à cette initiative afin de démontrer leur volonté d\'améliorer les pratiques de gouvernance publique.\r\n\r\nToutefois, certains partis politiques ont choisi de ne pas signer le document présenté avant les élections européennes.\r\n\r\nUne initiative pour renforcer la confiance\r\n\r\nTransparency International estime que ce type d\'engagement contribue à renforcer la confiance des citoyens envers les institutions et les représentants politiques.\r\n\r\nL\'organisation rappelle également l\'importance de la transparence dans le fonctionnement des administrations publiques européennes.\r\n\r\nUne nouvelle évaluation sera réalisée après le scrutin afin d\'analyser l\'impact de cette campagne de sensibilisation.', 'vijest2.jpg', 'elections', 0),
(15, '2026-06-03 17:17:32', 'Italie : Matteo Salvini affaibli pour les européennes', 'Le dirigeant italien poursuit sa campagne dans un contexte politique plus incertain qu\'auparavant.', 'À quelques jours du scrutin européen, Matteo Salvini tente de mobiliser ses électeurs à travers plusieurs déplacements organisés dans différentes régions italiennes.\r\n\r\nLes derniers sondages montrent une situation plus équilibrée entre les principales forces politiques du pays.\r\n\r\nLes questions économiques et sociales restent au centre des préoccupations des électeurs italiens.\r\n\r\nUne campagne sous pression\r\n\r\nLe leader politique continue de défendre son programme en matière d\'immigration, de fiscalité et de souveraineté nationale.\r\n\r\nLes débats organisés ces dernières semaines ont mis en évidence des divergences importantes entre les différentes listes candidates.\r\n\r\nLes résultats des élections européennes seront particulièrement observés en Italie en raison du poids politique du pays au sein de l\'Union', 'vijest3.jpg', 'elections', 0),
(16, '2026-06-03 17:20:21', '\"Nous avons une capacité à nous adresser à des Français qui viennent d\'horizons très différents\", assure Nicolas Bay du Rassemblement national', 'Le représentant du Rassemblement national se montre confiant avant les élections européennes.', 'Nicolas Bay estime que son mouvement politique parvient à convaincre des électeurs issus de profils et de sensibilités variés.\r\n\r\nLors d\'un entretien accordé à la presse, il a souligné l\'importance des préoccupations liées au pouvoir d\'achat et à la sécurité.\r\n\r\nSelon lui, ces thématiques expliquent une partie du soutien rencontré par son parti dans plusieurs régions françaises.\r\n\r\nDes électeurs aux attentes multiples\r\n\r\nLes responsables du mouvement poursuivent leur campagne en mettant l\'accent sur les enjeux européens et nationaux.\r\n\r\nPlusieurs réunions publiques sont prévues jusqu\'à la fin de la campagne électorale.\r\n\r\nLe scrutin permettra de mesurer l\'évolution du rapport de force entre les principaux partis politiques français.', 'vijest4.jpg', 'elections', 0),
(17, '2026-06-03 17:22:52', '80 km/h, PMA, chômage, européennes... Ce qu\'il faut retenir de l\'interview d\'Édouard Philippe sur franceinfo', 'Le Premier ministre a répondu à plusieurs questions concernant l\'actualité politique et économique.', 'Invité sur franceinfo, Édouard Philippe a abordé plusieurs sujets importants à quelques jours des élections européennes.\r\n\r\nLes échanges ont notamment porté sur la limitation de vitesse à 80 km/h, la situation de l\'emploi et les réformes en cours.\r\n\r\nLe chef du gouvernement a également évoqué les enjeux européens et les priorités de son action politique.\r\n\r\nDes thèmes au cœur de l\'actualité\r\n\r\nL\'entretien a permis de revenir sur plusieurs mesures qui suscitent un débat important dans l\'opinion publique.\r\n\r\nLes journalistes ont interrogé le Premier ministre sur les résultats attendus des politiques mises en œuvre au cours des derniers mois.\r\n\r\nCette intervention s\'inscrit dans un contexte marqué par une forte attention portée aux élections européennes.', 'vijest5.jpg', 'elections', 0),
(18, '2026-06-03 17:23:56', '« Nous présentons nos excuses » : Franceinfo diffuse par erreur un ancien discours d’Édouard Philippe', 'Pendant quelques minutes, la chaîne publique a cru diffuser le discours de Reims, qui lance la campagne présidentielle de l’ancien Premier ministre, ce dimanche 10 mai, avec des images d’une intervention du maire du Havre à Marseille datant d’il y a un an.', 'Annoncé en direct de Reims (Marne), Édouard Philippe apparaît sur l’antenne de Franceinfo… À Marseille (Bouches-du-Rhône). L’ancien Premier ministre (2017-2020) n’a pas fait appel à son hologramme — comme Jean-Luc Mélenchon en 2017 — pour lancer, ce dimanche 10 mai, sa campagne présidentielle dans la capitale du champagne. La chaîne publique d’info en continu, qui retransmettait le discours du patron d’Horizons, s’est simplement emmêlé les pinceaux. Explications.Il est 14h58, ce dimanche, lorsque Patrice Romedenne, présentateur de la tranche 14 heures - 16 heures du jour, introduit avec Neila Latrous, rédactrice en chef politique à France Télévisions, cette déclaration du président d’Horizons qui intervient à un an de l’élection présidentielle.', 'vijest6.jpg', 'elections', 0),
(19, '2026-06-03 17:25:39', 'JT de 8h du vendredi 17 mai 2019', 'JT de 8h du vendredi 17 mai 2019', 'Le journal de 8h revient sur les événements marquants de la matinée et les sujets qui font l\'actualité en France.\r\n\r\nLes équipes de franceinfo proposent également un point sur les élections européennes, l\'économie et les principaux événements internationaux.\r\n\r\nLes journalistes analysent les informations les plus importantes afin d\'offrir aux téléspectateurs une vision claire de l\'actualité du jour.\r\n\r\nUne édition matinale complète\r\n\r\nCette édition comprend également des reportages sur le terrain ainsi que les réactions des principaux acteurs politiques et économiques.', 'jt1.jpg', 'lesjt', 0),
(20, '2026-06-03 17:26:14', 'Le JT de 7h de franceinfo du vendredi 17 mai 2019', 'Une édition matinale consacrée aux principales informations nationales et internationales.', 'Le JT de 7h présente les informations essentielles à retenir avant le début de la journée.\r\n\r\nLes sujets abordés concernent notamment la politique européenne, l\'actualité sociale et les dernières annonces gouvernementales.\r\n\r\nCette édition permet aux téléspectateurs de suivre rapidement les événements les plus importants.\r\n\r\nL\'actualité dès le réveil\r\n\r\nLes correspondants de franceinfo interviennent depuis plusieurs régions afin de compléter les analyses réalisées en studio.', 'jt2.jpg', 'lesjt', 0),
(21, '2026-06-03 17:26:41', 'Grand Soir 3 du jeudi 16 mai 2019', 'Retour sur les événements majeurs de la journée avec analyses et reportages.', 'Le Grand Soir 3 propose un résumé complet de l\'actualité de la journée accompagné de nombreux reportages.\r\n\r\nLes journalistes reviennent sur les principaux dossiers politiques et économiques qui ont marqué l\'actualité.\r\n\r\nDes invités et spécialistes apportent leur expertise afin de mieux comprendre les enjeux abordés.\r\n\r\nUne analyse approfondie\r\n\r\nCette édition met l\'accent sur le décryptage des informations et sur les conséquences des décisions prises au niveau national et européen.', 'jt3.jpg', 'lesjt', 0),
(22, '2026-06-03 17:27:13', 'JT de 20h du jeudi 16 mai 2019', 'Le rendez-vous d\'information du soir consacré aux événements majeurs en France et dans le monde.', 'Le JT de 20h revient sur les faits marquants de la journée à travers des reportages et des analyses détaillées.\r\n\r\nLes téléspectateurs retrouvent les dernières informations politiques, économiques et internationales.\r\n\r\nLes journalistes présentent également les réactions des responsables politiques et des experts invités sur le plateau.\r\n\r\nLes informations à retenir\r\n\r\nCette édition permet de faire le bilan de l\'actualité avant la fin de la journée et d\'anticiper les sujets à suivre dans les prochaines heures.', 'jt4.jpg', 'lesjt', 0),
(23, '2026-06-03 17:29:45', 'Le JT de 13h du samedi 18 mai 2019', 'Un point complet sur l\'actualité de la mi-journée avec les principaux événements en France et en Europe.', 'Le JT de 13h présente les informations les plus importantes de la matinée et les développements récents en France.\r\n\r\nCette édition revient notamment sur l\'actualité politique, les questions économiques et les sujets européens qui dominent les débats du moment.\r\n\r\nLes reporters de franceinfo proposent également plusieurs reportages réalisés sur le terrain afin d\'illustrer les enjeux abordés dans le journal.\r\n\r\nUne actualité suivie en direct\r\n\r\nLes correspondants mobilisés dans plusieurs régions apportent des informations actualisées tout au long de la journée.\r\n\r\nLes téléspectateurs peuvent ainsi suivre les principaux événements nationaux et internationaux grâce à une couverture complète et à des analyses réalisées par les journalistes de la rédaction.', 'jt5.jpg', 'lesjt', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
