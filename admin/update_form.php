<?php
include "../config.php";
include "header.php";
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Update Club Information</h4>
                </div>
                <div class="card-body">
                    <form action="update_process.php" method="POST">
                        <input type="hidden" name="id" value="<?= isset($club['id']) ? $club['id'] : '' ?>">

                        <!-- City Type -->
                        <div class="mb-3">
                            <label for="city_type" class="form-label">City Type</label>
                            <select name="city_type" id="city_type" class="form-select" required>
                                <option value="">Select Type</option>
                                <option value="local" <?= isset($club['type']) && $club['type'] === 'local' ? 'selected' : '' ?>>Local</option>
                                <option value="international" <?= isset($club['type']) && $club['type'] === 'international' ? 'selected' : '' ?>>International</option>
                            </select>
                        </div>

                        <!-- Country Section -->
                        <div class="mb-3" id="country-section" style="display: <?= isset($club['type']) && $club['type'] === 'international' ? 'block' : 'none'; ?>;">
                            <label for="country_select" class="form-label">Country</label>
                            <select name="country_id" id="country_select" class="form-select">
                                <option value="">Select Country</option>
                            </select>
                        </div>

                        <!-- City Section -->
                        <div class="mb-3">
                            <label for="city_select" class="form-label">City</label>
                            <select name="city_id" id="city_select" class="form-select">
                                <option value="">Select City</option>
                            </select>
                        </div>

                        <!-- Club Name -->
                        <div class="mb-3">
                            <label for="club_name" class="form-label">Club Name</label>
                            <input type="text" name="club_name" id="club_name" class="form-control" value="<?= isset($club['club_name']) ? $club['club_name'] : '' ?>" placeholder="Enter Club Name" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
$(document).ready(function () {
    // Apply Select2
    $('#country_select, #city_select').select2();

    // Toggle country section based on city type
    $('#city_type').on('change', function () {
        const cityType = $(this).val();
        if (cityType === 'local') {
            $('#country-section').hide();
            fetchCities('local');
        } else if (cityType === 'international') {
            $('#country-section').show();
            fetchCountries();
        }
    });

    function fetchCountries() {
        $.ajax({
            url: 'fetch_data.php',
            type: 'GET',
            data: { type: 'countries' },
            success: function (data) {
                const countries = JSON.parse(data);
                $('#country_select').empty().append('<option value="">Select Country</option>');
                countries.forEach(country => {
                    $('#country_select').append(`<option value="${country.id}">${country.country_name}</option>`);
                });
            }
        });
    }

    function fetchCities(type) {
        $.ajax({
            url: 'fetch_data.php',
            type: 'GET',
            data: { type },
            success: function (data) {
                const cities = JSON.parse(data);
                $('#city_select').empty().append('<option value="">Select City</option>');
                cities.forEach(city => {
                    $('#city_select').append(`<option value="${city.id}">${city.city_name}</option>`);
                });
            }
        });
    }

    // Load cities initially if local
    if ('<?= isset($club['type']) && $club['type'] === 'local' ?>') {
        fetchCities('local');
    }
});
</script>
