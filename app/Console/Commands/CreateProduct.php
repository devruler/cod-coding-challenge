<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Services\FileService;
use Illuminate\Console\Command;

class CreateProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new product';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Enter product name:');
        $description = $this->ask('Enter product description:');
        $price = $this->ask('Enter product price:');

        Product::create([
            'name' => $name,
            'description' => $description,
            'price' => $price,
        ]);

        $this->info('Product created successfully.');
    }
}
