<?php
error_reporting(0);
date_default_timezone_set('Asia/kolkata');

$link = mysqli_connect('localhost','root','','bankcollection');

class maindbfunctions
{

            function connect()
            {
                 $link = mysqli_connect('localhost','root','','bankcollection');
                 if (!$link)
                 {
                   $msg="There is some problem with the Connection Please Check.
                   The Error is : ".mysqli_error();
                   mail("officialajinkyal@gmail.com","bankcollection Error",$msg);
                 }
            }

            function userlogin($user,$pass)
           {
               $link = mysqli_connect('localhost','root','','bankcollection');
               $count=0;
               $query=mysqli_query($link,"select count(*) as cou,name from users where name='$user' and pass='$pass'");
               $row=mysqli_fetch_array($query);
               $count=$row['cou'];
               if($count>0)
               {
                   return $row['name'];
               }
               else
               {
                   return "no";
               }
           }

            function ipaddress()
            {

                    if(!empty($_SERVER['HTTP_CLIENT_IP']))
                    {
                      $ip=$_SERVER['HTTP_CLIENT_IP'];
                    }
                    elseif (!empty($_SERVER['HTTP_CLIENT_IP']))
                    {
                          $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
                    }
                    else
                    {
                          $ip=$_SERVER['REMOTE_ADDR'];

                    }
                    return $ip;
            }



      function insertdb()
      {
          /*
          first argument is table name and then column name , value
          Eg. ...->insertdb('tablename','column_name1','value1','column_name2','value2');
          */
        $link = mysqli_connect('localhost','root','','bankcollection');

        $j = 0;
        $col = '';
        $val = '';
        $info = func_get_args();
        $num = func_num_args();

        $table = "`" . $info[0] . "`";

        for ($j = 1; $j < $num; $j++) {
            if (($j % 2) == 0) {
                $val = $val . "'" . $info[$j] . "',";
            }
            if (($j % 2) == 1) {

                $col = $col . "`" . $info[$j] . "`,";
            }
        }
        $val = rtrim($val, ",");
        $col = rtrim($col, ",");
        // echo "insert into $table($col) values($val)";
        $ans=mysqli_query($link,"insert into $table($col) values($val)");
          if($ans==1)
          {
              return  "yes";
          }
          else
          {
              return "no";
          }
    }

    //Account Setting

                function checkrecorsarepresentornot($tablename,$columnname,$value)
                {
                        $link = mysqli_connect('localhost','root','','bankcollection');
                        $count=0;
                        $query=mysqli_query($link,"select count(*) as cou from ".$tablename." where ".$columnname."='".$value."'");
                        $row=mysqli_fetch_array($query);
                        $count=$row['cou'];
                        if($count>0)
                        {
                            return "yes";
                        }
                        else
                        {
                            return "no";
                        }
                }

                function updatepass($tablename,$name,$rnpass,$mob,$anomob,$email,$address,$curdate,$curtime,$ip)
                {
                  $link = mysqli_connect('localhost','root','','bankcollection');
                  $query=mysqli_query($link,"update ".$tablename." set name='$name',pass='$rnpass',mobileno='$mob',anothermobileno='$anomob',address='$address',emailid='$email',currdatetime='$curdate $curtime',ipaddress='$ip' where uid=1");
                    if($query==1)
                    {
                        return "yes";
                    }
                    else
                    {
                        return "no";
                    }
                }

      //addcustomer

      function checkmobnoarepresentornotcustomer($tablename,$colmob,$value)
     {
         $link = mysqli_connect('localhost','root','','bankcollection');
         $count=0;
         $query=mysqli_query($link,"select count(*) as cou from ".$tablename." where ".$colmob."='".$value."' and cust_display_or_not='YES'");
         $row=mysqli_fetch_array($query);
         $count=$row['cou'];
         if($count>0)
         {
             return "yes";
         }
         else
         {
             return "no";
         }
     }

     function checkcustmobnoarepresentornot($tablename,$colmob,$mobno,$CId)
     {
       $link=mysqli_connect('localhost','root','','bankcollection');
       $count=0;
       $query=mysqli_query($link,"select count(*) as cou from ".$tablename." where ".$colmob."='".$mobno."' and CId<>'$CId' and cust_display_or_not='YES'");
       $row=mysqli_fetch_array($query);
       $count=$row['cou'];
       if($count>0)
       {
         return "yes";
       }
       else {
         return "no";
       }
     }

     function updatecustomerdata($tablename,$fname,$lname,$amount,$custfn,$email,$city,$address,$mobno,$anomobno,$state,$collectionstartdate,$CId)
     {
        $link=mysqli_connect('localhost','root','','bankcollection');
        $query=mysqli_query($link,"update ".$tablename." set FName='$fname',LName='$lname',FullName='$custfn',Amount='$amount',Address='$address',City='$city',Emailid='$email',Mobile='$mobno',Mobile2='$anomobno',State='$state',CollectionStartDate='$collectionstartdate' where CId=$CId");
        return $query;
     }

     function customercount()
     {
       $link=mysqli_connect('localhost','root','','bankcollection');
       $query=mysqli_query($link,"select count(*) as cou from customer where cust_display_or_not='YES'");
       $row=mysqli_fetch_array($query);
       $count=$row['cou'];
       return $count;

     }

     //Customer History

     function getcustomerlist()
     {
         $link=mysqli_connect('localhost','root','','bankcollection');
         $data="";
         $auth = mysqli_query($link,"Select CId,FName,LName from customer where cust_display_or_not like 'YES'");
         while($row=mysqli_fetch_array($auth))
         {
             $data.=' <option value="'.$row['CId'].'">'.$row['FName'].' '.$row['LName'].'</option>';
         }
         return $data;
     }
}



?>
