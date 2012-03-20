<?php
class DoorsRecord {
    private $_houseId;
    private $_deviceId;
    private $_timestamp;

    public function getDevice() {
        return $this->_deviceId;
    }

    public function getTimestamp() {
        return $this->_timestamp;
    }

    static public function setState($deviceId, $houseId, $timestamp) {
        mysql_query("INSERT INTO doors_data SET house_id = '". $houseId ."', device_id = '". $deviceId . "', timestamp = '". $timestamp . "'") or die(mysql_error());
    }

    static public function load($houseId) {
        $result = mysql_query("SELECT * FROM doors_data WHERE house_id = '". $houseId ."'") or die(mysql_error());

        $records = array();

        while ($row = mysql_fetch_array($result)) {
            $doors = new DoorsRecord();
            $doors->_houseId = $houseId;
            $doors->_deviceId = $row['device_id'];
            $doors->_timestamp = $row['timestamp'];

            $records[] = $doors;
       }

        return $records;
    }
}
