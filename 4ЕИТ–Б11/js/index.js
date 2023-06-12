// PROMENLJIVA SA URL-OM SAJTA
let url = "https://naslovi.net/vremenska-prognoza/";

// FUNKCIJA ZA PROMENU GRADA PRIKAZIVANJA VREMENSKE PROGNOZE I OTVARANJE NOVOG PROZORA
function funkcija() {
    // PROMENLJIVA SA NAZIVOM GRADA
    let grad = document.querySelector("#izbor").value;

    // VRSENJE PROMENE
    document.querySelector("#promena").src = url + grad;
    window.open("./pages/gradovi/"+grad+".html", "", "width=300,height=300");
}