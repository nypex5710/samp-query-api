<?php
require "SampQueryAPI.php";
$query = new SampQueryAPI('145.239.234.157', '7777');


if($query->isOnline())
{
	$aInformation = $query->getInfo();
	$aServerRules = $query->getRules();

	?>
	<b>General Information</b>
	<table width="400">
		<tr>
			<td>Hostname</td>
			<td><?= htmlentities($aInformation['hostname']) ?></td>
		</tr>
		<tr>
			<td>Gamemode</td>
			<td><?= htmlentities($aInformation['gamemode']) ?></td>
		</tr>
		<tr>
			<td>Players</td>
			<td><?= $aInformation['players'] ?> / <?= $aInformation['maxplayers'] ?></td>
		</tr>
		<tr>
			<td>Map</td>
			<td><?= htmlentities($aInformation['mapname']) ?></td>
		</tr>
		<tr>
			<td>Weather</td>
			<td><?= $aServerRules['weather'] ?></td>
		</tr>
		<tr>
			<td>Time</td>
			<td><?= $aServerRules['worldtime'] ?></td>
		</tr>
		<tr>
			<td>Version</td>
			<td><?= $aServerRules['version'] ?></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><?= $aInformation['password'] ? 'Yes' : 'No' ?></td>
		</tr>
	</table>

	<br />
	<b>Online Players</b>
	<?php

	$aPlayers = $query->getDetailedPlayers();

	if(!is_array($aPlayers) || count($aPlayers) == 0)
	{
		echo '<br /><i>None</i>';
	}
	else
	{
		?>
		<table width="400">
			<tr>
				<td><b>Player ID</b></td>
				<td><b>Nickname</b></td>
				<td><b>Score</b></td>
				<td><b>Ping</b></td>
			</tr>
		<?php
		foreach($aPlayers as $sValue)
		{
			?>
			<tr>
				<td><?= $sValue['playerid'] ?></td>
				<td><?= htmlentities($sValue['nickname']) ?></td>
				<td><?= $sValue['score'] ?></td>
				<td><?= $sValue['ping'] ?></td>
			</tr>
			<?php
		}

		echo '</table>';
	}
}
?>
