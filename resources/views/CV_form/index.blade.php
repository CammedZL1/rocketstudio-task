<x-layout>
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6 text-center">Create CV</h2>
        <div class="flex justify-center">
            <form id="createCV" class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
                <div class="mb-4">
                    <label for="fname" class="block text-sm font-medium text-gray-700">First name:</label>
                    <input type="text" id="fname" name="fname"
                        class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="First name">
                </div>
                <div class="mb-4">
                    <label for="mname" class="block text-sm font-medium text-gray-700">Middle name:</label>
                    <input type="text" id="mname" name="mname"
                        class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Middle name">
                </div>
                <div class="mb-4">
                    <label for="lname" class="block text-sm font-medium text-gray-700">Last name:</label>
                    <input type="text" id="lname" name="lname"
                        class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Last name">
                </div>
                <div class="mb-4 relative">
                    <label for="datepicker-format" class="block text-sm font-medium text-gray-700">Choose date of
                        birth:</label>
                    <input id="datepicker-format" datepicker datepicker-format="yyyy-mm-dd" type="text"
                        class="block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Date of Birth">
                </div>
                <div class="mb-4">
                    <label for="universitySelect" class="block text-sm font-medium text-gray-700">Choose your
                        university:</label>
                    <select id="universitySelect"
                        class="block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @foreach ($universities as $university)
                            <option value="{{ $university->id }}">{{ $university->university_name }}</option>
                        @endforeach
                    </select>
                    <button type="button" id="addUni"
                        class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-md flex items-center">
                        <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Add University
                    </button>
                </div>
                <div class="mb-4">
                    <label for="technologiesSelect" class="block text-sm font-medium text-gray-700">Select
                        Technologies:</label>
                    <select multiple id="technologiesSelect"
                        class="block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @foreach ($technologies as $technology)
                            <option value="{{ $technology->id }}">{{ $technology->technology_name }}</option>
                        @endforeach
                    </select>
                    <button type="button" id="addTechnology"
                        class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-md flex items-center">
                        <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Add Technology
                    </button>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md">Create CV</button>
            </form>
        </div>
    </div>

    <!-- University Modal -->
    <div id="universityModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
        <div class="bg-white rounded-lg shadow-lg w-1/3">
            <div class="px-4 py-2 flex justify-between items-center border-b">
                <h5 class="text-xl font-bold">Add University</h5>
                <button id="closeModal" class="text-gray-600">&times;</button>
            </div>
            <div class="p-4">
                <form id="addUniversityForm">
                    <div class="mb-4">
                        <label for="universityName" class="block text-sm font-medium text-gray-700">University
                            Name</label>
                        <input type="text"
                            class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm p-2"
                            id="universityName" name="option" required>
                        <label for="universityScore" class="block text-sm font-medium text-gray-700 mt-4">University
                            Accreditation Score</label>
                        <input type="number" max="10" min="0"
                            class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm p-2"
                            id="universityScore" name="universityScore" required>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Technology Modal -->
    <div id="technologyModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
        <div class="bg-white rounded-lg shadow-lg w-1/3">
            <div class="px-4 py-2 flex justify-between items-center border-b">
                <h5 class="text-xl font-bold">Add Technology</h5>
                <button id="closeTechModal" class="text-gray-600">&times;</button>
            </div>
            <div class="p-4">
                <form id="addTechnologyForm">
                    <div class="mb-4">
                        <label for="technologyName" class="block text-sm font-medium text-gray-700">Technology
                            Name</label>
                        <input type="text"
                            class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm p-2"
                            id="technologyName" name="option" required>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
