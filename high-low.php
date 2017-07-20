<?php


// get last 2 arguments from command line
$a = $argv[1];
$b = $argv[2];

// create variable that holds rand generated number 1-100
$rando = mt_rand(1, 100);

if (($a === "guess") && (is_numeric($b))) {
  guess($b);
}

// if there are 2 arguments after filename
if (($argc - 1) == 2) {

// if those two arguments are numeric
  if ((is_numeric($a)) && (is_numeric($b))) {

// if the first argument is less than the second
    if ($a < $b) {
      $rando = mt_rand($a, $b);
      fwrite(STDOUT, "Hey sucker. Guess a number between $a - $b! ");
      highLow($rando);

// if the second argument is less than the first
    } else {
      $rando = mt_rand($b, $a);
      fwrite(STDOUT, "Hey sucker. Guess a number between $b - $a! ");
      highLow($rando);
    }

// if the two arguments aren't both numeric, we'll default 1-100
  } else {
    fwrite(STDOUT, 'Hey sucker. Guess a number between 1-100! ');
    highLow($rando);
  }
} else {
  // if either argument is undefined, it will still run with an error.
  fwrite(STDOUT, 'Nice error smartypants. Guess a number between 1-100! ');
  highLow($rando);
}

function highLow($rando) {
// takes in a number from the CLI, trims off the line break
$number = trim(fgets(STDIN));
// variable to hold our guess count, initialized at 0
$guesses = 0;
// evaluate these conditions while our $number isn't equal to $rando
while ($number != $rando) {
  // if the input isn't numeric, user is asked for a number.
  if (is_numeric($number) == false) {
    fwrite(STDOUT, "You must enter a number!\n");
    // if the input is lower than $rando, user is asked for a higher number. guess count is incremented.
  } else if ($number < $rando) {
    fwrite(STDOUT, "Higher!\n");
    $guesses +=1;
    // if the input is higher than $rando, user is asked for a higher number. guess count is incremented.
  } else if ($number > $rando) {
    fwrite(STDOUT, "Lower!\n");
    $guesses +=1;
  }
  // $number is redefined with a new user input
  $number = trim(fgets(STDIN));
}
// finally somebody wins
if($number == $rando) {
  fwrite(STDOUT, "Did you cheat?!\nOnly took you {$guesses} guesses.\nGAME OVER");
  die;
}
}

function guess($b) {
  $b = intval($b);
  $y = 0;
  $z = PHP_INT_MAX;
  $guesses = 0;
  $compGuess = mt_rand($y, $z);
  echo "$compGuess\n";

  while ($compGuess != $b) {

    if ($compGuess > $b) {
      $z = ($compGuess);
      fwrite(STDOUT, "$compGuess");
      $guesses++;
    }
    if ($compGuess < $b) {
      $y = ($compGuess);
      $guesses++;
      fwrite(STDOUT, "$compGuess\n");
    }
    $compGuess = mt_rand($y, $z);
  }
  if($compGuess == $b) {
    fwrite(STDOUT, "It took {$guesses} guesses.\nGAME OVER");
    die;
  }
}
