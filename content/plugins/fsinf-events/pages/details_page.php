<?php

add_shortcode('fsinfcurrenteventdetails', 'fsfin_events_details');

function fsfin_events_details()
{
  $current_event = fsinf_get_current_event();
  if(empty($current_event)) {
    return "";
  }
  // TODO this could get ugly to debug, if after this call someone desides to also use output buffering
  ob_start();
?>
  <h3><?= $current_event->title ?></h3>
  <div class="row">
    <div class="span3">
  <dl class="dl-horizontal">
    <dt>Beginn</dt>
    <dd><?= strftime('%d.%m.%Y - %H:%M',strtotime($current_event->starts_at)) ?></dd>
    <dt>Ende</dt>
    <dd><?= strftime('%d.%m.%Y - %H:%M',strtotime($current_event->ends_at)) ?></dd>
    <dt>Ort</dt>
    <dd><?= $current_event->place ?></dd>
    <dt>Teilnahmegebühr</dt>
    <dd><?= formatted_fee_for($current_event)?></dd>
  </dl>
</div>
<div class="span4">
  <p><?= $current_event->description ?></p>
</div>
</div>
<h4>Teilnehmer</h4>
<?php
  $registrations = fsinf_get_registrations();
  $admitted_registrations = array_filter($registrations, 'is_admitted');
  $number_admitted_registrations = count($admitted_registrations);

  $empty_places = $current_event->max_participants - $number_admitted_registrations;
?>
  <div class="places" style="font-size: 20px; line-height: 20px;">
  <span title="Angemeldet: <?= $number_admitted_registrations ?>">
<?php
  foreach ($admitted_registrations as $person) {
      if ($person->paid):
?>
      <span style="color: blue; margin-right: -4px;">
        <span class="glyphicon glyphicon-user"></span>
      </span>
<?php
    else:
?>
      <span style="color: red; margin-right: -4px;">
        <span class="glyphicon glyphicon-user"></span>
      </span>
<?php
    endif;
    }
?>
    </span>
    <span title="Frei: <?=$empty_places?>">
<?php
    for ($i=0; $i < $empty_places; $i++) {
?>
      <span style="color: green; margin-right: -4px;">
        <span class="glyphicon glyphicon-user"></span>
      </span>
<?php
    }
?>
</span>
</div>
<p>Blau: bezahlt | Rot: nicht bezahlt | Grün: frei</p>
<!--
  <table class="table table-hover">
          <thead>
            <tr>
            <th>Titel</th>
            <th>Beginn</th>
            <th>Ende</th>
            <th>Ort</th>
            <th>Beschreibung</th>
            <th>Art</th>
            <th>Max. Teilnehmer</th>
            <th>Teilnahmegebühr</th>
          </tr>
          </thead>
          <tbody>
            <tr>
              <td><?= $current_event->title ?></td>
              <td><?= $current_event->starts_at ?></td>
              <td><?= $current_event->ends_at ?></td>
              <td><?= $current_event->place ?></td>
              <td><?= $current_event->description ?></td>
              <td><?= $current_event->camping == 1 ? 'Zelten' : 'Hütte' ?></td>
              <td><?= $current_event->max_participants?></td>
              <td><?= formatted_fee_for($current_event)?></td>
            </tr>
          </tbody>
        </table>-->
<?php
  return ob_get_clean();
}
