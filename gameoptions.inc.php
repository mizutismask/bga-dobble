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
 * gameoptions.inc.php
 *
 * Dobble game options description
 * 
 * In this file, you can define your game options (= game variants).
 *   
 * Note: If your game has no variant, you don't have to modify this file.
 *
 * Note²: All options defined in this file should have a corresponding "game state labels"
 *        with the same ID (see "initGameStateLabels" in dobble.game.php)
 *
 * !! It is not a good idea to modify this file when a game is running !!
 *
 */
require_once("modules/php/constants.inc.php");

$game_options = array(
    TYPE_OF_RULES => array(
        'name' => totranslate('Mini-games'),
        'values' => array(
            TOWERING_INFERNO => array('name' => totranslate('Towering inferno'), 'tmdisplay' => totranslate('Towering inferno'), 'description' => totranslate('Get the most cards')),
            WELL => array('name' => totranslate('Well'), 'tmdisplay' => totranslate('Well'), 'description' => totranslate('Be the first to get rid of all yours cards')),
            HOT_POTATO => array('name' => totranslate('Hot potato'), 'tmdisplay' => totranslate('Hot potato'), 'description' => totranslate('Get rid of your cards giving your entire deck to your opponents (several rounds)')),
            POISONED_GIFT => array('name' => totranslate('Poisoned gift'), 'tmdisplay' => totranslate('Poisoned gift'), 'description' => totranslate('Get rid of your cards giving them to your opponents')),
            TRIPLET => array('name' => totranslate('Triplet'), 'tmdisplay' => totranslate('Triplet'), 'description' => totranslate('Find the common symbol on 3 cards (several rounds)')),
            
        ),
        'default' => TOWERING_INFERNO
    ),
);


