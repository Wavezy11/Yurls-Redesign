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
</head>
<body>
    <header>
        <div class="header-content">
            <h1>PRACTORAAT INTERACTIEVE TECHNOLOGIE</h1>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
            <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
            <form method="POST" action="php/logout.php" style="display: inline;">
                <button type="submit">Logout</button>
            </form>
        <?php else: ?>
            <div class="buttons">
                <button onclick="window.location.href='php/login.php'">Login</button>
                <button onclick="window.location.href='php/register.php'">Register</button>
            </div>
        <?php endif; ?>
        <input type="search" id="searchInput" oninput="filterImages()" placeholder="Search...">
        </div>
    </header>

    <main>
        <section class="category">
            <h2>School</h2>
            <div class="slideshow-container">         
                <div class="slide" id="school">
                    <div class="image-container">
                        <img src="img/biologie.png" alt="Biologie">
                        <p>Biologie</p>
                    </div>
                    <div class="image-container">
                        <img src="img/CKV.png" alt="CKV">
                        <p>CKV</p>
                    </div>
                    <div class="image-container">
                        <img src="img/economie.png" alt="Economie">
                        <p>Economie</p>
                    </div>
                    <div class="image-container">
                        <img src="img/gym.png" alt="GYM">
                        <p>GYM</p>
                    </div>
                    <div class="image-container">
                        <img src="img/mm.png" alt="Mens & Maatschappij">
                        <p>Mens & Maatschappij</p>
                    </div>
                    <div class="image-container">
                        <img src="img/scheikunde.png" alt="Scheikunde">
                        <p>Scheikunde</p>
                    </div>
                    <div class="image-container">
                        <img src="img/Talen.png" alt="Talen">
                        <p>Talen</p>
                    </div>
                    <div class="image-container">
                        <img src="img/techniek.png" alt="Techniek">
                        <p>Techniek</p>
                    </div>
                </div>
               
            </div>
        </section>

        <section class="category">
            <h2>ICT</h2>
            <div class="slideshow-container">
              
                <div class="slide" id="ict">
                    <div class="image-container">
                        <img src="img/ICT.png" alt="ICT">
                        <p>ICT</p>
                    </div>
                    <div class="image-container">
                        <img src="img/Skills.png" alt="Softskills">
                        <p>Softskills</p>
                    </div>
                    <div class="image-container">
                        <img src="img/Kennismaking VR.png" alt="Kennismaking VR">
                        <p>Kennismaking VR</p>
                    </div>
                    <div class="image-container">
                        <img src="img/websiteiconen.png" alt="Website Iconen">
                        <p>Website Iconen</p>
                    </div>
                    <div class="image-container">
                        <img src="img/Gamefication.png" alt="Gamefication">
                        <p>Gamefication</p>
                    </div>
                    <div class="image-container">
                        <img src="img/Digitale Geleerdheid.png" alt="Digitale Geleerdheid">
                        <p>Digitale Geleerdheid</p>
                    </div>
                    <div class="image-container">
                        <img src="img/Verschil .png" alt="Verschil AR, VR, MR">
                        <p>Verschil AR, VR, MR</p>
                    </div>
                </div>
               
            </div>
        </section>

        <section class="category">
            <h2>Overig</h2>
            <div class="slideshow-container">
              
                <div class="slide" id="overig">
                    <div class="image-container">
                        <img src="img/biologie.png" alt="Biologie">
                        <p>Biologie</p>
                    </div>
                    <div class="image-container">
                        <img src="img/CKV.png" alt="CKV">
                        <p>CKV</p>
                    </div>
                    <div class="image-container">
                        <img src="img/economie.png" alt="Economie">
                        <p>Economie</p>
                    </div>
                    <div class="image-container">
                        <img src="img/gym.png" alt="GYM">
                        <p>GYM</p>
                    </div>
                    <div class="image-container">
                        <img src="img/mm.png" alt="Mens & Maatschappij">
                        <p>Mens & Maatschappij</p>
                    </div>
                    <div class="image-container">
                        <img src="img/scheikunde.png" alt="Scheikunde">
                        <p>Scheikunde</p>
                    </div>
                    <div class="image-container">
                        <img src="img/Talen.png" alt="Talen">
                        <p>Talen</p>
                    </div>
                    <div class="image-container">
                        <img src="img/techniek.png" alt="Techniek">
                        <p>Techniek</p>
                    </div>
                </div>
           
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <p>&copy; 2024 Yurls.net</p>
            <p>Privacy keuzes aanpassen</p>
            <p>Privacy en gebruikersvoorwaarden</p>
            <div class="footer-links">
                <a href="#">Contact</a>
                <a href="#">Disclaimer</a>
                <a href="#">RSS</a>
            </div>
        </div>
    </footer>


    <div id="popupModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Vakken Links</h2>
        <ul id="linksList">
            <!-- Dynamische links worden hier toegevoegd -->
        </ul>
    </div>
</div>
<script src="js/index.js"></script>
</body>
</html>
