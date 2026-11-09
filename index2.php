<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VaxCare - Vaccination Center</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Loading Overlay -->
    

    <!-- Floating Particles -->
    <div class="particles" id="particles"></div>

    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="#" class="logo">
                <div class="logo-icon">V+</div>
                VaxCare
            </a>
            <button class="mobile-menu-toggle" id="mobileToggle">
                <i class="fas fa-bars"></i>
            </button>
            <div class="mobile-overlay" id="mobileOverlay"></div>
            <div class="nav-links" id="navLinks">
                <a href="index2.php" class="nav-link">Home</a>
                <a href="aboutus.php" class="nav-link">About Us</a>
                <a href="contactus.php" class="nav-link">Contact</a>
                <a href="login.php" class="nav-link">Login</a>
                <div class="theme-toggle" id="themeToggle"></div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <h1 class="hero-title">Protect Your <span class="f">Future</span> with Safe <span class="f">Vaccination</span></h1>
            <p class="hero-subtitle">
                Experience world-class healthcare with our comprehensive vaccination services. 
                Safe, effective, and administered by certified medical professionals in a comfortable environment.
            </p>
            <a href="register.php" class="cta-button" onclick="registerClick()"> 
                <i class="fas fa-calendar-plus"></i> Register Here
            </a>
        </div>
    </section>

    <!-- Interactive Stats Section -->
    <section class="stats-section">
        <div class="stats-container">
            <div class="stat-item" onclick="animateCounter(this, 50000)">
                <div class="stat-number" data-target="50000">0</div>
                <div class="stat-label">Patients Vaccinated</div>
            </div>
            <div class="stat-item" onclick="animateCounter(this, 99.9)">
                <div class="stat-number" data-target="99.9">0</div>
                <div class="stat-label">Success Rate %</div>
            </div>
            <div class="stat-item" onclick="animateCounter(this, 25)">
                <div class="stat-number" data-target="25">0</div>
                <div class="stat-label">Vaccine Types</div>
            </div>
            <div class="stat-item" onclick="animateCounter(this, 15)">
                <div class="stat-number" data-target="15">0</div>
                <div class="stat-label">Years Experience</div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>VaxCare Center</h3>
                    <p>Leading vaccination center committed to providing safe, effective, and accessible immunization services for all ages. Your health is our priority.</p>
                </div>
                <div class="footer-section">
                    <h3>Services</h3>
                    <a href="#">COVID-19 Vaccines</a>
                    <a href="#">Flu Shots</a>
                    <a href="#">Travel Vaccines</a>
                    <a href="#">Pediatric Immunization</a>
                    <a href="#">Adult Vaccines</a>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <a href="add_vaccine.php">Book Appointment</a>
                    <a href="view_vaccine.php">Vaccine Schedule</a>
                    <a href="#">Health Records</a>
                    <a href="#">Insurance Info</a>
                    <a href="#">FAQs</a>
                </div>
                <div class="footer-section">
                    <h3>Contact Info</h3>
                    <p><i class="fas fa-map-marker-alt"></i> 123 Health Avenue, Medical District</p>
                    <p><i class="fas fa-phone"></i> +1 (555) 123-VAXX</p>
                    <p><i class="fas fa-envelope"></i> info@vaxcare.com</p>
                    <p><i class="fas fa-clock"></i> Mon-Fri: 8AM-6PM</p>
                    <p><i class="fas fa-clock"></i> Sat: 9AM-4PM</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 VaxCare Vaccination Center. All rights reserved. | Privacy Policy | Terms of Service</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>