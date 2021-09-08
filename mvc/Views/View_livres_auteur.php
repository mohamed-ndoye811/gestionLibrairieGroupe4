<main>
    <h1>Résultat de votre recherche de livres par auteur</h1>
    <table style='font-size: 15px;'>
        <thead>
            <tr>
                <th>ISBN</th>
                <th>Titre du Livre</th>
                <th>Thème livre</th>
                <th>Nb pages</th>
                <th>Format</th>
                <th>Nom Auteur</th>
                <th>Prenom auteur</th>
                <th>Editeur</th>
                <th>Année d'édition</th>
                <th>Prix</th>
                <th>Langue</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($livresFound as $livre) : ?>

            <?php
                echo '<tr>';
                foreach ($livre as $livreProperty => $livrePropertyValue) {
                    if ($livreProperty != "Id_Livre") {
                        echo "<td data-cellTitle= '$livreProperty'>" . stripslashes($livrePropertyValue) . "</td>";
                    }
                }
                echo '</tr>';
                ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>