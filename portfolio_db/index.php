<?php
$connection = new PDO('mysql:host=localhost; dbname=practice_2; charset=utf8', 'root', '');
$dataAbout = $connection -> query('SELECT * FROM about');
$dataAbout = $dataAbout -> fetch();
$dataEducation = $connection -> query('SELECT * FROM education');
$dataLang = $connection -> query('SELECT * FROM languages');
$dataInterests = $connection -> query('SELECT * FROM interests');
$dataSummary = $connection -> query('SELECT * FROM summary');
$dataCareer = $connection -> query('SELECT * FROM career');
$dataProjects = $connection -> query('SELECT * FROM projects');
$dataSkills = $connection -> query('SELECT * FROM skills');

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Responsive Resume/CV Template for Developers</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Resume/CV Template for Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 

<body>
    <div class="wrapper">

        <div class="sidebar-wrapper">
            <div class="profile-container">
                <img class="profile" src="assets/images/profile.gif" alt="" />
                <h1 class="name"><?= $dataAbout['name'] ?></h1>
                <h3 class="tagline"><?= $dataAbout['position'] ?></h3>
            </div><!--//profile-container-->
            
            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email"><i class="fa fa-envelope"></i><a href="mailto: <?= $dataAbout['email'] ?>"><?= $dataAbout['email'] ?></a></li>
                    <li class="phone"><i class="fa fa-phone"></i><a href="<?= $data['about']['phone'] ?>"><?= $dataAbout['phone'] ?></a></li>
                    <li class="github"><i class="fa fa-github"></i><a href="<?= $data['about']['url'] ?>" target="_blank"><?= $dataAbout['url'] ?></a></li>
                </ul>
            </div><!--//contact-container-->
            <div class="education-container container-block">
                <h2 class="container-block-title">Education</h2>
                <? foreach ($dataEducation as $education) : ?>
                <div class="item">
                    <h4 class="degree"><?= $education['degree'] ?></h4>
                    <h5 class="meta"><?= $education['university'] ?></h5>
                    <div class="time"><?= $education['startingYear'] ?> - <?= $education['graduationYear']?></div>
                </div><!--//item-->
                <? endforeach; ?>
            </div><!--//education-container-->
            
            <div class="languages-container container-block">
                <h2 class="container-block-title">Languages</h2>
                <ul class="list-unstyled interests-list">
                    <? foreach ($dataLang as $lang) : ?>
                    <li><?= $lang[1] ?> </li>
                    <? endforeach; ?>
                </ul>
            </div><!--//interests-->
            
            <div class="interests-container container-block">
                <h2 class="container-block-title">Interests</h2>
                <ul class="list-unstyled interests-list">
                    <?foreach ($dataInterests as $interest) : ?>
                    <li><?= $interest[1] ?></li>
                   <? endforeach; ?>
                </ul>
            </div><!--//interests-->
            
        </div><!--//sidebar-wrapper-->
        
        <div class="main-wrapper">
            
            <section class="section summary-section">
                <h2 class="section-title"><i class="fa fa-user"></i>Career Profile</h2>
                <div class="summary">
                    <?foreach ($dataSummary as $summary) : ?>
                    <p><?= $summary[1]?></p>
                 <?endforeach;?>
                </div><!--//summary-->
            </section><!--//section-->
            
            <section class="section experiences-section">
                <h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>
                <? foreach ($dataCareer as $career) : ?>
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title"><?= $career['title']?></h3>
                            <div class="time"><?= $career['startingYear']?> - <?= $career['endingYear']?></div>
                        </div><!--//upper-row-->
                        <div class="company"><?= $career['company']?>, <?= $career['city']?></div>
                    </div><!--//meta-->
                    <div class="details">
                        <p><?= $career['duties']?> </p>
                    </div><!--//details-->
                </div><!--//item-->
                <? endforeach; ?>
            </section><!--//section-->
            
            <section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
                <? foreach ($dataProjects as $project) : ?>
                <div class="item">
                    <span class="project-title"><a href="<?= $project['projectLink']?>"><?= $project['projectName']?></a></span> - <span class="project-tagline"><?= $project['projectDesc']?></span>
                </div><!--//item-->
                <? endforeach; ?>
            </section><!--//section-->
            
            <section class="skills-section section">
                <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
                <div class="skillset">
                    <?foreach ($dataSkills as $skill) : ?>
                    <div class="item">
                        <h3 class="level-title"><?= $skill['skillName']?></h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="<?= $skill['skillLevel']?>">
                            </div>                                      
                        </div><!--//level-bar-->                                 
                    </div><!--//item-->
                    <? endforeach; ?>
                </div>  
            </section><!--//skills-section-->

            <form action="" method="POST">
                <input type="text" name="comment">
                <input type="submit">
            </form>
            <? if ( $_POST['comment'] ) :
                    $newComment = htmlspecialchars( $_POST['comment'] );
                    $safe = $connection -> prepare("INSERT INTO `comments` SET comment=:comment");
                    $arr = ['comment' => $newComment ];
                    $safe->execute($arr);
                endif;
                $allComments = $connection -> query("SELECT * FROM comments");
                foreach ($allComments as $comment) :?>
                    <div class="comment"><? echo $comment[1]?></div>
                <? endforeach; ?>
        </div><!--//main-body-->
    </div>
 
    <footer class="footer">
        <div class="text-center">
                <small class="copyright">Designed with <i class="fa fa-heart"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
        </div><!--//container-->
    </footer><!--//footer-->
 
    <!-- Javascript -->          
    <script type="text/javascript" src="assets/plugins/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>    
    <!-- custom js -->
    <script type="text/javascript" src="assets/js/main.js"></script>            
</body>
</html> 

