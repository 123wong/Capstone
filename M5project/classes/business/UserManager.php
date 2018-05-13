<?php
namespace classes\business;

use classes\entity\User;
use classes\data\UserManagerDB;

class UserManager
{
    public static function getAllUsers(){
        return UserManagerDB::getAllUsers();
    }
    public function getUserByEmailPassword($email,$password){
        return UserManagerDB::getUserByEmailPassword($email,$password);
    }
    public function getUserByEmail($email){
        return UserManagerDB::getUserByEmail($email);
    }
    public function saveUser(User $user){
        UserManagerDB::saveUser($user);
    }
    public function userpassword($email, $password) {
        UserManagerDB::userpassword($email, $password);
    }
	
	public function updateUser(User $user) {
		UserManagerDB::updateUser($user);
    }
	
	public function searchUser($name) {
		return UserManagerDB::searchUser($name);
    }
	
    public function randomPassword($length=8) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }
	 public function unsubscribe($id, $token) {
        UserManagerDB::unsubscribe($id, $token);
    }
}
