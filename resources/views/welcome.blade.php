@extends('master')

@section('content')
    <div class="container">
        <div class="my-4 p-4 card">
            <h1>PECHAT - Alpha Test Version 0.1</h1>

            <p>Here's what you can do so far:</p>

            <ol class="list-group">
                <li class="list-group-item">
                    <a class="btn btn-primary" href="{{ url('admin') }}">
                        Log in to the administration area.
                    </a>
                </li>
                <li class="list-group-item">
                    <a class="btn btn-warning" href="{{ url('submit/create') }}">
                        Create a new assessment.
                    </a>
                </li>
                <li class="list-group-item">
                    <p>From the form page, you can edit and submit assessments.</p>
                    <p>You can also view a preview of the pdf this assessment will generate.</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Assessment Date</th>
                                <th>Homeowner</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($assessments as $assessment)
                            <tr>
                                <td>{{ $assessment->assessment_date }}</td>
                                <td>{{ $assessment->homeowner_name }}</td>
                                <td>{{ $assessment->status }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-warning" href="{{ action('SubmissionController@edit', [
                                            'id' => $assessment->id
                                        ]) }}">Go to form</a>
                                        <a class="btn btn-danger" href="{{ action('SubmissionController@pdfTest', [
                                            'id' => $assessment->id
                                        ]) }}">Pdf preview</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </li>

            </ol>

        </div>
    </div>
@endsection
