<?php
/*
*
* This class is the web service class. It interacts with the app installed in the mobile 
* phone client. it receive requests from the client suing GET (http method) and based on 
* the data received, it persform some operation in the dB  
*
*/ 
    require "../dataAccessModules/dataAccessObject.php";

    #db object creation
    $dao=new Dbaccess();
    $dba=$dao->accessDB();
    extract($_POST);
    $mat=trim($id);
    #fetching student infoss from param received
    $query = $dba->prepare("SELECT s.id,f.id_fiche,ses.id_session
                            FROM student as s, fiche_enrollement as f,session_enrollement as ses
                            WHERE s.id = f.etudiant 
                            AND f.session=ses.id_session 
                            AND s.matricule = ? ");
    $array = [$mat];
    $query->execute($array);
    $query->setFetchMode(PDO::FETCH_OBJ);  
    $result=$query->fetchAll();

    #fetch the max session id from db
    $sql = "SELECT max(id_session) FROM session_enrollement";
    $q = $dba->prepare($sql);
    $q->execute();

    if ($result) {
        if ($sessionID!=$q->fetchColumn()) {
            print("Qr code déjà expiré");
        }else{
            foreach ($result as $v) {
            $array = [
                        "i"=>null,
                        "dat"=>$date,
                        "cours"=>$cours,
                        "id"=>$v->id,
                        "id_fiche"=>$v->id_fiche,
                        "id_session"=>$v->id_session
                    ];
            $query = $dba->prepare("INSERT INTO presence(id_presence,`date` ,cours,etudiant,fiche,session,etat) VALUES (:i,:dat,:cours,:id,:id_fiche,:id_session, '1')");

            $query->execute($array);

        }
            print("Effectué");
        }
        
    }
    else {
        print("Aucune formation pour l'identifant donné");
    }
 ?>
