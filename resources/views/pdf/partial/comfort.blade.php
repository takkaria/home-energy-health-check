


<h3>What of the following is most important to you:</h3>
<p>(1 being most important, 4 least important)</p>

<div class="card card-responses p-2 my-2">
    @foreach (array_chunk($comfortSchema['rateOneToFour'], 2, true) as $pair)
        <div class="row">
            @foreach ($pair as $field => $label)
                @if (array_key_exists($field, $assessment))
                    <div class="col col-6">
                        <div class="row">
                            <div class="col col-6">
                                <strong class="response-label">{{ $label }}:</strong>
                            </div>
                            <div class="col col-6">
                                {{ $assessment[$field] }}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
</div>

<h3>How do you find your home?</h3>

<div class="card card-responses p-2 my-2">
    @foreach (array_chunk($comfortSchema['threeWayToggles'], 2, true) as $pair)
        <div class="row">
            @foreach ($pair as $field => $obj)
                @if (array_key_exists($field, $assessment))
                    <div class="col col-6">
                        <div class="row">
                            <div class="col col-6">
                                <strong class="response-label">{{ $obj['label'] }}:</strong>
                            </div>
                            <div class="col col-6">
                                {{ $assessment[$field] }}
                                @if ($assessment[$field] == 1)
                                    ({{ $obj['helpText'][0] }})
                                @elseif ($assessment[$field] == 2)
                                    (Just right)
                                @elseif ($assessment[$field] == 3)
                                    ({{ $obj['helpText'][1] }})
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
</div>

<h3>Other Information</h3>

@foreach ($comfortSchema['otherInfo'] as $field => $label)
    @if (array_key_exists($field, $assessment))
        <div class="card card-responses p-2 my-2">
            <strong>{{ $label }}:</strong> {{ $assessment[$field] }}
        </div>
    @endif
@endforeach
