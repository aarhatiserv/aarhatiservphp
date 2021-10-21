<?php
//Database Table Name->portfolio_submenu
class PortfolioSubmenu
{
    protected $id;
    protected $submenuParentId;
    protected $submenu;

    public $conn;

    function setId($id)
    {
        $this->id = $id;
    }
    function getId()
    {
        return $this->id;
    }
    function setSubmenuParentId($submenuParentId)
    {
        $this->submenuParentId = $submenuParentId;
    }
    function getSubmenuParentId()
    {
        return $this->submenuParentId;
    }

    function setSubmenu($submenu)
    {
        $this->submenu = $submenu;
    }
    function getSubmenu()
    {
        return $this->submenu;
    }

    function __construct()
    {
        include_once 'config/Dbconnect.php';
        $db = new database();
        $this->conn = $db->connect();
    }

    //query for inserting new Portfolio Submenu....
    public function insertNewPortfolioSubmenu()
    {
        $sql = "INSERT INTO portfolio_submenu(submenu_parent_Id,submenu_name) VALUE(:submenu_parent_Id,:submenu_name) ON DUPLICATE KEY UPDATE submenu_parent_Id=:submenu_parent_Id,submenu_name=:submenu_name";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':submenu_parent_Id', $this->submenuParentId);
        $stmt->bindParam(':submenu_name', $this->submenu);
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


    //query for selecting Portfolio by using Submenu....
    public function  getPortfolioSubmenuDataByMenu($submenuParentId)
    {
        $stmt = $this->conn->prepare('SELECT id,submenu_name FROM portfolio_submenu WHERE submenu_parent_Id= :submenu_parent_Id');
        $stmt->bindParam(':submenu_parent_Id', $submenuParentId);
        try {
            if ($stmt->execute()) {
                $userPortfolioSubmenuData = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $userPortfolioSubmenuData;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
//Database Table Name->portfolio_data
class PortfolioSubmenuData
{
    protected $id;
    protected $parent_id;
    protected $submenuName;
    protected $title;
    protected $upload_image;
    protected $link;

    public $conn;

    function setId($id)
    {
        $this->id = $id;
    }
    function getId()
    {
        return $this->id;
    }

    function setParent_ID($parent_id)
    {
        $this->parent_id = $parent_id;
    }
    function getParent_ID()
    {
        return $this->parent_id;
    }

    function setSubmenu($submenuName)
    {
        $this->submenuName = $submenuName;
    }
    function getSubmenu()
    {
        return $this->submenuName;
    }

    function setTitle($title)
    {
        $this->title = $title;
    }
    function getTitle()
    {
        return $this->title;
    }

    function setImage($upload_image)
    {
        $this->upload_image = $upload_image;
    }
    function getImage()
    {
        return $this->upload_image;
    }

    function setLink($link)
    {
        $this->link = $link;
    }
    function getLink()
    {
        return $this->link;
    }

    function __construct()
    {
        include_once 'config/Dbconnect.php';
        $db = new database();
        $this->conn = $db->connect();
    }

    //query for inserting new Portfolio submenu....
    public function insertNewPortfolioSubmenuData()
    {

        $sql = "INSERT INTO portfolio_data(parent_id,submenu_name,title,images,link) VALUE(:parent_id,:submenu_name,:title,:images,:link)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':parent_id', $this->parent_id);
        $stmt->bindParam(':submenu_name', $this->submenuName);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':images', $this->upload_image);
        $stmt->bindParam(':link', $this->link);
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

    //query for selecting  Portfolio data....
    public function  getPortfolioData()
    {
        $stmt = $this->conn->prepare('SELECT id,parent_id,submenu_name,title,images,link FROM portfolio_data');
        try {
            if ($stmt->execute()) {
                $userPortfolioData = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $userPortfolioData;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //query for deleting  Portfolio by using id....
    function deletetPortfolioData($id)
    {
        $stmt = $this->conn->prepare('DELETE FROM portfolio_data WHERE id = :id');
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


    //query for updating  Portfolio by using id ....
    public function updatePortfolioData($id, $submenuName, $title, $images, $link)
    {
        $stmt = $this->conn->prepare('UPDATE portfolio_data SET id=:id,submenu_name=:submenu_name,title=:title, images = :images,link=:link  WHERE id=:id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':submenu_name', $submenuName);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':images', $images);
        $stmt->bindParam(':link', $link);
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


    //query for showing  Portfolio by using id ....
    public function  viewPortfolioData($id)
    {
        $stmt = $this->conn->prepare('SELECT submenu_name,title,link FROM portfolio_data WHERE id = :id');
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
}