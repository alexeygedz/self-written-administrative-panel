<html>
<head>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<ul>
<?php foreach($db->query('SELECT name, url FROM menu_admin ORDER BY sort DESC') as $link): ?>
	<li><a href="<?php echo $link['url']?>"><?php echo $link['name']?></a></li>
<?php endforeach;?>
    <li><a href="/admin/exit.php">Выход</a></li>
</ul>
