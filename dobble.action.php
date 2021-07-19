<?php

/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * Dobble implementation : © Séverine Kamycki severinek@gmail.com
 *
 * This code has been produced on the BGA studio platform for use on https://boardgamearena.com.
 * See http://en.doc.boardgamearena.com/Studio for more information.
 * -----
 * 
 * dobble.action.php
 *
 * Dobble main action entry point
 *
 *
 * In this file, you are describing all the methods that can be called from your
 * user interface logic (javascript).
 *       
 * If you define a method "myAction" here, then you can call it from your javascript code with:
 * this.ajaxcall( "/dobble/dobble/myAction.html", ...)
 *
 */


class action_dobble extends APP_GameAction
{
  // Constructor: please do not modify
  public function __default()
  {
    if (self::isArg('notifwindow')) {
      $this->view = "common_notifwindow";
      $this->viewArgs['table'] = self::getArg("table", AT_posint, true);
    } else {
      $this->view = "dobble_dobble";
      self::trace("Complete reinitialization of board game");
    }
  }

  // TODO: defines your action entry points there



  public function chooseSymbol()
  {
    self::setAjaxMode();

    // Retrieve arguments
    // Note: these arguments correspond to what has been sent through the javascript "ajaxcall" method
    $symbol = self::getArg("symbol", AT_alphanum, true);
    $cardId = self::getArg("cardId", AT_alphanum, true);

    // Then, call the appropriate method in your game logic, like "playCard" or "myAction"
    $this->game->chooseSymbol($symbol,$cardId);

    self::ajaxResponse();
  }

  public function chooseSymbolWithPlayer()
  {
    self::setAjaxMode();

    // Retrieve arguments
    // Note: these arguments correspond to what has been sent through the javascript "ajaxcall" method
    $symbol = self::getArg("symbol", AT_alphanum, true);
    $player_id = self::getArg("player_id", AT_posint, true);
    $opponentCardId = self::getArg("opponentCardId", AT_alphanum, true);
    $patternCardId = self::getArg("patternCardId", AT_alphanum, true);
    
    // Then, call the appropriate method in your game logic, like "playCard" or "myAction"
    $this->game->chooseSymbolWithPlayer($symbol, $player_id,$opponentCardId,$patternCardId);

    self::ajaxResponse();
  }

  public function chooseSymbolWithTriplet()
  {
    self::setAjaxMode();

    $symbol = self::getArg("symbol", AT_alphanum, true);
    $card1 = self::getArg("card1", AT_posint, true);
    $card2 = self::getArg("card2", AT_posint, true);
    $card3 = self::getArg("card3", AT_posint, true);
    $this->game->chooseSymbolWithTriplet($symbol, $card1, $card2, $card3);

    self::ajaxResponse();
  }

  public function ready()
  {
    self::setAjaxMode();

    $this->game->ready();

    self::ajaxResponse();
  }
}
