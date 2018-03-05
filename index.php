<?php ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OOP PHP Basics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php

    // Creating a class
    class Bond 
    {
        /**
         *  Public/Private/Protected Are Access Modifiers
         **/

        // Public can be accessed from anywhere outside of this Class
            // public $filmCount;

        // Private can only be accessed from within this Class
            // private $name;

        // Protected can only be accessed from this Class and extensions of it
            // protected $name;

        // Properties for this class
            private $name;
            private $height;
            private $films;
        
        // Static prop
            private static $filmCount = 0;

        /**
         *  Methods to access information (getters/setters)
         **/

        // Getters
        public function getName(){
            return $this->name;
        }
        public function getHeight(){
            return $this->height;
        }
        public function getFilms(){
            return $this->films;
        }
        public function listFilms(){
            return '<li>'.((count($this->films)) ? implode('</li><li>', $this->films) : 'None').'</li>';
        }

        // Setters
        public function setName($name){
            $this->name = $name;
        }
        public function setHeight($height){
            $this->height = $height;
        }
        public function setFilms($films){
            $this->films = $films;
        }

        /**
         *  Static Methods
         **/

        public static function getFilmCount(){
            return self::$filmCount;
        }

        /**
         *  Constructors, Methods that run when Object is created from Class
         **/

        // Creating a constructor
        public function __construct($name, $height, $films){

            // Can pass in values to set
            $this->name = $name;
            $this->height = $height;
            $this->films = $films;

            // Magic Property '__CLASS__'
            echo '<p>'.__CLASS__.' Created</p>';

        }

        // Deconstructor
        public function __destruct(){
            echo '<p>'.__CLASS__.' Destroyed</p>';
        }


    }

    // Instantiating a Bond Class
    $bond5 = new Bond('Timothy Dalton', 188, ['License to Kill (1989)', 'The Living Daylights (1987)']);

    echo '<h3>'.$bond5->getName().'</h3>';
    echo '<ul>'.$bond5->listFilms().'</ul>';

        class Villain extends Bond
        {

            // Child Constructor
            public function __construct($name, $height, $films, $henchmen){

                // Have to pass to parent constructor
                parent::__construct($name, $height, $films);

                // Now we can deal with child values
                $this->henchmen = $henchmen;

                echo '<p>A new '.__CLASS__.' has been created</p>';

            }

            // Additional Fields
            private $henchmen;

            // Get/Set
            public function getHenchmen(){
                echo '<strong>'.$this->henchmen.'</strong>';
            }
            public function listHenchmen(){
                return '<li>'.((count($this->henchmen)) ? implode('</li><li>', $this->henchmen) : 'None').'</li>';
            }
            public function setHenchmen($henchmen){
                $this->henchmen = $henchmen;
            }

        }

        $v1 = new Villain('Blofeld', 170, ['Thunderball (1963)', 'From Russia With Love (1965)', 'You Only Live Twice (1967)'], ['Vargas', 'Helga Brandt', 'Count Lippe']);

        echo $v1->getName();
        echo '<ul>'.$v1->listHenchmen().'</ul>';

        // Accessing non-instantiated Object via static method
        echo Bond::getFilmCount();

    ?>

</body>
</html>
