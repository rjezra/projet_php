<?php
$passe = password_hash('admin', PASSWORD_DEFAULT, ['cost' => 12]);
//echo $passe;
var_dump(password_verify('admin', '$2y$12$zg7fQ9GrYpF8dWGKBp/SkOyQAc6bW0ioBc0W0pe5Pc51EQH7AR.5C'));
