<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Register </title>
<style type="text/css">
    body{
        font-family: arial;
        font-size : 14px;
        background-color: #222;

    }
        #utama{
            width: 300px;
            margin : 0 auto;
            margin-top : 12%;
        
        }

        #judul{
            padding: 15px;
            text-align : center;
            color : #fff;
            font-size : 20px;
            background-color:#339966;
            border-top-right-radius :10px;
            border-top-left-radius :10px;
            border-bottom: 3px solid #336666;
        }

        #inputan{
            background-color: #ccc;
            padding :20px;
            border-bottom-right-radius : 10px;
            border-bottom-left-radius : 10px;
        }

        input{
            padding: 10px;
            border: 0;

        }

        .lg{
            width: 220px;
        }


        .ig{
            width: 240px;
        }

        .btn{
            background-color: #339966;
            border-radius: 10px;
            color: #fff;
        }

        .btn:hover{
            background-color: #336666;
            cursor: pointer;
        }
        .dropbtn {
          background-color: #4CAF50;
          color: white;
          padding: 10px;
          font-size: 16px;
          border: none;
          cursor: pointer;
        }

        .dropdown {
          position: relative;
          display: inline-block;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          min-width: 220px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
          display: block;
        }

        .dropdown:hover .dropbtn {
          background-color: #3e8e41;
        }


</style>
</head>
<body>
    <div id ="utama">
        <div id ="judul">
            Halaman register
    </div>
    <div id="inputan">
        <form action ="" method="post">
        <div>
            <input type ="text" name="user" placeholder="user" class="lg"/>
        </div>
        <div style="margin-top :10px;">
            <input type="text" name ="namalengkap" placeholder="nama lengkap"class="lg"/>
        </div>
         <div style="margin-top :10px;">
            <input type="password" name ="password" placeholder="password"class="lg"/>
        </div>
        <div style="margin-top:10px;">
            <select name="level" class="ig">
                <option value="">--pilih level ---</option>
                <option value="siswa">siswa</option>
                <option value="guru">guru</option>
                <option value="walikelas">walikelas</option>
                <option value="admin">admin</option>
            </select>
            </div>
            <br>
        <div style="margin-top :10px;">
            <input type="submit" name="register" value ="register"class="btn" />
        </div>
        </form>
                         <?php 
                        include "inc/koneksi.php";
                        if (@$_POST ['register']) {
                            $user = @$_POST['user'];
                            $namalengkap = @$_POST['namalengkap'];
                            $password = @$_POST['password'];
                            $level = @$_POST['level'];

                        if($user == ''|| $namalengkap == '' || $password == '' || $level == ''){
                                ?> <script type="text/javascript">alert('inputan tidak boleh kosong');</script> <?php
                            }else{
                                $sql_insert = mysql_query("insert into pengguna values('','$user',md5('$password'), '$namalengkap','$level')") or die(mysql_error());
                                if ($sql_insert){
                                    ?> <script type="text/javascript">alert('pendaftaran berhasil');</script> <?php
                                }
                            }  
                        }
                     ?>
        </div>
    </body>
</html>