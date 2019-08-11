<?php

    ini_set('max_execution_time', 600);
function containsHtml($string) {
	if (htmlspecialchars($string) != $string) {
		return true;
	}
	return false;
}


include "GommeApi.php";

$clans = array("Thalion","#Prication","Snack","Saitama","Sixteen","Prave-Clan","Akagi","sonic","Sintoku","Steadfast");
$uuids = array("18f95140-7e1b-11e9-ae50-29f72ecb07d5","9b85f3c0-8b81-11e9-92bc-5945a7182369","fde66d10-53ab-11e8-b974-05889de4c263","4be65bc0-6751-11e8-bb2b-2f962546f095","3cb66c00-683e-11e9-9716-f1d24a41ae20","c8d70620-36e0-11e9-81e4-3da04a816b44","71cd29c0-a73f-11e9-b291-d3f9847c3505","c4eff960-8eef-11e9-9141-9dca58a846f5","fcbc8d70-606c-11e8-b5b8-6994d7b412db","2a01b510-f25f-11e8-a456-af2c5f399db3");

// Test Stats
/**
foreach ($clans as &$clan) {
	$res = GommeApi::fetchClanStats($clan);
	if (is_array($res) || is_object($res)) {
		foreach ($res as $key => $value) {
			if (containsHtml($value)) {
				echo "<span style='color:orange'>Error Detected: $clan with key $key </span><br>";
			} else {
				echo "$clan with key $key ok<br>";
			}
		}
		echo $res['uuid'] . "<br>";
	} else {
		echo "<span style='color:red'>Error Detected: $clan not working </span><br>";
	}
}
**/

// Test member
/**
foreach ($clans as &$clan) {
	$res = GommeApi::fetchClanMembers($clan);
	if (is_array($res) || is_object($res)) {
		$types = array("leader", "mods", "member");
		
		for ($i = 0; $i < 3; $i++) {
			if (is_array($res[$types[$i]]) || is_object($res[$types[$i]])) {
				foreach ($res[$types[$i]] as &$player) {
					if(containsHtml($player)){
						echo "<span style='color:orange'>Error Detected: $clan player $player </span><br>";
					} else {
						echo "$clan player $player ok<br>";
					}
				}
			} else {
				echo "<span style='color:red'>Error Detected: $clan subtype $i not working / not existing</span><br>";
			}
		}
	} else {
		echo "<span style='color:red'>Error Detected: $clan not working </span><br>";
	}
}**/

//CW Liste
/**foreach ($uuids as &$uuid) {
	$keys = array("matchid","winner","loser","datetime","map","duration");
	$res = GommeApi::fetchClanCws($uuid,100);
	$i = 0;
	foreach ($res as &$cw) {
		echo "<span style='color:blue'>Looking at CW $i ".$cw['matchid']."</span><br>";
		foreach ($keys as &$key) {
			if (isset( $cw[$key])) {
				if (containsHtml($cw[$key])) {
					echo "<span style='color:yellow'>Error Detected: $key contains html</span><br>";
				} else {
					echo "$uuid CW Nr.$i $key ok<br>";
				}
			} else {
				echo "<span style='color:red'>Error Detected: $key is missing</span><br>";
			}
		}
		$i++;
	}
	if ($i < 100) {
		echo "<span style='color:yellow'>Less then 100 CWs detected, clan might not have played 100 yet</span><br>";
	}
}**/

// CWs
$cws = GommeApi::fetchClanCws("1d4de480-3fea-11e6-8fce-1df41be2b061", 100);
$i = 0;
foreach ($cws as &$cw) {
	/**
	echo "<br><span style='color:blue'>Looking at CW $i: ".$cw['matchid']."</span><br>";
	
	
	// CW Stats
	$stats = GommeApi::fetchCwStats($cw['matchid']);
	
	if (isset($stats['winner'])) {
		$winner = $stats['winner'];
		if (!empty($winner['name'])){
			if (!containsHtml($winner['name'])) {
				echo "Winner name is okay<br>";
			} else {
				echo "<span style='color:yellow'>Winner name contains Html</span><br>";
			}
		} else {
			echo "<span style='color:red'>Winner name missing</span><br>";
		}
	} else {
		echo "<span style='color:red'>Winner missing</span><br>";
	}
	
	if (isset($stats['loser'])) {
		$loser = $stats['loser'];
		if (!empty($loser['name'])){
			if (!containsHtml($loser['name'])) {
				echo "loser name is okay<br>";
			} else {
				echo "<span style='color:yellow'>loser name contains Html</span><br>";
			}
		} else {
			echo "<span style='color:red'>loser name missing</span><br>";
		}
	} else {
		echo "<span style='color:red'>loser missing</span><br>";
	}
	
	if (isset($stats['mvp'])) {
		if (!empty($stats['mvp'])){
			if (!containsHtml($stats['mvp'])) {
				echo "MVP is okay<br>";
			} else {
				echo "<span style='color:yellow'>MVP contains Html</span><br>";
			}
		} else {
			echo "<span style='color:red'>MVP missing</span><br>";
		}
	}
	
	if (isset($stats['elo'])) {
		if (!empty($stats['elo'])){
			if (!containsHtml($stats['elo'])) {
				if (is_numeric($stats['elo'])) {
					echo "Elo is okay<br>";
				} else {
					echo "Elo not numeric<br>";
				}
			} else {
				echo "<span style='color:yellow'>Elo contains Html</span><br>";
			}
		} else {
			echo "<span style='color:red'>Elo missing</span><br>";
		}
	}
	**/
	
	// CW Spieler
	/**$players = GommeApi::fetchCwPlayers($cw['matchid']);
	
	$types = array("winner", "loser");
	
	foreach($types as &$type) {
		if (isset($players[$type])) {
			$i = 0;
			foreach ($players[$type]['lineup'] as &$player) {
				if (isset($player['bac'])) {
					if ($player['bac'] == true || $player['bac'] == false) {
						echo "BAC ok<br>";
					} else {
						echo "<span style='color:orange'>BAC status macht keinen Sinn</span><br>";
					}
				} else {
					echo "<span style='color:red'>BAC status fehlt</span><br>";
				}
				
				if (isset($player['name'])) {
					if (!containsHtml($player['name']) && !empty($player['name'])) {
						echo "Spieler ok<br>";
					} else {
						echo "<span style='color:orange'>Spielername nicht gültig</span><br>";
					}
				} else {
					echo "<span style='color:red'>Spielername fehlt</span><br>";
				}
				$i++;
			}
			
			if ($i != 4) {
				echo "<span style='color:red'>Weniger als 4 Spieler</span><br>";
			}
			
			if (isset($players[$type]['name'])) {
				if (!empty($players[$type]['name']) && !containsHtml($players[$type]['name'])) {
					echo "Clanname ist okay<br>";
				} else {
					echo "<span style='color:orange'>Spielername macht keinen Sinn</span><br>";
				}
			} else {
				echo "<span style='color:red'>Clanname fehlt</span><br>";
			}
		} else {
			echo "<span style='color:red'>Team $type fehlt</span><br>";
		}
	}**/
	
	// CW Geschehnisse
	$events = GommeApi::fetchCwActions($cw['matchid']);
	
	foreach ($events as &$event) {
		if (isset($event['time'])) {
			echo "Time set<br>";
		} else {
			echo "<span style='color:red'>Time not set</span><br>";
		}
		
		if (isset($event['action'])) {
			$ac = $event['action'];
			
			if ($ac == "quit" || $ac == "joined" || $ac == "died") {
				if (isset($event['subject'])) {
					if (!containsHtml($event['subject'])) {
						echo "subject set<br>";
					} else {
						echo "<span style='color:orange'>subject contains html</span><br>";
					}
				} else {
					echo "<span style='color:red'>subject not set</span><br>";
				}
			} else if ($ac == "destroyed" || $ac == "killed") {
				if (isset($event['object'])) {
					if (!containsHtml($event['object'])) {
						echo "Object set<br>";
					} else {
						echo "<span style='color:orange'>Object contains html</span><br>";
					}
				} else {
					echo "<span style='color:red'>Object not set</span><br>";
				}

				if (isset($event['subject'])) {
					if (!containsHtml($event['subject'])) {
						echo "subject set<br>";
					} else {
						echo "<span style='color:orange'>subject contains html</span><br>";
					}
				} else {
					echo "<span style='color:red'>subject not set</span><br>";
				}				
			} else {
				echo "<span style='color:red'>Unknown event action $ac</span><br>";
			}
		} else {
			echo $cw['matchid'];
			echo "<span style='color:red'>Action missing</span><br>";
		}
	}
	$i++;
}



























?>