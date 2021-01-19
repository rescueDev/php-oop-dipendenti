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
        protected $securyLvl;
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
            if ($ral < 10000 || $ral > 100000) {
                throw new Exception('ral range must be between 10000 and 100000');
            }
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
        public function setSecuryLvl($securyLvl)
        {
            if ($securyLvl < 1 || $securyLvl > 5) {
                throw new Exception('secuirity lvl must be between 1 to 5 for employees');
            }
            $this->securyLvl = $securyLvl;
        }
        public function __toString()
        {
            return parent::__toString()
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
            $sector

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

        public function setSecuryLvl($securyLvl)
        {
            if ($securyLvl < 6 || $securyLvl > 10) {
                throw new Exception('secuirity lvl must be between 6 to 10 for bosses');
            }
            $this->securyLvl = $securyLvl;
        }
        public function __toString()
        {
            return parent::__toString() . '<br>'
                . 'profit: ' . $this->getProfit() . '<br>'
                . 'vacancy: ' . $this->getVacancy() . '<br>'
                . 'sector: ' . $this->getSector() . '<br>';
        }
    }



    //istanza person
    try {

        $p1 = new Person(
            'Gianni',
            'Bianchi',
            '2000-12-23',
            1,
        );
        echo '<br>'  . '<strong>Person</strong>' .  '<br>' . $p1;
    } catch (Exception $e) {
        echo 'Error: name is less than 3 char';
    }




    //istanza employee security level
    try {

        $e1 = new Employee(
            'Giovanni',
            'Rossi',
            '1992-12-04',
            5,
            10000,
            '(e)mainTask',
            '(e)idCode',
            '(e)dateOfHiring',
        );
        echo  '<br>'  . '<strong>Employee</strong>' .  '<br>'  . $e1;
    } catch (Exception $e) {
        echo 'Security level must be between 1 and 5 for employees';
    }

    //istanza employee ral
    try {

        $e2 = new Employee(
            'Giovanni',
            'Rossi',
            '1992-12-04',
            5,
            1000,
            '(e)mainTask',
            '(e)idCode',
            '(e)dateOfHiring',
        );
        echo  '<br>'  . '<strong>Employee</strong>' .  '<br>'  . $e2;
    } catch (Exception $e) {
        echo 'Ral error';
    }


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
    );
    echo 'b1:<br>' . $b1 . '<br><br>';

    ?>
</body>

</html>