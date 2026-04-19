<head>
        <title><?php $titre ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.86, maximum-scale=5.0, minimum-scale=0.86">
        <?php
            $baseCssVersion = file_exists(__DIR__ . '/../base.css') ? filemtime(__DIR__ . '/../base.css') : time();
            $engine1CssVersion = file_exists(__DIR__ . '/../engine1/style.css') ? filemtime(__DIR__ . '/../engine1/style.css') : time();
            $engine2CssVersion = file_exists(__DIR__ . '/../engine2/style.css') ? filemtime(__DIR__ . '/../engine2/style.css') : time();
            $engine3CssVersion = file_exists(__DIR__ . '/../engine3/style.css') ? filemtime(__DIR__ . '/../engine3/style.css') : time();
            $engine4CssVersion = file_exists(__DIR__ . '/../engine4/style.css') ? filemtime(__DIR__ . '/../engine4/style.css') : time();
            $engine5CssVersion = file_exists(__DIR__ . '/../engine5/style.css') ? filemtime(__DIR__ . '/../engine5/style.css') : time();
            $engine6CssVersion = file_exists(__DIR__ . '/../engine6/style.css') ? filemtime(__DIR__ . '/../engine6/style.css') : time();
        ?>
        <link rel="stylesheet" href="base.css?v=<?= $baseCssVersion ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Roboto+Condensed&display=swap" rel="stylesheet">
        <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="engine1/style.css?v=<?= $engine1CssVersion ?>" />
        <script type="text/javascript" src="engine1/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->
        <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="engine2/style.css?v=<?= $engine2CssVersion ?>" />
        <script type="text/javascript" src="engine2/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->
        <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="engine3/style.css?v=<?= $engine3CssVersion ?>" />
        <script type="text/javascript" src="engine3/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->
        <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="engine4/style.css?v=<?= $engine4CssVersion ?>" />
        <script type="text/javascript" src="engine4/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->
        <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="engine5/style.css?v=<?= $engine5CssVersion ?>" />
        <script type="text/javascript" src="engine5/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->
        <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="engine6/style.css?v=<?= $engine6CssVersion ?>" />
        <script type="text/javascript" src="engine6/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->
        
</head>