<?php
include(dirname(__FILE__).'/../../bootstrap/Propel.php');

$t = new lime_test(1);

$t->comment('->new Newsletter()');
$newsletter = new iogNewsletter();
$newsletter->setTitular('Newsletter de prova');
$template =  iogNewsletterTemplatePeer::retrieveByNom('normal_ca');
$newsletter->setIogNewsletterTemplate($template);
$newsletter->setIogNewsletterLlista(iogNewsletterLlistaPeer::doSelectOne(new Criteria()));
$newsletter->save();
$t->is($newsletter->getTitular(), 'Newsletter de prova', '->save() works');

//$t->comment("->save() don't duplicate tags");
//$tag = new Tag();
//$tag->setName('tag_2');
//$tag->setCulture('ca');
//$tag->save();
//$tag_nb = Doctrine_Core::getTable('Tag')->createQuery('q')->where('q.name = ?','tag_2')->count();
//$t->is($tag_nb, 1, 'No duplica els tags');


//$t->comment('->save tags from taggable object');
//$anunciant = Doctrine_Core::getTable('Anunciant')->findOneBySlug('la-iogurtera');
//$t->is($anunciant->getNom(),'La iogurtera','Test if $anunciant object is correct');
//
//$t->comment('->save individual tag');
//$anunciant->setTags('tag_2');
//$anunciant->save();
//$t->is($anunciant->getTags(), is_array($anunciant->getTags()) , 'Get tag retorna un array: '.implode(',',$anunciant->getTags()));
//
//
//$t->comment("->save duplicated tag: don't save again");
//$nb_tags_before_save = Doctrine_Core::getTable('tag')->count();
//$anunciant->setTags('tag_1,tag_2,tag_3');
//$anunciant->save();
//$t->is(Doctrine_Core::getTable('tag')->count(), $nb_tags_before_save + 1 , 'Number of tags in tag table are 1+ than before save');
//
//
//$t->comment("->getTags return an array of tags");
//$tag_string = implode(', ', $anunciant->getTags());
//$t->is($tag_string, 'tag_1, tag_2, tag_3', '->getTags() return an array of tags.');
//
//
//$t->comment("->setTag accepts culture option");
//$anunciant->setTags('tag_es',array('culture' => 'en'));
//$anunciant->save();
//$t->is(Doctrine_Core::getTable('tag')->createQuery('q')->where('culture = ?','en')->count(), 1, 'Nombre de tags en en = 1');
//

