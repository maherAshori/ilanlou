<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger text-right" onclick="this.classList.add('hidden');"><?= $message ?></div>
