
namespace App\repositories

use app\Connection;

class UserRepository {

    private $connection;

    public function __construct(){
        $this->connection = Connection->getConnection();
    }
    

    public function findAll(){

    }

    public function findByName(){

    }

    public function findById(){
        
    }

}