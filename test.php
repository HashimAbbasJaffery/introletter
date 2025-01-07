<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form id="checkForm">
    <div class="mb-3">
        <label for="membership_no">Membership No</label>
        <input type="text" id="membership_no" name="membership_no" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="members_name">Member Name</label>
        <input type="text" id="members_name" name="members_name" class="form-control" readonly>
    </div>
</form>

</body>
<script>
$(document).ready(function () {
    $('#membership_no').on('input', function () {
        const membershipNo = $(this).val();

        if (membershipNo !== '') {
            $.ajax({
                url: 'fetch_member_data.php',
                method: 'POST',
                data: { membership_no: membershipNo },
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        $('#members_name').val(response.members_name);
                    } else {
                        $('#members_name').val(''); // Agar data na mile toh empty kar do
                        alert('No matching data found!');
                    }
                },
                error: function () {
                    alert('Error in fetching data');
                }
            });
        } else {
            $('#members_name').val(''); // Agar input khaali ho toh reset kar do
        }
    });
});


</script>
</html>