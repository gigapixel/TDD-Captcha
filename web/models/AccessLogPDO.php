<?php

class AccessLogPDO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function count()
    {
        $sql = "select count(*) from access_log";
        $sth = $this->pdo->prepare($sql);
        $sth->execute();

        $row = $sth->fetch(PDO::FETCH_NUM);
        return $row[0];
    }
}
