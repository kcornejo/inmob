<?php



/**
 * This class defines the structure of the 'departamento' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Wed Jan 24 03:00:08 2018
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class DepartamentoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.DepartamentoTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('departamento');
        $this->setPhpName('Departamento');
        $this->setClassname('Departamento');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255, null);
        $this->getColumn('DESCRIPCION', false)->setPrimaryString(true);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('DireccionRequerimiento', 'DireccionRequerimiento', RelationMap::ONE_TO_MANY, array('id' => 'departamento_id', ), null, null, 'DireccionRequerimientos');
        $this->addRelation('Propiedad', 'Propiedad', RelationMap::ONE_TO_MANY, array('id' => 'departamento_id', ), null, null, 'Propiedads');
        $this->addRelation('Municipio', 'Municipio', RelationMap::ONE_TO_MANY, array('id' => 'departamento_id', ), null, null, 'Municipios');
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

} // DepartamentoTableMap
