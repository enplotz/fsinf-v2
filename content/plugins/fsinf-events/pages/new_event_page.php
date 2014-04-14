<?php
function fsinf_add_event_page() {

    ?><h2>Erstelle ein neues Event</h2>

    <div class="row">
        <div class="alert alert-danger span4">Work in Progress here, folks</div>
    </div>

<?php
$errors = array();
  if (array_key_exists('fsinf_events_new', $_POST)) {
    $errors = fsinf_events_new();
    if(count($errors) == 0):
      fsinf_print_success_message_new_event();
    else:
?>    <div id="message" class="updated below-h2">
        <p>Das Formular enthält noch fehlerhafte Eingaben. Bitte korrigiere diese und schicke es erneut ab.</p>
      </div>
<?php
    endif;
  }

?>
            <form action="" method="POST">
              <table class="form-table">
                <tbody>
                        <?php
                            $field_name = 'title';
                            $display_name = 'Titel';
                        ?>
                        <tr>
                            <th scope="row" class="<?= error_class($field_name, $errors) ?>">
                                <label for="<?=$field_name?>"><?= $display_name ?></label>
                            </th>
                            <td>
                                <input type="text" id="<?=$field_name?>" name="<?=$field_name?>" placeholder="z.B. Ersti-Hütte" value="<?= fsinf_field_contents($field_name, $errors) ?>">
                                <p class="description"><?= @$errors[$field_name] ?></p>
                            </td>
                        </tr>

                        <?php
                            $field_name = 'starts_at';
                            $display_name = 'Beginn';
                        ?>
                        <tr>
                            <th scope="row" class="<?= error_class($field_name, $errors) ?>">
                                <label for="<?=$field_name?>"><?= $display_name ?></label>
                            </th>
                            <td>
                                <input type="text" name="<?=$field_name?>" id="<?=$field_name?>" placeholder="z.B. 24-12-2012 15:00" value="<?= fsinf_field_contents($field_name, $errors) ?>">
                                <p class="description"><?= @$errors[$field_name] ?></p>
                            </td>
                        </tr>
                        <?php
                            $field_name = 'ends_at';
                            $display_name = 'Ende';
                        ?>
                        <tr>
                            <th scope="row" class="<?= error_class($field_name, $errors) ?>">
                                <label for="<?=$field_name?>"><?= $display_name ?></label>
                            </th>
                            <td>
                                <input type="text" name="<?=$field_name?>" id="<?=$field_name?>" placeholder="z.B. 31-12-2012 15:00" value="<?= fsinf_field_contents($field_name, $errors) ?>">
                                <p class="description"><?= @$errors[$field_name] ?></p>
                            </td>
                        </tr>
                        <?php
                            $field_name = 'place';
                            $display_name = 'Ort';
                        ?>
                        <tr>
                            <th scope="row" class="<?= error_class($field_name, $errors) ?>">
                                <label for="<?=$field_name?>"><?= $display_name ?></label>
                            </th>
                            <td>
                                <input type="text" name="<?=$field_name?>" id="<?=$field_name?>" placeholder="z.B. Schweiz" value="<?= fsinf_field_contents($field_name, $errors) ?>">
                                <p class="description"><?= @$errors[$field_name] ?></p>
                            </td>
                        </tr>
                        <?php
                            $field_name = 'camping';
                            $display_name = 'Art';
                        ?>
                        <tr>
                            <th scope="row" class="<?= error_class($field_name, $errors) ?>">
                                <label for="<?=$field_name?>"><?= $display_name ?></label>
                            </th>
                            <td>
                                <select id="<?=$field_name?>" name="<?=$field_name?>">
                                    <?php
                                        $selected = array_key_exists($field_name, $errors) ? intval($_POST[$field_name]) : 0 ;
                                    ?>
                                    <option value="0" <?= $selected == 0 ? 'selected="selected"' : '' ?>>Hütte</option>
                                    <option value="1" <?= $selected == 1 ? 'selected="selected"' : '' ?>>Zelten</option>
                                </select>
                                <p class="description"><?= @$errors[$field_name] ?></p>
                            </td>
                        </tr>
                        <?php
                            $field_name = 'max_participants';
                            $display_name = 'Teilnehmer';
                        ?>
                        <tr>
                            <th scope="row" class="<?= error_class($field_name, $errors) ?>">
                                <label for="<?=$field_name?>"><?= $display_name ?></label>
                            </th>
                            <td>
                                <input type="number" name="<?=$field_name?>" id="<?=$field_name?>" placeholder="z.B. 30" value="<?= fsinf_field_contents($field_name, $errors) ?>">
                                <p class="description"><?= @$errors[$field_name] ?></p>
                            </td>
                        </tr>
                        <?php
                            $field_name = 'fee';
                            $display_name = 'Gebühr';
                        ?>
                        <tr>
                            <th scope="row" class="<?= error_class($field_name, $errors) ?>">
                                <label for="<?=$field_name?>"><?= $display_name ?></label>
                            </th>
                            <td>
                                <input type="number" name="<?=$field_name?>" min="0" step="0.01" size="4" id="<?=$field_name?>" placeholder="z.B. 10.05" value="<?= fsinf_field_contents($field_name, $errors) ?>">
                                <p class="description"><?= @$errors[$field_name] ?></p>
                            </td>
                        </tr>
                <?php
                            $field_name = 'description';
                            $display_name = 'Kurz-Beschreibung';
                        ?>
                        <tr>
                            <th scope="row" class="<?= error_class($field_name, $errors) ?>">
                                <label for="<?=$field_name?>"><?= $display_name ?></label>
                            </th>
                            <td>
                        <textarea id="<?=$field_name?>" name="<?=$field_name?>" placeholder="z.B. Mehr kann man dann im Artikel schreiben" rows="4" cols="40"><?= fsinf_field_contents($field_name, $errors) ?></textarea>
                            </td>
                        </tr>
            </tbody>
          </table>
        <p class="submit">
          <button type="submit" class="button button-primary" name="fsinf_events_new" value="Create">Event erstellen</button>
        </p>
      </form>
    <?php
}
