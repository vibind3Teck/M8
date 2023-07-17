@extends('layout')

@section('main_content')

         <!-- slider area start -->
         <section class="slider__area p-relative" id="home">
            <div class="slider__active swiper-container">
               <div class="swiper-wrapper">
                  <div class="slider__item slider__height slider__overlay include-bg pt-100 pb-100 swiper-slide d-flex align-items-center">
                     <div class="slider__bg p-relative include-bg" data-background="{{ asset('uploads/banner/'.$banner->image_url) }}" 
                      style="background-image: url(_assets/img/slider/slider.html);">
                    
                     </div>
                     <div class="container">
                        <div class="row justify-content-center">
                           <div class="col-xxl-12">
                              <div class="slider__content text-center">
                               <span class="slider__title-pre">{{ $banner->title }}</span> 
                                 <h3 class="slider__title">{{ $banner->description }} </h3>
                                 

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               
               </div>
               <div class="main-slider-dot d-none d-lg-flex"></div>
            </div>
            <div class="mouse-scroll">
               <a href="#tpabout" class="mouse-scroll-btn"></a>
            </div>
         </section>
         
         <!-- slider area end -->
   


         <!-- about us -->
         <section class="support__area p-relative z-index-1 pt-90 " id="aboutus">
           
            <div class="container">
               <div class="row">
                  <div class="col-xxl-8 col-lg-8 ">
                     <div class="support__wrapper pt-25">
                        <div class="section__title-wrapper-7">
                           <span class="section__title-pre-7">Who we are</span>
                           <h3 class="section__title-7 ">{{ $about->title }}</h3>
                        </div>
                        <p>{{ $about->description }}</p>
                      
                     </div>
                  </div>
                  <div class="col-xxl-4 col-lg-4 ">
                     <div class="support__thumb-wrapper pt-140">
                        <div class="support__thumb ">
                           <img class="" src="{{ asset('uploads/about/'.$about->image_url) }}" alt="" height="630">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- about area end -->

        
         <!-- projects start -->
         <section class="portfolio__area pt-110  p-relative fix" id="portfolio">
            <div class="portfolio__shape">
               <img class="portfolio__shape-13" src="assets/img/portfolio/grid/shape/circle-1.html" alt="">
               <img class="portfolio__shape-14" src="assets/img/portfolio/grid/shape/circle-2.html" alt="">
               <img class="portfolio__shape-15" src="assets/img/portfolio/grid/shape/circle-sm.html" alt="">
               <img class="portfolio__shape-16" src="assets/img/portfolio/grid/shape/polygon-yellow.html" alt="">
               <img class="portfolio__shape-17" src="assets/img/portfolio/grid/shape/polygon-pink.html" alt="">
               <img class="portfolio__shape-18" src="assets/img/portfolio/grid/shape/polygon-green.html" alt="">
               <img class="portfolio__shape-19" src="assets/img/portfolio/grid/shape/polygon-green-2.html" alt="">
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="portfolio__section-title-wrapper text-center mb-90">
                        <span class="portfolio__section-title-pre">CHECK OUT OUR LATEST WORK</span>
                        <h3 class="portfolio__section-title">Our Projects</h3>
                     </div>
                  </div>
               </div>
             
               <div class="row tp-gx-4 grid tp-portfolio-load-more" data-show="9">
               @foreach($project  as $p)
                  <div class="col-xl-4 col-lg-4 col-md-6 tp-portfolio grid-item cat1 cat4 cat2">
                     <div class="portfolio__grid-item mb-40 wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                        <div class="portfolio__grid-thumb w-img fix">
                           <a >
                              <img src="{{ asset('uploads/project/'.$p->image_url) }}" alt="">
                           </a>
                           <div class="portfolio__grid-popup">
                              <a href="{{ asset('uploads/project/'.$p->image_url) }}" class="popup-image">
                                 <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.1667 8.33341H0.833333C0.377778 8.33341 0 7.95564 0 7.50008C0 7.04453 0.377778 6.66675 0.833333 6.66675H14.1667C14.6222 6.66675 15 7.04453 15 7.50008C15 7.95564 14.6222 8.33341 14.1667 8.33341Z" fill="currentColor"></path>
                                    <path d="M7.4974 15C7.04184 15 6.66406 14.6222 6.66406 14.1667V0.833333C6.66406 0.377778 7.04184 0 7.4974 0C7.95295 0 8.33073 0.377778 8.33073 0.833333V14.1667C8.33073 14.6222 7.95295 15 7.4974 15Z" fill="currentColor"></path>
                                 </svg>                                    
                              </a>
                           </div>
                        </div>
                    
                     </div>
                  </div>
                  @endforeach
               </div>
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="portfolio__load-more text-center">
                        <button id="tp-load-more" type="button" class="tp-load-more-btn load-more mt-30 mb-50">
                           <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 8.5C1 4.36 4.33 1 8.5 1C13.5025 1 16 5.17 16 5.17M16 5.17V1.42M16 5.17H12.67" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M15.9175 8.5C15.9175 12.64 12.5575 16 8.4175 16C4.2775 16 1.75 11.83 1.75 11.83M1.75 11.83H5.14M1.75 11.83V15.58" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </svg>                              
                           Load more 
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- projects end -->
         <!-- studio start-->

         <section class="portfolio__area pt-110 pb-110 p-relative fix testimonial__gradient-bg " id="studio">
          
            <div class="container">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="portfolio__section-title-wrapper text-center mb-90">
                        <span class="portfolio__section-title-pre">CHECK OUT OUR LATEST WORK</span>
                        <h3 class="portfolio__section-title">Studioxx</h3>
                     </div>
                  </div>
               </div>
             
               <div class="row tp-gx-4 grid tp-portfolio-loado-more" data-show="9">
                  <div class="container">
                    
                   
                     <div class="gallery-wrap">

                     @foreach( $studio  as $s)
                       <div class="item item-1" 
   style="background-image: url( '{{ asset('uploads/studio/'.$s->image_url) }}' ); "></div> 
                    @endforeach
                       
                     </div>
                    </div>
                    <div class="portfolio__nav-5 d-none d-sm-block">
                           <button type="button" class="portfolio-button-prev-5" tabindex="0" aria-label="Previous slide" aria-controls="swiper-wrapper-f172a9ee27c95521"><i class="fa-regular fa-arrow-left"></i></button>
                           <button type="button" class="portfolio-button-next-5" tabindex="0" aria-label="Next slide" aria-controls="swiper-wrapper-f172a9ee27c95521"><i class="fa-regular fa-arrow-right"></i></button>
                    </div>
            </div>
         </section>
      
     
         <!-- studio end -->
         <!-- our Team -->
         <section class="team__area pt-110 ">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="tp-section-wrapper-3 mb-50 text-center">
                        <span class="tp-section-subtitle-3">Our Team</span>
                        <h3 class="tp-section-title-3">Our Team</h3>
                     </div>
                  </div>
               </div>
               <div class="row">
               @foreach( $team  as $t)
                  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                     <div class="team__item-6 mb-80 transition-3 wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="1s">
                        <div class="team__thumb-6 w-img fix">
                           <a >
                              <img src="{{ asset('uploads/team/'.$t->image_url) }}" alt="">
                           </a>
                        </div>
                        <div class="team__content-6 transition-3 text-center">
                           <div class="team__content-6-bg"></div>
                           <h3 class="team__title-6 ">
                              <a>{{$t->name}}</a>
                           </h3>
                           <span class="team__designation-6 ">{{$t->designation}}</span>
                        </div>
                     </div>
                  </div>
                  @endforeach

               </div>
            </div>
         </section>
         <!-- our team -->
         <!-- our team2 start-->
      
         <!-- our team2 end -->
         <!-- lead generation form  start-->
         <section class="contact__area pt-150 pb-80  p-relative z-index-1" id="form">
            <div class="contact__shape">
               <span class="contact__shape-1"></span>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-6">
                     <div class="contact__wrapper-9">
                        <div class="section__title-wrapper-9 mb-85">
                           <h3 class="section__title-9">Start Your project!</h3>
                        </div>
                        <div class="contact__list-9 mr-100">
                           <div class="contact__list-item-9 flex-wrap d-flex align-items-start">
                              <div class="contact__list-icon-9">
                                 <span>
                                    <svg width="24" height="24" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M18.973 15.697C18.973 16.021 18.901 16.354 18.748 16.678C18.595 17.002 18.397 17.308 18.136 17.596C17.695 18.082 17.209 18.433 16.66 18.658C16.12 18.883 15.535 19 14.905 19C13.987 19 13.006 18.784 11.971 18.343C10.936 17.902 9.901 17.308 8.875 16.561C7.84 15.805 6.859 14.968 5.923 14.041C4.996 13.105 4.159 12.124 3.412 11.098C2.674 10.072 2.08 9.046 1.648 8.029C1.216 7.003 1 6.022 1 5.086C1 4.474 1.108 3.889 1.324 3.349C1.54 2.8 1.882 2.296 2.359 1.846C2.935 1.279 3.565 1 4.231 1C4.483 1 4.735 1.054 4.96 1.162C5.194 1.27 5.401 1.432 5.563 1.666L7.651 4.609C7.813 4.834 7.93 5.041 8.011 5.239C8.092 5.428 8.137 5.617 8.137 5.788C8.137 6.004 8.074 6.22 7.948 6.427C7.831 6.634 7.66 6.85 7.444 7.066L6.76 7.777C6.661 7.876 6.616 7.993 6.616 8.137C6.616 8.209 6.625 8.272 6.643 8.344C6.67 8.416 6.697 8.47 6.715 8.524C6.877 8.821 7.156 9.208 7.552 9.676C7.957 10.144 8.389 10.621 8.857 11.098C9.343 11.575 9.811 12.016 10.288 12.421C10.756 12.817 11.143 13.087 11.449 13.249C11.494 13.267 11.548 13.294 11.611 13.321C11.683 13.348 11.755 13.357 11.836 13.357C11.989 13.357 12.106 13.303 12.205 13.204L12.889 12.529C13.114 12.304 13.33 12.133 13.537 12.025C13.744 11.899 13.951 11.836 14.176 11.836C14.347 11.836 14.527 11.872 14.725 11.953C14.923 12.034 15.13 12.151 15.355 12.304L18.334 14.419C18.568 14.581 18.73 14.77 18.829 14.995C18.919 15.22 18.973 15.445 18.973 15.697Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"></path>
                                       <path opacity="0.4" d="M15.8492 7.30039C15.8492 6.76039 15.4262 5.93239 14.7962 5.25739C14.2202 4.63639 13.4552 4.15039 12.6992 4.15039" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       <path opacity="0.4" d="M18.9992 7.3C18.9992 3.817 16.1822 1 12.6992 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <img class="contact-icon-shape" src="assets/img/contact/contact-icon-shape.png" alt="">
                                 </span>
                              </div>
                              <div class="contact__list-content-9">
                                 <h5>Phone Number</h5>
                                 <p><a href="tel:(+91)78457 50828">+91 78457 50828</a><br><br>
                                    <a href="tel:(+91)93441 73449">+91 93441 73449</a></p>
                              </div>
                           </div>
                           <div class="contact__list-item-9 flex-wrap d-flex align-items-start">
                              <div class="contact__list-icon-9">
                                 <span>
                                    <svg width="24" height="20" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M11.5 12.9H4.5C2.4 12.9 1 11.85 1 9.4V4.5C1 2.05 2.4 1 4.5 1H11.5C13.6 1 15 2.05 15 4.5V9.4C15 11.85 13.6 12.9 11.5 12.9Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                       <path opacity="0.4" d="M11.5 4.85059L9.309 6.60059C8.588 7.17459 7.405 7.17459 6.684 6.60059L4.5 4.85059" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>    
                                    <img class="contact-icon-shape" src="assets/img/contact/contact-icon-shape.png" alt="">                                         
                                 </span>
                              </div>
                              <div class="contact__list-content-9">
                                 <h5>Email</h5>
                                 <p><a href="mailto:tvastedesigns@gmail.com"> tvastedesigns@gmail.com</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-6">
                     <div class="contact__form-9 pt-20 pl-70">
                        <h4 class="contact__form-9-title">Let's get in touch </h4>
                        <div class="contact__form-9-inner">
                           <form id="contact-form" action="https://weblearnbd.net/tphtml/harry-prv/harry/assets/mail.php" method="POST">
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="contact__input-9">
                                       <input name="name" type="text" placeholder="Your name*">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="contact__input-9">
                                       <input name="email" type="email" placeholder="Your email address*">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="contact__input-9">
                                       <input name="phone" type="text" placeholder="Mobile number">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="contact__input-9">
                                       <input name="subject" type="text" placeholder="Subject">
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="contact__input-9">
                                       <textarea name="message" placeholder="How can we help you?"></textarea>
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="contact__btn-9">
                                       <button type="submit" class="tp-btn-6 w-100">Submit Now</button>
                                    </div>
                                 </div>
                              </div>
                           </form>
                           <p class="ajax-response"></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>


         <section class="contact__loacation-box-area  pb-90">
            <div class="container">
               <div class="row">
               @foreach( $location  as $l)
                  <div class="col-lg-4 col-md-6">
                     <div class="contact__list-item-9 text-center white-bg mb-30">
                        <div class="contact__location-box-icon">
                           <img src="assets/img/contact/chennai.png" alt="">
                        </div>
                        <div class="contact__location-box-content">
                           <h3 class="contact__location-box-title"> {{$l->location_name}} </h3>

                           <div class="contact__location-box-info">
                              <p><a href="{{$l->loation_url}}">
                               
                                {{$l->address_line_1}}<br>
                                {{$l->address_line_2}}<br>
                                {{$l->address_line_3}}<br>
                                {{$l->address_line_4}}</p>
                             
                           </div>

                           <div class="contact__location-box-btn">
                              <a href="{{$l->loation_url}}" target="_blank" class="tp-btn-border">View Location</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach

               </div>
            </div>
         </section>
         


@endsection