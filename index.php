<?php
session_start();

//$_SESSION['role'] = 'administrateur';
//unset($_SESSION['role']);
$_SESSION['user'] = [
  'username' => 'rakoto',
  'password' => '000'
];
$titre = "Page d'acceuil";
require("./elements/header.php");
?>

<h1 class="mt-5">Sticky footer with fixed navbar</h1>
<p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A
  fixed navbar has been added with <code class="small">padding-top: 60px;</code> on the <code class="small">main &gt; .container</code>.</p>
<p>Back to <a href="../examples/sticky-footer/">the default sticky footer</a> minus the navbar.</p>


<?php require("./elements/footer.php"); ?>