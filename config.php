<?php
class RecipeManager {
    private $conn;
    private $host="localhost";
    private $username="root";
    private $password="";
    private $database="rsmdata";   
    // Constructor to establish database connection
    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Destructor to close database connection
    public function __destruct() {
        $this->conn->close();
    }

    // Add a new recipe to the database
    
    public function adduser($username,$email,$password) {
        $un = $this->conn->real_escape_string($username);
        $em = $this->conn->real_escape_string($email);
        $pwd = $this->conn->real_escape_string($password);
        $sql = "INSERT INTO users (username, email, password) VALUES ('$un', '$em', '$pwd')";

        if ($this->conn->query($sql) === TRUE) {
            return $this->conn->insert_id;
        } else {
            return 0;
        }
    }
    public function chkuser($username,$password) {
        $un = $this->conn->real_escape_string($username);
        $pwd = $this->conn->real_escape_string($password);
        $sql = "select * from users where username='$un' and password='$pwd'";
            /*$stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ss", $un, $pwd);
            $stmt->execute();
            $stmt->store_result();
            //echo $stmt->num_rows;
            */
            
            $stmt=$this->conn->query($sql);
            $rw=$stmt -> fetch_assoc();
        if($stmt->num_rows>0){
            return $rw['user_id'];
        }else
         {
            return 0;
        }
    }
    
    public function chkfav($rid,$userid){
        $rid=intval($rid);
        $userid=intval($userid);
        $sql = "SELECT * FROM favour WHERE recipe_id = $rid and user_id=$userid";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0)
        {
            return true;
        }    
        else{
            return false;
        }
    }
    function addRating($recipeId, $userId, $rating) {
        
        
        $sql = "INSERT INTO rating (recipe_id, user_id, rating) VALUES ('$recipeId', '$userId', '$rating')";
        /*print_r($sql);
        die;*/
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function getAverageRating($recipeId) {
        $sql = "SELECT AVG(rating) AS average_rating FROM rating WHERE recipe_id = '$recipeId'";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['average_rating'];
        } else {
            return 0;
        }
    }


    public function addFavour($rid,$userid) 
    {
        $rid = intval($rid);
        $userid=intval($userid);
       if($userid>0):
        $result=$this->chkfav($rid,$uid);
        if($result!=true){
            $sql="insert into favour(recipe_id,user_id) values('$rid','$userid')";
            if ($this->conn->query($sql) === TRUE) {
                return true;
            } else {
                return false;
            }
        }
    endif;
    }
    public function getFavById($userid) {
        $id = intval($userid);

        $sql = "SELECT * FROM recipe WHERE recipe_id in (select recipe_id from favour where  user_id in ($id))";
        //print_r($sql);
        //die;

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result ->fetch_all(MYSQLI_ASSOC);
        } else {
            return null;
        }
    }
    public function deleteFav($id,$userid) {
        $id = intval($id);
        $userid=intval($userid);
        $sql = "DELETE FROM favour WHERE recipe_id = $id and user_id=$userid";
       // print_r($sql);
        //die;
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function addRecipe($diet,$cuisineType,$title,$desc,$ingredients, $instructions,$img,$userid) {
      
        $diet=$this->conn->real_escape_string($diet);
        $cuisineType=$this->conn->real_escape_string($cuisineType);
        $title = $this->conn->real_escape_string($title);
        $ingredients = $this->conn->real_escape_string($ingredients);
        $instructions = $this->conn->real_escape_string($instructions);
        $img_name = $this->conn->real_escape_string($img);

        $sql = "INSERT INTO recipe (diet,cuisinetype,title,description,ingred, instructions,img_url,user_id) VALUES ('$diet','$cuisineType','$title', '$desc','$ingredients', '$instructions','$img_name',$userid)";
         
         if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Delete a recipe from the database by ID
    public function deleteRecipe($id) {
        $id = intval($id);

        $sql = "DELETE FROM recipe WHERE recipe_id = $id";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Update a recipe in the database
    public function updateRecipe($diet,$cuisineType,$title,$desc,$ingredients,$instructions,$img,$id) {
        $id = intval($id);
        $cuisineType=$this->conn->real_escape_string($cuisineType);
        $diet=$this->conn->real_escape_string($diet);
        $title = $this->conn->real_escape_string($title);
        $desc = $this->conn->real_escape_string($desc);

        $ingredients = $this->conn->real_escape_string($ingredients);
        $instructions = $this->conn->real_escape_string($instructions);
        $img_name = $this->conn->real_escape_string($img);

        $sql = "UPDATE recipe SET diet='$diet',cuisinetype='$cuisineType', title = '$title', description='$desc',ingred = '$ingredients', instructions = '$instructions',img_url='$img_name' WHERE recipe_id = $id";
        // print_r($sql);
        // die;
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Retrieve a recipe from the database by ID
    public function getRecipeById($id) {
        $id = intval($id);

        $sql = "SELECT * FROM recipe WHERE recipe_id = $id";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    public function getRecipeByCuisine($cuisineType) {
        $cuisine=$this->conn->real_escape_string($cuisineType);

        $sql = "SELECT * FROM recipe WHERE cuisinetype = '$cuisine'";
        $result = $this->conn->query($sql);
        return $result ->fetch_all(MYSQLI_ASSOC);
    }

    public function getRecipes($keyword) {
        $keyword=$this->conn->real_escape_string($keyword);

        $sql = "SELECT * FROM recipe WHERE cuisinetype like '%{$keyword}%' or diet like '%{$keyword}%' or title like '%{$keyword}%' or ingred like '%{$keyword}%'";
        $result = $this->conn->query($sql);
        return $result ->fetch_all(MYSQLI_ASSOC);
    }

    // Retrieve all recipes from the database
    public function getAllRecipes() {
        $sql = "SELECT * FROM recipe";
        $result = $this->conn->query($sql);
        return $result ->fetch_all(MYSQLI_ASSOC);
         
    }

    public function getrecentRecipes() {
        $sql = "SELECT * FROM recipe order by recipe_id limit 5";
        $result = $this->conn->query($sql);
        return $result ->fetch_all(MYSQLI_ASSOC);
         
    }

    public function getByDiet($diet) {
        $sql = "SELECT * FROM recipe where diet='$diet'";
        $result = $this->conn->query($sql);
        return $result ->fetch_all(MYSQLI_ASSOC);
         
    }
    public function getAllRecipesByUser($userid) {
        $userid=$this->conn->real_escape_string($userid);
        $sql = "SELECT * FROM recipe where user_id=$userid";
        $result = $this->conn->query($sql);
        return $result ->fetch_all(MYSQLI_ASSOC);
         
    }
}
