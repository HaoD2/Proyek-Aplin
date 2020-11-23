<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    header {
        text-align: center;
    }

    body {
        text-align: center;
    }

    .center {
        margin-left: auto;
        margin-right: auto;
        display: block
    }

    .button {
        background-color: #4CAF50;
        /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 1px;
    }

    .active {
        background-color: #008CBA;
        /* Blue */
    }

    .requested {
        background-color: #2E8B57;
    }
</style>
<link rel="stylesheet" href="https://unpkg.com/cloudinary-video-player/dist/cld-video-player.min.css">
<body>
    <header>
        <h1>Cloudinary Video Player</h1>
        <h2>Adaptive Video Streaming: Quality levels</h2>
        <h4 id="res"></h4>
    </header>
    <video id="demo-player" controls width=800 class="cld-video-player center">
    </video>
    <p id="dimension">
        Video file: <input type="text" id="FileName" value="hd_trim2">
        <button id="refresh" onClick="refresh()">&#8635;</button>
        Dimensions:
        <button id="up" onClick="videoUp()">&uarr;</button>
        <button id="down" onClick="videoDown()">&darr;</button>
        Streaming Profile:
        <input type="radio" name="profile" onclick="setProfile(this.value)" value="sd"> SD
        <input type="radio" name="profile" onclick="setProfile(this.value)" value="hd" checked="checked"> HD
        <input type="radio" name="profile" onclick="setProfile(this.value)" value="full_hd"> Full HD
    </p>
    <button id="auto" class="active button" onClick="requestAuto()">Auto</button>
    
    <script src="https://unpkg.com/videojs-contrib-quality-levels@2.0.3/dist/videojs-contrib-quality-levels.min.js"></script>
    <script src="https://unpkg.com/cloudinary-video-player/dist/cld-video-player.min.js"></script>
    <script>
        function refresh() {
            var val = document.querySelector('input[name="profile"]:checked').value;
            setProfile(val);
        }

        function videoUp() {
            demoplayer.width(demoplayer.width() + 100);
        }

        function videoDown() {
            demoplayer.width(demoplayer.width() - 100);
        }

        function updateOnResize() {
            var desc = demoplayer.videojs.videoWidth() +
                "x" +
                demoplayer.videojs.videoHeight();
            document.getElementById("res").innerHTML = ("Displayed Resolution: " +
                desc);
            var current = document.getElementsByClassName("active button");
            for (var i = 0; i < current.length; i++) {
                if (current[i].id != "auto")
                    current[i].setAttribute("class", "button");
            }
            var newactive = document.getElementsByName(desc);
            for (var j = 0; j < newactive.length; j++)
                newactive[j].setAttribute("class", "active button");
        }

        function requestResolution() {
            document.getElementById("auto").setAttribute("class", "button");
            for (var i = 0; i < qualityLevels.length; i++) {
                qualityLevels[i].enabled = (this.id == i);
            }
        }

        function requestAuto() {
            for (var i = 0; i < qualityLevels.length; i++) {
                qualityLevels[i].enabled = true;
            }
            document.getElementById("auto").setAttribute("class", "active button");
        }

        function addButton(bid, qlevel, desc, css) {
            var btn = document.createElement("BUTTON");
            document.body.appendChild(btn);
            btn.addEventListener("click", requestResolution);
            btn.innerHTML = desc;
            btn.setAttribute("id", bid);
            btn.setAttribute("class", css);
            btn.setAttribute("name", desc);
        }

        function changeOfResolution() {
            console.log("changeOfResolution", qualityLevels.length)
            console.timeEnd("create-m3u8");
            for (var i = 0; i < qualityLevels.length; i++) {
                var btn = document.getElementById(i);
                var qlevel = qualityLevels[i];
                var desc = qlevel.width + "x" + qlevel.height;
                var css = "button";
                if (i == qualityLevels.selectedIndex)
                    css = "requested button";
                if (btn) {
                    if (btn.getAttribute("class") != "active button")
                        btn.setAttribute("class", css);
                } else
                    addButton(i, qlevel, desc, css);
            }
        }

        function setProfile(profile) {
            var loop = document.getElementsByClassName("button").length - 1;
            for (var i = 0; i < loop; i++) {
                var btn = document.getElementById(i)
                if (btn)
                    document.body.removeChild(btn);
            }
            var file = document.getElementById("FileName").value;
            demoplayer.source(file, {
                sourceTypes: ['hls'],
                transformation: {
                    streaming_profile: profile
                }
            });
        }

        // function changeOfSrc() {
        //     console.log("changeOfSrc", demoplayer.videojs.currentSrc());
        // }

        document.getElementById("demo-player").addEventListener('resize', updateOnResize, false);
        var cld = cloudinary.Cloudinary.new({
            cloud_name: 'hadar'
        });
        var demoplayer = cld.videoPlayer('demo-player');
        //        videojs: {
        //        controlBar: { 
        //        children: ['playToggle','CurrentTimeDisplay','FullscreenToggle'] }}});
        var qualityLevels = demoplayer.videojs.qualityLevels();
        qualityLevels.on('change', changeOfResolution);
        qualityLevels.on('addqualitylevel', function(event) {
            console.log(event.qualityLevel.width);
        });
        demoplayer.on('loadedmetadata', changeOfSrc);
        demoplayer.source('Valorant 2020.11.20 - 19.53.44.01.mp4', {
            sourceTypes: ['hls'],
            transformation: {
                streaming_profile: 'hd'
            }
        });
    </script>

</body>

</html>