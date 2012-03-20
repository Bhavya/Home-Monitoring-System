<?php
class HouseholdInfo {
    private $_houseId;
    private $_phone;
    private $_address;
    private $_state;

    public function getPhone() {
        return $this->_phone;
    }

    public function getAddress() {
        return $this->_address;
    }

    public static function updateHouseInfo($phone, $address, $houseId) {
        mysql_query("UPDATE household_data SET phone = '". $phone ."', address = '". $address ."' WHERE house_id = '". $houseId ."'") or die(mysql_error());
    }

    static public function load($houseId) {
        $result = mysql_query("SELECT * FROM household_data WHERE house_id = '". $houseId ."'") or die(mysql_error());

        $row = mysql_fetch_array($result);

        if (empty($row)) {
            return null;
        }

        $info = new HouseholdInfo();
        $info->_houseId = $houseId;
        $info->_phone = $row['phone'];
        $info->_address = $row['address'];
        $info->_state = $row['state'];

        return $info;
    }
}
