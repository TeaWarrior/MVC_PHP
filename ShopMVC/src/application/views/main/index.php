<p> Main Page </p>

<?php foreach( $news as $val): ?>


 <h3><?php echo $val['newsTitle']; ?></h3>
  <p>  <?php echo $val['newsText']; ?></p>
<hr>


<?php endforeach; ?>





