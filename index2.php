<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Level</title>

    <!-- GOAL: sulla base dell'esercizio di ieri (vedi correzione qui su slack) aggiungere i seguenti vincoli di integrita':
    - nomi e cognomi devono essere di >3 caratteri
    - i livelli di sicurezza devono essere [1;5] per i dipendenti e [6;10] per i boss
    - ral employee [10.000;100.000]
    - non puo' esistere boss senza dipendenti
    Durante la fase di test, utilizzare il costrutto try-catch per gestire l'errore e informare l'utente -->
</head>

<body>
    <?php

    class Person
    {
        private $name;
        private $lastname;
        private $dateOfBirth;
        private $securyLvl;
        public function __construct($name, $lastname, $dateOfBirth, $securyLvl)
        {
            $this->setName($name);
            $this->setLastname($lastname);
            $this->setDateOfBirth($dateOfBirth);
            $this->setSecuryLvl($securyLvl);
        }
        public function getName()
        {
            return $this->name;
        }
        public function setName($name)
        {
            if (strlen($name) < 3) {
                throw new Exception('name must be at least 3 charact');
            }
            $this->name = $name;
        }
        public function getLastname()
        {
            return $this->lastname;
        }
        public function setLastname($lastname)
        {
            if (strlen($lastname) < 3) {
                throw new Exception('name must be at least 3 charact');
            }
            $this->lastname = $lastname;
        }
        public function getFullname()
        {
            return $this->getName() . ' ' . $this->getLastname();
        }
        public function getDateOfBirth()
        {
            return $this->dateOfBirth;
        }
        public function setDateOfBirth($dateOfBirth)
        {
            $this->dateOfBirth = $dateOfBirth;
        }
        public function getSecuryLvl()
        {
            return $this->securyLvl;
        }
        public function setSecuryLvl($securyLvl)
        {
            $this->securyLvl = $securyLvl;
        }
        public function __toString()
        {
            return
                'name: ' . $this->getName() . '<br>'
                . 'lastname: ' . $this->getLastname() . '<br>'
                . 'dateOfBirth: ' . $this->getDateOfBirth() . '<br>'
                . 'securyLvl: ' . $this->getSecuryLvl() . '<br>';
        }
    }
    // VERSIONE 1
    class Employee extends Person
    {
        private $ral;
        private $mainTask;
        private $idCode;
        private $dateOfHiring;
        public function __construct(
            $name,
            $lastname,
            $dateOfBirth,
            $securyLvl,
            $ral,
            $mainTask,
            $idCode,
            $dateOfHiring
        ) {
            parent::__construct($name, $lastname, $dateOfBirth, $securyLvl);
            $this->setRal($ral);
            $this->setMainTask($mainTask);
            $this->setIdCode($idCode);
            $this->setDateOfHiring($dateOfHiring);
        }
        public function getRal()
        {
            return $this->ral;
        }
        public function setRal($ral)
        {
            $this->ral = $ral;
        }
        public function getMainTask()
        {
            return $this->mainTask;
        }
        public function setMainTask($mainTask)
        {
            $this->mainTask = $mainTask;
        }
        public function getIdCode()
        {
            return $this->idCode;
        }
        public function setIdCode($idCode)
        {
            $this->idCode = $idCode;
        }
        public function getDateOfHiring()
        {
            return $this->dateOfHiring;
        }
        public function setDateOfHiring($dateOfHiring)
        {
            $this->dateOfHiring = $dateOfHiring;
        }
        public function __toString()
        {
            return parent::__toString() . '<br>'
                . 'ral: ' . $this->ral . '<br>'
                . 'mainTask: ' . $this->mainTask . '<br>'
                . 'idCode: ' . $this->idCode . '<br>'
                . 'dateOfHiring: ' . $this->dateOfHiring . '<br>';
        }
    }
    class Boss extends Employee
    {
        private $profit;
        private $vacancy;
        private $sector;
        private $employees;
        public function __construct(
            $name,
            $lastname,
            $dateOfBirth,
            $securyLvl,
            $ral,
            $mainTask,
            $idCode,
            $dateOfHiring,
            $profit,
            $vacancy,
            $sector,
            $employees = []
        ) {
            parent::__construct(
                $name,
                $lastname,
                $dateOfBirth,
                $securyLvl,
                $ral,
                $mainTask,
                $idCode,
                $dateOfHiring
            );
            $this->setProfit($profit);
            $this->setVacancy($vacancy);
            $this->setSector($sector);
            $this->setEmployees($employees);
        }
        public function getProfit()
        {
            return $this->profit;
        }
        public function setProfit($profit)
        {
            $this->profit = $profit;
        }
        public function getVacancy()
        {
            return $this->vacancy;
        }
        public function setVacancy($vacancy)
        {
            $this->vacancy = $vacancy;
        }
        public function getSector()
        {
            return $this->sector;
        }
        public function setSector($sector)
        {
            $this->sector = $sector;
        }
        public function getEmployees()
        {
            return $this->employees;
        }
        public function setEmployees($employees)
        {
            $this->employees = $employees;
        }
        public function __toString()
        {
            return parent::__toString() . '<br>'
                . 'profit: ' . $this->getProfit() . '<br>'
                . 'vacancy: ' . $this->getVacancy() . '<br>'
                . 'sector: ' . $this->getSector() . '<br>'
                . 'employees:<br>' . $this->getEmpsStr() . '<br>';
        }
        /* private function getEmpsStr()
        {
            $str = '';
            for ($x = 0; $x < count($this->getEmployees()); $x++) {
                $emp = $this->getEmployees()[$x];
                $fullname = $emp->getName() . ' ' . $emp->getLastname();
                $str .= ($x + 1) . ': ' . $fullname . '<br>';
            }
            return $str;
        } */
    }

    try {

        $p1 = new Person(
            'Gianni',
            'Bianchi',
            '2000-12-23',
            6,
        );
        echo $p1;
    } catch (Exception $e) {
        echo 'Error: name is less than 3 char';
    }


    // echo 'p1:<br>' . $p1 . '<br><br>';
    $e1 = new Employee(
        '(e)name',
        '(e)lastname',
        '(e)dateOfBirth',
        '(e)securyLvl',
        '(e)ral',
        '(e)mainTask',
        '(e)idCode',
        '(e)dateOfHiring',
    );
    // echo 'e1:<br>' . $e1 . '<br><br>';
    $b1 = new Boss(
        '(b)name',
        '(b)lastname',
        '(b)dateOfBirth',
        '(b)securyLvl',
        '(b)ral',
        '(b)mainTask',
        '(b)idCode',
        '(b)dateOfHiring',
        '(b)profit',
        '(b)vacancy',
        '(b)sector',
        [
            $e1,
            $e1,
            $e1,
            $e1,
        ]
    );
    echo 'b1:<br>' . $b1 . '<br><br>';

    ?>
</body>

</html>