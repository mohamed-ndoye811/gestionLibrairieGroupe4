<main>
    <h1>Résultat de votre recherche de fournisseurs par localité</h1>
    <table style='font-size: 15px;'>
        <thead>
            <tr>
                <th>Code fournisseur</th>
                <th>Raison sociale</th>
                <th>Rue</th>
                <th>Code postal</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Téléphone</th>
                <th>Site internet</th>
                <th>E-mail</th>
                <th>Fax</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fournisseurs as $fournisseur) : ?>

            <?php
                echo '<tr>';
                foreach ($fournisseur as $fournisseurProperty => $fournisseurPropertyValue) {
                    if ($fournisseurProperty != "Id_fournisseur") {
                        echo "<td data-cellTitle= '$fournisseurProperty'>" . stripslashes($fournisseurPropertyValue) . "</td>";
                    }
                }
                echo '</tr>';
                ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>