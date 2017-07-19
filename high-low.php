<?php

//get number of arguments

//if it equals 2, set min ($a) and max ($b) of mt_rand expression

//Get a random number
$rando = mt_rand($a,$b);
echo "$rando\n";
//Prompt to guess a number
fwrite(STDOUT, 'Hey sucker. Guess a number! ');
//compare input to number
$number = trim(fgets(STDIN));

//number of guesses
$guesses = 0;

while ($number != $rando) {

  if (is_numeric($number) == false) {
    fwrite(STDOUT, "You must enter a number!\n");
  } else if ($number < $rando) {
    fwrite(STDOUT, "Higher!\n");
    $guesses +=1;
  } else if ($number > $rando) {
    fwrite(STDOUT, "Lower!\n");
    $guesses +=1;
  }
    $number = trim(fgets(STDIN));
}

if($number == $rando) {
  fwrite(STDOUT, "Did you cheat?!\nOnly took you {$guesses} guesses.\nGAME OVER");

}
