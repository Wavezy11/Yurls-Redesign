<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIT</title>
    <link rel="stylesheet" href="css/index.css">
    <style>
        a {
            text-decoration: none;
        }
        </style>
</head>
<body>
<header>
    <div class="header-content">
        <img src="img/logo-yonder.png" alt="logo" class="logo">
        <input type="search" id="searchInput" oninput="filterImages()" placeholder="Zoeken">
    </div>
</header>
    <main>
        <div class="category-container">
            <section class="category">
                <h2>School</h2>
                <div class="subject-container" data-subject="Biologie">
                    <img src="img/biologie.png" alt="icon">
                    <p>Biologie</p>
                </div>
                <div class="subject-container" data-subject="CKV">
                    <img src="img/CKV.png" alt="icon">
                    <p>CKV</p>
                </div>
                <div class="subject-container" data-subject="GYM">
                    <img src="img/gym.png" alt="icon">
                    <p>GYM</p>
                </div>
                <div class="subject-container" data-subject="Economie">
                    <img src="img/economie.png" alt="icon">
                    <p>Economie</p>
                </div>
                <div class="subject-container" data-subject="Mens & Maatschappij">
                    <img src="img/mm.png" alt="icon">
                    <p>Mens & Maatschappij</p>
                </div>
                <div class="subject-container" data-subject="Scheikunde">
                    <img src="img/scheikunde.png" alt="icon">
                    <p>Scheikunde</p>
                </div>
                <div class="subject-container" data-subject="Talen">
                    <img src="img/Talen.png" alt="icon">
                    <p>Talen</p>
                </div>
                <div class="subject-container" data-subject="Techniek">
                    <img src="img/techniek.png" alt="icon">
                    <p>Techniek</p>
                </div>
            </section>
         
            <section class="category">
                <h2>ICT</h2>
                <div class="subject-container" data-subject="Softskills">
                    <img src="img/Skills.png" alt="icon">
                    <p>Softskills</p>
                </div>
                <div class="subject-container" data-subject="Kennismaking VR">
                    <img src="img/Kennismaking VR.png" alt="icon">
                    <p>Kennismaking VR</p>
                </div>
                <div class="subject-container" data-subject="Gamefication">
                    <img src="img/Gamefication.png" alt="icon">
                    <p>Gamefication</p>
                </div>
                <div class="subject-container" data-subject="ICT">
                    <img src="img/ICT.png" alt="icon">
                    <p>ICT</p>
                </div>
                <div class="subject-container" data-subject="Digitale Geleerdheid">
                    <img src="img/Digitale Geleerdheid.png" alt="icon">
                    <p>Digitale Geleerdheid</p>
                </div>
                <div class="subject-container" data-subject="Verschil AR, VR, MR">
                    <img src="img/Verschil .png" alt="icon">
                    <p>Verschil AR, VR, MR</p>
                </div>
            </section>
        
            <section class="category">
                <h2>Overig</h2>
                <div class="subject-container" data-subject="Meerdere vakken">
                    <img src="img/Group 65.png" alt="icon">
                    <p>Meerdere vakken</p>
                </div>
                <div class="subject-container" data-subject="Verzorging">
                    <img src="img/Group 57.png" alt="icon">
                    <p>Verzorging</p>
                </div>
                <div class="subject-container" data-subject="Horeca">
                    <img src="img/Group 58.png" alt="icon">
                    <p>Horeca</p>
                </div>
                <div class="subject-container" data-subject="Beroepsgericht">
                    <img src="img/Group 58.png" alt="icon">
                    <p>Beroepsgericht</p>
                </div>
                <div class="subject-container" data-subject="Muziek">
                    <img src="img/Group 59.png" alt="icon">
                    <p>Muziek</p>
                </div>
                <div class="subject-container" data-subject="Cursessen">
                    <img src="img/Group 60.png" alt="icon">
                    <p>Cursessen</p>
                </div>
                <div class="subject-container" data-subject="Spelgebasseerd Leren">
                    <img src="img/Group 60.png" alt="icon">
                    <p>Spelgebasseerd Leren</p>
                </div>
                <div class="subject-container" data-subject="Leuke GYM">
                    <img src="img/gym.png" alt="icon">
                    <p>Leuke GYM</p>
                </div>
            </section>
        </div>
    </main>
    <footer>
        <div class="footer-content">

        <a href="login.php">
            <p>&copy; 2024 Yonder. All rights reserved.</p>
</a>
            <ul class="footer-links">
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
    </footer>
    <div id="popupModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modalTitle">Links for <span id="selectedSubject"></span></h2>
            <ul id="linksList">
                <!-- linkjes worden hier getoond -->
            </ul>
            <button id="gaDoorButton" class="ga-door-button">Doorgaan</button>
        </div>
    </div>
    <script>
    // Function to filter subjects based on search input
    function filterImages() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const subjectContainers = document.querySelectorAll('.subject-container');
        let foundSubject = false;

        subjectContainers.forEach(container => {
            const subject = container.getAttribute('data-subject').toLowerCase();
            if (subject.includes(searchInput)) {
                container.style.display = 'flex';
                foundSubject = true;
            } else {
                container.style.display = 'none';
            }
        });

        const categories = document.querySelectorAll('.category');
        categories.forEach(category => {
            const categorySubjects = category.querySelectorAll('.subject-container');
            const categoryHasVisibleSubjects = Array.from(categorySubjects).some(subject => subject.style.display === 'flex');
            category.style.display = categoryHasVisibleSubjects ? 'block' : 'none';
        });

        if (!foundSubject) {
            console.log("Geen resultaten gevonden.");
        }
    }

    // Prepare subject links from PHP
    const subjectsLinks = <?php
        $conn = new mysqli("localhost", "root", "", "subjects");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $result = $conn->query("SELECT subject, text, url FROM subjects_links");
        $linksArray = [];
        while ($row = $result->fetch_assoc()) {
            $linksArray[$row['subject']][] = [
                'text' => $row['text'],
                'url' => $row['url']
            ];
        }
        $conn->close();
        echo json_encode($linksArray);
    ?>;

    // Function to open a modal
    function openModal(subject) {
        const modal = document.getElementById('popupModal');
        const selectedSubject = document.getElementById('selectedSubject');
        const linksList = document.getElementById('linksList');

        selectedSubject.innerText = subject;
        linksList.innerHTML = '';

        const links = subjectsLinks[subject];
        if (links) {
            links.forEach(link => {
                const listItem = document.createElement('li');
                listItem.innerHTML = `<a href="${link.url}" target="_blank">${link.text}</a>`;
                linksList.appendChild(listItem);
            });
        } else {
            linksList.innerHTML = '<li>No links available.</li>';
        }

        modal.style.display = 'flex';

        // Smooth scroll to the modal
        modal.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    // Function to close the modal
    function closeModal() {
        const modal = document.getElementById('popupModal');
        modal.style.display = 'none';
    }

    // Attach event listeners
    document.querySelectorAll('.subject-container').forEach(container => {
        container.addEventListener('click', function() {
            const subject = this.getAttribute('data-subject');
            openModal(subject);
        });
    });

    document.querySelector('.close').addEventListener('click', closeModal);
    document.getElementById('gaDoorButton').addEventListener('click', closeModal);
</script>

</body>
</html>

