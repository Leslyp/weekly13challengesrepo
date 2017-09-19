<?php
/* INSANE CHALLENGE:
Create a game of Blackjack.
Rules:
1. At any given time, there will only be two players. The dealer and player one.
2. 4 cards will be dealt out each round, 2 to the dealer and 2 to the player.
3. If the amount in the player’s hand is less than or equal to the amount in the dealer’s hand, you must draw a card.
4. If the player draws a card and the amount they have goes over 21, the dealer has won that round.
5. If the player ever reaches an amount greater than the dealer’s, they should stay then it will be the dealer’s turn.
6. The dealer must draw until he reaches an amount greater than the player’s or until he loses.
7. Subtract $100 from the player’s bank every time they lose
8. Add $200 to the player’s bank every time they win
9. Player starts with $1000 in the bank account
10. Aces can either be an 11 or 1
The game will continue as long as there are enough cards in the deck OR the player runs out of money.
Output:
1. How many games were played?
2. Who won the game?
3. Which round did the player’s bank reach half way?
4. How many times did the player get blackjack?
   */
	
	$numOfPlayers = 2;	
	$cardsPerPlayer = 2;
  $deckOfCards = createDeck();
	$random = shuffleDeck($deckOfCards);
	$dealCards = dealCards($random, $numOfPlayers, $cardsPerPlayer);
	//$playGame = playGame($dealCards, $numOfPlayers, $cardsPerPlayer);
	
	/* Create a function that will create a deck of cards,
	randomize it,
	and then return the deck. */
  function createDeck(){
  	$deck = array();
  	$suits = array (
  		"clubs", 
  		"diamonds", 
  		"hearts", 
  		"spades"
  	);
		$faces = array (
	    "Ace" => 1,
	    "2" => 2,
	    "3" => 3, 
	    "4" => 4, 
	    "5" => 5, 
	    "6" => 6, 
	    "7" => 7,
	    "8" => 8, 
	    "9" => 9, 
	    "10" => 10, 
	    "Jack" => 11, 
	    "Queen" => 12, 
	    "King" => 13
    );
		
	  // assigns the suits array to each face in faces array
	  foreach($suits as $suit){
	    // assign each face a value 
	    foreach($faces as $face => $value){
	      $deck["$face of $suit"] = $value;
	    }
  	}
	  return $deck;
  }

	// Create shuffle function, return new shuffled deck
  function shuffleDeck($deck) { 
  	$randomDeck = array(); 
	  $keys = array_keys($deck); 
	  shuffle($keys); 
	  foreach($keys as $key) { 
	    $randomDeck[$key] = $deck[$key]; 
	  }
	  return $randomDeck; 
	} 

  // create deal function to give each player equal amount of cards
  function dealCards($randomDeck, $numOfPlayers, $cardsPerPlayer){
  	$players = [];

	  $randomDeckLength = count($randomDeck);  // 52 cards

  	for ($i=0; $i < $numOfPlayers; $i++) { 
  		$randomDeckLengthCurrent = count($randomDeck);  
			$findIndex = $randomDeckLengthCurrent - $cardsPerPlayer; 
  		$usersHand = array_splice($randomDeck, $findIndex);
			$players[$i] = $usersHand;
  	}


		return $players;
  }
		echo "<pre>";
		print_r($dealCards);
		echo "</pre>";

?>