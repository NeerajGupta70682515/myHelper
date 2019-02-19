<?php $this->load->view("top_application");?>
     <!-- section featured -->
    <section id="featured">

      <!-- slideshow start here -->

      <div class="camera_wrap" id="camera-slide">
        <?php
                   foreach($slider as $s)
                   {
                ?>
        <!-- slide 1 here -->
        <?php  //$slider_path = "banner/".$s['banner_image']; ?>
        <div data-src="<?php echo get_image('banner',$s['banner_image'],'1379','495 ','R'); ?>">
          <div class="camera_caption fadeFromLeft">
            
              <div class="row">
                <div class="aligncenter">
                  <!--<img src="<?php //echo base_url().'uploaded_files/'.$slider_path;?>" alt="" class="animated bounceInDown delay1" />-->

                  <img src="<?php echo get_image('banner',$s['banner_image'],'1379','495 ','R'); ?>" alt="<?php echo $s['banner_id'];?>" class="animated bounceInDown delay1">
                </div>
              </div>
            
          </div>
        </div>
         <?php 
              }
          ?>

      </div>

      <!-- slideshow end here -->

    </section>
<div class="container">
<div class="menu-box">
   <div class="row nomargin">
     <nav class="navbar-story">
         <ul>
          <li><a href="#"><i class="fa fa-check-circle" aria-hidden="true"></i><br />Success Story</a></li>
          <li><a href="#"><i class="fa fa-file" aria-hidden="true"></i><br />G.K Updates</a></li>
          <li><a href="#"><i class="fa fa-book" aria-hidden="true"></i><br />Aptitude Training</a></li>
          <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i><br />Student Login</a></li>
          <li><a href="#"><i class="fa fa-download" aria-hidden="true"></i><br />Downloads</a></li>
          <li><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i><br />Demo Class</a></li>
         </ul>
       </nav>
  </div>
</div>
</div>
<section id="works">
      <div class="container">
        <div class="row">
          <div class="span12">
            <h4 class="title news"><i class="fa fa-newspaper-o" aria-hidden="true"></i>News</h4>
            <div class="row">

              <div class="grid cs-style-4">
              <?php
                foreach($news as $n)
              {
              ?>
                <div class="span3">
                  <div class="item">
                    <figure>
                      <?php // $product_path = "news/".$n['news_image']; ?>
                      <div><img src="<?php echo get_image('news',$n['news_image'],'270','180 ','R'); ?>" alt="" /></div>


                      <figcaption>  
                       <span>
                          <a href="<?php echo get_image('news',$n['news_image'],'500','400 ','R'); ?>" data-pretty="prettyPhoto[gallery1]" title="Portfolio caption here"><i class="icon-plus icon-circled icon-bglight icon-2x"></i></a>
                      </span>
                      <span>
                          <a href="#"><i class="icon-file icon-circled icon-bglight icon-2x"></i></a>
                      </span>
                      </figcaption>
                    </figure>
                    <div class="news-para">
                      <h2><?php echo char_limiter(strip_tags($n['news_title']),40);?></h2>
                          <p><span><i class="fa fa-calendar"></i></span><?php echo date("M d, Y", strtotime($n['recv_date']));?></p>
                          <p><?php echo char_limiter(strip_tags($n['news_description']),100);?></p>
                          <p><a href="<?php echo base_url('news/details/'. $n['news_id']);?>">Read More...</a></p>
                    </div>
                  </div>
                </div>
              <?php 
                }
              ?>
                <div class="span3">
                  <div class="links">
                    <h2>Quick Links</h2>
                     <ul>
                       <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Announcmetns</a></li>

                       <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Online Registration</a></li>

                       <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">online Test Series</a></li>

                       <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Sample papers</a></li>

                       <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Books</a></li>

                       <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Question papers</a></li>

                       <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">previous year paper</a></li>

                       <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Downloads</a></li>

                       <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">App download</a></li>

                     </ul>
                  </div>
                </div>
                <div class="span3">
                  <div class="resistration form">
                      <h2>Request Callback</h2>
                        <?php echo form_open('home');?>
                       <p style="color:white;"><?php echo validation_message();?>
                        <?php echo error_message(); ?></p>
                      
                         <input type="text" name="first_name" placeholder="Name" value="<?php echo set_value('first_name');?>" >
                         <input type="text" name="mobile" placeholder="Mobile No." maxlength="10" minlenght="10" value="<?php echo set_value('mobile');?>">
                         <input type="email" name="email" placeholder="E-mail" value="<?php echo set_value('email');?>">
                         <input type="text" name="Address" placeholder="Address" >
                         <textarea type="message" name="message" placeholder="Query" ><?php echo set_value('message');?></textarea><br />
                         <input  type="submit" name="submit" value="Submit" class="button">
                         <input type="hidden" name="action" value="callback">
                         <input type="hidden" name="call" id="call" value="<?php echo 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>" />
                         <?php echo form_close();?>
                  </div>                   
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<section class="wrap-2">
  <div class="container">
    <div class="row">
     <div class="col-12 course">
     <span class="news"><i class="fa fa-clone" aria-hidden="true"></i>Course</span>
    </div>
  </div>
     <div class="slideshow-container">
      <?php
                $cat_limit = 0;
                $this->load->model(array('category/category_model'));
                $condtion_array = array(
                'field' =>"*,( SELECT COUNT(category_id) FROM tbl_categories AS b
                WHERE b.parent_id=a.category_id ) AS total_subcategories",
                'condition'=>"AND parent_id = '0' AND status='1' ",
                'condition'=>"AND parent_id = '0' AND status='1' ",
                'limit'=>$cat_limit,
                'offset'=>0,
                'debug'=>FALSE
                );  
                $cat_res            = $this->category_model->getcategory($condtion_array);
                $total_cat_found    =  $this->category_model->total_rec_found;  
          ?>

<div class="row">
      <div class="carousel slide" id="theCarousel" data-ride="carousel" data-type="multi" data-interval="1000">
        <div class="carousel-inner">
          <?php
                    if( is_array($cat_res) && !empty($cat_res))
                    {
                        $i=0;
                        foreach($cat_res as $v)
                        {
                
                        $total_subcategories = $v['total_subcategories'];
               
                         if($total_subcategories>0)
                        {               
                            $link_url = base_url()."category/index/".$v['category_id'];   
                
                        }
                        else
                        {           
                            $link_url = base_url()."courses/index/".$v['category_id'];  
                        }
        
                ?>


          <div class="item <?php if($i==0){ ?> active <?php } ?>">
            <div class="span3">
      <div class="news2">
       <img src="<?php echo get_image('category',$v['category_image'],'180','161','R'); ?>" style="height:125px;" alt="">
    </div>
       <div class="bank">
         <h2><?php echo  character_limiter(strip_tags($v['category_name']),15);?></h2>
       <p><a href="<?php echo $link_url;?>">Classroom Courses</a></p>
       <p><a href="<?php echo $link_url;?>">Online Test Series</a></p>
       <p><a href="<?php echo $link_url;?>">Study Materials</a></p>
       </div>
    </div>
          </div>
           <?php
                    $i++;
                    }
                    }
                    else
                    {
                     echo "<strong>No Category Here.</strong>";
                    }
                ?>
        
       
          
      
          
          <!-- add  more items here -->
          <!-- Example item start:  -->
          <!--  Example item end -->
  </div>
        <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
        <a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="fa fa-chevron-right"></i></a>
      </div>
  </div>
</div>

    <!-- Left and right controls -->
  
  </div>
</section>


<div class="wrap-3">
  <div class="container">
   <div class="12 course">
      <span class="news"><i class="fa fa-caret-square-o-right" aria-hidden="true"></i>Photo &amp; Video Gallery</span>
  </div>
    <div class="row">
   <div class="grid cs-style-4">
     <div class="span6 photo">
    <figure>
      <div class="photo-gallery">
        <h2>Photo Gallery</h2>
          <?php
            foreach($gallery as $g)
            {           
          ?>
            
            <img src="<?php echo get_image('gallery',$g['gallery_image'],'270','180 ','R'); ?>" style="height:110px; width:100px;" alt="">
          <?php 
            }
          ?>
      <p><button><a href="<?php echo base_url();?>photo-gallery">View All</a></button></p>
    </div>
                      <figcaption>
                        <div>
                          <span>
                <a href="<?php echo get_image('gallery',$g['gallery_image'],'270','180 ','R'); ?>" data-pretty="prettyPhoto[gallery1]" title="Portfolio caption here"><i class="icon-plus icon-circled icon-bglight icon-2x"></i></a>
                </span>
                          <span>
                <a href="#"><i class="icon-file icon-circled icon-bglight icon-2x"></i></a>
                </span>
                        </div>
                      </figcaption>
                    </figure>
     </div>
     </div>

      <div class="grid cs-style-4">
        <div class="span6 video">
          <figure>
            <div class="video-gallery">
              <h2>Video Gallery</h2>
              <?php
                foreach($video as $v)
                {           
              ?>
              <div class="video_box">
                             <iframe class="embed-responsive-item" src="<?php echo $v['video_file'];?>" width="100%" height="303px" frameborder="0" allowfullscreen></iframe>
                            </div>
              <?php 
              }
              ?>
              <p><button><a href="<?php echo base_url();?>video-gallery">View All</a></button></p>
            </div>
            <figcaption>
              <div>
                <span>
                  <a href="<?php echo $v['video_file'];?>" target="_blank" title="Portfolio caption here"><i class="icon-plus icon-circled icon-bglight icon-2x"></i></a>
                </span>
                <span>
                  <a href="#"><i class="icon-file icon-circled icon-bglight icon-2x"></i></a>
                </span>
              </div>
            </figcaption>
          </figure>
        </div>
      </div>

  </div>
  </div>
</div>
    <!-- /section featured -->

    <section id="content" class="wrap-4">
      <div class="container">
          <div class="span12">
            <div class="row">

              <div class="span3">
                  <div class="student">
         <h2>Quick Links</h2>
       <ul>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Time Table</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">E-Books</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Current Gk</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Sample papers</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Student Transfer</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Question papers</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">previous year paper</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Downloads</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">App download</a></li>
       </ul>
       </div>
                </div>

              <div class="span3">
                  <div class="student">
         <h2>Quick Links</h2>
       <ul>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Announcmetns</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Online Registration</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">online Test Series</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Sample papers</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Books</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Question papers</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">previous year paper</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">Downloads</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">App download</a></li>
       </ul>
       </div>
                </div>

              <div class="span3">
                  <div class="vacancy">
         <h2>Quick Links</h2>
       <ul>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">SCC</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">BANK</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">JEE</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">IBPS</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">UPSC</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">SCC</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">BANK</a></li>
         <li><a href="#"><img src="<?php echo theme_url();?>img/quicklinks.png" alt="">SSC</a></li>
       </ul>
       <p><button><a href="#">View More</a></button></p>
       </div>
                </div>

              <div class="span3">
                  <div class="payment">
         <h2>Quick Links</h2>
       <img src="<?php echo theme_url();?>img/payment.png" alt="">
       <p>Through online payment, the procedure
                of enrolment is accelerated and simplified 
                respectively. Students are offered an 
                option of making the payment online 
                platform which is safe and secured.
             </p>
       <p><button><a href="#">Pay Now</a></button></p>
      </div>
                </div>
            </div>

          </div>


        </div>
</div>
    </section>
  <section class="wrap-5">
   <div class="container">
    <?php
                foreach($aboutus as $a)
                {           
              ?>
    <div class="row">
      <div class="span12">
        <div class="message">
        <h2><?php echo $a['aboutus_title'];?></h2>
      </div>
        </div>
     <div class="span6">
       <div class="message">
       
       <img src="<?php echo theme_url();?>img/borderline.png" alt="">
       <p>
         <?php echo char_limiter(strip_tags($a['aboutus_description']),1000);?>
       </p>
     </div>
     </div>
     <div class="grid cs-style-4">
     <div class="span6">
       <figure>
                      <div><img src="<?php echo get_image('aboutus',$a['aboutus_image'],'1350','500','R'); ?>" alt="" class="img-responsive"></div>
                      <figcaption>
                        <div>
                          <span>
                <a href="<?php echo get_image('aboutus',$a['aboutus_image'],'1350','500','R'); ?>" data-pretty="prettyPhoto[gallery1]" title="Portfolio caption here"><i class="icon-plus icon-circled icon-bglight icon-2x"></i></a>
                </span>
                          <span>
                <a href="#"><i class="icon-file icon-circled icon-bglight icon-2x"></i></a>
                </span>
                        </div>
                      </figcaption>
        </figure>
     </div>
     </div>
  </div>
   <?php 
            }
          ?>
  </div>
</section>
<section class="wrap-6">
  <div class="container">
    <div class="row">
     <div class="span2">
        <div class="subject">
         <h2>Subjects</h2>
       <ul>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Ssc je</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Dmrc je</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Rrb je</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">State JE/AE</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">cmrc je</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Nmrc je</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Uppcl</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Bsnl je</li>
         <p><a href="#">View More...</a></p>
       </ul>
       </div>
     </div>
     <div class="span2">
       <div class="subject">
     <h2>courses</h2>
     <ul>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Ssc je</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Dmrc je</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Rrb je</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">State JE/AE</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">cmrc je</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Nmrc je</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Uppcl</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Bsnl je</li>
         <p><a href="#">View More...</a></p>
       </div>
     </div>
     <div class="span2">
       <div class="subject">
         <h2>10th & 12th Tutions</h2>
       <ul>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Science</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Mathes</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">History</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Social science</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">English</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Science</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Mathes</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">History</li>
         <p><a href="#">View More...</a></p>
       </ul>
       </div>
     </div>
     <div class="span2">
       <div class="subject">
         <h2>Class Room Programs</h2>
       <ul>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Science</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Mathes</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">History</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Social science</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">English</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Science</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Mathes</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">History</li>
         <p><a href="#">View More...</a></p>
       </ul>
       </div>
     </div>
     <div class="span2">
       <div class="subject">
         <h2>Upcomings Batches</h2>
       <ul>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Science</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Mathes</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">History</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Social science</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">English</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Science</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Mathes</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">History</li>
         <p><a href="#">View More...</a></p>
       </ul>
       </div>
     </div>
     <div class="span2">
       <div class="subject">
         <h2>Others</h2>
       <ul>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Science</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Mathes</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">History</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Social science</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">English</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Science</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">Mathes</li>
         <li><img src="<?php echo theme_url();?>img/arrow.png" alt="">History</li>
         <p><a href="#">View More...</a></p>
       </ul>
       </div>
     </div>
  </div>
  </div>
</section>
<?php $this->load->view("bottom_application");?>