<main>
        <h1>Modification de Fournisseurs</h1>
    <form action="?controller=fournisseurs&action=confirmEdit" method="POST">
        <div>
            <label for="codeModifFour">Code Fournisseur</label>
            <input type="text" name="codeModifFour" id="codeModifFour" value="<?=$fournisseur['Code_fournisseur']?>" required>
        </div>

        <div>
            <label for="raisonModifFour">Raison sociale</label>
            <input type="text" name="raisonModifFour" id="raisonModifFour" value="<?=stripslashes($fournisseur['Raison_sociale'])?>" required>
        </div>

        <div>
            <label for="rueModifFour">Rue</label>
            <input type="text" name="rueModifFour" id="rueModifFour" value="<?=stripslashes($fournisseur['Rue_fournisseur'])?>">
        </div>

        <div>
            <label for="cpModifFour">Code Postal</label>
            <input type="text" name="cpModifFour" id="cpModifFour" value="<?=$fournisseur['Code_postal']?>">
        </div>

        <div>
            <label for="villeModifFour">Ville</label>
            <input type="text" name="villeModifFour" id="villeModifFour" value="<?=stripslashes($fournisseur['Localite'])?>">
        </div>

        <div>
            <label for="paysModifFour">Pays</label>
            <input type="text" name="paysModifFour" id="paysModifFour" value="<?=$fournisseur['Pays']?>">
        </div>

        <div>
            <label for="telModifFour">Téléphone</label>
            <input type="text" name="telModifFour" id="telModifFour" value="<?=$fournisseur['Tel_fournisseur']?>">
        </div>


        <div>
            <label for="urlModifFour">Site internet</label>
            <input type="text" name="urlModifFour" id="urlModifFour" value="<?=$fournisseur['Url_fournisseur']?>">
        </div>

        <div>
            <label for="mailModifFour">E-mail</label>
            <input type="text" name="mailModifFour" id="mailModifFour" value="<?=$fournisseur['Email_fournisseur']?>">
        </div>

        <div>
            <label for="faxModifFour">Fax</label>
            <input type="text" name="faxModifFour" id="faxModifFour" value="<?=$fournisseur['Fax_fournisseur']?>">
        </div>

        <input type="submit" value="Modifier">
        </form>
    </main>