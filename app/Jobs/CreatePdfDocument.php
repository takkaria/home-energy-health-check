<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreatePdfDocument implements ShouldQueue {

  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  protected $data;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(Array $data) {
    $this->data = $data;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle() {
    var_dump($this->data);
    print("Generating PDF...\n");
    $pdf = \PDF::loadView('welcome', $this->data)
      ->setPaper('a4', 'portrait');
    $pdf->save(storage_path('pdf/my-file.pdf'));
    print("PDF generation complete!\n");
    return;
  }

}