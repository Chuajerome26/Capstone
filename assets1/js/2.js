document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll("section");
    const navLinks = document.querySelectorAll(".nav-link");

    function onScroll() {
        let currentSection = "";

        // Find the current section in view
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (pageYOffset >= (sectionTop - sectionHeight / 3)) {
                currentSection = section.getAttribute("id");
            }
        });

        // Update nav links based on the current section
        navLinks.forEach(link => {
            link.classList.remove("active");
            if (link.href.includes(currentSection)) {
                link.classList.add("active");
            }
        });
    }

    window.addEventListener("scroll", onScroll);
});