<?php
//Database Table Name->category
class Category
{
    protected $id;
    protected $category;
    protected $user_id;


    public $conn;

    function setId($id)
    {
        $this->id = $id;
    }
    function getId()
    {
        return $this->id;
    }

    function setCategory($category)
    {
        $this->category = $category;
    }
    function getCategory()
    {
        return $this->category;
    }

    function setUser_ID($user_id)
    {
        $this->user_id = $user_id;
    }
    function getUser_ID()
    {
        return $this->user_id;
    }

    function __construct()
    {
        include_once 'config/Dbconnect.php';
        $db = new database();
        $this->conn = $db->connect();
    }

    //query for inserting category....
    public function insertNewCategoryData()
    {
        $stmt = $this->conn->prepare("INSERT INTO category (category_name,user_id) VALUES (:vcategory,:user_Id)");
        $stmt->bindParam(':vcategory', $this->category);
        $stmt->bindParam(':user_Id', $this->user_id);
        try {
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //query for selecting category by using userid ....
    public function  getCategoryDataByUserId($categoryUserID)
    {
        $stmt = $this->conn->prepare('SELECT id,category_name,user_id FROM category WHERE user_id = :user_id');
        $stmt->bindParam(':user_id', $categoryUserID);
        try {
            if ($stmt->execute()) {
                $userCategoryData = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $userCategoryData;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //query for showing  category by using id ....
    public function  viewCategoryData($id)
    {
        $stmt = $this->conn->prepare('SELECT category_name FROM category WHERE id = :id');
        $stmt->bindParam(':id', $id);
        try {
            if ($stmt->execute()) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                return $user;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //query for updating  category by using id ....
    public function updateCategoryData($id, $category)
    {
        $stmt = $this->conn->prepare('UPDATE category SET category_name=:vcategory WHERE id=:id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':vcategory', $category);
        try {
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    //query for deleting  category by using id....
    function deletetCategoryData($id)
    {
        $stmt = $this->conn->prepare('DELETE FROM category WHERE id = :id ');

        $stmt->bindParam(':id', $id);

        try {
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}