<?php


/**
 * Base class that represents a query for the 'banco' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Mon Mar  5 02:41:01 2018
 *
 * @method BancoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method BancoQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method BancoQuery orderByRelacionCuotaInteres($order = Criteria::ASC) Order by the relacion_cuota_interes column
 * @method BancoQuery orderBySeguroBanco($order = Criteria::ASC) Order by the seguro_banco column
 * @method BancoQuery orderByFactorConstruccion($order = Criteria::ASC) Order by the factor_construccion column
 * @method BancoQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method BancoQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method BancoQuery groupById() Group by the id column
 * @method BancoQuery groupByDescripcion() Group by the descripcion column
 * @method BancoQuery groupByRelacionCuotaInteres() Group by the relacion_cuota_interes column
 * @method BancoQuery groupBySeguroBanco() Group by the seguro_banco column
 * @method BancoQuery groupByFactorConstruccion() Group by the factor_construccion column
 * @method BancoQuery groupByCreatedAt() Group by the created_at column
 * @method BancoQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method BancoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BancoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BancoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Banco findOne(PropelPDO $con = null) Return the first Banco matching the query
 * @method Banco findOneOrCreate(PropelPDO $con = null) Return the first Banco matching the query, or a new Banco object populated from the query conditions when no match is found
 *
 * @method Banco findOneById(int $id) Return the first Banco filtered by the id column
 * @method Banco findOneByDescripcion(string $descripcion) Return the first Banco filtered by the descripcion column
 * @method Banco findOneByRelacionCuotaInteres(double $relacion_cuota_interes) Return the first Banco filtered by the relacion_cuota_interes column
 * @method Banco findOneBySeguroBanco(double $seguro_banco) Return the first Banco filtered by the seguro_banco column
 * @method Banco findOneByFactorConstruccion(double $factor_construccion) Return the first Banco filtered by the factor_construccion column
 * @method Banco findOneByCreatedAt(string $created_at) Return the first Banco filtered by the created_at column
 * @method Banco findOneByUpdatedAt(string $updated_at) Return the first Banco filtered by the updated_at column
 *
 * @method array findById(int $id) Return Banco objects filtered by the id column
 * @method array findByDescripcion(string $descripcion) Return Banco objects filtered by the descripcion column
 * @method array findByRelacionCuotaInteres(double $relacion_cuota_interes) Return Banco objects filtered by the relacion_cuota_interes column
 * @method array findBySeguroBanco(double $seguro_banco) Return Banco objects filtered by the seguro_banco column
 * @method array findByFactorConstruccion(double $factor_construccion) Return Banco objects filtered by the factor_construccion column
 * @method array findByCreatedAt(string $created_at) Return Banco objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Banco objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseBancoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBancoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Banco', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BancoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     BancoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BancoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BancoQuery) {
            return $criteria;
        }
        $query = new BancoQuery();
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
     * @return   Banco|Banco[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BancoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BancoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Banco A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `DESCRIPCION`, `RELACION_CUOTA_INTERES`, `SEGURO_BANCO`, `FACTOR_CONSTRUCCION`, `CREATED_AT`, `UPDATED_AT` FROM `banco` WHERE `ID` = :p0';
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
            $obj = new Banco();
            $obj->hydrate($row);
            BancoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Banco|Banco[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Banco[]|mixed the list of results, formatted by the current formatter
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
     * @return BancoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BancoPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BancoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BancoPeer::ID, $keys, Criteria::IN);
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
     * @return BancoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(BancoPeer::ID, $id, $comparison);
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
     * @return BancoQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BancoPeer::DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query on the relacion_cuota_interes column
     *
     * Example usage:
     * <code>
     * $query->filterByRelacionCuotaInteres(1234); // WHERE relacion_cuota_interes = 1234
     * $query->filterByRelacionCuotaInteres(array(12, 34)); // WHERE relacion_cuota_interes IN (12, 34)
     * $query->filterByRelacionCuotaInteres(array('min' => 12)); // WHERE relacion_cuota_interes > 12
     * </code>
     *
     * @param     mixed $relacionCuotaInteres The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BancoQuery The current query, for fluid interface
     */
    public function filterByRelacionCuotaInteres($relacionCuotaInteres = null, $comparison = null)
    {
        if (is_array($relacionCuotaInteres)) {
            $useMinMax = false;
            if (isset($relacionCuotaInteres['min'])) {
                $this->addUsingAlias(BancoPeer::RELACION_CUOTA_INTERES, $relacionCuotaInteres['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($relacionCuotaInteres['max'])) {
                $this->addUsingAlias(BancoPeer::RELACION_CUOTA_INTERES, $relacionCuotaInteres['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BancoPeer::RELACION_CUOTA_INTERES, $relacionCuotaInteres, $comparison);
    }

    /**
     * Filter the query on the seguro_banco column
     *
     * Example usage:
     * <code>
     * $query->filterBySeguroBanco(1234); // WHERE seguro_banco = 1234
     * $query->filterBySeguroBanco(array(12, 34)); // WHERE seguro_banco IN (12, 34)
     * $query->filterBySeguroBanco(array('min' => 12)); // WHERE seguro_banco > 12
     * </code>
     *
     * @param     mixed $seguroBanco The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BancoQuery The current query, for fluid interface
     */
    public function filterBySeguroBanco($seguroBanco = null, $comparison = null)
    {
        if (is_array($seguroBanco)) {
            $useMinMax = false;
            if (isset($seguroBanco['min'])) {
                $this->addUsingAlias(BancoPeer::SEGURO_BANCO, $seguroBanco['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($seguroBanco['max'])) {
                $this->addUsingAlias(BancoPeer::SEGURO_BANCO, $seguroBanco['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BancoPeer::SEGURO_BANCO, $seguroBanco, $comparison);
    }

    /**
     * Filter the query on the factor_construccion column
     *
     * Example usage:
     * <code>
     * $query->filterByFactorConstruccion(1234); // WHERE factor_construccion = 1234
     * $query->filterByFactorConstruccion(array(12, 34)); // WHERE factor_construccion IN (12, 34)
     * $query->filterByFactorConstruccion(array('min' => 12)); // WHERE factor_construccion > 12
     * </code>
     *
     * @param     mixed $factorConstruccion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BancoQuery The current query, for fluid interface
     */
    public function filterByFactorConstruccion($factorConstruccion = null, $comparison = null)
    {
        if (is_array($factorConstruccion)) {
            $useMinMax = false;
            if (isset($factorConstruccion['min'])) {
                $this->addUsingAlias(BancoPeer::FACTOR_CONSTRUCCION, $factorConstruccion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($factorConstruccion['max'])) {
                $this->addUsingAlias(BancoPeer::FACTOR_CONSTRUCCION, $factorConstruccion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BancoPeer::FACTOR_CONSTRUCCION, $factorConstruccion, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BancoQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(BancoPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(BancoPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BancoPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BancoQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(BancoPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(BancoPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BancoPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Banco $banco Object to remove from the list of results
     *
     * @return BancoQuery The current query, for fluid interface
     */
    public function prune($banco = null)
    {
        if ($banco) {
            $this->addUsingAlias(BancoPeer::ID, $banco->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
