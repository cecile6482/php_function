<?php

namespace cecile;

function checkPassword($password) {

    echo '<h1 class="text-center">Cécile</h1>';

    echo "Mot de passe : $password"; 

        $num = preg_match("#[0-9]+#", $password);
        $min = preg_match("#[a-z]+#", $password);
        $maj = preg_match("#[A-Z]+#", $password);
        $carspe = preg_match("#\W+#", $password);
        $douze = strlen($password) >= 12; 
        $table = array(
            "chiffre" => $num,
            "minuscule" => $min, 
            "majuscule" => $maj, 
            "carspe" => $carspe,
            "douze" => $douze, 
        );
        
        $all = array_filter($table);
        echo "<p class='text-end'>Force du mot de passe</p>";  
        
        
        if ($all) {
            if(count($all) == 5) {
                echo  '<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>';
            }

            elseif(count($all) == 4) {
                echo '<div class="progress"><div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div></div>';
            }

            elseif (count($all) == 3) {
                echo '<div class="progress"><div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div></div>';
            }

            elseif (count($all) == 2) {
                echo '<div class="progress"><div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div></div>';
            }

            elseif (count($all) == 1) {
                echo '<div class="progress"><div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div></div>';
            }

        }
        elseif(empty($password)) {
            echo  '<div class="progress"><div class="progress-bar bg-light" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>';
        }

        if(!$num || !$min || !$maj || !$carspe || !$douze ) {
            
            if($num || $min || $maj || $carspe || !$douze ) {
            echo '<ul class="list-group position-absolute top-50 start-50 translate-middle w-50">
            <li class="list-group-item active" aria-current="true">Le mot de passe doit contenir au moins:</li>';
            }
            
            
            if( !$num ) {
                echo '<li class="list-group-item">1 chiffre</li>';
            }

            if( !$min ) {
                echo '<li class="list-group-item">1 minuscule</li>';
            }

            if( !$maj ) {
                echo '<li class="list-group-item">1 majuscule</li>';
            }

            if( !$carspe ) {
                echo '<li class="list-group-item">1 caractère spécial</li>';
            }

            if( !$douze ) {
                echo '<li class="list-group-item">12 caractères</li>';
            }

            echo '</ul>';
        } 
        else {
            
            echo '<h6 class="text-center btn btn-success position-absolute top-50 start-50 translate-middle py-2 px-3">OK</h6>';
        }    
}   
    
?>


