<?php
//Database Table Name->vlog
class Vlog
{
    protected $id;
    protected $title;
    protected $description;
    protected $category;
    protected $tags;
    protected $links;
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

    function setTitle($title)
    {
        $this->title = $title;
    }
    function getTitle()
    {
        return $this->title;
    }


    function setUser_ID($user_id)
    {
        $this->user_id = $user_id;
    }
    function getUser_ID()
    {
        return $this->user_id;
    }

    function setDescription($description)
    {
        $this->description = $description;
    }
    function getDescription()
    {
        return $this->description;
    }

    function setCategory($category)
    {
        $this->category = $category;
    }
    function getCategory()
    {
        return $this->category;
    }

    function setTags($tags)
    {
        $this->tags = $tags;
    }
    function getTags()
    {
        return $this->tags;
    }

    function setLinks($links)
    {
        $this->links = $links;
    }
    function getLinks()
    {
        return $this->links;
    }

    function __construct()
    {
        include_once 'config/Dbconnect.php';

        $db = new database();
        $this->conn = $db->connect();
    }



    //query for inserting vlog....
    public function insertNewVlog()
    {
        $stmt = $this->conn->prepare("INSERT INTO vlog (vlog_title,vlog_description,vlog_category,vlog_tags,vlog_links,user_id) VALUES (:vtitle,:vdescription,:vcategory,:vtags,:vlinks,:user_Id)");

        $stmt->bindParam(':vtitle', $this->title);
        $stmt->bindParam(':vdescription', $this->description);
        $stmt->bindParam(':vcategory', $this->category);
        $stmt->bindParam(':vtags', $this->tags);
        $stmt->bindParam(':vlinks', $this->links);
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
    //query for selecting vlog by using userid ....
    public function  getVlogData($vlogUserID)
    {

        $stmt = $this->conn->prepare('SELECT id , vlog_title,vlog_description,vlog_category,vlog_tags, vlog_links, user_id FROM vlog WHERE user_id = :user_id ');
        $stmt->bindParam(':user_id', $vlogUserID);
        try {
            if ($stmt->execute()) {

                $userVlogData = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $userVlogData;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    //query for showing  vlog by using id ....
    public function  viewVlogData($id)
    {
        $stmt = $this->conn->prepare('SELECT vlog_title,vlog_description,vlog_category,vlog_tags,vlog_links FROM vlog WHERE id = :id');
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


    //query for deleting  vlog by using id....
    function deletetVlogData($id)
    {
        $stmt = $this->conn->prepare('DELETE FROM vlog WHERE id = :id ');

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

    //query for updating  vlog by using id ....
    public function updateVlogData($id, $vlog_title, $vlog_description, $vlog_category, $vlog_tags, $vlog_links)
    {
        $stmt = $this->conn->prepare('UPDATE vlog SET vlog_title=:vtitle, vlog_description = :vdescription,vlog_category=:vcategory, vlog_tags=:vtags,vlog_links = :vlinks  WHERE id=:id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':vtitle', $vlog_title);
        $stmt->bindParam(':vdescription', $vlog_description);
        $stmt->bindParam(':vcategory', $vlog_category);
        $stmt->bindParam(':vtags', $vlog_tags);
        $stmt->bindParam(':vlinks', $vlog_links);
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