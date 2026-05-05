<?php

class Ticket {

    private $name;
    private $issue;
    private $category;

    public function __construct($name, $issue, $category) {
        $this->name = htmlspecialchars($name);
        $this->issue = htmlspecialchars($issue);
        $this->category = htmlspecialchars($category);
    }

    public function getData() {
        return [
            "name" => $this->name,
            "issue" => $this->issue,
            "category" => $this->category,
            "time" => date("Y-m-d H:i:s")
        ];
    }
}
?>

