<?php
session_start();
include "../config.php";
if (!isset($_SESSION['name']) || $_SESSION['user_role'] != 'Admin') {
    header("Location: logout.php");
    exit();
}
include "header.php";

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Add Club Information</h2>
    <form action="submit_form.php" method="POST" class="mt-4">
        
        <!-- Country Section -->
        <div class="mb-3">
            <label for="country_select" class="form-label">Country</label>
            <select name="country_id" id="country_select" class="form-select" style="width:100%;">
                <option value="">Select Country</option>
            </select>
            <small class="text-muted">Can't find your country? <a href="#" id="add-country">Add New Country</a></small>
            <input type="text" name="new_country" id="new_country" class="form-control mt-2" placeholder="Enter new country" style="display: none;">
        </div>

        <!-- City Section -->
        <div class="mb-3">
            <label for="city_select" class="form-label">City</label>
            <select name="city_id" id="city_select" class="form-select">
                <option value="">Select City</option>
            </select>
            <small class="text-muted">Can't find your city? <a href="#" id="add-city">Add New City</a></small>
            <input type="text" name="new_city" id="new_city" class="form-control mt-2" placeholder="Enter new city" style="display: none;">
        </div>

        <!-- Club Section -->
        <div class="mb-3">
            <label for="club_name" class="form-label">Club Name</label>
            <input type="text" name="club_name" id="club_name" class="form-control" placeholder="Enter Club Name" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
</div>

<script>
$(document).ready(function () {
    // Apply Select2 to the country and city select boxes
    $('#country_select, #city_select').select2({
        placeholder: 'Search...',
        allowClear: true
    });

    // Show input for new country
    $('#add-country').on('click', function (e) {
        e.preventDefault();
        $('#new_country').toggle().val('');
    });

    // Show input for new city
    $('#add-city').on('click', function (e) {
        e.preventDefault();
        $('#new_city').toggle().val('');
    });

    // Fetch countries
    fetchCountries();

    function fetchCountries() {
        $.ajax({
            url: 'fetch_data.php',
            type: 'GET',
            data: { fetch_countries: true },
            success: function (data) {
                const countries = JSON.parse(data);
                $('#country_select').empty().append('<option value="">Select Country</option>');
                countries.forEach(country => {
                    $('#country_select').append(`<option value="${country.id}">${country.country_name}</option>`);
                });
                $('#country_select').trigger('change'); // Trigger change to initialize select2 filtering
            }
        });
    }

    // Fetch cities based on selected country from international_cities table
    $('#country_select').on('change', function () {
        const countryId = $(this).val();
        fetchCities(countryId);
    });

    function fetchCities(countryId) {
        $.ajax({
            url: 'fetch_data.php',
            type: 'GET',
            data: { country_id: countryId },
            success: function (data) {
                const cities = JSON.parse(data);
                $('#city_select').empty().append('<option value="">Select City</option>');
                cities.forEach(city => {
                    $('#city_select').append(`<option value="${city.id}">${city.city_name}</option>`);
                });
                $('#city_select').trigger('change'); // Trigger change to initialize select2 filtering
            }
        });
    }
});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
