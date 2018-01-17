<?php


/**
 * Base class that represents a query for the 'negocio' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Wed Jan 17 10:59:45 2018
 *
 * @method NegocioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method NegocioQuery orderByRequerimientoId($order = Criteria::ASC) Order by the requerimiento_id column
 * @method NegocioQuery orderByPropiedadId($order = Criteria::ASC) Order by the propiedad_id column
 *
 * @method NegocioQuery groupById() Group by the id column
 * @method NegocioQuery groupByRequerimientoId() Group by the requerimiento_id column
 * @method NegocioQuery groupByPropiedadId() Group by the propiedad_id column
 *
 * @method NegocioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method NegocioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method NegocioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method NegocioQuery leftJoinRequerimiento($relationAlias = null) Adds a LEFT JOIN clause to the query using the Requerimiento relation
 * @method NegocioQuery rightJoinRequerimiento($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Requerimiento relation
 * @method NegocioQuery innerJoinRequerimiento($relationAlias = null) Adds a INNER JOIN clause to the query using the Requerimiento relation
 *
 * @method NegocioQuery leftJoinPropiedad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Propiedad relation
 * @method NegocioQuery rightJoinPropiedad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Propiedad relation
 * @method NegocioQuery innerJoinPropiedad($relationAlias = null) Adds a INNER JOIN clause to the query using the Propiedad relation
 *
 * @method Negocio findOne(PropelPDO $con = null) Return the first Negocio matching the query
 * @method Negocio findOneOrCreate(PropelPDO $con = null) Return the first Negocio matching the query, or a new Negocio object populated from the query conditions when no match is found
 *
 * @method Negocio findOneById(int $id) Return the first Negocio filtered by the id column
 * @method Negocio findOneByRequerimientoId(int $requerimiento_id) Return the first Negocio filtered by the requerimiento_id column
 * @method Negocio findOneByPropiedadId(int $propiedad_id) Return the first Negocio filtered by the propiedad_id column
 *
 * @method array findById(int $id) Return Negocio objects filtered by the id column
 * @method array findByRequerimientoId(int $requerimiento_id) Return Negocio objects filtered by the requerimiento_id column
 * @method array findByPropiedadId(int $propiedad_id) Return Negocio objects filtered by the propiedad_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseNegocioQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseNegocioQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Negocio', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new NegocioQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     NegocioQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return NegocioQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof NegocioQuery) {
            return $criteria;
        }
        $query = new NegocioQuery();
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
     * @return   Negocio|Negocio[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NegocioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(NegocioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Negocio A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `REQUERIMIENTO_ID`, `PROPIEDAD_ID` FROM `negocio` WHERE `ID` = :p0';
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
            $obj = new Negocio();
            $obj->hydrate($row);
            NegocioPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Negocio|Negocio[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Negocio[]|mixed the list of results, formatted by the current formatter
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
     * @return NegocioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NegocioPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return NegocioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NegocioPeer::ID, $keys, Criteria::IN);
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
     * @return NegocioQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(NegocioPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the requerimiento_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRequerimientoId(1234); // WHERE requerimiento_id = 1234
     * $query->filterByRequerimientoId(array(12, 34)); // WHERE requerimiento_id IN (12, 34)
     * $query->filterByRequerimientoId(array('min' => 12)); // WHERE requerimiento_id > 12
     * </code>
     *
     * @see       filterByRequerimiento()
     *
     * @param     mixed $requerimientoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NegocioQuery The current query, for fluid interface
     */
    public function filterByRequerimientoId($requerimientoId = null, $comparison = null)
    {
        if (is_array($requerimientoId)) {
            $useMinMax = false;
            if (isset($requerimientoId['min'])) {
                $this->addUsingAlias(NegocioPeer::REQUERIMIENTO_ID, $requerimientoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($requerimientoId['max'])) {
                $this->addUsingAlias(NegocioPeer::REQUERIMIENTO_ID, $requerimientoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NegocioPeer::REQUERIMIENTO_ID, $requerimientoId, $comparison);
    }

    /**
     * Filter the query on the propiedad_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPropiedadId(1234); // WHERE propiedad_id = 1234
     * $query->filterByPropiedadId(array(12, 34)); // WHERE propiedad_id IN (12, 34)
     * $query->filterByPropiedadId(array('min' => 12)); // WHERE propiedad_id > 12
     * </code>
     *
     * @see       filterByPropiedad()
     *
     * @param     mixed $propiedadId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NegocioQuery The current query, for fluid interface
     */
    public function filterByPropiedadId($propiedadId = null, $comparison = null)
    {
        if (is_array($propiedadId)) {
            $useMinMax = false;
            if (isset($propiedadId['min'])) {
                $this->addUsingAlias(NegocioPeer::PROPIEDAD_ID, $propiedadId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($propiedadId['max'])) {
                $this->addUsingAlias(NegocioPeer::PROPIEDAD_ID, $propiedadId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NegocioPeer::PROPIEDAD_ID, $propiedadId, $comparison);
    }

    /**
     * Filter the query by a related Requerimiento object
     *
     * @param   Requerimiento|PropelObjectCollection $requerimiento The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   NegocioQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByRequerimiento($requerimiento, $comparison = null)
    {
        if ($requerimiento instanceof Requerimiento) {
            return $this
                ->addUsingAlias(NegocioPeer::REQUERIMIENTO_ID, $requerimiento->getId(), $comparison);
        } elseif ($requerimiento instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NegocioPeer::REQUERIMIENTO_ID, $requerimiento->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRequerimiento() only accepts arguments of type Requerimiento or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Requerimiento relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return NegocioQuery The current query, for fluid interface
     */
    public function joinRequerimiento($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Requerimiento');

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
            $this->addJoinObject($join, 'Requerimiento');
        }

        return $this;
    }

    /**
     * Use the Requerimiento relation Requerimiento object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RequerimientoQuery A secondary query class using the current class as primary query
     */
    public function useRequerimientoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRequerimiento($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Requerimiento', 'RequerimientoQuery');
    }

    /**
     * Filter the query by a related Propiedad object
     *
     * @param   Propiedad|PropelObjectCollection $propiedad The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   NegocioQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByPropiedad($propiedad, $comparison = null)
    {
        if ($propiedad instanceof Propiedad) {
            return $this
                ->addUsingAlias(NegocioPeer::PROPIEDAD_ID, $propiedad->getId(), $comparison);
        } elseif ($propiedad instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NegocioPeer::PROPIEDAD_ID, $propiedad->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return NegocioQuery The current query, for fluid interface
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
     * @param   Negocio $negocio Object to remove from the list of results
     *
     * @return NegocioQuery The current query, for fluid interface
     */
    public function prune($negocio = null)
    {
        if ($negocio) {
            $this->addUsingAlias(NegocioPeer::ID, $negocio->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
