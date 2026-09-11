<?php
require_once __DIR__ . '/src/Autoloader.php';
Autoloader::register();

$titre = 'Nos animaux';
require __DIR__ . '/includes/header.php';
?>

<main>
    <section class="page-especes">
        <div class="conteneur">
            <h1 class="texte-especes">Nos animaux</h1>
            <p class="texte-especes">Nos espèces évoluent dans 40 bassins, qui comptent une population aquatique
            issue tant des côtes Méditerranéennes que des grands fonds océaniques.</p>
        </div>
        <div class="especes-grille">
            <article class="espece">
                <img src="/assets/img/requin.jpg" alt="">
                <div class="espece-texte">
                    <h2>Le requin</h2>
                    <p>L’un des plus fascinants prédateurs des océans. Il joue un rôle essentiel dans l’équilibre des écosystèmes marins. Présent dans les mers du monde entier, il en existe plus de 500 espèces. Malgré leur réputation, la plupart des requins sont inoffensifs
                    pour l’être humain.</p>
                </div>
            </article>
            <article class="espece">
                <img src="/assets/img/merou.jpg" alt="">
                <div class="espece-texte">
                    <h2>Le mérou</h2>
                    <p>Le mérou est un poisson marin reconnaissable à son corps robuste et à sa grande bouche. Il vit principalement près des récifs et des fonds rocheux, où il se nourrit de poissons, de crustacés et de céphalopodes. Certaines espèces peuvent atteindre une taille impressionnante.</p>
                </div>
            </article>
            <article class="espece">
                <img src="/assets/img/poisson-archer.jpg" alt="">
                <div class="espece-texte">
                    <h2>Le poisson-archer</h2>
                    <p>Il est capable de projeter un jet d’eau pour faire tomber ses proies situées au-dessus de la surface. Il vit principalement dans les eaux tropicales et saumâtres d’Asie et d’Océanie. Sa technique de chasse en fait l’un des poissons les plus remarquables du monde.</p>
                </div>
            </article>
            <article class="espece">
                <img src="/assets/img/crabe.jpg" alt="">
                <div class="espece-texte">
                    <h2>Le crabe</h2>
                    <p>Le crabe est un crustacé reconnaissable à sa carapace rigide et à ses deux pinces. Il vit dans de nombreux milieux aquatiques, des fonds marins aux côtes et aux mangroves. Il joue un rôle important dans les écosystèmes en participant notamment au nettoyage des fonds.</p>
                </div>
            </article>
            <article class="espece">
                <img src="/assets/img/meduse.jpg" alt="">
                <div class="espece-texte">
                    <h2>La méduse</h2>
                    <p>Cet animal marin au corps gélatineux se déplace au gré des courants. Certaines espèces ont des tentacules capables de libérer des substances urticantes pour se défendre ou capturer leurs proies. Les méduses existent sous de nombreuses formes et couleurs.</p>
                </div>
            </article>
            <article class="espece">
                <img src="/assets/img/raie.jpg" alt="">
                <div class="espece-texte">
                    <h2>La raie</h2>
                    <p>La raie est un poisson cartilagineux au corps aplati, proche cousine du requin. Elle se déplace gracieusement dans l’eau grâce à ses grandes nageoires qui ressemblent à des ailes. Selon les espèces, elle peut vivre près des côtes, sur les fonds marins ou en pleine mer.</p>
                </div>
            </article>
        </div>
        <p class="texte-especes">
            De nombreuses autres espèces vous attendent dans notre aquarium. Venez les découvrir !
        </p>
    </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>