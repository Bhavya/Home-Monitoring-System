<?php
class FloodlightsRecord {
    private $_houseId;
    private $_deviceId;
    private $_timestamp;
    private $_state;

    public function getDevice() {
        return $this->_deviceId;
    }

    public function getTimestamp() {
        return $this->_timestamp;
    }

    public function getState() {
        return $this->_state;
    }

    static public function setState($newState, $deviceId, $houseId) {
        $timestamp = getCurrentTimestamp();
        mysql_query("INSERT INTO floodlights_data SET house_id = '". $houseId ."', device_id = '". $deviceId . "', state = '". $newState . "', timestamp = '". $timestamp . "'") or die(mysql_error());
    }

    static public function load($houseId) {
        $result = mysql_query("SELECT * FROM floodlights_data LEFT OUTER JOIN device_info USING (device_id) WHERE floodlights_data.house_id = '". $houseId ."'" ) or die(mysql_error());

        $records = array();

        while ($row = mysql_fetch_array($result)) {
            $lights = new FloodlightsRecord();
            $lights->_houseId = $houseId;

            if (isset($row['room'])) {
                $lights->_deviceId = $row['room'];
            } else {
                $lights->_deviceId = $row['device_id'];
            }
            $lights->_timestamp = $row['timestamp'];
            $lights->_state = $row['state'];

            $records[] = $lights;
       }

        return $records;
    }
}
