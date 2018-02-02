<?php


/**
 * Base class that represents a query for the 'tasa_cambio' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Sun Jan 28 19:58:55 2018
 *
 * @method TasaCambioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method TasaCambioQuery orderByMonedaOrigen($order = Criteria::ASC) Order by the moneda_origen column
 * @method TasaCambioQuery orderByMonedaDestino($order = Criteria::ASC) Order by the moneda_destino column
 * @method TasaCambioQuery orderByMonto($order = Criteria::ASC) Order by the monto column
 *
 * @method TasaCambioQuery groupById() Group by the id column
 * @method TasaCambioQuery groupByMonedaOrigen() Group by the moneda_origen column
 * @method TasaCambioQuery groupByMonedaDestino() Group by the moneda_destino column
 * @method TasaCambioQuery groupByMonto() Group by the monto column
 *
 * @method TasaCambioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TasaCambioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TasaCambioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TasaCambioQuery leftJoinMonedaRelatedByMonedaOrigen($relationAlias = null) Adds a LEFT JOIN clause to the query using the MonedaRelatedByMonedaOrigen relation
 * @method TasaCambioQuery rightJoinMonedaRelatedByMonedaOrigen($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MonedaRelatedByMonedaOrigen relation
 * @method TasaCambioQuery innerJoinMonedaRelatedByMonedaOrigen($relationAlias = null) Adds a INNER JOIN clause to the query using the MonedaRelatedByMonedaOrigen relation
 *
 * @method TasaCambioQuery leftJoinMonedaRelatedByMonedaDestino($relationAlias = null) Adds a LEFT JOIN clause to the query using the MonedaRelatedByMonedaDestino relation
 * @method TasaCambioQuery rightJoinMonedaRelatedByMonedaDestino($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MonedaRelatedByMonedaDestino relation
 * @method TasaCambioQuery innerJoinMonedaRelatedByMonedaDestino($relationAlias = null) Adds a INNER JOIN clause to the query using the MonedaRelatedByMonedaDestino relation
 *
 * @method TasaCambio findOne(PropelPDO $con = null) Return the first TasaCambio matching the query
 * @method TasaCambio findOneOrCreate(PropelPDO $con = null) Return the first TasaCambio matching the query, or a new TasaCambio object populated from the query conditions when no match is found
 *
 * @method TasaCambio findOneById(int $id) Return the first TasaCambio filtered by the id column
 * @method TasaCambio findOneByMonedaOrigen(int $moneda_origen) Return the first TasaCambio filtered by the moneda_origen column
 * @method TasaCambio findOneByMonedaDestino(int $moneda_destino) Return the first TasaCambio filtered by the moneda_destino column
 * @method TasaCambio findOneByMonto(double $monto) Return the first TasaCambio filtered by the monto column
 *
 * @method array findById(int $id) Return TasaCambio objects filtered by the id column
 * @method array findByMonedaOrigen(int $moneda_origen) Return TasaCambio objects filtered by the moneda_origen column
 * @method array findByMonedaDestino(int $moneda_destino) Return TasaCambio objects filtered by the moneda_destino column
 * @method array findByMonto(double $monto) Return TasaCambio objects filtered by the monto column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTasaCambioQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTasaCambioQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'TasaCambio', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TasaCambioQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TasaCambioQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TasaCambioQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TasaCambioQuery) {
            return $criteria;
        }
        $query = new TasaCambioQuery();
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
     * @return   TasaCambio|TasaCambio[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TasaCambioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TasaCambioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   TasaCambio A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `MONEDA_ORIGEN`, `MONEDA_DESTINO`, `MONTO` FROM `tasa_cambio` WHERE `ID` = :p0';
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
            $obj = new TasaCambio();
            $obj->hydrate($row);
            TasaCambioPeer::addInstanceToPool($obj, (string) $key);
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
     * @return TasaCambio|TasaCambio[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TasaCambio[]|mixed the list of results, formatted by the current formatter
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
     * @return TasaCambioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TasaCambioPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TasaCambioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TasaCambioPeer::ID, $keys, Criteria::IN);
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
     * @return TasaCambioQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TasaCambioPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the moneda_origen column
     *
     * Example usage:
     * <code>
     * $query->filterByMonedaOrigen(1234); // WHERE moneda_origen = 1234
     * $query->filterByMonedaOrigen(array(12, 34)); // WHERE moneda_origen IN (12, 34)
     * $query->filterByMonedaOrigen(array('min' => 12)); // WHERE moneda_origen > 12
     * </code>
     *
     * @see       filterByMonedaRelatedByMonedaOrigen()
     *
     * @param     mixed $monedaOrigen The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TasaCambioQuery The current query, for fluid interface
     */
    public function filterByMonedaOrigen($monedaOrigen = null, $comparison = null)
    {
        if (is_array($monedaOrigen)) {
            $useMinMax = false;
            if (isset($monedaOrigen['min'])) {
                $this->addUsingAlias(TasaCambioPeer::MONEDA_ORIGEN, $monedaOrigen['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($monedaOrigen['max'])) {
                $this->addUsingAlias(TasaCambioPeer::MONEDA_ORIGEN, $monedaOrigen['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TasaCambioPeer::MONEDA_ORIGEN, $monedaOrigen, $comparison);
    }

    /**
     * Filter the query on the moneda_destino column
     *
     * Example usage:
     * <code>
     * $query->filterByMonedaDestino(1234); // WHERE moneda_destino = 1234
     * $query->filterByMonedaDestino(array(12, 34)); // WHERE moneda_destino IN (12, 34)
     * $query->filterByMonedaDestino(array('min' => 12)); // WHERE moneda_destino > 12
     * </code>
     *
     * @see       filterByMonedaRelatedByMonedaDestino()
     *
     * @param     mixed $monedaDestino The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TasaCambioQuery The current query, for fluid interface
     */
    public function filterByMonedaDestino($monedaDestino = null, $comparison = null)
    {
        if (is_array($monedaDestino)) {
            $useMinMax = false;
            if (isset($monedaDestino['min'])) {
                $this->addUsingAlias(TasaCambioPeer::MONEDA_DESTINO, $monedaDestino['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($monedaDestino['max'])) {
                $this->addUsingAlias(TasaCambioPeer::MONEDA_DESTINO, $monedaDestino['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TasaCambioPeer::MONEDA_DESTINO, $monedaDestino, $comparison);
    }

    /**
     * Filter the query on the monto column
     *
     * Example usage:
     * <code>
     * $query->filterByMonto(1234); // WHERE monto = 1234
     * $query->filterByMonto(array(12, 34)); // WHERE monto IN (12, 34)
     * $query->filterByMonto(array('min' => 12)); // WHERE monto > 12
     * </code>
     *
     * @param     mixed $monto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TasaCambioQuery The current query, for fluid interface
     */
    public function filterByMonto($monto = null, $comparison = null)
    {
        if (is_array($monto)) {
            $useMinMax = false;
            if (isset($monto['min'])) {
                $this->addUsingAlias(TasaCambioPeer::MONTO, $monto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($monto['max'])) {
                $this->addUsingAlias(TasaCambioPeer::MONTO, $monto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TasaCambioPeer::MONTO, $monto, $comparison);
    }

    /**
     * Filter the query by a related Moneda object
     *
     * @param   Moneda|PropelObjectCollection $moneda The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TasaCambioQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByMonedaRelatedByMonedaOrigen($moneda, $comparison = null)
    {
        if ($moneda instanceof Moneda) {
            return $this
                ->addUsingAlias(TasaCambioPeer::MONEDA_ORIGEN, $moneda->getId(), $comparison);
        } elseif ($moneda instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TasaCambioPeer::MONEDA_ORIGEN, $moneda->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMonedaRelatedByMonedaOrigen() only accepts arguments of type Moneda or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MonedaRelatedByMonedaOrigen relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TasaCambioQuery The current query, for fluid interface
     */
    public function joinMonedaRelatedByMonedaOrigen($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MonedaRelatedByMonedaOrigen');

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
            $this->addJoinObject($join, 'MonedaRelatedByMonedaOrigen');
        }

        return $this;
    }

    /**
     * Use the MonedaRelatedByMonedaOrigen relation Moneda object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MonedaQuery A secondary query class using the current class as primary query
     */
    public function useMonedaRelatedByMonedaOrigenQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMonedaRelatedByMonedaOrigen($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MonedaRelatedByMonedaOrigen', 'MonedaQuery');
    }

    /**
     * Filter the query by a related Moneda object
     *
     * @param   Moneda|PropelObjectCollection $moneda The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TasaCambioQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByMonedaRelatedByMonedaDestino($moneda, $comparison = null)
    {
        if ($moneda instanceof Moneda) {
            return $this
                ->addUsingAlias(TasaCambioPeer::MONEDA_DESTINO, $moneda->getId(), $comparison);
        } elseif ($moneda instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TasaCambioPeer::MONEDA_DESTINO, $moneda->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMonedaRelatedByMonedaDestino() only accepts arguments of type Moneda or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MonedaRelatedByMonedaDestino relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TasaCambioQuery The current query, for fluid interface
     */
    public function joinMonedaRelatedByMonedaDestino($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MonedaRelatedByMonedaDestino');

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
            $this->addJoinObject($join, 'MonedaRelatedByMonedaDestino');
        }

        return $this;
    }

    /**
     * Use the MonedaRelatedByMonedaDestino relation Moneda object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MonedaQuery A secondary query class using the current class as primary query
     */
    public function useMonedaRelatedByMonedaDestinoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMonedaRelatedByMonedaDestino($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MonedaRelatedByMonedaDestino', 'MonedaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   TasaCambio $tasaCambio Object to remove from the list of results
     *
     * @return TasaCambioQuery The current query, for fluid interface
     */
    public function prune($tasaCambio = null)
    {
        if ($tasaCambio) {
            $this->addUsingAlias(TasaCambioPeer::ID, $tasaCambio->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
