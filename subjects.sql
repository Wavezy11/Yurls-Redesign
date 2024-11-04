-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 okt 2024 om 14:45
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `subjects`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subjects_links`
--

CREATE TABLE `subjects_links` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `subjects_links`
--

INSERT INTO `subjects_links` (`id`, `subject`, `text`, `url`) VALUES
(1, 'Biologie', 'AR - HoloAnatomy DEMO (EN) - HoloLens2', 'https://www.microsoft.com/nl-nl/p/holoanatomy-demo/9p51d9mb58bh?activetab=pivot:overviewtab'),
(2, 'Biologie', 'VR- Animal Anatomy Explorer (EN)', 'https://www.microsoft.com/nl-nl/p/holoanatomy-demo/9p51d9mb58bh?activetab=pivot:overviewtab'),
(3, 'Biologie', 'VR- High School Anatomy (EN)', 'https://www.meta.com/nl-nl/experiences/high-school-anatomy-for-quest/5556243174447482/?ranking_trace=0_5556243174447482_QUESTSEARCH_4uyhAxOPjXo2tmKlY'),
(4, 'Biologie', 'kaasje', 'https://www.meta.com/nl-nl/experiences/pollinator-park/3630788480370853/'),
(5, 'Biologie', 'Sharecare YOU (EN) Gratis PCVR Demo', 'https://store.steampowered.com/app/753200/Sharecare_YOU/'),
(6, 'Biologie', 'The Body VR: Journey Inside A Cell (EN)', 'https://store.steampowered.com/app/451980/The_Body_VR_Journey_Inside_a_Cell/'),
(7, 'Biologie', '3D Organon VR Anatomy', 'https://www.meta.com/nl-nl/experiences/3d-organon-xr/6218475558223281/?utm_source=sidequest'),
(8, 'Biologie', 'Anatomy of a Chicken', 'https://www.meta.com/nl-nl/experiences/anatomy-of-a-chicken/5447969805266454/?ranking_trace=0_5447969805266454_QUESTSEARCH_1DU2LmV17kXGOGs8h'),
(9, 'Biologie', 'Ebers Anatomy (EN)', 'https://www.meta.com/nl-nl/experiences/5572994846061763/?ranking_trace=0_5572994846061763_QUESTSEARCH_0DM3v6EGFbexNEaY2#?'),
(10, 'Biologie', 'VR Human Anatomy Puzzle (EN)', 'https://www.meta.com/nl-nl/experiences/human-anatomy-puzzle/3972624426164613/?utm_source=www.google.com&utm_medium=oculusredirect#?'),
(11, 'Biologie', 'Human Anatomy VR (EN)', 'https://www.meta.com/nl-nl/experiences/6527658207255000/?ranking_trace=0_6527658207255000_QUESTSEARCH_As2vKTxrX18Xx5vpO'),
(12, 'Biologie', 'Human Anatomy VR (EN) - Gratis Trial', 'https://www.oculus.com/experiences/quest/3662196457238336/?utm_source=sidequest'),
(13, 'Biologie', 'Nano (EN) [Cellen]', 'https://www.meta.com/nl-nl/experiences/5566073043488552/?ranking_trace=0_5566073043488552_QUESTSEARCH_8aSnEGIxcFWgdg8En#?'),
(14, 'Biologie', 'Ocean Rift (EN)', 'https://www.oculus.com/experiences/quest/2134272053250863/?utm_source=www.google.com&utm_medium=oculusredirect'),
(15, 'Biologie', 'Ontleed-Simulator: Doornhaai (EN)', 'https://store.steampowered.com/app/1205410/Dissection_Simulator_Dogfish_Edition/'),
(16, 'Biologie', 'Ontleed-Simulator: Kat (EN)', 'https://store.steampowered.com/app/1178570/Dissection_Simulator_Feline_Edition/'),
(17, 'Biologie', 'Ontleed-Simulator: Kikker (EN)', 'https://www.oculus.com/experiences/quest/3503368656441919/?utm_source=sidequest'),
(18, 'Biologie', 'Ontleed-Simulator: Varken (EN)', 'https://store.steampowered.com/app/1176080/Dissection_Simulator_Pig_Edition/'),
(19, 'Biologie', 'Out of Scale: A Kurzgesagt Adventure (EN)', 'https://www.meta.com/nl-nl/experiences/7270665009617359?ranking_trace=0_7270665009617359_QUESTSEARCH_GGXZwp2Kifvfx09sO_eyJwbGF0Zm9ybSI6ImFuZHJvaWQtNmRvZiIsInF1ZXJ5X3N0cmluZyI6ImVkdWNhdGlvbiIsImxvY2FsZSI6Im5sX05MIiwibnVtX2ZldGNoIjoxMSwic2VhcmNoX3JvdXRlIjoi'),
(20, 'CKV', 'VR - First Touch (EN) [Schilderen in VR]', 'https://www.oculus.com/experiences/quest/5808929989145615/'),
(21, 'CKV', 'VR - Gravity Sketch (EN) [3D Design]', 'https://www.gravitysketch.com/'),
(22, 'CKV', 'VR - Open Brush (EN) [3D tekenen]', 'https://openbrush.app/'),
(23, 'CKV', 'VR/AR - ShapesXR (EN) [3D/XR Design]', 'https://www.shapesxr.com/'),
(24, 'CKV', 'VR 180° Video - Adam Savage\'s Tested VR', 'https://www.meta.com/nl-nl/experiences/adam-savages-tested-vr/2586839431358655/'),
(25, 'CKV', 'MR - Pencil (EN) [Tekenlessen met echt potlood en papier]', 'https://www.pencilxr.com/'),
(26, 'CKV', 'VR - Color Space (EN) [Kleurenboek]', 'https://www.oculus.com/experiences/quest/2702419963135346/?utm_source=www.google.com&utm_medium=oculusredirect'),
(27, 'CKV', 'VR - Kingspray graffiti (EN)', 'https://www.oculus.com/experiences/quest/2082941345119152/?utm_source=www.google.com&utm_medium=oculusredirect'),
(28, 'CKV', 'VR - Let\'s Create Pottery VR (EN) [Pottenbakken]', 'https://www.oculus.com/experiences/quest/1891638294265934/?utm_source=www.google.com&utm_medium=oculusredirect'),
(29, 'CKV', 'VR - Painting VR (EN) [Schilderen in VR]', 'https://www.oculus.com/experiences/quest/3106117596158066/?utm_source=www.google.com&utm_medium=oculusredirect'),
(30, 'CKV', 'VR - Tilt Brush (EN) [3D tekenen]', 'https://www.tiltbrush.com/'),
(31, 'CKV', 'VR - Vermillion (EN) [VR Olieverfstudio]', 'https://www.oculus.com/experiences/quest/4900967296622279/?utm_source=www.google.com&utm_medium=oculusredirect'),
(32, 'GYM', 'VR - GYM CLASS (EN) (ALLEEN QUEST 2!) [BASKETBALl]', 'https://www.meta.com/nl-nl/experiences/gym-class-basketball-vr/3661420607275144/?utm_source=www.google.com&utm_medium=oculusredirect'),
(33, 'GYM', 'VR - Creed: Rise to Glory (EN) [Boksen]', 'https://www.oculus.com/experiences/quest/2366245336750543/?utm_source=www.google.com&utm_medium=oculusredirect'),
(34, 'GYM', 'VR - Eleven Table Tennis VR (NL, EN) [Tafeltennis]', 'https://elevenvr.com/en/'),
(35, 'GYM', 'VR - First Person Tennis - The Real Tennis Simulator (EN) [Tennis]', 'https://www.oculus.com/experiences/quest/6119989094742166/?utm_source=www.google.com&utm_medium=oculusredirect'),
(36, 'GYM', 'VR - FitXR (EN) [Fitness]', 'https://www.oculus.com/experiences/quest/2327205800645550/?utm_source=www.google.com&utm_medium=oculusredirect'),
(37, 'GYM', 'VR - ForeVR Bowl (NL, EN) [Bowlen]', 'https://www.oculus.com/experiences/quest/3420508614708029/?utm_source=www.google.com&utm_medium=oculusredirect'),
(38, 'GYM', 'VR - ForeVR Cornhole (EN) [Zakjeswerpen]', 'https://www.oculus.com/experiences/quest/5011588462297991/?utm_source=www.google.com&utm_medium=oculusredirect'),
(39, 'GYM', 'VR - ForeVR Darts (NL, EN) [Darten]', 'https://www.oculus.com/experiences/quest/3831620133609128/?utm_source=www.google.com&utm_medium=oculusredirect'),
(40, 'GYM', 'VR - ForeVR Pool (NL, EN) [Poolen]', 'https://www.oculus.com/experiences/quest/4760607174068295/?utm_source=www.google.com&utm_medium=oculusredirect'),
(41, 'GYM', 'VR - Golf 5 eClub (EN) [Golf]', 'https://www.oculus.com/experiences/quest/4113720305326115/?utm_source=www.google.com&utm_medium=oculusredirect'),
(42, 'GYM', 'VR - GOLF+ (EN) [Golf]', 'https://www.oculus.com/experiences/quest/2412327085529357/'),
(43, 'GYM', 'VR - Premium Bowling (EN) [Bowlen]', 'https://www.oculus.com/experiences/quest/2773034772778845/?utm_source=www.google.com&utm_medium=oculusredirect'),
(44, 'GYM', 'VR - Real VR Fishing (EN) [Vissen]', 'https://www.oculus.com/experiences/quest/2582932495064035/?utm_source=www.google.com&utm_medium=oculusredirect'),
(45, 'GYM', 'VR - Rezzil Player (EN) [Reactievermogen + techniek verschillende sporten]', 'https://www.oculus.com/experiences/quest/3600836956645933/?utm_source=www.google.com&utm_medium=oculusredirect'),
(46, 'GYM', 'VR - Walkabout Mini Golf (EN)', 'https://www.oculus.com/experiences/quest/2462678267173943/'),
(47, 'GYM', 'VR - WIN Reality (EN) [Honkbal + softbal]', 'https://www.oculus.com/experiences/quest/3172399986210688/?utm_source=www.google.com&utm_medium=oculusredirect'),
(48, 'Economie', 'Gamification - GoFuture: Onderneem je eigen toekomst! (NL)', 'https://www.kuseema.nl/gofuture/'),
(49, 'Mens & Maatschappij', 'Gamification - Topomania (NL)', 'https://www.topomania.net/'),
(50, 'Mens & Maatschappij', 'VR - Anne Frank House VR (NL, EN)', 'https://www.oculus.com/experiences/quest/1958100334295482/?locale=nl_NL'),
(51, 'Mens & Maatschappij', 'VR - Mission: ISS: Quest', 'https://www.oculus.com/experiences/quest/2094303753986147/'),
(52, 'Mens & Maatschappij', 'VR - Nefertari: Journey to Eternity (EN)', 'https://store.steampowered.com/app/861400/Nefertari_Journey_to_Eternity/'),
(53, 'Mens & Maatschappij', 'VR 360° Video - 1943 Berlin Blitz (EN)', 'https://www.oculus.com/experiences/rift/2178820058825941/'),
(54, 'Mens & Maatschappij', 'VR 360° Video - Alcove (EN)', 'https://www.oculus.com/experiences/quest/3895528293794893/?utm_source=www.google.com&utm_medium=oculusredirect'),
(55, 'Mens & Maatschappij', 'VR 360° Video - ecosphere (EN)', 'https://www.oculus.com/experiences/quest/2926036530794417/?utm_source=www.google.com&utm_medium=oculusredirect'),
(56, 'Mens & Maatschappij', 'VR 360° Video - Oekraïne oorlogsschade', 'https://www.youtube.com/@ukrainewarinvr9208/videos'),
(57, 'Mens & Maatschappij', 'VR 360° Video - WW1 Loopgraven', 'https://www.youtube.com/watch?v=92dNeGwf9Qs&ab_channel=Seymour%26Lerhn'),
(58, 'Mens & Maatschappij', 'VR 360° Video - WW2 Anderson schuilplaats', 'https://www.youtube.com/watch?v=L76e6vVJbI0&ab_channel=Seymour%26Lerhn'),
(59, 'Mens & Maatschappij', 'VR 360° Video - WW2 Slagveld', 'https://www.youtube.com/watch?v=vKe1K6J31wg&ab_channel=WargamingEurope'),
(60, 'Mens & Maatschappij', 'VR 360° Video - WW2 Tanks', 'https://www.youtube.com/watch?v=RyAF3u_dpjw&ab_channel=WorldofTanks-OfficialChannel'),
(61, 'Mens & Maatschappij', 'VR - Apollo 11 (EN)', 'https://www.meta.com/nl-nl/experiences/2164469606967296/'),
(62, 'Mens & Maatschappij', 'VR - BRINK Traveler (EN)', 'https://www.oculus.com/experiences/quest/3635172946605196/?utm_source=www.google.com&utm_medium=oculusredirect'),
(63, 'Mens & Maatschappij', 'VR - National Geographic Explore VR (EN)', 'https://www.oculus.com/experiences/quest/2046607608728563/?utm_source=www.google.com&utm_medium=oculusredirect'),
(64, 'Mens & Maatschappij', 'VR - Rome (EN)', 'https://www.meta.com/nl-nl/experiences/4121527391303603/#?'),
(65, 'Scheikunde', 'VR - MEL Chemistry VR Lessons (EN)', 'https://www.oculus.com/experiences/go/1457959427660729/'),
(66, 'Scheikunde', 'VR - Futuclass Education (EN)', 'https://www.meta.com/nl-nl/experiences/3900127736753019/#?'),
(67, 'Scheikunde', 'VR - VLab Education (EN) [Scheikundig lab]', 'https://www.meta.com/nl-nl/experiences/6857662394342596/?ranking_trace=0_6857662394342596_QUESTSEARCH_2swkhfOhYgpZ41xWS#?'),
(68, 'Talen', 'VR - Noun Town: VR Language Learning (Van Engels naar meerdere andere talen) Gratis demo', 'https://www.meta.com/nl-nl/experiences/noun-town-language-learning/5520452821357227/?ranking_trace=0_5520452821357227_QUESTSEARCH_0VVVChdGtwK1FtoIP'),
(69, 'Talen', 'VR - SpeakAPP!-Kids [Presenteren] (EN)', 'https://play.google.com/store/apps/details?id=com.RadboudUniversiteit.SpeakAPPKids'),
(70, 'Talen', 'VR - VR Languages-IT Carlow (Engels, Duits, Spaans, Frans, Italiaans en Noors)', 'https://play.google.com/store/apps/details?id=com.RadboudUniversiteit.SpeakAPPKids'),
(71, 'Talen', 'Interactieve digitale lesmethode - Blink Engels', 'https://play.google.com/store/apps/details?id=com.RadboudUniversiteit.SpeakAPPKids'),
(72, 'Talen', 'Interactieve digitale lesmethode - Blink Nederlands', 'https://blink.nl/blink-nederlands-onderbouw/zo-werkt-het/'),
(73, 'Talen', 'VR - Immerse (EN)', 'https://www.meta.com/nl-nl/experiences/immerse-live-language-classes-ai-conversation-practice/3181432891940455/'),
(74, 'Talen', 'VR - ImmerseMe (EN) - beperkte trial', 'https://immerseme.co/#home'),
(75, 'Talen', 'VR - Language Lab (Nederlands, Engels, Spaans, Arabisch, Chinees, Frans, Duits, Hebreeuws, Italiaans, Japans, Koreaans, Portugees, Russisch en Oekraïens)', 'https://www.oculus.com/experiences/quest/3802077353226534/?ranking_trace=654641448482276_3802077353226534_SKYLINEWEB_09a04360-b332-4d20-be70-391e17dbc230'),
(76, 'Talen', 'VR - Mondly VR (Nederlands, Engels, Spaans, Duits, Frans, Italiaans, Portugees, Russisch, Japans, Chinees en nog veel meer.)', 'https://www.mondly.com/vr'),
(77, 'Talen', 'VR - Terra Alia (Chinees, Duits, Engels, Frans, Italiaans, Japans, Koreaans, Portugees, Russisch, Spaans)', 'https://www.meta.com/nl-nl/experiences/terra-alia-a-multilingual-adventure/7146257325418969/'),
(78, 'Talen', 'VR / Game-based-learning - Keep Talking and Nobody Explodes (NL, EN)', 'https://www.meta.com/nl-nl/experiences/terra-alia-a-multilingual-adventure/7146257325418969/'),
(79, 'Techniek', 'PC - FPV SkyDive [Drone Simulator] (EN)', 'https://store.steampowered.com/app/1278060/FPV_SkyDive__FPV_Drone_Simulator/'),
(80, 'Techniek', 'VR - Short Circuit VR [elektronische circuits] (EN)', 'https://store.steampowered.com/app/970800/Short_Circuit_VR/'),
(81, 'Techniek', 'VR - Training Elektrisch hoogspanningsstation (EN)', 'https://www.oculus.com/experiences/quest/3522494514525780/?utm_source=sidequest'),
(82, 'Techniek', 'VR - Training Transformator oliemonsters (EN)', 'https://www.oculus.com/experiences/quest/3522494514525780/?utm_source=sidequest'),
(83, 'Techniek', 'VR - Training Veiligheid en gezondheid op het werk voor elektriciens (EN)', 'https://www.oculus.com/experiences/quest/3522494514525780/?utm_source=sidequest'),
(84, 'Techniek', 'VR/MR - Arkio (EN) [Architectuur]', 'https://www.meta.com/nl-nl/experiences/arkio/2280319701979278/'),
(85, 'Techniek', 'PCVR - Wrench [automonteur-simulator] (EN)', 'https://store.steampowered.com/app/936720/Wrench/'),
(86, 'Techniek', 'VR - Builder Simulator [Huis bouwen] (EN)', 'https://store.steampowered.com/app/2270940/Builder_Simulator_VR/'),
(87, 'Techniek', 'VR - Car Mechanic Simulator (EN)', 'https://www.oculus.com/experiences/quest/4178846312215481/'),
(88, 'Techniek', 'VR - Graafmachine VR (EN)', 'https://www.meta.com/nl-nl/experiences/6128709557192619/'),
(89, 'Techniek', 'VR - Home Improvisation [meubelbouw] (EN) - HTC Vive', 'https://store.steampowered.com/app/357670/Home_Improvisation_Furniture_Sandbox/'),
(90, 'Techniek', 'VR - Kitchen Assembly (EN)', 'https://www.meta.com/nl-nl/experiences/8235337643173443/'),
(91, 'Techniek', 'VR - vrkshop [houtbewerking] (EN)', 'https://store.steampowered.com/app/1344530/vrkshop/'),
(92, 'Softskills', 'VR - Anti-pest 360° video (NL) [Gedragstraining]', 'https://www.youtube.com/watch?v=VnJSVBVqAIg'),
(93, 'Softskills', 'VR - Guided Meditation VR (EN) [Mediteren/zelfcontrole]', 'https://www.oculus.com/experiences/quest/3385318684883998/?utm_source=www.google.com&utm_medium=oculusredirect'),
(94, 'Softskills', 'VR - Ovation (EN) [Presenteren]', 'https://www.ovationvr.com/'),
(95, 'Softskills', 'VR - VirtualSpeech (EN) [Presenteren]', 'https://virtualspeech.com/blog/using-vr-to-improve-public-speaking-skills'),
(96, 'Kennismaking VR', 'VR - First Steps for Quest 2 [Eerste ervaring met VR]', 'https://www.oculus.com/experiences/quest/3675568169182204/?utm_source=www.google.com&utm_medium=oculusredirect'),
(97, 'Kennismaking VR', 'VR - First Steps for Quest 2 [Eerste ervaring met VR]', 'https://www.oculus.com/experiences/quest/1642239225880682/'),
(98, 'Website Iconen', 'Internetopdrachten', 'https://www.meestersipke.nl/pagina/internetopdrachten'),
(99, 'Website Iconen', 'Onderwijsnieuwsdienst', 'https://www.onderwijsnieuwsdienst.nl/'),
(100, 'Gamefication', 'AR - Wintor (EN) [Tours met opdrachten, escape room]', 'https://www.wintor.com/features'),
(101, 'Gamefication', 'Website - (Virtuele) Bingokaarten maken', 'https://myfreebingocards.com/bingo-card-generator'),
(102, 'Gamefication', 'Website - Blooket Quiz met gamemodes (EN)', 'https://www.blooket.com/'),
(103, 'Gamefication', 'Website - Kahoot Quiz (NL)', 'https://kahoot.com/schools-u/'),
(104, 'Gamefication', 'Website - Quizizz Quiz (NL)', 'https://quizizz.com/?lng=en'),
(105, 'Gamefication', 'App - Seppo (NL, EN)', 'https://seppo.io/nl/'),
(106, 'ICT', 'Game-based-learning - Hardware Tycoon (EN)', 'https://haxor1337.itch.io/hardware-tycoon'),
(107, 'ICT', 'Game-based-learning - Seppo (NL, EN)', 'https://seppo.io/nl/'),
(108, 'ICT', 'App - Seppo (NL, EN)', 'https://seppo.io/nl/'),
(109, 'Digitale Geleerdheid', 'VR 360° Video - Mediagebruik chatten & sexting (NL)', 'https://www.podiumvooronderwijs.nl/mediawijzer-vr#:~:text=Met%20360%20graden%20video\'s%20kijken,het%20lesmateriaal%20zijn%20gratis%20beschikbaar.'),
(110, 'Digitale Geleerdheid', 'VR 360° Video - Cyberpesten (NL)', 'https://www.doe-iets-vr.nl/'),
(111, 'Verschil AR, VR, MR', 'Augmented Reality', 'https://example.com/ar'),
(112, 'Verschil AR, VR, MR', 'Virtual Reality', 'https://example.com/vr'),
(113, 'Verschil AR, VR, MR', 'Mixed Reality', 'https://example.com/mr'),
(114, 'Meerdere vakken', 'VR - StellarX (EN) [VR editor]', 'https://www.oculus.com/experiences/quest/8132958546745663/?utm_source=sidequest'),
(115, 'Meerdere vakken', 'VR / AR - Fectar [Verschillende interactieve lessen]', 'https://www.fectar.com/use-cases/education/'),
(116, 'Meerdere vakken', 'Serious gaming - Minecraft Education Editie (NL)', 'https://education.minecraft.net/nl-nl/resources/explore-lessons'),
(117, 'Meerdere vakken', 'VR - Librarium (EN) [Studievaardigheden, verschillende vakken]', 'https://www.oculus.com/experiences/quest/6291815170892714/?utm_source=www.google.com&utm_medium=oculusredirect'),
(118, 'Meerdere vakken', 'VR - Zoe (VR Leerscenes maken) (EN)', 'https://www.meta.com/nl-nl/experiences/5464660053555314/#?'),
(119, 'Verzorging', 'VR - Notes On Blindness (EN)', 'https://www.meta.com/nl-nl/experiences/1946326588770583/?ranking_trace=0_1946326588770583_QUESTSEARCH_0chQoznOf1j9PKfrW'),
(120, 'Verzorging', 'VR - See What I See: Virtual Reality Eye Disease Experience (EN)', 'https://www.nei.nih.gov/learn-about-eye-health/outreach-campaigns-and-resources/see-what-i-see-virtual-reality-eye-disease-experience'),
(121, 'Verzorging', 'VR - Barbershop Simulator VR (EN)', 'https://store.steampowered.com/app/2109850/Barbershop_Simulator_VR/'),
(122, 'Verzorging', 'VR - Reanimatiesimulator / CPR Simulator (EN)', 'https://www.oculus.com/experiences/quest/5019990081404984/?utm_source=sidequest'),
(123, 'Verzorging', 'VR - VR Bieb Zorg Trainingen (NL) - Gratis Demo', 'https://vrbieb.nl/onze-trainingen/'),
(124, 'Horeca', 'VR - Cooking Simulator VR (EN)', 'https://store.steampowered.com/app/1358140/Cooking_Simulator_VR/'),
(125, 'Horeca', 'VR - Lost Recipes (EN)', 'https://www.meta.com/nl-nl/experiences/lost-recipes/4584847304916084/'),
(126, 'Beroepsgericht', 'VR - Virtual Skillslab [Hospitality, kassatrainer, warehouse] (NL) Gratis demo', 'https://demo.virtualskillslab.com/nl/requestaccount'),
(127, 'Muziek', 'VR - Guitar Strummer (EN)', 'https://sidequestvr.com/app/1900/guitar-strummer'),
(128, 'Muziek', 'MR - PianoVision (EN)', 'https://www.meta.com/nl-nl/experiences/pianovision/5271074762922599/?utm_source=pianovision.com'),
(129, 'Muziek', 'VR - GrooVR: Air Drumming (EN)', 'https://www.oculus.com/experiences/quest/4011466365558046/?utm_source=sidequest'),
(130, 'Muziek', 'VR - Paradiddle [Drummen] (EN)', 'https://store.steampowered.com/app/685240/Paradiddle/'),
(131, 'Muziek', 'VR - Tribe XR | DJ in Mixed Reality (EN)', 'https://www.oculus.com/experiences/quest/2055718171162796/?utm_source=www.google.com&utm_medium=oculusredirect'),
(132, 'Muziek', 'VR - VRtuos (Echte piano vereist!) (EN)', 'https://sidequestvr.com/app/494/vrtuos'),
(133, 'Cursessen', 'De AI-cursus voor Onderwijs', 'https://onderwijs.ai-cursus.nl/home'),
(134, 'Spelgebasseerd Leren', 'Seppo gamification tool met Suzanne Lustenhouwer', 'https://www.youtube.com/watch?v=b2uMoWDph3M&embeds_referring_euri=https%3A%2F%2Finteractievetechnologie.yurls.net%2F&source_ve_path=Mjg2NjY'),
(135, 'Leuke GYM', 'VR - Beat Saber (EN), [Ritme] Gratis demo', 'https://www.oculus.com/experiences/quest/1758986534231171/'),
(136, 'Leuke GYM', 'VR - Dance Central (EN) [Dansen] Gratis demo', 'https://www.oculus.com/experiences/quest/2444056018972158/?utm_source=www.google.com&utm_medium=oculusredirect'),
(137, 'Leuke GYM', 'VR - Echo VR (EN), [VR frisbee arena]', 'https://www.oculus.com/experiences/quest/2215004568539258/?utm_source=rakuten&utm_medium=affiliate&MID=43993&utm_campaign=TnL5HPStwNw-K_xCzndFP7CbF8svtiHnFw&LSNSUBSITE=Omitted_TnL5HPStwNw'),
(138, 'Leuke GYM', 'VR - Gorilla Tag (EN) [VR Tikkertje]', 'https://www.oculus.com/experiences/quest/4979055762136823/?utm_source=www.google.com&utm_medium=oculusredirect'),
(139, 'Leuke GYM', 'VR - LES MILLS BODYCOMBAT (EN) [Fitness]', 'https://www.oculus.com/experiences/quest/4015163475201433/?utm_source=www.google.com&utm_medium=oculusredirect'),
(140, 'Leuke GYM', 'VR - Nock: Bow + Arrow Soccer (EN) [Pijl en boog voetbal]', 'https://www.oculus.com/experiences/quest/5157404804284116/?utm_source=www.google.com&utm_medium=oculusredirect'),
(145, 'Digitale Geleerdheid', 'kaas', 'https://www.yonder.nl/over-yonder/practoraat');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `subjects_links`
--
ALTER TABLE `subjects_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_subject` (`subject`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `subjects_links`
--
ALTER TABLE `subjects_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
