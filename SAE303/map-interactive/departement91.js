// VARIABLES DEFINITS
const url = 'geo-les_salles_de_cinemas_en_ile-de-france.json';
const ulElement = document.querySelector("ul");
const searchInput = document.getElementById("searchInput");
const communeSelect = document.getElementById("commune");
const ecransRange = document.getElementById("ecransRange");
const ecransRangeValue = document.getElementById("ecransRangeValue");
const programmateurSelect = document.getElementById("programmateur");
const searchButton = document.getElementById("searchButton");
const resultCountElement = document.getElementById("resultCount");



// MAP
const map = L.map('map').setView([48.8566, 2.3522], 10);
const cinemaLayer = L.layerGroup().addTo(map);

// Récupération des données JSON à partir de l'URL
let usersData = [];
fetch(url)
.then(response => response.json())
.then(users => {
    usersData = users;
    displayUsers(users);
});


searchButton.addEventListener("click", () => {
    console.log("Button Clicked");

    // Récupération des valeurs des champs de recherche 
    const searchTerm = searchInput.value.toLowerCase();
    // Récupération des sélections dans les listes déroulantes
    const selectedCommunes = Array.from(communeSelect.selectedOptions, option => option.value);
    const selectedProgrammateur = Array.from(programmateurSelect.selectedOptions, option => option.value);
    

    // Filtrage
    let filteredUsers = usersData.filter(user => 
    user.nom.toLowerCase().includes(searchTerm.toLowerCase()) && user.dep === 91
    && (selectedCommunes.includes("all") || selectedCommunes.includes(user.commune))
    && user.ecrans >= parseInt(ecransRange.value, 10)
    && (selectedProgrammateur.includes("all") || selectedProgrammateur.includes(user.programmateur))
    );

    console.log("Filtered Users:", filteredUsers);

    resultCountElement.innerText = `Nombre de résultats : ${filteredUsers.length}`;
    displayUsers(filteredUsers);

    cinemaLayer.clearLayers();

    // Marqueurs pour les cinémas sur la carte
    filteredUsers.forEach(user => {
        const coordinates = user.geo.split(",");
        const lat = parseFloat(coordinates[0]);
        const lng = parseFloat(coordinates[1]);

        L.marker([lat, lng]).addTo(cinemaLayer)
        .bindPopup(`${user.nom}, Adresse : ${user.adresse}`)
        .openPopup();
    });
});


// Elements des données
function displayUsers(users) {
    while (ulElement.firstChild) {
        ulElement.removeChild(ulElement.firstChild);
    }

    for (const user of users) {
        const liElement = document.createElement("li");

        liElement.innerText = `${user.nom},
            ${user.adresse},
            ${user.commune},
            Département ${user.dep},
            Programmateur : ${user.programmateur},
            Ecrans : ${user.ecrans},
            Nombre de fauteuils : ${user.fauteuils},
            Séances : ${user.seances},
            Tranches d'entrées : ${user.tranche_d_entrees}`;
        ulElement.appendChild(liElement);

        ulElement.appendChild(document.createElement("hr"));
    }
};


// RESET
function resetFilters() {
    searchInput.value = "";
    communeSelect.value = "all";
    programmateurSelect.value = "all";
    ecransRange.value = 0;
    applyFiltersAndDisplay();
}

resetFilters();
ecransRange.addEventListener("input", updateEcransRangeValue);

function updateEcransRangeValue() {
    ecransRangeValue.innerText = ecransRange.value;
}



// Application des filtres spécifiés par l'utilisateur et de l'affichage des résultats filtrés
function applyFiltersAndDisplay() {
    const searchTerm = searchInput.value.toLowerCase();
    const selectedCommunes = Array.from(communeSelect.selectedOptions, option => option.value);
    const selectedProgrammateur = Array.from(programmateurSelect.selectedOptions, option => option.value);

    let filteredUsers = usersData.filter(user => 
        user.nom.toLowerCase().includes(searchTerm.toLowerCase()) && user.dep === 91
        && (selectedCommunes.includes("all") || selectedCommunes.includes(user.commune))
        && user.ecrans >= parseInt(ecransRange.value, 10)
        && (selectedProgrammateur.includes("all") || selectedProgrammateur.includes(user.programmateur))
    );

    resultCountElement.innerText = `Nombre de résultats : ${filteredUsers.length}`;
    displayUsers(filteredUsers);

    cinemaLayer.clearLayers();
}




// Tuiles OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
}).addTo(map);

