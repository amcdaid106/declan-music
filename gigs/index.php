
<?php
    include '../templates/top.php';
    $data = file_get_contents("gigs.json");
    $gigs = json_decode($data, true);
    date_default_timezone_set('EST');
    $now = date("M j, Y g:i A");

    // echo '<pre>';
    // print_r($gigs);
    // echo '</pre>';


    function convert_date($str) {
        $date = date_create($str);
        return date_format($date, "M j, Y g:i A");

    }

    function print_gigs($gig_array) {
        foreach ($gig_array as $index => $gig) {
            $gig_date = convert_date($gig["date"]);
            echo '<div class="gig-container">
                    <div>
                      <span class="glyphicon glyphicon-time bullet-icon"></span><span>' . $gig_date . '</span>
                    </div>
                    <div>
                      <span class="glyphicon glyphicon-home bullet-icon"></span>
                        <a href="'. $gig["location_link"] .'" target="_blank">'. $gig["location_name"] .'</a>
                    </div>
                    <div>
                      <span class="glyphicon glyphicon-map-marker bullet-icon"></span>
                        <a href="' . $gig["map_link"] .'" target="blank">'.$gig["town_state"].'</a>
                    </div>
                  </div>';
        }
    }

?>

<div class="container-fluid">

    <?php
        $upcoming_gigs = array();
        $past_gigs = array();
        foreach ($gigs as $index => $gig) {
            if ( strtotime($gig["date"]) >= strtotime($now) ) {
                array_push($upcoming_gigs, $gig);
            }
            else {
                array_push($past_gigs, $gig);
            }
        }
    ?>
    <h1>Upcoming Gigs</h1>
    <?php
        if (count($upcoming_gigs) > 0) {
            print_gigs($upcoming_gigs);
        } else {
            echo '<div>No upcoming gigs at this time. Please check back soon for new dates!</div>';
        }
    ?>
    <h1>Past Gigs</h1>
    <?php
        print_gigs($past_gigs);
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
