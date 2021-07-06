<?php

/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * Dobble implementation : © Séverine Kamycki severinek@gmail.com
 * 
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * material.inc.php
 *
 * Dobble game material description
 *
 * Here, you can describe the material of your game with PHP variables.
 *   
 * This file is loaded in your game logic class constructor, ie these variables
 * are available everywhere in your game logic code.
 *
 */
if (!defined("ANCHOR")) {
  define("ANCHOR", "00");
  define("APPLE", "01");
  define("BABY_BOTTLE", "02");
  define("BIRD", "03");
  define("BOMB", "04");
  define("BULB", "05");
  define("CACTUS", "06");
  define("CAMPFIRE", "07");
  define("CANDLE", "08");
  define("CAR", "09");
  define("CARROT", "10");
  define("CAT", "11");
  define("CHEESE", "12");
  define("CLOCK", "13");
  define("CLOVER", "14");
  define("CLOWN", "15");
  define("DINOSAUR", "16");
  define("DOBBLE", "17");
  define("DOG", "18");
  define("DOLPHIN", "19");
  define("DRAGON", "20");
  define("DROP", "21");
  define("EXCLAMATION", "22");
  define("EYE", "23");
  define("FLOWER", "24");
  define("FORBIDDEN", "25");
  define("GHOST", "26");
  define("HAMMER", "27");
  define("HEART", "28");
  define("ICECUBE", "29");
  define("IGLOO", "30");
  define("INTERROGATION", "31");
  define("JUMPER", "32");
  define("KEY", "33");
  define("LADYBUG", "34");
  define("LIGHTNING", "35");
  define("MAN", "36");
  define("MAPPLE", "37");
  define("MOON", "38");
  define("MOUTH", "39");
  define("PADLOCK", "40");
  define("PENCIL", "41");
  define("SCISSORS", "42");
  define("SKULL", "43");
  define("SNOWFLAKE", "44");
  define("SNOWMAN", "45");
  define("SPIDER", "46");
  define("STAIN", "47");
  define("SUN", "48");
  define("SUNGLASSES", "49");
  define("TARGET", "50");
  define("TREBLE_KEY", "51");
  define("TREE", "52");
  define("TURTLE", "53");
  define("WEB", "54");
  define("YIN_YANG", "55");
  define("ZEBRA", "56");
}

$this->symbols = [
  "ANCHOR" => ANCHOR,
  "APPLE" => APPLE,
  "BABY_BOTTLE" => BABY_BOTTLE,
  "BIRD" => BIRD,
  "BOMB" => BOMB,
  "BULB" => BULB,
  "CACTUS" => CACTUS,
  "CAMPFIRE" => CAMPFIRE,
  "CANDLE" => CANDLE,
  "CAR" => CAR,
  "CARROT" => CARROT,
  "CAT" => CAT,
  "CHEESE" => CHEESE,
  "CLOCK" => CLOCK,
  "CLOVER" => CLOVER,
  "CLOWN" => CLOWN,
  "DINOSAUR" => DINOSAUR,
  "DOBBLE" => DOBBLE,
  "DOG" => DOG,
  "DOLPHIN" => DOLPHIN,
  "DRAGON" => DRAGON,
  "DROP" => DROP,
  "EXCLAMATION" => EXCLAMATION,
  "EYE" => EYE,
  "FLOWER" => FLOWER,
  "FORBIDDEN" => FORBIDDEN,
  "GHOST" => GHOST,
  "HAMMER" => HAMMER,
  "HEART" => HEART,
  "ICECUBE" => ICECUBE,
  "IGLOO" => IGLOO,
  "INTERROGATION" => INTERROGATION,
  "JUMPER" => JUMPER,
  "KEY" => KEY,
  "LADYBUG" => LADYBUG,
  "LIGHTNING" => LIGHTNING,
  "MAN" => MAN,
  "MAPPLE" => MAPPLE,
  "MOON" => MOON,
  "MOUTH" => MOUTH,
  "PADLOCK" => PADLOCK,
  "PENCIL" => PENCIL,
  "SCISSORS" => SCISSORS,
  "SKULL" => SKULL,
  "SNOWFLAKE" => SNOWFLAKE,
  "SNOWMAN" => SNOWMAN,
  "SPIDER" => SPIDER,
  "STAIN" => STAIN,
  "SUN" => SUN,
  "SUNGLASSES" => SUNGLASSES,
  "TARGET" => TARGET,
  "TREBLE_KEY" => TREBLE_KEY,
  "TREE" => TREE,
  "TURTLE" => TURTLE,
  "WEB" => WEB,
  "YIN_YANG" => YIN_YANG,
  "ZEBRA" => ZEBRA,
];

$this->symbolsNames = [
  ANCHOR => clienttranslate('Anchor'),
  APPLE => clienttranslate('Apple'),
  BABY_BOTTLE => clienttranslate('Baby bottle'),
  BIRD => clienttranslate('Bird'),
  BOMB => clienttranslate('Bomb'),
  BULB => clienttranslate('Bulb'),
  CACTUS => clienttranslate('Cactus'),
  CAMPFIRE => clienttranslate('Campfire'),
  CANDLE => clienttranslate('Candle'),
  CAR => clienttranslate('Car'),
  CARROT => clienttranslate('Carrot'),
  CAT => clienttranslate('Cat'),
  CHEESE => clienttranslate('Cheese'),
  CLOCK => clienttranslate('Clock'),
  CLOVER => clienttranslate('Clover'),
  CLOWN => clienttranslate('Clown'),
  DINOSAUR => clienttranslate('Dinosaur'),
  DOBBLE => clienttranslate('Dobble'),
  DOG => clienttranslate('Dog'),
  DOLPHIN => clienttranslate('Dolphin'),
  DRAGON => clienttranslate('Dragon'),
  DROP => clienttranslate('Drop'),
  EXCLAMATION => clienttranslate('Exclamation point'),
  EYE => clienttranslate('Eye'),
  FLOWER => clienttranslate('Flower'),
  FORBIDDEN => clienttranslate('Forbidden'),
  GHOST => clienttranslate('Ghost'),
  HAMMER => clienttranslate('Hammer'),
  HEART => clienttranslate('Heart'),
  ICECUBE => clienttranslate('Icecube'),
  IGLOO => clienttranslate('Igloo'),
  INTERROGATION => clienttranslate('Interrogation point'),
  JUMPER => clienttranslate('Jumper'),
  KEY => clienttranslate('Key'),
  LADYBUG => clienttranslate('Ladybug'),
  LIGHTNING => clienttranslate('Lightning'),
  MAN => clienttranslate('Man'),
  MAPPLE => clienttranslate('Mapple'),
  MOON => clienttranslate('Moon'),
  MOUTH => clienttranslate('Mouth'),
  PADLOCK => clienttranslate('Padlock'),
  PENCIL => clienttranslate('Pencil'),
  SCISSORS => clienttranslate('Scissors'),
  SKULL => clienttranslate('Skull'),
  SNOWFLAKE => clienttranslate('Snowflake'),
  SNOWMAN => clienttranslate('Snowman'),
  SPIDER => clienttranslate('Spider'),
  STAIN => clienttranslate('Stain'),
  SUN => clienttranslate('Sun'),
  SUNGLASSES => clienttranslate('Sunglasses'),
  TARGET => clienttranslate('Target'),
  TREBLE_KEY => clienttranslate('Treble key'),
  TREE => clienttranslate('Tree'),
  TURTLE => clienttranslate('Turtle'),
  WEB => clienttranslate('Web'),
  YIN_YANG => clienttranslate('Yin Yang'),
  ZEBRA => clienttranslate('Zebra'),
];

$this->cards_description = array(
  '00' => [
    'type' => '0011212330314155',
    'zones' => [
      $this->symbols["ANCHOR"] => [
        "left" => "11",
        "top" => "60",
        "rotation" => "42",
        "size" => "22",
      ],
      $this->symbols["CAT"] => [
        "left" => "17",
        "top" => "16",
        "rotation" => "128",
        "size" => "19",
      ],
      $this->symbols["DROP"] => [
        "left" => "39",
        "top" => "40",
        "rotation" => "-47",
        "size" => "38",
      ],
      $this->symbols["EYE"] => [
        "left" => "34",
        "top" => "0",
        "rotation" => "185",
        "size" => "34",
      ],
      $this->symbols["IGLOO"] => [
        "left" => "31",
        "top" => "68",
        "rotation" => "0",
        "size" => "34",
      ],
      $this->symbols["INTERROGATION"] => [
        "left" => "56",
        "top" => "14",
        "rotation" => "222",
        "size" => "37",
      ],
      $this->symbols["PENCIL"] => [
        "left" => "77",
        "top" => "44",
        "rotation" => "5",
        "size" => "21",
      ],
      $this->symbols["YIN_YANG"] => [
        "left" => "13",
        "top" => "36",
        "rotation" => "-20",
        "size" => "28",
      ],
    ],
  ],
  '01' => [
    'type' => '0410152022263147',
    'zones' => [
      $this->symbols["BOMB"] => [
        "left" => "20",
        "top" => "55",
        "rotation" => "0",
        "size" => "41",
      ],
      $this->symbols["CARROT"] => [
        "left" => "13",
        "top" => "6",
        "rotation" => "185",
        "size" => "35",
      ],
      $this->symbols["CLOWN"] => [
        "left" => "53",
        "top" => "65",
        "rotation" => "-45",
        "size" => "29",
      ],
      $this->symbols["DRAGON"] => [
        "left" => "2",
        "top" => "35",
        "rotation" => "90",
        "size" => "34",
      ],
      $this->symbols["EXCLAMATION"] => [
        "left" => "65",
        "top" => "43",
        "rotation" => "-80",
        "size" => "28",
      ],
      $this->symbols["GHOST"] => [
        "left" => "34",
        "top" => "32",
        "rotation" => "0",
        "size" => "34",
      ],
      $this->symbols["INTERROGATION"] => [
        "left" => "63",
        "top" => "18",
        "rotation" => "-135",
        "size" => "31",
      ],
      $this->symbols["STAIN"] => [
        "left" => "38",
        "top" => "2",
        "rotation" => "190",
        "size" => "33",
      ],
    ],
  ],
  '02' => [
    'type' => '1214222941505253',
    'zones' => [
      $this->symbols["CHEESE"] => [
        "left" => "6",
        "top" => "14",
        "rotation" => "0",
        "size" => "32",
      ],
      $this->symbols["CLOVER"] => [
        "left" => "6",
        "top" => "41",
        "rotation" => "45",
        "size" => "35",
      ],
      $this->symbols["EXCLAMATION"] => [
        "left" => "33",
        "top" => "5",
        "rotation" => "-180",
        "size" => "32",
      ],
      $this->symbols["ICECUBE"] => [
        "left" => "29",
        "top" => "70",
        "rotation" => "0",
        "size" => "26",
      ],
      $this->symbols["PENCIL"] => [
        "left" => "56",
        "top" => "12",
        "rotation" => "-45",
        "size" => "31",
      ],
      $this->symbols["TARGET"] => [
        "left" => "74",
        "top" => "37",
        "rotation" => "0",
        "size" => "21",
      ],
      $this->symbols["TREE"] => [
        "left" => "51",
        "top" => "55",
        "rotation" => "-45",
        "size" => "36",
      ],
      $this->symbols["TURTLE"] => [
        "left" => "32",
        "top" => "27",
        "rotation" => "0",
        "size" => "40",
      ],
    ],
  ],
  '03' => [
    'type' => '0715172432343841',
    'zones' => [
      $this->symbols["CAMPFIRE"] => [
        "left" => "20",
        "top" => "65",
        "rotation" => "42",
        "size" => "30",
      ],
      $this->symbols["CLOWN"] => [
        "left" => "40",
        "top" => "26",
        "rotation" => "-135",
        "size" => "25",
      ],
      $this->symbols["DOBBLE"] => [
        "left" => "63",
        "top" => "23",
        "rotation" => "-100",
        "size" => "35",
      ],
      $this->symbols["FLOWER"] => [
        "left" => "7",
        "top" => "19",
        "rotation" => "185",
        "size" => "27",
      ],
      $this->symbols["JUMPER"] => [
        "left" => "51",
        "top" => "44",
        "rotation" => "-45",
        "size" => "40",
      ],
      $this->symbols["LADYBUG"] => [
        "left" => "44",
        "top" => "72",
        "rotation" => "0",
        "size" => "25",
      ],
      $this->symbols["MOON"] => [
        "left" => "4",
        "top" => "38",
        "rotation" => "90",
        "size" => "40",
      ],
      $this->symbols["PENCIL"] => [
        "left" => "29",
        "top" => "0",
        "rotation" => "-100",
        "size" => "37",
      ],
    ],
  ],
  '04' => [
    'type' => '0015253545464950',
    'zones' => [
      $this->symbols["ANCHOR"] => [
        "left" => "32",
        "top" => "59",
        "rotation" => "0",
        "size" => "36",
      ],
      $this->symbols["CLOWN"] => [
        "left" => "31",
        "top" => "19",
        "rotation" => "180",
        "size" => "42",
      ],
      $this->symbols["FORBIDDEN"] => [
        "left" => "59",
        "top" => "50",
        "rotation" => "-20",
        "size" => "32",
      ],
      $this->symbols["LIGHTNING"] => [
        "left" => "13",
        "top" => "57",
        "rotation" => "55",
        "size" => "25",
      ],
      $this->symbols["SNOWMAN"] => [
        "left" => "14",
        "top" => "12",
        "rotation" => "105",
        "size" => "26",
      ],
      $this->symbols["SPIDER"] => [
        "left" => "1",
        "top" => "32",
        "rotation" => "90",
        "size" => "32",
      ],
      $this->symbols["SUNGLASSES"] => [
        "left" => "75",
        "top" => "31",
        "rotation" => "-60",
        "size" => "25",
      ],
      $this->symbols["TARGET"] => [
        "left" => "63",
        "top" => "12",
        "rotation" => "-45",
        "size" => "25",
      ],
    ],
  ],
  '05' => [
    'type' => '1719202328333750',
    'zones' => [
      $this->symbols["DOBBLE"] => [
        "left" => "49",
        "top" => "6",
        "rotation" => "-45",
        "size" => "29",
      ],
      $this->symbols["DOLPHIN"] => [
        "left" => "1",
        "top" => "39",
        "rotation" => "0",
        "size" => "32",
      ],
      $this->symbols["DRAGON"] => [
        "left" => "32",
        "top" => "72",
        "rotation" => "-90",
        "size" => "25",
      ],
      $this->symbols["EYE"] => [
        "left" => "10",
        "top" => "9",
        "rotation" => "135",
        "size" => "31",
      ],
      $this->symbols["HEART"] => [
        "left" => "59",
        "top" => "28",
        "rotation" => "90",
        "size" => "36",
      ],
      $this->symbols["KEY"] => [
        "left" => "61",
        "top" => "62",
        "rotation" => "0",
        "size" => "29",
      ],
      $this->symbols["MAPPLE"] => [
        "left" => "31",
        "top" => "43",
        "rotation" => "0",
        "size" => "32",
      ],
      $this->symbols["TARGET"] => [
        "left" => "33",
        "top" => "19",
        "rotation" => "0",
        "size" => "26",
      ],
    ],
  ],
  '06' => [
    'type' => '0917273142495356',
    'zones' => [
      $this->symbols["CAR"] => [
        "left" => "74",
        "top" => "32",
        "rotation" => "-90",
        "size" => "23",
      ],
      $this->symbols["DOBBLE"] => [
        "left" => "54",
        "top" => "7",
        "rotation" => "180",
        "size" => "25",
      ],
      $this->symbols["HAMMER"] => [
        "left" => "10",
        "top" => "58",
        "rotation" => "-45",
        "size" => "39",
      ],
      $this->symbols["INTERROGATION"] => [
        "left" => "22",
        "top" => "7",
        "rotation" => "135",
        "size" => "27",
      ],
      $this->symbols["SCISSORS"] => [
        "left" => "1",
        "top" => "26",
        "rotation" => "80",
        "size" => "45",
      ],
      $this->symbols["SUNGLASSES"] => [
        "left" => "38",
        "top" => "22",
        "rotation" => "255",
        "size" => "40",
      ],
      $this->symbols["TURTLE"] => [
        "left" => "48",
        "top" => "76",
        "rotation" => "0",
        "size" => "25",
      ],
      $this->symbols["ZEBRA"] => [
        "left" => "45",
        "top" => "57",
        "rotation" => "-45",
        "size" => "29",
      ],
    ],
  ],
  '07' => [
    'type' => '0307222836495455',
    'zones' => [
      $this->symbols["BIRD"] => [
        "left" => "34",
        "top" => "28",
        "rotation" => "",
        "size" => "46",
      ],
      $this->symbols["CAMPFIRE"] => [
        "left" => "18",
        "top" => "62",
        "rotation" => "45",
        "size" => "33",
      ],
      $this->symbols["EXCLAMATION"] => [
        "left" => "36",
        "top" => "5",
        "rotation" => "180",
        "size" => "30",
      ],
      $this->symbols["HEART"] => [
        "left" => "77",
        "top" => "44",
        "rotation" => "-90",
        "size" => "20",
      ],
      $this->symbols["MAN"] => [
        "left" => "14",
        "top" => "11",
        "rotation" => "135",
        "size" => "26",
      ],
      $this->symbols["SUNGLASSES"] => [
        "left" => "59",
        "top" => "8",
        "rotation" => "245",
        "size" => "32",
      ],
      $this->symbols["WEB"] => [
        "left" => "54",
        "top" => "63",
        "rotation" => "5",
        "size" => "28",
      ],
      $this->symbols["YIN_YANG"] => [
        "left" => "4",
        "top" => "35",
        "rotation" => "-20",
        "size" => "34",
      ],
    ],
  ],
  '08' => [
    'type' => '0106091028354143',
    'zones' => [
      $this->symbols["APPLE"] => [
        "left" => "40",
        "top" => "74",
        "rotation" => "0",
        "size" => "22",
      ],
      $this->symbols["CACTUS"] => [
        "left" => "53",
        "top" => "54",
        "rotation" => "-45",
        "size" => "35",
      ],
      $this->symbols["CAR"] => [
        "left" => "72",
        "top" => "29",
        "rotation" => "-90",
        "size" => "27",
      ],
      $this->symbols["CARROT"] => [
        "left" => "2",
        "top" => "40",
        "rotation" => "145",
        "size" => "34",
      ],
      $this->symbols["HEART"] => [
        "left" => "50",
        "top" => "11",
        "rotation" => "-135",
        "size" => "32",
      ],
      $this->symbols["LIGHTNING"] => [
        "left" => "31",
        "top" => "48",
        "rotation" => "45",
        "size" => "36",
      ],
      $this->symbols["PENCIL"] => [
        "left" => "31",
        "top" => "33",
        "rotation" => "-110",
        "size" => "27",
      ],
      $this->symbols["SKULL"] => [
        "left" => "7",
        "top" => "8",
        "rotation" => "-208",
        "size" => "43",
      ],
    ],
  ],
  '09' => [
    'type' => '0309111415183748',
    'zones' => [
      $this->symbols["BIRD"] => [
        "left" => "75",
        "top" => "39",
        "rotation" => "-50",
        "size" => "21",
      ],
      $this->symbols["CAR"] => [
        "left" => "64",
        "top" => "13",
        "rotation" => "-135",
        "size" => "28",
      ],
      $this->symbols["CAT"] => [
        "left" => "14",
        "top" => "12",
        "rotation" => "135",
        "size" => "32",
      ],
      $this->symbols["CLOVER"] => [
        "left" => "27",
        "top" => "22",
        "rotation" => "70",
        "size" => "48",
      ],
      $this->symbols["CLOWN"] => [
        "left" => "41",
        "top" => "2",
        "rotation" => "180",
        "size" => "23",
      ],
      $this->symbols["DOG"] => [
        "left" => "61",
        "top" => "55",
        "rotation" => "-45",
        "size" => "31",
      ],
      $this->symbols["MAPPLE"] => [
        "left" => "9",
        "top" => "49",
        "rotation" => "0",
        "size" => "26",
      ],
      $this->symbols["SUN"] => [
        "left" => "31",
        "top" => "65",
        "rotation" => "0",
        "size" => "32",
      ],
    ],
  ],
  '10' => [
    'type' => '0306212738404750',
    'zones' => [
      $this->symbols["BIRD"] => [
        "left" => "63",
        "top" => "13",
        "rotation" => "-90",
        "size" => "27",
      ],
      $this->symbols["CACTUS"] => [
        "left" => "41",
        "top" => "22",
        "rotation" => "-90",
        "size" => "52",
      ],
      $this->symbols["DROP"] => [
        "left" => "71",
        "top" => "63",
        "rotation" => "-47",
        "size" => "18",
      ],
      $this->symbols["HAMMER"] => [
        "left" => "8",
        "top" => "56",
        "rotation" => "-45",
        "size" => "39",
      ],
      $this->symbols["MOON"] => [
        "left" => "4",
        "top" => "30",
        "rotation" => "90",
        "size" => "40",
      ],
      $this->symbols["PADLOCK"] => [
        "left" => "42",
        "top" => "68",
        "rotation" => "0",
        "size" => "30",
      ],
      $this->symbols["STAIN"] => [
        "left" => "17",
        "top" => "9",
        "rotation" => "145",
        "size" => "25",
      ],
      $this->symbols["TARGET"] => [
        "left" => "43",
        "top" => "3",
        "rotation" => "0",
        "size" => "23",
      ],
    ],
  ],
  '11' => [
    'type' => '0612171826394655',
    'zones' => [
      $this->symbols["CACTUS"] => [
        "left" => "55",
        "top" => "10",
        "rotation" => "-135",
        "size" => "25",
      ],
      $this->symbols["CHEESE"] => [
        "left" => "16",
        "top" => "2",
        "rotation" => "0",
        "size" => "39",
      ],
      $this->symbols["DOBBLE"] => [
        "left" => "31",
        "top" => "35",
        "rotation" => "180",
        "size" => "32",
      ],
      $this->symbols["DOG"] => [
        "left" => "56",
        "top" => "28",
        "rotation" => "-90",
        "size" => "41",
      ],
      $this->symbols["GHOST"] => [
        "left" => "51",
        "top" => "60",
        "rotation" => "-45",
        "size" => "33",
      ],
      $this->symbols["MOUTH"] => [
        "left" => "33",
        "top" => "72",
        "rotation" => "0",
        "size" => "32",
      ],
      $this->symbols["SPIDER"] => [
        "left" => "3",
        "top" => "33",
        "rotation" => "90",
        "size" => "32",
      ],
      $this->symbols["YIN_YANG"] => [
        "left" => "13",
        "top" => "61",
        "rotation" => "0",
        "size" => "26",
      ],
    ],
  ],
  '12' => [
    'type' => '1018192124444952',
    'zones' => [
      $this->symbols["CARROT"] => [
        "left" => "3",
        "top" => "48",
        "rotation" => "120",
        "size" => "44",
      ],
      $this->symbols["DOG"] => [
        "left" => "64",
        "top" => "17",
        "rotation" => "-135",
        "size" => "27",
      ],
      $this->symbols["DOLPHIN"] => [
        "left" => "8",
        "top" => "26",
        "rotation" => "0",
        "size" => "22",
      ],
      $this->symbols["DROP"] => [
        "left" => "73",
        "top" => "48",
        "rotation" => "-90",
        "size" => "25",
      ],
      $this->symbols["FLOWER"] => [
        "left" => "29",
        "top" => "6",
        "rotation" => "0",
        "size" => "22",
      ],
      $this->symbols["SNOWFLAKE"] => [
        "left" => "39",
        "top" => "79",
        "rotation" => "222",
        "size" => "19",
      ],
      $this->symbols["SUNGLASSES"] => [
        "left" => "29",
        "top" => "20",
        "rotation" => "212",
        "size" => "34",
      ],
      $this->symbols["TREE"] => [
        "left" => "41",
        "top" => "41",
        "rotation" => "-45",
        "size" => "43",
      ],
    ],
  ],
  '13' => [
    'type' => '1421262832424551',
    'zones' => [
      $this->symbols["CLOVER"] => [
        "left" => "13",
        "top" => "58",
        "rotation" => "42",
        "size" => "28",
      ],
      $this->symbols["DROP"] => [
        "left" => "65",
        "top" => "17",
        "rotation" => "-135",
        "size" => "20",
      ],
      $this->symbols["GHOST"] => [
        "left" => "53",
        "top" => "24",
        "rotation" => "-90",
        "size" => "42",
      ],
      $this->symbols["HEART"] => [
        "left" => "44",
        "top" => "9",
        "rotation" => "-185",
        "size" => "26",
      ],
      $this->symbols["JUMPER"] => [
        "left" => "58",
        "top" => "58",
        "rotation" => "-45",
        "size" => "29",
      ],
      $this->symbols["SCISSORS"] => [
        "left" => "7",
        "top" => "31",
        "rotation" => "80",
        "size" => "34",
      ],
      $this->symbols["SNOWMAN"] => [
        "left" => "11",
        "top" => "10",
        "rotation" => "120",
        "size" => "30",
      ],
      $this->symbols["TREBLE_KEY"] => [
        "left" => "32",
        "top" => "45",
        "rotation" => "0",
        "size" => "37",
      ],
    ],
  ],
  '14' => [
    'type' => '0913232526363852',
    'zones' => [
      $this->symbols["CAR"] => [
        "left" => "45",
        "top" => "36",
        "rotation" => "-135",
        "size" => "27",
      ],
      $this->symbols["CLOCK"] => [
        "left" => "10",
        "top" => "55",
        "rotation" => "-10",
        "size" => "27",
      ],
      $this->symbols["EYE"] => [
        "left" => "38",
        "top" => "1",
        "rotation" => "180",
        "size" => "30",
      ],
      $this->symbols["FORBIDDEN"] => [
        "left" => "33",
        "top" => "66",
        "rotation" => "48",
        "size" => "30",
      ],
      $this->symbols["GHOST"] => [
        "left" => "56",
        "top" => "16",
        "rotation" => "-90",
        "size" => "34",
      ],
      $this->symbols["MAN"] => [
        "left" => "18",
        "top" => "10",
        "rotation" => "135",
        "size" => "21",
      ],
      $this->symbols["MOON"] => [
        "left" => "13",
        "top" => "23",
        "rotation" => "90",
        "size" => "38",
      ],
      $this->symbols["TREE"] => [
        "left" => "61",
        "top" => "54",
        "rotation" => "-45",
        "size" => "29",
      ],
    ],
  ],
  '15' => [
    'type' => '0203313233434652',
    'zones' => [
      $this->symbols["BABY_BOTTLE"] => [
        "left" => "14",
        "top" => "61",
        "rotation" => "0",
        "size" => "28",
      ],
      $this->symbols["BIRD"] => [
        "left" => "50",
        "top" => "7",
        "rotation" => "270",
        "size" => "28",
      ],
      $this->symbols["INTERROGATION"] => [
        "left" => "25",
        "top" => "4",
        "rotation" => "180",
        "size" => "27",
      ],
      $this->symbols["JUMPER"] => [
        "left" => "58",
        "top" => "57",
        "rotation" => "-45",
        "size" => "32",
      ],
      $this->symbols["KEY"] => [
        "left" => "29",
        "top" => "68",
        "rotation" => "45",
        "size" => "38",
      ],
      $this->symbols["SKULL"] => [
        "left" => "23",
        "top" => "30",
        "rotation" => "-225",
        "size" => "36",
      ],
      $this->symbols["SPIDER"] => [
        "left" => "5",
        "top" => "43",
        "rotation" => "90",
        "size" => "20",
      ],
      $this->symbols["TREE"] => [
        "left" => "56",
        "top" => "29",
        "rotation" => "-90",
        "size" => "39",
      ],
    ],
  ],
  '16' => [
    'type' => '0608111922253256',
    'zones' => [
      $this->symbols["CACTUS"] => [
        "left" => "62",
        "top" => "14",
        "rotation" => "-135",
        "size" => "25",
      ],
      $this->symbols["CANDLE"] => [
        "left" => "32",
        "top" => "38",
        "rotation" => "45",
        "size" => "35",
      ],
      $this->symbols["CAT"] => [
        "left" => "11",
        "top" => "14",
        "rotation" => "135",
        "size" => "41",
      ],
      $this->symbols["DOLPHIN"] => [
        "left" => "6",
        "top" => "49",
        "rotation" => "0",
        "size" => "32",
      ],
      $this->symbols["EXCLAMATION"] => [
        "left" => "39",
        "top" => "4",
        "rotation" => "180",
        "size" => "27",
      ],
      $this->symbols["FORBIDDEN"] => [
        "left" => "59",
        "top" => "60",
        "rotation" => "0",
        "size" => "27",
      ],
      $this->symbols["JUMPER"] => [
        "left" => "67",
        "top" => "35",
        "rotation" => "-90",
        "size" => "30",
      ],
      $this->symbols["ZEBRA"] => [
        "left" => "28",
        "top" => "65",
        "rotation" => "-20",
        "size" => "36",
      ],
    ],
  ],
  '17' => [
    'type' => '1618253341424754',
    'zones' => [
      $this->symbols["DINOSAUR"] => [
        "left" => "7",
        "top" => "56",
        "rotation" => "42",
        "size" => "30",
      ],
      $this->symbols["DOG"] => [
        "left" => "40",
        "top" => "27",
        "rotation" => "-135",
        "size" => "30",
      ],
      $this->symbols["FORBIDDEN"] => [
        "left" => "66",
        "top" => "19",
        "rotation" => "-47",
        "size" => "21",
      ],
      $this->symbols["KEY"] => [
        "left" => "63",
        "top" => "40",
        "rotation" => "10",
        "size" => "28",
      ],
      $this->symbols["PENCIL"] => [
        "left" => "42",
        "top" => "3",
        "rotation" => "-90",
        "size" => "25",
      ],
      $this->symbols["SCISSORS"] => [
        "left" => "4",
        "top" => "24",
        "rotation" => "80",
        "size" => "39",
      ],
      $this->symbols["STAIN"] => [
        "left" => "18",
        "top" => "10",
        "rotation" => "150",
        "size" => "21",
      ],
      $this->symbols["WEB"] => [
        "left" => "29",
        "top" => "56",
        "rotation" => "0",
        "size" => "39",
      ],
    ],
  ],
  '18' => [
    'type' => '0105121521333656',
    'zones' => [
      $this->symbols["APPLE"] => [
        "left" => "27",
        "top" => "69",
        "rotation" => "0",
        "size" => "26",
      ],
      $this->symbols["BULB"] => [
        "left" => "39",
        "top" => "36",
        "rotation" => "45",
        "size" => "33",
      ],
      $this->symbols["CHEESE"] => [
        "left" => "8",
        "top" => "13",
        "rotation" => "0",
        "size" => "42",
      ],
      $this->symbols["CLOWN"] => [
        "left" => "43",
        "top" => "4",
        "rotation" => "185",
        "size" => "27",
      ],
      $this->symbols["DROP"] => [
        "left" => "61",
        "top" => "19",
        "rotation" => "-135",
        "size" => "24",
      ],
      $this->symbols["KEY"] => [
        "left" => "69",
        "top" => "36",
        "rotation" => "-45",
        "size" => "32",
      ],
      $this->symbols["MAN"] => [
        "left" => "5",
        "top" => "47",
        "rotation" => "90",
        "size" => "32",
      ],
      $this->symbols["ZEBRA"] => [
        "left" => "53",
        "top" => "62",
        "rotation" => "-45",
        "size" => "29",
      ],
    ],
  ],
  '19' => [
    'type' => '2426304348505456',
    'zones' => [
      $this->symbols["FLOWER"] => [
        "left" => "14",
        "top" => "13",
        "rotation" => "42",
        "size" => "22",
      ],
      $this->symbols["GHOST"] => [
        "left" => "60",
        "top" => "23",
        "rotation" => "-135",
        "size" => "27",
      ],
      $this->symbols["IGLOO"] => [
        "left" => "16",
        "top" => "66",
        "rotation" => "45",
        "size" => "27",
      ],
      $this->symbols["SKULL"] => [
        "left" => "3",
        "top" => "35",
        "rotation" => "110",
        "size" => "35",
      ],
      $this->symbols["SUN"] => [
        "left" => "39",
        "top" => "54",
        "rotation" => "0",
        "size" => "40",
      ],
      $this->symbols["TARGET"] => [
        "left" => "36",
        "top" => "2",
        "rotation" => "0",
        "size" => "30",
      ],
      $this->symbols["WEB"] => [
        "left" => "70",
        "top" => "45",
        "rotation" => "5",
        "size" => "26",
      ],
      $this->symbols["ZEBRA"] => [
        "left" => "33",
        "top" => "32",
        "rotation" => "-90",
        "size" => "27",
      ],
    ],
  ],
  '20' => [
    'type' => '0104111740455254',
    'zones' => [
      $this->symbols["APPLE"] => [
        "left" => "62",
        "top" => "39",
        "rotation" => "-42",
        "size" => "26",
      ],
      $this->symbols["BOMB"] => [
        "left" => "26",
        "top" => "71",
        "rotation" => "0",
        "size" => "21",
      ],
      $this->symbols["CAT"] => [
        "left" => "10",
        "top" => "47",
        "rotation" => "90",
        "size" => "29",
      ],
      $this->symbols["DOBBLE"] => [
        "left" => "22",
        "top" => "5",
        "rotation" => "165",
        "size" => "45",
      ],
      $this->symbols["PADLOCK"] => [
        "left" => "44",
        "top" => "57",
        "rotation" => "0",
        "size" => "43",
      ],
      $this->symbols["SNOWMAN"] => [
        "left" => "9",
        "top" => "26",
        "rotation" => "135",
        "size" => "27",
      ],
      $this->symbols["TREE"] => [
        "left" => "62",
        "top" => "13",
        "rotation" => "-135",
        "size" => "29",
      ],
      $this->symbols["WEB"] => [
        "left" => "38",
        "top" => "50",
        "rotation" => "-20",
        "size" => "20",
      ],
    ],
  ],
  '21' => [
    'type' => '0123293239474849',
    'zones' => [
      $this->symbols["APPLE"] => [
        "left" => "47",
        "top" => "63",
        "rotation" => "-42",
        "size" => "27",
      ],
      $this->symbols["EYE"] => [
        "left" => "35",
        "top" => "1",
        "rotation" => "180",
        "size" => "26",
      ],
      $this->symbols["ICECUBE"] => [
        "left" => "2",
        "top" => "26",
        "rotation" => "-90",
        "size" => "44",
      ],
      $this->symbols["JUMPER"] => [
        "left" => "65",
        "top" => "44",
        "rotation" => "-90",
        "size" => "29",
      ],
      $this->symbols["MOUTH"] => [
        "left" => "25",
        "top" => "68",
        "rotation" => "45",
        "size" => "27",
      ],
      $this->symbols["STAIN"] => [
        "left" => "17",
        "top" => "12",
        "rotation" => "145",
        "size" => "17",
      ],
      $this->symbols["SUN"] => [
        "left" => "42",
        "top" => "28",
        "rotation" => "0",
        "size" => "28",
      ],
      $this->symbols["SUNGLASSES"] => [
        "left" => "57",
        "top" => "12",
        "rotation" => "260",
        "size" => "36",
      ],
    ],
  ],
  '22' => [
    'type' => '1225283134404448',
    'zones' => [
      $this->symbols["CHEESE"] => [
        "left" => "11",
        "top" => "11",
        "rotation" => "0",
        "size" => "33",
      ],
      $this->symbols["FORBIDDEN"] => [
        "left" => "79",
        "top" => "45",
        "rotation" => "-50",
        "size" => "18",
      ],
      $this->symbols["HEART"] => [
        "left" => "59",
        "top" => "18",
        "rotation" => "-135",
        "size" => "30",
      ],
      $this->symbols["INTERROGATION"] => [
        "left" => "41",
        "top" => "5",
        "rotation" => "180",
        "size" => "24",
      ],
      $this->symbols["LADYBUG"] => [
        "left" => "6",
        "top" => "47",
        "rotation" => "90",
        "size" => "30",
      ],
      $this->symbols["PADLOCK"] => [
        "left" => "26",
        "top" => "64",
        "rotation" => "0",
        "size" => "33",
      ],
      $this->symbols["SNOWFLAKE"] => [
        "left" => "31",
        "top" => "30",
        "rotation" => "5",
        "size" => "39",
      ],
      $this->symbols["SUN"] => [
        "left" => "62",
        "top" => "57",
        "rotation" => "-45",
        "size" => "27",
      ],
    ],
  ],
  '23' => [
    'type' => '0009222433394051',
    'zones' => [
      $this->symbols["ANCHOR"] => [
        "left" => "30",
        "top" => "41",
        "rotation" => "45",
        "size" => "28",
      ],
      $this->symbols["CAR"] => [
        "left" => "50",
        "top" => "8",
        "rotation" => "-135",
        "size" => "41",
      ],
      $this->symbols["EXCLAMATION"] => [
        "left" => "30",
        "top" => "6",
        "rotation" => "180",
        "size" => "23",
      ],
      $this->symbols["FLOWER"] => [
        "left" => "11",
        "top" => "21",
        "rotation" => "185",
        "size" => "25",
      ],
      $this->symbols["KEY"] => [
        "left" => "75",
        "top" => "50",
        "rotation" => "-45",
        "size" => "23",
      ],
      $this->symbols["MOUTH"] => [
        "left" => "14",
        "top" => "55",
        "rotation" => "0",
        "size" => "52",
      ],
      $this->symbols["PADLOCK"] => [
        "left" => "52",
        "top" => "48",
        "rotation" => "-45",
        "size" => "31",
      ],
      $this->symbols["TREBLE_KEY"] => [
        "left" => "5",
        "top" => "44",
        "rotation" => "90",
        "size" => "27",
      ],
    ],
  ],
  '24' => [
    'type' => '0313203941444556',
    'zones' => [
      $this->symbols["BIRD"] => [
        "left" => "65",
        "top" => "18",
        "rotation" => "-90",
        "size" => "26",
      ],
      $this->symbols["CLOCK"] => [
        "left" => "9",
        "top" => "18",
        "rotation" => "85",
        "size" => "31",
      ],
      $this->symbols["DRAGON"] => [
        "left" => "38",
        "top" => "31",
        "rotation" => "0",
        "size" => "37",
      ],
      $this->symbols["MOUTH"] => [
        "left" => "59",
        "top" => "63",
        "rotation" => "-45",
        "size" => "26",
      ],
      $this->symbols["PENCIL"] => [
        "left" => "41",
        "top" => "4",
        "rotation" => "-100",
        "size" => "28",
      ],
      $this->symbols["SNOWFLAKE"] => [
        "left" => "34",
        "top" => "70",
        "rotation" => "222",
        "size" => "23",
      ],
      $this->symbols["SNOWMAN"] => [
        "left" => "7",
        "top" => "46",
        "rotation" => "85",
        "size" => "34",
      ],
      $this->symbols["ZEBRA"] => [
        "left" => "73",
        "top" => "41",
        "rotation" => "-90",
        "size" => "24",
      ],
    ],
  ],
  '25' => [
    'type' => '0206152344515354',
    'zones' => [
      $this->symbols["BABY_BOTTLE"] => [
        "left" => "4",
        "top" => "35",
        "rotation" => "42",
        "size" => "37",
      ],
      $this->symbols["CACTUS"] => [
        "left" => "68",
        "top" => "33",
        "rotation" => "-90",
        "size" => "29",
      ],
      $this->symbols["CLOWN"] => [
        "left" => "66",
        "top" => "16",
        "rotation" => "-135",
        "size" => "21",
      ],
      $this->symbols["EYE"] => [
        "left" => "32",
        "top" => "-3",
        "rotation" => "180",
        "size" => "37",
      ],
      $this->symbols["SNOWFLAKE"] => [
        "left" => "31",
        "top" => "54",
        "rotation" => "0",
        "size" => "38",
      ],
      $this->symbols["TREBLE_KEY"] => [
        "left" => "70",
        "top" => "60",
        "rotation" => "45",
        "size" => "20",
      ],
      $this->symbols["TURTLE"] => [
        "left" => "8",
        "top" => "18",
        "rotation" => "135",
        "size" => "33",
      ],
      $this->symbols["WEB"] => [
        "left" => "40",
        "top" => "31",
        "rotation" => "-45",
        "size" => "24",
      ],
    ],
  ],
  '26' => [
    'type' => '0107081318315051',
    'zones' => [
      $this->symbols["APPLE"] => [
        "left" => "59",
        "top" => "50",
        "rotation" => "-50",
        "size" => "32",
      ],
      $this->symbols["CAMPFIRE"] => [
        "left" => "15",
        "top" => "14",
        "rotation" => "128",
        "size" => "40",
      ],
      $this->symbols["CANDLE"] => [
        "left" => "19",
        "top" => "60",
        "rotation" => "32",
        "size" => "30",
      ],
      $this->symbols["CLOCK"] => [
        "left" => "5",
        "top" => "44",
        "rotation" => "45",
        "size" => "29",
      ],
      $this->symbols["DOG"] => [
        "left" => "71",
        "top" => "30",
        "rotation" => "-90",
        "size" => "22",
      ],
      $this->symbols["INTERROGATION"] => [
        "left" => "45",
        "top" => "4",
        "rotation" => "180",
        "size" => "25",
      ],
      $this->symbols["TARGET"] => [
        "left" => "55",
        "top" => "31",
        "rotation" => "45",
        "size" => "16",
      ],
      $this->symbols["TREBLE_KEY"] => [
        "left" => "38",
        "top" => "64",
        "rotation" => "0",
        "size" => "31",
      ],
    ],
  ],
  '27' => [
    'type' => '0213161721223548',
    'zones' => [
      $this->symbols["BABY_BOTTLE"] => [
        "left" => "22",
        "top" => "62",
        "rotation" => "10",
        "size" => "17",
      ],
      $this->symbols["CLOCK"] => [
        "left" => "36",
        "top" => "60",
        "rotation" => "-45",
        "size" => "33",
      ],
      $this->symbols["DINOSAUR"] => [
        "left" => "4",
        "top" => "44",
        "rotation" => "90",
        "size" => "31",
      ],
      $this->symbols["DOBBLE"] => [
        "left" => "37",
        "top" => "35",
        "rotation" => "205",
        "size" => "26",
      ],
      $this->symbols["DROP"] => [
        "left" => "60",
        "top" => "16",
        "rotation" => "-90",
        "size" => "33",
      ],
      $this->symbols["EXCLAMATION"] => [
        "left" => "37",
        "top" => "5",
        "rotation" => "185",
        "size" => "33",
      ],
      $this->symbols["LIGHTNING"] => [
        "left" => "15",
        "top" => "11",
        "rotation" => "145",
        "size" => "32",
      ],
      $this->symbols["SUN"] => [
        "left" => "63",
        "top" => "44",
        "rotation" => "-45",
        "size" => "29",
      ],
    ],
  ],
  '28' => [
    'type' => '0205082637404149',
    'zones' => [
      $this->symbols["BABY_BOTTLE"] => [
        "left" => "33",
        "top" => "63",
        "rotation" => "-30",
        "size" => "34",
      ],
      $this->symbols["BULB"] => [
        "left" => "23",
        "top" => "38",
        "rotation" => "95",
        "size" => "33",
      ],
      $this->symbols["CANDLE"] => [
        "left" => "14",
        "top" => "60",
        "rotation" => "47",
        "size" => "27",
      ],
      $this->symbols["GHOST"] => [
        "left" => "52",
        "top" => "42",
        "rotation" => "-90",
        "size" => "41",
      ],
      $this->symbols["MAPPLE"] => [
        "left" => "10",
        "top" => "19",
        "rotation" => "90",
        "size" => "28",
      ],
      $this->symbols["PADLOCK"] => [
        "left" => "48",
        "top" => "25",
        "rotation" => "-40",
        "size" => "29",
      ],
      $this->symbols["PENCIL"] => [
        "left" => "37",
        "top" => "3",
        "rotation" => "-95",
        "size" => "29",
      ],
      $this->symbols["SUNGLASSES"] => [
        "left" => "65",
        "top" => "13",
        "rotation" => "-106",
        "size" => "27",
      ],
    ],
  ],
  '29' => [
    'type' => '0815162728303952',
    'zones' => [
      $this->symbols["CANDLE"] => [
        "left" => "43",
        "top" => "62",
        "rotation" => "-7",
        "size" => "30",
      ],
      $this->symbols["CLOWN"] => [
        "left" => "44",
        "top" => "6",
        "rotation" => "180",
        "size" => "24",
      ],
      $this->symbols["DINOSAUR"] => [
        "left" => "13",
        "top" => "42",
        "rotation" => "37",
        "size" => "48",
      ],
      $this->symbols["HAMMER"] => [
        "left" => "12",
        "top" => "6",
        "rotation" => "45",
        "size" => "36",
      ],
      $this->symbols["HEART"] => [
        "left" => "40",
        "top" => "26",
        "rotation" => "-137",
        "size" => "22",
      ],
      $this->symbols["IGLOO"] => [
        "left" => "3",
        "top" => "40",
        "rotation" => "90",
        "size" => "27",
      ],
      $this->symbols["MOUTH"] => [
        "left" => "62",
        "top" => "57",
        "rotation" => "-45",
        "size" => "28",
      ],
      $this->symbols["TREE"] => [
        "left" => "57",
        "top" => "27",
        "rotation" => "-90",
        "size" => "36",
      ],
    ],
  ],
  '30' => [
    'type' => '0405091632445055',
    'zones' => [
      $this->symbols["BOMB"] => [
        "left" => "9",
        "top" => "48",
        "rotation" => "42",
        "size" => "39",
      ],
      $this->symbols["BULB"] => [
        "left" => "44",
        "top" => "47",
        "rotation" => "45",
        "size" => "26",
      ],
      $this->symbols["CAR"] => [
        "left" => "39",
        "top" => "3",
        "rotation" => "-135",
        "size" => "25",
      ],
      $this->symbols["DINOSAUR"] => [
        "left" => "48",
        "top" => "76",
        "rotation" => "0",
        "size" => "17",
      ],
      $this->symbols["JUMPER"] => [
        "left" => "50",
        "top" => "18",
        "rotation" => "-90",
        "size" => "32",
      ],
      $this->symbols["SNOWFLAKE"] => [
        "left" => "64",
        "top" => "61",
        "rotation" => "222",
        "size" => "24",
      ],
      $this->symbols["TARGET"] => [
        "left" => "72",
        "top" => "38",
        "rotation" => "0",
        "size" => "24",
      ],
      $this->symbols["YIN_YANG"] => [
        "left" => "10",
        "top" => "18",
        "rotation" => "45",
        "size" => "34",
      ],
    ],
  ],
  '31' => [
    'type' => '0305101725293051',
    'zones' => [
      $this->symbols["BIRD"] => [
        "left" => "65",
        "top" => "14",
        "rotation" => "-110",
        "size" => "25",
      ],
      $this->symbols["BULB"] => [
        "left" => "42",
        "top" => "48",
        "rotation" => "-45",
        "size" => "35",
      ],
      $this->symbols["CARROT"] => [
        "left" => "3",
        "top" => "10",
        "rotation" => "-165",
        "size" => "41",
      ],
      $this->symbols["DOBBLE"] => [
        "left" => "29",
        "top" => "6",
        "rotation" => "170",
        "size" => "40",
      ],
      $this->symbols["FORBIDDEN"] => [
        "left" => "77",
        "top" => "38",
        "rotation" => "-50",
        "size" => "17",
      ],
      $this->symbols["ICECUBE"] => [
        "left" => "3",
        "top" => "46",
        "rotation" => "90",
        "size" => "32",
      ],
      $this->symbols["IGLOO"] => [
        "left" => "25",
        "top" => "64",
        "rotation" => "45",
        "size" => "36",
      ],
      $this->symbols["TREBLE_KEY"] => [
        "left" => "68",
        "top" => "50",
        "rotation" => "-45",
        "size" => "22",
      ],
    ],
  ],
  '32' => [
    'type' => '0406131430333449',
    'zones' => [
      $this->symbols["BOMB"] => [
        "left" => "37",
        "top" => "34",
        "rotation" => "0",
        "size" => "31",
      ],
      $this->symbols["CACTUS"] => [
        "left" => "52",
        "top" => "12",
        "rotation" => "225",
        "size" => "33",
      ],
      $this->symbols["CLOCK"] => [
        "left" => "54",
        "top" => "57",
        "rotation" => "-90",
        "size" => "25",
      ],
      $this->symbols["CLOVER"] => [
        "left" => "16",
        "top" => "16",
        "rotation" => "135",
        "size" => "28",
      ],
      $this->symbols["IGLOO"] => [
        "left" => "24",
        "top" => "65",
        "rotation" => "-5",
        "size" => "32",
      ],
      $this->symbols["KEY"] => [
        "left" => "64",
        "top" => "38",
        "rotation" => "-60",
        "size" => "35",
      ],
      $this->symbols["LADYBUG"] => [
        "left" => "6",
        "top" => "40",
        "rotation" => "90",
        "size" => "37",
      ],
      $this->symbols["SUNGLASSES"] => [
        "left" => "32",
        "top" => "-2",
        "rotation" => "215",
        "size" => "36",
      ],
    ],
  ],
  '33' => [
    'type' => '0002041828293856',
    'zones' => [
      $this->symbols["ANCHOR"] => [
        "left" => "5",
        "top" => "34",
        "rotation" => "90",
        "size" => "30",
      ],
      $this->symbols["BABY_BOTTLE"] => [
        "left" => "49",
        "top" => "68",
        "rotation" => "-90",
        "size" => "29",
      ],
      $this->symbols["BOMB"] => [
        "left" => "37",
        "top" => "37",
        "rotation" => "-50",
        "size" => "35",
      ],
      $this->symbols["DOG"] => [
        "left" => "56",
        "top" => "16",
        "rotation" => "-135",
        "size" => "26",
      ],
      $this->symbols["HEART"] => [
        "left" => "44",
        "top" => "8",
        "rotation" => "185",
        "size" => "16",
      ],
      $this->symbols["ICECUBE"] => [
        "left" => "12",
        "top" => "53",
        "rotation" => "45",
        "size" => "41",
      ],
      $this->symbols["MOON"] => [
        "left" => "12",
        "top" => "13",
        "rotation" => "145",
        "size" => "34",
      ],
      $this->symbols["ZEBRA"] => [
        "left" => "67",
        "top" => "40",
        "rotation" => "-90",
        "size" => "32",
      ],
    ],
  ],
  '34' => [
    'type' => '0809202129344654',
    'zones' => [
      $this->symbols["CANDLE"] => [
        "left" => "55",
        "top" => "42",
        "rotation" => "-45",
        "size" => "32",
      ],
      $this->symbols["CAR"] => [
        "left" => "39",
        "top" => "8",
        "rotation" => "180",
        "size" => "30",
      ],
      $this->symbols["DRAGON"] => [
        "left" => "6",
        "top" => "27",
        "rotation" => "90",
        "size" => "43",
      ],
      $this->symbols["DROP"] => [
        "left" => "67",
        "top" => "19",
        "rotation" => "220",
        "size" => "17",
      ],
      $this->symbols["ICECUBE"] => [
        "left" => "39",
        "top" => "56",
        "rotation" => "0",
        "size" => "38",
      ],
      $this->symbols["LADYBUG"] => [
        "left" => "19",
        "top" => "69",
        "rotation" => "45",
        "size" => "19",
      ],
      $this->symbols["SPIDER"] => [
        "left" => "14",
        "top" => "10",
        "rotation" => "135",
        "size" => "20",
      ],
      $this->symbols["WEB"] => [
        "left" => "72",
        "top" => "33",
        "rotation" => "-20",
        "size" => "22",
      ],
    ],
  ],
  '35' => [
    'type' => '0001031619263453',
    'zones' => [
      $this->symbols["ANCHOR"] => [
        "left" => "13",
        "top" => "59",
        "rotation" => "42",
        "size" => "28",
      ],
      $this->symbols["APPLE"] => [
        "left" => "49",
        "top" => "25",
        "rotation" => "-90",
        "size" => "30",
      ],
      $this->symbols["BIRD"] => [
        "left" => "46",
        "top" => "5",
        "rotation" => "225",
        "size" => "23",
      ],
      $this->symbols["DINOSAUR"] => [
        "left" => "57",
        "top" => "58",
        "rotation" => "-57",
        "size" => "32",
      ],
      $this->symbols["DOLPHIN"] => [
        "left" => "13",
        "top" => "10",
        "rotation" => "50",
        "size" => "45",
      ],
      $this->symbols["GHOST"] => [
        "left" => "60",
        "top" => "40",
        "rotation" => "240",
        "size" => "31",
      ],
      $this->symbols["LADYBUG"] => [
        "left" => "33",
        "top" => "57",
        "rotation" => "-5",
        "size" => "27",
      ],
      $this->symbols["TURTLE"] => [
        "left" => "0",
        "top" => "30",
        "rotation" => "90",
        "size" => "32",
      ],
    ],
  ],
  '36' => [
    'type' => '0005060720424852',
    'zones' => [
      $this->symbols["ANCHOR"] => [
        "left" => "38",
        "top" => "37",
        "rotation" => "0",
        "size" => "24",
      ],
      $this->symbols["BULB"] => [
        "left" => "59",
        "top" => "63",
        "rotation" => "-25",
        "size" => "22",
      ],
      $this->symbols["CACTUS"] => [
        "left" => "36",
        "top" => "3",
        "rotation" => "180",
        "size" => "27",
      ],
      $this->symbols["CAMPFIRE"] => [
        "left" => "6",
        "top" => "44",
        "rotation" => "90",
        "size" => "33",
      ],
      $this->symbols["DRAGON"] => [
        "left" => "28",
        "top" => "61",
        "rotation" => "40",
        "size" => "29",
      ],
      $this->symbols["SCISSORS"] => [
        "left" => "9",
        "top" => "12",
        "rotation" => "125",
        "size" => "39",
      ],
      $this->symbols["SUN"] => [
        "left" => "57",
        "top" => "30",
        "rotation" => "-90",
        "size" => "38",
      ],
      $this->symbols["TREE"] => [
        "left" => "60",
        "top" => "11",
        "rotation" => "-135",
        "size" => "22",
      ],
    ],
  ],
  '37' => [
    'type' => '1820303235364053',
    'zones' => [
      $this->symbols["DOG"] => [
        "left" => "36",
        "top" => "4",
        "rotation" => "180",
        "size" => "37",
      ],
      $this->symbols["DRAGON"] => [
        "left" => "49",
        "top" => "66",
        "rotation" => "0",
        "size" => "24",
      ],
      $this->symbols["IGLOO"] => [
        "left" => "69",
        "top" => "50",
        "rotation" => "-47",
        "size" => "25",
      ],
      $this->symbols["JUMPER"] => [
        "left" => "41",
        "top" => "39",
        "rotation" => "225",
        "size" => "32",
      ],
      $this->symbols["LIGHTNING"] => [
        "left" => "6",
        "top" => "43",
        "rotation" => "-87",
        "size" => "37",
      ],
      $this->symbols["MAN"] => [
        "left" => "12",
        "top" => "20",
        "rotation" => "135",
        "size" => "31",
      ],
      $this->symbols["PADLOCK"] => [
        "left" => "71",
        "top" => "23",
        "rotation" => "-95",
        "size" => "22",
      ],
      $this->symbols["TURTLE"] => [
        "left" => "28",
        "top" => "71",
        "rotation" => "30",
        "size" => "24",
      ],
    ],
  ],
  '38' => [
    'type' => '0407212537394353',
    'zones' => [
      $this->symbols["BOMB"] => [
        "left" => "62",
        "top" => "60",
        "rotation" => "-90",
        "size" => "25",
      ],
      $this->symbols["CAMPFIRE"] => [
        "left" => "15",
        "top" => "62",
        "rotation" => "45",
        "size" => "22",
      ],
      $this->symbols["DROP"] => [
        "left" => "55",
        "top" => "13",
        "rotation" => "180",
        "size" => "22",
      ],
      $this->symbols["FORBIDDEN"] => [
        "left" => "36",
        "top" => "37",
        "rotation" => "-105",
        "size" => "32",
      ],
      $this->symbols["MAPPLE"] => [
        "left" => "4",
        "top" => "31",
        "rotation" => "45",
        "size" => "30",
      ],
      $this->symbols["MOUTH"] => [
        "left" => "63",
        "top" => "22",
        "rotation" => "-90",
        "size" => "40",
      ],
      $this->symbols["SKULL"] => [
        "left" => "25",
        "top" => "7",
        "rotation" => "155",
        "size" => "31",
      ],
      $this->symbols["TURTLE"] => [
        "left" => "35",
        "top" => "72",
        "rotation" => "0",
        "size" => "26",
      ],
    ],
  ],
  '39' => [
    'type' => '0711262729333544',
    'zones' => [
      $this->symbols["CAMPFIRE"] => [
        "left" => "6",
        "top" => "50",
        "rotation" => "125",
        "size" => "29",
      ],
      $this->symbols["CAT"] => [
        "left" => "11",
        "top" => "19",
        "rotation" => "135",
        "size" => "42",
      ],
      $this->symbols["GHOST"] => [
        "left" => "40",
        "top" => "3",
        "rotation" => "180",
        "size" => "32",
      ],
      $this->symbols["HAMMER"] => [
        "left" => "36",
        "top" => "31",
        "rotation" => "220",
        "size" => "40",
      ],
      $this->symbols["ICECUBE"] => [
        "left" => "55",
        "top" => "59",
        "rotation" => "-45",
        "size" => "31",
      ],
      $this->symbols["KEY"] => [
        "left" => "65",
        "top" => "12",
        "rotation" => "265",
        "size" => "23",
      ],
      $this->symbols["LIGHTNING"] => [
        "left" => "26",
        "top" => "65",
        "rotation" => "48",
        "size" => "32",
      ],
      $this->symbols["SNOWFLAKE"] => [
        "left" => "67",
        "top" => "33",
        "rotation" => "-20",
        "size" => "29",
      ],
    ],
  ],
  '40' => [
    'type' => '3435374751525556',
    'zones' => [
      $this->symbols["LADYBUG"] => [
        "left" => "47",
        "top" => "61",
        "rotation" => "-45",
        "size" => "27",
      ],
      $this->symbols["LIGHTNING"] => [
        "left" => "30",
        "top" => "24",
        "rotation" => "5",
        "size" => "45",
      ],
      $this->symbols["MAPPLE"] => [
        "left" => "18",
        "top" => "62",
        "rotation" => "0",
        "size" => "25",
      ],
      $this->symbols["STAIN"] => [
        "left" => "13",
        "top" => "17",
        "rotation" => "185",
        "size" => "30",
      ],
      $this->symbols["TREBLE_KEY"] => [
        "left" => "59",
        "top" => "38",
        "rotation" => "-90",
        "size" => "37",
      ],
      $this->symbols["TREE"] => [
        "left" => "39",
        "top" => "6",
        "rotation" => "180",
        "size" => "17",
      ],
      $this->symbols["YIN_YANG"] => [
        "left" => "6",
        "top" => "41",
        "rotation" => "5",
        "size" => "24",
      ],
      $this->symbols["ZEBRA"] => [
        "left" => "56",
        "top" => "12",
        "rotation" => "216",
        "size" => "34",
      ],
    ],
  ],
  '41' => [
    'type' => '0010121327323754',
    'zones' => [
      $this->symbols["ANCHOR"] => [
        "left" => "69",
        "top" => "62",
        "rotation" => "-42",
        "size" => "19",
      ],
      $this->symbols["CARROT"] => [
        "left" => "30",
        "top" => "30",
        "rotation" => "150",
        "size" => "42",
      ],
      $this->symbols["CHEESE"] => [
        "left" => "6",
        "top" => "29",
        "rotation" => "20",
        "size" => "34",
      ],
      $this->symbols["CLOCK"] => [
        "left" => "64",
        "top" => "30",
        "rotation" => "-135",
        "size" => "30",
      ],
      $this->symbols["HAMMER"] => [
        "left" => "14",
        "top" => "59",
        "rotation" => "-45",
        "size" => "32",
      ],
      $this->symbols["JUMPER"] => [
        "left" => "32",
        "top" => "9",
        "rotation" => "180",
        "size" => "24",
      ],
      $this->symbols["MAPPLE"] => [
        "left" => "48",
        "top" => "72",
        "rotation" => "-45",
        "size" => "20",
      ],
      $this->symbols["WEB"] => [
        "left" => "55",
        "top" => "9",
        "rotation" => "5",
        "size" => "23",
      ],
    ],
  ],
  '42' => [
    'type' => '0102142024252755',
    'zones' => [
      $this->symbols["APPLE"] => [
        "left" => "62",
        "top" => "17",
        "rotation" => "215",
        "size" => "25",
      ],
      $this->symbols["BABY_BOTTLE"] => [
        "left" => "65",
        "top" => "32",
        "rotation" => "215",
        "size" => "32",
      ],
      $this->symbols["CLOVER"] => [
        "left" => "5",
        "top" => "43",
        "rotation" => "90",
        "size" => "24",
      ],
      $this->symbols["DRAGON"] => [
        "left" => "56",
        "top" => "61",
        "rotation" => "-40",
        "size" => "26",
      ],
      $this->symbols["FLOWER"] => [
        "left" => "11",
        "top" => "21",
        "rotation" => "0",
        "size" => "21",
      ],
      $this->symbols["FORBIDDEN"] => [
        "left" => "32",
        "top" => "7",
        "rotation" => "222",
        "size" => "31",
      ],
      $this->symbols["HAMMER"] => [
        "left" => "19",
        "top" => "65",
        "rotation" => "85",
        "size" => "35",
      ],
      $this->symbols["YIN_YANG"] => [
        "left" => "29",
        "top" => "40",
        "rotation" => "-10",
        "size" => "32",
      ],
    ],
  ],
  '43' => [
    'type' => '0810333845485355',
    'zones' => [
      $this->symbols["CANDLE"] => [
        "left" => "64",
        "top" => "40",
        "rotation" => "-95",
        "size" => "29",
      ],
      $this->symbols["CARROT"] => [
        "left" => "11",
        "top" => "53",
        "rotation" => "100",
        "size" => "39",
      ],
      $this->symbols["KEY"] => [
        "left" => "33",
        "top" => "-4",
        "rotation" => "225",
        "size" => "33",
      ],
      $this->symbols["MOON"] => [
        "left" => "6",
        "top" => "27",
        "rotation" => "100",
        "size" => "52",
      ],
      $this->symbols["SNOWMAN"] => [
        "left" => "15",
        "top" => "12",
        "rotation" => "135",
        "size" => "28",
      ],
      $this->symbols["SUN"] => [
        "left" => "54",
        "top" => "16",
        "rotation" => "222",
        "size" => "28",
      ],
      $this->symbols["TURTLE"] => [
        "left" => "66",
        "top" => "58",
        "rotation" => "-45",
        "size" => "26",
      ],
      $this->symbols["YIN_YANG"] => [
        "left" => "47",
        "top" => "71",
        "rotation" => "-93",
        "size" => "23",
      ],
    ],
  ],
  '44' => [
    'type' => '0710141623404656',
    'zones' => [
      $this->symbols["CAMPFIRE"] => [
        "left" => "34",
        "top" => "31",
        "rotation" => "0",
        "size" => "31",
      ],
      $this->symbols["CARROT"] => [
        "left" => "14",
        "top" => "62",
        "rotation" => "100",
        "size" => "38",
      ],
      $this->symbols["CLOVER"] => [
        "left" => "15",
        "top" => "13",
        "rotation" => "100",
        "size" => "21",
      ],
      $this->symbols["DINOSAUR"] => [
        "left" => "47",
        "top" => "49",
        "rotation" => "-55",
        "size" => "37",
      ],
      $this->symbols["EYE"] => [
        "left" => "34",
        "top" => "1",
        "rotation" => "180",
        "size" => "27",
      ],
      $this->symbols["PADLOCK"] => [
        "left" => "65",
        "top" => "30",
        "rotation" => "270",
        "size" => "34",
      ],
      $this->symbols["SPIDER"] => [
        "left" => "7",
        "top" => "34",
        "rotation" => "135",
        "size" => "33",
      ],
      $this->symbols["ZEBRA"] => [
        "left" => "58",
        "top" => "9",
        "rotation" => "-135",
        "size" => "26",
      ],
    ],
  ],
  '45' => [
    'type' => '0514193135383954',
    'zones' => [
      $this->symbols["BULB"] => [
        "left" => "51",
        "top" => "66",
        "rotation" => "42",
        "size" => "25",
      ],
      $this->symbols["CLOVER"] => [
        "left" => "39",
        "top" => "49",
        "rotation" => "45",
        "size" => "21",
      ],
      $this->symbols["DOLPHIN"] => [
        "left" => "18",
        "top" => "13",
        "rotation" => "45",
        "size" => "19",
      ],
      $this->symbols["INTERROGATION"] => [
        "left" => "31",
        "top" => "5",
        "rotation" => "180",
        "size" => "43",
      ],
      $this->symbols["LIGHTNING"] => [
        "left" => "20",
        "top" => "60",
        "rotation" => "0",
        "size" => "29",
      ],
      $this->symbols["MOON"] => [
        "left" => "5",
        "top" => "28",
        "rotation" => "90",
        "size" => "36",
      ],
      $this->symbols["MOUTH"] => [
        "left" => "60",
        "top" => "44",
        "rotation" => "-90",
        "size" => "35",
      ],
      $this->symbols["WEB"] => [
        "left" => "68",
        "top" => "21",
        "rotation" => "5",
        "size" => "20",
      ],
    ],
  ],
  '46' => [
    'type' => '0122303738424446',
    'zones' => [
      $this->symbols["APPLE"] => [
        "left" => "68",
        "top" => "14",
        "rotation" => "220",
        "size" => "18",
      ],
      $this->symbols["EXCLAMATION"] => [
        "left" => "47",
        "top" => "13",
        "rotation" => "180",
        "size" => "21",
      ],
      $this->symbols["IGLOO"] => [
        "left" => "56",
        "top" => "60",
        "rotation" => "-47",
        "size" => "30",
      ],
      $this->symbols["MAPPLE"] => [
        "left" => "40",
        "top" => "35",
        "rotation" => "-45",
        "size" => "33",
      ],
      $this->symbols["MOON"] => [
        "left" => "25",
        "top" => "64",
        "rotation" => "40",
        "size" => "28",
      ],
      $this->symbols["SCISSORS"] => [
        "left" => "6",
        "top" => "29",
        "rotation" => "80",
        "size" => "37",
      ],
      $this->symbols["SNOWFLAKE"] => [
        "left" => "75",
        "top" => "39",
        "rotation" => "5",
        "size" => "21",
      ],
      $this->symbols["SPIDER"] => [
        "left" => "20",
        "top" => "6",
        "rotation" => "135",
        "size" => "28",
      ],
    ],
  ],
  '47' => [
    'type' => '0419273641464851',
    'zones' => [
      $this->symbols["BOMB"] => [
        "left" => "36",
        "top" => "67",
        "rotation" => "-95",
        "size" => "32",
      ],
      $this->symbols["DOLPHIN"] => [
        "left" => "1",
        "top" => "31",
        "rotation" => "0",
        "size" => "42",
      ],
      $this->symbols["HAMMER"] => [
        "left" => "40",
        "top" => "38",
        "rotation" => "-90",
        "size" => "28",
      ],
      $this->symbols["MAN"] => [
        "left" => "30",
        "top" => "15",
        "rotation" => "135",
        "size" => "28",
      ],
      $this->symbols["PENCIL"] => [
        "left" => "52",
        "top" => "9",
        "rotation" => "-90",
        "size" => "21",
      ],
      $this->symbols["SPIDER"] => [
        "left" => "37",
        "top" => "60",
        "rotation" => "42",
        "size" => "14",
      ],
      $this->symbols["SUN"] => [
        "left" => "59",
        "top" => "19",
        "rotation" => "-145",
        "size" => "32",
      ],
      $this->symbols["TREBLE_KEY"] => [
        "left" => "53",
        "top" => "43",
        "rotation" => "-90",
        "size" => "40",
      ],
    ],
  ],
  '48' => [
    'type' => '1315192940424355',
    'zones' => [
      $this->symbols["CLOCK"] => [
        "left" => "69",
        "top" => "39",
        "rotation" => "220",
        "size" => "26",
      ],
      $this->symbols["CLOWN"] => [
        "left" => "23",
        "top" => "5",
        "rotation" => "180",
        "size" => "35",
      ],
      $this->symbols["DOLPHIN"] => [
        "left" => "12",
        "top" => "56",
        "rotation" => "-47",
        "size" => "30",
      ],
      $this->symbols["ICECUBE"] => [
        "left" => "41",
        "top" => "70",
        "rotation" => "-45",
        "size" => "24",
      ],
      $this->symbols["PADLOCK"] => [
        "left" => "55",
        "top" => "11",
        "rotation" => "-135",
        "size" => "27",
      ],
      $this->symbols["SCISSORS"] => [
        "left" => "3",
        "top" => "30",
        "rotation" => "80",
        "size" => "30",
      ],
      $this->symbols["SKULL"] => [
        "left" => "30",
        "top" => "36",
        "rotation" => "-215",
        "size" => "37",
      ],
      $this->symbols["YIN_YANG"] => [
        "left" => "64",
        "top" => "64",
        "rotation" => "266",
        "size" => "18",
      ],
    ],
  ],
  '49' => [
    'type' => '0210113436394250',
    'zones' => [
      $this->symbols["BABY_BOTTLE"] => [
        "left" => "59",
        "top" => "28",
        "rotation" => "-150",
        "size" => "37",
      ],
      $this->symbols["CARROT"] => [
        "left" => "27",
        "top" => "69",
        "rotation" => "55",
        "size" => "27",
      ],
      $this->symbols["CAT"] => [
        "left" => "23",
        "top" => "5",
        "rotation" => "135",
        "size" => "34",
      ],
      $this->symbols["LADYBUG"] => [
        "left" => "47",
        "top" => "53",
        "rotation" => "-45",
        "size" => "33",
      ],
      $this->symbols["MAN"] => [
        "left" => "5",
        "top" => "29",
        "rotation" => "90",
        "size" => "28",
      ],
      $this->symbols["MOUTH"] => [
        "left" => "57",
        "top" => "12",
        "rotation" => "222",
        "size" => "23",
      ],
      $this->symbols["SCISSORS"] => [
        "left" => "8",
        "top" => "51",
        "rotation" => "30",
        "size" => "34",
      ],
      $this->symbols["TARGET"] => [
        "left" => "38",
        "top" => "35",
        "rotation" => "0",
        "size" => "19",
      ],
    ],
  ],
  '50' => [
    'type' => '0008141736434447',
    'zones' => [
      $this->symbols["ANCHOR"] => [
        "left" => "64",
        "top" => "65",
        "rotation" => "-42",
        "size" => "20",
      ],
      $this->symbols["CANDLE"] => [
        "left" => "70",
        "top" => "35",
        "rotation" => "180",
        "size" => "34",
      ],
      $this->symbols["CLOVER"] => [
        "left" => "34",
        "top" => "61",
        "rotation" => "10",
        "size" => "29",
      ],
      $this->symbols["DOBBLE"] => [
        "left" => "50",
        "top" => "6",
        "rotation" => "130",
        "size" => "27",
      ],
      $this->symbols["MAN"] => [
        "left" => "13",
        "top" => "67",
        "rotation" => "45",
        "size" => "21",
      ],
      $this->symbols["SKULL"] => [
        "left" => "5",
        "top" => "33",
        "rotation" => "-90",
        "size" => "34",
      ],
      $this->symbols["SNOWFLAKE"] => [
        "left" => "43",
        "top" => "32",
        "rotation" => "5",
        "size" => "32",
      ],
      $this->symbols["STAIN"] => [
        "left" => "20",
        "top" => "13",
        "rotation" => "150",
        "size" => "24",
      ],
    ],
  ],
  '51' => [
    'type' => '1112162038434951',
    'zones' => [
      $this->symbols["CAT"] => [
        "left" => "25",
        "top" => "28",
        "rotation" => "87",
        "size" => "42",
      ],
      $this->symbols["CHEESE"] => [
        "left" => "7",
        "top" => "13",
        "rotation" => "-10",
        "size" => "32",
      ],
      $this->symbols["DINOSAUR"] => [
        "left" => "68",
        "top" => "36",
        "rotation" => "-90",
        "size" => "29",
      ],
      $this->symbols["DRAGON"] => [
        "left" => "57",
        "top" => "62",
        "rotation" => "-30",
        "size" => "25",
      ],
      $this->symbols["MOON"] => [
        "left" => "34",
        "top" => "66",
        "rotation" => "0",
        "size" => "27",
      ],
      $this->symbols["SKULL"] => [
        "left" => "10",
        "top" => "56",
        "rotation" => "45",
        "size" => "26",
      ],
      $this->symbols["SUNGLASSES"] => [
        "left" => "40",
        "top" => "8",
        "rotation" => "213",
        "size" => "30",
      ],
      $this->symbols["TREBLE_KEY"] => [
        "left" => "60",
        "top" => "18",
        "rotation" => "-145",
        "size" => "32",
      ],
    ],
  ],
  '52' => [
    'type' => '0511132428464753',
    'zones' => [
      $this->symbols["BULB"] => [
        "left" => "66",
        "top" => "39",
        "rotation" => "-90",
        "size" => "28",
      ],
      $this->symbols["CAT"] => [
        "left" => "9",
        "top" => "52",
        "rotation" => "45",
        "size" => "26",
      ],
      $this->symbols["CLOCK"] => [
        "left" => "56",
        "top" => "14",
        "rotation" => "180",
        "size" => "27",
      ],
      $this->symbols["FLOWER"] => [
        "left" => "31",
        "top" => "31",
        "rotation" => "185",
        "size" => "28",
      ],
      $this->symbols["HEART"] => [
        "left" => "31",
        "top" => "7",
        "rotation" => "180",
        "size" => "22",
      ],
      $this->symbols["SPIDER"] => [
        "left" => "34",
        "top" => "59",
        "rotation" => "0",
        "size" => "29",
      ],
      $this->symbols["STAIN"] => [
        "left" => "6",
        "top" => "26",
        "rotation" => "120",
        "size" => "26",
      ],
      $this->symbols["TURTLE"] => [
        "left" => "61",
        "top" => "57",
        "rotation" => "-40",
        "size" => "30",
      ],
    ],
  ],
  '53' => [
    'type' => '0207091219304547',
    'zones' => [
      $this->symbols["BABY_BOTTLE"] => [
        "left" => "61",
        "top" => "10",
        "rotation" => "180",
        "size" => "27",
      ],
      $this->symbols["CAMPFIRE"] => [
        "left" => "63",
        "top" => "70",
        "rotation" => "-45",
        "size" => "20",
      ],
      $this->symbols["CAR"] => [
        "left" => "36",
        "top" => "3",
        "rotation" => "180",
        "size" => "26",
      ],
      $this->symbols["CHEESE"] => [
        "left" => "5",
        "top" => "28",
        "rotation" => "310",
        "size" => "29",
      ],
      $this->symbols["DOLPHIN"] => [
        "left" => "33",
        "top" => "56",
        "rotation" => "-90",
        "size" => "38",
      ],
      $this->symbols["IGLOO"] => [
        "left" => "65",
        "top" => "36",
        "rotation" => "270",
        "size" => "30",
      ],
      $this->symbols["SNOWMAN"] => [
        "left" => "31",
        "top" => "22",
        "rotation" => "110",
        "size" => "41",
      ],
      $this->symbols["STAIN"] => [
        "left" => "11",
        "top" => "55",
        "rotation" => "60",
        "size" => "27",
      ],
    ],
  ],
  '54' => [
    'type' => '0304081223243542',
    'zones' => [
      $this->symbols["BIRD"] => [
        "left" => "38",
        "top" => "7",
        "rotation" => "220",
        "size" => "27",
      ],
      $this->symbols["BOMB"] => [
        "left" => "65",
        "top" => "29",
        "rotation" => "220",
        "size" => "35",
      ],
      $this->symbols["CANDLE"] => [
        "left" => "59",
        "top" => "13",
        "rotation" => "207",
        "size" => "27",
      ],
      $this->symbols["CHEESE"] => [
        "left" => "29",
        "top" => "31",
        "rotation" => "270",
        "size" => "37",
      ],
      $this->symbols["EYE"] => [
        "left" => "13",
        "top" => "16",
        "rotation" => "130",
        "size" => "27",
      ],
      $this->symbols["FLOWER"] => [
        "left" => "7",
        "top" => "47",
        "rotation" => "222",
        "size" => "27",
      ],
      $this->symbols["LIGHTNING"] => [
        "left" => "48",
        "top" => "60",
        "rotation" => "-40",
        "size" => "33",
      ],
      $this->symbols["SCISSORS"] => [
        "left" => "26",
        "top" => "66",
        "rotation" => "-5",
        "size" => "29",
      ],
    ],
  ],

);
