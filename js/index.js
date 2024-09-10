document.addEventListener("DOMContentLoaded", function() {

    // Functie om divs te filteren op basis van zoekinput
    function filterSubjects() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const categories = document.querySelectorAll('.category');

        categories.forEach(category => {
            const subjects = category.querySelectorAll('.subject-container');
            let categoryHasMatch = false;

            subjects.forEach(subjectContainer => {
                const caption = subjectContainer.querySelector('p').innerText.toLowerCase();

                if (caption.includes(filter)) {
                    subjectContainer.style.display = ''; // Toon de bijpassende div
                    categoryHasMatch = true;
                } else {
                    subjectContainer.style.display = 'none'; // Verberg niet-bijpassende div
                }
            });

            // Toon of verberg de categorie op basis van matches
            category.style.display = categoryHasMatch ? '' : 'none';
        });
    }

    // Koppel de filterSubjects functie aan het zoekveld
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', filterSubjects);
    }

    // Modal functionaliteit
    const subjectContainers = document.querySelectorAll('.subject-container');
    const modal = document.getElementById('popupModal');
    const closeModal = modal.querySelector('.close');
    const linksList = document.getElementById('linksList');
    const modalTitle = modal.querySelector('h2');

    subjectContainers.forEach(container => {
        container.addEventListener('click', () => {
            const subject = container.querySelector('p').innerText.trim();
            showModal(subject);
        });
    });

    function showModal(subject) {
        linksList.innerHTML = '';  // Verwijder eerdere inhoud
        modalTitle.innerText = `${subject} Links`;

        const links = {
            "Biologie": [
                {text: "AR - HoloAnatomy DEMO (EN) - HoloLens2", url: "https://www.microsoft.com/nl-nl/p/holoanatomy-demo/9p51d9mb58bh?activetab=pivot:overviewtab"},
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
        };

        if (links[subject]) {
            links[subject].forEach(link => {
                const li = document.createElement('li');
                li.innerHTML = `<a href="${link.url}" target="_blank" rel="noopener noreferrer">${link.text}</a>`;
                linksList.appendChild(li);
            });
        } else {
            const li = document.createElement('li');
            li.innerText = "Geen beschikbare links voor dit vak.";
            linksList.appendChild(li);
        }

        modal.style.display = "block";
    }

    if (closeModal) {
        closeModal.onclick = function() {
            modal.style.display = "none";
        }
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});

function changeLanguage(language) {
    const elements = document.querySelectorAll('[data-i18n]');
    elements.forEach(el => {
        const key = el.getAttribute('data-i18n');
        if (translations[language][key]) {
            el.textContent = translations[language][key];
        }
    });

    // Toggle button states
    document.getElementById('nlButton').classList.toggle('active', language === 'nl');
    document.getElementById('enButton').classList.toggle('active', language === 'en');
}

// Simple translations object
const translations = {
    nl: {
        title: 'Practoraat Interactieve Technologie',
        welcome: 'Welkom',
        school: 'School',
        ict: 'ICT',
        overig: 'Overig',
        modalTitle: 'Vakken Links',
        biologie: 'Biologie',
        ckv: 'CKV',
        economie: 'Economie',
        gym: 'GYM',
        mensEnMaatschappij: 'Mens & Maatschappij',
        scheikunde: 'Scheikunde',
        talen: 'Talen',
        techniek: 'Techniek',
        softskills: 'Softskills',
        kennismakingVR: 'Kennismaking VR',
        websiteIconen: 'Website Iconen',
        gamefication: 'Gamefication',
        digitaleGeleerdheid: 'Digitale Geleerdheid',
        verschilARVRMR: 'Verschil AR, VR, MR'
    },
    en: {
        title: 'Institute of Interactive Technology',
        welcome: 'Welcome',
        school: 'School',
        ict: 'ICT',
        overig: 'Other',
        modalTitle: 'Subject Links',
        biologie: 'Biology',
        ckv: 'CKV',
        economie: 'Economics',
        gym: 'GYM',
        mensEnMaatschappij: 'People & Society',
        scheikunde: 'Chemistry',
        talen: 'Languages',
        techniek: 'Technology',
        softskills: 'Softskills',
        kennismakingVR: 'Introduction to VR',
        websiteIconen: 'Website Icons',
        gamefication: 'Gamification',
        digitaleGeleerdheid: 'Digital Literacy',
        verschilARVRMR: 'Difference AR, VR, MR'
    }
};

// Optionally initialize language on page load
document.addEventListener('DOMContentLoaded', () => {
    changeLanguage('nl'); // Default language
});
