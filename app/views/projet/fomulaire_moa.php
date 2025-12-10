<h2>Questionnaire MOA</h2>

<form method="POST" action="index.php?action=save_moa&id_projet=<?= $id_projet ?>">

<?php foreach ($categories as $cat): ?>
    <h3><?= $cat['nom_categorie'] ?></h3>

    <?php foreach ($questions_moa as $q): ?>
        <?php if ($q['id_categorie'] == $cat['id_categorie']): ?>

            <div class="question">
                <label><strong><?= $q['libelle'] ?></strong></label>

                <?php if ($q['type_question'] == 'choix'): ?>
                <select name="valeur[<?= $q['id_question_qualification'] ?>]">
                    <option value="">--</option>
                    <option value="Oui">Oui</option>
                    <option value="Non">Non</option>
                    <option value="Ne sait pas">Ne sait pas</option>
                </select>

                <?php else: ?>
                <textarea name="valeur[<?= $q['id_question_qualification'] ?>]"></textarea>
                <?php endif; ?>

                <label>Commentaire :</label>
                <textarea name="commentaire[<?= $q['id_question_qualification'] ?>]"></textarea>
            </div>

        <?php endif; ?>
    <?php endforeach; ?>

<?php endforeach; ?>

<button type="submit">Enregistrer</button>
</form>