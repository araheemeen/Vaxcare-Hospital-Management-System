<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us | Vaccine Care</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="stylee.css/contact.css" />
</head>
<body>

  
  <!-- 3D Bubble Animation Background -->
  <div class="bubble-container" id="bubbleContainer"></div>
<?php include 'nav2.php'; ?>

  <!--  Page Header -->
  <section id="page-header">
    <h2>Contact Us</h2>
    <p>Get in touch with our healthcare experts anytime for vaccine-related support.</p>
  </section>

  <!--  Emergency Helpline -->
  <section id="emergency">
    <h2>Emergency Helpline</h2>
    <p>If you're facing any urgent post-vaccination reaction, please reach out immediately.</p>
    <div class="helpline-box">
      <p><strong>Emergency Number:</strong> 1122 (Pakistan) | 911 (International)</p>
      <p><strong>24/7 Support:</strong> +92 333 1234567</p>
      <p><strong>Email:</strong> emergency@vaccinecare.com</p>
    </div>
  </section>

  <!-- 📞 Contact Info -->
  <section id="contact-info">
    <div class="info-box">
      <h3>Head Office</h3>
      <p>Vaccine Center, Block 7, Clifton Karachi</p>
      <p>Email: support@vaccinecare.com</p>
      <p>Phone: +92 321 4567890</p>
    </div>

    <div class="info-box">
      <h3>Customer Support</h3>
      <p>Available 24/7 for vaccine registration and booking assistance.</p>
      <p>Email: help@vaccinecare.com</p>
      <p>Phone: +92 333 6543210</p>
    </div>

    <div class="info-box">
      <h3>Follow Us</h3>
      <ul>
        <li>Facebook</li>
        <li>Instagram</li>
        <li>Twitter</li>
        <li>LinkedIn</li>
      </ul>
    </div>
  </section>

  <!--  Nearest Vaccination Centers -->
  <section id="centers">
    <h2>Find Nearest Vaccination Centers</h2>
    <p>Locate a vaccination center near you and get vaccinated without long waiting times.</p>
    <ul>
      <li>🩺 Karachi Central Center — Block 7 Clifton</li>
      <li>🩺 Lahore City Center — Gulberg III</li>
      <li>🩺 Islamabad National Hospital — F-8 Markaz</li>
      <li>🩺 Hyderabad Medical Complex — Latifabad Unit 8</li>
    </ul>
  </section>

  <!--  Our Experts Section -->
  <section id="team">
    <h2>Meet Our Medical Experts</h2>
    <div class="team-member">
      <h4>Dr. Ayesha Khan</h4>
      <p>Chief Vaccinologist, 10+ years experience in Immunization Research</p>
    </div>
    <div class="team-member">
      <h4>Dr. Saad Malik</h4>
      <p>Senior Health Advisor, WHO Certified Immunization Specialist</p>
    </div>
    <div class="team-member">
      <h4>Nurse Maria</h4>
      <p>Vaccine Coordinator — National Immunization Drive</p>
    </div>
  </section>

  <!-- ⭐ Feedback & Rating -->
  <section id="feedback">
    <h2>Share Your Experience</h2>
    <p>We value your feedback to improve our vaccine services.</p>
    <form id="feedbackForm">
      <label>Rate Us:</label>
      <select id="rating">
        <option>⭐⭐⭐⭐⭐</option>
        <option>⭐⭐⭐⭐</option>
        <option>⭐⭐⭐</option>
        <option>⭐⭐</option>
        <option>⭐</option>
      </select>
      <textarea id="feedbackText" placeholder="Write your feedback..."></textarea>
      <button type="submit">Submit Feedback</button>
    </form>
    <div id="feedback-status"></div>
  </section>

  <!-- 📩 Newsletter -->
  <section id="newsletter">
    <h2>Stay Updated</h2>
    <p>Subscribe for latest vaccination alerts and health updates.</p>
    <form id="newsletterForm">
      <input type="email" placeholder="Enter your email" required />
      <button type="submit">Subscribe</button>
    </form>
  </section>

  <!-- ⚓ Footer -->
  <?php include 'footer.php'; ?>
  
<script src="script.js"></script>
</body>
</html>