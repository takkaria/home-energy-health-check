<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment;
use App\Models\Improvement;
use App\Models\Part;
use App\Jobs\CreatePdfDocument;
use App\Jobs\SendEmail;
use App\Process\SubmissionProcessor;

class SubmissionController extends Controller
{
    protected $processor;

    public function __construct(SubmissionProcessor $processor)
    {
        $this->processor = $processor;
    }

    /**
     * Show the Asessment form.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assessment = Assessment::findOrFail($id);
        $parts = Part::get([
            'id', 'title', 'description'
        ]);
        $improvements = Improvement::get([
            'id', 'title', 'part_id', 'description',
            'assessor_comment', 'assessor_guidance',
        ]);
        return view('submission.edit', [
            'parts' => $parts,
            'json_parts' => $parts->toJson(),
            'json_improvements' => $improvements->toJson(),
            'assessment' => $assessment,
        ]);
    }

    /**
     * Process a submitted Assessment form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->processor->process($id, $request->all());
    }

}
