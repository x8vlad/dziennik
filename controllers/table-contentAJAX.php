<?php
  // т е аналог для mysqli_fetch_assoc()
  include_once(__DIR__ . '/../config/config.php');
  include_once(ROOT_PATH  . '/database.php');
  
  $result = $conn->query("SELECT * FROM announcement ORDER BY created_at ASC");

  while($row = $result->fetch(PDO::FETCH_ASSOC)){
    echo '<tr id="announcement-' . $row['id'] . '">';
      echo '<td>' . $row['id'] . '</td>';

      echo '<td class="announcement-title" data-title="'.htmlspecialchars($row['title'], ENT_QUOTES).'" >' . htmlspecialchars($row["title"], ENT_QUOTES)  . '</td>';
      echo '<td class="announcement-content" data-content= "'. htmlspecialchars($row["content"], ENT_QUOTES) .'" >' . htmlspecialchars($row["content"], ENT_QUOTES) . '</td>';
      echo '<td>' . $row['created_at'] . '</td>';
      echo '<td><button class="btn btn-outline-dark editBtn me-2" data-id="'.$row['id'].'">Edit</button>';
      echo '<button class="btn btn-outline-danger DeleteBtn" data-id="'.$row['id'].'">Delete</button></td>';
      // echo '<script>console.log("Button ID: ' . $row['id'] . '");</script>'; k its work
    echo '</tr>';
  }