<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Section Detail') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl m-4 mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <div class="mx-auto">
                <!-- --------------------- START NEW TABLE --------------------->

                <div class="flex flex-col mb-5">
                    <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <div class="grid grid-cols-2 gap-1 w-1/2">
                                    <div>Nama</div>
                                    <div>{{ $question->question }}</div>
                                </div>
                                <div class="grid grid-cols-2 gap-1 w-1/2">
                                    <div>Deskripsi</div>
                                    <div>{{ $question->explanation }}</div>
                                </div>
                                <div class="grid grid-cols-2 gap-1 w-1/2">
                                    <div>Status</div>
                                    <div>{{ $question->is_active === '1'  ? 'Aktif' : 'Tidak Aktif' }}</div>
                                </div>
                                <div class="grid grid-cols-2 gap-1 w-1/2">
                                    <div>Details</div>
                                    <div>{{ $question->section->name     }}</div>
                                </div>
                                <div class="grid grid-cols-2 gap-1 w-1/2">
                                    <div>Created By</div>
                                    <div>{{ $question->user->name    }}</div>
                                </div>
                                <div class="flex justify-end">
                                    <a class="uppercase tracking-wide font-bold rounded border-2 border-poor-green hover:border-poor-green-dark bg-poor-green text-white hover:bg-poor-green-dark transition shadow-md py-2 px-6 items-center">
                                        Hapus Pertanyaan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="tracking-wide font-bold rounded border-2 bg-green-500 text-white  transition shadow-md py-2 px-6 items-center">
                                        <tr>
                                            <th scope=" col" class="px-6 py-3 text-left text-xs font-extrabold  uppercase tracking-wider">
                                                Item
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-extrabold  uppercase tracking-wider">
                                                Details
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            Question
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-900">{{ $question->question }}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            Explanation
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-900">{{ $question->explanation}}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            Status
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-900">{{ $question->is_active === '1'  ? 'Active' : 'Not Active' }}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            Details
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-lg text-bold">
                                                <div class="text-sm text-gray-900">{{ $question->section->name }}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            Created By
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-lg text-bold">
                                                <div class="text-sm text-gray-900">{{ $question->user->name}}</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- ---------------- END NEW TABLE --------------------- -->

                <!-- --------------------- START NEW TABLE --------------------->
                <div class="mt-5 rounded-t-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="tracking-wide font-bold rounded border-2 bg-red-chili text-white  transition shadow-md py-2 px-6 items-center">
                            <tr class="max-w-auto">
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                    Jawaban
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                    Pilihan
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($answers as $answer)
                            <tr class="hover:bg-green-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $answer->answer}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="p-1 justify-center mx-auto text-xs font-extrabold  ">
                                        @if ($answer->is_checked === '1')
                                        <span class="bg-poor-green uppercase px-3 py-1 rounded-md">Benar</span>
                                        @else
                                        <span class="bg-red-chili uppercase px-3 py-1 rounded-md text-white">Salah</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- -------------------------------end table ------------------------ -->
            </div>
        </div>
    </div>
</x-app-layout>