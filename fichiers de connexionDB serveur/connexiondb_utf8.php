<?php

            //$dbname = /*"ressourcebrie"*/"09007_ressourceb";
            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
           // $serveur = /*"localhost"*/ "sql01.ouvaton.coop";
            //$login = /*"root"*/"09007_ressourceb";
            //$pass = /*"root"*/ "LaRessourcerieDeBrie77170!";
            

            $dbname = "ressourcebrie_bdd";
            $serveur ="mysql-ressourcebrie.alwaysdata.net";
            $login = "418153";
            $pass = "geMsos-wunxoc-1fucbu";

            $connexion = new PDO("mysql:host=$serveur;dbname=$dbname",$login, $pass, $options);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
?>