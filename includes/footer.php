 <footer>
    <div class="conteneur">
        <div class="footer-colonnes">
            <div class="footer-marque">
                <a href="/index.php">
                    <img src="/assets/img/logo.jpg" class= "logo" alt="jeton aux couleurs de l'aquarium, bleu et blanc, avec un poisson au premier plan">
                    <span>Les Jardins de Nérée</span>
                </a>
                <p>Une promenade dans les mondes marins, à Néréapolis.</p>
            </div>

            <section>
                <h2>Nous trouver</h2>
                <p>Allée de l’Odyssée<br>49 244 Néréapolis</p>
                <p>Parking gratuit sur place</p>
            </section>

            <section>
                <h2>Nous contacter</h2>
                <p><a href="tel:+33700000000">07 00 00 00 00</a></p>
                <p><a href="mailto:lesjardinsdeneree@mail.com">lesjardinsdeneree@mail.com</a></p>
            </section>

            <section>
                <h2>Le site</h2>
                <ul>
                    <?php foreach ($liens as $fichier => $libelle): ?>
                        <li><a href="/<?= $fichier ?>"><?= htmlspecialchars($libelle) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </div>

            <div class="footer-legal">
                <div>
                    <p>© <?= date('Y') ?> Aquarium Les Jardins de Nérée</p>
                    <p class="indication"> Site fictif réalisé dans le cadre d'une formation — aucune réservation ni transaction réelle.</p>
                </div>
                <ul>
                    <li><a href="/cgv.php">CGV</a></li>
                    <li><a href="/mentions-legales.php">Mentions légales</a></li>
                    <li><a href="/accessibilite.php">Accessibilité</a></li>
                    <?php if (Auth::estConnecte()): ?>
                        <li><a href="/admin/index.php">Mon espace</a></li>
                        <li><a href="/deconnexion.php">Se déconnecter</a></li>
                    <?php else: ?>
                        <li><a href="/connexion.php">Connexion</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>