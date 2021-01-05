<?php
//The first block of code used in every page of the template - includes for extra plugin CSS files
?>
    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
    <link rel="stylesheet" id="css-main" href="<?php echo $cb->assets_folder; ?>/css/codebase.min.css">
    <?php if ($cb->theme) { ?>
    <link rel="stylesheet" id="css-theme" href="<?php echo $cb->assets_folder; ?>/css/themes/<?php echo $cb->theme; ?>.min.css">
    <?php } ?>
    <!-- END Stylesheets -->
</head>
<body>
