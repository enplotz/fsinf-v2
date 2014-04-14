<?php
add_shortcode('fsinfcurrenteventbooking', 'fsfin_events_booking_form');

function fsfin_events_booking_form()
{
  $curr_event = fsinf_get_current_event();

  if(is_null($curr_event)) {
    ob_start();
?>  <div class="alert alert-info">
      <a class="close" data-dismiss="alert">×</a>
      <p>Aktuell ist kein Event eingetragen.</p>
    </div>
<?php
    return ob_get_clean();
  }


  // TODO this could get ugly to debug, if after this call someone desides to also use output buffering
  ob_start();

  $errors = array();
  if (array_key_exists('fsinf_events_register', $_POST)) {
    $errors = fsinf_events_register();
    if(count($errors) == 0):
      fsinf_print_success_message();
    else:
?>    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Das Formular enthält noch fehlerhafte Eingaben. Bitte korrigiere diese und schicke es erneut ab.
      </div>
<?php
    endif;
  }

?>  <h2>Anmeldung zum Event: <?= htmlspecialchars($curr_event->title) ?></h2>
      <form method="POST" action="" role="form" class="form-horizontal">
        <fieldset>
          <legend>Persönliches</legend>
<?php
$field_name = 'first_name';
$display_name = 'Vorname';
?>
          <div class="form-group has-<?= error_class($field_name, $errors) ?>">
            <label class="col-sm-2 control-label" for="<?=$field_name?>"><?= $display_name ?></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="<?=$field_name?>" id="<?=$field_name?>" maxlength="255" value="<?= fsinf_field_contents($field_name, $errors) ?>"/>
              <span class="help-inline"><?= @$errors[$field_name] ?></span>
            </div>
          </div>

<?php
$field_name = 'last_name';
$display_name = 'Nachname';
?>
          <div class="form-group has-<?= error_class($field_name, $errors) ?>">
            <label class="col-sm-2 control-label" for="<?=$field_name?>"><?= $display_name ?></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="<?=$field_name?>" id="<?=$field_name?>" maxlength="255" value="<?= fsinf_field_contents($field_name, $errors) ?>"/>
              <span class="help-inline"><?= @$errors[$field_name] ?></span>
            </div>
          </div>

<?php
$field_name = 'mail_address';
$display_name = 'E-Mail-Adresse';
?>
          <div class="form-group has-<?= error_class($field_name, $errors) ?>">
            <label class="col-sm-2 control-label" for="<?=$field_name?>"><?= $display_name ?></label>
            <div class="col-sm-10">
          <input type="email" class="form-control" name="<?=$field_name?>" id="<?=$field_name?>" maxlength="127" value="<?= fsinf_field_contents($field_name, $errors) ?>"/>
          <span class="help-inline"><?= @$errors[$field_name] ?></span>
          </div>
        </div>

<?php
$field_name = 'mobile_phone';
$display_name = 'Handy-Nummer';
?>
          <div class="form-group has-<?= error_class($field_name, $errors) ?>">
            <label class="col-sm-2 control-label" for="<?=$field_name?>"><?= $display_name ?></label>
            <div class="col-sm-10">
          <input type="text" class="form-control" name="<?=$field_name?>" id="<?=$field_name?>" maxlength="255" value="<?= fsinf_field_contents($field_name, $errors) ?>"/>
          <span class="help-inline"><?= @$errors[$field_name] ?></span>
          </div>
        </div>
      </fieldset>
        <fieldset>
          <legend>Studium</legend>
<?php
$field_name = 'semester';
$display_name = 'Semester';
?>
          <div class="form-group has-<?= error_class($field_name, $errors) ?>">
            <label class="col-sm-2 control-label" for="<?=$field_name?>"><?= $display_name ?></label>
            <div class="col-sm-10">
        <select class="form-control" name="<?=$field_name?>" id="<?=$field_name?>">
<?php
$semesters = array(1, 2, 3, 4, 5, 6, 99);
$selected = array_key_exists($field_name, $errors) ? 1 : intval($_POST[$field_name]);
foreach($semesters as $i):
?>                <option value="<?=$i?>"<?= $i == $selected ? ' selected="selected"' : '' ?>><?= $i <= 6 ? "$i. Semester" : 'Anderes Semester (>6)' ?></option>
<?php
endforeach;
?>            </select>
          <span class="help-inline"><?= @$errors[$field_name] ?></span>
          </div>
        </div>
<?php
$field_name = 'bachelor';
$bachelor = empty($errors) || array_key_exists($field_name, $errors) || intval($_POST[$field_name]) == 1;
?>
          <div class="form-group has-<?= error_class($field_name, $errors) ?>">
            <div class="col-sm-offset-2 col-sm-10">
            <div  class="radio">
              <label>Bachelor
                <input type="radio" name="bachelor" value="1"<?= $bachelor ? ' checked="checked"' : ''?>/>
              </label>
              </div>
              <div  class="radio">
              <label>Master
                <input type="radio" name="bachelor" value="0"<?= !$bachelor ? ' checked="checked"' : ''?>/>
              </label>
              </div>
            </div>
          </div>
        </fieldset>

        <fieldset>
          <legend>Organisatorisches</legend>

<?php
$field_name = 'has_car';
$selected = !empty($errors) && array_key_exists($field_name, $_POST);
?>
          <div class="form-group has-<?= error_class($field_name, $errors) ?>">
            <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
              <label>Ich habe ein Auto und kann damit zur Hütte fahren.
                <input type="checkbox" name="<?=$field_name?>" value="1" <?= $selected ? ' checked="checked"' : '' ?>/>
              </label>
              </div>
            </div>
          </div>

<?php
$field_name = 'car_seats';
$display_name = 'Wie viele Plätze sind im Auto inklusive des Fahrers?';
?>
          <div class="form-group has-<?= error_class($field_name, $errors) ?>">
            <label class="col-sm-2 control-label" for="<?=$field_name?>"><?= $display_name ?></label>
            <div class="col-sm-10">
            <input class="form-control" type="number" name="<?=$field_name?>" id="<?=$field_name?>" value="<?= fsinf_field_contents($field_name, $errors) ?>" placeholder="z.B. 5" min="1" max="127"/>
            <span class="help-inline"><?= @$errors[$field_name] ?></span>
          </div>
        </div>

<?php  if (intval($curr_event->camping)) :
?>
<?php
$field_name = 'has_tent';
$selected = !empty($errors) && array_key_exists($field_name, $_POST);
?>
          <div class="form-group has-has-<?= error_class($field_name, $errors) ?>">
            <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
              <label>Ich habe ein Zelt und kann dies mitnehmen.
                <input type="checkbox" name="<?=$field_name?>" value="1" <?= $selected ? ' checked="checked"' : '' ?>/>
              </label>
              </div>
            </div>
          </div>

<?php
$field_name = 'tent_size';
$display_name = 'Wie viele Schlafplätze sind im Zelt inklusive dir?';
?>
          <div class="form-group has-<?= error_class($field_name, $errors) ?>">
            <label class="col-sm-2 control-label" for="<?=$field_name?>"><?= $display_name ?></label>
            <div class="col-sm-10">
            <input class="form-control" type="number" name="<?=$field_name?>" id="<?=$field_name?>" value="<?= fsinf_field_contents($field_name, $errors) ?>" placeholder="z.B. 5" min="1" max="127"/>
            <span class="help-inline"><?= @$errors[$field_name] ?></span>
          </div>
        </div>
<?php endif;
?>

<?php
$field_name = 'notes';
$display_name = 'Bemerkungen (Vegi o.ä)';
?>
          <div class="form-group has-<?= error_class($field_name, $errors) ?>">
            <label class="col-sm-2 control-label" for="<?=$field_name?>"><?= $display_name ?></label>
            <div class="col-sm-10">
            <textarea class="form-control" placeholder="z.B. Ich bin Vegetarier/Veganer/Pescetarier..." name="<?=$field_name?>" id="<?=$field_name?>" rows="4"><?= fsinf_field_contents($field_name, $errors) ?></textarea>
          </div>
        </div>
        </fieldset>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary" name="fsinf_events_register" value="Anmelden">Anmelden</button>
          <button type="button" class="btn">Abbrechen</button>
        </div>
      </form>

<?php
  return ob_get_clean();
}
