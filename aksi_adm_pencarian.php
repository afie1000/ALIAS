<?php

include 'sparqllib.php';

if(isset($_POST['tambah']))
{
    $domisili = $_POST['domisili'];
    $jeniskejahatan = $_POST['jeniskejahatan'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $kategorikejahatan = $_POST['kategorikejahatan'];
    $kejahatan = $_POST['kejahatan'];
    $nama = $_POST['nama'];
    $tempatkejadian = $_POST['tempatkejadian'];
    $umur = $_POST['umur'];


    $db = sparql_connect("https://qrary-fuseki-service.herokuapp.com/alias/update");
    if(!$db)
        {
            print sparql_errno() . " : " . sparql_error(). "\n"; exit;
         }
    $sparql = " 
                PREFIX vd: <http://alias.com/ns/villaindata#>
                PREFIX d: <http://alias.com/ns/data#>

                
                insert data {   
                    d:007	vd:domisili           '$domisili' ;
                            vd:jenisKejahatan     '$jeniskejahatan' ;
                            vd:jenisKelamin       '$jeniskelamin' ;
                            vd:kategoriKejahatan  '$kategorikejahatan' ;
                            vd:kejahatan          '$kejahatan' ;
                            vd:nama               '$nama' ;
                            vd:tempatKejadian     '$tempatkejadian' ;
                            vd:umur               '$umur' .
               
                }";
                
                $result = sparql_query ($sparql);

               // var_dump ($result);
                if( !$result ) 
                { 
                    print sparql_errno() . ": " . sparql_error(). "\n"; exit; 
                }
}
?>