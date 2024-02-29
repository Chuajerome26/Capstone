window.onscroll = () => {
    sections.forEach(sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if (top >= offset && top < offset + height) {
            navLinks.forEach(link => {
                link.classList.remove('active'); // First, remove 'active' from all links
            });

            // Now, select the correct link based on the section ID and add 'active'
            let activeLink = document.querySelector(`#nav .nav-link[href*="${id}"]`);
            if (activeLink) {
                activeLink.classList.add('active');
            }
        }
    });
};
