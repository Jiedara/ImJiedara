<body id="app-layout">
    <!-- =========
    Start Wrapper Page
    ===================================-->
    <div id="wrapper">
      <div class="container" >
        <div class="row">
          <div class="col-lg-12">

            <!-- =========
            Start portrait section
            ===================================-->
            <header class="portrait">
              <div class="bg-line"></div>
              <div class="languages">
                <div class="lang-fr ribbon"> <a href="fr" <?php echo $lang == 'fr' ? 'class="active"' : '' ?> >FR</a> </div>
                <div class="lang-en ribbon"> <a href="en" <?php echo $lang == 'en' ? 'class="active"' : '' ?> >EN</a> </div>
              </div>
              <div class="body-portrait">

                <!-- =========
                Start Note Slider
                ===================================-->
                <div class="box-note">
                  <div id="slider-note" class="carousel slide" data-ride="carousel" data-interval="10000">
                    <div class="carousel-inner">
                      <div class="item active">
                        <?php __('presentation'); ?>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- =========
                End Note Slider
                ===================================-->

                <!-- =========
                Start portrait image Section
                ===================================-->
                <div class="portrait-img-area">
                  <img src="img/avatar.jpg" alt="avatar" class="avatar"/>
                  <div class="profile-links">
                    <a target="_blank" href="https://fr.linkedin.com/in/jiedara" class="linkedin" data-toggle="tooltip" data-placement="left" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                    <a target="_blank" href="https://github.com/Jiedara" class="github" data-toggle="tooltip" data-placement="right" title="GitHub"><i class="fab fa-github-alt"></i></a>
                  </div>
                </div>
                <!-- =========
                End  portrait image Section
                ===================================-->

                <!-- =========
                Start Show Yor Name Section
                ===================================-->
                <h1 class="name">Martin Villanove <small><?php __('job_title') ?></small></h1>
                <!-- =========
                Start Show Yor Name Section
                ===================================-->

              </div>
            </header>
            <!-- =========
            End portrait section
            ===================================-->


            <!-- =========
            Start Content section
            ===================================-->
            <section class="content" id="main-content">

              <!-- =========
              Start navigation section
              ===================================-->
              <nav id='navigation'>
                <ul class="navigation-list clearfix list-unstyled">
                  <li class="col-lg-3 no-padding"><a href="#resume" data-toggle="tab" data-menu="resume"><i class="icon-newspaper"></i>  <h2>Curriculum Vitae</h2></a></li>
                  <li class="col-lg-3 no-padding"><a href="#portfolio" data-toggle="tab" data-menu="portfolio"><i class="icon-folder-open"></i> <h2>Portfolio</h2></a></li>
                  <li class="col-lg-3 no-padding"><a href="#contact" data-toggle="tab" data-menu="contact"><i class="icon-mail"></i> <h2>Contact</h2></a></li>
                  <li class="col-lg-3 no-padding"><a href="#cgv" data-toggle="tab" data-menu="cgv"><i class="icon-contract"></i> <h2>Conditions Générales</h2></a></li>
                </ul>
              </nav>
              <!-- =========
              End navigation section
              ===================================-->
