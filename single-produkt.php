<?php
/**
 * The template for displaying all single posts and attachments.
 *
 * @package Hestia
 * @since Hestia 1.0
 */

get_header();
?>

<main id="main" class="site-main">

    <article>
        <div class="col_left">
            <h4 class="produktnavn"></h4>
            <p class="produktindhold"></p>
            <p class="beskrivelse"></p>
            <p class="pris"></p>
            <p class="opsaetning"></p>
            <p class="total"></p>
            <a href='http://pletfolio.dk/kea/10_eksamensprojekt/SRENT/wordpress/bestil/'><button>GÅ TIL BESTILLING</button></a>
        </div>
        <div>
            <img src="" alt="" class="billede" />
        </div>
    </article>

</main><!-- #main -->
    
<style>

    article {
        margin-left: 5%;
        margin-right: 5%;
        margin-top: 10%;
    }

    @media only screen and (min-width: 480px) {
        article{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }
    }

    .billede{
        max-width: 80%;
    }

    .total {
        font-weight: bold;
    }

    /*
    .col_left{
        display: flex;
        flex-flow: column;
        place-items: center;
    }
    */


</style>

<script>

    let produkt;

    const dbUrl = "http://pletfolio.dk/kea/10_eksamensprojekt/SRENT/wordpress/wp-json/wp/v2/produkt/" + <?php echo get_the_ID() ?>;
    console.log(dbUrl)

    async function hentData(){
        console.log("hentData")
        const data = await fetch(dbUrl);
        produkt = await data.json();
        visProdukter();
    }

    function visProdukter(){
    console.log("visProdukt")
        document.querySelector(".billede").src = produkt.billede.guid;
        document.querySelector(".produktnavn").textContent = produkt.produktnavn;
        document.querySelector(".produktindhold").textContent = produkt.produktindhold;
        document.querySelector(".beskrivelse").textContent = produkt.beskrivelse;
        document.querySelector(".pris").textContent = "PRIS: " + produkt.pris;
        document.querySelector(".opsaetning").textContent = "EVT. LEVERING, OPSÆTNING & AFHENTNING: " + produkt.opsaetning;
        document.querySelector(".total").textContent = "TOTALPRIS: " + produkt.total;
    }



    hentData();

</script>

<?php
get_footer();
?>