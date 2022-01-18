<h1 class="text-center text-primary">Member list</h1>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Country</th>
                <th>State</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            @foreach($countries as $country)
                <tr>
                    <td>{{ $country->id }}</td>
                    <td>{{ $country->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
