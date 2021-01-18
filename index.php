<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dipendenti OOP</title>
</head>

<body>

    <?php
    // creare 3 classi per rappresentare la seguente realta':
    // - persona
    // - dipendente
    // - boss
    // cercare inoltre di scegliere alcune variabili di istanza (max 3 o 4 per classe) che possono avere senso in questa realta' e decidere le relazione di parantela (chi estende chi);
    // per ogni classe definire eventuale classe padre, variabili di istanza, costruttore, proprieta' e toString;
    // instanziando le varie classi provare a stampare cercando di ottenere un log sensato


    class Person
    {
        private $name;
        private $lastname;
        private $dateOfBirth;

        public function __construct(
            $name,
            $lastname,
            $dateOfBirth
        ) {

            $this->setName($name);
            $this->setLastName($lastname);
            $this->setDateOfBirth($dateOfBirth);
        }
        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            return $this->name = $name;
        }


        public function getLastName()
        {
            return $this->lastname;
        }

        public function setLastName($lastname)
        {
            return $this->lastname = $lastname;
        }
        public function getDateOfBirth()
        {
            return $this->dateOfBirth;
        }

        public function setDateOfBirth($dateOfBirth)
        {
            return $this->dateOfBirth = $dateOfBirth;
        }
        public function __toString()
        {
            return '<br>' . 'name: ' . $this->getName() . '<br>'
                . 'lastname: ' . $this->getLastName() . '<br>'
                . 'dateOfBirth: ' . $this->getDateOfBirth() . '<br>';
        }
    }


    class Dipendente extends Person
    {
        private $qualifica;
        private $ral;
        private $id;

        public function __construct($name, $lastname, $dateOfBirth, $qualifica, $ral, $id)
        {

            parent::__construct($name, $lastname, $dateOfBirth);

            $this->setQualifica($qualifica);
            $this->setRal($ral);
            $this->setId($id);
        }

        public function getQualifica()
        {
            return $this->qualifica;
        }

        public function setQualifica($qualifica)
        {
            return $this->qualifica = $qualifica;
        }

        public function getRal()
        {
            return $this->ral;
        }

        public function setRal($ral)
        {
            return $this->ral = $ral;
        }
        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            return $this->id = $id;
        }
        public function __toString()
        {
            return parent::__toString()
                . 'qualifica: ' . $this->getQualifica() . '<br>'
                . 'ral: ' . $this->getRal() . '<br>'
                . 'id: ' . $this->getId() . '<br>';
        }
    }



    class Boss extends Dipendente
    {
        private $sede;
        private $email;

        public function __construct(
            $name,
            $lastname,
            $dateOfBirth,
            $qualifica,
            $ral,
            $id,
            $sede,
            $email
        ) {
            parent::__construct(
                $name,
                $lastname,
                $dateOfBirth,
                $qualifica,
                $ral,
                $id
            );
            $this->setSede($sede);
            $this->setEmail($email);
        }
        public function getSede()
        {
            return $this->sede;
        }
        public function setSede($sede)
        {
            $this->sede = $sede;
        }
        public function getEmail()
        {
            return $this->email;
        }
        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function __toString()
        {
            return parent::__toString()

                . 'sede: ' . $this->getSede() . '<br>'
                . 'email: ' . $this->getEmail() . '<br>';
        }
    }


    $persona = new Person('Gianni', 'Bianchi', '1970-12-24');
    $dipendente = new Dipendente('Fiorenzo', 'Verdi', '1998-01-02', 'operaio', 20000, 2345);
    $boss = new Boss('Mario', 'Rossi', '1992-12-03', 'dirigente', 60000, 0001, 'Bologna', 'boss@gmail.com');

    echo  '<br>'
        . $persona . '<br>'
        . $dipendente . '<br>'
        . $boss;

    ?>
</body>

</html>