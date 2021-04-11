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
if(!defined("ANCHOR")){
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
