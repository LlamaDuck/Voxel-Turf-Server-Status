<?php
class VoxelTurfStatus {
	public function fromFile($file) {
		$handle = fopen($file, 'r');
		if (!$handle)
			throw new Exception('File does not exist or could not be read');

		while (($line = fgets($handle)) !== false) {
			// Return the first line that isn't a comment
			if (substr($line, 0, 1) != '#') {
				fclose($handle);
				return $this->fromString($line);
			}
		}

		throw new Exception('Incorrect file format');
	}

	public function fromString($status) {
		$status = explode(' ; ', $status);

		if (count($status) != 8)
			throw new Exception('Incorrect format: number of columns is ' . count($status) . ' when it should be 8');

		$this->timestamp = $status[0];
		$this->serverId = $status[1];
		$this->players = $status[2];
		$this->maxPlayers = $status[3];
		$this->public = $status[4] == 'true';
		$this->serverName = $status[5];
		$this->gameMode = $status[6];
		$this->version = $status[7];

		return $this;
	}

	public function isOnline() {
		return time() - $this->timestamp < 35;
	}
}
