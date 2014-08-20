<?php session_start(); ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <title>Contact || LeeAnn Kinney</title>
    <meta charset="utf-8">
    <meta name="description" content="Contact me. LeeAnn Kinney ~ web developer based in Philadelphia, PA.">
    

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Skeleton Base CSS
  ================================================== -->
    <link rel="stylesheet" href="stylesheets/base.css">
    <link rel="stylesheet" href="stylesheets/skeleton.css">
    <link rel="stylesheet" href="stylesheets/layout.css">

    <!-- Google Fonts
  ================================================= -->
    <link href='http://fonts.googleapis.com/css?family=Noto+Serif' rel='stylesheet' type='text/css'>
                
    <!-- Custom CSS
  ================================================== -->
    <link rel="stylesheet" href="jqueryui/themes/custom-theme/jquery.ui.all.css">
    <link rel="stylesheet" href="stylesheets/override.css">
    
    <!-- IE Shim
  ================================================== -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!-- Favicons for iOS
  ================================================== -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
</head>
<body>

<!-- Primary Page Layout
================================================== -->
<header>
    <div class="sixteen columns omega">
        <h1 class="name"><a href="index.html">LeeAnn Kinney</a></h1>
    </div>
        
    <div class="six columns alpha">
        <nav>
            <ul id="nav">
                <li class="current"><a href="contact.php">Contact</a></li>
                <li><a href="work.html">Work</a>  
            </ul>
        </nav>
    </div>
</header>

    <div class="container">  
            
        <h1 class="contact">Let's talk!</h1>
        
        <h2 class="contact">Please use the form below to contact me with questions, comments, job opportunities, etc.</h2>
            <?php
                $cf = array();
                $sr = false;

                if(isset($_SESSION['cf_returndata'])){
                    $cf = $_SESSION['cf_returndata'];
                    $sr = true;
                }
            ?>
                
            <ul id="errors" class="<?php echo ($sr && !$cf['form_ok']) ? 'visible' : ''; ?>">
                <li id="info">Whoops! Looks like there was a problem with one of your submissions. Please try again.</li>
                <?php 
                if(isset($cf['errors']) && count($cf['errors']) > 0) :
                        foreach($cf['errors'] as $error) :
                ?>
                <li><?php echo $error ?></li>
                <?php
                    endforeach;
                endif;
              ?>
            </ul>
            
            <p id="success" class="<?php echo ($sr && $cf['form_ok']) ? 'visible' : ''; ?>">Thanks for dropping me a line! If a response is needed I'll get back to you as soon as I can!</p>
                
            <div id="contact-form" class="clearfix">
                <form method="post" action="process.php">
                    <label for="name">Name: <span class="required">*</span></label>
                    <input type="text" id="name" name="name" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['name'] : '' ?>" placeholder="Buster Bluth" required autofocus />

                    <label for="company">Company: </label>
                    <input type="text" id="company" name="company" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['company'] : '' ?>" />

                    <label for="email">Email: <span class="required">*</span></label>
                    <input type="email" id="email" name="email" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['email'] : '' ?>" placeholder="busterbluth@example.com" required />

                    <label for="telephone">Telephone: </label>
                    <input type="tel" id="telephone" name="telephone" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['telephone'] : '' ?>" />

                    <label for="inquire">Interested in: </label>
                    <select id="inquire" name="inquire">
                        <option value="general" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['inquire'] == 'general') ? "selected='selected'" : '' ?>>General</option>
                        <option value="job_opportunity" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['inquire'] == 'job_opportunity') ? "selected='selected'" : '' ?>>Job Opportunity</option>
                        <option value="freelance_opportunity" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['inquire'] == 'freelance_opportunity') ? "selected='selected'" : '' ?>>Freelance Opportunity</option>
                    </select>

                    <label for="message">Message: <span class="required">*</span></label>
                    <textarea id="message" name="message" placeholder="Your message must be greater than 20 characters" required data-minlength="20"><?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data'] ['message'] : '' ?></textarea>

                    <span id="loading"></span>
                    <input type="submit" value="submit" id="submit-button" />
                    <p id="req-field-desc"><span class="required">*</span> indicates required field</p>
                </form>
                <?php unset($_SESSION['cf_returndata']); ?>
            </div>  


    </div> <!--end container-->
                
        

        
<div class="footer">
    <footer class="row">
        <div class="nine columns alpha social">
            <a href="http://www.linkedin.com/in/leeannkinney"><img src="images/linkedin.png" alt="linkedin" width="40" height="40"></a>
            <a href="http://http://twitter.com/LeeAnimal77"><img src="images/twitter.png" alt="facebook" width="40" height="40"></a>
        </div>
            
        <address class="seven columns omega">
            <p>Philadelphia, PA 19148<br>
            Tel: <a href="tel:+1-215-962-3687">215-962-3687</a><br>
            Email: <a href="mailto:leeann.a.kinney@gmail.com">leeann.a.kinney@gmail.com</a></p>
            
            <div class="one columns omega headerRight">
                <p class="scroll"><a href="javascript:scroll(0,0)">Top &uarr;</a></p>
            </div>
            
            
        </address>
    </footer>
</div>
    <!-- jQuery CDN and Related
      ================================================== -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
    <script src="js/plugins.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/vendor/modernizr-2.6.2.min.js"></script> 
    <script src="javascripts/bucket.js"></script>
    <!-- End Document
        ================================================== -->
</body>
</html>