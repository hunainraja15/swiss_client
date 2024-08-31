<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Swiss Client</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('landing/img/fav.png')}}" rel="icon">
  <link href="{{asset('landing/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('landing/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('landing/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('landing/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('landing/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('landing/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('landing/css/main.css')}}" rel="stylesheet">
<style>
 #shadow-host-companion{
    padding: 0;
  }
  /* General Settings */
  body, html {
  font-family: 'Open Sans', sans-serif;
  background-color: #f5f5f5; /* Light grey background for subtle contrast */
  color: #333; /* Slightly lighter black for softer text */
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  scroll-behavior: smooth;
  line-height: 1.6; /* Improve readability with line-height */
}

/* Header */
.header {
  background-color: #000; /* Black background */
  color: #fff; /* White text */
  padding: 20px 0;
  position: fixed;
  width: 100%;
  z-index: 999;
}

.header .logo img {
  max-height: 60px;
}

/* Style for the specified div */
.container-fluid.container-xl.position-relative.d-flex.align-items-center {
  background-color: #fff; /* White background */
  color: #000; /* Black text */
  padding: 20px;
}

/* Style for the links within the nav menu */
.container-fluid.container-xl.position-relative.d-flex.align-items-center .navmenu a {
  color: #000; /* Black text for nav items */
  text-decoration: none;
}

/* Style for the active or hovered links */
.container-fluid.container-xl.position-relative.d-flex.align-items-center .navmenu a.active, 
.container-fluid.container-xl.position-relative.d-flex.align-items-center .navmenu a:hover {
  color: #ff0000; /* Red text for active or hovered nav items */
}

/* Style for the "Get Started" button */
.container-fluid.container-xl.position-relative.d-flex.align-items-center .btn-getstarted {
  background-color: #ff0000; /* Red background */
  color: #fff; /* White text */
  border: 1px solid #ff0000; /* Red border */
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 5px;
}

.container-fluid.container-xl.position-relative.d-flex.align-items-center .btn-getstarted:hover {
  background-color: #fff; /* White background */
  color: #ff0000; /* Red text */
  border: 1px solid #ff0000; /* Red border */
}

/* Hero Section */
.hero {
  background-color: #000; /* Black background */
  color: #fff; /* White text */
  padding: 100px 0; /* Ensure there's enough space for content */
  text-align: left; /* Align text to the left */
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh; /* Full viewport height */
}

.hero .container {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
}

.hero h1 {
  color: #fff; /* White text */
  font-size: 48px;
  font-weight: 700;
  margin-bottom: 20px;
}

.hero p {
  color: #fff; /* White text */
  font-size: 18px;
  margin-bottom: 30px;
}

.hero .btn-get-started {
  background-color: #ff0000; /* Red background */
  color: #fff; /* White text */
  padding: 10px 30px;
  font-size: 18px;
  font-weight: 600;
  border-radius: 50px;
  text-decoration: none;
  border: 1px solid;
}

.hero .btn-get-started:hover {
  background-color: #fff; /* White background */
  color: #ff0000; /* Red text */
}

.hero .btn-watch-video {
  background-color: #fff; /* White background */
  color: #000; /* Black text */
  padding: 10px 20px;
  border: 2px solid #ff0000; /* Red border */
  border-radius: 50px;
  display: inline-flex;
  align-items: center;
  text-decoration: none;
}

.hero .btn-watch-video i {
  color: #ff0000; /* Red icon */
  font-size: 24px;
  margin-right: 10px;
}

.hero .btn-watch-video:hover {
  background-color: #ff0000; /* Red background */
  color: #fff; /* White text */
}

.hero .hero-img img {
  max-width: 100%;
  height: auto;
  display: block;
  margin: 0 auto;
}

/* Sections */
.section {
  padding: 60px 0;
  color: #000; /* Black text */
}

.section.light-background {
  background-color: #fff; /* White background */
}

.section.dark-background {
  background-color: #000; /* Black background */
  color: #fff; /* White text */
}

.section h2 {
  color: #ff0000; /* Red titles */
  font-size: 36px;
  font-weight: 700;
  margin-bottom: 30px;
  text-align: center;
}

.section p {
  font-size: 16px;
  line-height: 1.6;
}

/* Service Items */
.service-item {
  background-color: #fff; /* White background */
  padding: 30px;
  border: 1px solid #ddd;
  text-align: center;
  border-radius: 8px;
  transition: transform 0.3s;
}

.service-item:hover {
  transform: translateY(-10px);
}

.service-item .icon {
  font-size: 40px;
  color: #ff0000; /* Red icons */
  margin-bottom: 20px;
}

/* Call To Action Section */
.call-to-action {
  background-color: #000; /* Black background */
  color: #fff; /* White text */
  padding: 60px 0;
  position: relative;
  text-align: center;
}

.call-to-action img {
  width: 100%;
  height: auto;
  opacity: 0.2;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1;
}

.call-to-action .container {
  position: relative;
  z-index: 2;
}

.call-to-action h3 {
  color: #fff; /* White text */
  font-size: 36px;
  font-weight: 700;
  margin-bottom: 20px;
}

.call-to-action p {
  font-size: 18px;
  line-height: 1.6;
}

.call-to-action .cta-btn {
  background-color: #ff0000; /* Red background */
  color: #fff; /* White text */
  padding: 10px 30px;
  border-radius: 50px;
  text-decoration: none;
}

.call-to-action .cta-btn:hover {
  background-color: #fff; /* White background */
  color: #ff0000; /* Red text */
}

/* Pricing Section */
.pricing-item {
  background-color: #fff; /* White background */
  padding: 30px;
  border: 1px solid #ddd;
  text-align: center;
  border-radius: 8px;
  transition: transform 0.3s;
}

.pricing-item:hover {
  transform: translateY(-10px);
}

.pricing-item.featured {
  border: 2px solid #ff0000; /* Red border for featured */
}

.pricing-item h3 {
  color: #000; /* Black text */
  font-size: 24px;
  margin-bottom: 20px;
}

.pricing-item h4 {
  color: #ff0000; /* Red price */
  font-size: 36px;
  margin-bottom: 20px;
}

.pricing-item ul {
  list-style: none;
  padding: 0;
  margin-bottom: 20px;
}

.pricing-item ul li {
  font-size: 16px;
  margin-bottom: 10px;
}

.pricing-item .buy-btn {
  background-color: #ff0000; /* Red background */
  color: #fff; /* White text */
  padding: 10px 30px;
  border-radius: 50px;
  text-decoration: none;
}

.pricing-item .buy-btn:hover {
  background-color: #fff; /* White background */
  color: #ff0000; /* Red text */
}

/* Footer */
.footer {
  background-color: #000; /* Black background */
  color: #fff; /* White text */
  padding: 30px 0;
  text-align: center;
}

.footer a {
  color: #ff0000; /* Red text for links */
  text-decoration: none;
}

.footer a:hover {
  color: #fff; /* White text on hover */
}

/* Scroll Top Button */
#scroll-top {
  background-color: #ff0000; /* Red background */
  color: #fff; /* White text */
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed;
  bottom: 20px;
  right: 20px;
  cursor: pointer;
  text-decoration: none;
}

#scroll-top:hover {
  background-color: #fff; /* White background */
  color: #ff0000; /* Red text */
  border: #ff0000 1px solid;
}

/* Responsive adjustments */
@media (max-width: 991.98px) {
  .container-fluid.container-xl.position-relative.d-flex.align-items-center {
    padding: 15px;
  }

  .container-fluid.container-xl.position-relative.d-flex.align-items-center .navmenu {
    background-color: #fff; /* White background for the navmenu on mobile */
    color: #000; /* Black text */
  }

  .container-fluid.container-xl.position-relative.d-flex.align-items-center .navmenu a {
    color: #000; /* Black text for nav items on mobile */
  }

  .container-fluid.container-xl.position-relative.d-flex.align-items-center .btn-getstarted {
    padding: 8px 15px;
    font-size: 14px;
  }
  /* Change color of the mobile navigation toggle icon */
.mobile-nav-toggle {
  color: #000; /* Change this to black */
}

/* Change the color of the mobile navigation toggle icon and its ::before content */
.mobile-nav-toggle::before {
  color: #000; /* Change this to black */
}

/* Optionally, add a hover effect for the ::before pseudo-element */
.mobile-nav-toggle:hover::before {
  color: #ff0000; /* Change this to red when hovered */
}

}
.bi-arrow-up-short:hover{
  color: #ff0000;

}
#header>div{
  height: 60px;
}
.buy-btn{
  color: #ff0000
}
.aos-animate > h2::after {
  background: #f00;
}
.aos-animate>h3, .faq-item>h3, .faq-item>h3>span, .bi-chevron-right{
  color :#f00 !important;
}
.pricing .featured .buy-btn {
  background: #f00; /* Red background */
  border: 1px solid #f00; /* Red border */
  color: #fff; /* White text color */
  padding: 10px 20px; /* Add some padding */
  text-align: center; /* Center the text */
  text-decoration: none; /* Remove underline from links */
  display: inline-block; /* Make sure the button is inline-block */
  transition: all 0.3s ease; /* Smooth transition for all properties */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); /* 3D shadow */
  border-radius: 4px; /* Optional: rounded corners */
}

.pricing .featured .buy-btn:hover {
  background: #c00; /* Darker red on hover */
  border: 1px solid #c00; /* Darker red border on hover */
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.4); /* Enhanced shadow on hover */
  transform: translateY(-2px); /* Lift the button */
}

.pricing-item .buy-btn {
  border: 1px solid #f00; /* Border color */
  background: #fff; /* Background color */
  color: #f00; /* Text color */
  padding: 10px 20px; /* Add padding for a better appearance */
  text-align: center; /* Center the text */
  text-decoration: none; /* Remove underline from links */
  display: inline-block; /* Make sure the button is inline-block */
  transition: background 0.3s, color 0.3s, box-shadow 0.3s, transform 0.3s; /* Smooth transition */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Default shadow for 3D effect */
  border-radius: 4px; /* Rounded corners */
}

.pricing-item .buy-btn:hover {
  background: #f00; /* Background color on hover */
  color: #fff; /* Text color on hover */
  border: 1px solid #fff; /* Border color on hover */
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2); /* Darker shadow for deeper 3D effect */
  transform: translateY(-2px); /* Slightly lift the button */
}
.service-item {
    background-color: #fff;
    color: #000;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* 3D effect */
    transition: transform 0.3s, box-shadow 0.3s;
  }

  .service-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Enhanced 3D effect on hover */
  }



  
</style>

</head>

<body class="index-page">

 <header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center rounded">

    <a href="#hero" class="logo d-flex align-items-center me-auto">
      <!-- Uncomment the line below if you also wish to use an image logo -->
       <img src="{{asset('landing/img/image-removebg-preview.png')}}" alt="" style="min-height: 60px !important;"> 
      {{-- <h1 class="sitename">SWISS CLIENT</h1> --}}
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active">Home</a></li>
        <li><a href="#subscription-info">Subscription Info</a></li>
        <li><a href="#why-us">Why Us</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#call-to-action">Call to Action</a></li>
        <li><a href="#pricing">Pricing</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
    

    <a class="btn-getstarted" href="{{route('register')}}">Get Started</a>

  </div>
</header>


  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>Secure and Reliable Cloud File Server</h1>
            <p>Store, manage, and access your files from anywhere with our top-tier cloud file server solutions. Experience seamless integration, enhanced security, and unparalleled performance.</p>
            <div class="d-flex">
              <a href="{{route('register')}}" class="btn btn-primary btn-get-started">Get Started</a>
              <a href="{{asset('assets/sample video/swiss.webm')}}" class="glightbox btn btn-outline-white btn-watch-video d-flex align-items-center ms-3">
                <i class="bi bi-play-circle me-2"></i><span>Watch Video</span>
              </a>
            </div>
          </div>  
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            {{-- <img src="{{asset('landing/img/hero-img.png')}}" class="img-fluid animated" alt=""> --}}
            <img src="{{asset('landing/img/why-us.png')}}" class="img-fluid animated" alt="">
            {{-- <img src="{{asset('landing/img/images-removebg-preview.png')}}" class="img-fluid animated" alt=""> --}}
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->
    <!-- About Section -->
    <section id="subscription-info" class="subscription-info section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Subscription Information</h2>
      </div><!-- End Section Title -->
    
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>
              After registering on our platform, users will be placed in a waiting queue pending approval from our administrators. This ensures that each user is properly authenticated before gaining access to our premium panel.
            </p>
            <ul style="list-style: none; padding-left: 0;">
              <li><i class="bi bi-check2-circle"></i> <span>Premium subscription at 80 CHF/month.</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Access to the premium panel requires signing a contract and completing payment.</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Automatic subscription activation upon payment via Stripe.</span></li>
            </ul>
          </div>
    
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p>
              Once approved, users will be directed to a subscription information page where they can proceed with signing the contract and entering their payment details. The system will automatically handle the recurring payments through Stripe, ensuring a hassle-free experience.
            </p>
            <p>
              If any issues arise during this process, users are encouraged to contact our administration directly to complete the subscription procedure and gain access to our premium features.
            </p>
            
          </div>
        </div>
      </div>
    </section><!-- /Subscription Information Section -->
    

    

    <!-- Why Us Section -->
<section id="why-us" class="section why-us light-background" data-builder="section">

  <div class="container-fluid">

    <div class="row gy-4">

      <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

        <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
          <h3><span>Why Choose Our Cloud Storage?</span><strong> Secure, Reliable, and Scalable Solutions</strong></h3>
          <p>
            Our cloud storage service is designed to meet the demands of modern businesses and individuals. We offer a secure, scalable, and reliable platform that ensures your data is always accessible when you need it most.
          </p>
        </div>

        <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

          <div class="faq-item faq-active">

            <h3><span>01</span> How secure is your cloud storage?</h3>
            <div class="faq-content">
              <p>We prioritize the security of your data with industry-leading encryption protocols, ensuring that your information is safe from unauthorized access at all times.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

          <div class="faq-item">
            <h3><span>02</span> What makes your service reliable?</h3>
            <div class="faq-content">
              <p>Our cloud infrastructure is built with redundancy and high availability in mind. We guarantee 99.9% uptime, so you can trust that your data will be accessible whenever you need it.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

          <div class="faq-item">
            <h3><span>03</span> Can your cloud storage scale with my needs?</h3>
            <div class="faq-content">
              <p>Our service is fully scalable, allowing you to increase your storage capacity as your needs grow. Whether you're an individual user or a large enterprise, our platform can accommodate your requirements.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

        </div>

      </div>

      <div class="col-lg-5 order-1 order-lg-2 why-us-img">
        <img src="{{asset('landing/img/hero-img.png')}}" class="img-fluid" alt="Cloud Storage" data-aos="zoom-in" data-aos-delay="100">
      </div>
    </div>

  </div>

</section><!-- /Why Us Section -->

   <!-- Services Section -->
<section id="services" class="services section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Services</h2>
    <p>Comprehensive solutions for efficient client management, secure document handling, and seamless cloud integration.</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">

      
      <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
        <div class="service-item position-relative">
          <div class="icon"><i class="bi bi-cloud-upload icon"></i></div>
          <h4><a href="#" class="stretched-link">Cloud Storage</a></h4>
          <p>Securely store and manage client documents with easy retrieval and search functionalities, backed by automatic encryption and backups.</p>
        </div>
      </div><!-- End Service Item -->

      
      <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
        <div class="service-item position-relative">
          <div class="icon"><i class="bi bi-shield-lock icon"></i></div>
          <h4><a href="#" class="stretched-link">Data Security</a></h4>
          <p>Protect sensitive client data with advanced encryption protocols and regular backups to maintain confidentiality and integrity.</p>
        </div>
      </div><!-- End Service Item -->

    </div>

  </div>

</section><!-- /Services Section -->


    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

      <img src="{{asset('landing/img/cta-bg.jpg')}}" alt="">

      <div class="container">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>Call To Action</h3>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="{{route('payment.index')}}">Call To Action</a>
          </div>
        </div>

      </div>

    </section><!-- /Call To Action Section -->


    <!-- Pricing Section -->
  <section id="pricing" class="pricing section light-background">
    <div class="container section-title" data-aos="fade-up">
      <h2>Pricing</h2>
      <p>We offer competitive pricing plans to meet the needs of different users, with flexible subscription options.</p>
    </div>

    <div class="container">
      <div class="row gy-4">
        <!-- Pricing details would go here -->
        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="pricing-item">
            <h3>Free Plan</h3>
            <h4><sup>$</sup>0<span> / month</span></h4>
            <ul>
              <li>No cloud storage</li>
              <li>Video Tutorial</li>
              <li>Basic support</li>
            </ul>
            <a href="{{route('register')}}" class="buy-btn">Sign Up</a>
          </div>
        </div>
        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="pricing-item featured">
            <h3>Premium subscription</h3>
            <h4><sup>$</sup>80<span> / month</span></h4>
            <ul>
              <li>Advanced user management</li>
              <li>Cloud storage 100gb</li>
              <li>Video Tutorial</li>
              <li>Priority support</li>
            </ul>
            <a href="{{route('payment.index')}}" class="buy-btn">Buy Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!-- Faq 2 Section -->
    <section id="faq-2" class="faq-2 section light-background">


  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('landing/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('landing/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('landing/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('landing/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('landing/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('landing/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('landing/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('landing/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('landing/js/main.js')}}"></script>

</body>

</html>