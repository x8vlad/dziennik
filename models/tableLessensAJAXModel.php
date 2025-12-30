<?php
class ShowTableLessens{
    public function showLessensTable($day) {
        $query = "SELECT lessens.num_less AS num_less, subjects.name AS name_subject, lessens.start_time AS start_less, lessens.end_time AS end_less, lessens.classroom AS classroom 
            FROM lessens 
                INNER JOIN subjects ON lessens.sub_id=subjects.id 
                    WHERE lessens.weekday = $day
                        ORDER BY lessens.num_less ASC";
        $stmt = Dbh::getInstance()->connect()->prepare($query);
        $stmt->execute();
        $result = Dbh::getInstance()->connect()->query($query);
        return $result;
        // looks very strange 
    }
}