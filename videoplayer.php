<?php
    require_once("helper.php");
    $db = new Connection;
    $conn = $db->getConnection();       
?>
<!DOCTYPE html>
<html lang="en">
<script src="jquery.js"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    *{
        margin: 0%;
    }
    .kotak{
        box-sizing: content-box;
    }
    .link a{
        text-decoration: none;
        color: white;
        text-align: center;
    }
    .link a:hover{
        color: lightgoldenrodyellow;
        transition: 100ms;
        font-size: 20px;   
    }
    #vid{
        width: 720px;
        height: 480px;
        margin: auto;
    }
</style>

<body>
    <div class="kotak">
        <div id="vid">
            <video id="videoku" poster="images/maxresdefault.jpg" style="width: 720px; height: 480px;margin: auto;" controls >
                    <source id="srcku" src="https://upload.wikimedia.org/wikipedia/commons/transcoded/a/ab/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm.480p.webm" type="video/webm" selected="true" >
            </video>
        </div>
        
        <form>
            <input type="radio" name="quality" id="240" style="margin-left: 42.5%;" onchange="gantires(id)"> 240p
            <input type="radio" name="quality" id="480" onchange="gantires('480')" checked> 480p
            <input type="radio" name="quality" id="720" onchange="gantires(id)"> 720p
            <input type="radio" name="quality" id="1080" onchange="gantires('1080')"> 1080p
        </form>
        
    </div>
</body>
<script>
    function gantires(idk){
        var video = document.getElementById('videoku');
        if(video) { video.remove(); }
        
        let temp = "https://upload.wikimedia.org/wikipedia/commons/transcoded/a/ab/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm."+idk+"p.webm";

        let link = '<video class="video-js vj-default-skin" id="videoku"  style="width: 720px; height: 480px;margin: auto;" poster="images/maxresdefault.jpg" controls> <source id="srcku" src=' + temp + ' type="video/webm"><p class="vjs-no-js">aku mah apa atuh, cuman selingkuhan kamuh</p></video>'

        $('#vid').append(link);
    }
</script>

</html>