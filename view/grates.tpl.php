<?php 
  include_once(__DIR__ . '/../config/config.php'); 
  include_once(view('header.php'));
?>
 
<div class="container my-5">
  <table class="table">
    <thead>
  <tbody>
   <?php foreach($subjects as $items): ?>
        <tr>
          <th><?=htmlspecialchars($items['name'])?>  </th>
          <th>  <?=htmlspecialchars($items['sub_id'])?></th>
          <th class="<?=color_сell($items['avg_grade'])?>"><?=htmlspecialchars($items['avg_grade'])?></th>  
          <th class="<?= color_сell($items['first_grade']) ?>"><?=htmlspecialchars($items['first_grade'])?></th>
          <th class="<?= color_сell($items['second_grade'])?>"><?=htmlspecialchars($items['second_grade'])?></th>
        </tr> 
    <?php endforeach; ?>
   </tbody>
  </table>
</div>
<?php  include_once(view('footer.php')); ?>