<x-app-layout>
<div>
<x-mary-header title="Branches">
    {{-- <x-slot:middle class="!justify-end">
        <x-mary-input icon="o-magnifying-glass" placeholder="Search..." />
    </x-slot:middle> --}}
    <x-slot:actions>
        {{-- <x-mary-button icon="o-funnel" /> --}}
        <x-mary-button icon="o-plus" class="btn-primary " tooltip="Add Branch" />
    </x-slot:actions>
</x-mary-header>

<div class="overflow-x-auto">
  <table class="table">
    <!-- head -->
    <thead>
      <tr>
        <th></th>
        <th>Branch Name</th>
        <th>Branch Location</th>
        <th>No. of Employees</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <tr>
        <th>1</th>
        <td>Branch of Sogod</td>
        <td>Sogod</td>
        <td>20</td>
      </tr>
      <!-- row 2 -->
      <tr>
        <th>2</th>
        <td>Branch of Catmon</td>
        <td>Catmon</td>
        <td>20</td>
      </tr>
      <!-- row 3 -->
      <tr>
        <th>3</th>
        <td>Branch of Mandaue</td>
        <td>Mandaue</td>
        <td>20</td>
      </tr>
    </tbody>
  </table>
</div>
</div>
</x-app-layout>
