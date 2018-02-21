<?php


/**
 * Base class that represents a query for the 'departamento' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Wed Feb 21 03:20:37 2018
 *
 * @method DepartamentoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method DepartamentoQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 *
 * @method DepartamentoQuery groupById() Group by the id column
 * @method DepartamentoQuery groupByDescripcion() Group by the descripcion column
 *
 * @method DepartamentoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DepartamentoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DepartamentoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DepartamentoQuery leftJoinDireccionRequerimiento($relationAlias = null) Adds a LEFT JOIN clause to the query using the DireccionRequerimiento relation
 * @method DepartamentoQuery rightJoinDireccionRequerimiento($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DireccionRequerimiento relation
 * @method DepartamentoQuery innerJoinDireccionRequerimiento($relationAlias = null) Adds a INNER JOIN clause to the query using the DireccionRequerimiento relation
 *
 * @method DepartamentoQuery leftJoinPropiedad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Propiedad relation
 * @method DepartamentoQuery rightJoinPropiedad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Propiedad relation
 * @method DepartamentoQuery innerJoinPropiedad($relationAlias = null) Adds a INNER JOIN clause to the query using the Propiedad relation
 *
 * @method DepartamentoQuery leftJoinMunicipio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Municipio relation
 * @method DepartamentoQuery rightJoinMunicipio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Municipio relation
 * @method DepartamentoQuery innerJoinMunicipio($relationAlias = null) Adds a INNER JOIN clause to the query using the Municipio relation
 *
 * @method Departamento findOne(PropelPDO $con = null) Return the first Departamento matching the query
 * @method Departamento findOneOrCreate(PropelPDO $con = null) Return the first Departamento matching the query, or a new Departamento object populated from the query conditions when no match is found
 *
 * @method Departamento findOneById(int $id) Return the first Departamento filtered by the id column
 * @method Departamento findOneByDescripcion(string $descripcion) Return the first Departamento filtered by the descripcion column
 *
 * @method array findById(int $id) Return Departamento objects filtered by the id column
 * @method array findByDescripcion(string $descripcion) Return Departamento objects filtered by the descripcion column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseDepartamentoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDepartamentoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Departamento', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DepartamentoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     DepartamentoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DepartamentoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DepartamentoQuery) {
            return $criteria;
        }
        $query = new DepartamentoQuery();
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
     * @return   Departamento|Departamento[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DepartamentoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DepartamentoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Departamento A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `DESCRIPCION` FROM `departamento` WHERE `ID` = :p0';
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
            $obj = new Departamento();
            $obj->hydrate($row);
            DepartamentoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Departamento|Departamento[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Departamento[]|mixed the list of results, formatted by the current formatter
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
     * @return DepartamentoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DepartamentoPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DepartamentoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DepartamentoPeer::ID, $keys, Criteria::IN);
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
     * @return DepartamentoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(DepartamentoPeer::ID, $id, $comparison);
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
     * @return DepartamentoQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DepartamentoPeer::DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query by a related DireccionRequerimiento object
     *
     * @param   DireccionRequerimiento|PropelObjectCollection $direccionRequerimiento  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DepartamentoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByDireccionRequerimiento($direccionRequerimiento, $comparison = null)
    {
        if ($direccionRequerimiento instanceof DireccionRequerimiento) {
            return $this
                ->addUsingAlias(DepartamentoPeer::ID, $direccionRequerimiento->getDepartamentoId(), $comparison);
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
     * @return DepartamentoQuery The current query, for fluid interface
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
     * @return   DepartamentoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByPropiedad($propiedad, $comparison = null)
    {
        if ($propiedad instanceof Propiedad) {
            return $this
                ->addUsingAlias(DepartamentoPeer::ID, $propiedad->getDepartamentoId(), $comparison);
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
     * @return DepartamentoQuery The current query, for fluid interface
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
     * Filter the query by a related Municipio object
     *
     * @param   Municipio|PropelObjectCollection $municipio  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DepartamentoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByMunicipio($municipio, $comparison = null)
    {
        if ($municipio instanceof Municipio) {
            return $this
                ->addUsingAlias(DepartamentoPeer::ID, $municipio->getDepartamentoId(), $comparison);
        } elseif ($municipio instanceof PropelObjectCollection) {
            return $this
                ->useMunicipioQuery()
                ->filterByPrimaryKeys($municipio->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMunicipio() only accepts arguments of type Municipio or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Municipio relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DepartamentoQuery The current query, for fluid interface
     */
    public function joinMunicipio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Municipio');

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
            $this->addJoinObject($join, 'Municipio');
        }

        return $this;
    }

    /**
     * Use the Municipio relation Municipio object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MunicipioQuery A secondary query class using the current class as primary query
     */
    public function useMunicipioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMunicipio($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Municipio', 'MunicipioQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Departamento $departamento Object to remove from the list of results
     *
     * @return DepartamentoQuery The current query, for fluid interface
     */
    public function prune($departamento = null)
    {
        if ($departamento) {
            $this->addUsingAlias(DepartamentoPeer::ID, $departamento->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
