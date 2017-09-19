<?php
/* HARD:
Bring in your createDeck and dealCards function from the previous challenges. 
Assign each player an even set of cards.
We will do this by counting out how many players there are, counting how many cards are in the deck and then dividing them so we know how many cards each player should get.
  $deck =
  $num_players = 4;
  $num_cards_in_deck = //find a function to count the # of elements in an array
  $num_cards_to_give_each_player =
Use a for loop to add the "dealt hands" to the $players array

Each player will play a card and whoever has the highest value wins.
 	If there are 2 cards played that have the same value, everyone loses and that round is a draw.
 		Store the results of each game and also who won that round as the value.
 	If the round is a draw, store the value as DRAW. 
 		Use a loop to play each game until all opponents are out of cards.
 		Print out the array of all the rounds. 
 	If there was a draw, the round should say DRAW.
	If a player has won, it should displayer “Player X” where X is the index of the player. */
	
	$numOfPlayers = 4;	
  $deckOfCards = createDeck();
	$random = shuffleDeck($deckOfCards);
	$dealCards = dealCards($random, $numOfPlayers);
	$playGame = playGame($dealCards, $numOfPlayers);

	
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
  function dealCards($randomDeck, $numOfPlayers){
  	$players = [];

	  $randomDeckLength = count($randomDeck);  // 52 cards

  	/* count num of cards in deck,
  	then divide to know how many cards each player should get */
	  $cardsPerPlayer = $randomDeckLength / $numOfPlayers; // 13 cards

		// use for loop to add dealt cards to players array
		for ($i=0; $i < $numOfPlayers; $i++) { 
  		// find array length to know what index to remove from
	  	$randomDeckLengthCurrent = count($randomDeck);  // 39 cards
			$findIndex = $randomDeckLengthCurrent - $cardsPerPlayer; 
	  	$usersHand = array_splice($randomDeck, $findIndex);
			$players[$i] = $usersHand;
		}
		return $players;
  }

  // add & so it takes cards out of actual players array, not copy
  // create playgame function that controls game
  function playGame(&$players, $numOfPlayers){
  	// declare in scope of function, not in for loop bc that would refresh it everytime
  	$roundResults = [];
  	//for loop for each "round"
  	for ($i=0; $i < 13; $i++) {
  		$dealtCards = [];

  		// each player plays a hand
  		// change i index to j bc it's nested in the for loop
	    for ($j=0; $j < $numOfPlayers; $j++) { 
	  		$dealt = array_shift($players[$j]);
	  		$dealtCards[$j] = $dealt; 
			}
		
			// gives us the highest valued card in array
			$maxCard = max($dealtCards);
			$winners = [];

			$dealtCards_length = count($dealtCards); // 13 cards
			$winners_length = count($winners);

			// gives us index of winning player, add 1 so it shows accurate player
			$winningIndex = array_search($maxCard, $dealtCards) + 1;

			// change i index to j bc it's nested in the for loop
			/* find winner card,
			push into winners array */
			for ($j=0; $j < $dealtCards_length; $j++) { 
				if($dealtCards[$j] === $maxCard){
					array_push($winners, $dealtCards[$j]);
				}
			}
			
			// if winner array has more than one index, that means there are duplicate values, which = draw
			if (count($winners) > 1) {
				array_push($roundResults, "Draw");
			} else {
				array_push($roundResults, "Player ". $winningIndex . " won");
			}
  	}
		return $roundResults;
  }

		// echo "<pre>";
		// print_r($playGame);
		// echo "</pre>";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Hard Challenge</title>
</head>
<body>
	<header>
		<h1 style="color: purple">Round Results</h1>
	</header>
	<div>
		<?php
			echo "<pre>";
			print_r($playGame);
			echo "</pre>";
		?>
	</div>
</body>
</html>