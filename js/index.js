document.addEventListener("DOMContentLoaded", function() {

    // Search function to filter images
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
                    imageContainer.style.display = ''; // Show matching image
                    categoryHasMatch = true;
                } else {
                    imageContainer.style.display = 'none'; // Hide non-matching image
                }
            });
            
            // Show or hide the category based on matches
            category.style.display = categoryHasMatch ? '' : 'none';
        });
    }

    // Attach filterImages function to the search input
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', filterImages);
    }

    // Modal functionality
    const imageContainers = document.querySelectorAll('.image-container');
    const modal = document.getElementById('popupModal');
    const closeModal = document.querySelector('.close');
    const linksList = document.getElementById('linksList');

    imageContainers.forEach(container => {
        container.addEventListener('click', () => {
            const subject = container.querySelector('p').innerText;
            showModal(subject);
        });
    });

    function showModal(subject) {
        linksList.innerHTML = '';  // Clear previous content
        const links = {
            "Biologie": ["Link 1", "Link 2"],
            "CKV": ["Link 3", "Link 4"],
            "GYM": ["Goedemorgen sporter", "Link 6"],
            "Economie": ["Link 5", "Link 6"],
            // Voeg andere vakken en links hier toe
        };
        if (links[subject]) {
            links[subject].forEach(link => {
                const li = document.createElement('li');
                li.innerHTML = `<a href="#">${link}</a>`;
                linksList.appendChild(li);
            });
        }
        modal.style.display = "block"; // Show the modal
    }

    // Close the modal
    if (closeModal) {
        closeModal.onclick = function() {
            modal.style.display = "none"; // Hide the modal
        }
    }

    // Close modal when clicking outside the modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none"; // Hide the modal
        }
    }
});
