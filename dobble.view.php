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
 * dobble.view.php
 *
 * This is your "view" file.
 *
 * The method "build_page" below is called each time the game interface is displayed to a player, ie:
 * _ when the game starts
 * _ when a player refreshes the game page (F5)
 *
 * "build_page" method allows you to dynamically modify the HTML generated for the game interface. In
 * particular, you can set here the values of variables elements defined in dobble_dobble.tpl (elements
 * like {MY_VARIABLE_ELEMENT}), and insert HTML block elements (also defined in your HTML template file)
 *
 * Note: if the HTML of your game interface is always the same, you don't have to place anything here.
 *
 */

require_once(APP_BASE_PATH . "view/common/game.view.php");

class view_dobble_dobble extends game_view
{
  function getGameName()
  {
    return "dobble";
  }
  function build_page($viewArgs)
  {
    // Get players & players number
    $players = $this->game->loadPlayersBasicInfos();
    $players_nbr = count($players);
    $players_in_order = $this->game->getPlayersInOrder(false);
    $current_player_id = $this->game->publicGetCurrentPlayerId();
    $template = self::getGameName() . "_" . self::getGameName();
    $miniGame = $this->game->getMiniGame();

    /*********** Place your code below:  ************/
    $this->tpl['MY_HAND'] = self::_("My hand");
    $this->tpl['PLAYING_ZONE'] = self::_("Pile");

    /*
        
        // Examples: set the value of some element defined in your tpl file like this: {MY_VARIABLE_ELEMENT}

        // Display a specific number / string
        $this->tpl['MY_VARIABLE_ELEMENT'] = $number_to_display;

        // Display a string to be translated in all languages: 
        $this->tpl['MY_VARIABLE_ELEMENT'] = self::_("A string to be translated");

        // Display some HTML content of your own:
        $this->tpl['MY_VARIABLE_ELEMENT'] = self::raw( $some_html_code );
        
        */
    self::dump("*****************minigame ", $miniGame);

    //declare blocks
    $this->page->begin_block($template, "player");
    $this->page->begin_block($template, "pattern");
    $this->page->begin_block($template, "myHand");

    if ($miniGame == WELL || $miniGame == TOWERING_INFERNO || $miniGame == HOT_POTATO || $miniGame == POISONED_GIFT) {
      $this->page->insert_block("myHand", array(
        "PLAYER_ID" => $current_player_id,
        "PLAYER_COLOR" => $players[$current_player_id]['player_color'],
      ));
    }

    if ($miniGame == WELL || $miniGame == TOWERING_INFERNO || $miniGame == POISONED_GIFT || $miniGame == TRIPLET) {
      $this->page->insert_block("pattern", array());
    }

    if ($miniGame == POISONED_GIFT || $miniGame == HOT_POTATO) {

      foreach ($players_in_order  as $player_id) {
        if (key_exists($current_player_id, $players) && $current_player_id != $player_id) {
          $this->page->insert_block("player", array(
            "PLAYER_ID" => $player_id,
            "PLAYER_NAME" => $players[$player_id]['player_name'],
            "PLAYER_COLOR" => $players[$player_id]['player_color'],
            "PLAYER_NAME" => $players[$player_id]['player_name'],
          ));
        }
      }
    }

    /*********** Do not change anything below this line  ************/
  }
}
