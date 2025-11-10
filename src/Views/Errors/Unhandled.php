<h2>An error occurred</h2>
<?php if (getenv('ENV') == 'dev'): ?>
  <p><code><?= $model['message'] ?></code></p>
<?php else: ?>
  <p>Something went wrong. Please contact site admin for help.</p>
<?php endif; ?>