<?php  


Class Database{
	
	function __construct()
	{
        self::connectDB();
		
	}


    private function connectDB(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        global $conn;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=db_leadinfo", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "DB CONNECTED"; 
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }
               
        }


        
        public function insertData($Fname,$Lname,$job_title,$email,$d_phone,$city,$country,$company,$linkedin_pro){
         global $conn;

        $query = $conn->prepare("INSERT INTO tbl_lead(Fname,Lname,job_title,email,d_phone, city,country,company,linkedin_pro) VALUES (?,?,?,?,?,?,?,?,?)");
        $query->execute(array($Fname,$Lname,$job_title,$email,$d_phone,$city,$country,$company,$linkedin_pro));

        //(`id`, `Fname`, `Lname`, `job_title`, `email`, `d_phone`, `city`, `country`, `company`, `linkedin_pro`)

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function getalldata(){
        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_lead");
         $query ->execute();
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;
    }

    public function addNewJobTitle($title,$level){
         global $conn;

        $query = $conn->prepare("INSERT INTO tbl_jobtitle(title_name,level) VALUES (?,?)");
        $query->execute(array($title,$level));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
   

    public function getAllJobTitle(){
        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_jobtitle");
         $query ->execute();
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;
    }

    public function getSingleJobTitleById($editid){
          global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_jobtitle WHERE id_j = ?");
         $query ->execute(array($editid));
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;
    }

    public function updateJobTitle($title,$level,$editid){
         global $conn;

         $query = $conn->prepare("UPDATE tbl_jobtitle SET 
                                  title_name = ?, 
                                  level = ?
                                 WHERE id_j = ?");
         $query->execute(array($title,$level,$editid));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteJobTitle($delid){
          global $conn;

         $query = $conn-> prepare("DELETE FROM tbl_jobtitle WHERE id_j = ?");
         $query->execute(array($delid));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function getallCompanyData(){
        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_company");
         $query ->execute();
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;
    }


    public function getSingleCompanyById($editid){
        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_company WHERE id_c = ?");
         $query ->execute(array($editid));
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;
    }

    public function updateCompanyById($company_name,$revenue,$employees,$industry,$pro_and_service,$c_details,$c_address,$c_phone,$c_fax,$c_web,$c_fb,$c_linkedin,$c_twitter,$editid){

         global $conn;

         $query = $conn->prepare("UPDATE tbl_company SET 
                                    company_name = ?, 
                                    revenue = ?,
                                    employees = ?,
                                    industry = ?,
                                    pro_and_service = ?,
                                    c_details = ?,
                                    c_address = ?,
                                    c_phone = ?,
                                    c_fax = ?,
                                    c_web = ?,
                                    c_fb = ?,
                                    c_linkedin = ?,
                                    c_twitter = ?
                                 WHERE id_c = ?");
         $query->execute(array($company_name,$revenue,$employees,$industry,$pro_and_service,$c_details,$c_address,$c_phone,$c_fax,$c_web,$c_fb,$c_linkedin,$c_twitter,$editid));

        if ($query) {
            return true;
        } else {
            return false;
        }

    }




    public function insertCompanyInformation($c_name,$revenue,$employees,$industry,$proANDsevice,$c_details,$c_address,$c_phone,$c_fax,$c_web,$c_fb,$c_linkedin,$c_twiter){

         global $conn;

        $query = $conn->prepare("INSERT INTO tbl_company(company_name,revenue,employees, industry,pro_and_service,c_details,c_address,c_phone,c_fax,c_web,c_fb,c_linkedin, c_twitter) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $query->execute(array($c_name,$revenue,$employees,$industry,$proANDsevice,$c_details,$c_address,$c_phone,$c_fax,$c_web,$c_fb,$c_linkedin,$c_twiter));


        if ($query) {
            return true;
        } else {
            return false;
        }


    }

    public function  deleteSingleCompany($delid){
         global $conn;

         $query = $conn-> prepare("DELETE FROM tbl_company WHERE id_c = ?");
         $query->execute(array($delid));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }


    public function insertLeadData($fName,$lName,$d_phone,$email,$address,$city,$country,$facebook,$linkedin,$twitter,$company_name_id,$job_title_id){

        global $conn;

        $query = $conn->prepare("INSERT INTO tbl_leadinfo(fName,lName,d_phone,email,address,city,country,
            facebook,linkedin,twitter,id_c,id_j) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");

        $query->execute(array($fName,$lName,$d_phone,$email,$address,$city,$country,$facebook,$linkedin,$twitter,$company_name_id,$job_title_id));


        if ($query) {
            return true;
        } else {
            return false;
        }

    }

    public function getAllLeadInfo(){
        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_leadinfo");
         $query ->execute();
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;
    }

    public function getSingleLeadById($editid){
        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_leadinfo WHERE id_lead = ?");
         $query ->execute(array($editid));
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;
    }

    public function getCompanyIdByName($company_name){

        global $conn;
        $company_id = 0;

         $query = $conn->prepare("SELECT * FROM tbl_company WHERE company_name = ?");
         $query ->execute(array($company_name));
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         if ($allinfo) {
            foreach ($allinfo as $info) {
                $company_id = $info['id_c'];
            }
         }
         
        
          return $company_id;
    }

    public function getJobIdByName($job_title){
         global $conn;
         $job_title_id = 0;

         $query = $conn->prepare("SELECT * FROM tbl_jobtitle WHERE title_name = ?");
         $query ->execute(array($job_title));
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         if ($allinfo) {
            foreach ($allinfo as $info) {
                $job_title_id = $info['id_j'];
            }
         }
         
        
          return $job_title_id;
    }

    public function getCompanyNameById($company_id){
         global $conn;
         $company_name = "";

         $query = $conn->prepare("SELECT * FROM tbl_company WHERE id_c = ?");
         $query ->execute(array($company_id));
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         if ($allinfo) {
            foreach ($allinfo as $info) {
                $company_name = $info['company_name'];
            }
         }
         
        
          return $company_name;
    }

    public function getJobTitleById($job_title_id){
        global $conn;
         $job_title_name = "";

         $query = $conn->prepare("SELECT * FROM tbl_jobtitle WHERE id_j = ?");
         $query ->execute(array($job_title_id));
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         if ($allinfo) {
            foreach ($allinfo as $info) {
                $job_title_name = $info['title_name'];
            }
         }
         
        
          return $job_title_name;
    }

    public function deleteSingleLeadInfo($delid){
        global $conn;

         $query = $conn-> prepare("DELETE FROM tbl_leadinfo WHERE id_lead = ?");
         $query->execute(array($delid));

        if ($query) {
            return true;
        } else {
            return false;
        }

    }


    public function checkcompany($skill){
         global $link;

         $query = $link->prepare("SELECT * FROM tbl_company  WHERE company_name LIKE :skill");
         $query ->execute(array(':skill' => '%'.$skill.'%'));
         $allresult = $query->fetchAll(PDO::FETCH_ASSOC);
         $row = $query->rowCount();

        $result = '';
        $result .= '<div class="skill"><ul>';
        if ($row) {
            foreach ($allresult as $paice) {
                $result .='<li>'.$paice['skill'].'</li>';
        
            }
        }else{
            $result .='<li>No Result Found....</li>';
        }

        $result .='</ul></div>';
        

         return $result;


        }


         public function livesearchName($search){

         global $conn;

         $query = $conn->prepare("SELECT tbl_leadinfo.*, tbl_jobtitle.title_name, tbl_company.company_name FROM tbl_leadinfo INNER JOIN tbl_jobtitle ON tbl_leadinfo.id_j = tbl_jobtitle.id_j INNER JOIN tbl_company ON tbl_leadinfo.id_c = tbl_company.id_c WHERE fName LIKE :search or lName LIKE :search");

         $query ->execute(array(':search' => '%'.$search.'%'));
         $allresult = $query->fetchAll(PDO::FETCH_ASSOC);
         $row = $query->rowCount();

         $data = "";
         if ($row) {
         
            $data .= '<table class="tblone"><tr>
                            <th>Name</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            </tr>';
                foreach ($allresult as $singleresult) {
                        $data .= '<tr>
                                <td><a href="leadDetails.php?lid='.$singleresult['id_lead'].'">'.$singleresult["fName"]." ".$singleresult["lName"].'</a></td>
                                  <td>'.$singleresult["city"].'</td>
                                  <td>'.$singleresult["country"].'</td>
                                  <td>'.$singleresult["title_name"].'</td>
                                  <td><a href="companyDetails.php?cid='.$singleresult['id_c'].'">'.$singleresult["company_name"].'</a></td>
                                 </tr>';

                                 
                        }
    
            
         }else{
                $data .='No result  Found ......';

         }
         $data .= '</table>';

         return $data;
         
     }





     public function liveSearchByJobTitle($search){

         global $conn;

         $query = $conn->prepare("SELECT tbl_leadinfo.*, tbl_jobtitle.title_name, tbl_company.company_name FROM tbl_leadinfo INNER JOIN tbl_jobtitle ON tbl_leadinfo.id_j = tbl_jobtitle.id_j INNER JOIN tbl_company ON tbl_leadinfo.id_c = tbl_company.id_c WHERE  title_name LIKE :search");
         $query ->execute(array(':search' => '%'.$search.'%'));
         $allresult = $query->fetchAll(PDO::FETCH_ASSOC);
         $row = $query->rowCount();

         $data = '';
         if ($row) {
                  $data .= '<table class="tblone"><tr>
                             <th>Name</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            </tr>';

                foreach ($allresult as $singleresult) {
                        $data .= '<tr>
                                <td><a href="leadDetails.php?lid='.$singleresult['id_lead'].'">'.$singleresult["fName"]." ".$singleresult["lName"].'</a></td>
                                  <td>'.$singleresult["city"].'</td>
                                  <td>'.$singleresult["country"].'</td>
                                  <td>'.$singleresult["title_name"].'</td>
                                  <td><a href="companyDetails.php?cid='.$singleresult['id_c'].'">'.$singleresult["company_name"].'</a></td>
                                 </tr>';
                                 
                        }
    
            
         }else{
                $data .= "NO Result Found ......";

         }
         $data .= '</table>';

         return $data;
         
     }

     public function liveSearchByCompanyName($search){

         global $conn;

         $query = $conn->prepare("SELECT tbl_leadinfo.*, tbl_jobtitle.title_name, tbl_company.company_name FROM tbl_leadinfo INNER JOIN tbl_jobtitle ON tbl_leadinfo.id_j = tbl_jobtitle.id_j INNER JOIN tbl_company ON tbl_leadinfo.id_c = tbl_company.id_c   WHERE  company_name LIKE :search or c_web LIKE :search");
         $query ->execute(array(':search' => '%'.$search.'%'));
         $allresult = $query->fetchAll(PDO::FETCH_ASSOC);
         $row = $query->rowCount();

         $data = '';
         if ($row) {
                  $data .= '<table class="tblone"><tr>
                             <th>Name</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            </tr>';
                    
                foreach ($allresult as $singleresult) {
                        $data .= '<tr>
                                <td><a href="leadDetails.php?lid='.$singleresult['id_lead'].'">'.$singleresult["fName"]." ".$singleresult["lName"].'</a></td>
                                  <td>'.$singleresult["city"].'</td>
                                  <td>'.$singleresult["country"].'</td>
                                  <td>'.$singleresult["title_name"].'</td>
                                  <td><a href="companyDetails.php?cid='.$singleresult['id_c'].'">'.$singleresult["company_name"].'</a></td>
                                 </tr>';
                                 
                        }
    
            
         }else{
                $data .= "result not Found ......";

         }

         $data .= '</table>';

         return $data;
         
     }


     public function liveSearchByCityOrCountry($search){

         global $conn;

         $query = $conn->prepare("SELECT tbl_leadinfo.*, tbl_jobtitle.title_name, tbl_company.company_name FROM tbl_leadinfo INNER JOIN tbl_jobtitle ON tbl_leadinfo.id_j = tbl_jobtitle.id_j INNER JOIN tbl_company ON tbl_leadinfo.id_c = tbl_company.id_c  WHERE  city LIKE :search or country LIKE :search");
         $query ->execute(array(':search' => '%'.$search.'%'));
         $allresult = $query->fetchAll(PDO::FETCH_ASSOC);
         $row = $query->rowCount();

         $data = '';
         if ($row) {
                  $data .= '<table class="tblone"><tr>
                            <th>Name</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            </tr>';
                    
                foreach ($allresult as $singleresult) {
                        $data .= '<tr>
                                <td><a href="leadDetails.php?lid='.$singleresult['id_lead'].'">'.$singleresult["fName"]." ".$singleresult["lName"].'</a></td>
                                  <td>'.$singleresult["city"].'</td>
                                  <td>'.$singleresult["country"].'</td>
                                  <td>'.$singleresult["title_name"].'</td>
                                  <td><a href="companyDetails.php?cid='.$singleresult['id_c'].'">'.$singleresult["company_name"].'</a></td>
                                 </tr>';
                                 
                        }
    
            
         }else{
                $data .= "result not Found ......";

         }

         $data .= '</table>';

         return $data;
         
     }


     public function checkLiveHover($id){

         global $conn;
         $query = $conn->prepare("SELECT * FROM tbl_leadinfo WHERE id_lead = ?");
         $query ->execute(array($id));
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         $output = '';

         if ($allinfo) {
            foreach ($allinfo as $info) {
                $output .= '   
                <p><label>Fname : '.$info['fName'].'</label></p>  
                <p><label>Lname : </label><br />'.$info['lName'].'</p>  
                <p><label>City : </label>'.$info['city'].'</p>  
                <p><label>Country : </label>'.$info['country'].'</p>  
                <p><label>Phone : </label>'.$info['d_phone'].' Years</p>  
                <p><label>Email : </label>'.$info['email'].' Years</p>  
           ';  
            }
         }
         
        
          return $output;

     }

     public function registerSignup($firstName, $uname, $email, $pwd){

    global $conn;
        $query = $conn-> prepare("SELECT id FROM tbl_users WHERE uname = ? OR email = ?");
        $query ->execute(array($uname, $email));
        $num = $query->rowCount();

        if($num == 0){
            $query = $conn->prepare("INSERT INTO tbl_users (first_name,uname,email,pwd) VALUES (?, ?, ?, ?)");
             $query->execute(array($firstName, $uname, $email, $pwd));

             return true;
        }else {
            return false;
        }

}


public function loginToZoominfo($uname,$pwd){
        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_users  WHERE uname = ? AND pwd = ?");
         $query ->execute(array($uname,$pwd));
         
         return $query;
        
    }





    //  public function menulist(){
    //      global $conn;

    //      $query = $conn-> prepare("SELECT tbl_menu.*, tbl_restaurants.rname FROM tbl_menu INNER JOIN tbl_restaurants ON tbl_menu.r_id = tbl_restaurants.id");
    //      $query ->execute();
    //      $info = $query->fetchAll(PDO::FETCH_ASSOC);
    //      //$info = $query->rowCount();

    //      return $info;
    // }



    



}


?>

