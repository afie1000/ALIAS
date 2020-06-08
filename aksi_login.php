<?php

include ('sparqllib.php');
if (isset($_POST['login']))
{
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];

    $db = sparql_connect("https://qrary-fuseki-service.herokuapp.com/alias/query");
    if(!$db)
        {
            print sparql_errno() . " : " . sparql_error(). "\n"; exit;
         }
    sparql_ns("villain","http://alias.com/ns/userdata#");
    $sparql = " 
                PREFIX ud: <http://alias.com/ns/userdata#>

                SELECT * 
                WHERE {   
                    ?u	ud:username '$username';
                        ud:password '$password';
                        ud:username ?username;
                        ud:password ?password;
                        ud:nama ?nama;
                        ud:level ?level.
               
                }";
                
                $result = sparql_query ($sparql);

               // var_dump ($result);
                if( !$result ) 
                { 
                    print sparql_errno() . ": " . sparql_error(). "\n"; exit; 
                }
                $fields = sparql_fetch_array( $result );

                //var_dump($fields);
                if($fields['level']=="1"){
 
                    // buat session login dan username
                    $_SESSION['username'] = $username;
                    $_SESSION['nama'] = $fields['nama'];
                    $_SESSION['level'] = "1";
                    // alihkan ke halaman dashboard admin
                    echo '<script language="javascript"> alert("selamat anda telah berhasil login"); document.location="../Alias/adm_home.php"; </script>';
             
                // cek jika user login sebagai pegawai
                }
             
    /*if( user ga ditemuin / ga cocok )
    {
        '<script language="javascript"> alert("Username atau password salah!"); document.location="../Alias/login.php"; </script>';
    }
    else
    {
        $_SESSION['admin'] = "1";
        '<script language="javascript">document.location="../Alias/adm_home.php"; </script>';
    }

    */
}

?>