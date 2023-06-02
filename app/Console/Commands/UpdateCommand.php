<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\DonHang;
use App\DieuXe;
use DB;

class UpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update trang thai hoa don';

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
        $donhang = DonHang::all();
        $dieuxe = DieuXe::all();

        foreach ($donhang as $dh){
            foreach ($dieuxe as $dx){
                if ($dh->dh_id == $dx->donhang_id){
                    DB::table('tbl_donhang')
                        ->where('dh_id', '=', $dh->dh_id)
                        ->update(['trangthai_dh' => 1]);
                    break;
                }else{
                    DB::table('tbl_donhang')
                        ->where('dh_id', '=', $dh->dh_id)
                        ->update(['trangthai_dh' => 0]);
                }
            }
        }

    }
}
