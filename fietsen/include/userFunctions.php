<?php 
    if(!isset($_SESSION['login'])){
        $_SESSION['login']=false;
        $_SESSION['username']="";
        $_SESSION['role']=0;
    }

    function login(){}

    function checkUser($username){
        if($username <> ""){
        $conn=dbConnect();
        $sql = "SELECT * FROM gebruikers WHERE username='$username'" 
        $stmt = $conn->prepare($sql)
        $stmt->execute();
        $stmt->setFetchMode (PDO::FETCH_ASSOC);
        $users = $stmt->fetchAll();
        foreach($users as $user){
            if($username == $user ['username']){
                return true;
            }else{
                return false;
            }
        }

    }
    else{
        return false;
    }
}
    function checkUserPassword($username,$password){}

    function checkRole($role){}

    function register(){

    }

    function logout(){
        $_SESSION['login']=false;
        $_SESSION['username']="";
        $_SESSION['role']=0;
        if(!($_SESSION['login']==true;)){
            echo "u bent ingelogd.";
        }else{
            echo "plobleem met uitloggen";
        }
        header('Refresh:2; url=index.php');
    }

?>