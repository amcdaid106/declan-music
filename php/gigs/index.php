
<?php 
    include '../templates/top.php'; 
    $data = file_get_contents("gigs.json");
    $gigs = json_decode($data, true);

    function convert_date($str) {
        $date = date_create($str);
        return date_format($date, "M j, Y g:i A");

    }

?>

<div class="container-fluid">

    <?php
        if (count($gigs) > 0) {
            foreach ($gigs as $index => $gig) {
                echo '<div class="gig-container">
                        <div>
                          <span class="glyphicon glyphicon-time bullet-icon"></span><span>' . convert_date($gig["date"]) . '</span>
                        </div>
                        <div>
                          <span class="glyphicon glyphicon-map-marker bullet-icon"></span>
                            <a href="'. $gig["location_link"] .'" target="_blank">'. $gig["location_name"] .'</a>
                        </div>
                      </div>';
            }
        }
        else {
            ?>
                <p>No gigs at this time. Please check back soon!</p>
            <?php
        }   
    ?>
        
</div>

<?php include '../templates/bottom.php'; ?>

<?php
// {% if gigs %}
//         {% for gig in gigs %}
//         <article class="list-style">
//             <h3 class="glyphicon glyphicon-time">   {{ gig.date_time }}   </h3></br>
//             <h3 class="glyphicon glyphicon-map-marker"><a href="{{ gig.location_link }}" target="_blank">   {{gig.location_name }}   </a></h3>
//         {% endfor %}

//     {% else %}
//         <p>No gigs at this time. Please check back soon!</p>
// {% endif %}
?>