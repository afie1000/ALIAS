<!DOCTYPE html>
<html>

<head>
    <title>ALIAS - Pencarian Kriminalitas</title>
    <link a href="css/pencarian.css" rel="stylesheet">
</head>

<body>
<?php
?>
    <div class="logo">
        <a href="Home.php"><img src="css/Assets/Logos/LogoALIAS.png"></a>
    </div>
    <div class="pencarian">
        <p>Ketikkan Jenis Kriminalitas, Nama Pelaku, atau Tempat Kejadian Kriminal</p>
        <form action="pencarian.php" method="get">
            <input type="text" name="search" placeholder="Pencarian....">
            <!-- inputan nya ditaro di variable "search" ya fie, jadi nanti buat di query nya berdasarkan variable itu -->
            <input type="submit" value="Cari!">
        </form>
        </div>
        <?php
            if(isset($_GET['search']))
            {
                $search = $_GET['search'];
                //var_dump($search);
                require_once("sparqllib.php");
                $db = sparql_connect("https://qrary-fuseki-service.herokuapp.com/alias/query");
                if(!$db)
                {
                    print sparql_errno() . " : " . sparql_error(). "\n"; exit;
                }
                sparql_ns("villain","http://alias.com/ns/villaindata#");
                $sparql = " 
                PREFIX vd: <http://alias.com/ns/villaindata#>

                SELECT distinct * 
                WHERE {   
                   { ?d	vd:nama '$search';
                        vd:nama ?NamaPelaku.
                    OPTIONAL{?d vd:umur ?Umur.}
                    OPTIONAL{?d  vd:jenisKelamin ?jenisKelamin.}
                    OPTIONAL{?d  vd:domisili ?asalPelaku.}
                    OPTIONAL{?d  vd:kejahatan ?kejahatan.}
                    OPTIONAL{?d  vd:jenisKejahatan ?jenisKejahatan.}
                    OPTIONAL{?d  vd:tempatKejadian ?tempatKejadian.}
                   }

                    union
                    
                    { ?d	vd:jenisKejahatan '$search';
                            vd:jenisKejahatan ?jenisKejahatan;
                        OPTIONAL{?d vd:umur ?Umur.}
                        OPTIONAL{?d  vd:jenisKelamin ?jenisKelamin.}
                        OPTIONAL{?d  vd:domisili ?asalPelaku.}
                        OPTIONAL{?d  vd:kejahatan ?kejahatan.}
                        OPTIONAL{?d  vd:nama ?nama.}
                        OPTIONAL{?d  vd:tempatKejadian ?tempatKejadian.}

                    union

                    { ?d	vd:tempatKejadian '$search';
                            vd:tempatKejadian ?tempatKejadian.
                    OPTIONAL{?d vd:umur ?Umur.}
                    OPTIONAL{?d  vd:jenisKelamin ?jenisKelamin.}
                    OPTIONAL{?d  vd:domisili ?asalPelaku.}
                    OPTIONAL{?d  vd:kejahatan ?kejahatan.}
                    OPTIONAL{?d  vd:jenisKejahatan ?jenisKejahatan.}
                    OPTIONAL{?d  vd:nama ?nama.}
               
                }";
                
                $result = sparql_query ($sparql);
                //var_dump ($result);
                if( !$result ) 
                { 
                    print sparql_errno() . ": " . sparql_error(). "\n"; exit; 
                }
                $fields = sparql_field_array( $result );
                //print "<p>Number of rows: ".sparql_num_rows( $result )." results.</p>";
                print "<table class='tabel_hasil'>";
                print "<tr>";
                foreach( $fields as $field )
                {
                    print "<th>$field</th>";
                }
                print "</tr>";
                while( $row = sparql_fetch_array( $result ) )
                {
                    print "<tr>";
                    foreach( $fields as $field )
                    {
                        print "<td>$row[$field]</td>";
                    }
                print "</tr>";
                }
                print "</table>";
            }
        ?>
</body>
<style type="text/css">
    table{
        display:block;
        padding-top: 20px;
        padding-bottom: 20px;
        padding-right: 5px;
        padding-left:5px;
        position:absolute;
        left: 5%;
        background: rgba(255,255,255,0.8);
    }

    table.tabel_hasil tr,
    table.tabel_hasil th,
    table.tabel_hasil td{
        border: 1px solid #e1edff;
        padding: 7px 17px;
        background-color: #070027;
        color: #FFFF;
        border-color: #6ea1cc !important;
        text-transform: uppercase;
    }
</style>

</html>