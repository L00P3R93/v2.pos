<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

use Database\Seeders\LocalImages;

class GetRandomImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-random-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get random images stored locally, so that the seed process can be fast.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Use an empty string to get random images
        // We could fine-tune with search terms, examples: 'nature', 'people', 'city', 'abstract', 'food', 'sports', 'technics', 'transport', 'animals'
        // This needs some deeper research to get the best results

        $schemas = [
            ['amount' => 40, 'size' => LocalImages::SIZE_200x200, 'terms' => [
                'headphones', 'shoes', 'watches'
            ]],
            ['amount' => 40, 'size' => LocalImages::SIZE_1280x720, 'terms' => [
                'phones', 'laptops', 'cameras'
            ]],
        ];

        foreach ($schemas as $schema) {
            $this->getRandomImages($schema);
        }

        foreach ($schemas as $schema) {
            $this->removeDuplicates($schema);
        }
    }

    protected function getRandomImages($schema): void
    {
        $url = config('services.unsplash.url');
        $accessKey = config('services.unsplash.access_key');

        ['amount' => $amount, 'size' => $size, 'terms' => $terms] = $schema;

        $sizeSplit = explode('x', $size);
        $width = $sizeSplit[0]; $height = $sizeSplit[1];

        $this->comment("Getting $amount random images of size $size, of topic: " . implode(', ', $terms));

        File::deleteDirectory(database_path('seeders/local_images/'.$size));

        $progressBar = $this->output->createProgressBar($amount);
        $progressBar->start();

        foreach (range(1, $amount) as $i) {
            $term = $terms[array_rand($terms)];

            $response = Http::get($url, [
                'query' => $term,
                'orientation' => 'landscape',
                'client_id' => $accessKey
            ]);

            if($response->successful()) {
                $imageUrl = $response->json()['urls']['regular'];
                $rawImageUrl = $response->json()['urls']['raw'];
                $image = file_get_contents($imageUrl);
                $rawImage = file_get_contents($rawImageUrl."&w=$width&dpr=2");

                File::ensureDirectoryExists(database_path('seeders/local_images/'.$size));
                $filename = Str::uuid().'.jpg';

                File::put(database_path('seeders/local_images/'.$size.'/'.$filename), $rawImage);
            }

            $progressBar->advance();
        }

        $progressBar->finish();
        $this->newLine();
        $this->info('Done!');
    }

    protected function removeDuplicates($schema) : void {
        ['size' => $size] = $schema;

        $allFiles = fn () => collect(File::files(database_path('seeders/local_images/' . $size)));

        $uniqueImageSet = $allFiles()
            ->mapWithKeys(fn ($file) => [md5_file($file->getPathname()) => $file->getPathname()])
            ->values();

        $allFiles()
            ->map(fn ($file) => $file->getPathname())
            ->diff($uniqueImageSet)
            ->each(fn ($file) => File::delete($file));

        $this->info('Kept ' . $uniqueImageSet->count() . " unique files from size $size");
    }
}
