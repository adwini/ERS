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
        @foreach ($branch as $branch)
        <tr>

        <td>{{$branch->branchName}}</td>
        <td>{{$branch->branchLoc}}</td>
        <td>{{$branch->no_of_employee}}</td>
      </tr>
        @endforeach
    </tbody>
  </table>
</div>
</div>
</x-app-layout>
