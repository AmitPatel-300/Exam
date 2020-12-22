<?php
/**
 * Template Class Doc Comment
 * 
 * Template Class
 * 
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
?>
<?php
require_once 'Dbcon.php';
class ViewExam
{
public $conn;
public $name;
public $rows;
    /**
     * Function for dbcon
     */
    public function __construct()
    {
        $con=new Dbcon(); 
        $this->conn=$con->connect();
    }
    /**
     * Function for dbcon
     * 
     * @return viewExam()
     */
    public function viewExam($offset) 
    {
        $sql="SELECT * from question limit 1 OFFSET $offset" ;
        $result = $this->conn->query($sql);
        if ($result->num_rows>0) {
            while ($rows=$result->fetch_assoc()) {
                    $this->rows[]=$rows;
            }
        } else {
            $output = "Error: " . $sql . "<br>" . $this->conn->error;
        }

        return json_encode($this->rows); 
        }
    } 