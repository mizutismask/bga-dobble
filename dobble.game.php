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
 * dobble.game.php
 *
 * This is the main file for your game logic.
 *
 * In this PHP file, you are going to defines the rules of the game.
 *
 */


require_once(APP_GAMEMODULE_PATH . 'module/table/table.game.php');
require_once("modules/php/constants.inc.php");

if (!defined('DECK_LOC_DECK')) {


    // constants for deck locations
    define("DECK_LOC_DECK", "deck");
    define("DECK_LOC_HAND", "hand");
    //define("DECK_LOC_TOP_HAND", "topHand");
    define("DECK_LOC_WON", "won");
    define("DECK_LOC_DISCARD", "discard");

    // constants for notifications
    define("NOTIF_CARDS_MOVE", "cardsMove");
    define("NOTIF_PLAYER_TURN", "playerTurn");
    define("NOTIF_UPDATE_SCORE", "updateScore");
    define("NOTIF_HAND_CHANGE", "handChange");

    // constants for game states
    define("TRANSITION_PLAYER_TURN", "playerTurn");
}

class Dobble extends Table
{
    function __construct()
    {
        // Your global variables labels:
        //  Here, you can assign labels to global variables you are using for this game.
        //  You can use any number of global variables with IDs between 10 and 99.
        //  If your game has options (variants), you also have to associate here a label to
        //  the corresponding ID in gameoptions.inc.php.
        // Note: afterwards, you can get/set the global variables with getGameStateValue/setGameStateInitialValue/setGameStateValue
        parent::__construct();

        self::initGameStateLabels(array(
            //    "my_first_global_variable" => 10,
            //    "my_second_global_variable" => 11,
            //      ...
            //    "my_first_game_variant" => 100,
            //    "my_second_game_variant" => 101,
            //      ...
            "type_of_rules" => TYPE_OF_RULES,
            "towering_inferno" => TOWERING_INFERNO,
            "well" => WELL,
            "hot_potato" => HOT_POTATO,
            "poisoned_gift" => POISONED_GIFT,
            "triplet" => TRIPLET,
        ));

        $this->deck = self::getNew("module.common.deck");
        $this->deck->init("deck");
    }

    protected function getGameName()
    {
        // Used for translations and stuff. Please do not modify.
        return "dobble";
    }

    /*
        setupNewGame:
        
        This method is called only once, when a new game is launched.
        In this method, you must setup the game according to the game rules, so that
        the game is ready to be played.
    */
    protected function setupNewGame($players, $options = array())
    {
        $this->setColorsBasedOnPreferences($players);

        /************ Start the game initialization *****/

        // Init global values with their initial values
        //self::setGameStateInitialValue( 'my_first_global_variable', 0 );

        // Init game statistics
        // (note: statistics used in this file must be defined in your stats.inc.php file)
        //self::initStat( 'table', 'table_teststat1', 0 );    // Init a table statistics
        //self::initStat( 'player', 'player_teststat1', 0 );  // Init a player statistics (for all players)

        // setup the deck and deal card
        $cards = array();
        foreach ($this->cards_description as $name => $card) {
            $cards[] = array('type' => $name, 'type_arg' => $card["type"], 'nbr' => 1);
        }
        $this->deck->createCards($cards, DECK_LOC_DECK);
        $this->deck->shuffle(DECK_LOC_DECK);
        $this->dealCards();


        /************ End of the game initialization *****/
    }

    /*
        getAllDatas: 
        
        Gather all informations about current game situation (visible by the current player).
        
        The method is called each time the game interface is displayed to a player, ie:
        _ when the game starts
        _ when a player refreshes the game page (F5)
    */
    protected function getAllDatas()
    {
        $result = array();

        $current_player_id = self::getCurrentPlayerId();    // !! We must only return informations visible by this player !!

        // Get information about players
        // Note: you can retrieve some extra field you added for "player" table in "dbmodel.sql" if you need it.
        $sql = "SELECT player_id id, player_score score FROM player ";
        $result['players'] = self::getCollectionFromDb($sql);
        $result['hand'] = [$this->getMyCard($current_player_id)];
        $result['pattern'] = $this->getPatternCards();
        $result['minigame'] = $this->getMiniGame();

        // TODO: Gather all information about current game situation (visible by player $current_player_id).

        return $result;
    }

    /*
        getGameProgression:
        
        Compute and return the current game progression.
        The number returned must be an integer beween 0 (=the game just started) and
        100 (= the game is finished or almost finished).
    
        This method is called each time we are in a game state with the "updateGameProgression" property set to true 
        (see states.inc.php)
    */
    function getGameProgression()
    {
        $players = self::loadPlayersBasicInfos();
        switch ($this->getMiniGame()) {

            case TRIPLET:

                break;
            case WELL:
                $cardsNbAtTheBeginning = floor((count($this->cards_description) - 1) / count($players));
                $remaining = min($this->deck->countCardsByLocationArgs(DECK_LOC_HAND));
                $done = $cardsNbAtTheBeginning - $remaining;
                return $done *  100 / $cardsNbAtTheBeginning;
                break;
            case HOT_POTATO:

                break;
            case POISONED_GIFT:

                break;
            case TOWERING_INFERNO:
                $remaining  = $this->deck->countCardInLocation(DECK_LOC_DECK);
                $total = count($this->cards_description) - count($players);
                $done = $total - $remaining;
                return $done *  100 / $total;
        }

        return 0;
    }


    //////////////////////////////////////////////////////////////////////////////
    //////////// Utility functions
    ////////////    

    function setColorsBasedOnPreferences($players)
    {
        // Set the colors of the players with HTML color code
        // The default below is red/green/blue/orange/brown
        // The number of colors defined here must correspond to the maximum number of players allowed for the gams
        $gameinfos = self::getGameinfos();
        $default_colors = $gameinfos['player_colors'];

        // Create players
        // Note: if you added some extra field on "player" table in the database (dbmodel.sql), you can initialize it there.
        $sql = "INSERT INTO player (player_id, player_color, player_canal, player_name, player_avatar) VALUES ";
        $values = array();
        foreach ($players as $player_id => $player) {
            $color = array_shift($default_colors);
            $values[] = "('" . $player_id . "','$color','" . $player['player_canal'] . "','" . addslashes($player['player_name']) . "','" . addslashes($player['player_avatar']) . "')";
        }
        $sql .= implode($values, ',');
        self::DbQuery($sql);
        self::reattributeColorsBasedOnPreferences($players, $gameinfos['player_colors']);
        self::reloadPlayersBasicInfos();
    }

    function dealCards()
    {
        $players = self::loadPlayersBasicInfos();

        switch ($this->getMiniGame()) {

            case TRIPLET:

                break;
            case WELL:
                $number = floor((count($this->cards_description) - 1) / count($players));
                $this->dealCardsToAllPlayers($players, $number);
                $this->discardRemainingCards();
                break;
            case HOT_POTATO:

                break;
            case POISONED_GIFT:

                break;
            case TOWERING_INFERNO:
                $this->dealCardsToAllPlayers($players, 1);
                $this->pickPatternAndNotifyPlayers();
                break;
            default:
        }
    }
    function dealCardsToAllPlayers($players, $number)
    {
        foreach ($players as $player_id => $player) {
            $this->pickCardsAndNotifyPlayer($number, $player_id);
        }
    }

    function pickCardsAndNotifyPlayer($nb, $player_id)
    {
        $cards = $this->deck->pickCards($nb, DECK_LOC_DECK, $player_id);
        // Notify player about his cards
        self::notifyPlayer($player_id, NOTIF_HAND_CHANGE, '', array('added' => $cards));
    }

    function pickPatternAndNotifyPlayers()
    {
        $card = $this->getPatternCards();
        self::notifyAllPlayers(NOTIF_CARDS_MOVE, '', array(
            'added' => [$card],

            //'player_id' => $player_id
        ));
    }

    function discardRemainingCards()
    {
        $remaining = $this->deck->getCardsInLocation(DECK_LOC_DECK);
        $toDiscardNb = count($remaining) - 1;
        if ($toDiscardNb > 0) {
            for ($i = 0; $i < $toDiscardNb; $i++) {
                $card = array_pop($remaining);
                $this->deck->playCard($card["id"]);
            }
        }
    }

    function getMiniGame()
    {
        return self::getGameStateValue('type_of_rules');
    }

    function enhanceCards($cards)
    {
        $enhanced = $cards;
        foreach ($enhanced as $cardId => &$card) { //by reference in order to add the symbols property
            $type = $this->cards_description[$card["type"]]["type"];

            $symbols = str_split($type, 2);
            self::dump("**************************symbols", $symbols);
            foreach ($symbols as $i => $s) {
                $name = array_search($s, $this->symbols);
                //self::dump("**************************name", $name);
                $card["symbols"][] = $name;
                //self::dump("**************************card", $card);
            }
        }
        self::dump("**************************cards", $enhanced);
        return $enhanced;
    }

    function isSymboleCommon($symbol, $template, $mine)
    {
        $templateSymbols = $this->cards_description[$template["type"]]["type"];
        $mySymbols = $this->cards_description[$mine["type"]]["type"];

        self::dump("**************************template", $template);
        self::dump("**************************mine", $mine);

        $templateSymbolsArr = str_split($templateSymbols, 2);
        $mySymbolsArr = str_split($mySymbols, 2);

        $intersection = array_values(array_intersect($templateSymbolsArr, $mySymbolsArr));
        self::dump("**************************intersection", $intersection[0]);
        self::dump("**************************guess", $symbol, $this->symbols[$symbol]);
        self::dump("**************************guess number", $this->symbols[$symbol]);
        return $intersection[0] === $this->symbols[$symbol];
    }

    function symbolFoundActions($player_id, $template, $myCard)
    {
        switch ($this->getMiniGame()) {

            case TRIPLET:

                break;
            case WELL:
                $this->deck->moveCard($myCard["id"], DECK_LOC_DECK);
                $this->deck->insertCardOnExtremePosition($myCard["id"], DECK_LOC_DECK, true);
                $this->incScore($player_id, 1);
                self::notifyAllPlayers(NOTIF_CARDS_MOVE, clienttranslate('${player_name} spotted the common symbol'), array(
                    'player_name' => $this->getPlayerName($player_id),
                    'cards' => [$myCard],
                    'from' => $player_id,
                    'to' => 'pattern',
                    'newHand' => $this->getMyCard($player_id),
                ));
                break;
            case HOT_POTATO:

                break;
            case POISONED_GIFT:

                break;
            case TOWERING_INFERNO:
                $this->deck->moveAllCardsInLocation(DECK_LOC_HAND, DECK_LOC_WON, $player_id, $player_id);
                $this->deck->moveCard($template["id"], DECK_LOC_HAND, $player_id);
                $this->incScore($player_id, 1);
                self::notifyAllPlayers(NOTIF_CARDS_MOVE, clienttranslate('${player_name} spotted the common symbol'), array(
                    'player_name' => $this->getPlayerName($player_id),
                    'cards' => [$template],
                    'from' => 'pattern',
                    'to' => $player_id,
                ));
                break;
            default:
        }
    }

    function incScore($player_id, $incValue)
    {
        $sql = "UPDATE player set player_score=player_score+" . $incValue . " where player_id=" . $player_id;
        self::DbQuery($sql);
    }

    function getPatternCards()
    {
        switch ($this->getMiniGame()) {

            case TRIPLET:

                break;
            case WELL:
                return $this->enhanceCards([$this->deck->getCardOnTop(DECK_LOC_DECK)]);
                break;
            case HOT_POTATO:

                break;
            case POISONED_GIFT:

                break;
            case TOWERING_INFERNO:
                return $this->enhanceCards([$this->deck->getCardOnTop(DECK_LOC_DECK)]);
                break;
            default:
        }
    }

    function getPlayerName($player_id)
    {
        $sql = "select player_name from player where player_id=" . $player_id;
        return self::getUniqueValueFromDB($sql);
    }

    function giveExtraTimeToEveryone()
    {
        $players = self::loadPlayersBasicInfos();
        foreach ($players as $player) {
            self::giveExtraTime($player["player_id"]);
        }
    }

    function getMyCard($player_id)
    {
        $cards = $this->deck->getCardsInLocation(DECK_LOC_HAND, $player_id);
        return array_pop($cards);
    }
    //////////////////////////////////////////////////////////////////////////////
    //////////// Player actions
    //////////// 

    /*
        Each time a player is doing some game action, one of the methods below is called.
        (note: each method below must match an input method in dobble.action.php)
    */


    function chooseSymbol($symbol)
    {
        // Check that this is the player's turn and that it is a "possible action" at this game state (see states.inc.php)
        self::checkAction('playCard');

        $player_id = self::getCurrentPlayerId();
        switch ($this->getMiniGame()) {

            case TRIPLET:


                break;
            case HOT_POTATO:

                break;
            case POISONED_GIFT:

                break;
            case WELL:
            case TOWERING_INFERNO:
                $template = $this->getPatternCards()[0];
                $mine = $this->getMyCard($player_id);
                if ($this->isSymboleCommon($symbol, $template, $mine)) {
                    $this->symbolFoundActions($player_id, $template, $mine);

                    $this->gamestate->nextState(TRANSITION_NEXT_TURN);
                } else {
                    $this->gamestate->setPlayerNonMultiactive($player_id, TRANSITION_PLAYER_TURN); // deactivate player; if none left, reactivates everyone
                    self::notifyAllPlayers("msg", clienttranslate('${player_name} failed to spot the common symbol'), array(
                        'player_name' => $this->getPlayerName($player_id),
                    ));
                }
                break;
            default:
        }

        // Notify all players about the card played

    }



    //////////////////////////////////////////////////////////////////////////////
    //////////// Game state arguments
    ////////////

    /*
        Here, you can create methods defined as "game state arguments" (see "args" property in states.inc.php).
        These methods function is to return some additional information that is specific to the current
        game state.
    */

    /*
    
    Example for game state "MyGameState":
    
    function argMyGameState()
    {
        // Get some values from the current game situation in database...
    
        // return values:
        return array(
            'variable1' => $value1,
            'variable2' => $value2,
            ...
        );
    }    
    */
    public function argPlayerTurn()
    {

        $possibleSymbols = $this->getPatternCards();
        self::dump("**************************possibleSymbols", $possibleSymbols);
        return array(
            'possibleSymbols' => $possibleSymbols[0]["symbols"],
            'pattern' => $this->getPatternCards(),
        );
    }


    //////////////////////////////////////////////////////////////////////////////
    //////////// Game state actions
    ////////////

    /*
        Here, you can create methods defined as "game state actions" (see "action" property in states.inc.php).
        The action method of state X is called everytime the current game state is set to X.
    */



    function stNextTurn()
    {
        $this->giveExtraTimeToEveryone();
        switch ($this->getMiniGame()) {

            case TRIPLET:

                break;
            case WELL:

                $nbByPlayer = $this->deck->countCardsByLocationArgs(DECK_LOC_HAND);
                self::dump("**************************nbByPlayer", $nbByPlayer);
                $withCards = array_keys(array_filter($nbByPlayer, function ($nb) {
                    return $nb > 0;
                }));
                if (count($withCards) == 1) {
                    $this->gamestate->nextState(TRANSITION_END_GAME); //only one player with cards in hand
                } else {
                    $this->gamestate->nextState(TRANSITION_PLAYER_TURN);
                }
                break;
            case HOT_POTATO:

                break;
            case POISONED_GIFT:

                break;
            case TOWERING_INFERNO:
                if ($this->deck->countCardInLocation(DECK_LOC_DECK) == 0) {
                    $this->gamestate->nextState(TRANSITION_END_GAME); //no more cards in the pile
                } else {
                    $this->pickPatternAndNotifyPlayers();

                    $this->gamestate->nextState(TRANSITION_PLAYER_TURN);
                }
                break;
            default:
        }
    }

    // this will make all players multiactive just before entering the state
    function st_multiPlayerInit()
    {
        $this->gamestate->setAllPlayersMultiactive();
    }


    //////////////////////////////////////////////////////////////////////////////
    //////////// Zombie
    ////////////

    /*
        zombieTurn:
        
        This method is called each time it is the turn of a player who has quit the game (= "zombie" player).
        You can do whatever you want in order to make sure the turn of this player ends appropriately
        (ex: pass).
        
        Important: your zombie code will be called when the player leaves the game. This action is triggered
        from the main site and propagated to the gameserver from a server, not from a browser.
        As a consequence, there is no current player associated to this action. In your zombieTurn function,
        you must _never_ use getCurrentPlayerId() or getCurrentPlayerName(), otherwise it will fail with a "Not logged" error message. 
    */

    function zombieTurn($state, $active_player)
    {
        $statename = $state['name'];

        if ($state['type'] === "activeplayer") {
            switch ($statename) {
                default:
                    $this->gamestate->nextState("zombiePass");
                    break;
            }

            return;
        }

        if ($state['type'] === "multipleactiveplayer") {
            // Make sure player is in a non blocking status for role turn
            $this->gamestate->setPlayerNonMultiactive($active_player, '');

            return;
        }

        throw new feException("Zombie mode not supported at this game state: " . $statename);
    }

    ///////////////////////////////////////////////////////////////////////////////////:
    ////////// DB upgrade
    //////////

    /*
        upgradeTableDb:
        
        You don't have to care about this until your game has been published on BGA.
        Once your game is on BGA, this method is called everytime the system detects a game running with your old
        Database scheme.
        In this case, if you change your Database scheme, you just have to apply the needed changes in order to
        update the game database and allow the game to continue to run with your new version.
    
    */

    function upgradeTableDb($from_version)
    {
        // $from_version is the current version of this game database, in numerical form.
        // For example, if the game was running with a release of your game named "140430-1345",
        // $from_version is equal to 1404301345

        // Example:
        //        if( $from_version <= 1404301345 )
        //        {
        //            // ! important ! Use DBPREFIX_<table_name> for all tables
        //
        //            $sql = "ALTER TABLE DBPREFIX_xxxxxxx ....";
        //            self::applyDbUpgradeToAllDB( $sql );
        //        }
        //        if( $from_version <= 1405061421 )
        //        {
        //            // ! important ! Use DBPREFIX_<table_name> for all tables
        //
        //            $sql = "CREATE TABLE DBPREFIX_xxxxxxx ....";
        //            self::applyDbUpgradeToAllDB( $sql );
        //        }
        //        // Please add your future database scheme changes here
        //
        //


    }
}
