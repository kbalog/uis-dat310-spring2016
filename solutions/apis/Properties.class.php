<?php

/**
 * Properties class
 */
class Properties {

    // DB settings
    private $_db_server = "localhost";
    private $_db_username = "root";
    private $_db_password = "root";
    private $_db_database = "dat310_booking";


    function __construct() {
        // Create DB connection
        $this->mysqli = new mysqli($this->_db_server, $this->_db_username, $this->_db_password, $this->_db_database);
        // set character encoding
        $this->mysqli->set_charset("utf8");
    }

    /**
     * Returns a given property
     *
     * @param $property_id
     * @return attributes of the property in an associative array
     */
    function getProperty($property_id) {
        $stmt = $this->mysqli->prepare("SELECT name, location, description, details, photo FROM properties "
            . "WHERE property_id=?");
        $stmt->bind_param("i", $property_id);
        $stmt->bind_result($name, $location, $description, $details, $photo);
        $stmt->execute();

        $property = array();
        if ($stmt->fetch()) {
            $property = array(
                'property_id' => $property_id,
                'name' => $name,
                'location' => $location,
                'description' => $description,
                'details' => $details,
                'photo' => $photo
            );
        }
        $stmt->close();
        return $property;
    }

    /**
     * Returns all properties
     *
     * @return properties in an array
     */
    function listProperties() {
        $stmt = $this->mysqli->prepare("SELECT property_id, name, location, description, details, photo FROM properties");
        $stmt->bind_result($property_id, $name, $location, $description, $details, $photo);
        $stmt->execute();

        $properties = array();
        while ($stmt->fetch()) {
            $properties[] = array(
                'property_id' => $property_id,
                'name' => $name,
                'location' => $location,
                'description' => $description,
                'details' => $details,
                'photo' => $photo
            );
        }
        $stmt->close();
        return $properties;
    }

    /**
     * Close MySQL connection
     */
    function close() {
        $this->mysqli->close();
    }

}