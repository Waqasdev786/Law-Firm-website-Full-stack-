<?php
if (auth()->check()) {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    header('Location: /');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Law Firm | Navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  
  <link rel="stylesheet" href="{{ asset('assets/app.css') }}">
</head>

<body>

 <!-- ===== Navbar Start ===== -->
<nav class="navbar navbar-expand-lg navbar-custom shadow-sm py-2">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="bi bi-bank"></i> Law Firm
        </a>

        <button class="navbar-toggler text-white" type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" 
                aria-controls="navbarNav" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
            <i class="bi bi-list" style="font-size: 1.8rem;"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            
            {{-- Left side links --}}
            <ul class="navbar-nav mb-2 mb-lg-0 me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="bi bi-house-door-fill me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">
                        <i class="bi bi-info-circle-fill me-1"></i> About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">
                        <i class="bi bi-briefcase-fill me-1"></i> Services
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#lawyers">
                        <i class="bi bi-people-fill me-1"></i> Lawyers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">
                        <i class="bi bi-envelope-fill me-1"></i> Contact
                    </a>
                </li>
            </ul>

            {{-- Right side — Login/Logout --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">

                @auth
                    {{-- Admin naam --}}
                    <li class="nav-item">
                        <span class="nav-link text-white">
                            <i class="bi bi-person-circle me-1"></i>
                            {{ auth()->user()->name }}
                        </span>
                    </li>

                    {{-- Admin Panel --}}
                    <li class="nav-item me-2">
                        <a href="{{ route('employee.index') }}" 
                           class="btn btn-appointment d-flex align-items-center">
                            <i class="bi bi-speedometer2 me-2"></i> Admin Panel
                        </a>
                    </li>

                    {{-- Logout --}}
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" 
                                    class="btn btn-outline-light d-flex align-items-center">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                @endauth

                @guest
                    {{-- Login Button --}}
                    <li class="nav-item">
                        <a href="{{ route('login') }}" 
                           class="btn btn-appointment d-flex align-items-center">
                            <i class="bi bi-lock-fill me-2"></i> Admin Login
                        </a>
                    </li>
                @endguest

            </ul>

        </div>
    </div>
</nav>
<!-- ===== Navbar End ===== -->
<!-- ===== Navbar End ===== -->
  <!-- //second section // -->

  <div class="ticker-container">
    <div class="ticker-text">
      ⚖️ Integrity • Expertise • Justice for Every Client • Free Consultation: +92 300 1234567 • Civil | Criminal | Family | Corporate • Trusted Since 2001 ⚖️
    </div>
  </div>

  <!-- Banner Section -->
  <section class="banner">
    <div class="banner-content">
      <h1 class="display-4 fw-bold">Welcome to Our Law Firm</h1>
      <p class="lead mb-3">Justice. Integrity. Excellence.</p>
      <div class="social-links">
        <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-facebook face"></i></a>
        <a href="https://linkedin.com" target="_blank"><i class="fa-brands fa-linkedin link"></i></a>
        <a href="https://instagram.com" target="_blank"><i class="fa-brands fa-instagram insta"></i></a>
      </div>
    </div>
  </section>



  <!-- --Banner end-- -->

  <!-- ---Introduction start-- -->

<section class="py-5 intro-section" style="background-color:#f5f6f8;" id="about">

  <!-- Section Heading -->
  <div class="text-center mb-5">
    <h1 style="color:#0b1b33; font-family:'Playfair Display', serif; font-weight:700;">
      <i class="bi bi-info-circle-fill" style="color:#c6a664;"></i> About Us
    </h1>
    <p style="color:#555; font-family:'Poppins', sans-serif; font-size:1.05rem;">
      Learn more about our history, values, and commitment to justice.
    </p>
  </div>

  <div class="container">
    <div class="row align-items-center g-5">

      
      <div class="col-md-6 mb-4 mb-md-0">
        
         <img src="{{ asset('assets/images/intro.jpg') }}" alt="Site Logo" class="img-fluid rounded shadow-lg">
          

      </div>

      <!-- Right Side: Text -->
      <div class="col-md-6">
        <h2 class="fw-bold" style="color:#0b1b33;">About Our Law Firm</h2>
        <p class="text-muted mt-3" style="font-size:1.05rem; line-height:1.7;">
          At <strong>Khan & Co. Advocates</strong>, we are dedicated to providing professional legal 
          representation with honesty, integrity, and a client-first approach.  
          For over two decades, our firm has successfully handled cases in 
          <em>civil, corporate, family, and criminal law</em>, helping our clients 
          achieve justice and peace of mind.
        </p>

        <p class="text-muted" style="font-size:1rem;">
          We believe that every client deserves personal attention and expert legal advice 
          tailored to their unique situation. Whether it’s a business dispute, family matter, 
          or criminal defense — our team stands beside you at every step.
        </p>

        <!-- WhatsApp Contact Button -->
        <div class="mt-4">
          <a href="https://wa.me/+923132687738" target="_blank" 
             class="btn btn-success fw-bold px-4 py-2">
            <i class="bi bi-whatsapp"></i> Contact Us on WhatsApp
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ---serices section start --- -->

<!-- ===== OUR SERVICES SECTION ===== -->

<section class="services-section py-5" id="services">
  <div class="container">
    
    <!-- Heading -->
    <div class="text-center mb-5">
      <h1 class="section-title">
        <i class="bi bi-briefcase-fill text-gold"></i> Our Legal Services
      </h1>
      <p class="text-muted">Expert legal assistance crafted with professionalism, trust, and integrity.</p>
    </div>

    <!-- Service Cards -->
    <div class="row g-4">

      <!-- 1 -->
      <div class="col-md-4">
        <div class="service-card">
          <div class="icon-wrapper">
            <i class="bi bi-balance-scale"></i>
          </div>
          <h4>Civil Law</h4>
          <p>Resolving disputes, property issues, and contracts with fairness and strong legal expertise.</p>
        </div>
      </div>

      <!-- 2 -->
      <div class="col-md-4">
        <div class="service-card">
          <div class="icon-wrapper">
            <i class="bi bi-people-fill"></i>
          </div>
          <h4>Family Law</h4>
          <p>Helping families navigate divorce, custody, and inheritance with compassion and care.</p>
        </div>
      </div>

      <!-- 3 -->
      <div class="col-md-4">
        <div class="service-card">
          <div class="icon-wrapper">
            <i class="bi bi-building"></i>
          </div>
          <h4>Corporate Law</h4>
          <p>Advising corporations in compliance, contracts, and disputes to ensure smooth operations.</p>
        </div>
      </div>

      <!-- 4 -->
      <div class="col-md-4">
        <div class="service-card">
          <div class="icon-wrapper">
            <i class="bi bi-shield-lock-fill"></i>
          </div>
          <h4>Criminal Law</h4>
          <p>Protecting your rights with expert defense and deep understanding of criminal justice.</p>
        </div>
      </div>

      <!-- 5 -->
      <div class="col-md-4">
        <div class="service-card">
          <div class="icon-wrapper">
            <i class="bi bi-chat-text-fill"></i>
          </div>
          <h4>Legal Consultation</h4>
          <p>Providing clear legal advice to help you make confident and informed decisions.</p>
        </div>
      </div>

      <!-- 6 -->
      <div class="col-md-4">
        <div class="service-card">
          <div class="icon-wrapper">
            <i class="bi bi-globe"></i>
          </div>
          <h4>Human Rights Law</h4>
          <p>Standing for justice, equality, and freedom — ensuring every voice is heard.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- 
---lawyers section --- -->
<section class="lawyers-section" id="lawyers">
  <h2>Our Expert Lawyers</h2>

  <div class="lawyers-grid">
    <div class="lawyer">
     
       <img src="{{ asset('assets/images/lawyer1.jpg') }}" alt="Lawyer 1">
      <div class="lawyer-info">
        <h5>Sarah Johnson</h5>
        <p>Corporate Law Specialist</p>
      </div>
    </div>

    <div class="lawyer">
      
        <img src="{{ asset('assets/images/lawyer2.jpg') }}" alt="Lawyer 2">
      <div class="lawyer-info">
        <h5>Michael Lee</h5>
        <p>Criminal Defense Expert</p>
      </div>
    </div>

    <div class="lawyer">
        <img src="{{ asset('assets/images/lawyer3.jpg') }}" alt="Lawyer 3">
      <div class="lawyer-info">
        <h5>Emma Davis</h5>
        <p>Family Law Attorney</p>
      </div>
    </div>

    <div class="lawyer">
      
        <img src="{{ asset('assets/images/lawyer4.jpg') }}" alt="Lawyer 4">
      <div class="lawyer-info">
        <h5>James Carter</h5>
        <p>Real Estate Advisor</p>
      </div>
    </div>

    <div class="lawyer">
      
        <img src="{{ asset('assets/images/lawyer5.jpg') }}" alt="Lawyer 5">
      <div class="lawyer-info">
        <h5>Olivia Brown</h5>
        <p>Corporate Legal Counsel</p>
      </div>
    </div>

    <div class="lawyer">

        <img src="{{ asset('assets/images/lawyer6.jpg') }}" alt="Lawyer 6">
      <div class="lawyer-info">
        <h5>William Harris</h5>
        <p>Intellectual Property Lawyer</p>
      </div>
    </div>

    <div class="lawyer">
      
        <img src="{{ asset('assets/images/lawyer7.jpg') }}" alt="Lawyer 7">
      <div class="lawyer-info">
        <h5>Emily White</h5>
        <p>Immigration Law Expert</p>
      </div>
    </div>
  </div>
</section>


  <!-- ----contact us ---- -->

<section class="forms" id="contact">
    
    <div class="decor">
      <i class="fas fa-balance-scale"></i>
      <div class="circle"></div>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
    @endif

    <form action="{{ route('employee.store') }}" method="POST">
      @csrf
      <h2>Contact Us</h2>

      <input type="text" name="username" placeholder="Enter your Username" value=""><br>
      @error('username') <p class="error">{{ $message }}</p> @enderror

      <input type="email" name="email" placeholder="Enter your Email" value=""><br>
      @error('email') <p class="error">{{ $message }}</p> @enderror

      <input type="password" name="password" placeholder="Enter your Password"><br>
      @error('password') <p class="error">{{ $message }}</p> @enderror

      <button type="submit">Submit</button>
    </form>

</section>


  <!-- ---footer start --- -->
<footer class="lf-footer">
  <div class="lf-container">

    <div class="lf-top">
      <!-- Brand -->
      <div class="lf-brand">
       
          <img src="{{ asset('assets/images/logo.png') }}" alt="Law frim logo" class="lf-logo">
       
        <p class="lf-tag">Trusted legal counsel. Practical solutions.</p>
      </div>

      <!-- Contact -->
      <div class="lf-contacts">
        <h4>Contact</h4>
        <p>Office: Suite 12, Business Tower, City</p>
        <p>Phone: <a href="tel:+922112345678">+923132687738</a></p>
        <p>Email: <a href="mailto:info@yourlawfirm.com">m07911795@gmail.com</a></p>

        <!-- Social icons moved here -->
        <div class="lf-social">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>

      <!-- Links -->
      <div class="lf-links">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#lawyers">Lawyers</a></li>
          <li><a href="#contact">Contact</a></li>
          
        </ul>
      </div>
    </div>

    <!-- Bottom Bar -->
    <div class="lf-bottom">
      <p>© 2025 Your Law Firm. All rights reserved.</p>
      <div class="lf-bottom-links">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms</a>
      </div>
    </div>

  </div>
</footer>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 <script>
     function formValidate() {

      // INPUTS
      let username = document.getElementById("username");
      let email = document.getElementById("email");
      let password = document.getElementById("password");
      let confirm = document.getElementById("confirm");

      // ERRORS
      let userError = document.getElementById("userError");
      let emailError = document.getElementById("emailError");
      let passError = document.getElementById("passError");
      let confirmError = document.getElementById("confirmError");

      // FLAG
      let flag = true;

      // ================= USERNAME =================
      if (username.value.trim() == "") {

        userError.innerHTML = "Username is required";
        flag = false;

      }
      else if (username.value.length < 3) {

        userError.innerHTML = "Minimum 3 characters required";
        flag = false;

      }
      else {

        userError.innerHTML = "";

      }


      // ================= EMAIL =================
      let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (email.value.trim() == "") {

        emailError.innerHTML = "Email is required";
        flag = false;

      }
      else if (!emailPattern.test(email.value)) {

        emailError.innerHTML = "Enter valid email";
        flag = false;

      }
      else {

        emailError.innerHTML = "";

      }


      // ================= PASSWORD =================
      if (password.value.trim() == "") {

        passError.innerHTML = "Password is required";
        flag = false;

      }
      else if (password.value.length < 6) {

        passError.innerHTML = "Password must be 6 characters";
        flag = false;

      }
      else {

        passError.innerHTML = "";

      }


      // ================= CONFIRM PASSWORD =================
      if (confirm.value.trim() == "") {

        confirmError.innerHTML = "Confirm password required";
        flag = false;

      }
      else if (confirm.value != password.value) {

        confirmError.innerHTML = "Password does not match";
        flag = false;

      }
      else {

        confirmError.innerHTML = "";

      }


      // ================= FINAL =================
      return flag;

    }

 </script>


 

  
</body>

</html>
