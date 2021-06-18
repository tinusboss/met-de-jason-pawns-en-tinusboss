<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fietsen.css">
    <title>Fietsen</title>
</head>
<body>
    <header><?=getHeader();?></header>
    <nav><?=getNav();?></nav>
    <div class="main">
        <aside class="asideLeft"><?=getAside('left')?></aside>
        <section><?=getSection();?></section>
        <aside class="asideRight"><?=getAside('right');?></aside>
    </div>
    <footer><?=getFooter();?></footer>
</body>
</html>