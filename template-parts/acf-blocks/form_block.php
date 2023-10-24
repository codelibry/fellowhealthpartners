<?php
$select_form = get_sub_field('select_form');

?>
<section class="form_block section section--spacing--md">
    <div class="container">
        <div class="row">
            <?php if ($select_form) : ?>
                <div class="col-lg-12">
                    <div class="form">
                        <?php echo do_shortcode('[contact-form-7 id="' . $select_form . '"]'); ?>
                    </div>

                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjd22D7R7KY6NX-VcuFWKfGScynsWKvNc&libraries=places&region=US"></script>
<script type="text/javascript">
    function initialize() {
        var input = document.getElementById('cities');
        var options = {
            types: ['(cities)'],
            componentRestrictions: {
                country: "us"
            }
        };

        var autocomplete = new google.maps.places.Autocomplete(input, options);

        {
            /* google.maps.event.addListener(autocomplete, 'place_changed', function() {
                        var city, place;
                        place = autocomplete.getPlace();
                        if (place.address_components) {
                        city = place.address_components[0] && place.address_components[0].short_name || '';
                        return setTimeout(function() {
                            return input.value = city;
                        }, 10);
                        }
                    }); */
        }

    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script type="text/javascript">
    function formatDate(date) {
        var monthNames = [
            "January", "February", "March",
            "April", "May", "June", "July",
            "August", "September", "October",
            "November", "December"
        ];

        var day = date.getDate();
        var monthIndex = date.getMonth();
        var year = date.getFullYear();

        return day + ' ' + monthNames[monthIndex] + ' ' + year;
    }

    (function() {
        var inputDate = document.getElementById('applicantDate');
        var labelDate = document.getElementById('applicationTime');
        var d = new Date();

        labelDate.innerHTML = formatDate(d);
        inputDate.value = d;

    })();
</script>

<script type="text/javascript">
    function findGetParameter(parameterName) {
        var result = null,
            tmp = [];
        location.search
            .substr(1)
            .split("&")
            .forEach(function(item) {
                tmp = item.split("=");
                if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
            });
        return result;
    }
    var jbTitle = findGetParameter('job_title');
    if (jbTitle) {
        document.getElementById('job-title-label').innerHTML = decodeURIComponent(jbTitle);

    }

    var salaryTitle = findGetParameter('salaryType');
    if (salaryTitle == 'hr') {
        document.getElementById('salary-label').innerHTML = 'Desired Hourly Rate';

    }
</script>