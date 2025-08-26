<x-app-layout>
     @section('header')
         <h2 class="text-xl font-semibold leading-tight text-gray-800">
             {{ $report->title }}
         </h2>
     @endsection
     <div class="py-12">
         <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
             <div class="overflow-hidden rounded-lg bg-white shadow-sm">
                 <div class="overflow-x-auto">
                     <table class="min-w-full divide-y divide-gray-200">
                         <thead class="bg-gray-50">
                             <tr>
                                 @foreach($report->headers as $header)
                                     <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                         {{ $header }}
                                     </th>
                                 @endforeach
                             </tr>
                         </thead>
                         <tbody class="divide-y divide-gray-200 bg-white">
                             @forelse($report->rows as $row)
                                 <tr>
                                     @foreach($row as $cell)
                                         <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                             {{ $cell }}
                                         </td>
                                     @endforeach
                                 </tr>
                             @empty
                                 <tr>
                                     <td colspan="{{ count($report->headers) }}" class="px-6 py-4 text-center text-sm text-gray-500">
                                         No data available for this report.
                                     </td>
                                 </tr>
                             @endforelse
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </x-app-layout>