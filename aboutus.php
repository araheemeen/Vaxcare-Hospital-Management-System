<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | Vaxcare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="stylee.css/aboutus.css">
</head>
<body>
    <?php include "nav2.php"; ?>

  <!-- 3D Bubble Animation Background -->
  <div class="bubble-container" id="bubbleContainer"></div>

  <!-- Intro Section -->
  <section id="intro">
    <div class="card">
      <h2>Who We Are</h2>
      <p>We are a group of dedicated healthcare professionals and developers working to spread awareness about vaccination and preventive healthcare. Our goal is to make vaccination information easily accessible for everyone.</p>
    </div>
  </section>

  <!-- Mission Section -->
  <section id="mission">
    <div class="card">
      <h2>Our Mission</h2>
      <p>Our mission is to increase global vaccination rates by providing trusted and accurate vaccine-related information. We aim to eliminate misinformation and build a safer, healthier world.</p>
    </div>
  </section>

  <!-- Vision Section -->
  <section id="vision">
    <div class="card">
      <h2>Our Vision</h2>
      <p>To create a future where every individual is protected through timely vaccination, ensuring communities are shielded from preventable diseases.</p>
    </div>
  </section>

  <!-- Our Story Section -->
  <section id="story">
    <div class="card">
      <h2>Our Story</h2>
      <p>The Vaccination Awareness Initiative began in 2020 when a small group of medical students realized how misinformation affected vaccination campaigns. Today, we have grown into a platform reaching thousands of people globally.</p>
    </div>
  </section>

  <!-- Team Section -->
  <section id="team">
    <h2>Meet Our Team</h2>
    <div>
      <article class="team-member">
        <h3>Dr. Sarah Ahmed - Founder</h3>
        <p>A public health specialist with 10+ years of experience in immunization programs.</p>
      </article>
      <article class="team-member">
        <h3>Ali Raza - Developer</h3>
        <p>Responsible for maintaining the website and creating awareness through digital tools.</p>
      </article>
      <article class="team-member">
        <h3>Ayesha Khan - Outreach Coordinator</h3>
        <p>Leads vaccination campaigns and collaborates with health organizations worldwide.</p>
      </article>
    </div>
  </section>

  <!-- Achievements Section -->
  <section id="achievements">
    <h2>Our Achievements</h2>
    <ul>
      <li>Reached over 1 million people with verified vaccine information.</li>
      <li>Partnered with 50+ healthcare organizations.</li>
      <li>Organized 100+ free vaccination camps worldwide.</li>
    </ul>
  </section>

  <!-- Partners Section -->
  <section id="partners">
    <div class="card">
      <h2>Our Partners</h2>
      <p>We proudly work with global and local health authorities, NGOs, and educational institutions to promote vaccination awareness.</p>
    </div>
  </section>

  <!-- FAQ Section -->
  <section id="faq">
    <h2>Frequently Asked Questions</h2>
    <details>
      <summary>Why is vaccination important?</summary>
      <p>Vaccines save lives by protecting people from serious diseases and reducing the spread of infections.</p>
    </details>
    <details>
      <summary>Is the vaccine safe?</summary>
      <p>Yes, all vaccines approved by health authorities undergo extensive testing and monitoring to ensure safety and effectiveness.</p>
    </details>
    <details>
      <summary>How can I find vaccination centers?</summary>
      <p>You can visit our <a href="#">Find Vaccination Center</a> page or contact your nearest hospital.</p>
    </details>
  </section>

  <!-- Contact CTA Section -->
  <section id="contact-cta">
    <h2>Get in Touch</h2>
    <p>If you want to support our initiative, collaborate, or volunteer, feel free to contact us anytime.</p>
    <a href="contactus.php">Contact Us</a>
  </section>


  <?php include "footer.php"; ?>

  <script src="script.js"></script>

<script>
     // Create 3D bubbles
    const bubbleContainer = document.getElementById('bubbleContainer');
    const bubbleCount = 20;
    
    for (let i = 0; i < bubbleCount; i++) {
      const bubble = document.createElement('div');
      bubble.classList.add('bubble');
      
      // Random size between 20px and 80px
      const size = Math.random() * 60 + 20;
      bubble.style.width = ${size}px;
      bubble.style.height = ${size}px;
      
      // Random position
      bubble.style.left = ${Math.random() * 100}%;
      
      // Random animation delay and duration
      bubble.style.animationDelay = ${Math.random() * 5}s;
      bubble.style.animationDuration = ${Math.random() * 10 + 15}s;
      
      bubbleContainer.appendChild(bubble);
    }

    // Dark Mode Toggle
    const themeToggle = document.getElementById('theme-toggle');
    const html = document.documentElement;
    
    // Set default theme to light
    html.setAttribute('data-theme', 'light');
    
    themeToggle.addEventListener('click', () => {
      const currentTheme = html.getAttribute('data-theme');
      const newTheme = currentTheme === 'light' ? 'dark' : 'light';
      html.setAttribute('data-theme', newTheme);
      // Button text remains "Dark Mode" in both states
    });

    // Add parallax effect to bubbles
    window.addEventListener('scroll', () => {
      const scrolled = window.pageYOffset;
      const parallax = document.querySelectorAll('.bubble');
      
      parallax.forEach((bubble, i) => {
        const speed = 0.5 + (i * 0.1);
        bubble.style.transform = translateY(${scrolled * speed}px);
      });
    });

    // Add hover effect to details elements
    const detailsElements = document.querySelectorAll('details');
    
    detailsElements.forEach(detail => {
      detail.addEventListener('toggle', () => {
        if (detail.open) {
          // Add animation when opening
          const content = detail.querySelector('p');
          content.style.animation = 'fadeIn 0.5s ease-out';
        }
      });
    });

    // Add CSS animation for fadeIn
    const style = document.createElement('style');
    style.textContent = `
      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(10px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
    `;
    document.head.appendChild(style);
  </script>

<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>