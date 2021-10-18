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
            HOT_POTATO => array('name' => totranslate('Hot potato'), 'tmdisplay' => totranslate('Hot potato'), 'description' => totranslate('Get rid of your cards giving them all to your opponents (several rounds)')),
            POISONED_GIFT => array('name' => totranslate('Poisoned gift'), 'tmdisplay' => totranslate('Poisoned gift'), 'description' => totranslate('Empty the pile giving cards to your opponents')),
            TRIPLET => array('name' => totranslate('Triplet'), 'tmdisplay' => totranslate('Triplet'), 'description' => totranslate('Find the common symbol on 3 cards on 9 until there is not enough cards')),

        ),
        'default' => TOWERING_INFERNO
    ),

    ROUNDS_NUMBER => array(
        'name' => totranslate('Rounds number'),
        'values' => array(
            5 => array('name' => '5', 'tmdisplay' => '5', 'description' => ''),
            8 => array('name' => '8', 'tmdisplay' => '8', 'description' => ''),
            10 => array('name' => '10', 'tmdisplay' => '10', 'description' => ''),
            12 => array('name' => '12', 'tmdisplay' => '12', 'description' => ''),
            15 => array('name' => '15', 'tmdisplay' => '15', 'description' => ''),
        ),
        'displaycondition' => [
            [
                'type' => 'otheroption',
                'id' => TYPE_OF_RULES,
                'value' => HOT_POTATO,
            ],
        ],
    ),

    HIDE_SCORES=> array(
        'name' => totranslate('Hide scores'),
        'values' => array(
            ACTIVATED => array(
                'name' => totranslate('Yes'), 'tmdisplay' => totranslate('Hide scores'),
                'description' => totranslate('Scores and card numbers are hidden')
            ),
            DEACTIVATED => array('name' => totranslate('No')),
        ),
        'default' => DEACTIVATED,
    ),
);
