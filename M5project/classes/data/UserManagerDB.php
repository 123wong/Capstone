<?php
namespace classes\data;
/**
 * 
 */
use classes\entity\User;
use classes\util\DBUtil;

/**
 * 
 * @author JingXuan
 *
 */
class UserManagerDB
{
    public static function fillUser($row){
        $user=new User();
        $user->userId=$row["UserId"];
        $user->userName=$row["UserName"];
        $user->userAddress=$row["UserAddress"];
        $user->userEmail=$row["UserEmail"];
        $user->userPassword=$row["UserPassword"];
        $user->userType=$row["UserType"];
        $user->userStatus=$row["UserStatus"];
		$user->subscribeToken=$row["subscribeToken"];
        return $user;
    }
    /**
     * 
     * @param public $email
     * @param public $password
     * @return NULL|\classes\entity\User
     */
    public static function getUserByEmailPassword($email,$password){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $password=mysqli_real_escape_string($conn,$password);
        $sql="select * from cp_tb_user where UserEmail='$email' and UserPassword='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }
    /**
     * 
     * @param public $email
     * @return NULL|\classes\entity\User
     */
    public static function getUserByEmail($email){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $sql="select * from cp_tb_user where UserEmail='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
            }
        } else {
            $user = false;
        }
        $conn->close();
        return $user;
    }
    /**
     * 
     * @param User $user
     */
    public static function saveUser(User $user){
        $conn=DBUtil::getConnection();
        $sql="call procSaveUser(?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssssss", $user->userId, $user->userName, $user->userEmail, $user->userAddress, $user->userPassword, $user->userType, $user->userStatus, $user->subscribeToken); 
        $stmt->execute();
        if($stmt->errno!=0){
            printf("Error: %s.\n",$stmt->error);
        }
        $stmt->close();
        $conn->close();
    }
	
	
    /**
     * 
     * @return \classes\entity\User[]
     */
    public static function getAllUsers(){
        $users[]=array();
        $conn=DBUtil::getConnection();
        $sql="select * from cp_tb_user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
                $users[]=$user;
            }
        }
        $conn->close();
        return $users;
    }
	
	 public static function searchUser($name){
		$users[]=array();
        $conn=DBUtil::getConnection();
		$name=mysqli_real_escape_string($conn,$name);
		$sql="select * from cp_tb_user WHERE UserName LIKE '%{$name}%'";
        $result = $conn->query($sql);
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
                $users[]=$user;
            }
        }
        $conn->close();
        return $users;
    }

    public static function userpassword($email, $password) {
        $conn=DBUtil::getConnection();
        $sql = "update cp_tb_user set UserPassword = '$password' where UserEmail = '$email'";
        $conn->query($sql);
        $conn->close();
    }

	public static function unsubscribe($id, $token) {
        $conn=DBUtil::getConnection();
        $sql = "UPDATE cp_tb_user set subscribeToken = NULL where UserId = '$id' and subscribeToken = '$token'";
        $conn->query($sql);
        $conn->close();
    }
	
	public static function updateUser(User $user){
        $conn=DBUtil::getConnection();
        $sql="UPDATE `cp_tb_user` SET `UserName`='$user->userName',`UserAddress`='$user->userAddress',`UserEmail`='$user->userEmail',`UserPassword`='$user->userPassword',`subscribeToken`= '$user->subscribeToken' WHERE `UserEmail`='$user->userEmail'";
		echo $sql;
		$stmt = $conn->query($sql);
        $conn->close();
    }
	
}