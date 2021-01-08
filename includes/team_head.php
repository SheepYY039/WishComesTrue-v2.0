<?php

// $login_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope='.urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email').'&redirect_uri='.urlencode(CLIENT_REDIRECT_URL).'&response_type=code&client_id='.CLIENT_ID.'&access_type=online';
$head_images_array = [
    ['Noshin Chowdhury', 'Communications & Logistics', 'noshin.jpeg'],
    ['Noshin Chowdhury', 'Communications & Logistics', 'ritika.jpeg'],
    ['Noshin Chowdhury', 'Coding', 'jasmine.jpg'],
    ['Noshin Chowdhury', 'Marketing', 'harshita.jpg'],
    ['Noshin Chowdhury', 'Marketing', 'sunwoo.jpeg'],
];
// $head = array_rand($head_images_array, 1);
?>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="style.php/head_img.scss">
</head>

<body>
  <div class="row justify-content-evenly">
    <?php for ($row = 0; $row < count($head_images_array); ++$row) {?>
    <div class="col-md-4 head">
      <div class="head__title"><?php echo $head_images_array[$row][0]; ?>
      </div>
      <div class="head__subtitle">Head of <?php echo $head_images_array[$row][1]; ?>
      </div>
      <div class="head__img">
        <img src="<?php echo '../images/team_head/'.$head_images_array[$row][2]; ?> " />
      </div>
    </div>
    <?php }
    ?>
  </div>


</body>

</html>