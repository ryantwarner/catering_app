<div class="alert alert-success">
    <ul>
        @foreach ($successes->all() as $success)
            <li>{{ $success }}</li>
        @endforeach
    </ul>
</div>