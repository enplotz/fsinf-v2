<p class="meta text-muted">
<!-- <span class="glyphicon glyphicon-user"></span> <span class="byline author vcard">Posted by <span class="fn">Fachschaft Informatik</span></span>
<span class="glyphicon glyphicon-calendar"></span> <time datetime="2013-12-09T13:00:00+01:00" pubdate="" data-updated="true">09.12.2013</time> -->
<span class="glyphicon glyphicon-tags"></span>&nbsp;

<?php
$comma = '';
foreach (array(array('sg' => 'category', 'pl' => 'categories'), array('sg' => 'tag', 'pl' => 'tags' )) as $classification) :

$collection = $classification['sg'] === 'category' ? get_the_category() : get_the_tags();

if ($collection) :
?><span class="<?= $classification['pl'] ?>"><?php
  foreach($collection as $item) :
?>
  <?= $comma ?><a class="post-<?= $classification['sg'] ?>" href="/<?= $classification['sg'] ?>/<?= $item->name ?>/"><?= $item->name ?></a>
<?php
  $comma = ', ';
  endforeach;
  ?></span><?php
endif;
endforeach;
?>

</p>