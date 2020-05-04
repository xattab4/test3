<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

use App\Product;

class UpdateProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update products from csv';

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
        $files = Storage::allFiles(config('app.product_csv_files'));

        foreach ($files as $file) {
            $this->info('Find: ' . $file);
            
            // Нужно сделать лучше, но нет времени
            $csvArray = fopen(base_path() . '/storage/app/public/' . $file, 'r');
            
             // Массив будет хранить данные из csv
            $arrayLineFull = array();

            // Проходим весь csv-файл, и читаем построчно. 3-ий параметр разделитель поля
            while (($line = fgetcsv($csvArray, 0, ",")) !== FALSE) {
                // Записываем строчки в массив
                $arrayLineFull[] = $line;
            }

            // Это названия полей, нам не к чему
            unset($arrayLineFull[0]); 

            foreach($arrayLineFull as $line) {
                $product = Product::where('sku', $line[0])->first();
                
                // Имя изображения
                $nameImage = trim(substr($line[9], strrpos($line[9], "/") + 1));
             
                if ($product == null) {
                    //$this->info($line[9]);
                    
                    $contents = file_get_contents($line[9]);
                    Storage::put($nameImage, $contents);

                    Product::create([
                        'sku' => $line[0],
                        'image' => $nameImage,
                        'category' => $line[8],
                        'title' => $line[1],
                        'price' => $line[7]
                    ]);
                } else {
                    $product->title = $line[1];
                    
                    // Если вдруг имя изменилось, тогда загрузим
                    if ($product->image != $nameImage) {
                        $contents = file_get_contents($line[9]);
                        Storage::put($nameImage, $contents);

                        $product->image = $nameImage;
                    }
                   
                    $product->category = $line[8];
                    $product->price = $line[7];
                    $product->save();
                }
                
            }
        }
    }
}
