<x-layout>
    <div class="container mx-auto mt-6 p-4">
        <h2 class="text-2xl font-bold mb-6 text-center">Search CVs by Date Range</h2>
        <div class="flex flex-wrap justify-center mb-6">
            <div class="mb-4 relative">
                <label for="start_date" class="block text-sm font-medium text-gray-700">Choose a start date:</label>
                <input id="start_date" datepicker datepicker-format="yyyy-mm-dd" type="text"
                    class="block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Start date">
            </div>
            <div class="mb-4 relative">
                <label for="end_date" class="block text-sm font-medium text-gray-700">Choose end date:</label>
                <input id="end_date" datepicker datepicker-format="yyyy-mm-dd" type="text"
                    class="block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="End date">
            </div>
            <div class="w-full md:w-1/3 flex items-end px-2">
                <button id="searchBtn" class="btn bg-blue-500 text-white px-4 py-2 rounded-md mr-2">Search</button>
                <button id="searchCreated" class="btn bg-blue-500 text-white px-4 py-2 rounded-md">Search by
                    Created</button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date
                            of Birth</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            University</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Technologies</th>
                    </tr>
                </thead>
                <tbody id="resultsTable" class="bg-white divide-y divide-gray-200">
                    <!-- Results will be appended here -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#searchBtn').click(function() {
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();

                $.ajax({
                    url: '{{ route('sortByRange') }}',
                    method: 'GET',
                    data: {
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(response) {
                        if (response.success) {
                            var cvs = response.cvs;
                            var tableBody = $('#resultsTable');
                            tableBody.empty();
                            // wasn't able to make the tables display properly so I sent ChatGPT 
                            // the JSON that gets returned and asked it to modify the fumction
                            cvs.forEach(function(cv) {
                                var technologies = cv.cv_form && cv.cv_form
                                    .technologies ?
                                    cv.cv_form.technologies.map(t => t.technology_name)
                                    .join(', ') :
                                    'None';
                                var university = cv.cv_form && cv.cv_form.universities ?
                                    cv.cv_form.universities.university_name :
                                    'None';

                                var row = '<tr>' +
                                    '<td class="px-6 py-4 whitespace-nowrap">' + cv
                                    .fname + ' ' + cv.mname + ' ' + cv
                                    .lname + '</td>' +
                                    '<td class="px-6 py-4 whitespace-nowrap">' + cv
                                    .dob + '</td>' +
                                    '<td class="px-6 py-4 whitespace-nowrap">' +
                                    university + '</td>' +
                                    '<td class="px-6 py-4 whitespace-nowrap">' +
                                    technologies + '</td>' +
                                    '</tr>';
                                tableBody.append(row);
                            });
                        } else {
                            alert('No data found for the given date range.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error occurred while fetching data.');
                    }
                });
            });

            $('#searchCreated').click(function() {
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();
                $.ajax({
                    url: '{{ route('cvs.by.creation.date') }}',
                    method: 'GET',
                    data: {
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(response) {
                        if (response.success) {
                            var cvs = response.cvs;
                            var tableBody = $('#resultsTable');
                            tableBody.empty();

                            cvs.forEach(function(cv) {
                                var name = cv.names ? cv.names.fname + ' ' + cv.names
                                    .mname + ' ' +
                                    cv.names.lname : 'None';
                                var dob = cv.names ? cv.names.dob : 'None';

                                var university = cv.universities ? cv.universities
                                    .university_name :
                                    'None';

                                var technologies = cv.technologies && cv.technologies
                                    .length > 0 ?
                                    cv.technologies.map(t => t.technology_name).join(
                                        ', ') :
                                    'None';

                                var row = '<tr>' +
                                    '<td class="px-6 py-4 whitespace-nowrap">' + name +
                                    '</td>' +
                                    '<td class="px-6 py-4 whitespace-nowrap">' + dob +
                                    '</td>' +
                                    '<td class="px-6 py-4 whitespace-nowrap">' +
                                    university + '</td>' +
                                    '<td class="px-6 py-4 whitespace-nowrap">' +
                                    technologies + '</td>' +
                                    '</tr>';
                                tableBody.append(row);
                            });
                        } else {
                            alert('No data found for the given date range.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error occurred while fetching data.');
                    }
                });
            });
        });
    </script>
</x-layout>

</html>
