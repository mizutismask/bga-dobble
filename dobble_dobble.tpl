{OVERALL_GAME_HEADER}

<!-- 
--------
-- BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
-- Dobble implementation : © <Your name here> <Your email address here>
-- 
-- This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
-- See http://en.boardgamearena.com/#!doc/Studio for more information.
-------

    dobble_dobble.tpl
    
    This is the HTML template of your game.
    
    Everything you are writing in this file will be displayed in the HTML page of your game user interface,
    in the "main game zone" of the screen.
    
    You can use in this template:
    _ variables, with the format {MY_VARIABLE_ELEMENT}.
    _ HTML block, with the BEGIN/END format
    
    See your "view" PHP file to check how to set variables and control blocks
    
    Please REMOVE this comment before publishing your game on BGA
-->

<div id="mainLine">
    <!-- BEGIN pattern -->
    <div id="pattern_pile_wrap" class="whiteblock">
        <h3 class="dbl_block_title">{PLAYING_ZONE}</h3>
        <div id="pattern_pile">
        </div>
        <div class="dbl_cards_count_wrapper">
            <span class="dbl_counter_prefix">x</span>
            <span id="cards_count_pattern" class="dbl_cards_counter dbl_cards_count"></span>
        </div>
    </div>
    <!-- END pattern -->

    <div id="opponents_wrapper">
     <!-- BEGIN myHand -->
    <div id="myhand_wrap" class="whiteblock">
        <h3 class="dbl_block_title">{MY_HAND}</h3>
        <div id="myhand">
        </div>
         <div class="dbl_cards_count_wrapper">
            <span class="dbl_counter_prefix">x</span>
            <span id="cards_count_{PLAYER_ID}" class="dbl_cards_counter dbl_cards_count"></span>
        </div>
    </div>
     <!-- END myHand -->
        <!-- BEGIN player -->
        <div id="player_hand_{PLAYER_ID}" class="whiteblock">
            <div style="color:#{PLAYER_COLOR}">
                <h3 class="dbl_block_title">{PLAYER_NAME}</h3>
            </div>
            <div class="playerHand" id="player_hand_stock_{PLAYER_ID}">
            </div>
             <div class="dbl_cards_count_wrapper">
                <span class="dbl_counter_prefix">x</span>
                <span id="cards_count_{PLAYER_ID}" class="dbl_cards_counter dbl_cards_count"></span>
            </div>
        </div>
        <!-- END player -->
    </div>

   
</div>


<script type="text/javascript">

// Javascript HTML templates


// Example:
//var jstpl_some_game_item='<div class="my_game_item" id="my_game_item_${MY_ITEM_ID}"></div>';
var jstpl_card='<div id="${cardId}" class="card"></div>'
var jstpl_card_zone='<div id="${zoneId}" class="symbol ${symbolClass}" style="top:${top}%; left:${left}%; transform:rotate(${rotation}deg); width:${size}%; height:${size}%;" ></div>'
 
//
</script>  

{OVERALL_GAME_FOOTER}
