<?php

/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * Dobble implementation : © <Your name here> <Your email address here>
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


/*

Example:

$this->card_types = array(
    1 => array( "card_name" => ...,
                ...
              )
);


*/
$this->symbols = [
  "ANCHOR" => "00",
  "APPLE" => "01",
  "BABY_BOTTLE" => "02",
  "BIRD" => "03",
  "BOMB" => "04",
  "BULB" => "05",
  "CACTUS" => "06",
  "CAMPFIRE" => "07",
  "CANDLE" => "08",
  "CAR" => "09",
  "CARROT" => "10",
  "CAT" => "11",
  "CHEESE" => "12",
  "CLOCK" => "13",
  "CLOVER" => "14",
  "CLOWN" => "15",
  "DINOSAUR" => "16",
  "DOBBLE" => "17",
  "DOG" => "18",
  "DOLPHIN" => "19",
  "DRAGON" => "20",
  "DROP" => "21",
  "EXCLAMATION" => "22",
  "EYE" => "23",
  "FLOWER" => "24",
  "FORBIDDEN" => "25",
  "GHOST" => "26",
  "HAMMER" => "27",
  "HEART" => "28",
  "ICECUBE" => "29",
  "IGLOO" => "30",
  "INTERROGATION" => "31",
  "JUMPER" => "32",
  "KEY" => "33",
  "LADYBUG" => "34",
  "LIGHTNING" => "35",
  "MAN" => "36",
  "MAPPLE" => "37",
  "MOON" => "38",
  "MOUTH" => "39",
  "PADLOCK" => "40",
  "PENCIL" => "41",
  "SCISSORS" => "42",
  "SKULL" => "43",
  "SNOWFLAKE" => "44",
  "SNOWMAN" => "45",
  "SPIDER" => "46",
  "STAIN" => "47",
  "SUN" => "48",
  "SUNGLASSES" => "49",
  "TARGET" => "50",
  "TREBLE_KEY" => "51",
  "TREE" => "52",
  "TURTLE" => "53",
  "WEB" => "54",
  "YIN_YANG" => "55",
  "ZEBRA" => "56",
];

$this->cards_description = array(
  '00' => ['type' => '0011212330314155',],
  '01' => ['type' => '0410152022263147',],
  '02' => ['type' => '1214222941505253',],
  '03' => ['type' => '0715172432343841',],
  '04' => ['type' => '0015253545464950',],
  '05' => ['type' => '1719202328333750',],
  '06' => ['type' => '0917273142495356',],
  '07' => ['type' => '0307222836495455',],
  '08' => ['type' => '0106091028354143',],
  '09' => ['type' => '0309111415183748',],
  '10' => ['type' => '0306212738404750',],
  '11' => ['type' => '0612171826394655',],
  '12' => ['type' => '1018192124444952',],
  '13' => ['type' => '1421262832424551',],
  '14' => ['type' => '0913232526363852',],
  '15' => ['type' => '0203313233434652',],
  '16' => ['type' => '0608111922253256',],
  '17' => ['type' => '1618253341424754',],
  '18' => ['type' => '0105121521333656',],
  '19' => ['type' => '2426304348505456',],
  '20' => ['type' => '0104111740455254',],
  '21' => ['type' => '0123293239474849',],
  '22' => ['type' => '1225283134404448',],
  '23' => ['type' => '0009222433394051',],
  '24' => ['type' => '0313203941444556',],
  '25' => ['type' => '0206152344515354',],
  '26' => ['type' => '0107081318315051',],
  '27' => ['type' => '0213161721223548',],
  '28' => ['type' => '0205082637404149',],
  '29' => ['type' => '0815162728303952',],
  '30' => ['type' => '0405091632445055',],
  '31' => ['type' => '0305101725293051',],
  '32' => ['type' => '0406131430333449',],
  '33' => ['type' => '0002041828293856',],
  '34' => ['type' => '0809202129344654',],
  '35' => ['type' => '0001031619263453',],
  '36' => ['type' => '0005060720424852',],
  '37' => ['type' => '1820303235364053',],
  '38' => ['type' => '0407212537394353',],
  '39' => ['type' => '0711262729333544',],
  '40' => ['type' => '3435374751525556',],
  '41' => ['type' => '0010121327323754',],
  '42' => ['type' => '0102142024252755',],
  '43' => ['type' => '0810333845485355',],
  '44' => ['type' => '0710141623404656',],
  '45' => ['type' => '0514193135383954',],
  '46' => ['type' => '0122303738424446',],
  '47' => ['type' => '0419273641464851',],
  '48' => ['type' => '1315192940424355',],
  '49' => ['type' => '0210113436394250',],
  '50' => ['type' => '0008141736434447',],
  '51' => ['type' => '1112162038434951',],
  '52' => ['type' => '0511132428464753',],
  '53' => ['type' => '0207091219304547',],
  '54' => ['type' => '0304081223243542',],

);
