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
