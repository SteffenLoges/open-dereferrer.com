<?php
if (!defined('ROOT_DIR')) {
    exit('No direct script access allowed');
}
?>
<div class="card bg-dark text-white mt-4">
  <div class="card-body">
    <h5 class="card-title">Automatic Integration</h5>
    <p class="card-text">
      The Open-Dereferrer service can automatically update all existing URL's on your website.<br>
      Copy-paste the script into the <code>&lt;head&gt;</code> section of your website.
      <?php require __DIR__ . '/examples/automatic.php';?>
      <small>
        You can also <a href="https://api.open-dereferrer.com/v1/plain" target="_blank">download</a> the unminified
        version for
        self-hosting.
      </small>
    </p>
  </div>
</div>