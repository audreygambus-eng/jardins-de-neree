 <footer>
        <a href="/index.php">
            <img src="/assets/img/logo.jpg" alt="jeton aux couleurs de l'aquarium, bleu et blanc, avec un poisson au premier plan">
            <span>Les Jardins de Nérée</span>
            <span>Une promenade dans les mondes marins, à Néréapolis.</span>
        </a>
        <p>© <?= date('Y') ?> Aquarium Les Jardins de Nérée</p>

        <section>
            <h3>Nous trouver</h3>
            <p>Allée de l’Odyssée<br>49 244 Néréapolis</p>
            <p>Parking gratuit sur place</p>
        </section>

        <section>
            <h3>Nous contacter</h3>
            <p><a href="tel:+33700000000">07 00 00 00 00</a></p>
            <p><a href="mailto:lesjardinsdeneree@mail.com">lesjardinsdeneree@mail.com</a></p>
        </section>

        <section>
            <h3>Le site</h3>
            <ul>
                <?php foreach ($liens as $fichier => $libelle): ?>
                    <li><a href="/<?= $fichier ?>"><?= htmlspecialchars($libelle) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section>
            <h3>Informations légales</h3>
            <ul>
                <li><a href="#">CGV</a></li>
                <li><a href="#">Mentions légales</a></li>
                <li><a href="#">Accessibilité</a></li>
            </ul>
        </section>
    </footer>
</body>
</html>