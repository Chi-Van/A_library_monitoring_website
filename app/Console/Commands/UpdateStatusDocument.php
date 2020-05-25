<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateStatusDocument extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:updatestatusdocument';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status document success !';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $dateUpdate = \Carbon\Carbon::now()->addDays(-4)->format('Y-m-d');
        $time_form = \Carbon\Carbon::createFromFormat('Y-m-d', $dateUpdate)->setTime(00,00,00);;
        $time_to   = \Carbon\Carbon::createFromFormat('Y-m-d', $dateUpdate)->setTime(23,59,59);
        $dataDocument = \DB::table('documents')
            ->where('created_at', '=', $time_form)
            ->where('created_at', '<=', $time_to)
            ->where('dcm_status', 1)
//            ->whereColumn('created_at', 'updated_at')
            ->get();

        try {
            $listId = [];
            foreach ($dataDocument as $document) {
                array_push($listId, $document->id);
            }

            $update = [
                'updated_at' => \Carbon\Carbon::now(),
                'dcm_status' => 4
            ];

            \DB::table('documents')->whereIn('id', $listId)->update($update);
        } catch (\Exception $e) {
            throw new $e->getMessage();
        }

    }
}
