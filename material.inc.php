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
  '00' => ['type' => '00212330314155',],
  '01' => ['type' => '04152022263147',],
  '02' => ['type' => '14222941505253',],
  '03' => ['type' => '07151724323438',],
  '04' => ['type' => '00152535464950',],
  '05' => ['type' => '17192028333750',],
  '06' => ['type' => '09172742495356',],
  '07' => ['type' => '03072228495455',],
  '08' => ['type' => '01060910283541',],
  '09' => ['type' => '03091415183748',],
  '10' => ['type' => '03062127384050',],
  '11' => ['type' => '06171826394655',],
  '12' => ['type' => '10181921444952',],
  '13' => ['type' => '14212628324251',],
  '14' => ['type' => '09132325263852',],
  '15' => ['type' => '02033233434652',],
  '16' => ['type' => '06081922253256',],
  '17' => ['type' => '16182533414254',],
  '18' => ['type' => '01051521333656',],
  '19' => ['type' => '26304348505456',],
  '20' => ['type' => '01041140455254',],
  '21' => ['type' => '01232932394849',],
  '22' => ['type' => '25283134404448',],
  '23' => ['type' => '00092433394051',],
  '24' => ['type' => '03203941444556',],
  '25' => ['type' => '02061544515354',],
  '26' => ['type' => '01081318315051',],
  '27' => ['type' => '02131617212248',],
  '28' => ['type' => '02050826404149',],
  '29' => ['type' => '08151628303952',],
  '30' => ['type' => '04050916324450',],
  '31' => ['type' => '03051725293051',],
  '32' => ['type' => '04061314303334',],
  '33' => ['type' => '00020418282956',],
  '34' => ['type' => '08092021293454',],
  '35' => ['type' => '00010316192634',],
  '36' => ['type' => '00050607204852',],
  '37' => ['type' => '18203032354053',],
  '38' => ['type' => '04072125373953',],
  '39' => ['type' => '07262729333544',],
  '40' => ['type' => '34353751525556',],
  '41' => ['type' => '00101213273754',],
  '42' => ['type' => '01021420242755',],
  '43' => ['type' => '08103845485355',],
  '44' => ['type' => '07101623404656',],
  '45' => ['type' => '05143135383954',],
  '46' => ['type' => '01223037384244',],
  '47' => ['type' => '04273641464851',],
  '48' => ['type' => '13151930404355',],
  '49' => ['type' => '02103436394250',],
  '50' => ['type' => '00081417364344',],
  '51' => ['type' => '11162038434951',],
  '52' => ['type' => '05111324464753',],
  '53' => ['type' => '02071219304547',],
  '54' => ['type' => '03040812243542',],
);
