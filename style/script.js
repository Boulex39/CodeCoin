document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const annonces = document.querySelectorAll(".annonce");
    const categories = document.querySelectorAll(".categories a");

    // Recherche
    searchInput.addEventListener("keyup", function () {
        let search = searchInput.value.toLowerCase();
        annonces.forEach(annonce => {
            let text = annonce.textContent.toLowerCase();
            annonce.style.display = text.includes(search) ? "block" : "none";
        });
    });

    // Filtre catégories
    categories.forEach(cat => {
        cat.addEventListener("click", function (e) {
            e.preventDefault();
            let filtre = this.dataset.cat.toLowerCase();

            annonces.forEach(annonce => {
                let catAnnonce = annonce.querySelector(".categorie").textContent.toLowerCase();

                // Si "tout", on affiche toutes les annonces
                if (filtre === "tout") {
                    annonce.style.display = "block";
                } else {
                    annonce.style.display = catAnnonce.includes(filtre) ? "block" : "none";
                }
            });
        });
    });
});




