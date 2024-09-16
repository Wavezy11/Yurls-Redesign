<?php
session_start();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practoraat Interactie Technologie voor het Onderwijs</title>
    <link rel="stylesheet" href="css/index.css">
    <style>
 

        </style>
</head>
<body>
    <header>
        <div class="header-content">
            <h1 data-i18n="title">PRACTORAAT INTERACTIEVE TECHNOLOGIE</h1>
            <input type="search" id="searchInput" oninput="filterImages()" placeholder="Search...">
            <div class="language-buttons">
                <button id="nlButton" class="language-button active" onclick="changeLanguage('nl')">NL</button>
                <button id="enButton" class="language-button" onclick="changeLanguage('en')">EN</button>
            </div>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                <p id="welkomtekst" data-i18n="welcome">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
              
                <form method="POST" action="php/logout.php" style="display: inline;">
                    <button type="submit">Logout</button>
                </form>
            <?php else: ?>
                <div class="buttons">
                    <button onclick="window.location.href='php/login.php'">Login</button>
                    <button onclick="window.location.href='php/register.php'">Register</button>
                </div>
            <?php endif; ?>
                
          

       
        </div>
    </header>

    <main>
    <section class="category">
        <h2 data-i18n="school">School</h2>
        <div class="slideshow-container">         
            <div class="slide" id="school">
                <div class="subject-container">
                    <p data-i18n="biologie">Biologie</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="ckv">CKV</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="economie">Economie</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="gym">GYM</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="mensEnMaatschappij">Mens & Maatschappij</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="scheikunde">Scheikunde</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="talen">Talen</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="techniek">Techniek</p>
                </div>
            </div>
        </div>
    </section>

    <section class="category">
        <h2 data-i18n="ict">ICT</h2>
        <div class="slideshow-container">
            <div class="slide" id="ict">
                <div class="subject-container">
                    <p data-i18n="ict">ICT</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="softskills">Softskills</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="kennismakingVR">Kennismaking VR</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="websiteIconen">Website Iconen</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="gamefication">Gamefication</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="digitaleGeleerdheid">Digitale Geleerdheid</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="verschilARVRMR">Verschil AR, VR, MR</p>
                    
                </div>
            </div>
        </div>
    </section>

    
    <section class="category">
        <h2 data-i18n="overig">Overig</h2>
        <div class="slideshow-container">
            <div class="slide" id="Overig">
                <div class="subject-container">
                    <p data-i18n="MeerdereVakken">Meerdere vakken</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="Verzorging">Verzorging</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="Horeca">Horeca</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="Berroepsssgericht">Berroepsgericht</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="Muziek">Muziek</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="Cursessen">Cursessen</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="SpelgebasseerdLeren">Spelgebasseerd leren</p>
                </div>
                <div class="subject-container">
                    <p data-i18n="LeukeGYM">Leuke GYM</p>
                </div>
               
            </div>
        </div>
    </section>
</main>

    <footer>
        <div class="footer-content">
   
            <p>&copy; 2024 Practoraat Interactieve Technologie</p>
            <div class="footer-links">
                <a href="php/contact.php">Contact</a>
                <a href="#">Disclaimer</a>
                <a href="#">RSS</a>
        
            </div>
           
        </div>
    </footer>

    <div id="popupModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 data-i18n="modalTitle">Vakken Links</h2>
            <ul id="linksList">
               >
            </ul>
        </div>
    </div>

    <script src="js/index.js"></script>
</body>
</html>
