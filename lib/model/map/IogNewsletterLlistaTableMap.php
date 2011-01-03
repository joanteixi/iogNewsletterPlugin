<?php


/**
 * This class defines the structure of the 'iog_newsletter_llista' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Fri Dec 31 17:14:27 2010
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.iogNewsletterPlugin.lib.model.map
 */
class IogNewsletterLlistaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.iogNewsletterPlugin.lib.model.map.IogNewsletterLlistaTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('iog_newsletter_llista');
		$this->setPhpName('IogNewsletterLlista');
		$this->setClassname('IogNewsletterLlista');
		$this->setPackage('plugins.iogNewsletterPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addColumn('NOM', 'Nom', 'VARCHAR', false, 255, null);
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('iogNewsletter', 'iogNewsletter', RelationMap::ONE_TO_MANY, array('id' => 'iog_newsletter_llista_id', ), null, null);
    $this->addRelation('IogNewsletterEmails', 'IogNewsletterEmails', RelationMap::ONE_TO_MANY, array('id' => 'iog_newsletter_llista_id', ), null, null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // IogNewsletterLlistaTableMap