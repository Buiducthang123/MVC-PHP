<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>List of Post</h1>

<ul>
    <li>DM sao đéo hiện</li>
    <?php foreach ($data as $post): ?>
        <li>
            Name: <?php print_r($post); ?><br>
            
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>