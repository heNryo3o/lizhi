<?php

namespace App\Console\Commands;

use App\Models\Seo;
use Illuminate\Console\Command;

class AutoSitemap extends Command {

    protected $name = 'auto_sitemap';

    protected $description = '自动更新sitemap';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        (new Seo())->sitemap();

    }

}
