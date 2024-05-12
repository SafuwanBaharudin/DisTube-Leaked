<?php include("header.php"); ?>
<title>Upload - DisTube</title>
<div id="uploadVid">
<div class="tableSubTitle">Video Upload (Step 1 of 2)</div>  <form name="uploadForm" id="uploadForm" method="post" action="my_videos_upload_2.php" enctype="multipart/form-data">
  <center><table class="dataEntryTableSmall">
    <tbody><tr>
                <td width="125px" align="right"><span style="font-size: 12px;font-weight:bold;">Title:</span></td>
                <td><input type="text" name="title" maxlength="100" style="width:295px"></td>
            </tr>
            <tr>
                
                <td valign="top" align="right"><span style="font-size: 12px;font-weight:bold;">Description:</span></td>
                <td><textarea name="desc" maxlength="500" form="uploadForm" style="width:295px;overflow:hidden;resize:none" rows="3"></textarea></td>
            </tr>
<tr>
  
  <td width="125px" align="right"><span style="font-size: 12px;font-weight:bold;">Tags:</span></td>
                <td><input type="Tags" name="Tags" maxlength="100" style="width:295px"></td>
  Enter Your Title, Description, And Tags. All Done!           
      </tr>
            <tr>
                <td width="" align="right" style="white-space: nowrap;"></td>
                <td>
        <br>
<input type="submit" id="continue" name="continue" value="Continue ->">
        </td>
            </tr>   
    </tbody></table></center>
  </form>
</div>
<?php include("footer.php"); ?>