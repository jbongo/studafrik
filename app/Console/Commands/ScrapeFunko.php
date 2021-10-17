<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// use Weidner\Goutte\GoutteFacade as Goutte;
use Goutte;

class ScrapeFunko extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:funko';
    protected $description = 'Funko POP! Vinyl Scraper';
    protected $collections = [
        'animation',
        'disney',
        'games',
        'heroes',
        'marvel',
        'monster-high',
        'movies',
        'pets',
        'rocks',
        'sports',
        'star-wars',
        'television',
        'the-vault',
        'the-vote',
        'ufc',
    ];



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
     * @return int
     */
    public function handle()
    {
        foreach ($this->collections as $collection) {
            $this->scrape($collection);
        }
    }



/**
 * For scraping data for the specified collection.
 *
 * @param  string $collection
 * @return boolean
 */
public static function scrape($collection)
{

    $FUNKO_POP_URL= "https://funko.com/collections/pop-vinyl";


    $crawler = Goutte::request('GET', $FUNKO_POP_URL.'/'.$collection);

    $pages = ($crawler->filter('footer .pagination li')->count() > 0)
        ? $crawler->filter('footer .pagination li:nth-last-child(2)')->text()
        : 0
    ;

    for ($i = 0; $i < $pages + 1; $i++) {
        if ($i != 0) {
            $crawler = Goutte::request('GET', $FUNKO_POP_URL.'/'.$collection.'?page='.$i);
        }
    dd($crawler);


        $crawler->filter('.product-item')->each(function ($node) {
            $sku   = explode('#', $node->filter('.product-sku')->text())[1];
            $title = trim($node->filter('.title a')->text());

            echo $title;
            print_r($sku.', '.$title);
        });
    }

    return true;
}



}
