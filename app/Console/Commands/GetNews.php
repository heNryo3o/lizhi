<?php

namespace App\Console\Commands;

use App\Models\Seo;
use Illuminate\Console\Command;

class GetNews extends Command {

    protected $name = 'get_news';

    protected $description = '爬取新闻';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        (new Seo())->getNews();

        return;

    }

}
