<?php
/*
 *      index.php
 *      
 *      Copyright 2011 Ahmad Zafrullah Mardiansyah <zaf@zaf-laptop>
 *      
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 */
  
include "convert.php";
 
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="generator" content="Geany 0.18" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
    
    a:link {color: #000000; text-decoration: none}
    a:visited {color: #000000; text-decoration: none}
    a:hover {color: #FF0000; text-decoration: underline}
    </style>
    <script type="text/javascript">
    function SelectAll(id){
        document.getElementById(id).focus();
        document.getElementById(id).select();
    }
    
    }
    function InfoCaesar(){
        alert("Key hanya berupa kombinasi angka,"+'\n'+"dan plan text tidak boleh mengandung angka!");
    }
    function InfoVigenere(){
        alert("Key hanya berupa kombinasi kata, tidak boleh mengandung angka,"+'\n'+"dan plan text tidak boleh mengandung angka!");
    }
    </script>
</head>
 
<body>
<div class="jumbotron" id="home" style="background:#00FFFF">
      <div class="container">
        <div class="text-center">
          
          <h1 class="display-4">CAESAR CIPHER</h1>
          
        </div>
      </div>
    </div>


    <!-- About -->
    <section class="about" id="about">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>Caesar Cipher</h2>
          </div>
        </div>
        <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="col text-center">
              <h2>Encode</h2>
            </div>
            <div class="col-lg-10">
            
            <form action="" method="post" class="center">
                <div class="form-group">
                  <label for="nama">Plain Text</label>
                  <input type="text" class="form-control" name="plantext_caesar">
                </div>
                <div class="form-group">
                  <label for="email">Key</label>
                  <input type="text" class="form-control" name="key_caesar" maxlength="">
                </div>
                <div class="form-group">
                  <button type="submit" name="encrypt_caesar" class="btn btn-primary">Encode Plain Text</button>
                </div>
              </form>
  
            </div>
          </div>
        <div class="col-md-5">
            <div class="col text-center">
              <h2>Decode</h2>
            </div>
            <div class="col-lg-10">
            
            <form action="" method="post">
                <div class="form-group">
                  <label for="nama">Cipher Text</label>
                  <input type="text" class="form-control" name="plantext_caesar">
                </div>
                <div class="form-group">
                  <label for="email">Key</label>
                  <input type="text" class="form-control" name="key_caesar" maxlength="">
                </div>
                <div class="form-group">
                  <button type="submit" name="decrypt_caesar" class="btn btn-primary">Decode Plain Text</button>
                </div>
              </form>
  
            </div>
          </div>
          
        </div>
        <br><br>
          <div class="row mb-4">
          <br>
          <div class="col text-center">
            <h2>Result</h2>
          
    
    <?php
    //----------------------------------------------------------------//
    // caesar                                                         //
    //----------------------------------------------------------------//
        if((isset($_POST['key_caesar'])) && (isset($_POST['plantext_caesar'])) && isset($_POST['encrypt_caesar'])){
            $key=$_POST['key_caesar'];
            $plantext=$_POST['plantext_caesar'];
            $split_key=str_split($key);
            $i=0;
            $split_chr=str_split($plantext);
            while ($key>52){
                $key=$key-52;
            }
            foreach($split_chr as $chr){
                if (char_to_dec($chr)!=null){
                    $split_nmbr[$i]=char_to_dec($chr);
                } else {
                    $split_nmbr[$i]=$chr;
                }
                $i++;
            }
            echo '<textarea rows="4" id="result" cols="33" onclick="SelectAll(\'result\')" >';
            foreach($split_nmbr as $nmbr){
                if (($nmbr+$key)>52){
                    if (dec_to_char($nmbr)!=null){
                        echo dec_to_char(($nmbr+$key)-52);
                    } else {
                        echo $nmbr;
                    }
                } else {
                    if (dec_to_char($nmbr)!=null){
                        echo dec_to_char($nmbr+$key);
                    } else {
                        echo $nmbr;
                    }
                }
            }
            echo '</textarea><br/>';
        } else if ((isset($_POST['key_caesar'])) && (isset($_POST['plantext_caesar'])) && isset($_POST['decrypt_caesar'])){
            $key=$_POST['key_caesar'];
            $plantext=$_POST['plantext_caesar'];
            $i=0;
            $split_chr=str_split($plantext);
            while ($key>52){
                $key=$key-52;
            }
            foreach($split_chr as $chr){
                if (char_to_dec($chr)!=null){
                    $split_nmbr[$i]=char_to_dec($chr);
                } else {
                    $split_nmbr[$i]=$chr;
                }
                $i++;
            }
            echo '<textarea rows="4" id="result" cols="33" onclick="SelectAll(\'result\')" >';
            foreach($split_nmbr as $nmbr){
                if (($nmbr-$key)<1){
                    if (dec_to_char($nmbr)!=null){
                        echo dec_to_char(($nmbr-$key)+52);
                    } else {
                        echo $nmbr;
                    }
                } else {
                    if (dec_to_char($nmbr)!=null){
                        echo dec_to_char($nmbr-$key);
                    } else {
                        echo $nmbr;
                    }
                }
            }
            echo '</textarea><br/>';
             
    //----------------------------------------------------------------//
    // vigenere                                                       //
    //----------------------------------------------------------------//
        } else if ((isset($_POST['key_vigenere'])) && (isset($_POST['plantext_vigenere'])) && (isset($_POST['encrypt_vigenere']))){
            $key=$_POST['key_vigenere'];
            $plantext=$_POST['plantext_vigenere'];
            $len_key=strlen($key);
            $len_plantext=strlen($plantext);
            $split_key=str_split($key);
            $split_plantext=str_split($plantext);
             
            echo '<textarea rows="4" id="result" cols="33" onclick="SelectAll(\'result\')" >';
            $i=0;
            for($j=0;$j<$len_plantext;$j++){
                if ($i==$len_key){
                    $i=0;
                }
                $split_key2[$j]=$split_key[$i];
                $i++;
            }
            for($k=0;$k<$len_plantext;$k++){
                $a=char_to_dec($split_key2[$k]);
                $b=char_to_dec($split_plantext[$k]);
                if (($a && $b)!=null){
                    echo (tabel_vigenere_encrypt($a, $b));
                } else {
                    echo $split_plantext[$k];
                }
            }
            echo '</textarea><br/>';
        } else {
            echo "result here...";
        }
    ?>
    </div> </div>
</div>
    
    <!-- masih dalam pengerjaan :p
    <tr><td valign="top">
    <fieldset>
    <legend><b>Playfair</b></legend>
    <form action="" method="post">
    <input type="text" name="key_playfair" id="key_playfair" value="the key..." onclick="SelectAll('key_playfair')" /><br/>
    <textarea rows="4" name="plantext_playfair" id="plantext_playfair" cols="33" onclick="SelectAll('plantext_playfair')" >plan text...</textarea><br/>
    <input type="submit" name="encrypt_playfair" value="Encrypt" /><input type="submit" name="Decrypt_playfair" value="Decrypt" /><input type="reset" value="Reset" />
    </form>
    </fieldset>
    </td></tr>
    -->
    </section>




<br>
<br>
<br>
<br><br><br><br><br><br><br><br>
    <!-- Contact -->
    <section class="contact" id="contact">
      <div class="container">

        <div class="row justify-content-center">
          <div class="col-lg-7">
            <div class="card bg-primary text-white mb-4 text-center">
              <div class="card-body">
                <h3 class="card-title">Cyber Security</h3>
                
              </div>
            </div>
                <ul class="list-group mb-4">
                  <li class="list-group-item"><h5>Dosen : Irfan Syamsuddin, ST, PG.Dipl.BEC, M.Com.ISM,Ph.D</h5></li>
                  <li class="list-group-item">Nama : Agung Indrawan</li>
                  <li class="list-group-item">Kelas : 3B Teknik Komputer dan Jaringan</li>
                  <li class="list-group-item">NIM : 42517048</li>
                </ul>
            
          </div>
        </div>
      </div>
    </section>


    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright &copy; 2020</p>
          </div>
        </div>
      </div>
    </footer>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>