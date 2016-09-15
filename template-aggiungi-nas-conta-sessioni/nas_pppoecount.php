#!/usr/bin/php
<?php
if (isset($argv[1]) && !filter_var($argv[1], FILTER_VALIDATE_IP) === false) {
        try {
                $PDO = New PDO('mysql:host=X.X.X.X;dbname=radius', 'zabbix_agent', '************');
                $PDO->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        } catch (PDOException $e) {
                die('-5');
        }
        try {
                $statement = $PDO->query('SELECT COUNT(*) AS tot FROM radacct WHERE acctstoptime IS NULL AND nasipaddress=\''.$argv[1].'\'');
                $cont = $statement->fetch(PDO::FETCH_ASSOC);
                echo $cont['tot'];
        } catch(PDOException $e){
                echo '-6';
        }
} else {
        echo '-10';
}
?>