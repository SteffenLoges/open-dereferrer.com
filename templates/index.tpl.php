<?php
if (!defined('ROOT_DIR')) {
    exit('No direct script access allowed');
}
?>

<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/blocks/header.tpl.php';?>

<body <?php if (isset($modal_show) && $modal_show) {echo 'class="overflow-hidden"';}?>>
  <?php if (isset($invalidURLWarning) && $invalidURLWarning) {require __DIR__ . '/blocks/invalidURL.tpl.php';}?>
  <?php if (isset($modal_show) && $modal_show) {require __DIR__ . '/blocks/modal.tpl.php';}?>
  <?php require __DIR__ . '/blocks/hero.tpl.php';?>
  <?php require __DIR__ . '/blocks/documentation.tpl.php';?>
  <?php require __DIR__ . '/blocks/footer.tpl.php';?>
</body>

</html>