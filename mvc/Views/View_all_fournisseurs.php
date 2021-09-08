<main>
    <h1>Liste de tous les fournisseurs</h1>
    <?php
    // Bouton insertion
    if ($_SESSION['Admin'] == "admin") {
        echo "<button><a href='?controller=fournisseurs&action=insert_fournisseurs'>Insertion d'un fournisseur</a></button>";
    }
    ?>
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

                <?php if ($_SESSION['Admin'] == "admin") : ?>
                <th>Modifier</th>
                <th>Supprimer</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fournisseurs as $fournisseur) : ?>
            <tr>

                <?php foreach ($fournisseur as $fournisseurProperty => $fournisseurPropertyValue) : ?>
                <?php if ($fournisseurProperty != "Id_fournisseur") : ?>
                <td data-cellTitle='$fournisseurProperty'><?= stripslashes($fournisseurPropertyValue) ?></td>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php if ($_SESSION['Admin'] == "admin") : ?>
                <td>
                    <form action='?controller=fournisseurs&action=modif_fournisseurs' method='POST'>
                        <input type='number' style='display:none;' value='<?= $fournisseur['Id_fournisseur'] ?>'
                            name='modifFournisseur'>
                        <button type='submit'>
                            <svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 0 24 24' width='24px'
                                fill='#000000'>
                                <path d='M0 0h24v24H0V0z' fill='none' />
                                <path
                                    d='M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z' />
                            </svg>
                        </button>
                    </form>
                </td>

                <td>
                    <form action='?controller=fournisseurs&action=delete' method='POST'>
                        <input type='number' style='display:none;' value='<?= $fournisseur['Id_fournisseur'] ?>'
                            name='suppFournisseur'>
                        <button type='submit'>
                            <svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 0 24 24' width='24px'
                                fill='#000000'>
                                <path d='M0 0h24v24H0V0z' fill='none' />
                                <path
                                    d='M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z' />
                            </svg>
                        </button>
                    </form>
                </td>

                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>