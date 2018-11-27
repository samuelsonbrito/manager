<?php 

namespace Sauim\Framework;

use Pimple\Container;
use Sauim\Framework\QueryBuilder;

class Model 
{
    protected $db;
    protected $events;
    protected $queryBuilder;
    protected $table;

    public function __construct(Container $container)
    {
        $this->db = $container['db'];
        $this->events = $container['events'];
        $this->queryBuilder = new QueryBuilder;

    }

    public function get(array $conditions)
    {
        $query = $this->queryBuilder->select($this->table)->where($conditions)->getData();
        $stmt = $this->db->prepare($query->sql);
        $stmt->execute($query->bind);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all()
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create(array $data)
    {
        $this->events->trigger("creating.{$this->table}", null, $data);

        $query = $this->queryBuilder->insert($this->table, $data)->getData();

        $stmt = $this->db->prepare($query->sql);
        $stmt->execute($query->bind);

        $result = $this->get(['id' => $this->db->lastInsertId()]);

        $this->events->trigger("created.{$this->table}", null, $result);

        return $result;
    }

    public function update(array $conditions, array $data)
    {
        $this->events->trigger("updating.{$this->table}", null, $data);

        $query = $this->queryBuilder->update($this->table, $data)->where($conditions)->getData();

        $stmt = $this->db->prepare($query->sql);
        $stmt->execute(array_values($query->bind));

        $result = $this->get($conditions);

        $this->events->trigger("updated.{$this->table}", null, $result);

        return $result;
    }

    public function delete($conditions)
    {
        $result = $this->get($conditions);
            
        $this->events->trigger("deleting.{$this->table}", null, $result);

        $query = $this->queryBuilder->delete($this->table)->where($conditions)->getData();
        $stmt = $this->db->prepare($query->sql);
        $stmt->execute($query->bind);

        $this->events->trigger('deleted.users', null, $result);

        return $result;
    }
}