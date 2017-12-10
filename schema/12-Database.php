<?php
|--
|- Database + Models
|-
|- Prerequisites
|- Exceptions
|- PDO
|- Chaining Methods
|-
|-----------------------
|- Config File
|- Will be an array that will contain database connection data
|-
|- server: Server name , usually "localhost"
|- dbname: Database Name
|- dbuser: Datbase User
|- dbpass: Database Password
|-
|--------------------------------
|- Database Class
|-
|- This class is fully responsible for handling all queries on database
|-
|- Properties
|-
|- private \System\Application $app: Application Object
|- private static PDO $connection: PDO Object
|- private int $lastId Get the last insert id after insert query
|- private array $data The data that will be stored in database => Used with insert and update methods
|- private array $wheres A Container for where clause
|- private string $table The table name
|- private array $bindings Used for binding data

|- private int $rows Total number of rows returned from fetchAll query
|- private int $limit Limit the number of returned records
|- private int $offset Start Getting records from this offset => Zero is the first record
|- private array $joins A Container for join clause
|- private string $orders Order the records
|- private array $selects Determine which column(s) will be selected
|-
|- Methods
|-
|- public  \System\Databsae from(string $table)
|- public  \System\Databsae table(string $table)
|- public  \System\Databsae where(string $where, ...$values)
|- public  \System\Databsae insert(string $table = null)
|- public  \System\Databsae data(mixed $key, mixed $value)
|- public  \System\Databsae update(string $table = null)
|- public \PDOStatement query(string $sql, array ...$bindings) : Execute the given $sql Query
|- public  int lastId()
|- public  \PDO connection()
|- private void connect()
|- private void addToBindings(mixed $bindings)

|- public  \System\Databsae select(string $select)
|- public  \System\Databsae limit(int $limit, int $offset = 0)
|- public  \System\Databsae orderBy(string $orderBy)
|- public  \System\Databsae delete()
|- public  \stdClass fetch(string $table = null)
|- public  array fetchAll(string $table = null)
|- public  array getBindings()
|- private string fetchStatement()
|- private string getWhereClause()
|- private void reset()
|-
--|

SELECT COLUMNS(*) FROM TABLE LEFT JOIN TABLE_2 ON .... WHERE ...
LIMIT NUMBER OFFSET NUMBER ORDER BY COLUMN