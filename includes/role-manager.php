<?php

function check_role($role){
    if($role !== 'admin'){
        header('location: /');
    }
}
