<?php



/**
 * This class defines the structure of the 'usuario' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Wed Apr 11 12:20:04 2018
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class UsuarioTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.UsuarioTableMap';

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
        $this->setName('usuario');
        $this->setPhpName('Usuario');
        $this->setClassname('Usuario');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('USUARIO', 'Usuario', 'VARCHAR', true, 32, null);
        $this->getColumn('USUARIO', false)->setPrimaryString(true);
        $this->addColumn('CLAVE', 'Clave', 'VARCHAR', false, 60, null);
        $this->addColumn('CORREO', 'Correo', 'VARCHAR', false, 255, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('CREATED_BY', 'CreatedBy', 'VARCHAR', false, 32, null);
        $this->addColumn('UPDATED_BY', 'UpdatedBy', 'VARCHAR', false, 32, null);
        $this->addColumn('ACTIVO', 'Activo', 'BOOLEAN', false, 1, true);
        $this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 255, null);
        $this->addColumn('NUMERO_TELEFONO', 'NumeroTelefono', 'VARCHAR', false, 255, null);
        $this->addForeignKey('PERFIL_ID', 'PerfilId', 'INTEGER', 'perfil', 'ID', true, null, null);
        $this->addColumn('ADMINISTRADOR', 'Administrador', 'BOOLEAN', false, 1, false);
        $this->addColumn('NOMBRE_COMPLETO', 'NombreCompleto', 'VARCHAR', false, 255, null);
        $this->addColumn('BORRADO', 'Borrado', 'BOOLEAN', false, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Perfil', 'Perfil', RelationMap::MANY_TO_ONE, array('perfil_id' => 'id', ), null, null);
        $this->addRelation('NegocioRelatedByUsuarioReq', 'Negocio', RelationMap::ONE_TO_MANY, array('id' => 'usuario_req', ), null, null, 'NegociosRelatedByUsuarioReq');
        $this->addRelation('NegocioRelatedByUsuarioProp', 'Negocio', RelationMap::ONE_TO_MANY, array('id' => 'usuario_prop', ), null, null, 'NegociosRelatedByUsuarioProp');
        $this->addRelation('Requerimiento', 'Requerimiento', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'Requerimientos');
        $this->addRelation('Propiedad', 'Propiedad', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'Propiedads');
        $this->addRelation('Token', 'Token', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'Tokens');
        $this->addRelation('MensajeNegocio', 'MensajeNegocio', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'MensajeNegocios');
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
            'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
        );
    } // getBehaviors()

} // UsuarioTableMap
