<?php
	/* MEDIUM:
	Let’s bring in the deck code from the past example (your normal challenge).
	Create a function that will create a deck of cards, randomize it and then return the deck.

	We will now create a function to deal these cards to each user. 
	Modify this function so that it returns the number of cards specified for the user.
	Also, it must modify the deck so that those cards are no longer available to be distributed. */

	$deckOfCards = createDeck();
	$random = shuffleDeck($deckOfCards);
	$cardsPerUser = 7;
	$dealtCards = dealCards($random, $cardsPerUser);

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

  // create deal function
  function dealCards($randomDeck, $cardsPerUser){
  	// find array length to know what index to remove from
  	$randomDeckLength = count($randomDeck);
  	$findIndex = $randomDeckLength - $cardsPerUser;

  	/* pass param. for num of cards 
  	use array_splice to take num of cards out the randomDeck array */
  	$usersHand = array_splice($randomDeck, $findIndex);

  	echo "Random Deck:";
  	echo "<pre>";
		print_r($randomDeck);
		echo "</pre>";

    return $usersHand;
  }

  echo "Dealt Cards:";
	echo "<pre>";
	print_r($dealtCards);
	echo "</pre>";


?>
