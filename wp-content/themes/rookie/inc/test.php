<?php 
include('php-riot-api.php');
include('FileSystemCache.php');
//testing classes
//using double quotes seems to make all names work (see issue: https://github.com/kevinohashi/php-riot-api/issues/33)
$summoner_name = "Oakwynd"; 
$summoner_id = 24147604;
$server = 'na';
$test = new riotapi('na');


$testCache = new riotapi('na', new FileSystemCache('cache/'));

function getSummonerLeague($summoner, $server) { //gets League and Division of solo Queue player by Winzard

    $test = new riotapi($server);
    $json = json_decode($test->getSummonerByName($summoner), true);
    $postarray = json_decode($json);
    $array = $json[strtolower($summoner)];
    $id = $array['id']; //Got the ID
    $json = json_decode($test->getLeague($id), true); //Getting the League
    for ($i = 0; $i<=2; $i++) { //This will check which of the leagues is the Solo Queue one
        $array = $json[$i];
        if ($array['queue'] == "RANKED_SOLO_5x5")
            break; //if it's true we're on the correct league, so leave the loop.
    }
    $playerStats = $array['entries']; //get the array of players(arrays) into this variable.
    $i = 0; //advancer
    while($playerStats[$i]) {
        $arr = $playerStats[$i]; //get player array
        if($arr['playerOrTeamName'] == $summoner) { //go one by one and check if the name matches the searched Summoner. If so, save league and div, and break the loop.
            $league = $arr['tier'];
            $div = $arr['rank'];
            break;
        }
        $i++; //Not the correct player, move on in the array.
    }
    $returnstring = $league."-".$div; //making it a string so we can later explode it using explode()
    return $returnstring;

}

$info = explode("-",getSummonerLeague("Oakwynd", "NA")); print_r($info); 
echo '<br /> League: ' . $info[0]; //league
echo "<br />";
echo 'Divison: ' . $info[1]; // div
?>