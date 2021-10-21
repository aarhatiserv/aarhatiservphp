<?php
//Database Table Name->blog
class Blog
{
    protected $id;
    protected $title;
    protected $user_id;
    protected $description;
    protected $category;
    protected $tags;
    protected $image;


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

    function setImage($image)
    {
        $this->image = $image;
    }
    function getImage()
    {
        return $this->image;
    }

    function __construct()
    {
        include_once 'config/Dbconnect.php';

        $db = new database();
        $this->conn = $db->connect();
    }

    public function slugify($text)
    {

      $text = str_replace(' ', '-', $text);
  // trim
      $text = trim($text, '-');

  // remove duplicate -
      $text = preg_replace('~-+~', '-', $text);

  // lowercase
      $text = strtolower($text);

      if (empty($text)) {
        return 'n-a';
        }

      return $text;
    }

    //query for inserting new blog....
    public function insertNewBlog()
    {


        $sql = "INSERT INTO blog(blog_title,user_id,blog_description,blog_category,blog_tags,slug_url,blog_image) VALUE(:title,:userId,:description,:category_name,:tags,:slug,:image)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':userId', $this->user_id);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':category_name', $this->category);
        $stmt->bindParam(':tags', $this->tags);
        $slug  = $this->slugify($this->title);
        $stmt->bindParam(':slug',$slug);
        $stmt->bindParam(':image',$this->image);


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


    //query for selecting all blog by using userid....
    public function  getBlogDataByuserId($blogUserID)
    {

        $stmt = $this->conn->prepare('SELECT id,blog_title,user_id, blog_description,blog_category, blog_tags FROM blog WHERE user_id = :user_id ');
        echo $this->user_id;
        $stmt->bindParam(':user_id', $blogUserID);
        try {
            if ($stmt->execute()) {

                $userBlogData = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $userBlogData;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //query for deleting  blog by using id....
    function deletetBlogData()
    {
        $stmt = $this->conn->prepare('DELETE FROM blog WHERE id = :id ');

        $stmt->bindParam(':id', $this->id);

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


    //query for updating  blog by using id ....
    public function updateBlogData()
    {
        $stmt = $this->conn->prepare('UPDATE blog SET blog_title=:title, blog_description=:description, blog_category=:category, blog_tags=:tags, blog_image=:image  WHERE id=:id');
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':tags', $this->tags);
        $stmt->bindParam(':image', $this->image);
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


    //query for showing  blog by using id ....
    public function  viewBlogData()
    {
        $stmt = $this->conn->prepare('SELECT * FROM blog WHERE id = :id');
        $stmt->bindParam(':id', $this->id);

        try {
            if ($stmt->execute()) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                return $user;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    
    public function  viewBlogPost()
    {
        $stmt = $this->conn->prepare('SELECT id,blog_title,blog_category, blog_tags,slug_url, SUBSTRING(`blog_description`, 1, 200) as description, auto_createdOn as posted_on FROM  `blog` ORDER BY id DESC LIMIT 3 ');

        try {
            if ($stmt->execute()) {
                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $user;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function  viewPostBySlug($slug)
    {
        $stmt = $this->conn->prepare('SELECT * FROM `blog` WHERE slug_url =:slug');
        $stmt->bindParam(':slug', $slug);
        try {
            if ($stmt->execute()) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                return $user;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function  viewPostById($id)
    {
        $stmt = $this->conn->prepare('SELECT * FROM `blog` WHERE id =:id');
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