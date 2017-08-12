<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="alert alert-success">
    <div class="container-fluid">
	  <div class="alert-icon">
		<i class="material-icons">check</i>
	  </div>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true"><i class="material-icons">clear</i></span>
	  </button>
      <b>Sucesso:</b> <?=$message?>
    </div>
</div>