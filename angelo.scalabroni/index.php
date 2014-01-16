<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Angelo Scalabroni - Developer, Entrepreneur</title>
        <link rel="stylesheet" href="css/style.css?v=1.0" />

        <link rel="stylesheet" href="css/jquery_ui.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script src="js/custom.js" type="text/javascript"></script>
        <script src="http://www.affableitsolutions.com/js/jquery.validate.min.js" type="text/javascript"></script>
    </head>
    <body>

        <header>
            <div class="wrapper">


                <div class="title">
                    <h2>Angelo&nbsp;Scalabroni</h2>
                    <span class="my_info_top" >p: 813-644-2080</span>
                    <span class="my_info_top">e: angelo@affableitsolutions.com</span>

                </div>

                <nav>
                    <ul>
                        <li><a href="#about">About</a></li>&#8711;
                        <li><a href="#portfolio">Portfolio</a></li>&#8711;
                        <li><a href="#contact">Contact</a></li>&#8711;
                        <li><a href="#networks">Network</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div id="content">
                <section id="about">
                    <h2>About Me</h2>
                    <p>I do what I love, web development. As of 2013 I have put into action my love of programming & design. I strive to create beautifully functional websites & applications and I love learning new things.</p>
                </section>

                <section>
                    <h2 id="portfolio">Portfolio</h2>
                    <div id="accordion">
                        <h3>Websites</h3>
                        <div>
                            <article class="clear">
                                <a href="http://www.affableitsolutions.com"><img class="alignleft" src="images/affsmall.gif" /></a>
                                <p>This is my company's home page.</p>
                                <p>www.affableitsolutions.com</p>
                            </article>
                            <article class="clear">
                                <a href="http://www.zrealtytampa.com"><img class="alignleft" src="images/zrealtysmall.gif" /></a>
                                <p>www.zrealtytampa.com</p>
                            </article>
                        </div>
                        <h3>Apps</h3>
                        <div>
                            <article class="clear">
                                <a href="http://angelo.scalabroni.affableitsolutions.com/apps/TimeTracker/"><img class="alignleft" src="images/actvtrk.gif" /></a>
                                <h4>Activity Tracker</h4>
                                <p>Simple jQuery web app which is kind of a customized stopwatch to let you keep track of your time wasting habits on the web. No download required.</p>
                            </article>
                        </div>
                    </div>

                    <div class="clear"></div>
                </section>

                <section  class="bordered_content">
                    <h2 id="contact">Contact</h2>
                    <span class="contact_info" style="margin:0;">Angelo Scalabroni</span>
                    <span class='contact_info'>813-644-2080</span>
                    <span class='contact_info'>angelo@affableitsolutions.com</span>
                    <span id="ty_msg"></span>
                    <form action="contact.php" method="post" accept-charset="utf-8" class="std-form" id="contact_form">
                        <h3>Send Me A Message:</h3>
                        <div class="ErrContainer">
                            <h4>There were some errors in submitting your form, see below for details.</h4>
                            <ol>
                            </ol>
                        </div>
                        <div class="form-row">
                            <label class="std-label" for="name">Name</label>
                            <input type="text" id="name" title="Fill out your name." name="name" maxlength="60" class="max_chars" value="" data-required="">
                        </div>
                        <div class="form-row">
                            <label class="std-label" for="email">Email</label>
                            <input type="text" id="email" title="You must enter a valid email." name="email" maxlength="255" class="max_chars" value="" data-required="">
                        </div>
                        <div class="form-row">
                            <label class="std-label" for="phone_number">Phone</label>
                            <input type="text" id="phone" title="Your phone number must contain integers only. (May not contain any characters besides 0,1,2,3,4,5,6,7,8,9)" name="phone" maxlength="15" class="max_chars" value="" data-required="">
                        </div>
                        <div class="form-row">
                            <label class="std-label" for="message">Message</label>
                            <textarea id="message" title="Do not leave the message field blank." class="max_chars" name="message" data-required=""></textarea>
                        </div>
                        <div class="form-row">
                            <input type="submit" value="Submit">
                        </div>
                    </form>
                </section>

                <section id="networks">
                    <h2>Network</h2>
                    <a href="https://docs.google.com/document/d/11jIEikfOJ-iZhmeKWiNpOQo3cL4-EEYJKyqemOfTi8A/pub"><img class="one-third first" src="images/downloadresume.gif" /></a>
                    <a href="http://www.linkedin.com/pub/angelo-scalabroni/80/445/324"><img class="one-third" src="images/linkedin.gif" /></a>
                    <a href="#"><img class="one-third last" src="http://placehold.it/200x200" /></a>
                    <a href="http://stackexchange.com/users/3321575/angelo"><img class="one-third first" src="images/stckic.gif" /></a>
                    <a href="#"><img class="one-third" src="http://placehold.it/200x200" /></a>
                    <a href="#"><img class="one-third last" src="http://placehold.it/200x200" /></a>
                </section>
        </div>
    </div>

    <footer>
        <div class="wrapper">
            <!--            Copyright 2014 | By: <a href="index.php">Angelo Scalabroni</a> -->
        </div>
    </footer>

</body>
</html>