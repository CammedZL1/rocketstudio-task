<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Submit a CV</title>

    <!-- DONT FORGET CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- jquery for AJAX -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <x-navbar></x-navbar>
    {{ $slot }}

    <script>
        $(document).ready(function() {
            $.ajaxSetup({ //might be redundant
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //functions for the University Modal
            $('#addUni').click(function() {
                $('#universityModal').removeClass('hidden').addClass('flex');
            });

            $('#closeModal').click(function() {
                $('#universityModal').removeClass('flex').addClass('hidden');
            });

            $('#addUniversityForm').submit(function(event) {
                event.preventDefault();
                var universityName = $('#universityName').val();
                var universityScore = $('#universityScore').val();

                $.ajax({
                    url: '/add-university',
                    method: 'POST',
                    data: {
                        university_name: universityName,
                        university_score: universityScore
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#universitySelect').append(new Option(response.university
                                .university_name,
                                response.university.id));
                            $('#addUniversityForm')[0].reset();
                            $('#universityModal').removeClass('flex').addClass('hidden');
                        } else {
                            alert('Something went wrong');
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        alert('Something went wrong');
                    }
                });
            });

            //functions for the Technology modal
            $('#addTechnology').click(function() {
                $('#technologyModal').removeClass('hidden').addClass('flex');
            });

            $('#closeTechModal').click(function() {
                $('#technologyModal').removeClass('flex').addClass('hidden');
            });

            $('#addTechnologyForm').submit(function(event) {
                event.preventDefault();
                var technologyName = $('#technologyName').val();
                $.ajax({
                    url: '/add-technology',
                    method: 'POST',
                    data: {
                        technology_name: technologyName,
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#technologiesSelect').append(new Option(response.technology
                                .technology_name,
                                response.technology.id));
                            $('#addTechnologyForm')[0].reset();
                            $('#technologyModal').removeClass('flex').addClass('hidden');
                        } else {
                            alert('Something went wrong');
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        alert('Something went wrong');
                    }
                });
            });

            //Form functions
            $('#createCV').submit(function(event) {
                event.preventDefault();
                var formData = {
                    fname: $('#fname').val(),
                    mname: $('#mname').val(),
                    lname: $('#lname').val(),
                    date: $('#datepicker-format').val(),
                    university_id: $('#universitySelect').val(),
                    technology_ids: $('#technologiesSelect').val()
                };
                console.log('University ID:', $('#universitySelect').val());
                console.log('Technology IDs:', $('#technologiesSelect').val());
                console.log("Form Data:", formData);
                $.ajax({
                    url: '/save-CVform',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            alert('CV created and submitted');
                            $('#createCV')[0].reset();
                        } else {
                            alert('There as an issue when creating the CV');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error. Check the console.');
                    }
                });
            });
        });
    </script>
</body>

</html>
