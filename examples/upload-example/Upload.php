<?php
    if(isset($_POST["submit"])){
        include("SimplexHP/class.inc.php");
        $uploader = new uploader();
        $path = "/uploads"; //path to folder where uploaded files will go
        $uploader->allowed_extensions(".psd",".png",".jpg",".jpeg",".bmp",".gif",".ico",".jpe",".zip",".rar",".doc",".docx",".rtf",".sql",".pdf",".java",".class",".log",".ppt",".pps",".xml",".xls");// allowed extensions (".extension",)
        $info = $uploader->sortStuff($_FILES["upload"]["name"],$_FILES["upload"]["tmp_name"],$_FILES["upload"]["size"]);
        $num = 8; //length of new file name
        $up = $uploader->uploadFile($info,true,$path,$num);
        $maxfilesize = 50; // MB
        if($info["size"] <= ($maxfilesize * 1024)){
            if($up[0] == true){
                $height = $up["height"];
                $width = $up["width"];
                //insert into a database here perhaps
                ?>
        <table align="center" width="80%"><tr><td width="5%">Direct:</td><td width="95%"><input type="text" value="<?php echo $path."/".$up["name"]; ?>" onclick="this.select();" /></td></tr>
        <?php if(preg_match("/^(\.png|\.jpg|\.jpeg|\.bmp|\.gif|\.jpe)$/",$up["extension"])){ ?>
        <tr><td>UBBC:</td><td><input type="text" value="[img]<?php echo $path."/".$up["name"]; ?>[/img]" /></td></tr>
        <tr><td>HTML:</td><td><input type="text" value='<img src="<?php echo $path."/".$up["name"]; ?>" border="0" alt="image" />' /></td></tr>
        <?php } ?>
        </table>
                </div>
                <?php
            } else {
                echo "The following problem was encountered when uploading your ".$_FILES["upload"]["name"]." file:<br />".$up["error"];
                $uploader->killFile($_FILES["upload"]["tmp_name"]);
            }
        } else {
            echo "The filesize of the uploaded file is too large. The maximum size is ".$maxfilesize." MB.";
            $uploader->killFile($_FILES["upload"]["tmp_name"]);
        }
    } else {
        ?>
        <form action="" method="POST" enctype="multipart/form-data">Select a File: <input type="file" name="upload" /><br /><input type="submit" name="submit" value="Upload" /></form>
        <?php
    }
?>