<!DOCTYPE html>
<html>


<?php
    extract( $_POST );

    if( !$USERNAME || !$PASSWORD ){
        fieldsBlank();
        die();
    }

    if( isset( $NewUser )){
        if( !($file = fopen( "password.txt", "a"))){
            print("<head><title>ERROR</title></head><body>Could not open password file</body></html>");
            die();
        }

        fputs( $file, "$USERNAME,$PASSWORD\n");
        userAdded( $USERNAME );
    }
    else{
        if( !($file = fopen("password.txt","r"))){
            print("<head><title>ERROR</title></head><body>Could not open password file</body></html>");
            die();
        }

        $userVerified = 0;

        while ( !feof($file) && !$userVerified) {
            $line = fgets($file,255);

            $line = chop($line);

            $field = explode(",", $line, 2);

            if( $USERNAME == $field[0] ){

                $userVerified = 1;

                if(checkPassword($PASSWORD, $field) == true ) {
                    accessGranted( $USERNAME );
                    echo "<br/><br/><br/>";
                    echo "User Name: <br/>";
                    $file = file('password.txt');
                    foreach ($file as $name){
                        $value = explode(",",$name);
                        echo "$value[0]<br/>";
                    }
                }
                else
                    wrongPassword();
            }
        }

        fclose( $file );

        if( !$userVerified ){
            accessDenied();
        }

    }

        function checkPassword( $userpassword, $filedate ){
            if( $userpassword == $filedate[1] )
                return true;
            else
                return false;
        }
        function userAdded ( $name ){
            print("<head><title>THANK YOU</title></head><body style= \"font-family: arial; font-size: 1em; color: grey\">You have been added to the user list,$name <br/>Enjoy the site");
        }
        function accessGranted( $name ){
            print("<head><title>THANK YOU</title></head><body style= \"font-family: arial; font-size: 1em; color: grey\"><strong>Permission has been granted, $name <br/>Enjoy the site</strong>");
        }
        function wrongPassword (){
            print("<head><title>Access Denied</title></head><body style= \"font-family: arial; font-size: 1em; color: grey\"><strong>You entered an invalid password <br/>Access has been denied.</strong>");
        }
        function accessDenied(){
            print("<head><title>Access Denied</title></head><body style= \"font-family: arial; font-size: 1em; color: grey\"><strong>You are denied to access this server<br/></strong>");
        }


?>
</body>
</html>
