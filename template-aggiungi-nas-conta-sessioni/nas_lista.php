#!/usr/bin/php
<?php
$NAS = array();
try {
        $PDO = New PDO('mysql:host=X.X.X.X;dbname=radius', 'zabbix_agent', '************');
        $PDO->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

} catch (PDOException $e) {
}
try {
        $statement = $PDO->query('SELECT nasname, shortname FROM nas ORDER BY shortname');
        while ($s = $statement->fetch(PDO::FETCH_ASSOC)) {
                $PPPOE = $PDO->query('SELECT COUNT(*) AS tot FROM radacct WHERE acctstoptime IS NULL AND nasipaddress=\''.$s['nasname'].'\'');
                $PPPOE_COUNT = $PPPOE->fetch(PDO::FETCH_ASSOC);

                if ($PPPOE_COUNT['tot']>0) {
                        $NEWEL = array(
                                '{#NASNAME}' => $s['shortname'],
                                '{#NASIP}' => $s['nasname']
                                );
                        array_push($NAS, $NEWEL);
                }
        }
} catch(PDOException $e){
}
echo json_encode(array('data' => $NAS));
?>