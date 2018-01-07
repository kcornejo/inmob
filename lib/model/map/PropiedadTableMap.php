<?php



/**
 * This class defines the structure of the 'propiedad' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 01/07/18 00:15:26
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class PropiedadTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.PropiedadTableMap';

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
        $this->setName('propiedad');
        $this->setPhpName('Propiedad');
        $this->setClassname('Propiedad');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('TIPO_OPERACION', 'TipoOperacion', 'VARCHAR', false, 32, null);
        $this->addColumn('TIPO_INMUEBLE', 'TipoInmueble', 'VARCHAR', false, 32, null);
        $this->addColumn('CANTIDAD_HABITACION', 'CantidadHabitacion', 'INTEGER', false, null, null);
        $this->addColumn('CANTIDAD_BANIO', 'CantidadBanio', 'INTEGER', false, null, null);
        $this->addColumn('CANTIDAD_PARQUEO', 'CantidadParqueo', 'INTEGER', false, null, null);
        $this->addColumn('CANTIDAD_COMEDOR', 'CantidadComedor', 'INTEGER', false, null, null);
        $this->addColumn('CANTIDAD_SALA', 'CantidadSala', 'INTEGER', false, null, null);
        $this->addColumn('CANTIDAD_COCINA', 'CantidadCocina', 'INTEGER', false, null, null);
        $this->addColumn('DORMITORIO_SERVICIO', 'DormitorioServicio', 'BOOLEAN', false, 1, false);
        $this->addColumn('ESTUDIO', 'Estudio', 'BOOLEAN', false, 1, false);
        $this->addColumn('CISTERNA', 'Cisterna', 'BOOLEAN', false, 1, false);
        $this->addColumn('CANTIDAD_JARDIN', 'CantidadJardin', 'INTEGER', false, null, null);
        $this->addColumn('CANTIDAD_PATIO', 'CantidadPatio', 'INTEGER', false, null, null);
        $this->addColumn('LAVANDERIA', 'Lavanderia', 'BOOLEAN', false, 1, false);
        $this->addColumn('ESTADO', 'Estado', 'VARCHAR', false, 32, null);
        $this->addColumn('AMENIDADES', 'Amenidades', 'VARCHAR', false, 255, null);
        $this->addForeignKey('MONEDA_ID', 'MonedaId', 'INTEGER', 'moneda', 'ID', false, null, null);
        $this->addColumn('PRECIO', 'Precio', 'DOUBLE', false, null, null);
        $this->addColumn('NEGOCIABLE', 'Negociable', 'BOOLEAN', false, 1, false);
        $this->addColumn('INCLUYE_GASTOS_ESCRITURA', 'IncluyeGastosEscritura', 'BOOLEAN', false, 1, false);
        $this->addColumn('ANIO_CONSTRUCCION', 'AnioConstruccion', 'INTEGER', false, null, null);
        $this->addColumn('MANTENIMIENTO_MENSUAL', 'MantenimientoMensual', 'DOUBLE', false, null, null);
        $this->addColumn('IUSI_SEMESTRAL', 'IusiSemestral', 'DOUBLE', false, null, null);
        $this->addColumn('VALOR_AVALUO', 'ValorAvaluo', 'DOUBLE', false, null, null);
        $this->addColumn('MI_COMISION', 'MiComision', 'DOUBLE', false, null, null);
        $this->addColumn('COMISION_COMPARTIDA', 'ComisionCompartida', 'DOUBLE', false, null, null);
        $this->addColumn('NOMBRE_CLIENTE', 'NombreCliente', 'VARCHAR', false, 255, null);
        $this->addColumn('CORREO_CLIENTE', 'CorreoCliente', 'VARCHAR', false, 255, null);
        $this->addColumn('TELEFONO_CLIENTE', 'TelefonoCliente', 'VARCHAR', false, 25, null);
        $this->addForeignKey('DEPARTAMENTO_ID', 'DepartamentoId', 'INTEGER', 'departamento', 'ID', false, null, null);
        $this->addForeignKey('MUNICIPIO_ID', 'MunicipioId', 'INTEGER', 'municipio', 'ID', false, null, null);
        $this->addColumn('ZONA', 'Zona', 'VARCHAR', false, 200, null);
        $this->addForeignKey('CARRETERA_ID', 'CarreteraId', 'INTEGER', 'carretera', 'ID', false, null, null);
        $this->addColumn('KM', 'Km', 'VARCHAR', false, 200, null);
        $this->addColumn('DIRECCION', 'Direccion', 'VARCHAR', false, 255, null);
        $this->addColumn('SEGURIDAD', 'Seguridad', 'DOUBLE', false, null, null);
        $this->addColumn('ACCESOS', 'Accesos', 'DOUBLE', false, null, null);
        $this->addColumn('AGUA', 'Agua', 'DOUBLE', false, null, null);
        $this->addColumn('TRANSPORTE_PUBLICO', 'TransportePublico', 'DOUBLE', false, null, null);
        $this->addColumn('TRANSITO_VEHICULAR', 'TransitoVehicular', 'DOUBLE', false, null, null);
        $this->addColumn('COMUNIDADES_COLIDANTES', 'ComunidadesColidantes', 'DOUBLE', false, null, null);
        $this->addColumn('AREAS_RECREACION', 'AreasRecreacion', 'DOUBLE', false, null, null);
        $this->addColumn('FORMA_PAGO', 'FormaPago', 'VARCHAR', false, 255, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('CREATED_BY', 'CreatedBy', 'VARCHAR', false, 32, null);
        $this->addColumn('UPDATED_BY', 'UpdatedBy', 'VARCHAR', false, 32, null);
        $this->addColumn('TIENE_LUZ', 'TieneLuz', 'BOOLEAN', false, 1, false);
        $this->addColumn('TIENE_AGUA', 'TieneAgua', 'BOOLEAN', false, 1, false);
        $this->addColumn('NIVELES', 'Niveles', 'INTEGER', false, null, null);
        $this->addColumn('AREA', 'Area', 'DOUBLE', false, null, null);
        $this->addColumn('AREA_X', 'AreaX', 'DOUBLE', false, null, null);
        $this->addColumn('AREA_Y', 'AreaY', 'DOUBLE', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Moneda', 'Moneda', RelationMap::MANY_TO_ONE, array('moneda_id' => 'id', ), null, null);
        $this->addRelation('Departamento', 'Departamento', RelationMap::MANY_TO_ONE, array('departamento_id' => 'id', ), null, null);
        $this->addRelation('Municipio', 'Municipio', RelationMap::MANY_TO_ONE, array('municipio_id' => 'id', ), null, null);
        $this->addRelation('Carretera', 'Carretera', RelationMap::MANY_TO_ONE, array('carretera_id' => 'id', ), null, null);
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

} // PropiedadTableMap
