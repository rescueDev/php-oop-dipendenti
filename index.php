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
            return 'name: ' . $this->getName() . '<br>'
                . 'lastname: ' . $this->getLastName() . '<br>'
                . 'dateOfBirth: ' . $this->getDateOfBirth() . '<br>';
        }
    }

    $person = new Person('Mario', 'Rossi', '1992-12-03');

    echo $person;



    class Dipendente
    {
        private $qualifica;
        private $ral;
        private $id;

        public function __construct(
            $qualifica,
            $ral,
            $id
        ) {
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
    }

    class Boss
    {
    }



    ?>
</body>

</html>