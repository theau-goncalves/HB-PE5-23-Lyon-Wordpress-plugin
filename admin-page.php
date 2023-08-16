<h1>
    Générateur de post
</h1>

<?php if (!empty($_GET['status'])): ?>

    <?php if ($_GET['status'] === 'success'): ?>
        <div style="color: green">
            Vos articles ont bien été ajoutés
        </div>
    <?php elseif ($_GET['status'] === 'error'):
        $message = "Il y a une erreur dans le formulaire";

        if (!empty($_GET['error_type']) && $_GET['error_type'] === 'incorrect_values') {
            $message = "La valeur doit être comprise entre 1 et 100";
        }

        ?>
        <div style="color: red">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

<?php endif; ?>


<form action="<?php echo admin_url('admin.php'); ?>" method="post">
    <input type="hidden" name="action" value="hb_generate_post">

    <div>
        <label for="post-count">
            Nombre d'article à générer
        </label>
        <input type="number" value="5" min="1" max="100"  name="post-count" id="post-count">
    </div>

    <div>
        <button type="submit">
            Générer
        </button>
    </div>
</form>
