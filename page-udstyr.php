<?php
/**
 * The template for displaying all single posts and attachments.
 *
 * @package Hestia
 * @since Hestia 1.0
 */

get_header();
?>

<h1 class="entry-title">LEJEUDSTYR</h1>

<nav id="filtrering"></nav>

<section id="popup">
    <div id="luk">&#x2715 </div>
    <article>
        <div>
            <h2 class="produktnavn"></h2>
            <p class="produktindhold"></p>
            <p class="beskrivelse"></p>
            <p class="pris">PRIS:</p>
            <p class="opsaetning">EVT OPSÆTNING OG LEVERING:</p>
            <p class="total">TOTAL:</p>
        </div>
        <div>
            <img src="" alt="" class="billede" />
        </div>
    </article>
</section>

<template class="loopview">
    <article>
        <div class="img_box">
            <img src="" alt="" class="billede" />
        </div>
        <h4 class="produktnavn"></h4>
    </article>
</template>

<main id="main" class="site-main"></main><!-- #main -->
		
<style>

    h1 {
        margin-top: 150px;
        font-size: 8rem;
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
    }

    .page .page-title {
        margin-top: 45px;
        color: #222;
        font-size: 26px;
        font-size: 1.625rem;
        font-weight: 700;
        text-align: center;
        text-transform: uppercase;
    }


    #filtrering {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin: 0 auto;
        max-width: 85vw;
        margin-top: 50px;
        margin-bottom: 100px;
        align-content: center;
    }

    #filtrering button {
        padding-bottom: 0px;
        padding-top: 0px;
        padding-right: 0px;
        padding-left: 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        margin-right: 0px;
    }


    .projektnavn {
        color: #0bb4aa;
    }

    .kort_beskrivelse,
    .verdensmal {
        color: #777;
    }

    article {
        padding: 10px;
        cursor: pointer;
        place-content: center;
    }

    article:hover {
        background: 5px 5px #f5f5f5;
    }

    main {
        max-width: 1000px;
        /* margin: auto 20px auto 20px; */
    }

    main {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 5px;
        margin: 0 auto;
    }

    #popup {
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        width: 100vw;
        background-color: rgba(0, 0, 0, 0.8);
        overflow: auto;
    }

    #popup article {
        width: 70vw;
        height: 500px;
        margin: 12rem auto;
        border-radius: 25px;
        padding: 12px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 200px 100px;
        gap: 20px;
    }

    #popup article h2 {
        margin: 10px 0px 70px 0px;
        grid-column: 2/3;
        grid-row: 1/2;
        place-self: start;
        /* color: #f2f2f2; */
    }

    #popup article img {
        border-radius: 8px;
        place-self: center;
        grid-column: 1/2;
        grid-row: 1/3;
        max-height: 100%;
        max-width: 50%;
    }

    #luk {
        position: fixed;
        padding: 6.25em 0 0 7.5em;
        font-size: 2em;
        font-weight: bolder;
        color: black;
        cursor: pointer;
    }

    #luk:hover {
        color: #032f40;
    }

    .beskrivelse{
        font-size: 0.8rem;
    }

    .img_box{
        padding: 0;
    }

</style>

<script>
    "use strict";
	// Tjekker om DOM'en er loaded før siden vises
    window.addEventListener("DOMContentLoaded", start);
    function start() {
    console.log("start");

    // Definerer stien til json-array produkter + kategorier i WordpressDB:
    // Henter 2 collections fra samme database
    const dbUrl = "http://pletfolio.dk/kea/10_eksamensprojekt/SRENT/wordpress/wp-json/wp/v2/produkt?per_page=100";
    const vmUrl = "http://pletfolio.dk/kea/10_eksamensprojekt/SRENT/wordpress/wp-json/wp/v2/produktkategorier?per_page=100";
    console.log(vmUrl);

    // Her defineres der globale variabler
    const main = document.querySelector("main");
    const template = document.querySelector(".loopview").content;
    const popup = document.querySelector("#popup");
    const article = document.querySelector("article");
    const lukKnap = document.querySelector("#luk");
    const header = document.querySelector("h1");

    let produkter;
    let filter = "alle";
    let produktkategorier;
    let filterProdukt= "alle"

    // Henter json-data fra WordpressSB via fetch() fra to forskellige collections i samme database
    async function hentData() {
        const data = await fetch(dbUrl);
        const vmdata = await fetch(vmUrl);
        produkter = await data.json();
        produktkategorier = await vmdata.json();
        console.log("Produkter", produkter);
        console.log("Produktkategorier", produktkategorier);
        visProdukter();
        opretKnapper();
    }

    // Her laver jeg knapper til filtrering, samt funktioner til disse. Læg mærke til, at knapperne har fået tildelt et "baggrundsbillede," som blev føjet til Poden "Produktkategorier"

    function opretKnapper(){
        produktkategorier.forEach(vm =>{
            document.querySelector("#filtrering").innerHTML += `<button class="filter" data-produkt="${vm.id}"><img src="${vm.kategoriknap.guid}" alt="" class="billede" /></button>`
        })
        addEventListenersToButtons();
    }

    function addEventListenersToButtons(){
        document.querySelectorAll("#filtrering button").forEach(elm =>{
            elm.addEventListener("click", filtrering);
        })

    };

    function filtrering(){
        filterProdukt = this.dataset.produkt;

        console.log(filterProdukt);
        visProdukter();

    }

    // loop'er gennem alle produkterne i json-arrayet
    function visProdukter() {
        console.log("visProdukt");
        main.textContent = ""; // Her resetter jeg DOM'en ved at tilføje en tom string
        // for hver projekt i arrayet, skal der tjekkes om de opfylder filter-kravet og derefter vises i DOM'en.
        produkter.forEach((produkt) => {
            if (filterProdukt == "alle" || produkt.produktkategorier.includes(parseInt(filterProdukt))) {
                const klon = template.cloneNode(true);
                klon.querySelector(".billede").src = produkt.billede.guid;
                klon.querySelector(".produktnavn").textContent = produkt.produktnavn;
                // tilføjer eventlistner til hvert article-element og lytter efter klik på artiklerne. Funktionen "visDetaljer" bliver kaldt ved klik.
                klon.querySelector("article")
                .addEventListener("click", () => {location.href = produkt.link});
                // tilføjer klon-template-elementet til main-elementet (så det hele vises i DOM'en)
                main.appendChild(klon);
            }
        })
    }

    // tilføjer objekter fra arrayet (for hver produkt) til popup-vindue. Samt sætter cursor til default, så man ikke tror man kan klikke på elementet igen.
    function visDetaljer(projekt) {
        console.log(projekt);
        article.style.cursor = "default";
        popup.style.display = "block";
        popup.querySelector(".billede").src = projekt.billede.guid;
        popup.querySelector(".billede").style.maxWidth = "50%";
        popup.querySelector(".produktnavn").textContent = produkt.produktnavn.rendered;
        popup.querySelector(".pris").textContent = produkt.pris;
    }

    // ved klik på luk-knappen forsvinder popup-vindue
    lukKnap.addEventListener("click", () => (popup.style.display = "none"));
    lukKnap.addEventListener(
        "click",
        () => (document.querySelector(".nav").style.position = "sticky")
    );
        hentData();
    }

</script>
<?php
get_footer();
?>