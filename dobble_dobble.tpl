{OVERALL_GAME_HEADER}

<!-- 
--------
-- BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
-- Dobble implementation : © Séverine Kamycki severinek@gmail.com
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

<div id="piles">
    <!-- BEGIN pattern -->
    <div id="pattern_pile_wrap" class="dbl_whiteblock whiteblock dbl_hand_wrap">
        <div id="pattern_pile">
        </div>
        <div class="pile-description">
            <div>
                <h3 class="dbl_block_title">{PLAYING_ZONE}</h3>
            </div>
            <div class="dbl_cards_count_wrapper">
                <span class="dbl_counter_prefix">x</span>
                <span id="cards_count_pattern" class="dbl_cards_counter dbl_cards_count"></span>
            </div>
        </div>
    </div>
    <!-- END pattern -->

    <!-- BEGIN dobbleHand -->
    <div id="dbl_dobble_hand">
        <div class="dbl_hand_eye"></div>
    </div>
    <!-- END dobbleHand -->

    <div id="players_wrap">
        <!-- BEGIN myHand -->
        <div id="myhand_wrap" class="dbl_whiteblock whiteblock dbl_hand_wrap">
            <div id="myhand">
            </div>
            <div class="pile-description">
                
                <div style="color:#{PLAYER_COLOR}" id="player_name_{PLAYER_ID}">
                    <h3 class="dbl_block_title">{MY_HAND}</h3>
                </div>
                <div id="player_{PLAYER_ID}_sleepy"></div>
               
                <div class="dbl_cards_count_wrapper">
                    <span class="dbl_counter_prefix">x</span>
                    <span id="cards_count_{PLAYER_ID}" class="dbl_cards_counter dbl_cards_count"></span>
                </div>
            </div>
        </div>
        <!-- END myHand -->

        

        <!-- BEGIN player -->
        <div id="player_hand_{PLAYER_ID}" class="dbl_whiteblock whiteblock dbl_hand_wrap {CLASS_NAME}">
            <div class="playerHand" id="player_hand_stock_{PLAYER_ID}">
            </div>
            <div class="pile-description">
                
                <div style="color:#{PLAYER_COLOR}" id="player_name_{PLAYER_ID}">
                    <h3 class="dbl_block_title">{PLAYER_NAME}</h3>
                </div>
                <div id="player_{PLAYER_ID}_sleepy"></div>
              
                <div class="dbl_cards_count_wrapper">
                    <span class="dbl_counter_prefix">x</span>
                    <span id="cards_count_{PLAYER_ID}" class="dbl_cards_counter dbl_cards_count"></span>
                </div>
            </div>
        </div>
        <!-- END player -->
    </div>

   
   
</div>

<!-- BEGIN roPiles -->
<div id="read_only_piles"></div>
<!-- END roPiles -->

<audio id="audiosrc_matchSuccess" src="{GAMETHEMEURL}/sound/matchSuccess.mp3" autobuffer></audio>
<audio id="audiosrc_o_matchSuccess" src="{GAMETHEMEURL}/sound/matchSuccess.ogg" autobuffer></audio>
<audio id="audiosrc_matchFailure" src="{GAMETHEMEURL}/sound/matchFailure.mp3" autobuffer></audio>
<audio id="audiosrc_o_matchFailure" src="{GAMETHEMEURL}/sound/matchFailure.ogg" autobuffer></audio>

<script type="text/javascript">

// Javascript HTML templates


// Example:
//var jstpl_some_game_item='<div class="my_game_item" id="my_game_item_${MY_ITEM_ID}"></div>';

var jstpl_card='<div id="${cardId}" class="card"></div>'
var jstpl_empty_card='<div data-card-id="-1" data-card-type="empty" class="card dbl_card_size dbl_empty_card"></div>'
var jstpl_card_zone='<div id="${zoneId}_wrapper" class="symbolWrapper" style="position:absolute; top:${top}%; left:${left}%; width:${size}%; height:${size}%;"><div id="${zoneId}" class="symbol ${symbolClass}" style="top:0%; left:0%; width:100%; height:100%; transform:rotate(${rotation}deg);" ></div></div>'
var jstpl_round='<div class="dbl_roundNb player-board">${roundText} <span id="roundNb">${roundNb}</span></div>'

var jstpl_cards_icon = '<div id= "cards_panel_${id}"> \
    <div id="cards_icon_${id}" class="dbl_cards_icon"></div><span id="player_board_cards_count_${id}" class="cards_count"></span></div>';
var jstpl_sleepy_icon = '<span id="sleepy_panel_${id}"></span>';
var jstpl_dbl_player_panel = '<div id="dbl_player_panel_${id}" class="dbl_player_panel"></div>';
//
</script>  

{OVERALL_GAME_FOOTER}
