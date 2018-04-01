<?php


/**
 * Base class that represents a query for the 'municipio' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Sun Apr  1 20:27:09 2018
 *
 * @method MunicipioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method MunicipioQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method MunicipioQuery orderByDepartamentoId($order = Criteria::ASC) Order by the departamento_id column
 *
 * @method MunicipioQuery groupById() Group by the id column
 * @method MunicipioQuery groupByDescripcion() Group by the descripcion column
 * @method MunicipioQuery groupByDepartamentoId() Group by the departamento_id column
 *
 * @method MunicipioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MunicipioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MunicipioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MunicipioQuery leftJoinDepartamento($relationAlias = null) Adds a LEFT JOIN clause to the query using the Departamento relation
 * @method MunicipioQuery rightJoinDepartamento($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Departamento relation
 * @method MunicipioQuery innerJoinDepartamento($relationAlias = null) Adds a INNER JOIN clause to the query using the Departamento relation
 *
 * @method MunicipioQuery leftJoinDireccionRequerimiento($relationAlias = null) Adds a LEFT JOIN clause to the query using the DireccionRequerimiento relation
 * @method MunicipioQuery rightJoinDireccionRequerimiento($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DireccionRequerimiento relation
 * @method MunicipioQuery innerJoinDireccionRequerimiento($relationAlias = null) Adds a INNER JOIN clause to the query using the DireccionRequerimiento relation
 *
 * @method MunicipioQuery leftJoinPropiedad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Propiedad relation
 * @method MunicipioQuery rightJoinPropiedad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Propiedad relation
 * @method MunicipioQuery innerJoinPropiedad($relationAlias = null) Adds a INNER JOIN clause to the query using the Propiedad relation
 *
 * @method Municipio findOne(PropelPDO $con = null) Return the first Municipio matching the query
 * @method Municipio findOneOrCreate(PropelPDO $con = null) Return the first Municipio matching the query, or a new Municipio object populated from the query conditions when no match is found
 *
 * @method Municipio findOneById(int $id) Return the first Municipio filtered by the id column
 * @method Municipio findOneByDescripcion(string $descripcion) Return the first Municipio filtered by the descripcion column
 * @method Municipio findOneByDepartamentoId(int $departamento_id) Return the first Municipio filtered by the departamento_id column
 *
 * @method array findById(int $id) Return Municipio objects filtered by the id column
 * @method array findByDescripcion(string $descripcion) Return Municipio objects filtered by the descripcion column
 * @method array findByDepartamentoId(int $departamento_id) Return Municipio objects filtered by the departamento_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseMunicipioQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMunicipioQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Municipio', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MunicipioQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     MunicipioQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MunicipioQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MunicipioQuery) {
            return $criteria;
        }
        $query = new MunicipioQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Municipio|Municipio[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MunicipioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MunicipioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   Municipio A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `DESCRIPCION`, `DEPARTAMENTO_ID` FROM `municipio` WHERE `ID` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Municipio();
            $obj->hydrate($row);
            MunicipioPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Municipio|Municipio[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Municipio[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return MunicipioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MunicipioPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MunicipioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MunicipioPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MunicipioQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(MunicipioPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcion('fooValue');   // WHERE descripcion = 'fooValue'
     * $query->filterByDescripcion('%fooValue%'); // WHERE descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MunicipioQuery The current query, for fluid interface
     */
    public function filterByDescripcion($descripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descripcion)) {
                $descripcion = str_replace('*', '%', $descripcion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MunicipioPeer::DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query on the departamento_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartamentoId(1234); // WHERE departamento_id = 1234
     * $query->filterByDepartamentoId(array(12, 34)); // WHERE departamento_id IN (12, 34)
     * $query->filterByDepartamentoId(array('min' => 12)); // WHERE departamento_id > 12
     * </code>
     *
     * @see       filterByDepartamento()
     *
     * @param     mixed $departamentoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MunicipioQuery The current query, for fluid interface
     */
    public function filterByDepartamentoId($departamentoId = null, $comparison = null)
    {
        if (is_array($departamentoId)) {
            $useMinMax = false;
            if (isset($departamentoId['min'])) {
                $this->addUsingAlias(MunicipioPeer::DEPARTAMENTO_ID, $departamentoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($departamentoId['max'])) {
                $this->addUsingAlias(MunicipioPeer::DEPARTAMENTO_ID, $departamentoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MunicipioPeer::DEPARTAMENTO_ID, $departamentoId, $comparison);
    }

    /**
     * Filter the query by a related Departamento object
     *
     * @param   Departamento|PropelObjectCollection $departamento The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   MunicipioQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByDepartamento($departamento, $comparison = null)
    {
        if ($departamento instanceof Departamento) {
            return $this
                ->addUsingAlias(MunicipioPeer::DEPARTAMENTO_ID, $departamento->getId(), $comparison);
        } elseif ($departamento instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MunicipioPeer::DEPARTAMENTO_ID, $departamento->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByDepartamento() only accepts arguments of type Departamento or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Departamento relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MunicipioQuery The current query, for fluid interface
     */
    public function joinDepartamento($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Departamento');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Departamento');
        }

        return $this;
    }

    /**
     * Use the Departamento relation Departamento object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DepartamentoQuery A secondary query class using the current class as primary query
     */
    public function useDepartamentoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDepartamento($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Departamento', 'DepartamentoQuery');
    }

    /**
     * Filter the query by a related DireccionRequerimiento object
     *
     * @param   DireccionRequerimiento|PropelObjectCollection $direccionRequerimiento  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   MunicipioQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByDireccionRequerimiento($direccionRequerimiento, $comparison = null)
    {
        if ($direccionRequerimiento instanceof DireccionRequerimiento) {
            return $this
                ->addUsingAlias(MunicipioPeer::ID, $direccionRequerimiento->getMunicipioId(), $comparison);
        } elseif ($direccionRequerimiento instanceof PropelObjectCollection) {
            return $this
                ->useDireccionRequerimientoQuery()
                ->filterByPrimaryKeys($direccionRequerimiento->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDireccionRequerimiento() only accepts arguments of type DireccionRequerimiento or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DireccionRequerimiento relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MunicipioQuery The current query, for fluid interface
     */
    public function joinDireccionRequerimiento($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DireccionRequerimiento');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'DireccionRequerimiento');
        }

        return $this;
    }

    /**
     * Use the DireccionRequerimiento relation DireccionRequerimiento object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DireccionRequerimientoQuery A secondary query class using the current class as primary query
     */
    public function useDireccionRequerimientoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDireccionRequerimiento($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DireccionRequerimiento', 'DireccionRequerimientoQuery');
    }

    /**
     * Filter the query by a related Propiedad object
     *
     * @param   Propiedad|PropelObjectCollection $propiedad  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   MunicipioQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByPropiedad($propiedad, $comparison = null)
    {
        if ($propiedad instanceof Propiedad) {
            return $this
                ->addUsingAlias(MunicipioPeer::ID, $propiedad->getMunicipioId(), $comparison);
        } elseif ($propiedad instanceof PropelObjectCollection) {
            return $this
                ->usePropiedadQuery()
                ->filterByPrimaryKeys($propiedad->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPropiedad() only accepts arguments of type Propiedad or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Propiedad relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MunicipioQuery The current query, for fluid interface
     */
    public function joinPropiedad($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Propiedad');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Propiedad');
        }

        return $this;
    }

    /**
     * Use the Propiedad relation Propiedad object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PropiedadQuery A secondary query class using the current class as primary query
     */
    public function usePropiedadQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPropiedad($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Propiedad', 'PropiedadQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Municipio $municipio Object to remove from the list of results
     *
     * @return MunicipioQuery The current query, for fluid interface
     */
    public function prune($municipio = null)
    {
        if ($municipio) {
            $this->addUsingAlias(MunicipioPeer::ID, $municipio->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
