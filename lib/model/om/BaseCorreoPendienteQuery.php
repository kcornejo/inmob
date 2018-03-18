<?php


/**
 * Base class that represents a query for the 'correo_pendiente' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Sun Mar 18 14:41:29 2018
 *
 * @method CorreoPendienteQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CorreoPendienteQuery orderByAsunto($order = Criteria::ASC) Order by the asunto column
 * @method CorreoPendienteQuery orderByContenido($order = Criteria::ASC) Order by the contenido column
 * @method CorreoPendienteQuery orderByBeneficiario($order = Criteria::ASC) Order by the beneficiario column
 * @method CorreoPendienteQuery orderByEnviado($order = Criteria::ASC) Order by the enviado column
 *
 * @method CorreoPendienteQuery groupById() Group by the id column
 * @method CorreoPendienteQuery groupByAsunto() Group by the asunto column
 * @method CorreoPendienteQuery groupByContenido() Group by the contenido column
 * @method CorreoPendienteQuery groupByBeneficiario() Group by the beneficiario column
 * @method CorreoPendienteQuery groupByEnviado() Group by the enviado column
 *
 * @method CorreoPendienteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CorreoPendienteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CorreoPendienteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CorreoPendiente findOne(PropelPDO $con = null) Return the first CorreoPendiente matching the query
 * @method CorreoPendiente findOneOrCreate(PropelPDO $con = null) Return the first CorreoPendiente matching the query, or a new CorreoPendiente object populated from the query conditions when no match is found
 *
 * @method CorreoPendiente findOneById(int $id) Return the first CorreoPendiente filtered by the id column
 * @method CorreoPendiente findOneByAsunto(string $asunto) Return the first CorreoPendiente filtered by the asunto column
 * @method CorreoPendiente findOneByContenido(string $contenido) Return the first CorreoPendiente filtered by the contenido column
 * @method CorreoPendiente findOneByBeneficiario(string $beneficiario) Return the first CorreoPendiente filtered by the beneficiario column
 * @method CorreoPendiente findOneByEnviado(boolean $enviado) Return the first CorreoPendiente filtered by the enviado column
 *
 * @method array findById(int $id) Return CorreoPendiente objects filtered by the id column
 * @method array findByAsunto(string $asunto) Return CorreoPendiente objects filtered by the asunto column
 * @method array findByContenido(string $contenido) Return CorreoPendiente objects filtered by the contenido column
 * @method array findByBeneficiario(string $beneficiario) Return CorreoPendiente objects filtered by the beneficiario column
 * @method array findByEnviado(boolean $enviado) Return CorreoPendiente objects filtered by the enviado column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCorreoPendienteQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCorreoPendienteQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'CorreoPendiente', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CorreoPendienteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     CorreoPendienteQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CorreoPendienteQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CorreoPendienteQuery) {
            return $criteria;
        }
        $query = new CorreoPendienteQuery();
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
     * @return   CorreoPendiente|CorreoPendiente[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CorreoPendientePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CorreoPendientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   CorreoPendiente A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `ASUNTO`, `CONTENIDO`, `BENEFICIARIO`, `ENVIADO` FROM `correo_pendiente` WHERE `ID` = :p0';
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
            $obj = new CorreoPendiente();
            $obj->hydrate($row);
            CorreoPendientePeer::addInstanceToPool($obj, (string) $key);
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
     * @return CorreoPendiente|CorreoPendiente[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|CorreoPendiente[]|mixed the list of results, formatted by the current formatter
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
     * @return CorreoPendienteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CorreoPendientePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CorreoPendienteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CorreoPendientePeer::ID, $keys, Criteria::IN);
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
     * @return CorreoPendienteQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(CorreoPendientePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the asunto column
     *
     * Example usage:
     * <code>
     * $query->filterByAsunto('fooValue');   // WHERE asunto = 'fooValue'
     * $query->filterByAsunto('%fooValue%'); // WHERE asunto LIKE '%fooValue%'
     * </code>
     *
     * @param     string $asunto The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CorreoPendienteQuery The current query, for fluid interface
     */
    public function filterByAsunto($asunto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($asunto)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $asunto)) {
                $asunto = str_replace('*', '%', $asunto);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CorreoPendientePeer::ASUNTO, $asunto, $comparison);
    }

    /**
     * Filter the query on the contenido column
     *
     * Example usage:
     * <code>
     * $query->filterByContenido('fooValue');   // WHERE contenido = 'fooValue'
     * $query->filterByContenido('%fooValue%'); // WHERE contenido LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contenido The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CorreoPendienteQuery The current query, for fluid interface
     */
    public function filterByContenido($contenido = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contenido)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contenido)) {
                $contenido = str_replace('*', '%', $contenido);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CorreoPendientePeer::CONTENIDO, $contenido, $comparison);
    }

    /**
     * Filter the query on the beneficiario column
     *
     * Example usage:
     * <code>
     * $query->filterByBeneficiario('fooValue');   // WHERE beneficiario = 'fooValue'
     * $query->filterByBeneficiario('%fooValue%'); // WHERE beneficiario LIKE '%fooValue%'
     * </code>
     *
     * @param     string $beneficiario The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CorreoPendienteQuery The current query, for fluid interface
     */
    public function filterByBeneficiario($beneficiario = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($beneficiario)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $beneficiario)) {
                $beneficiario = str_replace('*', '%', $beneficiario);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CorreoPendientePeer::BENEFICIARIO, $beneficiario, $comparison);
    }

    /**
     * Filter the query on the enviado column
     *
     * Example usage:
     * <code>
     * $query->filterByEnviado(true); // WHERE enviado = true
     * $query->filterByEnviado('yes'); // WHERE enviado = true
     * </code>
     *
     * @param     boolean|string $enviado The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CorreoPendienteQuery The current query, for fluid interface
     */
    public function filterByEnviado($enviado = null, $comparison = null)
    {
        if (is_string($enviado)) {
            $enviado = in_array(strtolower($enviado), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CorreoPendientePeer::ENVIADO, $enviado, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   CorreoPendiente $correoPendiente Object to remove from the list of results
     *
     * @return CorreoPendienteQuery The current query, for fluid interface
     */
    public function prune($correoPendiente = null)
    {
        if ($correoPendiente) {
            $this->addUsingAlias(CorreoPendientePeer::ID, $correoPendiente->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
