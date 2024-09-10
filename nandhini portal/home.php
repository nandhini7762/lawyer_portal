<h1?php
session_start();
include('db.php'); 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Lwa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
       /* Base Styles */
/* Base Styles */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

nav {
    backdrop-filter: blur(30px);
    -webkit-backdrop-filter: blur(3px);
    border-radius: 5px;
    box-shadow: 0 5px 30px 0 rgba(22, 32, 220, 0.37);
    padding-right: 5%; /* Adjusted for responsiveness */
    border: 1px solid rgba(255, 255, 255, 0.18);
    position: sticky;
    top: 0;
    background-color: #2c3e50; /* Added background for better visibility */
    padding-bottom: 10px;
    padding-top: 10px;
    padding-left: 10px;
}

ul {
    display: flex;
    flex-wrap: wrap; /* Allow items to wrap */
    gap: 1rem;
    list-style: none;
    margin: 0;
    padding: 0;
}

ul li {
    color: #fff;
    display: grid;
    place-content: center;
    margin: 0;
}

.logo {
    font-size: 24px;
    color: #fff;
    cursor: pointer;
}

.menu {
    color: #fff; /* Set menu item text color to white */
    padding: 0.5rem;
    position: relative;
    text-decoration: none;
    font-size: 16px;
}

.menu::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 2px;
    background: #fff; /* Set the underline color to white */
    border-radius: 5px;
    transform: scaleX(0);
    transition: all .5s ease;
    bottom: 0;
    left: 0;
}

.menu:hover::before {
    transform: scaleX(1);
}

.menu:hover {
    color: #18bc9c; /* Set hover color for menu items */
}

p {
    font-family: "Times New Roman", serif;
    font-size: larger;
    color: black;
    padding: 10px;
    margin: 0 auto;
    text-align: center; /* Center text for better readability */
}

.hero-section {
    background-image: url('law-hero.jpg');
    background-size: cover;
    background-position: center;
    padding: 100px 20px;
    text-align: center;
    color: #fff;
}

.hero-section .hero-content {
    max-width: 700px;
    margin: 0 auto;
}

.hero-section h1 {
    font-size: 48px;
    margin-bottom: 20px;
}

.hero-section p {
    font-size: 18px;
    margin-bottom: 30px;
}

.cta-btn {
    background-color: #18bc9c;
    padding: 15px 30px;
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    border-radius: 5px;
}

.cta-btn:hover {
    background-color: #149877;
}

.services {
    background-color: #fff;
    padding: 60px 20px;
    text-align: center;
}

.services h2 {
    font-size: 32px;
    margin-bottom: 40px;
}

.service-cards {
    display: flex;
    flex-wrap: wrap; /* Allow cards to wrap on smaller screens */
    justify-content: center; /* Center cards horizontally */
    gap: 20px;
}

.card {
    background-color: #DCDCDC;
    padding: 30px;
    border-radius: 5px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    text-align: left;
    max-width: 400px;
    width: 100%; /* Allow card to be responsive */
}

.card img {
    width: 100%;
    height: auto; /* Maintain aspect ratio */
    border-radius: 10px;
    margin-bottom: 15px;
}

.card h3 {
    font-size: 24px;
    margin-bottom: 10px;
}

.card p {
    font-size: 20px;
}

.about {
    background-color: #ecf0f1;
    padding: 60px 20px;
    text-align: center;
}

.about h2 {
    font-size: 32px;
    margin-bottom: 20px;
}

.about p {
    font-size: 18px;
    margin-bottom: 30px;
    max-width: 800px;
    margin: 0 auto;
}

.footer {
    background-color: #2c3e50;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

.footer .footer-content {
    display: flex;
    flex-direction: column; /* Stack items vertically on smaller screens */
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
}

.footer-logo h3 {
    margin: 0;
}

.footer-links {
    list-style: none;
    display: flex;
    gap: 15px;
    flex-wrap: wrap; /* Allow links to wrap on smaller screens */
    padding: 0;
    margin: 10px 0 0;
}

.footer-links li a {
    color: #fff;
    text-decoration: none;
    font-size: 14px;
}

.footer-links li a:hover {
    color: #18bc9c;
}

.footer p {
    margin: 10px 0 0;
    font-size: 14px;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .navbar {
        padding-right: 0;
    }

    ul {
        flex-direction: column;
        align-items: center;
    }

    .card {
        max-width: 50%;
    }

    .service-cards {
        flex-direction: column;
        align-items: center;
    }

    .hero-section h1 {
        font-size: 36px;
    }

    .hero-section p {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .hero-section h1 {
        font-size: 28px;
    }

    .hero-section p {
        font-size: 14px;
    }

    .card {
        padding: 20px;
        height: auto;
        width: 100%;
    }

    .card img {
        height: auto;
    }

    .footer-links {
        flex-direction: column;
        gap: 10px;
    }

    .footer p {
        font-size: 12px;
    }
}

        
        </style>
</head>
<body>
<nav>
        <ul>
            <li class="logo"> 
            <i class="fa-solid fa-gavel"></i>
</li>
            
            <li><a href="lawers details.php" class="menu">Lawers</a> </li>
            <li><a href="client case reg.php" class="menu">client case registration</a></li>
            <li><a href="list of laws.html" class="menu">laws</a></li>
            <li><a href="index.php" class="menu">logout</a></li>
        </ul>
        </nav>

   <center><h1>WELCOME TO THE LAWYERS PORTAL</h1></center>
  
  


<p>Welcome to E-Portal For lawyers,your trusted digital companion in the legal work.Our platform is dedicated to
  empowering lawyers by providing seamless access to essential legal sources,client management tools,and professional
  networking opportunities.We understand the demands of the legal professon,and our e-portal is designed to streamline
  your practice and cutting edge technology,ensuring you stay ahead in an ever-evolving industry.Whether you're managing
  case files,collaborating with colleagues,or staying informed about the latest legal developments,E-portal for lawyers
  is here to support you every step of the way.Join us in revolutioning the way you practice law,with a focus on efficiency
connectivity and excellence.
</p>
<div class="hero-content">
            <center><h1>Professional Legal Advice at Your Fingertips</h1></center>
            <p>Connect with experienced lawyers online for all your legal needs.</p>
            
        </div>
    </header>

    <section class="services">
        <div class="container">
            <h2>Our Services</h2>
            <div class="service-cards">
                <div class="card">
                    <img src="images\law1.jpg" alt="Consultation">
                    <h3>List of laws</h3>
                    <p>This page provides list of laws category wise detailly.</p>
                </div>
                <div class="card">
                    <img src="images\lawyer.jpeg" alt="Documentation">
                    <h3>Lawyers Details</h3>
                    <p>This page has lawyers details to handle your cases.</p>
                </div>
                <div class="card">
                    <img src="images\registration.jpg" alt="Court Representation">
                    <h3>Client case registration</h3>
                    <p>Anyone can register the cases in this portal and can get lawyer assistance</p>
                </div>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <h2>About Us</h2>
            <p>We are a team of dedicated legal professionals offering top-notch consultancy services to individuals and businesses. Our platform connects you with highly skilled lawyers, ensuring you get the best legal support when you need it most.</p>
            
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <h3>E-Lawyers</h3>
                </div>
                <ul class="footer-links">
                    <li><a href="privacyhome.html">Privacy Policy</a></li>
                    <li><a href="home terms and conditions.html">Terms of Service</a></li>
                    
                </ul>
            </div>
            <font color="white"><p>&copy; 2024 E-Lawyers. All Rights Reserved.</p></font>
        </div>
    </footer>
</body>
</html>
