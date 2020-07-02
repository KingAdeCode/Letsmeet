<?php
// user.php
class User{
    protected $db;
    protected $user_name;
    protected $user_fullname;
    protected $user_phone;
    protected $user_address;
    protected $user_gender;
    protected $user_age;
    protected $user_email;
    protected $user_pass;
    protected $hash_pass;
    
    function __construct($db_connection){
        $this->db = $db_connection;
    }

    // SING UP USER
    function singUpUser($username, $email, $password){
        try{
            $this->user_name = trim(str_replace(" ", "", $username));
            $this->user_email = trim($email);
            $this->user_pass = trim($password);
            if(!empty($this->user_name) && !empty($this->user_email) && !empty($this->user_pass)){

                if (filter_var($this->user_email, FILTER_VALIDATE_EMAIL)) { 
                    $check_email = $this->db->prepare("SELECT * FROM `users` WHERE user_email = ?");
                    $check_email->execute([$this->user_email]);

                    if($check_email->rowCount() > 0){
                        return ['errorMessage' => 'This Email is already registered.'];
                    }
                    else{
                        
                        // $user_image = rand(1,12);
                        $user_image = "no_image";

                        $this->hash_pass = password_hash($this->user_pass, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO `users` (username, user_email, user_password, user_image) VALUES(:username, :user_email, :user_pass, :user_image)";
            
                        $sign_up_stmt = $this->db->prepare($sql);
                        //BIND VALUES
                        $sign_up_stmt->bindValue(':username',htmlspecialchars($this->user_name), PDO::PARAM_STR);
                        $sign_up_stmt->bindValue(':user_email',$this->user_email, PDO::PARAM_STR);
                        $sign_up_stmt->bindValue(':user_pass',$this->hash_pass, PDO::PARAM_STR);
                        // INSERTING RANDOM IMAGE NAME
                        $sign_up_stmt->bindValue(':user_image',$user_image.'.png', PDO::PARAM_STR);
                        $sign_up_stmt->execute();
                        
                        return ['successMessage' => 'You have signed up successfully.'];    
                                 
                        // header("Location: ./update_info.php");      
                    }
                }
                else{
                    return ['errorMessage' => 'Invalid email address!'];
                }    
            }
            else{
                return ['errorMessage' => 'Please fill in all the required fields.'];
            } 
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    //Update User Information After Signup
    
    function updateUserInfo($fullname, $phone,  $address, $gender, $age, $id){
        try{
            $this->user_fullname = trim($fullname);
            $this->user_phone = trim($phone);
            $this->user_address = trim($address);
            $this->user_gender = trim($gender);
            $this->user_age = trim($age);
            if(!empty($this->user_fullname) && !empty($this->user_phone) && !empty($this->user_address) && !empty($this->user_gender) && !empty($this->user_age)){

            
                $sql = "UPDATE `users` SET 
                            user_fullname = :user_fullname, 
                            user_phone = :user_phone,
                            user_address = :user_address, 
                            user_gender = :user_gender, 
                            user_age = :user_age WHERE id = :id
                            
                            ";
    
                $update_stmt = $this->db->prepare($sql);
                //BIND VALUES
                $update_stmt->bindValue(':user_fullname',htmlspecialchars($this->user_fullname), PDO::PARAM_STR);
                $update_stmt->bindValue(':user_phone',$this->user_phone, PDO::PARAM_STR);
                $update_stmt->bindValue(':user_address',$this->user_address, PDO::PARAM_STR);
                $update_stmt->bindValue(':user_gender',$this->user_gender, PDO::PARAM_STR);
                $update_stmt->bindValue(':user_age',$this->user_age, PDO::PARAM_STR);
                $update_stmt->bindValue(':id',$id, PDO::PARAM_STR);

                $update_stmt->execute();
                
                header("Location: ./update_avatar.php");    
            }
            else{
                return ['errorMessage' => 'Please fill in all the required fields.'];
            } 
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Change the USER Profile Image
     function changeAvatar($file, $id){
         // File upload path
         
            // var_dump($file);
            // exit();
         
            $targetDir = "./storage/profiles/";
            $fileName = basename($file);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            if(isset($file)){
                // Allow certain file formats
                $allowTypes = array('jpg','png','jpeg','gif','pdf');
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFilePath)){
                        // Insert image file name into database
                        $sql = "UPDATE users SET user_image = :user_image WHERE id = :id";
                        $avatar_stmt = $this->db->prepare($sql);
                        $avatar_stmt->bindValue(':user_image', $fileName, PDO::PARAM_STR);
                        $avatar_stmt->bindValue(':id', $id, PDO::PARAM_STR);
                        $avatar_stmt->execute();
                        if($avatar_stmt){
                            // return ['successMessage' => 'Profile Image has been uploaded successfully.'];
                            header("Location: ./profile.php");  
                        
                        }else{
                           
                            return ['errorMessage' => 'File upload failed, please try again.'];
                        } 
                    }else{
                        return ['errorMessage' => 'Sorry, there was an error uploading your file.'];
                        
                    }
                }else{
                    return ['errorMessage' => 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.'];
                   
                }
            }else{
                 return ['errorMessage' => 'Please select a file to upload.'];
                
            }
     }
    
    // LOGIN USER
    function loginUser($email, $password){
        
        try{
            $this->user_email = trim($email);
            $this->user_pass = trim($password);

            $find_email = $this->db->prepare("SELECT * FROM `users` WHERE user_email = ?");
            $find_email->execute([$this->user_email]);
            
            if($find_email->rowCount() === 1){
                $row = $find_email->fetch(PDO::FETCH_ASSOC);

                $match_pass = password_verify($this->user_pass, $row['user_password']);
                if($match_pass){
                    $_SESSION = [
                        'user_id' => $row['id'],
                        'email' => $row['user_email']
                    ];
                    header('Location: ./home.php');
                }
                else{
                    return ['errorMessage' => 'Invalid password'];
                }
                
            }
            else{
                return ['errorMessage' => 'Invalid email address!'];
            }

        }
        catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    // FIND USER BY ID
    function find_user_by_id($id){
        try{
            $find_user = $this->db->prepare("SELECT * FROM `users` WHERE id = ?");
            $find_user->execute([$id]);
            if($find_user->rowCount() === 1){
                return $find_user->fetch(PDO::FETCH_OBJ);
            }
            else{
                return false;
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    
    // FETCH ALL USERS WHERE ID IS NOT EQUAL TO MY ID
    function all_users($id){
        try{
            $get_users = $this->db->prepare("SELECT * FROM `users` WHERE id != ?");
            $get_users->execute([$id]);
            if($get_users->rowCount() > 0){
                return $get_users->fetchAll(PDO::FETCH_OBJ);
            }
            else{
                return false;
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>