<main>
    <h1>Résultat de votre recherche de commandes par date</h1>
    <table style='font-size: 15px;'>
        <thead>
            <tr>
                <th>Livre</th>
                <th>Fournisseur</th>
                <th>Date achat</th>
                <th>Prix achat</th>
                <th>Nombre d'exemplaire</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commandes as $commande) : ?>

            <?php
                echo '<tr>';
                foreach ($commande as $commandeProperty => $commandePropertyValue) {
                    if (($commandeProperty != "id_commande") && ($commandeProperty != 'Id_Livre') && ($commandeProperty != 'Id_fournisseur')) {
                        echo "<td data-cellTitle= '$commandeProperty'>" . stripslashes($commandePropertyValue) . "</td>";
                    }
                }
                echo '</tr>';
                ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>