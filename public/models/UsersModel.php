<?php
require_once '../config/db.php';

class UsersModel {
    private $conn;

    public function __construct() {
        $this->conn = getDBConnection();
    }

    public function getUserProfile($id) { 
    
    }

    public function updateProfile($id, $name, $email) {
    
    }

    public function changePassword($id, $oldPass, $newPass) {
    
    }

    public function emailExists($email) {
    
    }

    public function listUsers() {
    
    }
}
