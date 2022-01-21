<?php
if (!defined('ROOT_DIR')) {
    exit('No direct script access allowed');
}
?>
<section id="documentation" class="py-5 text-white">
  <div class="container">
    <h2>Documentation</h2>

    <?php require __DIR__ . '/documentation/automatic.tpl.php';?>
    <?php require __DIR__ . '/documentation/manual.tpl.php';?>
  </div>
</section>