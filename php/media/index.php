<?php 
    include '../templates/top.php'; 
    $data = file_get_contents("media.json");
    $media = json_decode($data, true);
?>

<div class="container-fluid">

<?php

foreach($media as $index => $video) {
    echo '<div class="video-container">
            <h2>' . $video["caption"] . '</h2>
            <div>
            <iframe width="640" height="480" src="' . $video["url"] . '" frameborder="0" allowfullscreen></iframe>    
            </div>
        </div>';
    }

?>
</div>



<?php include '../templates/bottom.php'; ?>


<?php
// {% if videos %}
    
//         {% for video in videos %}
//             <div align="center">
//                 {% video video.clip as boniche %}
//                 {% video boniche "medium" %}
//                 {% endvideo %}
//             </div>
//             <div align="center">
//                 {{ video.caption }}
//             </div>
//         {% endfor %}

// {% else %}
//     <p>No media at this time. Please check back soon!</p>

// {% endif %}
?>