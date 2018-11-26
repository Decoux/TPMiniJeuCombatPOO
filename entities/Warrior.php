<?php

class Warrior{
    private $_id,
            $_name,
            $_damage;

    /********************************
     * Constructor for object Warrior
     *
     * @param integer $id
     * @param string $name
     * @param string $damage
     */
    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /**************************
     * function hydrate object
     *
     * @param array $donnees
     * @return void
     */
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {

            $method = 'set' . ucfirst($key);



            if (method_exists($this, $method)) {

                $this->$method($value);

            }

        }


    }



    /******************************
     * Get the value of _damage
     */ 
    public function getDamage()
    {
         return $this->_damage;
    }

    /******************************
     * Get the value of _name
     */ 
    public function getNames()
    {
         return $this->_name;
    }

    /******************************
     * Get the value of _id
     *
     * @return void
     */
    public function getId(){
        return $this->_id;
    }
    
    /***************************
     * Set the value of _id
     *
     * @return  self
     */
    public function setId(int $id)
    {
        if (is_int($id)) {
            $this->_id = $id;
        }
    }

    /****************************
     * Set the value of _name
     *
     * @return  self
     */ 
    public function setNames(string $name)
    {
        if (is_string($name)){
            $this->_name = $name;
        }
    }

    /*****************************
     * Set the value of _damage
     *
     * @return  self
     */
    public function setDamage(int $damage)
    {
        if (is_int($damage)){
            $this->_damage = $damage;
        }
    }
    /***************************
     * function hit other warrrior
     *
     * @param string $warrior_2
     * @return void
     */
    public function hit()
    {
        $fight = $this->getDamage();
        $fight = $fight + 5;
        $this->setDamage($fight);

    }



}


