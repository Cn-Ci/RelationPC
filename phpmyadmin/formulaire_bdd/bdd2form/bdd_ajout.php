<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php 

if ($_GET["action"]=="add"){


?>
        <form class="tableau text-center" action="bdd.php?action=add" method="post">
                <label for="formgr">no_emp :</label>
                <input required class="form text-center" type="number" name="no_emp" placeholder="Saisir votre numero d'employe"> </br></br>
                <label for="formgr">nom :</label>
                <input class="form text-center" type="text" name="nom" placeholder="Saisir votre nom"> <br/><br/>
                <label for="formgr">prenom :</label>
                <input required class="form text-center" type="text" name="prenom" placeholder="Saisir votre prenom"> <br/><br/>
                <label for="formgr">emploi :</label>
                <input class="form text-center" type="text" required name="emploi" placeholder="Saisir votre emploi"> <br/><br/>
                <label for="formgr">embauche :</label>
                <input class="form text-center" type="date" name="embauche" placeholder="Saisir votre date d'embauche"> <br/><br/>
                <label for="formgr">sal :</label>
                <input class="form text-center" type="text" required name="sal" placeholder="Saisir votre salaire"> <br/><br/>
                <label for="formgr">comm :</label>
                <input class="form text-center" type="text" required name="comm" placeholder="Saisir votre commission"> <br/><br/>
                <label for="formgr">noserv :</label>
                <input class="form text-center" type="text" required name="noserv" placeholder="Saisir votre numero de service"> <br/><br/>
                <label for="formgr">sup :</label>
                <input class="form text-center" type="text" required name="sup" placeholder="Saisir votre numero de supérieur"> <br/><br/>
                <label for="formgr">noproj :</label>
                <input class="form text-center" type="text" required name="noproj" placeholder="Saisir votre numero de projet"> <br/><br/>
                
                <input class="form text-center btn btn-primary" type="submit" value="Envoyez"> 
        </form>
<?php

} elseif (isset($_GET['action']) && $_GET["action"]=="modif" && isset($_GET['no_emp'])){
        
                $no_empdef = $_GET["no_emp"];

                /* connection a la bdd */
                $db = mysqli_init();
                mysqli_real_connect($db, 'localhost','root','root','afpa_test');
                $rs = mysqli_query($db, "SELECT * FROM employe where no_emp = $no_empdef");
                $data = mysqli_fetch_array($rs, MYSQLI_ASSOC);


                mysqli_free_result($rs);
                mysqli_close($db);



?>
        <form class="tableau text-center" action="bdd.php?action=modif&amp;no_emp=<?php echo $_GET['no_emp'];?>" method="post"> 
            <!-- email -->
                <label for="formgr">no_emp :</label>
                <input required class="form text-center" type="text" name="modifno_emp" value="<?php echo $data['no_emp']?>" > </br></br>
            <!-- prenom -->
                <label for="fname">nom :</>
                <input class="form text-center" type="text" id="fname" name="modifnom" value="<?php echo $data['nom']?>" ><br/><br/>
            <!-- nom -->
                <label for="formgr">prenom :</label>
                <input required class="form text-center" type="text" name="modifprenom" value="<?php echo $data['prenom']?>" > <br/><br/>
            <!-- age -->
                <label for="formgr">emploi :</label>
                <input class="form text-center" type="text" required name="modifemploi" value="<?php echo $data['emploi']?>" > <br/><br/>
            <!-- ville -->
                <label for="formgr">embauche :</label>
                <input class="form text-center" type="date" name="modifembauche" value="<?php echo $data['embauche']?>" > <br/><br/>

                <label for="formgr">sal :</label>
                <input class="form text-center" type="number" name="modifsal" value="<?php echo $data['sal']?>"> <br/><br/>

                <label for="formgr">comm :</label>
                <input class="form text-center" type="number" name="modifcomm" value="<?php echo $data['comm']?>" > <br/><br/>

                <label for="formgr">noserv :</label>
                <input class="form text-center" type="number" name="modifnoserv" value="<?php echo $data['noserv']?>" > <br/><br/>

                <label for="formgr">sup :</label>
                <input class="form text-center" type="number" name="modifsup" value="<?php echo $data['sup']?>" placeholder="Modifier votre numero de supérieur"> <br/><br/>

                <label for="formgr">noproj :</label>
                <input class="form text-center" type="number" name="modifnoproj" value="<?php echo $data['noproj']?>" placeholder="Modifier votre numero de projet"> <br/><br/>

                <input type="submit" class="btn btn-primary" value="Modifier"/>
        </form>
<?php
}

?>

    </body>
</html>