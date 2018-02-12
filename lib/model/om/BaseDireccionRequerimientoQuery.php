<?php


/**
 * Base class that represents a query for the 'direccion_requerimiento' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Sun Feb 11 19:52:26 2018
 *
 * @method DireccionRequerimientoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method DireccionRequerimientoQuery orderByRequerimientoId($order = Criteria::ASC) Order by the requerimiento_id column
 * @method DireccionRequerimientoQuery orderByDepartamentoId($order = Criteria::ASC) Order by the departamento_id column
 * @method DireccionRequerimientoQuery orderByMunicipioId($order = Criteria::ASC) Order by the municipio_id column
 * @method DireccionRequerimientoQuery orderByZona($order = Criteria::ASC) Order by the zona column
 * @method DireccionRequerimientoQuery orderByCarreteraId($order = Criteria::ASC) Order by the carretera_id column
 * @method DireccionRequerimientoQuery orderByKm($order = Criteria::ASC) Order by the km column
 * @method DireccionRequerimientoQuery orderByDireccion($order = Criteria::ASC) Order by the direccion column
 *
 * @method DireccionRequerimientoQuery groupById() Group by the id column
 * @method DireccionRequerimientoQuery groupByRequerimientoId() Group by the requerimiento_id column
 * @method DireccionRequerimientoQuery groupByDepartamentoId() Group by the departamento_id column
 * @method DireccionRequerimientoQuery groupByMunicipioId() Group by the municipio_id column
 * @method DireccionRequerimientoQuery groupByZona() Group by the zona column
 * @method DireccionRequerimientoQuery groupByCarreteraId() Group by the carretera_id column
 * @method DireccionRequerimientoQuery groupByKm() Group by the km column
 * @method DireccionRequerimientoQuery groupByDireccion() Group by the direccion column
 *
 * @method DireccionRequerimientoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DireccionRequerimientoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DireccionRequerimientoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DireccionRequerimientoQuery leftJoinRequerimiento($relationAlias = null) Adds a LEFT JOIN clause to the query using the Requerimiento relation
 * @method DireccionRequerimientoQuery rightJoinRequerimiento($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Requerimiento relation
 * @method DireccionRequerimientoQuery innerJoinRequerimiento($relationAlias = null) Adds a INNER JOIN clause to the query using the Requerimiento relation
 *
 * @method DireccionRequerimientoQuery leftJoinDepartamento($relationAlias = null) Adds a LEFT JOIN clause to the query using the Departamento relation
 * @method DireccionRequerimientoQuery rightJoinDepartamento($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Departamento relation
 * @method DireccionRequerimientoQuery innerJoinDepartamento($relationAlias = null) Adds a INNER JOIN clause to the query using the Departamento relation
 *
 * @method DireccionRequerimientoQuery leftJoinMunicipio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Municipio relation
 * @method DireccionRequerimientoQuery rightJoinMunicipio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Municipio relation
 * @method DireccionRequerimientoQuery innerJoinMunicipio($relationAlias = null) Adds a INNER JOIN clause to the query using the Municipio relation
 *
 * @method DireccionRequerimientoQuery leftJoinCarretera($relationAlias = null) Adds a LEFT JOIN clause to the query using the Carretera relation
 * @method DireccionRequerimientoQuery rightJoinCarretera($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Carretera relation
 * @method DireccionRequerimientoQuery innerJoinCarretera($relationAlias = null) Adds a INNER JOIN clause to the query using the Carretera relation
 *
 * @method DireccionRequerimiento findOne(PropelPDO $con = null) Return the first DireccionRequerimiento matching the query
 * @method DireccionRequerimiento findOneOrCreate(PropelPDO $con = null) Return the first DireccionRequerimiento matching the query, or a new DireccionRequerimiento object populated from the query conditions when no match is found
 *
 * @method DireccionRequerimiento findOneById(int $id) Return the first DireccionRequerimiento filtered by the id column
 * @method DireccionRequerimiento findOneByRequerimientoId(int $requerimiento_id) Return the first DireccionRequerimiento filtered by the requerimiento_id column
 * @method DireccionRequerimiento findOneByDepartamentoId(int $departamento_id) Return the first DireccionRequerimiento filtered by the departamento_id column
 * @method DireccionRequerimiento findOneByMunicipioId(int $municipio_id) Return the first DireccionRequerimiento filtered by the municipio_id column
 * @method DireccionRequerimiento findOneByZona(string $zona) Return the first DireccionRequerimiento filtered by the zona column
 * @method DireccionRequerimiento findOneByCarreteraId(int $carretera_id) Return the first DireccionRequerimiento filtered by the carretera_id column
 * @method DireccionRequerimiento findOneByKm(string $km) Return the first DireccionRequerimiento filtered by the km column
 * @method DireccionRequerimiento findOneByDireccion(string $direccion) Return the first DireccionRequerimiento filtered by the direccion column
 *
 * @method array findById(int $id) Return DireccionRequerimiento objects filtered by the id column
 * @method array findByRequerimientoId(int $requerimiento_id) Return DireccionRequerimiento objects filtered by the requerimiento_id column
 * @method array findByDepartamentoId(int $departamento_id) Return DireccionRequerimiento objects filtered by the departamento_id column
 * @method array findByMunicipioId(int $municipio_id) Return DireccionRequerimiento objects filtered by the municipio_id column
 * @method array findByZona(string $zona) Return DireccionRequerimiento objects filtered by the zona column
 * @method array findByCarreteraId(int $carretera_id) Return DireccionRequerimiento objects filtered by the carretera_id column
 * @method array findByKm(string $km) Return DireccionRequerimiento objects filtered by the km column
 * @method array findByDireccion(string $direccion) Return DireccionRequerimiento objects filtered by the direccion column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseDireccionRequerimientoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDireccionRequerimientoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'DireccionRequerimiento', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DireccionRequerimientoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     DireccionRequerimientoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DireccionRequerimientoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DireccionRequerimientoQuery) {
            return $criteria;
        }
        $query = new DireccionRequerimientoQuery();
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
     * @return   DireccionRequerimiento|DireccionRequerimiento[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DireccionRequerimientoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DireccionRequerimientoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   DireccionRequerimiento A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `REQUERIMIENTO_ID`, `DEPARTAMENTO_ID`, `MUNICIPIO_ID`, `ZONA`, `CARRETERA_ID`, `KM`, `DIRECCION` FROM `direccion_requerimiento` WHERE `ID` = :p0';
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
            $obj = new DireccionRequerimiento();
            $obj->hydrate($row);
            DireccionRequerimientoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return DireccionRequerimiento|DireccionRequerimiento[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|DireccionRequerimiento[]|mixed the list of results, formatted by the current formatter
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
     * @return DireccionRequerimientoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DireccionRequerimientoPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DireccionRequerimientoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DireccionRequerimientoPeer::ID, $keys, Criteria::IN);
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
     * @return DireccionRequerimientoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(DireccionRequerimientoPeer::ID, $id, $comparison);
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
     * @return DireccionRequerimientoQuery The current query, for fluid interface
     */
    public function filterByRequerimientoId($requerimientoId = null, $comparison = null)
    {
        if (is_array($requerimientoId)) {
            $useMinMax = false;
            if (isset($requerimientoId['min'])) {
                $this->addUsingAlias(DireccionRequerimientoPeer::REQUERIMIENTO_ID, $requerimientoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($requerimientoId['max'])) {
                $this->addUsingAlias(DireccionRequerimientoPeer::REQUERIMIENTO_ID, $requerimientoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionRequerimientoPeer::REQUERIMIENTO_ID, $requerimientoId, $comparison);
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
     * @return DireccionRequerimientoQuery The current query, for fluid interface
     */
    public function filterByDepartamentoId($departamentoId = null, $comparison = null)
    {
        if (is_array($departamentoId)) {
            $useMinMax = false;
            if (isset($departamentoId['min'])) {
                $this->addUsingAlias(DireccionRequerimientoPeer::DEPARTAMENTO_ID, $departamentoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($departamentoId['max'])) {
                $this->addUsingAlias(DireccionRequerimientoPeer::DEPARTAMENTO_ID, $departamentoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionRequerimientoPeer::DEPARTAMENTO_ID, $departamentoId, $comparison);
    }

    /**
     * Filter the query on the municipio_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMunicipioId(1234); // WHERE municipio_id = 1234
     * $query->filterByMunicipioId(array(12, 34)); // WHERE municipio_id IN (12, 34)
     * $query->filterByMunicipioId(array('min' => 12)); // WHERE municipio_id > 12
     * </code>
     *
     * @see       filterByMunicipio()
     *
     * @param     mixed $municipioId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DireccionRequerimientoQuery The current query, for fluid interface
     */
    public function filterByMunicipioId($municipioId = null, $comparison = null)
    {
        if (is_array($municipioId)) {
            $useMinMax = false;
            if (isset($municipioId['min'])) {
                $this->addUsingAlias(DireccionRequerimientoPeer::MUNICIPIO_ID, $municipioId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($municipioId['max'])) {
                $this->addUsingAlias(DireccionRequerimientoPeer::MUNICIPIO_ID, $municipioId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionRequerimientoPeer::MUNICIPIO_ID, $municipioId, $comparison);
    }

    /**
     * Filter the query on the zona column
     *
     * Example usage:
     * <code>
     * $query->filterByZona('fooValue');   // WHERE zona = 'fooValue'
     * $query->filterByZona('%fooValue%'); // WHERE zona LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zona The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DireccionRequerimientoQuery The current query, for fluid interface
     */
    public function filterByZona($zona = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zona)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $zona)) {
                $zona = str_replace('*', '%', $zona);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DireccionRequerimientoPeer::ZONA, $zona, $comparison);
    }

    /**
     * Filter the query on the carretera_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCarreteraId(1234); // WHERE carretera_id = 1234
     * $query->filterByCarreteraId(array(12, 34)); // WHERE carretera_id IN (12, 34)
     * $query->filterByCarreteraId(array('min' => 12)); // WHERE carretera_id > 12
     * </code>
     *
     * @see       filterByCarretera()
     *
     * @param     mixed $carreteraId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DireccionRequerimientoQuery The current query, for fluid interface
     */
    public function filterByCarreteraId($carreteraId = null, $comparison = null)
    {
        if (is_array($carreteraId)) {
            $useMinMax = false;
            if (isset($carreteraId['min'])) {
                $this->addUsingAlias(DireccionRequerimientoPeer::CARRETERA_ID, $carreteraId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carreteraId['max'])) {
                $this->addUsingAlias(DireccionRequerimientoPeer::CARRETERA_ID, $carreteraId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionRequerimientoPeer::CARRETERA_ID, $carreteraId, $comparison);
    }

    /**
     * Filter the query on the km column
     *
     * Example usage:
     * <code>
     * $query->filterByKm('fooValue');   // WHERE km = 'fooValue'
     * $query->filterByKm('%fooValue%'); // WHERE km LIKE '%fooValue%'
     * </code>
     *
     * @param     string $km The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DireccionRequerimientoQuery The current query, for fluid interface
     */
    public function filterByKm($km = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($km)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $km)) {
                $km = str_replace('*', '%', $km);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DireccionRequerimientoPeer::KM, $km, $comparison);
    }

    /**
     * Filter the query on the direccion column
     *
     * Example usage:
     * <code>
     * $query->filterByDireccion('fooValue');   // WHERE direccion = 'fooValue'
     * $query->filterByDireccion('%fooValue%'); // WHERE direccion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $direccion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DireccionRequerimientoQuery The current query, for fluid interface
     */
    public function filterByDireccion($direccion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($direccion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $direccion)) {
                $direccion = str_replace('*', '%', $direccion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DireccionRequerimientoPeer::DIRECCION, $direccion, $comparison);
    }

    /**
     * Filter the query by a related Requerimiento object
     *
     * @param   Requerimiento|PropelObjectCollection $requerimiento The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DireccionRequerimientoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByRequerimiento($requerimiento, $comparison = null)
    {
        if ($requerimiento instanceof Requerimiento) {
            return $this
                ->addUsingAlias(DireccionRequerimientoPeer::REQUERIMIENTO_ID, $requerimiento->getId(), $comparison);
        } elseif ($requerimiento instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DireccionRequerimientoPeer::REQUERIMIENTO_ID, $requerimiento->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return DireccionRequerimientoQuery The current query, for fluid interface
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
     * Filter the query by a related Departamento object
     *
     * @param   Departamento|PropelObjectCollection $departamento The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DireccionRequerimientoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByDepartamento($departamento, $comparison = null)
    {
        if ($departamento instanceof Departamento) {
            return $this
                ->addUsingAlias(DireccionRequerimientoPeer::DEPARTAMENTO_ID, $departamento->getId(), $comparison);
        } elseif ($departamento instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DireccionRequerimientoPeer::DEPARTAMENTO_ID, $departamento->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return DireccionRequerimientoQuery The current query, for fluid interface
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
     * Filter the query by a related Municipio object
     *
     * @param   Municipio|PropelObjectCollection $municipio The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DireccionRequerimientoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByMunicipio($municipio, $comparison = null)
    {
        if ($municipio instanceof Municipio) {
            return $this
                ->addUsingAlias(DireccionRequerimientoPeer::MUNICIPIO_ID, $municipio->getId(), $comparison);
        } elseif ($municipio instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DireccionRequerimientoPeer::MUNICIPIO_ID, $municipio->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return DireccionRequerimientoQuery The current query, for fluid interface
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
     * Filter the query by a related Carretera object
     *
     * @param   Carretera|PropelObjectCollection $carretera The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DireccionRequerimientoQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCarretera($carretera, $comparison = null)
    {
        if ($carretera instanceof Carretera) {
            return $this
                ->addUsingAlias(DireccionRequerimientoPeer::CARRETERA_ID, $carretera->getId(), $comparison);
        } elseif ($carretera instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DireccionRequerimientoPeer::CARRETERA_ID, $carretera->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCarretera() only accepts arguments of type Carretera or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Carretera relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DireccionRequerimientoQuery The current query, for fluid interface
     */
    public function joinCarretera($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Carretera');

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
            $this->addJoinObject($join, 'Carretera');
        }

        return $this;
    }

    /**
     * Use the Carretera relation Carretera object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CarreteraQuery A secondary query class using the current class as primary query
     */
    public function useCarreteraQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCarretera($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Carretera', 'CarreteraQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   DireccionRequerimiento $direccionRequerimiento Object to remove from the list of results
     *
     * @return DireccionRequerimientoQuery The current query, for fluid interface
     */
    public function prune($direccionRequerimiento = null)
    {
        if ($direccionRequerimiento) {
            $this->addUsingAlias(DireccionRequerimientoPeer::ID, $direccionRequerimiento->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
