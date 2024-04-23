<?php

   class Doner{

        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function register($data)
        {
            $this->db->query('INSERT INTO users ( username , email, password , gander , phone , city , blood_type ,code ) values 
                           (:username , :email, :password , :gander , :phone , :city , :blood_type , :code)');
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);          
            $this->db->bind(':gander', $data['gander']);
            $this->db->bind(':phone', "");
            $this->db->bind(':city', "");
            $this->db->bind(':blood_type', "");
            $this->db->bind(':code', "");
            if ( $this->db->execute() ) {
                return true;
            } else {
                return false;
            }
        } // end function register
        
        public function login($email,$password)
        {
            $this->db->query('SELECT * from users where email = :mail AND password = :pass ');
            $this->db->bind(":mail",$email);
            $this->db->bind(":pass",$password);
            $this->db->execute();
            $row = $this->db->rowCount();
            return $row ;               
        } // end function login
    
        public function checkPassword($email,$password)
        {
            $this->db->query('SELECT * from users where email = :email');
            $this->db->bind(':mail', $email);
            $this->db->bind(':pass', $password);
            $row = $this->db->single();
            $hashed_password = $row->password;
            if ( password_verify($password,$hashed_password) ) {
                return $row;
            } else {
                return false;
            }
        } // end function

        public function getUserByEmail($email)
        {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);
            $this->db->execute();
            $row = $this->db->single();
            if ( $this->db->rowCount() > 0 ) {
                return $row;
            } else {
                return false;
            }
        } // end function

        public function getUserByPassword($password)
        {
        $this->db->query('SELECT * FROM users WHERE password = :pass');
        $this->db->bind(':pass', $password);
        $this->db->single();
        if ( $this->db->rowCount() > 0 ) {
        return true;
        } else {
        return false;
        }
        } // end function 

        public function getUserById($id)
        {
            $this->db->query('SELECT * FROM users WHERE id = :id');
            $this->db->bind(':id', $id);
            return $this->db->single();
        } // end function getUserById
    
        public function updatePassword($data)
        {
            $this->db->query('UPDATE users SET password = :password where email = :email');
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':email', $data['email']);
            if( $this->db->execute() ){
                return true;
            } else {
                return false;
            }
        } // end function updatePassword 
        
        public function getDataBySearch($city,$blood_type)
        {
            $this->db->query('SELECT * FROM users WHERE  city = :city AND blood_type = :blood_type');
            $this->db->bind(':city',$city);
            $this->db->bind(':blood_type',$blood_type);
            return $this->db->resultSet();
        } // end function getDataBySearch
        
        public function changeCode($data)
        {
            $this->db->query('UPDATE users SET code = :code WHERE email = :email');
            $this->db->bind(':code', $data['rand']);
            $this->db->bind(':email',$data['email']);
            if($this->db->execute())
            {
              return true;
            }else{
              return false;
            }
        } // end function changeCode
        
        public function chickCode($email)
        {
             $this->db->query('SELECT * FROM users WHERE email = :email ');
             $this->db->bind(':email',$email);     
             $this->db->execute();
             $row = $this->db->single();
             return $row;
        } // end function chickCode
        
        public function addDonor($data)
        {
	        $this->db->query('UPDATE users SET  phone = :phone , city= :city , blood_type = :blood_type WHERE email = :email');
	        $this->db->bind(':phone', $data['phone']);
	        $this->db->bind(':city', $data['city']);
	        $this->db->bind(':blood_type', $data['blood_type']);
	        $this->db->bind(':email', $data['email']);
	        // Execute
	        if ( $this->db->execute() ) {
		        return true;
	        } else {
		        return false;
	        }
        } // end function addDonor
        
        public function getDataDistinct1()
        {
            $this->db->query('SELECT DISTINCT city FROM users');
            return $this->db->resultSet();
        } // end function getDataDistinct
        
        public function getDataDistinct2()
        {
            $this->db->query('SELECT DISTINCT blood_type FROM users');
            return $this->db->resultSet();
        } // end function getDataDistinct2
        
        /*
          =================
          Dashboard Control
          =================
        */
        
        public function getData()
        { 
            $this->db->query('SELECT * FROM users ORDER BY id DESC');
            return $this->db->resultSet();      
        } // end function getData 
        
        public function deleteUser($id)
        {
            $this->db->query('DELETE FROM users where id = :id');
            $this->db->bind(":id",$id);
            $this->db->execute();
        } // end function deleteUser
        
        public function addUser($data)
        {
	        $this->db->query('INSERT INTO users ( username , email, password , gander , phone , city , blood_type ,code ,admin) values 
	        (:username , :email, :password , :gander , :phone , :city , :blood_type , :code, :admin)');
	        $this->db->bind(':username', $data['username']);
	        $this->db->bind(':email', $data['email']);
	        $this->db->bind(':password', $data['password']);          
	        $this->db->bind(':gander', $data['gander']);
	        $this->db->bind(':phone', "");
	        $this->db->bind(':city', "");
	        $this->db->bind(':blood_type', "");
	        $this->db->bind(':code', "");
	        $this->db->bind(':admin', $data['admin']);
	        // Execute
	        if ( $this->db->execute() ) {
		        return true;
	        } else {
		        return false;
	        }
        } // end function Add User
        
        public function editUser($data)
        {
	        $this->db->query('UPDATE users SET username = :username, email = :email, password = :password, gander = :gander, admin = :admin WHERE id = :id');
	        $this->db->bind(':username', $data['username']);
	        $this->db->bind(':email', $data['email']);
	        $this->db->bind(':password', $data['password']);          
	        $this->db->bind(':gander', $data['gander']);
	        $this->db->bind(':admin', $data['admin']);
	        $this->db->bind(':id', $data['id']);
	        // Execute
	        if ( $this->db->execute() ) {
		        return true;
	        } else {
		        return false;
	        }
        } // end function Edit User
        
  } // end class donor