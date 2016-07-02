@extends('layouts.app')
@section('content')
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
              <div class="body-portrait">

                <!-- =========
                Start Note Slider
                ===================================-->
                <div class="box-note">
                  <div id="slider-note" class="carousel slide" data-ride="carousel" data-interval="10000">
                    <div class="carousel-inner">
                      <div class="item active">
                        A little knowledge that acts is worth infinitely 
                        more than much knowledge that is idle
                      </div>
                      <div class="item">
                        Iam available for freelance, if you need my services please
                        send me an email :)
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
                  <img src="assets/images/avatar.png" alt="avatar" class="avatar"/>
                  <div class="profile-links">
                    <a href="" class="facebook"  data-toggle="tooltip" data-placement="left" title="Facebook"><i class="fa fa-facebook"></i></a>
                    <a href="" class="twitter"  data-toggle="tooltip" data-placement="right" title="Twitter"><i class="fa fa-twitter"></i></a>
                  </div>
                </div>
                <!-- =========
                End  portrait image Section
                ===================================-->

                <!-- =========
                Start Show Yor Name Section
                ===================================-->
                <h1 class="name">Martin Villanove <small>freelance web designer</small></h1>
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
                  <li><a href="#resume" data-toggle="tab" data-menu="resume"><i class="icon-newspaper"></i>  <span>Resume</span></a></li>
                  <li><a href="#portfolio" data-toggle="tab" data-menu="portfolio"><i class="icon-folder-open"></i> <span>Portfolio</span></a></li>
                  <li><a href="#contact" data-toggle="tab" data-menu="contact"><i class="icon-mail"></i> <span>Contact</span></a></li>
                </ul>
              </nav>
              <!-- =========
              End navigation section
              ===================================-->


              <!-- =========
              Start tab content section
              ===================================-->
              <div class="tab-content">

                <!-- =========
                Start resume tab content section
                ===================================-->
                <div id='resume' class="tab-pane fade">
                  <div class="body-content">
                    <div class="row">
                      <div class="col-md-8">


                        <!-- =========
                        Start Time line section
                        ===================================-->
                        <h3 class="title with-icon"><span class="glyphicon glyphicon-plane icn-title"></span> Work History</h3>
                        <div class="box-block">
                          <div class="time-line">
                            <div class="item-event current">
                              <span class="date">2014</span>
                              <div class="event-content">
                                <h4>Web Designer</h4>
                                <h5>Google Inc.</h5>
                                <p>I worked as a Web Developer at Google for 2 years. I create usable web interfaces, front end coding stuff and almost anything. But i love what i do.</p>
                              </div>
                            </div>
                            <div class="item-event">
                              <span class="date">2013</span>
                              <div class="event-content">
                                <h4>Front End Web Developer</h4>
                                <h5>Wrapbootstrap Inc.</h5>
                                <p>As a web designer and developer, my objective is to make a positive impact on clients using my skills and experience to design compelling and building attractive websites.</p>
                              </div>
                            </div>
                            <div class="item-event last">
                              <span class="date">2012</span>
                              <div class="event-content">
                                <h4>Other Job</h4>
                                <h5>Unknown Inc.</h5>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- =========
                        End Time line section
                        ===================================-->

                        <!-- =========
                        Start Time line section
                        ===================================-->
                        <div class="deviter"></div>
                        <h3 class="title with-icon"><span class="fa fa-book icn-title"></span> Education History</h3>
                        <div class="box-block">
                          <div class="time-line">
                            <div class="item-event current">
                              <span class="date">2011</span>
                              <div class="event-content">
                                <h4>Web Designer</h4>
                                <h5 >Google University.</h5>
                                <p>I worked as a Web Developer at Google for 2 years. I create usable web interfaces, front end coding stuff and almost anything. But i love what i do.</p>
                              </div>
                            </div>
                            <div class="item-event">
                              <span class="date">2008</span>
                              <div class="event-content">
                                <h4>Front End Web Developer</h4>
                                <h5>Wrapbootstrap University.</h5>
                                <p>As a web designer and developer, my objective is to make a positive impact on clients using my skills and experience to design compelling and building attractive websites.</p>
                              </div>
                            </div>
                            <div class="item-event last">
                              <span class="date">2006</span>
                              <div class="event-content">
                                <h4>Other Education</h4>
                                <h5>Unknown University.</h5>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- =========
                        End Time line section
                        ===================================-->

                      </div>
                      <div class="col-md-4">
                        <h3 class="title with-icon"><span class="fa fa-code icn-title"></span> Programming Skills</h3>
                        <div class="box-block">


                          <!-- =========
                          STart your Skills Progress bars section
                          ===================================-->
                          <ul class="list-unstyled list-skills">
                            <li>
                              <span class="caption-skill">Ruby On Rails</span>
                              <div class="progress">
                                <div class="progress-bar" style="width: 90%;">
                                  <span>90% </span>
                                </div>
                              </div>
                            </li>
                            <li>
                              <span class="caption-skill">PHP</span>
                              <div class="progress">
                                <div class="progress-bar" style="width: 80%;">
                                  <span>80% </span>
                                </div>
                              </div>
                            </li>
                            <li>
                              <span class="caption-skill">HTML</span>
                              <div class="progress">
                                <div class="progress-bar" style="width: 95%;">
                                  <span>95% </span>
                                </div>
                              </div>
                            </li>
                            <li>
                              <span class="caption-skill">MYSQL</span>
                              <div class="progress">
                                <div class="progress-bar"  style="width: 85%;">
                                  <span>85% </span>
                                </div>
                              </div>
                            </li>
                          </ul>
                          <!-- =========
                          End your Skills Progress bars section
                          ===================================-->

                        </div>
                        <div class="deviter"></div>
                        <h3 class="title with-icon"><span class="fa fa-pencil icn-title"></span> Graphic Skills</h3>
                        <div class="box-block">

                          <!-- =========
                          STart your Skills Progress point bars section
                          ===================================-->
                          <ul class="list-unstyled list-points-progress">
                            <li>
                              <span class="caption-skill">PhotoShop</span>
                              <div class="pogress-point">
                                <span class="point-indicator">90%</span>
                                <div class="progress-bar-point" style="width: 90%;"></div>
                              </div>
                            </li>
                            <li>
                              <span class="caption-skill">CorelDraw</span>
                              <div class="pogress-point">
                                <span class="point-indicator">70%</span>
                                <div class="progress-bar-point" style="width: 70%;"></div>
                              </div>
                            </li>
                            <li>
                              <span class="caption-skill">3D Max</span>
                              <div class="pogress-point">
                                <span class="point-indicator">80%</span>
                                <div class="progress-bar-point" style="width: 80%;"></div>
                              </div>
                            </li>
                          </ul>
                          <!-- =========
                          STart your Skills Progress point bars section
                          ===================================-->


                        </div>
                        <div class="deviter"></div>
                        <h3 class="title with-icon"><span class="fa fa-globe icn-title"></span> Language Skills</h3>
                        <div class="box-block">
                          <ul class="list-unstyled list-strip">
                            <li><i class="fa fa-check"></i> English</li>
                            <li><i class="fa fa-check"></i> Indonesia</li>
                            <li><i class="fa fa-check"></i> Bahasa Sunda</li>
                          </ul>
                        </div>
                        <div class="deviter"></div>
                        <h3 class="title with-icon"><span class="fa fa-file icn-title"></span> Download Cv</h3>
                        <div class="box-block">
                          <p>You can download my CV in pdf format if you like. I love what i do.</p>
                          <a href="#" class="btn btn-flat btn-block"><i class="fa fa-download"></i> Download</a>
                          <div class="text-center">Or</div>
                          <a href="#" class="btn btn-flat btn-block style2"><i class="fa fa-print"></i> Print</a>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
                <!-- =========
                End resume tab content section
                ===================================-->

                <!-- =========
                Start portfolio tab content section
                ===================================-->
                <div id='portfolio' class="tab-pane fade">
                  <div class="body-content">
                    <h3 class="title with-icon"><span class="fa fa-briefcase icn-title"></span> My Works</h3>

                    <!-- =========
                    Start list control postfolio section
                    ===================================-->
                    <div class="text-center">
                      <ul class="control-profolio list-inline">
                        <li class="filter active" data-filter="all">All</li>
                        <li class="filter" data-filter="webdesign">Web Design</li>
                        <li class="filter" data-filter="websiteapp">WebsiteApp</li>
                        <li class="filter" data-filter="mobileapp">MobileApp</li>
                      </ul>
                    </div>
                    <!-- =========
                    End list control postfolio section
                    ===================================-->

                    <!-- =========
                    Start grid postfolio section
                    ===================================-->
                    <ul id='portfolio-grid' class="list-unstyled grid-portfolio">
                      <li class="mix webdesign">
                        <div class="item-portfolio">
                          <a href="assets/images/portfolio/big/pepperoni-273985_1920.jpg" class="preview-portfolio imgWrapper image-popup">
                            <div class="mask"><div class="icn-center"><i class="fa fa-link "></i></div></div>
                            <img src="assets/images/portfolio/01.jpg" alt="" class="img-responsive"/>
                          </a>
                          <div class="desc-portfolio"><h5>PERSONAL  PROJECT <small>a Web Design</small></h5></div>
                        </div>
                      </li>
                      <li class="mix websiteapp">
                        <div class="item-portfolio">
                          <a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="preview-portfolio imgWrapper popup-iframe">
                            <div class="mask"><div class="icn-center"><i class="fa fa-youtube "></i></div></div>
                            <img src="assets/images/portfolio/02.jpg" alt="" class="img-responsive"/>
                          </a>
                          <div class="desc-portfolio"><h5>PERSONAL  PROJECT <small>a Web Design</small></h5></div>
                        </div>
                      </li>
                      <li class="mix webdesign">
                        <div class="item-portfolio">
                          <a href="https://vimeo.com/45830194" class="preview-portfolio imgWrapper popup-iframe">
                            <div class="mask"><div class="icn-center"><i class="fa fa-vimeo-square "></i></div></div>
                            <img src="assets/images/portfolio/03.jpg" alt="" class="img-responsive"/>
                          </a>
                          <div class="desc-portfolio"><h5>PERSONAL  PROJECT <small>a Web Design</small></h5></div>
                        </div>
                      </li>
                      <li class="mix websiteapp">
                        <div class="item-portfolio">
                          <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="preview-portfolio imgWrapper popup-iframe">
                            <div class="mask"><div class="icn-center"><i class="fa fa-map-marker "></i></div></div>
                            <img src="assets/images/portfolio/08.jpg" alt="" class="img-responsive"/>
                          </a>
                          <div class="desc-portfolio"><h5>PERSONAL  PROJECT <small>a Web Design</small></h5></div>
                        </div>
                      </li>
                      <li class="mix mobileapp">
                        <div class="item-portfolio">
                          <a href="assets/images/portfolio/big/knot-252096_1920.jpg" class="preview-portfolio imgWrapper image-popup">
                            <div class="mask"><div class="icn-center"><i class="fa fa-link "></i></div></div>
                            <img src="assets/images/portfolio/04.jpg" alt="" class="img-responsive"/>

                          </a>
                          <div class="desc-portfolio"><h5>PERSONAL  PROJECT <small>a Web Design</small></h5></div>
                        </div>

                      </li>
                      <li class="mix webdesign">
                        <div class="item-portfolio">
                          <a href="assets/images/portfolio/big/pen-62374_1920.jpg " class="preview-portfolio imgWrapper image-popup">
                            <div class="mask"><div class="icn-center"><i class="fa fa-picture-o "></i></div></div>
                            <img src="assets/images/portfolio/05.jpg" alt="" class="img-responsive"/>
                          </a>
                          <div class="desc-portfolio"><h5>PERSONAL  PROJECT <small>a Web Design</small></h5></div>
                        </div>
                      </li>
                      <li class="mix webdesign">
                        <div class="item-portfolio">
                          <a href="assets/images/portfolio/big/steelwool-265850_1920.jpg" class="preview-portfolio imgWrapper image-popup">
                            <div class="mask"><div class="icn-center"><i class="fa fa-picture-o "></i></div></div>
                            <img src="assets/images/portfolio/09.jpg" alt="" class="img-responsive"/>
                          </a>
                          <div class="desc-portfolio"><h5>PERSONAL  PROJECT <small>a Web Design</small></h5></div>
                        </div>
                      </li>
                      <li class="mix mobileapp">
                        <div class="item-portfolio">
                          <a href="assets/images/portfolio/big/glasses-262382_1920.jpg" class="preview-portfolio imgWrapper image-popup">
                            <div class="mask"><div class="icn-center"><i class="fa fa-link "></i></div></div>
                            <img src="assets/images/portfolio/06.jpg" alt="" class="img-responsive"/>
                          </a>
                          <div class="desc-portfolio"><h5>PERSONAL  PROJECT <small>a Web Design</small></h5></div>
                        </div>
                      </li>
                      <li class="mix websiteapp">
                        <div class="item-portfolio">
                          <a href="assets/images/portfolio/big/couple-260899_1280.jpg " class="preview-portfolio imgWrapper image-popup">
                            <div class="mask"><div class="icn-center"><i class="fa fa-picture-o "></i></div></div>
                            <img src="assets/images/portfolio/07.jpg" alt="" class="img-responsive"/>
                          </a>
                          <div class="desc-portfolio"><h5>PERSONAL  PROJECT <small>a Web Design</small></h5></div>
                        </div>
                      </li>
                    </ul>
                    <!-- =========
                    End grid postfolio section
                    ===================================-->


                  </div>
                </div>
                <!-- =========
                End portfolio tab content section
                ===================================-->


                <!-- =========
                Start Contact tab content section
                ===================================-->
                <div id='contact' class="tab-pane fade">
                  <div class="body-content">
                    <h3 class="title with-icon"><span class="fa fa-coffee icn-title"></span> Get In Touch</h3>

                    <!-- =========
                    Start map section
                    ===================================-->
                    <div class="map-area">
                      <div id="map"></div>
                      <div class="info-map">
                        <h3>Contact Info</h3>
                        <ul class="list-unstyled list-info">
                          <li><i class="fa fa-home"></i> Haltern am See, Weseler Str. 151</li>
                          <li><i class="fa fa-phone"></i> +62-867-7887</li>
                          <li><i class="fa fa-facebook"></i> <a href="#">fb link</a></li>
                          <li><i class="fa fa-twitter"></i> <a href="#">twitter link </a></li>
                          <li><i class="fa fa-linkedin"></i> <a href="#">linkedin link</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="deviter"></div>
                    <br/>
                    <!-- =========
                    End map section
                    ===================================-->


                    <!-- =========
                    Start form contact section
                    ===================================-->
                    <form >
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="FullnameForm">Fullname</label>
                            <input type="text" class="form-control" id="FullnameForm" placeholder="Enter Fullname">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="CompanyForm">Company</label>
                            <input type="text" class="form-control" id="CompanyForm" placeholder="Enter Company">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="EmailForm">Email Address</label>
                            <input type="email" class="form-control" id="EmailForm" placeholder="Enter Address">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="PhoneForm">Phone Number</label>
                            <input type="text" class="form-control" id="PhoneForm" placeholder="Enter Phone NUmber">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="MesageForm">Message</label>
                        <textarea class="form-control" rows="8" id="MesageForm" placeholder="Enter Message"></textarea>
                      </div>
                      <button type="submit" class="btn btn-flat btn-lg"><span class="glyphicon glyphicon-send"></span> Send</button>
                    </form>
                    <!-- =========
                    End form contact section
                    ===================================-->

                  </div>
                </div>

              </div>
              <!-- =========
              End tab content section
              ===================================-->


              <a id="backtotop" href="#"><i class="fa fa-arrow-up"></i></a>
              <div class="bg-line"></div>
            </section>
            <!-- =========
            End Content section
            ===================================-->

          </div>
        </div>
      </div>
    </div>
    <!-- =========
    End Wrapper Page
    ===================================-->

    <!-- =========
    Text Showup Wait Document Ready
    ===================================-->
    <div id="wait-page" class="text-center">
      Loading...<br>
      <div class="la-ball-8bits la-2x">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
</div>

    </div>
@endsection
