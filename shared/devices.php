<?php
class Device {
    private $_deviceId;
    private $_name;

    const LIGHT_DEVICE = 'lights';
    const DOOR_DEVICE = 'door';
    const FLOODLIGHT_DEVICE = 'floodlight';

    public function getName() {
        return $this->_name;
    }

    public function getDeviceId() {
        return $this->_deviceId;
    }

    static public function load($houseId, $deviceType) {
        $result = mysql_query("SELECT * FROM device_info WHERE house_id = '".$houseId."' AND device_type = '".$deviceType."'");

        $devices = array();

        while ($row = mysqL_fetch_array($result)) {
            $device = new Device();
            $device->_deviceId = $row['device_id'];
            $device->_name = $row['room'];
            $devices[] = $device;
        }

        return $devices;
    }
}
