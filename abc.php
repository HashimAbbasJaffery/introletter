<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country, City, and Club Selection</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>

<div class="container mt-5">
    <h3>Select Country, City and Club</h3>

    <!-- Buttons -->
    <button id="local-btn" class="btn btn-primary">Local</button>
    <button id="international-btn" class="btn btn-secondary">International</button>

    <!-- Local City and Club Selection -->
    <div id="local-section" class="mt-3" style="display: none;">
        <label for="local-city-select">Select City</label>
        <select id="local-city-select" class="form-select" ></select>

        <label for="local-club-select" class="mt-3">Select Club</label>
        <select id="local-club-select" class="form-select"></select>
    </div>

    <!-- International Country, City and Club Selection -->
    <div id="international-section" class="mt-3" style="display: none;">
        <label for="country-select">Select Country</label>
        <select id="country-select" class="form-select"></select>

        <label for="city-select" class="mt-3">Select City</label>
        <select id="city-select" class="form-select"></select>

        <label for="international-club-select" class="mt-3">Select Club</label>
        <select id="international-club-select" class="form-select"></select>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize Select2
    $('#local-city-select, #local-club-select, #country-select, #city-select, #international-club-select').select2();

    // Local Button Click
    $('#local-btn').on('click', function() {
        $('#local-section').show();
        $('#international-section').hide();

        // Fetch Local Cities
        $.ajax({
            url: 'fetch_data.php',
            type: 'GET',
            data: { type: 'local' },
            success: function(data) {
                var cities = JSON.parse(data);
                $('#local-city-select').empty().append('<option value="">Select City</option>');
                cities.forEach(city => {
                    $('#local-city-select').append(`<option value="${city.id}">${city.city_name}</option>`);
                });
            }
        });
    });

    // International Button Click
    $('#international-btn').on('click', function() {
        $('#local-section').hide();
        $('#international-section').show();

        // Fetch Countries
        $.ajax({
            url: 'fetch_data.php',
            type: 'GET',
            data: { type: 'international' },
            success: function(data) {
                var countries = JSON.parse(data);
                $('#country-select').empty().append('<option value="">Select Country</option>');
                countries.forEach(country => {
                    $('#country-select').append(`<option value="${country.id}">${country.country_name}</option>`);
                });
            }
        });
    });

    // Fetch International Cities
    $('#country-select').on('change', function() {
        var countryId = $(this).val();
        $.ajax({
            url: 'fetch_data.php',
            type: 'GET',
            data: { type: 'city', country_id: countryId },
            success: function(data) {
                var cities = JSON.parse(data);
                $('#city-select').empty().append('<option value="">Select City</option>');
                cities.forEach(city => {
                    $('#city-select').append(`<option value="${city.id}">${city.city_name}</option>`);
                });
            }
        });
    });

    // Fetch Clubs for Local Cities
    $('#local-city-select').on('change', function() {
        var cityId = $(this).val();
        $.ajax({
            url: 'fetch_data.php',
            type: 'GET',
            data: { type: 'club', city_id: cityId, city_type: 'local' },
            success: function(data) {
                var clubs = JSON.parse(data);
                $('#local-club-select').empty().append('<option value="">Select Club</option>');
                clubs.forEach(club => {
                    $('#local-club-select').append(`<option value="${club.id}">${club.club_name}</option>`);
                });
            }
        });
    });

    // Fetch Clubs for International Cities
    $('#city-select').on('change', function() {
        var cityId = $(this).val();
        $.ajax({
            url: 'fetch_data.php',
            type: 'GET',
            data: { type: 'club', city_id: cityId, city_type: 'international' },
            success: function(data) {
                var clubs = JSON.parse(data);
                $('#international-club-select').empty().append('<option value="">Select Club</option>');
                clubs.forEach(club => {
                    $('#international-club-select').append(`<option value="${club.id}">${club.club_name}</option>`);
                });
            }
        });
    });
});
</script>
 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
