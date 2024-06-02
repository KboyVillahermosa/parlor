
    // Update the progress bar based on the selected time
    $(document).ready(function() {
        $('#adate').change(function() {
            var selectedDate = $(this).val();
            var availableTimes = []; // You need to populate this array with available times for the selected date
            
            // Example: Available times array
            availableTimes = ['09:00 AM', '10:00 AM', '11:00 AM', '01:00 PM', '02:00 PM', '03:00 PM', '04:00 PM', '05:00 PM', '06:00 PM', '07:00 PM'];

            // Example: Available times for the selected date
            if (selectedDate === '2024-06-05') {
                availableTimes = ['10:00 AM', '11:00 AM', '01:00 PM', '02:00 PM', '03:00 PM', '05:00 PM', '06:00 PM', '07:00 PM', '08:00 PM', '09:00 PM'];
            } else if (selectedDate === '2024-06-06') {
                availableTimes = ['09:00 AM', '10:00 AM', '11:00 AM', '01:00 PM', '02:00 PM', '03:00 PM', '05:00 PM', '06:00 PM', '07:00 PM', '08:00 PM'];
            }

            // Reset the progress bar
            $('#timeProgress').css('width', '0%');
            $('#atime').val('');

            // Update the progress bar and enable the timeslot
            $('#atime').removeClass('d-none');
            $('#atime').empty();
            for (var i = 0; i < availableTimes.length; i++) {
                var time = availableTimes[i];
                $('#atime').append('<option value="' + time + '">' + time + '</option>');
            }
        });

        $('#atime').change(function() {
            var selectedTime = $(this).val();
            if (selectedTime) {
                $('#timeProgress').css('width', '10%'); // Assuming 10% per slot
            }
        });
    });

