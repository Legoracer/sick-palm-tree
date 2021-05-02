DROP DATABASE IF EXISTS `watches`;
CREATE DATABASE `watches`;
USE `watches`;

CREATE TABLE `brand`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `image_src` VARCHAR(255) NOT NULL,
    `image_alt` VARCHAR(255) NOT NULL,
     PRIMARY KEY `brand_id_primary`(`id`)
);

CREATE TABLE `material`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY `material_id_primary`(`id`)
);

CREATE TABLE `watch`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `price` DECIMAL(8, 2) NOT NULL,
    `description` TEXT NOT NULL,
    `brand_id` INT UNSIGNED NOT NULL,
    `material_id` INT UNSIGNED NOT NULL,
    PRIMARY KEY `watch_id_primary`(`id`),
    CONSTRAINT `watch_brand_id_foreign` FOREIGN KEY(`brand_id`) REFERENCES `brand`(`id`),
    CONSTRAINT `watch_material_id_foreign` FOREIGN KEY(`material_id`) REFERENCES `material`(`id`)
);

CREATE TABLE `image`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `watch_id` INT UNSIGNED NOT NULL,
    `alt` VARCHAR(255) NOT NULL,
    `src` VARCHAR(255) NOT NULL,
    PRIMARY KEY `image_id_primary`(`id`),
    CONSTRAINT `image_watch_id_foreign` FOREIGN KEY(`watch_id`) REFERENCES `watch`(`id`)
);

CREATE TABLE `review`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `watch_id` INT UNSIGNED NOT NULL,
    `rating` TINYINT NOT NULL,
    `comment` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    PRIMARY KEY `review_id_primary`(`id`),
    CONSTRAINT `review_watch_id_foreign` FOREIGN KEY(`watch_id`) REFERENCES `watch`(`id`)
);

INSERT INTO `brand` (`id`, `name`, `description`, `image_src`, `image_alt`) VALUES
(1, 'Rolex', 
'For over a century, Rolex watches have accompanied explorers and achievers around the world, from the top of the highest mountains to the deepest reaches of the ocean. The watches are crafted with scrupulous attention to detail.',
 './assets/images/brands/Rolex/Rolex.png', 'Rolex Logo'),
(2, 'Patek Philippe', 
'As the only family-owned watchmaker in Geneva, Patek Philippe’s independence has allowed for total freedom in the creative development process behind each and every watch.There is no rule book that can dictate the inspiration behind the exquisite craft of a Patek Philippe.',
 './assets/images/brands/Patek-Philippe/Patek-Philippe.png', 'Patek Philippe Logo'),
(3, 'Audemars Piguet',
'Since 1875, Audemars Piguet perpetuates the same values : mastery, innovation and independence. Nature is an endless source of inspiration for the manufacture which considers craft as a key element of its activity.',
 './assets/images/brands/Audemars-Piguet/Audemars-Piguet.png', 'Audemars Piguet Logo'),
(4, 'IWC Schaffhausen',
'At IWC Schaffhausen precision engineering is combined with exclusive design to produce finely crafted watches that will last for generations. The watches are made responsibly with care.',
 './assets/images/brands/IWC-Schaffhausen/IWC-Schaffhausen.png', 'IWC Schaffhausen'),
(5, 'Vacheron Constantin',
"Over the centuries, Vacheron Constantin has shrewdly intertwined tradition with innovation, to give each customer, whether enthusiast, expert, or collector, a unique vision of time. The brand's philosophy is to meet their expectations by designing timepieces as technically impressive as they are aesthetically stunning.",
 './assets/images/brands/Vacheron-Constantin/Vacheron-Constantin.png', 'Vacheron Constantin Logo')
;


INSERT INTO `material` (`id`, `name`) VALUES
(1, 'Steel'),
(2, 'White Gold'),
(3, 'Yellow Gold'),
(4, 'Rose Gold'),
(5, 'Platinum'),
(6, 'Ceramic'),
(7, 'Titanium');

INSERT INTO `watch` (`id`, `name`, `price`, `description`, `brand_id`, `material_id`) VALUES
(1, 'Submariner', '9532.26', 
'Rolex presents the new generation of its Oyster Perpetual Submariner and Oyster Perpetual Submariner Date, watches that exemplify the historic links between Rolex and the world of diving.', 
1, 1),

(2,'Daytona','40241.94',
'Rolex presents three exclusive versions of its Oyster Perpetual Cosmograph Daytona, the benchmark for those with a passion for driving and speed.',
1,2),

(3,'GMT-Master II','11403.22',
'The GMT-Master II was unveiled in 1982, with a new movement ensuring ease of use. Its combination of peerless functionality, robustness and instantly recognizable aesthetics has attracted a wider audience of world travellers.',
1,1),

(4,'Sky-Dweller','47177.42',
'Rolex presents an 18 ct yellow gold version of its Oyster Perpetual Sky-Dweller, fitted with an Oysterflex bracelet. The watch is the first in the Classic category to include this innovative bracelet made of high-performance elastomer.',
1,3),

(5,'Yacht-Master 42','34012.90',
'As comfortable at sea as aboard a sailboat, the Yacht-Master combines character and performance. The waterproof and robust qualities of this model make it the ideal watch for water sports and sailing in particular.',
1,2),

(6,'Nautilus','34893.00',
'With the rounded octagonal shape of its bezel, the ingenious porthole construction of its case, and its horizontally embossed dial, the Nautilus has epitomized the elegant sports watch since 1976. Forty years later, it comprises a splendid collection of models for men and women.',
2,1),

(7,'Calatrava','17500.00',
'With its pure lines, the Calatrava is recognized as the very essence of the round wristwatch and one of the finest symbols of the Patek Philippe style. Supremely elegant, it charms each new generation of watch lovers by its timeless understated perfection.',
2,4),

(8,'Aquanaut','76500.00',
'When launched in 1997, the Aquanaut created a sensation. It was young, modern and unexpected. Its case was a rounded octagon, inspired by that of the Nautilus. And it sported a “Tropical” strap, made of a new composite material ultra-resistant to wear, salt water and UV radiation.',
2,2),

(9,'Complications','52100.00',
'Gentle reminder of the immemorial links between time measurement and the great ballet of the heavenly bodies, the moon-phase indication is an indispensable function of Patek Philippe’s supercomplicated watches and renowned perpetual calendars.',
2,4),

(10,'Golden Ellipse','55800.00',
'When it first appeared in 1968, Patek Philippe’s Golden Ellipse was a bold departure from traditional watch shapes. But far from bowing to fashion, this innovative watch had a sense of inner harmony that was very pleasing to the eye.',
2,5),

(11,'Royal Oak','23210.00',
'With its steel case, octagonal bezel, “Tapisserie” dial and integrated bracelet, the Royal Oak overturned the prevailing codes in 1972 and took its rightful place as a modern icon.',
3,1),

(12,'Royal Oak Perpetual Calendar','108900.00',
'Crafted in hand-finished black ceramic, this Royal Oak Perpetual Calendar features day, date, month, astronomical moon, and week of the year.',
3,6),

(13,'Royal Oak Offshore Chronograph','36630.00',
'A titanium edition with harmonised rhodium counters on a slate-grey “Méga Tapisserie” dial and a matching rubber bracelet. The bezel, pushpieces and screw-locked crown are in extremely hard black ceramic.',
3,7),

(14,'Royal Oak Offshore Diver','22660.00',
'Selfwinding watch with dive-time measurement and date. Stainless steel case, glareproofed sapphire crystal and caseback. Black dial with “Méga Tapisserie” pattern, rotating inner bezel with diving scale. Black rubber strap.',
3,1),

(15,'[Re]master01','60500.00',
'Like a remastered recording from the 1940s, [Re]master01 reinterprets one of Audemars Piguet’s rare chronograph wristwatches with the latest chronograph technology and a dial design increasing legibility.',
3,1),

(16,"Big Pilot's Watch 43",'9790.00',
'No other model expresses the fascination of IWC Schaffhausen aviator’s watches like the Big Pilot’s Watch. Its purely functional cockpit-instrument design and oversized conical crown were inspired by a military observation watch from the 1940s',
4,1),

(17,'Portugieser','20350.00',
'The Portugieser Chronograph is one of IWC Schaffhausen’s most iconic models. With its compact diameter of 41 millimetres, it fits almost any wrist. However, the thin bezel gives one the impression of wearing a significantly larger watch.',
4,3),

(18,'Aquatimer Automatic','6050.00',
'With its simple dial design and the quarter-hour scale on the internal rotating bezel, the smallest model in the diver’s watch family references the first Aquatimer released in 1967.',
4,1),

(19,'Ingenieur Automatic','15950.00',
'The Ingenieur Automatic is a simple three-hand watch with a date window at “3 o’clock” and a diameter of 40 millimetres. With its simple dial, characteristic luminescent dots and polished bezel, it most closely resembles the Ingenieur models of the 1950s.',
4,3),

(20,'Da Vinci','64900.00',
'With its articulated strap horns and the perpetual calendar, the Da Vinci Perpetual Calendar Chronograph in platinum represents the very best of over 30 years of the Da Vinci family.',
4,5),

(21,'Overseas','46948.00',
'The ideal traveling companion, this steel watch houses a mechanism patented for its display of 37 time zones, combined with a day-night indicator, and its ability to adjust the settings via the crown.',
5,1),

(22,'Patrimony','27467.00',
'The purity and elegance of this 18K white gold watch make it a timeless design. Inspired by the designs of the 1950s, the hour markers and hands gently follow the curve of the dial.',
5,2),

(23,'FiftySix','29282.00',
'Heir to a model from 1956, this steel watch features a precision moon phase that is accurate over 122 years. This poetic complication is finished with day, date, and month displays.',
5,1),

(24,'Traditionnelle','37752.00',
'Sophisticated and sparkling, this 18K white gold watch features the iconic styling of the Traditionnelle Collection with a grooved caseback and railroad-style minute-counter.',
5,2),

(25,'Historiques American 1921','59653.00',
'In a spirit very close to the original, this iconic watch reinterprets a model launched in 1921 specifically designed for the American market during the Roaring Twenties.',
5,5);

INSERT INTO `image` (`id`, `watch_id`, `alt`, `src`) VALUES
(1, 1, 'Submariner Watch', './assets/images/brands/Rolex/Submariner/submariner-1.jpg'),
(2, 1, 'Submariner Watch', './assets/images/brands/Rolex/Submariner/submariner-2.jpg'),
(3, 1, 'Submariner Watch', './assets/images/brands/Rolex/Submariner/submariner-3.jpg'),

(4, 2, 'Daytona Watch', './assets/images/brands/Rolex/Daytona/daytona-1.png'),
(5, 2, 'Daytona Watch', './assets/images/brands/Rolex/Daytona/daytona-2.jpg'),
(6, 2, 'Daytona Watch', './assets/images/brands/Rolex/Daytona/daytona-3.jpg'),

(7, 3, 'GMT-Master II Watch', './assets/images/brands/Rolex/GMT-Master-2/gmt-master-2-1.jpg'),
(8, 3, 'GMT-Master II Watch', './assets/images/brands/Rolex/GMT-Master-2/gmt-master-2-2.jpg'),
(9, 3, 'GMT-Master II Watch', './assets/images/brands/Rolex/GMT-Master-2/gmt-master-2-3.png'),

(10, 4, 'Sky Dweller Watch', './assets/images/brands/Rolex/Sky-Dweller/sky-dweller-1.webp'),
(11, 4, 'Sky Dweller Watch', './assets/images/brands/Rolex/Sky-Dweller/sky-dweller-2.png'),
(12, 4, 'Sky Dweller Watch', './assets/images/brands/Rolex/Sky-Dweller/sky-dweller-3.png'),

(13, 5, 'Yacht-Master 42 Watch', './assets/images/brands/Rolex/Yacht-Master-42/yacht-master-42-1.jpg'),
(14, 5, 'Yacht-Master 42 Watch', './assets/images/brands/Rolex/Yacht-Master-42/yacht-master-42-2.png'),
(15, 5, 'Yacht-Master 42 Watch', './assets/images/brands/Rolex/Yacht-Master-42/yacht-master-42-3.png'),

(16, 6, 'Nautilus Watch', './assets/images/brands/Patek-Philippe/Nautilus/nautilus-1.jpg'),
(17, 6, 'Nautilus Watch', './assets/images/brands/Patek-Philippe/Nautilus/nautilus-2.jpg'),
(18, 6, 'Nautilus Watch', './assets/images/brands/Patek-Philippe/Nautilus/nautilus-3.jpg'),

(19, 7, 'Calatrava Watch', './assets/images/brands/Patek-Philippe/Calatrava/calatrava-1.jpg'),
(20, 7, 'Calatrava Watch', './assets/images/brands/Patek-Philippe/Calatrava/calatrava-2.jpg'),
(21, 7, 'Calatrava Watch', './assets/images/brands/Patek-Philippe/Calatrava/calatrava-3.jpg'),

(22, 8, 'Aquanaut Watch', './assets/images/brands/Patek-Philippe/Aquanaut/aquanaut-1.jpg'),
(23, 8, 'Aquanaut Watch', './assets/images/brands/Patek-Philippe/Aquanaut/aquanaut-2.jpg'),
(24, 8, 'Aquanaut Watch', './assets/images/brands/Patek-Philippe/Aquanaut/aquanaut-3.jpg'),

(25, 9, 'Complications Watch', './assets/images/brands/Patek-Philippe/Complications/complications-1.jpg'),
(26, 9, 'Complications Watch', './assets/images/brands/Patek-Philippe/Complications/complications-2.jpg'),
(27, 9, 'Complications Watch', './assets/images/brands/Patek-Philippe/Complications/complications-3.jpg'),

(28, 10, 'Golden Ellipse Watch', './assets/images/brands/Patek-Philippe/Golden-Ellipse/golden-ellipse-1.jpg'),
(29, 10, 'Golden Ellipse Watch', './assets/images/brands/Patek-Philippe/Golden-Ellipse/golden-ellipse-2.jpg'),
(30, 10, 'Golden Ellipse Watch', './assets/images/brands/Patek-Philippe/Golden-Ellipse/golden-ellipse-3.jpg'),

(31, 11, 'Royal Oak Watch', './assets/images/brands/Audemars-Piguet/Royal-Oak/royal-oak-1.jpg'),
(32, 11, 'Royal Oak Watch', './assets/images/brands/Audemars-Piguet/Royal-Oak/royal-oak-2.jpg'),
(33, 11, 'Royal Oak Watch', './assets/images/brands/Audemars-Piguet/Royal-Oak/royal-oak-3.jpg'),

(34, 12, 'Royal Oak Perpetual Calendar Watch', './assets/images/brands/Audemars-Piguet/Royal-Oak-Perp-Cal/royal-oak-perp-cal-1.png'),
(35, 12, 'Royal Oak Perpetual Calendar Watch', './assets/images/brands/Audemars-Piguet/Royal-Oak-Perp-Cal/royal-oak-perp-cal-2.jpg'),

(36, 13, 'Royal Oak Offshore Chronograph Watch', './assets/images/brands/Audemars-Piguet/Royal-Oak-Offshore-Chrono/royal-oak-offshore-chrono-1.jpg'),
(37, 13, 'Royal Oak Offshore Chronograph Watch', './assets/images/brands/Audemars-Piguet/Royal-Oak-Offshore-Chrono/royal-oak-offshore-chrono-2.jpg'),
(38, 13, 'Royal Oak Offshore Chronograph Watch', './assets/images/brands/Audemars-Piguet/Royal-Oak-Offshore-Chrono/royal-oak-offshore-chrono-3.jpg'),

(39, 14, 'Royal Oak Offshore Diver Watch', './assets/images/brands/Audemars-Piguet/Royal-Oak-Offshore-Diver/royal-oak-offshore-diver-1.jpg'),
(40, 14, 'Royal Oak Offshore Diver Watch', './assets/images/brands/Audemars-Piguet/Royal-Oak-Offshore-Diver/royal-oak-offshore-diver-2.jpg'),

(41, 15, '[Re]master01 Watch', './assets/images/brands/Audemars-Piguet/Remaster01/remaster01-1.webp'),
(42, 15, '[Re]master01 Watch', './assets/images/brands/Audemars-Piguet/Remaster01/remaster01-2.jpg'),
(43, 15, '[Re]master01 Watch', './assets/images/brands/Audemars-Piguet/Remaster01/remaster01-3.png'),

(44, 16, 'Big Pilots Watch 43 Watch', './assets/images/brands/IWC-Schaffhausen/Big-Pilots-Watch-43/big-pilots-watch-43-1.jpg'),
(45, 16, 'Big Pilots Watch 43 Watch', './assets/images/brands/IWC-Schaffhausen/Big-Pilots-Watch-43/big-pilots-watch-43-2.jpg'),

(46, 17, 'Portugieser Watch', './assets/images/brands/IWC-Schaffhausen/Portugieser/portugieser-1.jpeg'),
(47, 17, 'Portugieser Watch', './assets/images/brands/IWC-Schaffhausen/Portugieser/portugieser-2.jpeg'),
(48, 17, 'Portugieser Watch', './assets/images/brands/IWC-Schaffhausen/Portugieser/portugieser-3.jpg'),

(49, 18, 'Aquatimer Automatic Watch', './assets/images/brands/IWC-Schaffhausen/Aquatimer-Automatic/aquatimer-1.png'),
(50, 18, 'Aquatimer Automatic Watch', './assets/images/brands/IWC-Schaffhausen/Aquatimer-Automatic/aquatimer-2.jpg'),
(51, 18, 'Aquatimer Automatic Watch', './assets/images/brands/IWC-Schaffhausen/Aquatimer-Automatic/aquatimer-3.jpg'),

(52, 19, 'Ingenieur Automatic Watch', './assets/images/brands/IWC-Schaffhausen/Ingenieur-Automatic/ingenieur-1.jpeg'),
(53, 19, 'Ingenieur Automatic Watch', './assets/images/brands/IWC-Schaffhausen/Ingenieur-Automatic/ingenieur-2.jpeg'),

(54, 20, 'Da Vinci Watch', './assets/images/brands/IWC-Schaffhausen/Da-Vinci/da-vinci-1.jpeg'),
(55, 20, 'Da Vinci Watch', './assets/images/brands/IWC-Schaffhausen/Da-Vinci/da-vinci-2.jpeg'),
(56, 20, 'Da Vinci Watch', './assets/images/brands/IWC-Schaffhausen/Da-Vinci/da-vinci-3.jpg'),

(57, 21, 'Overseas Watch', './assets/images/brands/Vacheron-Constantin/Overseas/overseas-1.png'),
(58, 21, 'Overseas Watch', './assets/images/brands/Vacheron-Constantin/Overseas/overseas-2.png'),
(59, 21, 'Overseas Watch', './assets/images/brands/Vacheron-Constantin/Overseas/overseas-3.png'),

(60, 22, 'Patrimony Watch', './assets/images/brands/Vacheron-Constantin/Patrimony/patrimony-1.png'),
(61, 22, 'Patrimony Watch', './assets/images/brands/Vacheron-Constantin/Patrimony/patrimony-2.png'),
(62, 22, 'Patrimony Watch', './assets/images/brands/Vacheron-Constantin/Patrimony/patrimony-3.jpg'),

(63, 23, 'FiftySix Watch', './assets/images/brands/Vacheron-Constantin/FiftySix/fiftysix-1.png'),
(64, 23, 'FiftySix Watch', './assets/images/brands/Vacheron-Constantin/FiftySix/fiftysix-2.png'),
(65, 23, 'FiftySix Watch', './assets/images/brands/Vacheron-Constantin/FiftySix/fiftysix-3.jpg'),

(66, 24, 'Traditionnelle Watch', './assets/images/brands/Vacheron-Constantin/Traditionnelle/traditionnelle-1.png'),
(67, 24, 'Traditionnelle Watch', './assets/images/brands/Vacheron-Constantin/Traditionnelle/traditionnelle-2.jpg'),

(68, 25, 'Historiques American 1921 Watch', './assets/images/brands/Vacheron-Constantin/Historiques-American-1921/historiques-american-1921-1.png'),
(69, 25, 'Historiques American 1921 Watch', './assets/images/brands/Vacheron-Constantin/Historiques-American-1921/historiques-american-1921-2.png'),
(70, 25, 'Historiques American 1921 Watch', './assets/images/brands/Vacheron-Constantin/Historiques-American-1921/historiques-american-1921-3.jpg');













