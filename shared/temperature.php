<?php
class TemperatureRecord {
    private $_houseId;
    private $_deviceId;
    private $_timestamp;
    private $_temp;

    public function getDevice() {
        return $this->_deviceId;
    }

    public function getTimestamp() {
        return $this->_timestamp;
    }

    public function getTemperature() {
        return $this->_temp;
    }

    static public function setTemperature($newTemp, $deviceId, $houseId) {
        mysql_query("INSERT INTO temperature_data SET house_id = '". $houseId ."', device_id = '". $deviceId . "', temperature = '". $newTemp. "', timestamp = '". $timestamp . "'") or die(mysql_error());
    }

    static public function load($houseId) {
        $result = mysql_query("SELECT * FROM temperature_data WHERE house_id = '". $houseId ."'") or die(mysql_error());

        $records = array();

        while ($row = mysql_fetch_array($result)) {
            $temp = new TemperatureRecord();
            $temp->_houseId = $houseId;
            $temp->_deviceId = $row['device_id'];
            $temp->_timestamp = $row['timestamp'];
            $temp->_temp = $row['temperature'];

            $records[] = $temp;
       }

        return $records;
    }
}

