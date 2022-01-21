<?php
if (!defined('ROOT_DIR')) {
    exit('No direct script access allowed');
}

$cubes = [
    [
        'delay' => '0s',
        'top' => '40%',
        'left' => '25%',
    ],
    [
        'delay' => '2s',
        'top' => '50%',
        'left' => '90%',
    ],
    [
        'delay' => '4s',
        'top' => '10%',
        'left' => '90%',
    ],
    [
        'delay' => '6s',
        'top' => '85%',
        'left' => '10%',
    ],
    [
        'delay' => '8s',
        'top' => '10%',
        'left' => '50%',
    ],
    [
        'delay' => '10s',
        'top' => '10%',
        'left' => '10%',
    ],
];

$cubesHTML = '';
foreach ($cubes as $cube) {
    $cubesHTML .= '<div class="cube" style="--delay: ' . $cube['delay'] . '; --top: ' . $cube['top'] . '; --left: ' . $cube['left'] . ';"></div>';
}

?>
<div class="hero">
  <?php echo $cubesHTML; ?>
  <main class="main content container py-5 h-100 text-center d-flex flex-column justify-content-around text-white">
    <div class="mt-5">
      <h1 style="font-weight:900;"><?php echo OpenDereferrer\Config::i()->get('BRAND_NAME'); ?></h1>
      <p class="lead mb-5">The Open-Source, Ad-Free Dereferring Service.</p>
      <form class="form-inline" action="/" method="post" autocomplete="off">
        <div class="input-group">
          <input type="text" name="url" class="form-control form-control-lg"
            placeholder="Enter the URL you want to anonymize" aria-describedby="anonymize">
          <button class="btn btn-primary" type="submit" id="anonymize">Anonymize</button>
        </div>
      </form>
    </div>

    <div class="d-flex flex-column flex-md-row justify-content-between align-self-center"
      style="max-width: 800px;width: 100%;">
      <a class="btn btn-primary my-2 mx-3 flex-fill" href="#documentation" data-anchor="#documentation">
        <span class="mdi mdi-xml" aria-hidden="true"></span>
        Documentation
      </a>
      <a class="btn btn-warning my-2 mx-3 flex-fill" href="<?php echo OpenDereferrer\Config::i()->get('DONATE_URL'); ?>"
        target="_blank">
        <span class="mdi mdi-hand-coin" aria-hidden="true"></span>
        Buy me a coffee
      </a>
      <a class="btn btn-dark my-2 mx-3 flex-fill" href="<?php echo OpenDereferrer\Config::i()->get('GITHUB_URL'); ?>"
        target="_blank">
        <span class="mdi mdi-github" aria-hidden="true"></span>
        View on GitHub
      </a>
    </div>
  </main>
</div>