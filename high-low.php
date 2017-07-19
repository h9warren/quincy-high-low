<?php

//Get a random number
$rando = mt_rand(1,100);
echo "$rando\n";
//Prompt to guess a number
fwrite(STDOUT, 'Hey sucker. Guess a number! ');
//compare input to number
$number = trim(fgets(STDIN));

while ($number != $rando) {

  if (is_numeric($number) == false) {
    fwrite(STDOUT, "You must enter a number!\n");
    $number = trim(fgets(STDIN));
  } else if ($number < $rando) {
    fwrite(STDOUT, "Higher!\n");
    $number = trim(fgets(STDIN));
  } else if ($number > $rando) {
    fwrite(STDOUT, "Lower!\n");
    $number = trim(fgets(STDIN));
  }
}

if($number == $rando) {
  fwrite(STDOUT, "Did you cheat?!\nGAME OVER");
}
