<h1>
    Générateur de post
</h1>

<form action="<?php echo admin_url('admin.php'); ?>" method="post">
    <input type="hidden" name="action" value="hb_generate_post">

    <div>
        <label for="post-count">
            Nombre d'article à générer
        </label>
        <input type="number" value="5" min="1" max="100" name="post-count" id="post-count">
    </div>

    <div>
        <button type="submit">
            Générer
        </button>
    </div>
</form>
