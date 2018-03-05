<?php


/**
 * Base class that represents a query for the 'formato_correo' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Mon Mar  5 02:41:01 2018
 *
 * @method FormatoCorreoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method FormatoCorreoQuery orderByTipo($order = Criteria::ASC) Order by the tipo column
 * @method FormatoCorreoQuery orderByContenido($order = Criteria::ASC) Order by the contenido column
 *
 * @method FormatoCorreoQuery groupById() Group by the id column
 * @method FormatoCorreoQuery groupByTipo() Group by the tipo column
 * @method FormatoCorreoQuery groupByContenido() Group by the contenido column
 *
 * @method FormatoCorreoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method FormatoCorreoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method FormatoCorreoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method FormatoCorreo findOne(PropelPDO $con = null) Return the first FormatoCorreo matching the query
 * @method FormatoCorreo findOneOrCreate(PropelPDO $con = null) Return the first FormatoCorreo matching the query, or a new FormatoCorreo object populated from the query conditions when no match is found
 *
 * @method FormatoCorreo findOneById(int $id) Return the first FormatoCorreo filtered by the id column
 * @method FormatoCorreo findOneByTipo(string $tipo) Return the first FormatoCorreo filtered by the tipo column
 * @method FormatoCorreo findOneByContenido(string $contenido) Return the first FormatoCorreo filtered by the contenido column
 *
 * @method array findById(int $id) Return FormatoCorreo objects filtered by the id column
 * @method array findByTipo(string $tipo) Return FormatoCorreo objects filtered by the tipo column
 * @method array findByContenido(string $contenido) Return FormatoCorreo objects filtered by the contenido column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseFormatoCorreoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseFormatoCorreoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'FormatoCorreo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new FormatoCorreoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     FormatoCorreoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return FormatoCorreoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof FormatoCorreoQuery) {
            return $criteria;
        }
        $query = new FormatoCorreoQuery();
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
     * @return   FormatoCorreo|FormatoCorreo[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FormatoCorreoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(FormatoCorreoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   FormatoCorreo A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `TIPO`, `CONTENIDO` FROM `formato_correo` WHERE `ID` = :p0';
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
            $obj = new FormatoCorreo();
            $obj->hydrate($row);
            FormatoCorreoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return FormatoCorreo|FormatoCorreo[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|FormatoCorreo[]|mixed the list of results, formatted by the current formatter
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
     * @return FormatoCorreoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FormatoCorreoPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return FormatoCorreoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FormatoCorreoPeer::ID, $keys, Criteria::IN);
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
     * @return FormatoCorreoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(FormatoCorreoPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTipo('fooValue');   // WHERE tipo = 'fooValue'
     * $query->filterByTipo('%fooValue%'); // WHERE tipo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tipo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FormatoCorreoQuery The current query, for fluid interface
     */
    public function filterByTipo($tipo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tipo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tipo)) {
                $tipo = str_replace('*', '%', $tipo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FormatoCorreoPeer::TIPO, $tipo, $comparison);
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
     * @return FormatoCorreoQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FormatoCorreoPeer::CONTENIDO, $contenido, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   FormatoCorreo $formatoCorreo Object to remove from the list of results
     *
     * @return FormatoCorreoQuery The current query, for fluid interface
     */
    public function prune($formatoCorreo = null)
    {
        if ($formatoCorreo) {
            $this->addUsingAlias(FormatoCorreoPeer::ID, $formatoCorreo->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
