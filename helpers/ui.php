<?php
function color_сell($grade){
    if($grade <= 3) {return 'table-danger';}
    elseif($grade < 5) {return 'table-warning';}
    else {return 'table-success';}
}