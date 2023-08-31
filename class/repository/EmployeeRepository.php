<?php

class EmployeeRepository
{

    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    /**
     * Get db.
     *
     * @return db.
     */
    public function getDb():PDO
    {
        return $this->db;
    }
    
    /**
     * Set db.
     *
     * @param db the value to set.
     */
    public function setDb(PDO $db)
    {
        $this->db = $db;
    }

    public function add(Zoo $zoo):bool
    {
        $addSql = 'INSERT INTO employee(name_employee, date_of_birth, sex_employee, created_at) VALUES(:name, :dob, :sex, NOW());';
        $bindSql = 'INSERT INTO employee_zoo(id_employee, id_zoo, since) VALUES(:employee, :zoo, NOW());';

        $addRequest = $this->getDb()->prepare($addSql);

        $isAdded = $addRequest->execute([
            ':name' => htmlspecialchars($_POST['name']),
            ':dob' => htmlspecialchars($_POST['dob']),
            ':sex' => htmlspecialchars($_POST['sex'])
        ]);

        if ($isAdded) {
            $lastEmployee = $this->findLast();
            $bindRequest = $this->getDb()->prepare($bindSql);

            return $bindRequest->execute([
                ':employee' => $lastEmployee->getId(),
                ':zoo' => $zoo->getId()
            ]);
        }

        return $isAdded;
    }

    public function findAll():array
    {
        $employees = [];
        $sql = 'SELECT * FROM employee AS e INNER JOIN employee_zoo AS ez ON e.id_employee = ez.id_employee WHERE id_zoo = 1;';

        $request = $this->getDb()->query($sql);
        $datas = $request->fetchAll(PDO::FETCH_ASSOC);

        foreach($datas as $employee) {
            $employees[] = new Employee($employee);
        }

        return $employees;
    }

    public function findLast():Employee|null
    {
        $sql = 'SELECT MAX(id_employee) as id_employee, name_employee, sex_employee, date_of_birth, created_at FROM employee;';

        $request = $this->getDb()->query($sql);
        $datas = $request->fetch(PDO::FETCH_ASSOC);

        if ($datas) {
            return new Employee($datas);
        }

        return null;
 
    }

    public function find(int $id):Employee|null
    {
        $sql = 'SELECT * FROM employee AS e INNER JOIN employee_zoo AS ez ON e.id_employee = ez.id_employee WHERE e.id_employee = :id AND id_zoo = 1;';

        $request = $this->getDb()->prepare($sql);
        $request->execute([':id' => $id]);

        $datas = $request->fetch(PDO::FETCH_ASSOC);

        if ($datas) {
            return new Employee($datas);
        }

        return null;
    }

    public function update():bool
    {
        $sql = 'UPDATE employee SET name_employee = :name, date_of_birth = :dob, sex_employee = :sex WHERE id_employee = :id';
        $request = $this->getDb()->prepare($sql);

        return $request->execute([
            ':name' => htmlspecialchars($_POST['name']),
            ':dob' => htmlspecialchars($_POST['dob']),
            ':sex' => htmlspecialchars($_POST['sex']),
            ':id' => htmlspecialchars($_POST['id'])
        ]);
    }

    public function delete(int $id):bool
    {
        $sql = 'DELETE FROM employee_zoo WHERE id_employee = :employee AND id_zoo = 1;';
        $request = $this->getDb()->prepare($sql);

        return $request->execute([
            ':employee' => $_GET['id']
        ]);
    }

}

?>
