<?php
var_dump($_COOKIE);
setcookie('utilisateur', 'ezra', time() + 60 * 60 * 24 * 30);
