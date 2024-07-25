<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV List</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">CV List</h1>
        @if ($cvs->isEmpty())
            <p>No CVs available.</p>
        @else
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2">First Name</th>
                        <th class="py-2">Middle Name</th>
                        <th class="py-2">Last Name</th>
                        <th class="py-2">Date of Birth</th>
                        <th class="py-2">University</th>
                        <th class="py-2">Technologies</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cvs as $cv)
                        <tr>
                            <td class="border px-4 py-2">{{ $cv->name->fname }}</td>
                            <td class="border px-4 py-2">{{ $cv->name->mname }}</td>
                            <td class="border px-4 py-2">{{ $cv->name->lname }}</td>
                            <td class="border px-4 py-2">{{ $cv->name->dob }}</td>
                            <td class="border px-4 py-2">{{ $cv->university->university_name }}</td>
                            <td class="border px-4 py-2">
                                @foreach ($cv->technologies as $technology)
                                    <span
                                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $technology->technology_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>

</html>
