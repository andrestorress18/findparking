<?php
abstract class Model
{
    private static $db_host = 'localhost';
    private static $db_user = 'root';
    private static $db_pass = '';
    protected $db_name = 'iCash_db';
    private static $db_charset = "utf8";
    private $conn;
    protected $query;
    protected $rows = array();

    abstract protected function set();
    abstract protected function get();
    abstract protected function del();

    private function db_open()
    {
        $this->conn = new mysqli(
            self::$db_host,
            self::$db_user,
            self::$db_pass,
            $this->db_name
        );
        $this->conn->set_charset(self::$db_charset);
    }
    private function db_close()
    {
        $this->conn->close();

    }
    protected function set_query()
    {
        $this->db_open();
        $this->conn->query($this->query);
        if ($this->conn->errno <> 0) {
            $id = -1;
        }else {
            $id = $this->conn->insert_id;
        }
        $this->db_close();
        return $id;
    }
    protected function get_query()
    {
        $this->db_open();
        $result = $this->conn->query($this->query) or die($this->conn->error);
        $num_rows = $result->num_rows;
        while ($this->rows[] = $result->fetch_assoc());
        $result->close();
        $this->db_close();
        return array_pop($this->rows);
    }
}
