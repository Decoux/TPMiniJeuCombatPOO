<?php 

try {
    $db = new PDO('mysql:host=localhost;dbname=fight_game;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

class personnageManager
{
    private $_db;


    /****************************
     * constructor for data base
     *
     * @param PDO $db
     */
    public function __construct($db)
    {
        $this->_db = $db;
    }


    /****************************
     * Set the value of _db
     *
     * @return  self
     */
    public function setDb($db)
    {
        $this->_db = $db;

        return $this;
    }

    /****************************
     * Insert Warrior in DB
     *
     * @param Warrior $perso
     * @return void
     */
    public function add($arg_name){
        $req = $this->_db->prepare('INSERT INTO warrior(names, damage) VALUES (:names, :damage)');
        $req->bindValue(':names', $arg_name, PDO::PARAM_STR);
        $req->bindValue(':damage', 0, PDO::PARAM_INT);
        $req->execute();
    }

    /***************************
     * Get warrior from DB
     *
     * @return $dataOfWarrior object
     */
    public function getWarrior($arg_name){
        $req = $this->_db->prepare('SELECT * FROM warrior WHERE names = :names');
        $req->bindValue(':names', $arg_name, PDO::PARAM_STR);
        $req->execute();
        $data_warrior = $req ->fetch(PDO::FETCH_ASSOC);
        $warrior = new warrior($data_warrior);
        return $warrior;
    }

    public function getWarriors()
    {
        $arrayOfwarrior = [];
        $req = $this->_db->query('SELECT * FROM warrior ORDER BY id DESC LIMIT 1, 999999');
        
        $data_warriors = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data_warriors as $warrior) {
            $arrayOfwarrior[] = new Warrior($warrior);
        }
        return $arrayOfwarrior;
        
    }

    public function getLastWarrior(){
        $lastWarrior = [];

        $req = $this->_db->query('SELECT * FROM warrior ORDER BY id DESC LIMIT 1');
        $warrior_data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($warrior_data as $warrior){
            $lastWarrior[] = new Warrior($warrior);
        }

        return $lastWarrior;
    }
    



    /***************************
     * Update Warrior in DB
     *
     * @param Warrior $perso
     * @return void
     */
    public function update(Warrior $perso){
        $checked = $this->_db->prepare('UPDATE warrior SET damage = :damage WHERE id = :id');
        $checked -> execute(array(
            "damage" => $perso->getDamage(),
            "id" => $perso->getId()
        ));
    }

    /***************************
     * Delete warrior in DB
     *
     * @param Warrior $perso
     * @return void
     */
    public function delete(Warrior $perso){
        $this->_db->exec('DELETE FROM warrior WHERE id = ' . $perso->getId());
    }

    /****************************
     * if name is already take
     *
     * @return $rep
     */
    public function exist($arg_name){
        $req = $this->_db->prepare('SELECT COUNT(id) as count FROM warrior WHERE names = :names');
        $req->bindValue(':names', $arg_name, PDO::PARAM_STR);
        $req->execute();
        $rep = $req->fetch();
        return $rep['count'] ?? null;
    }

}
