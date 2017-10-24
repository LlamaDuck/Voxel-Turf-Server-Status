# Voxel Turf Server Status
A tool that gets the status of a Voxel Turf server by reading the logs/server_status.txt file.

# See it in action:
https://sneyersul.eu/voxel.php

## Basic usage
```
<?php
try {
	$status = (new VoxelTurfStatus)->fromFile('/path/to/vtdediserver/logs/server_status.txt');

	echo 'The server is ' . ($status->isOnline() ? 'online' : 'offline');
} catch (Exception $e) {
	// Could not read status from the supplied file
}
?>
```

## Methods
- isOnline(): Check if the server is online (status file has been updated in the last 30 seconds)

## Fields
- timestamp
- serverId
- players
- maxPlayers
- public
- serverName
- gameMode
- version
