document.addEventListener("DOMContentLoaded", function() {

    // Functie om afbeeldingen te filteren op basis van zoekinput
    function filterImages() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const categories = document.querySelectorAll('.category');
        
        categories.forEach(category => {
            const images = category.querySelectorAll('.image-container');
            let categoryHasMatch = false;
            
            images.forEach(imageContainer => {
                const caption = imageContainer.querySelector('p').innerText.toLowerCase();
                
                if (caption.includes(filter)) {
                    imageContainer.style.display = ''; // Toon de bijpassende afbeelding
                    categoryHasMatch = true;
                } else {
                    imageContainer.style.display = 'none'; // Verberg niet-bijpassende afbeelding
                }
            });
            
            // Toon of verberg de categorie op basis van matches
            category.style.display = categoryHasMatch ? '' : 'none';
        });
    }

    // Koppel de filterImages functie aan het zoekveld
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', filterImages);
    }

    // Modal functionaliteit
    const imageContainers = document.querySelectorAll('.image-container');
    const modal = document.getElementById('popupModal');
    const closeModal = modal.querySelector('.close'); // Zorg ervoor dat het .close element binnen de modal wordt gezocht
    const linksList = document.getElementById('linksList');
    const modalTitle = modal.querySelector('h2'); // Selecteer het h2 element voor de dynamische titel

    imageContainers.forEach(container => {
        container.addEventListener('click', () => {
            const subject = container.querySelector('p').innerText.trim();
            showModal(subject);
        });
    });

    function showModal(subject) {
        linksList.innerHTML = '';  // Verwijder eerdere inhoud
        modalTitle.innerText = `${subject} Links`; // Stel de modal titel in op basis van het geselecteerde vak

        const links = {
            "Biologie": [
                {text: "Biologie Basis", url: "https://example.com/biologie-basis"},
                {text: "Biologie Geavanceerd", url: "https://example.com/biologie-geavanceerd"}
            ],
            "CKV": [
                {text: "CKV Inleiding", url: "https://example.com/ckv-inleiding"},
                {text: "CKV Project", url: "https://example.com/ckv-project"}
            ],
            "GYM": [
                {text: "VR-GYM CLASS (EN) (ALLEEN QUEST 2!) [BASKETBALl]", url: "https://www.meta.com/nl-nl/experiences/gym-class-basketball-vr/3661420607275144/?utm_source=www.google.com&utm_medium=oculusredirect"},
                {text: "Gym Praktijk", url: "https://example.com/gym-praktijk"}
            ],
            "Economie": [
                {text: "Economie Macro", url: "https://example.com/economie-macro"},
                {text: "Economie Micro", url: "https://example.com/economie-micro"}
            ],
            "Mens & Maatschappij": [
                {text: "MM Sociaal", url: "https://example.com/mm-sociaal"},
                {text: "MM Cultureel", url: "https://example.com/mm-cultureel"}
            ],
            "Scheikunde": [
                {text: "Scheikunde Organisch", url: "https://example.com/scheikunde-organisch"},
                {text: "Scheikunde Anorganisch", url: "https://example.com/scheikunde-anorganisch"}
            ],
            "Talen": [
                {text: "Nederlands", url: "https://example.com/talen-nederlands"},
                {text: "Engels", url: "https://example.com/talen-engels"}
            ],
            "Techniek": [
                {text: "Techniek Basis", url: "https://example.com/techniek-basis"},
                {text: "Techniek Geavanceerd", url: "https://example.com/techniek-geavanceerd"}
            ],
            "Softskills": [
                {text: "Communicatievaardigheden", url: "https://example.com/softskills-communicatie"},
                {text: "Teamwork", url: "https://example.com/softskills-teamwork"}
            ],
            "Kennismaking VR": [
                {text: "Introductie tot VR", url: "https://example.com/vr-introductie"},
                {text: "VR Toepassingen", url: "https://example.com/vr-toepassingen"}
            ],
            "Website Iconen": [
                {text: "Icon Design", url: "https://example.com/website-iconen-design"},
                {text: "Icon Implementatie", url: "https://example.com/website-iconen-implementatie"}
            ],
            "Gamefication": [
                {text: "Gamefication Strategieën", url: "https://example.com/gamefication-strategieën"},
                {text: "Gamefication Toepassingen", url: "https://example.com/gamefication-toepassingen"}
            ],
            "Digitale Geleerdheid": [
                {text: "Digitale Vaardigheden", url: "https://example.com/digitale-vaardigheden"},
                {text: "Digitale Tools", url: "https://example.com/digitale-tools"}
            ],
            "Verschil AR, VR, MR": [
                {text: "Augmented Reality", url: "https://example.com/ar"},
                {text: "Virtual Reality", url: "https://example.com/vr"},
                {text: "Mixed Reality", url: "https://example.com/mr"}
            ]
            // Voeg hier andere vakken en links toe
        };

        if (links[subject]) {
            links[subject].forEach(link => {
                const li = document.createElement('li');
                li.innerHTML = `<a href="${link.url}" target="_blank" rel="noopener noreferrer">${link.text}</a>`;
                linksList.appendChild(li);
            });
        } else {
            // Optioneel: Toon een bericht als er geen links beschikbaar zijn voor het geselecteerde vak
            const li = document.createElement('li');
            li.innerText = "Geen beschikbare links voor dit vak.";
            linksList.appendChild(li);
        }

        modal.style.display = "block"; // Toon de modal
    }

    // Sluit de modal wanneer op het sluitknopje wordt geklikt
    if (closeModal) {
        closeModal.onclick = function() {
            modal.style.display = "none"; // Verberg de modal
        }
    }

    // Sluit de modal wanneer buiten de modal wordt geklikt
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none"; // Verberg de modal
        }
    }
});
