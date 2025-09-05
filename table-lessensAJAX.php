<?php
    include_once('database.php');
    $day = (int)($_POST['activePage'] ?? 1);
    $table_class = [ '-primary', '-secondary','-success', '-danger', '-warning', '-light', '-dark' ];
    $i = 0;
   
    $query = "SELECT lessens.num_less AS num_less, subjects.name AS name_subject, lessens.start_time AS start_less, lessens.end_time AS end_less, lessens.classroom AS classroom 
        FROM lessens 
            INNER JOIN subjects ON lessens.sub_id=subjects.id 
                WHERE lessens.weekday = $day
                    ORDER BY lessens.num_less ASC";

    $result = $conn->query($query);    
   
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr class="table' . $table_class[$i] . '">';
        echo '<td>' . $row['num_less'] . '</td>';
        echo '<td>' . $row['name_subject'] . '</td>';
        echo '<td>' . $row['start_less'] . '</td>';
        echo '<td>' . $row['end_less'] . '</td>';
        echo '<td>' . $row['classroom'] . '</td>';
        echo '</tr>';
        $i++;
    }